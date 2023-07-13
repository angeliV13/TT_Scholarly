$(document).ready(function () {
  let acadYearTable = $("#acad_year_table").DataTable({
    lengthChange: false,
    searching: false,
    ordering: false,
    serverSide: true,
    processing: true,
    ajax: {
      url: "controller/basicSetup.php",
      type: "POST", 
      data: {
        action      : 1,
        getTable    : 1,
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
          action: 2,
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
