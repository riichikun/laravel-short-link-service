<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Link;

class RedirectController extends Controller
{
    public function redirect(string $code)
    {
        /** Если ссылка не будет найдена - вернется ошибка 404 */
        $link = Link::where('code', $code)->firstOrFail();


        /** Атомарное увеличение счетчика кликов в БД, чтобы избежать состояния гонки */
        $link->increment('clicks');


        return redirect()->away($link->url, 302);
    }
}
