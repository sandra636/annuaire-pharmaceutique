<?php
/**
 * functions.php — Thème enfant Annuaire Pharma
 * Groupe 7 — Laboratoire 2
 */

// ============================================================
// 1. CHARGEMENT DES STYLES (parent + enfant + polices Google)
// ============================================================
function annuaire_pharma_enqueue_styles() {

    // Style du thème parent (Twenty Twenty-Four)
    wp_enqueue_style(
        'parent-style',
        get_template_directory_uri() . '/style.css'
    );

    // Style du thème enfant (le nôtre)
    wp_enqueue_style(
        'enfant-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'parent-style' ),
        wp_get_theme()->get( 'Version' )
    );

    // Polices Google Fonts
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Open+Sans:wght@400;600&display=swap',
        array(),
        null
    );
}
add_action( 'wp_enqueue_scripts', 'annuaire_pharma_enqueue_styles' );


// ============================================================
// 2. CONFIGURATION DE BASE DE WORDPRESS
// ============================================================
function annuaire_pharma_setup() {

    // Titre du site dans l'onglet navigateur
    add_theme_support( 'title-tag' );

    // Images mises en avant (miniatures d'articles)
    add_theme_support( 'post-thumbnails' );

    // Blocs Gutenberg alignés large/full
    add_theme_support( 'align-wide' );

    // Format HTML5 pour les formulaires, galeries, etc.
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // ---- Menus de navigation ----
    register_nav_menus( array(
        'menu-principal' => __( 'Menu Principal', 'annuaire-pharma' ),
        'menu-footer'    => __( 'Menu Pied de page', 'annuaire-pharma' ),
    ) );
}
add_action( 'after_setup_theme', 'annuaire_pharma_setup' );


// ============================================================
// 3. CUSTOM POST TYPE — PHARMACIE
//    (Pour l'annuaire des pharmacies — Étudiant 2 + 3)
// ============================================================
function annuaire_pharma_cpt_pharmacie() {

    $labels = array(
        'name'               => 'Pharmacies',
        'singular_name'      => 'Pharmacie',
        'add_new'            => 'Ajouter une pharmacie',
        'add_new_item'       => 'Ajouter une nouvelle pharmacie',
        'edit_item'          => 'Modifier la pharmacie',
        'view_item'          => 'Voir la pharmacie',
        'search_items'       => 'Rechercher une pharmacie',
        'not_found'          => 'Aucune pharmacie trouvée',
        'menu_name'          => 'Pharmacies',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => 'pharmacies' ),
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'menu_icon'          => 'dashicons-heart',   // icône dans le tableau de bord
        'show_in_rest'       => true,                // compatible éditeur Gutenberg
    );

    register_post_type( 'pharmacie', $args );
}
add_action( 'init', 'annuaire_pharma_cpt_pharmacie' );


// ============================================================
// 4. CUSTOM POST TYPE — MISSION
//    (Pour Étudiant 3 — zones géographiques, dates, bilans)
// ============================================================
function annuaire_pharma_cpt_mission() {

    $labels = array(
        'name'               => 'Missions',
        'singular_name'      => 'Mission',
        'add_new'            => 'Ajouter une mission',
        'add_new_item'       => 'Ajouter une nouvelle mission',
        'edit_item'          => 'Modifier la mission',
        'view_item'          => 'Voir la mission',
        'search_items'       => 'Rechercher une mission',
        'not_found'          => 'Aucune mission trouvée',
        'menu_name'          => 'Missions',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => 'missions' ),
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'menu_icon'          => 'dashicons-location-alt',
        'show_in_rest'       => true,
    );

    register_post_type( 'mission', $args );
}
add_action( 'init', 'annuaire_pharma_cpt_mission' );


// ============================================================
// 5. TAXONOMIE — ZONE GÉOGRAPHIQUE
//    (Pour filtrer les pharmacies par quartier/zone)
// ============================================================
function annuaire_pharma_taxonomie_zone() {

    $labels = array(
        'name'              => 'Zones géographiques',
        'singular_name'     => 'Zone géographique',
        'search_items'      => 'Rechercher une zone',
        'all_items'         => 'Toutes les zones',
        'edit_item'         => 'Modifier la zone',
        'add_new_item'      => 'Ajouter une zone',
        'menu_name'         => 'Zones',
    );

    register_taxonomy( 'zone', array( 'pharmacie', 'mission' ), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'rewrite'           => array( 'slug' => 'zone' ),
    ) );
}
add_action( 'init', 'annuaire_pharma_taxonomie_zone' );


// ============================================================
// 6. TAILLE DES IMAGES PERSONNALISÉES
// ============================================================
function annuaire_pharma_images() {
    add_image_size( 'carte-pharmacie', 400, 250, true );  // miniature carte annuaire
    add_image_size( 'vignette-article', 600, 350, true ); // vignette article blog
}
add_action( 'after_setup_theme', 'annuaire_pharma_images' );


// ============================================================
// 7. SIDEBAR (WIDGETS)
// ============================================================
function annuaire_pharma_widgets() {

    register_sidebar( array(
        'name'          => 'Barre latérale principale',
        'id'            => 'sidebar-1',
        'description'   => 'Widgets affichés dans la barre latérale',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => 'Pied de page — Colonne 1',
        'id'            => 'footer-1',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'annuaire_pharma_widgets' );


// ============================================================
// 8. LONGUEUR DE L'EXTRAIT (RÉSUMÉ D'ARTICLE)
// ============================================================
function annuaire_pharma_longueur_extrait( $length ) {
    return 25; // nombre de mots dans l'extrait
}
add_filter( 'excerpt_length', 'annuaire_pharma_longueur_extrait', 999 );

function annuaire_pharma_suite_extrait( $more ) {
    return '&hellip; <a href="' . get_permalink() . '" class="btn btn-primaire" style="font-size:0.85rem;padding:0.4rem 1rem;">Lire la suite</a>';
}
add_filter( 'excerpt_more', 'annuaire_pharma_suite_extrait' );
