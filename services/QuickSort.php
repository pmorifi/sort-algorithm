<?php

namespace app\services;

class QuickSort implements SortAlgorithmStrategy
{
    /**
     * Handle sorting data.
     *
     * @param array $data
     * @return array
     */
    public function algorithm(array $data)
    {
        if(count($data) <= 1) {
            return $data;
        }

        $left  = [];
        $right = [];
        $pivot = $data[0];

        for ($i = 1; $i < count( $data ); $i++) {
            if($data[$i] < $pivot) {
                $left[] = $data[$i];
            } else {
                $right[] = $data[$i];
            }
        }

        return array_merge($this->algorithm($left), array($pivot), $this->algorithm($right));
    }
}