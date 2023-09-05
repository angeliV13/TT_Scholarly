$(document).ready(function () {
  $("#examAddChoices").val("");
  let inputEnglish = $("#inputEnglish");
  let inputMath = $("#inputMath");
  let inputGenInfo = $("#inputGenInfo");
  let inputAbstract = $("#inputAbstract");
  let items;

  $.ajax({
    type: "POST",
    url: "controller/examSettings.php",
    data: {
      action: 0,
    },
    success: function (data) {
      items = JSON.parse(data);
      // console.log(items);
      try {
        inputEnglish.val(items[0]);
        inputMath.val(items[1]);
        inputGenInfo.val(items[2]);
        inputAbstract.val(items[3]);
      } catch (err) {
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

$("#examAddChoices").on("keyup", function () {
  let choices = $(this).val().split("\n");

  $("#examAddAnswer option").remove();
  $("#examAddAnswer").append(
    $("<option>", {
      value: 0,
      text: "Select Answer",
    })
  );

  for (let i = 0; i < choices.length; i++) {
    if (choices[i] != "" && choices[i].replace(/^\s+|\s+$/gm,'') != "") {
      $("#examAddAnswer").append(
        $("<option>", {
          value: i + 1,
          text: choices[i],
        })
      );
    }
  }
});

$("#addQuestion").on("click", function () {
  let category = $("input[name='radioAddCategory']:checked").val();
  let examAddQuestion = $("#examAddQuestion").val();
  let examAddChoices = $("#examAddChoices").val().split("\n");
  let examAddAnswer = $("#examAddAnswer").find(":selected").text();

  if(category != undefined && examAddQuestion != "" && examAddChoices != "" && examAddAnswer != "Select Answer"){
    Swal.fire({
      title: "Add Question?",
      text: "Are you sure you want to add this question to your list?",
      icon: "question",
      showCancelButton: true,
      confirmButtonText: "Add",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: "controller/examSettings.php",
          data: {
            action          : 2,
            category        : category,
            examAddQuestion : examAddQuestion,
            examAddChoices  : examAddChoices,
            examAddAnswer   : examAddAnswer,
          },
          success: function (data) {
              if (data == "Success") {
              Swal.fire({
                title: "Success!",
                icon: "success",
                html: "Question added successfully",
              });
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
  }else{
    Swal.fire({
      title: "Error!",
      icon: "error",
      html: "Missing Entries",
    });
  }
  
});

function editQuestion(id)
{
  let category = $("input[name='radioAddCategory']:checked").val();
  let examAddQuestion = $("#examAddQuestion").val();
  let examAddChoices = $("#examAddChoices").val().split("\n");
  let examAddAnswer = $("#examAddAnswer").find(":selected").text();

  if(category != undefined && examAddQuestion != "" && examAddChoices != "" && examAddAnswer != "Select Answer"){
    Swal.fire({
      title: "Edit Question?",
      text: "Are you sure you want to edit this question to your list?",
      icon: "question",
      showCancelButton: true,
      confirmButtonText: "Edit",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: "controller/examSettings.php",
          data: {
            action          : 7,
            id              : id,
            category        : category,
            examAddQuestion : examAddQuestion,
            examAddChoices  : examAddChoices,
            examAddAnswer   : examAddAnswer,
          },
          success: function (data) {
              if (data == "Success") {
              Swal.fire({
                title: "Success!",
                icon: "success",
                html: "Question chenged successfully",
              });
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
  }else{
    Swal.fire({
      title: "Error!",
      icon: "error",
      html: "Missing Entries",
    });
  }
}

function deleteQuestion(id){
  Swal.fire({
    title: "Delete Question?",
    text: "Are you sure you want to delete this question to your list?",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Delete",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/examSettings.php",
        data: {
          action          : 8,
          id              : id,
        },
        success: function (data) {
            if (data == "Success") {
            Swal.fire({
              title: "Success!",
              icon: "success",
              html: "Question deleted successfully",
            });
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

function answerSelection(id){
  let choices = $("#examEditChoices" + id).val().split("\n");

  $("#examEditAnswer" + id + " option").remove();
  $("#examEditAnswer" + id).append(
    $("<option>", {
      value: 0,
      text: "Select Answer",
    })
  );

  for (let i = 0; i < choices.length; i++) {
    if (choices[i] != "" && choices[i].replace(/^\s+|\s+$/gm,'') != "") {
      $("#examEditAnswer" + id).append(
        $("<option>", {
          value: i + 1,
          text: choices[i],
        })
      );
    }
  }
}
