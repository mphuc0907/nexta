<footer class="footer">
    <div class="footer-wrapper"
         style="background-image: url('<?= get_template_directory_uri() ?>/dist/images/bg-footer.png');">
        <div class="container">
            <div class="content">
                <div class="footer-top">
                    <div class="footer-col">
                        <?php if (get_field('logo_footer', 'option')): ?>
                        <div class="f-logo">
                            <a href="<?= home_url() ?>">
                                <figure>
                                    <img src="<?= getimage2(get_field('logo_footer', 'option')) ?>" alt="">
                                </figure>
                            </a>
                        </div>
                        <?php endif; ?>
                        <div class="f-text">
<!--                            <p>-->
<!--                                --><?php //= get_field('company_name', 'option') ?>
<!--                            </p>-->
<!--                            <p>Giấp phép đăng ký kinh doanh số: --><?php //= get_field('number_cer', 'option') ?><!--</p>-->
<!--                            <p>Cấp ngày: --><?php //= get_field('ngay_cap', 'option') ?><!--</p>-->
                            <?= get_field('info_footer', 'option') ?>
                        </div>
                    </div>
                    <div class="footer-col">
                        <h3>Liên hệ</h3>
                        <ul class="f-contact">
                            <?php
                            $mail = get_field('mail', 'option');
                            $sdt = get_field('sdt', 'option');
                            $location = get_field('location', 'option');
                            if ($mail) {
                                $icon_mail = $mail['icon'];
                                $title_mail = $mail['title'];
                                $content_mail = $mail['content'];
                            }
                            if ($sdt) {
                                $icon_sdt = $sdt['icon'];
                                $title_sdt = $sdt['title'];
                                $content_sdt = $sdt['content'];
                            }
                            if ($location) {
                                $icon_location = $location['icon'];
                                $title_location = $location['title'];
                                $content_location = $location['content'];
                            }


                            ?>
                            <li>
                                <a href="mailto:<?= $mail ?>">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path d="M12.75 2.625H5.25C3 2.625 1.5 3.75 1.5 6.375V11.625C1.5 14.25 3 15.375 5.25 15.375H12.75C15 15.375 16.5 14.25 16.5 11.625V6.375C16.5 3.75 15 2.625 12.75 2.625ZM13.1025 7.1925L10.755 9.0675C10.26 9.465 9.63 9.66 9 9.66C8.37 9.66 7.7325 9.465 7.245 9.0675L4.8975 7.1925C4.6575 6.9975 4.62 6.6375 4.8075 6.3975C5.0025 6.1575 5.355 6.1125 5.595 6.3075L7.9425 8.1825C8.5125 8.64 9.48 8.64 10.05 8.1825L12.3975 6.3075C12.6375 6.1125 12.9975 6.15 13.185 6.3975C13.38 6.6375 13.3425 6.9975 13.1025 7.1925Z" fill="white"/>
                                        </svg>
                                    </div>
                                    <div class="desc">
                                        <span>
                                            <?= $title_mail ?>
                                        </span>
                                        <p>
                                            <?= $content_mail ?>
                                        </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="tel:<?= $sdt ?>">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path d="M13.215 8.0627C12.8925 8.0627 12.6375 7.80019 12.6375 7.48519C12.6375 7.20769 12.36 6.6302 11.895 6.1277C11.4375 5.6402 10.935 5.3552 10.515 5.3552C10.1925 5.3552 9.9375 5.0927 9.9375 4.7777C9.9375 4.4627 10.2 4.2002 10.515 4.2002C11.265 4.2002 12.0525 4.6052 12.7425 5.3327C13.3875 6.0152 13.8 6.8627 13.8 7.4777C13.8 7.8002 13.5375 8.0627 13.215 8.0627Z" fill="white"/>
                                            <path d="M15.9223 8.0625C15.5998 8.0625 15.3448 7.8 15.3448 7.485C15.3448 4.8225 13.1773 2.6625 10.5223 2.6625C10.1998 2.6625 9.94482 2.4 9.94482 2.085C9.94482 1.77 10.1998 1.5 10.5148 1.5C13.8148 1.5 16.4998 4.185 16.4998 7.485C16.4998 7.8 16.2373 8.0625 15.9223 8.0625Z" fill="white"/>
                                            <path d="M8.2875 11.2125L6.9 12.6C6.6075 12.8925 6.1425 12.8925 5.8425 12.6075C5.76 12.525 5.6775 12.45 5.595 12.3675C4.8225 11.5875 4.125 10.77 3.5025 9.915C2.8875 9.06 2.3925 8.205 2.0325 7.3575C1.68 6.5025 1.5 5.685 1.5 4.905C1.5 4.395 1.59 3.9075 1.77 3.4575C1.95 3 2.235 2.58 2.6325 2.205C3.1125 1.7325 3.6375 1.5 4.1925 1.5C4.4025 1.5 4.6125 1.545 4.8 1.635C4.995 1.725 5.1675 1.86 5.3025 2.055L7.0425 4.5075C7.1775 4.695 7.275 4.8675 7.3425 5.0325C7.41 5.19 7.4475 5.3475 7.4475 5.49C7.4475 5.67 7.395 5.85 7.29 6.0225C7.1925 6.195 7.05 6.375 6.87 6.555L6.3 7.1475C6.2175 7.23 6.18 7.3275 6.18 7.4475C6.18 7.5075 6.1875 7.56 6.2025 7.62C6.225 7.68 6.2475 7.725 6.2625 7.77C6.3975 8.0175 6.63 8.34 6.96 8.73C7.2975 9.12 7.6575 9.5175 8.0475 9.915C8.1225 9.99 8.205 10.065 8.28 10.14C8.58 10.4325 8.5875 10.9125 8.2875 11.2125Z" fill="white"/>
                                            <path d="M16.4777 13.7473C16.4777 13.9573 16.4402 14.1748 16.3652 14.3848C16.3427 14.4448 16.3202 14.5048 16.2902 14.5648C16.1627 14.8348 15.9977 15.0898 15.7802 15.3298C15.4127 15.7348 15.0077 16.0273 14.5502 16.2148C14.5427 16.2148 14.5352 16.2223 14.5277 16.2223C14.0852 16.4023 13.6052 16.4998 13.0877 16.4998C12.3227 16.4998 11.5052 16.3198 10.6427 15.9523C9.78019 15.5848 8.9177 15.0898 8.0627 14.4673C7.7702 14.2498 7.4777 14.0323 7.2002 13.7998L9.65269 11.3473C9.86269 11.5048 10.0502 11.6248 10.2077 11.7073C10.2452 11.7223 10.2902 11.7448 10.3427 11.7673C10.4027 11.7898 10.4627 11.7973 10.5302 11.7973C10.6577 11.7973 10.7552 11.7523 10.8377 11.6698L11.4077 11.1073C11.5952 10.9198 11.7752 10.7773 11.9477 10.6873C12.1202 10.5823 12.2927 10.5298 12.4802 10.5298C12.6227 10.5298 12.7727 10.5598 12.9377 10.6273C13.1027 10.6948 13.2752 10.7923 13.4627 10.9198L15.9452 12.6823C16.1402 12.8173 16.2752 12.9748 16.3577 13.1623C16.4327 13.3498 16.4777 13.5373 16.4777 13.7473Z" fill="white"/>
                                        </svg>
                                    </div>
                                    <div class="desc">
                                        <span>
                                            <?= $title_sdt ?>
                                        </span>
                                        <p>
                                            <?= $content_sdt ?>
                                        </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:<?= $location ?>">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path d="M15.4648 6.3375C14.6773 2.8725 11.6548 1.3125 8.99983 1.3125C8.99983 1.3125 8.99983 1.3125 8.99233 1.3125C6.34483 1.3125 3.31483 2.865 2.52733 6.33C1.64983 10.2 4.01983 13.4775 6.16483 15.54C6.95983 16.305 7.97983 16.6875 8.99983 16.6875C10.0198 16.6875 11.0398 16.305 11.8273 15.54C13.9723 13.4775 16.3423 10.2075 15.4648 6.3375ZM8.99983 10.095C7.69483 10.095 6.63733 9.0375 6.63733 7.7325C6.63733 6.4275 7.69483 5.37 8.99983 5.37C10.3048 5.37 11.3623 6.4275 11.3623 7.7325C11.3623 9.0375 10.3048 10.095 8.99983 10.095Z" fill="white"/>
                                        </svg>
                                    </div>
                                    <div class="desc">
                                        <span>
                                            <?= $title_location ?>
                                        </span>
                                        <p>
                                            <?= $content_location ?>
                                        </p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h3>Mạng xã hội</h3>
                        <ul class="f-social">
                            <?php
                                $socials = get_field('social', 'option');
                                $policy = get_field('policy', 'option');

                            ?>
                            <?php foreach ($socials as $social): ?>
                                <li>
                                    <a href="<?= $social['url'] ?>">
                                       <?= $social['icon'] ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                        <?php if (get_field('img_footer', 'option')): ?>
                        <div class="check">
                            <a href="#">
                                <figure>
                                    <img src="<?= getimage2(get_field('img_footer', 'option')) ?>" alt="">
                                </figure>
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="bottom-left">
                        <p>
                            <?= get_field('copyright', 'option') ?>
                        </p>
                    </div>
                    <div class="bottom-right">
                        <ul>
                            <?php foreach ($policy as $item): ?>
                                <li><a href="<?= $item['url'] ?>"><?= $item['title'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php
$contact_social = get_field('contact_social','option');
?>
<div class="fixed-bnt">
    <ul>
        <li>
            <a target="_blank" href="<?= $contact_social['link_messenger'] ?>">
                <img src="<?= get_template_directory_uri() ?>/dist/images/svg-mess.svg" alt="" style="height: 30px;width: 30px;">
            </a>
        </li>
        <li>
            <a href="tel:<?= $contact_social['phone_number_d'] ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                    <path d="M15.9594 11.1607C16.7232 11.1607 17.4558 11.4641 17.9959 12.0043C18.536 12.5444 18.8394 13.2769 18.8394 14.0407C18.8394 14.2953 18.9405 14.5395 19.1206 14.7195C19.3006 14.8996 19.5448 15.0007 19.7994 15.0007C20.054 15.0007 20.2982 14.8996 20.4782 14.7195C20.6582 14.5395 20.7594 14.2953 20.7594 14.0407C20.7594 12.7677 20.2537 11.5468 19.3535 10.6466C18.4533 9.74644 17.2324 9.24072 15.9594 9.24072C15.7048 9.24072 15.4606 9.34187 15.2806 9.5219C15.1005 9.70194 14.9994 9.94611 14.9994 10.2007C14.9994 10.4553 15.1005 10.6995 15.2806 10.8795C15.4606 11.0596 15.7048 11.1607 15.9594 11.1607Z"
                          fill="#07BD6B"/>
                    <path d="M15.9598 7.32088C17.742 7.32088 19.4513 8.02888 20.7115 9.28912C21.9718 10.5494 22.6798 12.2586 22.6798 14.0409C22.6798 14.2955 22.7809 14.5397 22.961 14.7197C23.141 14.8997 23.3852 15.0009 23.6398 15.0009C23.8944 15.0009 24.1386 14.8997 24.3186 14.7197C24.4986 14.5397 24.5998 14.2955 24.5998 14.0409C24.5998 11.7494 23.6895 9.55179 22.0692 7.93148C20.4489 6.31116 18.2512 5.40088 15.9598 5.40088C15.7052 5.40088 15.461 5.50202 15.281 5.68206C15.1009 5.86209 14.9998 6.10627 14.9998 6.36088C14.9998 6.61549 15.1009 6.85967 15.281 7.0397C15.461 7.21974 15.7052 7.32088 15.9598 7.32088ZM24.3598 18.7545C24.307 18.6004 24.2158 18.4622 24.0949 18.3531C23.974 18.2439 23.8273 18.1673 23.6686 18.1305L17.9086 16.8153C17.7522 16.7798 17.5895 16.7841 17.4352 16.8277C17.2809 16.8713 17.14 16.9528 17.0254 17.0649C16.891 17.1897 16.8814 17.1993 16.2574 18.3897C14.1868 17.4356 12.5278 15.7697 11.5822 13.6953C12.8014 13.0809 12.811 13.0809 12.9358 12.9369C13.0478 12.8222 13.1294 12.6813 13.173 12.527C13.2166 12.3728 13.2208 12.21 13.1854 12.0537L11.8702 6.36088C11.8334 6.20219 11.7568 6.05547 11.6476 5.93455C11.5384 5.81363 11.4003 5.72248 11.2462 5.66968C11.022 5.5896 10.7905 5.53173 10.555 5.49688C10.3123 5.44062 10.0647 5.40846 9.81578 5.40088C8.64458 5.40088 7.52136 5.86613 6.6932 6.6943C5.86504 7.52246 5.39978 8.64568 5.39978 9.81688C5.40486 13.7363 6.96409 17.4937 9.73552 20.2651C12.507 23.0366 16.2644 24.5958 20.1838 24.6009C20.7637 24.6009 21.3379 24.4867 21.8737 24.2647C22.4095 24.0428 22.8963 23.7175 23.3064 23.3075C23.7164 22.8974 24.0417 22.4106 24.2636 21.8748C24.4856 21.339 24.5998 20.7648 24.5998 20.1849C24.6001 19.9405 24.5808 19.6966 24.5422 19.4553C24.5018 19.2168 24.4408 18.9823 24.3598 18.7545Z"
                          fill="#07BD6B"/>
                </svg>
            </a>
        </li>
        <li>
            <a target="_blank" href="<?= $contact_social['link_file_dowload'] ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                    <path d="M20.2375 2.5H9.7625C5.2125 2.5 2.5 5.2125 2.5 9.7625V20.225C2.5 24.7875 5.2125 27.5 9.7625 27.5H20.225C24.775 27.5 27.4875 24.7875 27.4875 20.2375V9.7625C27.5 5.2125 24.7875 2.5 20.2375 2.5ZM10.5875 13.725C10.95 13.3625 11.55 13.3625 11.9125 13.725L14.0625 15.875V8.1375C14.0625 7.625 14.4875 7.2 15 7.2C15.5125 7.2 15.9375 7.625 15.9375 8.1375V15.875L18.0875 13.725C18.45 13.3625 19.05 13.3625 19.4125 13.725C19.775 14.0875 19.775 14.6875 19.4125 15.05L15.6625 18.8C15.575 18.8875 15.475 18.95 15.3625 19C15.25 19.05 15.125 19.075 15 19.075C14.875 19.075 14.7625 19.05 14.6375 19C14.525 18.95 14.425 18.8875 14.3375 18.8L10.5875 15.05C10.225 14.6875 10.225 14.1 10.5875 13.725ZM22.8 21.525C20.2875 22.3625 17.65 22.7875 15 22.7875C12.35 22.7875 9.7125 22.3625 7.2 21.525C6.7125 21.3625 6.45 20.825 6.6125 20.3375C6.775 19.85 7.3 19.575 7.8 19.75C12.45 21.3 17.5625 21.3 22.2125 19.75C22.7 19.5875 23.2375 19.85 23.4 20.3375C23.55 20.8375 23.2875 21.3625 22.8 21.525Z"
                          fill="#08ACEE"/>
                </svg>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" class="backtotop">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                    <path d="M15 0.600098C7.05118 0.600098 0.599976 7.0513 0.599976 15.0001C0.599976 22.9489 7.05118 29.4001 15 29.4001C22.9488 29.4001 29.4 22.9489 29.4 15.0001C29.4 7.0513 22.9488 0.600098 15 0.600098ZM20.0832 15.0433C19.8672 15.2593 19.5936 15.3601 19.32 15.3601C19.0464 15.3601 18.7728 15.2593 18.5568 15.0433L16.08 12.5665V20.0401C16.08 20.6305 15.5904 21.1201 15 21.1201C14.4096 21.1201 13.92 20.6305 13.92 20.0401V12.5665L11.4432 15.0433C11.0256 15.4609 10.3344 15.4609 9.91678 15.0433C9.49918 14.6257 9.49918 13.9345 9.91678 13.5169L14.2368 9.1969C14.6544 8.7793 15.3456 8.7793 15.7632 9.1969L20.0832 13.5169C20.5008 13.9345 20.5008 14.6257 20.0832 15.0433Z"
                          fill="#2D55A5"/>
                </svg>
            </a>
        </li>
    </ul>
</div>
<script type="text/javascript" src="<?= get_template_directory_uri() ?>/dist/lib/jquery/jquery.min.js"></script>
<script type="text/javascript"
        src="<?= get_template_directory_uri() ?>/dist/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/additional-methods.min.js" integrity="sha512-TiQST7x/0aMjgVTcep29gi+q5Lk5gVTUPE9XgN0g96rwtjEjLpod4mlBRKWHeBcvGBAEvJBmfDqh2hfMMmg+5A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    
<script type="text/javascript" src="<?= get_template_directory_uri() ?>/dist/lib/swiper/swiper-bundle.min.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri() ?>/dist/lib/slick/slick.min.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri() ?>/dist/js/flickity.pkgd.min.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri() ?>/dist/js/wow.min.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri() ?>/dist/js/aos.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri() ?>/dist/js/custom.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri() ?>/dist/js/phuc.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri() ?>/dist/js/quyenanh-edit.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
        integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<!--<script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWWgSW8tvSWDFEo_xwAQjQBu6YYkPfVNo&callback=initMap" type="text/javascript"></script>-->

</body>
<?php wp_footer(); ?>
<script>

    AOS.init();
    new WOW().init();
</script>
<script>
    loadQtyCart();
    loadCart();
    eventAddCart();
</script>
</html>
