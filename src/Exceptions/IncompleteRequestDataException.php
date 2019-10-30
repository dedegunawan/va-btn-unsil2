<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 6:24 PM
 */

namespace DedeGunawan\VaBtnUnsil2\Exceptions;


use Throwable;

class IncompleteRequestDataException extends BaseException
{
    protected $code="201";
    protected $description="Incomplete Request Data";
    protected $columns=[];
    public function __construct($columns=[], $message = "", Throwable $previous = null)
    {
        $this->setColumns($columns);
        $message = $this->description." : ".implode("&", $columns);
        parent::__construct($message, $previous);
    }

    /**
     * @return array
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * @param array $columns
     */
    public function setColumns($columns)
    {
        $this->columns = $columns;
    }

}