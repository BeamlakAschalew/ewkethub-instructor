<!DOCTYPE html>
<html lang="en">

<head>

    <?php require(base_path('views/partials/head.php')) ?>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />
    <link rel="stylesheet" href="<?= base_url('views/lesson/styles.css') ?>">
    <title>Document</title>
</head>

<body>
    <?php require(base_path('views/partials/navigation.php')) ?>
    <main class="main-wrapper">
        <div class="inside-wrapper">
            <h2 class="top-text">
                Lesson: lesson name:
            </h2>
            <div class="lesson-content">
                <div class="lesson-video">
                    <video class="plyr" controls>
                        <source src="<?= base_url('assets/videos/video.mp4') ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="lesson-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                </div>
            </div>
        </div>
        <div class="side-image">
            <img src="<?= base_url('assets/images/video.png') ?>" alt="" srcset="">
        </div>
    </main>
    <?php require(base_path('views/partials/footer.php')) ?>
    <script src="<?= base_url('views/script.js') ?>"></script>
    <script src="https://cdn.plyr.io/3.6.8/plyr.polyfilled.js"></script>
    <script>
        const player = new Plyr('.plyr');
    </script>
</body>

</html>