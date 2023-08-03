$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "controller/examSettings.php",
    data: {
      action: 4,
    },
    success: function (data) {
      if (data == "Access Unauthorized") {
        location.href = "index.php";
      } else {

      }
    },
  });

  
});
