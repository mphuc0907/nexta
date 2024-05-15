(function ($) {
  window.onload = function () {
    $(document).ready(function () {
      sliderPage();
      Sticky();
      Openmenu();
      Backtop();
      animateAOS();
    });
  };
})(jQuery);

function sliderPage() {
  var sys1Swiper = new Swiper(".sys1Swiper", {
    spaceBetween: 0,
    slidesPerView: 1,
    grabCursor: true,
    loop: !0,
    loopedSlides: 6,
    observer: !0,
    observeParents: !0,
    autoplay: {
      delay: 1000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
  var sys2Swiper = new Swiper(".sys2Swiper", {
    spaceBetween: 20,
    slidesPerView: 3,
    autoplay: {
      delay: 1000,
      disableOnInteraction: false,
    },
    controller: {
      control: sys1Swiper,
    },
    loop: !0,
    loopedSlides: 6,
    slideToClickedSlide: !0,
    observer: !0,
    observeParents: !0,
  });
  sys1Swiper.controller.control = sys2Swiper;
  sys2Swiper.controller.control = sys1Swiper;

  if ($(".list-slide .ideal-slide").length > 1) {
    $(".list-slide").flickity({
      pageDots: true,
      prevNextButtons: false,
      contain: true,
      cellAlign: "right",
      imagesLoaded: true,
      draggable: true,
      wrapAround: true,
      autoPlay: true,
    });
  }
  if ($(".slide-space .space-slide").length > 1) {
    $(".slide-space").flickity({
      pageDots: true,
      prevNextButtons: false,
      contain: true,
      cellAlign: "right",
      imagesLoaded: true,
      draggable: true,
      wrapAround: true,
      autoPlay: 1500,
    });
  }
  if ($(".slide-grid .g-item").length > 1) {
    $(".slide-grid").flickity({
      pageDots: false,
      prevNextButtons: false,
      contain: true,
      cellAlign: "right",
      imagesLoaded: true,
      draggable: true,
      wrapAround: true,
      autoPlay: 1500,
    });
  }
  if ($(".opaSwiper .swiper-slide").length > 1) {
    var opaSwiper = new Swiper(".opaSwiper", {
      grabCursor: true,
      slidesPerView: "auto",
      pagination: {
        el: ".swiper-pagination",
      },
      autoplay: {
        delay: 2000,
        disableOnInteraction: false,
      },
      centeredSlides: true,
      roundLengths: true,
      spaceBetween: 40,
      grabCursor: true,
      loop: true,
      loopAdditionalSlides: 30,
    });
  }
  if ($(".listbox1mSwiper .swiper-slide").length > 1) {
    var listbox1mSwiper = new Swiper(".listbox1mSwiper", {
      grabCursor: true,
      slidesPerView: 3,
      spaceBetween: 0,
      grabCursor: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
      },
    });
  }
  if ($(".listbox2mSwiper .swiper-slide").length > 1) {
    var listbox2mSwiper = new Swiper(".listbox2mSwiper", {
      grabCursor: true,
      slidesPerView: 2,
      spaceBetween: 0,
      grabCursor: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
      },
    });
  }
  if ($(".listbox3mSwiper .swiper-slide").length > 1) {
    var listbox3mSwiper = new Swiper(".listbox3mSwiper", {
      grabCursor: true,
      slidesPerView: 2,
      spaceBetween: 0,
      grabCursor: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
      },
    });
  }
  if ($(".listbox4mSwiper .swiper-slide").length > 1) {
    var listbox4mSwiper = new Swiper(".listbox4mSwiper", {
      grabCursor: true,
      slidesPerView: 2,
      spaceBetween: 0,
      grabCursor: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
      },
    });
  }
  if ($(".listbox5mSwiper .swiper-slide").length > 1) {
    var listbox5mSwiper = new Swiper(".listbox5mSwiper", {
      grabCursor: true,
      slidesPerView: 2,
      spaceBetween: 0,
      grabCursor: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
      },
    });
  }
  if ($(".listbox6mSwiper .swiper-slide").length > 1) {
    var listbox6mSwiper = new Swiper(".listbox6mSwiper", {
      grabCursor: true,
      slidesPerView: 2,
      spaceBetween: 0,
      grabCursor: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
      },
    });
  }
  if ($(".listbox7mSwiper .swiper-slide").length > 1) {
    var listbox7mSwiper = new Swiper(".listbox7mSwiper", {
      grabCursor: true,
      slidesPerView: 2,
      spaceBetween: 0,
      grabCursor: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
      },
    });
  }
  if ($(".listbox8mSwiper .swiper-slide").length > 1) {
    var listbox8mSwiper = new Swiper(".listbox8mSwiper", {
      grabCursor: true,
      slidesPerView: 2,
      spaceBetween: 0,
      grabCursor: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
      },
    });
  }
  if ($(".listbox9mSwiper .swiper-slide").length > 1) {
    var listbox9mSwiper = new Swiper(".listbox9mSwiper", {
      grabCursor: true,
      slidesPerView: 2,
      spaceBetween: 0,
      grabCursor: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
      },
    });
  }
  if ($(".partnerslideSwiper .swiper-slide").length > 1) {
    var partnerslideSwiper = new Swiper(".partnerslideSwiper", {
      slidesPerView: 6,
      spaceBetween: 20,
      allowTouchMove: false,
      speed: 4000,
      loop: true,
      autoplay: {
        delay: 1,
        disableOnInteraction: false,
      },
      freeMode: true,
      centeredSlides: false,
      breakpoints: {
        0: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 3,
        },
        1024: {
          slidesPerView: 4,
        },
        1280: {
          slidesPerView: 6,
        },
      },
    });
  }
  if ($(".tabslideSwiper .swiper-slide").length > 1) {
    var tabslideSwiper = new Swiper(".tabslideSwiper", {
      grabCursor: true,
      slidesPerView: 3,
      spaceBetween: 20,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
      },
    });
  }
}

