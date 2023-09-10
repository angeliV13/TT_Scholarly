$(document).ready(function () {
    let accountAdminManagementTable = $('#accountAdminManagementTable').DataTable({
        "lengthChange": false,
        "paging": false,
        "searching": false,
        "processing": true,
        "ordering": false,
        "serverSide": false,
        "bInfo": false,
        "ajax": {
            url: "controller/tableHandler.php", // json datasource
            type: "post",  // method  , by default get
            data: {
                "action": 1.1,
            },
            // success: function (row, data, index) {
            //   console.log(row);
            //   console.log(data);
            //   console.log(index);
            // },
            error: function (data) {  // error handling
                console.log(data);
                var columnCount = $('#accountAdminManagementTable').DataTable().columns().count();
                $(".accountAdminManagementTable-error").html("");
                $("#accountAdminManagementTable").append(`<tbody class="accountAdminManagementTable-error text-center"><tr><th colspan="${columnCount}">No data found in the server</th></tr></tbody>`);
                $("#accountAdminManagementTable_processing").css("display", "none");
            }
        },
        "createdRow": function (row, data, index) { },
        "columnDefs": [{ className: "text-center small", "targets": "_all" }],
        language: {
            processing: "<span class='loader'></span>"
        },
        fixedColumns: {
            leftColumns: 0
        },
        scrollY: 505,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false
    });

    let accountStudentManagementTable = $('#accountStudentManagementTable').DataTable({
        "lengthChange": false,
        "paging": false,
        "searching": false,
        "processing": true,
        "ordering": false,
        "serverSide": false,
        "bInfo": false,
        "ajax": {
            url: "controller/tableHandler.php", // json datasource
            type: "post",  // method  , by default get
            data: {
                "action": 1.2,
            },
            // success: function (row, data, index) {
            //   console.log(row);
            //   console.log(data);
            //   console.log(index);
            // },
            error: function (data) {  // error handling
                console.log(data);
                var columnCount = $('#accountStudentManagementTable').DataTable().columns().count();
                $(".accountStudentManagementTable-error").html("");
                $("#accountStudentManagementTable").append(`<tbody class="accountStudentManagementTable-error text-center"><tr><th colspan="${columnCount}">No data found in the server</th></tr></tbody>`);
                $("#accountStudentManagementTable_processing").css("display", "none");
            }
        },
        "createdRow": function (row, data, index) { },
        "columnDefs": [{ className: "text-center small", "targets": "_all" }],
        language: {
            processing: "<span class='loader'></span>"
        },
        fixedColumns: {
            leftColumns: 0
        },
        scrollY: 505,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false
    });

    // MANAGE EXAM -> EXAM QUESTIONS TABLE
    let examQuestionsTable = $('#examQuestionsTable').DataTable({
        "lengthChange": false,
        "paging": false,
        "searching": true,
        "processing": true,
        "ordering": false,
        "serverSide": false,
        "bInfo": false,
        "ajax": {
            url: "controller/tableHandler.php", // json datasource
            type: "post",  // method  , by default get
            data: {
                "action": 2,
            },
            // success: function (row, data, index) {
            //   console.log(row);
            //   console.log(data);
            //   console.log(index);
            // },
            error: function (data) {  // error handling
                console.log(data);
                var columnCount = $('#examQuestionsTable').DataTable().columns().count();
                $(".examQuestionsTable-error").html("");
                $("#examQuestionsTable").append(`<tbody class="examQuestionsTable-error text-center"><tr><th colspan="${columnCount}">No data found in the server</th></tr></tbody>`);
                $("#examQuestionsTable_processing").css("display", "none");
            }
        },
        "createdRow": function (row, data, index) { },
        "columnDefs": [{ className: "text-center", "targets": [0] }],
        language: {
            processing: "<span class='loader'></span>"
        },
        fixedColumns: {
            leftColumns: 0
        },
        scrollY: false,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false
    });

    // Notification Table
    let notifTable = $('#setNotifTable').DataTable({
        "lengthChange": false,
        "paging": false,
        "searching": true,
        "processing": true,
        "ordering": false,
        "serverSide": false,
        "bInfo": false,
        "ajax": {
            url: "controller/tableHandler.php", // json datasource
            type: "post",  // method  , by default get
            data: {
                "action": 3,
            },
            // success: function (row, data, index) {
            //   console.log(row);
            //   console.log(data);
            //   console.log(index);
            // },
            error: function (data) {  // error handling
                console.log(data);
                var columnCount = $('#setNotifTable').DataTable().columns().count();
                $(".setNotifTable-error").html("");
                $("#setNotifTable").append(`<tbody class="setNotifTable-error text-center"><tr><th colspan="${columnCount}">No data found in the server</th></tr></tbody>`);
                $("#setNotifTable_processing").css("display", "none");
            }
        },
        "createdRow": function (row, data, index) { },
        "columnDefs": [{ className: "text-center", "targets": [0] }],
        language: {
            processing: "<span class='loader'></span>"
        },
        fixedColumns: {
            leftColumns: 0
        },
        scrollY: false,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false
    });

    // School Table
    let schoolTable = $('#schoolTable').DataTable({
        "lengthChange": false,
        "paging": false,
        "searching": true,
        "processing": true,
        "ordering": false,
        "serverSide": false,
        "bInfo": false,
        "ajax": {
            url: "controller/tableHandler.php", // json datasource
            type: "post",  // method  , by default get
            data: {
                "action": 4,
            },
            // success: function (row, data, index) {
            //   console.log(row);
            //   console.log(data);
            //   console.log(index);
            // },
            error: function (data) {  // error handling
                console.log(data);
                var columnCount = $('#schoolTable').DataTable().columns().count();
                $(".schoolTable-error").html("");
                $("#schoolTable").append(`<tbody class="schoolTable-error text-center"><tr><th colspan="${columnCount}">No data found in the server</th></tr></tbody>`);
                $("#schoolTable_processing").css("display", "none");
            }
        },
        "createdRow": function (row, data, index) { },
        "columnDefs": [{ className: "text-center", "targets": [0] }],
        language: {
            processing: "<span class='loader'></span>"
        },
        fixedColumns: {
            leftColumns: 0
        },
        scrollY: false,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false
    });

    let collegeNewApplicantTable = $('#collegeNewApplicantTable').DataTable({
        "lengthChange": false,
        "paging": false,
        "searching": true,
        "processing": true,
        "ordering": false,
        "serverSide": false,
        "bInfo": false,
        "ajax": {
            url: "controller/tableHandler.php", // json datasource
            type: "post",  // method  , by default get
            data: {
                "action": 5,
            },
            // success: function (row, data, index) {
            //   console.log(row);
            //   console.log(data);
            //   console.log(index);
            // },
            error: function (data) {  // error handling
                console.log(data);
                var columnCount = $('#collegeNewApplicantTable').DataTable().columns().count();
                $(".collegeNewApplicantTable-error").html("");
                $("#collegeNewApplicantTable").append(`<tbody class="collegeNewApplicantTable-error text-center"><tr><th colspan="${columnCount}">No data found in the server</th></tr></tbody>`);
                $("#collegeNewApplicantTable_processing").css("display", "none");
            }
        },
        "createdRow": function (row, data, index) { },
        "columnDefs": [{ className: "text-center", "targets": [0] }],
        language: {
            processing: "<span class='loader'></span>"
        },
        fixedColumns: {
            leftColumns: 0
        },
        scrollY: false,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false,

        // "fnInitComplete" : function(oSettings, json) {
        //     $("#collegeNewApplicantTable thead th").each( function ( i ) {
        //         if ($(this).text() !== '') {
        //             var isStatusColumn = (($(this).text() == 'Status') ? true : false);
        //             var select = $('<select><option value=""></option></select>')
        //                 .appendTo( $(this).empty() )
        //                 .on( 'change', function () {
        //                     var val = $(this).val();

        //                     collegeNewApplicantTable.column( i )
        //                         .search( val ? '^'+$(this).val()+'$' : val, true, false )
        //                         .draw();
        //                 } );

        //             collegeNewApplicantTable.column( i ).data().unique().sort().each( function ( d, j ) {  
        //                 select.append( '<option value="'+d+'">'+d+'</option>' );
        //             } );	

        //         }
        //     } );
        // }
    });


    // Website Socials Table
    let socialTable = $('#setWebsiteSocials').DataTable({
        "lengthChange": false,
        "paging": false,
        "searching": true,
        "processing": true,
        "ordering": false,
        "serverSide": false,
        "bInfo": false,
        "ajax": {
            url: "controller/tableHandler.php", // json datasource
            type: "post",  // method  , by default get
            data: {
                "action": 6,
            },
            // success: function (row, data, index) {
            //   console.log(row);
            //   console.log(data);
            //   console.log(index);
            // },
            error: function (data) {  // error handling
                console.log(data);
                // get the number of columns
                var columnCount = $('#setWebsiteSocials').DataTable().columns().count();
                $(".setWebsiteSocials-error").html("");
                $("#setWebsiteSocials").append(`<tbody class="setWebsiteSocials-error text-center"><tr><th colspan="${columnCount}">No data found in the server</th></tr></tbody>`);
                $("#setWebsiteSocials_processing").css("display", "none");
            }
        },
        "createdRow": function (row, data, index) { },
        "columnDefs": [{ className: "text-center", "targets": [0] }],
        language: {
            processing: "<span class='loader'></span>"
        },
        fixedColumns: {
            leftColumns: 0
        },
        scrollY: false,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false
    });

    // GRADUATES TABLE
    let graduatesTable = $('#graduatesTable').DataTable({
        "lengthChange": false,
        "paging": false,
        "searching": true,
        "processing": true,
        "ordering": false,
        "serverSide": false,
        "bInfo": false,
        "ajax": {
            url: "controller/tableHandler.php", // json datasource
            type: "post",  // method  , by default get
            data: {
                "action": 7,
            },
            // success: function (row, data, index) {
            //   console.log(row);
            //   console.log(data);
            //   console.log(index);
            // },
            error: function (data) {  // error handling
                console.log(data);
                var columnCount = $('#graduatesTable').DataTable().columns().count();
                $(".graduatesTable-error").html("");
                $("#graduatesTable").append(`<tbody class="graduatesTable-error text-center"><tr><th colspan="${columnCount}">No data found in the server</th></tr></tbody>`);
                $("#graduatesTable_processing").css("display", "none");
            }
        },
        "createdRow": function (row, data, index) { },
        "columnDefs": [{ className: "text-center", "targets": [0] }],
        language: {
            processing: "<span class='loader'></span>"
        },
        fixedColumns: {
            leftColumns: 0
        },
        scrollY: false,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false,

        // "fnInitComplete" : function(oSettings, json) {
        //     $("#graduatesTable thead th").each( function ( i ) {
        //         if ($(this).text() !== '') {
        //             var isStatusColumn = (($(this).text() == 'Status') ? true : false);
        //             var select = $('<select><option value=""></option></select>')
        //                 .appendTo( $(this).empty() )
        //                 .on( 'change', function () {
        //                     var val = $(this).val();

        //                     graduatesTable.column( i )
        //                         .search( val ? '^'+$(this).val()+'$' : val, true, false )
        //                         .draw();
        //                 } );

        //                 graduatesTable.column( i ).data().unique().sort().each( function ( d, j ) {  
        //                 select.append( '<option value="'+d+'">'+d+'</option>' );
        //             } );	

        //         }
        //     } );
        // }
    });

    // Benef List Table
    let benefListTable = $('#listOfBeneficiaries').DataTable({
        "lengthChange": false,
        "paging": false,
        "searching": true,
        "processing": true,
        "ordering": false,
        "serverSide": false,
        "bInfo": false,
        "ajax": {
            url: "controller/tableHandler.php", // json datasource
            type: "post",  // method  , by default get
            data: {
                "action": 8,
            },
            error: function (data) {  // error handling
                console.log(data);
                var columnCount = $('#listOfBeneficiaries').DataTable().columns().count();
                $(".listOfBeneficiaries-error").html("");
                $("#listOfBeneficiaries").append(`<tbody class="listOfBeneficiaries-error text-center"><tr><th colspan="${columnCount}">No data found in the server</th></tr></tbody>`);
                $("#listOfBeneficiaries_processing").css("display", "none");
            }
        },
        "createdRow": function (row, data, index) { },
        "columnDefs": [{ className: "text-center", "targets": [0] }],
        language: {
            processing: "<span class='loader'></span>"
        },
        fixedColumns: {
            leftColumns: 0
        },
        scrollY: false,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false
    });

    // View Notification Table
    let viewNotif = $('#viewNotifTable').DataTable({
        "lengthChange": false,
        "paging": false,
        "searching": true,
        "processing": true,
        "ordering": false,
        "serverSide": false,
        "bInfo": false,
        "ajax": {
            url: "controller/tableHandler.php", // json datasource
            type: "post",  // method  , by default get
            data: {
                "action": 9,
            },
            // success: function (row, data, index) {
            //   console.log(row);
            //   console.log(data);
            //   console.log(index);
            // },
            error: function (data) {  // error handling
                console.log(data);
                var columnCount = $('#viewNotifTable').DataTable().columns().count();
                $(".viewNotifTable-error").html("");
                $("#viewNotifTable").append(`<tbody class="viewNotifTable-error text-center"><tr><th colspan="${columnCount}">No data found in the server</th></tr></tbody>`);
                $("#viewNotifTable_processing").css("display", "none");
            }
        },
        "createdRow": function (row, data, index) { },
        "columnDefs": [{ className: "text-center", "targets": [0] }],
        language: {
            processing: "<span class='loader'></span>"
        },
        fixedColumns: {
            leftColumns: 0
        },
        scrollY: false,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false
    });

    let applicantInterviewTable = $('#applicantInterviewTable').DataTable({
        "lengthChange": false,
        "paging": false,
        "searching": true,
        "processing": true,
        "ordering": false,
        "serverSide": false,
        "bInfo": false,
        "ajax": {
            url: "controller/tableHandler.php", // json datasource
            type: "post",  // method  , by default get
            data: {
                "action": 11,
            },
            // success: function (row, data, index) {
            //   console.log(row);
            //   console.log(data);
            //   console.log(index);
            // },
            error: function (data) {  // error handling
                console.log(data);
                var columnCount = $('#applicantInterviewTable').DataTable().columns().count();
                $(".applicantInterviewTable-error").html("");
                $("#applicantInterviewTable").append(`<tbody class="applicantInterviewTable-error text-center"><tr><th colspan="${columnCount}">No data found in the server</th></tr></tbody>`);
                $("#applicantInterviewTable_processing").css("display", "none");
            }
        },
        "createdRow": function (row, data, index) { },
        "columnDefs": [{ className: "text-center", "targets": [0] }],
        language: {
            processing: "<span class='loader'></span>"
        },
        fixedColumns: {
            leftColumns: 0
        },
        scrollY: false,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false,
    });

    let applicantExamTable = $('#applicantExamination').DataTable({
        "lengthChange": false,
        "paging": false,
        "searching": true,
        "processing": true,
        "ordering": false,
        "serverSide": false,
        "bInfo": false,
        "ajax": {
            url: "controller/tableHandler.php", // json datasource
            type: "post",  // method  , by default get
            data: {
                "action": 12,
            },
            // success: function (row, data, index) {
            //   console.log(row);
            //   console.log(data);
            //   console.log(index);
            // },
            error: function (data) {  // error handling
                console.log(data);
                var columnCount = $('#applicantExamination').DataTable().columns().count();
                $(".applicantExamination-error").html("");
                $("#applicantExamination").append(`<tbody class="applicantExamination-error text-center"><tr><th colspan="${columnCount}">No data found in the server</th></tr></tbody>`);
                $("#applicantExamination_processing").css("display", "none");
            }
        },
        "createdRow": function (row, data, index) { },
        "columnDefs": [{ className: "text-center", "targets": [0] }],
        language: {
            processing: "<span class='loader'></span>"
        },
        fixedColumns: {
            leftColumns: 0
        },
        scrollY: false,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false,
    });

    let removedApplicantTable = $('#applicantRemovedTable').DataTable({
        "lengthChange": false,
        "paging": false,
        "searching": true,
        "processing": true,
        "ordering": false,
        "serverSide": false,
        "bInfo": false,
        "ajax": {
            url: "controller/tableHandler.php", // json datasource
            type: "post",  // method  , by default get
            data: {
                "action": 13,
            },
            // success: function (row, data, index) {
            //   console.log(row);
            //   console.log(data);
            //   console.log(index);
            // },
            error: function (data) {  // error handling
                console.log(data);
                var columnCount = $('#applicantRemovedTable').DataTable().columns().count();
                $(".applicantRemovedTable-error").html("");
                $("#applicantRemovedTable").append(`<tbody class="applicantRemovedTable-error text-center"><tr><th colspan="${columnCount}">No data found in the server</th></tr></tbody>`);
                $("#applicantRemovedTable_processing").css("display", "none");
            }
        },
        "createdRow": function (row, data, index) { },
        "columnDefs": [{ className: "text-center", "targets": [0] }],
        language: {
            processing: "<span class='loader'></span>"
        },
        fixedColumns: {
            leftColumns: 0
        },
        scrollY: false,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false,
    });

    let benefAssessTable = $('#benefAssessmentTable').DataTable({
        "lengthChange": false,
        "paging": false,
        "searching": true,
        "processing": true,
        "ordering": false,
        "serverSide": false,
        "bInfo": false,
        "ajax": {
            url: "controller/tableHandler.php", // json datasource
            type: "post",  // method  , by default get
            data: {
                "action": 14,
            },
            // success: function (row, data, index) {
            //   console.log(row);
            //   console.log(data);
            //   console.log(index);
            // },
            error: function (data) {  // error handling
                console.log(data);
                var columnCount = $('#benefAssessmentTable').DataTable().columns().count();
                $(".benefAssessmentTable-error").html("");
                $("#benefAssessmentTable").append(`<tbody class="benefAssessmentTable-error text-center"><tr><th colspan="${columnCount}">No data found in the server</th></tr></tbody>`);
                $("#benefAssessmentTable_processing").css("display", "none");
            }
        },
        "createdRow": function (row, data, index) { },
        "columnDefs": [{ className: "text-center", "targets": [0] }],
        language: {
            processing: "<span class='loader'></span>"
        },
        fixedColumns: {
            leftColumns: 0
        },
        scrollY: false,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false,
    });

    let benefRenewTable = $('#benefRenewTable').DataTable({
        "lengthChange": false,
        "paging": false,
        "searching": true,
        "processing": true,
        "ordering": false,
        "serverSide": false,
        "bInfo": false,
        "ajax": {
            url: "controller/tableHandler.php", // json datasource
            type: "post",  // method  , by default get
            data: {
                "action": 15,
            },
            // success: function (row, data, index) {
            //   console.log(row);
            //   console.log(data);
            //   console.log(index);
            // },
            error: function (data) {  // error handling
                console.log(data);
                var columnCount = $('#benefRenewTable').DataTable().columns().count();
                $(".benefRenewTable-error").html("");
                $("#benefRenewTable").append(`<tbody class="benefRenewTable-error text-center"><tr><th colspan="${columnCount}">No data found in the server</th></tr></tbody>`);
                $("#benefRenewTable_processing").css("display", "none");
            }
        },
        "createdRow": function (row, data, index) { },
        "columnDefs": [{ className: "text-center", "targets": [0] }],
        language: {
            processing: "<span class='loader'></span>"
        },
        fixedColumns: {
            leftColumns: 0
        },
        scrollY: false,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false,
    });

    let benefRemovedTable = $('#benefRemovedTable').DataTable({
        "lengthChange": false,
        "paging": false,
        "searching": true,
        "processing": true,
        "ordering": false,
        "serverSide": false,
        "bInfo": false,
        "ajax": {
            url: "controller/tableHandler.php", // json datasource
            type: "post",  // method  , by default get
            data: {
                "action": 16,
            },
            // success: function (row, data, index) {
            //   console.log(row);
            //   console.log(data);
            //   console.log(index);
            // },
            error: function (data) {  // error handling
                console.log(data);
                var columnCount = $('#benefRemovedTable').DataTable().columns().count();
                $(".benefRemovedTable-error").html("");
                $("#benefRemovedTable").append(`<tbody class="benefRemovedTable-error text-center"><tr><th colspan="${columnCount}">No data found in the server</th></tr></tbody>`);
                $("#benefRemovedTable_processing").css("display", "none");
            }
        },
        "createdRow": function (row, data, index) { },
        "columnDefs": [{ className: "text-center", "targets": [0] }],
        language: {
            processing: "<span class='loader'></span>"
        },
        fixedColumns: {
            leftColumns: 0
        },
        scrollY: false,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false,
    });

    let officialTable = $('#setWebsiteOfficials').DataTable({
        "lengthChange": false,
        "paging": false,
        "searching": true,
        "processing": true,
        "ordering": false,
        "serverSide": false,
        "bInfo": false,
        "ajax": {
            url: "controller/tableHandler.php", // json datasource
            type: "post",  // method  , by default get
            data: {
                "action": 17,
            },
            // success: function (row, data, index) {
            //   console.log(row);
            //   console.log(data);
            //   console.log(index);
            // },
            error: function (data) {  // error handling
                console.log(data);
                var columnCount = $('#setWebsiteOfficials').DataTable().columns().count();
                $(".setWebsiteOfficials-error").html("");
                $("#setWebsiteOfficials").append(`<tbody class="setWebsiteOfficials-error text-center"><tr><th colspan="${columnCount}">No data found in the server</th></tr></tbody>`);
                $("#setWebsiteOfficials_processing").css("display", "none");
            }
        },
        "createdRow": function (row, data, index) { },
        "columnDefs": [{ className: "text-center", "targets": [0] }],
        language: {
            processing: "<span class='loader'></span>"
        },
        fixedColumns: {
            leftColumns: 0
        },
        scrollY: false,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false,
    });
});

