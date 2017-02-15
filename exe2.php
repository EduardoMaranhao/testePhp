<?

class LoginControl
{
    protected $session = 'loggedin';
    protected $cookie = 'Loggedin';
    public $link = 'http://www.google.com';


    public function isLog()
    {
        if ($this->isCookieLog() || $this->isSessionLog())
            $this->redirect();
    }
    
    public function isCookieLog()
    {
        return !empty($_COOKIE[$this->cookie]);
    }
    
    public function isSessionLog()
    {

        return !empty($_SESSION[$this->session]);
    }
    
    private function redirect()
    {
        header("Location: " . $this->link);
   
    }
}

?>