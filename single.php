<?php get_header(); ?>

<main class="l-main">
    <div class="p-single l-section">

        <div class="p-single__inner">
            <div class="p-single__box">
                <!-- 記事内容 ここから↓ -->
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()): ?>
                        <?php the_post(); ?>
                        <article class="p-single__article">

                            <!-- 投稿メタ情報 ここから -->
                            <div class="p-single__meta">
                                <div class="p-single__date">
                                    <span class="p-single__date-text">公開日</span>
                                    <time class="p-single__datetime" datetime="the_time('c')"><?php the_time('Y.m.j'); ?></time>
                                </div>
                                <div class="p-single__category">
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
                                <h1 class="p-single__h1">
                                    <?php the_title(); ?>
                                </h1>
                            </div>
                            <!-- //p-single__meta -->

                            <!-- サムネイル -->
                            <figure class="p-single__img">
                                <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail(); ?>
                                <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri() ?>./assets/img/card/noimg.png" alt="day maga" decoding="async">
                                <?php endif; ?>
                            </figure>
                            <!-- サムネイル ここまで -->

                            <!-- 抜粋 -->
                            <div class="p-single__discription"><?php the_excerpt(); ?></div>
                            <!-- 抜粋 ここまで -->

                            <!-- 投稿本文 -->
                            <div class="p-single__body">
                                <?php the_content(); ?>
                            </div>
                            <!-- 投稿本文 ここまで -->

                            <!-- 登録 ボタン -->
                            <div class="p-single__button">
                                <a href="<?php echo home_url(); ?>" class="c-button__light-blue">コンサルタント案件の紹介登録をする</a>
                            </div>
                            <!-- 登録 ボタン ここまで -->

                            <!-- この記事のタグを取得 -->
                            <?php $post_tags = get_the_tags(); ?>
                            <div class="p-single__box-tag-list">
                                <span class="p-single__box-tag-list-head">この記事のタグ</span>
                                <div class="p-single__box-tag-list-body">
                                    <?php if ($post_tags): ?>
                                        <?php foreach ($post_tags as $tag): ?>
                                            <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="c-tag__link">#<?php echo $tag->name; ?></a>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- タグを取得 ここまで -->

                        </article>
                    <?php endwhile; ?>
                <?php endif; ?>
                <!-- 投稿ループ ここまで -->
            </div>
            <!-- //p-single__box -->
        </div>
        <!-- //p-single__inner l-inner -->

        <!-- おすすめ記事 -->
        <div class="p-single__recommend">
            <div class="p-single__recommend-inner">
                <div class="p-single__recommend-heading l-inner">
                    <span class="c-heading c-heading--single">おすすめ記事</span>
                </div>
                <div class="p-single__recommend-slider">
                    <?php get_template_part('template-parts/recommend-single'); ?>
                </div>
                <!-- //p-single__recommend-slider -->
            </div>
            <!-- //p-single__recommend-inner -->
        </div>
        <!-- //p-single__recommend -->
        <!-- おすすめ記事ここまで -->

        <!-- タグ一覧 -->
        <div class="p-single__tag-list">
            <?php get_template_part('template-parts/tag-list'); ?>
        </div>
        <!-- //p-single__tag-list -->
        <!-- タグ一覧ここまで -->

    </div>
    <!-- セクションここまで -->

    <!-- CTA -->
    <?php get_template_part('template-parts/cta'); ?>
    <!-- CTA ここまで-->
</main>
<!-- !!メインここまで!! -->

<?php get_footer(); ?>