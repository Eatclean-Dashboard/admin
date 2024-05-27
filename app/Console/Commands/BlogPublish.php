<?php

namespace App\Console\Commands;

use App\Models\Blog;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class BlogPublish extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:blog-publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update blog post status from draft to publish based on publish date';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();

        Blog::where('status', 'draft')
            ->where('publish_date', '<=', $now)
            ->update(['status' => 'publish', 'publish_date' => null]);

        $this->info('Blog post statuses updated successfully.');
    }
}
