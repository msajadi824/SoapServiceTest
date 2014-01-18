<?php

namespace Soap\TestBundle\Controller;

use Soap\TestBundle\Services\SoapClientTimeout;
use Soap\TestBundle\SoapServer\FindNameByIdRequest;
use Soap\TestBundle\SoapServer\FindNameByIdResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SoapController extends Controller {
    public function indexAction()
    {
        try
        {
            $server = new \SoapServer('Soap.wsdl');
            $server->setObject($this->get('soap_test_bundle.soapserver'));

            $responseXml = new Response();
            $responseXml->headers->set('Content-Type', 'text/xml; charset=utf-8');

            ob_start();
            $server->handle();
            $responseXml->setContent(ob_get_contents ());
            if(strlen($responseXml->getContent())>0) ob_clean ();

            return $responseXml->getContent()!=null?$responseXml:new Response('Please use <b>/Soap?wsdl</b> for address to wsdl.');
        }
        catch(\Exception $ex)
        {
            $this->get("soap_test_bundle.globals")->log("Error on running soap:\n".$ex->getMessage());
            die($ex->getMessage());
        }
    }

    public function getAction(Request $request,$id,$length,$timeOut)
    {
        try
        {
            $id = $request->get("id",$id);
            $length = $request->get("length",$length);
            $timeOut = intval($request->get("timeOut",$timeOut));
            $start = microtime(true);

    //        $client = new \SoapClient("http://localhost/SoapServiceTest/web/app_dev.php/soap?wsdl");
            $client = new SoapClientTimeout("http://localhost/SoapServiceTest/web/app_dev.php/soap?wsdl");
            $client->__setTimeout($timeOut);

            $result = $client->__call ('FindNameById', array(new FindNameByIdRequest($id,$length)));
            $end = microtime(true);
            $response = new FindNameByIdResponse();
            $this->get("soap_test_bundle.globals")->CopyObject($result,$response);
            $mylength = round($end - $start,3);
            return new Response("server side time length: ".$mylength." sec<hr/> result: ".$response->name);
        }
        catch(\Exception $e)
        {
            return new Response("Error: ".$e->getMessage());
        }
    }
}