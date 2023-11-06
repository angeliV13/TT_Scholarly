let userId = $("#userId").val();
let scholarLevel = $("#scholarLevel").val();
let currentActive = $("#currentActive").val();
let collegeId = $("#collegeId").val();
let shsId = $("#shsId").val();
let jhsId = $("#jhsId").val();
let elemId = $("#elemId").val();

var loadFile = function (event) {
    var image = document.getElementById("output");
    image.src = URL.createObjectURL(event.target.files[0]);

    let formData = new FormData();
    formData.append("image", event.target.files[0]);
    formData.append("userId", userId);
    formData.append("action", 17);

    $.ajax({
        url: "controller/accountHandler.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data == "success") {
                Swal.fire({
                    icon: "success",
                    title: "Success!",
                    text: `Profile Picture Successfully Updated!`,
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

if (currentActive == "info_flag"){
    $("#personal-information").addClass("active");
    $("#bordered-justified-personal-information").addClass("active show");
} else if (currentActive == "educ_flag"){
    $("#educational-background").addClass("active");
    $("#bordered-justified-educational-background").addClass("active show");
} else if (currentActive == "family_flag"){
    $("#family-background").addClass("active");
    $("#bordered-justified-family-background").addClass("active show");
} else if (currentActive == "add_flag" || currentActive == "" || currentActive == 'req_flag'){
    $("#additional-information").addClass("active");
    $("#bordered-justified-additional-information").addClass("active show");
}

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

$(document).on("mouseenter click", "#reqLi", function(){
    if ($(this).attr("data-status") == "disabled"){
        $("#reqBtn").attr("data-bs-toggle", "tooltip");
        $("#reqBtn").attr("href", "#");
        $("#reqBtn").attr("title", "Please confirm your additional information first!");
    }
})

function calculateAge(val){
    let today = new Date();
    let birthDate = new Date(val);
    let age = today.getFullYear() - birthDate.getFullYear();
    let m = today.getMonth() - birthDate.getMonth();

    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())){
        age--;
    }

    return age;
}


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
        regex: /^\w.+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/,
        text: "Email"
    }); if (email == undefined) return;

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
})

$("#graduating_flag").on("change click", function(){
    let val = $(this).val();

    if (val == 0){
        // $("#graduation_year").prop("readonly", true);
        // $("#honor_flag").prop("disabled", false);
        // $("#graduation_year").prop("disabled", true);
    } else {
        // $("#graduation_year").prop("readonly", false);
        // $("#honor_flag").prop("disabled", true);
        // $("#honor_type").prop("disabled", true);
        // $("#other_honor").prop("disabled", true);
        $("#other_honor").val("");
    }
})

$("#honor_flag").on("change click", function(){
    let val = $(this).val();

    if (val == 0){
        // $("#honor_type").prop("disabled", false);
    } else {
        // $("#honor_type").prop("disabled", true);
        // $("#other_honor").prop("disabled", true);
        $("#other_honor").val("");
    }
})

$("#honor_type").on("change click", function(){
    let val = $(this).val();

    if (val == "3"){
        // $("#other_honor").prop("disabled", false);
    } else {
        // $("#other_honor").prop("disabled", true);
        $("#other_honor").val("");
    }
})

$("#c_school").on("change click", function(){
    let val = $(this).val();

    if (val == "Others"){
        // $("#c_otherSchool").prop("disabled", false);
        // $("#c_school_address").prop("disabled", false);
        $("#c_school_address").val("");
    } else {
        // $("#c_otherSchool").prop("disabled", true);
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
                    // $("#c_school_address").prop("disabled", true);
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
        // $("#c_otherCourse").prop("disabled", false);
    } else {
        // $("#c_otherCourse").prop("disabled", true);
        $("#c_otherCourse").val("");
    }
})

$("#s_school").on("change click", function(){
    let val = $(this).val();

    if (val == "Others"){
        // $("#s_otherSchool").prop("disabled", false);
        // $("#s_schoolAddress").prop("disabled", false);
        $("#s_schoolAddress").val("");
    } else {
        // $("#s_otherSchool").prop("disabled", true);
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
                    // $("#s_schoolAddress").prop("disabled", true);
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
        // $("#s_otherStrand").prop("disabled", false);
    } else {
        // $("#s_otherStrand").prop("disabled", true);
        $("#s_otherStrand").val("");
    }
})

