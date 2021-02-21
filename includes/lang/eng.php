<?php


function lang($phrase)
{
    static $language = array(
        // navbar dashboard
        'brand_dashboard' => 'eCommerce',
        'home_dashboard' => 'Home',
        'items_dashboard' => 'items',
        'members_dashboard' => 'members',
        'categories_dashboard' => 'Categories',
        'statistic_dashboard' => 'Statistics',
        'logs_dashboard' => 'Logs',
        'edit_dashboard' => 'Edit profile',
        'settings_dashboard' => 'Settings',
        'logout_dashboard' => 'Logout',
    );
    return $language[$phrase];
}