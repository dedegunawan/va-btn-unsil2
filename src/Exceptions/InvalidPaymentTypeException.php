<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 4:55 PM
 */

namespace DedeGunawan\VaBtnUnsil2\Exceptions;


class InvalidPaymentTypeException extends BaseException
{
    protected $code="003";
    protected $description="Invalid Payment Type";
}