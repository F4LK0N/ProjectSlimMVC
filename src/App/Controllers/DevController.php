<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\BaseController as BaseController;

class DevController extends BaseController
{
    public function run(): Response
    {
        return parent::run();
    }


    protected function indexAction(): void
    {
        print"Index";

    }

}

