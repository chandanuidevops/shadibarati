<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_search extends CI_Model
{

    // get result()
    public function getResult($query = null, $category = null, $max = null, $min = null, $brand = 'null')
    {

        $this->db->from('product p')
        ->join('category c', 'c.id = p.category', 'left')
        ->join('sub_category sc', 'sc.id = p.sub_category', 'left')
        ->select('p.id,p.name,p.pr_id, p.sku,c.title');
        if ($max != '') { $this->db->where('p.selling_price <=', $max); }
        if ($min != '') { $this->db->where('p.selling_price >=', $min); }
        if ($query != '') {            
            $this->db->group_start();            
            $this->db->like('p.name', $query)
                ->or_like('p.sku', $query)
                ->or_like('p.ceremony', $query)
                ->or_like('p.orientation', $query)
                ->or_like('p.print_option', $query)
                ->or_like('p.size', $query)
                ->or_like('p.color', $query)
                ->or_like('p.theme', $query)
                ->group_end();
        }
        if ($category != '') {
            $this->db->group_start(); 
                $this->db->like('c.title', $category);
            $this->db->group_end();
        }
        return $this->db->get()->result();
    }

    // get product with pagination
    public function search_pagination($query, $category, $perpage, $page, $max, $min)
    {
        $this->db->from('product p')
        ->select('p.id,p.name,p.pr_id, p.sku, p.is_stock,p.mrp, p.selling_price, p.discount, p.featured_image, p.description, p.uniq, p.weight, p.dimensions, p.no_of_insert, p.material, p.type,p.ceremony,p.orientation,p.print_option,p.size,p.gsm,p.color,p.theme,p.pr_type,c.title as category,sc.title as subcategory')
        ->join('category c', 'c.id = p.category', 'left')
        ->join('sub_category sc', 'sc.id = p.sub_category', 'left');
        if ($max != '') {
            $this->db->where('p.mrp <=', $max); 
        }
        if ($min != '') {
            $this->db->where('p.mrp >=', $min); 
        }
        if ($query != '') {
            $this->db->group_start();
                $this->db->like('p.name', $query)->or_like('p.sku', $query);
            $this->db->group_end(); 
        } 
        if ($category != '') {
            $this->db->group_start();
                $this->db->like('c.title', $category); 
            $this->db->group_end();
        }
        $this->db->order_by('p.date', 'desc');
        $this->db->limit($perpage, $page);
        return $this->db->get()->result();
    }

    // get single product
    public function single_product($id)
    {
        return $this->db->from('product p')
        ->select('p.id,p.name,p.pr_id, p.sku, p.is_stock,p.mrp, p.selling_price, p.discount, p.featured_image, p.description, p.uniq, p.weight, p.dimensions, p.no_of_insert, p.material, p.type,p.ceremony,p.orientation,p.print_option,p.size,p.gsm,p.color,p.theme,p.pr_type,c.title as category,sc.title as subcategory')
        ->where('p.pr_id', $id)
        ->join('category c', 'c.id = p.category', 'left')
        ->join('sub_category sc', 'sc.id = p.sub_category', 'left')
        ->get()
        ->row();
    }

    public function single_images($id='')
    {
       return $this->db->where('prod_id', $id)->get('product_imgs')->result();
    }


    //  get all category 
    public function categories()
    {
        $data['full'] = $this->db->order_by('title', 'asc')->get('category')->result();
        $data['five'] = $this->getFiveCategiry();
        return $data;
    }

    public function getFiveCategiry($var = null)
    {
        return $this->db->order_by('title', 'asc')->get('category', 5)->result();
    }

}

/* End of file M_search.php */
