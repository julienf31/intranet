<?php
$this->db->set('visible', '0', FALSE);
$this->db->where('id', 2);
$this->db->update('news');
?>