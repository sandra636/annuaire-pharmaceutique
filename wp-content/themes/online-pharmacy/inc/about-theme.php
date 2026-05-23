<?php
/**
 * Online Pharmacy Theme Page
 *
 * @package Online Pharmacy
 */

function online_pharmacy_admin_scripts() {
	wp_dequeue_script('online-pharmacy-custom-scripts');
}
add_action( 'admin_enqueue_scripts', 'online_pharmacy_admin_scripts' );

if ( ! defined( 'ONLINE_PHARMACY_FREE_THEME_URL' ) ) {
	define( 'ONLINE_PHARMACY_FREE_THEME_URL', 'https://www.themespride.com/products/free-pharmacy-wordpress-theme/' );
}
if ( ! defined( 'ONLINE_PHARMACY_PRO_THEME_URL' ) ) {
	define( 'ONLINE_PHARMACY_PRO_THEME_URL', 'https://www.themespride.com/products/online-pharmacy-wordpress-theme' );
}
if ( ! defined( 'ONLINE_PHARMACY_DEMO_THEME_URL' ) ) {
	define( 'ONLINE_PHARMACY_DEMO_THEME_URL', 'https://page.themespride.com/online-pharmacy-pro/' );
}
if ( ! defined( 'ONLINE_PHARMACY_DOCS_THEME_URL' ) ) {
    define( 'ONLINE_PHARMACY_DOCS_THEME_URL', 'https://page.themespride.com/demo/docs/online-pharmacy-pro/' );
}
if ( ! defined( 'ONLINE_PHARMACY_RATE_THEME_URL' ) ) {
    define( 'ONLINE_PHARMACY_RATE_THEME_URL', 'https://wordpress.org/support/theme/online-pharmacy/reviews/#new-post' );
}
if ( ! defined( 'ONLINE_PHARMACY_CHANGELOG_THEME_URL' ) ) {
    define( 'ONLINE_PHARMACY_CHANGELOG_THEME_URL', get_template_directory() . '/readme.txt' );
}
if ( ! defined( 'ONLINE_PHARMACY_SUPPORT_THEME_URL' ) ) {
    define( 'ONLINE_PHARMACY_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/online-pharmacy/' );
}
if ( ! defined( 'ONLINE_PHARMACY_THEME_BUNDLE' ) ) {
    define( 'ONLINE_PHARMACY_THEME_BUNDLE', 'https://www.themespride.com/products/wordpress-theme-bundle' );
}

/**
 * Add theme page
 */
function online_pharmacy_menu() {
	add_theme_page( esc_html__( 'About Theme', 'online-pharmacy' ), esc_html__( 'Begin Installation - Import Demo', 'online-pharmacy' ), 'edit_theme_options', 'online-pharmacy-about', 'online_pharmacy_about_display' );
}
add_action( 'admin_menu', 'online_pharmacy_menu' );

/**
 * Display About page
 */
