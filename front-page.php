<?php
/*
Template Name: front-page
*/
?>
<?php get_header(); ?>

<main class="l-main">

	<!-- ファーストビュー ここから -->
	<div class="p-front-page__fv">
		<div class="p-front-page__inner">
			<div class="p-front-page__swiper">

				<!-- FVスライダー ここから -->
				<div class="p-swiper__front-page-container">
					<div class="swiper p-swiper__front-page-swiper">
						<div class="swiper-wrapper p-swiper__front-page-wrapper">
							<!-- サブクエリ #pickup タグで新着５件を表示 -->
							<?php $pickup_query = new WP_Query(
								array(
									'post_type'      => 'post',
									'tag'            => 'pickup',
									'post_per_page'  => 5,
									'order' => 'DESC', //記事の順番をソート(降順)
									'orderby' => 'date', // 日付で並べる

								)
							);
							?>
							<?php if ($pickup_query->have_posts()) : ?>
								<?php while ($pickup_query->have_posts()): ?>
									<?php $pickup_query->the_post(); ?>
									<!-- カード ここから-->
									<div class="swiper-slide p-swiper__front-page-slide">

										<!-- リンク先指定 -->
										<a href="<?php the_permalink(); ?>" class="p-card__link p-card__link--fv">
											<article class="p-card__item">
												<!-- サムネイル -->
												<figure class="p-card__img p-card__img--fv">
													<?php if (has_post_thumbnail()): ?>
														<?php the_post_thumbnail(); ?>
													<?php else: ?>
														<img src="<?php echo get_template_directory_uri() ?>/assets/img/card/noimg.png" alt="day maga">
													<?php endif; ?>
												</figure>
												<!-- サムネイル ここまで -->

												<div class="p-card__body p-card__body--fv">
													<!-- 投稿日を取得 -->
													<time class="p-card__date p-card__date--fv" datetime="<?php the_time('c'); ?>">
														<?php the_time('Y.m.j'); ?>
													</time>
													<!-- 投稿日を取得 ここまで-->

													<!-- タイトルを取得 -->
													<h3 class="p-card__title p-card__title--fv"><?php the_title(); ?></h3>
													<!-- タイトルを取得 ここまで -->


													<!-- カテゴリを取得 -->
													<div class="p-card__category">
														<!-- カテゴリの色指定 color/borderを「Advanced Custom Fields」より取得 -->
														<?php
														$category = get_the_category();
														if ($category) {
															// カスタムフィールド 'color' を使ってカテゴリごとに色を取得
															$category_color = get_field('color', 'category_' . $category[0]->term_id);

															// カテゴリの名前を取得
															$category_name = $category[0]->cat_name;

															// カスタムフィールドから取得した色を適用する
															if ($category_color) {
																echo '<span class="c-category__card c-category__card--large" style="color:' . esc_attr($category_color) . '; border: 1px solid ' . esc_attr($category_color) . ';">' . esc_html($category_name) . '</span>';
															} else {
																// 色が設定されていない場合のデフォルト色とボーダー色
																echo '<span class="c-category__card c-category__card--default">' . esc_html($category_name) . '</span>';
															}
														}
														?>
													</div>
													<!-- カテゴリを取得 ここまで -->

													<!-- この記事のタグを取得 -->
													<?php $post_tags = get_the_tags(); ?>
													<div class="p-card__tag p-card__tag--fv">
														<?php if ($post_tags): ?>
															<?php foreach ($post_tags as $tag): ?>
																<p class="c-tag__card c-tag__card--fv">#<?php echo $tag->name; ?></p>
															<?php endforeach; ?>
														<?php endif; ?>
													</div>
													<!-- タグを取得 ここまで -->

												</div>
												<!-- //p-card__body p-card__body--fv/ -->
											</article>
											<!-- //記事ここまで p-card__item -->
										</a>
									</div>
									<!-- //p-front-page-swiper__slide -->
									<!-- カード ここまで -->
								<?php endwhile; ?>
							<?php endif; ?>
							<?php wp_reset_postdata(); ?>
						</div>
						<!-- //p-swiper__front-page-wrapper -->

						<!-- NEXT-PREV の配置 -->
						<div class="p-swiper__front-page-arrow">
							<div class="swiper-button-prev p-swiper__front-page-prev"></div>
							<div class="swiper-button-next p-swiper__front-page-next"></div>
						</div>
						<!-- NEXT-PREV の配置 ここまで -->
					</div>
					<!-- //swiper p-swiper__front-page-swiper -->
				</div>
				<!-- //p-swiper__front-page-container -->
				<!-- FV スライダー内容はここまで -->

			</div>
			<!-- //p-front-page__swiper -->
		</div>
		<!-- //p-front-page__inner -->
	</div>
	<!-- //p-front-page__fv -->
	<!-- ファーストビューここまで -->

	<!-- 新着情報 -->
	<section class="p-front-page__new">
		<div class="p-front-page__new-inner l-inner">
			<div class="p-front-page__new-heading">
				<h2 class="c-heading">新着情報</h2>
			</div>
			<div class="p-front-page__new-cards">
				<!-- サブクエリ カテゴリ新着情報を３件表示 -->
				<?php $new_query = new WP_Query(
					array(
						'post_type'      => 'post',
						'category_name'  => 'new',    // カテゴリスラッグを指定
						'posts_per_page' => 3,        // 表示する記事数
						'order'          => 'DESC',   // 降順で表示
						'orderby'        => 'date',   // 日付で並べる

					)
				);
				?>
				<?php if ($new_query->have_posts()) : ?>
					<?php while ($new_query->have_posts()): ?>
						<?php $new_query->the_post(); ?>

						<!-- カード ここから-->
						<!-- リンク先指定 -->
						<a href="<?php the_permalink(); ?>" class="p-card__link">
							<article class="p-card__item">

								<!-- サムネイル -->
								<figure class="p-card__img">
									<?php if (has_post_thumbnail()): ?>
										<?php the_post_thumbnail(); ?>
									<?php else: ?>
										<img src="<?php echo get_template_directory_uri() ?>/assets/img/card/noimg.png" alt="day maga">
									<?php endif; ?>
								</figure>
								<!-- サムネイル ここまで -->

								<div class="p-card__body">
									<!-- 投稿日を取得 -->
									<time class="p-card__date" datetime="<?php the_time('c'); ?>">
										<?php the_time('Y.m.j'); ?>
									</time>
									<!-- 投稿日を取得 ここまで-->

									<!-- タイトルを取得 -->
									<h3 class="p-card__title"><?php the_title(); ?></h3>
									<!-- タイトルを取得 ここまで -->

									<!-- カテゴリを取得 -->
									<div class="p-card__category">
										<!-- カテゴリの色指定 color/borderを「Advanced Custom Fields」より取得 -->
										<?php $category = get_the_category(); ?>
										<?php if ($category) : ?>
											<!-- カスタムフィールド 'color' を使ってカテゴリごとに色を取得 -->
											<?php $category_color = get_field('color', 'category_' . $category[0]->term_id); ?>
											<!-- カテゴリの名前を取得 -->
											<?php $category_name = $category[0]->cat_name; ?>

											<?php if ($category_color) : ?>
												<?php echo '<span class="c-category__card" style="color:' . esc_attr($category_color) . '; border: 1px solid ' . esc_attr($category_color) . ';">' . esc_html($category_name) . '</span>'; ?>
											<?php else : ?>
												<?php echo '<span class="c-category__card c-category__card--default">' . esc_html($category_name) . '</span>'; ?>
											<?php endif; ?>
										<?php endif; ?>
									</div>
									<!-- カテゴリを取得 ここまで -->

									<!-- この記事のタグを取得 -->
									<?php $post_tags = get_the_tags(); ?>
									<div class="p-card__tag">
										<?php if ($post_tags): ?>
											<?php foreach ($post_tags as $tag): ?>
												<p class="c-tag__card">#<?php echo $tag->name; ?></p>
											<?php endforeach; ?>
										<?php endif; ?>
									</div>
									<!-- タグを取得 ここまで -->

								</div>
								<!-- //p-card__body -->
							</article>
							<!-- //記事ここまで　p-card__item -->
						</a>
						<!-- カード ここまで -->
					<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
			<!-- //p-front-page__new-cards -->

			<div class="p-front-page__new-button">
				<?php $new_link = get_category_link(get_category_by_slug('new')->term_id); ?>
				<a href="<?php echo esc_url($new_link); ?>" class="c-button c-button__text">もっと見る</a>
			</div>
			<!-- //p-front-page__new-button -->
		</div>
		<!-- //p-front-page__new-inner -->
	</section>
	<!-- //p-front-page__new -->
	<!-- セクション新着情報ここまで -->

	<!-- おすすめ記事 -->
	<section class="p-front-page__recommend">
		<div class="p-front-page__recommend-inner">
			<div class="p-front-page__recommend-heading l-inner">
				<h2 class="c-heading c-heading--white">おすすめ記事</h2>
			</div>
			<div class="p-front-page__recommend-slider">
				<?php get_template_part('template-parts/recommend'); ?>
			</div>
			<!-- //p-front-page__recommend-slider -->
		</div>
		<!-- //p-front-page__recommend-inner -->
	</section>
	<!-- //p-front-page__recommend -->
	<!-- セクションおすすめ記事ここまで -->

	<!-- すべての記事 -->
	<section class="p-front-page__all">
		<div class="p-front-page__all-inner l-inner">
			<div class="p-front-page__all-heading">
				<h2 class="c-heading c-heading">すべての記事</h2>
			</div>
			<div class="p-front-page__all-tab-list">
				<!-- テンプレートパーツ tab-list ここから↓ -->
				<div class="p-tab-list">
					<div class="p-tab-list__inner">
						<div class="p-tab-list__head">

							<div class="p-tab-list__menu">
								<div class="p-tab-list__menu-item p-tab-list__menu-item--all js-tab-menu  is-active"
									data-number="all">すべて</div>
								<?php $categories = get_categories(array('hide_empty' => false)); // 投稿がないカテゴリも含める 
								?>
								<?php if ($categories) : ?>
									<?php foreach ($categories as $category) : ?>
										<?php $category_slug = $category->slug; ?>
										<div class="p-tab-list__menu-item p-tab-list__menu-item--<?php echo esc_attr($category_slug); ?> js-tab-menu" data-number="<?php echo esc_attr($category_slug); ?>"><?php echo esc_html($category->name); ?></div>
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
							<!-- //p-tab-list__menu -->

						</div>
						<!-- //p-tab-list__head -->
						<div class="p-tab-list__content">
							<div class="p-tab-list__sort">
								<?php get_template_part('template-parts/sort'); ?>
							</div>
							<!-- //p-tab-list__sort -->

							<!-- すべて -->
							<div id="all" class="p-tab-list__content-item p-tab-list__content-item--all js-tab-content is-active">
								<div class="p-card">

									<?php
									$all_query = new WP_Query(
										array(
											'post_type'      => 'post',
											'posts_per_page' => 9, // デフォルトでは9記事表示
											'order'          => 'DESC',
											'orderby'        => 'date',
											'ignore_sticky_posts' => true, // スティッキーポストが影響しないようにする
											'no_found_rows' => true, // ページネーションを無視してパフォーマンスを向上
										)
									);
									?>

									<?php if ($all_query->have_posts()) : ?>
										<?php while ($all_query->have_posts()): ?>
											<?php $all_query->the_post(); ?>
											<!-- 記事 ここから -->
											<a href="<?php the_permalink(); ?>" class="p-card__link">
												<article class="p-card__item">

													<!-- サムネイル -->
													<figure class="p-card__img">
														<?php if (has_post_thumbnail()): ?>
															<?php the_post_thumbnail(); ?>
														<?php else: ?>
															<img src="<?php echo get_template_directory_uri() ?>/assets/img/card/noimg.png" alt="day maga">
														<?php endif; ?>
													</figure>
													<!-- サムネイル ここまで -->

													<div class="p-card__body">
														<!-- 投稿日を取得 -->
														<time class="p-card__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m.j'); ?></time>
														<!-- 投稿日を取得 ここまで-->

														<!-- タイトルを取得 -->
														<h3 class="p-card__title"><?php the_title(); ?></h3>
														<!-- タイトルを取得 ここまで -->

														<!-- カテゴリを取得 -->
														<div class="p-card__category">
															<!-- カテゴリの色指定 color/borderを「Advanced Custom Fields」より取得 -->
															<?php $category = get_the_category(); ?>
															<?php if ($category) : ?>
																<!-- カスタムフィールド 'color' を使ってカテゴリごとに色を取得 -->
																<?php $category_color = get_field('color', 'category_' . $category[0]->term_id); ?>
																<!-- カテゴリの名前を取得 -->
																<?php $category_name = $category[0]->cat_name; ?>

																<?php if ($category_color) : ?>
																	<?php echo '<span class="c-category__card" style="color:' . esc_attr($category_color) . '; border: 1px solid ' . esc_attr($category_color) . ';">' . esc_html($category_name) . '</span>'; ?>
																<?php else : ?>
																	<?php echo '<span class="c-category__card c-category__card--default">' . esc_html($category_name) . '</span>'; ?>
																<?php endif; ?>
															<?php endif; ?>
														</div>
														<!-- カテゴリを取得 ここまで -->

														<!-- この記事のタグを取得 -->
														<?php $post_tags = get_the_tags(); ?>
														<div class="p-card__tag">
															<?php if ($post_tags): ?>
																<?php foreach ($post_tags as $tag): ?>
																	<p class="c-tag__card">#<?php echo $tag->name; ?></p>
																<?php endforeach; ?>
															<?php endif; ?>
														</div>
														<!-- タグを取得 ここまで -->
													</div>

												</article>
											</a>
											<!-- //記事 ここまで -->
										<?php endwhile; ?>
									<?php else: ?> // 該当する投稿がない場合
										<div class="p-card__null">
											<p class="p-card__null-text">投稿の準備中です。</p>
										</div>
									<?php endif; ?>
									<?php wp_reset_postdata(); ?>
								</div>
								<!-- //p-card -->
							</div>
							<!-- //p-tab-list__content-item -->
							<!-- すべて ここまで -->

							<!-- 新着情報カテゴリ -->
							<div id="new" class="p-tab-list__content-item p-tab-list__content-item--new js-tab-content">
								<div class="p-card">
									<?php $new_query = new WP_Query(
										array(
											'post_type'      => 'post',
											'category_name'  => 'new',    // カテゴリスラッグを指定
											'posts_per_page' => 9,        // 表示する記事数
											'order'          => 'DESC',   // 降順で表示
											'orderby'        => 'date',   // 日付で並べる
										)
									);
									?>
									<?php if ($new_query->have_posts()) : ?>
										<?php while ($new_query->have_posts()): ?>
											<?php $new_query->the_post(); ?>
											<!-- 記事 ここから -->
											<a href="<?php the_permalink(); ?>" class="p-card__link">
												<article class="p-card__item">

													<!-- サムネイル -->
													<figure class="p-card__img">
														<?php if (has_post_thumbnail()): ?>
															<?php the_post_thumbnail(); ?>
														<?php else: ?>
															<img src="<?php echo get_template_directory_uri() ?>/assets/img/card/noimg.png" alt="day maga">
														<?php endif; ?>
													</figure>
													<!-- サムネイル ここまで -->

													<div class="p-card__body">
														<!-- 投稿日を取得 -->
														<time class="p-card__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m.j'); ?></time>
														<!-- 投稿日を取得 ここまで-->

														<!-- タイトルを取得 -->
														<h3 class="p-card__title"><?php the_title(); ?></h3>
														<!-- タイトルを取得 ここまで -->

														<!-- カテゴリを取得 -->
														<div class="p-card__category">
															<!-- カテゴリの色指定 color/borderを「Advanced Custom Fields」より取得 -->
															<?php $category = get_the_category(); ?>
															<?php if ($category) : ?>
																<!-- カスタムフィールド 'color' を使ってカテゴリごとに色を取得 -->
																<?php $category_color = get_field('color', 'category_' . $category[0]->term_id); ?>
																<!-- カテゴリの名前を取得 -->
																<?php $category_name = $category[0]->cat_name; ?>

																<?php if ($category_color) : ?>
																	<?php echo '<span class="c-category__card" style="color:' . esc_attr($category_color) . '; border: 1px solid ' . esc_attr($category_color) . ';">' . esc_html($category_name) . '</span>'; ?>
																<?php else : ?>
																	<?php echo '<span class="c-category__card c-category__card--default">' . esc_html($category_name) . '</span>'; ?>
																<?php endif; ?>
															<?php endif; ?>
														</div>
														<!-- カテゴリを取得 ここまで -->

														<!-- この記事のタグを取得 -->
														<?php $post_tags = get_the_tags(); ?>
														<div class="p-card__tag">
															<?php if ($post_tags): ?>
																<?php foreach ($post_tags as $tag): ?>
																	<p class="c-tag__card">#<?php echo $tag->name; ?></p>
																<?php endforeach; ?>
															<?php endif; ?>
														</div>
														<!-- タグを取得 ここまで -->
													</div>

												</article>
											</a>
											<!-- //記事 ここまで -->
										<?php endwhile; ?>
									<?php else: ?>
										<div class="p-card__null">
											<p class="p-card__null-text">投稿の準備中です。</p>
										</div>
									<?php endif; ?>
									<?php wp_reset_postdata(); ?>
								</div>
								<!-- //p-card -->
							</div>
							<!-- //p-tab-list__content-item -->
							<!-- 新着情報カテゴリ ここまで -->

							<!-- TIPSカテゴリ -->
							<div id="tips" class="p-tab-list__content-item p-tab-list__content-item--tips js-tab-content">
								<div class="p-card">
									<?php $tips_query = new WP_Query(
										array(
											'post_type'      => 'post',
											'category_name'  => 'tips',    // カテゴリスラッグを指定
											'posts_per_page' => 9,        // 表示する記事数
											'order'          => 'DESC',   // 降順で表示
											'orderby'        => 'date',   // 日付で並べる
										)
									);
									?>
									<?php if ($tips_query->have_posts()) : ?>
										<?php while ($tips_query->have_posts()): ?>
											<?php $tips_query->the_post(); ?>
											<!-- 記事 ここから -->
											<a href="<?php the_permalink(); ?>" class="p-card__link">
												<article class="p-card__item">

													<!-- サムネイル -->
													<figure class="p-card__img">
														<?php if (has_post_thumbnail()): ?>
															<?php the_post_thumbnail(); ?>
														<?php else: ?>
															<img src="<?php echo get_template_directory_uri() ?>/assets/img/card/noimg.png" alt="day maga">
														<?php endif; ?>
													</figure>
													<!-- サムネイル ここまで -->

													<div class="p-card__body">
														<!-- 投稿日を取得 -->
														<time class="p-card__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m.j'); ?></time>
														<!-- 投稿日を取得 ここまで-->

														<!-- タイトルを取得 -->
														<h3 class="p-card__title"><?php the_title(); ?></h3>
														<!-- タイトルを取得 ここまで -->

														<!-- カテゴリを取得 -->
														<div class="p-card__category">
															<!-- カテゴリの色指定 color/borderを「Advanced Custom Fields」より取得 -->
															<?php $category = get_the_category(); ?>
															<?php if ($category) : ?>
																<!-- カスタムフィールド 'color' を使ってカテゴリごとに色を取得 -->
																<?php $category_color = get_field('color', 'category_' . $category[0]->term_id); ?>
																<!-- カテゴリの名前を取得 -->
																<?php $category_name = $category[0]->cat_name; ?>

																<?php if ($category_color) : ?>
																	<?php echo '<span class="c-category__card" style="color:' . esc_attr($category_color) . '; border: 1px solid ' . esc_attr($category_color) . ';">' . esc_html($category_name) . '</span>'; ?>
																<?php else : ?>
																	<?php echo '<span class="c-category__card c-category__card--default">' . esc_html($category_name) . '</span>'; ?>
																<?php endif; ?>
															<?php endif; ?>
														</div>
														<!-- カテゴリを取得 ここまで -->

														<!-- この記事のタグを取得 -->
														<?php $post_tags = get_the_tags(); ?>
														<div class="p-card__tag">
															<?php if ($post_tags): ?>
																<?php foreach ($post_tags as $tag): ?>
																	<p class="c-tag__card">#<?php echo $tag->name; ?></p>
																<?php endforeach; ?>
															<?php endif; ?>
														</div>
														<!-- タグを取得 ここまで -->
													</div>

												</article>
											</a>
											<!-- //記事 ここまで -->
										<?php endwhile; ?>
									<?php else: ?> // 該当する投稿がない場合
										<div class="p-card__null">
											<p class="p-card__null-text">投稿の準備中です。</p>
										</div>
									<?php endif; ?>
									<?php wp_reset_postdata(); ?>
								</div>
								<!-- //p-card -->
							</div>
							<!-- //p-tab-list__content-item -->
							<!-- TIPSカテゴリ ここまで -->

							<!-- インタビューカテゴリ -->
							<div id="interview" class="p-tab-list__content-item p-tab-list__content-item--interview js-tab-content">
								<div class="p-card">
									<?php $interview_query = new WP_Query(
										array(
											'post_type'      => 'post',
											'category_name'  => 'interview',    // カテゴリスラッグを指定
											'posts_per_page' => 9,        // 表示する記事数
											'order'          => 'DESC',   // 降順で表示
											'orderby'        => 'date',   // 日付で並べる
										)
									);
									?>
									<?php if ($interview_query->have_posts()) : ?>
										<?php while ($interview_query->have_posts()): ?>
											<?php $interview_query->the_post(); ?>
											<!-- 記事 ここから -->
											<a href="<?php the_permalink(); ?>" class="p-card__link">
												<article class="p-card__item">

													<!-- サムネイル -->
													<figure class="p-card__img">
														<?php if (has_post_thumbnail()): ?>
															<?php the_post_thumbnail(); ?>
														<?php else: ?>
															<img src="<?php echo get_template_directory_uri() ?>/assets/img/card/noimg.png" alt="day maga">
														<?php endif; ?>
													</figure>
													<!-- サムネイル ここまで -->

													<div class="p-card__body">
														<!-- 投稿日を取得 -->
														<time class="p-card__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m.j'); ?></time>
														<!-- 投稿日を取得 ここまで-->

														<!-- タイトルを取得 -->
														<h3 class="p-card__title"><?php the_title(); ?></h3>
														<!-- タイトルを取得 ここまで -->

														<!-- カテゴリを取得 -->
														<div class="p-card__category">
															<!-- カテゴリの色指定 color/borderを「Advanced Custom Fields」より取得 -->
															<?php $category = get_the_category(); ?>
															<?php if ($category) : ?>
																<!-- カスタムフィールド 'color' を使ってカテゴリごとに色を取得 -->
																<?php $category_color = get_field('color', 'category_' . $category[0]->term_id); ?>
																<!-- カテゴリの名前を取得 -->
																<?php $category_name = $category[0]->cat_name; ?>

																<?php if ($category_color) : ?>
																	<?php echo '<span class="c-category__card" style="color:' . esc_attr($category_color) . '; border: 1px solid ' . esc_attr($category_color) . ';">' . esc_html($category_name) . '</span>'; ?>
																<?php else : ?>
																	<?php echo '<span class="c-category__card c-category__card--default">' . esc_html($category_name) . '</span>'; ?>
																<?php endif; ?>
															<?php endif; ?>
														</div>
														<!-- カテゴリを取得 ここまで -->

														<!-- この記事のタグを取得 -->
														<?php $post_tags = get_the_tags(); ?>
														<div class="p-card__tag">
															<?php if ($post_tags): ?>
																<?php foreach ($post_tags as $tag): ?>
																	<p class="c-tag__card">#<?php echo $tag->name; ?></p>
																<?php endforeach; ?>
															<?php endif; ?>
														</div>
														<!-- タグを取得 ここまで -->
													</div>

												</article>
											</a>
											<!-- //記事 ここまで -->
										<?php endwhile; ?>
									<?php else: ?>
										<div class="p-card__null">
											<p class="p-card__null-text">投稿の準備中です。</p>
										</div>
									<?php endif; ?>
									<?php wp_reset_postdata(); ?>
								</div>
								<!-- //p-card -->
							</div>
							<!-- //p-tab-list__content-item -->
							<!-- インタビューカテゴリ ここまで -->

							<!-- ニュースカテゴリ -->
							<div id="news" class="p-tab-list__content-item p-tab-list__content-item--news js-tab-content">
								<div class="p-card">
									<?php $news_query = new WP_Query(
										array(
											'post_type'      => 'post',
											'category_name'  => 'news',    // カテゴリスラッグを指定
											'posts_per_page' => 9,        // 表示する記事数
											'order'          => 'DESC',   // 降順で表示
											'orderby'        => 'date',   // 日付で並べる
										)
									);
									?>
									<?php if ($news_query->have_posts()) : ?>
										<?php while ($news_query->have_posts()): ?>
											<?php $news_query->the_post(); ?>
											<!-- 記事 ここから -->
											<a href="<?php the_permalink(); ?>" class="p-card__link">
												<article class="p-card__item">

													<!-- サムネイル -->
													<figure class="p-card__img">
														<?php if (has_post_thumbnail()): ?>
															<?php the_post_thumbnail(); ?>
														<?php else: ?>
															<img src="<?php echo get_template_directory_uri() ?>/assets/img/card/noimg.png" alt="day maga">
														<?php endif; ?>
													</figure>
													<!-- サムネイル ここまで -->

													<div class="p-card__body">
														<!-- 投稿日を取得 -->
														<time class="p-card__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m.j'); ?></time>
														<!-- 投稿日を取得 ここまで-->

														<!-- タイトルを取得 -->
														<h3 class="p-card__title"><?php the_title(); ?></h3>
														<!-- タイトルを取得 ここまで -->

														<!-- カテゴリを取得 -->
														<div class="p-card__category">
															<!-- カテゴリの色指定 color/borderを「Advanced Custom Fields」より取得 -->
															<?php $category = get_the_category(); ?>
															<?php if ($category) : ?>
																<!-- カスタムフィールド 'color' を使ってカテゴリごとに色を取得 -->
																<?php $category_color = get_field('color', 'category_' . $category[0]->term_id); ?>
																<!-- カテゴリの名前を取得 -->
																<?php $category_name = $category[0]->cat_name; ?>

																<?php if ($category_color) : ?>
																	<?php echo '<span class="c-category__card" style="color:' . esc_attr($category_color) . '; border: 1px solid ' . esc_attr($category_color) . ';">' . esc_html($category_name) . '</span>'; ?>
																<?php else : ?>
																	<?php echo '<span class="c-category__card c-category__card--default">' . esc_html($category_name) . '</span>'; ?>
																<?php endif; ?>
															<?php endif; ?>
														</div>
														<!-- カテゴリを取得 ここまで -->

														<!-- この記事のタグを取得 -->
														<?php $post_tags = get_the_tags(); ?>
														<div class="p-card__tag">
															<?php if ($post_tags): ?>
																<?php foreach ($post_tags as $tag): ?>
																	<p class="c-tag__card">#<?php echo $tag->name; ?></p>
																<?php endforeach; ?>
															<?php endif; ?>
														</div>
														<!-- タグを取得 ここまで -->
													</div>

												</article>
											</a>
											<!-- //記事 ここまで -->
										<?php endwhile; ?>
									<?php else: ?>
										<div class="p-card__null">
											<p class="p-card__null-text">投稿の準備中です。</p>
										</div>
									<?php endif; ?>
									<?php wp_reset_postdata(); ?>
								</div>
								<!-- //p-card -->
							</div>
							<!-- //p-tab-list__content-item -->
							<!-- ニュースカテゴリ ここまで -->

						</div>
						<!-- //p-tab-list__content -->
					</div>
					<!-- //p-tab-list__inner -->

				</div>
				<!-- //p-tab-list -->
				<!-- テンプレートパーツ tab-list ここまで -->
			</div>
			<!-- //p-front-page__all-tab-list -->


			<div class="p-front-page__all-button">
				<a href="#" class="c-button c-button__text">もっと見る</a>
			</div>

			<div class="p-front-page__all-tag-list">
				<?php get_template_part('template-parts/tag-list'); ?>
			</div>
			<!-- //p-front-page__all-tag-list -->

		</div>
		<!-- //p-front-page__all-inner l-inner -->
	</section>
	<!-- セクションすべての記事ここまで -->


	<?php get_template_part('template-parts/cta'); ?>
</main>
<!-- !!メインここまで!! -->

<?php get_footer(); ?>