<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class ConvertImagesToWebP extends Command
{
    protected $signature = 'convert:images-webp';
    protected $description = 'Convert all images in public/images and uploads folders to WebP format';

    public function handle()
    {
        $directories = [
            public_path('images'), // Convert images in public/images
            storage_path('app/uploads') // Convert images in storage/uploads
        ];

        foreach ($directories as $directory) {
            if (!File::exists($directory)) {
                $this->warn("⚠️ Directory not found: $directory");
                continue;
            }

            $files = File::allFiles($directory);
            $convertedCount = 0;

            foreach ($files as $file) {
                $extension = $file->getExtension();

                // Skip non-image files and already converted WebP images
                if (!in_array($extension, ['png', 'jpg', 'jpeg']) || $extension === 'webp') {
                    continue;
                }

                // Load the image and convert it to WebP
                $image = Image::make($file->getPathname())->encode('webp', 90);
                $webpPath = $file->getPath() . '/' . $file->getFilenameWithoutExtension() . '.webp';

                // Save the WebP image
                File::put($webpPath, (string) $image);
                $convertedCount++;

                $this->info("✅ Converted: " . $file->getRelativePathname());
            }

            if ($convertedCount > 0) {
                $this->info("✅ Successfully converted {$convertedCount} images in $directory!");
            } else {
                $this->warn("⚠️ No images found for conversion in $directory.");
            }
        }

        $this->info('✅ All images have been converted to WebP.');
    }
}
