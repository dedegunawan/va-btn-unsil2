<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 4:59 PM
 */

namespace DedeGunawan\VaBtnUnsil2\Exceptions;


class NumberVaAlreadyExistException extends BaseException
{
    protected $code="006";
    protected $description="Number VA already Exist";
}