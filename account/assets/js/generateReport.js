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
          // console.log(ay);
          ay.forEach(ayOption => {
              $("#app_ay").append(
                  '<option value='+ ayOption[0] +'>' + ayOption[1] +'</option>'
              );
          });
          // console.log(data);
      },
    });

    // AJAX for School
    $.ajax({
      type: "POST",
      url: "controller/generateReport.php",
      data: {
        action: 0.2,
      },
      success: function (data) {
          console.log(data)
          let school = (JSON.parse(data));
          console.log(school);
          school.forEach(ayOption => {
              $("#app_SchoolName").append(
                  '<option value='+ ayOption[0] +'>' + ayOption[1] +'</option>'
              );
          });
          // console.log(data);
      },
    });



  $("#genrep_list_btn").on("click", function (e) {
    let action = $("#app_generate option:selected").val();
    let actionText = $("#app_generate option:selected").text();

    // Check if the Action is for generating
    // Applicant, Beneficiary or Graduating Data
    if(action <= 4){
      let ay = $("#app_ay option:selected").text();
      let sem = $("#app_sem option:selected").text();
      let scholarType = $("#app_scholarType option:selected").text();
      let educLevel = $("#app_educLevel option:selected").text();
      let schoolName = $("#app_schoolName option:selected").val(); // ?
      let yearLevel = $("#app_yearLevel option:selected").text();
      let courseStrand = $("#app_courseStrand option:selected").val(); // ?
      let status = $("#app_status option:selected").val(); //?

      if(action == 4){
        let status = $("#app_status option:selected").text();
      }

      $.ajax({
        type: "POST",
        url: "controller/generateReport.php",
        data: {
          action: action,
          ay: ay,
          sem: sem,
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
          $("#table_div").removeClass("d-none");
          $("#table_name").text(actionText);
        },
      });
    }else{

    }
    $("#genrep_applicant").removeClass('show');
  });

  // $("#genrep_bene_btn").on("click", function (e) {
  //   let ay = $("#bene_ay option:selected").text();
  //   let sem = $("#bene_sem option:selected").text();
  //   let scholarType = $("#bene_scholarType option:selected").text();
  //   let educLevel = $("#bene_educLevel option:selected").text();
  //   let schoolName = $("#bene_schoolName option:selected").val(); // ?
  //   let yearLevel = $("#bene_yearLevel option:selected").text();
  //   let courseStrand = $("#bene_courseStrand option:selected").val(); // ?
  //   let status = $("#bene_status option:selected").val(); //?

  //   $.ajax({
  //     type: "POST",
  //     url: "controller/generateReport.php",
  //     data: {
  //       action: 1,
  //       ay: ay,
  //       sem: sem,
  //       scholarType: scholarType,
  //       educLevel: educLevel,
  //       schoolName: schoolName,
  //       yearLevel: yearLevel,
  //       courseStrand: courseStrand,
  //       status: status,
  //     },
  //     success: function (data) {
  //       console.log(data);

  //       let theadtr = JSON.parse(data)[0];
  //       let tbodytr = JSON.parse(data)[1];

  //       console.log(theadtr);
  //       console.log(tbodytr);

  //       $("#dynamic_table thead tr").empty();
  //       $("#dynamic_table tbody tr").empty();

  //       theadtr.forEach((headtr) => {
  //         $("#dynamic_table thead tr").append(
  //           '<th scope="col">' + headtr + "</th>"
  //         );
  //       });
  //       reportTable(tbodytr, "Applicants Information");
  //     },
  //   });
  // });

  // $("#genrep_graduating_btn").on("click", function (e) {
  //   let ay = $("#graduating_ay option:selected").text();
  //   let sem = $("#graduating_sem option:selected").text();
  //   let scholarType = $("#graduating_scholarType option:selected").text();
  //   let educLevel = $("#graduating_educLevel option:selected").text();
  //   let schoolName = $("#graduating_schoolName option:selected").val(); // ?
  //   let yearLevel = $("#graduating_yearLevel option:selected").text();
  //   let courseStrand = $("#graduating_courseStrand option:selected").val(); // ?
  //   let status = $("#graduating_status option:selected").val(); //?

  //   $.ajax({
  //     type: "POST",
  //     url: "controller/generateReport.php",
  //     data: {
  //       action: 2,
  //       ay: ay,
  //       sem: sem,
  //       scholarType: scholarType,
  //       educLevel: educLevel,
  //       schoolName: schoolName,
  //       yearLevel: yearLevel,
  //       courseStrand: courseStrand,
  //       status: status,
  //     },
  //     success: function (data) {
  //       console.log(data);

  //       let theadtr = JSON.parse(data)[0];
  //       let tbodytr = JSON.parse(data)[1];

  //       console.log(theadtr);
  //       console.log(tbodytr);

  //       $("#dynamic_table thead tr").empty();
  //       $("#dynamic_table tbody tr").empty();

  //       theadtr.forEach((headtr) => {
  //         $("#dynamic_table thead tr").append(
  //           '<th scope="col">' + headtr + "</th>"
  //         );
  //       });
  //       reportTable(tbodytr, "Applicants Information");
  //     },
  //   });
  // });

  $("#app_generate").on("change", function (e) {
    let choice =  $("#app_generate option:selected").val();
    console.log(choice);
    switch(choice){
      case '1':
        $('#app_status')
          .find('option')
          .remove()
          .end()
          .append('<option selected value="">--</option>' 
                + '<option value="whatever">Complete Requirements</option>' 
                + '<option value="whatever">Incomplete Requirements</option>' 
                + '<option value="whatever">Disqualified</option>' 
                + '<option value="whatever">Approved</option>' 
                );
        break;
      case '2':
        $('#app_status')
          .find('option')
          .remove()
          .end()
          .append('<option selected value="">--</option>' 
                + '<option value="0">Not yet Assessed</option>' 
                + '<option value="1">For Renewal</option>' 
                + '<option value="2">For Assessment</option>' 
                + '<option value="3">Removed</option>' 
                + '<option value="4">Current</option>' 
                + '<option value="5">Transferred</option>' 
                + '<option value="6">Did not submit requirements</option>' 
                + '<option value="7">Waiting for Grades</option>' 
                );
        break;
      case '3':
        $('#app_status')
          .find('option')
          .remove()
          .end()
          .append('<option selected value="">--</option>' 
                + '<option value="0">Graduating</option>' 
                + '<option value="1">Graduated</option>' 
                );
        break;
      case '4':
        $('#app_status')
          .find('option')
          .remove()
          .end()
          .append('<option selected value="">--</option>' 
                + '<option value="0">Passed</option>' 
                + '<option value="1">Failed</option>' 
                );
        break;
      default:
        $('#app_status')
          .find('option')
          .remove()
          .end()
          .append('<option selected value="">--</option>' 
                );
    }
    
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
