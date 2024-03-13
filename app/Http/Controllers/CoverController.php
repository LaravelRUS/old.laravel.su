<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Intervention\Image\Typography\FontFactory;

class CoverController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function image(Request $request)
    {
        $text = Str::of($request->input('text', config('site.name')))
            ->replaceMatches('/[^\p{L}\p{N}\p{Z}\p{P}]/u', '') // remove all non-letters, non-numbers, non-punctuation
            ->trim()
            ->squish()
            ->limit(60);

        $width = 1920;
        $height = 1080;

        $start_x = 230;
        $start_y = $height / 2 + 40;

        $manager = new ImageManager(Driver::class);

        $image = $manager->read(public_path('/img/share/socials.png'));

        $image
            ->text($text, $start_x, $start_y, fn (FontFactory $font) => $font->filename(public_path('fonts/cover.ttf'))
                ->size(90)
                ->color('#222222')
                ->align('left')
                ->wrap(1100)
                ->lineHeight(1.6)
                ->valign('center'));

        $image->scaleDown($width, $height);

        return response($image->toJpeg(75))
            ->header('Content-Type', 'image/jpeg');
    }
}
