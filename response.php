<?php 
    include 'connection.php';
    $b = new database();

    $where = '';
	$postData = array_filter($_REQUEST);
	$postData = array_map(function($value) { return "'".$value."'"; }, $postData);

	$where = http_build_query($postData, '', ' and ');
	$where = urldecode($where);
	if ((strpos($where, "product_price=")) !== FALSE) { 
		$whatIWant = substr($where, strpos($where, "product_price=") + 14); 
		$value_replace = str_replace($whatIWant, 'CAST('.$whatIWant.' AS DECIMAL)', $where);
		$where = str_replace('product_price', 'CAST(product_price AS DECIMAL)', $value_replace);
	}
?>
<form name="form" id="form" action="">	
<table align="center">
	<tr>
		<th>Customer:</th>
		<td>
			<select name="customer_mail" id="customer_mail" class="search">
			<option value="">Select Customer:</option>
			<?php 
			$customers = $b->select("customer_products","DISTINCT(`customer_mail`),customer_name",$where);
			while($r = mysqli_fetch_assoc($customers)){
			?>
			<option value="<?php echo $r['customer_mail']; ?>" <?php if(isset($_REQUEST['customer_mail'])){if($_REQUEST['customer_mail']==$r['customer_mail']){echo 'selected';}}?>><?php echo $r['customer_name']; ?></option>
			<?php } ?>
			</select>
		</td>
		<th>Product :</th>
		<td>
			<select name="product_id" id="product_id" class="search">
			<option value="">Select Product:</option>
			<?php 
			$products = $b->select("customer_products","DISTINCT(`product_id`),product_name",$where);
			while($r = mysqli_fetch_assoc($products)){
			?>
			<option value="<?php echo $r['product_id']; ?>" <?php if(isset($_REQUEST['product_id'])){if($_REQUEST['product_id']==$r['product_id']){echo 'selected';}}?>><?php echo $r['product_name']; ?></option>
			<?php } ?>
			</select>
		</td>
		<th>Price:</th>
		<td>
			<select name="product_price" id="product_price" class="search">
			<option value="">Select Price:</option>
			<?php 
			$products = $b->select("customer_products","DISTINCT(`product_price`)",$where);
			while($r = mysqli_fetch_assoc($products)){
			?>
			<option value="<?php echo $r['product_price']; ?>" <?php if(isset($_REQUEST['product_price'])){if($_REQUEST['product_price']==$r['product_price']){echo 'selected';}}?>><?php echo $r['product_price']; ?></option>
			<?php } ?>
			</select>
		</td>
	</tr>
</table>
</form>
<br><br>
<table border="1" id="myTable">
	<tr bgcolor="#CCC">
		<th>Sale ID</th>
		<th>Customer Name</th>
		<th>Customer Mail</th>
		<th>Product ID</th>
		<th>Product Name</th>	
		<th>Product Price</th>
		<th>Sale Date (UTC)</th>
		<th>Version</th>	
	</tr>
	<?php 
		$results = $b->select("customer_products","*",$where);
		$count = mysqli_num_rows($results);
		if($count > 0) {
		while($r = mysqli_fetch_assoc($results)){
	?>
	<tr>
		<td align="center"><?php echo $r['sale_id']; ?></td>
		<td align="center"><?php echo $r['customer_name']; ?></td>
		<td align="center"><?php echo $r['customer_mail']; ?></td>
		<td align="center"><?php echo $r['product_id']; ?></td>
		<td align="center"><?php echo $r['product_name']; ?></td>
		<td align="center" id="price"><?php echo $r['product_price']; ?></td>
		<td align="center"><?php echo $r['sale_date']; ?></td>
		<td align="center"><?php echo $r['version']; ?></td>
	</tr>
	<?php }} else{ ?>
	<tr>
		<th colspan="9">No Record!!</th>
	</tr>
	<?php } ?>
	<tr>
		<th colspan="4"><font color="blue">Total Prize:</font></th>
		<td colspan="5" align="center" id="totalprize" style="color: blue;"></td>
	</tr>
</table>