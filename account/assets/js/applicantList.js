$(document).ready(function() {

    // Create the DataTable
    var applicantListTable = $("#applicantListTable").DataTable({
      orderCellsTop: true,
      initComplete: function() {
        var applicantListTable = this.api();
  
        // Add filtering
        applicantListTable.columns().every(function() {
          var column = this;
  
          // var input = $('<input type="text" />')
          //   .appendTo($("thead tr:eq(1) td").eq(this.index()))
          //   .on("keyup", function() {
          //     column.search($(this).val()).draw();
          //   });
  
  
          var select = $('<select><option value=""></option></select>')
            .appendTo($("thead tr:eq(1) td").eq(this.index()))
            .on('change', function() {
              var val = $.fn.dataTable.util.escapeRegex(
                $(this).val()
              );
  
              column
                .search(val ? '^' + val + '$' : '', true, false)
                .draw();
            });
  
          column.data().unique().sort().each(function(d, j) {
            select.append('<option value="' + d + '">' + d + '</option>')
          });
  
        });
      }
    });
  });