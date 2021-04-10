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
        // add item
        'add_itemTitle' => 'Add Item',
        'add_item' => 'Add item',
        'itemName' => 'Item Name',
        'itemDescription' => 'Item Description',
        'itemPrice' => 'item Price',
        'itemMadeIn' => 'country of origin',
        'itemStatus' => 'item status',
        'itemNew' => ' New ',
        'itemSelect' => '--- Select Status ---',
        'itemLikeNew' => 'Like new',
        'itemSecondHand' => 'Second hand',
        'itemOld' => 'Old',
        'itemRating'     => 'item rating',
        'itemSelectRating' => '--- Select Rating ---',
        'itemRating1' => '1',
        'itemRating2' => '2',
        'itemRating3' => '3',
        'itemRating4' => '4',
        'itemRating5' => '5',
        'itemSelectMember' => '--- Select Member ---',
        'itemMember' => 'Add item to Member',
        'itemCategory' => 'Add item to Category',
        'itemSelectCategory' => '--- Select Category ---',
        // insert item
        'insert_item' => 'Insert Item',
        'inserted_recordChangeItem' => 'Item Inserted',
        'itemName_greater' => 'item name can\'t be <strong>more than 15 letters</strong>',
        'itemName_less' => 'item name can\'t be <strong>less than 4 letters</strong>',
        'itemName_empty' => 'name can\'t be <strong>empty</strong>',
        'itemDescriptionEmpty' => 'Description can\'t be <strong>empty</strong>',
        'itemPriceEmpty' => 'Price can\'t be <strong>empty</strong>',
        'itemMadeInEmpty' => 'Country of origin can\'t be <strong>empty</strong>',
        'itemStatusEmpty' => 'item status can\'t be <strong>empty</strong>',
        'itemMemberEmpty' => 'Member can\'t be <strong>empty</strong>',
        'itemCategoryEmpty' => 'Category can\'t be <strong>empty</strong>',
    );
    return $language[$phrase];
}
