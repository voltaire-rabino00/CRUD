<?php
session_start();
require 'dbcon.php';

if(isset($_POST ['delete_student']))
{
    $student_id = mysqli_real_escape_string($con,  $_POST['delete_student']);

    $query = "DELETE FROM students WHERE id='$student_id' ";
    //Execute this Delete Function
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "STUDENT Deleted SUCCESFULLY";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "STUDENT Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}




// ITO AY PARA SA UPDATE
if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $query ="UPDATE students SET  name='$name', email='$email', phone='$phone', course='$course'
    WHERE id='$student_id' ";

    $query_run = mysqli_query($con, $query);
    // check if the condition is SUCCESFULLY Excecuted
    if($query_run)
    {
        $_SESSION['message'] = "STUDENT UPDATED SUCCESFULLY";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "STUDENT NOT UPDATE";
        header("Location: index.php");
        exit(0);
    }
}

                       // Creation of all Mankind
if(isset($_POST['save_student']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    // DATABASE
    $query = "INSERT INTO students (name,email,phone,course) VALUES ('$name','$email','$phone','$course')";

    $query_run = mysqli_query($con, $query);
    // CHECK QUERY_RUN
    if($query_run)
    {
        $_SESSION['message'] = "STUDENT CREATED SUCCESFULLY";
        header("Location: create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "STUDENT NOT CREATED";
        header("Location: create.php");
        exit(0);
    }
}
?>