<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * 関連記事リストの出力テンプレート（サブループ内）
 *   $args['count'] : 現在のループカウント数 (フック用に用意)
 */
$post_data = get_post();
$the_id    = $post_data->ID;
$date      = new DateTime( $post_data->post_date );

?>
<li class="p-postList__item">
	<a href="<?php the_permalink( $the_id ); ?>" class="p-postList__link">
		<div class="p-postList__thumb c-postThumb<?php echo ! has_post_thumbnail( $the_id ) ? ' has-nothumb' : ''; ?>">
			<figure class="c-postThumb__figure">
				<?php
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo ARKHE_THEME::get_thumbnail(
						$the_id,
						array(
							'size'        => 'medium',
							'sizes'       => '(min-width: 600px) 400px, 50vw',
							'class'       => 'c-postThumb__img',
						)
					);
				?>
			</figure>
		</div>
		<div class="p-postList__body">
			<div class="p-postList__title"><?php the_title(); ?></div>
			<div class="p-postList__meta">
				<div class="p-postList__times c-postTimes u-color-thin">
					<?php ARKHE_THEME::the_date_time( $date, 'posted', false ); ?>
				</div>
			</div>
		</div>
	</a>
</li>
