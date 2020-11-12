<?
// this just sisplay's a image delivered as base64 or direct url 
//print_r($_REQUEST);
$i = @substr(@$_REQUEST['go'],5);
// echo URL.$i;
if ((isset($i))&&($i != "")&&(is_file(URI.$i))){

//require_once(URI."lib/3rd/wordpress/wordpress/wp-config.php");

$mysqli = new mysqli('127.0.0.1', 'altf4', 'mausmatte', 'swingfish');
$mysqli->query("SET NAMES 'utf8'");

if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

$q=$mysqli->query("select guid,post_title from `wp_posts` where post_status='publish' and post_content like '%".$i."%';");

?>
<section class="page-title">
	<div class="container">
		<div class="row">
			<center>Image: <i><?=substr($i, (strrpos($i, "/")+1))?></i><br />
			<img align="center" border="1" src="<?=URL.$i?>"></center>
				<?
				if ($q->num_rows > 0){
					echo "<ul>Used in:";
					while($r=$q->fetch_assoc()) {
//						print_r($r);
						echo '<li><a border="1" href="'.$r['guid'].'">'.$r['post_title'].'</a></li>';
					}
					echo "</ul>";
				}
?>
		<li>Created: <?=HumanAgo(filemtime(URI.$i))?></li>
		</div>
		<div class="row">
			<hr />
			<div class="col-sm-9 space-bottom">
				<ul class="list">
					<li><img id="cbe1D16a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D16n">... loading</span> <span id="cbe1D16b"></span></li>
					<li><img id="cbe1D17a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D17n">... loading</span> <span id="cbe1D17b"></span></li>
					<li><img id="cbe1D18a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D18n">... loading</span> <span id="cbe1D18b"></span></li>
					<li><img id="cbe1D19a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D19n">...</span> <span id="cbe1D19b"></span></li>
				</ul>
			</div>
			<div class="col-sm-3 space-bottom">
				<a class="btn btn-success btn-sm" href="/chat">Join in the Chat!, it's Free!</a><br />
				<a class="btn btn-info btn-sm" href="/tradingroom">Trading Room with Trade Log</a><br />
			</div>
		</div>
	</div>
</section>
<? } 
	else { include("live-youtube.php"); }
?>