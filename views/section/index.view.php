<!DOCTYPE html>
<html lang="en">

<head>
    <?php require(base_path('views/partials/head.php')) ?>
    <link rel="stylesheet" href="<?= base_url('views/section/styles.css') ?>">
    <title>Section page</title>
</head>

<body>
    <?php require(base_path('views/partials/navigation.php')) ?>
    <main>
        <div class="top-text">
            <div class="intro-text">
                <h2>Section title</h2>
            </div>
            <a class="create-button" href="/course/<?= $courseSlug ?>/section/<?= $sectionSlug ?>/lesson/create"><i class="bi bi-plus-circle"></i> Create a lesson</a>
        </div>
        <div class="section-info">
            <h2>Section info</h2>
            <div class="span-container">
                <h3 class="span-title">Title:</h3>
                <p class="span-value">Section title</p>
            </div>
            <div class="span-container">
                <h3 class="span-title">Description:</h3>
                <p class="span-value">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sit, fugiat consectetur nam placeat perferendis earum voluptatem omnis ex molestias repudiandae.</p>
            </div>
        </div>
        <div class="lesson-container">
            <h2>Lessons</h2>
            <div class="lessons-container">
                <?php for ($i = 0; $i < 9; $i++) {
                    include(base_path('views/partials/lesson/lesson_card.php'));
                } ?>
            </div>
        </div>
    </main>
    <script src="<?= base_url('views/script.js') ?>"></script>
    <?php require(base_path('views/partials/footer.php')) ?>
</body>

</html>