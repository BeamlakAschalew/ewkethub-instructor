const form = $("form");

let isValid = true;
let courseThumbnailError = true;
let courseTitleError = true;
let courseSlugError = true;
let courseDescriptionError = true;
let courseCategoryError = true;
let courseDifficulty = true;
let coursePriceError = true;

$(document).ready(function () {
  $(".image-placeholder").on("click", function () {
    $("#courseImage").click();
  });

  $("#courseImage").on("change", function (event) {
    const file = event.target.files[0];

    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        $(".course-image").attr("src", e.target.result);
        $(".course-image").show();
        $(".image-placeholder").hide();
        validateImage();
      };
      reader.readAsDataURL(file);
    }
  });

  form.submit(function (e) {
    e.preventDefault();
    validateSubmit();
    if (
      !courseThumbnailError &&
      !courseTitleError &&
      !courseSlugError &&
      !courseDescriptionError &&
      !coursePriceError
    ) {
      form.off("submit").submit();
    }
  });

  validateForm();
});

function validateForm() {
  $("#title").on("input", function () {
    validateTitle();
  });

  $("#slug").on("input", function () {
    validateSlug();
  });

  $("#courseImage").on("input", function () {
    validateImage();
  });

  $("#description").on("input", function () {
    validateDescription();
  });

  $("#price").on("input", function () {
    validatePrice();
  });
}

function validateSubmit() {
  validateImage();
  validateTitle();
  validateSlug();
  validateDescription();
  validatePrice();
}

function validateImage() {
  let image = $(".course-image").attr("src");
  if (image === "") {
    courseThumbnailError = true;
    $(".image-error").text("Set a YouTube style thumbnail for your course");
  } else {
    $(".image-error").hide();
    courseThumbnailError = false;
  }
}

function validateTitle() {
  let title = $("#title").val();
  if (title.length === 0) {
    $(".title-error").show();
    $(".title-error").text("Course name cannot be empty");
    courseTitleError = true;
  } else if (title.length < 8 || title.length > 90) {
    $(".title-error").show();
    $(".title-error").text("Length of course name must be between 8 and 90");
    courseTitleError = true;
  } else {
    $(".title-error").hide();
    courseTitleError = false;
  }
}

function validateSlug() {
  let slug = $("#slug").val();
  slug = convertToSlug(slug);
  $("#slug").val(slug);
  if (slug.length === 0) {
    $(".slug-error").show();
    $(".slug-error").text("URL slug cannot be empty");
    courseSlugError = true;
    return;
  } else if (slug.length < 5 || slug.length > 30) {
    $(".slug-error").show();
    $(".slug-error").text(
      "Length of URL slug must be between 5 and 30 characters"
    );
    courseSlugError = true;
    return;
  } else {
    courseSlugError = false;
    $(".slug-error").hide();
  }

  $.ajax({
    url: `/course-slug-checker/${slug}`,
    method: "GET",
    dataType: "json",
    success: function (data) {
      if (!data.available) {
        $(".slug-error").text("This slug is already taken by another course");
        $(".slug-error").show();
        $(".slug-display").hide();
        courseSlugError = true;
      } else {
        $(".slug-error").hide();
        $(".slug-display").show();
        $(".slug-display").text(
          `The course URL will be https://ewkethub.beamlak.dev/course/${slug}`
        );
        courseSlugError = false;
      }
    },
    error: function (xhr, status, error) {
      console.error("Error fetching search results:", error);
    },
  });
}

function convertToSlug(str) {
  return str
    .toLowerCase()
    .trim()
    .replace(/[^a-z0-9-\s]/g, "")
    .replace(/\s+/g, "-");
}
function validateDescription() {
  let description = $("#description").val();
  if (description.length === 0) {
    $(".description-error").show();
    $(".description-error").text("Description cannot be empty");
    courseDescriptionError = true;
  } else if (description.length < 10 || description.length > 250) {
    $(".description-error").show();
    $(".description-error").text(
      "Length of description must be between 10 and 250"
    );
    courseDescriptionError = true;
  } else {
    $(".description-error").hide();
    courseDescriptionError = false;
  }
}

function validatePrice() {
  let price = $("#price").val();
  if (price.length === 0) {
    $(".price-error").text("Set a price for your course");
    coursePriceError = true;
  } else {
    $(".price-error").hide();
    coursePriceError = false;
  }
}
