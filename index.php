<?php

include("mySort.php");

//namber of items
$noItems = 2000;
for ($i=0; $i < $noItems; $i++) { 
    $tablica[$i] = rand(0,999);    
}

$itemsSort = new mySort($tablica);

//Main program
echo "COMPARISON OF SORTING METHODS<BR><BR>";
//Bubble sort
//Start time
$start = microtime();
$responseBubble = $itemsSort->sortBubble();
//Finish time
$finish = microtime();
$start = explode(' ', $start);
$finish = explode(' ', $finish);
$allTime = ($finish[0]+$finish[1])-($start[0]+$start[1]);
$allTime = round($allTime,5);
echo 'Bubble sort<BR>';
echo 'The script was executed in: '.$allTime.' second.<BR>';
echo 'Numbers of iterations: '.$responseBubble[$noItems]."<BR><BR>";

//Selection sort
$start = microtime();
$responseBubble = $itemsSort->sortSelection();
$finish = microtime();
$start = explode(' ', $start);
$finish = explode(' ', $finish);
$allTime = ($finish[0]+$finish[1])-($start[0]+$start[1]);
$allTime = round($allTime,5);
echo 'Selection sort<BR>';
echo 'The script was executed in: '.$allTime.' second.<BR>';
echo 'Numbers of iterations: '.$responseBubble[$noItems]."<BR><BR>";

//My sorting
$start = microtime();
$responseBubble = $itemsSort->sortMy();
$finish = microtime();
$start = explode(' ', $start);
$finish = explode(' ', $finish);
$allTime = ($finish[0]+$finish[1])-($start[0]+$start[1]);
$allTime = round($allTime,5);
echo 'My sort<BR>';
echo 'The script was executed in: '.$allTime.' second.<BR>';
echo 'Numbers of iterations: '.$responseBubble[$noItems]."<BR><BR>";


?>