<?php

namespace app\core;

class Controller
{
    public function view($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }
}