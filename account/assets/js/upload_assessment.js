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
});

// School ID
$("#btn_na_SchoolId").click(function () {
  if ($(this).is(":checked")) {
    $("#divUploadSchoolId").addClass("disabled");
    $("#fileUploadSchoolId").prop("disabled", true);
    $("#viewUploadSchoolId").addClass("disabled");
  } else {
    $("#divUploadSchoolId").removeClass("disabled");
    $("#fileUploadSchoolId").prop("disabled", false);
    $("#viewUploadSchoolId").removeClass("disabled");
  }
});

// Clearance
$("#btn_na_Clearance").click(function () {
  if ($(this).is(":checked")) {
    $("#divUploadClearance").addClass("disabled");
    $("#fileUploadClearance").prop("disabled", true);
    $("#viewUploadClearance").addClass("disabled");
  } else {
    $("#divUploadClearance").removeClass("disabled");
    $("#fileUploadClearance").prop("disabled", false);
    $("#viewUploadClearance").removeClass("disabled");
  }
});

// Certificate of Registration
$("#btn_na_Cor").click(function () {
  if ($(this).is(":checked")) {
    $("#divUploadCor").addClass("disabled");
    $("#fileUploadCor").prop("disabled", true);
    $("#viewUploadCor").addClass("disabled");
  } else {
    $("#divUploadCor").removeClass("disabled");
    $("#fileUploadCor").prop("disabled", false);
    $("#viewUploadCor").removeClass("disabled");
  }
});

// Grade Report
$("#btn_na_Grade").click(function () {
  if ($(this).is(":checked")) {
    $("#divUploadGrade").addClass("disabled");
    $("#fileUploadGrade").prop("disabled", true);
    $("#viewUploadGrade").addClass("disabled");
  } else {
    $("#divUploadGrade").removeClass("disabled");
    $("#fileUploadGrade").prop("disabled", false);
    $("#viewUploadGrade").removeClass("disabled");
  }
});

// Getting the Data File
function getFileData(myFile, inputId) {
  let file = myFile.files[0];
  let filename = file.name;
  $("#" + inputId).text(filename);
}

//  Saving
$("#submitAssessment").submit(function (e) {
  var schoolIdCheck     = $("#btn_na_SchoolId").is(":checked");
  var clearanceCheck    = $("#btn_na_Clearance").is(":checked");
  var corCheck          = $("#btn_na_Cor").is(":checked");
  var gradeCheck        = $("#btn_na_Grade").is(":checked");
  var schoolIdFile      = document.getElementById("fileUploadSchoolId").files[0];
  var clearanceFile     = document.getElementById("fileUploadClearance").files[0];
  var corFile           = document.getElementById("fileUploadCor").files[0];
  var gradeFile         = document.getElementById("fileUploadGrade").files[0];
  var validSchoolId     = false;
  var validClearance    = false;
  var validCor          = false;
  var validGrade        = false;

  var form_data = new FormData();  
  form_data.append('action', 2);
  form_data.append('schoolIdCheck', schoolIdCheck);
  form_data.append('clearanceCheck', clearanceCheck);
  form_data.append('corCheck', corCheck);
  form_data.append('gradeCheck', gradeCheck);                
  form_data.append('schoolIdFile', schoolIdFile);
  form_data.append('clearanceFile', clearanceFile);
  form_data.append('corFile', corFile);
  form_data.append('gradeFile', gradeFile);

  //Validation
  validSchoolId = getFileChecks(schoolIdCheck, schoolIdFile);
  validClearance = getFileChecks(clearanceCheck, clearanceFile);
  validCor = getFileChecks(corCheck, corFile);
  validGrade = getFileChecks(gradeCheck, gradeFile);

  //Check if Requirements are Submitted
  if (
    validSchoolId == false ||
    validClearance == false ||
    validCor == false ||
    validGrade == false
  ) {
    Swal.fire({
      title: "Missing Assessment",
      text: "Assessments documents are missing",
      icon: "error",
    });
  } else {
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
        //   data: {
        //     action: 1,
        //     schoolIdCheck   : schoolIdCheck,
        //     clearanceCheck  : clearanceCheck,
        //     corCheck        : corCheck,
        //     gradeCheck      : gradeCheck,
        //     schoolIdFile    : schoolIdFile,
        //     clearanceFile   : clearanceFile,
        //     corFile         : corFile,
        //     gradeFile       : gradeFile,
        //   },
          success: function (data) {
            if (data == "Insert Success") {
              Swal.fire({
                title: "Success!",
                icon: "success",
                html: "Upload Success",
              });
            } else {
                console.log(data);
            //   Swal.fire({
            //     title: "Error!",
            //     icon: "error",
            //     html: data,
            //   });
            }
          },
        });
      }
    });
  }

  return false;
});

// Checking File
function getFileChecks(check, file) {
  if (check == false) {
    if (file != undefined) {
      return true;
    } else {
      return false;
    }
  }
}
