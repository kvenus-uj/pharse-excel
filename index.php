<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>SinglePage</title>
  <style type="text/css">
  	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
	  -webkit-appearance: none;
	  margin: 0;
	}
  	input {
  		border: none;
  		width: 100%!important;
  		text-align: center;
    	background: transparent;
  	}
  	input:focus {
  		border: none;
    	background: transparent;
  	}
  	input:focus-visible {
  		outline: none;
  		border: none;
    	background: transparent;
  	}
  	td {
  		text-align: center;
  		padding: 0!important;
  	}
  </style>
</head>
<body>
<div class="table-resposive">
  <table class="table table-bordered">
    <thead>
      <tr class="table-danger">
        <th>Choisissez vos aliments</th>
        <th>Kcal pour 100Gr</th>
        <th>Choisissez la quantité</th>
        <th>Kcal</th>
        <th>Protides en gr</th>
        <th>lipides en gr</th>
        <th>glucides en gr</th>
        <th>soldium en mgr</th>
        <th>potassium en mgr</th>
        <th>magnesium en mgr</th>
        <th>calcium en mgr</th>
      </tr>
    </thead>
    <tbody>
		<tr class="table-dark mohead">
			<td class="produt"></td>
			<td class="kper100"></td>
			<td>Matin</td>
			<td class="kcal"></td>
			<td class="protides"></td>
			<td class="lipides"></td>
			<td class="glucides"></td>
			<td class="soldium"></td>
			<td class="potassium"></td>
			<td class="magnesium"></td>
			<td class="calcium"></td>
		</tr>   
		<?php
		for ($x = 0; $x <= 7; $x++) {
		  echo '<tr class="table-success mo" id="mo'.$x.'">
			<td class="produt"></td>
			<td class="kper100"></td>
			<td class="quantity">g</td>
			<td class="kcal"></td>
			<td class="protides"></td>
			<td class="lipides"></td>
			<td class="glucides"></td>
			<td class="soldium"></td>
			<td class="potassium"></td>
			<td class="magnesium"></td>
			<td class="calcium"></td>
		</tr>';
		}
		?>   
		<tr class="table-dark mihead">
			<td class="produt"></td>
			<td class="kper100"></td>
			<td>Midi</td>
			<td class="kcal"></td>
			<td class="protides"></td>
			<td class="lipides"></td>
			<td class="glucides"></td>
			<td class="soldium"></td>
			<td class="potassium"></td>
			<td class="magnesium"></td>
			<td class="calcium"></td>
		</tr>
		<tr class="table-success">
		<?php
		for ($x = 0; $x <= 11; $x++) {
		  echo '<tr class="table-success mi" id="mi'.$x.'">
			<td class="produt"></td>
			<td class="kper100"></td>
			<td class="quantity">g</td>
			<td class="kcal"></td>
			<td class="protides"></td>
			<td class="lipides"></td>
			<td class="glucides"></td>
			<td class="soldium"></td>
			<td class="potassium"></td>
			<td class="magnesium"></td>
			<td class="calcium"></td>
		</tr>';
		}
		?>
		</tr>      
		<tr class="table-dark evhead">
			<td class="produt"></td>
			<td class="kper100"></td>
			<td>Soir</td>
			<td class="kcal"></td>
			<td class="protides"></td>
			<td class="lipides"></td>
			<td class="glucides"></td>
			<td class="soldium"></td>
			<td class="potassium"></td>
			<td class="magnesium"></td>
			<td class="calcium"></td>
		</tr>
		<tr class="table-success">
		<?php
		for ($x = 0; $x <= 9; $x++) {
		  echo '<tr class="table-success ev" id="ev'.$x.'">
			<td class="produt"></td>
			<td class="kper100"></td>
			<td class="quantity">g</td>
			<td class="kcal"></td>
			<td class="protides"></td>
			<td class="lipides"></td>
			<td class="glucides"></td>
			<td class="soldium"></td>
			<td class="potassium"></td>
			<td class="magnesium"></td>
			<td class="calcium"></td>
		</tr>';
		}
		?>
		</tr>      
		<tr class="table-dark allhead">
			<td class="produt"></td>
			<td class="kper100"></td>
			<td>Total</td>
			<td class="kcal"></td>
			<td class="protides"></td>
			<td class="lipides"></td>
			<td class="glucides"></td>
			<td class="soldium"></td>
			<td class="potassium"></td>
			<td class="magnesium"></td>
			<td class="calcium"></td>
		</tr>      
    </tbody>
  </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<?php
	$command = escapeshellcmd('parse-excel.py');
	$output = shell_exec($command);
