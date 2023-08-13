$("#addSchool").on("click", function(e){
    e.preventDefault();

    let userId = $("#userId").val();
    let schoolName = check_error(document.getElementById("schoolName"));
    let schoolAddress = check_error(document.getElementById("schoolAddress"));

    let schoolType = $("input[name='schoolType']:checked").map(function(){
        return $(this).val();
    }).get();

    if (schoolType == "") {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Please select a school type"
        })

        return false;
    }

    if (schoolName && schoolAddress) {
        $.ajax({
            url: "controller/basicSetup.php",
            type: "POST",
            data: {
                "action"        : 7,
                "userId"        : userId,
                "schoolName"    : schoolName,
                "schoolAddress" : schoolAddress,
                "schoolType"    : schoolType
            },
            success: function(data) {
                if (data == "success") {
                    Swal.fire({
                        icon: "success",
                        title: "Success!",
                        text: `School successfully added!`,
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
        })
    }
})

$(document).on("click", ".deleteSchool", function(e){
    e.preventDefault();

    let id = $(this).attr("data-id");
    let name = $(this).attr("data-name");

    Swal.fire({
        icon: "warning",
        title: "Are you sure?",
        text: `You are about to delete ${name}!`,
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "controller/basicSetup.php",
                type: "POST",
                data: {
                    "action"    : 7.2,
                    "id"        : id
                },
                beforeSend: function() {
                    showBeforeSend("Deleting School...");
                },
                success: function(data) {
                    hideBeforeSend();
                    if (data == "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: `School successfully deleted!`,
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
            })
        }
    })
})

$(document).on("click", ".editSchool", function(e){
    let id = $(this).attr("data-id");
    let name = $(this).attr("data-name");
    let address = $(this).attr("data-address");
    let type = $(this).attr("data-type");

    $("#schoolId").val(id);
    $("#editschoolName").val(name);
    $("#editschoolAddress").val(address);

    $("input[name='editschoolType']").each(function(){
        if ($(this).val() == type) {
            $(this).prop("checked", true);
        }
    });
})

$("#updateSchool").on("click", function(e){
    e.preventDefault();

    let id = $("#schoolId").val();
    let name = check_error(document.getElementById("editschoolName"));
    let address = check_error(document.getElementById("editschoolAddress"));

    let type = $("input[name='editschoolType']:checked").map(function(){
        return $(this).val();
    }).get();

    if (type == "") {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Please select a school type"
        })

        return false;
    }

    if (name && address) {
        $.ajax({
            url: "controller/basicSetup.php",
            type: "POST",
            data: {
                "action"    : 7.1,
                "id"        : id,
                "name"      : name,
                "address"   : address,
                "type"      : type
            },
            beforeSend: function() {
                showBeforeSend("Updating School...");
            },
            success: function(data) {
                hideBeforeSend();
                if (data == "success") {
                    Swal.fire({
                        icon: "success",
                        title: "Success!",
                        text: `School successfully updated!`,
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
        })
    }
})