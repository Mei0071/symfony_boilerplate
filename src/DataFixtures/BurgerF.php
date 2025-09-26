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

        $descriptionsBurgers=[
            'le burger savoyard',
            'le burger original',
            'le burger normal'
        ];

        foreach ($nomsBurgers as $key => $nomBurgers) {
            $burger = new Burger();
            $burger->setName($nomBurgers);
            $burger->setPrice("3");
            $burger->setDescription($descriptionsBurgers[$key]);
            $manager->persist($burger);
            $this->addReference(self::BURGER_REFERENCE . '_' . $key, $burger);
        }

        $manager->flush();
    }
}
