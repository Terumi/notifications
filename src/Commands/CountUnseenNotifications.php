<?php

namespace ffy\notifications\Commands;

use Carbon\Carbon;
use ffy\notifications\Notification;
use Illuminate\Console\Command;

class CountUnseenNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ffy-notifications:count-unseen {days=15}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Counts the unseen notifications in db';

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
        $count = Notification::where('seen', 0)->where('created_at', '<', Carbon::today()->subDays($days_old) . 'and')->count;
        $this->info("There are $count unseen notifications in db created the last $days_old days.");
    }
}
