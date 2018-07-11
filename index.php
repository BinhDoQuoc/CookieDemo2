<?php
    $k = setcookie('name', 'Admin1234', 
                time() + 60 * 60 * 24, "/");
    echo 'Cookie saved12344: ' . $k;
?>
