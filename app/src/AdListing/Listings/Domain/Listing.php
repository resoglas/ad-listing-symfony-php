<?php

declare(strict_types=1);

namespace Listing\AdListing\Listings\Domain;

use Listing\Shared\Domain\Aggregate\AggregateRoot;

final class Listing extends AggregateRoot
{
    public function __construct(private readonly string $id)
    {
    }

    public function id(): string
    {
        return $this->id;
    }
}
