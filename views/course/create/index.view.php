<!DOCTYPE html>
<html lang="en">

<head>
    <?php require(base_path('views/partials/head.php')) ?>
    <title>Create course</title>
    <link rel="stylesheet" href="<?= base_url('views/course/create/styles.css') ?>" />
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
                                Create course:
                            </h2>
                            <form action="/course/create" method="post" enctype="multipart/form-data">
                                <div class="fields">
                                    <div class="field-title first-entry">Course thumbnail</div>
                                    <div class="form-error">
                                        <div class="image-placeholder">
                                            <i class="bi bi-plus-circle image-icon"></i>
                                        </div>
                                        <img
                                            src=""
                                            class="course-image second-entry"
                                            alt=""
                                            srcset="" style="display: none;" />
                                        <input type="file" name="courseImage" id="courseImage" class="course-image-input" accept="image/*" style="display: none;">
                                        <div class="image-error error"></div>
                                    </div>
                                    <div class="field-title first-entry">Course title</div>
                                    <div class="form-error">
                                        <input
                                            type="text"
                                            class="form-input second-entry"
                                            name="title"
                                            id="title" />
                                        <div class="title-error error"></div>
                                    </div>
                                    <div class="field-title first-entry">Course slug</div>
                                    <div class="form-error">
                                        <input
                                            type="text"
                                            class="form-input second-entry"
                                            name="slug"
                                            id="slug" />
                                        <div class="slug-error error"></div>
                                        <div class="slug-display"></div>
                                    </div>
                                    <div class="field-title first-entry">Course description</div>
                                    <div class="form-error">
                                        <textarea
                                            class="form-input second-entry"
                                            name="description"
                                            id="description"></textarea>
                                        <div class="description-error error"></div>
                                    </div>

                                    <div class="field-title first-entry">Course category</div>
                                    <div class="form-error">
                                        <select
                                            class="form-input second-entry"
                                            name="category"
                                            id="category">
                                            <?php foreach ($categories as $category) : ?>
                                                <?= "<option value=\"{$category['id']}\">{$category['name']}</option>"; ?>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="category-error error"></div>
                                    </div>
                                    <div class="field-title first-entry">Course difficulty</div>
                                    <div class="form-error">
                                        <select
                                            class="form-input second-entry"
                                            name="difficulty"
                                            id="difficulty">
                                            <?php foreach ($difficulties as $difficulty): ?>
                                                <?= "<option value=\"{$difficulty['id']}\">{$difficulty['name']}</option>"; ?>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="difficulty-error error"></div>
                                    </div>
                                    <div class="field-title first-entry">Course price</div>
                                    <div class="form-error">
                                        <input
                                            type="number"
                                            class="form-input second-entry"
                                            name="price"
                                            id="price" />
                                        <div class="price-error error"></div>
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
                                src="<?= base_url('assets/images/content-creating.png') ?>"
                                alt=""
                                srcset="" />
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require(base_path('views/partials/footer.php')) ?>
    <script src="<?= base_url('views/script.js') ?>"></script>
    <script src="<?= base_url("views/course/create/script.js") ?>"></script>
</body>

</html>