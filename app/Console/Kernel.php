<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\Categorizables::class,
        Commands\GenerateKeys::class,
        Commands\MailableTasks::class,
        Commands\SyncLanding::class,
        Commands\SyncNewsletter::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('qd:mailables:tasks')
            ->everyMinute()
            ->withoutOverlapping();

        $schedule->command('qd:newsletter:sync')
            ->everyMinute()
            ->withoutOverlapping();

        $schedule->command('qd:landing:sync')
            ->everyMinute()
            ->withoutOverlapping();

        $schedule->command('qd:advice:reservations:tasks')
            ->everyMinute()
            ->withoutOverlapping();

        $schedule->command('qd:advice:advice:tasks')
            ->everyMinute()
            ->withoutOverlapping();

        $schedule->command('qd:advice:calendar:recurrent')
            ->weekly()
            ->sundays()
            ->at('23:00')
            ->withoutOverlapping();

        $schedule->command('qd:marketplace:events:process')
            ->everyMinute()
            ->withoutOverlapping();

        $schedule->command('qd:marketplace:orders:expire')
            ->everyMinute()
            ->withoutOverlapping();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
