<?php
    $bilangan1 = (int)readline('bilangan 1 = ');
    $bilangan2 = (int)readline('bilangan 2 = ');
    $penjumlahan = $bilangan1 + $bilangan2;
    $pengurangan = $bilangan1 - $bilangan2;
    echo "Berikut merupakan hasil dari setiap operasi\n\n";

    echo "PENJUMLAHAN\n";
    echo "Operator :  +\n";
    echo "Hasil : " . $penjumlahan . "\n\n";

    echo "PENGURANGAN\n";
    echo "Operator :  -\n";
    echo "Hasil : " . $pengurangan . "\n\n";
    
    echo "PERKALIAN\n";
    echo "Operator :  *\n";
    echo "Hasil : " . $bilangan1 * $bilangan2 . "\n\n";

    echo "PEMBAGIAN\n";
    echo "Operator :  /\n";
    echo "Hasil : " . $bilangan1 / $bilangan2 . "\n\n";

    echo "MODULUS\n";
    echo "Operator :  %\n";
    echo "Hasil : " . $bilangan1 % $bilangan2 . "\n\n";
?>