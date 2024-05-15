<?php include 'header.php'; ?>
<style>


body {
    background-color: #fff;
    font-family: 'Roboto', Arial, Helvetica, sans-serif;
    font-size: 14px;
    line-height: 1.4;
    font-weight: 400;
    color: #000000;
    padding-right: 0!important;
}

.container {
    width: 100%;
    max-width: 1230px;
    margin: 0 auto;
}


img {
    max-width: 100%;
}


ul, li{
    padding: 0;
    margin: 0;
    list-style-type: none;
}
p {
    font-size: 14px;
    line-height: 16px;
    margin: 0;
}


/*USE CSS for Slider*/

.vehicle-detail-banner .car-slider-desc {
    max-width: 180px;
    margin: 0 auto;
}
.banner-slider .slider.slider-for {
    max-width: 84%;
    padding-right: 35px;
}
.banner-slider .slider.slider-nav {
    max-width: 16%;
}
.banner-slider .slider.slider-for,
.banner-slider .slider.slider-nav {
    width: 100%;
    float: left;
}
.banner-slider .slider.slider-nav {
    height: 610px;
    overflow: hidden;

}
.slider-banner-image {
    height: 610px;
}
.banner-slider .slider.slider-nav {
    padding: 20px 0 0;
}
.slider-nav .slick-slide.thumbnail-image .thumbImg{
    max-width: 178px;
    height: 110px;
    margin: 0 auto;
    border: 1px solid #EBEBEB;
}
.slider-banner-image img,
.slider-nav .slick-slide.thumbnail-image .thumbImg img {
    height: 100%;
    width:100%;
    object-fit: cover;
}
.slick-vertical .slick-slide:active,
.slick-vertical .slick-slide:focus,
.slick-arrow:hover,
.slick-arrow:focus {
    border: 0;
    outline: 0;
}
.slider-nav .slick-slide.slick-current.thumbnail-image .thumbImg {
    border: 2px solid #196DB6;
}
.slider-nav .slick-slide.slick-current span {
    color: #196DB6;
}
.slider-nav .slick-slide {
    text-align: center;
}
.slider-nav .slick-slide span {
    font-size: 14px;
    display: block;
    padding: 5px 0 15px;
}
.slick-arrow {
    width: 100%;
    background-color: transparent;
    border: 0;
    background-position: center;
    background-repeat: no-repeat;
    font-size: 0;
    height: 18px;
    position: absolute;
    left: 0;
    right: 0;
    z-index: 99;
}
.slick-prev {
   top: 0;
}
.slick-next {
   bottom: 0;
   background-color: #fff;
}
.slick-prev.slick-arrow {
    background-image: url(../images/black-up-arrow.png);
}
.slick-next.slick-arrow {
    background-image: url(../images/black-down-arrow.png);
}
/*End USE CSS for Slider*/

@media screen and (max-width : 991px) {

	.banner-slider .slider.slider-for,
	.banner-slider .slider.slider-nav {
	    max-width: 100%;
	    float: none;
	}
	.banner-slider .slider.slider-for {
		padding-right: 0;
	}
	.banner-slider .slider.slider-nav {
		height: auto;
	}
	.slider-banner-image {
	    height: 500px;
	} 
	.slider.slider-nav.thumb-image {
        padding: 10px 30px 0;
	}
	.slider-nav .slick-slide span {
		padding: 5px 0;
	}
	.slick-arrow {
		padding: 0;
	    width: 30px;
	    height: 30px;
	    top: 50%;
	    bottom: 0;
	    -webkit-transform: translateY(-50%) rotate(-90deg);
	    -moz-transform: translateY(-50%) rotate(-90deg);
	    -ms-transform: translateY(-50%) rotate(-90deg);
	    transform: translateY(-50%) rotate(-90deg);
	}
	.slick-prev {
	    left: 0;
	    right: unset;
	}
	.slick-next {
	    left: unset;
	    right: 0;
   		background-color: transparent;
	}
	.vehicle-detail-banner .car-slider-desc {
    	max-width: 340px;
	}
	.bid-tag {
    	padding: 10px 0 15px;
	}
	.slider.slider-nav.thumb-image {
	   white-space: nowrap;
	}
	.thumbnail-image.slick-slide {
		padding: 0px 5px;
		min-width: 75px;
		display: inline-block;
		float: none;
	}
}

@media screen and (max-width : 767px) {
	.slider-banner-image {
	    height: 400px;
	}
	.slider.slider-nav.thumb-image {
    	padding: 0px 20px 0;
    	margin: 10px 0px 0;
	}
	.slider-nav .slick-slide.thumbnail-image .thumbImg {
		max-width: 140px;
		height: 80px;
	}
	.slick-prev.slick-arrow {
    	background-position: center 10px;
	}
	.slick-next.slick-arrow {
    	background-position: center 10px, center;
	}
	.slider-nav .slick-slide span {
	    font-size: 12px;
	    white-space: normal;
	}
}

@media screen and (max-width: 580px) {
	.slider-banner-image {
	    height:340px;
	}
}

@media screen and (max-width : 480px) {
	.slider-banner-image {
	    height:280px;
	}
}


