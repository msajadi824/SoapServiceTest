<?php
namespace Soap\TestBundle\SoapServer;

use Doctrine\ORM\EntityManager;
use Soap\TestBundle\Services\Globals;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;

/**
 * Class Main
 * @package Soap\TestBundle\SoapServer
 */
class Main {

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var EncoderFactory
     */
    private $encoderFactory;

    /**
     * @var Globals
     */
    private $globals;

    /**
     * @param EntityManager $em
     * @param EncoderFactory $ef
     * @param Globals $gl
     */
    public function __construct(EntityManager $em, EncoderFactory $ef, Globals $gl)
    {
        $this->em = $em;
        $this->encoderFactory = $ef;
        $this->globals = $gl;
    }

    /**
     * @param $input
     * @return FindNameByIdResponse
     */
    public function FindNameById($input)
    {
        $FindNameByIdRequest = new FindNameByIdRequest();
        $this->globals->CopyObject($input,$FindNameByIdRequest);

//        //get user Agency
//        $userAgency = $this->getUserAgency($ReserveInfoRequest->agency_info);
//        if(!$userAgency)
//            return new ReserveInfoResponse("User Not Verified");
//
//        if(!$userAgency->hasRole("ROLE_AGENCY") || !$userAgency->getAgencyEntity())
//            return new ReserveInfoResponse("User is not Agency");

        return new FindNameByIdResponse("mostafa");
    }

//    /**
//     * @param $agency
//     * @return \Hotel\reserveBundle\Entity\userEntity|null
//     */
//    private function getUserAgency($agency)
//    {
//        $user = $this->em->getRepository("HotelreserveBundle:userEntity")->findOneBy(array("username"=>$agency->username));
//        if($user == null)return null;
//        $encoder = $this->encoderFactory->getEncoder($user);
//        return $encoder->isPasswordValid($user->getPassword(),$agency->password,$user->getSalt())?$user:null;
//    }
} 