<?php
/**
 * @package WordPress
 * @subpackage My Web
 * @since My web Site 1.0
 **
 */

/* HABILITAR / DESABILITAR */
add_theme_support( 'post-thumbnails' );

// Unable admin bar
add_filter('show_admin_bar', '__return_false');

add_post_type_support( 'post', 'excerpt' );
add_post_type_support( 'page', 'excerpt' );

// remove itens padrões
add_action( 'init', 'my_custom_init' );
function my_custom_init() {
	//remove_post_type_support( 'post', 'editor' );
	//remove_post_type_support('page', 'editor');
	//remove_post_type_support( 'page', 'thumbnail' );
}

// REMOVE PARENT PAGE
function remove_post_custom_fields() {
	remove_meta_box( 'pageparentdiv' , 'page' , 'side' ); 
}
add_action( 'admin_menu' , 'remove_post_custom_fields' );

// Remove tags
function myprefix_unregister_tags() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'myprefix_unregister_tags');


/* MENUS */
add_action( 'after_setup_theme', 'register_menu' );
function register_menu() {
  register_nav_menu( 'primary', __( 'Primary Menu', 'header' ) );
}

/* ADICIONA CLASSE */
add_filter( 'body_class', function( $classes ) {
    return array_merge( $classes, array( 'page' ) );
} );

function gera_url_encurtada($url){
    $url = urlencode($url);
    $xml =  simplexml_load_file("http://migre.me/api.xml?url=$url");
 
    if($xml->error != 0){
        return $xml->errormessage;
    }
    else{
        return $xml->migre;
    }
}


// muda nome post
/*
function change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Produtos';
    $submenu['edit.php'][5][0] = 'Todos os Produtos';
    $submenu['edit.php'][10][0] = 'Adicionar Produtos';
    echo '';
}
function change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Produtos';
    $labels->singular_name = 'Produtos';
    $labels->add_new = 'Adicionar Produto';
    $labels->add_new_item = 'Adicionar Produto';
    $labels->edit_item = 'Editar Produto';
    $labels->new_item = 'Produto';
    $labels->view_item = 'Ver Produto';
    $labels->search_items = 'Buscar Produto';
    $labels->not_found = 'Nenhum produto encontrado';
    $labels->not_found_in_trash = 'Nenhum produto encontrado na lixeira';
    $labels->all_items = 'Todos os Produtos';
    $labels->menu_name = 'Produtos';
    $labels->name_admin_bar = 'Produtos';
} 
add_action( 'admin_menu', 'change_post_label' );
add_action( 'init', 'change_post_object' );
*/


/* PAGINAS CONFIGURAÇÕES */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Configurações',
		'menu_title'	=> 'Configurações',
		'menu_slug' 	=> 'configuracoes-geral',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Configurações Gerais',
		'menu_title'	=> 'Geral',
		'parent_slug'	=> 'configuracoes-geral',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'SEO',
		'menu_title'	=> 'SEO',
		'parent_slug'	=> 'configuracoes-geral',
	));
}

/* PAGINAÇÃO */
function paginacao() {
    global $wp_query;
    $big = 999999999; // need an unlikely integer
    $pages = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'prev_next' => false,
            'type'  => 'array',
            'prev_next'   => TRUE,
			'prev_text'    => __('<i class="fa fa-2x fa-angle-left"></i>'),
			'next_text'    => __('<i class="fa fa-2x fa-angle-right"></i>'),
        ) );
        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<ul class="paginacao">';
            foreach ( $pages as $page ) {
                    echo "<li>$page</li>";
            }
           echo '</ul>';
        }
}

