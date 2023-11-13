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

// Next Previous Submit button
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

// Modal on Load
$(window).on('load', function() {
  let instruction = (localStorage.getItem("examInstruction") ? localStorage.getItem("examInstruction") : 0);

  if (instruction <= 0){
    $('#instructionsModal').modal('show');
  }
    
});

// Start Exam
$("#start_exam").on("click", function(e){
  $('#instructionsModal').modal('hide');
  localStorage.setItem("examInstruction", 1);
});

// Cancel Exam
$("#cancel_exam").on("click", function(e){
  window.location.href = "index.php?nav=examination";
});

var hms = $("#time").text(); 
var a = hms.split(':'); 

// minutes are worth 60 seconds. Hours are worth 60 minutes.
var time_in_secs = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]); 

let start = time_in_secs;
let current = localStorage.getItem("exam_timer") || 0;

let countDown = () => {
  if (current <= 0) {
    localStorage.setItem("exam_timer", start);
    current = 0;
  } else {
    current--;
    localStorage.setItem("exam_timer", current);
  }

  let hours = ('00' + Math.floor(current / 3600)).slice(-2);
  let minutes = ('00' + Math.floor((current - (hours * 3600)) / 60)).slice(-2);
  let seconds = ('00' + (current % 60)).slice(-2);
  $('#time').text(hours + ':' + minutes + ':' + seconds);

  if(hours == "00" && minutes == "00" && seconds == "00"){
    localStorage.removeItem("examInstruction");
    submitExamFromTimer();
  }

};

let startCountdown = () => {
  countDown();
  let interval = setInterval(countDown, 1000);
}

$('#start_exam').click(function() {
	if (current != 0)
  	return;
    
  $('#time').text(current);
  startCountdown();
});

if (current != 0)
  startCountdown();

function submitExamFromTimer(){
  Swal.fire({
    title: "Alert!",
    html: "Exam will now be submitted because the Examination Period is ended",
    timer: 2500,
    timerProgressBar: true,
  }).then((result) => {
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
            html: "Your Examination was submitted because it reached the time limit",
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
  });
}