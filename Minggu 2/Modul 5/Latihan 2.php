<?php
    $data = array("lanirne", "aduh", "qifuat", "toda", "anevi", "samid", "kifuat");

    $length = count($data);
    for($i=0; $i<$length; $i++) {
        for($j=0; $j<$length-1; $j++) {
            if ($data[$j][0] > $data[$j+1][0]) {
                $temp = $data[$j];
                $data[$j] = $data[$j+1];
                $data[$j+1] = $temp;
            }
        }
    }
    for($i=0; $i<$length; $i++) {
        echo $data[$i] . "\n";
    }
?>