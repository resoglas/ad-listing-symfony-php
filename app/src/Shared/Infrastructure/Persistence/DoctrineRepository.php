<?php

declare(strict_types=1);

namespace Listing\Shared\Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Listing\Shared\Domain\Aggregate\AggregateRoot;

abstract class DoctrineRepository
{
    public function __construct(private readonly EntityManager $entityManager)
    {
    }

    protected function persist(AggregateRoot $entity): void
    {
        $this->entityManager->persist($entity);
    }

    protected function remove(AggregateRoot $entity): void
    {
        $this->entityManager->remove($entity);
    }

    /**
     * @psalm-param class-string<T> $entityName
     *
     * @psalm-return EntityRepository<T>
     *
     * @template T of object
     */
    protected function repository(string $entityName): EntityRepository
    {
        return $this->entityManager->getRepository($entityName);
    }
}
