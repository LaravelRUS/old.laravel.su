<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Intervention\Image\AbstractFont;
use Intervention\Image\Facades\Image;
use Laminas\Stdlib\StringWrapper\MbString;

class CoverController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function image(Request $request)
    {
        $text = $request->input('text', config('site.name'));

        $key = "cover-" . sha1($text) . Str::random(100);

        $data = Cache::remember($key, now()->addHours(4), function () use ($text) {
            $width = 1920;
            $height = 1080;

            $start_x = 230;
            $start_y = $height / 2 + 30;
            $max_len = 24;

            $mbWrap = new MbString();
            $textWrap = $mbWrap->wordWrap($text, $max_len);

            $lines = Str::of($textWrap)->explode("\n");

            $font_size = min(110 - $lines->count() * 5, 110);
            $font_height = min(75 - $lines->count() * 5, 75);

            $y = round($start_y - ((count($lines) - 1) * $font_height));

            $image = Image::make(public_path('/img/share/socials.png'), 0, 0);

            $image->fit($width, $height, fn($constraint) => $constraint->aspectRatio());

            $lines->each(function ($line) use ($image, $start_x, $font_size, $font_height, &$y, $lines) {

                $image->text($line, $start_x, round($y), fn(AbstractFont $font) => $font->file(public_path('fonts/cover.ttf'))
                    ->size($font_size)
                    ->color('#222222')
                    ->align('left')
                    ->valign('center'));

                $y += $font_height * 2;
            });

            return (string) $image->encode('data-url');
        });

        return Image::make($data)->encode('jpg', 75)->response();
    }
}
