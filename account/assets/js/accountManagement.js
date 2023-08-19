let userId = $("#userId").val();
let scholarLevel = $("#scholarLevel").val();
let educBG = $("#educational-background");
let famBG = $("#family-background");
let addBG = $("#additional-information");

// if you hover your mouse to educBG tab and it is disabled, show a tooltip saying that the user needs to confirm their personal information first
$(document).on("mouseenter click", "#educBG", function(){
    if ($(this).attr("data-status") == "disabled"){
        $("#educational-background").attr("data-bs-toggle", "tooltip");
        $("#educational-background").attr("title", "Please confirm your personal information first!");
    }
})

$(document).on("mouseenter click", "#famBG", function(){
    if ($(this).attr("data-status") == "disabled"){
        $("#family-background").attr("data-bs-toggle", "tooltip");
        $("#family-background").attr("title", "Please confirm your educational background first!");
    }
})

$(document).on("mouseenter click", "#addBG", function(){
    if ($(this).attr("data-status") == "disabled"){
        $("#additional-information").attr("data-bs-toggle", "tooltip");
        $("#additional-information").attr("title", "Please confirm your family background first!");
    }
})


$("#benefInfo").on("submit", function(e){
    e.preventDefault();
    
    let contactNo = check_error(document.getElementById("contact_number"), options = {
        type: "number",
        verifyFlag: 1,
        conditionCheck: "contactNumber",
        regex: /^\d{10}$/,
        text: "Contact Number"
    }); if (contactNo == undefined) return;
    
    let email = check_error(document.getElementById("email"), options = {
        type: "email",
        verifyFlag: 1,
        regex: /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/,
        text: "Email"
    }); if (email == undefined) return;

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

$("#graduating_flag").on("change click", function(){
    let val = $(this).val();

    if (val == 0){
        $("#honor_flag").prop("disabled", false);
        $("#graduation_year").prop("disabled", true);
    } else {
        $("#graduation_year").prop("disabled", false);
        $("#honor_flag").prop("disabled", true);
        $("#honor_type").prop("disabled", true);
        $("#other_honor").prop("disabled", true);
        $("#other_honor").val("");
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

    let graduating_flag = check_error(document.getElementById("graduating_flag")); if (graduating_flag == undefined) return;
    let graduation_year = honor_flag = honor_type = other_honor = s_year_level = strand = s_schoolAddress = c_year_level = c_major = c_school_address = course = j_school_address = j_year_level = e_grade_level = e_school_address = s_otherSchool = s_otherStrand = j_otherSchool = e_otherSchool = c_otherSchool = c_otherCourse = "";
    let c_school = courseText = s_school = strandText = j_school = e_school = "";

    let collegeTableBody = $("#collegeTable tbody");
    let collegeRows = collegeTableBody.children();
    let college = [];

    let shsTableBody = $("#shsTable tbody");
    let shsRows = shsTableBody.children();
    let shs = [];

    let jhsTableBody = $("#jhsTable tbody");
    let jhsRows = jhsTableBody.children();
    let jhs = [];

    let elemTableBody = $("#elemTable tbody");
    let elemRows = elemTableBody.children();
    let elem = [];

    if (graduating_flag == 0){
        honor_flag = check_error(document.getElementById("honor_flag")); if (honor_flag == undefined) return;

        if (honor_flag == 0){
            honor_type = check_error(document.getElementById("honor_type")); if (honor_type == undefined) return;

            if (honor_type == "3"){
                other_honor = check_error(document.getElementById("other_honor")); if (other_honor == undefined) return;
            }
        }
    } else if (graduating_flag) {
        graduation_year = check_error(document.getElementById("graduation_year")); if (graduation_year == undefined) return;
    }

    if (scholarLevel == 1){
        c_school = check_error(document.getElementById("c_school")); if (c_school == undefined) return;
        courseText = check_error(document.getElementById("c_courseText"), options = {returnVal: "text"}); if (courseText == undefined) return;
        c_year_level = check_error(document.getElementById("c_year_level")); if (c_year_level == undefined) return;
        course = check_error(document.getElementById("c_course")); if (course == undefined) return;
        c_major = check_error(document.getElementById("c_major")); if (c_major == undefined) return;
        c_school_address = check_error(document.getElementById("c_school_address")); if (c_school_address == undefined) return;

        if (c_school == "Others"){
            c_otherSchool = check_error(document.getElementById("c_otherSchool")); if (c_otherSchool == undefined) return;
        }

        if (courseText == "Others"){
            c_otherCourse = check_error(document.getElementById("c_otherCourse")); if (c_otherCourse == undefined) return;
        }

        if (collegeRows.length > 0){
            for (let i = 0; i < collegeRows.length; i++){
                let row = collegeRows.eq(i);
                let collegeObj = {
                    honor: row.children().eq(1).text(),
                    acadYear: row.children().eq(2).text(),
                    sem: row.children().eq(3).text(),
                    yearLevel: row.children().eq(4).text(),
                }
                college.push(collegeObj);
            }
    
            let collegeCount = 0;
    
            for (let i = 0; i < college.length; i++){
                let obj = college[i];
                for (let key in obj){
                    if (obj[key] == ""){
                        collegeCount++;
                    }
                }
            }
    
            if (collegeCount > 0){
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Please fill out all fields in the College table."
                })
    
                return;
            }
        }
    }

    if (scholarLevel == 1 || scholarLevel == 2){
        // SHS
        s_school = check_error(document.getElementById("s_school")); if (s_school == undefined) return;
        strandText = check_error(document.getElementById("s_strandText"), options = {returnVal: "text"}); if (strandText == undefined) return;
        s_year_level = check_error(document.getElementById("s_year_level")); if (s_year_level == undefined) return;
        strand = check_error(document.getElementById("s_strand")); if (strand == undefined) return;
        s_schoolAddress = check_error(document.getElementById("s_schoolAddress")); if (s_schoolAddress == undefined) return;

        if (s_school == "Others"){
            s_otherSchool = check_error(document.getElementById("s_otherSchool")); if (s_otherSchool == undefined) return;
        }

        if (strandText == "Others"){
            s_otherStrand = check_error(document.getElementById("s_otherStrand")); if (s_otherStrand == undefined) return;
        }

        if (shsRows.length > 0){
            for (let i = 0; i < shsRows.length; i++){
                let row = shsRows.eq(i);
                let shsObj = {
                    honor: row.children().eq(1).text(),
                    acadYear: row.children().eq(2).text(),
                    sem: row.children().eq(3).text(),
                    yearLevel: row.children().eq(4).text(),
                }
                shs.push(shsObj);
            }
    
            let shsCount = 0;
    
            for (let i = 0; i < shs.length; i++){
                let obj = shs[i];
                for (let key in obj){
                    if (obj[key] == ""){
                        shsCount++;
                    }
                }
            }
    
            if (shsCount > 0){
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Please fill out all fields in the SHS table."
                })
    
                return;
            }
        }
    }

    if (scholarLevel == 1 || scholarLevel == 2 || scholarLevel == 3){
        // JHS
        j_school = check_error(document.getElementById("j_school")); if (j_school == undefined) return;
        j_year_level = check_error(document.getElementById("j_year_level")); if (j_year_level == undefined) return;
        j_school_address = check_error(document.getElementById("j_school_address")); if (j_school_address == undefined) return;

        if (j_school == "Others"){
            j_otherSchool = check_error(document.getElementById("j_otherSchool")); if (j_otherSchool == undefined) return;
        }

        if (jhsRows.length > 0){
            for (let i = 0; i < jhsRows.length; i++){
                let row = jhsRows.eq(i);
                let jhsObj = {
                    honor: row.children().eq(1).text(),
                    acadYear: row.children().eq(2).text(),
                    sem: row.children().eq(3).text(),
                    yearLevel: row.children().eq(4).text(),
                }
                jhs.push(jhsObj);
            }
    
            let jhsCount = 0;
    
            for (let i = 0; i < jhs.length; i++){
                let obj = jhs[i];
                for (let key in obj){
                    if (obj[key] == ""){
                        jhsCount++;
                    }
                }
            }
    
            if (jhsCount > 0){
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Please fill out all fields in the JHS table."
                })
    
                return;
            }
        }
    }

    if (scholarLevel == 1 || scholarLevel == 2 || scholarLevel == 3 || scholarLevel == 4){
        // Elem
        e_school = check_error(document.getElementById("e_school")); if (e_school == undefined) return;
        e_grade_level = check_error(document.getElementById("e_grade_level")); if (e_grade_level == undefined) return;
        e_school_address = check_error(document.getElementById("e_school_address")); if (e_school_address == undefined) return;

        if (e_school == "Others"){
            e_otherSchool = check_error(document.getElementById("e_otherSchool")); if (e_otherSchool == undefined) return;
        }

        if (elemRows.length > 0){
            for (let i = 0; i < elemRows.length; i++){
                let row = elemRows.eq(i);
                let elemObj = {
                    honor: row.children().eq(1).text(),
                    acadYear: row.children().eq(2).text(),
                    sem: row.children().eq(3).text(),
                    yearLevel: row.children().eq(4).text(),
                }
                elem.push(elemObj);
            }

            let elemCount = 0;

            for (let i = 0; i < elem.length; i++){
                let obj = elem[i];
                for (let key in obj){
                    if (obj[key] == ""){
                        elemCount++;
                    }
                }
            }

            if (elemCount > 0){
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Please fill out all fields in the Elem table."
                })

                return;
            }
        }
    }

    let data = {
        'college': {
            'school': c_school,
            'course': c_course,
            'year_level': c_year_level,
            'school_address': c_school_address,
            'otherSchool': c_otherSchool,
            'otherCourse': c_otherCourse,
            'collegeAwards' : college
        },
        'shs': {
            'school': s_school,
            'strand': s_strand,
            'year_level': s_year_level,
            'school_address': s_schoolAddress,
            'otherSchool': s_otherSchool,
            'otherStrand': s_otherStrand,
            'shsAwards': shs
        },
        'jhs': {
            'school': j_school,
            'year_level': j_year_level,
            'school_address': j_school_address,
            'otherSchool': j_otherSchool,
            'jhsAwards': jhs
        },
        'elem': {
            'school': e_school,
            'grade_level': e_grade_level,
            'school_address': e_school_address,
            'otherSchool': e_otherSchool,
            'elemAwards': elem
        },
        'other_info': {
            'graduating_flag': graduating_flag,
            'honor_flag': honor_flag,
            'honor_type': honor_type,
            'other_honor': other_honor,
            'graduation_year': graduation_year,
        },
        'action': '14',
        'userId': userId
    }

    $.ajax({
        url: "controller/accountHandler.php",
        type: "POST",
        data: data,
        beforeSend: function(){
            showBeforeSend("Updating Educational Background...");
        },
        success: function(data){
            hideBeforeSend();
            if (data == "success"){
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: "Educational Background Saved Successfully."
                }).then((result) => {
                    if (result.isConfirmed){
                        location.reload();
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
})

$("#inputGuardian").on("change click", function(){
    let val = $(this).val();

    if (val == 0){
        $("#guardianInfo").removeClass("d-none");
    } else if (val == 1){
        $("#guardianInfo").addClass("d-none");
    }
})

$("#inputSpouse").on("change click", function(){
    let val = $(this).val();

    if (val == 0){
        $("#spouseInfo").removeClass("d-none");
    } else if (val == 1){
        $("#spouseInfo").addClass("d-none");
    }
});


$("#familyBG").on("submit", function(e){
    e.preventDefault();

    let family_flag = check_error(document.getElementById("family_flag")); if (family_flag == undefined) return;
    let total_num = check_error(document.getElementById("total_num")); if (total_num == undefined) return;
    let birth_order = check_error(document.getElementById("birth_order")); if (birth_order == undefined) return;
    let source = check_error(document.getElementById("source")); if (source == undefined) return;
    let rent_flag = check_error(document.getElementById("rent_flag")); if (rent_flag == undefined) return;
    let monthly_payment = check_error(document.getElementById("monthly_payment")); if (monthly_payment == undefined) return;

    let otherInfoArr = fatherArr = motherArr = guardianArr = spouseArr = siblings = [];

    otherInfoArr.push({
        'family_flag': family_flag,
        'total_num': total_num,
        'birth_order': birth_order,
        'source': source,
        'rent_flag': rent_flag,
        'monthly_payment': monthly_payment,
    })

    let siblingTableBody = $("#siblingTable tbody");
    let siblingRows = siblingTableBody.children();

    if (siblingRows.length > 0){
        for (let i = 0; i < siblingRows.length; i++){
            let row = siblingRows.eq(i);
            let siblingObj = {
                name: row.children().eq(1).text(),
                age: row.children().eq(2).text(),
                occupation: row.children().eq(3).text(),
                employer: row.children().eq(4).text(),
                address: row.children().eq(5).text(),
            }
            siblings.push(siblingObj);
        }

        let siblingCount = 0;

        for (let i = 0; i < siblings.length; i++){
            let obj = siblings[i];
            for (let key in obj){
                if (obj[key] == ""){
                    siblingCount++;
                }
            }
        }

        if (siblingCount > 0){
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Please fill out all fields in the Sibling table."
            })

            return;
        }
    }

    // Father Info
    let fatherFN = check_error(document.getElementById("fatherFN")); if (fatherFN == undefined) return;
    let fatherMN = $("#fatherMN").val();
    let fatherLN = check_error(document.getElementById("fatherLN")); if (fatherLN == undefined) return;
    let fatherSuffix = $("#fatherSuffix").val();
    let fatherBday = check_error(document.getElementById("fatherBday"), options = {
        type: "date",
        verifyFlag: 1,
        condition: "today",
        conditionCheck: "birthdate"
      }); if (fatherBday == undefined) return;
    let fatherBplace = check_error(document.getElementById("fatherBplace")); if (fatherBplace == undefined) return;
    let fatherAge = check_error(document.getElementById("fatherAge")); if (fatherAge == undefined) return;
    let fatherContact = check_error(document.getElementById("fatherContact"), options = {
        type: "number",
        verifyFlag: 1,
        conditionCheck: "contactNumber",
        regex: /^\d{10}$/,
        text: "Contact Number"
      }); if (fatherContact == undefined) return;
    let fatherLivingFlag = check_error(document.getElementById("fatherLivingFlag")); if (fatherLivingFlag == undefined) return;
    let fatherOccupation = check_error(document.getElementById("fatherOccupation")); if (fatherOccupation == undefined) return;
    let fatherOtherOccupation = check_error(document.getElementById("fatherOtherOccupation")); if (fatherOtherOccupation == undefined) return;
    let fatherCompany = check_error(document.getElementById("fatherCompany")); if (fatherCompany == undefined) return;
    let fatherCompanyAddress = check_error(document.getElementById("fatherCompanyAddress")); if (fatherCompanyAddress == undefined) return;
    let fatherIncome = check_error(document.getElementById("fatherIncome")); if (fatherIncome == undefined) return;
    let fatherEducation = check_error(document.getElementById("fatherEducation")); if (fatherEducation == undefined) return;

    fatherArr.push({
        'fatherFN': fatherFN,
        'fatherMN': fatherMN,
        'fatherLN': fatherLN,
        'fatherSuffix': fatherSuffix,
        'fatherBday': fatherBday,
        'fatherBplace': fatherBplace,
        'fatherAge': fatherAge,
        'fatherContact': fatherContact,
        'fatherLivingFlag': fatherLivingFlag,
        'fatherOccupation': fatherOccupation,
        'fatherOtherOccupation': fatherOtherOccupation,
        'fatherCompany': fatherCompany,
        'fatherCompanyAddress': fatherCompanyAddress,
        'fatherIncome': fatherIncome,
        'fatherEducation': fatherEducation,
    });

    // Mother Info
    let motherFN = check_error(document.getElementById("motherFN")); if (motherFN == undefined) return;
    let motherMN = $("#motherMN").val();
    let motherLN = check_error(document.getElementById("motherLN")); if (motherLN == undefined) return;
    let motherSuffix = $("#motherSuffix").val();
    let motherBday = check_error(document.getElementById("motherBday"), options = {
        type: "date",
        verifyFlag: 1,
        condition: "today",
        conditionCheck: "birthdate"
      }); if (motherBday == undefined) return;
    let motherBplace = check_error(document.getElementById("motherBplace")); if (motherBplace == undefined) return;
    let motherAge = check_error(document.getElementById("motherAge")); if (motherAge == undefined) return;
    let motherContact = check_error(document.getElementById("motherContact"), options = {
        type: "number",
        verifyFlag: 1,
        conditionCheck: "contactNumber",
        regex: /^\d{10}$/,
        text: "Contact Number"
      }); if (motherContact == undefined) return;
    let motherLivingFlag = check_error(document.getElementById("motherLivingFlag")); if (motherLivingFlag == undefined) return;
    let motherOccupation = check_error(document.getElementById("motherOccupation")); if (motherOccupation == undefined) return;
    let motherOtherOccupation = check_error(document.getElementById("motherOtherOccupation")); if (motherOtherOccupation == undefined) return;
    let motherCompany = check_error(document.getElementById("motherCompany")); if (motherCompany == undefined) return;
    let motherCompanyAddress = check_error(document.getElementById("motherCompanyAddress")); if (motherCompanyAddress == undefined) return;
    let motherIncome = check_error(document.getElementById("motherIncome")); if (motherIncome == undefined) return;
    let motherEducation = check_error(document.getElementById("motherEducation")); if (motherEducation == undefined) return;

    motherArr.push({
        'motherFN': motherFN,
        'motherMN': motherMN,
        'motherLN': motherLN,
        'motherSuffix': motherSuffix,
        'motherBday': motherBday,
        'motherBplace': motherBplace,
        'motherAge': motherAge,
        'motherContact': motherContact,
        'motherLivingFlag': motherLivingFlag,
        'motherOccupation': motherOccupation,
        'motherOtherOccupation': motherOtherOccupation,
        'motherCompany': motherCompany,
        'motherCompanyAddress': motherCompanyAddress,
        'motherIncome': motherIncome,
        'motherEducation': motherEducation,
    });

    // Guardian Info

    let inputGuardian = $("#inputGuardian").val();

    if (inputGuardian == 0){
        let guardianRelationship = check_error(document.getElementById("guardianRelationship")); if (guardianRelationship == undefined) return;
        let guardianFN = check_error(document.getElementById("guardianFN")); if (guardianFN == undefined) return;
        let guardianMN = $("#guardianMN").val();
        let guardianLN = check_error(document.getElementById("guardianLN")); if (guardianLN == undefined) return;
        let guardianSuffix = $("#guardianSuffix").val();
        let guardianBday = check_error(document.getElementById("guardianBday"), options = {
            type: "date",
            verifyFlag: 1,
            condition: "today",
            conditionCheck: "birthdate"
          }); if (guardianBday == undefined) return;
        let guardianBplace = check_error(document.getElementById("guardianBplace")); if (guardianBplace == undefined) return;
        let guardianAge = check_error(document.getElementById("guardianAge")); if (guardianAge == undefined) return;
        let guardianContact = check_error(document.getElementById("guardianContact"), options = {
            type: "number",
            verifyFlag: 1,
            conditionCheck: "contactNumber",
            regex: /^\d{10}$/,
            text: "Contact Number"
          }); if (guardianContact == undefined) return;
        let guardianLivingFlag = check_error(document.getElementById("guardianLivingFlag")); if (guardianLivingFlag == undefined) return;
        let guardianOccupation = check_error(document.getElementById("guardianOccupation")); if (guardianOccupation == undefined) return;
        let guardianOtherOccupation = check_error(document.getElementById("guardianOtherOccupation")); if (guardianOtherOccupation == undefined) return;
        let guardianCompany = check_error(document.getElementById("guardianCompany")); if (guardianCompany == undefined) return;
        let guardianCompanyAddress = check_error(document.getElementById("guardianCompanyAddress")); if (guardianCompanyAddress == undefined) return;
        let guardianIncome = check_error(document.getElementById("guardianIncome")); if (guardianIncome == undefined) return;
        let guardianEducation = check_error(document.getElementById("guardianEducation")); if (guardianEducation == undefined) return;

        guardianArr.push({
            guardianRelationship: guardianRelationship,
            guardianFN: guardianFN,
            guardianMN: guardianMN,
            guardianLN: guardianLN,
            guardianSuffix: guardianSuffix,
            guardianBday: guardianBday,
            guardianBplace: guardianBplace,
            guardianAge: guardianAge,
            guardianContact: guardianContact,
            guardianLivingFlag: guardianLivingFlag,
            guardianOccupation: guardianOccupation,
            guardianOtherOccupation: guardianOtherOccupation,
            guardianCompany: guardianCompany,
            guardianCompanyAddress: guardianCompanyAddress,
            guardianIncome: guardianIncome,
            guardianEducation: guardianEducation
        })
    }

    let inputSpouse = $("#inputSpouse").val();

    if (inputSpouse == 0){
        let spouseFN = check_error(document.getElementById("spouseFN")); if (spouseFN == undefined) return;
        let spouseMN = $("#spouseMN").val();
        let spouseLN = check_error(document.getElementById("spouseLN")); if (spouseLN == undefined) return;
        let spouseSuffix = $("#spouseSuffix").val();
        let spouseBday = check_error(document.getElementById("spouseBday"), options = {
            type: "date",
            verifyFlag: 1,
            condition: "today",
            conditionCheck: "birthdate"
          }); if (spouseBday == undefined) return;
        let spouseBplace = check_error(document.getElementById("spouseBplace")); if (spouseBplace == undefined) return;
        let spouseAge = check_error(document.getElementById("spouseAge")); if (spouseAge == undefined) return;
        let spouseContact = check_error(document.getElementById("spouseContact"), options = {
            type: "number",
            verifyFlag: 1,
            conditionCheck: "contactNumber",
            regex: /^\d{10}$/,
            text: "Contact Number"
          }); if (spouseContact == undefined) return;
        let spouseLivingFlag = check_error(document.getElementById("spouseLivingFlag")); if (spouseLivingFlag == undefined) return;
        let spouseOccupation = check_error(document.getElementById("spouseOccupation")); if (spouseOccupation == undefined) return;
        let spouseOtherOccupation = check_error(document.getElementById("spouseOtherOccupation")); if (spouseOtherOccupation == undefined) return;
        let spouseCompany = check_error(document.getElementById("spouseCompany")); if (spouseCompany == undefined) return;
        let spouseCompanyAddress = check_error(document.getElementById("spouseCompanyAddress")); if (spouseCompanyAddress == undefined) return;
        let spouseIncome = check_error(document.getElementById("spouseIncome")); if (spouseIncome == undefined) return;
        let spouseEducation = check_error(document.getElementById("spouseEducation")); if (spouseEducation == undefined) return;

        spouseArr.push({
            spouseFN: spouseFN,
            spouseMN: spouseMN,
            spouseLN: spouseLN,
            spouseSuffix: spouseSuffix,
            spouseBday: spouseBday,
            spouseBplace: spouseBplace,
            spouseAge: spouseAge,
            spouseContact: spouseContact,
            spouseLivingFlag,
            spouseOccupation: spouseOccupation,
            spouseOtherOccupation: spouseOtherOccupation,
            spouseCompany: spouseCompany,
            spouseCompanyAddress: spouseCompanyAddress,
            spouseIncome: spouseIncome,
            spouseEducation: spouseEducation
        })
    }

    $.ajax({
        url: "controller/accountHandler.php",
        type: "POST",
        data: {
            action: "15",
            guardianArr: guardianArr,
            spouseArr: spouseArr,
            fatherArr: fatherArr,
            motherArr: motherArr,
            siblings: siblings,
        },
        beforeSend: function(){
            showBeforeSend("Updating Family Information...");
        },
        success: function(data){
            hideBeforeSend();
            if (data == "success"){
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: "Family Information Saved Successfully."
                }).then((result) => {
                    if (result.isConfirmed){
                        location.reload();
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
})


$("#otherInfo").on("submit", function(e){
    e.preventDefault();

    let working_flag = check_error(document.getElementById("working_flag")); if (working_flag == undefined) return;
    let ofw_flag = check_error(document.getElementById("ofw_flag")); if (ofw_flag == undefined) return;
    let other_ofw = check_error(document.getElementById("other_ofw")); if (other_ofw == undefined) return;
    let pwd_flag = check_error(document.getElementById("pwd_flag")); if (pwd_flag == undefined) return;
    let other_pwd = check_error(document.getElementById("other_pwd")); if (other_pwd == undefined) return;
    let status_flag = check_error(document.getElementById("status_flag")); if (status_flag == undefined) return;
    let self_pwd_flag = check_error(document.getElementById("self_pwd_flag")); if (self_pwd_flag == undefined) return;

    $.ajax({
        url: "controller/accountHandler.php",
        type: "POST",
        data: {
            action: "16",
            working_flag: working_flag,
            ofw_flag: ofw_flag,
            other_ofw: other_ofw,
            pwd_flag: pwd_flag,
            other_pwd: other_pwd,
            status_flag: status_flag,
            self_pwd_flag: self_pwd_flag,
            userId: userId
        },
        beforeSend: function(){
            showBeforeSend("Updating Other Information...");
        },
        success: function(data){
            hideBeforeSend();
            if (data == "success"){
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: "Other Information Saved Successfully."
                }).then((result) => {
                    if (result.isConfirmed){
                        location.reload();
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
                                location.reload();
                            }
                        })
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: `An error occured while submitting your application. Please try again. Error: ${data}`,
                        })
                    }
                }
            })
        }
    })
})