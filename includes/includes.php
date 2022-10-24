<?php

function clws_addstyle()
{
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'dashboard':
            case 'work':
            case 'leads':
            case 'clients':
            case 'notice':
            case 'messages':
            case 'product':
            case 'setting':
                wp_register_style('clws-boostrap', plugins_url('admin/css/bootstrap.css', __DIR__));
                wp_enqueue_style('clws-boostrap');
                wp_register_style('clws-awesome-font', plugins_url('admin/css/fontawesome.min.css', __DIR__));
                wp_enqueue_style('clws-awesome-font');
                wp_register_style('clws-awesome-brands', plugins_url('admin/css/brands.min.css', __DIR__));
                wp_enqueue_style('clws-awesome-brands');
                wp_register_style('clws-awesome-solid', plugins_url('admin/css/solid.min.css', __DIR__));
                wp_enqueue_style('clws-awesome-solid');
                wp_register_script('clws-modal', plugins_url('admin/js/bootstrapjs.min.js', __DIR__));
                wp_enqueue_script('clws-modal');
                wp_register_style('clws-style', plugins_url('admin/css/style.css', __DIR__));
                wp_enqueue_style('clws-style');
                wp_enqueue_script('jQuery');
                wp_register_script('clws-sweet', plugins_url('admin/js/sweetalert.min.js', __DIR__));
                wp_enqueue_script('clws-sweet');
                wp_register_script('clws-script', plugins_url('admin/js/script.js', __DIR__));
                wp_localize_script(
                    'clws-script',
                    'script_object',
                    array(
                        'ajaxUrl' => admin_url('admin-ajax.php'),
                        'getSiteUrl' => get_site_url(),
                        'token'=> get_option('token'),
                        'urlIframe' => esc_url(CLWS_IFRAME_URL)

                    )
                );
                wp_enqueue_script('clws-script');
            default:
                break;
        }
    }
}
add_action('admin_enqueue_scripts', 'clws_addstyle');
