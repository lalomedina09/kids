<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Landing;

class SyncLanding extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'qd:landing:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync landing leads';

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
        $errors = 0;
        $synced = 0;

        Landing::where('synced', false)
            ->chunk(100, function ($landings) use (&$synced, &$errors) {
                foreach ($landings as $landing) {
                    if ($landing->sync()) {
                        $synced++;
                    } else {
                        $errors++;
                    }
                }
            });

        info("SyncLanding: Done [Synced = {$synced}, Errors = {$errors}]");
    }
}
