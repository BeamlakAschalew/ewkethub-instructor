<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course detail</title>
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
                                Course detail:
                            </h2>
                            <div class="fields">
                                <div class="field-title first-entry">Course thumbnail</div>
                                <img
                                    src="../../assets/images/c5.webp"
                                    class="course-image second-entry"
                                    alt=""
                                    srcset="" />
                                <div class="field-title first-entry">Course title</div>
                                <h2>This is a course title</h2>
                                <div class="field-title first-entry">Course slang</div>
                                <h2>unique-course-url</h2>
                                <div class="field-title first-entry">Course description</div>
                                <p class="course-detail">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, reprehenderit! Dolore tempora, cum perferendis iure culpa quia ipsum dicta dolores mollitia sequi. Iste aliquam rem molestias, nostrum delectus maxime! Blanditiis dicta totam at necessitatibus ad consectetur, tempora aspernatur molestias placeat velit ea repellat magnam dolorem, rem dignissimos quibusdam aut eveniet?</p>
                                <div class="field-title first-entry">Course category</div>
                                <h2>Development</h2>
                                <div class="field-title first-entry">Course difficulty</div>
                                <h2>Beginner</h2>
                                <div class="field-title first-entry">Course price</div>
                                <h2>5000</h2>
                            </div>
                            <div class="action-buttons">
                                <a href="/course/edit" class="submit-button button">Edit</a>
                            </div>
                        </div>
                        <aside>
                            <img
                                src="../../assets/images/speaking-2.jpeg"
                                alt=""
                                srcset="" />
                        </aside>
                    </div>
                </div>
            </div>
            <div class="course-sections">
                <div class="top-text">Course sections</div>
                <div class="courses-container">

                    <?php for ($i = 0; $i < 9; $i++) {
                        include(base_path('views/partials/course/section_card.php'));
                    } ?>
                </div>
            </div>
        </div>
    </main>
    <?php require(base_path('views/partials/footer.php')) ?>
    <script src="<?= base_url('views/script.js') ?>"></script>
</body>

</html>