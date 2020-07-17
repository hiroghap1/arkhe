<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * ターム用アーカイブページ
 */
$wp_obj  = get_queried_object();
$term_id = $wp_obj->term_id;

// リストタイプ
$list_type = apply_filters( 'arkhe_list_type_on_term', POST_LIST_TYPE, $term_id );

// アーカイブページのデータ
$archive_data = ARKHE_THEME::get_archive_data();

// 説明文
$term_description = $wp_obj->description;
?>
<div <?php post_class( ARKHE_THEME::main_body_class( false ) ); ?>>
	<?php
		if ( ! ARKHE_THEME::is_show_ttltop() ) :
			ARKHE_THEME::get_parts( 'archive/title', $archive_data );
		endif;
		if ( ! empty( $term_description ) ) :
	?>
			<div class="p-archive__desc"><?php echo do_shortcode( $term_description ); ?></div>
	<?php
		endif;
		// 投稿リスト
		ARKHE_THEME::get_parts( 'post_list/main_query', array( 'list_type' => $list_type ) );

		// ページャー
		the_posts_pagination(
			array(
				'mid_size'           => 2,
				'screen_reader_text' => null,
			)
		);
	?>
</div>