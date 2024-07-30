<?php

declare(strict_types=1);

function check_login_errors()
{
    if(isset($_SESSION["errors_login"]))
    {
        $errors = $_SESSION["errors_login"];
        
        echo "<br>";

        foreach($errors as $error)
        {
            echo '<p class="formErrors">' . $error . '</p>';
        }

        unset($_SESSION['errors_login']);
    }
}