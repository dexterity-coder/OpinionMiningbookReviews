<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
    <!--left-fixed -navigation-->
    <aside class="sidebar-left">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h1><a class="navbar-brand" href="#"><span class="fa fa-area-chart"></span> Books<span class="dashboard_text">Reviews Analysis</span></a></h1>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>

                    <?php
                    if ($role == "admin") {
                        ?>
                        <li class="treeview">
                            <a href="index">
                                <i class="fa fa-dashboard"></i> <span>Home</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="addbooks">
                                <i class="fa fa-book"></i> <span> Add | Manage Books</span>
                            </a>
                        </li>
                       
                         <li class="treeview">
                            <a href="manageusers">
                                <i class="fa fa-book"></i> <span>Manage Users</span>
                            </a>
                        </li>
                         <li class="treeview">
                            <a href="feedbacks">
                                <i class="fa fa-empire"></i> <span> Feedbacks</span>
                            </a>
                        </li>
                        <?php
                    } elseif ($role == "user") {
                        ?>
                        <li class="treeview">
                            <a href="home">
                                <i class="fa fa-dashboard"></i> <span>Home</span>
                            </a>
                        </li>  
                        <li class="treeview">
                            <a href="books">
                                <i class="fa  fa-book"></i> <span>Books</span>
                            </a>
                        </li> 
                        <li class="treeview">
                            <a href="profile">
                                <i class="fa  fa-database"></i> <span>My Profile</span>
                            </a>
                        </li>  
                        <?php
                    }
                    ?>

                    <li class="treeview">
                        <a href="changepass">
                            <i class="fa fa-lock"></i> <span>Change Password</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="logout">
                            <i class="fa fa-windows "></i> <span>Logout</span>
                        </a>
                    </li>



                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </aside>
</div>