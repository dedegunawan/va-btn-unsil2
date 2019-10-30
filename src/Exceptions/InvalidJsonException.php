<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 4:27 PM
 */

namespace DedeGunawan\VaBtnUnsil2\Exceptions;


class InvalidJsonException extends BaseException
{
    protected $code="200";
    protected $description="JSON Invalid";
}