<?php

if (!function_exists('currencyIDRToNumeric')) {
    function currencyIDRToNumeric($value)
    {
        return preg_replace('/\D/', '', $value);
    }
}
