$(document).ready(function ($) {
  // // Counts in Accounts
  // $.ajax({
  //   type: "POST",
  //   url: "controller/dashboard.php",
  //   data: {
  //     action: 1,
  //   },
  //   success: function (data) {
  //     if (data != "") {
  //       let counts = JSON.parse(data);
  //       $("#totalApplicants").text(counts[0]);
  //       $("#totalBeneficiaries").text(counts[1]);
  //       $("#totalGraduating").text(counts[2]);
  //     }
  //   },
  // });

  // Scholar File Status
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

  let applicationFileTable = $("#applicationFileTable").DataTable({
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
        dashboard: 1,
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
