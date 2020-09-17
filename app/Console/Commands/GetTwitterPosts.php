<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Post;
use Twitter;


class GetTwitterPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:GetTwitterPosts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $tweets = Twitter::getUserTimeline([

            'screen_name' => 'imasml_theater',
            'count' => 200 ,
            'format' => 'json',
            'exclude_replies' => true ,
            'since_id' => '1295374830234214401',

        ]);
        
        $tweets = json_decode($tweets);

        foreach($tweets as $tweet){

            echo $tweet->id_str;
            echo $tweet->text;
            echo 'papara';
            echo $tweet->entities->urls[0]->url;

            $post = new Post;
            $post->id = $tweet->id_str;
            $post->text = $tweet->text;

            $entities = $tweet->entities;
            $media = $entities->media;

            $post->url = $entities->urls[0]->url;
            $post->date = date("Y-m-d");
            $post->media = $media->media_url_https;
            $post->media_type = $media->type;
            $post->save();

            return;
        };
        return;



    }
}
