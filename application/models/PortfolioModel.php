<?php

class PortfolioModel extends CI_Model
{

    public function getPortfolio()
    {
        return $this->db->get('portfolio');
    }

    public function addPortfolio($data = null)
    {
        $this->db->insert('portfolio', $data);
    }

    public function wherePortfolio($where)
    {
        return $this->db->get_where('portfolio', $where);
    }

    public function updatePortfolio($data = null, $where = null)
    {
        $this->db->update('portfolio', $data, $where);
    }

    public function getThumbnail($id)
    {
        $this->db->select('thumbnail');
        $this->db->from('portfolio');
        $this->db->where('id', $id);
        return $this->db->get();
    }

    public function deletePortfolio($id, $table)
    {
        $this->db->where('id', $id);
        $this->db->delete($table);
    }

    public function totalPortfolio()
    {
        return $this->db->count_all_results('portfolio');
    }
}
