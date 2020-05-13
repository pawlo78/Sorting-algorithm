<?php

class mySort {

    public $arrayB = [];
    public $arrayS = [];    
    public $arrayM = [];

    public function __construct($arrayCon) {
        $this->arrayB = $arrayCon;        
        $this->arrayS = $arrayCon; 
        $this->arrayM = $arrayCon;       
    }
    

/************************* Sort programs *************************/

//Bubble sort
public function sortBubble() : array {
    $len = count($this->arrayB);
    $k = 0;
    $iter = $len - 1;
    for ($i=0; $i < $len; $i++) { 
        $flagStop = FALSE;
        for ($j=0; $j < $iter; $j++) {           
            if($this->arrayB[$j] > $this->arrayB[$j+1]) {
                $varAux = $this->arrayB[$j];
                $this->arrayB[$j] = $this->arrayB[$j+1];
                $this->arrayB[$j+1] = $varAux;
                $flagStop = TRUE; 
                $newIter = $j;            
            }
            $k++;            
        }        
        $iter = $newIter;
        if(!$flagStop) break;
    }
    $this->arrayB[$len] = $k;

    return $this->arrayB;    
}

//Selection sort
public function sortSelection() :array {
    $iter = 0;
    $len = count($this->arrayS);
    for ($i=0; $i < $len; $i++) {
        $min = $i;
        for ($j=$i+1; $j < $len ; $j++) { 
            if($this->arrayS[$j] < $this->arrayS[$min]) {
                $min = $j;
            }
        }
        if($min != $i) {
            $tmp = $this->arrayS[$i];
            $this->arrayS[$i] = $this->arrayS[$min];
            $this->arrayS[$min] = $tmp;
        }
        $iter++;
    }
    $this->arrayS[$i] = $iter;
    return $this->arrayS;    
}

//************************** My sorting *************************
// 1. Creating a new array
// 2. Setting two first items in the new array
// 3. If the next items value is lower than the first in the new array - add it to the
//    value of items beginning of the new array
// 4. If the next items value is bigger than the last one
//    - add it at the end of the new array
// 5. If the next items value is between the first and the last one
//    - compare items in the new array 
// 6. Finally remove the starting array

public function sortMy() : array {    
    
    $lenght = count($this->arrayM);  
    //number of iterations
    $iter = 0;  

    //set two first items in new array with sort
    if($this->arrayM[0] > $this->arrayM[1]) {
        $arrNew[0] = $this->arrayM[1];
        $arrNew[1] = $this->arrayM[0];
        $iter++;
    } else {
        $arrNew[0] = $this->arrayM[0];
        $arrNew[1] = $this->arrayM[1];
        $iter++;
    }  

    //for next items
    for ($i=2; $i < $lenght; $i++) {          
        //if the value item is between the first and the last item value
        if($this->arrayM[$i] > $arrNew[0] && $this->arrayM[$i] < $arrNew[$i-1]) {            
            //check next items where to put in the tested item
            for ($j=0; $j < $i; $j++) {               
                //if found this place - rescale new array and put in the item   
                if($this->arrayM[$i] >= $arrNew[$j] && $this->arrayM[$i] <= $arrNew[$j+1]) {
                    $k = $i;
                    for ($x=$j; $x < $i; $x++) {
                    $arrNew[$k] = $arrNew[$k-1];
                    $k--;         
                    }                    
                    $arrNew[$j+1] = $this->arrayM[$i];
                    $iter++;
                    break;
                }
            }
            continue;
        }
        //if value item is less than or equal to the first
        if($this->arrayM[$i] <= $arrNew[0]) {
            for ($x=0; $x < $i; $x++) {                
                $arrNew[$i-$x] = $arrNew[$i-$x-1];         
            }
            $arrNew[0] = $this->arrayM[$i];
            $iter++;
            continue;                    
        }
        //if value item is bigger than or equal to the last             
        if($this->arrayM[$i] >= $arrNew[$i-1]) {            
            $arrNew[$i] = $this->arrayM[$i];
            $iter++;
           continue;
        } 

        $iter++;
    }
    //The last element is the number of iterations   
    $arrNew[$lenght] = $iter;
    unset($this->arrayM);
    return $arrNew;    
}


}

?>