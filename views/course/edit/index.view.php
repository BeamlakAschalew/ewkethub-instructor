<!DOCTYPE html>
<html lang="en">

<head>
  <?php require(base_path('views/partials/head.php')) ?>
  <title>Edit course: <?= $course['course_name'] ?></title>
  <link rel="stylesheet" href="<?= base_url('views/course/edit/styles.css') ?>" />
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
                Edit course: <?= $course['course_name'] ?>
              </h2>
              <div class="fields">
                <div class="field-title first-entry">Course thumbnail</div>
                <img
                  src="<?= base_url("ewkethub_shared_assets/images/course_thumbnails/{$course['course_thumbnail']}") ?>"
                  class="course-image second-entry"
                  alt=""
                  srcset="" />
                <div class="field-title first-entry">Course title</div>
                <input
                  type="text"
                  class="form-input second-entry"
                  name=""
                  value="<?= $course['course_name'] ?>"
                  id="" />
                <div class="field-title first-entry">Course slug</div>
                <input
                  type="text"
                  class="form-input second-entry"
                  name=""
                  value="<?= $course['course_slug'] ?>"
                  id="" />
                <div class="field-title first-entry">Course description</div>
                <textarea
                  class="form-input second-entry"
                  name=""
                  id=""><?= $course['course_description'] ?></textarea>
                <div class="field-title first-entry">Course category</div>
                <select
                  class="form-input second-entry"
                  name="category"
                  id="dropdown-menu">
                  <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category['id'] ?>" <?= $category['name'] == $course['course_category'] ? 'selected' : '' ?>>
                      <?= $category['name'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <div class="field-title first-entry">Course difficulty</div>
                <select
                  class="form-input second-entry"
                  name="difficulty"
                  id="dropdown-menu">
                  <?php foreach ($difficulties as $difficulty): ?>
                    <option value="<?= $difficulty['id'] ?>" <?= $difficulty['name'] == $course['difficulty'] ? 'selected' : '' ?>>
                      <?= $difficulty['name'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="action-buttons">
                <input
                  class="submit-button button"
                  type="submit"
                  value="Update" />
                <a href="" class="cancel-button button">Cancel</a>
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
    </div>
  </main>
  <?php require(base_path('views/partials/footer.php')) ?>
  <script src="<?= base_url('views/script.js') ?>"></script>
</body>

</html>