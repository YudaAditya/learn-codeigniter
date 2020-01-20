
<?php $this->load->view("_layouts/_header.php"); ?>

<body>
    <?php $this->load->view("_layouts/_navbar.php"); ?>

    <div class="hero-wrap js-fullheight" style="background-image: url('<?php echo base_url('theme/readit/images/bg_2.jpg') ?>');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
                <div class="col-md-12 ftco-animate">
                    <h2 class="subheading">Hello! Welcome to</h2>
                    <h1 class="mb-4 mb-md-0">Hompage.</h1>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="text">
                                <p>perjalanan panjang menuju sebuah artikel medium dapat menjadi konten yang baik dalam penjelasan dan menjadi saksi</p>
                                <div class="mouse">
                                    <a href="#" class="mouse-icon">
                                        <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="float">
        <a href="<?php echo site_url('artikel/add') ?>" class="float">
            <i class="fa fa-plus my-float"></i>
        </a>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php foreach ($artikels as $artikel) : ?>
                        <div class="case">
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-xl-8 d-flex">
                                    <a href="blog-single.html" class="img w-100 mb-3 mb-md-0" style="background-image: url('<?php echo base_url('theme/readit/images/image_1.jpg') ?>');"></a>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-4 d-flex">
                                    <span class="text w-100 pl-md-3">
                                        <!-- <span class="subheading"></span> -->
                                        <h2><a href="blog-single.html"><?php echo $artikel->judul ?></a></h2>
                                        <ul class="media-social list-unstyled">
                                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                                        </ul>
                                        <p><?php echo $artikel->artikel ?></p>
                                        <div class="meta">
                                            <p class="mb-0"><a href="#"><?php echo $artikel->tanggal ?></a> | <a href="#">12 min read</a></p>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            <li><a href="#">&lt;</a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&gt;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
    </section>


    <?php $this->load->view("_layouts/_footer.php"); ?>

</body>

<?php $this->load->view("_layouts/_js.php"); ?>

</html>