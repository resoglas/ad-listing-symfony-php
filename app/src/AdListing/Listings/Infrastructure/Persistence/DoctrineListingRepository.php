<?php

declare(strict_types=1);

namespace Listing\AdListing\Listings\Infrastructure\Persistence;

use Listing\AdListing\Listings\Domain\Listing;
use Listing\AdListing\Listings\Domain\ListingRepository;
use Listing\AdListing\Shared\Domain\Listings\ListingId;
use Listing\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineListingRepository extends DoctrineRepository implements ListingRepository
{
    public function search(ListingId $id): ?Listing
    {
        return $this->repository(Listing::class)->find($id);
    }
}
