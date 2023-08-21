// //Reading Assessment Table for Beneficiaries
$(document).ready(function () {
  let assessmentBeneTable = $("#assessmentBeneTable").DataTable({
      lengthChange: false,
      searching: false,
      ordering: false,
      serverSide: true,
      processing: true,
      ajax: {
        url: "controller/uploadRequirements.php",
        type: "POST",
        data: {
          action: 1,
          getTable: 1,
        },
        // success: function (row, data, index) {
        //   console.log(row);
        //   console.log(data);
        //   console.log(index);
        // },
        error: function (data) {
          console.log(data);
        },
      },
      createdRow: function (row, data, index) {},
      columnDefs: [],
      bInfo: false,
      paging: false,
      fixedColumns: false,
      deferRender: false,
      stateSave: false,
  });
  let applicationTable = $("#applicationTable").DataTable({
    lengthChange: false,
    searching: false,
    ordering: false,
    serverSide: true,
    processing: true,
    ajax: {
      url: "controller/uploadRequirements.php",
      type: "POST",
      data: {
        action: 1,
        getTable: 2,
      },
      // success: function (row, data, index) {
      //   console.log(row);
      //   console.log(data);
      //   console.log(index);
      // },
      error: function (data) {
        console.log(data);
      },
    },
    createdRow: function (row, data, index) {},
    columnDefs: [],
    bInfo: false,
    paging: false,
    fixedColumns: false,
    deferRender: false,
    stateSave: false,
});
});

// School ID
function schoolId(){
  if ($("#btn_na_SchoolId").is(":checked")) {
    $("#divUploadSchoolId").addClass("disabled");
    $("#fileUploadSchoolId").prop("disabled", true);
    $("#viewUploadSchoolId").addClass("disabled");
    $("#textUploadSchoolId").text("");
  } else {
    $("#divUploadSchoolId").removeClass("disabled");
    $("#fileUploadSchoolId").prop("disabled", false);
    $("#viewUploadSchoolId").removeClass("disabled");
  }
}
// $("#btn_na_SchoolId").click(function () {
//   if ($(this).is(":checked")) {
//     $("#divUploadSchoolId").addClass("disabled");
//     $("#fileUploadSchoolId").prop("disabled", true);
//     $("#viewUploadSchoolId").addClass("disabled");
//   } else {
//     $("#divUploadSchoolId").removeClass("disabled");
//     $("#fileUploadSchoolId").prop("disabled", false);
//     $("#viewUploadSchoolId").removeClass("disabled");
//   }
// });

// Clearance
function schoolClearance(){
  if ($("#btn_na_Clearance").is(":checked")) {
    $("#divUploadClearance").addClass("disabled");
    $("#fileUploadClearance").prop("disabled", true);
    $("#viewUploadClearance").addClass("disabled");
    $("#textUploadClearance").text("");
  } else {
    $("#divUploadClearance").removeClass("disabled");
    $("#fileUploadClearance").prop("disabled", false);
    $("#viewUploadClearance").removeClass("disabled");
  }
}
// $("#btn_na_Clearance").click(function () {
//   if ($(this).is(":checked")) {
//     $("#divUploadClearance").addClass("disabled");
//     $("#fileUploadClearance").prop("disabled", true);
//     $("#viewUploadClearance").addClass("disabled");
//   } else {
//     $("#divUploadClearance").removeClass("disabled");
//     $("#fileUploadClearance").prop("disabled", false);
//     $("#viewUploadClearance").removeClass("disabled");
//   }
// });

// Certificate of Registration
function cor() {
  if ($("#btn_na_Cor").is(":checked")) {
    $("#divUploadCor").addClass("disabled");
    $("#fileUploadCor").prop("disabled", true);
    $("#viewUploadCor").addClass("disabled");
    $("#textUploadCor").text("");
  } else {
    $("#divUploadCor").removeClass("disabled");
    $("#fileUploadCor").prop("disabled", false);
    $("#viewUploadCor").removeClass("disabled");
  }
}

// $("#btn_na_Cor").click(function () {
//   if ($(this).is(":checked")) {
//     $("#divUploadCor").addClass("disabled");
//     $("#fileUploadCor").prop("disabled", true);
//     $("#viewUploadCor").addClass("disabled");
//   } else {
//     $("#divUploadCor").removeClass("disabled");
//     $("#fileUploadCor").prop("disabled", false);
//     $("#viewUploadCor").removeClass("disabled");
//   }
// });

