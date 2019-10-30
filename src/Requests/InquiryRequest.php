<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 2:33 PM
 */

namespace DedeGunawan\VaBtnUnsil2\Requests;



class InquiryRequest extends BaseRequest
{
    protected $required_columns=['ref', 'va'];
}