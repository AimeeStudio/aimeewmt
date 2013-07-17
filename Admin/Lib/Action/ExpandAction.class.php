<?php
class ExpandAction extends CommonAction
{
    public function install()
    {
        $this->assign('jumpUrl', '__SELF__');
        Log::write('文件名1111：' . __APP__);
        if (isset($_POST['submit'])) {
            Log::write('文件名2222：' . TMPL_PATH);
            $info = $this->upload();
            Log::write(('文件名33333：' . './Public/Uploads/') . $info[0]['savename']);
            import('Com.Zip');
            $zip = new Zip();
            $zip->decompress('./Public/Uploads/' . $info[0]['savename'], TMPL_PATH);
            $this->installExpand('test');
            redirect(U('Expand/manage'));
        } else {
            $this->display();
        }
    }
    public function manage()
    {
        $this->assign('jumpUrl', '__SELF__');
        $expand = M('expand');
        if (isset($_POST['submit'])) {
            
        } else {
            $explandList = $expand->select();
            $this->assign('explandList', $explandList);
            $this->display();
        }
    }
}