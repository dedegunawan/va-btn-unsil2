<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 5:02 PM
 */

namespace DedeGunawan\VaBtnUnsil2\Exceptions;


class SwitchModeException extends BaseException
{
    protected $code="098";
    protected $description="Is Switch a daymode or Night Mode (Core EOD)";
}