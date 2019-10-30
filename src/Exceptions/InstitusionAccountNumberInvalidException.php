<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 4:57 PM
 */

namespace DedeGunawan\VaBtnUnsil2\Exceptions;


class InstitusionAccountNumberInvalidException extends BaseException
{
    protected $code="005";
    protected $description="Institusion Account number invalid";
}