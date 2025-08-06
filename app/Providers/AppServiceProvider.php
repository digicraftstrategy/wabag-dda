<?php

namespace App\Providers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *//*
    public function boot(): void
    {
        if (app()->environment('production') && !File::exists(public_path('storage'))) 
        {
            app('files')->link(
                storage_path('app/public'),
                public_path('storage')
            );
        }
    }
        */
    public function boot(): void
    {
        // Handle storage symlink in all environments except local
        if (!app()->environment('local')) {
            $publicStorage = public_path('storage');
            $storageTarget = storage_path('app/public');
            
            try {
                // Case 1: Symlink doesn't exist at all
                if (!File::exists($publicStorage)) {
                    Artisan::call('storage:link');
                    Log::info('Created storage symlink: '.$publicStorage);
                }
                // Case 2: Symlink exists but is broken
                elseif (is_link($publicStorage) && !file_exists(readlink($publicStorage))) {
                    File::delete($publicStorage);
                    Artisan::call('storage:link');
                    Log::warning('Recreated broken storage symlink: '.$publicStorage);
                }
                // Case 3: Symlink points to wrong location
                elseif (is_link($publicStorage) && readlink($publicStorage) !== $storageTarget) {
                    File::delete($publicStorage);
                    Artisan::call('storage:link');
                    Log::warning('Corrected misconfigured storage symlink: '.$publicStorage);
                }
            } catch (\Exception $e) {
                Log::error('Failed to create storage symlink: '.$e->getMessage());
                
                // Fallback: Create manual directory if symlink fails
                if (!File::exists($publicStorage)) {
                    File::makeDirectory($publicStorage, 0755, true);
                    Log::info('Created fallback storage directory: '.$publicStorage);
                }
            }
        }
    }

}
