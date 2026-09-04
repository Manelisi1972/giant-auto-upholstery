<?php

require_once '../Configurre.php';

if (customerLoggedIn()) {
    redirect('../account/index.php');
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email =
        trim($_POST['email']);

    $password =
        $_POST['password'];

    $stmt = $pdo->prepare(
        "SELECT *
         FROM customers
         WHERE email = ?"
    );

    $stmt->execute([
        $email
    ]);

    $customer =
        $stmt->fetch();

    if (
        $customer &&
        password_verify(
            $password,
            $customer['password']
        )
    ) {

        $_SESSION['customer_id'] =
            $customer['customer_id'];

        $_SESSION['customer_name'] =
            $customer['full_name'];

        redirect('../account/index.php');

    } else {

        $error =
            "Invalid email or password.";

    }

}

$pageTitle = "Login";

?>

<!DOCTYPE html>

<html>

<head>

    <title>
        Login - Giant Auto Upholstery
    </title>

    <link
        rel="stylesheet"
        href="../assets/style.css"
    >

</head>

<body>

<div class="auth-page">

    <div class="auth-card">

        <div class="auth-logo">
            GIANT AUTO
            <span>
                UPHOLSTERY
            </span>
        </div>

        <h1>
            Log In
        </h1>

        <?php if ($error): ?>

            <div class="alert error">
                <?= e($error) ?>
            </div>

        <?php endif; ?>

        <form method="POST">

            <label>
                Email Address
            </label>

            <input
                type="email"
                name="email"
                required
            >

            <label>
                Password
            </label>

            <input
                type="password"
                name="password"
                required
            >

            <button class="btn">
                LOG IN
            </button>

        </form>

        <div class="auth-links">

            <a href="signup.php">
                Sign Up
            </a>

            <a href="forgot.php">
                Forgot Password?
            </a>

            <a href="../index.php">
                 Back to Website
            </a>

        </div>

    </div>

</div>

</body>

</html>