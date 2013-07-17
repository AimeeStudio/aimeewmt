<?php
class DatabakAction extends CommonAction
{
    public function mysqlcn()
    {
        import('ORG.Util.Dbbackup');
        $dbbackup = new Dbbackup(C('DB_HOST'), C('DB_USER'), C('DB_PWD'), C('DB_NAME'));
        return $dbbackup;
    }
    public function index()
    {
        $tbinfo = $this->mysqlcn()->gettbinfo();
        $tables = array();
        foreach ($tbinfo as $k => $v) {
            $tables[$k]['id'] = $k + 1;
            $tables[$k]['name'] = $v['Name'];
            $tables[$k]['engine'] = $v['Engine'];
            $tables[$k]['data_length'] = $this->sizecount($v['Data_length']);
            $tables[$k]['create_time'] = $v['Create_time'];
            $tables[$k]['collation'] = $v['Collation'];
            $tables[$k]['rows'] = $v['Rows'];
            $tables[$k]['data_free'] = $v['Data_free'];
            $tables[$k]['comment'] = $v['Comment'];
        }
        $this->assign('tbs', $tables);
        $this->display('backup_manage');
    }
    public function export()
    {
        if ($_POST['sub']) {
            $data = $this->mysqlcn()->get_backupdata($_POST['id']);
            if ($this->mysqlcn()->export($data)) {
                $this->success('恭喜您备份成功!');
            }
        }
    }
    public function import()
    {
        $bakfile = $this->mysqlcn()->get_backup();
        $bakfiles = array();
        foreach ($bakfile as $k => $v) {
            $bakfiles[$k]['id'] = $k + 1;
            $bakfiles[$k]['bfn'] = $v;
            $bakfiles[$k]['ct'] = $this->getdatacreattime($v);
            $bakfiles[$k]['part'] = $this->part($v);
            $bakfiles[$k]['size'] = $this->getsize($v);
        }
        $this->assign('bfns', $bakfiles);
        $this->display('backup_reduction');
    }
    public function recovery()
    {
        if ($_GET['fn']) {
            $sqlfile = trim($_GET['fn']);
            if ($this->mysqlcn()->import($sqlfile)) {
                $this->success('恭喜您<br>备份数据已经成功导入！');
            }
        }
    }
    public function del()
    {
        if ($_POST['sub']) {
            echo $this->mysqlcn()->del($_POST['id']) ? $this->success('恭喜您备份文件已删除成功!') : $this->error('删除失败!');
        }
    }
    public function getdatacreattime($tb)
    {
        if (!preg_match('/_part/', $tb)) {
            $str = explode('.', $tb);
            $time = substr($str[0], -10);
            Date_default_timezone_set('PRC');
            return date('Y-m-d h:i', $time);
        } else {
            $str = explode('_part', $tb);
            $time = substr($str[0], -10);
            Date_default_timezone_set('PRC');
            return date('Y-m-d h:i', $time);
        }
    }
    public function part($tb)
    {
        if (!preg_match('/_part/', $tb)) {
            return '1';
        } else {
            $str = explode('.', $tb);
            return substr($str[0], -1);
        }
    }
    public function getsize($tb)
    {
        $data_dir = 'backup/';
        if (!preg_match('/_part/', $tb)) {
            $a = filesize($data_dir . $tb);
            return byte_format($a);
        }
    }
    public function downloadBak()
    {
        $file_name = $_GET['file'];
        $file_dir = $this->config['path'];
        if (!file_exists((($file_dir . '/') . $file_name))) {
            return false;
            die;
        } else {
            $file = fopen(($file_dir . '/') . $file_name, 'r');
            header('Content-Encoding: none');
            header('Content-type: application/octet-stream');
            header('Accept-Ranges: bytes');
            header('Accept-Length: ' . filesize((($file_dir . '/') . $file_name)));
            header('Content-Transfer-Encoding: binary');
            header('Content-Disposition: attachment; filename=' . $file_name);
            header('Pragma: no-cache');
            header('Expires: 0');
            echo fread($file, filesize(($file_dir . '/') . $file_name));
            fclose($file);
            die;
        }
    }
    public function sizecount($filesize)
    {
        if ($filesize >= 1073741824) {
            $filesize = round((($filesize / 1073741824) * 100)) / 100 . ' GB';
        } elseif ($filesize >= 1048576) {
            $filesize = round((($filesize / 1048576) * 100)) / 100 . ' MB';
        } elseif ($filesize >= 1024) {
            $filesize = round((($filesize / 1024) * 100)) / 100 . ' KB';
        } else {
            $filesize = $filesize . ' Bytes';
        }
        return $filesize;
    }
}