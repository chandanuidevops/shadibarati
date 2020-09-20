<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    // protected $ci;
    
    
    if(!function_exists('vendor_category')) {
        function vendor_category() {
            $ci = get_instance();

            $ci->load->model('M_vendors');
            $category =  $ci->M_vendors->allcategory();
            return $category;
        }
    }

    if(!function_exists('cities')) {
        function cities() {
            $ci = get_instance();

            $ci->load->model('M_vendors');
            $cities =  $ci->M_vendors->allcities();
            return $cities;
        }
    }

       if(!function_exists('profile')) {
        function profile() {
            $ci = get_instance();

            $ci->load->model('M_vendorDetail');
            $profile =  $ci->M_vendorDetail->profileImg($ci->session->userdata('shvid'));
            return $profile;
        }
        }

        if(!function_exists('leads')) {
            function leads() {
                $ci = get_instance();
    
                $ci->load->model('M_vendorDetail');
                $leads =  $ci->M_vendorDetail->leadscount($ci->session->userdata('shvid'));
                return $leads;
            }
        }

        if(!function_exists('seo')) {
            function seo() {
                $ci = get_instance();
    
                $ci->load->model('M_seo');
                $result =  $ci->M_seo->seoData();
                return $result;
            }
        }


/* End of file LibraryName.php */
