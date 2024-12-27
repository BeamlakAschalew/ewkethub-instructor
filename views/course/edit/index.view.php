<!DOCTYPE html>
<html lang="en">

<head>
  <?php require(base_path('views/partials/head.php')) ?>
  <title>Course Details</title>
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
                Edit course: The Complete 2024 Web Development Bootcamp
              </h2>
              <div class="fields">
                <div class="field-title first-entry">Course thumbnail</div>
                <img
                  src="../../assets/images/c5.webp"
                  class="course-image second-entry"
                  alt=""
                  srcset="" />
                <div class="field-title first-entry">Course title</div>
                <input
                  type="text"
                  class="form-input second-entry"
                  name=""
                  id="" />
                <div class="field-title first-entry">Course slang</div>
                <input
                  type="text"
                  class="form-input second-entry"
                  name=""
                  id="" />
                <div class="field-title first-entry">Course description</div>
                <textarea
                  class="form-input second-entry"
                  name=""
                  id=""></textarea>
                <div class="field-title first-entry">Course category</div>
                <select
                  class="form-input second-entry"
                  name="category"
                  id="dropdown-menu">
                  <option value="option1">Option 1</option>
                  <option value="option2">Option 2</option>
                  <option value="option3">Option 3</option>
                </select>
                <div class="field-title first-entry">Course difficulty</div>
                <select
                  class="form-input second-entry"
                  name="difficulty"
                  id="dropdown-menu">
                  <option value="option1">Beginner</option>
                  <option value="option2">Intermediate</option>
                  <option value="option3">Advanced</option>
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
                src="../../assets/images/speaking-2.jpeg"
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