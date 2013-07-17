<?php
class CommonAction extends Action
{
    protected function _initialize()
    {
        if (session('adminid')) {
            
        } else {
            redirect(U('Public/login'));
        }
    }
    public function index()
    {
        
    }
    public function installExpand($ex_key)
    {
        $install = M('expand');
        $data = array();
        $data['ex_key'] = $ex_key;
        $data['ex_name'] = '基本插件设置';
        $data['ex_describe'] = '插件描述';
        $data['ex_state'] = '1';
        $result = $install->add($data);
        if (false === $result) {
            return false;
        }
        return true;
    }
    public function getPinyin()
    {
        $zwName = $_POST['zwName'];
        if (empty($zwName)) {
            echo json_encode(array('msg' => 'zw', 'result' => '0'));
            return;
        }
        $result = $this->Pinyin($zwName);
        echo json_encode(array('msg' => $result, 'result' => '1'));
        return;
    }
    public function Pinyin($_String, $_Code = 'UTF8')
    {
        $_DataKey = (((((((((((((('a|ai|an|ang|ao|ba|bai|ban|bang|bao|bei|ben|beng|bi|bian|biao|bie|bin|bing|bo|bu|ca|cai|can|cang|cao|ce|ceng|cha' . '|chai|chan|chang|chao|che|chen|cheng|chi|chong|chou|chu|chuai|chuan|chuang|chui|chun|chuo|ci|cong|cou|cu|') . 'cuan|cui|cun|cuo|da|dai|dan|dang|dao|de|deng|di|dian|diao|die|ding|diu|dong|dou|du|duan|dui|dun|duo|e|en|er') . '|fa|fan|fang|fei|fen|feng|fo|fou|fu|ga|gai|gan|gang|gao|ge|gei|gen|geng|gong|gou|gu|gua|guai|guan|guang|gui') . '|gun|guo|ha|hai|han|hang|hao|he|hei|hen|heng|hong|hou|hu|hua|huai|huan|huang|hui|hun|huo|ji|jia|jian|jiang') . '|jiao|jie|jin|jing|jiong|jiu|ju|juan|jue|jun|ka|kai|kan|kang|kao|ke|ken|keng|kong|kou|ku|kua|kuai|kuan|kuang') . '|kui|kun|kuo|la|lai|lan|lang|lao|le|lei|leng|li|lia|lian|liang|liao|lie|lin|ling|liu|long|lou|lu|lv|luan|lue') . '|lun|luo|ma|mai|man|mang|mao|me|mei|men|meng|mi|mian|miao|mie|min|ming|miu|mo|mou|mu|na|nai|nan|nang|nao|ne') . '|nei|nen|neng|ni|nian|niang|niao|nie|nin|ning|niu|nong|nu|nv|nuan|nue|nuo|o|ou|pa|pai|pan|pang|pao|pei|pen') . '|peng|pi|pian|piao|pie|pin|ping|po|pu|qi|qia|qian|qiang|qiao|qie|qin|qing|qiong|qiu|qu|quan|que|qun|ran|rang') . '|rao|re|ren|reng|ri|rong|rou|ru|ruan|rui|run|ruo|sa|sai|san|sang|sao|se|sen|seng|sha|shai|shan|shang|shao|') . 'she|shen|sheng|shi|shou|shu|shua|shuai|shuan|shuang|shui|shun|shuo|si|song|sou|su|suan|sui|sun|suo|ta|tai|') . 'tan|tang|tao|te|teng|ti|tian|tiao|tie|ting|tong|tou|tu|tuan|tui|tun|tuo|wa|wai|wan|wang|wei|wen|weng|wo|wu') . '|xi|xia|xian|xiang|xiao|xie|xin|xing|xiong|xiu|xu|xuan|xue|xun|ya|yan|yang|yao|ye|yi|yin|ying|yo|yong|you') . '|yu|yuan|yue|yun|za|zai|zan|zang|zao|ze|zei|zen|zeng|zha|zhai|zhan|zhang|zhao|zhe|zhen|zheng|zhi|zhong|') . 'zhou|zhu|zhua|zhuai|zhuan|zhuang|zhui|zhun|zhuo|zi|zong|zou|zu|zuan|zui|zun|zuo';
        $_DataValue = ((((((((((((((((((((((((('-20319|-20317|-20304|-20295|-20292|-20283|-20265|-20257|-20242|-20230|-20051|-20036|-20032|-20026|-20002|-19990' . '|-19986|-19982|-19976|-19805|-19784|-19775|-19774|-19763|-19756|-19751|-19746|-19741|-19739|-19728|-19725') . '|-19715|-19540|-19531|-19525|-19515|-19500|-19484|-19479|-19467|-19289|-19288|-19281|-19275|-19270|-19263') . '|-19261|-19249|-19243|-19242|-19238|-19235|-19227|-19224|-19218|-19212|-19038|-19023|-19018|-19006|-19003') . '|-18996|-18977|-18961|-18952|-18783|-18774|-18773|-18763|-18756|-18741|-18735|-18731|-18722|-18710|-18697') . '|-18696|-18526|-18518|-18501|-18490|-18478|-18463|-18448|-18447|-18446|-18239|-18237|-18231|-18220|-18211') . '|-18201|-18184|-18183|-18181|-18012|-17997|-17988|-17970|-17964|-17961|-17950|-17947|-17931|-17928|-17922') . '|-17759|-17752|-17733|-17730|-17721|-17703|-17701|-17697|-17692|-17683|-17676|-17496|-17487|-17482|-17468') . '|-17454|-17433|-17427|-17417|-17202|-17185|-16983|-16970|-16942|-16915|-16733|-16708|-16706|-16689|-16664') . '|-16657|-16647|-16474|-16470|-16465|-16459|-16452|-16448|-16433|-16429|-16427|-16423|-16419|-16412|-16407') . '|-16403|-16401|-16393|-16220|-16216|-16212|-16205|-16202|-16187|-16180|-16171|-16169|-16158|-16155|-15959') . '|-15958|-15944|-15933|-15920|-15915|-15903|-15889|-15878|-15707|-15701|-15681|-15667|-15661|-15659|-15652') . '|-15640|-15631|-15625|-15454|-15448|-15436|-15435|-15419|-15416|-15408|-15394|-15385|-15377|-15375|-15369') . '|-15363|-15362|-15183|-15180|-15165|-15158|-15153|-15150|-15149|-15144|-15143|-15141|-15140|-15139|-15128') . '|-15121|-15119|-15117|-15110|-15109|-14941|-14937|-14933|-14930|-14929|-14928|-14926|-14922|-14921|-14914') . '|-14908|-14902|-14894|-14889|-14882|-14873|-14871|-14857|-14678|-14674|-14670|-14668|-14663|-14654|-14645') . '|-14630|-14594|-14429|-14407|-14399|-14384|-14379|-14368|-14355|-14353|-14345|-14170|-14159|-14151|-14149') . '|-14145|-14140|-14137|-14135|-14125|-14123|-14122|-14112|-14109|-14099|-14097|-14094|-14092|-14090|-14087') . '|-14083|-13917|-13914|-13910|-13907|-13906|-13905|-13896|-13894|-13878|-13870|-13859|-13847|-13831|-13658') . '|-13611|-13601|-13406|-13404|-13400|-13398|-13395|-13391|-13387|-13383|-13367|-13359|-13356|-13343|-13340') . '|-13329|-13326|-13318|-13147|-13138|-13120|-13107|-13096|-13095|-13091|-13076|-13068|-13063|-13060|-12888') . '|-12875|-12871|-12860|-12858|-12852|-12849|-12838|-12831|-12829|-12812|-12802|-12607|-12597|-12594|-12585') . '|-12556|-12359|-12346|-12320|-12300|-12120|-12099|-12089|-12074|-12067|-12058|-12039|-11867|-11861|-11847') . '|-11831|-11798|-11781|-11604|-11589|-11536|-11358|-11340|-11339|-11324|-11303|-11097|-11077|-11067|-11055') . '|-11052|-11045|-11041|-11038|-11024|-11020|-11019|-11018|-11014|-10838|-10832|-10815|-10800|-10790|-10780') . '|-10764|-10587|-10544|-10533|-10519|-10331|-10329|-10328|-10322|-10315|-10309|-10307|-10296|-10281|-10274') . '|-10270|-10262|-10260|-10256|-10254';
        $_TDataKey = explode('|', $_DataKey);
        $_TDataValue = explode('|', $_DataValue);
        $_Data = array_combine($_TDataKey, $_TDataValue);
        arsort($_Data);
        reset($_Data);
        if ($_Code != 'gb2312') {
            $_String = $this->_U2_Utf8_Gb($_String);
        }
        $_Res = '';
        for ($i = 0; $i < strlen($_String); $i++) {
            $_P = ord(substr($_String, $i, 1));
            if ($_P > 160) {
                $_Q = ord(substr($_String, ++$i, 1));
                $_P = ($_P * 256 + $_Q) - 65536;
            }
            $_Res .= $this->_Pinyin($_P, $_Data);
        }
        return preg_replace('/[^a-z0-9]*/', '', $_Res);
    }
    public function _Pinyin($_Num, $_Data)
    {
        if ($_Num > 0 && $_Num < 160) {
            return chr($_Num);
        } elseif ($_Num < -20319 || $_Num > -10247) {
            return '';
        } else {
            foreach ($_Data as $k => $v) {
                if ($v <= $_Num) {
                    break;
                }
            }
            return $k;
        }
    }
    public function _U2_Utf8_Gb($_C)
    {
        $_String = '';
        if ($_C < 128) {
            $_String .= $_C;
        } elseif ($_C < 2048) {
            $_String .= chr(192 | $_C >> 6);
            $_String .= chr(128 | $_C & 63);
        } elseif ($_C < 65536) {
            $_String .= chr(224 | $_C >> 12);
            $_String .= chr(128 | $_C >> 6 & 63);
            $_String .= chr(128 | $_C & 63);
        } elseif ($_C < 2097152) {
            $_String .= chr(240 | $_C >> 18);
            $_String .= chr(128 | $_C >> 12 & 63);
            $_String .= chr(128 | $_C >> 6 & 63);
            $_String .= chr(128 | $_C & 63);
        }
        return iconv('UTF-8', 'GB2312', $_String);
    }
    // 图片上传
    public function imageUpload()
    {
        $error = '';
        $msg = '';
        $fileElementName = 'fileToUpload';
        if (!empty($_FILES[$fileElementName]['error'])) {
            switch ($_FILES[$fileElementName]['error']) {
            case '1':
                $error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
                break;
            case '2':
                $error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
                break;
            case '3':
                $error = 'The uploaded file was only partially uploaded';
                break;
            case '4':
                $error = 'No file was uploaded.';
                break;
            case '6':
                $error = 'Missing a temporary folder';
                break;
            case '7':
                $error = 'Failed to write file to disk';
                break;
            case '8':
                $error = 'File upload stopped by extension';
                break;
            case '999':
                
            default:
                $error = 'No error code avaiable';
            }
        } elseif (empty($_FILES['fileToUpload']['tmp_name']) || $_FILES['fileToUpload']['tmp_name'] == 'none') {
            $error = 'No file was uploaded..';
        } else {
            $info = $this->upload();
            $msg = $info[0]['savename'];
            @unlink($_FILES['fileToUpload']);
        }
        echo '{';
        echo ('error: \'' . $error) . '\',
';
        echo ('msg: \'' . $msg) . '\'
';
        echo '}';
    }
    public function upload()
    {
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();
        $upload->maxSize = C('UPLOAD_FILE_SIZE');
        $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg', 'zip');
        $upload->savePath = C('ADMIN_UPLOAD_PATH');
        $upload->saveRule = 'Y';
        if (!$upload->upload()) {
            $this->error($upload->getErrorMsg());
        } else {
            $info = $upload->getUploadFileInfo();
        }
        return $info;
    }
    public function createThumb()
    {
        import('ORG.Util.Image');
        $image = C('ADMIN_UPLOAD_PATH') . $_POST['fileName'];
        $thumbName = (C('ADMIN_UPLOAD_PATH') . '/thumbs/') . $_POST['fileName'];
        $res = Image::thumb($image, $thumbName, 1);
        echo json_encode(array('msg' => '', 'result' => '1'));
        return;
    }
    public function setTuijian($id, $tuijian)
    {
        $model = M('Content');
        $data = array('nr_good' => $tuijian);
        $map['id'] = array('in', $id);
        $result = $model->where($map)->setField($data);
        return $result;
    }
    public function setHidden($id, $shuxing)
    {
        $model = M('Channel');
        $data = array('cl_att' => $shuxing);
        $map['id'] = array('in', $id);
        $result = $model->where($map)->setField($data);
        return $result;
    }
    public function del_data($id, $tableName)
    {
        $model = M($tableName);
        $map['id'] = array('in', $id);
        $result = $model->where($map)->delete();
        return $result;
    }
    public function getSuoShu()
    {
        $suoshu = array();
        $model = M('Channel');
        $condition['cl_type'] = '0';
        $condition['cl_class'] = '0';
        $class = $model->where($condition)->order('cl_sort asc,id desc')->select();
        while (list($key, $val) = each($class)) {
            array_push($suoshu, $val);
            $result = $this->getClassOrder($val['id'], 0);
            if ($result) {
                while (list($key2, $val2) = each($result)) {
                    array_push($suoshu, $val2);
                }
            }
        }
        return $suoshu;
    }
    public function getTpl()
    {
        $result = array();
        $i = 0;
        $dir = C('HOME_TMPL_PATH') . C('HOME_DEFAULT_THEME');
        $files1 = scandir($dir);
        while (list($key, $val) = each($files1)) {
            if (substr($val, -5) == '.html') {
                $result[substr($val, 0, -5)] = $val;
            }
        }
        return $result;
    }
    public function getClassOrder($id, $count)
    {
        $count++;
        $fuhao = '';
        for ($i = 0; $i < $count; $i++) {
            $fuhao = '｜－' . $fuhao;
        }
        $result = array();
        $model = M('Channel');
        $condition['cl_type'] = '0';
        $condition['cl_class'] = $id;
        $class = $model->where($condition)->order('cl_sort asc,id desc')->select();
        if ($class) {
            while (list($key, $val) = each($class)) {
                $val['cl_name'] = $fuhao . $val['cl_name'];
                array_push($result, $val);
                $result1 = $this->getClassOrder($val['id'], $count);
                if ($result1) {
                    while (list($key1, $val1) = each($result1)) {
                        array_push($result, $val1);
                    }
                }
            }
        } else {
            return false;
        }
        return $result;
    }
    public function dir_list($path, $exts = '', $list = array())
    {
        $path = $this->dir_path($path);
        $files = glob($path . '*');
        foreach ($files as $v) {
            $fileext = $this->fileext($v);
            if (!$exts || preg_match("/\\.({$exts})/i", $v)) {
                $list[] = $v;
                if (is_dir($v)) {
                    $list = $this->dir_list($v, $exts, $list);
                }
            }
        }
        return $list;
    }
    public function dir_path($path)
    {
        $path = str_replace('\\', '/', $path);
        if (substr($path, -1) != '/') {
            $path = $path . '/';
        }
        return $path;
    }
    public function fileext($filename)
    {
        return strtolower(trim(substr(strrchr($filename, '.'), 1, 10)));
    }
    public function byte_format($input, $dec = 0)
    {
        $prefix_arr = array('B', 'K', 'M', 'G', 'T');
        $value = round($input, $dec);
        $i = 0;
        while ($value > 1024) {
            $value /= 1024;
            $i++;
        }
        $return_str = round($value, $dec) . $prefix_arr[$i];
        return $return_str;
    }
    public function GetDiyField($type = '', $row = '')
    {
        $exFlag = ',';
        $model = M('Class_par');
        $condition['cl_par_attid'] = $type;
        $result = $model->where($condition)->select();
        $tempStr = '';
        foreach ($result as $key => $r) {
            if (0 != $key) {
                $tempStr .= '<br />';
            }
            if (isset($row[$r['cl_par_name']])) {
                $fieldvalue = $row[$r['cl_par_name']];
            } else {
                $fieldvalue = '';
            }
            $tempStr .= '<tr';
            if ($r['cl_par_type'] == 'mediumtext') {
                $tempStr .= ' height="304"';
            }
            $tempStr .= ('><td valign="middle">' . $r['cl_par_key']) . '</td><td>';
            if (($r['cl_par_type'] == 'varchar' or $r['cl_par_type'] == 'int') or $r['cl_par_type'] == 'decimal') {
                $tempStr .= ((((('<input type="text" name="' . $r['cl_par_name']) . '" id="') . $r['cl_par_name']) . '" class="class_input" value="') . $fieldvalue) . '" />';
            } else {
                if ($r['cl_par_type'] == 'text') {
                    $tempStr .= ((((('<textarea name="' . $r['cl_par_name']) . '" id="') . $r['cl_par_name']) . '" class="class_areatext" style="margin:7px 0;">') . $fieldvalue) . '</textarea>';
                } else {
                    if ($r['cl_par_type'] == 'radio') {
                        if (!empty($r['cl_par_cnf'])) {
                            $cl_par_cnf = explode($exFlag, $r['cl_par_cnf']);
                            foreach ($cl_par_cnf as $k => $cl_par_cnf_arr) {
                                $cl_par_cnf_val = explode('=', $cl_par_cnf_arr);
                                if ($fieldvalue != '') {
                                    if ($cl_par_cnf_val[1] == $fieldvalue) {
                                        $checked = 'checked="checked"';
                                    } else {
                                        $checked = '';
                                    }
                                } else {
                                    if ($k == 0) {
                                        $checked = 'checked="checked"';
                                    } else {
                                        $checked = '';
                                    }
                                }
                                $tempStr .= (((((((('<input type="radio" name="' . $r['cl_par_name']) . '" id="') . $r['cl_par_name']) . '" value="') . $cl_par_cnf_val[1]) . '" ') . $checked) . ' />&nbsp;') . $cl_par_cnf_val[0];
                                if ($k < count($cl_par_cnf) - 1) {
                                    $tempStr .= '&nbsp;&nbsp;&nbsp;';
                                }
                            }
                        }
                    } else {
                        if ($r['cl_par_type'] == 'checkbox') {
                            if (!empty($r['cl_par_cnf'])) {
                                $cl_par_cnf = explode($exFlag, $r['cl_par_cnf']);
                                foreach ($cl_par_cnf as $k => $cl_par_cnf_arr) {
                                    $cl_par_cnf_val = explode('=', $cl_par_cnf_arr);
                                    if ($fieldvalue != '') {
                                        $fileall = explode($exFlag, $fieldvalue);
                                        if (is_array($fileall)) {
                                            if (in_array($cl_par_cnf_val[1], $fileall)) {
                                                $checked = 'checked="checked"';
                                            } else {
                                                $checked = '';
                                            }
                                        } else {
                                            if ($cl_par_cnf_val[1] == $fieldvalue) {
                                                $checked = 'checked="checked"';
                                            } else {
                                                $checked = '';
                                            }
                                        }
                                    } else {
                                        $checked = '';
                                    }
                                    $tempStr .= (((((((('<input type="checkbox" name="' . $r['cl_par_name']) . '[]" id="') . $r['cl_par_name']) . '[]" value="') . $cl_par_cnf_val[1]) . '" ') . $checked) . ' />&nbsp;') . $cl_par_cnf_val[0];
                                    if ($k < count($cl_par_cnf) - 1) {
                                        $tempStr .= '&nbsp;&nbsp;&nbsp;';
                                    }
                                }
                            }
                        } else {
                            if ($r['cl_par_type'] == 'select') {
                                if (!empty($r['cl_par_cnf'])) {
                                    $tempStr .= ((('<select name="' . $r['cl_par_name']) . '" id="') . $r['cl_par_name']) . '">';
                                    $cl_par_cnf = explode($exFlag, $r['cl_par_cnf']);
                                    foreach ($cl_par_cnf as $k => $cl_par_cnf_arr) {
                                        $cl_par_cnf_val = explode('=', $cl_par_cnf_arr);
                                        if ($fieldvalue != '') {
                                            if ($cl_par_cnf_val[1] == $fieldvalue) {
                                                $selected = 'selected="selected"';
                                            } else {
                                                $selected = '';
                                            }
                                        } else {
                                            $selected = '';
                                        }
                                        $cl_par_cnf_val = explode('=', $cl_par_cnf_arr);
                                        $tempStr .= ((((((((('<option name="' . $r['cl_par_name']) . '" id="') . $r['cl_par_name']) . '" value="') . $cl_par_cnf_val[1]) . '"') . $selected) . ' />') . $cl_par_cnf_val[0]) . '</option>';
                                        if ($k < count($cl_par_cnf) - 1) {
                                            $tempStr .= '&nbsp;&nbsp;&nbsp;';
                                        }
                                    }
                                    $tempStr .= '</select>';
                                }
                            } else {
                                if ($r['cl_par_type'] == 'file') {
                                    $tempStr .= ((((('<input type="text" name="' . $r['cl_par_name']) . '" id="') . $r['cl_par_name']) . '" class="class_input" value="') . $fieldvalue) . '" />';
                                    $tempStr .= ((((('<span class="cnote"><span class="gray_btn" onclick="GetUploadify(\'uploadify\',\'' . $r['cl_par_key']) . '\',\'all\',\'all\',1,') . $cfg_max_file_size) . ',\'') . $r['cl_par_name']) . '\')">上 传</span></span>';
                                } else {
                                    if ($r['cl_par_type'] == 'mediumtext') {
                                        $tempStr .= ((('<textarea name="nr_info" id="' . $r['cl_par_name']) . '" class="kindeditor">') . $fieldvalue) . '</textarea>';
                                        $tempStr .= ((((('<script type="text/javascript">var editor_' . $r['cl_par_name']) . ';KindEditor.ready(function(K) {editor_') . $r['cl_par_name']) . ' = K.create(\'textarea[name="') . $r['cl_par_name']) . '"]\', {allowFileManager : true,width:\'667px\',height:\'280px\'});});</script>';
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        $tempStr .= '</td><td></td></tr>';
        return $tempStr;
    }
}
function dir_list($path, $exts = '', $list = array())
{
    $path = $this->dir_path($path);
    $files = glob($path . '*');
    foreach ($files as $v) {
        $fileext = $this->fileext($v);
        if (!$exts || preg_match("/\\.({$exts})/i", $v)) {
            $list[] = $v;
            if (is_dir($v)) {
                $list = $this->dir_list($v, $exts, $list);
            }
        }
    }
    return $list;
}
function dir_path($path)
{
    $path = str_replace('\\', '/', $path);
    if (substr($path, -1) != '/') {
        $path = $path . '/';
    }
    return $path;
}
function fileext($filename)
{
    return strtolower(trim(substr(strrchr($filename, '.'), 1, 10)));
}
function byte_format($input, $dec = 0)
{
    $prefix_arr = array('B', 'K', 'M', 'G', 'T');
    $value = round($input, $dec);
    $i = 0;
    while ($value > 1024) {
        $value /= 1024;
        $i++;
    }
    $return_str = round($value, $dec) . $prefix_arr[$i];
    return $return_str;
}