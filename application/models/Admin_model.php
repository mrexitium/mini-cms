<?php 

class Admin_model extends CI_model 
{
	public function create_page($data) 
	{
		$title = trim(strip_tags($data['title']));
		$content = trim(strip_tags($data['content']));
		$slug = url_title($title, 'dash', true);

		$query = $this->db->insert('pages', [
			'title' => $title,
			'content' => $content,
			'slug' => $slug,
			'publish_date' => 'now()'
		]);

		if ($query == true) {
			return $this->db->insert_id();
		}
		return false;
	}
}