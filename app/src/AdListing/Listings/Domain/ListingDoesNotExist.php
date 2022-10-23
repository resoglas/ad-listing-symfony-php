<?php

declare(strict_types=1);

namespace Listing\AdListing\Listings\Domain;

use Listing\AdListing\Shared\Domain\Listings\ListingId;
use Listing\Shared\Domain\DomainError;

class ListingDoesNotExist extends DomainError
{
    public function __construct(private readonly ListingId $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'listing_does_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The listing <%s> does not exist', $this->id->value());
    }
}
