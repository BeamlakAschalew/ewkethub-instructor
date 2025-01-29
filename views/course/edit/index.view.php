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
              <form action="" method="post" enctype="multipart/form-data">
                <h2 class="top-text">
                  Edit course: <?= $course['course_name'] ?>
                </h2>

                <div class="fields">
                  <div class="field-title first-entry">Course thumbnail</div>
                  <div class="second-entry">
                    <div class="image-placeholder">
                      <i class="bi bi-plus-circle image-icon"></i>
                    </div>
                    <img
                      src=""
                      class="course-image-new"
                      alt=""
                      srcset="" style="display: none;" />
                    <input type="file" name="courseImage" id="courseImage" class="course-image-input" accept="image/*" style="display: none;">
                    <img
                      data-image-path="<?= $course['course_thumbnail'] ?>"
                      src="<?= base_url("ewkethub_shared_assets/images/course_thumbnails/{$course['course_thumbnail']}") ?>"
                      class="course-image"
                      alt=""
                      srcset="" />
                  </div>
                  <div class="field-title first-entry">Course title</div>
                  <div class="form-error">
                    <input
                      type="text"
                      class="form-input second-entry"
                      name="title"
                      value="<?= $course['course_name'] ?>"
                      id="title" />
                    <div class="title-error error"></div>
                  </div>
                  <div class="field-title first-entry">Course slug</div>

                  <div class="form-error">
                    <div class="slug-holder" style="display: none;" data-existing-slug="<?= $course['course_slug'] ?>"></div>
                    <input
                      type="text"
                      class="form-input second-entry"
                      name="slug"
                      value="<?= $course['course_slug'] ?>"
                      id="slug" />
                    <div class="slug-error error"></div>
                    <div class="slug-display"></div>
                  </div>
                  <div class="field-title first-entry">Course description</div>
                  <div class="form-error">
                    <textarea
                      class="form-input second-entry"
                      name="description"
                      id="description"><?= $course['course_description'] ?></textarea>
                    <div class="description-error error"></div>
                  </div>
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
                  <div class="field-title first-entry">Course price</div>
                  <div class="form-error">
                    <input
                      type="number"
                      class="form-input second-entry"
                      name="price"
                      id="price" value="<?= $course['price'] ?>" />
                    <div class="price-error error"></div>
                  </div>
                </div>
                <div class="action-buttons">
                  <input
                    class="submit-button button"
                    type="submit"
                    value="Update" />
                  <a href="/course/<?= $course['course_slug'] ?>" class="cancel-button button">Cancel</a>
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
  <script src="<?= base_url('views/course/edit/script.js') ?>"></script>
</body>

</html>