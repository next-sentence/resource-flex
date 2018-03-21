<?php

namespace App\Repository;

use Sylius\Bundle\UserBundle\Doctrine\ORM\UserRepository;
use Sylius\Component\User\Model\UserInterface;

class AdminUserRepository extends UserRepository
{
    /**
     * {@inheritdoc}
     */
    public function findOneByEmail(string $email): ?UserInterface
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.emailCanonical = :email')
            ->setParameter('email', $email)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }
}
