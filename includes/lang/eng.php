<?php


function lang($phrase)
{
    static $language = array(
        // navbar dashboard
        'brand_dashboard' => 'eCommerce',
        'home_dashboard' => 'Home',
        'categories_dashboard' => 'Categories',
        'edit_dashboard' => 'Edit profile',
        'settings_dashboard' => 'Settings',
        'logout_dashboard' => 'Logout',
    );
    return $language[$phrase];
}