<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class KeepStorageFolders extends Command
{
    protected $signature = 'storage:keep';
    protected $description = 'Create .gitkeep files in important storage folders so they are included in ZIP';

    public function handle()
    {
        $folders = [
            storage_path('app/public'),
            storage_path('framework'),
            storage_path('framework/cache'),
            storage_path('framework/sessions'),
            storage_path('framework/views'),
            storage_path('logs'),
        ];

        foreach ($folders as $folder) {
            if (!File::exists($folder)) {
                File::makeDirectory($folder, 0755, true);
                $this->info("Created folder: $folder");
            }

            $keepFile = $folder . '/.gitkeep';
            if (!File::exists($keepFile)) {
                File::put($keepFile, '');
                $this->info("Created: $keepFile");
            } else {
                $this->line("Already exists: $keepFile");
            }
        }

        $this->info('All .gitkeep files created!');
        return 0;
    }
}
