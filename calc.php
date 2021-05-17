<?php
//$subject=$_GET['subject'];
?>
<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
            <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript">
                var numberschart = 0; //<- Initial value
				var as=0;
				var dd=0;
                google.load('visualization', '1', {packages: ['corechart']});
                
                function numbers(){
                        var work_field = document.forms['work_form']['work_n_field'].value;
                        numberschart =  work_field;
						 var work= document.forms['work_form']['x'].value;
                        as = work;
						var wo= document.forms['work_form']['y'].value;
						dd = wo;
						drawVisualization();
						drawChart();
                        return false;
                };
                function drawVisualization() {
                    // Create and populate the data table.
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Task');
                    data.addColumn('number', 'Hours per Day');
                    data.addRows(4);
                    data.setValue(0, 0, 'Mostly');
                    //data.setValue(0, 1, 11);

                    data.setValue(0, 1, parseInt(<?php echo $row['Mostly']; ?>));
                    data.setValue(1, 0, 'Sometime');
                    data.setValue(1, 1, parseInt(<?php echo $row1['Sometime']; ?>));
                    data.setValue(2, 0, 'Hardly');
                    data.setValue(2, 1, parseInt(<?php echo $row2['Hardly']; ?>));
                  


                   
                    // Create and draw the visualization.
                    new google.visualization.PieChart(document.getElementById('visualization')).
                        draw(data, {
                            title:"Percentage of Student Evaluation Represented Graphically",
							is3D: true,
							'width':400,
                     'height':300,
                            colors: ['#3366cc', '#dc3912', '#ff9900'],
                            animation:{
                                duration:1000,
                                easing: 'out',
                            },
                            vAxis: {
                                minValue:0, 
                                maxValue:1000
                            },
                        });
                  }    
                google.setOnLoadCallback(drawVisualization);
               </script>
			   <?php
    error_reporting(E_ALL ^ E_DEPRECATED);
include('db.php');
$result=mysql_query("select sum(Mostly) as Mostly from student_feedback");
$row=mysql_fetch_array($result);
$result1=mysql_query("select sum(Sometime) as Sometime from student_feedback");
$row1=mysql_fetch_array($result1);
$result2=mysql_query("select sum(Hardly) as Hardly from student_feedback");
$row2=mysql_fetch_array($result2);
?>
		  <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Mostly','Sometime','Hardly' ],
          ['2014',  0, 0,0   ]
          
        ]);
        var options = {
         'width':400,
		'height':500,
		'animation':{duration:1000,easing:'out'}
		 };
         var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
		




		setTimeout(function(){
		


		data.setValue(0,1,parseInt(<?php echo $row['Mostly']; ?>));
		chart.draw(data, options);
		},1000);
		
		
		setTimeout(function(){
		data.setValue(0,2,parseInt(<?php echo $row1['Sometime']; ?>));
		chart.draw(data, options);
		},1000);
		
		setTimeout(function(){
		data.setValue(0,3,parseInt(<?php echo $row2['Hardly']; ?>));
		chart.draw(data, options);
		},1000);
		   
            
              
      }
	   google.setOnLoadCallback(drawChart);
    </script>
    </head>
    <body>

        <nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     
     
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
            <div id="visualization" style=" position:absolute; height: 500px;"></div>
        </div>
        <div class="col-md-6">
           
     <div id="chart_div" style="height: 700px;"></div>
         <div style="position:absolute;background-color:transparent;  height:50px;">
          
         </div>
        </div>
    </div>
    </div>

        
       
       
    </body>
</html>