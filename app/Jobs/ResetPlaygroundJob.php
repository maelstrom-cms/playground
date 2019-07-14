<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class ResetPlaygroundJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Artisan::call('down');
        $this->cleanFolders();
        Artisan::call('key:generate --force');
        Artisan::call('migrate:fresh --force');
        Artisan::call('db:seed --force');
        Artisan::call('up');
    }

    private function cleanFolders()
    {
        $folder = Storage::disk('public')->getAdapter()->getPathPrefix();

        exec("rm -rf $folder*");
        file_put_contents("$folder.gitignore", implode("\n", ['*', '!.gitignore', '']));
    }
}
