<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\BaseController as BaseController;

class DevController extends BaseController
{
    protected function indexAction(): void
    {
        $data=[
            "server"=>[
                "host"=>"127.0.0.1",
//                "tier"=>"prod",
//                "tier"=>"stag",
                "tier"=>"dev",
            ],
            "mysql"=>[

            ]
        ];

        $this->response->getBody()->write("
        DEV
        
        SERVER 
        - Host (127.0.0.1, www.asd.com)
        - Tier (Prod, Stag, Dev)
        
        MySQL
        - Host
        - Connection
        - Database
        
        Redis
        
        Bucket
        
        
        
        Install - Create tables and Insert minimal amount of registers into tables to the system work.
        Populate - Insert registers into tables to test the application.
        Stress - Insert manny registers 
        
        
        
        ");



    }

    protected function mysqlAction(): void
    {

    }

}

