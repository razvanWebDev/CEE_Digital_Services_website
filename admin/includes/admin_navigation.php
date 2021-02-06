        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li><a href="../index.html">HOME SITE</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#main-page-dropdown"><i class="fa fa-fw fa-arrows-v"></i> Main Page<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="main-page-dropdown" class="collapse">
                            <li>
                                <a href="hero_main.php">Upcoming event</a>
                            </li>
                            <li>
                                <a href="hero_newsletter_signup.php">Newsletter signup</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#matchmaking-dropdown"><i class="fa fa-fw fa-arrows-v"></i> Matchmaking Page<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="matchmaking-dropdown" class="collapse">
                            <li>
                                <a href="matchmaking_page_title.php">Page title</a>
                            </li>
                            <li>
                                <a href="matchmaking_page_content.php">Page Content</a>
                            </li>
                           
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#tickets-reservations-dropdown"><i class="fa fa-fw fa-arrows-v"></i> Tickets reservations<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="tickets-reservations-dropdown" class="collapse">
                            <li>
                                <a href="ticket-reservations.php">View all reservations</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#submit-solutions-dropdown"><i class="fa fa-fw fa-arrows-v"></i>Solutions Showcase<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="submit-solutions-dropdown" class="collapse">
                            <li>
                                <a href="submit-solutions-showcase.php">View solutions showcases</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#news-dropdown"><i class="fa fa-fw fa-arrows-v"></i> News <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="news-dropdown" class="collapse">
                            <li>
                                <a href="news.php">View all news</a>
                            </li>
                            <li>
                                <a href="news.php?source=add_news">Add news</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#newsletter-signup"><i class="fa fa-fw fa-arrows-v"></i>Newsletter Signup<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="newsletter-signup" class="collapse">
                            <li>
                                <a href="newsletter-signup.php">View newsletter subscriptions</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#users_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="users_dropdown" class="collapse">
                            <li>
                                <a href="users.php">View All Users</a>
                            </li>
                            <li>
                                <a href="users.php?source=add_user">Add user</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>