$(document).on("click", ".viewInfoClass", function () {
    let id = $(this).attr("data-id");

    $.ajax({
        url: "controller/tableHandler.php",
        type: "POST",
        data: {
            "action": 10,
            "id": id
        },
        success: function (data) {
            $("#accountViewId").val(id);
            $("#viewInfoModal .modal-body").html(data);
            $("#viewInfoModal").modal("show");
        }
    })
})

let accountViewId = $('#accountViewId').val();

$("input[name='decisionRadio']").on('change', function () {
    let val = $("input[name='decisionRadio']:checked").val();
    console.log(val);
    let text = icon = '';

    if (val == 2) {
        text = "Confirm Applicant for Assessment? You cannot undo this action.";
        icon = "question";
    } else if (val == 3) {
        text = "Confirm Applicant for Interview? You cannot undo this action.";
        icon = "question";
    } else if (val == 4) {
        text = "Approve Applicant? You cannot undo this action.";
        icon = "info";
    } else {
        text = "Reject Applicant? You cannot undo this action.";
        icon = "warning";
    }

    Swal.fire({
        title: "Are you sure?",
        text: text,
        icon: icon,
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
    }).then((result) => {
        if (result.isConfirmed) {
            if (val == 2 || val == 3) {
                appointment(val);
            } else {
                $.ajax({
                    url: "controller/accountHandler.php",
                    type: "POST",
                    data: {
                        action: 18,
                        decision: val,
                        applicantId: accountViewId
                    },
                    beforeSend: function () {
                        showBeforeSend("Updating Applicant Status...");
                    },
                    success: function (data) {
                        hideBeforeSend();
                        if (data == "success") {
                            Swal.fire({
                                title: "Applicant Status Updated",
                                text: "The applicant's status has been updated",
                                icon: "success",
                                confirmButtonText: "OK"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            })
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: `An error occured while updating the applicant's status. Please try again. Error: ${data}`,
                            })
                        }
                    }
                })
            }
        }
    })
});

