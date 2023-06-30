<?php

if (! function_exists('abbreviateNumber')) {
    function abbreviateNumber($number)
    {
        if ($number < 1000) {
            // For numbers less than 1000, no abbreviation is needed
            return $number;
        }
        
        $abbreviations = ['', 'k', 'M', 'B', 'T'];
        $index = floor(log($number, 1000));
        $abbreviation = $abbreviations[$index];
        $abbreviatedNumber = number_format($number / pow(1000, $index), 1) . $abbreviation;
        
        return $abbreviatedNumber;
    }
}