function online_pharmacy_about_display() {
	$online_pharmacy_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">
		<!-- top-detail -->
		<?php
		// Only show if NOT dismissed
		if ( ! get_option('dismissed-get_started-detail', false ) ) { 
		?>
		    <!-- top-detail -->
		    <div class="detail-theme" id="detail-theme-box">
		        <button type="button" class="close-btn" id="close-detail-theme">
		            <?php esc_html_e( 'Dismiss', 'online-pharmacy' ); ?>
		        </button>
		        <?php 
				$online_pharmacy_theme = wp_get_theme(); 
				?>
				<h2>
				    <?php 
				    echo sprintf(
				        esc_html__( 'Hey, thank you for installing the %s theme!', 'online-pharmacy' ), 
				        esc_html( $online_pharmacy_theme->get( 'Name' ) )
				    ); 
				    ?>
				</h2>

		        <a href="<?php echo esc_url( admin_url( 'themes.php?page=online-pharmacy-about' ) ); ?>">
		            <?php esc_html_e( 'Get Started', 'online-pharmacy' ); ?>
		        </a>
		        <a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="site-editor" target="_blank">
		            <?php esc_html_e( 'Site Editor', 'online-pharmacy' ); ?>
		        </a>

		        <a href="<?php echo esc_url( ONLINE_PHARMACY_PRO_THEME_URL ); ?>" class="pro-btn-theme" target="_blank">
		            <?php esc_html_e( 'Upgrade to Pro', 'online-pharmacy' ); ?>
		        </a>

		        <a href="<?php echo esc_url( ONLINE_PHARMACY_THEME_BUNDLE ); ?>" class="rate-theme" target="_blank">
		            <?php esc_html_e( 'Get Bundle', 'online-pharmacy' ); ?>
		        </a>
		    </div>
		<?php 
		} ?>
		
		<nav class="nav-tab-wrapper wp-clearfix online-pharmacy-tab-sec" aria-label="<?php esc_attr_e( 'Secondary menu', 'online-pharmacy' ); ?>">
		    <button class="nav-tab online-pharmacy-tablinks active"
		        onclick="online_pharmacy_open_tab(event, 'tp_demo_import')">
		        <?php esc_html_e( 'One Click Demo Import', 'online-pharmacy' ); ?>
		    </button>

		    <button class="nav-tab online-pharmacy-tablinks"
		        onclick="online_pharmacy_open_tab(event, 'tp_about_theme')">
		        <?php esc_html_e( 'About', 'online-pharmacy' ); ?>
		    </button>

		    <button class="nav-tab online-pharmacy-tablinks"
		        onclick="online_pharmacy_open_tab(event, 'tp_free_vs_pro')">
		        <?php esc_html_e( 'Compare Free Vs Pro', 'online-pharmacy' ); ?>
		    </button>

		    <button class="nav-tab online-pharmacy-tablinks"
		        onclick="online_pharmacy_open_tab(event, 'tp_changelog')">
		        <?php esc_html_e( 'Changelog', 'online-pharmacy' ); ?>
		    </button>

		    <button class="nav-tab online-pharmacy-tablinks blink wp-bundle"
		        onclick="online_pharmacy_open_tab(event, 'tp_get_bundle')">
		        <?php esc_html_e( 'Get WordPress Theme Bundle (120+ Themes)', 'online-pharmacy' ); ?>
		    </button>
		</nav>

		<?php
			online_pharmacy_demo_import();

			online_pharmacy_main_screen();

			online_pharmacy_changelog_screen();

			online_pharmacy_free_vs_pro();

			online_pharmacy_get_bundle();
		?>

		<p class="actions theme-btns">
			<a target="_blank"href="<?php echo esc_url( ONLINE_PHARMACY_FREE_THEME_URL ); ?>" class="theme-info-btn" target="_blank" target="_blank"><?php esc_html_e( 'Theme Info', 'online-pharmacy' ); ?></a>
			<a target="_blank" href="<?php echo esc_url( ONLINE_PHARMACY_DEMO_THEME_URL ); ?>" class="view-demo" target="_blank"><?php esc_html_e( 'View Demo', 'online-pharmacy' ); ?></a>
			<a target="_blank" href="<?php echo esc_url( ONLINE_PHARMACY_DOCS_THEME_URL ); ?>" class="instruction-theme" target="_blank"><?php esc_html_e( 'Theme Documentation', 'online-pharmacy' ); ?></a>
			<a target="_blank" href="<?php echo esc_url( ONLINE_PHARMACY_PRO_THEME_URL ); ?>" class="pro-btn-theme" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'online-pharmacy' ); ?></a>
		</p>

		<h1><?php echo esc_html( $online_pharmacy_theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text content">
					<?php
					// Remove last sentence of description.
					$online_pharmacy_description = explode( '. ', $online_pharmacy_theme->get( 'Description' ) );
					array_pop( $online_pharmacy_description );

					$online_pharmacy_description = implode( '. ', $online_pharmacy_description );

					echo esc_html( $online_pharmacy_description . '.' );
				?></p>
				
			</div>
			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $online_pharmacy_theme->get_screenshot() ); ?>" />
			</div>
		</div>
	<?php
}


