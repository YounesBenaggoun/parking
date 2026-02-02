<?php
class Session
{

	// static $index_pageLink = "index.php";
	// static $login_pageLink = "login.php";

	protected $name = "user_id";

	function __construct($name = "user_id")
	{
		if (session_status() === PHP_SESSION_NONE)
			session_start();
		session_regenerate_id();
		$this->name = $name;
	}
	public function set($_new_val)
	{
		$_SESSION[$this->name] = $_new_val;
	}
	public function get()
	{
		if (isset($_SESSION[$this->name]))
			return $_SESSION[$this->name];
		return null;
	}

	public function val($__new_val = false)
	{
		if (!$__new_val)
			return $this->get();

		$this->set($__new_val);
	}
	public function destroy()
	{
		unset($_SESSION[$this->name]);
		session_unset();
		session_destroy();
	}
}
