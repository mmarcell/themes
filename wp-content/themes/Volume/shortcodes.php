<?php

//twitter post shortcode


function twitter_shortcode($atts, $content=null){  

$post_url = get_permalink($post->ID);  
$post_title = get_the_title($post->ID);  
$tweet = '<a href="http://twitter.com/home/?status=Read ' . $post_title . ' at ' . $post_url . '">Share on Twitter</a>';  

return $tweet;  
}  

add_shortcode('twitter', 'twitter_shortcode');  


function youtube_shortcode($atts, $content=null){  

extract(shortcode_atts( array('id' => ''), $atts));  

$return = $content;  
if($content)  
$return .= "<br /><br />";  

$return .= '<iframe width="560" height="349" src="http://www.youtube.com/embed/' . $id . '" frameborder="0" allowfullscreen></iframe>';  

return $return;   

}  
add_shortcode('youtube', 'youtube_shortcode');  

?>