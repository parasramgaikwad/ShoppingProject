<?php
class My_model extends CI_Model
{
	public function create_table($table_name,$data)
	{
		$sql="CREATE TABLE ".$table_name." (".$table_name."_id INT PRIMARY KEY AUTO_INCREMENT";
		foreach ($data as $field => $value)
		{
			$sql=$sql.", ".$field." TEXT";
			// echo $field;
		}
		$sql=$sql. ")";
		// echo $sql;
		$this->db->query($sql);
		// print_r($data);
	}
	public function insert($table_name,$data)
	{
		$this->db->insert($table_name,$data);
		return $this->db->insert_id();
	}
	public function select($table_name)
	{
		return $this->db->get($table_name)->result_array();
	}
	public function select_where($table_name,$cond)
	{
		return $this->db->where($cond)->get($table_name)->result_array();
	}
	public function update($table_name,$cond,$data)
	{
		$this->db->where($cond);
		$this->db->update($table_name,$data);
	}
	public function delete($table_name,$cond)
	{
		$this->db->where($cond);
		$this->db->delete($table_name);
	}
}
?>









