<?php

namespace App\Controller;



use App\Form\ContactType;
use App\Repository\CategorieRepository;
use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{

     #[Route('/home', name: 'app_home')]
    public function index(CategorieRepository $categorieRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'categories' => $categorieRepository->findAll(),
        ]);
    }

     #[Route('/plaque', name: 'app_plaque')]
    public function plaque(): Response
    {
        return $this->render('home/plaque.html.twig', [
        ]);
    }

      #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {

                $data = $form->getData();

                $username = $data['username'];
                $subject = $data['subject'];
                $email = $data['email'];
                $message = $data['message'];
               
                  $email = (new Email())
                     ->from($email)
                      ->to('you@example.com')
                     ->subject($subject)
                     ->text($message, $username);
           

                        $mailer->send($email);
       


        }


        return $this->render('contact.html.twig', [
            'form' => $form
        ]);
    }
    
 #[Route('/{id}', name: 'app_service.join_index', methods: ['GET'])]
    public function service( ServiceRepository $serviceRepository, $id): Response
    {        $service = $serviceRepository->findOneById($id);
             

        return $this->render('service/index.html.twig', [
            'services' => $service
        ]);
    }

    
   
}
