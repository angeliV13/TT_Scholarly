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
                var columnCount = $('#accountTable').DataTable().columns().count();
                $(".accountTable-error").html("");
                $("#accountTable").append(`<tbody class="accountTable-error text-center"><tr><th colspan="${columnCount}">No data found in the server</th></tr></tbody>`);
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
                var columnCount = $('#examQuestionsTable').DataTable().columns().count();
                $(".examQuestionsTable-error").html("");
                $("#examQuestionsTable").append(`<tbody class="examQuestionsTable-error text-center"><tr><th colspan="${columnCount}">No data found in the server</th></tr></tbody>`);
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
                var columnCount = $('#setNotifTable').DataTable().columns().count();
                $(".setNotifTable-error").html("");
                $("#setNotifTable").append(`<tbody class="setNotifTable-error text-center"><tr><th colspan="${columnCount}">No data found in the server</th></tr></tbody>`);
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

    // School Table
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
                var columnCount = $('#schoolTable').DataTable().columns().count();
                $(".schoolTable-error").html("");
                $("#schoolTable").append(`<tbody class="schoolTable-error text-center"><tr><th colspan="${columnCount}">No data found in the server</th></tr></tbody>`);
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
                var columnCount = $('#collegeNewApplicantTable').DataTable().columns().count();
                $(".collegeNewApplicantTable-error").html("");
                $("#collegeNewApplicantTable").append(`<tbody class="collegeNewApplicantTable-error text-center"><tr><th colspan="${columnCount}">No data found in the server</th></tr></tbody>`);
                $("#collegeNewApplicantTable_processing").css("display","none"); 
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
        stateSave   	: false,

        "fnInitComplete" : function(oSettings, json) {
            $("#collegeNewApplicantTable thead th").each( function ( i ) {
                if ($(this).text() !== '') {
                    var isStatusColumn = (($(this).text() == 'Status') ? true : false);
                    var select = $('<select><option value=""></option></select>')
                        .appendTo( $(this).empty() )
                        .on( 'change', function () {
                            var val = $(this).val();
                            
                            collegeNewApplicantTable.column( i )
                                .search( val ? '^'+$(this).val()+'$' : val, true, false )
                                .draw();
                        } );
                        
                    collegeNewApplicantTable.column( i ).data().unique().sort().each( function ( d, j ) {  
                        select.append( '<option value="'+d+'">'+d+'</option>' );
                    } );	
                    
                }
            } );
        }
    });


    // Website Socials Table
    let socialTable = $('#setWebsiteSocials').DataTable( {
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
                        "action"   	    : 6,
                    },
            // success: function (row, data, index) {
            //   console.log(row);
            //   console.log(data);
            //   console.log(index);
            // },
            error: function(data){  // error handling
                console.log(data);
                // get the number of columns
                var columnCount = $('#setWebsiteSocials').DataTable().columns().count();
                $(".setWebsiteSocials-error").html("");
                $("#setWebsiteSocials").append(`<tbody class="setWebsiteSocials-error text-center"><tr><th colspan="${columnCount}">No data found in the server</th></tr></tbody>`);
                $("#setWebsiteSocials_processing").css("display","none"); 
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
});