<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Burger;
class BurgerF extends Fixture
{

    private const BURGER_REFERENCE = 'burger';

    public function load(ObjectManager $manager): void
    {
        $nomsBurgers = [
            'Savoyard',
            'Original',
            'normal'
        ];

        foreach ($nomsBurgers as $key => $nomBurgers) {
            $burger = new Burger();
            $burger->setName($nomBurgers);
            $burger->setPrice("3");
            $manager->persist($burger);
            $this->addReference(self::BURGER_REFERENCE . '_' . $key, $burger);
        }

        $manager->flush();
    }
}
