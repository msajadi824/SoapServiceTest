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
     * @var string
     */
    public $length;

    /**
     * @param int $_id
     * @param null $_length
     */
    public function __construct($_id = NULL, $_length = NULL)
    {
        $this->id=$_id;
        $this->length=$_length;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return __CLASS__;
    }
}
