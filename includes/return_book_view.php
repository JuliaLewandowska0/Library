<?php

declare(strict_types=1);

function check_return_book_errors()
{
    if(isset($_SESSION["errors_return_book"]))
    {
        $errors = $_SESSION["errors_return_book"];

        echo "<br";

        foreach($errors as $error)
        {
            echo '<p class="formErrors2">'. $error .'</p>';
        }

        unset($_SESSION["errors_return_book"]);
    }
}