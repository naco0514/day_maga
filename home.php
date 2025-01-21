<?php
/*
Template Name: home
*/
?>
<?php get_header(); ?>

<main class="l-main">
    <section class="p-home l-section">
        <div class="p-home__inner l-inner">
            <div class="p-home__heading">
                <h2 class="c-heading c-heading">すべての記事</h2>
            </div>
            <div class="p-home__tab-list">
                <!-- テンプレートパーツ tab-list ここから↓ -->
                <div class="p-tab-list">
                    <div class="p-tab-list__inner">
                        <div class="p-tab-list__head">

                            <div class="p-tab-list__menu">
                                <div class="p-tab-list__menu-item p-tab-list__menu-item--all is-active">すべて</div>
                            </div>
                            <!-- //p-tab-list__menu -->
                        </div>
                        <!-- //p-tab-list__head -->
                        <div class="p-tab-list__content">
                            <div class="p-tab-list__sort">
                                <?php get_template_part('template-parts/sort'); ?>
                            </div>
                            <!-- //p-tab-list__sort -->
                            <div class="p-tab-list__content-item p-tab-list__content-item--all is-active">
                                <div class="p-card">

                                    <?php if (have_posts()) : ?>
                                        <?php while (have_posts()): ?>
                                            <?php the_post(); ?>
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
                                        <!-- 該当する投稿がない場合 -->
                                        <div class="p-card__null">
                                            <p class="p-card__null-text">投稿の準備中です。</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- //p-card -->

                            </div>
                            <!-- //p-tab-list__content-item -->

                            <!-- ページネーション ここから -->
                            <div class="p-home__pagination">
                                <?php get_template_part('template-parts/pagination'); ?>
                            </div>
                            <!-- ページネーション ここまで -->

                        </div>
                        <!-- //p-tab-list__content -->
                    </div>
                    <!-- //p-tab-list__inner -->

                </div>
                <!-- //p-tab-list -->
                <!-- テンプレートパーツ tab-list ここまで -->

            </div>
            <!-- //p-home__tab-list -->

            <div class="p-home__tag-list">
                <?php get_template_part('template-parts/tag-list'); ?>
            </div>
            <!-- //p-home__tag-list -->

        </div>
        <!-- //p-home__inner l-inner -->
    </section>
    <!-- セクションすべての記事ここまで -->

    <?php get_template_part('template-parts/cta'); ?>
</main>
<!-- !!メインここまで!! -->

<?php get_footer(); ?>