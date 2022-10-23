<?php

declare(strict_types=1);

namespace Listing\AdListing\Listings\Application\Find;

use Listing\AdListing\Listings\Domain\Listing;
use Listing\AdListing\Listings\Domain\ListingDoesNotExist;
use Listing\AdListing\Listings\Domain\ListingRepository;
use Listing\AdListing\Shared\Domain\Listings\ListingId;

class ListingFinder
{
    public function __construct(private readonly ListingRepository $repository)
    {
    }

    public function __invoke(ListingId $id): Listing
    {
        $course = $this->repository->search($id);

        if (null === $course) {
            throw new ListingDoesNotExist($id);
        }

        return $course;
    }
}
