<?php

namespace App\Repository;

use App\Entity\Burger;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Burger>
 */
class BurgerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Burger::class);
    }

    public function getAllBurgers(){
        return $this->findAll();
    }

    public function getBurgerById(int $id){
        return $this->find($id);
    }

    public function findTopXBurgers(int $limit): array
    {
        $qb = $this->createQueryBuilder('b')
            ->orderBy('b.price', 'DESC')
            ->setMaxResults($limit);

        return $qb->getQuery()->getResult();
    }

    /*public function findBurgersWithIngredient(string $ingredient): array
    {
        $qb = $this->createQueryBuilder('b')

        return $qb->getQuery()->getResult();
    }*/
}
