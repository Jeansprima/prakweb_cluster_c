<?php
function faktorial($n)
{
    $hasil = 1;
    for ($i = 1; $i <= $n; $i++) {
        $hasil *= $i;
    }
    return $hasil;
}
$n = (int)readline();
$hasil = faktorial($n);
echo "hasil faktorial = " . $hasil;