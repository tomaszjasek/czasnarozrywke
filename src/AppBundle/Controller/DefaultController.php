<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $navigationService = $this->get('app.service.navigation');
        $startPage = $navigationService->getNavigationByRoute('startPage');
        return $this->render('AppBundle::startPage.html.twig', array(
            'content' => $startPage->getContent()
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function contactAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message = \Swift_Message::newInstance()
                ->setSubject($form->get('subject')->getData())
                ->setFrom($form->get('email')->getData())
                ->setTo($this->container->getParameter('admin_email'))
                ->setBody(
                    $this->renderView(
                        'AppBundle:Mail:contact.html.twig',
                        array(
                            'ip' => $request->getClientIp(),
                            'name' => $form->get('name')->getData(),
                            'message' => $form->get('message')->getData()
                        )
                    )
                );

            $this->get('mailer')->send($message);

            $this->addFlash('success', 'success.contact');

            return $this->redirectToRoute('contact');
        }

        return $this->render('AppBundle::contact.html.twig', array(
            'form' => $form->createView()
        ));
    }

}
