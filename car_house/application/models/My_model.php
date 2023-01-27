<?php

class My_model extends CI_Model
{
    
    public function my_insert($table,$data)
    {
        return $this->db->insert($table,$data);
    }
    public function my_select($table,$where=NULL,$row=NULL,$op="AND")
    {
        if(isset($row))
        {
            $this->db->select($row);
        }
        else
        {
            $this->db->select('*');
        }
        
        $this->db->from($table);
        
        if (isset($where))
        {
            if($op == "AND")
            {
                $this->db->where($where);
            }
            else
            {
                $this->db->or_where($where);
            }
        }
        return $this->db->get()->result();
    }
    public function my_query($query) 
    {
        return $this->db->query($query)->result();
    }
    public function my_delete($table,$where) 
    {
        return $this->db->delete($table,$where);
    }
    
    public function my_update($table,$data,$where)
    {
        return $this->db->update($table,$data,$where);
    }
    
    public function my_file($config,$name)
    {
        $this->upload->initialize($config);
        if($this->upload->do_upload($name))
        {
            return $this->upload->data();
        }
        else
        {
            $r[0] = $this->upload->display_errors();
            return $r;
        }
    }
    public function my_up_query($d) 
    {
        return $this->db->query($d);
    }
    public function mailer($sender,$subject,$msg) 
    {
        $config = Array( 
        'protocol' => 'smtp', 
        'smtp_host' => 'ssl://smtp.googlemail.com', 
        'smtp_port' => 465,
        'smtp_user' => 'novamailer2018@gmail.com', 
        'smtp_pass' => 'hello12321618', ); 

        $this->load->library('email', $config); 
        $this->email->set_newline("\r\n");
        $this->email->from('novamailer2018@gmail.com', 'Carmela & Service Center');
        $this->email->to($sender);
        $this->email->subject($subject); 
        $this->email->message($msg);
        if($this->email->send() !="") 
        {
            return 1;
        }
    }
}