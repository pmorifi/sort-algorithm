<?php

namespace app\services;

interface SortAlgorithmStrategy
{
    public function algorithm (array $data);
}