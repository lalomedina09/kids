<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Article;
use App\Models\Podcast;
use App\Models\Video;

class Categorizables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'qd:categorizables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create categorizables';

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
        Article::chunk(100, function ($articles) {
            foreach ($articles as $article) {
                $article->categories()->attach([$article->category_id]);
            }
        });

        Podcast::chunk(100, function ($podcasts) {
            foreach ($podcasts as $podcast) {
                $podcast->categories()->attach([$podcast->category_id]);
            }
        });

        Video::chunk(100, function ($videos) {
            foreach ($videos as $video) {
                $video->categories()->attach([$video->category_id]);
            }
        });
    }
}
