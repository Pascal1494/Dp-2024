<?php

namespace App\Controller;

use App\Repository\BadgeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/recherche', name: 'search_')]
class SearchController extends AbstractController
{
    #[Route('/badge', name: 'searchBadge')]
    public function index(BadgeRepository $badgeRepository): Response
    {
        $badge = $badgeRepository->findAll();

        // dd($badge);
        
        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }
    
    #[Route('/badge/{slug}', name: 'searchBadge')]
    public function OneBadge(string $slug, BadgeRepository $badgeRepository): Response
    {
        $badge = $badgeRepository->findOneBy(['slug'=> $slug]);

        // dd($badge);
        
        return $this->render('search/oneBadge.html.twig', [
               'badge'  => $badge,
        ]);
    }
}