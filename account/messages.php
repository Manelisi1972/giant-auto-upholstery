<?php

require_once '../Configurre.php';

requireCustomer();

$pageTitle =
    "My Bookings";

$stmt = $pdo->prepare(
    "SELECT
        b.*,
        s.service_name
     FROM bookings b

     JOIN services s
        ON b.service_id =
           s.service_id

     WHERE b.customer_id = ?

     ORDER BY
        b.created_at DESC"
);

$stmt->execute([
    $_SESSION['customer_id']
]);

$bookings =
    $stmt->fetchAll();

include 'header.php';

?>

<h1>
    My Bookings
</h1>

<div class="booking-list">

<?php if (!$bookings): ?>

    <div class="empty-box">

        <h3>
            No bookings yet
        </h3>

        <p>
            You haven't booked a service yet.
        </p>

        <a
            class="btn"
            href="../booking.php"
        >
            BOOK NOW
        </a>

    </div>

<?php endif; ?>

<?php foreach ($bookings as $booking): ?>

    <div class="booking-card">

        <div>

            <h3>
                <?= e(
                    $booking['service_name']
                ) ?>
            </h3>

            <p>

                <strong>
                    Booking #:
                </strong>

                <?= e(
                    $booking['booking_id']
                ) ?>

            </p>

            <p>

                <strong>
                    Item:
                </strong>

                <?= e(
                    $booking['vehicle_or_item']
                ) ?>

            </p>

            <p>

                <strong>
                    Date:
                </strong>

                <?= e(
                    $booking['booking_date']
                ) ?>

            </p>

            <p>

                <strong>
                    Time:
                </strong>

                <?= e(
                    $booking['booking_time']
                ) ?>

            </p>

        </div>

        <div>

            <span class="status">

                <?= e(
                    $booking['status']
                ) ?>

            </span>

        </div>

    </div>

<?php endforeach; ?>

</div>

<?php

include 'footer.php';

?>