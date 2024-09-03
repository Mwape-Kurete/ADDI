$(document).ready(function () {
  //Content Tabs
  $(".nav-link").click(function (e) {
    e.preventDefault(); // Prevent the default action (navigation)

    // Debugging: Log which tab was clicked
    console.log("Tab clicked:", $(this).attr("id"));

    // Remove the 'active' class from all tabs
    $(".nav-link").removeClass("active");

    // Add the 'active' class to the clicked tab
    $(this).addClass("active");

    // Hide all content divs
    $(".tab-content").hide();

    // Show the content div that corresponds to the clicked tab
    var target = $(this).data("target");

    // Debugging: Log which content div is being targeted
    console.log("Target content div:", target);

    //explicitly show the contnet
    $("#" + target).css({
      display: "block",
      visibility: "visible",
    });
  });

  document.querySelectorAll(".like-btn").forEach(function (button) {
    button.addEventListener("click", function (event) {
      event.preventDefault();
      this.closest("form").submit();
    });
  });
});
