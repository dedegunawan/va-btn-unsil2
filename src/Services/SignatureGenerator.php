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
    public static function generate($id, $secret, $key, $body)
    {
        $payload = sprintf("%s:%s:%s", $id, $body, $key);
        $signature = hash_hmac('sha256', $payload, $secret);
        return $signature;
    }
}