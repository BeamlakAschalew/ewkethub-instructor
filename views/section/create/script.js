const form = $("form");

let isValid = true;
let sectionTitleError = true;
let sectionSlugError = true;
let sectionDescriptionError = true;

$(document).ready(function () {
  form.submit(function (e) {
    console.log("Form submitted");
    e.preventDefault();
    validateSubmit();
    if (!courseTitleError && !courseSlugError && !courseDescriptionError) {
      const courseSlug = $(".slag-container").data("url-slag");
      form.attr("action", `/course/${courseSlug}/section/create`);
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

  $("#description").on("input", function () {
    validateDescription();
  });
}

function validateSubmit() {
  validateTitle();
  validateSlug();
  validateDescription();
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

  const courseSlug = $(".slag-container").data("url-slag");

  $.ajax({
    url: `/section-slug-checker/${courseSlug}/${slug}`,
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
        $(".slug-display").text(
          `The section URL will be https://ewkethub.beamlak.dev/course/${courseSlug}/section/${slug}`
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
