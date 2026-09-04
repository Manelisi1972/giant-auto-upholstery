<?php

require_once __DIR__ . '/../Configurre.php';

if (!isset($slug)) {
    die("Service not specified.");
}

$stmt = $pdo->prepare(
    "SELECT *
     FROM services
     WHERE slug = ?
     AND active = 1"
);

$stmt->execute([$slug]);

$service = $stmt->fetch();

if (!$service) {
    die("Service not found.");
}

$pageTitle =
    $service['service_name'];

include __DIR__ . '/../includes/header.php';

?>

<section class="page-banner">

    <h1>
        <?= e($service['service_name']) ?>
    </h1>

    <p>
        Giant Auto Upholstery
    </p>

</section>

<section class="content-section">

    <div class="service-detail">

        <div class="large-service-icon">
            
        </div>

        <div>

            <h2>
                <?= e($service['service_name']) ?>
            </h2>

            <p>
                <?= e($service['description']) ?>
            </p>

            <h3>
                Starting Price
            </h3>

            <div class="service-price large">

                R<?= number_format(
                    $service['price'],
                    2
                ) ?>

            </div>

            <p>
                Final pricing may depend on the
                condition, material and scope of work.
            </p>

            <a
                href="../booking.php?service=<?= $service['service_id'] ?>"
                class="btn"
            >
                BOOK THIS SERVICE
            </a>

        </div>

    </div>

</section>

<?php

include __DIR__ . '/../includes/footer.php';

?>