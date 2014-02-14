<?php
ini_set('display_errors', 1);
require_once( get_template_directory() . '/lib/TwitterAPIExchange.php');

$settings = array(
    'oauth_access_token' => "17623928-iFBTQ5nJWof7TqnmQTNrgPW2mPx5H5JsirROxpQwE",
    'oauth_access_token_secret' => "G2xw4ywhdkEBc1M86RGH7rASL82n25iIGdabAJcQBs",
    'consumer_key' => "iXeRa0JtLsYk4DUNq8oltA",
    'consumer_secret' => "zf4YypfYqyYoo1EZyG7JtIbyKvpmMUmyGoVpPkR5hnY"
);


$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name=CIS_SecurityLtd&count=1';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$response = $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

//var_dump(json_decode($response));
$info = (json_decode($response));
/*function twitterify($ret) {
$ret = preg_replace(
    '@(https?://([a-zA-Z0-9_-\w\.\...]+)+(/([\w/_\.]*(\?\S+)?(#\S+)?)?)?)@',
     '<a href="$1" target="_blank">$1</a>',
    $ret);
$ret = preg_replace(
    '/@(\w+)/',
    '<a target="_blank" href="https://twitter.com/$1">@$1</a>',
    $ret);

return $ret;
}*/

function linkify($status_text)
{
   $status_text = preg_replace('/http:\/\/([A-Za-z0-9A-Z_\.\-\+\&\!\#\~\/\,]+)/i', '<a href="http://$1" target="_blank">http://$1</a>', $status_text);
    $status_text = preg_replace('/@([A-Za-z0-9A-Z_]+)/i', '<a href="http://twitter.com/$1" target="_blank">@$1</a>', $status_text);

  return $status_text;
}

echo "<ul class='foottweet'>";		
foreach ($info as $tweet){
	
		$chirp = linkify($tweet->text);
		
		echo "<li>". $chirp . "</li>";	
}
echo "</ul>";
?>
<a class="btn btn-primary" target="_blank" href="http://twitter.com/CIS_SecurityLtd">Join us on Twitter</a>