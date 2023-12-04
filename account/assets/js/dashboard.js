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
            filename: "Scholar Trends",
            headerCategory: "Academic Year",
            columnDelimiter: ";",
            dateFormatter: function (timestamp) {
              var date = dayjs(new Date(timestamp));
              var format = "ddd D. MMM;HH:mm"; // sic: Delimiter in here on purpose
              var nextHour = Number(date.hour()) + 1;
              var text = date.format(format) + " - " + nextHour + ":00";
              return text;
            },
          },
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
    xaxis: {},
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
      // console.log(data);
      if (data != "") {
        let trends = JSON.parse(data);
        // console.log(trends);

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
            categories: trends.categories,
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
      console.log(data);
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

  // Data for Applicants Count
  $.ajax({
    type: "POST",
    url: "controller/dashboard.php",
    data: {
      action: 4,
    },
    success: function (data) {
      console.log(data);
      if (data != "") {
        let applicantCount = JSON.parse(data);

        // Scholar Trends for Applicant
        let scholarTrendsV2 = echarts
          .init(document.querySelector("#applicantTrends"))
          .setOption({
            tooltip: {
              trigger: "item",
            },
            legend: {
              top: "5%",
              left: "center",
            },
            series: [
              {
                name: "Applicants",
                type: "pie",
                radius: ["40%", "70%"],
                avoidLabelOverlap: false,
                label: {
                  show: false,
                  position: "center",
                },
                emphasis: {
                  label: {
                    show: true,
                    fontSize: "18",
                    fontWeight: "bold",
                  },
                },
                labelLine: {
                  show: false,
                },
                data: [
                  {
                    value: applicantCount.colEA,
                    name: "College Educational Assistance",
                  },
                  {
                    value: applicantCount.colSc,
                    name: "College Scholarship",
                  },
                  {
                    value: applicantCount.shs,
                    name: "SHS Educational Assistance",
                  },
                ],
              },
            ],
          });
      }
    },
  });

  // Scholar Trend Chart
  let scholarTrendsv3 = new ApexCharts(
    document.querySelector("#scholarTrendsV3"),
    {
      series: [],
      chart: {
        height: 'auto',
        type: "bar",
        stacked: true,
        toolbar: {
          show: true,
          export: {
            csv: {
              filename: "Scholar Trends",
              headerCategory: "Academic Year",
              columnDelimiter: ";",
              dateFormatter: function (timestamp) {
                var date = dayjs(new Date(timestamp));
                var format = "ddd D. MMM;HH:mm"; // sic: Delimiter in here on purpose
                var nextHour = Number(date.hour()) + 1;
                var text = date.format(format) + " - " + nextHour + ":00";
                return text;
              },
            },
          },
        },
      },
      markers: {
        size: 4,
      },
      // colors: ["#4154f1", "#2eca6a", "#ff771d"],
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
      plotOptions: {
        bar: {
          horizontal: true,
          dataLabels: {
            total: {
              enabled: true,
              offsetX: 0,
              style: {
                fontSize: '12px',
                fontWeight: 750
              }
            }
          }
        },
      },
      stroke: {
        curve: "smooth",
        width: 2,
      },
      xaxis: {},
    }
  );

  scholarTrendsv3.render();

  // Data in Scholar Trend Chart
  $.ajax({
    type: "POST",
    url: "controller/dashboard.php",
    data: {
      action: 5,
    },
    success: function (data) {
      // console.log(data);
      if (data != "") {
        let barangayTrends = JSON.parse(data);

        scholarTrendsv3.updateSeries([
          {
            name: 'Male',
            group: 'Gender',
            data: barangayTrends.male
          },
          {
            name: 'Female',
            group: 'Gender',
            data: barangayTrends.female
          },
        ]);

        scholarTrendsv3.updateOptions({
          xaxis: {
            labels: {
              show: true,
              rotate: -45,
            },
            type: "category",
            categories: barangayTrends.barangay,
            // categories: [
              // "Barangay I (Pob.)",
              // "Barangay II (Pob.)",
              // "Barangay III (Pob.)",
              // "Barangay IV (Pob.)",
              // "San Agustin",
              // "San Antonio",
              // "San Bartolome",
              // "San Felix",
              // "San Fernando",
              // "San Francisco",
              // "San Isidro Norte",
              // "San Isidro Sur",
              // "San Joaquin",
              // "San Jose",
              // "San Juan",
              // "San Luis",
              // "San Miguel",
              // "San Pablo",
              // "San Pedro",
              // "San Rafael",
              // "San Roque",
              // "San Vicente",
              // "Santa Ana",
              // "Santa Anastacia",
              // "Santa Clara",
              // "Santa Cruz",
              // "Santa Elena",
              // "Santa Maria",
              // "Santiago",
              // "Santa Teresita",
            // ],
          },
        });
      }
    },
  });

  // Data for Gender Trend Count
  $.ajax({
    type: "POST",
    url: "controller/dashboard.php",
    data: {
      action: 6,
    },
    success: function (data) {
      console.log(data);
      if (data != "") {
        let genderCount = JSON.parse(data);

        // Scholar Trends for Applicant
        let scholarTrendsV4 = echarts
          .init(document.querySelector("#genderTrends"))
          .setOption({
            tooltip: {
              trigger: "item",
            },
            legend: {
              top: "5%",
              left: "center",
            },
            series: [
              {
                name: "College Beneficiary",
                type: "pie",
                radius: ["50%", "70%"],
                avoidLabelOverlap: false,
                label: {
                  show: false,
                  position: "center",
                },
                emphasis: {
                  label: {
                    show: true,
                    fontSize: "18",
                    fontWeight: "bold",
                  },
                },
                labelLine: {
                  show: false,
                },
                data: [
                  {
                    value: genderCount.col_female,
                    name: "College Female",
                  },
                  {
                    value: genderCount.col_male,
                    name: "College Male",
                  },
                ],
              },
              {
                name: "SHS Beneficiary",
                type: "pie",
                radius: ["10%", "40%"],
                avoidLabelOverlap: false,
                label: {
                  show: false,
                  position: "center",
                },
                emphasis: {
                  label: {
                    show: true,
                    fontSize: "18",
                    fontWeight: "bold",
                  },
                },
                labelLine: {
                  show: false,
                },
                data: [
                  {
                    value: genderCount.shs_female,
                    name: "SHS Female",
                  },
                  {
                    value: genderCount.shs_male,
                    name: "SHS Male",
                  },
                ],
              },
            ],
          });
      }
    },
  });


  // School Trend Chart
  let scholarTrendsv5 = new ApexCharts(
    document.querySelector("#scholarTrendsV5"),
    {
      series: [],
      chart: {
        height: 'auto',
        type: "bar",
        stacked: true,
        toolbar: {
          show: true,
          export: {
            csv: {
              filename: "Scholar Trends",
              headerCategory: "Academic Year",
              columnDelimiter: ";",
              dateFormatter: function (timestamp) {
                var date = dayjs(new Date(timestamp));
                var format = "ddd D. MMM;HH:mm"; // sic: Delimiter in here on purpose
                var nextHour = Number(date.hour()) + 1;
                var text = date.format(format) + " - " + nextHour + ":00";
                return text;
              },
            },
          },
        },
      },
      markers: {
        size: 4,
      },
      // colors: ["#4154f1", "#2eca6a", "#ff771d"],
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
      plotOptions: {
        bar: {
          horizontal: true,
          dataLabels: {
            total: {
              enabled: true,
              offsetX: 0,
              style: {
                fontSize: '12px',
                fontWeight: 750
              }
            }
          }
        },
      },
      stroke: {
        curve: "smooth",
        width: 2,
      },
      xaxis: {},
    }
  );

  scholarTrendsv5.render();

  // Data in Scholar Trend Chart
  $.ajax({
    type: "POST",
    url: "controller/dashboard.php",
    data: {
      action: 7,
    },
    success: function (data) {
      // console.log(data);
      if (data != "") {
        let scholarTrends = JSON.parse(data);

        scholarTrendsv5.updateSeries([
          {
            name: 'Male',
            group: 'Gender',
            data: scholarTrends.male
          },
          {
            name: 'Female',
            group: 'Gender',
            data: scholarTrends.female
          },
        ]);

        scholarTrendsv5.updateOptions({
          xaxis: {
            labels: {
              show: true,
              rotate: -45,
            },
            type: "category",
            categories: scholarTrends.school,
          },
        });
      }
    },
  });

  // Data for Applicants Count
  $.ajax({
    type: "POST",
    url: "controller/dashboard.php",
    data: {
      action: 4,
    },
    success: function (data) {
      console.log(data);
      if (data != "") {
        let applicantCount = JSON.parse(data);

        // Scholar Trends for Applicant
        let examinationTrendsV2 = echarts
          .init(document.querySelector("#examinationTrends"))
          .setOption({
            tooltip: {
              trigger: "item",
            },
            legend: {
              top: "5%",
              left: "center",
            },
            series: [
              {
                name: "Examination Status",
                type: "pie",
                radius: ["40%", "70%"],
                avoidLabelOverlap: false,
                label: {
                  show: false,
                  position: "center",
                },
                emphasis: {
                  label: {
                    show: true,
                    fontSize: "18",
                    fontWeight: "bold",
                  },
                },
                labelLine: {
                  show: false,
                },
                data: [
                  {
                    value: applicantCount.passed,
                    name: "Passed",
                  },
                  {
                    value: applicantCount.failed,
                    name: "Failed",
                  },
                ],
              },
            ],
          });
      }
    },
  });

});
