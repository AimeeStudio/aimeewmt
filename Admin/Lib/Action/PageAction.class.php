<?php
class PageAction extends CommonAction
{
    public function add_page()
    {
        $this->assign('jumpUrl', U('Page/list_page'));
        if (isset($_POST['pg_name'])) {
            $data = array();
            $data['pg_name'] = $_POST['pg_name'];
            if ($_POST['pg_sort'] == '') {
                $data['pg_sort'] = 0;
            } else {
                $data['pg_sort'] = $_POST['pg_sort'];
            }
            $data['pg_content'] = stripslashes($_POST['pg_content']);
            $data['pg_tplpage'] = $_POST['pg_tplpage'];
            $data['pg_times'] = time();
            $model = M('Page');
            if (isset($_POST['id'])) {
                $condition['id'] = $_POST['id'];
                $result = $model->where($condition)->save($data);
                if ($result) {
                    $this->success('编辑单页成功');
                } else {
                    $this->error('编辑单页失败');
                }
            } else {
                $result = $model->add($data);
                if ($result) {
                    $this->success('增加单页成功');
                } else {
                    $this->error('增加单页失败');
                }
            }
        } else {
            $this->assign('tplfile', $this->getTpl());
            if (isset($_GET['id'])) {
                $model = M('Page');
                $condition['id'] = $_GET['id'];
                $pagenr = $model->where($condition)->find();
                $this->assign('pagenr', $pagenr);
                $this->display('edit_page');
            } else {
                $this->display();
            }
        }
    }
    public function list_page()
    {
        $this->assign('jumpUrl', '__SELF__');
        if (isset($_POST['duoxuanHidden'])) {
            $id = $_POST['duoxuanHidden'];
            $result = $this->del_data($id, 'page');
            if ($result !== false) {
                $this->success('批量设置成功');
            } else {
                $this->error('批量设置失败');
            }
        } else {
            $model = M('Page');
            $page = isset($_GET['p']) ? $_GET['p'] : '1';
            $order = 'pg_sort asc,id desc';
            $class = $model->order($order)->select();
            import('ORG.Util.Page');
            $count = $model->count();
            $Page = new Page($count, '', $page);
            $Page->setConfig('theme', ' %upPage%   %linkPage%  %downPage%');
            $show = $Page->show();
            $this->assign('pageList', $class);
            $this->assign('page', $show);
            $this->display();
        }
    }
    public function del_page()
    {
        $this->assign('jumpUrl', U('Page/list_page'));
        $id = $_GET['id'];
        $result = $this->del_data($id, 'page');
        if ($result) {
            $this->success('记录删除成功');
        } else {
            $this->error('记录删除失败');
        }
    }
    public function page_view()
    {
        if (isset($_GET['id'])) {
            $model = M('Page');
            $condition['id'] = $_GET['id'];
            $pageview = $model->where($condition)->find();
            $this->assign('pageview', $pageview);
        }
        $this->display();
    }
}