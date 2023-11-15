<?php

namespace App\DataFixtures;


use App\Entity\Appartement;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
;

class AppartementFixtures extends Fixture implements DependentFixtureInterface
{
    private $positionCounter = 0;
    private $batimentCounter = 0;
    private $etageCounter = 0;
    private $proprietaireCounter = 0;

    public function load(ObjectManager $manager): void
    {
        $tableau = array();

        // Remplir le tableau avec des valeurs de 0 à 320
        for ($i = 0; $i <= 320; $i++) {
        $tableau[] = $i;

    }
    
    foreach ($tableau as $appartementId) {
        # code...
        $appartement= new Appartement();
        $appartement->getId($appartementId);
    }
    
    
    
    // for ($i = 1; $i <= 30; $i++) {
        //     $appartement = new Appartement();
        
        //     // Utilisez les compteurs pour générer des identifiants uniques
        //     $appartement->setPosition($this->getReference('position_'.$this->positionCounter++));
        //     $appartement->setBatiment($this->getReference('batiment_'.$this->batimentCounter++));
        //     $appartement->setEtage($this->getReference('etage_'.$this->etageCounter++));
        //     $appartement->setProprietaire($this->getReference('proprietaire_'.$this->proprietaireCounter++));
        
        //     $appartement->setLotNumber('S-KY' . rand(100000, 999999));
        //     $appartement->setSlug('appartement-a' . $i);
        
        $manager->persist($appartement);
        // }
    
        $manager->flush();
        dd($appartement);
    }

    public function getDependencies()
    {
        return [
            BadgeFixtures::class,
            BatimentFixtures::class,
            CaveFixtures::class,
            EtageFixtures::class,
            LocataireFixtures::class,
            PositionFixtures::class,
            ProprietaireFixtures::class,
        ];
    }
}