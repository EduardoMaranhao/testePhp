<?
class Mysqldb {

	private static $instance;
	private $db;
	private $sql;
	private $numrows;
	private $dbopenstatus;
	private $dbconnection;
	private $result;

	private function __construct() {

		$this->connect();
	}

	public static function singleton() {

		if (!isset(self::$instance)) {
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}

	private function connect() {
	

		global $DB_HOST, $DB, $DB_USER, $DB_PASSWD;
		$this->dbconnection = mysql_pconnect($DB_HOST, $DB_USER, $DB_PASSWD);
		if ($this->dbconnection) {
				$this->db = mysql_select_db($DB, $this->dbconnection);
		} else {
			echo mysql_error();
			return false;
		}
		return true;
	}

	public function setSql($qs) {

		$this->sql = $qs;
	}

	public function selectQry() {

		unset($this->result);
		if (!$this->dbconnection) {
			$this->connect();
		}

		$this->qry = @mysql_query($this->sql);
		if (!$this->qry) {
			echo mysql_error();
			return false;
		} else {
			$this->numrows = @mysql_num_rows($this->qry);
			if ($this->numrows > 0) {
				for ($a = 0; $a < $this->numrows; $a++) {
					$result[$a] = mysql_fetch_array($this->qry);
				}
				$this->result = $result;
				return $result;
			} else {
				return false;
			}
		}
	}

	public function regularQry() {

		if (!$this->dbconnection) {
			$this->connect();
		}

		$this->qry = mysql_query($this->sql);
		if (!$this->qry) {
			echo mysql_error();
			return false;
		} else {
			return true;
		}
	}

	public function __clone() {

		trigger_error('Clone is not allowed.', E_USER_ERROR);
	}

}
?>