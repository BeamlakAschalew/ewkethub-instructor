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
                            <h2 class="top-text">
                                Create section:
                            </h2>
                            <div class="fields">

                                <div class="field-title first-entry">Section title</div>
                                <input
                                    type="text"
                                    class="form-input second-entry"
                                    name=""
                                    id="" />
                                <div class="field-title first-entry">Section slang</div>
                                <input
                                    type="text"
                                    class="form-input second-entry"
                                    name=""
                                    id="" />
                                <div class="field-title first-entry">Section description</div>
                                <textarea
                                    class="form-input second-entry"
                                    name=""
                                    id=""></textarea>
                            </div>
                            <div class="action-buttons">
                                <input
                                    class="submit-button button"
                                    type="submit"
                                    value="Create" />
                                <a href="" class="cancel-button button">Cancel</a>
                            </div>
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
</body>

</html>