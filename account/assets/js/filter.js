$(document).ready(function (){
  reset_filter();
  // $.ajax({
  //   type: "POST",
  //   url: "controller/filterHandler.php",
  //   data: {
  //     action          : 0,
  //   },
  //   success: function (data) {
  //     // console.log(data);
  //     let filters = JSON.parse(data);
  //     console.log(filters);

  //     for (var i in filters.scholarType){
  //       $('#filterScholarType').append(
  //         '<option value='+ filters.scholarType[i][0] +'>' + filters.scholarType[i][1] +'</option>');
  //     }
  //     for (var i in filters.educationLevel){
  //       $('#filterEducationLevel').append(
  //         '<option value='+ filters.educationLevel[i][0] +'>' + filters.educationLevel[i][1] +'</option>');
  //     }
  //     for (var i in filters.school){
  //       $('#filterSchool').append(
  //         '<option value='+ filters.school[i][0] +'>' + filters.school[i][1] +'</option>');
  //     }
  //     for (var i in filters.yearLevel){
  //       $('#filterYearLevel').append(
  //         '<option value='+ filters.yearLevel[i][0] +'>' + filters.yearLevel[i][1] +'</option>');
  //     }
  //   },
  // });
});

$("#filterScholar :input").on("change", function () {
  let scholarType     = ($("#filterScholarType").val()    != "") ? $("#filterScholarType").val()    : 0;
  let educationLevel  = ($("#filterEducationLevel").val() != "") ? $("#filterEducationLevel").val() : 0;
  let school          = ($("#filterSchool").val()         != "") ? $("#filterSchool").val()         : 0;
  let yearLevel       = ($("#filterYearLevel").val()      != "") ? $("#filterYearLevel").val()      : 0;
  let id              = ($(this).attr("id")).replace('filter', '');

  console.log(id);
  if(id != "School"){
    $.ajax({
    type: "POST",
    url: "controller/filterHandler.php",
    data: {
      action          : 1,
      id              : id,    
      scholarType     : scholarType,
      educationLevel  : educationLevel,
      school          : school,
      yearLevel       : yearLevel,
    },
    success: function (data) {
      // console.log(data);
      let filters = JSON.parse(data);

      if($("#filterScholarType").val() == "0"){
        $('#filterScholarType option').each(function() { $(this).remove() ; });
        for (var i in filters.scholarType){
          $('#filterScholarType').append(
            '<option value='+ filters.scholarType[i][0] +'>' + filters.scholarType[i][1] +'</option>');
        }
      }

      if($("#filterEducationLevel").val() == "0"){
        $('#filterEducationLevel option').each(function() { $(this).remove() });
        for (var i in filters.educationLevel){
          $('#filterEducationLevel').append(
            '<option value='+ filters.educationLevel[i][0] +'>' + filters.educationLevel[i][1] +'</option>');
        }
      }

      if($("#filterSchool").val() == "0"){
        $('#filterSchool option').each(function() { $(this).remove() });
        for (var i in filters.school){
          $('#filterSchool').append(
            '<option value='+ filters.school[i][0] +'>' + filters.school[i][1] +'</option>');
        }
      }

      if($("#filterYearLevel").val() == "0"){
        $('#filterYearLevel option').each(function() { $(this).remove() });
        for (var i in filters.yearLevel){
          $('#filterYearLevel').append(
            '<option value='+ filters.yearLevel[i][0] +'>' + filters.yearLevel[i][1] +'</option>');
        }
      }
    },
  });
  }
  
});

$("#filter_reset").on("click", function(){
  reset_filter();
});

function reset_filter(){
  $.ajax({
    type: "POST",
    url: "controller/filterHandler.php",
    data: {
      action          : 0,
    },
    success: function (data) {
      // console.log(data);
      let filters = JSON.parse(data);
      // console.log(filters);

      $('#filterScholarType option').each(function() { $(this).remove() ; });
      for (var i in filters.scholarType){
        $('#filterScholarType').append(
          '<option value='+ filters.scholarType[i][0] +'>' + filters.scholarType[i][1] +'</option>');
      }

      $('#filterEducationLevel option').each(function() { $(this).remove() ; });
      for (var i in filters.educationLevel){
        $('#filterEducationLevel').append(
          '<option value='+ filters.educationLevel[i][0] +'>' + filters.educationLevel[i][1] +'</option>');
      }

      $('#filterSchool option').each(function() { $(this).remove() ; });
      for (var i in filters.school){
        $('#filterSchool').append(
          '<option value='+ filters.school[i][0] +'>' + filters.school[i][1] +'</option>');
      }

      $('#filterYearLevel option').each(function() { $(this).remove() ; });
      for (var i in filters.yearLevel){
        $('#filterYearLevel').append(
          '<option value='+ filters.yearLevel[i][0] +'>' + filters.yearLevel[i][1] +'</option>');
      }
    },
  });
}

