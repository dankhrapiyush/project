<?php

class Pagination {

	public $current_page;
	public $per_page;
	public $total_count;

	public function __construct($current_page = 1, $per_page = 5, $total_count = 0) {
		$this->current_page = (int)$current_page;
		$this->per_page = (int)$per_page;
		$this->total_count = (int)$total_count;
	}
	
	public function offset() {
		return $this->per_page * ($this->current_page - 1);
	}
	
	public function total_pages() {
		return ceil($this->total_count / $this->per_page);
	}
	
	public function previous_page() {
		return $this->current_page - 1;
	}
	
	public function next_page() {
		return $this->current_page + 1;
	}
	
	public function has_previous_page() {
		return $this->previous_page() >= 1  ? true : false;
	}

	public function has_next_page() {
		return $this->next_page() <= $this->total_pages() ? true : false;
	}
	
	// public function pag() {
	// 	if($this->total_pages() > 1) {
	// 		if($this->has_previous_page()) {
	// 			return "<li><a href=\"index.php?page=" . $this->previous_page() . "\">&laquo Previous</a></li>";
	// 		}
	// 		for($i = 1; $i <= $this->total_pages(); $i++) {
	// 			if($i == $page) {
	// 				return "<li><a id=\"currentPage\">{$i}</a></li>";
	// 			} else {
	// 				return " <li><a href=\"index.php?page={$i}\">{$i}</a></li> ";
	// 			}
	// 		}
	// 		if($this->has_next_page()) {
	// 			return "<li><a href=\"index.php?page=" . $this->next_page() . "\">Next &raquo</a></li>";
	// 		}
	// 	}
	// }
		
}

?>