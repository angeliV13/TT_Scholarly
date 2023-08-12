$("#addNotification").on("click", function(e){
    e.preventDefault();

    let notifFunc = check_error(document.getElementById("notifFunc"));
    let notifName = check_error(document.getElementById("notifName"));
    let notifIcon = check_error(document.getElementById("notifIcon"));
    let notifUsers = $("input[name='accTypeCheck[]']:checked").map(function(){
        return $(this).val();
    }).get();
    let filledCheck = $("input[name='filledCheck']:checked").val();

    if (notifUsers == "") {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: `Please select at least one user!`,
        }).then((result) => {
            if (result.isConfirmed) {
                $("input[name='accTypeCheck[]']").focus();
            }
        });

        return false;
    }

    if (notifFunc && notifName && notifIcon) {
        $.ajax({
            url: "controller/basicSetup.php",
            type: "POST",
            data: {
                "action"        : 6,
                "notifFunc"     : notifFunc,
                "notifName"     : notifName,
                "notifIcon"     : notifIcon,
                "notifUsers"    : notifUsers,
                "filledCheck"   : filledCheck
            },
            success: function(data) {
                if (data == "success") {
                    Swal.fire({
                        icon: "success",
                        title: "Success!",
                        text: `Notification successfully added!`,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: `Something went wrong! Error: ${data}`,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            }
        });
    }
})

$(document).on("click", ".editNotif", function(){
    let id = $(this).attr("data-id");
    let name = $(this).attr("data-name");
    let icon = $(this).attr("data-icon");
    let dark = $(this).attr("data-dark");
    let func = $(this).attr("data-func");
    let users = $(this).attr("data-users");

    console.log(id);

    $("#editnotifName").val(name);
    $("#editnotifFunc").val(func);
    $("#notifId").val(id);

    $("#editnotifIcon option").each(function(){
        if ($(this).val() == icon) {
            $(this).attr("selected", "selected");
        }
    });

    $("input[name='editaccTypeCheck[]']").each(function(){
        if (users.includes($(this).val())) {
            $(this).attr("checked", "checked");
        }
    });

    if (dark == 1) {
        $("input[name='editfilledCheck']").attr("checked", "checked");
    }
})

$("#updateNotif").on("click", function(e){
    e.preventDefault();

    let notifName = check_error(document.getElementById("editnotifName"));
    let notifIcon = check_error(document.getElementById("editnotifIcon"));
    let notifUsers = $("input[name='editaccTypeCheck[]']:checked").map(function(){
        return $(this).val();
    }).get();
    let filledCheck = $("input[name='editfilledCheck']:checked").val();
    let notifId = $("#notifId").val();

    if (notifUsers == "") {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: `Please select at least one user!`,
        }).then((result) => {
            if (result.isConfirmed) {
                $("input[name='editaccTypeCheck[]']").focus();
            }
        });

        return false;
    }

    if (notifName && notifIcon) {
        $.ajax({
            url: "controller/basicSetup.php",
            type: "POST",
            data: {
                "action"        : 6.1,
                "notifName"     : notifName,
                "notifIcon"     : notifIcon,
                "notifUsers"    : notifUsers,
                "filledCheck"   : filledCheck,
                "notifId"       : notifId
            },
            success: function(data) {
                if (data == "success") {
                    Swal.fire({
                        icon: "success",
                        title: "Success!",
                        text: `Notification successfully updated!`,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: `Something went wrong! Error: ${data}`,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            }
        });
    }
})