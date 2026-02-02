<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\ServiceRepository;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class HomeController extends AbstractController
{

     #[Route('/home', name: 'app_home')]
    public function index(CategorieRepository $categorieRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'categories' => $categorieRepository->findAll(),
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
