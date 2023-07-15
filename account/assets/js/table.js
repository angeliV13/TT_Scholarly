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
})