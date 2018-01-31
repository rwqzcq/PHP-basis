<?php
/**
 * php操作session
 */

class Session {
    private $over_time = 10; // session的过期时间
    public function __construct() {
        session_start(); // 开启session
    }
    public function setSession($key, $value) { // 添加session
        $_SESSION[$key] = $value;
    }
    public function getSession($key) { // 获得session
        return $_SESSION[$key];
    }
    public function deleteOneSession($key) { // 删除某个session
        unset($_SESSION[$key]);
    }
    public function getSessionId() { // 获取sessionid
        return session_id();
    }
    public function setTime($over_time) { // 设置过期时间
        $this->over_time = $over_time ? $over_time : $this->over_time;
        setcookie(session_name(), session_id(), time()+$this->over_time);
        
    }
}



