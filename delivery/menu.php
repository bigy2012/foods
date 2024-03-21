<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">ระบบสั่งจองอาหารออนไลน์</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mylink"
            aria-controls="mylink">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mylink">
            <ul class="navbar-nav me-auto position-absolute end-0">
                <li class="nav-item">
                    <p class="nav-link disabled">สำหรับผู้ส่งอาหาร</p>
                </li>
                <li class="nav-item">
                    <p class="nav-link"> ผู้ใช้งาน :
                        <a href="profile.php">
                            <?php echo $_SESSION['fname'] . " " . $_SESSION['lname'];  ?>
                        </a>
                    </p>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">ออกจากระบบ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>