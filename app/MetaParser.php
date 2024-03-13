<?php

namespace App;

use Symfony\Component\DomCrawler\Crawler;

class MetaParser
{
    /**
     * @var Crawler
     */
    protected $crawler;

    /**
     * @param string $html
     */
    public function __construct(string $html, ?string $url = null)
    {
        $this->crawler = new Crawler($html);
    }

    /**
     * @return string|null
     */
    public function title(): ?string
    {
        try {
            $title = collect([
                "//meta[@property='og:title']",
                "//meta[@property='twitter:title']",
                "//meta[@name='title']",
            ])->map(function (string $rule) {
                return $this->crawler->filterXpath($rule)->eq(0);
            })->filter(function (Crawler $crawler) {
                return $crawler->count();
            })->map(function (Crawler $crawler) {
                return $crawler->attr('content');
            })
                ->first();

            if (! empty($title)) {
                return $title;
            }

            return $this->crawler->filter('h1')->first()->text();
        } catch (\Exception $exception) {
            return null;
        }
    }

    /**
     * @return string|null
     */
    public function description(): ?string
    {
        try {
            $description = collect([
                "//meta[@property='og:description']",
                "//meta[@property='twitter:description']",
                "//meta[@name='description']",
            ])->map(function (string $rule) {
                return $this->crawler->filterXpath($rule)->first();
            })->filter(function (Crawler $crawler) {
                return $crawler->count();
            })->map(function (Crawler $crawler) {
                return $crawler->attr('content');
            })
                ->first();

            if (! empty($description)) {
                return $description;
            }

            return $this->crawler->filter('p')->first()->text();
        } catch (\Exception $exception) {
            return null;
        }
    }

    /**
     * @return string|null
     */
    public function image(): ?string
    {
        try {
            $image = collect([
                "//meta[@property='og:image']",
                "//meta[@property='twitter:image']",
                "//meta[@name='image']",
            ])->map(function (string $rule) {
                return $this->crawler->filterXpath($rule)->first();
            })->filter(function (Crawler $crawler) {
                return $crawler->count();
            })->map(function (Crawler $crawler) {
                return $crawler->attr('content');
            })
                ->first();

            if (! empty($image) && filter_var($image, FILTER_VALIDATE_URL) !== false) {
                return $image;
            }

            return null;
            // return $this->crawler->filter('body img')->first()->attr('src');
        } catch (\Exception $exception) {
            return null;
        }
    }

    /**
     * @return string|null
     */
    public function favicon(): ?string
    {
        try {
            $favicon = collect([
                "//link[@rel='apple-touch-icon'][@type='image/png'][@sizes='256x256']",
                "//link[@rel='apple-touch-icon',type='image/png',sizes='180x180']",
                "//link[@rel='apple-touch-icon',type='image/png',sizes='152x152']",
                "//link[@rel='apple-touch-icon',type='image/png',sizes='120x120']",
                "//link[@rel='apple-touch-icon',type='image/png',sizes='76x76']",
                "//link[@rel='apple-touch-icon']",
                "//link[@rel='icon']",
                "//link[@rel='mask-icon']",
            ])->map(function (string $rule) {
                return $this->crawler->filterXpath($rule)->first();
            })->filter(function (Crawler $crawler) {
                return $crawler->count();
            })->map(function (Crawler $crawler) {
                return $crawler->attr('href');
            })
                ->first();

            if (! empty($favicon) && filter_var($favicon, FILTER_VALIDATE_URL) !== false) {
                return $favicon;
            }

            return null;
        } catch (\Exception $exception) {
            return null;
        }
    }
}
