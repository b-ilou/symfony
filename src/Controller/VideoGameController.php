<?php

namespace App\Controller;

use App\Entity\VideoGame;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VideoGameController extends AbstractController
{
    #[Route('/video/game', name: 'video_game_index')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        // Récupérer tous les jeux vidéo
        $videoGames = $entityManager->getRepository(VideoGame::class)->findAll();

        // Retourner une réponse avec la liste des jeux vidéo
        return $this->render('video_game/index.html.twig', [
            'videoGames' => $videoGames,
        ]);
    }
}