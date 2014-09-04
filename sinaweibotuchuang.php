<?php

/*
Plugin Name: Sina Weibo Tuchuang/微博图床
Plugin URI: https://github.com/ro4/wp-weibo-tuchuang
Description: 把微博当作图床来使用的插件。a plugin 4 wordpress that use sian weibo as a pic storage.
Version: 0.1
Author: Fan
Author URI: thefrp.sinaapp.com
*/
/*
    Copyright 2014  Fan  (email : thefro@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function add_weibo_button($context){
	$img = plugins_url( '/images/post.button.png' , __FILE__ );
  	$container_id = 'weibo';
  	$context .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>
$(document).ready(function(){
$("a.button").click(function(){

});
});
</script>'.
'<a class="button">
    <span class="wp-media-buttons-icon" style="background: url('.$img.'); background-repeat: no-repeat; background-position: left bottom;"></span>
  微博图片
  </a>';
  
  	return $context;
}

add_action('media_buttons_context', 'add_weibo_button');

function sina_weibo_menu(){
	add_options_page('sina weibo tuchuang options', '微博图床/weibo tuchuang', 'manage_options', 'my-unique-identifier', 'sina_weibo_options');
}

/** 第2步：将函数注册到钩子中 */
add_action( 'admin_menu', 'sina_weibo_menu' );

/** 第3步：定义选项被点击时打开的页面 */
function sina_weibo_options() {
     if ( !current_user_can( 'manage_options' ) )  {
          wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
     }
     echo '<div class="wrap">';
     echo '<p>插件选项.</p>';
     echo '</div>';
}
function add_shortcode_post(){
   echo 'hi';
}
function weibo_select_img(){
   if ('add_shortcode_post' == $_GET['task']){
    add_shortcode_post();
   }
}

?>