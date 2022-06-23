<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Newsletter;

class SyncNewsletter extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'qd:newsletter:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync newsletter subscriptions';

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

        Newsletter::where('synced', false)
            ->chunk(100, function ($newsletters) use (&$synced, &$errors) {
                foreach ($newsletters as $newsletter) {
                    if ($newsletter->sync()) {
                        $synced++;
                    } else {
                        $errors++;
                    }
                }
            });

        info("SyncNewsletter: Done [Synced = {$synced}, Errors = {$errors}]");
    }
}
