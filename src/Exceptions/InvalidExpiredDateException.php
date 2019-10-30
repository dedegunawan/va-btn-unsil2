<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 5:01 PM
 */

namespace DedeGunawan\VaBtnUnsil2\Exceptions;


class InvalidExpiredDateException extends BaseException
{
    protected $code="009";
    protected $description="Invalid Expired Date";
}