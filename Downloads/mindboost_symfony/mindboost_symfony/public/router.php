<?php

use App\Kernel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Runtime\SymfonyRuntime;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

$kernel = new Kernel('dev', true);
$kernel->boot();

$request = Request::createFromGlobals();

$response = $kernel->handle($request);

$response->send();

$kernel->terminate($request, $response);