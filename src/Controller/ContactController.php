<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact_index")
     * @param Request $request
     * @param MailerInterface $mailer
     * @return Response
     * @throws TransportExceptionInterface
     */
    public function index(Request $request, MailerInterface $mailer)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $email = (new Email())
                ->from('karli.damien@gmail.com')
                ->to('karli.damien@gmail.com')
                ->subject('Une nouvelle opportunité s\'offre à vous !')
                ->html($this->renderView('contact/notifications/email.html.twig', [
                    'contact' => $contact,
                ]), 'utf-8');

            $mailer->send($email);

            $this->addFlash('success', 'Votre email à bien été envoyé.');

            return $this->redirectToRoute('projects_index');

        }


        return $this->render('contact/contact.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form->createView()

        ]);
    }
}
