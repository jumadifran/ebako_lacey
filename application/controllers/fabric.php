<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of fabric
 *
 * @author hp
 */
class fabric extends CI_Controller {

  //put your code here
  public function __construct() {
    parent::__construct();
    $this->load->model('model_fabric');
  }

  function index() {
    $this->load->model('model_user');
    $data['action'] = explode('|', $this->model_user->getAction($this->session->userdata('id'), "fabric"));
    $this->load->view('fabric/view', $data);
  }

  function get() {
    $page = $this->input->post('page');
    $rows = $this->input->post('rows');

    $code = $this->input->post('code');
    $description = $this->input->post('description');

    $query = "select * from fabric where true ";

    if (!empty($code)) {
      $query .= " and code ilike '%$code%' ";
    }if (!empty($description)) {
      $query .= " and description ilike '%$description%' ";
    }
    //$order_specification = " code asc ";
    //$query .= " order by $order_specification ";

    $sort = $this->input->post('sort');
    $order = $this->input->post('order');
    $query .= " order by $sort $order ";
    //echo $query;
    echo $this->model_fabric->get($page, $rows, $query);
  }

  function get_remote_data() {
    $q = $this->input->post('q');
    $query = "select * from fabric where true ";
    if (!empty($q)) {
      $query .= " and code ilike '%$q%' or description ilike '%$q%'";
    }
    echo $this->model_fabric->get_remote_data($query);
  }

  function save() {
    $code = $this->input->post('code');
    $description = $this->input->post('description');

    $data = array(
        "code" => $code,
        "description" => $description
    );

    if ($this->model_fabric->insert($data)) {
      echo json_encode(array('success' => true));
    }
    else {
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

    if ($this->model_fabric->update($data, array("code" => $code))) {
      echo json_encode(array('success' => true));
    }
    else {
      echo json_encode(array('msg' => $this->db->_error_message()));
    }
  }

  function delete() {
    $code = $this->input->post('code');
    if ($this->model_fabric->delete(array("code" => $code))) {
      echo json_encode(array('success' => true));
    }
    else {
      echo json_encode(array('msg' => $this->db->_error_message()));
    }
  }

}