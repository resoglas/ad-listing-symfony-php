<?php

declare(strict_types=1);

namespace Listing\Shared\Infrastructure\Symfony;

use Cycle\ORM\ORMInterface;
use Symfony\Component\HttpKernel\Event\FinishRequestEvent;

class CleanORMHeapRequestFinishListener
{
    public function __construct(private readonly ORMInterface $orm)
    {
    }

    public function onKernelFinishRequest(FinishRequestEvent $event): void
    {
        if ($event->isMainRequest()) {
            $this->orm->getHeap()->clean();
        }
    }
}
