let userId = $("#userId").val();
let scholarLevel = $("#scholarLevel").val();

$("#benefInfo").on("submit", function(e){
    e.preventDefault();
    
    let contactNo = check_error(document.getElementById("contact_number"), options = {
        type: "number",
        verifyFlag: 1,
        conditionCheck: "contactNumber",
        regex: /^\d{10}$/,
        text: "Contact Number"
    });
    
    let email = check_error(document.getElementById("email"), options = {
        type: "email",
        verifyFlag: 1,
        regex: /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/,
        text: "Email"
    });

    if (contactNo && email){
        $.ajax({
            url: "controller/accountHandler.php",
            type: "POST",
            data: {
                'action': 11,
                'contactNo': contactNo,
                'email': email,
                'userId': userId
            },
            beforeSend: function(){
                showBeforeSend("Updating Contact Information...");
            },
            success: function(data){
                hideBeforeSend();
                if (data == "success") {
                    Swal.fire({
                        icon: "success",
                        title: "Success!",
                        text: `Contact Information Successfully Updated!`,
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

$("#honor_flag").on("change click", function(){
    let val = $(this).val();

    if (val == 0){
        $("#honor_type").prop("disabled", false);
    } else {
        $("#honor_type").prop("disabled", true);
        $("#other_honor").prop("disabled", true);
        $("#other_honor").val("");
    }
})

$("#honor_type").on("change click", function(){
    let val = $(this).val();

    if (val == "3"){
        $("#other_honor").prop("disabled", false);
    } else {
        $("#other_honor").prop("disabled", true);
        $("#other_honor").val("");
    }
})

$("#c_school").on("change click", function(){
    let val = $(this).val();

    if (val == "Others"){
        $("#c_otherSchool").prop("disabled", false);
        $("#c_school_address").prop("disabled", false);
        $("#c_school_address").val("");
    } else {
        $("#c_otherSchool").prop("disabled", true);
        $("#c_otherSchool").val("");
        
        $.ajax({
            url: "controller/accountHandler.php",
            type: "POST",
            data: {
                'action': 12,
                'schoolId': val
            },
            success: function(data){
                if (!data.includes("error")){
                    $("#c_school_address").val(data);
                    $("#c_school_address").prop("disabled", true);
                } else {
                    $("#c_school_address").val("");
                }
            }
        })
    }
})

$("#c_course").on("change click", function(){
    let text = $("#c_course option:selected").text();

    if (text == "Others"){
        $("#c_otherCourse").prop("disabled", false);
    } else {
        $("#c_otherCourse").prop("disabled", true);
        $("#c_otherCourse").val("");
    }
})

$("#s_school").on("change click", function(){
    let val = $(this).val();

    if (val == "Others"){
        $("#s_otherSchool").prop("disabled", false);
        $("#s_schoolAddress").prop("disabled", false);
        $("#s_schoolAddress").val("");
    } else {
        $("#s_otherSchool").prop("disabled", true);
        $("#s_otherSchool").val("");

        $.ajax({
            url: "controller/accountHandler.php",
            type: "POST",
            data: {
                'action': 12,
                'schoolId': val
            },
            success: function(data){
                if (!data.includes("error")){
                    $("#s_schoolAddress").val(data);
                    $("#s_schoolAddress").prop("disabled", true);
                } else {
                    $("#s_schoolAddress").val("");
                }
            }
        })
    }
})

$("#s_strand").on("change click", function(){
    let text = $("#s_strand option:selected").text();

    if (text == "Others"){
        $("#s_otherStrand").prop("disabled", false);
    } else {
        $("#s_otherStrand").prop("disabled", true);
        $("#s_otherStrand").val("");
    }
})

$("#j_school").on("change click", function(){
    let val = $(this).val();

    if (val == "Others"){
        $("#j_otherSchool").prop("disabled", false);
        $("#j_school_address").prop("disabled", false);
        $("#j_school_address").val("");
    } else {
        $("#j_otherSchool").prop("disabled", true);
        $("#j_otherSchool").val("");

        $.ajax({
            url: "controller/accountHandler.php",
            type: "POST",
            data: {
                'action': 12,
                'schoolId': val
            },
            success: function(data){
                if (!data.includes("error")){
                    $("#j_school_address").val(data);
                    $("#j_school_address").prop("disabled", true);
                } else {
                    $("#j_school_address").val("");
                }
            }
        })
    }
})

$("#e_school").on("change click", function(){
    let val = $(this).val();

    if (val == "Others"){
        $("#e_otherSchool").prop("disabled", false);
        $("#e_school_address").prop("disabled", false);
        $("#e_school_address").val("");
    } else {
        $("#e_otherSchool").prop("disabled", true);
        $("#e_otherSchool").val("");

        $.ajax({
            url: "controller/accountHandler.php",
            type: "POST",
            data: {
                'action': 12,
                'schoolId': val
            },
            success: function(data){
                if (!data.includes("error")){
                    $("#e_school_address").val(data);
                    $("#e_school_address").prop("disabled", true);
                } else {
                    $("#e_school_address").val("");
                }
            }
        })
    }
})

$("#addCollegeTable").on("click", function(){
    let collegeTableBody = $("#collegeTable tbody");
    let autoIncrement = collegeTableBody.children().length + 1;
    let newRow = collegeTableBody.append(`<tr>
        <td>${autoIncrement}</td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td><button class="editCollegeRow btn btn-primary btn-sm">Edit</button><button class="deleteCollegeRow btn btn-danger btn-sm">Delete</button></td>
    </tr>`);
})

$("#collegeTable").on("keypress", "td", function(e){
    if (e.which == 13){
        for (let i = 1; i < 5; i++){
            let row = $(this).parent();
            if (row.children().eq(i).text() == ""){
                return;
            } else {
                row.children().eq(i).prop("contenteditable", false);
            }
        }
    }
})

$("#collegeTable").on("click", ".editCollegeRow", function(e){
    e.preventDefault();
    let row = $(this).parent().parent();
    for (let i = 1; i < 5; i++){
        row.children().eq(i).prop("contenteditable", true);
    }
})

$("#collegeTable").on("click", ".deleteCollegeRow", function(){
    let row = $(this).parent().parent();
    row.remove();

    let collegeTableBody = $("#collegeTable tbody");
    let rows = collegeTableBody.children();
    for (let i = 0; i < rows.length; i++){
        rows.eq(i).children().eq(0).text(i + 1);
    }
})

$("#addSHSTable").on("click", function(){
    let shsTableBody = $("#shsTable tbody");
    let autoIncrement = shsTableBody.children().length + 1;
    let newRow = shsTableBody.append(`<tr>
        <td>${autoIncrement}</td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td><button class="editSHSRow btn btn-primary btn-sm">Edit</button><button class="deleteSHSRow btn btn-danger btn-sm">Delete</button></td>
    </tr>`);
})

$("#shsTable").on("keypress", "td", function(e){
    if (e.which == 13){
        for (let i = 0; i < 5; i++){
            let row = $(this).parent();
            if (row.children().eq(i).text() == ""){
                return;
            } else {
                row.children().eq(i).prop("contenteditable", false);
            }
        }
    }
})

$("#shsTable").on("click", ".editSHSRow", function(e){
    e.preventDefault();
    let row = $(this).parent().parent();
    for (let i = 1; i < 5; i++){
        row.children().eq(i).prop("contenteditable", true);
    }
})

$("#shsTable").on("click", ".deleteSHSRow", function(){
    let row = $(this).parent().parent();
    row.remove();

    let shsTableBody = $("#shsTable tbody");
    let rows = shsTableBody.children();
    for (let i = 0; i < rows.length; i++){
        rows.eq(i).children().eq(0).text(i + 1);
    }
})

$("#addHSTable").on("click", function(){
    let jsTableBody = $("#jhsTable tbody");
    let autoIncrement = jsTableBody.children().length + 1;
    let newRow = jsTableBody.append(`<tr>
        <td>${autoIncrement}</td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td><button class="editJSRow btn btn-primary btn-sm">Edit</button><button class="deleteJSRow btn btn-danger btn-sm">Delete</button></td>
    </tr>`);
})

$("#jsTable").on("keypress", "td", function(e){
    if (e.which == 13){
        for (let i = 1; i < 5; i++){
            let row = $(this).parent();
            if (row.children().eq(i).text() == ""){
                return;
            } else {
                row.children().eq(i).prop("contenteditable", false);
            }
        }
    }
})

$("#jsTable").on("click", ".editJSRow", function(e){
    e.preventDefault();
    let row = $(this).parent().parent();
    for (let i = 1; i < 5; i++){
        row.children().eq(i).prop("contenteditable", true);
    }
})

$("#jsTable").on("click", ".deleteJSRow", function(){
    let row = $(this).parent().parent();
    row.remove();

    let jsTableBody = $("#jsTable tbody");
    let rows = jsTableBody.children();
    for (let i = 0; i < rows.length; i++){
        rows.eq(i).children().eq(0).text(i + 1);
    }
})

$("#addElemTable").on("click", function(){
    let elemTableBody = $("#elemTable tbody");
    let autoIncrement = elemTableBody.children().length + 1;
    let newRow = elemTableBody.append(`<tr>
        <td>${autoIncrement}</td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td><button class="editElemRow btn btn-primary btn-sm">Edit</button><button class="deleteElemRow btn btn-danger btn-sm">Delete</button></td>
    </tr>`);
})

$("#elemTable").on("keypress", "td", function(e){
    if (e.which == 13){
        for (let i = 1; i < 5; i++){
            let row = $(this).parent();
            if (row.children().eq(i).text() == ""){
                return;
            } else {
                row.children().eq(i).prop("contenteditable", false);
            }
        }
    }
})

$("#elemTable").on("click", ".editElemRow", function(e){
    e.preventDefault();
    let row = $(this).parent().parent();
    for (let i = 1; i < 5; i++){
        row.children().eq(i).prop("contenteditable", true);
    }
})

$("#elemTable").on("click", ".deleteElemRow", function(){
    let row = $(this).parent().parent();
    row.remove();

    let elemTableBody = $("#elemTable tbody");
    let rows = elemTableBody.children();
    for (let i = 0; i < rows.length; i++){
        rows.eq(i).children().eq(0).text(i + 1);
    }
})

$("#addSibling").on("click", function(){
    let siblingTableBody = $("#siblingTable tbody");
    let autoIncrement = siblingTableBody.children().length + 1;
    let newRow = siblingTableBody.append(`<tr>
        <td>${autoIncrement}</td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td><button class="editSiblingRow btn btn-primary btn-sm">Edit</button><button class="deleteSiblingRow btn btn-danger btn-sm">Delete</button></td>
    </tr>`);
})

$("#siblingTable").on("keypress", "td", function(e){
    if (e.which == 13){
        for (let i = 1; i < 5; i++){
            let row = $(this).parent();
            if (row.children().eq(i).text() == ""){
                return;
            } else {
                row.children().eq(i).prop("contenteditable", false);
            }
        }
    }
})

$("#siblingTable").on("click", ".editSiblingRow", function(e){
    e.preventDefault();
    let row = $(this).parent().parent();
    for (let i = 1; i < 5; i++){
        row.children().eq(i).prop("contenteditable", true);
    }
})

$("#siblingTable").on("click", ".deleteSiblingRow", function(){
    let row = $(this).parent().parent();
    row.remove();

    let siblingTableBody = $("#siblingTable tbody");
    let rows = siblingTableBody.children();
    for (let i = 0; i < rows.length; i++){
        rows.eq(i).children().eq(0).text(i + 1);
    }
})

$("#educationBG").on("submit", function(e){
    e.preventDefault();

    let graduating_flag = check_error(document.getElementById("graduating_flag"));
    let honor_flag = honor_type = other_honor = "";

    if (graduating_flag == 0){
        honor_flag = check_error(document.getElementById("honor_flag"));

        if (honor_flag == 0){
            honor_type = check_error(document.getElementById("honor_type"));

            if (honor_type == "3"){
                other_honor = check_error(document.getElementById("other_honor"));
            }
        }
    }

    if (scholarLevel == 1){
        // college
        let c_school = check_error(document.getElementById("c_school"));
        let c_year_level = check_error(document.getElementById("c_year_level"));
        let course = check_error(document.getElementById("c_course"));
        let courseText = check_error(document.getElementById("c_courseText"), options = {returnVal: "text"});
        let c_major = check_error(document.getElementById("c_major"));
        let c_school_address = check_error(document.getElementById("c_school_address"));
        let c_otherSchool = c_otherCourse = "";

        if (c_school == "Others"){
            c_otherSchool = check_error(document.getElementById("c_otherSchool"));
        }

        if (courseText == "Others"){
            c_otherCourse = check_error(document.getElementById("c_otherCourse"));
        }

        let collegeTableBody = $("#collegeTable tbody");
        let rows = collegeTableBody.children();
        let college = [];

        for (let i = 0; i < rows.length; i++){
            let row = rows.eq(i);
            let collegeObj = {
                honor: row.children().eq(1).text(),
                acadYear: row.children().eq(2).text(),
                sem: row.children().eq(3).text(),
                yearLevel: row.children().eq(4).text(),
            }
            college.push(collegeObj);
        }
    }

    if (scholarLevel == 1 || scholarLevel == 2){
        // SHS
        let s_school = check_error(document.getElementById("s_school"));
        let s_year_level = check_error(document.getElementById("s_year_level"));
        let strand = check_error(document.getElementById("s_strand"));
        let strandText = check_error(document.getElementById("s_strandText"), options = {returnVal: "text"});
        let s_schoolAddress = check_error(document.getElementById("s_schoolAddress"));
        let s_otherSchool = s_otherStrand = "";

        if (s_school == "Others"){
            s_otherSchool = check_error(document.getElementById("s_otherSchool"));
        }

        if (strandText == "Others"){
            s_otherStrand = check_error(document.getElementById("s_otherStrand"));
        }

        let shsTableBody = $("#shsTable tbody");
        let rows = shsTableBody.children();
        let shs = [];

        for (let i = 0; i < rows.length; i++){
            let row = rows.eq(i);
            let shsObj = {
                honor: row.children().eq(1).text(),
                acadYear: row.children().eq(2).text(),
                sem: row.children().eq(3).text(),
                yearLevel: row.children().eq(4).text(),
            }
            shs.push(shsObj);
        }
    }

    if (scholarLevel == 1 || scholarLevel == 2 || scholarLevel == 3){
        // JHS
        let j_school = check_error(document.getElementById("j_school"));
        let j_year_level = check_error(document.getElementById("j_year_level"));
        let j_school_address = check_error(document.getElementById("j_school_address"));

        if (j_school == "Others"){
            j_otherSchool = check_error(document.getElementById("j_otherSchool"));
        }

        let jhsTableBody = $("#jhsTable tbody");
        let rows = jhsTableBody.children();
        let jhs = [];

        for (let i = 0; i < rows.length; i++){
            let row = rows.eq(i);
            let jhsObj = {
                honor: row.children().eq(1).text(),
                acadYear: row.children().eq(2).text(),
                sem: row.children().eq(3).text(),
                yearLevel: row.children().eq(4).text(),
            }
            jhs.push(jhsObj);
        }
    }

    if (scholarLevel == 1 || scholarLevel == 2 || scholarLevel == 3 || scholarLevel == 4){
        // Elem
        let e_school = check_error(document.getElementById("e_school"));
        let e_grade_level = check_error(document.getElementById("e_grade_level"));
        let e_school_address = check_error(document.getElementById("e_school_address"));

        if (e_school == "Others"){
            e_otherSchool = check_error(document.getElementById("e_otherSchool"));
        }

        let elemTableBody = $("#elemTable tbody");
        let rows = elemTableBody.children();
        let elem = [];

        for (let i = 0; i < rows.length; i++){
            let row = rows.eq(i);
            let elemObj = {
                honor: row.children().eq(1).text(),
                acadYear: row.children().eq(2).text(),
                sem: row.children().eq(3).text(),
                yearLevel: row.children().eq(4).text(),
            }
            elem.push(elemObj);
        }
    }
})

$("#otherInfo").on("submit", function(e){

})

$("#submitApplication").on("click", function(e){
    e.preventDefault();

    Swal.fire({
        title: "Submit Application?",
        text: "Are you sure you want to submit your application? You will not be able to edit your application once you submit it.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, submit my application",
        cancelButtonText: "No, I want to edit my application"
    }).then((result) => {
        if (result.isConfirmed){
            $.ajax({
                url: "controller/accountHandler.php",
                type: "POST",
                data: {
                    action: "13",
                    userId : userId
                },
                beforeSend: function(){
                    showBeforeSend("Submitting Application...");
                },
                success: function(data){
                    hideBeforeSend();
                    if (data == "success"){
                        Swal.fire({
                            title: "Application Submitted",
                            text: "Your application has been submitted. Please wait for the confirmation email.",
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed){
                                window.location.href = "index.php";
                            }
                        })
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: `An error occured while submitting your application. Please try again. Error: ${data}`,
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