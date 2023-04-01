<?php
session_start();


if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    if (isset($_SESSION['customer_id'])) {
    header("Location: ../../index.php");
    exit();
    } else {
        header("Location: ../../index.php");
        exit();
    }
    
}

##
include_once '../database_connection/database_connection.php';
##
include_once '../functions/functions.php';

if (isset($_POST['submit'])) {

    $email = validate_text_input($_POST['email']);
    $password = validate_text_input($_POST['password']);







    $empty_field_error = "This field is required";

    $sign_in_data =  'email=' . $email;


    if (empty($email)) {
    header("Location: ../../index.php?s_email_error=$empty_field_error&$sign_in_data");
    exit();

    } 


    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    header("Location: ../../index.php?s_email_error=Invaild email&$sign_in_data");
    exit();

    }


     // customer Data
    $customer_select_query = "SELECT * FROM `customers` WHERE email = :email";
    // Statement employee
    $stmt_customer = $connection->prepare($customer_select_query);
    $stmt_customer->execute(['email' => $email]);
    $customer_count = $stmt_customer->rowCount();

     // employee Data
    $employee_select_query = "SELECT * FROM `employees` WHERE email = :email";
    // Statement employee
    $stmt_employee = $connection->prepare($employee_select_query);
    $stmt_employee->execute(['email' => $email]);
    $employee_count = $stmt_employee->rowCount();



    if ($employee_count == 0 && $customer_count == 0) {
        header("Location: ../../index.php?s_email_error=This email is not registered&$sign_in_data");
        exit();
    } 



    if (empty($password)) {
    header("Location: ../../index.php?s_password_error=Please enter your password.&$sign_in_data");
    exit();

    }


    ### log in a customer

    if ($customer_count) {
        
        $customer_data = $stmt_customer->fetch(PDO::FETCH_ASSOC);

        $check_password = password_verify($password,$customer_data['pass_word']);

        if (!$check_password) {
            header("Location:../../index.php?s_password_error=Wrong password.&$sign_in_data");
            exit();
         }
         


        session_start();
        $_SESSION['customer_id'] = $customer_data['customer_id'];
        $_SESSION['customer_name'] = ucwords($customer_data['customer_name']);
        $_SESSION['email'] = $customer_data['email'];
        $_SESSION['image_name'] = $customer_data['image_name'];



        header("Location: ../../index.php");
        exit();
        

    }





    if($employee_count){

        $employee_data = $stmt_employee->fetch(PDO::FETCH_ASSOC);

        $check_password = password_verify($password,$employee_data['pass_word']);

        if (!$check_password) {
            header("Location:../../index.php?s_password_error=Wrong password.&$sign_in_data");
            exit();
         }



        session_start();
        $_SESSION['employee_id'] = $employee_data['employee_id'];
        $_SESSION['name'] = ucwords($employee_data['last_name'] . " " . ucwords($employee_data['first_name']));
        $_SESSION['email'] = $employee_data['email'];
        $_SESSION['location'] = $employee_data['res_address'];
        $_SESSION['employee_type'] = strtoupper($employee_data['employee_type']);
        $_SESSION['image'] = $employee_data['image'];




        header("Location: ../profile/employee_dashboard.php");
        exit();

        // if ($employee_data['employee_type'] == "saleman") {
        //     header("Location: ../profile/salesman_dashboard.php");
        //     exit();


        // } elseif ($employee_data['employee_type'] == "admin") {
            
        // }






    }




}else {
    header("Location: ../../index.php");
}