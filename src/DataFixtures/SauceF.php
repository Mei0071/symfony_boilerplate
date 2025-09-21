<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Sauce;

class SauceF extends Fixture
{

    private const SAUCE_REFERENCE = 'sauce';

    public function load(ObjectManager $manager): void
    {
        $nomsSauces = [
            'Blanche',
            'Mayonnaise',
            'Ketchup',
            'Barbecue',
            'Biggy',
            'Andalouse'
        ];

        foreach ($nomsSauces as $key => $nomSauce) {
            $sauce = new Sauce();
            $sauce->setName($nomSauce);
            $manager->persist($sauce);
            $this->addReference(self::SAUCE_REFERENCE . '_' . $key, $sauce);
        }

        $manager->flush();
    }
}
