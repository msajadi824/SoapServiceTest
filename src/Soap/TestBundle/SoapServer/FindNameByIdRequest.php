<?php
namespace Soap\TestBundle\SoapServer;

/**
 * Class FindNameByIdRequest
 * @package Soap\TestBundle\SoapServer
 */
class FindNameByIdRequest
{
    /**
     * @var int
     */
    public $id;

    /**
     * @param int $_id
     */
    public function __construct($_id = NULL)
    {
        $this->id=$_id;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return __CLASS__;
    }
}
