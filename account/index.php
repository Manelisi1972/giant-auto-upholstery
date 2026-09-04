<?php

require_once '../Configurre.php';

requireCustomer();

$pageTitle =
    "My Account";

$stmt = $pdo->prepare(
    "SELECT COUNT(*)
     FROM bookings
     WHERE customer_id = ?"
);

$stmt->execute([
    $_SESSION['customer_id']
]);

$bookingCount =
    $stmt->fetchColumn();

$stmt = $pdo->prepare(
    "SELECT COUNT(*)
     FROM messages
     WHERE customer_id = ?"
);

$stmt->execute([
    $_SESSION['customer_id']
]);

$messageCount =
    $stmt->fetchColumn();

include 'header.php';

?>

<h1>
    My Account
</h1>

<p>
    Welcome back,
    <strong>
        <?= e($_SESSION['customer_name']) ?>
    </strong>
</p>

<div class="account-cards">

    <div class="account-card">

       

        <h2>
            <?= $bookingCount ?>
        </h2>

        <p>
            My Bookings
        </p>

        <a href="bookings.php">
            View Bookings
        </a>

    </div>

    <div class="account-card">

        

        <h2>
            <?= $messageCount ?>
        </h2>

        <p>
            Messages
        </p>

        <a href="messages.php">
            View Messages
        </a>

    </div>

    <div class="account-card">

        

        <h2>
            New
        </h2>

        <p>
            Booking
        </p>

        <a href="../booking.php">
            Book Now
        </a>

    </div>

</div>

<?php

include 'footer.php';

?>