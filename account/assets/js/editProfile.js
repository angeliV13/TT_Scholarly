$("#changePassBtn").on("click", function(e){
    e.preventDefault();

    let currentPassword = check_error(document.getElementById("currentPassword"));
    let newPassword = document.getElementById("newPassword");

    let arr = [document.getElementById("newPassword"), document.getElementById("renewPassword")];
    let checkFlag = check_error(arr, options = {
        type: "input",
        verifyFlag: 1,
    });

    let password = checkFlag !== undefined ? checkFlag : undefined;
    let verifyPassword = checkFlag !== undefined ? checkFlag : undefined;

    if (password !== undefined && currentPassword !== undefined){
        $.ajax({
            url: "controller/accountHandler.php",
            type: "POST",
            data: {
                action: 9,
                currentPassword: currentPassword,
                newPassword: password,
            },
            beforeSend: function() {
                Swal.fire({
                title: 'Please wait...',
                html: 'Changing your password',
                allowOutsideClick: false,
                imageUrl: "https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif",
                showConfirmButton: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                })
            },
            success: function(response){
                swal.close();
                
                if (response == "Success"){
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Password changed successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                            location.reload();
                        }
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: "Something went wrong! Error: " + response,
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
            }
        })
    }

})

$("#upload").click(function(){
    let file = document.getElementById("file");
    let uploadImgShow = document.getElementById("uploadImgShow");

    file.click();

    file.onchange = function(){
        
        if (file.files[0].type !== "image/png" && file.files[0].type !== "image/jpeg" && file.files[0].type !== "image/jpg"){
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "Please choose an image! (png, jpeg, jpg)",
                showConfirmButton: false,
                timer: 2000
            })
            return;
        }

        let removeText = document.getElementById("removeText");
        removeText.value = 0;

        let reader = new FileReader();
        reader.readAsDataURL(file.files[0]);
        reader.onload = function(){
            uploadImgShow.src = reader.result;
        }
    }
})

$("#remove").click(function(){
    let uploadImgShow = document.getElementById("uploadImgShow");
    let removeText = document.getElementById("removeText");
    uploadImgShow.src = "https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png";
    removeText.value = 1;
})

$("#editProfile").on("click", function(e){
    e.preventDefault();

    let firstName = check_error(document.getElementById("firstName"));
    let middleName = document.getElementById("middleName");
    let lastName = check_error(document.getElementById("lastName"));
    let addressLine = check_error(document.getElementById("addressLine"));
    let barangay = check_error(document.getElementById("barangay"));
    let municipality = check_error(document.getElementById("municipality"));
    let province = check_error(document.getElementById("province"));
    let zipCode = check_error(document.getElementById("zipCode"));

    let contactNo = check_error(document.getElementById("Phone"), options = {
        type: "number",
        verifyFlag: 1,
        conditionCheck: "contactNumber",
        regex: /^\d{10}$/,
        text: "Contact Number"
    });

    let email = check_error(document.getElementById("Email"), options = {
        type: "input",
        verifyFlag: 1,
        regex: /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/,
        text: "Email"
    });

    let removeText = document.getElementById("removeText");
    let file = document.getElementById("file").files[0];

    if (firstName !== undefined && lastName !== undefined && addressLine !== undefined && barangay !== undefined && municipality !== undefined && province !== undefined && zipCode !== undefined && contactNo !== undefined && email !== undefined){
        let formData = new FormData();
        formData.append("action", 10);
        formData.append("firstName", firstName);
        formData.append("middleName", middleName.value);
        formData.append("lastName", lastName);
        formData.append("addressLine", addressLine);
        formData.append("barangay", barangay);
        formData.append("municipality", municipality);
        formData.append("province", province);
        formData.append("zipCode", zipCode);
        formData.append("contactNo", contactNo);
        formData.append("email", email);
        formData.append("removeText", removeText.value);
        formData.append("file", file);

        $.ajax({
            url: "controller/accountHandler.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                Swal.fire({
                title: 'Please wait...',
                html: 'Updating your profile',
                allowOutsideClick: false,
                imageUrl: "https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif",
                showConfirmButton: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                })
            },
            success: function(response){
                swal.close();
                
                if (response == "Success"){
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Profile updated successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                            location.reload();
                        }
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: "Something went wrong! Error: " + response,
                        showConfirmButton: false,
                        // timer: 2000
                    })
                }
            }
        })
    }
})