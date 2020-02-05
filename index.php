
<?php
//error_log("test", 0);
include("./includes/topnav.php");
//ini_set("error_log", "~/php_errors.log");
$_SESSION['document_root'] = __DIR__;

?>

<div class="container" style="width: 90%; max-width: 900px">

    <br>

    <!-- header-->
    <section
            style="position: relative; text-align: center; width: 100%; border: ">
        <h2> Health Big Data Intiative - HBDIe</h2>
        <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
            tempor. </h4>
    </section>


    <br><br>

    <!-- features and video -->
    <div style="position: relative; border: ">

        <!-- features -->
        <!-- feature: Files -->
        <section>
            <div class="grid" style="margin-bottom: 10px">
                <div class="feature-logo">
                    <li class="fas fa-database"></li>
                </div>
                <div class="feature-desc">
                    <h3><a id="files"></a> Research Data Management </h3>
                    <p>Quisque ligula risus, ultrices a leo non, mattis pharetra dui. Nullam dictum malesuada mauris, malesuada maximus justo cursus sed. In et tempus turpis.
                    </p>
                </div>
            </div>

            <!-- feature: Projects-->
            <div>
                <div class="grid" style="margin-bottom: 10px">
                    <div class="feature-logo">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <div class="feature-desc">
                        <h3><a id="projects"></a> Reseach Project Management </h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fringilla molestie eros ut mollis. Praesent magna nisi, aliquam sit amet efficitur vel, mattis ut risus.
                        </p>
                    </div>
                </div>

                <!-- feature: Search -->
                <div class="grid" style="margin-bottom: 10px">
                    <div class="feature-logo">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="feature-desc">
                        <h3 id="search">Search</h3>
                        <p>Maecenas cursus urna vitae convallis lobortis. Sed faucibus eros ut velit faucibus, et varius lectus ornare. Donec sed fringilla eros.
                        </p>
                    </div>
                </div>

                <!-- feature: Support -->
                <div class="grid" style="margin-bottom: 10px">
                    <div class="feature-logo">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <div class="feature-desc">
                        <h3 id="support">Support</h3>
                        <p>Morbi sagittis diam bibendum, convallis nunc sit amet, auctor est. Nam auctor ac est sed fringilla. Morbi et rhoncus elit. Donec ornare feugiat congue.
                        </p>
                    </div>
                </div>
            </div>
            <!-- end of features -->

            <!-- video -->
            <div id="grid">
                <div class="feature-logo">
                    <!--                <i class="fas fa-question-circle"></i>-->
                </div>
                <div class="feature-desc" style="padding-top: 35px">
                    <iframe allowfullscreen frameborder="0"
                            height="315"
                            id="video"
                            src="https://www.youtube-nocookie.com/embed/y8Yv4pnO7qc?rel=0&amp;controls=0&amp;showinfo=0"></iframe>
                </div>
            </div>
            <!--  end of Video  -->
    </div>
    <!-- end of Features & Video   -->
</div>
<!-- end of container -->
<?php include_once("./includes/footer.php"); ?>

