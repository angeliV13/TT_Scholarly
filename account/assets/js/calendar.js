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
        allDayDefault : true,
        events: {
            url: 'controller/basicSetup.php',
            method: 'POST',
            extraParams: {
                action: 11,
            },
            success: function(data) {
                // console.log(data);
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
                        <input type="file" id="eeventImg" class="form-control" accept="image/*">
                        <div class="text-center mt-2">
                            <img src="${eventImg}" id="eeventImgPreview" class="img-fluid" style="max-height: 200px; max-width: 200px;">
                        </div>
                        <input type="checkbox" id="eactive" class="form-check-input" ${(active == 1) ? "checked" : ""}>
                        <label for="eactive" class="form-check-label">Event Active?</label>
                        <input type="checkbox" id="eemailToAll" class="form-check-input mb-2" checked>
                        <label for="eemailToAll" class="form-check-label mb-2">Send Email</label>
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
                        let eventId = $("#eeventId").val();
                        let dateStart = $("#edateStart").val();
                        let dateEnd = $("#edateEnd").val();
                        let eventName = $("#eeventName").val();
                        let eventDesc = $("#eeventDesc").val();
                        let eventImg = $("#eeventImg").val();
                        let active = ($("input#eactive").is(":checked")) ? 1 : 0;
                        let email = ($("input#eemailToAll").is(":checked")) ? 1 : 0;

                        return new Promise(function(resolve, reject) {
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
                            formData.append("email", email);

                                
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
                        let eventId = $("#eeventId").val();
                                
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
            
            eventEndToDate.setDate(eventEndToDate.getDate() - 1);

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
        dateEnd = new Date(dateEnd);
        dateEnd.setDate(dateEnd.getDate() - 1);
        dateEnd = dateEnd.toISOString().slice(0, 10);

        Swal.fire({
            title: 'Add Event',
            html: `<input type="text" id="eventName" class="form-control mb-2" placeholder="Event Name">
                <input type="text" id="eventDesc" class="form-control mb-2" placeholder="Event Description">
                <input type="checkbox" id="active" class="form-check-input mb-2" checked>
                <div class="text-center mt-2">
                    <img src="" id="eventImgPreview" class="img-fluid" style="max-height: 200px; max-width: 200px;">
                </div>
                <label for="active" class="form-check-label mb-2">Event Active?</label>
                <input type="checkbox" id="emailToAll" class="form-check-input mb-2" checked>
                <label for="emailToAll" class="form-check-label mb-2">Send Email</label>
                <input type="file" id="eventImg" class="form-control" accept="image/*">
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
                let active = $("input#active").is(":checked") ? 1 : 0;
                let email = ($("input#emailToAll").is(":checked")) ? 1 : 0;


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
                formData.append("email", email);

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