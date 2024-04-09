l<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('HomeModel');
    }
    public function index()
{
    $data['title'] = "CodeIgniter Task";
    $this->load->library('pagination');

    $config['base_url'] = base_url('home/index');
    $config['total_rows'] = $this->HomeModel->getTotalRows();
    $config['per_page'] = 5;
    
    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = "</ul>";
    $config['next_tag_open'] = "<li class='page-item'>";
    $config['next_tag_close'] = "</li>";
    $config['prev_tag_open'] = "<li class='page-item'>";
    $config['prev_tag_close'] = "</li>";
    $config['num_tag_open'] = "<li class='page-item'>";
    $config['num_tag_close'] = "</li>";
    $config['cur_tag_open'] = "<li class='page-item active'><a class='page-link'>";
    $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
    $config['attributes'] = array('class' => 'page-link');
    
    $this->pagination->initialize($config);
    

    $data['users'] = $this->HomeModel->getUserData($config['per_page'], $this->uri->segment(3));
    $this->load->view('home', $data);
}



    public function create()
    {
        $data['title'] = "CodeIgniter Task";

        $this->load->view('create-user-data', $data);
    }



    public function userValidation()
    {
        $this->load->model('HomeModel');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');

        if ($this->form_validation->run()) {
            $name = $this->input->post('name');
            $address = $this->input->post('address');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');

            $this->load->model('HomeModel');

            $usersData = $this->HomeModel->addUsersData($name, $address, $email, $phone);
            if ($usersData) {
                $this->session->set_flashdata('success', 'User Added Successfully');
                redirect('home');
            } else {
                $this->session->set_flashdata('failed', 'Failed to add User Something went Wrong');
            }
        } else {
            $data['title'] = "CodeIgniter Task";
            $this->load->view('create-user-data', $data);
        }
    }

    public function delete($SN)
    {
        $this->load->model('HomeModel');
        $deleteData = $this->HomeModel->deleteUserDataById($SN);

        if ($deleteData) {
            $this->session->set_flashdata('success', 'User Deleted Succesfully');
            redirect('home');
            ;
        } else {
            $this->session->set_flashdata('failed', 'Something Went Wrong! User Not Deleted');
            redirect('home');
        }
    }


    public function edit($SN)
    {
        $data['SN'] = $SN;
        $data['title'] = "Edit User";
        $data['user'] = $this->HomeModel->getUserDataById($SN);
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');

        $this->load->view('edit-user', $data);



        if ($this->form_validation->run()) {
            $name = $this->input->post('name');
            $address = $this->input->post('address');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');

            $updateData = $this->HomeModel->updateUserDataById($SN, $name, $address, $email, $phone);
            if ($updateData) {
                $this->session->set_flashdata('success', 'User updated Successfully');
                redirect('home');
            } else {
                $this->session->set_flashdata('failed', 'Failed to Edit User Something went Wrong');
                redirect('home/edit');
            }
        } else {
            $this->load->view('edit-user', $data);
        }
    }


}
?>
