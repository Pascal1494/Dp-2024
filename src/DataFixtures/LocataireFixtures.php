<?php

namespace App\DataFixtures;

use Faker\Factory;
use DateTimeImmutable;
use App\Entity\Locataire;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
;

class LocataireFixtures extends Fixture
{
    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }
    
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        
        for ($i=0; $i < 301; $i++) { 
            # code...
             $locataire = new Locataire();
             $locataire->setFirstname($faker->firstname())
                     ->setLastname($faker->lastname())
                     ->setEmail($faker->email())
                     ->setPhone($faker->phoneNumber())
                     ->setSlug($this->slugger->slug($locataire->getLastname())->lower())
                     ->setCreatedAt(new DateTimeImmutable);



            
             $manager->persist($locataire);
            //  dd($locataire);
        }

        $manager->flush();
    }
}