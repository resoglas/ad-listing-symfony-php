<?php

declare(strict_types=1);

namespace Listing\Framework\Controller\Listing;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/listings', methods: ['GET'])]
class ListingGetController extends AbstractController
{
    public function __invoke(): Response
    {
        return $this->json(['status' => 'OK']);
    }
}
