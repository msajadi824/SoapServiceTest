<?php

namespace Soap\TestBundle\Services;


use Symfony\Component\HttpKernel\KernelInterface;

class Globals {

    private $kernel;

    public function __construct(KernelInterface $_kernel)
    {
        $this->kernel = $_kernel;
    }

    /**
     * @param string $message
     */
    public function log($message)
    {
        $file= fopen($this->kernel->getLogDir()."/service.log","a");
        fwrite($file,"[".date_format(new \DateTime(),"Y-m-d H:i:s")."] ".$message."\r\n");
    }

    /**
     * @param $objectFrom
     * @param $objectTo
     */
    public function CopyObject($objectFrom,$objectTo)
    {
        foreach (get_object_vars($objectFrom) as $key => $value)
            $objectTo->$key = $value;
    }
} 