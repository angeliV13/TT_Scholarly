$(document).ready(function () {
  let arrayData;

  $.ajax({
    type: "POST",
    url: "controller/examSettings.php",
    data: {
      action: 4,
    },
    success: function (data) {
      if (
        data == "Access Unauthorized" ||
        data == "You already took the examination"
      ) {
        Swal.fire({
          title: "Access Unauthorized!",
          icon: "error",
          html: data,
        });
        setTimeout(function () {
          location.href = "index.php";
        }, 2000); //will call the function after 2 secs.
      } else {
        // console.log(data);
        arrayData = JSON.parse(data);
        console.log(arrayData);
        $("#exam_container").append(arrayData);
        $("#submitExam").removeClass("d-none");
      }
    },
  });
});

$("form").on("change", function (event) {
  let id = event.target.id.split("_")[1];
  let val = $("#" + event.target.id).val();

  // alert(val);
  // alert(id-1);

  $.ajax({
    type: "POST",
    url: "controller/examSettings.php",
    data: {
      action: 5,
      questionArrayValue: id,
      questionAnswer: val,
    },
    success: function (data) {
      if (data != "Success") {
        Swal.fire({
          title: "Error!",
          icon: "error",
          html: data,
        });
      }
    },
  });
});

function btnAction(action, categ){
  let actionCateg = 0;
  if(action == 1){
    actionCateg = categ - 1;
    $(".question_group_" + categ).addClass("d-none");
    $(".question_group_" + actionCateg).removeClass("d-none");
  }else if(action == 2){
    actionCateg = categ + 1;
    $(".question_group_" + categ).addClass("d-none");
    $(".question_group_" + actionCateg).removeClass("d-none");
  }else if(action == 3){
    Swal.fire({
      title: "Submit Examination?",
      text: "Are you sure you want to submit your examination, kindly double check your answers? This cannot be undone",
      icon: "question",
      showCancelButton: true,
      confirmButtonText: "Submit",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: "controller/examSettings.php",
          data: {
            action: 6,
          },
          success: function (data) {
            if (data == "Success") {
              Swal.fire({
                title: "Submitted!",
                icon: "success",
                html: "Your Examination was submitted successfully",
              });
              setTimeout(function () {
                location.href = "index.php";
             }, 2000); //will call the function after 2 secs.
            } else {
              Swal.fire({
                title: "Error!",
                icon: "error",
                html: data,
              });
            }
          },
        });
      }
    });
  }
  
}
