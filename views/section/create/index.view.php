<!DOCTYPE html>
<html lang="en">

<head>
    <?php require(base_path('views/partials/head.php')) ?>
    <link rel="stylesheet" href="<?= base_url('views/section/create/styles.css') ?>">
    <title>Create section</title>
</head>

<body>
    <?php require(base_path(('views/partials/navigation.php'))) ?>
    <main class="wrapper">
        <div class="inside-wrapper">
            <div class="section-editor">
                <div class="section-attributes">
                    <div class="field-image">
                        <div class="field-with-text">
                            <form action="#" method="post">
                                <h2 class="top-text">
                                    Create section:
                                </h2>
                                <div class="slag-container" data-url-slag="<?= $courseSlug ?>"></div>
                                <div class="fields">
                                    <div class="field-title first-entry">Section title</div>

                                    <div class="form-error">
                                        <input
                                            type="text"
                                            class="form-input second-entry"
                                            name="title"
                                            id="title" />
                                        <div class="title-error error"></div>
                                    </div>
                                    <div class="field-title first-entry">Section slug</div>
                                    <div class="form-error">
                                        <input
                                            type="text"
                                            class="form-input second-entry"
                                            name="slug"
                                            id="slug" />
                                        <div class="slug-error error"></div>
                                        <div class="slug-display"></div>
                                    </div>
                                    <div class="field-title first-entry">Section description</div>
                                    <div class="form-error">
                                        <textarea
                                            class="form-input second-entry"
                                            name="description"
                                            id="description"></textarea>
                                        <div class="description-error error"></div>
                                    </div>
                                </div>
                                <div class="action-buttons">
                                    <input
                                        class="submit-button button"
                                        type="submit"
                                        value="Create" />
                                    <a href="" class="cancel-button button">Cancel</a>
                                </div>
                            </form>
                        </div>
                        <aside>
                            <img
                                src="../../../../assets/images/content-creating.png"
                                alt=""
                                srcset="" />
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require(base_path(('views/partials/footer.php'))) ?>
    <script src="<?= base_url('views/script.js') ?>"></script>
    <script src="<?= base_url('views/section/create/script.js') ?>"></script>
</body>

</html>