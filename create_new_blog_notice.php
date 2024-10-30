<?php

/*

Plugin Name: Create New Blog Notice

Plugin URI: http://2007.ispace.ci.fsu.edu/~tdl09d/?page_id=80

Description: Adds a button to the admin panel that links to create a new blog. button disapears after user has created one blog.

Author: Todd Lahtinen

Version: 1.0

Author URI: http://ispace.ci.fsu.edu/~tdl09d

*/

/*  Copyright 2011  Todd Lahtinen  (email : todd.lahtinen@gmail.com)

 

    This program is free software; you can redistribute it and/or modify

    it under the terms of the GNU General Public License, version 2, as

    published by the Free Software Foundation.

 

    This program is distributed in the hope that it will be useful,

    but WITHOUT ANY WARRANTY; without even the implied warranty of

    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the

    GNU General Public License for more details.

 

    You should have received a copy of the GNU General Public License

    along with this program; if not, write to the Free Software

    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  

USA

*/

 

 

function my_admin_notice(){

    global $current_user;

    $user_id = $current_user->id;

        $blogs=get_blogs_of_user($user_id);//get all blogs of user

        /**

         * Subscribers have user level 0, so that is not entered in the 

user meta, author:2, editor:7,Admin:10

         */

       

        $count=0;

        foreach($blogs as $blog){

                                if(bpdev_is_user_blog_admin($user_id,

$blog->userblog_id))

                                $count++;

       

            }

    $count = tiw_find_non_subscriber_blogs($current_user->id);

    if ($count < 1){

    echo '<h1><a style="color:sienna; background-color:yellow;-moz-box-sizing: content-box; border-radius: 11px 11px 11px 11px; border-style: solid; border-width: 1px; cursor: pointer; font-size: 11px !important; line-height: 13px; padding: 3px 8px; text-decoration: none"  href="http://ir.cci.fsu.edu/wp-signup.php">To Create a 

Page Click Here</a></h1>';

    }

}

add_action('admin_notices', 'my_admin_notice');

 

?>
