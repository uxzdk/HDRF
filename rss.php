<?php
########################################################################################
################# NextGen RSS feed categories, last update 10/12/2015 ##################
########################################################################################
####  47 3D - 39 Android - 18 Appz(iOS) - 36 Appz(MAC) - 1 Appz(PC) - 31 TV-HD	     ###
####  44 BluRay - 23 Boxset(Dansk) - 7 Boxset(DVD-R) - 21 Boxset(SD) - 12 Kids	     ###
####  24 Boxset(TV) - 17 Danish DVD-R - 6 DVD-R - 16 DVD9 - 10 Games(Console)        ###
####  2 Games(PC) - 30 Games(PS3) - 34 Games(Wii) - 35 Games(XBOX) - 41 Musik HD     ###
####  42 NG Serier DVDR - 8 Books - 11 MiSC  - 40 MP3 PACK  - 13 Music/Video - 9 HD  ###
####  3 Musik SD - 25 NG Film DVDR - 38 NG Film HD  - 22 NG SD - 42 NG Serier DVDR   ###
####  46 NG Serier HDTV - 26 NG Serier WEB-DL - 28 NG WWW DVDR - 43 NG WWW HD	     ###
####  5 SD - 4 TV - 45 TV-Misc - 33 WWW Subs - 14 XXX - 37 Audio Books	             ###
########################################################################################
#############################PHP Script by NextGen user UXZ#############################
####################################Sharing is Caring###################################
########################################################################################


// Check if API is right
if ($_GET['api'] == "xxxxxx") {

// Set Content and version
header("Content-Type: text/xml;charset=iso-8859-1"); 
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
echo "<rss version=\"2.0\"><channel>";

// Main code start
function search($category, $search) {

// NextGen passkey
$passkey = "xxxxxxx";

// Use Curl to download RSS feed from NextGen 
$curl = curl_init();
curl_setopt_array($curl, Array(
	CURLOPT_URL            => "http://nxgn.org/rss.php?feed=dl&cat=$category&passkey=$passkey&lim=1&search=$search",
	CURLOPT_USERAGENT      => 'spider',
	CURLOPT_TIMEOUT        => 120,
	CURLOPT_CONNECTTIMEOUT => 30,
	CURLOPT_RETURNTRANSFER => TRUE,
	CURLOPT_ENCODING       => 'UTF-8'
));
$data = curl_exec($curl);
curl_close($curl);

// Convert to object and into small string
$feed  = simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA);
  foreach($feed->channel->item as $item){
	  
// Echo new RSS feed
echo "<item>";
echo "<title>".$item->title."</title>";
echo "<link>".htmlentities($item->link)."</link>";					
echo "<description>".$item->description."</description>";
echo "</item>";
break;
}	
}

//search start
//Category and search name like
//search("category", "search name");



search("46", "Marvels.Agents.of.S.H.I.E.L.D.DKSubs.720p");
search("46", "Limitless.Custom.DKSubs.720p");








//search stop and close the new RSS feed
echo "</channel></rss>";

// if bad API echo 
} else {
    echo "Bad API";
}

?>
