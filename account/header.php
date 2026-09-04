<?php

require_once '../Configurre.php';

requireCustomer();

?>

<!DOCTYPE html>

<html>

<head>

<title>
<?= e($pageTitle ?? 'My Account') ?>
</title>

<link
    rel="stylesheet"
    href="../assets/style.css"
>

</head>

<body>

<header class="account-header">

    <div>

        <strong>
            GIANT AUTO
        </strong>

        <span>
            CUSTOMER ACCOUNT
        </span>

    </div>

    <a href="../auth/logout.php">
        Logout
    </a>

</header>

<div class="account-layout">

<aside class="account-sidebar">

    <h3>
        My Account
    </h3>

    <a href="index.php">
        Dashboard
    </a>

    <a href="bookings.php">
        My Bookings
    </a>

    <a href="../booking.php">
        New Booking
    </a>

    <a href="messages.php">
        Messages
    </a>

    <a href="profile.php">
        Profile Settings
    </a>

    <a href="../index.php">
        ← Main Website
    </a>

</aside>

<main class="account-content">