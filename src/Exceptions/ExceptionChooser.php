<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 4:38 PM
 */

namespace DedeGunawan\VaBtnUnsil2\Exceptions;


class ExceptionChooser
{
    protected static $exception_class_list = [
        '001' => AccountVaNotFoundException::class,
        '002' => InvalidInstitusionCodeException::class,
        '003' => InvalidPaymentTypeException::class,
        '004' => InstitusionParameterAccountNotFoundException::class,
        '005' => InstitusionAccountNumberInvalidException::class,
        '006' => NumberVaAlreadyExistException::class,
        '007' => InvalidVaNumberException::class,
        '008' => ExpiredDateException::class,
        '009' => InvalidExpiredDateException::class,
        '098' => SwitchModeException::class,
        '099' => NotAuthorizeException::class,
        '999' => BaseException::class,
    ];

    public static function choose($code="999")
    {
        if (!array_key_exists($code, self::$exception_class_list)) $code="999";
        return self::$exception_class_list[$code];
    }

}