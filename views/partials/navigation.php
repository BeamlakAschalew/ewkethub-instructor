<nav class="navbar-container">
    <div class="menu-wrapper">
        <div class="menu">
            <i class="bi menu-icon bi-list"></i>
        </div>
        <div class="logo">
            <a href="/">
                <div class="logo-img"></div>
            </a>
        </div>
    </div>

    <div class="main-navigation">
        <div class="nav-items">
            <ul class="site-navigation">
                <li <?= urlIs('/home') ? 'class="selected"' : '' ?>><a href="/home">Home</a></li>
                <li><a href="/home">My courses</a></li>
                <li <?= urlIs('/course/create') ? 'class="selected"' : '' ?>><a href="/course/create">Create a course</a></li>
            </ul>
        </div>

        <div class="nav-auth">
            <ul class="auth-navigation">
                <?php if (isset($_SESSION)): ?>
                    <?php if (isset($_SESSION['instructor']['profilePath']) && $_SESSION['instructor']['profilePath'] !== ""): ?>
                        <img src="<?= base_url() ?>uploads/images/profile_images/<?= $_SESSION['instructor']['profilePath'] ?>" class="profile-image" alt="Profile Image" />
                    <?php else: ?>
                        <img src="<?= base_url() ?>assets/images/user-avatar.png" class="profile-image" alt="Profile Image" />
                    <?php endif ?>
                <?php endif ?>
                <a href=""><?= $_SESSION['instructor']['username'] ?></a>
                <?php if (isset($_SESSION)): ?>
                    <form id="logout-form" method="POST" action="/logout">
                        <a href="#" class="logout" onclick="document.getElementById('logout-form').submit();">Log Out</a>
                    </form>
                <?php else: ?>
                    <li class="login">
                        <a href="/login">Login</a>
                    </li>
                    <li class="signup">
                        <a href="/signup">Signup</a>
                    </li>
                <?php endif ?>

            </ul>
        </div>
    </div>
</nav>