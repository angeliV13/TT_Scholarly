$(document).ready(function () {
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
// -----------------------------------------------------------------
// Set Assessment
function addSetAssessment() {
  let startDate = $("#assessmentStartDate").val();
  let endDate   = $("#assessmentEndDate").val();
  let shs       = $("#shsCheckBox").prop('checked');
  let colEAPub  = $("#colEAPubCheckBox").prop('checked');
  let colEAPriv = $("#colEAPrivCheckBox").prop('checked');
  let colSc     = $("#colScCheckBox").prop('checked');

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
  let shs       = $("#shsCheckBox_"+id).prop('checked');
  let colEAPub  = $("#colEAPubCheckBox_"+id).prop('checked');
  let colEAPriv = $("#colEAPrivCheckBox_"+id).prop('checked');
  let colSc     = $("#colScCheckBox_"+id).prop('checked');

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
