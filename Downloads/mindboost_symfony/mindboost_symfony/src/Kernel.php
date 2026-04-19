<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function __construct(string $environment, bool $debug)
    {
        (new \Symfony\Component\Dotenv\Dotenv())->loadEnv(dirname(__DIR__).'/.env');
        parent::__construct($environment, $debug);
    }
}