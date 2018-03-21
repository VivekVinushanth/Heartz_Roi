<!DOCTYPE html>
<html>
<head>
	<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

</head>
<body>
	<h1>Choose the delivery method:</h1>
	
	<form>
		<input type="radio" name="delivery_method" value="cnt" id="1"> Come and take medicine<br>
		<input type="radio" name="delivery_method" value="dmh" id="2"> Deliver medicine to home<br>
		<div id="addr" hidden>
			Address:
			<input type="text" name="address" id="ad"><br>
		</div>
	</form>
	<button onclick="next()">Next</button>
	<?php $p= "pNo=".$_POST['pNo']?>
	<script>
		$('input[id="1"]').on('change', function() {$('div[id="addr"]').attr('hidden', true).focus();});
		$('input[id="2"]').on('change', function() {$('div[id="addr"]').attr('hidden', false);});
		$('input[id="2"]').on('change', function() {$('input[name="address"]').attr('hidden', false).focus();});
		function next(){

			var val1="<?php echo $p;?>";
			var val2="&addr="+document.getElementById("ad").value;
			if(document.getElementById("1").checked){
				var val3="&dmethod=cnt";
			}else{
				var val3="&dmethod=dmh";
			}
			var link1="success.php?"+val1+val3;
			var link2="paymentmethod.php?"+val1+val2+val3;
			var x=document.getElementById('1');
			if(x.checked){window.location.href=link1;}

			var y=document.getElementById('2');
			if(y.checked){window.location.href=link2;}
		}
	</script>
</body>
</html>