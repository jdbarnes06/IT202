<?php
$arr = array("First Name"=>"Jonathan",
       "Last Name"=>"Barnes",
       "Phone Number"=>"973-906-9051",
       "Address"=>"64 Kings Road Chatham, NJ 07928",
       "College"=>"YWCC",
       "Major"=>"Information Technology");

foreach ($arr as $key => $val)
{
    echo "$key: $val<br>";
}
?>