function appointment(val) {
    // if val is 2 and 3, create two inputs for date and time
    Swal.fire({
        title: "Set Appointment for" + (val == 2 ? " Assessment" : " Interview"),
        html: '<div class="form-group"><label for="date">Date</label><input type="date" class="form-control" id="date"></div><div class="form-group"><label for="startTime">Start Time</label><input type="time" class="form-control" id="startTime"></div><div class="form-group"><label for="endTime">End Time</label><input type="time" class="form-control" id="endTime"></div>',
        showCancelButton: true,
        confirmButtonText: "Set",
        cancelButtonText: "Cancel",
        preConfirm: () => {
            let date = $('#date').val();
            let startTime = $('#startTime').val();
            let endTime = $('#endTime').val();

            if (date == '' || startTime == '' || endTime == '') {
                Swal.showValidationMessage(
                    `Please fill up all fields.`
                )
            }

            if (new Date(date + ' ' + time) < new Date()) {
                Swal.showValidationMessage(
                    `The date and time you set is invalid.`
                )
            }

            if (startTime >= endTime) {
                Swal.showValidationMessage(
                    `The start time should be earlier than the end time.`
                )
            }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "controller/accountHandler.php",
                type: "POST",
                data: {
                    action: 18,
                    date: $('#date').val(),
                    startTime: $('#startTime').val(),
                    endTime: $('#endTime').val(),
                    decision: val,
                    applicantId: accountViewId
                },
                beforeSend: function () {
                    showBeforeSend("Setting Appointment...");
                },
                success: function (data) {
                    hideBeforeSend();
                    if (data == "success") {
                        Swal.fire({
                            title: "Appointment Submitted",
                            text: "An appointment with the applicant has been created. Please be available on the date and time you set",
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: `An error occured while setting an appointment. Please try again. Error: ${data}`,
                        })
                    }
                }
            })
        }
    })
}

