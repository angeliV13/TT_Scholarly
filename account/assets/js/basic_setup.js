$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "controller/basicSetup.php",
    data: {
      action: 0.1,
    },
    success: function (data) {
      if (data != 0) {
        $("#sem" + data).prop('checked', true);
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

});

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
    title: "Make default AY " + id + "-" + (id+1) + "?",
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
          console.log(data)
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

function deleteAY(id) {
  Swal.fire({
    title: "Delete the AY " + id + "-" + (id+1) + "?",
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
  
  let sem         = $(this).val();
  let semId       = "sem" + sem;

  if(sem == 1){
    $("#sem2").prop('checked', true);
  }
  else if (sem == 2){
    $("#sem1").prop('checked', true);
  }
  
  $(this).prop('checked', false);
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
          sem   : sem,
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
// Set Assessment
function addSetAssessment() {
  let startDate = $("#assessmentStartDate").val();
  let endDate   = $("#assessmentEndDate").val();
  let shs       = $("#assessmentShsCheckBox").prop('checked');
  let colEAPub  = $("#assessmentColEAPubCheckBox").prop('checked');
  let colEAPriv = $("#assessmentColEAPrivCheckBox").prop('checked');
  let colSc     = $("#assessmentColScCheckBox").prop('checked');

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
          action    : 2.1,
          startDate : startDate,
          endDate   : endDate,
          shs       : shs,
          colEAPub  : colEAPub,
          colEAPriv : colEAPriv,
          colSc     : colSc,
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
  let startDate = $("#assessmentStartDate_"+id).val();
  let endDate   = $("#assessmentEndDate_"+id).val();
  let shs       = $("#assessmentShsCheckBox_"+id).prop('checked');
  let colEAPub  = $("#assessmentColEAPubCheckBox_"+id).prop('checked');
  let colEAPriv = $("#assessmentColEAPrivCheckBox_"+id).prop('checked');
  let colSc     = $("#assessmentColScCheckBox_"+id).prop('checked');

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
          action    : 2.2,
          id        : id,
          startDate : startDate,
          endDate   : endDate,
          shs       : shs,
          colEAPub  : colEAPub,
          colEAPriv : colEAPriv,
          colSc     : colSc,
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
  let endDate   = $("#renewalEndDate").val();
  let shs       = $("#renewalShsCheckBox").prop('checked');
  let colEAPub  = $("#renewalColEAPubCheckBox").prop('checked');
  let colEAPriv = $("#renewalColEAPrivCheckBox").prop('checked');
  let colSc     = $("#renewalColScCheckBox").prop('checked');

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
          action    : 3.1,
          startDate : startDate,
          endDate   : endDate,
          shs       : shs,
          colEAPub  : colEAPub,
          colEAPriv : colEAPriv,
          colSc     : colSc,
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
  let startDate = $("#renewalStartDate_"+id).val();
  let endDate   = $("#renewalEndDate_"+id).val();
  let shs       = $("#renewalShsCheckBox_"+id).prop('checked');
  let colEAPub  = $("#renewalColEAPubCheckBox_"+id).prop('checked');
  let colEAPriv = $("#renewalColEAPrivCheckBox_"+id).prop('checked');
  let colSc     = $("#renewalColScCheckBox_"+id).prop('checked');

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
          action    : 3.2,
          id        : id,
          startDate : startDate,
          endDate   : endDate,
          shs       : shs,
          colEAPub  : colEAPub,
          colEAPriv : colEAPriv,
          colSc     : colSc,
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
  let endDate   = $("#examEndDate").val();
  let time   = $("#examTime").val();
  let shs       = $("#examShsCheckBox").prop('checked');
  let colEAPub  = $("#examColEAPubCheckBox").prop('checked');
  let colEAPriv = $("#examColEAPrivCheckBox").prop('checked');
  let colSc     = $("#examColScCheckBox").prop('checked');

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
          action    : 4.1,
          startDate : startDate,
          endDate   : endDate,
          time      : time,
          shs       : shs,
          colEAPub  : colEAPub,
          colEAPriv : colEAPriv,
          colSc     : colSc,
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
  let startDate = $("#examStartDate_"+id).val();
  let endDate   = $("#examEndDate_"+id).val();
  let time      = $("#examTime_"+id).val();
  let shs       = $("#examShsCheckBox_"+id).prop('checked');
  let colEAPub  = $("#examColEAPubCheckBox_"+id).prop('checked');
  let colEAPriv = $("#examColEAPrivCheckBox_"+id).prop('checked');
  let colSc     = $("#examColScCheckBox_"+id).prop('checked');

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
          action    : 4.2,
          id        : id,
          startDate : startDate,
          endDate   : endDate,
          time      : time,
          shs       : shs,
          colEAPub  : colEAPub,
          colEAPriv : colEAPriv,
          colSc     : colSc,
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