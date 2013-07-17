<?php
class TemplateAction extends CommonAction
{
    protected $filepath, $publicpath;
    public function _initialize()
    {
        parent::_initialize();
        $this->filepath = '../Template/default/';
        $this->publicpath = '../Statics/default/css/';
    }
    public function template()
    {
        $this->assign('jumpUrl', U('Template/template_manage'));
    }
    public function template_manage()
    {
        $path = $this->filepath;
        $files = $this->dir_list($path, 'html');
        foreach ($files as $key => $file) {
            $filename = basename($file);
            $templates[$key]['value'] = substr($filename, 0, strrpos($filename, '.'));
            $templates[$key]['filename'] = $filename;
            $templates[$key]['filepath'] = $file;
            $templates[$key]['filesize'] = $this->byte_format(filesize($file));
            $templates[$key]['filemtime'] = filemtime($file);
            $templates[$key]['ext'] = strtolower(substr($filename, strrpos($filename, '.') - strlen($filename)));
        }
        $this->assign('templates', $templates);
        $this->display();
    }
    public function template_set()
    {
        $filename = $_REQUEST['file'];
        $type = strtolower(substr($filename, (strrpos($filename, '.') - strlen($filename)) + 1));
        $path = $this->filepath;
        $file = $path . $filename;
        if ($_POST['dosubmit']) {
            if (C('TOKEN_ON') && !M()->autoCheckToken($_POST)) {
                $this->error('令牌错误');
            }
            if ($_POST['type']) {
                $file = (($path . $filename) . '.') . $type;
                file_put_contents($file, htmlspecialchars_decode(stripslashes($_POST['content'])));
                $this->assign('jumpUrl', U(($module_name . '/index?type=') . $type));
                $this->success('添加成功');
            } else {
                $file = $_POST['file'];
                if (file_exists($file)) {
                    file_put_contents($file, htmlspecialchars_decode(stripslashes($_POST['content'])));
                    $this->success('修改成功');
                } else {
                    $this->error('文件没找到');
                }
            }
        } else {
            if (file_exists($file)) {
                $content = htmlspecialchars(file_get_contents($file));
                import('ORG.Util.String');
                $this->assign('filename', $filename);
                $this->assign('file', $file);
                $this->assign('content', String::setCharset($content));
                $this->display();
            } else {
                $this->error('文件找不到');
            }
        }
    }
    public function css_manage()
    {
        $path = $this->publicpath;
        $files = $this->dir_list($path, 'CSS');
        foreach ($files as $key => $file) {
            $filename = basename($file);
            $templates[$key]['value'] = substr($filename, 0, strrpos($filename, '.'));
            $templates[$key]['filename'] = $filename;
            $templates[$key]['filepath'] = $file;
            $templates[$key]['filesize'] = $this->byte_format(filesize($file));
            $templates[$key]['filemtime'] = filemtime($file);
            $templates[$key]['ext'] = strtolower(substr($filename, strrpos($filename, '.') - strlen($filename)));
        }
        $this->assign('templates', $templates);
        $this->display();
    }
    public function css_set()
    {
        $filename = $_REQUEST['file'];
        $type = strtolower(substr($filename, (strrpos($filename, '.') - strlen($filename)) + 1));
        $path = $this->publicpath;
        $file = $path . $filename;
        if ($_POST['dosubmit']) {
            if (C('TOKEN_ON') && !M()->autoCheckToken($_POST)) {
                $this->error('令牌错误');
            }
            if ($_POST['type']) {
                $file = (($path . $filename) . '.') . $type;
                file_put_contents($file, htmlspecialchars_decode(stripslashes($_POST['content'])));
                $this->assign('jumpUrl', U(($module_name . '/index?type=') . $type));
                $this->success('添加成功');
            } else {
                $file = $_POST['file'];
                if (file_exists($file)) {
                    file_put_contents($file, htmlspecialchars_decode(stripslashes($_POST['content'])));
                    $this->success('修改成功');
                } else {
                    $this->error('文件没找到');
                }
            }
        } else {
            if (file_exists($file)) {
                $content = htmlspecialchars(file_get_contents($file));
                import('ORG.Util.String');
                $this->assign('filename', $filename);
                $this->assign('file', $file);
                $this->assign('content', String::setCharset($content));
                $this->display();
            } else {
                $this->error('文件找不到');
            }
        }
    }
}