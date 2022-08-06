<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class BaseController
{
    protected ?Request  $request = null;
    protected ?Response $response = null;
    protected array $endpoints = [];

    public function __construct(Request &$request, Response &$response, array &$endpoints)
    {
        $this->request = $request;
        $this->response = $response;
        $this->setEndpoints($endpoints);
    }

    private function setEndpoints(array $endpoints): void
    {
        if(isset($endpoints["endpoints"])){
            $this->clearEndpoints($endpoints["endpoints"]);
            $this->splitEndpoints($endpoints["endpoints"]);
        }

        if(count($this->endpoints)===0 || $this->endpoints[0]===""){
            $this->endpoints = ["index"];
        }
    }

    private function clearEndpoints(string &$endpointsString): void
    {
        while(str_contains($endpointsString, "//")){
            $endpointsString = str_replace("//", "/", $endpointsString);
        }
        $endpointsString = trim($endpointsString, "/");
    }

    private function splitEndpoints(string $endpointsString): void
    {
        $this->endpoints = explode("/", $endpointsString);
    }

    public function run(): Response
    {
        $endpointAction = $this->endpoints[0]."Action";

        if(method_exists($this, $endpointAction)){
            $this->$endpointAction();
        }else{
            $this->notFoundAction();
        }

        return $this->response;
    }

    protected function notFoundAction(): void
    {
        $this->response->getBody()->write("Route not found!");
    }

}
