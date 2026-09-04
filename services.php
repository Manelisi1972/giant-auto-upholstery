<?php

require_once 'config.php';

$pageTitle = "Our Services";

include 'includes/header.php';

$services = $pdo->query(
    "SELECT *
     FROM services
     WHERE active = 1
     ORDER BY service_id"
)->fetchAll();

?>

<section class="page-banner">

    <h1>
        Our Services
    </h1>

    <p>
        Professional upholstery solutions
    </p>

</section>

<section class="section">

    <div class="service-grid">

<?php foreach ($services as $service): ?>

        <div class="service-card">

            <div class="service-icon">
                
            </div>

            <h2>
                <?= e($service['service_name']) ?>
            </h2>

            <p>
                <?= e($service['description']) ?>
            </p>

            <div class="service-price">

                From R<?= number_format(
                    $service['price'],
                    2
                ) ?>

            </div>

            <a
                class="btn small-btn"
                href="services/<?= e($service['slug']) ?>.php"
            >
                VIEW SERVICE
            </a>

        </div>

<?php endforeach; ?>

    </div>

</section>

<?php

include 'includes/footer.php';

?>