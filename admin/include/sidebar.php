<?php
    $admin_name = "";
    if(isset($_SESSION['login'])){
        $admin_name = $_SESSION['a_name'];
    }
?>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Admin</div>
                    <a class="nav-link" href="index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsematches"
                        aria-expanded="false" aria-controls="collapsematches">
                        <div class="sb-nav-link-icon"><i class="fa-brands fa-playstation"></i></div>
                        Matches
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsematches" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="manage-candidate.php">Candidates</a>
                            <a class="nav-link" href="add-match.php">Add Match</a>
                            <a class="nav-link" href="manage-upcomming-match.php">Upcomming Matches</a>
                            <a class="nav-link" href="manage-current-match.php">Current Matches</a>
                            <a class="nav-link" href="manage-Fwinners.php">Manage Final Matches</a>
                            <a class="nav-link" href="manage-results.php">Manage Poll Results</a>
                        </nav>
                    </div>

                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                        aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-file"></i></div>
                        Manage Website
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="manage-website.php">Website</a>
                            <a class="nav-link" href="manage_slider.php">Slider</a>
                            <a class="nav-link" href="manage-social-media.php">Social Media</a>
                        </nav>
                    </div>

                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOrders"
                        aria-expanded="false" aria-controls="collapseOrders">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-cart-flatbed"></i></div>
                        Manage Orders
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseOrders" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="manage-orders.php">Pending orders</a>
                            <a class="nav-link" href="completed-orders.php">Completed Orders</a>

                        </nav>
                    </div>

                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                        aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Pages
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="manage-about.php">About</a>
                            <a class="nav-link collapsed" href="manage-posts.php">Blog</a>
                            <a class="nav-link collapsed" href="manage-contact-us.php">Contact Us</a>
                            <a class="nav-link collapsed" href="manage-counter.php">Timer</a>
                            <a class="nav-link collapsed" href="manage-faqs.php">Faqs</a>
                            <a class="nav-link collapsed" href="manage-privacy-policy.php">Privacy Policy</a>
                            <a class="nav-link collapsed" href="manage-products.php">Shop</a>
                            <a class="nav-link collapsed" href="manage-user-guides.php">User Guide</a>
                            <a class="nav-link collapsed" href="manage-terms-conditions.php">Trems & Conditions</a>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Components</div>
                    <a class="nav-link" href="manage-categories.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-shield-cat"></i></i></div>
                        Manage Categories
                    </a>

                    <div class="sb-sidenav-menu-heading">Accounts</div>
                    <a class="nav-link" href="manage-admin.php">
                        Admin
                    </a>
                    <a class="nav-link" href="manage_users.php">
                        Users
                    </a>
                    <div class="sb-sidenav-menu-heading">Others</div>
                   
                    <a class="nav-link" href="manage-live-stream.php">
                        Manage Live Stream
                    </a>
                    <a class="nav-link" href="manage-team.php">
                        My Team
                    </a>
                    <a class="nav-link" href="manage-comments.php">
                        Comments
                    </a>
                    <a class="nav-link" href="manage-reports.php">
                        Reports
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                   <span class="text-capitalize">
                    <?php echo $admin_name;?></span>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">