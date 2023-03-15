<header>
    <article>
        <div class="logo">
            <a href="home.php"><img src="assets/images/logo.svg" alt="Realtime CVs"></a>
        </div>
        <div class="avigation">
            <nav>
                <ul>
                    <li class="fitstnav"><a href="javascript:void(0)"><?php echo  "Hello " . $_SESSION['fname']."!"; ?></a></li>
                    <li><a href="home.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <li><a href="profile.php">My profile</a></li>
                    <li><a href="resumetemplates.php">Resumes</a></li>
                    <li><a href="covertemplates.php">Cover Letters</a></li>
                    <li><a href="pricing.php">Pricing</a></li>
                    <li><a href="controller/logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
        <div class="clearfix"></div>
    </article>
</header>