$("#j_school").on("change click", function(){
    let val = $(this).val();

    if (val == "Others"){
        // $("#j_otherSchool").prop("disabled", false);
        // $("#j_school_address").prop("disabled", false);
        $("#j_school_address").val("");
    } else {
        // $("#j_otherSchool").prop("disabled", true);
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
                    // $("#j_school_address").prop("disabled", true);
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
        // $("#e_otherSchool").prop("disabled", false);
        // $("#e_school_address").prop("disabled", false);
        $("#e_school_address").val("");
    } else {
        // $("#e_otherSchool").prop("disabled", true);
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
                    // $("#e_school_address").prop("disabled", true);
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
        <td></td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td><button class="editCollegeRow btn btn-primary btn-sm">Edit</button><button class="deleteCollegeRow btn btn-danger btn-sm">Delete</button></td>
    </tr>`);
})

$("#collegeTable").on("keypress", "td", function(e){
    if (e.which == 13){
        for (let i = 2; i < 6; i++){
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
    let row = $(this).closest("tr");
    for (let i = 2; i < 6; i++){
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
        <td></td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td><button class="editSHSRow btn btn-primary btn-sm">Edit</button><button class="deleteSHSRow btn btn-danger btn-sm">Delete</button></td>
    </tr>`);
})

$("#shsTable").on("keypress", "td", function(e){
    if (e.which == 13){
        for (let i = 2; i < 6; i++){
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
    let row = $(this).closest("tr");
    for (let i = 2; i < 6; i++){
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
    let jhsTableBody = $("#jhsTable tbody");
    let autoIncrement = jhsTableBody.children().length + 1;
    let newRow = jhsTableBody.append(`<tr>
        <td>${autoIncrement}</td>
        <td></td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td><button class="editJSRow btn btn-primary btn-sm">Edit</button><button class="deleteJSRow btn btn-danger btn-sm">Delete</button></td>
    </tr>`);
})

$("#jhsTable").on("keypress", "td", function(e){
    if (e.which == 13){
        for (let i = 2; i < 6; i++){
            let row = $(this).parent();
            if (row.children().eq(i).text() == ""){
                return;
            } else {
                row.children().eq(i).prop("contenteditable", false);
            }
        }
    }
})

$("#jhsTable").on("click", ".editJSRow", function(e){
    e.preventDefault();
    let row = $(this).closest("tr");
    for (let i = 2; i < 6; i++){
        row.children().eq(i).prop("contenteditable", true);
    }
})

$("#jhsTable").on("click", ".deleteJSRow", function(){
    let row = $(this).parent().parent();
    row.remove();

    let jhsTableBody = $("#jhsTable tbody");
    let rows = jhsTableBody.children();
    for (let i = 0; i < rows.length; i++){
        rows.eq(i).children().eq(0).text(i + 1);
    }
})

$("#addElemTable").on("click", function(){
    let elemTableBody = $("#elemTable tbody");
    let autoIncrement = elemTableBody.children().length + 1;
    let newRow = elemTableBody.append(`<tr>
        <td>${autoIncrement}</td>
        <td></td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td><button class="editElemRow btn btn-primary btn-sm">Edit</button><button class="deleteElemRow btn btn-danger btn-sm">Delete</button></td>
    </tr>`);
})

$("#elemTable").on("keypress", "td", function(e){
    if (e.which == 13){
        for (let i = 2; i < 6; i++){
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
    let row = $(this).closest("tr");
    for (let i = 2; i < 6; i++){
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
        <td></td>
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
        for (let i = 2; i < 7; i++){
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
    let row = $(this).closest("tr");
    for (let i = 2; i < 7; i++){
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
    let c_school = courseText = s_school = strandText = j_school = e_school =  gwa = "";
    let cgwa = sgwa = hgwa = egwa = "";

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

    if (scholarLevel == 1 || scholarLevel == 2){
        c_school = check_error(document.getElementById("c_school")); if (c_school == undefined) return;

        if (c_school == "Others"){
            c_otherSchool = check_error(document.getElementById("c_otherSchool")); if (c_otherSchool == undefined) return;
        }
        
        c_year_level = check_error(document.getElementById("c_year_level")); if (c_year_level == undefined) return;

        course = check_error(document.getElementById("c_course")); if (course == undefined) return;
        courseText = check_error(document.getElementById("c_course"), options = {returnVal: "text", type: "select"}); if (courseText == undefined) return;

        if (courseText == "Others"){
            c_otherCourse = check_error(document.getElementById("c_otherCourse")); if (c_otherCourse == undefined) return;
        }
        
        c_major = check_error(document.getElementById("c_major")); if (c_major == undefined) return;
        c_school_address = check_error(document.getElementById("c_school_address")); if (c_school_address == undefined) return;
        cgwa = check_error(document.getElementById("cgwa")); if (gwa == undefined) return;

        if (collegeRows.length > 0){
            for (let i = 0; i < collegeRows.length; i++){
                let row = collegeRows.eq(i);
                let collegeObj = {
                    awardId: row.children().eq(1).text(),
                    honor: row.children().eq(2).text(),
                    acadYear: row.children().eq(3).text(),
                    sem: row.children().eq(4).text(),
                    yearLevel: row.children().eq(5).text(),
                }
                college.push(collegeObj);
            }
    
            let collegeCount = 0;
    
            for (let i = 0; i < college.length; i++){
                let obj = college[i];
                for (let key in obj){
                    if (key == "awardId") continue;
                    if (obj[key] == "") collegeCount++;
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

    if (scholarLevel == 1 || scholarLevel == 2 || scholarLevel == 3){
        // SHS
        s_school = check_error(document.getElementById("s_school")); if (s_school == undefined) return;

        if (s_school == "Others"){
            s_otherSchool = check_error(document.getElementById("s_otherSchool")); if (s_otherSchool == undefined) return;
        }
        
        s_year_level = check_error(document.getElementById("s_year_level")); if (s_year_level == undefined) return;

        strand = check_error(document.getElementById("s_strand")); if (strand == undefined) return;
        strandText = check_error(document.getElementById("s_strand"), options = {returnVal: "text", type: "select"}); if (strandText == undefined) return;
        
        if (strandText == "Others"){
            s_otherStrand = check_error(document.getElementById("s_otherStrand")); if (s_otherStrand == undefined) return;
        }

        s_schoolAddress = check_error(document.getElementById("s_schoolAddress")); if (s_schoolAddress == undefined) return;
        sgwa = check_error(document.getElementById("sgwa")); if (sgwa == undefined) return;

        if (shsRows.length > 0){
            for (let i = 0; i < shsRows.length; i++){
                let row = shsRows.eq(i);
                let shsObj = {
                    awardId: row.children().eq(1).text(),
                    honor: row.children().eq(2).text(),
                    acadYear: row.children().eq(3).text(),
                    sem: row.children().eq(4).text(),
                    yearLevel: row.children().eq(5).text(),
                }
                shs.push(shsObj);
            }
    
            let shsCount = 0;
    
            for (let i = 0; i < shs.length; i++){
                let obj = shs[i];
                for (let key in obj){
                    if (key == "awardId") continue;
                    if (obj[key] == "") shsCount++;
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

        if (j_school == "Others"){
            j_otherSchool = check_error(document.getElementById("j_otherSchool")); if (j_otherSchool == undefined) return;
        }

        j_year_level = check_error(document.getElementById("j_year_level")); if (j_year_level == undefined) return;
        j_school_address = check_error(document.getElementById("j_school_address")); if (j_school_address == undefined) return;
        hgwa = check_error(document.getElementById("hgwa")); if (hgwa == undefined) return;

        if (jhsRows.length > 0){
            for (let i = 0; i < jhsRows.length; i++){
                let row = jhsRows.eq(i);
                let jhsObj = {
                    awardId: row.children().eq(1).text(),
                    honor: row.children().eq(2).text(),
                    acadYear: row.children().eq(3).text(),
                    sem: row.children().eq(4).text(),
                    yearLevel: row.children().eq(5).text(),
                }
                jhs.push(jhsObj);
            }
    
            let jhsCount = 0;
    
            for (let i = 0; i < jhs.length; i++){
                let obj = jhs[i];
                for (let key in obj){
                    if (key == "awardId") continue;
                    if (obj[key] == "") jhsCount++;
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

        if (e_school == "Others"){
            e_otherSchool = check_error(document.getElementById("e_otherSchool")); if (e_otherSchool == undefined) return;
        }

        e_grade_level = check_error(document.getElementById("e_grade_level")); if (e_grade_level == undefined) return;
        e_school_address = check_error(document.getElementById("e_school_address")); if (e_school_address == undefined) return;
        egwa = check_error(document.getElementById("egwa")); if (egwa == undefined) return;

        if (elemRows.length > 0){
            for (let i = 0; i < elemRows.length; i++){
                let row = elemRows.eq(i);
                let elemObj = {
                    awardId: row.children().eq(1).text(),
                    honor: row.children().eq(2).text(),
                    acadYear: row.children().eq(3).text(),
                    sem: row.children().eq(4).text(),
                    yearLevel: row.children().eq(5).text(),
                }
                elem.push(elemObj);
            }

            let elemCount = 0;

            for (let i = 1; i < elem.length; i++){
                let obj = elem[i];
                for (let key in obj){
                    if (key == "awardId") continue;
                    if (obj[key] == "") elemCount++;
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
            'educ_id': collegeId,
            'school': c_school,
            'course': course,
            'courseText': courseText,
            'year_level': c_year_level,
            'school_address': c_school_address,
            'otherSchool': c_otherSchool,
            'otherCourse': c_otherCourse,
            'major': c_major,
            'gwa': cgwa,
            'collegeAwards' : college
        },
        'shs': {
            'educ_id': shsId,
            'school': s_school,
            'course': strand,
            'courseText': strandText, // 'strandText' is the 'other' field for 'course
            'year_level': s_year_level,
            'school_address': s_schoolAddress,
            'otherSchool': s_otherSchool,
            'otherCourse': s_otherStrand,
            'major': s_otherStrand,
            'gwa': sgwa,
            'shsAwards': shs
        },
        'jhs': {
            'educ_id': jhsId,
            'school': j_school,
            'course': '',
            'courseText': '',
            'year_level': j_year_level,
            'school_address': j_school_address,
            'otherSchool': j_otherSchool,
            'otherCourse': '',
            'major': '',
            'gwa': hgwa,
            'jhsAwards': jhs
        },
        'elem': {
            'educ_id': elemId,
            'school': e_school,
            'course': '',
            'courseText': '',
            'year_level': e_grade_level,
            'school_address': e_school_address,
            'otherSchool': e_otherSchool,
            'otherCourse': '',
            'major': '',
            'gwa': egwa,
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

    // console.log(data);

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
                })
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

$("#fatherBday").on("change click", function(){
    let val = $(this).val();
    let age = calculateAge(val);
    $("#fatherAge").val(age);
})

$("#motherBday").on("change click", function(){
    let val = $(this).val();
    let age = calculateAge(val);
    $("#motherAge").val(age);
})

$("#guardianBday").on("change click", function(){
    let val = $(this).val();
    let age = calculateAge(val);
    $("#guardianAge").val(age);
})

$("#spouseBday").on("change click", function(){
    let val = $(this).val();
    let age = calculateAge(val);
    $("#spouseAge").val(age);
})

$("#familyBG").on("submit", function(e){
    e.preventDefault();

    let family_flag = check_error(document.getElementById("family_flag")); if (family_flag == undefined) return;
    let total_num = check_error(document.getElementById("total_num")); if (total_num == undefined) return;
    let birth_order = check_error(document.getElementById("birth_order")); if (birth_order == undefined) return;
    let source = check_error(document.getElementById("source")); if (source == undefined) return;
    let rent_flag = check_error(document.getElementById("rent_flag")); if (rent_flag == undefined) return;
    let monthly_payment = check_error(document.getElementById("monthly_payment")); if (monthly_payment == undefined) return;

    let siblings = [];

    let siblingTableBody = $("#siblingTable tbody");
    let siblingRows = siblingTableBody.children();

    if (siblingRows.length > 0){
        for (let i = 0; i < siblingRows.length; i++){
            let row = siblingRows.eq(i);
            let siblingObj = {
                id: row.children().eq(1).text(),
                name: row.children().eq(2).text(),
                relationship: row.children().eq(3).text(),
                birthOrder: row.children().eq(4).text(),
                age: row.children().eq(5).text(),
                occupation: row.children().eq(6).text(),
                famType: '3',
            }
            siblings.push(siblingObj);
        }

        let siblingCount = 0;

        for (let i = 0; i < siblings.length; i++){
            let obj = siblings[i];
            for (let key in obj){
                if (key == "id") continue;
                if (obj[key] == "") siblingCount++;
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

    let fatherOtherOccupation = fatherCompany = fatherCompanyAddress = "";

    if (fatherOccupation == "others"){
        fatherOtherOccupation = check_error(document.getElementById("fatherOtherOccupation")); if (fatherOtherOccupation == undefined) return;
    }

    if (fatherOccupation != "unemployed"){
        fatherCompany = check_error(document.getElementById("fatherCompany")); if (fatherCompany == undefined) return;
        fatherCompanyAddress = check_error(document.getElementById("fatherCompanyAddress")); if (fatherCompanyAddress == undefined) return;
    }

    let fatherIncome = check_error(document.getElementById("fatherIncome")); if (fatherIncome == undefined) return;
    let fatherEducation = check_error(document.getElementById("fatherEducation")); if (fatherEducation == undefined) return;

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

    let motherOtherOccupation = motherCompany = motherCompanyAddress = "";

    if (motherOccupation == "others"){
        motherOtherOccupation = check_error(document.getElementById("motherOtherOccupation")); if (motherOtherOccupation == undefined) return;
    }

    if (motherOccupation != "unemployed"){
        motherCompany = check_error(document.getElementById("motherCompany")); if (motherCompany == undefined) return;
        motherCompanyAddress = check_error(document.getElementById("motherCompanyAddress")); if (motherCompanyAddress == undefined) return;
    }

    let motherIncome = check_error(document.getElementById("motherIncome")); if (motherIncome == undefined) return;
    let motherEducation = check_error(document.getElementById("motherEducation")); if (motherEducation == undefined) return;

    // Guardian Info
    let inputGuardian = check_error(document.getElementById("inputGuardian")); if (inputGuardian == undefined) return;

    let guardianType = spouseType = "";

    let guardianRelationship = guardianFN = guardianMN = guardianLN = guardianSuffix = guardianBday = guardianBplace = guardianAge = guardianContact = guardianLivingFlag = guardianOccupation = guardianOtherOccupation = guardianCompany = guardianCompanyAddress = guardianIncome = guardianEducation = "";

    if (inputGuardian == 0){
        guardianType = 4;
        guardianRelationship = check_error(document.getElementById("guardianRelationship")); if (guardianRelationship == undefined) return;
        guardianFN = check_error(document.getElementById("guardianFN")); if (guardianFN == undefined) return;
        guardianMN = $("#guardianMN").val();
        guardianLN = check_error(document.getElementById("guardianLN")); if (guardianLN == undefined) return;
        guardianSuffix = $("#guardianSuffix").val();
        guardianBday = check_error(document.getElementById("guardianBday"), options = {
            type: "date",
            verifyFlag: 1,
            condition: "today",
            conditionCheck: "birthdate"
          }); if (guardianBday == undefined) return;
        guardianBplace = check_error(document.getElementById("guardianBplace")); if (guardianBplace == undefined) return;
        guardianAge = check_error(document.getElementById("guardianAge")); if (guardianAge == undefined) return;
        guardianContact = check_error(document.getElementById("guardianContact"), options = {
            type: "number",
            verifyFlag: 1,
            conditionCheck: "contactNumber",
            regex: /^\d{10}$/,
            text: "Contact Number"
          }); if (guardianContact == undefined) return;
        guardianLivingFlag = check_error(document.getElementById("guardianLivingFlag")); if (guardianLivingFlag == undefined) return;
        guardianOccupation = check_error(document.getElementById("guardianOccupation")); if (guardianOccupation == undefined) return;

        if (guardianOccupation == "others"){
            guardianOtherOccupation = check_error(document.getElementById("guardianOtherOccupation")); if (guardianOtherOccupation == undefined) return;
        }

        if (guardianOccupation != "unemployed"){
            guardianCompany = check_error(document.getElementById("guardianCompany")); if (guardianCompany == undefined) return;
            guardianCompanyAddress = check_error(document.getElementById("guardianCompanyAddress")); if (guardianCompanyAddress == undefined) return;
        }

        guardianIncome = check_error(document.getElementById("guardianIncome")); if (guardianIncome == undefined) return;
        guardianEducation = check_error(document.getElementById("guardianEducation")); if (guardianEducation == undefined) return;

    }

    let inputSpouse = check_error(document.getElementById("inputSpouse")); if (inputSpouse == undefined) return;

    let spouseFN = spouseMN = spouseLN = spouseSuffix = spouseBday = spouseBplace = spouseAge = spouseContact = spouseLivingFlag = spouseOccupation = spouseOtherOccupation = spouseCompany = spouseCompanyAddress = spouseIncome = spouseEducation = "";

    if (inputSpouse == 0){
        spouseType = 2;
        spouseFN = check_error(document.getElementById("spouseFN")); if (spouseFN == undefined) return;
        spouseMN = $("#spouseMN").val();
        spouseLN = check_error(document.getElementById("spouseLN")); if (spouseLN == undefined) return;
        spouseSuffix = $("#spouseSuffix").val();
        spouseBday = check_error(document.getElementById("spouseBday"), options = {
            type: "date",
            verifyFlag: 1,
            condition: "today",
            conditionCheck: "birthdate"
          }); if (spouseBday == undefined) return;
        spouseBplace = check_error(document.getElementById("spouseBplace")); if (spouseBplace == undefined) return;
        spouseAge = check_error(document.getElementById("spouseAge")); if (spouseAge == undefined) return;
        spouseContact = check_error(document.getElementById("spouseContact"), options = {
            type: "number",
            verifyFlag: 1,
            conditionCheck: "contactNumber",
            regex: /^\d{10}$/,
            text: "Contact Number"
          }); if (spouseContact == undefined) return;
        spouseLivingFlag = check_error(document.getElementById("spouseLivingFlag")); if (spouseLivingFlag == undefined) return;
        spouseOccupation = check_error(document.getElementById("spouseOccupation")); if (spouseOccupation == undefined) return;

        if (spouseOccupation == "others"){
            spouseOtherOccupation = check_error(document.getElementById("spouseOtherOccupation")); if (spouseOtherOccupation == undefined) return;
        }

        if (spouseOccupation != "unemployed"){
            spouseCompany = check_error(document.getElementById("spouseCompany")); if (spouseCompany == undefined) return;
            spouseCompanyAddress = check_error(document.getElementById("spouseCompanyAddress")); if (spouseCompanyAddress == undefined) return;
        }

        spouseIncome = check_error(document.getElementById("spouseIncome")); if (spouseIncome == undefined) return;
        spouseEducation = check_error(document.getElementById("spouseEducation")); if (spouseEducation == undefined) return;

        spouseArr.push({
            'famType': '2',
            'relationship': '',
            'firstName': spouseFN,
            'middleName': spouseMN,
            'lastName': spouseLN,
            'suffix': spouseSuffix,
            'birthday': spouseBday,
            'birthplace': spouseBplace,
            'age': spouseAge,
            'contact': spouseContact,
            'living': spouseLivingFlag,
            'occupation': spouseOccupation,
            'otherOccupation': spouseOtherOccupation,
            'company': spouseCompany,
            'companyAddress': spouseCompanyAddress,
            'income': spouseIncome,
            'education': spouseEducation
        })
    }

    let data = {
        'action': 15,
        'userId': userId,
        'fatherArr': {
            'famType': '0',
            'relationship': '',
            'firstName': fatherFN,
            'middleName': fatherMN,
            'lastName': fatherLN,
            'suffix': fatherSuffix,
            'birthday': fatherBday,
            'birthplace': fatherBplace,
            'age': fatherAge,
            'contact': fatherContact,
            'living': fatherLivingFlag,
            'occupation': fatherOccupation,
            'otherOccupation': fatherOtherOccupation,
            'company': fatherCompany,
            'companyAddress': fatherCompanyAddress,
            'income': fatherIncome,
            'education': fatherEducation,
        },
        'motherArr': {
            'famType': '1',
            'relationship': '',
            'firstName': motherFN,
            'middleName': motherMN,
            'lastName': motherLN,
            'suffix': motherSuffix,
            'birthday': motherBday,
            'birthplace': motherBplace,
            'age': motherAge,
            'contact': motherContact,
            'living': motherLivingFlag,
            'occupation': motherOccupation,
            'otherOccupation': motherOtherOccupation,
            'company': motherCompany,
            'companyAddress': motherCompanyAddress,
            'income': motherIncome,
            'education': motherEducation,
        },
        'spouseArr': {
            'famType': spouseType,
            'relationship': '',
            'firstName': spouseFN,
            'middleName': spouseMN,
            'lastName': spouseLN,
            'suffix': spouseSuffix,
            'birthday': spouseBday,
            'birthplace': spouseBplace,
            'age': spouseAge,
            'contact': spouseContact,
            'living': spouseLivingFlag,
            'occupation': spouseOccupation,
            'otherOccupation': spouseOtherOccupation,
            'company': spouseCompany,
            'companyAddress': spouseCompanyAddress,
            'income': spouseIncome,
            'education': spouseEducation
        },
        'siblings' : siblings,
        'guardianArr': {
            'famType': guardianType,
            'relationship': guardianRelationship,
            'firstName': guardianFN,
            'middleName': guardianMN,
            'lastName': guardianLN,
            'suffix': guardianSuffix,
            'birthday': guardianBday,
            'birthplace': guardianBplace,
            'age': guardianAge,
            'contact': guardianContact,
            'living': guardianLivingFlag,
            'occupation': guardianOccupation,
            'otherOccupation': guardianOtherOccupation,
            'company': guardianCompany,
            'companyAddress': guardianCompanyAddress,
            'income': guardianIncome,
            'education': guardianEducation
        },
        'otherInfoArr': {
            'family_flag': family_flag,
            'total_num': total_num,
            'birth_order': birth_order,
            'source': source,
            'rent_flag': rent_flag,
            'monthly_payment': monthly_payment,
        }
    }

    $.ajax({
        url: "controller/accountHandler.php",
        type: "POST",
        data: data,
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
                    text: "Other Information Saved Successfully. You may now upload your requirements."
                }).then((result) => {
                    if (result.isConfirmed){
                        window.location.href = '?nav=apply_applicant';
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

$("#editInfoProfile").on("click", function(){
    Swal.fire({
        title: "Edit Profile?",
        text: "Are you sure you want to edit your profile? Your submission will reset.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Edit Information",
        cancelButtonText: "No,"
    }).then((result) => {
        if (result.isConfirmed){
            $.ajax({
                url: "controller/accountHandler.php",
                type: "POST",
                data: {
                    action: "25",
                    userId : userId
                },
                beforeSend: function(){
                    showBeforeSend("Submitting Application...");
                },
                success: function(data){
                    hideBeforeSend();
                    if (data == "success"){
                        location.href("index.php?nav=profile_applicant");
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

$("#graduating_flag").on("change", function(){
    let graduating = $("#graduating_flag option:selected").val();
    if(graduating == 0){
        $(".grad_waiting").removeClass("d-none");
    }else{
        $(".grad_waiting").addClass("d-none");
    }
})