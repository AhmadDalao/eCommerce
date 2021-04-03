<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand text-capitalize" href="index.php"><?php echo lang("navbar_brand_dashboard"); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-capitalize <?php if ($activePage == "dashboard") {
                                                            echo "active";
                                                        } ?>"
                        href="dashboard.php"><?php echo lang("navbar_home_dashboard"); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-capitalize <?php if ($activePage == "categories") {
                                                            echo "active";
                                                        } ?>"
                        href="categories.php"><?php echo lang("navbar_categories_dashboard"); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-capitalize <?php if ($activePage == "items") {
                                                            echo "active";
                                                        } ?>"
                        href="items.php"><?php echo lang("navbar_items_dashboard"); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-capitalize <?php if ($activePage == "members") {
                                                            echo "active";
                                                        } ?>"
                        href="members.php"><?php echo lang("navbar_members_dashboard"); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-capitalize <?php if ($activePage == "comments") {
                                                            echo "active";
                                                        } ?>"
                        href="comments.php"><?php echo lang("navbar_comments_dashboard"); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-capitalize <?php if ($activePage == "statistic") {
                                                            echo "active";
                                                        } ?>"
                        href="statistic.php"><?php echo lang("navbar_statistic_dashboard"); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-capitalize <?php if ($activePage == "logs") {
                                                            echo "active";
                                                        } ?>"
                        href="logs.php"><?php echo lang("navbar_logs_dashboard"); ?></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle text-capitalize" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['username']; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-capitalize" target="_blank" rel="noopener"
                            href="../index.php"><?php echo lang("navbar_visitWebsite_dashboard"); ?></a>
                        <a class="dropdown-item text-capitalize"
                            href="members.php?action=edit&userID=<?php echo $_SESSION['userID']; ?>"><?php echo lang("navbar_edit_dashboard"); ?></a>
                        <a class="dropdown-item text-capitalize"
                            href="#"><?php echo lang("navbar_settings_dashboard"); ?></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-capitalize"
                            href="logout.php"><?php echo lang("navbar_logout_dashboard") ?></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>