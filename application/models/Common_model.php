<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
    |--------------------------------------------------------------------------
    | Insert Data
    |--------------------------------------------------------------------------
    */
    public function _insert($table,$data) {
        $this->db->set($data);
        if ($this->db->insert($table) !== FALSE) {
        	return $lastinsertid = $this->db->insert_id();
        }
        return FALSE;
    }

    /*
    |--------------------------------------------------------------------------
    | Update Data
    |--------------------------------------------------------------------------
    */
    public function _update($table,$data, $where) {
        $this->db->where($where);
        if ($this->db->update($table, $data) !== FALSE) {
            return TRUE;
        }
        return FALSE;
    }

     /*
    |--------------------------------------------------------------------------
    | Delete Data
    |--------------------------------------------------------------------------
    */
    public function _delete($table,$where) {
        $this->db->where($where);
        if ($this->db->delete($table) !== FALSE) {
          return TRUE;
        }
        return FALSE;

    }

    /*
    |--------------------------------------------------------------------------
    | Random String
    |--------------------------------------------------------------------------
    */
    function random_string() {
        $alphabet = "ABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 6; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

    /*
    |--------------------------------------------------------------------------
    | Get All Data
    |--------------------------------------------------------------------------
    */
    public function get_all_where_select($table, $where,$select='*',$orderby='') {

        $this->db->select($select,false);
        if($orderby) $this->db->order_by($orderby);
        $query = $this->db->get_where($table, $where);

        return $query->result();
        if ($query->num_rows > 0) {
            return $query->result();
        }
        else {
            return FALSE;
        }
    }



     public function get_all_data($table,$select='*',$orderby='') {

        $this->db->select($select,false);
        if($orderby) $this->db->order_by($orderby);
        $query = $this->db->get_where($table);

        return $query->result();
        if ($query->num_rows > 0) {
            return $query->result();
        }
        else {
            return FALSE;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Get Paginated Data
    |--------------------------------------------------------------------------
    */
    public function get_all_where_select_paginated_api($table, $where,$select='*',$orderby='',$current_index,$per_page=API_PER_PAGE) {

        $this->db->select($select,false);
        $this->db->limit($per_page,$current_index);

        $query = $this->db->get_where($table, $where);
        if($orderby) $this->db->order_by($orderby);

        return $query->result();
        if ($query->num_rows > 0) {
            return $query->result();
        }
        else {
            return FALSE;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Get Single Data
    |--------------------------------------------------------------------------
    */
    public function get_where_select($table, $where,$select='*') {
        $this->db->select($select,false);
        $this->db->from($table);
        $this->db->where($where,false);
        $query = $this->db->get();
        return $query->row();
        // if ($query->num_rows > 0) {
        //     return $query->result();
        // }
        // else {
        //     return FALSE;
        // }
    }
    

    /*
    |--------------------------------------------------------------------------
    | Create Token
    |--------------------------------------------------------------------------
    */
    function create_token($planPassword) {
        $hashed_password = md5($planPassword);
        return $hashed_password;
    }


    /*
    |--------------------------------------------------------------------------
    | General Mail Function to send mail
    |--------------------------------------------------------------------------
    */
    public function general_mail($to, $from, $subject, $message, $fromname = NULL, $file = array(), $_s = 0) {
        // if(!$_s){return;}
        $this->load->library('email');
        //$_host_arr = array('localhost', 'localhost:8080', '192.168.100.98', '192.168.0.32', '103.15.67.70:88');
        $_host_arr = array('localhost', 'localhost:8080', '192.168.0.32', '103.15.67.70:88','103.93.136.37','192.168.100.103');
        // $_host_arr = array();

        if(in_array($_SERVER['SERVER_ADDR'], $_host_arr)){

            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.googlemail.com';
            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'practiceaidapp@gmail.com';
            $config['smtp_pass'] = 'practiceaid@123';
            $config['mailtype'] = 'html';
            $from = 'practiceaidapp@gmail.com';
        }
        else{
            $config['charset'] = 'utf-8';
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $config['protocol'] = 'sendmail';
        }

        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->to($to);
        $this->email->from($from, $fromname);
        $this->email->subject($subject);
        $this->email->message($message);

        if (!empty($file)) {
            foreach ($file as $val) {
                $this->email->attach($val);
            }
        }

        if (!$this->email->send()) {
            // echo "fail";exit;
            return(0);
        }
        else {
            // echo "success";exit;
            return(1);
        }
    } 

 }
