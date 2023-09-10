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

$("#setWebsiteInfo").on("keydown", "td", function(e){
    if (e.which == 13){
        e.preventDefault();
        let tdDataArr = [];

        let id = $(this).closest("table").attr("id"); 

        for (instance of document.querySelectorAll("[contenteditable=true]")){
            if (instance.closest("table").id != id) continue;
            instance.setAttribute("data-text", instance.innerText);

            if (instance.innerText != ""){
                tdDataArr.push(instance.innerText);
            }
        }

        if (tdDataArr.length == 6){
            $.ajax({
                url: "controller/basicSetup.php",
                type: "POST",
                data: {
                    "action"        : 8.3,
                    "userId"        : userId,
                    "header"        : tdDataArr[0],
                    "descr"         : tdDataArr[1],
                    "address"       : tdDataArr[2],
                    "email"         : tdDataArr[3],
                    "telephone"     : tdDataArr[4],
                    "opening"       : tdDataArr[5]
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

$("#setOtherInfo").on("keydown", "td", function(e){
    if (e.which == 13){
        e.preventDefault();
        let tdDataArr = [];

        let id = $(this).closest("table").attr("id"); 
        
        for (instance of document.querySelectorAll("[contenteditable=true]")){
            if (instance.closest("table").id != id) continue;
            instance.setAttribute("data-text", instance.innerText);

            if (instance.innerText != ""){
                tdDataArr.push(instance.innerText);
            }
        }

        console.log(tdDataArr);

        if (tdDataArr.length == 3){
            $.ajax({
                url: "controller/basicSetup.php",
                type: "POST",
                data: {
                    "action"        : 18,
                    "welcome"       : tdDataArr[0],
                    "url"           : tdDataArr[1],
                    "aboutUrl"      : tdDataArr[2]
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

let loadFile = function (event, type, id) {
    let image = document.getElementById(id);
    image.src = URL.createObjectURL(event.target.files[0]);

    let formData = new FormData();
    formData.append("image", event.target.files[0]);
    formData.append("userId", userId);
    formData.append("type", type);
    formData.append("action", 19);

    let text = (type == 1) ? "Logo" : "Cover";

    $.ajax({
        url: "controller/basicSetup.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data == "success") {
                Swal.fire({
                    icon: "success",
                    title: "Success!",
                    text: `${text} Successfully Updated!`,
                })
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: `Something went wrong! Error: ${data}`,
                })
            }
        },
    });
};

$("#previewModal").on("click", function(){
    if ($("#preview .modal-body iframe").length > 0) $("#preview .modal-body iframe").remove();
    $("#preview .modal-body").append(`<iframe src="http://127.0.0.1/TT_Scholarly/" class="w-100" style="height: 80vh;"></iframe>`);
})

$("#officialImg").on("change", function(){
    let reader = new FileReader();
    reader.onload = function(e){
        $("#officialImgShow").attr("src", e.target.result);
    }

    reader.readAsDataURL(this.files[0]);

})

$("#addOfficials").on("click", function(e){
    let officialName = check_error(document.getElementById("officialName")); if (officialName == undefined) return false;
    let jobTitle = check_error(document.getElementById("jobTitle")); if (jobTitle == undefined) return false;
    let descr = $("#descr").val();
    let active = $("#active").val();

    let officialImg = check_error(document.getElementById("officialImg"), options = {
        type: "file",
        verifyFlag: 1,
        condition: "jpg,png,jpeg",
        text: "Official Profile Picture"
    }); if (officialImg == undefined) return;

    let fbLink = ($("#fbLink").val() == "") ? "" : check_error(document.getElementById("fbLink"), options = {
        type: "input",
        verifyFlag: 1,
        regex: /^(https?:\/\/)?((w{3}\.)?)facebook.com\/.*/i,
        text: "Facebook Profile URL"
    }); if (fbLink == undefined) return;

    let igLink = ($("#igLink").val() == "") ? "" : check_error(document.getElementById("igLink"), options = {
        type: "input",
        verifyFlag: 1,
        regex: /^(https?:\/\/)?((w{3}\.)?)instagram.com\/.*/i,
        text: "Instagram Profile URL"
    }); if (igLink == undefined) return;

    let twtLink = ($("#twtLink").val() == "") ? "" : check_error(document.getElementById("twtLink"), options = {
        type: "input",
        verifyFlag: 1,
        regex: /^(https?:\/\/)?((w{3}\.)?)twitter.com\/.*/i,
        text: "Twitter Profile URL"
    }); if (twtLink == undefined) return;

    let linkUrl = ($("#linkUrl").val() == "") ? "" : check_error(document.getElementById("linkUrl"), options = {
        type: "input",
        verifyFlag: 1,
        regex: /^(https?:\/\/)?((w{3}\.)?)linkedin.com\/.*/i,
        text: "LinkedIn Profile URL"
    }); if (linkUrl == undefined) return;

    let socialArr = [];

    if (fbLink != "") socialArr.push(fbLink);
    if (igLink != "") socialArr.push(igLink);
    if (twtLink != "") socialArr.push(twtLink);
    if (linkUrl != "") socialArr.push(linkUrl);

    let formData = new FormData();

    let img = $("#officialImg")[0].files[0];

    formData.append("action", 15);
    formData.append("userId", userId);
    formData.append("officialName", officialName);
    formData.append("jobTitle", jobTitle);
    formData.append("descr", descr);
    formData.append("active", active);
    formData.append("officialImg", img);
    formData.append("socialArr", JSON.stringify(socialArr));

    $.ajax({
        url: "controller/basicSetup.php",
        processData: false,
        contentType: false,
        type: "POST",
        data: formData,
        beforeSend: function(){
            showBeforeSend("Adding Official...");
        },
        success: function(data) {
            hideBeforeSend();
            if (data == "success") {
                Swal.fire({
                    icon: "success",
                    title: "Success!",
                    text: `Official successfully added!`,
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
})

$(document).on("click", ".viewOfficial", function(e){
    let id = $(this).attr("data-id");
    let name = $(this).attr("data-name");
    let job = $(this).attr("data-job");
    let desc = $(this).attr("data-desc");
    let img = $(this).attr("data-img");
    let active = $(this).attr("data-active");
    let soc = $(this).attr("data-soc");

    $("#officialId").val(id);
    $("#eofficialName").val(name);
    $("#ejobTitle").val(job);
    $("#edescr").val(desc);
    $("#eactive").val(active);
    $("#eofficialImgShow").attr("src", img);

    try {
        soc = JSON.parse(soc);
        console.log(soc);

        for (let i = 0; i < soc.length; i++){
            if (soc[i]['socType'].includes("facebook")){
                $("#efbLink").val(soc[i]['link']);
            } else if (soc[i]['socType'].includes("instagram")){
                $("#eigLink").val(soc[i]['link']);
            } else if (soc[i]['socType'].includes("twitter")){
                $("#etwtLink").val(soc[i]['link']);
            } else if (soc[i]['socType'].includes("linkedin")){
                $("#elinkUrl").val(soc[i]['link']);
            }
        }
    } catch (error) {
        console.error(error);
    }
})

$(document).on("click", ".deleteOfficial", function(e){
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
                    "action"    : 17,
                    "id"        : id
                },
                beforeSend: function() {
                    showBeforeSend("Deleting Official...");
                },
                success: function(data) {
                    hideBeforeSend();
                    if (data == "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: `Official successfully deleted!`,
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
        }
    })
})

$("#updateOfficial").on("click", function(e){
    let id = $("#officialId").val();
    let officialName = check_error(document.getElementById("eofficialName")); if (officialName == undefined) return false;
    let jobTitle = check_error(document.getElementById("ejobTitle")); if (jobTitle == undefined) return false;
    let descr = $("#edescr").val();
    let active = $("#eactive").val();

    let officialImg = ($("#eofficialImg")[0].files[0] == undefined) ? "" : check_error(document.getElementById("eofficialImg"), options = {
        type: "file",
        verifyFlag: 1,
        condition: "jpg,png,jpeg",
        text: "Official Profile Picture"
    }); if (officialImg == undefined) return;

    let fbLink = ($("#efbLink").val() == "") ? "" : check_error(document.getElementById("efbLink"), options = {
        type: "input",
        verifyFlag: 1,
        regex: /^(https?:\/\/)?((w{3}\.)?)facebook.com\/.*/i,
        text: "Facebook Profile URL"
    }); if (fbLink == undefined) return;

    let igLink = ($("#eigLink").val() == "") ? "" : check_error(document.getElementById("eigLink"), options = {
        type: "input",
        verifyFlag: 1,
        regex: /^(https?:\/\/)?((w{3}\.)?)instagram.com\/.*/i,
        text: "Instagram Profile URL"
    }); if (igLink == undefined) return;

    let twtLink = ($("#etwtLink").val() == "") ? "" : check_error(document.getElementById("etwtLink"), options = {
        type: "input",
        verifyFlag: 1,
        regex: /^(https?:\/\/)?((w{3}\.)?)twitter.com\/.*/i,
        text: "Twitter Profile URL"
    }); if (twtLink == undefined) return;

    let linkUrl = ($("#elinkUrl").val() == "") ? "" : check_error(document.getElementById("elinkUrl"), options = {
        type: "input",
        verifyFlag: 1,
        regex: /^(https?:\/\/)?((w{3}\.)?)linkedin.com\/.*/i,
        text: "LinkedIn Profile URL"
    }); if (linkUrl == undefined) return;

    let socialArr = [];

    if (fbLink != "") socialArr.push(fbLink);
    if (igLink != "") socialArr.push(igLink);
    if (twtLink != "") socialArr.push(twtLink);
    if (linkUrl != "") socialArr.push(linkUrl);

    let formData = new FormData();
    let img = ($("#eofficialImg")[0].files[0] == undefined) ? "" : $("#eofficialImg")[0].files[0];

    formData.append("action", 16);
    formData.append("userId", userId);
    formData.append("id", id);
    formData.append("officialName", officialName);
    formData.append("jobTitle", jobTitle);
    formData.append("descr", descr);
    formData.append("active", active);
    formData.append("officialImg", img);
    formData.append("socialArr", JSON.stringify(socialArr));

    $.ajax({
        url: "controller/basicSetup.php",
        processData: false,
        contentType: false,
        type: "POST",
        data: formData,
        beforeSend: function(){
            showBeforeSend("Updating Official...");
        },
        success: function(data) {
            hideBeforeSend();
            if (data == "success") {
                Swal.fire({
                    icon: "success",
                    title: "Success!",
                    text: `Official successfully updated!`,
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
})

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        selectable: true,
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: {
            url: 'controller/basicSetup.php',
            method: 'POST',
            extraParams: {
                action: 11,
            },
            failure: function() {
                console.log('there was an error while fetching events!');
            }
        },
        dateClick: function(info) {
            // console.log(info);

            getEventDetails(info.dateStr).then(function(data) {
                let events = JSON.parse(data);

                let eventId = events[0]["id"];
                let eventName = events[0]["title"];
                let eventDesc = events[0]["desc"];
                let eventImg = events[0]["image"];
                let eventStart = events[0]["start"];
                let eventEnd = events[0]["end"];
                let active = events[0]["active"];

                Swal.fire({
                    title: 'Edit Event',
                    html: `<input type="text" id="eeventName" class="form-control mb-2" placeholder="Event Name" value="${eventName}">
                        <input type="text" id="eeventDesc" class="form-control mb-2" placeholder="Event Description" value="${eventDesc}">
                        <select class="form-select mb-2" id="eactive">
                            <option value="1" ${(active == 1) ? "selected" : ""}>Active</option>
                            <option value="0" ${(active == 0) ? "selected" : ""}>Inactive</option>
                        </select>
                        <input type="file" id="eeventImg" class="form-control" accept="image/*">
                        <div class="text-center mt-2">
                            <img src="${eventImg}" id="eeventImgPreview" class="img-fluid" style="max-height: 200px; max-width: 200px;">
                        </div>
                        <input type="hidden" id="eeventId" class="form-control" value="${eventId}">
                        <input type="hidden" id="edateStart" class="form-control" value="${eventStart}">
                        <input type="hidden" id="edateEnd" class="form-control" value="${eventEnd}">`,
                    confirmButtonText: 'Update',
                    showCancelButton: true,
                    cancelButtonText: 'Delete',
                    focusConfirm: false,
                    didOpen: function(){
                        $("#eeventImg").on("change", function(){
                            let reader = new FileReader();
                            reader.onload = function(e){
                                $("#eeventImgPreview").attr("src", e.target.result);
                            }
                
                            reader.readAsDataURL(this.files[0]);
                        })
                    },
                    preConfirm: function() {
                        return new Promise(function(resolve, reject) {
                            let eventId = $("#eeventId").val();
                            let dateStart = $("#edateStart").val();
                            let dateEnd = $("#edateEnd").val();
                            let eventName = $("#eeventName").val();
                            let eventDesc = $("#eeventDesc").val();
                            let eventImg = $("#eeventImg").val();
                            let active = $("#eactive").val();
                
                            if (eventName == ""){
                                Swal.showValidationMessage(
                                    `Please enter the event name!`
                                )

                                resolve();
                
                                return false;
                            }
                
                            if (eventDesc == ""){
                                Swal.showValidationMessage(
                                    `Please enter the event description!`
                                )
                
                                resolve();

                                return false;
                            }
                
                            let img = ($("#eeventImg")[0].files[0] == undefined) ? "" : $("#eeventImg")[0].files[0];
                
                            let formData = new FormData();
                            formData.append("action", 13);
                            formData.append("userId", userId);
                            formData.append("eventId", eventId);
                            formData.append("eventName", eventName);
                            formData.append("eventDesc", eventDesc);
                            formData.append("eventImg", img);
                            formData.append("dateStart", dateStart);
                            formData.append("dateEnd", dateEnd);
                            formData.append("active", active);
                                
                            $.ajax({
                                url: "controller/basicSetup.php",
                                type: "POST",
                                processData: false,
                                contentType: false,
                                type: "POST",
                                data: formData,
                                success: function(data) {
                                    if (data == "success") {
                                        resolve();
                                    } else {
                                        Swal.showValidationMessage(
                                            `Something went wrong! Error: ${data}`
                                        )

                                        resolve();

                                        return false;
                                    }
                                }
                            })
                        });
                    }
                }).then(function(result){
                    if (result.isConfirmed) {
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: `Event successfully updated!`,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        let eventId = $("#eventId").val();
                                
                        $.ajax({
                            url: "controller/basicSetup.php",
                            type: "POST",
                            data: {
                                "action"    : 14,
                                "eventId"   : eventId
                            },
                            beforeSend: function(){
                                showBeforeSend("Deleting Event...");
                            },
                            success: function(data) {
                                hideBeforeSend();
                                if (data == "success") {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Success!",
                                        text: `Event successfully deleted!`,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
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
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                    })
                                }
                            }
                        })
                    }
                })
            }).catch(function(error) {
                console.error(error);
            });
        }
    });

    function getEventDetails(date) {
        return new Promise(function(resolve, reject) {
            $.ajax({
                url: "controller/basicSetup.php",
                type: "POST",
                data: {
                    "action": 11,
                    "date": date,
                    "type": 1
                },
                success: function(data) {
                    resolve(data);
                },
                error: function(xhr, status, error) {
                    reject(error);
                }
            });
        });
    }

    function IsDateHasEvent(calendar, date) {
        let desc = "";
        let eventStart = eventEnd = eventStartToDate = eventEndToDate = "";
        let events = calendar.getEvents();

        // console.log(events);
        
        for (let i = 0; i < events.length; i++) {
            eventStart = events[i]._instance.range.start;
            eventEnd = events[i]._instance.range.end;

            eventStartToDate = new Date(eventStart);
            eventEndToDate = new Date(eventEnd);

            if (date >= eventStartToDate.toISOString().slice(0, 10) && date <= eventEndToDate.toISOString().slice(0, 10)){
                desc = events[i]._def.extendedProps.desc;
                break;
            }   
        }

        return (desc == "") ? false : true;
    }

    calendar.render();

    calendar.on('select', function(info) {

        let checkEvent = IsDateHasEvent(calendar, info.startStr);

        // console.log(checkEvent);

        if (checkEvent){
            return false;
        }

        let dateStart = info.startStr;
        let dateEnd = (info.endStr == null) ? info.startStr : info.endStr;

        Swal.fire({
            title: 'Add Event',
            html: `<input type="text" id="eventName" class="form-control mb-2" placeholder="Event Name">
                <input type="text" id="eventDesc" class="form-control mb-2" placeholder="Event Description">
                <select class="form-select mb-2" id="active">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                <input type="file" id="eventImg" class="form-control" accept="image/*">
                <div class="text-center mt-2">
                    <img src="" id="eventImgPreview" class="img-fluid" style="max-height: 200px; max-width: 200px;">
                </div>
                <input type="hidden" id="dateStart" class="form-control" value="${dateStart}">
                <input type="hidden" id="dateEnd" class="form-control" value="${dateEnd}">`,
            confirmButtonText: 'Add',
            focusConfirm: false,
            didOpen: function(){
                $("#eventImg").on("change", function(){
                    let reader = new FileReader();
                    reader.onload = function(e){
                        $("#eventImgPreview").attr("src", e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);
                })
            },
            preConfirm: () => {
                let eventName = $("#eventName").val();
                let eventDesc = $("#eventDesc").val();
                let eventImg = $("#eventImg").val();
                let active = $("#active").val();

                if (eventName == ""){
                    Swal.showValidationMessage(
                        `Please enter the event name!`
                    )

                    return false;
                }

                if (eventDesc == ""){
                    Swal.showValidationMessage(
                        `Please enter the event description!`
                    )

                    return false;
                }

                if (eventImg == ""){
                    Swal.showValidationMessage(
                        `Please select an event image!`
                    )

                    return false;
                }

                let img = $("#eventImg")[0].files[0];

                let formData = new FormData();
                formData.append("action", 12);
                formData.append("userId", userId);
                formData.append("eventName", eventName);
                formData.append("eventDesc", eventDesc);
                formData.append("eventImg", img);
                formData.append("dateStart", dateStart);
                formData.append("dateEnd", dateEnd);
                formData.append("active", active);

                $.ajax({
                    url: "controller/basicSetup.php",
                    processData: false,
                    contentType: false,
                    type: "POST",
                    data: formData,
                    beforeSend: function(){
                        showBeforeSend("Adding Event...");
                    },
                    success: function(data) {
                        hideBeforeSend();
                        if (data == "success") {
                            Swal.fire({
                                icon: "success",
                                title: "Success!",
                                text: `Event successfully added!`,
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
            },
            showCancelButton: true,
            cancelButtonText: 'Cancel',
        })
    });
});

