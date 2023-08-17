$(document).ready(function(){
    let accountManagementTable = $('#accountTable').DataTable( {
        "lengthChange"  : false,
        "paging"        : false,
        "searching"     : false,
        "processing"    : true,
        "ordering"      : false,
        "serverSide"    : false,
        "bInfo" 		: false,
        "ajax":{
            url     :"controller/tableHandler.php", // json datasource
            type    : "post",  // method  , by default get
            data    : {
                        "action"   	    : 1,
                    },
            // success: function (row, data, index) {
            //   console.log(row);
            //   console.log(data);
            //   console.log(index);
            // },
            error: function(data){  // error handling
                console.log(data);
                $(".accountTable-error").html("");
                $("#accountTable").append('<tbody class="accountTable-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                $("#accountTable_processing").css("display","none"); 
            }
        },
        "createdRow": function( row, data, index ) {},
        "columnDefs": [{ className: "text-center", "targets": "_all" }],
        language	: {
                    processing	: "<span class='loader'></span>"
        },
        fixedColumns:   {
                leftColumns: 0
        },
        scrollY     	: 505,
        scrollCollapse	: false,
        scroller    	: {
            loadingIndicator    : false
        },
        stateSave   	: false
    });

    // MANAGE EXAM -> EXAM QUESTIONS TABLE
    let examQuestionsTable = $('#examQuestionsTable').DataTable( {
        "lengthChange"  : false,
        "paging"        : false,
        "searching"     : true,
        "processing"    : true,
        "ordering"      : false,
        "serverSide"    : false,
        "bInfo" 		: false,
        "ajax":{
            url     :"controller/tableHandler.php", // json datasource
            type    : "post",  // method  , by default get
            data    : {
                        "action"   	    : 2,
                    },
            // success: function (row, data, index) {
            //   console.log(row);
            //   console.log(data);
            //   console.log(index);
            // },
            error: function(data){  // error handling
                console.log(data);
                $(".examQuestionsTable-error").html("");
                $("#examQuestionsTable").append('<tbody class="accountTable-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                $("#examQuestionsTable_processing").css("display","none"); 
            }
        },
        "createdRow": function( row, data, index ) {},
        "columnDefs": [{ className: "text-center", "targets": [0] }],
        language	: {
                    processing	: "<span class='loader'></span>"
        },
        fixedColumns:   {
                leftColumns: 0
        },
        scrollY     	: false,
        scrollCollapse	: false,
        scroller    	: {
            loadingIndicator    : false
        },
        stateSave   	: false
    });

    // Notification Table
    let notifTable = $('#setNotifTable').DataTable( {
        "lengthChange"  : false,
        "paging"        : false,
        "searching"     : true,
        "processing"    : true,
        "ordering"      : false,
        "serverSide"    : false,
        "bInfo" 		: false,
        "ajax":{
            url     :"controller/tableHandler.php", // json datasource
            type    : "post",  // method  , by default get
            data    : {
                        "action"   	    : 3,
                    },
            // success: function (row, data, index) {
            //   console.log(row);
            //   console.log(data);
            //   console.log(index);
            // },
            error: function(data){  // error handling
                console.log(data);
                $(".setNotifTable-error").html("");
                $("#setNotifTable").append('<tbody class="accountTable-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                $("#setNotifTable_processing").css("display","none"); 
            }
        },
        "createdRow": function( row, data, index ) {},
        "columnDefs": [{ className: "text-center", "targets": [0] }],
        language	: {
                    processing	: "<span class='loader'></span>"
        },
        fixedColumns:   {
                leftColumns: 0
        },
        scrollY     	: false,
        scrollCollapse	: false,
        scroller    	: {
            loadingIndicator    : false
        },
        stateSave   	: false
    });

    // Notification Table
    let schoolTable = $('#schoolTable').DataTable( {
        "lengthChange"  : false,
        "paging"        : false,
        "searching"     : true,
        "processing"    : true,
        "ordering"      : false,
        "serverSide"    : false,
        "bInfo" 		: false,
        "ajax":{
            url     :"controller/tableHandler.php", // json datasource
            type    : "post",  // method  , by default get
            data    : {
                        "action"   	    : 4,
                    },
            // success: function (row, data, index) {
            //   console.log(row);
            //   console.log(data);
            //   console.log(index);
            // },
            error: function(data){  // error handling
                console.log(data);
                $(".schoolTable-error").html("");
                $("#schoolTable").append('<tbody class="accountTable-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                $("#schoolTable_processing").css("display","none"); 
            }
        },
        "createdRow": function( row, data, index ) {},
        "columnDefs": [{ className: "text-center", "targets": [0] }],
        language	: {
                    processing	: "<span class='loader'></span>"
        },
        fixedColumns:   {
                leftColumns: 0
        },
        scrollY     	: false,
        scrollCollapse	: false,
        scroller    	: {
            loadingIndicator    : false
        },
        stateSave   	: false
    });

    let collegeNewApplicantTable = $('#collegeNewApplicantTable').DataTable( {
        "lengthChange"  : false,
        "paging"        : false,
        "searching"     : true,
        "processing"    : true,
        "ordering"      : false,
        "serverSide"    : false,
        "bInfo" 		: false,
        "ajax":{
            url     :"controller/tableHandler.php", // json datasource
            type    : "post",  // method  , by default get
            data    : {
                        "action"   	    : 5,
                    },
            // success: function (row, data, index) {
            //   console.log(row);
            //   console.log(data);
            //   console.log(index);
            // },
            error: function(data){  // error handling
                console.log(data);
                $(".schoolTable-error").html("");
                $("#schoolTable").append('<tbody class="accountTable-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                $("#schoolTable_processing").css("display","none"); 
            }
        },
        "createdRow": function( row, data, index ) {},
        "columnDefs": [{ className: "text-center", "targets": [0] }],
        language	: {
                    processing	: "<span class='loader'></span>"
        },
        fixedColumns:   {
                leftColumns: 0
        },
        scrollY     	: false,
        scrollCollapse	: false,
        scroller    	: {
            loadingIndicator    : false
        },
        stateSave   	: false
    });
})