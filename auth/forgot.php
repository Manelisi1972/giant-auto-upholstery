<?php

require_once '../Configurre.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email =
        trim($_POST['email']);

    $stmt = $pdo->prepare(
        "SELECT customer_id
         FROM customers
         WHERE email = ?"
    );

    $stmt->execute([
        $email
    ]);

    if ($stmt->fetch()) {

        $message =
            "If an account exists for this email, "
            . "password reset instructions would be sent.";

    } else {

        $message =
            "If an account exists for this email, "
            . "password reset instructions would be sent.";

    }

}

?>

<!DOCTYPE html>

<html>

<head>

<title>
Forgot Password
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
Forgot Password
</h1>

<?php if ($message): ?>

<div class="alert">
<?= e($message) ?>
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

<button class="btn">
RESET PASSWORD
</button>

</form>

<div class="auth-links">

<a href="login.php">
← Back to Login
</a>

</div>

</div>

</div>

</body>

</html>