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
                <li class="selected"><a href="/home">Home</a></li>
                <li><a href="/home">My courses</a></li>
                <li><a href="/course/create">Create a course</a></li>
            </ul>
        </div>

        <div class="nav-auth">
            <ul class="auth-navigation">
                <img src="<?= base_url() ?>public/uploads/images/profile_images/<?= $_SESSION['instructor']['profilePath'] ?>" class="profile-image" alt="Profile Image" />
                <img src="" alt="" srcset="">
                <a href=""><?= $_SESSION['instructor']['username'] ?></a>
                <?php if (isset($_SESSION)): ?>
                    <form method="POST" action="/session">
                        <input type="hidden" name="_method" value="DELETE" />

                        <button class="text-white">Log Out</button>
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