<?php

class SkillsModel extends CI_Model
{

    public function getSkills()
    {
        return $this->db->get('skills');
    }

    public function addSkills($data = null)
    {
        $this->db->insert('skills', $data);
    }

    public function whereSkills($where)
    {
        return $this->db->get_where('skills', $where);
    }

    public function updateSkills($data = null, $where = null)
    {
        $this->db->update('skills', $data, $where);
    }

    public function getThumbnail($id)
    {
        $this->db->select('image');
        $this->db->from('skills');
        $this->db->where('id', $id);
        return $this->db->get();
    }

    public function deleteSkills($id, $table)
    {
        $this->db->where('id', $id);
        $this->db->delete($table);
    }

    public function totalSkills()
    {
        return $this->db->count_all_results('skills');
    }
}
