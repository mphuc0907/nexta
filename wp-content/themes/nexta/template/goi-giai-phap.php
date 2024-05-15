<?php
/* Template Name: Gói giải pháp */
get_header();

$re_pack = get_field('re_pack');
?>
    <main class="main">
        <section class="banner-page">
            <div class="bg-video">
                <?php if (get_field('img_banner')): ?>
                <img src="<?= getimage(get_field('img_banner'))?>" alt="">
                <?php endif; ?>
                <div class="content-main">
                    <div class="title">
                        <h3>
                            <?= get_field('title_banner') ?>
                        </h3>
                    </div>
                    <div class="des">
                            <?= get_field('desc') ?>

                    </div>
                </div>
            </div>

        </section>
        <section class="section-2 section" id="truot">
            <div class="container">
                <div class="package">
                    <div class="row">
                        <?php foreach ($re_pack as $pack): ?>
                        <div class="col-xl-4 col-md-6">
                            <div class="package-item">
                                <div class="content-title">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M12 1.25C6.06294 1.25 1.25 6.06294 1.25 12C1.25 17.9371 6.06294 22.75 12 22.75C17.9371 22.75 22.75 17.9371 22.75 12C22.75 6.06294 17.9371 1.25 12 1.25ZM2.75 12C2.75 9.71567 3.57804 7.62475 4.95034 6.011L8.1528 9.21346C7.58488 9.99619 7.25 10.959 7.25 12C7.25 13.041 7.58488 14.0038 8.1528 14.7865L4.95033 17.989C3.57804 16.3753 2.75 14.2843 2.75 12ZM9.21346 8.1528L6.011 4.95034C7.62475 3.57804 9.71567 2.75 12 2.75C14.2843 2.75 16.3753 3.57804 17.989 4.95034L14.7865 8.1528C14.0038 7.58488 13.041 7.25 12 7.25C10.959 7.25 9.99619 7.58488 9.21346 8.1528ZM6.01099 19.0497C7.62474 20.422 9.71567 21.25 12 21.25C14.2843 21.25 16.3753 20.422 17.989 19.0497L14.7865 15.8472C14.0038 16.4151 13.041 16.75 12 16.75C10.959 16.75 9.99619 16.4151 9.21346 15.8472L6.01099 19.0497ZM15.8472 14.7865L19.0497 17.989C20.422 16.3753 21.25 14.2843 21.25 12C21.25 9.71567 20.422 7.62475 19.0497 6.011L15.8472 9.21346C16.4151 9.99619 16.75 10.959 16.75 12C16.75 13.041 16.4151 14.0038 15.8472 14.7865ZM8.75 12C8.75 10.2051 10.2051 8.75 12 8.75C13.7949 8.75 15.25 10.2051 15.25 12C15.25 13.7949 13.7949 15.25 12 15.25C10.2051 15.25 8.75 13.7949 8.75 12Z"
                                                  fill="white"/>
                                        </svg>
                                    </div>
                                    <div class="title">
                                        <h3>
                                            <?= $pack['title'] ?>
                                        </h3>

                                            <?= $pack['desc'] ?>

                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="list-content">
                                    <ul>
                                        <?php foreach ($pack['re_interest'] as $list): ?>
                                        <li>
                                            <span>
                                                <img src="<?= get_template_directory_uri()?>/dist/images/Check.svg" alt="">
                                            </span>

                                                <?= $list['desc'] ?>

                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <div class="content">
                                    <button class="btn-chose" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Chọn gói</button>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </section>
        <section class="section-3 section section-last">
            <div class="container">
                <div class="table-content">
                    <div class="title">
                        <h3>
                            <?= get_field('title_compare') ?>
                        </h3>
                    </div>
                    <div class="compare">
                        <?= get_field('table') ?>
                    </div>
                </div>

            </div>
        </section>
    </main>
    <div class="modal fade modal-form" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
         tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="form">
                    <div class="title">
                        <h3>Đăng ký gói</h3>
                                                <p>Lớp học chuyển đổi số</p>
                    </div>
                    <form action="">
                        <div class="div">
                            <div class="form-popup">
                                <div class="input-gr">
                                    <label for="">Họ và tên<span>*</span></label>
                                    <input type="text" placeholder="Nhập tên của bạn">
                                </div>
                                <div class="input-gr">
                                    <label for="">Email<span>*</span></label>
                                    <input type="email" placeholder="Nhập email của bạn">
                                </div>
                                <div class="input-gr">
                                    <label for="">Số điện thoại<span>*</span></label>
                                    <input type="tel" placeholder="Nhập số điện thoại của bạn">
                                </div>
                                <div class="input-gr">
                                    <label for="">Địa chỉ<span>*</span></label>
                                    <input type="text" placeholder="Nhập địa chỉ của bạn">
                                </div>
                                <div class="input-gr">
                                    <label for="">Ghi chú</label>
                                    <input type="text" placeholder="Nhập lời nhắn của bạn">
                                </div>
                            </div>
                            <div class="btn">
                                <button type="submit">
                                    Đăng ký
                                </button>
                            </div>

                        </div>

                    </form>
                </div>

            </div>
        </div>
        <div class="modal fade modal-form" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
             tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="form">
                        <div class="title">
                            <h3>Trải nghiệm 7 ngày miễn phí
                                gói Siêu ứng dụng</h3>
                            <!--                        <p>Lớp học chuyển đổi số cơ bản</p>-->
                        </div>
                        <form action="">
                            <div class="div">
                                <div class="form-popup">
                                    <div class="input-gr">
                                        <label for="">Họ và tên<span>*</span></label>
                                        <input type="text" placeholder="Nhập tên của bạn">
                                    </div>
                                    <div class="input-gr">
                                        <label for="">Email<span>*</span></label>
                                        <input type="email" placeholder="Nhập email của bạn">
                                    </div>
                                    <div class="input-gr">
                                        <label for="">Số điện thoại<span>*</span></label>
                                        <input type="tel" placeholder="Nhập số điện thoại của bạn">
                                    </div>
                                    <div class="input-gr">
                                        <label for="">Địa chỉ<span>*</span></label>
                                        <input type="text" placeholder="Nhập địa chỉ của bạn">
                                    </div>
                                    <div class="input-gr">
                                        <label for="">Ghi chú</label>
                                        <input type="text" placeholder="Nhập lời nhắn của bạn">
                                    </div>
                                </div>
                                <div class="btn">
                                    <button type="submit">
                                        Đăng ký
                                    </button>
                                </div>

                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
<?php
    get_footer();
?>