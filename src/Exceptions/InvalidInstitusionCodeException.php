<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 4:48 PM
 */

namespace DedeGunawan\VaBtnUnsil2\Exceptions;


class InvalidInstitusionCodeException extends BaseException
{
    protected $code="002";
    protected $description="Invalid Institusion Code";
}