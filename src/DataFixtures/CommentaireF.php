<?php

namespace App\DataFixtures;

use App\Entity\Commentaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CommentaireF extends Fixture
{

    private const COMMENTAIRE_REFERENCE = 'commentaire';

    public function load(ObjectManager $manager): void
    {
        $nomCommentaires = [
            "trop bien",
            "bof",
            "ok",
            "super"
        ];

        foreach ($nomCommentaires as $key => $nomCommentaires) {
            $commentaire = new Commentaire();
            $commentaire->setName($nomCommentaires);
            $manager->persist($commentaire);
            $this->addReference(self::COMMENTAIRE_REFERENCE . '_' . $key, $commentaire);
        }

        $manager->flush();
    }
}
