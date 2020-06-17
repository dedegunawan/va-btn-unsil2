<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 3:54 PM
 */

namespace DedeGunawan\VaBtnUnsil2\Services;


class SignatureGenerator
{
    protected static $payload_format="%s:%s:%s";

    /**
     * @return string
     */
    public static function getPayloadFormat()
    {
        return self::$payload_format;
    }

    /**
     * @param string $payload_format
     */
    public static function setPayloadFormat($payload_format)
    {
        self::$payload_format = $payload_format;
    }

    public static function generate($id, $secret, $key, $body)
    {
        $payload_format = self::getPayloadFormat();
        $payload = sprintf($payload_format, $id, $body, $key);
        $signature = hash_hmac('sha256', $payload, $secret);
        return $signature;
    }
}