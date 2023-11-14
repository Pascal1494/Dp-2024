<?php

namespace App\DataFixtures;

use App\Entity\Badge;
use DateTimeImmutable;
use App\Entity\Couleur;
use App\DataFixtures\CouleurFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class BadgeFixtures extends Fixture implements DependentFixtureInterface
{

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
        
        
    }

    private $usedCodes = [];

    public function load(ObjectManager $manager): void
    {
        // Récupérer toutes les couleurs depuis le référentiel
        $couleursRepository = $manager->getRepository(Couleur::class);
        $couleurs = $couleursRepository->findAll();


        // Génération des badges
        for ($i = 0; $i < 1500; $i++) {
            $badge = new Badge();
            $code = $this->generateUniqueBadgeCode();
            $badge->setReference($code)
                  ->setSlug($this->slugger->slug($code)->lower())
                  ->setCreatedAt(new DateTimeImmutable());  
            $this->usedCodes[] = $code;

            // Associer aléatoirement une couleur au badge
            $randomCouleur =$this->getRandomCouleur($couleurs); 
            $badge->setColor($randomCouleur);

            // Définir isValid aléatoirement, avec une probabilité plus élevée pour true
            $badge->setIsValid(random_int(0, 4) > 0); // 4:1 ratio en faveur de true

            $manager->persist($badge);
        }
        // dd($badge);
        // dump($couleurs);

        $manager->flush();
    }

    // private function generateCouleurs(ObjectManager $manager): array
    // {
    //     $couleurs = [];

    //     // Génération des couleurs
    //     for ($i = 0; $i < 10; $i++) {
    //         $couleur = new Couleur();
    //         $couleur->setName("Couleur " . ($i + 1));
    //         $manager->persist($couleur);
    //         $couleurs[] = $couleur;
    //     }

    //     $manager->flush();

    //     return $couleurs;
    // }

    private function getRandomCouleur(array $couleurs): ?Couleur
    {
        // Choisir aléatoirement une couleur parmi la liste
        return $couleurs[array_rand($couleurs)];
    }

    private function generateUniqueBadgeCode(): string
    {
        do {
            $code = $this->generateBadgeCode();
        } while (in_array($code, $this->usedCodes));

        return $code;
    }

    private function generateBadgeCode(): string
    {
        $code = 'S-';

        // Deux lettres majuscules mélangées
        $letters = $this->shuffleString('ABCDEFGHIJKLMNOPQRSTUVWXYZ', 2);
        $code .= $letters;

        // Si les deux lettres sont identiques, ajoutez une lettre différente
        if ($letters[0] === $letters[1]) {
            $remainingLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $remainingLetters = str_replace($letters[0], '', $remainingLetters);
            $code .= $remainingLetters[0];
        }

        // Six chiffres mélangés
        $code .= $this->shuffleString('0123456789', 6);

        return $code;
    }

    private function shuffleString(string $string, int $length): string
    {
        $shuffled = str_shuffle($string);

        return substr($shuffled, 0, $length);
    }

    public function getDependencies()
    {
        return [
        CouleurFixtures::class
        ];
    }
}