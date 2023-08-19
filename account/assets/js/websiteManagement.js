let userId = $("#userId").val();

$("#addSocial").on("click", function(e){
    e.preventDefault();
    let regexPattern = socText = "";

    let socType = check_error(document.getElementById("socType"));

    if (socType !== undefined){
        if (socType == "0"){ // Facebook
            regexPattern = /^(https?:\/\/)?((w{3}\.)?)facebook.com\/.*/i;
            socText = "Facebook Page URL";
        } else if (socType == "1"){ // Twitter or X
            regexPattern = /^(https?:\/\/)?((w{3}\.)?)twitter.com\/.*/i;
            socText = "Twitter Profile URL";
        } else if (socType == "2"){ // IG
            regexPattern = /^(https?:\/\/)?((w{3}\.)?)instagram.com\/.*/i;
            socText = "Instagram Profile URL";
        } else if (socType == "3"){ // LinkedIn
            regexPattern = /^(https?:\/\/)?((w{3}\.)?)linkedin.com\/.*/i;
            socText = "LinkedIn Profile URL";
        }

        let socLink = check_error(document.getElementById("socLink"), options = {
            type: "input",
            verifyFlag: 1,
            regex: regexPattern,
            text: socText
        });

        if (socType !== undefined && socLink !== undefined){
            $.ajax({
                url: "controller/basicSetup.php",
                type: "POST",
                data: {
                    "action"        : 8,
                    "userId"        : userId,
                    "socType"       : socType,
                    "socLink"       : socLink,
                },
                beforeSend: function(){
                    showBeforeSend("Adding Social Link...");
                },
                success: function(data) {
                    hideBeforeSend();
                    if (data == "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: `Social Link successfully added!`,
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
    }
})

$(document).on("click", ".deleteSocial", function(e){
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
                    "action"    : 8.1,
                    "id"        : id
                },
                beforeSend: function() {
                    showBeforeSend("Deleting Social Link...");
                },
                success: function(data) {
                    hideBeforeSend();
                    if (data == "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: `Social Link successfully deleted!`,
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

$(document).on("click", ".editSocial", function(e){
    let id = $(this).attr("data-id");
    let name = $(this).attr("data-name");
    let link = $(this).attr("data-link");
    let type = $(this).attr("data-type");

    $("#socialId").val(id);
    $("#updateSocType").val(type);
    $("#updateSocLink").val(link);
    $("#socName").val(name);
})

$("#updateSoc").on("click", function(e){
    e.preventDefault();

    let id = $("#socialId").val();

    let regexPattern = socText = "";

    let socType = check_error(document.getElementById("updateSocType"));

    if (socType !== undefined){
        if (socType == "0"){ // Facebook
            regexPattern = /^(https?:\/\/)?((w{3}\.)?)facebook.com\/.*/i;
            socText = "Facebook Page URL";
        } else if (socType == "1"){ // Twitter or X
            regexPattern = /^(https?:\/\/)?((w{3}\.)?)twitter.com\/.*/i;
            socText = "Twitter Profile URL";
        } else if (socType == "2"){ // IG
            regexPattern = /^(https?:\/\/)?((w{3}\.)?)instagram.com\/.*/i;
            socText = "Instagram Profile URL";
        } else if (socType == "3"){ // LinkedIn
            regexPattern = /^(https?:\/\/)?((w{3}\.)?)linkedin.com\/.*/i;
            socText = "LinkedIn Profile URL";
        }

        let socLink = check_error(document.getElementById("updateSocLink"), options = {
            type: "input",
            verifyFlag: 1,
            regex: regexPattern,
            text: socText
        });

        if (socType !== undefined && socLink !== undefined){
            $.ajax({
                url: "controller/basicSetup.php",
                type: "POST",
                data: {
                    "action"        : 8.2,
                    "userId"        : userId,
                    "id"            : id,
                    "socType"       : socType,
                    "socLink"       : socLink,
                },
                beforeSend: function(){
                    showBeforeSend("Updating Social Link...");
                },
                success: function(data) {
                    hideBeforeSend();
                    if (data == "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: `Social Link successfully updated!`,
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
    }
})

$("#setWebsiteInfo").on("keypress", "td", function(e){
    if (e.which == 13){
        e.preventDefault();
        var tdDataArr = [];

        for (instance of document.querySelectorAll("[contenteditable=true]")){
            instance.setAttribute("data-text", instance.innerText);

            if (instance.innerText != ""){
                tdDataArr.push(instance.innerText);
            }
        }

        if (tdDataArr.length == 4){
            $.ajax({
                url: "controller/basicSetup.php",
                type: "POST",
                data: {
                    "action"        : 8.3,
                    "userId"        : userId,
                    "address"       : tdDataArr[0],
                    "email"         : tdDataArr[1],
                    "telephone"     : tdDataArr[2],
                    "opening"       : tdDataArr[3]
                },
                beforeSend: function(){
                    showBeforeSend("Updating Website Info...");
                },
                success: function(data) {
                    hideBeforeSend();
                    if (data == "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: `Website Info successfully updated!`,
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
                        })
                    }
                }
            })
        } else {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: `Please fill all the fields!`,
            })
        }
    }
})

