<!DOCTYPE html>
<html>
<head>
	<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
</head>
<body>
	<h1>Choose the payment method:</h1>
	<?php $p= "pNo=".$_GET['pNo'];
	$q="&addr=".$_GET['addr'];
	$r="&dmethod=".$_GET['dmethod'];
	?>
	<form>
		<input type="radio" name="payment_method" value="0" id="1"> Cash on delivery<br>
		<input type="radio" name="payment_method" value="1" id="2"> Pay by credit card<br>
		<div id="ccdetail" hidden>
			Credit card no.: <input type="text" name="creditCardNo" ><br>
			Expiration date: <input type="text" name="expirationDate" ><br>
			Password: <input type="password" name="password" maxlength="3"><br>
		</div>
	</form>
	<button onclick="back()">Back</button>
	<button onclick="next()">Next</button>
	<script>
	$('input[id="1"]').on('change', function() {
	$('div[id="ccdetail"]').attr('hidden', true).focus();
	});
	$('input[id="2"]').on('change', function() {
	$('div[id="ccdetail"]').attr('hidden', false);
	$('input[name="creditCardNo"]').attr('hidden', false).focus();
	});
	function next(){
		var val1="<?php echo $p.$q.$r;?>";
		if(document.getElementById("1").checked){
			var val2="&pmethod=cod";
		}else{
			var val2="&pmethod=pcd";
		}
		var link1="success.php?"+val1+val2;
		var x=document.getElementById('1');
		if(x.checked){window.location.href=link1;}

		var y=document.getElementById('2');
		if(y.checked){window.location.href=link1;}
	}
	function back(){

		window.location.href="delivery.php?"+"<?php echo $p?>";
	}

	</script>
</body>
</html>