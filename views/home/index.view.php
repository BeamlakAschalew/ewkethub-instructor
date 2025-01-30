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
        <h2>Welcome back, <?= $instructor['fullName'] ?></h2>
      </div>
      <a class="create-button" href="/course/create"><i class="icon bi bi-plus-circle"></i> Create a course</a>
    </div>
    <h3>Total students: <?= $totalStudents ?></h3>
    <h3>Your courses:</h3>
    <div class="courses-list">

      <?php
      if (count($courses) == 0) {
        echo '<div class="no-course"><div>You have no courses created</div><a class="create-button" href="/course/create"><i class="bi bi-plus-circle"></i> Create a course</a></div>';
      } else {
        foreach ($courses as $course) {

          $title = $course['course_name'];
          $description = $course['course_description'];
          $imagePath = $course['course_thumbnail'];
          $instructorName = $course['course_instructor'];
          $price = $course['price'];
          $category = $course['course_category'];
          $courseSlag = $course['course_slug'];
          include base_path('views/partials/course/course_card.php');
        }
      } ?>

    </div>
  </main>
  <?php require base_path('views/partials/footer.php') ?>
  <script src="<?= base_url('views/script.js') ?>"></script>
</body>

</html>