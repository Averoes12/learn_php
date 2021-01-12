<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Chart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

</head>
<body>

    <style type="text/css">
    body{
        font-family: sans-serif;
    }
    table{
        margin: 20px auto;
        border-collapse: collapse;
    }
    table th,
    table td{
        border: 1px solid #3c3c3c;
        padding: 3px 8px;

    }
    a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
        margin-bottom: 10px;
	}
	</style>
    
    <center>
        <?php 
            if(isset($_GET['done'])){
                $done = $_GET['done'];
                echo "<p>$done</p>";
            }
        ?>
    </center>

    <center>
        <h2>MEMBUAT GRAFIK DARI DATABASE MYSQL DENGAN PHP DAN CHART.JS</h2>
    </center>
    
    <div style="display:flex; flex-direction: row; justify-content: center; align-items: center">
        <div style="width: 800px;margin: 0px auto;">
            <canvas id="myChart"></canvas>
        </div>
        <div style="width: 800px;margin: 0px auto;">
            <canvas id="genderChart"></canvas>
        </div>
    </div>
    
	<br/>
    <br/>
    
    <center>
         <a href="export.php" style="text-decoration: none">Export to Excel</a>
    </center>
    <div style="display:flex; flex-direction: row; justify-content: center; align-items: center">
    <table border=1>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Gender</th>
                <th>Fakultas</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                include 'connect.php';

                global $db;
                $db = new Database();

                foreach ($db->show_all_student() as $item) {
                    ?>
                <tr>
					<td><?php echo $item['id'] ?></td>
					<td><?php echo $item['name']; ?></td>
                    <td><?php echo $item['nim']; ?></td>
					<td><?php echo $item['gender']; ?></td>
					<td><?php echo $item['faculty']; ?></td>
                </tr>
                
            <?php }?>             
        </tbody>
    </table>
    <table border=1>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Gender</th>
                <th>Fakultas</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                // include 'connect.php';

                global $db;
                $db = new Database();

                foreach ($db->show_all_student() as $item) {
                    ?>
                <tr>
					<td><?php echo $item['id'] ?></td>
					<td><?php echo $item['name']; ?></td>
                    <td><?php echo $item['nim']; ?></td>
					<td><?php echo $item['gender']; ?></td>
					<td><?php echo $item['faculty']; ?></td>
                </tr>
                
            <?php }?>             
        </tbody>
    </table>
    </div>
    
    <script>
        var ctx = document.getElementById("myChart");
        var ctx1 = document.getElementById("genderChart");
        var myChart = new Chart(ctx, {
            type : 'bar',
            data : {
                labels : ["Teknik", "Fisip", "Ekonomi", "Pertanian"],
                datasets : [{
                    label : '',
                    data : [
                        <?php 
                            $db = new Database();
                            $db->show_student_by_faculty('teknik');
                        ?>,
                        <?php 
                            $db = new Database();
                            $db->show_student_by_faculty('fisip');
                        ?>,
                        <?php 
                            $db = new Database();
                            $db->show_student_by_faculty('ekonomi');
                        ?>,
                        <?php 
                            $db = new Database();
                            $db->show_student_by_faculty('pertanian');
                        ?>
                    ],
                    backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
                }]
            },
            options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						},
					}],
				},
			},
        });
        var genderChart = new Chart(ctx1, {
            type : 'pie',
            data : {
                labels : ["Laki-laki", "Perempuan"],
                datasets : [{
                    label : '',
                    data : [
                        <?php 
                            $db = new Database();
                            $db->show_student_by_gender('L');
                        ?>,
                        <?php 
                            $db = new Database();
                            $db->show_student_by_gender('P');
                        ?>,
                    ],
                    backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					],
					borderWidth: 1
                }]
            },
            options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						},
					}],
				},
			},
        });
    </script>
</body>
</html>