// NOVOS POST TYPES 

	function servicos_post_type(){
		register_post_type('servicos', array( 
			'labels'            =>  array(
				'name'          =>      __('Serviços'),
				'singular_name' =>      __('Serviço'),
				'all_items'     =>      __('Todos'),
				'add_new'       =>      __('Adicionar'),
				'add_new_item'  =>      __('Adicionar'),
				'edit_item'     =>      __('Editar'),
				'view_item'     =>      __('Visualizar'),
				'search_items'  =>      __('Pesquisar'),
				'no_found'      =>      __('Nenhum item encontrato'),
				'not_found_in_trash' => __('A lixeira está vazia.')
			),
			'public'            =>  true,
			'publicly_queryable'=>  true,
			'show_ui'           =>  true, 
			'query_var'         =>  true,
			'show_in_nav_menus' =>  false,
			'capability_type'   =>  'post',
			'hierarchical'      =>  true,
			'rewrite'=> [
				'slug' => 'servicos',
				"with_front" => false
			],
			"cptp_permalink_structure" => "/%postname%/",
			'menu_position'     =>  21,
			'supports'          =>  array('title','thumbnail','excerpt','editor'),
			'has_archive'       =>  true,
			'menu_icon' => 'dashicons-admin-tools'
		));
		flush_rewrite_rules();
	}
	add_action('init', 'servicos_post_type');
	/*
	function representantes_taxonomy() {  
		register_taxonomy(  
			'representantes_taxonomy',  
			'representantes',        
			array(
				'label' => __( 'Categorias' ),
				'rewrite'=> [
					'slug' => 'representantes',
					"with_front" => false
				],
				"cptp_permalink_structure" => "/representantes/",
				'hierarchical'               => true,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_nav_menus'          => true,
				'query_var' => true
			) 
		);  
	}  
	add_action( 'init', 'representantes_taxonomy');*/


/*
	function musicas_post_type(){
		register_post_type('musicas', array( 
			'labels'            =>  array(
				'name'          =>      __('Músicas'),
				'singular_name' =>      __('Músicas'),
				'all_items'     =>      __('Todas as músicas'),
				'add_new'       =>      __('Adicionar novo'),
				'add_new_item'  =>      __('Adicionar novo'),
				'edit_item'     =>      __('Editar'),
				'view_item'     =>      __('Visualizar'),
				'search_items'  =>      __('Pesquisar'),
				'no_found'      =>      __('Nenhum item encontrato'),
				'not_found_in_trash' => __('A lixeira está vazia.')
			),
			'public'            =>  true,
			'publicly_queryable'=>  true,
			'show_ui'           =>  true, 
			'query_var'         =>  true,
			'show_in_nav_menus' =>  false,
			'capability_type'   =>  'post',
			'hierarchical'      =>  true,
			'rewrite'=> [
				'slug' => 'musicas',
				"with_front" => false
			],
			"cptp_permalink_structure" => "/%postname%/",
			'menu_position'     =>  21,
			'supports'          =>  array('title','excerpt','thumbnail','editor'),
			'has_archive'       =>  true,
			'menu_icon' => 'dashicons-format-audio'
		));
		flush_rewrite_rules();
	}
	add_action('init', 'musicas_post_type');
	/*function musicas_taxonomy() {  
		register_taxonomy(  
			'musicas_taxonomy',  
			'musicas',        
			array(
				'label' => __( 'Categorias' ),
				'rewrite'=> [
					'slug' => 'musicas',
					"with_front" => false
				],
				"cptp_permalink_structure" => "/musicas/",
				'hierarchical'               => true,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_nav_menus'          => true,
				'query_var' => true
			) 
		);  
	}  
	add_action( 'init', 'musicas_taxonomy');



	function produtos_post_type(){
		register_post_type('produtos', array( 
			'labels'            =>  array(
				'name'          =>      __('Produtos'),
				'singular_name' =>      __('Produtos'),
				'all_items'     =>      __('Todos'),
				'add_new'       =>      __('Adicionar'),
				'add_new_item'  =>      __('Adicionar'),
				'edit_item'     =>      __('Editar'),
				'view_item'     =>      __('Visualizar'),
				'search_items'  =>      __('Pesquisar'),
				'no_found'      =>      __('Nenhum item encontrato'),
				'not_found_in_trash' => __('A lixeira está vazia.')
			),
			'public'            =>  true,
			'publicly_queryable'=>  true,
			'show_ui'           =>  true, 
			'query_var'         =>  true,
			'show_in_nav_menus' =>  false,
			'capability_type'   =>  'post',
			'hierarchical'      =>  true,
			'rewrite'=> [
				'slug' => 'produtos',
				"with_front" => false
			],
			"cptp_permalink_structure" => "/%produtos_taxonomy%/%postname%/",
			'menu_position'     =>  21,
			'supports'          =>  array('title','editor','excerpt','thumbnail'),
			'has_archive'       =>  true,
			'menu_icon' => 'dashicons-tag'
		));
		flush_rewrite_rules();
	}
	add_action('init', 'produtos_post_type');
	function produtos_taxonomy() {  
		register_taxonomy(  
			'produtos_taxonomy',  
			'produtos',        
			array(
				'label' => __( 'Categorias' ),
				'rewrite'=> [
					'slug' => 'produtos',
					"with_front" => false
				],
				"cptp_permalink_structure" => "/%produtos_taxonomy%/",
				'hierarchical'               => true,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_nav_menus'          => true,
				'query_var' => true
			) 
		);  
	}  
	add_action( 'init', 'produtos_taxonomy');

/* POST TYPE */


