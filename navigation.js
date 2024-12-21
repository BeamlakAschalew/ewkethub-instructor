$(document).ready(function () {
  $(".menu-icon").on("click", function (event) {
    toggleMenu(event);
  });

  $(window).on("resize", function () {
    showMenuOnResize();
  });
});

function toggleMenu(event) {
  event.preventDefault();
  let currentState = $(".menu-icon").attr("class").split(" ")[2];
  if (currentState === "bi-list") {
    openMenu();
  } else {
    closeMenu();
  }
}

function openMenu() {
  $(".search-bar").css({ display: "flex" });
  $(".main-navigation").css({ display: "flex" });
  $(".menu-icon").addClass("bi-x-lg");
  $(".menu-icon").removeClass("bi-list");
}

function closeMenu() {
  $(".search-bar").css({ display: "none" });
  $(".main-navigation").css({ display: "none" });
  $(".menu-icon").removeClass("bi-x-lg");
  $(".menu-icon").addClass("bi-list");
}

function showMenuOnResize() {
  if ($(window).width() > 577) {
    $(".search-bar").css({ display: "flex" });
    $(".main-navigation").css({ display: "flex" });
  }

  let currentState = $(".menu-icon").attr("class").split(" ")[2];

  if ($(window).width() < 577 && currentState === "bi-list") {
    $(".search-bar").css({ display: "none" });
    $(".main-navigation").css({ display: "none" });
  }
}
