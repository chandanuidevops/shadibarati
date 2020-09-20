<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('category')) {
    function category() {
        $ci = get_instance();
        $ci->load->model('M_category');
        $category =  $ci->M_category->allcategory();
        return $category;
    }
}

if(!function_exists('sub_category')) {
    function sub_category($id='') {
        $ci = get_instance();
        $ci->load->model('M_category');
        $category =  $ci->M_category->subcategory($id);
        return $category;
    }
}