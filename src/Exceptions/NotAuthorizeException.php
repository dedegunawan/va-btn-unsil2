<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 5:03 PM
 */

namespace DedeGunawan\VaBtnUnsil2\Exceptions;


class NotAuthorizeException extends BaseException
{
    protected $code="099";
    protected $description="Not Authorize (Id not Autorize)";
}