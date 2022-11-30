<?php

$actionType = $_GET['type'];
$value = (int) $_GET['value'];

if($actionType == 'segitiga'){
    $segitiga = str_split($value);
    //echo json_encode($segitiga);
    for($i=0; $i<count($segitiga); $i++){
        for($j=0; $j<$i; $j++){
            echo '0';
        }
        echo $segitiga[$i].'<br>';
    }
}elseif($actionType == 'ganjil'){
    for($i = 1; $i <= $value; $i++){
        if($i % 2 == 1){
            echo $i." ";
        }
    }
}elseif($actionType == 'prima'){
    for($i = 1; $i <= $value; $i++){
        if(!preg_match( '/^1?$|^(11+?)\1+$/x', str_repeat('1', $i))){
            echo $i." ";
        }
    }
}
else{
    echo $actionType.'-'.$value;
}
