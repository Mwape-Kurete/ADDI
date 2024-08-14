$(document).ready(function () {
  //Content Tabs
  $(".nav-link").click(function (e) {
    e.preventDefault(); // Prevent the default action (navigation)

    // This will remove the 'active' class from all tabs
    $(".nav-link").removeClass("active");

    // this will add the 'active' class to the clicked tab
    $(this).addClass("active");

    // Hide all content divs
    $(".tab-content").hide();

    // this will show the content div that corresponds to the clicked tab
    var target = $(this).data("target");
    $(target).show();
  });
});
