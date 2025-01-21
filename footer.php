<footer class="l-footer">
	<div class="p-footer">
		<div class="p-footer__inner l-inner">
			<div class="p-footer__content">
				<div class="p-footer__logo">
					<div class="c-logo__footer">
						<img src="<?php echo get_template_directory_uri() ?>/assets/img/common/footer_logo.webp" alt="day maga" width="207" height="43" loading="lazy" decoding="async" />
					</div>
				</div>
				<!-- //p-footer__logo -->
				<div class="p-footer-list">
					<ul class="p-footer__category">
						<li class="p-footer__item">
							<?php $new_link = get_category_link(get_category_by_slug('new')->term_id); ?>
							<a href="<?php echo esc_url($new_link); ?>" class="p-footer__link">新着情報</a>
						</li>
						<li class="p-footer__item">
							<?php $tips_link = get_category_link(get_category_by_slug('tips')->term_id); ?>
							<a href="<?php echo esc_url($tips_link); ?>" class="p-footer__link">TIPS</a>
						</li>
						<li class="p-footer__item">
							<?php $interview_link = get_category_link(get_category_by_slug('interview')->term_id); ?>
							<a href="<?php echo esc_url($interview_link); ?>" class="p-footer__link">インタビュー</a>
						</li>
						<li class="p-footer__item">
							<?php $news_link = get_category_link(get_category_by_slug('news')->term_id); ?>
							<a href="<?php echo esc_url($news_link); ?>" class="p-footer__link">ニュース</a>
						</li>
					</ul>
					<!-- //p-footer__category -->
					<ul class="p-footer__company">
						<li class="p-footer__item">
							<a href="#" class="p-footer__link">DayMagaについて</a>
						</li>
						<li class="p-footer__item">
							<a href="#" class="p-footer__link">運営会社</a>
						</li>
						<li class="p-footer__item">
							<a href="#" class="p-footer__link">サイト利用規約</a>
						</li>
					</ul>
					<!-- //p-footer__company -->
				</div>
				<!-- //p-footer-list -->
			</div>
			<!-- //p-footer__content -->
			<div class="p-footer__copyright">
				<small>&copy;2024 Daytra Consul</small>
			</div>
			<p class="p-footer__annotation">
				このサイトはCrown
				Cat株式会社様のご協力のもと作成したコーディング用の練習課題です。<span class="u-inline-block--pc">実在の人物・団体とは関係ありません。</span>
			</p>
		</div>
		<!-- //p-footer__inner -->
	</div>
	<!-- //p-footer -->
</footer>
<!-- //l-footer -->
<!-- !!フッターここまで!! -->

<?php wp_footer(); ?>
</body>

</html>