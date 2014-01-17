<?php
namespace Soap\TestBundle\SoapServer;

/**
 * Class FindNameByIdResponse
 * @package Soap\TestBundle\SoapServer
 */
class FindNameByIdResponse
{
    /**
     * @var string
     */
    public $name;

    /**
     * @param string $_name
     */
    public function __construct($_name = NULL)
    {
        $this->name=$_name;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return __CLASS__;
    }
}
