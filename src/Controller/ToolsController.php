<?php

namespace App\Controller;

use App\Entity\Tools;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ToolsController extends AbstractController
{
    private $em;

    public function __construct( EntityManagerInterface $em){
        $this->em = $em;
    }
    /**
     * @Rest\Get(
     *     path = "/tools/{id}",
     *     name = "tools_show",
     *     requirements={"id"="\d+"}
     * )
     * @Rest\View()
     */
    public function showMethod(Tools $tools)
    {
        return $tools;
    }
    /**
     * @Rest\Post(
     *     path = "/add-tools",
     *     name = "tools_add",
     * )
     * @Rest\View()
     * @ParamConverter("tools", converter="fos_rest.request_body")
     */
    public function addMethod(Tools $tools)
    {
        $this->em->persist($tools);
        $this->em->flush();
        return $tools;
    }
}

