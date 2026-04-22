<?php
/**
 * Repair HeidiSQL / MySQL dumps for phpMyAdmin on shared hosting.
 *
 * Primary fix: REMOVE HeidiSQL banner comments that start with "-- " before INSERT/CREATE.
 * When phpMyAdmin or paste merges those lines with INSERT, MySQL treats INSERT as part of the comment.
 *
 * Also splits rare merged lines: (approximately)INSERT, tablenameCREATE TABLE
 *
 * Usage (from project root, Laragon):
 *   php scripts/fix-orlando-sql-import.php "C:\path\to\orlando.sql"
 *
 * Creates a .bak backup, then overwrites the file.
 */

if ($argc < 2) {
    fwrite(STDERR, "Usage: php scripts/fix-orlando-sql-import.php <path-to.sql>\n");
    exit(1);
}

$path = $argv[1];
if (!is_readable($path)) {
    fwrite(STDERR, "Cannot read file: {$path}\n");
    exit(1);
}

$raw = file_get_contents($path);
$backup = $path . '.bak-' . date('Ymd-His');
if (!copy($path, $backup)) {
    fwrite(STDERR, "Could not write backup: {$backup}\n");
    exit(1);
}

if (str_starts_with($raw, "\xEF\xBB\xBF")) {
    $raw = substr($raw, 3);
}

$content = str_replace(["\r\n", "\r"], "\n", $raw);

$nData = $nStruct = $nSplitIns = $nSplitCre = 0;

// 1) Remove "-- Dumping data for table ... (approximately)" entirely (up to INSERT INTO).
//    Safe: those lines are comments only; INSERT remains.
$content = preg_replace(
    '/-- Dumping data for table .+?\(approximately\)\s*(?=INSERT INTO)/s',
    '',
    $content,
    -1,
    $nData
);
if ($content === null) {
    fwrite(STDERR, "Regex error (strip data comments).\n");
    exit(1);
}

// 2) Remove "-- Dumping structure for table ..." entirely (up to CREATE TABLE IF NOT EXISTS).
$content = preg_replace(
    '/-- Dumping structure for table .+?(?=CREATE TABLE IF NOT EXISTS)/s',
    '',
    $content,
    -1,
    $nStruct
);
if ($content === null) {
    fwrite(STDERR, "Regex error (strip structure comments).\n");
    exit(1);
}

// 3) Legacy: split if still merged
$content = preg_replace(
    '/(\(approximately\))\s*(INSERT INTO)/',
    '$1'."\n".'$2',
    $content,
    -1,
    $nSplitIns
);
$content = preg_replace(
    '/(^-- Dumping structure for table [^\n]+?)(CREATE TABLE IF NOT EXISTS)/m',
    '$1'."\n".'$2',
    $content,
    -1,
    $nSplitCre
);

// Normalize blank lines (optional: collapse 3+ newlines)
$content = preg_replace("/\n{3,}/", "\n\n", $content);

$content = str_replace("\n", "\r\n", $content);

file_put_contents($path, $content);

echo "OK\n";
echo "Backup: {$backup}\n";
echo "Updated: {$path}\n";
echo "Stripped data banners: {$nData}, structure banners: {$nStruct}\n";
echo "Extra split INSERT/CREATE fixes: {$nSplitIns} / {$nSplitCre}\n";
echo "Import via phpMyAdmin: Database -> Import -> Choose file (do not use SQL tab paste).\n";
