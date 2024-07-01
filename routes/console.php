<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote')->hourly();

Schedule::command('queue:work --stop-when-empty')->everyMinute();
Schedule::command('queue:prune-batches --hours=48 --unfinished=72')->daily();
Schedule::command('blog:blog-publish')->everyMinute();
Schedule::command('reel:reel-publish')->everyMinute();


