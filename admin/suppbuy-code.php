<?php
    include ('../config/function.php');

    if(isset($_POST['supItem']))
    {

        $iname=validate($_POST['iname']);
        $price=validate($_POST['price']);
        $qty=validate($_POST['quntity']);

        $_SESSION['itemName']=$iname;



    }


?>
