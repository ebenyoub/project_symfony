<?php

namespace App\Repository;

use App\Entity\Recepe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Recepe>
 *
 * @method Recepe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recepe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recepe[]    findAll()
 * @method Recepe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecepeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recepe::class);
    }

    public function add(Recepe $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Recepe $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
