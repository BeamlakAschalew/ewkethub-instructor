const form = $("form");

let isValid = true;
let lessonTitleError = true;
let lessonSlugError = true;
let lessonDescriptionError = true;
let lessonVideoError = true;
let uploadedVideoFileName = null;
let selectedFile = null;

const player = new Plyr("#video-player");

$(document).ready(function () {
  form.submit(function (e) {
    e.preventDefault();
    validateSubmit();

    if (
      !lessonTitleError &&
      !lessonSlugError &&
      !lessonDescriptionError &&
      !lessonVideoError
    ) {
      const courseSlug = $(".slug-container").data("url-slug");
      const sectionSlug = $(".section-slug-container").data("url-slug");

      $("<input>")
        .attr({
          type: "hidden",
          name: "uploaded_video",
          value: uploadedVideoFileName,
        })
        .appendTo(form);

      form.attr(
        "action",
        `/course/${courseSlug}/section/${sectionSlug}/lesson/create`
      );
      form.off("submit").submit();
    }
  });

  validateForm();

  $("#uploadfile").on("click", function () {
    $("#lesson_video").click();
  });

  $("#lesson_video").on("change", function () {
    const file = this.files[0];
    if (!file) return;

    const fileName = file.name;
    const fileType = file.type;

    const allowedTypes = ["video/mp4", "video/mkv", "video/quicktime"];

    if (fileName) {
      $(".upload-text").text(fileName);
    } else {
      $(".upload-text").text("Click to upload video");
    }

    if (allowedTypes.includes(fileType)) {
      selectedFile = file;
      $("#manual-upload").show();
    } else {
      alert("Invalid file type. Please upload a video file (MP4, MKV, MOV).");
      $("#lesson_video").val("");
      $(".upload-text").text("Click to upload video");
      $("#video-preview").hide();
    }
  });

  $("#manual-upload").on("click", function () {
    if (selectedFile) {
      uploadVideo(selectedFile);
    }
  });
});

function uploadVideo(file) {
  const formData = new FormData();
  formData.append("file", file);
  $(".video-progress").show();
  $.ajax({
    url: "/upload-video",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    xhr: function () {
      const xhr = new XMLHttpRequest();
      xhr.upload.addEventListener("progress", function (e) {
        if (e.lengthComputable) {
          const percentComplete = (e.loaded / e.total) * 100;
          $(".progress-text").text(`${Math.floor(percentComplete)}%`);
          $(".inner-slider").css("width", `${percentComplete}%`);
        }
      });
      return xhr;
    },
    success: function (response) {
      if (response.success) {
        uploadedVideoFileName = response.fileName;
        const basePath = `${window.location.protocol}//${window.location.host}`;
        const videoURL = `/uploads/videos/lesson_videos/${uploadedVideoFileName}`;
        $("#video-source").attr("src", basePath + videoURL);
        $("#video-preview").show();
        player.source = {
          type: "video",
          sources: [
            {
              src: basePath + videoURL,
              type: "video/mp4",
            },
          ],
        };
        $(".video-error").hide();
        lessonVideoError = false;
      } else {
        alert("Video upload failed. Please try again.");
        $("#lesson_video").val("");
        $(".upload-text").text("Click to upload video");
        $("#video-preview").hide();
        lessonVideoError = true;
      }
    },
    error: function () {
      alert("An error occurred during video upload.");
      $("#lesson_video").val("");
      $(".upload-text").text("Click to upload video");
      $("#video-preview").hide();
      lessonVideoError = true;
    },
  });
}

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
  validateVideo();
}

function validateTitle() {
  let title = $("#title").val();
  if (title.length === 0) {
    $(".title-error").show();
    $(".title-error").text("Lesson name cannot be empty");
    lessonTitleError = true;
  } else if (title.length < 8 || title.length > 90) {
    $(".title-error").show();
    $(".title-error").text("Length of lesson name must be between 8 and 90");
    lessonTitleError = true;
  } else {
    $(".title-error").hide();
    lessonTitleError = false;
  }
}
function validateSlug() {
  let slug = $("#slug").val();
  slug = convertToSlug(slug);

  if (slug.length === 0) {
    $(".slug-error").show();
    $(".slug-error").text("URL slug cannot be empty");
    lessonSlugError = true;
    return;
  } else if (slug.length < 5 || slug.length > 30) {
    $(".slug-error").show();
    $(".slug-error").text(
      "Length of URL slug must be between 5 and 30 characters"
    );
    lessonSlugError = true;
    return;
  } else {
    lessonSlugError = false;
    $(".slug-error").hide();
  }

  const sectionSlugInner = $(".section-slug-container").data("url-slug");
  const courseSlugInner = $(".slug-container").data("url-slug");

  console.log(courseSlugInner, sectionSlugInner, slug);
  $.ajax({
    url: `/lesson-slug-checker/${courseSlugInner}/${sectionSlugInner}/${slug}`,
    method: "GET",
    dataType: "json",
    success: function (data) {
      console.log(data);
      if (!data.available) {
        $(".slug-error").text("This slug is already taken by another course");
        $(".slug-error").show();
        $(".slug-display").hide();
        lessonSlugError = true;
      } else {
        $(".slug-error").hide();
        $("#slug").val(slug);
        $(".slug-display").text(
          `The lesson URL will be https://ewkethub.beamlak.dev/course/${courseSlugInner}/section/${sectionSlugInner}/lesson/${slug}`
        );
        $(".slug-display").show();
        lessonSlugError = false;
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
    lessonDescriptionError = true;
  } else if (description.length < 10 || description.length > 250) {
    $(".description-error").show();
    $(".description-error").text(
      "Length of description must be between 10 and 250"
    );
    lessonDescriptionError = true;
  } else {
    $(".description-error").hide();
    lessonDescriptionError = false;
  }
}

function validateVideo() {
  if (!uploadedVideoFileName) {
    $(".video-error").show();
    $(".video-error").text("Please upload a video");
    lessonVideoError = true;
  } else {
    $(".video-error").hide();
    lessonVideoError = false;
  }
}
