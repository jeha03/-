<?php

namespace App\Http\Controllers\Http\Controllers\Auth;

class IpUtils
{
    public static function anonymize($ip)
    {
        // Анонимизация IPv4: обнуляем последний октет
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            return preg_replace('/\d+$/', '0', $ip);
        }

        // Анонимизация IPv6: обнуляем последние 80 бит
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            return preg_replace('/:[0-9a-f]{0,4}$/', ':0000', $ip);
        }

        return $ip;
    }
}
