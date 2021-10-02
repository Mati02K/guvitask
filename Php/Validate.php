<?php

class Validate 
{
    // Helping Function to sanitize the input
    function sanitizeInput($conn,$input)
    {
        $input = trim($input);

        $input=htmlspecialchars(strip_tags($input));

        $input = mysqli_real_escape_string($conn,$input);

        return $input;

    }

    function stringValidate($input,$lowerlimit,$upperlimit)
    {
        if(strlen($input) >= $lowerlimit and strlen($input) <= $upperlimit)
        {
            return TRUE;
        }
        else
        {
            return False;
        }
    }

    function emailCheck($email)
    {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            return TRUE;
        } 
        else 
        {
            return False;
        }
    }

}


?>