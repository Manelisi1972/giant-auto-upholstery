<?php

session_start();

$host = "127.0.0.1";
$dbname = "giant_auto_upholstery";
$username = "root";
$password = "";

try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    $pdo->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
    );

} catch (PDOException $e) {

    die(
        "Database connection failed: " .
        $e->getMessage()
    );

}

function e($value)
{
    return htmlspecialchars(
        $value ?? '',
        ENT_QUOTES,
        'UTF-8'
    );
}

function redirect($page)
{
    header("Location: $page");
    exit;
}

function customerLoggedIn()""
{
    return isset($_SESSION['customer_id']);
}

function requireCustomer()
{
    if (!customerLoggedIn()) {
        redirect("../auth/login.php");
    }
}

function requireCustomerRoot()
{
    if (!customerLoggedIn()) {
        redirect("auth/login.php");
    }
}