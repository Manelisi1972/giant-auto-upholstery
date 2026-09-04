<?php

require_once 'config.php';

$pageTitle = "Contact Us";

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name =
        trim($_POST['name']);

    $email =
        trim($_POST['email']);

    $subject =
        trim($_POST['subject']);

    $text =
        trim($_POST['message']);

    if (
        empty($name) ||
        empty($email) ||
        empty($text)
    ) {

        $message =
            "Please complete the required fields.";

    } else {

        $message =
            "Thank you. Your message has been received.";

    }

}

include 'includes/header.php';

?>

<section class="page-banner">

    <h1>
        Contact Us
    </h1>

    <p>
        We would love to hear from you.
    </p>

</section>

<section class="contact-section">

    <div class="contact-info">

        <h2>
            Get In Touch
        </h2>

        <p>
            Contact Giant Auto Upholstery
            for enquiries, quotations and bookings.
        </p>

        <div class="contact-item">

            <strong>
                 Phone
            </strong>

            <p>
                012 345 6789
            </p>

        </div>

        <div class="contact-item">

            <strong>
                Email
            </strong>

            <p>
                info@giantauto.co.za
            </p>

        </div>

        <div class="contact-item">

            <strong>
                Location
            </strong>

            <p>
                South Africa
            </p>

        </div>

    </div>

    <div class="form-card">

        <h2>
            Send Us A Message
        </h2>

        <?php if ($message): ?>

            <div class="alert">
                <?= e($message) ?>
            </div>

        <?php endif; ?>

        <form method="POST">

            <label>
                Name *
            </label>

            <input
                name="name"
                required
            >

            <label>
                Email *
            </label>

            <input
                type="email"
                name="email"
                required
            >

            <label>
                Subject
            </label>

            <input
                name="subject"
            >

            <label>
                Message *
            </label>

            <textarea
                name="message"
                required
            ></textarea>

            <button class="btn">
                SEND MESSAGE
            </button>

        </form>

    </div>

</section>

<?php

include 'includes/footer.php';

?>