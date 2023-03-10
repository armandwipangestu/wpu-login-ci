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
            $this->session->set_flashdata('message', '<div class="alert alert-success">Menu "<b>' . $menu . '</b>" has been added!</div>');
            redirect('menu');
        }
    }

    public function submenu()
    {
        // Belum ada CRUD
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        $this->form_validation->set_rules('is_active', 'Active', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $sub_menu = $this->input->post('title');
            $data = [
                'menu_id' => htmlspecialchars($this->input->post('menu_id', true)),
                'title' => htmlspecialchars($this->input->post('title', true)),
                'url' => htmlspecialchars($this->input->post('url', true)),
                'icon' => htmlspecialchars($this->input->post('icon', true)),
                'is_active' => htmlspecialchars($this->input->post('is_active', true))
            ];

            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Submenu "<b>' . $sub_menu . '</b>" has been added on menu "<b>' . $this->menu->getMenuId($data['menu_id'])[0]['menu'] . '</b>"!</div>');
            redirect('menu/submenu');
        }
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
            $this->session->set_flashdata('message', '<div class="alert alert-success">Menu "<b>' . $old_menu . '</b>" updated to "<b>' . $menu . '</b>"</div>');
            redirect('menu');
        }
    }

    public function delete()
    {
        $menu_id = $this->uri->segment(3);
        $menu_name = $this->db->get_where('user_menu', ['id' => $menu_id])->row_array()['menu'];
        $this->db->where('id', $menu_id);
        $this->db->delete('user_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success">Menu "<b>' . $menu_name . '</b>" has been deleted!</div>');
        redirect("menu");
    }

    public function subedit()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');
        $sub_menu_id = $this->uri->segment(3);
        $query = $this->db->get_where('user_sub_menu', ['id' => $sub_menu_id])->row_array();
        $data['result'] = $query;
        $data['title'] = 'Edit Submenu Management - ' . $data['result']["title"];
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['subMenuById'] = [
            $this->menu->getSubMenuById($sub_menu_id),
            $this->menu->getSubMenuId($sub_menu_id)
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/editsubmenu', $data);
        $this->load->view('templates/footer');
    }

    public function subupdate() {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        $this->form_validation->set_rules('is_active', 'Active', 'required');

        if ($this->form_validation->run() == false) {
        } else {
            $id = htmlspecialchars($this->input->post('id', true));
            
            $data = [
                'title' => htmlspecialchars($this->input->post('title')),
                'menu_id' => htmlspecialchars($this->input->post('menu_id')),
                'url' => htmlspecialchars($this->input->post('url')),
                'icon' => htmlspecialchars($this->input->post('icon')),
                'is_active' => htmlspecialchars($this->input->post('is_active')),
            ];

            $this->db->where('id', $id);
            $this->db->update('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Submenu "<b>' . $data['title'] . '</b>" has been updated!</div>');
            redirect("menu/submenu");
        }
    }

    public function subdelete() {
        $sub_menu_id = $this->uri->segment(3);
        $sub_menu_name = $this->db->get_where('user_sub_menu', ['id' => $sub_menu_id])->row_array()['title'];
        $this->db->where('id', $sub_menu_id);
        $this->db->delete('user_sub_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success">Submenu "<b>' . $sub_menu_name . '</b>" has been deleted!</div>');
        redirect('menu/submenu');
    }
}