/**
 * Output the Demo Import screen (JS tab based).
 */
function online_pharmacy_demo_import() {

	/* ---------------------------------------------------------
	 * THEME-SPECIFIC OPTION KEYS (IMPORTANT FIX)
	 * --------------------------------------------------------- */
	$theme_slug           = get_stylesheet(); // parent or child automatically
	$demo_import_option   = $theme_slug . '_demo_imported';
	$demo_popup_option    = $theme_slug . '_demo_popup_shown';

	/* ---------------------------------------------------------
	 * LOAD WHIZZIE (CHILD FIRST, THEN PARENT)
	 * --------------------------------------------------------- */
	$child_whizzie  = get_stylesheet_directory() . '/inc/whizzie.php';
	$parent_whizzie = get_template_directory() . '/inc/whizzie.php';

	if ( file_exists( $child_whizzie ) ) {
		require_once $child_whizzie;
	} elseif ( file_exists( $parent_whizzie ) ) {
		require_once $parent_whizzie;
	}

	/* ---------------------------------------------------------
	 * SAVE DEMO IMPORT STATUS
	 * --------------------------------------------------------- */
	if ( isset( $_GET['import-demo'] ) && $_GET['import-demo'] === 'true' ) {
		update_option( $demo_import_option, true );
		delete_option( $demo_popup_option ); // allow popup once
	}

	/* ---------------------------------------------------------
	 * RESET DEMO (OPTIONAL)
	 * --------------------------------------------------------- */
	if ( isset( $_GET['reset-demo'] ) && $_GET['reset-demo'] === 'true' ) {
		delete_option( $demo_import_option );
		delete_option( $demo_popup_option );
		wp_safe_redirect( remove_query_arg( 'reset-demo' ) );
		exit;
	}

	$demo_imported  = get_option( $demo_import_option, false );
	$popup_shown    = get_option( $demo_popup_option, false );
	$show_popup_now = ( $demo_imported && ! $popup_shown );
	?>

	<div id="tp_demo_import" class="online-pharmacy-tabcontent">

	<?php if ( $demo_imported ) : ?>

		<!-- ================= SUCCESS STATE ================= -->
		<div class="content-row">
			<div class="col card success-demo text-center">
				<p class="imp-success">
					<?php esc_html_e( 'Demo Imported Successfully!', 'online-pharmacy' ); ?>
				</p><br>

				<div class="demo-button-three">
					<a class="button button-primary" href="<?php echo esc_url( home_url('/') ); ?>" target="_blank">
						<?php esc_html_e( 'View Site', 'online-pharmacy' ); ?>
					</a>

					<a class="button button-primary" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Edit Site', 'online-pharmacy' ); ?>
					</a>

					<?php if ( defined( 'ONLINE_PHARMACY_DOCS_THEME_URL' ) ) : ?>
						<a class="button button-primary" href="<?php echo esc_url( ONLINE_PHARMACY_DOCS_THEME_URL ); ?>" target="_blank">
							<?php esc_html_e( 'Documentation', 'online-pharmacy' ); ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
			<div class="theme-price col card">
			<div class="price-flex">
				<div class="price-content">
					<?php 
						$online_pharmacy_theme = wp_get_theme();
						?>
						<h3>
						    <?php 
						    echo sprintf(
						        esc_html__( '%s WordPress Theme ', 'online-pharmacy' ),
						        esc_html( $online_pharmacy_theme->get( 'Name' ) )
						    ); 
						    ?>
						</h3>
					<p class="main-flash"><?php 
					  printf(
					    /* translators: 1: bold FLASH DEAL text, 2: discount code */
					    esc_html__( '%1$s - Get 20%% Discount on All Themes, Use code %2$s', 'online-pharmacy' ),
					    '<strong class="bold-text">' . esc_html__( 'FLASH DEAL', 'online-pharmacy' ) . '</strong>',
					    '<strong class="bold-text">' . esc_html__( 'QBSALE20', 'online-pharmacy' ) . '</strong>'
					  ); 
					  ?></p>
					 <p>
					  <del><?php echo esc_html__( '$59', 'online-pharmacy' ); ?></del>
					  <strong class="bold-price"><?php echo esc_html__( '$39', 'online-pharmacy' ); ?></strong>
					</p>
				</div>
				<div class="price-img">
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/theme-img.png" alt="theme-img" />
				</div>
			</div>
			<div class="main-pro-price">
				<?php 
					$online_pharmacy_theme = wp_get_theme();
					?>
				<a target="_blank" href="<?php echo esc_url( ONLINE_PHARMACY_PRO_THEME_URL ); ?>" class="pro-btn-theme price-pro">
				    <?php 
				    echo sprintf(
				        esc_html__( 'Upgrade To Premium %s Theme', 'online-pharmacy' ),
				        esc_html( $online_pharmacy_theme->get( 'Name' ) )
				    ); 
				    ?>
				</a>
			</div>
		</div>
		</div>

	<?php else : ?>

		<!-- ================= INSTALL STATE ================= -->
		<div class="content-row">
			<div class="col card demo-btn text-center">
				<form id="demo-importer-form" method="post">
					<p class="demo-title"><?php esc_html_e( 'Demo Importer', 'online-pharmacy' ); ?></p>
					<p class="demo-des">
						<?php esc_html_e( 'Import demo content with one click. You can customize everything later.', 'online-pharmacy' ); ?>
					</p>

					<button type="submit" class="button button-primary">
						<?php esc_html_e( 'Begin Installation – Import Demo', 'online-pharmacy' ); ?>
					</button>

					<div id="page-loader" style="display:none;margin-top:15px;">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/loader.png' ); ?>" width="40">
						<p><?php esc_html_e( 'Importing demo, please wait...', 'online-pharmacy' ); ?></p>
					</div>
				</form>
			</div>
			<div class="theme-price col card">
			<div class="price-flex">
				<div class="price-content">
					<?php 
						$online_pharmacy_theme = wp_get_theme();
						?>
						<h3>
						    <?php 
						    echo sprintf(
						        esc_html__( '%s WordPress Theme ', 'online-pharmacy' ),
						        esc_html( $online_pharmacy_theme->get( 'Name' ) )
						    ); 
						    ?>
						</h3>
					<p class="main-flash"><?php 
					  printf(
					    /* translators: 1: bold FLASH DEAL text, 2: discount code */
					    esc_html__( '%1$s - Get 20%% Discount on All Themes, Use code %2$s', 'online-pharmacy' ),
					    '<strong class="bold-text">' . esc_html__( 'FLASH DEAL', 'online-pharmacy' ) . '</strong>',
					    '<strong class="bold-text">' . esc_html__( 'QBSALE20', 'online-pharmacy' ) . '</strong>'
					  ); 
					  ?></p>
					 <p>
					  <del><?php echo esc_html__( '$59', 'online-pharmacy' ); ?></del>
					  <strong class="bold-price"><?php echo esc_html__( '$39', 'online-pharmacy' ); ?></strong>
					</p>
				</div>
				<div class="price-img">
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/theme-img.png" alt="theme-img" />
				</div>
			</div>
			<div class="main-pro-price">
				<?php 
					$online_pharmacy_theme = wp_get_theme();
					?>
				<a target="_blank" href="<?php echo esc_url( ONLINE_PHARMACY_PRO_THEME_URL ); ?>" class="pro-btn-theme price-pro">
				    <?php 
				    echo sprintf(
				        esc_html__( 'Upgrade To Premium %s Theme', 'online-pharmacy' ),
				        esc_html( $online_pharmacy_theme->get( 'Name' ) )
				    ); 
				    ?>
				</a>
			</div>
		</div>
		</div>

		<script>
		jQuery(function($){
			$('#demo-importer-form').on('submit', function(e){
				e.preventDefault();
				if(confirm('<?php esc_html_e( 'Are you sure you want to import demo content?', 'online-pharmacy' ); ?>')){
					$('#page-loader').show();
					let url = new URL(window.location.href);
					url.searchParams.set('import-demo','true');
					window.location.href = url;
				}
			});
		});
		</script>

	<?php endif; ?>

	</div>

	<?php if ( $show_popup_now ) : ?>
	<!-- ================= SUCCESS POPUP (ONCE PER THEME) ================= -->
	<div id="demo-success-modal" class="modal-overlay">
		<div class="modal-content">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/demo-icon.png' ); ?>" alt="">
			<h2><?php esc_html_e( 'Demo Successfully Imported!', 'online-pharmacy' ); ?></h2>

			<div class="modal-buttons">
				<a class="button button-primary" href="<?php echo esc_url( home_url('/') ); ?>" target="_blank">
					<?php esc_html_e( 'View Site', 'online-pharmacy' ); ?>
				</a>
				<a class="button" href="<?php echo esc_url( admin_url( 'themes.php?page=online-pharmacy-about' ) ); ?>">
					<?php esc_html_e( 'Go To Dashboard', 'online-pharmacy' ); ?>
				</a>
			</div>
		</div>
	</div>

	<script>
	document.addEventListener("DOMContentLoaded", function () {
		const modal = document.getElementById("demo-success-modal");
		if (!modal) return;

		modal.style.display = "flex";

		fetch('<?php echo esc_url( admin_url( 'admin-ajax.php?action=online_pharmacy_popup_done' ) ); ?>');

		modal.querySelectorAll('a.button').forEach(btn => {
			btn.addEventListener('click', () => modal.style.display = "none");
		});
	});
	</script>
	<?php endif; ?>
<?php
}

