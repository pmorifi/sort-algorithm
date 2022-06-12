<?php

namespace app\core;

class Router
{
    public Request $request;
    public Response $response;
    protected  array $routes = [];

    /**
     * Router constructor.
     *
     * @param Request $request
     * @param Response $response
     */
    public function __construct (Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * Register a new GET route with the router.
     */
    public function get($path, $callback): void
    {
        $this->routes['get'][$path] = $callback;
    }

    /**
     * Register a new POST route with the router.
     */
    public function post($path,$callback): void
    {
        $this->routes['post'][$path] = $callback;
    }

    /**
     * Handles user request.
     *
     * @return string
     */
    public function resolve(): string
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView('error/_404');
        }

        if (is_string($callback))
            return $this->renderView($callback);

        if (is_array($callback))
            $callback[0] = new $callback[0]();

        return call_user_func($callback, $this->request);
    }

    /**
     * Render views in side layout.
     */
    public function renderView($view, $params = []): string
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);

        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    /**
     * Gets layout content.
     */
    protected function layoutContent(): string
    {
        ob_start();

        include_once Application::$ROOT_DIR."/views/layouts/app.php";

        return ob_get_clean();
    }

    /**
     * Gets main content.
     */
    protected function renderOnlyView($view, $params): string
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();

        include_once Application::$ROOT_DIR."/views/$view.php";

        return ob_get_clean();
    }
}