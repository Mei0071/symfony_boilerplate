<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Pain;
class PainF extends Fixture
{
    private const PAIN_REFERENCE = 'pain';

    public function load(ObjectManager $manager): void
    {
        $nomsPains = [
            'Sésame',
            'Complet',
            'Noix',
            'Céréales'
        ];

        foreach ($nomsPains as $key => $nomPains) {
            $pain = new Pain();
            $pain->setName($nomPains);
            $manager->persist($pain);
            $this->addReference(self::PAIN_REFERENCE . '_' . $key, $pain);
        }

        $manager->flush();
    }
}
