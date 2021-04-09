<?php


function lang($phrase)
{
    static $language = array(
        // login page index.php
        'login_pageTitle' => "Login",
        'admin_login' => 'Admin login',
        // navbar dashboard
        'navbar_brand_dashboard' => 'eCommerce',
        'navbar_home_dashboard' => 'Home',
        'navbar_items_dashboard' => 'items',
        'navbar_members_dashboard' => 'members',
        'navbar_categories_dashboard' => 'Categories',
        'navbar_comments_dashboard' => 'Comments',
        'navbar_statistic_dashboard' => 'Statistics',
        'navbar_logs_dashboard' => 'Logs',
        'navbar_edit_dashboard' => 'Edit profile',
        'navbar_settings_dashboard' => 'Settings',
        'navbar_logout_dashboard' => 'Logout',
        'navbar_login_dashboard' => 'Login',
        // signup form
        'update_username_greater' => 'username can\'t be <strong>more than 15 letters</strong>',
        'update_username_less' => 'username can\'t be <strong>less than 4 letters</strong>',
        'update_username_empty' => 'username can\'t be <strong>empty</strong>',
        'update_email_empty' => 'email can\'t be <strong>empty</strong>',
        'passwords_no_match' => 'passwords do not match',
        'insert_password_empty' => 'password can\'t be <strong>empty</strong>',
        "email_not_valid" => "This email is not valid",

    );
    return $language[$phrase];
}