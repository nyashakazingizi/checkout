<?php
session_start();
include(../db.php)

    if(isset($_POST['placeOrderBtn'])){
        $firstname = mysqli_rel_escape_string($con, $_POST['firstname']);
        $email = mysqli_rel_escape_string($con, $_POST['email']);
        $address = mysqli_rel_escape_string($con, $_POST['address']);
        $city = mysqli_rel_escape_string($con, $_POST['city']);
        $state = mysqli_rel_escape_string($con, $_POST['state']);
        $zip = mysqli_rel_escape_string($con, $_POST['zip']);
        $cardname = mysqli_rel_escape_string($con, $_POST['cardname']);
        $cardnumber = mysqli_rel_escape_string($con, $_POST['cardnumber']);
        $expmonth = mysqli_rel_escape_string($con, $_POST['expmonth']);
        $expyear = mysqli_rel_escape_string($con, $_POST['expyear']);
        $cvv = mysqli_rel_escape_string($con, $_POST['cvv']);

        /* Here just use the user id of the customer matching the customer id in the customer table*/
        $CustomerID = $_SESSION['CustomerID'];
        $query = "SELECT c.CartId, c.CustomerID, c.ProductID, c.Quantity, p.ProductID`, p.ProductName, p.Price, p.Category, p.ProductImage
         FROM cart, product WHERE c.CustomerID = $CustomerID AND c.ProductID = p.ProductID ORDER BY c.CartId DESC";
         
        $query_run = mysqli_query($con, $query);

        $totalPrice = 0;
        foreach ($query_run as $citem){
            $totalPrice += $citem['Price'] * $citem['Quantity'];
        }

        $insert_query = "INSERT INTO order (OrderId, CustomerID, TotalAmount, CardNumber) VALUES ('$OrderId', '$CustomerID', '$totalPrice', '$cardnumber')";
        $insert_query_run = mysqli_query($con, $insert_query);

        $deleteCartQuery = "DELETE FROM cart WHERE CustomerID='$CustomerID'";
        $deleteCartQuery_run = mysqli_query($con, $deleteCartQuery)

        $_SESSION['message'] = "Order has been successfully placed!";
        /* redirect to home page*/
        header('Location:homepage');
        die();
    }
    

?>