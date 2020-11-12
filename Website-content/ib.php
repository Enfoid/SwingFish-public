<?
// locations do not work .. need to read item and present a link instead 


	if (isset($cid)) {
		header("Location: ".URL."lib/ib/".$cid);
	}
	else {
		header("Location: ".URL."brokers");
	}