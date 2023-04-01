<?php




##
include_once '../database_connection/database_connection.php';
##
include_once '../functions/functions.php';


if (isset($_POST['submit'])) {
    $first_name = validate_text_input($_POST['first_name']);
    $last_name = validate_text_input($_POST['last_name']);
    $phone_number = validate_text_input($_POST['phone_number']);
    $res_address = validate_text_input($_POST['res_address']);
    $email = validate_text_input($_POST['email']);
    $employee_type = validate_text_input($_POST['employee_type']);
    $password = "emp123";
    $employee_id = $employee_type == 'salesman' ? generate_account_id("SL") : generate_account_id("AD");


    $empty_field_error = "This field is required";

    $emp_reg_data =  'first_name=' . $first_name . '&email=' . $email . '&phone_number=' . $phone_number . '&res_address=' . $res_address . '&last_name=' . $last_name . '&employee_type=' . $employee_type;


    if (empty($first_name)) {
        header("Location: ../profile/employee_dashboard.php?first_name_error=$empty_field_error&$emp_reg_data");
        exit();

    }


    if (empty($last_name)) {
        header("Location: ../profile/employee_dashboard.php?last_name_error=$empty_field_error&$emp_reg_data");
        exit();

    }


    if (empty($phone_number)) {
        header("Location: ../profile/employee_dashboard.php?phone_number_error=$empty_field_error&$emp_reg_data");
        exit();

    }    


    if (empty($res_address)) {
        header("Location: ../../index.php?res_address_error=$empty_field_error&$emp_reg_data");
        exit();

    }


    if (empty($email)) {
        header("Location: ../profile/employee_dashboard.php?email_error=$empty_field_error&$emp_reg_data");
        exit();

    }


    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        header("Location: ../profile/employee_dashboard.php?email_error=Invalid email&$emp_reg_data");
        exit();

    }

     // employee Data
    $employee_select_query = "SELECT * FROM `employees` WHERE email = :email";
    // Statement employee
    $stmt_employee = $connection->prepare($employee_select_query);
    $stmt_employee->execute(['email' => $email]);
    if ($stmt_employee->rowCount() > 0) {
        header("Location: ../profile/employee_dashboard.php?email_error=This email is taken&$emp_reg_data");
        exit();
    } 


    if (empty($employee_type)) {
        header("Location: ../profile/employee_dashboard.php?employee_type_error=$empty_field_error&$emp_reg_data");
        exit();

    }


    ## Hashing the input password
    $password = password_hash($password,PASSWORD_DEFAULT);





    $new_employee_insert_query = "INSERT INTO `employees`(`employee_id`, `first_name`, `last_name`, `res_address`, `email`, `pass_word`, `employee_type`) VALUES (:employee_id,:first_name,:last_name,:res_address,:email,:pass_word,:employee_type)";

    $stmt_new_employee = $connection->prepare($new_employee_insert_query);

    if ($stmt_new_employee->execute(['employee_id' => $employee_id, 'first_name' => $first_name, 'last_name' => $last_name, 'res_address' => $res_address, 'email' => $email, 'pass_word' => $password, 'employee_type' => $employee_type])) {

        header("Location: ../profile/employee_dashboard.php?reg_success=Registration successful");
        exit();

    } else {
        header("Location: ../profile/employee_dashboard.php?reg_error=Something went wrong please try again&$emp_reg_data");
        exit();
    }












}