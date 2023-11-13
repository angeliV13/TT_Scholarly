let applicationId = $("#applicationId").val();

// if (applicationId != ""){
//   $("#viewInfoModal4").modal("show");
// }

$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "controller/basicSetup.php",
    data: {
      action: 0.1,
    },
    success: function (data) {
      if (data != 0) {
        $("#sem" + data).prop("checked", true);
      } else {
        Swal.fire({
          title: "Error!",
          icon: "error",
          html: data,
        });
      }
    },
  });

  // Acad Year Table
  let acadYearTable = $("#acadYearTable").DataTable({
    lengthChange: false,
    searching: false,
    ordering: false,
    serverSide: true,
    processing: true,
    ajax: {
      url: "controller/basicSetup.php",
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

  // Set Assessment Table
  let setApplicationTable = $("#setApplicationTable").DataTable({
    lengthChange: false,
    searching: false,
    ordering: false,
    serverSide: true,
    processing: true,
    ajax: {
      url: "controller/basicSetup.php",
      type: "POST",
      data: {
        action: 1,
        getTable: 7,
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

  // Set Assessment Table
  let setAssessmentTable = $("#setAssessmentTable").DataTable({
    lengthChange: false,
    searching: false,
    ordering: false,
    serverSide: true,
    processing: true,
    ajax: {
      url: "controller/basicSetup.php",
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

  let setRenewalTable = $("#setRenewalTable").DataTable({
    lengthChange: false,
    searching: false,
    ordering: false,
    serverSide: true,
    processing: true,
    ajax: {
      url: "controller/basicSetup.php",
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

  let setExamTable = $("#setExamTable").DataTable({
    lengthChange: false,
    searching: false,
    ordering: false,
    serverSide: true,
    processing: true,
    ajax: {
      url: "controller/basicSetup.php",
      type: "POST",
      data: {
        action: 1,
        getTable: 4,
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

  // -----------------------------------------------------------------
  // EA Income Table
  let indicatorEAIncomeTable = $("#indicatorEAIncomeTable").DataTable({
    lengthChange: false,
    searching: false,
    ordering: false,
    serverSide: true,
    processing: true,
    ajax: {
      url: "controller/basicSetup.php",
      type: "POST",
      data: {
        action: 1,
        getTable: 5,
        tableCategory: 1,
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

  // EA Grade Table
  let indicatorEAGradeTable = $("#indicatorEAGradeTable").DataTable({
    lengthChange: false,
    searching: false,
    ordering: false,
    serverSide: true,
    processing: true,
    ajax: {
      url: "controller/basicSetup.php",
      type: "POST",
      data: {
        action: 1,
        getTable: 5,
        tableCategory: 2,
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

  // EA School Type Table
  let indicatorEASchoolTypeTable = $("#indicatorEASchoolTypeTable").DataTable({
    lengthChange: false,
    searching: false,
    ordering: false,
    serverSide: true,
    processing: true,
    ajax: {
      url: "controller/basicSetup.php",
      type: "POST",
      data: {
        action: 1,
        getTable: 5,
        tableCategory: 3,
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

  // EA Residency Table
  let indicatorEAResidencyTable = $("#indicatorEAResidencyTable").DataTable({
    lengthChange: false,
    searching: false,
    ordering: false,
    serverSide: true,
    processing: true,
    ajax: {
      url: "controller/basicSetup.php",
      type: "POST",
      data: {
        action: 1,
        getTable: 5,
        tableCategory: 4,
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

  // -----------------------------------------------------------------
  // SC Examination Table
  let indicatorSCExaminationTable = $("#indicatorSCExaminationTable").DataTable({
    lengthChange: false,
    searching: false,
    ordering: false,
    serverSide: true,
    processing: true,
    ajax: {
      url: "controller/basicSetup.php",
      type: "POST",
      data: {
        action: 1,
        getTable: 6,
        tableCategory: 5,
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

  // SC Income Table
  let indicatorSCIncomeTable = $("#indicatorSCIncomeTable").DataTable({
    lengthChange: false,
    searching: false,
    ordering: false,
    serverSide: true,
    processing: true,
    ajax: {
      url: "controller/basicSetup.php",
      type: "POST",
      data: {
        action: 1,
        getTable: 6,
        tableCategory: 1,
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

  // SC Grade Table
  let indicatorSCGradeTable = $("#indicatorSCGradeTable").DataTable({
    lengthChange: false,
    searching: false,
    ordering: false,
    serverSide: true,
    processing: true,
    ajax: {
      url: "controller/basicSetup.php",
      type: "POST",
      data: {
        action: 1,
        getTable: 6,
        tableCategory: 2,
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

  // SC Residency Table
  let indicatorSCResidencyTable = $("#indicatorSCResidencyTable").DataTable({
    lengthChange: false,
    searching: false,
    ordering: false,
    serverSide: true,
    processing: true,
    ajax: {
      url: "controller/basicSetup.php",
      type: "POST",
      data: {
        action: 1,
        getTable: 6,
        tableCategory: 4,
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

$("#indicatorEAIncomeTable").on("click", "td", function (){
  $(this).find('input').removeClass("d-none");
  $(this).find('input').focus();
  $(this).find('div').addClass("d-none");
});

$("#indicatorEAGradeTable").on("click", "td", function (){
  $(this).find('input').removeClass("d-none");
  $(this).find('input').focus();
  $(this).find('div').addClass("d-none");
});

$("#indicatorEASchoolTypeTable").on("click", "td", function (){
  $(this).find('input').removeClass("d-none");
  $(this).find('input').focus();
  $(this).find('div').addClass("d-none");
});

$("#indicatorEAResidencyTable").on("click", "td", function (){
  $(this).find('input').removeClass("d-none");
  $(this).find('input').focus();
  $(this).find('div').addClass("d-none");
});

// --------------------------------------------------------------

$("#indicatorSCExaminationTable").on("click", "td", function (){
  $(this).find('input').removeClass("d-none");
  $(this).find('input').focus();
  $(this).find('div').addClass("d-none");
});

$("#indicatorSCIncomeTable").on("click", "td", function (){
  $(this).find('input').removeClass("d-none");
  $(this).find('input').focus();
  $(this).find('div').addClass("d-none");
});

$("#indicatorSCGradeTable").on("click", "td", function (){
  $(this).find('input').removeClass("d-none");
  $(this).find('input').focus();
  $(this).find('div').addClass("d-none");
});

$("#indicatorSCResidencyTable").on("click", "td", function (){
  $(this).find('input').removeClass("d-none");
  $(this).find('input').focus();
  $(this).find('div').addClass("d-none");
});

//SC and EA Indicator
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

if(urlParams.get('nav') == 'tts_indicators_sc' || urlParams.get('nav') == 'tts_indicators_ea'){
  let indicator =  (urlParams.get('nav') == 'tts_indicators_sc') ? 1 : 2 ;
  $.ajax({
    type: "POST",
    url: "controller/basicSetup.php",
    data: {
      action: 5.4,
      indicator : indicator,
    },
    success: function (data) {
      // console.log(data);
      if (data != "") {
        let records = JSON.parse(data);
        if(indicator == 1){
          records.forEach(record => {
            switch (record[0]){
              case "5":
                $('#inputExamIndicator_Sc').val(record[1]);
                break;
              case "2":
                $('#inputGradeIndicator_Sc').val(record[1]);
                break;
              case "1":
                $('#inputIncomeIndicator_Sc').val(record[1]);
                break;
              case "4":
                $('#inputResidencyIndicator_Sc').val(record[1]);
                break;
            }
          });
        }else if(indicator == 2){
          records.forEach(record => {
            switch (record[0]){
              case "1":
                $('#inputIncomeIndicator_Ea').val(record[1]);
                break;
              case "2":
                $('#inputGradeIndicator_Ea').val(record[1]);
                break;
              case "3":
                $('#inputSchoolTypeIndicator_Ea').val(record[1]);
                break;
              case "4":
                $('#inputResidencyIndicator_Ea').val(record[1]);
                break;
            }
          });
        }
        

      }
    },
  });
}


//------------------------------------------------------------------
// AcadYear
$("#generate_ay").on("click", function (e) {
  Swal.fire({
    title: "Generate Academic Year?",
    text: "Are you sure you want to generate new academic year?",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Generate",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/basicSetup.php",
        data: {
          action: 1.1,
        },
        success: function (data) {
          if (data == "Insert Success") {
            Swal.fire({
              title: "Success!",
              icon: "success",
              html: "Generated new academic year",
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

  return false;
});

function defaultAY(id) {
  Swal.fire({
    title: "Make default AY " + id + "-" + (id + 1) + "?",
    text: "Are you sure you want to make this academic year default?",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Make Default",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/basicSetup.php",
        data: {
          action: 1.2,
          id: id,
        },
        success: function (data) {
          console.log(data);
          if (data == "Default Updated Successfully") {
            Swal.fire({
              title: "Success!",
              icon: "success",
              html: data,
            }).then((result) => {
              location.reload();
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

function readOnlyAY(ay, id, status) {
  let action = (status == 1) ? "Show" : "Unshow";
  let title = (status == 1) ? "Show AY " + ay + "-" + (ay + 1) + "?" : "Unshow AY " + ay + "-" + (ay + 1) + "?";

  Swal.fire({
    title: title,
    text: "Are you sure you want to" + action + " this Academic Year?",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: action,
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/basicSetup.php",
        data: {
          action: 1.4,
          id: id,
          status: status,
        },
        success: function (data) {
          console.log(data);
          if (data == "Success") {
            Swal.fire({
              title: "Success!",
              icon: "success",
              html: 'You can now view AY ' + ay + '-' + (ay + 1) + '!',
            }).then((result) => {
              location.reload();
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

function deleteAY(id) {
  Swal.fire({
    title: "Delete the AY " + id + "-" + (id + 1) + "?",
    text: "Are you sure you want to generate new academic year?",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Generate",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/basicSetup.php",
        data: {
          action: 1.3,
          id: id,
        },
        success: function (data) {
          if (data == "Deleted Successfully") {
            Swal.fire({
              title: "Success!",
              icon: "success",
              html: data,
            }).then((result) => {
              location.reload();
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

//------------------------------------------------------------------
// Semester
$("input[name=semOptions]").on("change", function (e) {
  let sem = $(this).val();
  let semId = "sem" + sem;

  if (sem == 1) {
    $("#sem2").prop("checked", true);
  } else if (sem == 2) {
    $("#sem1").prop("checked", true);
  }

  $(this).prop("checked", false);
  Swal.fire({
    title: "Change Semester?",
    text: "Are you sure you want to switch semester?",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Switch",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/basicSetup.php",
        data: {
          action: 0.2,
          sem: sem,
        },
        success: function (data) {
          if (data == "Success") {
            location.reload();
            // $("#"+semId).prop('checked', true);
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

  return false;
});

// -----------------------------------------------------------------
// Set Application
function addSetApplication() {
  let startDate = $("#applicationStartDate").val();
  let endDate = $("#applicationEndDate").val();
  let shs = $("#applicationShsCheckBox").prop("checked");
  let colEAPub = $("#applicationColEAPubCheckBox").prop("checked");
  let colEAPriv = $("#applicationColEAPrivCheckBox").prop("checked");
  let colSc = $("#applicationColScCheckBox").prop("checked");

  Swal.fire({
    title: "Add this application?",
    text: "Are you sure you want to add this application date?",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Add",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/basicSetup.php",
        data: {
          action: 23.1,
          startDate: startDate,
          endDate: endDate,
          shs: shs,
          colEAPub: colEAPub,
          colEAPriv: colEAPriv,
          colSc: colSc,
        },
        success: function (data) {
          if (data == "Application Date Added") {
            Swal.fire({
              title: "Success!",
              icon: "success",
              html: data,
            }).then((result) => {
              location.reload();
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

function updateSetApplication(id) {
  let startDate = $("#applicationStartDate_" + id).val();
  let endDate = $("#applicationEndDate_" + id).val();
  let shs = $("#applicationShsCheckBox_" + id).prop("checked");
  let colEAPub = $("#applicationColEAPubCheckBox_" + id).prop("checked");
  let colEAPriv = $("#applicationColEAPrivCheckBox_" + id).prop("checked");
  let colSc = $("#applicationColScCheckBox_" + id).prop("checked");

  Swal.fire({
    title: "Update this record?",
    text: "Are you sure you want to update this application date?",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Generate",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/basicSetup.php",
        data: {
          action: 23.2,
          id: id,
          startDate: startDate,
          endDate: endDate,
          shs: shs,
          colEAPub: colEAPub,
          colEAPriv: colEAPriv,
          colSc: colSc,
        },
        success: function (data) {
          if (data == "Application Date Updated") {
            Swal.fire({
              title: "Success!",
              icon: "success",
              html: data,
            }).then((result) => {
              location.reload();
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

function deleteSetApplication(id) {
  Swal.fire({
    title: "Delete the application?",
    text: "Are you sure you want to delete this application? This cannot be undone",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Delete",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/basicSetup.php",
        data: {
          action: 23.3,
          id: id,
        },
        success: function (data) {
          if (data == "Deleted Successfully") {
            Swal.fire({
              title: "Success!",
              icon: "success",
              html: data,
            }).then((result) => {
              location.reload();
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


// -----------------------------------------------------------------
// Set Assessment
function addSetAssessment() {
  let startDate = $("#assessmentStartDate").val();
  let endDate = $("#assessmentEndDate").val();
  let shs = $("#assessmentShsCheckBox").prop("checked");
  let colEAPub = $("#assessmentColEAPubCheckBox").prop("checked");
  let colEAPriv = $("#assessmentColEAPrivCheckBox").prop("checked");
  let colSc = $("#assessmentColScCheckBox").prop("checked");

  Swal.fire({
    title: "Add this assessment?",
    text: "Are you sure you want to add this assessment date?",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Add",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/basicSetup.php",
        data: {
          action: 2.1,
          startDate: startDate,
          endDate: endDate,
          shs: shs,
          colEAPub: colEAPub,
          colEAPriv: colEAPriv,
          colSc: colSc,
        },
        success: function (data) {
          if (data == "Assessment Date Added") {
            Swal.fire({
              title: "Success!",
              icon: "success",
              html: data,
            }).then((result) => {
              location.reload();
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

function updateSetAssessment(id) {
  let startDate = $("#assessmentStartDate_" + id).val();
  let endDate = $("#assessmentEndDate_" + id).val();
  let shs = $("#assessmentShsCheckBox_" + id).prop("checked");
  let colEAPub = $("#assessmentColEAPubCheckBox_" + id).prop("checked");
  let colEAPriv = $("#assessmentColEAPrivCheckBox_" + id).prop("checked");
  let colSc = $("#assessmentColScCheckBox_" + id).prop("checked");

  Swal.fire({
    title: "Update this record?",
    text: "Are you sure you want to update this assessment date?",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Generate",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/basicSetup.php",
        data: {
          action: 2.2,
          id: id,
          startDate: startDate,
          endDate: endDate,
          shs: shs,
          colEAPub: colEAPub,
          colEAPriv: colEAPriv,
          colSc: colSc,
        },
        success: function (data) {
          if (data == "Assessment Date Updated") {
            Swal.fire({
              title: "Success!",
              icon: "success",
              html: data,
            }).then((result) => {
              location.reload();
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

function deleteSetAssessment(id) {
  Swal.fire({
    title: "Delete the assessment?",
    text: "Are you sure you want to delete this assessment? This cannot be undone",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Delete",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/basicSetup.php",
        data: {
          action: 2.3,
          id: id,
        },
        success: function (data) {
          if (data == "Deleted Successfully") {
            Swal.fire({
              title: "Success!",
              icon: "success",
              html: data,
            }).then((result) => {
              location.reload();
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

// -----------------------------------------------------------------
// Set Renewal
function addSetRenewal() {
  let startDate = $("#renewalStartDate").val();
  let endDate = $("#renewalEndDate").val();
  let shs = $("#renewalShsCheckBox").prop("checked");
  let colEAPub = $("#renewalColEAPubCheckBox").prop("checked");
  let colEAPriv = $("#renewalColEAPrivCheckBox").prop("checked");
  let colSc = $("#renewalColScCheckBox").prop("checked");

  Swal.fire({
    title: "Add this renewal?",
    text: "Are you sure you want to add this renewal date?",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Add",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/basicSetup.php",
        data: {
          action: 3.1,
          startDate: startDate,
          endDate: endDate,
          shs: shs,
          colEAPub: colEAPub,
          colEAPriv: colEAPriv,
          colSc: colSc,
        },
        success: function (data) {
          if (data == "Renewal Date Added") {
            Swal.fire({
              title: "Success!",
              icon: "success",
              html: data,
            }).then((result) => {
              location.reload();
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

function updateSetRenewal(id) {
  let startDate = $("#renewalStartDate_" + id).val();
  let endDate = $("#renewalEndDate_" + id).val();
  let shs = $("#renewalShsCheckBox_" + id).prop("checked");
  let colEAPub = $("#renewalColEAPubCheckBox_" + id).prop("checked");
  let colEAPriv = $("#renewalColEAPrivCheckBox_" + id).prop("checked");
  let colSc = $("#renewalColScCheckBox_" + id).prop("checked");

  Swal.fire({
    title: "Update this record?",
    text: "Are you sure you want to update this renewal date?",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Update",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/basicSetup.php",
        data: {
          action: 3.2,
          id: id,
          startDate: startDate,
          endDate: endDate,
          shs: shs,
          colEAPub: colEAPub,
          colEAPriv: colEAPriv,
          colSc: colSc,
        },
        success: function (data) {
          if (data == "Renewal Date Updated") {
            Swal.fire({
              title: "Success!",
              icon: "success",
              html: data,
            }).then((result) => {
              location.reload();
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

function deleteSetRenewal(id) {
  Swal.fire({
    title: "Delete the renewal?",
    text: "Are you sure you want to delete this renewal? This cannot be undone",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Delete",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/basicSetup.php",
        data: {
          action: 3.3,
          id: id,
        },
        success: function (data) {
          if (data == "Deleted Successfully") {
            Swal.fire({
              title: "Success!",
              icon: "success",
              html: data,
            }).then((result) => {
              location.reload();
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

// -----------------------------------------------------------------
// Set Exam
function addSetExam() {
  let startDate = $("#examStartDate").val();
  let endDate = $("#examEndDate").val();
  let time = $("#examTime").val();
  let end_time = $("#examEndTime").val();
  let shs = $("#examShsCheckBox").prop("checked");
  let colEAPub = $("#examColEAPubCheckBox").prop("checked");
  let colEAPriv = $("#examColEAPrivCheckBox").prop("checked");
  let colSc = $("#examColScCheckBox").prop("checked");

  Swal.fire({
    title: "Add this exam?",
    text: "Are you sure you want to add this exam date?",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Add",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/basicSetup.php",
        data: {
          action: 4.1,
          startDate: startDate,
          endDate: endDate,
          time: time,
          end_time: end_time,
          shs: shs,
          colEAPub: colEAPub,
          colEAPriv: colEAPriv,
          colSc: colSc,
        },
        success: function (data) {
          if (data == "Exam Date Added") {
            Swal.fire({
              title: "Success!",
              icon: "success",
              html: data,
            }).then((result) => {
              location.reload();
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

function updateSetExam(id) {
  let startDate = $("#examStartDate_" + id).val();
  let endDate = $("#examEndDate_" + id).val();
  let time = $("#examTime_" + id).val();
  let end_time = $("#examEndTime_" + id).val();
  let shs = $("#examShsCheckBox_" + id).prop("checked");
  let colEAPub = $("#examColEAPubCheckBox_" + id).prop("checked");
  let colEAPriv = $("#examColEAPrivCheckBox_" + id).prop("checked");
  let colSc = $("#examColScCheckBox_" + id).prop("checked");

  console.log(time);

  Swal.fire({
    title: "Update this record?",
    text: "Are you sure you want to update this exam date?",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Update",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/basicSetup.php",
        data: {
          action: 4.2,
          id: id,
          startDate: startDate,
          endDate: endDate,
          time: time,
          end_time: end_time,
          shs: shs,
          colEAPub: colEAPub,
          colEAPriv: colEAPriv,
          colSc: colSc,
        },
        success: function (data) {
          if (data == "Exam Date Updated") {
            Swal.fire({
              title: "Success!",
              icon: "success",
              html: data,
            }).then((result) => {
              location.reload();
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

function deleteSetExam(id) {
  Swal.fire({
    title: "Delete the exam?",
    text: "Are you sure you want to delete this exam? This cannot be undone",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Delete",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/basicSetup.php",
        data: {
          action: 4.3,
          id: id,
        },
        success: function (data) {
          if (data == "Deleted Successfully") {
            Swal.fire({
              title: "Success!",
              icon: "success",
              html: data,
            }).then((result) => {
              location.reload();
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

// ----------------------------------------------------------------
// // EA Indicator Edit
// function editEAIndicator(id, type){
//   $('#ea_' + type + '_' + id).removeClass("d-none");
//   $('#ea_' + type + '_' + id).focus();
//   $('#editIndicator_' + type + '_' + id).addClass("d-none");
// }



// ----------------------------------------------------------------
// EA Indicator Save
function saveEAIndicator(category, id, type){
  let input = $('#ea_' + type + '_' + id);
  let div = $('#editIndicator_' + type + '_' + id);
  let value = input.val();
  let parentTr;
  let tdCount;
  
  $.ajax({
    type: "POST",
    url: "controller/basicSetup.php",
    data: {
      action    : 5.1,
      id        : id,
      type      : type,
      value     : value,
      category  : category,
      applicant : 2,
    },
    success: function (data) {
      if (data == "Success") {
        input.addClass("d-none");
        div.text(input.val());
        div.removeClass("d-none");

        console.log(input);
      } else {
        console.log(data);
        if(parseInt(data) == "NaN"){
          Swal.fire({
            title: "Error!",
            icon: "error",
            html: data,
          });
        }else{
          input.addClass("d-none");
          div.text(input.val());
          div.removeClass("d-none");

          input.attr('id', 'ea_' + type + '_' + data);
          input.attr('onfocusout', "saveEAIndicator(" + category+ "," + data + "," + type + ")");
          div.attr('id', 'editIndicator_' + type + '_' + data);

          parentTr = $('#editIndicator_' + type + '_' + data).closest('tr');
          tdCount  = parentTr.children('td').length;

          for(let i = 0; i < tdCount; i++){
            if(i > 0){
              if(category <= 2 || category == 4){
                if (i == 1){
                  $(parentTr).find('td:eq(1)').find('input').attr('id', 'ea_0_' + data);
                  $(parentTr).find('td:eq(1)').find('input').attr('onfocusout', "saveEAIndicator(" + category+ "," + data + "," + "0)");
                  $(parentTr).find('td:eq(1)').find('div').attr('id', 'editIndicator_0_' + data);
                }else if(i == 2){
                  $(parentTr).find('td:eq(2)').find('input').attr('id', 'ea_2_' + data);
                  $(parentTr).find('td:eq(2)').find('input').attr('onfocusout', "saveEAIndicator(" + category+ "," + data + "," + "2)");
                  $(parentTr).find('td:eq(2)').find('div').attr('id', 'editIndicator_2_' + data);
                }else if(i == 3){
                  $(parentTr).find('td:eq(3)').find('input').attr('id', 'ea_3_' + data);
                  $(parentTr).find('td:eq(3)').find('input').attr('onfocusout', "saveEAIndicator(" + category+ "," + data + "," + "3)");
                  $(parentTr).find('td:eq(3)').find('div').attr('id', 'editIndicator_3_' + data);
                }
              }else{
                if (i == 1){
                  $(parentTr).find('td:eq(1)').find('input').attr('id', 'ea_1_' + data);
                  $(parentTr).find('td:eq(1)').find('input').attr('onfocusout', "saveEAIndicator(" + category+ "," + data + "," + "1)");
                  $(parentTr).find('td:eq(1)').find('div').attr('id', 'editIndicator_1_' + data);
                }else if(i == 2){
                  $(parentTr).find('td:eq(2)').find('input').attr('id', 'ea_3_' + data);
                  $(parentTr).find('td:eq(2)').find('input').attr('onfocusout', "saveEAIndicator(" + category+ "," + data + "," + "3)");
                  $(parentTr).find('td:eq(2)').find('div').attr('id', 'editIndicator_3_' + data);
                }
              }
            }
          }
        }
        
      }
    },
  });

}

// ----------------------------------------------------------------
// Indicator EA Income Adding
function indicatorEAIncomeAdd(){
  // indicatorEAIncomeTable
  
  let tableRowCount = $("#indicatorEAIncomeTable tr").length; 
  let classRow      = (tableRowCount % 2  == 0) ? "even" : "odd";

  let row = '<tr class="' + classRow + '">'+
      '<td>'+tableRowCount+'</td>'+
      '<td><div id="editIndicator_0_0"></div><input type="number" class="editIndicatorText d-none form-control" id="ea_0_0" value="0" onfocusout="saveEAIndicator(1,'+ 0 +', 0)"></td>'+
      '<td><div id="editIndicator_2_0"></div><input type="number" class="editIndicatorText d-none form-control" id="ea_2_0" value="0" onfocusout="saveEAIndicator(1,'+ 0 +', 2)"></td>'+
      '<td><div id="editIndicator_3_0"></div><input type="number" class="editIndicatorText d-none form-control" id="ea_3_0" value="0" onfocusout="saveEAIndicator(1,'+ 0 +', 3)"></td>'+
      '</tr>';  

      $('#indicatorEAIncomeTable > tbody:last-child').append(row);
}

// Indicator EA Grade Adding
function indicatorEAGradeAdd(){
  // indicatorEAGradeTable
  
  let tableRowCount = $("#indicatorEAGradeTable tr").length; 
  let classRow      = (tableRowCount % 2  == 0) ? "even" : "odd";

  let row = '<tr class="' + classRow + '">'+
      '<td>'+tableRowCount+'</td>'+
      '<td><div id="editIndicator_0_0"></div><input type="number" class="editIndicatorText d-none form-control" id="ea_0_0" value="0" onfocusout="saveEAIndicator(2,'+ 0 +', 0)"></td>'+
      '<td><div id="editIndicator_2_0"></div><input type="number" class="editIndicatorText d-none form-control" id="ea_2_0" value="0" onfocusout="saveEAIndicator(2,'+ 0 +', 2)"></td>'+
      '<td><div id="editIndicator_3_0"></div><input type="number" class="editIndicatorText d-none form-control" id="ea_3_0" value="0" onfocusout="saveEAIndicator(2,'+ 0 +', 3)"></td>'+
      '</tr>';  

      $('#indicatorEAGradeTable > tbody:last-child').append(row);
}

// Indicator EA School Type Adding
function indicatorEASchoolTypeAdd(){
  // indicatorEASchoolTypeTable
  
  let tableRowCount = $("#indicatorEASchoolTypeTable tr").length; 
  let classRow      = (tableRowCount % 2  == 0) ? "even" : "odd";

  let row = '<tr class="' + classRow + '">'+
      '<td>'+tableRowCount+'</td>'+
      '<td><div id="editIndicator_1_0"></div><input type="text" class="editIndicatorText d-none form-control" id="ea_0_0" value=" " onfocusout="saveEAIndicator(3,'+ 0 +', 1)"></td>'+
      '<td><div id="editIndicator_3_0"></div><input type="text" class="editIndicatorText d-none form-control" id="ea_3_0" value="0" onfocusout="saveEAIndicator(3,'+ 0 +', 3)"></td>'+
      '</tr>';   

      $('#indicatorEASchoolTypeTable > tbody:last-child').append(row);
}

// Indicator EA Residency Adding
function indicatorEAResidencyAdd(){
  // indicatorEAResidencyTable
  
  let tableRowCount = $("#indicatorEAResidencyTable tr").length; 
  let classRow      = (tableRowCount % 2  == 0) ? "even" : "odd";

  let row = '<tr class="' + classRow + '">'+
      '<td>'+tableRowCount+'</td>'+
      '<td><div id="editIndicator_0_0"></div><input type="text" class="editIndicatorText d-none form-control" id="ea_0_0" value=" " onfocusout="saveEAIndicator(4,'+ 0 +', 0)"></td>'+
      '<td><div id="editIndicator_2_0"></div><input type="text" class="editIndicatorText d-none form-control" id="ea_2_0" value=" " onfocusout="saveEAIndicator(4,'+ 0 +', 2)"></td>'+
      '<td><div id="editIndicator_3_0"></div><input type="text" class="editIndicatorText d-none form-control" id="ea_3_0" value="0" onfocusout="saveEAIndicator(4,'+ 0 +', 3)"></td>'+
      '</tr>';  

      $('#indicatorEAResidencyTable > tbody:last-child').append(row);
}


// ----------------------------------------------------------------
// EA Indicator Save
function saveSCIndicator(category, id, type){
  let input = $('#sc_' + type + '_' + id);
  let div = $('#editIndicator_' + type + '_' + id);
  let value = (input.val() != undefined)? input.val() : div.text();
  let parentTr;
  let tdCount;
  console.log(input);
  $.ajax({
    type: "POST",
    url: "controller/basicSetup.php",
    data: {
      action    : 5.1,
      id        : id,
      type      : type,
      value     : value,
      category  : category,
      applicant : 1,
    },
    success: function (data) {
      if (data == "Success") {
        input.addClass("d-none");
        div.text(input.val());
        div.removeClass("d-none");

      } else {
        // data = data.replace("Success", "");
        if(parseInt(data) === NaN){
          Swal.fire({
            title: "Error!",
            icon: "error",
            html: data,
          });
        }else{
          input.addClass("d-none");
          div.text(input.val());
          div.removeClass("d-none");

          input.attr('id', 'sc_' + type + '_' + data);
          input.attr('onfocusout', "saveEAIndicator(" + category+ "," + data + "," + type + ")");
          div.attr('id', 'editIndicator_' + type + '_' + data);

          parentTr = $('#editIndicator_' + type + '_' + data).closest('tr');
          tdCount  = parentTr.children('td').length;

          for(let i = 0; i < tdCount; i++){
            if(i > 0){
              if(category <= 2 || category == 4 || category == 5){
                if (i == 1){
                  $(parentTr).find('td:eq(1)').find('input').attr('id', 'sc_0_' + data);
                  $(parentTr).find('td:eq(1)').find('input').attr('onfocusout', "saveSCIndicator(" + category+ "," + data + "," + "0)");
                  $(parentTr).find('td:eq(1)').find('div').attr('id', 'editIndicator_0_' + data);
                }else if(i == 2){
                  $(parentTr).find('td:eq(2)').find('input').attr('id', 'sc_2_' + data);
                  $(parentTr).find('td:eq(2)').find('input').attr('onfocusout', "saveSCIndicator(" + category+ "," + data + "," + "2)");
                  $(parentTr).find('td:eq(2)').find('div').attr('id', 'editIndicator_2_' + data);
                }else if(i == 3){
                  $(parentTr).find('td:eq(3)').find('input').attr('id', 'sc_3_' + data);
                  $(parentTr).find('td:eq(3)').find('input').attr('onfocusout', "saveSCIndicator(" + category+ "," + data + "," + "3)");
                  $(parentTr).find('td:eq(3)').find('div').attr('id', 'editIndicator_3_' + data);
                }
              }else{
                if (i == 1){
                  $(parentTr).find('td:eq(1)').find('input').attr('id', 'sc_1_' + data);
                  $(parentTr).find('td:eq(1)').find('input').attr('onfocusout', "saveSCIndicator(" + category+ "," + data + "," + "1)");
                  $(parentTr).find('td:eq(1)').find('div').attr('id', 'editIndicator_1_' + data);
                }else if(i == 2){
                  $(parentTr).find('td:eq(2)').find('input').attr('id', 'sc_3_' + data);
                  $(parentTr).find('td:eq(2)').find('input').attr('onfocusout', "saveSCIndicator(" + category+ "," + data + "," + "3)");
                  $(parentTr).find('td:eq(2)').find('div').attr('id', 'editIndicator_3_' + data);
                }
              }
            }
          }
        }
        
      }
      // data = "";
    },
  });

}

// ----------------------------------------------------------------
// Indicator SC Examination Adding
function indicatorSCExaminationAdd(){
  // indicatorSCExaminationTable
  
  let tableRowCount = $("#indicatorSCExaminationTable tr").length; 
  let classRow      = (tableRowCount % 2  == 0) ? "even" : "odd";

  let row = '<tr class="' + classRow + '">'+
      '<td>'+tableRowCount+'</td>'+
      '<td><div id="editIndicator_0_0"></div><input type="number" class="editIndicatorText d-none form-control" id="sc_0_0" value="0" onfocusout="saveSCIndicator(5,'+ 0 +', 0)"></td>'+
      '<td><div id="editIndicator_2_0"></div><input type="number" class="editIndicatorText d-none form-control" id="sc_2_0" value="0" onfocusout="saveSCIndicator(5,'+ 0 +', 2)"></td>'+
      '<td><div id="editIndicator_3_0"></div><input type="number" class="editIndicatorText d-none form-control" id="sc_3_0" value="0" onfocusout="saveSCIndicator(5,'+ 0 +', 3)"></td>'+
      '</tr>';  

      $('#indicatorSCExaminationTable > tbody:last-child').append(row);
}

// Indicator SC Income Adding
function indicatorSCIncomeAdd(){
  // indicatorSCIncomeTable
  
  let tableRowCount = $("#indicatorSCIncomeTable tr").length; 
  let classRow      = (tableRowCount % 2  == 0) ? "even" : "odd";

  let row = '<tr class="' + classRow + '">'+
      '<td>'+tableRowCount+'</td>'+
      '<td><div id="editIndicator_0_0"></div><input type="number" class="editIndicatorText d-none form-control" id="sc_0_0" value="0" onfocusout="saveSCIndicator(1,'+ 0 +', 0)"></td>'+
      '<td><div id="editIndicator_2_0"></div><input type="number" class="editIndicatorText d-none form-control" id="sc_2_0" value="0" onfocusout="saveSCIndicator(1,'+ 0 +', 2)"></td>'+
      '<td><div id="editIndicator_3_0"></div><input type="number" class="editIndicatorText d-none form-control" id="sc_3_0" value="0" onfocusout="saveSCIndicator(1,'+ 0 +', 3)"></td>'+
      '</tr>';  

      $('#indicatorSCIncomeTable > tbody:last-child').append(row);
}

// Indicator SC Grade Adding
function indicatorSCGradeAdd(){
  // indicatorSCGradeTable
  
  let tableRowCount = $("#indicatorSCGradeTable tr").length; 
  let classRow      = (tableRowCount % 2  == 0) ? "even" : "odd";

  let row = '<tr class="' + classRow + '">'+
      '<td>'+tableRowCount+'</td>'+
      '<td><div id="editIndicator_0_0"></div><input type="number" class="editIndicatorText d-none form-control" id="sc_0_0" value="0" onfocusout="saveSCIndicator(2,'+ 0 +', 0)"></td>'+
      '<td><div id="editIndicator_2_0"></div><input type="number" class="editIndicatorText d-none form-control" id="sc_2_0" value="0" onfocusout="saveSCIndicator(2,'+ 0 +', 2)"></td>'+
      '<td><div id="editIndicator_3_0"></div><input type="number" class="editIndicatorText d-none form-control" id="sc_3_0" value="0" onfocusout="saveSCIndicator(2,'+ 0 +', 3)"></td>'+
      '</tr>';  

      $('#indicatorSCGradeTable > tbody:last-child').append(row);
}

// Indicator SC Residency Adding
function indicatorSCResidencyAdd(){
  // indicatorSCResidencyTable
  
  let tableRowCount = $("#indicatorSCResidencyTable tr").length; 
  let classRow      = (tableRowCount % 2  == 0) ? "even" : "odd";

  let row = '<tr class="' + classRow + '">'+
      '<td>'+tableRowCount+'</td>'+
      '<td><div id="editIndicator_0_0"></div><input type="number" class="editIndicatorText d-none form-control" id="sc_0_0" value="0" onfocusout="saveSCIndicator(4 '+ 0 +', 0)"></td>'+
      '<td><div id="editIndicator_2_0"></div><input type="number" class="editIndicatorText d-none form-control" id="sc_2_0" value="0" onfocusout="saveSCIndicator(4,'+ 0 +', 2)"></td>'+
      '<td><div id="editIndicator_3_0"></div><input type="text" class="editIndicatorText d-none form-control" id="sc_3_0" value="0" onfocusout="saveSCIndicator(4,'+ 0 +', 3)"></td>'+
      '</tr>';  

      $('#indicatorSCResidencyTable > tbody:last-child').append(row);
}

function transferInputToDiv(category, id, type){
  let input = $('#sc_' + type + '_' + id);
  let div = $('#editIndicator_' + type + '_' + id);
  div.text(input.val());
  console.log(input);
}

function indicatorDelete(id){
  Swal.fire({
    title: "Delete this indicator?",
    text: "Are you sure you want to delete this indicator? This cannot be undone",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Delete",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/basicSetup.php",
        data: {
          action: 5.3,
          id: id,
        },
        success: function (data) {
          if (data == "Success") {
            Swal.fire({
              title: "Success!",
              icon: "success",
              html: data,
            }).then((result) => {
              location.reload();
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

function getDateFromHours(time) {
  time = time.split(':');
  let now = new Date();
  return new Date(now.getFullYear(), now.getMonth(), now.getDate(), ...time);
}

$(function () {
  $('#examTime').timepicker({
      // format: "hh:ii:00",
      showMeridian: false,
      showInputs: true,
      showSeconds: true,
      defaultTime: "00:00:00"
  });
});
