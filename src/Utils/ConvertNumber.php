<?php

namespace App\Utils;

class ConvertNumber{

    private $input = "";

    public function __construct($number){
        $this->input = $number; 
    }

    public function getInput()
    {
        if($this->input < 0){
            throw new Exception('Nombre saisi invalide');
        }
        else{
            return $this->input;
        }
    }

    public function convertFromBase10ToBase2(){
        if($this->input == 0)
        {
            return 0;
        }
        else
        {
            $number = $this->input;
            $converted = "";
            while ($number > 0 )
            {
                $part = $number % 2 ;
                $quotient = $number / 2 ;
                $converted .= $part;
                $number = $quotient ;
            }
            return strrev($converted);
        }
    }

    public function convertFromBase2ToBase10(){
        $reversed = strrev($this->input);
        $converted = 0;

        for ($position = 0; $position < strlen($reversed); $position++) { 
            $converted += intval($reversed[$position]) * pow(2, $position);
        }

        return $converted;
    }

    public function convertFromBase2ToAny($base){
        $list_base = array_merge(range(0,9), range('a','z'), range('A','Z'));
        $number = "";
        for($i = 0; $i < strlen($this->input); $i++){
            $current_letter = $this->input[$i];
            if(array_key_exists($current_letter, $list_base[$current_letter])){
                $number .= array_search($current_letter, $list_base);
            }
        }
    }

    
    public function convertFromAnyToBase2($base){
        $number = $this->input;
        $converted = "";
        while ($number > 0 )
        {
            $part = $number % $base ;
            $quotient = $number / $base ;
            $converted .= $part;
            $number = $quotient ;
        }
        return strrev($converted);
    }
}