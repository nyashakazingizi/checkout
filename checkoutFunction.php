<?php
session_start();
include(../db.php);

function getCartItems(){
    global $con;
    $Customerid = $_SESSION['CustomerID']
    $query = "SELECT c.CartID, c.CustomerID, c.ProductID, c.Quantity, p.ProductID, p.roductName, p.Price, p.ProductImage 
    FROM cart c products p WHERE c.CartID = p.ProducttID AND c.CustomerID='Customerid' "
}

?>