</style>
<section class="banner-section">
    <div class="container">
        <div class="vehicle-detail-banner banner-content clearfix row">
            <div class="banner-slider col-8">
                <button class="prevButton"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.29289 14.0403C6.90237 13.6498 6.90237 13.0166 7.29289 12.6261L15.2929 4.62606C15.6834 4.23554 16.3166 4.23554 16.7071 4.62606L24.7071 12.6261C25.0976 13.0166 25.0976 13.6498 24.7071 14.0403C24.3166 14.4308 23.6834 14.4308 23.2929 14.0403L17 7.74738L17 26.6665C17 27.2188 16.5523 27.6665 16 27.6665C15.4477 27.6665 15 27.2188 15 26.6665L15 7.74738L8.70711 14.0403C8.31658 14.4308 7.68342 14.4308 7.29289 14.0403Z" fill="black" />
                    </svg></button>
                <div class="slider slider-nav thumb-image">
                    <div class="thumbnail-image">
                        <div class="thumbImg">
                            <img src="https://images.unsplash.com/photo-1570942872213-1242607a35eb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="slider-img">
                        </div>
                    </div>
                    <div class="thumbnail-image">
                        <div class="thumbImg">
                            <img src="https://images.unsplash.com/photo-1570171278960-d6c2b316f3b1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="slider-img">
                        </div>
                    </div>
                    <div class="thumbnail-image">
                        <div class="thumbImg">
                            <img src="https://images.unsplash.com/photo-1564376130023-5360fbb7c91b?ixlib=rb-1.2.1&auto=format&fit=crop&w=724&q=80" alt="slider-img">
                        </div>
                    </div>
                    <div class="thumbnail-image">
                        <div class="thumbImg">
                            <img src="https://images.unsplash.com/photo-1570942872213-1242607a35eb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="slider-img">
                        </div>
                    </div>
                    <div class="thumbnail-image">
                        <div class="thumbImg">
                            <img src="https://images.unsplash.com/photo-1570171278960-d6c2b316f3b1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="slider-img">
                        </div>
                    </div>
                    <div class="thumbnail-image">
                        <div class="thumbImg">
                            <img src="https://images.unsplash.com/photo-1564376130023-5360fbb7c91b?ixlib=rb-1.2.1&auto=format&fit=crop&w=724&q=80" alt="slider-img">
                        </div>
                    </div>
                    <div class="thumbnail-image">
                        <div class="thumbImg">
                            <img src="https://images.unsplash.com/photo-1570942872213-1242607a35eb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="slider-img">
                        </div>
                    </div>
                    <div class="thumbnail-image">
                        <div class="thumbImg">
                            <img src="https://images.unsplash.com/photo-1570171278960-d6c2b316f3b1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="slider-img">
                        </div>
                    </div>
                    <div class="thumbnail-image">
                        <div class="thumbImg">
                            <img src="https://images.unsplash.com/photo-1564376130023-5360fbb7c91b?ixlib=rb-1.2.1&auto=format&fit=crop&w=724&q=80" alt="slider-img">
                        </div>
                    </div>

                </div>
                <button class="nextButton">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M24.7071 17.9595C25.0976 18.35 25.0976 18.9832 24.7071 19.3737L16.7071 27.3737C16.3166 27.7642 15.6834 27.7642 15.2929 27.3737L7.2929 19.3737C6.90237 18.9832 6.90237 18.35 7.2929 17.9595C7.68342 17.569 8.31659 17.569 8.70711 17.9595L15 24.2524L15 5.33325C15 4.78097 15.4477 4.33325 16 4.33325C16.5523 4.33325 17 4.78097 17 5.33325L17 24.2524L23.2929 17.9595C23.6834 17.569 24.3166 17.569 24.7071 17.9595Z" fill="black" />
                    </svg>
                </button>
                <div class="slider slider-for">
                    <div class="slider-banner-image">
                        <img src="https://images.unsplash.com/photo-1570942872213-1242607a35eb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Car-Image">
                    </div>
                    <div class="slider-banner-image">
                        <img src="https://images.unsplash.com/photo-1570171278960-d6c2b316f3b1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="Car-Image">
                    </div>
                    <div class="slider-banner-image">
                        <img src="https://images.unsplash.com/photo-1564376130023-5360fbb7c91b?ixlib=rb-1.2.1&auto=format&fit=crop&w=724&q=80" alt="Car-Image">
                    </div>
                    <div class="slider-banner-image">
                        <img src="https://images.unsplash.com/photo-1570942872213-1242607a35eb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Car-Image">
                    </div>
                    <div class="slider-banner-image">
                        <img src="https://images.unsplash.com/photo-1570171278960-d6c2b316f3b1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="Car-Image">
                    </div>
                    <div class="slider-banner-image">
                        <img src="https://images.unsplash.com/photo-1564376130023-5360fbb7c91b?ixlib=rb-1.2.1&auto=format&fit=crop&w=724&q=80" alt="Car-Image">
                    </div>
                    <div class="slider-banner-image">
                        <img src="https://images.unsplash.com/photo-1570942872213-1242607a35eb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Car-Image">
                    </div>
                    <div class="slider-banner-image">
                        <img src="https://images.unsplash.com/photo-1570171278960-d6c2b316f3b1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="Car-Image">
                    </div>
                    <div class="slider-banner-image">
                        <img src="https://images.unsplash.com/photo-1564376130023-5360fbb7c91b?ixlib=rb-1.2.1&auto=format&fit=crop&w=724&q=80" alt="Car-Image">
                    </div>
                </div>
            </div>
            <div class="col-4">
     
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
<script>
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        vertical: true,
        asNavFor: '.slider-for',
        dots: false,
        focusOnSelect: true,
        verticalSwiping: true,
        responsive: [{
                breakpoint: 992,
                settings: {
                    vertical: false,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    vertical: false,
                }
            },
            {
                breakpoint: 580,
                settings: {
                    vertical: false,
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 380,
                settings: {
                    vertical: false,
                    slidesToShow: 2,
                }
            }
        ]

    });
    $('.prevButton').click(function() {
        $('.slider-nav').slick('slickPrev');
    });
    $('.nextButton').click(function() {
        $('.slider-nav').slick('slickNext');
    });
</script>