function Sticky() {
  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 120) {
      $(".header-desktop").addClass("sticky");
    } else {
      $(".header-desktop").removeClass("sticky");
    }
  });
}

function Openmenu() {
  $(".open-mobi").click(function () {
    $(".sidebar-menu").addClass("showmenu");
  });
  $(".close-mobi").click(function () {
    $(".sidebar-menu").removeClass("showmenu");
  });

  var $ul = $(".menu-middle > ul");
  $ul.find("li a i").click(function (e) {
    var $icon = $(this);
    var $li = $icon.closest("li");

    if ($li.find("ul").length > 0) {
      e.preventDefault();
      if ($li.hasClass("selected")) {
        $li.removeClass("selected").find("li").removeClass("selected");
        $li.find("ul").slideUp(400);
        $icon.removeClass("i-up");
      } else {
        if ($li.parents("li.selected").length == 0) {
          $ul.find("li").removeClass("selected");
          $ul.find("ul").slideUp(400);
          $ul.find("li a i").removeClass("i-up");
        } else {
          $li.parent().find("li").removeClass("selected");
          $li.parent().find("> li ul").slideUp(400);
          $li.parent().find("> li a i").removeClass("i-up");
        }

        $li.addClass("selected");
        $li.find(">ul").slideDown(400);
        $icon.addClass("i-up");
      }
    }
  });

  var activeLi = $("li.selected");
  if (activeLi.length) {
    opener(activeLi);
  }

  function opener(li) {
    var ul = li.closest("ul");
    if (ul.length) {
      li.addClass("selected");
      ul.addClass("open");
      li.find(">a>i").addClass("i-up");
      if (ul.closest("li").length) {
        opener(ul.closest("li"));
      } else {
        return false;
      }
    }
  }

}

function Backtop() {
  var Backtotop = function () {
    if (jQuery(".backtotop").length) {
      var scrollTrigger = 500,
        backToTop = function () {
          var scrollTop = jQuery(window).scrollTop();
          if (scrollTop > scrollTrigger) {
            jQuery(".backtotop").addClass("showw");
          } else {
            jQuery(".backtotop").removeClass("showw");
          }
        };
      backToTop();
      jQuery(window).on("scroll", function () {
        backToTop();
      });
      jQuery(".backtotop").on("click", function (e) {
        e.preventDefault();
        jQuery("html,body").animate({ scrollTop: 0 }, 500);
      });
    }
  };
  Backtotop();
}

function animateAOS() {
  AOS.init({
    disable: "mobile",
    duration: 1200,
    delay: 300,
  });
}
