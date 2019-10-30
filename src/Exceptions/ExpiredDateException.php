<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 5:00 PM
 */

namespace DedeGunawan\VaBtnUnsil2\Exceptions;


class ExpiredDateException extends BaseException
{
    protected $code="008";
    protected $description="Expired Date < Date Now";
}