<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * 投稿ページのタイトル部分
 * $parts_args['post_id'] : 投稿IDが渡ってくる
 * $parts_args['post_title'] : 投稿タイトルが渡ってくる
 */
$the_id = isset( $parts_args['post_id'] ) ? $parts_args['post_id'] : get_the_ID();

// アイキャッチ画像のソースを取得
$thumb_m_url = get_the_post_thumbnail_url( $the_id, 'medium' );

// アイキャッチがあれば
if ( $thumb_m_url ) : ?>
	<figure class="p-entry__thumb">
		<?php // @codingStandardsIgnoreStart
			echo ARKHE_THEME::get_thumbnail(
				$the_id,
				array(
					'sizes'       => '(min-width: 800px) 800px, 100vw',
					'class'       => 'p-entry__thumb__img',
					'placeholder' => $thumb_m_url
				)
			);
		// @codingStandardsIgnoreEnd ?>
	</figure>
<?php
endif;