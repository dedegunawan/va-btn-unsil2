<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 4:32 PM
 */

namespace DedeGunawan\VaBtnUnsil2\Exceptions;


use DedeGunawan\VaBtnUnsil2\Requests\BaseRequest;
use DedeGunawan\VaBtnUnsil2\Responses\BaseResponse;
use Throwable;

class BaseException extends \Exception
{
    /**
     * @var BaseRequest
     */
    protected $request;
    /**
     * @var BaseResponse
     */
    protected $response;
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

    /**
     * @return BaseRequest
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param BaseRequest $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * @return BaseResponse
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param BaseResponse $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }


}