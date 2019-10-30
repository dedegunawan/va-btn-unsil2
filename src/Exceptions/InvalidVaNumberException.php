<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 5:00 PM
 */

namespace DedeGunawan\VaBtnUnsil2\Exceptions;


class InvalidVaNumberException extends BaseException
{
    protected $code="007";
    protected $description="Invalid VA Number";
}