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
        stateSave: false,
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
        // "lengthChange": true,
        // "paging": true,
        // "searching": true,
        // "processing": true,
        // "ordering": true,
        // "serverSide": false,
        // "bInfo": true,
        "lengthChange": true,
        "paging": true,
        "searching": true,
        "processing": true,
        "ordering": true,
        "serverSide": false,
        "bInfo": true,
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
        scrollY: 505,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false
    });

    // Notification Table
    let notifTable = $('#setNotifTable').DataTable({
        "lengthChange": true,
        "paging": true,
        "searching": true,
        "processing": true,
        "ordering": true,
        "serverSide": false,
        "bInfo": true,
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
        scrollY: 505,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false
    });

    // School Table
    let schoolTable = $('#schoolTable').DataTable({
        "lengthChange": true,
        "paging": true,
        "searching": true,
        "processing": true,
        "ordering": true,
        "serverSide": false,
        "bInfo": true,
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
        initComplete: function () {
            $(document).on("click", "#setSchoolFilter", function () {
                schoolTable.ajax.reload();

                let filterSchool = $("#filterSchool option:selected").text();
                let filterSchoolType = $("#filterSchoolType option:selected").text();
                let filterClass = $("#filterClass option:selected").text();
                
                schoolTable.columns(1).search(filterSchool).draw();
                schoolTable.columns(3).search(filterSchoolType).draw();
                schoolTable.columns(4).search(filterClass).draw();
            });

            $(document).on("click", "#resetSchoolFilter", function () {
                schoolTable.columns(1).search("").draw();
                schoolTable.columns(3).search("").draw();
                schoolTable.columns(4).search("").draw();
            });
        },
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

    let collegeNewApplicantTable = $('#collegeNewApplicantTable').DataTable({
        "lengthChange": true,
        "paging": true,
        "searching": true,
        "processing": true,
        "ordering": true,
        "serverSide": false,
        "bInfo": true,
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
        "columnDefs": [
            { className: "text-center", "targets": [0] }, 
            { visible: false, targets: [2, 17, 18, 19, 20] }, 
        ],
        initComplete: function () {
            $(document).on("click", "#setFilter", function () {
                collegeNewApplicantTable.ajax.reload();

                let filterScholarType = $("#filterScholarType option:selected").text();
                let filterEducationLevel = $("#filterEducationLevel option:selected").text();
                let filterSchool = $("#filterSchool option:selected").text();
                let filterYearLevel = $("#filterYearLevel option:selected").val();
                
                collegeNewApplicantTable.columns(9).search(filterSchool).draw();
                collegeNewApplicantTable.columns(11).search(filterScholarType).draw();
                collegeNewApplicantTable.columns(12).search(filterEducationLevel).draw();
                collegeNewApplicantTable.columns(15).search(filterYearLevel).draw();
            });

            $(document).on("click", "#filter_reset", function () {
                collegeNewApplicantTable.columns(9).search("").draw();
                collegeNewApplicantTable.columns(11).search("").draw();
                collegeNewApplicantTable.columns(12).search("").draw();
                collegeNewApplicantTable.columns(15).search("").draw();
            });
        },
        language: {
            processing: "<span class='loader'></span>"
        },
        // fixedColumns: {
        //     leftColumns: 0
        // },
        scrollY: 505,
        scrollX: true,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false,
    });


    // Website Socials Table
    let socialTable = $('#setWebsiteSocials').DataTable({
        "lengthChange": true,
        "paging": true,
        "searching": true,
        "processing": true,
        "ordering": true,
        "serverSide": false,
        "bInfo": true,
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
        scrollY: 505,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false
    });

    // GRADUATES TABLE
    let graduatesTable = $('#graduatesTable').DataTable({
        "lengthChange": true,
        "paging": true,
        "searching": true,
        "processing": true,
        "ordering": true,
        "serverSide": false,
        "bInfo": true,
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
        initComplete: function () {
            $(document).on("click", "#setSchoolFilter", function () {
                graduatesTable.ajax.reload();

                let filterSchool = $("#filterSchool option:selected").text();
                let filterSchoolType = $("#filterSchoolType option:selected").text();
                let filterClass = $("#filterClass option:selected").text();
                let filterLevel = $("#filterLevel option:selected").val();
                let filterYear = $("#filterYear").val();
                
                graduatesTable.columns(7).search(filterSchool).draw();
                graduatesTable.columns(8).search(filterSchoolType).draw();
                graduatesTable.columns(9).search(filterClass).draw();
                graduatesTable.columns(10).search(filterLevel).draw();
                graduatesTable.columns(12).search(filterYear).draw();
            });

            $(document).on("click", "#resetSchoolFilter", function () {
                graduatesTable.columns(7).search("").draw();
                graduatesTable.columns(8).search("").draw();
                graduatesTable.columns(9).search("").draw();
                graduatesTable.columns(10).search("").draw();
                graduatesTable.columns(12).search("").draw();
            });
        },
        language: {
            processing: "<span class='loader'></span>"
        },
        fixedColumns: {
            leftColumns: 0
        },
        scrollY: 505,
        scrollX: true,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false,
    });

    // GRADUATES TABLE
    let graduatingTable = $('#graduatingTable').DataTable({
        "lengthChange": true,
        "paging": true,
        "searching": true,
        "processing": true,
        "ordering": true,
        "serverSide": false,
        "bInfo": true,
        "ajax": {
            url: "controller/tableHandler.php", // json datasource
            type: "post",  // method  , by default get
            data: {
                "action": 19,
            },
            // success: function (row, data, index) {
            //   console.log(row);
            //   console.log(data);
            //   console.log(index);
            // },
            error: function (data) {  // error handling
                console.log(data);
                var columnCount = $('#graduatingTable').DataTable().columns().count();
                $(".graduatingTable-error").html("");
                $("#graduatingTable").append(`<tbody class="graduatingTable-error text-center"><tr><th colspan="${columnCount}">No data found in the server</th></tr></tbody>`);
                $("#graduatingTable_processing").css("display", "none");
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
        scrollY: 505,
        scrollX: true,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false,
    });

    // Benef List Table
    let benefListTable = $('#listOfBeneficiaries').DataTable({
        "lengthChange": true,
        "paging": true,
        "searching": true,
        "processing": true,
        "ordering": true,
        "serverSide": false,
        "bInfo": true,
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
        "columnDefs": [{ className: "text-center", "targets": [0] }, { visible: false, targets: [2, 17, 18, 19, 20] }],
        initComplete: function () {
            $(document).on("click", "#setFilter", function () {
                benefListTable.ajax.reload();

                let filterScholarType = $("#filterScholarType option:selected").text();
                let filterEducationLevel = $("#filterEducationLevel option:selected").text();
                let filterSchool = $("#filterSchool option:selected").text();
                let filterYearLevel = $("#filterYearLevel option:selected").val();
                
                benefListTable.columns(9).search(filterSchool).draw();
                benefListTable.columns(11).search(filterScholarType).draw();
                benefListTable.columns(12).search(filterEducationLevel).draw();
                benefListTable.columns(15).search(filterYearLevel).draw();
            });

            $(document).on("click", "#filter_reset", function () {
                benefListTable.columns(9).search("").draw();
                benefListTable.columns(11).search("").draw();
                benefListTable.columns(12).search("").draw();
                benefListTable.columns(15).search("").draw();
            });
        },
        language: {
            processing: "<span class='loader'></span>"
        },
        fixedColumns: {
            leftColumns: 0
        },
        scrollY: 505,
        scrollX: true,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false
    });

    // View Notification Table
    let viewNotif = $('#viewNotifTable').DataTable({
        "lengthChange": true,
        "paging": true,
        "searching": true,
        "processing": true,
        "ordering": true,
        "serverSide": false,
        "bInfo": true,
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
        scrollY: 505,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false
    });

    let applicantInterviewTable = $('#applicantInterviewTable').DataTable({
        "lengthChange": true,
        "paging": true,
        "searching": true,
        "processing": true,
        "ordering": true,
        "serverSide": false,
        "bInfo": true,
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
        "columnDefs": [{ className: "text-center", "targets": [0] }, { visible: false, targets: [2, 17, 18] }],
        initComplete: function () {
            $(document).on("click", "#setFilter", function () {
                applicantInterviewTable.ajax.reload();

                let filterScholarType = $("#filterScholarType option:selected").text();
                let filterEducationLevel = $("#filterEducationLevel option:selected").text();
                let filterSchool = $("#filterSchool option:selected").text();
                let filterYearLevel = $("#filterYearLevel option:selected").val();

                applicantInterviewTable.columns(9).search(filterSchool).draw();
                applicantInterviewTable.columns(11).search(filterScholarType).draw();
                applicantInterviewTable.columns(12).search(filterEducationLevel).draw();
                applicantInterviewTable.columns(15).search(filterYearLevel).draw();
            });

            $(document).on("click", "#filter_reset", function () {
                applicantInterviewTable.columns(9).search("").draw();
                applicantInterviewTable.columns(11).search("").draw();
                applicantInterviewTable.columns(12).search("").draw();
                applicantInterviewTable.columns(15).search("").draw();
            });
        },
        language: {
            processing: "<span class='loader'></span>"
        },
        fixedColumns: {
            leftColumns: 0
        },
        scrollY: 505,
        scrollX: true,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false,
    });

    let applicantExamTable = $('#applicantExamination').DataTable({
        "lengthChange": true,
        "paging": true,
        "searching": true,
        "processing": true,
        "ordering": true,
        "serverSide": false,
        "bInfo": true,
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
        "columnDefs": [{ className: "text-center", "targets": [0] }, { visible: false, targets: [2, 19, 20] }],
        initComplete: function () {
            $(document).on("click", "#setFilter", function () {
                applicantExamTable.ajax.reload();

                let filterScholarType = $("#filterScholarType option:selected").text();
                let filterEducationLevel = $("#filterEducationLevel option:selected").text();
                let filterSchool = $("#filterSchool option:selected").text();
                let filterYearLevel = $("#filterYearLevel option:selected").val();

                applicantExamTable.columns(9).search(filterSchool).draw();
                applicantExamTable.columns(11).search(filterScholarType).draw();
                applicantExamTable.columns(12).search(filterEducationLevel).draw();
                applicantExamTable.columns(15).search(filterYearLevel).draw();
            });

            $(document).on("click", "#filter_reset", function () {
                applicantExamTable.columns(9).search("").draw();
                applicantExamTable.columns(11).search("").draw();
                applicantExamTable.columns(12).search("").draw();
                applicantExamTable.columns(15).search("").draw();
            });
        },
        language: {
            processing: "<span class='loader'></span>"
        },
        fixedColumns: {
            leftColumns: 0
        },
        scrollY: 505,
        scrollX: true,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false,
    });

    let removedApplicantTable = $('#applicantRemovedTable').DataTable({
        "lengthChange": true,
        "paging": true,
        "searching": true,
        "processing": true,
        "ordering": true,
        "serverSide": false,
        "bInfo": true,
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
        "columnDefs": [{ className: "text-center", "targets": [0] }, { visible: false, targets: [2, 17, 18, 19, 20] }],
        initComplete: function () {
            $(document).on("click", "#setFilter", function () {
                removedApplicantTable.ajax.reload();

                let filterScholarType = $("#filterScholarType option:selected").text();
                let filterEducationLevel = $("#filterEducationLevel option:selected").text();
                let filterSchool = $("#filterSchool option:selected").text();
                let filterYearLevel = $("#filterYearLevel option:selected").val();

                removedApplicantTable.columns(9).search(filterSchool).draw();
                removedApplicantTable.columns(11).search(filterScholarType).draw();
                removedApplicantTable.columns(12).search(filterEducationLevel).draw();
                removedApplicantTable.columns(15).search(filterYearLevel).draw();
            });

            $(document).on("click", "#filter_reset", function () {
                removedApplicantTable.columns(9).search("").draw();
                removedApplicantTable.columns(11).search("").draw();
                removedApplicantTable.columns(12).search("").draw();
                removedApplicantTable.columns(15).search("").draw();
            });
        },
        language: {
            processing: "<span class='loader'></span>"
        },
        fixedColumns: {
            leftColumns: 0
        },
        scrollY: 505,
        scrollX: true,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false,
    });

    let benefAssessTable = $('#benefAssessmentTable').DataTable({
        "lengthChange": true,
        "paging": true,
        "searching": true,
        "processing": true,
        "ordering": true,
        "serverSide": false,
        "bInfo": true,
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
        "columnDefs": [{ className: "text-center", "targets": [0] }, { visible: false, targets: [2, 19, 20] }],
        initComplete: function () {
            $(document).on("click", "#setFilter", function () {
                benefAssessTable.ajax.reload();

                let filterScholarType = $("#filterScholarType option:selected").text();
                let filterEducationLevel = $("#filterEducationLevel option:selected").text();
                let filterSchool = $("#filterSchool option:selected").text();
                let filterYearLevel = $("#filterYearLevel option:selected").val();

                benefAssessTable.columns(9).search(filterSchool).draw();
                benefAssessTable.columns(11).search(filterScholarType).draw();
                benefAssessTable.columns(12).search(filterEducationLevel).draw();
                benefAssessTable.columns(15).search(filterYearLevel).draw();
            });

            $(document).on("click", "#filter_reset", function () {
                benefAssessTable.columns(9).search("").draw();
                benefAssessTable.columns(11).search("").draw();
                benefAssessTable.columns(12).search("").draw();
                benefAssessTable.columns(15).search("").draw();
            });
        },
        language: {
            processing: "<span class='loader'></span>"
        },
        fixedColumns: {
            leftColumns: 0
        },
        scrollY: 505,
        scrollX: true,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false,
    });

    let benefRenewTable = $('#benefRenewTable').DataTable({
        "lengthChange": true,
        "paging": true,
        "searching": true,
        "processing": true,
        "ordering": true,
        "serverSide": false,
        "bInfo": true,
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
        "columnDefs": [{ className: "text-center", "targets": [0] }, { visible: false, targets: [2, 17, 18, 19, 20] }],
        initComplete: function () {
            $(document).on("click", "#setFilter", function () {
                benefRenewTable.ajax.reload();

                let filterScholarType = $("#filterScholarType option:selected").text();
                let filterEducationLevel = $("#filterEducationLevel option:selected").text();
                let filterSchool = $("#filterSchool option:selected").text();
                let filterYearLevel = $("#filterYearLevel option:selected").val();

                benefRenewTable.columns(9).search(filterSchool).draw();
                benefRenewTable.columns(11).search(filterScholarType).draw();
                benefRenewTable.columns(12).search(filterEducationLevel).draw();
                benefRenewTable.columns(15).search(filterYearLevel).draw();
            });

            $(document).on("click", "#filter_reset", function () {
                benefRenewTable.columns(9).search("").draw();
                benefRenewTable.columns(11).search("").draw();
                benefRenewTable.columns(12).search("").draw();
                benefRenewTable.columns(15).search("").draw();
            });
        },
        language: {
            processing: "<span class='loader'></span>"
        },
        fixedColumns: {
            leftColumns: 0
        },
        scrollY: 505,
        scrollX: true,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false,
    });

    let benefRemovedTable = $('#benefRemovedTable').DataTable({
        "lengthChange": true,
        "paging": true,
        "searching": true,
        "processing": true,
        "ordering": true,
        "serverSide": false,
        "bInfo": true,
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
        "columnDefs": [{ className: "text-center", "targets": [0] }, { visible: false, targets: [2, 17, 18, 19, 20] }],
        initComplete: function () {
            $(document).on("click", "#setFilter", function () {
                benefRemovedTable.ajax.reload();

                let filterScholarType = $("#filterScholarType option:selected").text();
                let filterEducationLevel = $("#filterEducationLevel option:selected").text();
                let filterSchool = $("#filterSchool option:selected").text();
                let filterYearLevel = $("#filterYearLevel option:selected").val();

                benefRemovedTable.columns(9).search(filterSchool).draw();
                benefRemovedTable.columns(11).search(filterScholarType).draw();
                benefRemovedTable.columns(12).search(filterEducationLevel).draw();
                benefRemovedTable.columns(15).search(filterYearLevel).draw();
            });

            $(document).on("click", "#filter_reset", function () {
                benefRemovedTable.columns(9).search("").draw();
                benefRemovedTable.columns(11).search("").draw();
                benefRemovedTable.columns(12).search("").draw();
                benefRemovedTable.columns(15).search("").draw();
            });
        },
        language: {
            processing: "<span class='loader'></span>"
        },
        fixedColumns: {
            leftColumns: 0
        },
        scrollY: 505,
        scrollX: true,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false,
    });

    let officialTable = $('#setWebsiteOfficials').DataTable({
        "lengthChange": true,
        "paging": true,
        "searching": true,
        "processing": true,
        "ordering": true,
        "serverSide": false,
        "bInfo": true,
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
        scrollY: 505,
        scrollCollapse: false,
        scroller: {
            loadingIndicator: false
        },
        stateSave: false,
    });

    let testimonialTable = $('#setWebsiteAlumni').DataTable({
        "lengthChange": true,
        "paging": true,
        "searching": true,
        "processing": true,
        "ordering": true,
        "serverSide": false,
        "bInfo": true,
        "ajax": {
            url: "controller/tableHandler.php", // json datasource
            type: "post",  // method  , by default get
            data: {
                "action": 18,
            },
            // success: function (row, data, index) {
            //   console.log(row);
            //   console.log(data);
            //   console.log(index);
            // },
            error: function (data) {  // error handling
                console.log(data);
                var columnCount = $('#setWebsiteAlumni').DataTable().columns().count();
                $(".setWebsiteAlumni-error").html("");
                $("#setWebsiteAlumni").append(`<tbody class="setWebsiteAlumni-error text-center"><tr><th colspan="${columnCount}">No data found in the server</th></tr></tbody>`);
                $("#setWebsiteAlumni_processing").css("display", "none");
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
        scrollY: 505,
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
            let accountType = $("#accountType").val();
            let accountText = (accountType == 2) ? "For Renewal" : "For Interview";
            let currentStatus = (accountType == 2 && $("#scholarStatus").val() == "For Interview") ? "For Renewal" : $("#scholarStatus").val();
            
            $("#changeRadio").html(accountText);
            $("#currentStatus").html(currentStatus);

            if (currentStatus == "For Assesment Exam")
            {
                $("#decisionRadio1").prop("disabled", true);
            }
            else if (currentStatus == "For Interview" || currentStatus == "For Renewal")
            {
                $("#decisionRadio1").prop("disabled", true);
                $("#decisionRadio2").prop("disabled", true);
            }
            else if (currentStatus == "Application Approved")
            {
                $("#decisionRadio1").prop("disabled", true);
                $("#decisionRadio2").prop("disabled", true);
                $("#decisionRadio3").prop("disabled", true);
                $("#decisionRadio4").prop("disabled", true);
            }
            else if (currentStatus == "Application Rejected")
            {
                $("#decisionRadio1").prop("disabled", true);
                $("#decisionRadio2").prop("disabled", true);
                $("#decisionRadio3").prop("disabled", true);
                $("#decisionRadio4").prop("disabled", true);
            }
        }
    })
})

$("input[name='decisionRadio']").on('change', function () {
    let val = $("input[name='decisionRadio']:checked").val();
    let accountViewId = $('#accountViewId').val();
    let accountText = $("#changeRadio").html();
    let text = icon = '';

    if (val == 2) {
        text = "Confirm Applicant for Assessment? You cannot undo this action.";
        icon = "question";
    } else if (val == 3) {
        text = (accountText == "For Interview") ? "Confirm Applicant for Interview? You cannot undo this action." : "Confirm Applicant for Renewal? You cannot undo this action.";
        icon = "question";
    } else if (val == 4) {
        text = "Approve Applicant? You cannot undo this action.";
        icon = "info";
    } else if (val == 5) {
        text = "Reject Applicant? You cannot undo this action.";
        icon = "warning";
    } else {
        text = "Send Notification to Applicant?";
        icon = "question";
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
                appointment(val, accountViewId);
            } else if (val == 4) {
                approveApplicant(val, accountViewId);
            } else if (val == 5) {
                reasonForRejection(val, accountViewId);
            } else {
                sendEmailNotification(val, accountViewId);
            }
        }
    })
});

