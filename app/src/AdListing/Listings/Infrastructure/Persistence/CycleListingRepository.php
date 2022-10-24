<?php

declare(strict_types=1);

namespace Listing\AdListing\Listings\Infrastructure\Persistence;

use Listing\AdListing\Listings\Domain\Listing;
use Listing\AdListing\Listings\Domain\ListingRepository;
use Listing\AdListing\Shared\Domain\Listings\ListingId;
use Listing\Shared\Infrastructure\Persistence\CycleRepository;

final class CycleListingRepository extends CycleRepository implements ListingRepository
{
    public function search(ListingId $id): ?Listing
    {
        /** @var Listing|null $listing */
        $listing = $this->repository(Listing::class)->findByPK($id);

        return $listing;
    }
}
