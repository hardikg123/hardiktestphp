<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Index</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			display();
			$(document).on('change','.search',function(){
				display();
			});
			function display() {
				var data = $('#form').serialize();
				$.ajax({
					type:'POST',
					url:'response.php',
					data:data,
					success:function(res){
						$('#record').html(res);
						calc_total();
					}
				});
			}
			function calc_total(){
			  var sum = 0;
			  $("#myTable #price").each(function(){
			    sum += parseFloat($(this).text());
			  });
			  $('#totalprize').text(sum);
			}
		});
	</script>
</head>
<body>
<br><br>
<div id="record">
</div>
</body>
</html>