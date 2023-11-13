<?php

namespace App\DataFixtures;

use App\Entity\Batiment;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
;

class BatimentFixtures extends Fixture
{

    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }


    public function load(ObjectManager $manager): void
    {
        
        $batimentsData = [
            '1-A', '37', '39', '50', '52',
            '54', '54', '56', '58', '60', '62'
        ];

        foreach ($batimentsData as $batimentName) {
            $batiment = new Batiment();
            $batiment->setName($batimentName)
                     ->setSlug($this->slugger->slug($batiment->getName())->lower());
            $manager->persist($batiment);
        }

        $manager->flush();
    }
}