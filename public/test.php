<?php
/**
 * Created by PhpStorm.
 * User: X
 * Date: 7/19/2017
 * Time: 1:01 PM
// */
$n = $i = 11;
while ($i--){
    echo "<center>".str_repeat(' ', $i).str_repeat('* ', $n - $i)."</center><br/>";

}
echo "<hr>";

function star($num){

    $num =$num + 1;
    $star ='';
    for($b=0; $b < $num; $b++){
        $star .= '*';
    }
    return $star;

}
for($i=1; $i<12; $i++){

    if($i != 1){
        echo star($i) . '<br>';
    }else{
        echo '* <br>';
    }

}

echo "<hr>";


for($x = 1; $x<12; $x++){
    for($j = 0; $j < $x; $j++){
        echo '*';
    }
    echo "<br/>";
}