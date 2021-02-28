<?php


function lang($phrase)
{
    static $language = array(
        // login page index.php
        'admin_login' => 'Admin login',
        // navbar dashboard
        'navbar_brand_dashboard' => 'eCommerce',
        'navbar_home_dashboard' => 'Home',
        'navbar_items_dashboard' => 'items',
        'navbar_members_dashboard' => 'members',
        'navbar_categories_dashboard' => 'Categories',
        'navbar_statistic_dashboard' => 'Statistics',
        'navbar_logs_dashboard' => 'Logs',
        'navbar_edit_dashboard' => 'Edit profile',
        'navbar_settings_dashboard' => 'Settings',
        'navbar_logout_dashboard' => 'Logout',
        // edit member\profile form
        'edit_profile' => 'Edit Profile',
        'edit_username_profile' => 'Username',
        'edit_password_profile' => 'Password',
        'edit_email_profile' => 'Email',
        'edit_fullName_profile' => 'Full Name',
        'edit_save_profile' => 'Save',
        'edit_password_empty' => 'don\'t want to change? leave it blank',
        // update member profile form
        'update_profile' => "Update Profile",
        'update_recordChange' => 'Record Updated',
        'update_username_greater' => 'username can\'t be <strong>more than 15 letters</strong>',
        'update_username_less' => 'username can\'t be <strong>less than 4 letters</strong>',
        'update_username_empty' => '"username can\'t be <strong>empty</strong>',
        'update_fullName_empty' => 'fullName can\'t be <strong>empty</strong>',
        'update_fullName_less' => 'fullName can\'t be <strong>less than 4 letters</strong>',
        'update_email_empty' => 'email can\'t be <strong>empty</strong>',
        // manage member 
        'manageMember_title' => 'Manage Member',
        'manageMember_add' => 'Add Member',
        // add member
        'add_profile' => 'add member',
        'add_member' => 'add member',
        // insert member 
        'inserted_recordChange' => 'Member added successfully',
        'insert_password_empty' => "password can\'t be <strong>empty</strong>",
        'insert_profile' => "Inserted Members",


    );
    return $language[$phrase];
}