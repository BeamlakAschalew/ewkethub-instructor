<!DOCTYPE html>
<html lang="en">

<head>
    <?php require(base_path('views/partials/head.php')) ?>
    <link rel="stylesheet" href="<?= base_url('views/section/styles.css') ?>">
    <title><?= $section['section_name'] ?></title>
</head>

<body>
    <?php require(base_path('views/partials/navigation.php')) ?>
    <main>
        <div class="top-text">
            <div class="intro-text">
                <h2><?= $section['section_name'] ?></h2>
            </div>
            <a class="create-button" href="/course/<?= $courseSlug ?>/section/<?= $sectionSlug ?>/lesson/create"><i class="bi bi-plus-circle"></i> Create a lesson</a>
        </div>
        <div class="section-info">
            <h2>Section info</h2>
            <div class="span-container">
                <h3 class="span-title">Title:</h3>
                <p class="span-value"><?= $section['section_name'] ?></p>
            </div>
            <div class="span-container">
                <h3 class="span-title">Description:</h3>
                <p class="span-value"><?= $section['section_description'] ?></p>
            </div>


        </div>

        <div class="buttons-container">
            <a href="/course/<?= $courseSlug ?>/section/<?= $sectionSlug ?>/edit" class="submit-button button">Edit section</a>
            <form method="POST" action="/course/<?= $courseSlug ?>/section/<?= $sectionSlug ?>/delete">
                <button type="submit" class="delete-button button">Delete section</button>
            </form>
        </div>

        <div class="lesson-container">
            <h2>Lessons</h2>
            <div class="lessons-container">
                <?php
                if (empty($lessons)) {
                    echo "<div class='no-lessons'>No lessons found</div>";
                } else {
                    $i = 1;
                    foreach ($lessons as $lesson) {
                        include(base_path('views/partials/lesson/lesson_card.php'));
                        $i++;
                    }
                }
                ?>
            </div>
        </div>
    </main>
    <script src="<?= base_url('views/script.js') ?>"></script>
    <?php require(base_path('views/partials/footer.php')) ?>
</body>

</html>