/**
 * Output the main about screen.
 */
function online_pharmacy_main_screen() {
	
	?>
	<div id="tp_about_theme" class="online-pharmacy-tabcontent">
		<div class="content-row">
			<div class="feature-section two-col">
				<div class="col card">
					<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'online-pharmacy' ); ?></h2>
					<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'online-pharmacy' ) ?></p>
					<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'online-pharmacy' ); ?></a></p>
				</div>

				<div class="col card">
					<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'online-pharmacy' ); ?></h2>
					<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'online-pharmacy' ) ?></p>
					<p><a target="_blank" href="<?php echo esc_url( ONLINE_PHARMACY_SUPPORT_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'online-pharmacy' ); ?></a></p>
				</div>
			</div>
			<div class="theme-price col card">
				<div class="price-flex">
					<div class="price-content">
						<?php 
						$online_pharmacy_theme = wp_get_theme();
						?>
						<h3>
						    <?php 
						    echo sprintf(
						        esc_html__( '%s WordPress Theme ', 'online-pharmacy' ),
						        esc_html( $online_pharmacy_theme->get( 'Name' ) )
						    ); 
						    ?>
						</h3>
						<p class="main-flash"><?php 
						  printf(
						    /* translators: 1: bold FLASH DEAL text, 2: discount code */
						    esc_html__( '%1$s - Get 20%% Discount on All Themes, Use code %2$s', 'online-pharmacy' ),
						    '<strong class="bold-text">' . esc_html__( 'FLASH DEAL', 'online-pharmacy' ) . '</strong>',
						    '<strong class="bold-text">' . esc_html__( 'QBSALE20', 'online-pharmacy' ) . '</strong>'
						  ); 
						  ?></p>
						 <p>
						  <del><?php echo esc_html__( '$59', 'online-pharmacy' ); ?></del>
						  <strong class="bold-price"><?php echo esc_html__( '$39', 'online-pharmacy' ); ?></strong>
						</p>
					</div>
					<div class="price-img">
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/theme-img.png" alt="theme-img" />
					</div>
				</div>
				<div class="main-pro-price">
					<?php 
					$online_pharmacy_theme = wp_get_theme();
					?>
					<a target="_blank" href="<?php echo esc_url( ONLINE_PHARMACY_PRO_THEME_URL ); ?>" class="pro-btn-theme price-pro">
					    <?php 
					    echo sprintf(
					        esc_html__( 'Upgrade To Premium %s Theme', 'online-pharmacy' ),
					        esc_html( $online_pharmacy_theme->get( 'Name' ) )
					    ); 
					    ?>
					</a>
				</div>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Output the changelog screen.
 */
