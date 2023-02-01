<?php include_once 'inc/header.php';?>
<?php $baseurl='http://localhost:8080/';
include 'api/api.php';
$result=get($baseurl.'thongke/doanhthutheothang/2022');
$thongketk=get($baseurl.'thongke/thongketaikhoan');
?>


<link rel="stylesheet" href="./css/char.css">
<!------ Include the above in your HEAD tag ---------->

<script type="text/javascript" src="https://www.google.com/jsapi"></script>



        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid mt-3">                                                            
            <main>
  <h2>Thống kê doanh thu theo tháng</h2>
  <h5>Năm 2022</h5>
  <div id="bar-chart"></div>
  <!-- <h5>Traffic Over Time</h5>
  <div id="line-chart"></div> -->
  <h5>Thống kê tài khoản</h5>
  <div id="pie-chart"></div>
</main>    

<script>
    google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawCharts);
function drawCharts() {
  
  // BEGIN BAR CHART
  /*
  // create zero data so the bars will 'grow'
  var barZeroData = google.visualization.arrayToDataTable([
    ['Day', 'Page Views', 'Unique Views'],
    ['Sun',  0,      0],
    ['Mon',  0,      0],
    ['Tue',  0,      0],
    ['Wed',  0,      0],
    ['Thu',  0,      0],
    ['Fri',  0,      0],
    ['Sat',  0,      0]
  ]);
	*/
  // actual bar chart data
  var barData = google.visualization.arrayToDataTable([
    ['Tháng', 'Doanh thu'],
    <?php for($i=1;$i<=12;$i++) {?>
    ['Tháng <?php echo $i?>', <?php foreach($result as $value) if( !empty($value['thang']==$i)) {echo $value['doanhthu'];break;} else echo '0';?>],
    <?php }?>
    // ['Mon',  1370],
    // ['Tue',  660],
    // ['Wed',  1030],
    // ['Thu',  1000],
    // ['Fri',  1170],
    // ['Sat',  660]
  ]);
  // set bar chart options
  var barOptions = {
    focusTarget: 'category',
    backgroundColor: 'transparent',
    colors: ['tomato', 'cornflowerblue'],
    fontName: 'Open Sans',
    chartArea: {
      left: 50,
      top: 10,
      width: '100%',
      height: '70%'
    },
    bar: {
      groupWidth: '80%'
    },
    hAxis: {
      textStyle: {
        fontSize: 11
      }
    },
    vAxis: {
      minValue: 0,
      maxValue: 200000000,
      baselineColor: '#DDD',
      gridlines: {
        color: '#DDD',
        count: 5
      },
      textStyle: {
        fontSize: 11
      }
    },
    legend: {
      position: 'bottom',
      textStyle: {
        fontSize: 12
      }
    },
    animation: {
      duration: 1200,
      easing: 'out',
			startup: true
    }
  };
  // draw bar chart twice so it animates
  var barChart = new google.visualization.ColumnChart(document.getElementById('bar-chart'));
  //barChart.draw(barZeroData, barOptions);
  barChart.draw(barData, barOptions);
  
  // BEGIN LINE GRAPH
  
//   function randomNumber(base, step) {
//     return Math.floor((Math.random()*step)+base);
//   }
//   function createData(year, start1, start2, step, offset) {
//     var ar = [];
//     for (var i = 0; i < 12; i++) {
//       ar.push([new Date(year, i), randomNumber(start1, step)+offset, randomNumber(start2, step)+offset]);
//     }
//     return ar;
//   }
//   var randomLineData = [
//     ['Year', 'Page Views', 'Unique Views']
//   ];
//   for (var x = 0; x < 7; x++) {
//     var newYear = createData(2007+x, 10000, 5000, 4000, 800*Math.pow(x,2));
//     for (var n = 0; n < 12; n++) {
//       randomLineData.push(newYear.shift());
//     }
//   }
//   var lineData = google.visualization.arrayToDataTable(randomLineData);
  
	/*
  var animLineData = [
    ['Year', 'Page Views', 'Unique Views']
  ];
  for (var x = 0; x < 7; x++) {
    var zeroYear = createData(2007+x, 0, 0, 0, 0);
    for (var n = 0; n < 12; n++) {
      animLineData.push(zeroYear.shift());
    }
  }
  var zeroLineData = google.visualization.arrayToDataTable(animLineData);
	*/

//   var lineOptions = {
//     backgroundColor: 'transparent',
//     colors: ['cornflowerblue', 'tomato'],
//     fontName: 'Open Sans',
//     focusTarget: 'category',
//     chartArea: {
//       left: 50,
//       top: 10,
//       width: '100%',
//       height: '70%'
//     },
//     hAxis: {
//       //showTextEvery: 12,
//       textStyle: {
//         fontSize: 11
//       },
//       baselineColor: 'transparent',
//       gridlines: {
//         color: 'transparent'
//       }
//     },
//     vAxis: {
//       minValue: 0,
//       maxValue: 50000,
//       baselineColor: '#DDD',
//       gridlines: {
//         color: '#DDD',
//         count: 4
//       },
//       textStyle: {
//         fontSize: 11
//       }
//     },
//     legend: {
//       position: 'bottom',
//       textStyle: {
//         fontSize: 12
//       }
//     },
//     animation: {
//       duration: 1200,
//       easing: 'out',
// 			startup: true
//     }
//   };

//   var lineChart = new google.visualization.LineChart(document.getElementById('line-chart'));
//   //lineChart.draw(zeroLineData, lineOptions);
//   lineChart.draw(lineData, lineOptions);
  
  // BEGIN PIE CHART
  
  // pie chart data
  var pieData = google.visualization.arrayToDataTable([
    ['Loại Tài Khoản', 'Số lượng'],
    ['User',      <?php foreach ($thongketk as $tk) if($tk['type_account']==1) echo $tk['soluong'];?>],
    ['Seller',   <?php foreach ($thongketk as $tk) if($tk['type_account']==3) echo $tk['soluong'];?>],
    ['Admin',   <?php foreach ($thongketk as $tk) if($tk['type_account']==2) echo $tk['soluong'];?>],
    // ['Sweden',    946],
    // ['Germany',  2150]
  ]);
  // pie chart options
  var pieOptions = {
    backgroundColor: 'transparent',
    pieHole: 0.4,
    colors: [ "cornflowerblue", 
              "olivedrab", 
              "orange", 
              "tomato", 
              "crimson", 
              "purple", 
              "turquoise", 
              "forestgreen", 
              "navy", 
              "gray"],
    pieSliceText: 'value',
    tooltip: {
      text: 'percentage'
    },
    fontName: 'Open Sans',
    chartArea: {
      width: '100%',
      height: '94%'
    },
    legend: {
      textStyle: {
        fontSize: 13
      }
    }
  };
  // draw pie chart
  var pieChart = new google.visualization.PieChart(document.getElementById('pie-chart'));
  pieChart.draw(pieData, pieOptions);
}
</script>

            </div>           
            
            <!-- #/ container -->
        </div>


        <!--**********************************
            Content body end
        ***********************************-->
        
        <?php include 'inc/footer.php';?>