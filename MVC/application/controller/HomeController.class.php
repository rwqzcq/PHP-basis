<?php
defined('APP_PATH') OR die('Access defined');
class Home extends Base{
    public function index() {
        // require_once '/application/view/'.__CLASS__.'/'.__FUNCTION__.'.html';
        FrameWork::view('index', 'title');
    }
    public function login() {
        // 引入登录页面
        FrameWork::view('Home/index');
    }
    public function helps() {
        dump(['username' => 15]);
    }
    public function info() {
        $username = 'tw';
        $pwd = 'ccnutw';
        $host = '  (DESCRIPTION =
        (ADDRESS_LIST =
          (ADDRESS = (PROTOCOL = TCP)(HOST = 10.220.232.72 
    
    )(PORT = 1521))
        )
        (CONNECT_DATA =
          (SERVICE_NAME = ccnu)
        )
      )
    ';
        $conn = oci_connect($username, $pwd, $host);
        if(!$conn) {
            $e = oci_error();
            print htmlentities($e['message']);
            exit;
        }

    }
    public function db() {

        $res = Db::item('admin', ['id' => 1]);
        $user_list = [
            0 => ['id' => 1, 'gid' => 1, 'username' => 'xiaoming1'],
            1 => ['id' => 2, 'gid' => 2, 'username' => 'xiaoming2'],
            2 => ['id' => 3, 'gid' => 3, 'username' => 'xiaoming3']
        ];
        $group_list = [
            1 => ['gid' => 1, 'name' => 'vip1'],
            2 => ['gid' => 2, 'name' => 'vip2'],
            3 => ['gid' => 3, 'name' => 'vip3']
        ];
        // 业务逻辑不要放在数据库服务器里面
        foreach($user_list as $key => $v) {
            $group_name = isset($group_list[$v['gid']]) ? $group_list[$v['gid']]['name'] : '';
            $user_list[$key]['group_name'] = $group_name;
        }
    }
}

