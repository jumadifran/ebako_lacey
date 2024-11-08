<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of currency
 *
 * @author hp
 */
class currency extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('model_currency');
    }

    function index() {
        $this->load->model('model_user');
        $data['action'] = explode('|', $this->model_user->getAction($this->session->userdata('id'), "currency"));
        $this->load->view('currency/view', $data);
    }

    function get() {        

        $code = $this->input->post('code');
        $description = $this->input->post('description');

        $query = "select * from currency where true ";

        if (!empty($code)) {
            $query .= " and code ilike '%$code%' ";
        }if (!empty($description)) {
            $query .= " and description ilike '%$description%' ";
        }
        
        $query .= " order by code asc ";
        
        echo $this->model_currency->get($query);
    }

    function save() {
        $code = $this->input->post('code');
        $description = $this->input->post('description');

        $data = array(
            "code" => $code,
            "description" => $description
        );

        if ($this->model_currency->insert($data)) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('msg' => $this->db->_error_message()));
        }
    }

    function update($code) {
        $newcode = $this->input->post('code');
        $description = $this->input->post('description');

        $data = array(
            "code" => $newcode,
            "description" => $description
        );

        if ($this->model_currency->update($data, array("code" => $code))) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('msg' => $this->db->_error_message()));
        }
    }

    function delete() {
        $code = $this->input->post('code');
        if ($this->model_currency->delete(array("code" => $code))) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('msg' => $this->db->_error_message()));
        }
    }

}
