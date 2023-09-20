$("#genrep_applicant_btn").on("click", function (e) {

    $.ajax({
        type: "POST",
        url: "controller/generateReport.php",
        data: {
            action  : 1,
        },
        success: function (data) {
            console.log(data);
            
            let theadtr   = (JSON.parse(data))[0];
            let tbodytr   = (JSON.parse(data))[1];

            console.log(theadtr);
            console.log(tbodytr);


            $('#dynamic_table thead tr').empty();
            $('#dynamic_table tbody tr').empty();


            theadtr.forEach(headtr => {
                $('#dynamic_table thead tr').append(
                    '<th scope="col">' + headtr + '</th>'
                );
            });
            reportTable(tbodytr);
        },
    });
});

function reportTable(data){

    if ( $.fn.DataTable.isDataTable('#dynamic_table') ) {
        $('#dynamic_table').DataTable().destroy();
    }
    
    let dynamic_table = $('#dynamic_table').DataTable({
        "lengthChange": false,
        "paging": false,
        "searching": true,
        "processing": true,
        "ordering": false,
        "serverSide": false,
        "bInfo": false,
        "data": data,
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
}
