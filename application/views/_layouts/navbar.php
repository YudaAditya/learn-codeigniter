<nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="<?php echo base_url() ?>">Home<i>page</i>.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php echo $this->uri->segment(1) == '' ? 'active' : '' ?>"><a href="<?php echo site_url() ?>" class="nav-link">Home</a></li>
                <li class="nav-item <?php echo $this->uri->segment(1) == 'about' ? 'active' : '' ?>"><a href="<?php echo site_url('about') ?>" class="nav-link">About</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->