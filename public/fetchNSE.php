<?php
include "db.php";
if(isset($_REQUEST['searchTitle'])){
	$article_id = $_REQUEST['searchTitle'];
	$query = "SELECT name FROM `30_nse_stocks_info` WHERE `Name` LIKE '%$article_id%'";
	$comments = $con ->query($query);
	$proAry=[];
	while($row=$comments-> fetch_array(MYSQLI_ASSOC)){
		$proAry[]=$row;	
	}
	$output = json_encode($proAry);
	echo $output;
} elseif(isset($_REQUEST['searchName'])){
	$searchName = $_REQUEST['searchName'];
	$query = "SELECT * FROM `30_nse_stocks_info` WHERE `Name`='$searchName'";
	$comments = $con ->query($query);
	$i=0;
	echo '<h4 style="text-align:left;margin:0 0 25px;">'.$searchName.'</h4>';
	echo '<div class="col-md-12 nameList" border="0">';	
	while($row=$comments-> fetch_array(MYSQLI_ASSOC)){
		echo '<div class="row">';
			echo '<div class="col-md-4 market"><span class="bg">Market Cap </span><span class="bg red">$ '.$row['MarketCap'].'</span></div>';	
			echo '<div class="col-md-4 market"><span class="bg">Divident Yield </span><span class="bg red">'.$row['DividendYield'].'%</span></div>';	
			echo '<div class="col-md-4 market"><span class="bg">Debt Equality </span><span class="bg red">'.$row['DebttoEquity'].'%</span></div>';
		echo '</div>';
		echo '<div class="row">';
			echo '<div class="col-md-4 market"><span class="bg1">Current Price </span><span class="bg1 red">$ '.$row['CurrentMarketPrice'].'</span></div>';	
			echo '<div class="col-md-4 market"><span class="bg1">ROCE </span><span class="bg1 red">'.$row['ROCE'].'%</span></div>';	
			echo '<div class="col-md-4 market"><span class="bg1">Eps </span><span class="bg1 red">$ '.$row['DividendYield'].'</span></div>';
		echo '</div>';
		echo '<div class="row">';
			echo '<div class="col-md-4 market"><span class="bg">Stock P/E </span><span class="bg red">'.$row['StockP/E'].'%</span></div>';	
			echo '<div class="col-md-4 market"><span class="bg">ROE </span><span class="bg red">'.$row['ROEPreviousAnnum'].'%</span></div>';	
			echo '<div class="col-md-4 market"><span class="bg">Reserves </span><span class="bg red">$ '.$row['Reserves'].'</span></div>';
		echo '</div>';
		echo '<div class="row">';
			echo '<div class="col-md-4 market"><span class="bg1">Debt </span><span class="bg1 red">$ '.$row['Debt'].'</span></div>';	
			
		echo '</div>';
	}
	echo '</div>';
} else{
	echo 'data is empty';
}
?>
