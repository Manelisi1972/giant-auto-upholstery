<?php

require_once 'Configurre.php';

$pageTitle = "Giant Auto Upholstery";

include 'includes/header.php';

?>

<section class="hero">

    <div class="hero-content">

        <p class="hero-small">
            QUALITY • COMFORT • CRAFTSMANSHIP
        </p>

        <h1>
            Premium Upholstery
            <span>
                & Sofa Repair
            </span>
        </h1>

        <p>
            Professional vehicle seat upholstery,
            sofa repairs, interior trim and custom
            upholstery services.
        </p>

        <div class="hero-buttons">

            <a
                href="booking.php"
                class="btn"
            >
                BOOK NOW
            </a>

            <a
                href="services.php"
                class="btn btn-outline"
            >
                VIEW SERVICES
            </a>

        </div>

    </div>

    <div class="hero-box">

        <div class="hero-icon">
            
        </div>

        <h2>
            Expert Upholstery
        </h2>

        <p>
            We restore comfort, style and quality
            to your vehicle and furniture.
        </p>

    </div>

</section>

<section class="section">

    <div class="section-heading">

        <p>
            WHAT WE DO
        </p>

        <h2>
            Our Services
        </h2>

    </div>

    <div class="service-grid">

<?php

$services = $pdo->query(
    "SELECT *
     FROM services
     WHERE active = 1
     LIMIT 6"
)->fetchAll();

foreach ($services as $service):

?>

        <div class="service-card">

            <div class="service-icon">
                ✂
            </div>

            <h3>
                <?= e($service['service_name']) ?>
            </h3>

            <p>
                <?= e($service['description']) ?>
            </p>

            <strong>
                From R<?= number_format(
                    $service['price'],
                    2
                ) ?>
            </strong>

            <a
                href="services/<?= e($service['slug']) ?>.php"
            >
                Learn More →
            </a>

        </div>

<?php endforeach; ?>

    </div>

</section>

<section class="cta">

    <h2>
        Ready to restore your interior?
    </h2>

    <p>
        Book your upholstery service today.
    </p>

    <a
        href="booking.php"
        class="btn"
    >
        BOOK YOUR SERVICE
    </a>

</section>

<?php

include 'includes/footer.php';

?>