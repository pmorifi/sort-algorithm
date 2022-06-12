<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\services\BubbleSort;
use app\services\QuickSort;

class AlgorithmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index(): string
    {
        return $this->view('index');
    }

    /**
     * Returns a newly sorted string.
     *
     * @param Request $request
     * @return string
     */
    public function store(Request $request): string
    {
        $input = strtolower($request->input()['sort']);
        $algorithm = strtolower($request->input()['algorithm']);

        if (empty($input)) {
            $error = 'The data field is required';
            return $this->view('index', compact('error'));
        }

        if ($algorithm == 'bubble') {
            $b = new BubbleSort();
            $output = implode('', $b->algorithm(str_split($input)));
        } else {
            $q = new QuickSort();
            $output = implode('', $q->algorithm(str_split($input)));
        }

        return $this->view('index', compact('input', 'output'));
    }
}