<h3 class="swingfish">CabinCrew Internal Stuff</h3>
<?
require_once(URI.'lib/3rd/discord/link/permission-functions.php');
$_SESSION['discord']['return'] = "/members/cabincrew";
if (checkDiscordPermissionHtml('mod')){
?>
<hr />
<p>.</p>

<a class="btn btn-primary btn-icon-right waves-effect waves-light" href="#">Test</a>

<pre>
Will put some stuff here for internal use, admin commands and some fundamentals ...</pre>


<? }?>