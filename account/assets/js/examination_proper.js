$(document).ready(function () {
  let arrayData;

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
        // console.log(data);
        arrayData = JSON.parse(data);
        console.log(arrayData);
        $('#exam_container').append(arrayData);

      }
    },
  });

  
});

