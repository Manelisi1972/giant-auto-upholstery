<?php
require_once __DIR__ . '/../Config.php';
?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= e($pageTitle ?? 'Giant Auto Upholstery') ?>
    </title>

    <link
        rel="stylesheet"
        href="assets/style.css"
    >

</head>

<body>

<header class="site-header">

    <div class="logo">

        <a href="index.php">

            <span class="logo-main">
                GIANT AUTO
            </span>

            <span class="logo-sub">
                UPHOLSTERY
            </span>

        </a>

    </div>

    <nav class="main-nav">

        <a href="index.php">
            Home
        </a>

        <a href="about.php">
            About Us
        </a>

        <a href="services.php">
            Services
        </a>

        <a href="booking.php">
            Book Now
        </a>

        <a href="contact.php">
            Contact
        </a>

        <?php if (customerLoggedIn()): ?>

            <a href="account/index.php">
                My Account
            </a>

            <a
                class="login-button"
                href="auth/logout.php"
            >
                Logout
            </a>

        <?php else: ?>

            <a
                class="login-button"
                href="auth/login.php"
            >
                Login
            </a>

        <?php endif; ?>

    </nav>

</header>

<main>