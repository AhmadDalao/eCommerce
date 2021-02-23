<?php


function lang($phrase)
{
    static $language = array(
        // login page index.php
        'admin_login' => 'Admin login',
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
        // edit member\profile form
        'Edit_profile' => 'Edit Profile',
        'username_profile' => 'Username',
        'password_profile' => 'Password',
        'email_profile' => 'Email',
        'fullName_profile' => 'Full Name',
        'save_profile' => 'Save',
        // update member profile form
        'update_profile' => "Update"

    );
    return $language[$phrase];
}