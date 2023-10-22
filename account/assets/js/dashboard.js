$(document).ready(function ($) {
  // Scholar Trend Chart
  let scholarTrends = new ApexCharts(document.querySelector("#scholarTrends"), {
    series: [],
    chart: {
      height: 350,
      type: "area",
      toolbar: {
        show: true,
        export: {
          csv: {
            filename: 'Scholar Trends',
            headerCategory: 'Academic Year',
            columnDelimiter: ';',
            dateFormatter: function(timestamp) {
              var date = dayjs(new Date(timestamp));
              var format = 'ddd D. MMM;HH:mm'  // sic: Delimiter in here on purpose
              var nextHour = Number(date.hour()) + 1;
              var text = date.format(format) + ' - ' + nextHour + ':00';
              return text;
            },
          }
        },
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

    },
  });

  scholarTrends.render();

  // Data in Scholar Trend Chart
  $.ajax({
    type: "POST",
    url: "controller/dashboard.php",
    data: {
      action: 2,
    },
    success: function (data) {
      console.log(data);
      if (data != "") {
        let trends = JSON.parse(data);
        console.log(trends);

        scholarTrends.updateSeries([
          {
            name: "SHS Educ. Assistance",
            data: trends.shs,
            // data: [0, 0, 33, 29, 55, 30],
          },
          {
            name: "College Educ. Assistance",
            data: trends.colEA,
          },
          {
            name: "College Scholarship",
            data: trends.colSc,
          },
        ]);

        scholarTrends.updateOptions({
          xaxis: {
            labels: {
                show: true,
                rotate: -45,
            },
            type: "category",
            categories: trends.categories
            // categories: [
            //   "21-22 1st Sem",
            //   "21-22 2nd Sem",
            //   "22-23 1st Sem",
            //   "23-24 2nd Sem",
            //   "24-25 1st Sem",
            //   "24-25 2nd Sem",
            // ],
          },
        });
      }
    },
  });

  // Counts in Accounts
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

  // Activities
  $.ajax({
    type: "POST",
    url: "controller/dashboard.php",
    data: {
      action: 3,
    },
    success: function (data) {
      if (data != "") {
        $("#activity").append(data);
      }
    },
  });
});
