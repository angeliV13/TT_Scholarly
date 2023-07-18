$("#save_profile").on("click", function (e) {
    Swal.fire({
      title: "Save Profile?",
      text: "Are you sure you want to save your profile?",
      icon: "question",
      showCancelButton: true,
      confirmButtonText: "Save Profile",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: "controller/profileSave.php",
          data: {
            action: 1,
          },
          success: function (data) {
            if (data == "Insert Success") {
              Swal.fire({
                title: "Success!",
                icon: "success",
                html: "Your profile is updated",
              });
            } else {
              Swal.fire({
                  title: "Error!",
                  icon: 'error',
                  html: data,
                });
            }
          },
        });
      }
    });
  
    return false;
  });
  