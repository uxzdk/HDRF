<?php
############################################################################################################
########################### HoundDawgs RSS feed categories, last update 12/08/2015 #########################
############################################################################################################
68 3D Appz | 80 Android | 6 Appz and Div | 71 Appz and iOS | 70 Appz and Mac | 69 Appz and PC
72 Audio Books | 82 BluRay and REMUX | 78 Books | 87 Cover | 90 DK DVDr | 89 DK HD | 91 DK SD
92 DK TV HD | 93 DK TV SD | 84 Film Boxset | 81 Film CAM and TS | 60 Film DVDr 59 Film HD
73 Film SD | 77 Film Tablet | 61 Musik | 76 Musik Video and Koncert | 75 Spil (Konsol) | 79 Spil (Mac)
64 Spil (PC) | 85 TV Boxset) | 58 TV DVDr | 57 TV HD | 74 TV SD | 94 TV Tablet | 83 E Learning | 67 XXX	
############################################################################################################
#####################################PHP Script by HoundDawgs user UXZ######################################
##############################################Sharing is Caring#############################################
############################################################################################################

// Check if API is right, rember to change
if ($_GET['api'] == "xxxxx") {

// Set Content and version
header("Content-Type: text/xml;charset=iso-8859-1"); 
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
echo "<rss version=\"2.0\"><channel>";

// Main code start
function search($category, $search) {

// HoundDawgs user info
$user = "xxxxx";
$auth = "xxxxx";
$passkey = "xxxxx";
$authkey = "xxxxx";

// Only DL freeleech on/off
$freeleech = "on";

// Use Curl to download RSS feed from HoundDawgs 
$curl = curl_init();
curl_setopt_array($curl, Array(
	CURLOPT_URL            => "http://hounddawgs.org/feeds.php?feed=torrents_all&user=$user&auth=$auth&passkey=$passkey&authkey=$authkey&freeleech=$freeleech&filter_cat[$category]&searchstr=$search",
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


search("57", "The.Flash");
search("57", "Limitless");
search("57", "Marvels.Agents.of.S.H.I.E.L.D.");




//search stop and close the new RSS feed
echo "</channel></rss>";

// if bad API echo 
} else {
    echo "Bad API";
}
?>
