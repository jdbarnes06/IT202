<?php
    $authors = array("Ernest Hemingway", "Mark Twain", "Stephen King", "Suzanne Collins", "Harper Lee", "Lois Lowry");
    $output = array();
    $count = 0;
    $a = $_GET["a"];
    
    if (strlen($a) == 0)
    {
        echo "Author not found";
        return;
    }
    
    for ($i = 0; $i < 6; $i++)
    {
        if (strtolower(substr($authors[$i], 0, strlen($a))) == strtolower($a))
        {
            $output[$count] = $authors[$i];
            $count++;
        }
    }

    if ($count == 0)
    {
        echo "Author not found";
    }
    else if ($count == 1)
    {      
        echo $output[0];	     
    }
    else 
    {
	    for ($i = 0; $i < $count - 1; $i++)
        {
            echo "$output[$i], ";
        }

        echo $output[$count - 1];
    }
?>