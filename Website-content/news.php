<?
//$now1 = explode($_REQUEST);
include(URI.'lib/3rd/wordpress/site_posts_cat_86.php');

// print_r($wp_posts);


?>
   <section class="page-title">
      <div class="container">
        <div class="inner">
          <div class="column">
            <div class="title">
              <h1>24 Hours Forex Market Headlines</h1>
            </div><!-- .title -->
          </div><!-- .column -->
          <div class="column">
           <div class="breadcrumbs">
			   <a href="/news">News</a>
              <span class="delimiter"><i class="icon-arrow-right"></i></span>
              <span>Headlines</span>
            </div><!-- .breadcrumbs -->
          </div><!-- .column -->
        </div>
      </div>
    </section><!-- .page-title -->
	<section class="container">
		<div class="row">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Status &amp; Title</th>
						<th></th>
						<th align="right" width="195">Posted</span></th>
<!--						<th>updated</th> -->
					</tr>
				</thead>
				<tbody>
					<tr><td colspan="3" style="padding:1px 14px 1px 14px;Background:lightgray;" align="center"><a href="/economic-calendar">check out the Economic Calendar for planned upcoming events !</a> &nbsp;  &nbsp; <a class="btn btn-success" href="/economic-calendar">check planned events</a></td></tr>
<?php
//	print_r($wp_posts);
	 $i = 0;
	 foreach ($wp_posts as $v) {
		 if (strtotime($v['date']) > time()-86400) { // only last 3 days news
		echo '			<tr>';
//		echo '				<td>'.$v['author'].'</td>';
		echo '				<td><a href="/'.$v['id'].'" title="'.urlencode(strip_tags($v['excerpt']['rendered'])).'">'.strip_tags($v['title']['rendered']).'</td>';
		echo '				<td>';
//		$id = $v['id']; // for wp_comments
//		include (URI.'lib/3rd/wordpress/wp_comments.php');
//		echo count($wp_co);
		echo '</td>';
		echo '				<td align="right">';
		if (strtotime($v['date']) > time()) {
			echo ".. just now";
		}
		else {
			echo HumanAgo(strtotime($v['date']),1);
		}
		echo '</td>';
//		echo '				<td>'.$v['modified'].'</td>';
		echo '			</tr>';
$i++;
}
	}
	if ($i <1){
		echo '<tr><td colspan="3" align="center">no recent news... (weekends are usually very quiet) &nbsp;  &nbsp; <a class="btn btn-info" href="/blog/c/markets/market-news/">check the archive</a></td></tr>';
	}
	else {
		echo '<tr><td colspan="3" align="center"><a href="/blog/c/markets/market-news/" class="btn btn-ghost btn-sm btn-default waves-effect">more</a></td></tr>';
	}
?>				</tbody>
			</table>
		</div>
	</div>
</section>


