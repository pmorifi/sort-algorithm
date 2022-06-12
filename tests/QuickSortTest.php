<?php

use app\services\QuickSort;
use PHPUnit\Framework\TestCase;

class QuickSortTest extends TestCase
{
    /**
     * Test QuickSort algorithm function.
     */
    public function testAlgorithm()
    {
        $data = str_split("5e4d3c2b1a");
        $b = new QuickSort();
        $output = implode('', $b->algorithm($data));

        $this->assertEquals('12345abcde', $output);
    }
}