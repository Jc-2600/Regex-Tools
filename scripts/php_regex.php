<?php

$file = fopen("../files/results.out", "r");

$ok = 0;
$no = 0;
$t  = time();


while(!feof($file)){
    $line = fgets($file);
    if(preg_match(
        //2018-06-04,India,Kenya,3,0,Friendly,Mumbai,India,FALSE
        '/^(\d{4,4}\-\d+\-\d{2,2}),(.+),(.+),(\d+),(\d+),.*$/i',
        $line,
        $m
        )
    ){
        if($m[4] == $m[5]){            
            echo "Empate: ";
        }elseif($m[4] > $m[5]){
            echo "Local:   ";
        }else{
            echo "Visitante: ";
        }
        printf("\t%s vs %s [%d-%d]\n", $m[2], $m[3], $m[4], $m[5]);
        $ok++;
    }else{
        $no++;
    }
}

fclose($file);


printf("\n\nmatch %d\nno match %d\n", $ok, $no);
printf("Tiempo: %d Segundos\n", time()-$t);