<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 2:46 PM
 */

namespace DedeGunawan\VaBtnUnsil2\Responses;



use DedeGunawan\UtilityClass\BaseEntity;
use DedeGunawan\VaBtnUnsil2\Traits\VirtualAccountTrait;

class BaseResponse extends BaseEntity
{
    use VirtualAccountTrait;

    protected $rsp;
    protected $rspdc;

    /**
     * @return mixed
     */
    public function getRsp()
    {
        return $this->rsp;
    }

    /**
     * @param mixed $rsp
     */
    public function setRsp($rsp)
    {
        $this->rsp = $rsp;
    }

    /**
     * @return mixed
     */
    public function getRspdc()
    {
        return $this->rspdc;
    }

    /**
     * @param mixed $rspdc
     */
    public function setRspdc($rspdc)
    {
        $this->rspdc = $rspdc;
    }



    public function validate() {
        return true;
    }
}