<?php if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * 著者情報を出力する
 *   $parts_args['author_id'] : 著者ID
 */
$author_id = isset( $parts_args['author_id'] ) ? $parts_args['author_id'] : 0;


// 著者データを取得
$author_data = get_userdata( $author_id );
if ( ! $author_data ) return;

// ユーザーデータ
$author_name = $author_data->display_name;
$description = $author_data->description;
$position    = get_the_author_meta( 'position', $author_id ); // 'position' は ADDONから追加される
$icon_links  = array();

$the_user_link_url = $author_data->user_url;
if ( $the_user_link_url ) {
	$icon_links['home'] = $the_user_link_url;
}

$icon_links = apply_filters( 'arkhe_author_icon_links', $icon_links, $author_id );
?>
<div class="p-authorBox">
	<figure class="p-authorBox__avatar">
		<?php echo get_avatar( $author_id, 100, '', $author_name . 'のアバター' ); ?>
	</figure>
	<div class="p-authorBox__body">
		<?php if ( ! is_author() ) : ?>
			<span class="p-authorBox__name"><?php echo esc_html( $author_name ); ?></span>
		<?php endif; ?>
		<?php if ( $position ) : ?>
			<span class="p-authorBox__position u-color-thin"><?php echo esc_html( $position ); ?></span>
		<?php endif; ?>

		<?php if ( $description ) : ?>
			<p class="p-authorBox__description u-color-thin">
				<?php echo wp_kses_post( nl2br( $description ) ); ?>
			</p>
		<?php endif; ?>

		<div class="p-authorBox__links">
			<?php if ( $the_user_link_url ) : ?>
				<div class="p-authorBox__weblink">
					<i class="arkhe-icon-link" role="presentation"></i> : 
					<a href="<?php echo esc_url( $the_user_link_url ); ?>" target="_blank" rel="noopener" class=""><?php echo esc_html( $the_user_link_url ); ?></a>
				</div>
			<?php endif; ?>
			<?php if ( ! is_author() ) : ?>
				<div class="p-authorBox__archivelink">
					<a href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>" target="_blank" rel="noopener" class=""><?php esc_html_e( 'To article list', 'arkhe' ); ?></a>
				</div>
			<?php endif; ?>
			<?php
				// SNS情報があればアイコン表示
				// if ( ! empty( $icon_links ) ) :
				// 	ARKHE_THEME::get_parts(
				// 		'others/icon_list',
				// 		array(
				// 			'list_data' => $icon_links,
				// 			'class'     => 'p-authorBox__iconList',
				// 		)
				// 	);
				// endif;
			?>
		</div>
	</div>

</div>