$(document).on("click", ".deleteApplicant", function(){
    let id = $(this).attr("data-id");
    let status = $(this).attr("data-status");
    
    Swal.fire({
        title: "Are you sure?",
        text: "You are about to remove this " + status + ". You cannot undo this action.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
    }).then((result) => {
        if (result.isConfirmed) {
            swalReasonDeletion(id, status);
        }
    })
})

function swalReasonDeletion(id, status) {
    Swal.fire({
        title: "Reason for Deleting " + status,
        input: 'textarea',
        inputLabel: 'Reason',
        inputPlaceholder: 'Type your reason here...',
        inputAttributes: {
            'aria-label': 'Type your reason here'
        },
        showCancelButton: true,
        confirmButtonText: "Submit",
        cancelButtonText: "Cancel",
        preConfirm: (reason) => {
            if (reason == '') {
                Swal.showValidationMessage(
                    `Please fill up the reason field.`
                )
            }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "controller/accountHandler.php",
                type: "POST",
                data: {
                    action: 19,
                    id: id,
                    reason: $('#swal2-input').val(),
                },
                beforeSend: function () {
                    showBeforeSend("Submitting Deletion Request...");
                },
                success: function (data) {
                    hideBeforeSend();
                    if (data == "success") {
                        Swal.fire({
                            title: status + " Deletion Request",
                            text: "Deletion request for " + status + " has been submitted. Please wait for the admin's approval.",
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: `An error occured while requesting for deletion. Please try again. Error: ${data}`,
                        })
                    }
                }
            })
        }
    })
}