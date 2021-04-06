<?php

class AUTHORIZATION
{
    public static function validateTimestamp($token, $key='jwt_key', $timeout='token_timeout')
    {
        $CI =& get_instance();
        $token = self::validateToken($token, $key);
        if ($token != false && (now() - $token->timestamp < ($CI->config->item($timeout) * 60))) {
            return $token;
        }
        return false;
    }

    public static function validateToken($token, $key='jwt_key')
    {
        $CI =& get_instance();
        return JWT::decode($token, $CI->config->item($key));
    }

    public static function generateToken($data, $key='jwt_key')
    {
        $CI =& get_instance();
        return JWT::encode($data, $CI->config->item($key));
    }

}