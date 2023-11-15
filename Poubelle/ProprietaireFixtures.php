<?php

namespace App\DataFixtures;

use Faker\Factory;
use DateTimeImmutable;
use App\Entity\Proprietaire;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
;

class ProprietaireFixtures extends Fixture
{
    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }
    
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $counter = 0;
        
        for ($i=0; $i < 301; $i++) { 
            # code...
             $proprio = new Proprietaire();
             $proprio->setFirstname($faker->firstname())
                     ->setLastname($faker->lastname())
                     ->setEmail($faker->email())
                     ->setPhone($faker->phoneNumber())
                     ->setSlug($this->slugger->slug($proprio->getLastname())->lower())
                     ->setCreatedAt(new DateTimeImmutable)
                     ->setIsOccupant($faker->boolean());



             // Définir IsOccupant aléatoirement, avec une probabilité plus élevée pour true
             $proprio->setIsOccupant(random_int(0, 6) > 0); // 6:1 ratio en faveur de true
             $manager->persist($proprio);

             
        }

        $manager->flush();
    }

    public function createProprietaire(string $name, ObjectManager $manager)
    {
        $proprio = new Proprietaire();
        $proprio->setName($name);
        $proprio->setSlug($this->slugger->slug($proprio->getName())->lower());
        $manager->persist($proprio);

        $this->addReference('cat-'.$this->counter, $proprio);
        $this->counter++;

        return $proprio;
    }
}