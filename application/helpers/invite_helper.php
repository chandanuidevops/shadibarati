<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    
    if(!function_exists('select_theme')) {
        function select_theme() {
            $ci = get_instance();
            $ci->load->model('m_invite');
            $themeacc =  $ci->m_invite->getThemeselect();
            return $themeacc;
        }
    }

    if(!function_exists('brdeGroom')) {
        function brdeGroom() {
            $ci = get_instance();
            $ci->load->model('m_invite');
            $brdegroom =  $ci->m_invite->brdeGroom();
            return $brdegroom;
        }
    }

    if(!function_exists('wedEvenet')) {
        function wedEvenet() {
            $ci = get_instance();
            $ci->load->model('m_invite');
            $wedevent =  $ci->m_invite->getEven();
            return $wedevent;
        }
    }
      if(!function_exists('wedfam')) {
        function wedfam() {
            $ci = get_instance();
            $ci->load->model('m_invite');
            $family =  $ci->m_invite->getfamilys();
            return $family;
        }
    } 
    if(!function_exists('wedphoto')) {
        function wedphoto() {
            $ci = get_instance();
            $ci->load->model('m_invite');
            $family =  $ci->m_invite->getGlary();
            return $family;
        }
    } 

    if(!function_exists('getUniq')) {
        function getUniq() {
            $ci = get_instance();
            $ci->load->model('m_invite');
            $uniq =  $ci->m_invite->getUniq();
            return $uniq;
        }
    } 