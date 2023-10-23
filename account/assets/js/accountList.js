let accId = $("#userId").val();

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
            }).then((result) => {
              location.reload();
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
              html: "Account Updated Successfully",
            }).then((result) => {
              location.reload();
            })
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

function deleteAccount(id, name) {
  Swal.fire({
    title: "Delete Account?",
    text: "Are you sure you want to delete account for " + name + "? This cannot be undone.",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Add",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/accountHandler.php",
        data: {
          action: 23,
          id: id,
        },
        success: function (data) {
          if (data == "Delete Success") {
            Swal.fire({
              title: "Success!",
              icon: "success",
              html: "Account Deleted Successfully",
            }).then((result) => {
              location.reload();
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

$("#saveAdminProfile").on("click", function(e){
  e.preventDefault();
  
  let userName = check_error(document.getElementById("userName")); if (userName == undefined) return;
  let firstName = check_error(document.getElementById("firstName")); if (firstName == undefined) return;
  let middleName = $("#middleName").val();
  let lastName = check_error(document.getElementById("lastName")); if (lastName == undefined) return;
  let telephone = check_error(document.getElementById("telephone"), options = {
      type: "number",
      verifyFlag: 1,
      conditionCheck: "contactNumber",
      regex: /^\d{10}$/,
      text: "Contact Number"
  }); if (telephone == undefined) return;
  let emailAddress = check_error(document.getElementById("emailAddress"), options = {
  type: "email",
  verifyFlag: 1,
  regex: /^\w.+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/,
  text: "Email"
  }); if (emailAddress == undefined) return;

  $.ajax({
      url: "controller/accountHandler.php",
      type: "POST",
      data: {
          action: "24",
          userId: accId,
          userName: userName,
          firstName: firstName,
          middleName: middleName,
          lastName: lastName,
          telephone: telephone,
          emailAddress: emailAddress
      },
      beforeSend: function(){
          showBeforeSend("Updating Profile...");
      },
      success: function(data){
          hideBeforeSend();
          if (data == "success"){
              Swal.fire({
                  icon: "success",
                  title: "Success",
                  text: "Profile Updated Successfully."
              }).then((result) => {
                  if (result.isConfirmed){
                      location.reload();
                  }
              })
          } else {
              Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: `An error occured while updating your profile. Please try again. Error: ${data}`,
              })
          }
      }
  })
})
