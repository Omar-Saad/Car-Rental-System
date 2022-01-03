<?php

session_start();

//TODO : ADD CAR MODIFY/DELETE BUTTON

if (!isset($_SESSION["admin_id"])) 
{
    //UNAUTHORIZED USER
    header("Location: ../");
}



include(dirname(__FILE__) . '/../../classes/Models/Dbh.php');
include(dirname(__FILE__) .'/../../classes/Models/Admin.php');
include(dirname(__FILE__) .'/../../classes/Controllers/AdminController.php');

$controller = new AdminController();

$cars = $controller->getAllCars();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css">
    <link rel="stylesheet" href="https://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css"/>




    <title>Admin | Cars</title>
   <!-- <link rel="stylesheet" href="../css/admin_style.css">-->
</head>
<header>
    
</header>

<body >
    
    <div class="container">
<h1 style="text-align: center;">Cars</h1>

<a href="addCar.php" class="btn btn-primary">Add Car</a>


<div id="toolbar" >
		<select class="form-control">
				<option value="">Export Basic</option>
				<option value="all">Export All</option>
		</select>

</div>


<table id="table" 
			 data-toggle="table"
			 data-search="true"
			 data-filter-control="true" 
			 data-show-export="true"
       data-show-refresh="true"
       data-show-toggle="true"
       data-pagination="true"

			 data-toolbar="#toolbar"
       class="table-responsive">
	<thead>
		<tr>
			<th data-field="plate_id<" data-filter-control="input" data-sortable="true">Plate ID</th>
			<th data-field="status" data-filter-control="input" data-sortable="true">status</th>
            <th data-field="model" data-filter-control="input" data-sortable="false">Model</th>

			<th data-field="year" data-filter-control="input" data-sortable="true">Year</th>
            <th data-field="price" data-filter-control="input" data-sortable="true">Price</th>
            <th data-field="location" data-filter-control="input" data-sortable="true">Price</th>

            <th data-field="image_link" data-filter-control="input" data-sortable="false">Image Link</th>

			
		</tr>
	</thead>
	<tbody>
        <?php
        for ($i=0;$i<count($cars);$i++){
            
		$s = 
			'<tr>'.
            '<td>'.$cars[$i]['plate_id'].'</td>'.
			'<td>'.$cars[$i]['status'].'</td>'.
			'<td>'.$cars[$i]['model'].'</td>'.
			'<td>'.$cars[$i]['year'].'</td>'.
			'<td>'.$cars[$i]['price'].'</td>'.
            '<td>'.$cars[$i]['location'].'</td>'.
			'<td>'.$cars[$i]['image_link'].'</td>'. 
	        '</tr>';
            echo $s;

        }
        ?>
		
	</tbody>
</table>
</div>


<script >
    //exporte les données sélectionnées
var $table = $('#table');
    $(function () {
        $('#toolbar').find('select').change(function () {
          $table.bootstrapTable('refreshOptions', {
                exportDataType: $(this).val()
            });
        });
    })

		var trBoldBlue = $("table");


	$(trBoldBlue).on("click", "tr", function (){
			$(this).toggleClass("bold-blue");
	});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/editable/bootstrap-table-editable.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/export/bootstrap-table-export.js"></script>

<script src="https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/filter-control/bootstrap-table-filter-control.js"></script>


</body>

