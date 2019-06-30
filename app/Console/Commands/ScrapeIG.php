<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Goutte;

class ScrapeIG extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:ig';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'IG Location Scraper';

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
        $this->scrape();
    }

    /**
     * For scraping data for the specified collection.
     *
     * @param  string $collection
     * @return boolean
     */
    public function scrape()
    {

        $locations = [];
        $has_next = true;
        $end_cursor = 0;
        echo $has_next;
        /*
        do {
            $graphql = json_decode(file_get_contents('https://www.instagram.com/matoses/?__a=1&max_id='.$end_cursor), true);
            $edges = $graphql['graphql']['user']['edge_owner_to_timeline_media']['edges'];
            $has_next = $graphql['graphql']['user']['edge_owner_to_timeline_media']['page_info']['has_next_page'];
            $end_cursor = $graphql['graphql']['user']['edge_owner_to_timeline_media']['page_info']['end_cursor'];
            $locations = $this->getLocations($edges);
            echo $has_next;
            echo $end_cursor;
        } while($has_next);
*/
        return dd($locations);
    }

    public static function getLocations($edges) {
        $locations = [];
        foreach($edges as $edge) {
            $locations[$edge['node']['location']['id']] = [
                'name' => $edge['node']['location']['name']
            ];
        }
        return $locations;
    }
}
