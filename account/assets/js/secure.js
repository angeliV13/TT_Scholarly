$(document).keydown(function(e){ 
    if(e.which === 123){ 
        Swal.fire({
            title: "Error!",
            icon: "error",
            html: "Dev Tools is not Possible",
          }).then((result) => {
            e.preventDefault();
          });
       return false; 
    } if (e.ctrlKey && e.shiftKey && e.which == 'I') {
        Swal.fire({
            title: "Error!",
            icon: "error",
            html: "Dev Tools is not Possible",
          }).then((result) => {
            e.preventDefault();
          });
        e.preventDefault();
    }
    if (e.ctrlKey && e.shiftKey && e.which == 'C') {
        Swal.fire({
            title: "Error!",
            icon: "error",
            html: "Dev Tools is not Possible",
          }).then((result) => {
            e.preventDefault();
          });
        e.preventDefault();
    }
    if (e.ctrlKey && e.shiftKey && e.which == 'J') {
        Swal.fire({
            title: "Error!",
            icon: "error",
            html: "Dev Tools is not Possible",
          }).then((result) => {
            e.preventDefault();
          });
        e.preventDefault();
    }
    if (e.ctrlKey && e.key == 'U') {
        Swal.fire({
            title: "Error!",
            icon: "error",
            html: "Dev Tools is not Possible",
          }).then((result) => {
            e.preventDefault();
          });
        e.preventDefault();
    }
 
});

// $("body").on("contextmenu", function(e){
//     Swal.fire({
//         title: "Error!",
//         icon: "error",
//         html: "Right clicking is not Possible",
//       }).then((result) => {
//         e.preventDefault();
//       });
// });