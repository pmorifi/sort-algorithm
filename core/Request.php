<?php

namespace app\core;

class Request
{
    /**
     * Returns path.
     *
     * @return string
     */
    public function getPath(): string
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');

        if ($position === false) {
            return $path;
        }

        return substr($path, 0, $position);
    }

    /**
     * Returns method.
     *
     * @return string
     */
    public function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    /**
     * Sanitize special characters.
     *
     * @return array
     */
    public function input(): array
    {
        $body = [];

        if ($this->getMethod() == 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}