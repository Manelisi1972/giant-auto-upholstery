<?php

require_once 'Configurre.php';

if (!customerLoggedIn()) {

    redirect(
        "auth/login.php?redirect=../booking.php"
    );

}

$pageTitle = "Book Now";

$services = $pdo->query(
    "SELECT *
     FROM services
     WHERE active = 1
     ORDER BY service_name"
)->fetchAll();

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $service_id =
        intval($_POST['service_id']);

    $item =
        trim($_POST['vehicle_or_item']);

    $date =
        $_POST['booking_date'];

    $time =
        $_POST['booking_time'];

    $description =
        trim($_POST['description']);

    if (
        empty($service_id) ||
        empty($item) ||
        empty($date) ||
        empty($time)
    ) {

        $message =
            "Please complete all required fields.";

    } elseif ($date < date('Y-m-d')) {

        $message =
            "Please select a future date.";

    } else {

        $stmt = $pdo->prepare(
            "INSERT INTO bookings
            (
                customer_id,
                service_id,
                vehicle_or_item,
                booking_date,
                booking_time,
                description
            )
            VALUES (?, ?, ?, ?, ?, ?)"
        );

        $stmt->execute([
            $_SESSION['customer_id'],
            $service_id,
            $item,
            $date,
            $time,
            $description
        ]);

        $message =
            "Your booking has been submitted successfully.";

    }

}

$selectedService =
    intval($_GET['service'] ?? 0);

include 'includes/header.php';

?>

<section class="page-banner">

    <h1>
        Book Now
    </h1>

    <p>
        Schedule your upholstery service
    </p>

</section>

<section class="form-section">

    <div class="form-card">

        <h2>
            New Booking
        </h2>

        <?php if ($message): ?>

            <div class="alert">
                <?= e($message) ?>
            </div>

        <?php endif; ?>

        <form method="POST">

            <label>
                Service *
            </label>

            <select
                name="service_id"
                required
            >

                <option value="">
                    Select a service
                </option>

<?php foreach ($services as $service): ?>

                <option
                    value="<?= $service['service_id'] ?>"
                    <?= $selectedService ==
                        $service['service_id']
                        ? 'selected'
                        : '' ?>
                >

                    <?= e(
                        $service['service_name']
                    ) ?>

                    -
                    R<?= number_format(
                        $service['price'],
                        2
                    ) ?>

                </option>

<?php endforeach; ?>

            </select>

            <label>
                Vehicle / Item *
            </label>

            <input
                type="text"
                name="vehicle_or_item"
                placeholder="e.g. Toyota Corolla driver seat"
                required
            >

            <label>
                Booking Date *
            </label>

            <input
                type="date"
                name="booking_date"
                min="<?= date('Y-m-d') ?>"
                required
            >

            <label>
                Booking Time *
            </label>

            <select
                name="booking_time"
                required
            >

                <option value="">
                    Select a time
                </option>

                <option value="08:00">
                    08:00
                </option>

                <option value="09:30">
                    09:30
                </option>

                <option value="11:00">
                    11:00
                </option>

                <option value="13:00">
                    13:00
                </option>

                <option value="14:30">
                    14:30
                </option>

                <option value="16:00">
                    16:00
                </option>

            </select>

            <label>
                Additional Description
            </label>

            <textarea
                name="description"
                placeholder="Describe what needs to be repaired..."
            ></textarea>

            <button
                type="submit"
                class="btn"
            >
                CONFIRM BOOKING
            </button>

        </form>

    </div>

</section>

<?php

include 'includes/footer.php';

?>