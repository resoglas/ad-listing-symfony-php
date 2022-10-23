<?php

declare(strict_types=1);

namespace Listing\Framework;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function getProjectDir(): string
    {
        return sprintf('%s/framework', parent::getProjectDir());
    }
}
