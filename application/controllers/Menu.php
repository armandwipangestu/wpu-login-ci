<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', "Menu", 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $menu = $this->input->post('menu');
            $this->db->insert('user_menu', ['menu' => $menu]);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Menu "' . $menu . '" has been added!</div>');
            redirect('menu');
        }
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/submenu', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $menu_id = $this->uri->segment(3);
        $query = $this->db->get_where('user_menu', ['id' => $menu_id])->row_array();
        $data['result'] = $query;
        $data['title'] = 'Edit Menu Management - ' . $data['result']["menu"];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/editmenu', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $this->form_validation->set_rules('menu', "Menu", 'required');
        if ($this->form_validation->run() == false) {
        } else {
            $id = htmlspecialchars($this->input->post('id', true));
            $old_menu = $this->input->post('old_menu', true);
            $menu = htmlspecialchars($this->input->post('menu', true));
            $this->db->where('id', $id);
            $this->db->update('user_menu', ['menu' => $menu]);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Menu "' . $old_menu . '" updated to "' . $menu . '"</div>');
            redirect('menu');
        }
    }

    public function delete()
    {
        $menu_id = $this->uri->segment(3);
        $menu_name = $this->db->get_where('user_menu', ['id' => $menu_id])->row_array()['menu'];
        $this->db->where('id', $menu_id);
        $this->db->delete('user_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success">Menu "' . $menu_name . '" has been deleted!</div>');
        redirect("menu");
    }

    public function subedit()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $sub_menu_id = $this->uri->segment(3);
        $query = $this->db->get_where('user_sub_menu', ['id' => $sub_menu_id])->row_array();
        $data['result'] = $query;
        $data['title'] = 'Edit Submenu Management - ' . $data['result']["title"];
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/editsubmenu', $data);
        $this->load->view('templates/footer');
    }
}
