<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateStorageSymlink extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-storage-symlink';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (app()->environment('production')) {
            $this->info('Creating production storage symlink');
            $this->call('storage:link');
        } else {
            $this->info('Creating development storage structure');
            if (!is_dir(public_path('uploads'))) {
                mkdir(public_path('uploads'), 0755, true);
            }
        }
    }
}
