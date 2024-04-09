<?php
class HomeModel extends CI_Model
{
  public function getUserData($limit, $offset)
  {
      $this->db->limit($limit, $offset);
      $query = $this->db->get('user');
      return $query->result();
  }
  

  public function addUsersData($name, $address, $email, $phone)
  {
    $data['name'] = $name;
    $data['address'] = $address;
    $data['email'] = $email;
    $data['phone'] = $phone;
    $query = $this->db->insert('user', $data);
    return $query;
  }

  public function deleteUserDataById($SN)
  {
    $this->db->where('SN', $SN);
    return $this->db->delete('user');
  }

  public function getUserDataById($SN)
  {
    $this->db->select('name,address,email,phone');
    $this->db->Where('SN', $SN);
    $query = $this->db->get('user');
    return $query->row();
  }

  
  
  public function updateUserDataById($SN, $name, $address, $email, $phone)
  {
    $data['name'] = $name;
    $data['address'] = $address;
    $data['email'] = $email;
    $data['phone'] = $phone;
    $this->db->where('SN', $SN);
    return $this->db->update('user', $data);
    
  }
  public function getTotalRows(){
    $query = $this->db->get('user');
    return $query->num_rows();
  }

}
?>