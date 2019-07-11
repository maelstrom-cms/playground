<?php

namespace App\Console\Commands;

use App\Jobs\ResetPlaygroundJob;
use Illuminate\Console\Command;

class ResetPlaygroundCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'playground:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resets and reseeds the whole Maelstrom DB';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        ResetPlaygroundJob::dispatch();
    }
}
