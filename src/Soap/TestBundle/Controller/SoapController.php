<?php

namespace Soap\TestBundle\Controller;

use Soap\TestBundle\SoapServer\FindNameByIdRequest;
use Soap\TestBundle\SoapServer\FindNameByIdResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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

    public function getAction($id)
    {
        $client = new \SoapClient("http://localhost/SoapServiceTest/web/app_dev.php/soap?wsdl");

        $result = $client->__call ('FindNameById', array(new FindNameByIdRequest($id)));
        $response = new FindNameByIdResponse();
        $this->get("soap_test_bundle.globals")->CopyObject($result,$response);
        return new Response(str_replace(array("\n"," "),array("<br/>","&nbsp;"),print_r($response,true)));
    }
}