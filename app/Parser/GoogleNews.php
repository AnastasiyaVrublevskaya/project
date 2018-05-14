<?php

namespace App\Parser;

use Symfony\Component\DomCrawler\Crawler;
//use App\ProductUser;
use App\Googlenew;
use Auth;

class GoogleNews implements ParseContract
{
    use ParseTrait;
    public $crawler;

    public function __construct()
    {
        set_time_limit(0);
        header('Content-Type: text/html; charset=utf-8');
    }

    public function getParse()
    {
        $ff = 'https://news.google.ru/news/section?cf=all&ned=pl_pl&topic=n&siidp=edef79f1b7d39e4137cc8652f0e22d3c4f43&ict=ln';
        $file = file_get_contents($ff);
        $this->crawler = new Crawler($file);
        //$tt = $this->html($this->crawler, '.images_table');
        $this->crawler->filter('.section-stream-content .blended-wrapper')->each(function (Crawler $node, $i) {
            $name = $this->text($node, ".titletext");
            $body = $this->text($node, ".esc-lead-snippet-wrapper");
            $picture = $this->attr($node, ".esc-thumbnail-image", "src");
            $url = $this->attr($node, ".esc-lead-article-title a", "href");
            $news = new Googlenew;
            $news->name = $name;
            $news->body = $body;
            $news->lang = 'pl';
            $news->cat = 'Polsca';
            if ($picture != '') {
                $news->picture = $picture;
            }
            $news->url = $url;
            $news->save();
            sleep(1);
        });
    }
}