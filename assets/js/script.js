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
  jQuery(".js-tab-menu").on("click", function () {
    jQuery(".js-tab-menu").removeClass("is-active");
    jQuery(".js-tab-content").removeClass("is-active");
    jQuery(this).addClass("is-active");

    // data-number 属性からスラッグ名を取得
    var slug = jQuery(this).data("number");

    // 取得したスラッグ名が 'all' の場合は特別なURLに遷移
    var button = jQuery(".p-front-page__all-button a");
    if (slug === "all") {
      button.attr("href", "https://wp636314.wpx.jp/day-maga/all");
    } else {
      // それ以外の場合はカテゴリのスラッグに基づいて遷移
      button.attr("href", "/day-maga/archives/category/" + slug);
    }

    // 取得したスラッグ名を使って対応するタブコンテンツをアクティブにする
    jQuery("#" + slug).addClass("is-active");
  });

  // 初期表示時に選択されているカテゴリにリンクを設定
  var initialActiveTab = jQuery(".js-tab-menu.is-active").data("number");
  var initialButton = jQuery(".p-front-page__all-button a");
  if (initialActiveTab === "all") {
    initialButton.attr("href", "https://wp636314.wpx.jp/day-maga/all");
  } else {
    initialButton.attr(
      "href",
      "/day-maga/archives/category/" + initialActiveTab
    );
  }
});

//==================================================
// FV　スライダー
//==================================================
jQuery(function ($) {
  var fvSwiper = new Swiper(".p-swiper__front-page-swiper", {
    loop: true,
    speed: 1500,
    slidesPerView: 1.3,
    spaceBetween: 18,
    centeredSlides: true,
    autoplay: {
      delay: 1500,
      disableOnInteraction: false,
    },
    navigation: {
      prevEl: ".p-swiper__front-page-prev", //戻るボタンのclass
      nextEl: ".p-swiper__front-page-next", //進むボタンのclass
    },
    breakpoints: {
      390: {
        slidesPerView: 1.28,
        spaceBetween: 18,
      },
      450: {
        slidesPerView: 1.5,
        spaceBetween: 35,
      },
      600: {
        slidesPerView: 2,
        spaceBetween: 50,
      },
      750: {
        slidesPerView: 2.28,
        spaceBetween: 64,
      },
    },
    on: {
      slideChangeTransitionStart: function () {
        // スライドが動き始めたタイミングでトランジションを有効にする
        $(".p-swiper__front-page-slide").css("transition", "transform 0.6s");
      },
    },
  });
});

//==================================================
// おすすめ記事　スライダー front-page
//==================================================
jQuery(function ($) {
  const recommendSwiper = new Swiper(".p-swiper__recommend-swiper", {
    loop: false,
    effect: "slide",
    centeredSlides: false,
    //スクロールバーを表示したいとき
    scrollbar: {
      el: ".p-swiper__recommend-scrollbar",
      hide: false,
      draggable: true,
    },
    navigation: {
      prevEl: ".p-swiper__recommend-prev",
      nextEl: ".p-swiper__recommend-next",
    },
    allowTouchMove: true,
    slidesPerView: 1.1, // 初期状態
    spaceBetween: 20,
    breakpoints: {
      300: {
        slidesPerView: 1.1,
        spaceBetween: 24,
      },
      390: {
        slidesPerView: 1.15,
        spaceBetween: 24,
      },
      450: {
        slidesPerView: 1.4,
        spaceBetween: 28,
      },
      600: {
        slidesPerView: 1.8,
        spaceBetween: 32,
      },
      750: {
        slidesPerView: 2.4,
        spaceBetween: 32,
      },
      900: {
        slidesPerView: 2.8,
        spaceBetween: 32,
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
        slidesPerView: 3.675,
        spaceBetween: 35,
      },
    },
  });
});

//==================================================
// おすすめ記事　スライダー single
//==================================================
jQuery(function ($) {
  const singleSwiper = new Swiper(".p-swiper__single-swiper", {
    loop: false,
    effect: "slide",
    centeredSlides: false,
    //スクロールバーを表示したいとき
    scrollbar: {
      el: ".p-swiper__recommend-scrollbar",
      hide: false,
      draggable: true,
    },
    navigation: {
      prevEl: ".p-swiper__recommend-prev",
      nextEl: ".p-swiper__recommend-next",
    },
    allowTouchMove: true,
    slidesPerView: 1.1, // 初期状態
    spaceBetween: 20,
    breakpoints: {
      300: {
        slidesPerView: 1.1,
        spaceBetween: 32,
      },
      390: {
        slidesPerView: 1.1,
        spaceBetween: 32,
      },
      450: {
        slidesPerView: 1.4,
        spaceBetween: 32,
      },
      600: {
        slidesPerView: 1.8,
        spaceBetween: 32,
      },
      750: {
        slidesPerView: 2.4,
        spaceBetween: 32,
      },
      900: {
        slidesPerView: 2.8,
        spaceBetween: 32,
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
        slidesPerView: 3.675,
        spaceBetween: 32,
      },
    },
  });
});

/**==================================================
スムーススクロール
=====================================================*/
// jQuery(function() {
//     jQuery('html').css( {
//         scrollBehavior: 'smooth',
//     })
// });

jQuery(function () {
  // #を含むa要素をクリックした時
  jQuery('a[href*="#"]').click(function (e) {
    // スクロール先を指定（href="#"ならばhtml、そうでなければアンカーを代入）
    var target = jQuery(this.hash === "" ? "html" : this.hash);
    // スクロール先の要素が存在する時
    if (target.length) {
      // デフォルトの動作をキャンセル
      e.preventDefault();
      // ヘッダーの高さを取得
      var headerHeight = jQuery("header").outerHeight();
      // スクロール先の位置を計算（ヘッダーと任意の高さを引く）
      var position = target.offset().top - headerHeight - 20;
      // スクロール実行（500ミリ秒、swingを指定）
      jQuery("html, body").animate({ scrollTop: position }, 500, "swing");

      // ページトップ以外の時
      if (!target.is("html")) {
        // URLにハッシュを含める
        history.pushState(null, "", this.hash);
      }
    }
  });
});

/**==================================================
トップページの投稿数　950px以上9、950px未満6に調整
=====================================================*/
jQuery(document).ready(function ($) {
  if ($(window).width() < 950) {
    jQuery("#all .p-card__link").slice(6).hide(); // "すべて" タブの7件目以降を非表示
  }
});

//==================================================
// ソート切替（新着順・人気順）
//==================================================
jQuery(function ($) {
  jQuery(".js-sort").on("click", function () {
    jQuery(".js-sort").removeClass("is-current");
    jQuery(this).addClass("is-current");
  });
});