$producao = false;
if($producao){
	add_action('admin_head', 'my_custom_fonts');

	function my_custom_fonts() {
	  echo '<style>
		#menu-media, #menu-comments, /*#menu-appearance, #menu-plugins, */#menu-tools, #menu-settings, #toplevel_page_edit-post_type-acf, #toplevel_page_edit-post_type-acf-field-group, 
		#toplevel_page_zilla-likes, 
		#screen-options-link-wrap, 
		.acf-postbox h2 a, 
		#the-list #post-94, 
		#the-list #post-65, 
		#commentstatusdiv, 
		#commentsdiv, 
		#toplevel_page_wpglobus_options, 
		.taxonomy-category .form-field.term-parent-wrap, 
		.wp-menu-separator, 
		#menu-appearance li:nth-child(1), 
		#menu-appearance li:nth-child(2), 
		#menu-appearance li:nth-child(3) 
		{
			display: none!important;
		}
	  </style>';

	  echo '
		<script type="text/javascript">
			jQuery.noConflict();

			jQuery("document").ready(function(){
				jQuery("#menu-media").remove();
				jQuery("#menu-comments").remove();
				/*jQuery("#menu-appearance").remove();
				jQuery("#menu-plugins").remove();*/
				jQuery("#menu-tools").remove();
				jQuery("#menu-settings").remove();
				jQuery("#toplevel_page_edit-post_type-acf").remove();
				jQuery("#toplevel_page_edit-post_type-acf-field-group").remove();
				jQuery("#toplevel_page_zilla-likes").html("");
				jQuery(".taxonomy-category .form-field.term-parent-wrap").remove();
				jQuery(".wp-menu-separator").remove();
				jQuery("#toplevel_page_pmxi-admin-home li:nth-child(1)").remove();
				jQuery("#toplevel_page_pmxi-admin-home li:nth-child(3)").remove();
				jQuery("#toplevel_page_pmxi-admin-home li:nth-child(4)").remove();
				jQuery("#toplevel_page_pmxi-admin-home li:nth-child(5)").remove();
				jQuery("#toplevel_page_wpglobus_options").remove();
				jQuery("#commentstatusdiv").remove();
				jQuery("#commentsdiv").remove();

				jQuery(".user-rich-editing-wrap").remove();
				jQuery(".user-admin-color-wrap").remove();
				jQuery(".user-comment-shortcuts-wrap").remove();
				jQuery(".user-admin-bar-front-wrap").remove();
				jQuery(".user-language-wrap").remove();

				jQuery("#toplevel_page_delete_all_posts").detach().insertBefore("#toplevel_page_pmxi-admin-home");
				jQuery("#toplevel_page_delete_all_posts .wp-menu-name").html("Apagar Lojas");
				jQuery("#toplevel_page_delete_all_posts .wp-first-item .wp-first-item").html("Apagar Todas");
				jQuery("#toplevel_page_delete_all_posts ul").remove();

				jQuery("#menu-appearance li:nth-child(1)").remove();
				//jQuery("#menu-appearance li:nth-child(2)").remove();
				//jQuery("#menu-appearance li:nth-child(3)").remove();
			});
		</script>
	  ';
	}
}

/*






function my_pre_get_posts( $query ) {
	if( is_admin() ) {
		return $query;		
	}
	
	if( $query->query_vars['post_type'] === 'lojas' && !is_admin() ) {
		if( isset($_GET['cidade']) ) {

			$query->set('meta_query', array(
				array(
					'key' => 'cidade',
					'value' => $_GET['cidade']
				),
				array(
					'key' => 'uf',
					'value' => $_GET['estado']
				)
			));

			$query->set('orderby', 'rand');
			$query->set('order', 'ASC');
			
    	}
	}
}
add_action('pre_get_posts', 'my_pre_get_posts');*/

?>