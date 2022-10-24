<?php

declare(strict_types=1);

namespace Listing\Shared\Infrastructure\Persistence;

use Cycle\ORM\EntityManagerInterface;
use Cycle\ORM\ORMInterface;
use Cycle\ORM\Select\Repository;
use Listing\Shared\Domain\Aggregate\AggregateRoot;

abstract class CycleRepository
{
    public function __construct(private readonly ORMInterface $orm, private readonly EntityManagerInterface $entityManager)
    {
    }

    protected function persist(AggregateRoot $entity): void
    {
        $this->entityManager->persist($entity)->run();
    }

    protected function remove(AggregateRoot $entity): void
    {
        $this->entityManager->delete($entity)->run();
    }

    protected function repository(string $entityName): Repository
    {
        return $this->orm->getRepository($entityName);
    }
}
