<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

final class LinkController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate(['url' => 'required|url:http,https']);

        $url = $validated['url'];


        /** Eсли URL уже сокращали, и он есть в базе - возвращаем старый код */
        $link = Link::where('url', $url)->first();


        /** Если такую ссылку еще не обрабатывали - генерируем новый код */
        if (null === $link) {
            do {
                $code = Str::random(6);
            } while (Link::where('code', $code)->exists());

            $link = Link::create(['url' => $url, 'code' => $code]);
        }

        return response()->json(['code' => $link->code, 'short_url' => url('/' . $link->code)], 200);
    }
}
