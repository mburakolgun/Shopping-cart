<?php

//fetch_item.php

include('db.php');

$query = "SELECT * FROM tblproducts";

$statement = $connect->prepare($query);

if($statement->execute())
{
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '
		<div class="col-md-3" style="margin-top:12px;">  
            <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:2px; height:350px;" align="center">
            	<img src="images/'.$row["itemimage"].'" class="img-responsive" /><br />
            	<h4 class="text-info">'.$row["itemname"].'</h4>
            	<h4 class="text-danger">Php '.$row["itemprice"] .'</h4>
            	<input type="text" name="quantity" id="quantity' . $row["itemid"] .'" class="form-control" value="1" />
            	<input type="hidden" name="hidden_name" id="name'.$row["itemid"].'" value="'.$row["itemname"].'" />
            	<input type="hidden" name="hidden_price" id="price'.$row["itemid"].'" value="'.$row["itemprice"].'" />
            	<input type="button" name="add_to_cart" id="'.$row["itemid"].'" style="margin-top:5px;" class="btn btn-primary form-control add_to_cart" value="Add to Cart" />
            </div>
        </div>
		';
	}
	echo $output;
}


?>