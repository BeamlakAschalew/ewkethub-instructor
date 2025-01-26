<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $course['course_name'] ?></title>
    <?php require(base_path('views/partials/head.php')) ?>
    <link rel="stylesheet" href="<?= base_url('views/course/styles.css') ?>">
</head>

<body>
    <?php require(base_path('views/partials/navigation.php')) ?>
    <main class="wrapper">
        <div class="inside-wrapper">
            <div class="course-editor">
                <div class="course-attributes">
                    <div class="field-image">
                        <div class="field-with-text">
                            <h2 class="top-text">
                                <div>Course detail: <?= $course['course_name'] ?></div>
                                <a class="create-button" href="<?= "/course/{$course['course_slug']}/section/create" ?>"><i class="bi bi-plus-circle"></i> Create a section</a>
                            </h2>
                            <div class="fields">
                                <div class="field-title first-entry">Course thumbnail</div>
                                <img
                                    src="<?= base_url("ewkethub_shared_assets/images/course_thumbnails/{$course['course_thumbnail']}"); ?>"
                                    class="course-image second-entry"
                                    alt=""
                                    srcset="" />
                                <div class="field-title first-entry">Course title</div>
                                <h2><?= $course['course_name'] ?></h2>
                                <div class="field-title first-entry">Course slug</div>
                                <h2><?= $course['course_slug'] ?></h2>
                                <div class="field-title first-entry">Course description</div>
                                <p class="course-detail"><?= $course['course_description']; ?></p>
                                <div class="field-title first-entry">Course category</div>
                                <h2><?= $course['course_category']; ?></h2>
                                <div class="field-title first-entry">Course difficulty</div>
                                <h2><?= $course['difficulty'] ?></h2>
                                <div class="field-title first-entry">Course price</div>
                                <h2><?= $course['price'] ?></h2>
                            </div>
                            <div class="action-buttons">
                                <a href="/course/course-slang/edit" class="submit-button button">Edit</a>
                            </div>
                        </div>
                        <aside>
                            <img
                                src="<?= base_url('assets/images/content-creating.png') ?>"
                                alt=""
                                srcset="" />
                        </aside>
                    </div>
                </div>
            </div>
            <div class="course-sections">
                <div class="top-text">Course sections</div>
                <div class="courses-container">

                    <?php $i = 1;
                    foreach ($sections as $section) {
                        $section['section_name'] = $i . " " . $section['section_name'];
                        include(base_path('views/partials/course/section_card.php'));
                        $i++;
                    } ?>
                </div>
            </div>
        </div>
    </main>
    <?php require(base_path('views/partials/footer.php')) ?>
    <script src="<?= base_url('views/script.js') ?>"></script>
</body>

</html>