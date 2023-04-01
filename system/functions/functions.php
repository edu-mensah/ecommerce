<?php

function validate_text_input($data){
    $data =  trim( strip_tags(htmlspecialchars($data)));
    return $data;
}






function generate_account_id($account_type){


    $year = substr(date("Y"),2);
    $random_number = rand(1,999);;
    $account_id = $account_type . $random_number . $year;


    return $account_id;

    
}