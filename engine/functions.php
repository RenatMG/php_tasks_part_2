<?php

function get_missed_number($sequence)
{
    $findNum = NULL;
    $breakCircle = 0;
    for ($i = 1; $i < count($sequence); $i++) {
        $breakCircle = $i;
        if ($sequence[$i] - $sequence[$i - 1] == $sequence[$i + 1] - $sequence[$i]) {
            $addNum = $sequence[$i] - $sequence[$i - 1];
            for ($j = 0; $j < count($sequence) - 1; $j++) {
                if (($sequence[$j] + $addNum) != $sequence[$j + 1]) {
                    $findNum = $sequence[$j] + $addNum;
                    break;
                }
            }
        }
    };
    if ($breakCircle < 1) {
        return 'false';
    };
    return $findNum;
}

