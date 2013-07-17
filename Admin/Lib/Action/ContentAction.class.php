<?php
class ContentAction extends CommonAction
{
    public function content_add()
    {
        $this->assign('jumpUrl', U('Content/content_manage'));
        if (isset($_POST['nr_name'])) {
            $data = array();
            $data['nr_att'] = $_POST['nr_att'];
            $data['nr_good'] = $_POST['nr_good'];
            $data['nr_ext'] = $_POST['nr_ext'];
            $data['nr_name'] = stripslashes($_POST['nr_name']);
            if ($_POST['nr_en_name'] == '') {
                $data['nr_en_name'] = $this->Pinyin($data['nr_name']);
            } else {
                $data['nr_en_name'] = $_POST['nr_en_name'];
            }
            $data['nr_thumb'] = $_POST['sl_thumb'];
            $data['nr_keyword'] = $_POST['nr_keyword'];
            $data['nr_description'] = $_POST['nr_description'];
            $data['nr_edit'] = stripslashes($_POST['nr_edit']);
            $data['nr_info'] = stripslashes($_POST['nr_info']);
            $data['nr_exturl'] = $_POST['nr_exturl'];
            if ($_POST['nr_times'] == '') {
                $data['nr_times'] = time();
            } else {
                $data['nr_times'] = strtotime($_POST['nr_times']);
            }
            $data['nr_author'] = session('adminname');
            $content = M('Content');
            if (isset($_POST['id'])) {
                $condition['id'] = $_POST['id'];
                $result = $content->where($condition)->save($data);
                if ($result) {
                    $this->success('编辑内容成功');
                } else {
                    $this->error('编辑内容失败');
                }
            } else {
                $result = $content->add($data);
                if ($result) {
                    $this->success('增加内容成功');
                } else {
                    $this->error('增加内容失败');
                }
            }
        } else {
            $suoshu = array();
            $suoshu = $this->getSuoShu();
            $this->assign('suoshu', $suoshu);
            if ($suoshu[0]['id'] == '') {
                $this->assign('DiyField', '');
            } else {
                $this->assign('DiyField', $this->GetDiyField($suoshu[0]['id']));
            }
            if (isset($_GET['id'])) {
                $model = M('Content');
                $condition['id'] = $_GET['id'];
                $contentinfo = $model->where($condition)->find();
                $this->assign('contentinfo', $contentinfo);
                $this->display('content_edit');
            } else {
                $this->display();
            }
        }
    }
    public function content_view()
    {
        if (isset($_GET['id'])) {
            $model = M('Content');
            $condition['id'] = $_GET['id'];
            $contentview = $model->where($condition)->find();
            $this->assign('contentview', $contentview);
        }
        $this->display();
    }
    public function content_manage()
    {
        $this->assign('jumpUrl', '__SELF__');
        if (isset($_POST['duoxuanHidden'])) {
            $id = $_POST['duoxuanHidden'];
            if ($_POST['piliangHidden'] == '1') {
                $result = $this->setTuijian($id, 1);
            } elseif ($_POST['piliangHidden'] == '2') {
                
            } else {
                $result = $this->del_data($id, 'content');
            }
            if ($result !== false) {
                $this->success('批量设置成功');
            } else {
                $this->error('批量设置失败');
            }
        } else {
            $contentList = array();
            $page = isset($_GET['p']) ? $_GET['p'] : '1';
            $model = M('Content');
            $field = ((((((((((((C('DB_PREFIX') . 'content.id as id,') . C('DB_PREFIX')) . 'content.nr_name as nr_name,') . C('DB_PREFIX')) . 'content.nr_times as nr_times,') . C('DB_PREFIX')) . 'content.nr_good as nr_good,') . C('DB_PREFIX')) . 'content.nr_ext as nr_ext,') . C('DB_PREFIX')) . 'content.nr_exturl as nr_exturl,') . C('DB_PREFIX')) . 'channel.cl_name as cl_name';
            $joinStr = ((((C('DB_PREFIX') . 'channel ON ') . C('DB_PREFIX')) . 'content.nr_att = ') . C('DB_PREFIX')) . 'channel.id';
            $order = ((C('DB_PREFIX') . 'content.nr_good asc,') . C('DB_PREFIX')) . 'content.id desc';
            $lanmu = 0;
            $paixu = 1;
            $neirong = '';
            if (isset($_POST['lanmu'])) {
                $lanmu = $_POST['lanmu'];
                $paixu = $_POST['paixu'];
                $neirong = trim($_POST['neirong']);
                if ($lanmu) {
                    $map['nr_att'] = $lanmu;
                }
                if ($paixu == 1) {
                    $order = ((C('DB_PREFIX') . 'content.nr_good asc,') . C('DB_PREFIX')) . 'content.id desc';
                } elseif ($paixu == 2) {
                    $order = C('DB_PREFIX') . 'content.id asc';
                } elseif ($paixu == 3) {
                    $order = C('DB_PREFIX') . 'content.nr_times desc';
                }
                if ($neirong) {
                    $map['nr_name'] = array('like', ('%' . $neirong) . '%');
                }
                $contentList = $model->field($field)->join($joinStr)->where($map)->order($order)->page($page)->select();
            } else {
                $contentList = $model->field($field)->join($joinStr)->order($order)->page($page)->select();
            }
            import('ORG.Util.Page');
            $count = count($contentList);
            $Page = new Page($count, '', $page);
            $Page->setConfig('theme', ' %upPage%   %linkPage%  %downPage%');
            $show = $Page->show();
            $this->assign('lanmu', $lanmu);
            $this->assign('paixu', $paixu);
            $this->assign('neirong', $neirong);
            $this->assign('suoshu', $this->getSuoShu());
            $this->assign('contentList', $contentList);
            $this->assign('page', $show);
            $this->display();
        }
    }
    public function add_page()
    {
        $this->assign('jumpUrl', '__SELF__');
        if (isset($_POST['duoxuanHidden'])) {
            
        } else {
            $this->display();
        }
    }
    public function content_page()
    {
        $this->assign('jumpUrl', '__SELF__');
        if (isset($_POST['duoxuanHidden'])) {
            $id = $_POST['duoxuanHidden'];
            $result = $this->del_data($id, 'channel');
            if ($result !== false) {
                $this->success('批量设置成功');
            } else {
                $this->error('批量设置失败');
            }
        } else {
            $contentList = array();
            $model = M('Channel');
            $page = isset($_GET['p']) ? $_GET['p'] : '1';
            $order = 'cl_sort asc,id desc';
            $map['cl_type'] = '2';
            $lanmu = 0;
            $neirong = '';
            if (isset($_POST['lanmu'])) {
                $lanmu = $_POST['lanmu'];
                $neirong = trim($_POST['neirong']);
                if ($lanmu) {
                    $map['id'] = $lanmu;
                }
                if ($neirong) {
                    $map['cl_name'] = array('like', ('%' . $neirong) . '%');
                }
            }
            $class = $model->where($map)->order($order)->select();
            import('ORG.Util.Page');
            $count = $model->where($map)->count();
            $Page = new Page($count, '', $page);
            $Page->setConfig('theme', ' %upPage%   %linkPage%  %downPage%');
            $show = $Page->show();
            $this->assign('lanmu', $lanmu);
            $this->assign('neirong', $neirong);
            $this->assign('suoshu', $this->getSuoShu());
            $this->assign('pageList', $class);
            $this->assign('page', $show);
            $this->display();
        }
    }
    public function content_filter()
    {
        $this->assign('jumpUrl', '__SELF__');
        if (isset($_POST['duoxuanHidden'])) {
            
        } else {
            $this->display();
        }
    }
    public function content_replace()
    {
        $this->assign('jumpUrl', '__SELF__');
        if (isset($_POST['duoxuanHidden'])) {
            
        } else {
            $this->display();
        }
    }
    public function getPinyin()
    {
        $clName = $_POST['clName'];
        if (empty($clName)) {
            echo json_encode(array('msg' => '', 'result' => '0'));
            return;
        }
        $result = $this->Pinyin($clName);
        echo json_encode(array('msg' => $result, 'result' => '1'));
        return;
    }
    public function setShuxing()
    {
        $this->assign('jumpUrl', U('Content/content_manage'));
        $id = $_GET['id'];
        $tuijian = $_GET['tuijian'];
        $result = $this->setTuijian($id, $tuijian);
        if ($result) {
            $this->success('属性设置成功');
        } else {
            $this->error('属性设置失败');
        }
    }
    public function del_content()
    {
        $this->assign('jumpUrl', U('Content/content_manage'));
        $id = $_GET['id'];
        $result = $this->del_data($id, 'content');
        if ($result) {
            $this->success('记录删除成功');
        } else {
            $this->error('记录删除失败');
        }
    }
    public function del_class_par()
    {
        $this->assign('jumpUrl', U('Content/content_manage'));
        $id = $_GET['id'];
        $result = $this->del_data($id, 'class_par');
        if ($result) {
            $this->success('记录删除成功');
        } else {
            $this->error('记录删除失败');
        }
    }
    public function suoshu_yidong()
    {
        $this->assign('jumpUrl', U('Content/content_manage'));
        $class = M('Content');
        $data = array();
        $data['nr_att'] = $_POST['nr_att'];
        $condition['id'] = $_POST['suoshuId'];
        $result = $class->where($condition)->save($data);
        if ($result) {
            $this->success('所属栏目移动成功');
        } else {
            $this->error('所属栏目移动失败');
        }
    }
}