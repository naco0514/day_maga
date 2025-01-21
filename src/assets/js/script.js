//==================================================
// スクロールでヘッダーロゴ表示・非表示切り替える
//==================================================
jQuery(window).on("scroll", function () {
  if (0 < jQuery(window).scrollTop()) {
    jQuery("#js-scroll").addClass("is-scroll");
  } else {
    jQuery("#js-scroll").removeClass("is-scroll");
  }
});

//==================================================
// ドロワー
//==================================================
jQuery("#js-drawer-icon").on("click", function (e) {
  e.preventDefault();
  jQuery("#js-drawer-icon").toggleClass("is-checked");
  jQuery("#js-drawer-content").toggleClass("is-checked");
});
//スマホのスムーススクロール時にドロワーを閉じる
jQuery('#js-drawer-content a[href^="#"]').on("click", function (e) {
  jQuery("#js-drawer-icon").removeClass("is-checked");
  jQuery("#js-drawer-content").removeClass("is-checked");
});

//==================================================
// タブ切替
//==================================================
jQuery(function ($) {
  $(".js-tab-menu").on("click", function () {
    $(".js-tab-menu").removeClass("is-active");
    $(".js-tab-content").removeClass("is-active");
    $(this).addClass("is-active");
    var number = $(this).data("number");
    $("#" + number).addClass("is-active");
  });
});

//==================================================
// FV　スライダー
//==================================================
jQuery(function ($) {
  var fvSwiper = new Swiper(".p-swiper__front-page-swiper", {
    loop: true,
    speed: 2000,
    slidesPerView: 1.3,
    spaceBetween: 17,
    centeredSlides: true,
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },
    navigation: {
      prevEl: ".p-swiper__front-page-prev", //戻るボタンのclass
      nextEl: ".p-swiper__front-page-next", //進むボタンのclass
    },
    breakpoints: {
      //画面幅による表示枚数と余白の指定
      750: {
        slidesPerView: 2.3,
        spaceBetween: 66,
      },
    },
  });
});

//==================================================
// おすすめ記事　スライダー
//==================================================
jQuery(function ($) {
  const recommendSwiper = new Swiper(".p-swiper__recommend-swiper", {
    loop: false,
    // autoplay: {
    //     delay: 3000, //何秒ごとにスライドを動かすか
    //     stopOnLastSlide: false, //最後のスライドで自動再生を終了させるか
    //     disableOnInteraction: true, //ユーザーの操作時に止める
    //     reverseDirection: false, //自動再生を逆向きにする
    // },
    //speed: 1000, //表示切り替えのスピード
    effect: "slide", //切り替えのmotion (※1)
    centeredSlides: false, //！！中央寄せをfalse！！
    scrollbar: {
      //スクロールバーを表示したいとき
      el: ".p-swiper__recommend-scrollbar", //スクロールバーのclass
      hide: false, //操作時のときのみ表示
      draggable: true, //スクロールバーを直接表示できるようにする
    },
    navigation: {
      prevEl: ".p-swiper__recommend-prev", //戻るボタンのclass
      nextEl: ".p-swiper__recommend-next", //進むボタンのclass
    },
    allowTouchMove: true, // スワイプで表示の切り替えを無効に
    slidesPerView: 1.1, // 一度に表示する枚数
    spaceBetween: 20,
    breakpoints: {
      //画面幅による表示枚数と余白の指定
      300: {
        slidesPerView: 1.1,
        spaceBetween: 20,
      },
      390: {
        slidesPerView: 1.2,
        spaceBetween: 24,
      },
      450: {
        slidesPerView: 1.4,
        spaceBetween: 26,
      },
      600: {
        slidesPerView: 1.8,
        spaceBetween: 26,
      },
      750: {
        slidesPerView: 2.4,
        spaceBetween: 26,
      },
      900: {
        slidesPerView: 2.8,
        spaceBetween: 28,
      },
      1000: {
        slidesPerView: 3.2,
        spaceBetween: 32,
      },
      1200: {
        slidesPerView: 3.4,
        spaceBetween: 32,
      },
      1440: {
        slidesPerView: 3.8,
        spaceBetween: 32,
      },
    },
  });
});
