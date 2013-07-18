<?php
class SettingAction extends CommonAction {
	protected $item;
	protected function _initialize() {
		parent::_initialize();
		$this->item = isset($_REQUEST['item']) ? $_REQUEST['item'] : '0';
		$this->assign("item",$this->item);
	}

    // 显示网站设置的基本配置页面
    public function basic(){
		$this->assign("jumpUrl","__SELF__");
		if(isset($_POST['ai'])) {
			if ($_POST['ai']['timezone']==0) $v = "PRC"; //北京时间
			elseif ($_POST['ai']['timezone']==1) $v = "America/New_York"; //纽约时间
			elseif ($_POST['ai']['timezone']==2) $v = "Europe/Paris"; //巴黎时间
			$tmp = file_get_contents(CONF_PATH.'config.php');
			$tmp = preg_replace("/'DEFAULT_TIMEZONE'\s*\=\>\s*'.*?'\,/is", "'DEFAULT_TIMEZONE' => '".$v."',", $tmp);
			if(file_put_contents(CONF_PATH.'config.php',$tmp))
			{
				@unlink(RUNTIME_PATH.'~runtime.php');
				// 更新数据
				if ($this->_update($_POST['ai'])) {
					//成功提示
					$this->success('基本配置修改成功');
				} else {
					//错误提示
					$this->error('基本配置修改失败');
				}
			} else $this->error('全局设置修改失败');
			
		} else {
			$model = M("Setting");
			$setting = $model->where("item='".$this->item."'")->getField('item_key,item_value');
			$this->assign("ai",$setting);
			$this->display();
		}
    }
    
    // 显示网站设置的全局设置页面
    public function all(){
		$this->assign("jumpUrl","__SELF__");
		if(isset($_POST['all'])) {
			if ($_POST['all']['sys_lang']==0) $v = "zh-cn";
			elseif ($_POST['all']['sys_lang']==1) $v = "zh-tw";
			elseif ($_POST['all']['sys_lang']==2) $v = "jp";
			elseif ($_POST['all']['sys_lang']==3) $v = "en-us";
			elseif ($_POST['all']['sys_lang']==4) $v = "kr";
			$tmp = file_get_contents(CONF_PATH.'config.php');
			$tmp = preg_replace("/'DEFAULT_LANG'\s*\=\>\s*'.*?'\,/is", "'DEFAULT_LANG' => '".$v."',", $tmp);
			if(file_put_contents(CONF_PATH.'config.php',$tmp))
			{
				@unlink(RUNTIME_PATH.'~runtime.php');
				// 更新数据
				if ($this->_update($_POST['all'])) {
					//成功提示
					$this->success('全局设置修改成功');
				} else {
					//错误提示
					$this->error('全局设置修改失败');
				}
			} else $this->error('全局设置修改失败');
			
		} else {
			$model = M("Setting");
			$setting = $model->where("item='".$this->item."'")->getField('item_key,item_value');
			$this->assign("all",$setting);
			$this->display("all_set");
		}
    }
    
    // 显示网站设置的安全设置页面
    public function security(){
		$this->assign("jumpUrl","__SELF__");
		if(isset($_POST['security'])) {
			$v = $_POST['security']['admin_log']==0?"true":"false";
			$tmp = file_get_contents(CONF_PATH.'debug.php');
			$tmp = preg_replace("/'LOG_RECORD'\s*\=\>\s*(?:true|false)\,/is", "'LOG_RECORD' => ". $v .",", $tmp);
			if(file_put_contents(CONF_PATH.'debug.php',$tmp))
			{
				@unlink(RUNTIME_PATH.'~runtime.php');
				// 更新数据
				if ($this->_update($_POST['security'])) {
					//成功提示
					$this->success('安全设置修改成功');
				} else {
					//错误提示
					$this->error('安全设置修改失败');
				}
			} else $this->error('安全设置修改失败');
			
			
		} else {
			$model = M("Setting");
			$setting = $model->where("item='".$this->item."'")->getField('item_key,item_value');
			$this->assign("security",$setting);
			$this->display("security_set");
		}
    }
    
	protected function _update($settingarr, $item = '') {
		if($item == '') $item = $this->item;
		$setting = M('Setting');
		$setting->where("item='".$item."'")->delete(); 
		$data = array();
		foreach($settingarr as $k => $v) {
			if(is_array($v)) $v = implode(',', $v);
			$data['item'] = $item;
			$data['item_key'] = $k;
			$data['item_value'] = $v;
			$result = $setting->add($data);
			if(false === $result) return false;
		}
		return true;
	}
	
}