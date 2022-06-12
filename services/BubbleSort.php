<?php

namespace app\services;

class BubbleSort implements SortAlgorithmStrategy
{
    /**
     * Handle sorting data.
     *
     * @return array
     */
    public function algorithm(array $data)
    {
        if(count($data) <= 1) {
            return $data;
        }

        do {
            $swapped = false;
            for ( $i = 0, $length = count( $data ) - 1; $i < $length; $i++ )
            {
                if( $data[$i] > $data[$i + 1] )
                {
                    list( $data[$i + 1], $data[$i] ) =
                        array( $data[$i], $data[$i + 1] );
                    $swapped = true;
                }
            }
        }
        while( $swapped );

        return $data;
    }
}