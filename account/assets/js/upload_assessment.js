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
  let renewalBeneTable = $("#renewalBeneTable").DataTable({
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
        getTable: 3,
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

// Dynamic Button Not Applicable
function buttonNotApplicable(requirement){
  if ($("#btn_na_"+requirement).is(":checked")) {
    $("#divUpload"+requirement).addClass("disabled");
    $("#fileUpload"+requirement).prop("disabled", true);
    $("#viewUpload"+requirement).addClass("disabled");
    $("#textUpload"+requirement).text("");
  } else {
    $("#divUpload"+requirement).removeClass("disabled");
    $("#fileUpload"+requirement).prop("disabled", false);
    $("#viewUpload"+requirement).removeClass("disabled");
  }
}

//  Saving
$("#submitApplicationFile").submit(function (e) {
  e.preventDefault();

  let corCheck            = ($("#btn_na_3").is(":checked") == true ? 1 : 0);
  let gradesCheck         = ($("#btn_na_4").is(":checked") == true ? 1 : 0);
  let cobCheck            = ($("#btn_na_5").is(":checked") == true ? 1 : 0);
  let cgmcCheck           = ($("#btn_na_6").is(":checked") == true ? 1 : 0);
  let idpicCheck          = ($("#btn_na_7").is(":checked") == true ? 1 : 0);
  let mapCheck            = ($("#btn_na_8").is(":checked") == true ? 1 : 0);
  let brgyclearanceCheck  = ($("#btn_na_9").is(":checked") == true ? 1 : 0);
  let parvoteidCheck      = ($("#btn_na_10").is(":checked") == true ? 1 : 0);
  let appvoteidCheck      = ($("#btn_na_11").is(":checked") == true ? 1 : 0);
  let itrCheck            = ($("#btn_na_12").is(":checked") == true ? 1 : 0);
  // let indigencyCheck      = ($("#btn_na_13").is(":checked") == true ? 1 : 0);
 
  let corFile             = (corCheck           == 1) ? '0'  : ((document.getElementById("fileUpload3")   == null) ? '1' : ((document.getElementById("fileUpload3") === undefined) ? '2' : document.getElementById("fileUpload3").files[0]));
  let gradesFile          = (gradesCheck        == 1) ? '0'  : ((document.getElementById("fileUpload4")   == null) ? '1' : ((document.getElementById("fileUpload4") === undefined) ? '2' : document.getElementById("fileUpload4").files[0]));
  let cobFile             = (cobCheck           == 1) ? '0'  : ((document.getElementById("fileUpload5")   == null) ? '1' : ((document.getElementById("fileUpload5") === undefined) ? '2' : document.getElementById("fileUpload5").files[0]));
  let cgmcFile            = (cgmcCheck          == 1) ? '0'  : ((document.getElementById("fileUpload6")   == null) ? '1' : ((document.getElementById("fileUpload6") === undefined) ? '2' : document.getElementById("fileUpload6").files[0]));
  let idpicFile           = (idpicCheck         == 1) ? '0'  : ((document.getElementById("fileUpload7")   == null) ? '1' : ((document.getElementById("fileUpload7") === undefined) ? '2' : document.getElementById("fileUpload7").files[0]));
  let mapFile             = (mapCheck           == 1) ? '0'  : ((document.getElementById("fileUpload8")   == null) ? '1' : ((document.getElementById("fileUpload8") === undefined) ? '2' : document.getElementById("fileUpload8").files[0]));
  let brgyclearanceFile   = (brgyclearanceCheck == 1) ? '0'  : ((document.getElementById("fileUpload9")   == null) ? '1' : ((document.getElementById("fileUpload9") === undefined) ? '2' : document.getElementById("fileUpload9").files[0]));
  let parvoteidFile       = (parvoteidCheck     == 1) ? '0'  : ((document.getElementById("fileUpload10")  == null) ? '1' : ((document.getElementById("fileUpload10")=== undefined) ? '2' : document.getElementById("fileUpload10").files[0]));
  let appvoteidFile       = (appvoteidCheck     == 1) ? '0'  : ((document.getElementById("fileUpload11")  == null) ? '1' : ((document.getElementById("fileUpload11")=== undefined) ? '2' : document.getElementById("fileUpload11").files[0]));
  let itrFile             = (itrCheck           == 1) ? '0'  : ((document.getElementById("fileUpload12")  == null) ? '1' : ((document.getElementById("fileUpload12")=== undefined) ? '2' : document.getElementById("fileUpload12").files[0]));
  // let indigencyFile       = (indigencyCheck     == 1) ? '0'  : ((document.getElementById("fileUpload13")  == null) ? '1' : (((document.getElementById("fileUpload13"))== undefined) ? '2' : document.getElementById("fileUpload13").files[0]));

  let form_data = new FormData(); 

  form_data.append('action', 3);            
  form_data.append('corFile'          , corFile);
  form_data.append('gradesFile'       , gradesFile);
  form_data.append('cobFile'          , cobFile);
  form_data.append('cgmcFile'         , cgmcFile);
  form_data.append('idpicFile'        , idpicFile);
  form_data.append('mapFile'          , mapFile);
  form_data.append('brgyclearanceFile', brgyclearanceFile);
  form_data.append('parvoteidFile'    , parvoteidFile);
  form_data.append('appvoteidFile'    , appvoteidFile);
  form_data.append('itrFile'          , itrFile);
  // form_data.append('indigencyFile'    , indigencyFile);
  

  if(corFile === undefined || gradesFile === undefined || cobFile === undefined || cgmcFile === undefined || idpicFile === undefined || idpicFile === undefined || mapFile === undefined || brgyclearanceFile === undefined || parvoteidFile === undefined || appvoteidFile === undefined || itrFile === undefined) {
    Swal.fire({
      title: "Error!",
      icon: "error",
      html: "One or more file/s is/are not submitted",
    });
  } else {
    Swal.fire({
      title: "Submit Application?",
      text: "Are you sure you want to submit your application requirements? This cannot be undone",
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
  }

  return false;
});

//  Saving
$("#submitRenewal").submit(function (e) {
  e.preventDefault();

  let schoolIdCheck       = ($("#btn_na_1").is(":checked") == true ? 1 : 0);
  let corCheck            = ($("#btn_na_3").is(":checked") == true ? 1 : 0);
 
  let schoolIdFile        = (schoolIdCheck      == 1) ? '0'  : ((document.getElementById("fileUpload1")   == null) ? '1' : (((document.getElementById("fileUpload1"))== undefined)  ? '2' : document.getElementById("fileUpload1").files[0]));
  let corFile             = (corCheck           == 1) ? '0'  : ((document.getElementById("fileUpload3")   == null) ? '1' : (((document.getElementById("fileUpload3"))== undefined)  ? '2' : document.getElementById("fileUpload3").files[0]));

  let form_data = new FormData(); 

  form_data.append('action', 4);     
  form_data.append('schoolIdFile'     , schoolIdFile);       
  form_data.append('corFile'          , corFile);
  

  Swal.fire({
    title: "Submit Renewal?",
    text: "Are you sure you want to submit your renewal requirements? This cannot be undone",
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

