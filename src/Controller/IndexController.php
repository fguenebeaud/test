<?php

namespace Potogan\TestBundle\Controller;

use Potogan\TestBundle\Entity\UserConference;
use Potogan\TestBundle\Type\UserConferenceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Index controller
 */
class IndexController extends Controller
{
    /**
     * Index page
     *
     * @Route("/")
     * @Method({"GET", "POST"})
     * @Template
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $userConference = new UserConference();
        $form = $this->createCreateForm($userConference);
        $form->handleRequest($request);

        // Validate form
        if ($form->isSubmitted() && $form->isValid()) {
            // manage file if exist
            if ($userConference->getAvatar()) {
                $file = $userConference->getAvatar();
                $fileName = md5(uniqid()).'.'.$file->guessExtension();
                $file->move(
                    $this->getParameter('avatar_directory'),
                    $fileName
                );
                $userConference->setAvatar($fileName);
            }

            $em->persist($userConference);
            $em->flush($userConference);

            return $this->redirect($this->generateUrl('potogan_test_index_list'));
        }

        return $this->render('@PotoganTest/Index/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * List of all users registered
     *
     * @Route("/list")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction()
    {
        $listUsers = $this->getDoctrine()->getRepository('PotoganTestBundle:UserConference')->findAll();

        return $this->render('@PotoganTest/Index/list.html.twig', array(
            'users' => $listUsers,
        ));
    }

    /**
     * Creates a form to create a User
     *
     * @param UserConference $entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(UserConference $entity)
    {
        $form = $this->createForm(new UserConferenceType($this->getDoctrine()->getManager()), $entity, [
            'action' => $this->generateUrl('potogan_test_index_index'),
            'method' => 'POST',
        ]);

        $form->add(
            'submit',
            'submit',
            array('label' => 'Valider', 'attr' => ['class' => 'btn btn-sm btn-success'])
        );

        return $form;
    }
}
