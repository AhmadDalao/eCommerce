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
        'update_username_empty' => 'username can\'t be <strong>empty</strong>',
        'update_fullName_empty' => 'fullName can\'t be <strong>empty</strong>',
        'update_fullName_less' => 'fullName can\'t be <strong>less than 4 letters</strong>',
        'update_email_empty' => 'email can\'t be <strong>empty</strong>',
        // manage member 
        'members_pageTitle' => 'Members',
        'manageMember_title' => 'Manage Members',
        'manageMember_add' => 'Add Member',
        'manageMember_delete' => 'Delete',
        'manageMember_edit' => 'Edit',
        'manageMember_modalTitle' => 'Delete Account',
        'manageMember_modalWarning' => 'Are you sure you want to delete this account:',
        'manageMember_modalAccount' => 'account ID:',
        'manageMember_modalClose' => 'Close',
        'manageMember_approve' => 'Approve',
        // add member
        'add_profile' => 'add member',
        'add_member' => 'add member',
        // insert member 
        'inserted_recordChange' => 'Member added successfully',
        'insert_password_empty' => 'password can\'t be <strong>empty</strong>',
        'insert_profile' => 'Inserted Members',
        // activate member 
        'activate__title' => 'Activate Member',
        'activate_recordChange' => 'Account Activated',
        // table manage members
        'table_control' => 'Control',
        'table_registeredDate' => 'Registered Date',
        'table_fullName' => 'Full Name',
        'table_email' => 'Email',
        'table_username' => 'Username',
        'table_id' => '#ID',
        // delete member page
        'deleteMember_title' => 'Delete Member',
        'deleted_recordChange' => 'Account Deleted',
        // dashboard
        'Dashboard_pageTitle' => 'Dashboard',
        'dashboard_title' => 'dashboard',
        'dashboard_statusMembers' => 'Total Members',
        'dashboard_pendingMembers' => 'pending members',
        'dashboard_items' => 'total items',
        'dashboard_totalComments' => 'Total comments',
        // category page
        'Categories_pageTitle' => "Categories",
        'add_category' => 'Add new Category',
        'categoryName' => 'Category Name',
        'CategoryDescription' => 'Category Description',
        'CategoryOrdering' => 'Category Order',
        'CategoryVisibility' => 'Category Visibility',
        'isVisible' => "Category is visible to anyone",
        'isInVisible' => "Category is invisible to everyone",
        'commentingAllowed' => 'Allow Comments',
        'commentYes' => 'anyone can comment',
        'commentNo' => 'nobody can comment',
        'advertisementAllowed' => 'Allow advertisement',
        'adsYes' => 'show advertisement',
        'adsNo' => 'Disable advertisement',
        'add_category' => 'Add Category',
        // insert category
        'insert_category' => 'insert category',
        'insert_category_name' => 'category name can\'t be <strong>more than 25 letters</strong>',
        'insert_category_name_less' => 'category name can\'t be <strong>less than 4 letters</strong>',
        'insert_category_empty' => 'category name  can\'t be <strong>empty</strong>',
        'inserted_recordChangeCategory' => 'Category added successfully',
        // add category
        'category_title' => 'Manage Categories',
        'Add_category' => 'Add Category',
        // manage categories 
        'order_by' => 'Order by',
        'categoryView' => 'View',
        'manageCategory_modalTitle' => 'Delete Category',
        'manageCategory_modalWarning' => 'Are you sure you want to delete this Category:',
        'manageCategory_modalAccount' => 'Category ID:',
        'categoryClassic' => 'Classic',
        'categoryCompact' => 'Compact',
        "CategoryASC" => "ASC",
        "CategoryDESC" => "DESC",
        "CategoryOrderByName" => "Name",
        // edit category
        'edit_category' => 'Edit Category',
        // update category 
        'category_update' => 'Update Category',
        // delete category
        'deleteCategory' => 'Delete Category',
        // deleted Category recordChange
        'deleted_recordChangeCategory' => "Category Deleted",
        //    items page
        'items_pageTitle' => 'Items',
        // manageItems
        'items__title' => 'Manage Items',
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