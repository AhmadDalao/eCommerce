<?php


function lang($phrase)
{
    static $language = array(
        "مرحبا" => "my first item in the new function array",
        "هلا" => "arabic.php",
    );
    return $language[$phrase];
}