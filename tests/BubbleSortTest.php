<?php

use app\services\BubbleSort;
use PHPUnit\Framework\TestCase;

class BubbleSortTest extends TestCase
{
    /**
     * Test BubbleSort algorithm function.
     */
    public function testAlgorithm()
    {
        $data = str_split("5e4d3c2b1a");
        $b = new BubbleSort();
        $output = implode('', $b->algorithm($data));

        $this->assertEquals('12345abcde', $output);
    }
}