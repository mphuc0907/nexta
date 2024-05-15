<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Nexta
 */

get_header();
?>

	<main class="main">
        <section class="page-404">
            <div class="container">
                <div class="row justify-content-around align-items-center">
                    <div class="col-md-5">
                        <div class="img">
                            <img src="<?= get_template_directory_uri() ?>/dist/images/404 nexta 1.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="des">
                            <div class="title">
                                <h2>Error 404!!!</h2>
                                <p>Không tìm thấy trang bạn yêu cầu.</p>
                            </div>
                            <div class="content">
                                <p>Vui lòng kiểm tra lại thông tin, hoặc liên hệ với Nexta
                                    để được giải đáp</p>

                                <a href="<?= home_url() ?>">Quay về trang chủ</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>

<?php
get_footer();
