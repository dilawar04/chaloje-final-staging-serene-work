<?php

//////////////////////////////////////////////////////////////////
// Get Site URL
//////////////////////////////////////////////////////////////////
add_shortcode('site_url', 'url');
add_shortcode('asset_url', 'asset_url');
add_shortcode('template_url', 'template_url');
add_shortcode('base_url', 'base_url');
add_shortcode('year', function(){
    return date('Y');
});

//////////////////////////////////////////////////////////////////
// Get Option
//////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////
// Get Option
//////////////////////////////////////////////////////////////////
add_shortcode('option', 'scf_option');
if (!function_exists('scf_option')) {
    function scf_option($attr = [], $content = null)
    {
        shortcode_atts([
            'name' => '',
            'number_format' => '',
        ], $attr);

        if (isset($attr['number_format'])) {
            $_option_val = number_format(get_option($attr['name']));
        } else {
            $_option_val = get_option($attr['name']);
        }
        $html = $_option_val;

        return $html;
    }
}

//////////////////////////////////////////////////////////////////
// Include File
//////////////////////////////////////////////////////////////////
add_shortcode('include', 'scf_include_file');
if (!function_exists('scf_include_file')) {
    function scf_include_file($attr = [], $content = null)
    {
        if (file_exists(get_template_directory(true) . $attr['file'])) {
            $blade_file = str_replace('.blade.php', '', $attr['file']);
            $html = \App\Theme::view($blade_file, $attr['data']);
        } else {
            $html = $attr['file'] . ' File not found';
        }
        //$html .= do_shortcode($content);
        return $html;
    }
}

//////////////////////////////////////////////////////////////////
// navigation
//////////////////////////////////////////////////////////////////
add_shortcode('nav', 'scf_nav');
if (!function_exists('scf_nav')) {
    function scf_nav($attr, $content = null)
    {
        shortcode_atts(['name' => 'Main Nav',], $attr);

        $html = getNav($attr['name']);

        $html .= do_shortcode($content);
        return $html;
    }
}

//////////////////////////////////////////////////////////////////
// CMS Block
//////////////////////////////////////////////////////////////////
add_shortcode('cms_block', 'scf_cms_block');
if (!function_exists('scf_cms_block')) {
    function scf_cms_block($attr = [], $content = null)
    {
        $html = \App\Theme::block($attr['identifier'], !true);
        $html .= do_shortcode($content);
        return $html;
    }
}


/*------------------------------- Schortcodes------------------------------------------------*/
