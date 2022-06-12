<?php

namespace app\core;

class Response
{
    /**
     * Handles and set status.
     *
     * @return void
     */
    public function setStatusCode (int $code)
    {
        http_response_code($code);
    }
}