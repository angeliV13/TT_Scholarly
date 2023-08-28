// $(document).ready(function() {

// // Create the DataTable
// var applicantListTable = $("#applicantListTable").DataTable({
//   orderCellsTop: true,
//   initComplete: function() {
//     var applicantListTable = this.api();

//     // Add filtering
//     applicantListTable.columns().every(function() {
//       var column = this;

//       // var input = $('<input type="text" />')
//       //   .appendTo($("thead tr:eq(1) td").eq(this.index()))
//       //   .on("keyup", function() {
//       //     column.search($(this).val()).draw();
//       //   });


//       var select = $('<select><option value=""></option></select>')
//         .appendTo($("thead tr:eq(1) td").eq(this.index()))
//         .on('change', function() {
//           var val = $.fn.dataTable.util.escapeRegex(
//             $(this).val()
//           );

//           column
//             .search(val ? '^' + val + '$' : '', true, false)
//             .draw();
//         });

//       column.data().unique().sort().each(function(d, j) {
//         select.append('<option value="' + d + '">' + d + '</option>')
//       });
//     });
//   }
// });

// });

// $('input[name="info"]').on('change', function(){
//   let id = $(this).attr('id');
//   if (id == 'infoProfile'){
//     $('#profile').removeClass('d-none');
//     $('#requirements').addClass('d-none');
//   }else{
//     $('#profile').addClass('d-none');
//     $('#requirements').removeClass('d-none');
//   }

//   console.log(id);
// });

// function infoRadio(id){
//   let button = $('input[name="info' + id + '"]:checked');

//   if (button.attr('id') == 'infoProfile' + id){
//     $('#profile' + id).removeClass('d-none');
//     $('#requirements' + id).addClass('d-none');
//   }else{
//     $('#profile' + id).addClass('d-none');
//     $('#requirements' + id).removeClass('d-none');
//   }
// }

function infoRadio() {
  let button = $('input[name="info"]:checked');

  if (button.attr('id') == 'infoProfile') {
    $('#profile').removeClass('d-none');
    $('#requirements').addClass('d-none');
  } else {
    $('#profile').addClass('d-none');
    $('#requirements').removeClass('d-none');
  }
}

  // $.ajax({
  //   type: "POST",
  //   url: "controller/tableHandler.php",
  //   data: {
  //     action: 5,
  //   },
  //   success: function (data) {
  //     if (data == "Insert Success") {
  //       Swal.fire({
  //         title: "Success!",
  //         icon: "success",
  //         html: "Your profile is updated",
  //       });
  //     } else {
  //       console.log(JSON.parse(data));
  //       // Swal.fire({
  //       //     title: "Error!",
  //       //     icon: 'error',
  //       //     html: data,
  //       //   });
  //     }
  //   },
  // });