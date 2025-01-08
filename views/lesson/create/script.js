$(document).ready(function () {
  const player = new Plyr("#video-player");

  $("#uploadfile").on("click", function () {
    $("#lesson_video").click();
  });

  $("#lesson_video").on("change", function () {
    const file = this.files[0];
    const fileName = file.name;
    const fileType = file.type;

    if (fileName) {
      $(".upload-text").text(fileName);
    } else {
      $(".upload-text").text("Click to upload video");
    }

    if (
      fileType === "video/mp4" ||
      fileType === "video/mkv" ||
      fileType === "video/mov"
    ) {
      const videoURL = URL.createObjectURL(file);
      $("#video-source").attr("src", videoURL);
      $("#video-preview").show();
      player.source = {
        type: "video",
        sources: [
          {
            src: videoURL,
            type: fileType,
          },
        ],
      };
    } else {
      alert("Invalid file type. Please upload a video file (MP4, MKV, MOV).");
      $("#lesson_video").val("");
      $(".upload-text").text("Click to upload video");
      $("#video-preview").hide();
    }
  });
});
