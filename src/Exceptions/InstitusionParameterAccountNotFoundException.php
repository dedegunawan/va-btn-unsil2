<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 4:56 PM
 */

namespace DedeGunawan\VaBtnUnsil2\Exceptions;


class InstitusionParameterAccountNotFoundException extends BaseException
{
    protected $code="004";
    protected $description="Institusion Parameter Account not Found";
}