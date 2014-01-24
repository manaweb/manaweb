<?php
	echo $messageType.": ".$messageText;
	foreach($banners as $item){
		echo $item->txtTitu."<br />".$item->txtDest."<br />".$item->txtImag."<br /><hr>";
	}
	