// Grade Report
function grade() {
  if ($("#btn_na_Grade").is(":checked")) {
    $("#divUploadGrade").addClass("disabled");
    $("#fileUploadGrade").prop("disabled", true);
    $("#viewUploadGrade").addClass("disabled");
    $("#textUploadGrade").text("");
  } else {
    $("#divUploadGrade").removeClass("disabled");
    $("#fileUploadGrade").prop("disabled", false);
    $("#viewUploadGrade").removeClass("disabled");
  }
}

// $("#btn_na_Grade").click(function () {
//   if ($(this).is(":checked")) {
//     $("#divUploadGrade").addClass("disabled");
//     $("#fileUploadGrade").prop("disabled", true);
//     $("#viewUploadGrade").addClass("disabled");
//   } else {
//     $("#divUploadGrade").removeClass("disabled");
//     $("#fileUploadGrade").prop("disabled", false);
//     $("#viewUploadGrade").removeClass("disabled");
//   }
// });

// Getting the Data File
function getFileData(myFile, inputId) {
  let file = myFile.files[0];
  let filename = file.name;
  $("#textUpload" + inputId).text(filename);
  $("#preview" + inputId).attr("src",URL.createObjectURL(event.target.files[0]));
}

//  Saving
$("#submitAssessment").submit(function (e) {
  e.preventDefault();

  let schoolIdCheck     = ($("#btn_na_SchoolId").is(":checked") == true ? 1 : 0);
  let clearanceCheck    = ($("#btn_na_Clearance").is(":checked") == true ? 1 : 0);
  let corCheck          = ($("#btn_na_Cor").is(":checked") == true ? 1 : 0);
  let gradeCheck        = ($("#btn_na_Grade").is(":checked") == true ? 1 : 0);
  let schoolIdFile, clearanceFile, corFile, gradeFile;
 
  schoolIdFile          = (schoolIdCheck == 1)   ? '0'  : ((document.getElementById("fileUploadSchoolId")  == null) ? '1' : (((document.getElementById("fileUploadSchoolId"))== undefined)  ? '2' : document.getElementById("fileUploadSchoolId").files[0]));
  clearanceFile         = (clearanceCheck == 1)  ? '0'  : ((document.getElementById("fileUploadClearance") == null) ? '1' : (((document.getElementById("fileUploadClearance"))== undefined) ? '2' : document.getElementById("fileUploadClearance").files[0]));
  corFile               = (corCheck == 1)        ? '0'  : ((document.getElementById("fileUploadCor")       == null) ? '1' : (((document.getElementById("fileUploadCor"))== undefined)       ? '2' : document.getElementById("fileUploadCor").files[0]));
  gradeFile             = (gradeCheck == 1)      ? '0'  : ((document.getElementById("fileUploadGrade")     == null) ? '1' : (((document.getElementById("fileUploadGrade"))== undefined)     ? '2' : document.getElementById("fileUploadGrade").files[0]));

  console.log(schoolIdFile);
  console.log(clearanceFile);

  let form_data = new FormData(); 

  form_data.append('action', 2);            
  form_data.append('schoolIdFile', schoolIdFile);
  form_data.append('clearanceFile', clearanceFile);
  form_data.append('corFile', corFile);
  form_data.append('gradeFile', gradeFile);

  Swal.fire({
    title: "Submit Assessment?",
    text: "Are you sure you want to submit your assessment requirements? This cannot be undone",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Submit",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/uploadRequirements.php",
        processData: false,
        contentType: false,
        data: form_data,

        success: function (data) {
          if (data == "Success") {
            let timerInterval;

            Swal.fire({
              title: "Success!",
              icon: "success",
              html: "Upload Success",
              timer: 2000,
              timerProgressBar: true,
              didOpen: () => {
                Swal.showLoading()
              },
              willClose: () => {
                clearInterval(timerInterval)
              }
            }).then((result) => {
              if (result.dismiss) {
                location.reload();
              }
            });
            
          } else {
            console.log(data);
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

  return false;
});

