<h3 class="swingfish">Bookclub [First Mate only]</h3>
<?
require_once(URI.'lib/3rd/discord/link/permission-functions.php');
$_SESSION['discord']['return'] = "/members/bookclub";
if (checkDiscordPermissionHtml('mate')){


$list = json_decode(file_get_contents(URI.'/assets/cache/TradersLib.json'),true);
$list = $list['Contents'];

$base = 'https://s3.amazonaws.com/cdn-s3.lomoos.com/';

	$BookCountFile = CACHE.'aws_bookcount';
?>

<pre>
<strong>only First Mates can see this page !
DO NOT SHARE LINKS OR the Fact that this page exists to ANYONE!</strong>

most of the items are Copyrighted material! be Thankful and STFU!!

please pay it forward and upload new items to #book-sharing in the Discord,
we will add them to the list then</pre>
<div class="table-responsive space-bottom-2x">
<input type="text" id="find" onkeyup="TableFind()" style="border-color: orange" placeholder="Search for names..">
<style>
table {
    width: 100%;
}

.hideend {
    white-space: normal;
    overflow: hidden;
    max-height: 1.2em;
    min-width: 50px;
}
.showall {
    white-space:nowrap;
}
</style>
	<table id="searchTable" class="table-striped">
          <thead>
            <tr>
              <th>File</th>
              <th width="100" align="left">Size</th>
            </tr>
          </thead>
          <tbody>
<?
$bookcount = 0;
foreach ($list as $v) {
	if ((\strpos($v['Key'], 'TradersLib') !== false)&&($v['Size']>200)) { 
		$bookcount++;
//		echo "<br />".$v['Size']." | ".$v['LastModified']." | ".basename($v['Key']);
        echo '    <tr>
              <td scope="row"><a href="'.$base.$v['Key'].'" target="_blank">'.basename($v['Key']).'</a></td>
              <td>'.humanSize($v['Size']).'</td>
            </tr>';
	}
}
?>
		<tr>
		<th></th><td>Total: <?=$bookcount?></td></tr>
          </tbody>
        </table>
      </div>
<?

	$dd = intval(file_get_contents($BookCountFile));

	if ($dd == $bookcount) {
		// file up to date 
		// do nothing, just load it and assign the array
	}
	else {
		echo "<strong>Updating book counts</strong>";
		unlink($BookCountFile);
		file_put_contents($BookCountFile, $bookcount);
	}
}?><script>
function TableFind() {
  // Declare variables 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("find");
  filter = input.value.toUpperCase();
  table = document.getElementById("searchTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>