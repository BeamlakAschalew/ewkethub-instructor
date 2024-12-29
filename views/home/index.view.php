<!DOCTYPE html>
<html lang="en">

<head>
  <?php require base_path('views/partials/head.php') ?>
  <title>Home</title>
  <link rel="stylesheet" href="<?= base_url('views/home/styles.css') ?>" />
</head>

<body>
  <?php require base_path('views/partials/navigation.php') ?>
  <main>
    <div class="top-text">
      <div class="intro-text">
        <h2>Welcome back Instructor name</h2>
      </div>
      <a class="create-button" href="/course/create"><i class="bi bi-plus-circle"></i> Create a course</a>
    </div>
    <h3>Your courses:</h3>
    <div class="courses-list">

      <?php foreach ($courses as $course) {

        $title = $course['title'];
        $description = $course['description'];
        include base_path('views/partials/course/course_card.php');
      } ?>

    </div>
  </main>
  <?php require base_path('views/partials/footer.php') ?>
  <script src="<?= base_url('views/script.js') ?>"></script>
</body>

</html>