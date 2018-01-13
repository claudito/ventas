<?php include'autoload.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ventas</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
</head>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<a class="navbar-brand active" href="#"><i class="fa fa-shopping-cart"></i>  Ventas</a>
		<ul class="nav navbar-nav">
			<li class="active">
				<a href="#">GESTIÓN</a>
			</li>
			<li class="active">
				<a href="#">TRANSACCIONES</a>
			</li>
		</ul>
	</div>
</nav>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">VENTAS</h3>
	</div>
	<div class="panel-body">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>CLIENTE</th>
					<th>MONTO</th>
					<th>VENDEDOR</th>
					<th>FECHA</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach (Venta::lista() as $key => $value): ?>
			<tr>
			<td><?php echo $value['cliente'] ?></td>
			<td><?php echo $value['monto'] ?></td>
			<td><?php echo $value['vendedor'] ?></td>
			<td><?php echo $value['fecha'] ?></td>
			</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
	</div>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">


<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
</div>
</div>

</div>

<script>

// Build the chart
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Resumen de Ventas 2017'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [

        
        <?php foreach (Venta::resumen() as $key => $value): ?>
        {
            name: '<?php echo $value['cliente'] ?>',
            y: <?php echo $value['monto'] ?>
        },
        <?php endforeach ?>



        ]
    }]
});
</script>
</body>
</html>