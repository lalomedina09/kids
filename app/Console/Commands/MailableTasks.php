<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Mailable;

use Date;

class MailableTasks extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'qd:mailables:tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automation tasks for mailables';

    /**
     * Now date
     *
     * @var Date
     */
    private $now;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->now = Date::now();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $deletions = 0;

        Mailable::where('delete_at', '<=', $this->now)
            ->chunk(100, function ($mailables) use (&$deletions) {
                foreach ($mailables as $mailable) {
                    $mailable->delete();
                    $deletions++;
                }
            });

        info("MailableTasks: Done deletions [{$deletions}]");
    }
}
