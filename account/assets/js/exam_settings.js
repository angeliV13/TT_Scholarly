$(document).ready(function () {
  let inputEnglish = $("#inputEnglish");
  let inputMath = $("#inputMath");
  let inputGenInfo = $("#inputGenInfo");
  let inputAbstract = $("#inputAbstract");
  let items;

  $.ajax({
    type: "POST",
    url: "controller/examSettings.php",
    data: {
      action    : 0
    },
    success: function (data) {
      items = JSON.parse(data);
      console.log(items);
      try {
        inputEnglish.val(items[0]);
        inputMath.val(items[1]);
        inputGenInfo.val(items[2]);
        inputAbstract.val(items[3]);
      }
      catch(err) {
        Swal.fire({
          title: "Error!",
          icon: "error",
          html: err,
        });
      }
    },
  });
});

$("#editExamTotal").on("click", function () {
  let editExamTotal = $(this);
  let inputEnglish = $("#inputEnglish");
  let inputMath = $("#inputMath");
  let inputGenInfo = $("#inputGenInfo");
  let inputAbstract = $("#inputAbstract");

  if (editExamTotal.text() == "Save") {
    Swal.fire({
      title: "Save the Total Items?",
      text: "Are you sure you want to save the items?",
      icon: "question",
      showCancelButton: true,
      confirmButtonText: "Save",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: "controller/examSettings.php",
          data: {
            action: 1,
            english: inputEnglish.val(),
            math: inputMath.val(),
            genInfo: inputGenInfo.val(),
            abstract: inputAbstract.val(),
          },
          success: function (data) {
            if (data == "Change Success") {
              Swal.fire({
                title: "Success!",
                icon: "success",
                html: "Total Items Successfuly Changed",
              });
              inputEnglish.attr("disabled", true);
              inputMath.attr("disabled", true);
              inputGenInfo.attr("disabled", true);
              inputAbstract.attr("disabled", true);
              editExamTotal.text("Edit Total Items");
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
  } else {
    inputEnglish.attr("disabled", false);
    inputMath.attr("disabled", false);
    inputGenInfo.attr("disabled", false);
    inputAbstract.attr("disabled", false);
    editExamTotal.text("Save");
  }
});
