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
