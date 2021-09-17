<?php
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
    function posted_by($user_id): string
    {
        if (request()->query->has('posted_by')) {
            $pst = request()->query('posted_by');
            $pst = explode(',', $pst);
            return in_array($user_id, $pst);
        }
        return false;
    }
}
