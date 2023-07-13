// School ID
$('#btn_na_SchoolId').click(function (){
    if($(this).is(':checked')) {
        $('#divUploadSchoolId').addClass('disabled');
        $('#fileUploadSchoolId').prop('disabled', true);
        $('#viewUploadSchoolId').addClass('disabled');
    }else{
        $('#divUploadSchoolId').removeClass('disabled');
        $('#fileUploadSchoolId').prop('disabled', false);
        $('#viewUploadSchoolId').removeClass('disabled');
    }
});

// Clearance
$('#btn_na_Clearance').click(function (){
    if($(this).is(':checked')) {
        $('#divUploadClearance').addClass('disabled');
        $('#fileUploadClearance').prop('disabled', true);
        $('#viewUploadClearance').addClass('disabled');
    }else{
        $('#divUploadClearance').removeClass('disabled');
        $('#fileUploadClearance').prop('disabled', false);
        $('#viewUploadClearance').removeClass('disabled');
    }
});

// Certificate of Registration
$('#btn_na_Cor').click(function (){
    if($(this).is(':checked')) {
        $('#divUploadCor').addClass('disabled');
        $('#fileUploadCor').prop('disabled', true);
        $('#viewUploadCor').addClass('disabled');
    }else{
        $('#divUploadCor').removeClass('disabled');
        $('#fileUploadCor').prop('disabled', false);
        $('#viewUploadCor').removeClass('disabled');
    }
});

// Grade Report
$('#btn_na_Grade').click(function (){
    if($(this).is(':checked')) {
        $('#divUploadGrade').addClass('disabled');
        $('#fileUploadGrade').prop('disabled', true);
        $('#viewUploadGrade').addClass('disabled');
    }else{
        $('#divUploadGrade').removeClass('disabled');
        $('#fileUploadGrade').prop('disabled', false);
        $('#viewUploadGrade').removeClass('disabled');
    }
});

// Getting the Data File
function getFileData(myFile){
    var file  = myFile.files[0];
    var filename = file.name;
    alert(filename);
}


//  Saving
$('#btn_na_SchoolId').click(function (){

});