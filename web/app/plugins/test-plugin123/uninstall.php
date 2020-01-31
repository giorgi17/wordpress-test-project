<?php

 if (!defined('WP_UNINSTALL_PLUGIN')) {
   die;
 }

 $cars = get_posts(array('post-type' => 'car', 'numberposts' => -1));

 foreach ($cars as $car) {
   wp_delete_post($car->ID, true);
 }
