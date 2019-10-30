<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 10:52 AM
 */

namespace DedeGunawan\VaBtnUnsil2;



use DedeGunawan\VaBtnUnsil2\Exceptions\BaseException;
use DedeGunawan\VaBtnUnsil2\Requests\CreateRequest;
use DedeGunawan\VaBtnUnsil2\Requests\DeleteRequest;
use DedeGunawan\VaBtnUnsil2\Requests\InquiryRequest;
use DedeGunawan\VaBtnUnsil2\Requests\UpdateRequest;
use DedeGunawan\VaBtnUnsil2\Responses\BaseResponse;
use DedeGunawan\VaBtnUnsil2\Services\Api;

class VaBtnUnsil2
{
    /**
     * @var $request BaseRequest
     */
    protected $request;
    /**
     * @var $response BaseResponse
     */
    protected $response;

    /**
     * @var $api Api
     */
    protected $api;

    public static function getInstance()
    {
        static $instance;
        if ($instance==null) {
            $instance = new self();
            $instance->setApi(new Api());
        }

        return $instance;
    }

    /**
     * @param InquiryRequest $request
     * @throws Exceptions\IncompleteRequestDataException
     * @throws BaseException
     * @throws \Exception
     * @return BaseResponse
     */
    public function inquiry(InquiryRequest $request)
    {
        $this->setRequest($request);
        $request->validate();
        $this->getApi()->setEndpointUrl("inqVA");
        $response = $this->getApi()->send($request);
        $this->setResponse($response);
        return $this->getResponse();
    }

    public function create(CreateRequest $request)
    {
        $this->setRequest($request);
        $request->validate();
        $this->getApi()->setEndpointUrl("createVA");
        $response = $this->getApi()->send($request);
        $this->setResponse($response);
        return $this->getResponse();
    }

    public function update(UpdateRequest $request)
    {
        $this->setRequest($request);
        $request->validate();
        $this->getApi()->setEndpointUrl("updVA");
        $response = $this->getApi()->send($request);
        $this->setResponse($response);
        return $this->getResponse();
    }

    public function delete(DeleteRequest $request)
    {
        $this->setRequest($request);
        $request->validate();
        $this->getApi()->setEndpointUrl("deleteVA");
        $response = $this->getApi()->send($request);
        $this->setResponse($response);
        return $this->getResponse();
    }

    public function callback()
    {
        throw new BaseException();
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

    /**
     * @return Api
     */
    public function getApi()
    {
        return $this->api;
    }

    /**
     * @param Api $api
     */
    public function setApi($api)
    {
        $this->api = $api;
    }

}