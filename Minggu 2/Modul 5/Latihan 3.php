<?php
    $count = 0;
    for($i=2; $i<50; $i++) {
        $prima = 0;
        for($j=1; $j<=$i; $j++) {
            if($i % $j == 0) {
                $prima++;
            }
        }
        if($prima == 2) {
            $count++;
            if($count == 1) echo $i;
            else echo ", " . $i;
        }
    }
?>