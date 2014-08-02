<?php
session_start();
if(!isset($_SESSION['userName']))
header("Location:../index.php");

include('../config.php');

if(isset($_GET['search_word']))
{
$search_word=$_GET['search_word'];

$sql=mysql_query("SELECT * FROM products WHERE name LIKE '%$search_word%' OR id LIKE '%$search_word%' OR details LIKE '%$search_word%' ORDER BY id DESC LIMIT 20");

$count=mysql_num_rows($sql);

if($count > 0)
{

while($row=mysql_fetch_array($sql))
{
$msg=$row['name'];
$bold_word='<b><a href="report.php?id='.$row['id'].'">'.$row['name'].'</a></b>';
$bold_word.='<br>Details : '.$row['details'];
?>


<li><?php echo $bold_word; ?></li>
<?php
}
}
else
{

echo "<li>No Results</li>";

}


}
?>
