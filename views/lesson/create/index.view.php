<!DOCTYPE html>
<html lang="en">

<head>
    <?php require(base_path('views/partials/head.php')) ?>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />
    <link rel="stylesheet" href="<?= base_url('/views/lesson/create/styles.css'); ?>">
    <title>Create Lesson</title>
</head>

<body>
    <?php require(base_path('views/partials/navigation.php')) ?>
    <div class="slag-container" data-url-slag="<?= $courseSlug ?>" data-url-sectionSlug="<?= $sectionSlug ?>" style="display: none"></div>
    <main class="wrapper">
        <div class="inside-wrapper">
            <div class="lesson-editor">
                <div class="lesson-attributes">
                    <div class="field-image">
                        <div class="field-with-text">
                            <h2 class="top-text">
                                Create lesson:
                            </h2>
                            <form action="#" method="post">
                                <div class="fields">

                                    <div class="field-title first-entry">Lesson title</div>
                                    <div class="form-error">
                                        <input
                                            type="text"
                                            class="form-input second-entry"
                                            name="title"
                                            id="title" />
                                        <div class="title-error error"></div>
                                    </div>
                                    <div class="field-title first-entry">Lesson slang</div>
                                    <div class="form-error">
                                        <input
                                            type="text"
                                            class="form-input second-entry"
                                            name="slang"
                                            id="slang" />
                                        <div class="slug-error error"></div>
                                    </div>
                                    <div class="field-title first-entry">Lesson description</div>
                                    <div class="form-error">
                                        <textarea
                                            class="form-input second-entry"
                                            name="description"
                                            id="description"></textarea>
                                        <div class="description-error error"></div>
                                    </div>
                                    <div class="field-title first-entry">Lesson video</div>
                                    <div class="form-error">
                                        <div class="video-section">
                                            <div class="custom-file-upload">
                                                <input type="file" class="form-input" name="lesson_video" id="lesson_video" accept="video/*" required />
                                                <div class="upload-area" id="uploadfile">
                                                    <span class="upload-icon">+</span>
                                                    <span class="upload-text">Click to upload video</span>
                                                </div>
                                            </div>
                                            <div class="video-preview" id="video-preview" style="display: none;">
                                                <video id="video-player" class="plyr" controls>
                                                    <source id="video-source" src="" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            </div>
                                        </div>
                                        <div class="video-error error"></div>
                                        <div class="video-progress">
                                            <div class="inner-slider">
                                                <div class="progress-text" id="progress-text">90%</div>
                                            </div>
                                        </div>
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
                                src="<?= base_url('assets/images/video-tutorial.png'); ?>"
                                alt=""
                                srcset="" />
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require(base_path('views/partials/footer.php')) ?>
    <script src="https://cdn.plyr.io/3.6.8/plyr.polyfilled.js"></script>
    <script src="<?= base_url('views/script.js') ?>"></script>
    <script src="<?= base_url('views/lesson/create/script.js') ?>"></script>
</body>

</html>