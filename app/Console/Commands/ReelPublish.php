<?php

namespace App\Console\Commands;

use App\Models\Reels;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ReelPublish extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reel:reel-publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update reel post status from draft to publish based on publish date';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();

        Reels::where('status', 'draft')
            ->where('is_published', 0)
            ->where('publish_date', '<=', $now)
            ->update(['status' => 'publish', 'is_published' => 1, 'publish_date' => null]);

        $this->info('Reels post statuses updated successfully.');
    }
}
