<?php

require_once '../Configurre.php';

requireCustomer();

$pageTitle =
    "Profile Settings";

$message = "";

$stmt = $pdo->prepare(
    "SELECT *
     FROM customers
     WHERE customer_id = ?"
);

$stmt->execute([
    $_SESSION['customer_id']
]);

$customer =
    $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name =
        trim($_POST['full_name']);

    $email =
        trim($_POST['email']);

    $phone =
        trim($_POST['phone']);

    if (
        !$name ||
        !$email ||
        !$phone
    ) {

        $message =
            "All fields are required.";

    } else {

        try {

            $stmt = $pdo->prepare(
                "UPDATE customers

                 SET
                    full_name = ?,
                    email = ?,
                    phone = ?

                 WHERE customer_id = ?"
            );

            $stmt->execute([
                $name,
                $email,
                $phone,
                $_SESSION['customer_id']
            ]);

            $_SESSION['customer_name'] =
                $name;

            $message =
                "Profile updated successfully.";

            $customer['full_name'] =
                $name;

            $customer['email'] =
                $email;

            $customer['phone'] =
                $phone;

        } catch (PDOException $e) {

            $message =
                "Unable to update profile.";

        }

    }

}

include 'header.php';

?>

<h1>
    Profile Settings
</h1>

<div class="form-card">

<?php if ($message): ?>

<div class="alert">
<?= e($message) ?>
</div>

<?php endif; ?>

<form method="POST">

<label>
Full Name
</label>

<input
    name="full_name"
    value="<?= e(
        $customer['full_name']
    ) ?>"
    required
>

<label>
Email
</label>

<input
    type="email"
    name="email"
    value="<?= e(
        $customer['email']
    ) ?>"
    required
>

<label>
Phone
</label>

<input
    name="phone"
    value="<?= e(
        $customer['phone']
    ) ?>"
    required
>

<button class="btn">
SAVE CHANGES
</button>

</form>

</div>

<?php

include 'footer.php';

?>