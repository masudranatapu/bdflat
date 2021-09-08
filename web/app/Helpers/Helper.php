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
