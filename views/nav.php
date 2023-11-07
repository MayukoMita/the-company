<div class="navbar navbar-expand md navbar-dark bg-dark">
    <a href="Dashboard.php" class="navbar-brand ms-4">
        <h1 class="h5">The Company</h1>
    </a>

    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a href="profile.php" class="nav-link"><?= $_SESSION['username']?></a>
        </li>
        <li class="nav-item">
            <a href="../actions/logout.php" class="nav-link text-danger">Log out</a>
        </li>
    </ul>
</div>