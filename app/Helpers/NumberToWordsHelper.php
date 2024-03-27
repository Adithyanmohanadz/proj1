<?php

namespace App\Helpers;

class NumberToWordsHelper
{
    protected static $units = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'];
    protected static $teens = ['Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'];
    protected static $tens = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];
    protected static $thousands = ['', 'Thousand', 'Million', 'Billion', 'Trillion', 'Quadrillion', 'Quintillion', 'Sextillion', 'Septillion', 'Octillion', 'Nonillion', 'Decillion'];

    public static function convertToWords($number)
    {
        if ($number == 0) {
            return 'Zero';
        }

        $words = [];
        $numArray = explode('.', $number);

        // Process integer part
        $integerPart = (int) $numArray[0];
        $words[] = self::convertDigitGroup($integerPart);

        // Process decimal part, if present
        if (isset($numArray[1])) {
            $decimalPart = (int) $numArray[1];
            $words[] = 'and';
            $words[] = self::convertTwoDigitNumber($decimalPart);
            $words[] = 'Paise'; // You can customize this part based on your needs
        }

        return implode(' ', array_filter($words));
    }

    protected static function convertDigitGroup($number)
    {
        $words = [];
        $thousandsCounter = 0;
    
        while ($number > 0) {
            $threeDigitGroup = $number % 1000;
    
            if ($threeDigitGroup > 0) {
                $groupWords = self::convertThreeDigitNumber($threeDigitGroup);
    
                // Check if the index exists in the $thousands array
                if (isset(self::$thousands[$thousandsCounter])) {
                    $groupWords .= ' ' . self::$thousands[$thousandsCounter];
                }
    
                $words[] = $groupWords;
            }
    
            $number = (int)($number / 1000);
            $thousandsCounter++;
        }
    
        return implode(' ', array_reverse($words));
    }
    

    protected static function convertThreeDigitNumber($number)
    {
        $words = [];

        // Process hundreds place
        if ($number >= 100) {
            $words[] = self::$units[floor($number / 100)] . ' Hundred';
            $number %= 100;
        }

        // Process tens and units place
        $words[] = self::convertTwoDigitNumber($number);

        return implode(' ', array_filter($words));
    }

    protected static function convertTwoDigitNumber($number)
    {
        $words = [];
    
        if ($number >= 20) {
            $tensIndex = floor($number / 10);
    
            if (isset(self::$tens[$tensIndex])) {
                $words[] = self::$tens[$tensIndex];
    
                // Adjust the index for the units place
                $unitIndex = $number % 10;
    
                if ($unitIndex > 0) {
                    $words[] = self::$units[$unitIndex];
                }
            }
        } else {
            // Use the correct index for numbers less than 20
            if (isset(self::$teens[$number - 10])) {
                $words[] = self::$teens[$number - 10];
            }
        }
    
        return implode(' ', array_filter($words));
    }
    
}