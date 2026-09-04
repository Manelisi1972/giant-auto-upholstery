<?php

require_once '../config.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name =
        trim($_POST['full_name']);

    $email =
        trim($_POST['email']);

    $phone =
        trim($_POST['phone']);

    $password =
        $_POST['password'];

    $confirm =
        $_POST['confirm_password'];

    if (
        empty($name) ||
        empty($email) ||
        empty($phone) ||
        empty($password)
    ) {

        $error =
            "Please complete all fields.";

    } elseif (!filter_var(
        $email,
        FILTER_VALIDATE_EMAIL
    )) {

        $error =
            "Please enter a valid email address.";

    } elseif (strlen($password) < 8) {

        $error =
            "Password must contain at least 8 characters.";

    } elseif ($password !== $confirm) {

        $error =
            "Passwords do not match.";

    } else {

        try {

            $stmt = $pdo->prepare(
                "INSERT INTO customers
                (
                    full_name,
                    email,
                    phone,
                    password
                )
                VALUES (?, ?, ?, ?)"
            );

            $stmt->execute([
                $name,
                $email,
                $phone,
                password_hash(
                    $password,
                    PASSWORD_DEFAULT
                )
            ]);

            redirect('login.php');

        } catch (PDOException $e) {

            $error =
                "That email address is already registered.";

        }

    }

}

?>

<!DOCTYPE html>

<html>

<head>

    <title>
        Sign Up
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
Sign Up
</h1>

<?php if ($error): ?>

<div class="alert error">
<?= e($error) ?>
</div>

<?php endif; ?>

<form method="POST">

<label>
Full Name
</label>

<input
    name="full_name"
    required
>

<label>
Email
</label>

<input
    type="email"
    name="email"
    required
>

<label>
Phone
</label>

<input
    name="phone"
    required
>

<label>
Password
</label>

<input
    type="password"
    name="password"
    minlength="8"
    required
>

<label>
Confirm Password
</label>

<input
    type="password"
    name="confirm_password"
    required
>

<button class="btn">
CREATE ACCOUNT
</button>

</form>

<div class="auth-links">

<a href="login.php">
Already have an account? Login
</a>

<a href="../index.php">
← Back to Website
</a>

</div>

</div>

</div>

</body>

</html>