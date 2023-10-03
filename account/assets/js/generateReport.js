$(document).ready(function () {
    // AJAX for AY
    $.ajax({
        type: "POST",
        url: "controller/generateReport.php",
        data: {
          action: 0.1,
        },
        success: function (data) {
            let ay = (JSON.parse(data));
            console.log(ay);
            ay.forEach(ayOption => {
                $("#app_ay").append(
                    '<option value='+ ayOption[0] +'>' + ayOption[1] +'</option>'
                );
                $("#bene_ay").append(
                    '<option value='+ ayOption[0] +'>' + ayOption[1] +'</option>'
                );
                $("#graduating_ay").append(
                    '<option value='+ ayOption[0] +'>' + ayOption[1] +'</option>'
                );
            });
            console.log(data);
        },
      });

  $("#genrep_applicant_btn").on("click", function (e) {
    let ay = $("#app_ay option:selected").text();
    let scholarType = $("#app_scholarType option:selected").text();
    let educLevel = $("#app_educLevel option:selected").text();
    let schoolName = $("#app_schoolName option:selected").val(); // ?
    let yearLevel = $("#app_yearLevel option:selected").text();
    let courseStrand = $("#app_courseStrand option:selected").val(); // ?
    let status = $("#app_status option:selected").val(); //?

    $.ajax({
      type: "POST",
      url: "controller/generateReport.php",
      data: {
        action: 1,
        ay: ay,
        scholarType: scholarType,
        educLevel: educLevel,
        schoolName: schoolName,
        yearLevel: yearLevel,
        courseStrand: courseStrand,
        status: status,
      },
      success: function (data) {
        console.log(data);

        let theadtr = JSON.parse(data)[0];
        let tbodytr = JSON.parse(data)[1];

        console.log(theadtr);
        console.log(tbodytr);

        $("#dynamic_table thead tr").empty();
        $("#dynamic_table tbody tr").empty();

        theadtr.forEach((headtr) => {
          $("#dynamic_table thead tr").append(
            '<th scope="col">' + headtr + "</th>"
          );
        });
        reportTable(tbodytr, "Applicants Information");
      },
    });
  });

  $("#genrep_bene_btn").on("click", function (e) {
    let ay = $("#app_ay option:selected").text();
    let scholarType = $("#app_scholarType option:selected").text();
    let educLevel = $("#app_educLevel option:selected").text();
    let schoolName = $("#app_schoolName option:selected").val(); // ?
    let yearLevel = $("#app_yearLevel option:selected").text();
    let courseStrand = $("#app_courseStrand option:selected").val(); // ?
    let status = $("#app_status option:selected").val(); //?

    $.ajax({
      type: "POST",
      url: "controller/generateReport.php",
      data: {
        action: 1,
        ay: ay,
        scholarType: scholarType,
        educLevel: educLevel,
        schoolName: schoolName,
        yearLevel: yearLevel,
        courseStrand: courseStrand,
        status: status,
      },
      success: function (data) {
        console.log(data);

        let theadtr = JSON.parse(data)[0];
        let tbodytr = JSON.parse(data)[1];

        console.log(theadtr);
        console.log(tbodytr);

        $("#dynamic_table thead tr").empty();
        $("#dynamic_table tbody tr").empty();

        theadtr.forEach((headtr) => {
          $("#dynamic_table thead tr").append(
            '<th scope="col">' + headtr + "</th>"
          );
        });
        reportTable(tbodytr, "Applicants Information");
      },
    });
  });

  $("#genrep_graduating_btn").on("click", function (e) {
    let ay = $("#app_ay option:selected").text();
    let scholarType = $("#app_scholarType option:selected").text();
    let educLevel = $("#app_educLevel option:selected").text();
    let schoolName = $("#app_schoolName option:selected").val(); // ?
    let yearLevel = $("#app_yearLevel option:selected").text();
    let courseStrand = $("#app_courseStrand option:selected").val(); // ?
    let status = $("#app_status option:selected").val(); //?

    $.ajax({
      type: "POST",
      url: "controller/generateReport.php",
      data: {
        action: 2,
        ay: ay,
        scholarType: scholarType,
        educLevel: educLevel,
        schoolName: schoolName,
        yearLevel: yearLevel,
        courseStrand: courseStrand,
        status: status,
      },
      success: function (data) {
        console.log(data);

        let theadtr = JSON.parse(data)[0];
        let tbodytr = JSON.parse(data)[1];

        console.log(theadtr);
        console.log(tbodytr);

        $("#dynamic_table thead tr").empty();
        $("#dynamic_table tbody tr").empty();

        theadtr.forEach((headtr) => {
          $("#dynamic_table thead tr").append(
            '<th scope="col">' + headtr + "</th>"
          );
        });
        reportTable(tbodytr, "Applicants Information");
      },
    });
  });
});

function reportTable(data, title) {
  if ($.fn.DataTable.isDataTable("#dynamic_table")) {
    $("#dynamic_table").DataTable().destroy();
  }

  let dynamic_table = $("#dynamic_table").DataTable({
    dom: "Bfrtip",
    buttons: [
      {
        extend: "copy",
        className: "btn btn-primary btn-small",
        title: "",
      },
      {
        extend: "csv",
        className: "btn btn-primary btn-small",
        title: "",
      },
      {
        extend: "excel",
        className: "btn btn-primary btn-small",
        title: title,
      },
      // {
      //     extend      : 'pdf' ,
      //     className   : 'btn btn-primary btn-small',
      //     title       : title,
      //     orientation : 'portrait',
      //     text        : 'Portrait PDF',
      // },
      // {
      //     extend      : 'pdf' ,
      //     className   : 'btn btn-primary btn-small',
      //     title       : title,
      //     orientation : 'landscape',
      //     text        : 'Landscape PDF',
      // },
      {
        extend: "print",
        className: "btn btn-primary btn-small",
        title: "",
        //For repeating heading.
        repeatingHead: {
          logo: "images/tts-chrome-192x192.png",
          logoPosition: "center",
          logoStyle: "height: 96px; width: 96px;",
          title: '<h2 class="text-center">' + title + "</h2>",
        },
      },
      // 'copy', 'csv', 'excel', 'pdf', 'print'
    ],
    lengthChange: false,
    paging: false,
    searching: true,
    processing: true,
    ordering: false,
    serverSide: false,
    bInfo: false,
    data: data,
    createdRow: function (row, data, index) {},
    columnDefs: [{ className: "text-center", targets: [0] }],
    language: {
      processing: "<span class='loader'></span>",
    },
    fixedColumns: {
      leftColumns: 0,
    },
    // scrollX: false,
    // scrollY: 505,
    // scrollCollapse: false,
    // scroller: {
    //     loadingIndicator: false
    // },
    stateSave: false,
  });
}
