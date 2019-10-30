<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 4:47 PM
 */

namespace DedeGunawan\VaBtnUnsil2\Exceptions;


class AccountVaNotFoundException extends BaseException
{
    protected $code="001";
    protected $description="Account VA Not Found";
}