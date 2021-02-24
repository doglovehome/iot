<nav class="navbar navbar-expand-lg navbar-light px-3">
    <div class="container-fluid">
        <a id="sidebarCollapse" href="#" class="navbar-brand"><i class="fas fa-bars"></i></a>
        <ul class="d-flex align-items-center m-0">
            <li>
                <a href="setting.php">
                    <span class="sub-noti"></span><i class="fas fa-bell"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
                    <i class="fas fa-user-cog"></i><span class="sub-user"><?php echo $_SESSION["username"] ?></span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="setting.php"><i class="fas fa-cog"></i> Setting</a></li>
                    <li><a class="dropdown-item" href="../login.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            </li> 
        </ul>
    </div>
</nav>