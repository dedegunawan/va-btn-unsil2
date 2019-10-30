<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 6:35 PM
 */

namespace DedeGunawan\VaBtnUnsil2\Services;


class RefGenerator
{
    public static function generate($length=12)
    {
        $result = '';

        for($i = 0; $i < $length; $i++) {
            $result .= mt_rand(0, 9);
        }

        return $result;
    }
}