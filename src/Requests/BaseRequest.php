<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 10:53 AM
 */

namespace DedeGunawan\VaBtnUnsil2\Requests;


use DedeGunawan\UtilityClass\BaseEntity;
use DedeGunawan\VaBtnUnsil2\Exceptions\IncompleteRequestDataException;
use DedeGunawan\VaBtnUnsil2\Traits\VirtualAccountTrait;

class BaseRequest extends BaseEntity
{
    protected $required_columns=[];
    use VirtualAccountTrait;

    public function validate() {
        $invalid_columns=[];
        foreach ($this->getRequiredColumns() as $column) {
            if (!$this[$column] || $this[$column]===null) $invalid_columns[] = $column;
        }
        if (!empty($invalid_columns)) throw new IncompleteRequestDataException($invalid_columns);
    }

    public function toArray()
    {
        $datas = parent::toArray();
        unset($datas['required_columns']);
        $datas = array_filter($datas, function ($data) {
            return $data!==null;
        });
        return $datas;
    }


    /**
     * @return array
     */
    public function getRequiredColumns()
    {
        return $this->required_columns;
    }

    /**
     * @param array $required_columns
     */
    public function setRequiredColumns($required_columns)
    {
        $this->required_columns = $required_columns;
    }


}