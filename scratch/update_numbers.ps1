
$newNumber = "3214420085";
$newNumberFormatted = "+1 (321) 442-0085";
$newNumberDashed = "321-442-0085";

$oldNumbers = @(
    "4693838321",
    "8178356585",
    "4085580011",
    "4074420085",
    "14693838321",
    "18178356585",
    "14085580011",
    "14074420085"
);

$oldPatterns = @(
    "\(?469\)?[-. ]?383[-. ]?8321",
    "\(?817\)?[-. ]?835[-. ]?6585",
    "\(?408\)?[-. ]?558[-. ]?0011",
    "\(?407\)?[-. ]?442[-. ]?0085"
);

$targetDir = "c:\laragon\www\cashingcarz_backup\resources\views";

$files = Get-ChildItem -Path $targetDir -Filter "*.blade.php" -Recurse

foreach ($file in $files) {
    $content = Get-Content -Path $file.FullName -Raw
    $originalContent = $content

    # Replace phone numbers in href="tel:..."
    $content = [regex]::Replace($content, 'href="tel:\+?1?(' + ($oldPatterns -join '|') + ')"', 'href="tel:' + $newNumber + '"')
    
    # Replace plain text phone numbers
    foreach ($pattern in $oldPatterns) {
        $content = [regex]::Replace($content, $pattern, $newNumberDashed)
    }

    # Special handling for location pages contact section (remove non-Florida boxes)
    # This pattern targets the specific structure found in location pages
    $boxPattern = '(?s)<div style="background: rgba\(255, 255, 255, 0.1\); padding: 1.5rem; border-radius: 16px; backdrop-filter: blur\(10px\); border: 1px solid rgba\(255, 255, 255, 0.2\);[^"]*">.*?<div[^>]*>(?!Florida Office).*?Office<\/div>.*?<a href="tel:.*?".*?>.*?<\/a>.*?<\/div>'
    
    # If it's a location page, we might want to remove the non-Florida office box
    $content = [regex]::Replace($content, $boxPattern, "")

    # Also handle the 0.95rem version of the box
    $boxPattern2 = '(?s)<div style="background: rgba\(255, 255, 255, 0.1\); padding: 1rem; border-radius: 16px; backdrop-filter: blur\(10px\); border: 1px solid rgba\(255, 255, 255, 0.2\);[^"]*">.*?<div[^>]*>(?!Florida Office).*?Office<\/div>.*?<a href="tel:.*?".*?>.*?<\/a>.*?<\/div>'
    $content = [regex]::Replace($content, $boxPattern2, "")

    if ($content -ne $originalContent) {
        Set-Content -Path $file.FullName -Value $content -NoNewline
        Write-Host "Updated $($file.FullName)"
    }
}
