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
                let eventImg = events[0]["img"];
                let eventStart = events[0]["start"];
                let eventEnd = events[0]["end"];
                let active = events[0]["active"];

                Swal.fire({
                    title: 'Edit Event',
                    html: `<input type="text" id="eventName" class="form-control mb-2" placeholder="Event Name" value="${eventName}">
                        <input type="text" id="eventDesc" class="form-control mb-2" placeholder="Event Description" value="${eventDesc}">
                        <select class="form-select mb-2" id="active">
                            <option value="1" ${(active == 1) ? "selected" : ""}>Active</option>
                            <option value="0" ${(active == 0) ? "selected" : ""}>Inactive</option>
                        </select>
                        <input type="file" id="eventImg" class="form-control" accept="image/*">
                        <div class="text-center mt-2">
                            <img src="${eventImg}" id="eventImgPreview" class="img-fluid" style="max-height: 200px; max-width: 200px;">
                        </div>
                        <input type="hidden" id="eventId" class="form-control" value="${eventId}">
                        <input type="hidden" id="dateStart" class="form-control" value="${eventStart}">
                        <input type="hidden" id="dateEnd" class="form-control" value="${eventEnd}">`,
                    confirmButtonText: 'Update',
                    showCancelButton: true,
                    cancelButtonText: 'Delete',
                    focusConfirm: false,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    didOpen: function(){
                        $("#eventImg").on("change", function(){
                            let reader = new FileReader();
                            reader.onload = function(e){
                                $("#eventImgPreview").attr("src", e.target.result);
                            }
                
                            reader.readAsDataURL(this.files[0]);
                        })
                    },
                    preConfirm: function() {
                        return new Promise(function(resolve, reject) {
                            let eventId = $("#eventId").val();
                            let dateStart = $("#dateStart").val();
                            let dateEnd = $("#dateEnd").val();
                            let eventName = $("#eventName").val();
                            let eventDesc = $("#eventDesc").val();
                            let eventImg = $("#eventImg").val();
                            let active = $("#active").val();
                
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
                
                            if (eventImg == ""){
                                Swal.showValidationMessage(
                                    `Please select an event image!`
                                )
                
                                resolve();

                                return false;
                            }
                
                            let img = $("#eventImg")[0].files[0];
                
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

