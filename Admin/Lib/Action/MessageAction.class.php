<?php
class MessageAction extends CommonAction
{
    public function message_manage()
    {
        $message = M('Message')->order('id desc')->select();
        $this->assign('message', $message);
        $this->display();
    }
    public function reply()
    {
        $data = $_POST;
        $data['replydate'] = time();
        if (M('Message')->save($data)) {
            $this->success('回复或修改成功！');
        } else {
            $this->error('留言无改变或回复失败！');
        }
    }
    public function del()
    {
        if (!$_GET['id']) {
            $this->assign('jumpUrl', '__URL__');
            $this->error('数据不存在！');
        }
        if ($model = M('Message')->where('id=' . $_GET['id'])->delete()) {
            $this->success('删除成功！');
        } else {
            $this->error('删除失败!');
        }
    }
}