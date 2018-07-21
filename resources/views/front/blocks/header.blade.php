<header>
    <div class="nav-container">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light justify-content-between">
                <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-expanded="false">
                    <span class="btn_nav_list">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                    <span class="title-btn">MENU</span>
                </button>
                <a class="navbar-brand" href="{{ route('index') }}">
                    <img src="/images/LOGO_AFDB.png" alt="">
                </a>
                <?php echo menu('top','front/menu/top'); ?>
            </nav>
        </div>
    </div>
    @yield('extra-header')
</header>