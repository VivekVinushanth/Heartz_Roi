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
			<input type="text" name="address" id="ad"><p id="demo"></p>
		</div>
	</form>
	<button onclick="back()">Back</button>
	<button onclick="next()">Next</button>
	<?php $p= "pNo=".$_GET['pNo']?>
	<script>
		$('input[id="1"]').on('change', function() {$('div[id="addr"]').attr('hidden', true).focus();});
		$('input[id="2"]').on('change', function() {$('div[id="addr"]').attr('hidden', false);});
		$('input[id="2"]').on('change', function() {$('input[name="address"]').attr('hidden', false).focus();});
		function next(){
			var val1="<?php echo $p;?>";
			var val2="&addr="+document.getElementById("ad").value;
			if(document.getElementById("1").checked){
				var val2="&addr=0";
				var val3="&dmethod=cnt";
				var val4="&pmethod=cod";
			}else if(document.getElementById("2").checked){
				var val3="&dmethod=dmh";
			}
			var link1="success.php?"+val1+val2+val3+val4;
			var link2="paymentmethod.php?"+val1+val2+val3;
			var x=document.getElementById('1');
			if(x.checked){window.location.href=link1;}

			var inpObj = document.getElementById("ad");
		    if (inpObj.value=="") {
		        document.getElementById("demo").innerHTML = "Enter valid address";
		    } else {
		        document.getElementById("demo").innerHTML = "";
				var y=document.getElementById('2');
				if(y.checked){window.location.href=link2;}
			}
		}
		function back(){
			window.location.href="selectPrescription.php";
		}
	</script>
</body>
</html>