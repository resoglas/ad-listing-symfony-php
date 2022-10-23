<?php

declare(strict_types=1);

namespace Listing\AdListing\Listings\Domain;

use Listing\AdListing\Shared\Domain\Listings\ListingId;

interface ListingRepository
{
    public function search(ListingId $id): ?Listing;
}
