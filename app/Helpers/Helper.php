<?php

use App\Models\WebSetting;
use Illuminate\Support\Facades\DB;

if (!function_exists('setting')) {
    function setting()
    {
        return DB::table('WEB_SETTINGS')->first();
    }
}


if (!function_exists('defaultThumb')) {
    function defaultThumb($path): string
    {
        if (file_exists(public_path($path))) {
            return asset($path);
        }
        return asset('images/default.jpg');
    }
}

if (!function_exists('transaction_type')) {
    function transaction_type($type): string
    {
        switch ($type) {
            case 1:
                $msg = 'Recharge';
                break;
            case 2:
                $msg = 'Property Payment';
                break;
            default:
                $msg = 'Listing Lead Purchase Payment';
        }
        return $msg;
    }
}


if (!function_exists('posted_by')) {
    function posted_by($user_id): bool
    {
        if (request()->query->has('posted_by')) {
            $pst = request()->query('posted_by');
            $pst = explode(',', $pst);
            return in_array($user_id, $pst);
        }
        return false;
    }
}

if (!function_exists('meta_info')) {
    function meta_info($data = null): array
    {
        $web = WebSetting::all()->first();
//        dd($web);
        return [
            'title' => ($data && isset($data['title'])) ? $data['title'] : ($web->META_TITLE ?: $web->TITLE),
            'description' => ($data && isset($data['description'])) ? $data['description'] : ($web->META_TITLE ?: $web->DESCRIPTION),
            'keywords' => ($data && isset($data['keywords'])) ? $data['keywords'] : ($web->META_KEYWARDS ?? ''),
            'og_image' => ($data && isset($data['og_image'])) ? $data['og_image'] : ($web->OG_IMAGE ?: $web->META_IMAGE),
        ];
    }
}
