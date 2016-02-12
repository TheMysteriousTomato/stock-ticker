Transactions <br>
<?php
    foreach($transactions as $t){
        echo $t->DateTime . " | " . $t->Player . " | " . $t->Stock . " | " . $t->Quantity . "<br>";
    }
    echo "Movements <br>";
    foreach($movements as $m){
        echo $m->Datetime . " | " . $m->Action . " | " . $m->Code . " | " . $m->Amount . "<br>";
    }

?>
