<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Link;

final class LinkStatsController extends Controller
{
    public function get(string $code)
    {
        /** Если ссылка не будет найдена - вернется ошибка 404 */
        $link = Link::where('code', $code)->firstOrFail();


        return response()->json([
            'url' => $link->url,
            'code' => $link->code,
            'clicks' => $link->clicks,
            'created_at' => $link->created_at->format('Y-m-d\TH:i:s\Z'),
        ]);
    }
}
