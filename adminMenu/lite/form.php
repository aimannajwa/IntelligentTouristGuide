<?php

session_start();
	include_once('connectdb.php');
	
if(isset($_GET['keywords']))
	{	
$keywords = $db->escape_string($_GET['keywords']);    

$query = $db->query("
SELECT locName, area, tag, description
FROM place
WHERE area LIKE '%{$keywords}%'
OR tag LIKE '%{$keywords}%'

");

<?

<div class="result-count">
Found <php echp $query->num_rows; ?> results.
</div>

<?php

if($query->num_rows){
while($r = $query->fetch_object()) {
?>

<div class="result">
<a href="#"><?php echo $r->locName; ?></a>
</div>



mysqli_close($con);
	}
	
	
?>