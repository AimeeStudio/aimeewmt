<?php
class PublicAction extends Action
{
    public function login()
    {
        $this->display();
    }
    public function checklogin()
    {
        $userName = $_POST['userName'];
        $password = md5($_POST['password']);
        $verify = $_POST['verify'];
        if (empty($userName)) {
            echo json_encode(array('msg' => '请输入用户名', 'result' => '0'));
            return;
        }
        if (empty($_POST['password'])) {
            echo json_encode(array('msg' => '请输入密码', 'result' => '0'));
            return;
        }
        if (empty($_POST['verify'])) {
            echo json_encode(array('msg' => '请输入验证码', 'result' => '0'));
            return;
        }
        if (md5($verify) != $_SESSION['verify']) {
            echo json_encode(array('msg' => '验证码错误', 'result' => '0'));
            return;
        }
        $model = M('admin');
        $user_info = $model->getByAdminname($userName);
        if ($user_info) {
            if ($password == $user_info['adminpassword']) {
                session('adminid', $user_info['adminid']);
                session('adminname', $user_info['adminname']);
                session('adminpower', $user_info['adminpower']);
                session('lastlogintime', $user_info['lastlogintime']);
                $loginip = get_client_ip();
                $data = array('loginip' => $loginip, 'lastlogintime' => time(), 'logincount' => $user_info['logincount'] + 1);
                $condition['adminid'] = $user_info['adminid'];
                $model->where($condition)->setField($data);
                echo json_encode(array('msg' => '登录成功！', 'result' => '1'));
            } else {
                echo json_encode(array('msg' => '用户名或密码错误，请重新输入', 'result' => '0'));
            }
        } else {
            echo json_encode(array('msg' => '用户名或密码错误，请重新输入', 'result' => '0'));
        }
        return;
    }
    public function logout()
    {
        if (session('adminid')) {
            session('adminid', null);
            session('adminname', null);
            session('adminpower', null);
            session('lastlogintime', null);
            $this->assign('message', '登出成功！');
            $this->assign('waitSecond', '1');
            $this->assign('jumpUrl', U('Public/login'));
            $this->display(THINK_PATH . 'Tpl/dispatch_jump.tpl');
        } else {
            $this->error('已经登出！');
        }
    }
    public function delete_cache()
    {
        S('data', NULL);
        $dir = @opendir('../Data/Cache');
        while (($file = readdir($dir)) !== false) {
            if ($file !== '.' && $file !== '..') {
                unlink('../Data/Cache/' . $file);
            }
        }
        closedir($dir);
        $this->assign('message', '删除缓存成功！');
        $this->assign('waitSecond', '1');
        $this->assign('jumpUrl', U('Index/index'));
        $this->display(THINK_PATH . 'Tpl/dispatch_jump.tpl');
    }
    public function initsys()
    {
        $lockfile = DATA_PATH . 'initsys.lock';
        $lockinstall = DATA_PATH . 'install.lock';
        if (file_exists($lockfile)) {
            return false;
        }
        $Model = M('Module');
        $order = 'listorder asc';
        $list = $Model->order($order)->select();
        $data = array();
        foreach ($list as $key => $val) {
            $data[$val['id']] = $val;
        }
        if ($data) {
            F('config/module', $data);
        }
        cache_menu();
        cache_setting();
        @touch($lockfile);
        @touch($lockinstall);
        return true;
    }
    public function verify()
    {
        import('ORG.Util.Image');
        Image::buildImageVerify(4);
    }
}