function appointment(val, accountViewId) {
    // if val is 2 and 3, create two inputs for date and time
    Swal.fire({
        title: "Set Appointment for" + (val == 2 ? " Assessment" : " Interview"),
        html: '<div class="form-group"><label for="date">Start Date and Time</label><input type="datetime-local" class="form-control" id="date"></div><div class="form-group"><label for="dateEnd">End Date and Time</label><input type="datetime-local" class="form-control" id="dateEnd"></div>',
        showCancelButton: true,
        confirmButtonText: "Set",
        cancelButtonText: "Cancel",
        preConfirm: () => {
            let date = $('#date').val();
            let dateEnd = $('#dateEnd').val();

            if (date == '' || dateEnd == '' ) {
                Swal.showValidationMessage(
                    `Please fill up all fields.`
                )
            }

            if (dateEnd < date) {
                Swal.showValidationMessage(
                    `End date and time cannot be earlier than the start date and time.`
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
                    dateEnd: $('#dateEnd').val(),
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

function approveApplicant(val, accountViewId) {
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

function reasonForRejection(val, accountViewId) {
    Swal.fire({
        title: "Reason for Rejection",
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
                    action: 18,
                    decision: val,
                    applicantId: accountViewId,
                    reason: $('#swal2-input').val(),
                },
                beforeSend: function () {
                    showBeforeSend("Rejecting Applicant...");
                },
                success: function (data) {
                    hideBeforeSend();
                    if (data == "success") {
                        Swal.fire({
                            title: "Applicant Rejected",
                            text: "The applicant has been rejected",
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
                            text: `An error occured while rejecting the applicant. Please try again. Error: ${data}`,
                        })
                    }
                }
            })
        }
    })
}

function sendEmailNotification(val, accountViewId) {
    Swal.fire({
        title: "Send Notification to Applicant",
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
                    action: 18,
                    decision: val,
                    applicantId: accountViewId,
                    reason: $('#swal2-input').val()
                },
                beforeSend: function () {
                    showBeforeSend("Sending Notification...");
                },
                success: function (data) {
                    hideBeforeSend();
                    if (data == "success") {
                        Swal.fire({
                            title: "Applicant Notified",
                            text: "The applicant has been notified",
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
                            text: `An error occured while notifying the applicant. Please try again. Error: ${data}`,
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

$(document).on("click", ".updateToGraduate", function(){
    let id = $(this).attr("data-id");
    let status = $(this).attr("data-status");
    
    Swal.fire({
        title: "Are you sure?",
        text: "You are about to update this " + status + " to Graduate. You cannot undo this action.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "controller/accountHandler.php",
                type: "POST",
                data: {
                    action: 26,
                    id: id,
                },
                beforeSend: function () {
                    showBeforeSend("Submitting Update Request...");
                },
                success: function (data) {
                    hideBeforeSend();
                    if (data == "success") {
                        Swal.fire({
                            title: "Success!",
                            text: "Update request for " + status + " has been successful!",
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
                            text: `An error occured while updating request. Please try again. Error: ${data}`,
                        })
                    }
                }
            })
        }
    })
})

$(document).on("click", ".undoGraduate", function(){
    let id = $(this).attr("data-id");
    
    Swal.fire({
        title: "Are you sure?",
        text: "Undoing this action will revert this user to its previous status. You cannot undo this action.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "controller/accountHandler.php",
                type: "POST",
                data: {
                    action: 27,
                    id: id,
                },
                beforeSend: function () {
                    showBeforeSend("Undoing Update Request...");
                },
                success: function (data) {
                    hideBeforeSend();
                    if (data == "success") {
                        Swal.fire({
                            title: "Success!",
                            text: "Undo Request has been successful!",
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
                            text: `An error occured while undoing request. Please try again. Error: ${data}`,
                        })
                    }
                }
            })
        }
    })
})