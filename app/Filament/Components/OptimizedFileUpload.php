<?php

namespace App\Filament\Components;

use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class OptimizedFileUpload extends FileUpload
{
    protected function setUp(): void
    {
        parent::setUp();
        
        $this->afterStateHydrated(function (OptimizedFileUpload $component, $state) {
            // Convert storage path to public URL for display
            if ($state && Storage::disk(config('filament.default_filesystem_disk'))->exists($state)) {
                $component->state(Storage::url($state));
            }
        });
        
        $this->afterStateUpdated(function (OptimizedFileUpload $component, $state) {
            // Optimize and save the image
            if ($state) {
                $image = Image::make($state->getRealPath())
                    ->resize(1200, null, fn ($constraint) => $constraint->aspectRatio())
                    ->encode('webp', 75);
                
                $filename = 'project-'.time().'.webp';
                $path = "projects/{$filename}";
                
                Storage::disk(config('filament.default_filesystem_disk'))
                    ->put($path, $image);
                
                $component->state($path);
            }
        });
    }
}