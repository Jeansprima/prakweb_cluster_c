<?php
class Artikel extends CI_Model
{

    public function get_news($id = FALSE)
    {
        if ($id === FALSE) {
            if ($this->session->userdata['role'] == '1') {
                $query = $this->db->get('article');
                return $query->result_array();
            }
            $query = $this->db->get_where('article', array('id_user' => $this->session->userdata('user_id')));
            return $query->result_array();
        }

        $query = $this->db->get_where('article', array('id' => $id, 'id_user' => $this->session->userdata('user_id')));
        return $query->row_array();
    }

    public function get_news_by_id($id = 0)
    {
        if ($id === 0) {
            $query = $this->db->get('article');
            return $query->result_array();
        }

        $query = $this->db->get_where('article', array('id' => $id));
        return $query->row_array();
    }

    public function delete_news($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('article');
    }

    public function set_news($id = 0)
    {
        $this->load->helper('url');
        $data = array(
            'title' => $this->input->post('title'),
            'text_article' => $this->input->post('artikel'),
            'id_user' => $this->input->post('id_user'),
        );

        if ($id == 0) {
            return $this->db->insert('article', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('article', $data);
        }
    }
}
