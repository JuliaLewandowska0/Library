<?php

declare(strict_types=1);

function check_password_change_errors()
{
    if(isset($_SESSION["errors_change_password"]))
    {
        $errors = $_SESSION["errors_change_password"];
        
        echo "<br>";

        foreach($errors as $error)
        {
            echo '<p class="formErrors">' . $error . '</p>';
        }

        unset($_SESSION["errors_change_password"]);
    }
}