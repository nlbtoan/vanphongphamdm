<?php

class History 
{	
	private $exclude = FALSE;
	private $session;
	private $history = array();
	private $ci;
	
	public function __construct() {
		$this->session = get_instance()->session;

		if(!$this->session->userdata('url_history')) {
			$this->session->set_userdata('url_history', array());
		}

		$this->history = $this->session->userdata('url_history');
		
		reset($this->history);
	}
	
	public function __destruct() {
		unset($this->session);
	}
	/**
	 * Push mot duong dan vao trong history. History chi luu 5 trang truy cap gan nhat.
	 * @param string $path	
	 */
	public function push($path) {
		if(!$this->exclude) {
			if(current($this->history) != $path) {
				array_unshift($this->history, $path);
			}

			$this->history = array_slice($this->history, 0, 5);

			$this->session->set_userdata('url_history', $this->history);
		}
	}

	/**
	 * @return tra ve url truy cap cuoi cung.
	 */
	public function pop() {
		$url = array_shift($this->history);
		
		if(!$url) {
			$url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $_SERVER['PHP_SELF'];
		}

		return $url;
	}

	public function prev_link($n = -1) {		
		$url = (isset($this->history[abs($n)]) ? site_url($this->history[abs($n)]) : site_url());		
		return $url;		
	}
	
	public function go($n, $method = 'location') {											
		redirect($this->prev_link($n), $method);
	}
	
	/**
	 * @return tra ve url truy cap cuoi cung ma khong xoa khoi stack.
	 */
	public function end() {
		return isset($this->history[0]) ? $this->history[0] : (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : $_SERVER['PHP_SELF'];
	}
	
	/**
	 * Bao history khong tiep nhat trang duoc push vao.
	 */
	public function exclude() {
		$this->exclude = TRUE;
	}

	/**
	 * Xoa history
	 */
	public function clear() {
		$this->history = array();
		$this->session->set_userdata('url_history', $this->history);
	}

	public function export() {
		return $this->history;
	}
}