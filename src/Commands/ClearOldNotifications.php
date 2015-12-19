<?php

namespace ffy\notifications;

use Carbon\Carbon;
use ffy\notifications\Notification;
use Illuminate\Console\Command;

class ClearOldNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ffy-notifications:purge-old {days=15}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes old seen notifications';

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
        $days_old = $this->argument('days');
        Notification::where('seen', 1)->where('seen_at', '<', Carbon::today()->subDays($days_old) . 'and')->delete();
        $this->info("Deleted notifications seen at least $days_old days ago.");
    }
}