function online_pharmacy_changelog_screen() {
		global $wp_filesystem;
	?>
	<div id="tp_changelog" class="online-pharmacy-tabcontent">
	<div class="content-row">
		<div class="wrap about-wrap change-log">
			<?php
				$changelog_file = apply_filters( 'online_pharmacy_changelog_file', ONLINE_PHARMACY_CHANGELOG_THEME_URL );
				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = online_pharmacy_parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
		<div class="theme-price col card">
				<div class="price-flex">
					<div class="price-content">
						<?php 
						$online_pharmacy_theme = wp_get_theme();
						?>
						<h3>
						    <?php 
						    echo sprintf(
						        esc_html__( '%s WordPress Theme ', 'online-pharmacy' ),
						        esc_html( $online_pharmacy_theme->get( 'Name' ) )
						    ); 
						    ?>
						</h3>
						<p class="main-flash"><?php 
						  printf(
						    /* translators: 1: bold FLASH DEAL text, 2: discount code */
						    esc_html__( '%1$s - Get 20%% Discount on All Themes, Use code %2$s', 'online-pharmacy' ),
						    '<strong class="bold-text">' . esc_html__( 'FLASH DEAL', 'online-pharmacy' ) . '</strong>',
						    '<strong class="bold-text">' . esc_html__( 'QBSALE20', 'online-pharmacy' ) . '</strong>'
						  ); 
						  ?></p>
						 <p>
						  <del><?php echo esc_html__( '$59', 'online-pharmacy' ); ?></del>
						  <strong class="bold-price"><?php echo esc_html__( '$39', 'online-pharmacy' ); ?></strong>
						</p>
					</div>
					<div class="price-img">
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/theme-img.png" alt="theme-img" />
					</div>
				</div>
				<div class="main-pro-price">
					<?php 
					$online_pharmacy_theme = wp_get_theme();
					?>
					<a target="_blank" href="<?php echo esc_url( ONLINE_PHARMACY_PRO_THEME_URL ); ?>" class="pro-btn-theme price-pro">
					    <?php 
					    echo sprintf(
					        esc_html__( 'Upgrade To Premium %s Theme', 'online-pharmacy' ),
					        esc_html( $online_pharmacy_theme->get( 'Name' ) )
					    ); 
					    ?>
					</a>
				</div>
			</div>
	</div>
</div>
	<?php
}

