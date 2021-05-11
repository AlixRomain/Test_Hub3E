<?php

namespace App\Controller;

use App\Entity\Tools;
use App\Entity\User;
use App\Exception\ResourceValidationException;
use App\Repository\ToolsRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationList;


class ToolsController extends AbstractFOSRestController
{
    private $em;
    private $repoTools;


    public function __construct( EntityManagerInterface $em, ToolsRepository $repoTools){
        $this->em = $em;
        $this->repoTools = $repoTools;

    }
    /**
     *
     * @Rest\Get(
     *     path = "/api/tools/{id}",
     *     name = "tools_show",
     *     requirements={"id"="\d+"}
     * )
     * @Rest\View()
     * @IsGranted("ROLE_USER")
     * @Security("tools.getRelation() === user || is_granted('ROLE_ADMIN')")
     */
    public function getToolsMethod(Tools $tools)
    {
        return $tools;
    }
    /**
     * @Rest\Get(
     *     path = "/api/tools/user/{id}",
     *     name = "tools_all_user_show",
     *     requirements={"id"="\d+"}
     * )
     * @Rest\View()
     * @IsGranted("ROLE_USER")
     * @Security("userr.getId() === user.getId() || is_granted('ROLE_ADMIN')")
     */
    public function getAllToolsByUserMethod(User $userr)
    {
        return $userr;
    }
    /**
         * @Rest\Get(
         *     path = "/api/tools",
         *     name = "tools_all_show",
         * )
         * @Rest\View()
         * @IsGranted("ROLE_ADMIN")
         */
        public function getAllToolsMethod()
        {
            $allTools = $this->repoTools->findAll();
            return $allTools;
        }

    /**
     * @Rest\Post(
     *     path = "/api/add-tools",
     *     name = "tools_add",
     * )
     * @Rest\View(StatusCode = 201)
     * @ParamConverter(
     *     "tools",
     *      converter="fos_rest.request_body",
     *      options={
     *         "validator" = {"groups" = "Create"}
     *     }
     * )
     * @throws ResourceValidationException
     */
    //$violations est directement lié à validation_errors_argument: violations dans fos_Rest
    public function postToolsMethod(Tools $tools, ConstraintViolationList $violations)
    {

        if(count($violations)) {
            $message = 'The JSON sent contains invalid data : ' ;

            foreach ($violations as $violation){
                $message .= sprintf(
                    "Field %s: %s",
                    $violation->getPropertyPath(),
                    $violation->getMessage()
                );
            }
            throw new ResourceValidationException($message);
            //return $this->view($violations, Response::HTTP_BAD_REQUEST);
        }
        $this->em->persist($tools);
        $this->em->flush();
        return $this->view(
            $tools,
            Response::HTTP_CREATED,
            [
                'Location' => $this->generateUrl('tools_show', ['id' => $tools->getId()])
            ]
        );
    }
  /**
     * @Rest\Put(
     *     path = "/api/update-tools/{id}",
     *     name = "tools_update",
     *     requirements={"id"="\d+"}
     * )
     * @Rest\View(StatusCode = 201)
     * @ParamConverter(
     *     "tools",
     *      converter="fos_rest.request_body",
     *      options={
     *         "validator" = {"groups" = "Update"}
     *     }
     * )
     * @throws ResourceValidationException
     */
    public function putToolsMethod(Tools $tools, ConstraintViolationList $violations)
    {
        if(count($violations)) {
            $message = 'The JSON sent contains invalid data : ' ;
            foreach ($violations as $violation){
                $message .= sprintf(
                    "Field %s: %s",
                    $violation->getPropertyPath(),
                    $violation->getMessage()
                );
            }
            throw new ResourceValidationException($message);
        }
        $this->em->flush();
        return $this->view(
            $tools,
            Response::HTTP_CREATED,
            [
                'Location' => $this->generateUrl('tools_show', ['id' => $tools->getId()])
            ]
        );
    }

    /**
     * @Rest\Delete(
     *     path = "/api/delete-tools/{id}",
     *     name = "tools_delete",
     *     requirements={"id"="\d+"}
     * )
     * @Rest\View(StatusCode = 204)
     * @Security("tools.getRelation() === user || is_granted('ROLE_ADMIN')")
     * @IsGranted("ROLE_USER")
     */
    public function deleteToolsMethod(Tools $tools)
    {
        $this->em->remove($tools);
        $this->em->flush();
    }
}

