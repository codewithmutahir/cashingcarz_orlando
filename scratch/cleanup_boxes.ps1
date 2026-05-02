
$targetDir = "c:\laragon\www\cashingcarz_backup\resources\views\locations";
$files = Get-ChildItem -Path $targetDir -Filter "*.blade.php"

foreach ($file in $files) {
    $content = Get-Content -Path $file.FullName -Raw
    $originalContent = $content

    # This pattern matches any box in the contact section that is NOT the Florida Office box.
    # We look for the div structure and check if it contains "Florida Office".
    
    $boxPattern = '(?s)<div style="background: rgba\(255, 255, 255, 0.1\); padding: [^;]*; border-radius: 16px; backdrop-filter: blur\(10px\); border: 1px solid rgba\(255, 255, 255, 0.2\);[^"]*">.*?<div[^>]*>(?!Florida Office).*?<\/div>.*?<a href="tel:.*?".*?>.*?<\/a>.*?<\/div>'
    
    $content = [regex]::Replace($content, $boxPattern, "")

    if ($content -ne $originalContent) {
        Set-Content -Path $file.FullName -Value $content -NoNewline
        Write-Host "Cleaned up boxes in $($file.FullName)"
    }
}
