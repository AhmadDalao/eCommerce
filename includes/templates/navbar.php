<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand text-capitalize" href="#"><?php echo lang("brand_dashboard"); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-capitalize" href="#"><?php echo lang("home_dashboard"); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-capitalize" href="#"><?php echo lang("categories_dashboard"); ?></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle text-capitalize" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ahmadDalao
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-capitalize" href="#"><?php echo lang("edit_dashboard"); ?></a>
                        <a class="dropdown-item text-capitalize" href="#"><?php echo lang("settings_dashboard"); ?></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-capitalize" href="#"><?php echo lang("logout_dashboard") ?></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>