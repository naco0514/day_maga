<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- IE表示崩れ対策 -->
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge" /> -->
	<!-- 電話番号とメールのリンク変換なし -->
	<meta name="format-detection" content="email=no,telephone=no,address=no" />

	<!-- ファビコン//.ico .svg .pngを用意 -->
	<!-- <link rel="icon" href="/favicon.ico" sizes="32x32" /> -->
	<!-- レガシーブラウザ対応/32x32 -->
	<!-- <link rel="apple-touch-icon" href="/apple-touch-icon.png" /> -->
	<!-- スマホ画面アイコン/180×180 -->


	<!-- web font -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Zen+Maru+Gothic:wght@300;400;500;700;900&display=swap" rel="stylesheet" />

	<?php wp_head(); ?>
</head>

<body>
	<header class="l-header">
		<div class="p-header" id="js-scroll">
			<div class="p-header__inner">
				<div class="c-logo__second p-header__logo02">
					<img src="<?php echo get_template_directory_uri() ?>/assets/img/common/header_logo02.webp" alt="Day Maga" width="520" height="216" decoding="async" />
				</div>
				<div class="p-header__logo">
					<?php if (is_front_page()): ?>
						<h1 class="c-logo__first p-header__logo01">
							<a href="<?php echo esc_url('https://wp636314.wpx.jp/day-maga/'); ?>">
								<img src="<?php echo get_template_directory_uri() ?>/assets/img/common/header_logo.webp" alt="Day Maga" width="520" height="216" decoding="async" />
							</a>
						</h1>
					<?php else : ?>
						<div class="c-logo__first p-header__logo01">
							<a href="<?php echo esc_url('https://wp636314.wpx.jp/day-maga/'); ?>">
								<img src="<?php echo get_template_directory_uri() ?>/assets/img/common/header_logo.webp" alt="Day Maga" width="520" height="216" decoding="async" />
							</a>
						</div>
					<?php endif; ?>
				</div>

				<!-- //p-header__logo -->
				<div class="p-header__container">
					<nav class="p-header__nav p-header__drawer-content" id="js-drawer-content">
						<ul class="p-header__nav-list">
							<li class="p-header__nav-item">
								<?php $new_link = get_category_link(get_category_by_slug('new')->term_id); ?>
								<a href="<?php echo esc_url($new_link); ?>" class="p-header__nav-link">新着情報</a>
							</li>
							<li class="p-header__nav-item">
								<?php $tips_link = get_category_link(get_category_by_slug('tips')->term_id); ?>
								<a href="<?php echo esc_url($tips_link); ?>" class="p-header__nav-link">TIPS</a>
							</li>
							<li class="p-header__nav-item">
								<?php $interview_link = get_category_link(get_category_by_slug('interview')->term_id); ?>
								<a href="<?php echo esc_url($interview_link); ?>" class="p-header__nav-link">インタビュー</a>
							</li>
							<li class="p-header__nav-item">
								<?php $news_link = get_category_link(get_category_by_slug('news')->term_id); ?>
								<a href="<?php echo esc_url($news_link); ?>" class="p-header__nav-link">ニュース</a>
							</li>
							<li class="p-header__nav-item p-header__nav-item--search">
								<a href="#tag-list" class="c-search">
									<img src="<?php echo get_template_directory_uri() ?>/assets/img/common/header_search.svg" alt="検索" width="28" height="29" decoding="async" />
								</a>
							</li>
						</ul>
					</nav>
					<!-- //p-header__nav -->
					<div class="p-header__wrapper">
						<div class="p-header__button">
							<div class="p-header__button-left">
								<a href="#cta" class="c-button__push-header"><span class="c-button__push-header-text-1st">コンサルをお探しの企業様</span><span class="c-button__push-header-text-2nd">まずは無料相談</span></a>
							</div>
							<div class="p-header__button-right">
								<a href="#cta" class="c-button__push-header c-button__push-header--modifier"><span class="c-button__push-header-text-1st c-button__push-header-text-1st--modifier">コンサルタントの方</span><span class="c-button__push-header-text-2nd c-button__push-header-text-2nd--modifier">案件の紹介登録</span></a>
							</div>
						</div>
						<!-- //p-header__button -->
						<div class="p-header__icon">
							<button type="button" class="p-header__icon-open" id="js-drawer-icon"></button>
							<div class="p-header__icon-search">
								<a href="#tag-list" class="c-search">
									<img src="<?php echo get_template_directory_uri() ?>/assets/img/common/header_search.svg" alt="検索" width="28" height="29" decoding="async" />
								</a>
							</div>
						</div>
						<!-- //p-header__icon -->
					</div>
				</div>

				<!-- //p-header__container -->
			</div>
			<!-- //p-header__inner -->
		</div>
		<!-- //p-header -->
	</header>
	<!-- //l-header -->
	<!-- !!ヘッダーここまで!! -->