/**
 * Parse changelog from readme file.
 * @param  string $content
 * @return string
 */
function online_pharmacy_parse_changelog( $content ) {
	// Explode content with ==  to juse separate main content to array of headings.
	$content = explode ( '== ', $content );

	$changelog_isolated = '';

	// Get element with 'Changelog ==' as starting string, i.e isolate changelog.
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}

	// Now Explode $changelog_isolated to manupulate it to add html elements.
	$changelog_array = explode( '= ', $changelog_isolated );

	// Unset first element as it is empty.
	unset( $changelog_array[0] );

	$changelog = '<pre class="changelog">';

	foreach ( $changelog_array as $value) {
		// Replace all enter (\n) elements with </span><span> , opening and closing span will be added in next process.
		$value = preg_replace( '/\n+/', '</span><span>', $value );

		// Add openinf and closing div and span, only first span element will have heading class.
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div>';

		// Remove empty <span></span> element which newr formed at the end.
		$changelog .= str_replace( '<span></span>', '', $value );
	}

	$changelog .= '</pre>';

	return wp_kses_post( $changelog );
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function online_pharmacy_free_vs_pro() {
	?>
	<div id="tp_free_vs_pro" class="online-pharmacy-tabcontent">
	<div class="content-row">
		<div class="wrap about-wrap change-log">
			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'online-pharmacy' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'online-pharmacy' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'online-pharmacy' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'Theme Demo Set Up', 'online-pharmacy' ); ?></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Templates, Color options and Fonts', 'online-pharmacy' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Included Demo Content', 'online-pharmacy' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Section Ordering', 'online-pharmacy' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Multiple Sections', 'online-pharmacy' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Plugins', 'online-pharmacy' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Premium Technical Support', 'online-pharmacy' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access to Support Forums', 'online-pharmacy' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Free updates', 'online-pharmacy' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Unlimited Domains', 'online-pharmacy' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Responsive Design', 'online-pharmacy' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Live Customizer', 'online-pharmacy' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a class="sidebar-button single-btn" href="<?php echo esc_url(ONLINE_PHARMACY_PRO_THEME_URL);?>" target="_blank"><?php esc_html_e( 'Go For Premium', 'online-pharmacy' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="theme-price col card">
			<div class="price-flex">
				<div class="price-content">
					<?php 
						$online_pharmacy_theme = wp_get_theme();
						?>
						<h3>
						    <?php 
						    echo sprintf(
						        esc_html__( '%s WordPress Theme ', 'online-pharmacy' ),
						        esc_html( $online_pharmacy_theme->get( 'Name' ) )
						    ); 
						    ?>
						</h3>
					<p class="main-flash"><?php 
					  printf(
					    /* translators: 1: bold FLASH DEAL text, 2: discount code */
					    esc_html__( '%1$s - Get 20%% Discount on All Themes, Use code %2$s', 'online-pharmacy' ),
					    '<strong class="bold-text">' . esc_html__( 'FLASH DEAL', 'online-pharmacy' ) . '</strong>',
					    '<strong class="bold-text">' . esc_html__( 'QBSALE20', 'online-pharmacy' ) . '</strong>'
					  ); 
					  ?></p>
					 <p>
					  <del><?php echo esc_html__( '$59', 'online-pharmacy' ); ?></del>
					  <strong class="bold-price"><?php echo esc_html__( '$39', 'online-pharmacy' ); ?></strong>
					</p>
				</div>
				<div class="price-img">
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/theme-img.png" alt="theme-img" />
				</div>
			</div>
			<div class="main-pro-price">
				<?php 
					$online_pharmacy_theme = wp_get_theme();
					?>
				<a target="_blank" href="<?php echo esc_url( ONLINE_PHARMACY_PRO_THEME_URL ); ?>" class="pro-btn-theme price-pro">
				    <?php 
				    echo sprintf(
				        esc_html__( 'Upgrade To Premium %s Theme', 'online-pharmacy' ),
				        esc_html( $online_pharmacy_theme->get( 'Name' ) )
				    ); 
				    ?>
				</a>
			</div>
		</div>
	</div>
</div>
	<?php
}

function online_pharmacy_get_bundle() {
	?>
	<div id="tp_get_bundle" class="online-pharmacy-tabcontent">
		<div class="wrap about-wrap theme-main-bundle">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/theme-bundle.png" alt="theme-bundle" width="300" height="300" />
			<p class="bundle-link"><a target="_blank" href="<?php echo esc_url( ONLINE_PHARMACY_THEME_BUNDLE ); ?>" class="button button-primary bundle-btn"><?php esc_html_e( 'Buy WordPress Theme Bundle (120+ Themes)', 'online-pharmacy' ); ?></a></p>
		</div>
	</div>
	<?php
}