<?php get_header(); ?>

<main class="l-main">
    <section class="p-category l-section">
        <div class="p-category__inner l-inner">
            <?php $tag = get_queried_object(); ?><!-- 現在開いているタグを取得 -->
            <?php $tag_name = $tag->name; ?><!-- 現在開いているタグの名前を取得 -->
            <?php $tag_slug = $tag->slug; ?><!-- 現在開いているタグのスラッグ名を取得 -->
            <div class="p-tag__heading">
                <h2 class="c-heading c-heading--tag">#<?php echo esc_html($tag_name); ?>の検索結果</h2>
            </div>

            <div class="p-tag-search__tab-list">
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
                            <div id="tabSearch"
                                class="p-tab-list__content-item is-active">
                                <div class="p-card">
                                    <?php $tag_slug = $tag->slug; ?><!-- 現在開いているタグのスラッグ名を取得 -->
                                    <?php $tag_query = new WP_Query(
                                        array(
                                            'post_type'      => 'post',
                                            'tag'            => $tag_slug, // 現在のカテゴリスラッグを指定
                                            'posts_per_page' => 9,            // 表示する記事数
                                            'order'          => 'DESC',       // 降順で表示
                                            'orderby'        => 'date',       // 日付で並べる
                                            'paged'          => get_query_var('paged') ? get_query_var('paged') : 1, // ページネーション対応
                                        )
                                    );
                                    ?>
                                    <?php if ($tag_query->have_posts()) : ?>
                                        <?php while ($tag_query->have_posts()): ?>
                                            <?php $tag_query->the_post(); ?>
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

                        </div>
                        <!-- //p-tab-list__content -->
                    </div>
                    <!-- //p-tab-list__inner -->

                </div>
                <!-- //p-tab-list -->
                <!-- テンプレートパーツ tab-list ここまで -->

                <!-- ページネーション ここから↓ -->
                <div class="p-tag-search__pagination">
                    <div class="c-pagination c-pager" style="margin-top: <?php echo ($tag_query->max_num_pages > 1) ? '56px' : '0'; ?>;">
                        <?php
                        $pagination_args = array(
                            'total'        => $tag_query->max_num_pages,  // 総ページ数を指定
                            'current'      => max(1, get_query_var('paged')),  // 現在のページを指定
                            'end_size'     => 1,  // 最初と最後に表示するページ番号の数
                            'mid_size'     => 2,  // 現在のページの前後に表示するページ番号の数
                            'prev_next'    => true,  // 前へ/次へリンクを表示するかどうか
                            'prev_text'    => '<span class="c-pager__prev"></span>',
                            'next_text'    => '<span class="c-pager__next"></span>',
                        );
                        echo paginate_links($pagination_args);
                        ?>
                    </div>
                </div>

                <!-- //p-tag-search__pagination -->
                <!-- ページネーション ここまで -->
            </div>
            <!-- //p-tag-search__tab-list -->

            <div class="p-tag-search__tag-list">
                <?php get_template_part('template-parts/tag-list'); ?>
            </div>
            <!-- //p-tag-search__tag-list -->


        </div>
        <!-- //p-tag-search__inner l-inner -->
    </section>
    <!-- セクションすべての記事ここまで -->

    <?php get_template_part('template-parts/cta'); ?>
</main>
<!-- !!メインここまで!! -->

<?php get_footer(); ?>