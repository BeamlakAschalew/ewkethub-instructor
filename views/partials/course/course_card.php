<a href="/course/<?= $courseSlag ?>">
    <div class="course">
        <div class="course-image-container">
            <img
                class="course-image"
                src="<?= base_url("ewkethub_shared_assets/images/course_thumbnails/$imagePath") ?>"
                alt="" />
        </div>
        <div class="course-text">
            <div class="course-title">
                <?= $title ?>
            </div>

            <div class="course-author"><?= $instructorName ?></div>
            <div class="course-price"><?= $price ?>birr</div>
            <div class="course-category"><?= $category ?></div>
        </div>
    </div>
</a>