<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_cart extends CI_Model
{

    // add to cart
    public function addTocart($datas, $eid)
    {
        
        $prid = $this->getProductid($datas['product']);

        $data = array('quantity' =>$datas['qty'],'pr_id' => $prid, 'user' => $eid);

        $this->db->where('user', $eid);
        $this->db->where('pr_id', $prid);
        $query = $this->db->get('cart');

        if ($query->num_rows() > 0) {
            $this->db->where('user', $eid);
            $this->db->where('pr_id', $prid);
            $this->db->update('cart', $data);

            foreach ($query->result() as $key => $value) {
                return $value->id;
            }
        } else {
            $this->db->insert('cart', $data);
            return $insert_id = $this->db->insert_id();
        }
        return $insert_id;
    }

    // get product
    public function getProductid($pid = null)
    {
        $result = $this->db->select('id')->where('pr_id', $pid)->get('product')->row();
        return $result->id;
    }

    // get product name
    public function getproduct($pid = null)
    {
        $result = $this->db->select('title')->where('product_id', $pid)->get('product')->row();
        return $result->title;
    }

    // get cart item
    public function getCart($eid)
    {
        $this->db->select('c.quantity, p.id as prid, p.pr_id, name,c.id as cid, p.discount as pdiscount,p.name as ptitle, p.featured_image as image_path, p.selling_price as price,p.sku');
        $this->db->where('user', $eid);
        $this->db->from('cart c');
        $this->db->join('product p', 'p.id = c.pr_id', 'left');
        $this->db->join('category ct', 'ct.id = p.category', 'left');
        return $this->db->get()->result();
    }

    // carrt item
    public function cart_item($id = null)
    {
        $result = $this->db->where('user', $id)->get('cart');
        return $result->num_rows();

    }

    //delete cart
    public function deletecart($pid, $eid)
    {
        $this->db->where('id', $pid)->where('user', $eid)->delete('cart');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //  update qty
    public function setQty($cid, $data, $uid)
    {
        $this->db->where('id', $cid)
            ->where('user', $uid)
            ->update('cart', $data);
        return true;

    }

    public function insertOrder($data)
    {
        $this->db->insert('orders', $data);
        $this->protectedQty($data);
        $this->deleteCartitem();
        return true;

    }

    // decreez product qty
    public function protectedQty($data)
    {
        $this->db->where('id', $data['product'])
            ->set('available_stock', 'available_stock-' . $data['qty'], false)
            ->update('product');
        return true;

    }

    // delete cart items
    public function deleteCartitem()
    {
        $this->db->where('emp_id', $this->session->userdata('sid'))->delete('cart');
        return true;
    }



    // save shipping address
    public function saveShipping($data, $uid)
    {
        $this->db->where('employee', $uid);
        $this->db->update('shipping_address', array('status' => 0));
        $this->db->group_start();
        $this->db->insert('shipping_address', $data);
        $this->db->group_end();
        return true;

    }

    // get shipping addres  detail
    public function getShipping($id = null)
    {
        $this->db->where('employee', $id)->order_by('status', 'DESC');
        return $this->db->get('shipping_address')->result();
    }

    // get billing addres  detail
    public function getBilling($id = null)
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('billing_address')->result();
    }

    // change address default
    public function cahnge_address($sid, $uid)
    {

        $this->db->where('employee', $uid);
        $this->db->update('shipping_address', array('status' => 0));
        $this->cahnge_address_update($sid, $uid);
        return true;
    }

    public function cahnge_address_update($sid, $uid)
    {
        $this->db->where('employee', $uid);
        $this->db->where('id', $sid);
        $this->db->update('shipping_address', array('status' => 1));
        return true;
    }

    // Get default shipping address
    // public function getdefaultShipping($uid = null)
    // {
    //     $query = $this->db->where('employee', $uid)->where('status', '1')->get('shipping_address')->row();
    //     return $query->id;
    // }

    // // Get selected billing addres
    // public function selectedbilling($billing = null)
    // {
    //     $query = $this->db->where('id', $billing)->get('billing_address')->row_array();
    //     return $query;
    // }

    // Get selected shipping address
    // public function selectedship($shipping = null)
    // {
    //     $query = $this->db->where('id', $shipping)->get('shipping_address')->row_array();
    //     return $query;
    // }

        // Get getuseremail
        // public function getuseremail($cid = null)
        // {
        //     $query = $this->db->where('id', $cid)->get('employee')->row();
        //     return $query->email;
        // }

    public function updateBrand($id, $prd)
    {
        $this->db->where('id', $prd);
        $this->db->update('cart', array('barand_price' => $id));
        return true;
    }

    public function getphone($id = null)
    {
        $this->db->select('phone');
        $this->db->where('id', $id);
        $result = $this->db->get('employee')->row_array();
        return $result['phone'];
    }

    public function hsncode($prid = null)
    {
        $this->db->select('hsn');
        $this->db->where('id', $prid);
        $result = $this->db->get('product')->row_array();
        return $result['hsn'];
    }
    public function size($prid = null,$size=null)
    {
        $this->db->select('size_name');
        $this->db->where('prdid', $prid);
        $this->db->where('id', $size);
        $result = $this->db->get('size_chart')->row_array();
        return $result['size_name'];
    }
    
    



}

/* End of file M_cart.php */
