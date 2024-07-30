<?php

declare(strict_types=1);

function check_info_change_errors()
{
    if(isset($_SESSION["errors_change_acc_info"]))
    {
        $errors = $_SESSION["errors_change_acc_info"];
        
        echo "<br>";

        foreach($errors as $error)
        {
            echo '<p class="formErrors">' . $error . '</p>';
        }

        unset($_SESSION["errors_change_acc_info"]);
    }
}