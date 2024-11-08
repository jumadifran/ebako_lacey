<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_menuaccess
 *
 * @author user
 */
class model_menuaccess extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    function get_option_view($userid, $menu) {
        $query = "select optionview from menuaccess 
                  where scriptmenu='$menu' and userid='$userid' limit 1";
        $dt = $this->db->query($query)->row();
        return (empty($dt) || empty($dt->optionview) ? 0 : $dt->optionview);
    }

    function set($userid, $menu) {
        return $this->db->insert('menuaccess', array(
                    "scriptmenu" => $menu,
                    "userid" => $userid
        ));
    }

    function remove($userid, $menu) {
        return $this->db->delete('menuaccess', array(
                    "scriptmenu" => $menu,
                    "userid" => $userid
        ));
    }

    function get_user_action($userid, $menu) {
        $query = "select actions from menuaccess 
                  where scriptmenu='$menu' and userid='$userid' limit 1";
//        echo $query . "<br/>";
        $dt = $this->db->query($query)->row();

        return (empty($dt) ? "" : $dt->actions);
    }

    function update($data, $where) {
        return $this->db->update('menuaccess', $data, $where);
    }

    function select_all_menu_by_user($id) {
        return $this->db->get_where("menuaccess", array("userid" => $id))->result();
    }

}