?>
<script type="text/javascript">
	var output = <?php echo $output; ?>;
	var productList = [];
	for(let i = 0; i < output.length; i++){
			productList.push(output[i][0]);
		}
	$('.produt').on('click', function(e) {
		var html = '<input list="browsers" name="browser" id="browser">'
			    +'<datalist id="browsers">';
		for(let i = 0; i < output.length; i++){
			html += '<option value="'+ productList[i] +'">'
		}
		html += +'</datalist>';
		$(this).html(html);	
		$(this).find('input').focus();
		$(this).find('input').on('blur',function(){
			var idx = productList.indexOf($(this).val());
			if(idx >= 0){
				$(this).parents('tr').find('td.kper100').html(output[idx][1]);
				$(this).parents('tr').find('td.protides').html(output[idx][2]);
				$(this).parents('tr').find('td.lipides').html(output[idx][3]);
				$(this).parents('tr').find('td.glucides').html(output[idx][4]);
				$(this).parents('tr').find('td.soldium').html(output[idx][5]);
				$(this).parents('tr').find('td.potassium').html(output[idx][6]);
				$(this).parents('tr').find('td.magnesium').html(output[idx][7]);
				$(this).parents('tr').find('td.calcium').html(output[idx][8]);
			}
			$(this).parent().html($(this).val());
		});
	});
	
	$('.quantity').on('click', function(){
		var html = '<input type="number">';
		$(this).html(html);	
		$(this).find('input').focus();
		$(this).find('input').on('blur',function(){
			var obj = $(this).parents('tr').find('td.kcal');
			var val = $(this).parents('tr').find('td.kper100').text()*$(this).val()/100;
			$(obj).text(val.toFixed(3));
			obj = $(this).parents('tr').find('td.protides');
			val = $(obj).text()*$(this).val()/100;
			$(obj).text(val.toFixed(3));
			obj = $(this).parents('tr').find('td.lipides');
			val = $(obj).text()*$(this).val()/100;
			$(obj).text(val.toFixed(3));
			obj = $(this).parents('tr').find('td.glucides');
			val = $(obj).text()*$(this).val()/100;
			$(obj).text(val.toFixed(3));
			obj = $(this).parents('tr').find('td.soldium');
			val = $(obj).text()*$(this).val()/100;
			$(obj).text(val.toFixed(3));
			obj = $(this).parents('tr').find('td.potassium');
			val = $(obj).text()*$(this).val()/100;
			$(obj).text(val.toFixed(3));
			obj = $(this).parents('tr').find('td.magnesium');
			val = $(obj).text()*$(this).val()/100;
			$(obj).text(val.toFixed(3));
			obj = $(this).parents('tr').find('td.calcium');
			val = $(obj).text()*$(this).val()/100;
			$(obj).text(val.toFixed(3));
			$(this).parent().html($(this).val()+'g');

			calcSum();
		});
	});

	function calcSum() {
		var sum = 0;
		for(let i  = 4; i < 12; i++){
			sum = 0;
			$('tr.mo').each(function(){
				sum += $(this).find('td:nth-child('+i+')').text()*1;
				$('tr.mohead').find('td:nth-child('+i+')').text(sum.toFixed(3));
			});
		}
		for(let i  = 4; i < 12; i++){
			sum = 0;
			$('tr.mi').each(function(){
				sum += $(this).find('td:nth-child('+i+')').text()*1;
				$('tr.mihead').find('td:nth-child('+i+')').text(sum.toFixed(3));
			});
		}
		for(let i  = 4; i < 12; i++){
			sum = 0;
			$('tr.ev').each(function(){
				sum += $(this).find('td:nth-child('+i+')').text()*1;
				$('tr.evhead').find('td:nth-child('+i+')').text(sum.toFixed(3));
			});
		}
		for(let i  = 4; i < 12; i++){
			sum = 0;
			sum += $('tr.mohead').find('td:nth-child('+i+')').text()*1;
			sum += $('tr.mihead').find('td:nth-child('+i+')').text()*1;
			sum += $('tr.evhead').find('td:nth-child('+i+')').text()*1;

			$('tr.allhead').find('td:nth-child('+i+')').text(sum.toFixed(3));
		}
	}
</script>
</body>
</html>
