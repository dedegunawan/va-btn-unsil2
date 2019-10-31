<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 4:32 PM
 */

namespace DedeGunawan\VaBtnUnsil2\Exceptions;


use Throwable;

class BaseException extends \Exception
{
    protected $code="999";
    protected $description="General Error (Timeout)";
    public function __construct($message = "", Throwable $previous = null)
    {
        if (!trim($message)) $message=$this->description;
        parent::__construct($message, $this->code, $previous);
    }

    public function niceCode()
    {
        return str_pad($this->code, 3, '0', STR_PAD_LEFT);
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }
}