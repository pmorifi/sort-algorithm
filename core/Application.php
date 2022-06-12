<?php

namespace app\core;

class Application
{
    public Router $router;
    public Request $request;
    public Response $response;
    public static string $ROOT_DIR;
    public static Application $app;

    /**
     * Application constructor.
     *
     * @param string $root_path
     */
    public function __construct (string $root_path)
    {
        self::$app = $this;
        self::$ROOT_DIR = $root_path;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    /**
     * Handles routes.
     *
     * @param void
     */
    public function run(): void
    {
        echo $this->router->resolve();
    }
}