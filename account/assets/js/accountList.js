$("#addAccount").on("submit", function (e) {
  e.preventDefault();

  let firstName = $("#accountFirstName").val();
  let middleName = $("#accountMiddleName").val();
  let lastName = $("#accountLastName").val();
  let username = $("#accountUserName").val();
  let email = $("#accountEmail").val();
  let accountType = $("input[name='accountType']:checked").val();
  let sAdminAccess = $("#accountAdminAccess").prop("checked") ? "1" : "0";
  let accountStatus = $("input[name='accountStatus']:checked").val();

  Swal.fire({
    title: "Add Account?",
    text: "Are you sure you want to add this account?",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Add",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/accountHandler.php",
        data: {
          action: 20,
          firstName: firstName,
          middleName: middleName,
          lastName: lastName,
          username: username,
          email: email,
          accountType: accountType,
          sAdminAccess: sAdminAccess,
          accountStatus: accountStatus,
        },
        success: function (data) {
          if (data == "Insert Success") {
            Swal.fire({
              title: "Success!",
              icon: "success",
              html: "Account Created Successfully",
            });
          } else {
            Swal.fire({
              title: "Error!",
              icon: "error",
              html: data,
            });
          }
        },
      });
    }
  });
});

function updateAccount(id) {
  let name        = $("#accountName_" + id).val();
  let username    = $("#accountUserName_" + id).val();
  let email       = $("#accountEmail_" + id).val();
  let accountType = $("input[name='accountType']:checked").val();
  let sAdminAccess =
    accountType >= 1
      ? $("#accountAdminAccess" + id).prop("checked")
        ? "1"
        : "0"
      : "0";
  let accountStatus = $("input[name='accountStatus']:checked").val();

  Swal.fire({
    title: "Edit Account?",
    text: "Are you sure you want to edit account for " + name + "?",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Add",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/accountHandler.php",
        data: {
          action: 21,
          id: id,
          username: username,
          email: email,
          accountType: accountType,
          sAdminAccess: sAdminAccess,
          accountStatus: accountStatus,
        },
        success: function (data) {
          if (data == "Update Success") {
            Swal.fire({
              title: "Success!",
              icon: "success",
              html: "Account Created Successfully",
            });
          } else {
            Swal.fire({
              title: "Error!",
              icon: "error",
              html: data,
            });
          }
        },
      });
    }
  });
}