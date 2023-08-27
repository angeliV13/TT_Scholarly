$(document).ready(function ($) {
  $.ajax({
    type: "POST",
    url: "controller/dashboard.php",
    data: {
      action: 1,
    },
    success: function (data) {
      if (data != "") {
        let counts = JSON.parse(data);
        $("#totalApplicants").text(counts[0]);
        $("#totalBeneficiaries").text(counts[1]);
        $("#totalGraduating").text(counts[2]);
      }
    },
  });

  document.addEventListener("DOMContentLoaded", () => {
    new ApexCharts(document.querySelector("#scholarTrends"), {
      series: [
        {
          name: "College Educ. Assistance",
          data: [31, 40, 28, 51, 42, 82, 56],
        },
        {
          name: "College Scholars",
          data: [11, 32, 45, 32, 34, 52, 41],
        },
        {
          name: "SHS Educ. Assistance",
          data: [15, 11, 32, 18, 9, 24, 11],
        },
      ],
      chart: {
        height: 350,
        type: "area",
        toolbar: {
          show: false,
        },
      },
      markers: {
        size: 4,
      },
      colors: ["#4154f1", "#2eca6a", "#ff771d"],
      fill: {
        type: "gradient",
        gradient: {
          shadeIntensity: 1,
          opacityFrom: 0.3,
          opacityTo: 0.4,
          stops: [0, 90, 100],
        },
      },
      dataLabels: {
        enabled: false,
      },
      stroke: {
        curve: "smooth",
        width: 2,
      },
      xaxis: {
        type: "datetime",
        categories: [
          "2018-09-19T00:00:00.000Z",
          "2018-09-19T01:30:00.000Z",
          "2018-09-19T02:30:00.000Z",
          "2018-09-19T03:30:00.000Z",
          "2018-09-19T04:30:00.000Z",
          "2018-09-19T05:30:00.000Z",
          "2018-09-19T06:30:00.000Z",
        ],
      },
      tooltip: {
        x: {
          format: "dd/MM/yy HH:mm",
        },
      },
    }).render();
  });
});
