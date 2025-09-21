<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Oignon;
class OignonF extends Fixture
{
    private const OIGNON_REFERENCE = 'oignon';

    public function load(ObjectManager $manager): void
    {
        $nomsOignons = [
            'oignon rouge',
            'oignon ring',
            'oignon frit',
            'oignon nouveau',
        ];

        foreach ($nomsOignons as $key => $nomOignons) {
            $oignon = new Oignon();
            $oignon->setName($nomOignons);
            $manager->persist($oignon);
            $this->addReference(self::OIGNON_REFERENCE . '_' . $key, $oignon);
        }

        $manager->flush();
    }
}
