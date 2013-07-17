<?php 
class ChannelModel extends Model {
	protected $countlim = 0;
	protected $orderBy = "1";
	public function getInfo($att,$lim,$ord) {
		$suoshu = array();
		$this->countlim = 0;
		$model = M("Channel");
		$condition['cl_class'] = "0";
		$this->orderBy = $ord;
		if ( $this->orderBy == "1" ) $order = "cl_sort asc,id desc";
		else  $order = "id asc";
		$class = $model->where($condition)->order($order)->select();
		while (list($key, $val) = each($class)) {
			
			$suoshu[$this->countlim]['id'] = $val['id'];
			
			$suoshu[$this->countlim]['title'] = $val['cl_name'];
			
			if ( $val['cl_type'] == 1 ) {
				$suoshu[$this->countlim]['url'] = $val['cl_exturl'];
			} else {
				$suoshu[$this->countlim]['url'] = U('Index/actionClass?actype=channel&fid='.$val['id']);
			}
			
			$suoshu[$this->countlim]['img'] = C('HOME_UPLOAD_PATH').$val['cl_thumb'];
		
			$suoshu[$this->countlim]['keywords'] = $val['cl_keyword'];
		
			$suoshu[$this->countlim]['description'] = $val['cl_description'];
		
			$suoshu[$this->countlim]['count'] = "1";
		
			$suoshu[$this->countlim]['subtitle'] = '副标题';
			
			if (++$this->countlim == $lim) return $suoshu;
			if ( $att == '1' ) continue;  
			$result = $this->getClassOrder($val['id'],0);
			if ( $result ) {
				while (list($key2, $val2) = each($result)) {
					
					$suoshu[$this->countlim]['id'] = $val2['id'];
				
					$suoshu[$this->countlim]['title'] = $val2['cl_name'];
					
					$suoshu[$this->countlim]['url'] = U('Index/actionClass?fid='.$val2['id']);
					
					$suoshu[$this->countlim]['img'] = C('HOME_UPLOAD_PATH').$val2['cl_thumb'];
					
					$suoshu[$this->countlim]['keywords'] = $val2['cl_keyword'];
					
					$suoshu[$this->countlim]['description'] = $val2['cl_description'];
					
					$suoshu[$this->countlim]['count'] = "1";
					
					$suoshu[$this->countlim]['subtitle'] = '副标题';
					
					if (++$this->countlim == $lim) return $suoshu;
					
				}
			}
		}
		
		return $suoshu;
	}
	
	
	public function getInfoC($extid,$lim,$ord) {
		
		$suoshu = array();
		$this->countlim = 0;
		if ( $extid == '' ) return $suoshu;
		$model = M("Channel");
		$this->orderBy = $ord;
		if ( $this->orderBy == "1" ) $order = "cl_sort asc,id desc";
		else  $order = "id asc";
		$class = $model->where("cl_class='" . $extid . "'")->order($order)->select();
		while (list($key, $val) = each($class)) {
			
			$suoshu[$this->countlim]['id'] = $val['id'];
			
			$suoshu[$this->countlim]['title'] = $val['cl_name'];
			
			if ( $val['cl_type'] == 1 ) {
				$suoshu[$this->countlim]['url'] = $val['cl_exturl'];
			} else {
				$suoshu[$this->countlim]['url'] = U('Index/actionClass?actype=channel&fid='.$val['id']);
			}
			
			$suoshu[$this->countlim]['img'] = C('HOME_UPLOAD_PATH').$val['cl_thumb'];
			
			$suoshu[$this->countlim]['keywords'] = $val['cl_keyword'];
			
			$suoshu[$this->countlim]['description'] = $val['cl_description'];
			
			$suoshu[$this->countlim]['count'] = "1";
			
			$suoshu[$this->countlim]['subtitle'] = '副标题';
			
			if (++$this->countlim == $lim) return $suoshu;
			
		}
		
		return $suoshu;
	}
	
	
	public function getClassOrder($id,$count) {
		$count++;
		$fuhao = "";
		for ($i=0;$i<$count;$i++){
			$fuhao = "&nbsp;&nbsp;&nbsp;&nbsp;" . $fuhao;
		}
		$result = array();
		$model = M("Channel");
		if ( $this->orderBy == "1" ) $order = "cl_sort asc,id desc";
		else  $order = "id asc";
		$class = $model->where("cl_type='0' AND cl_class='" . $id . "'")->order($order)->select();
		if ( $class ) {
			
			while (list($key, $val) = each($class)) {
				$val['cl_name'] = $fuhao . $val['cl_name'];
				array_push($result,$val);
				$result1 = $this->getClassOrder($val['id'],$count);
				if ( $result1 ) {
					
					while (list($key1, $val1) = each($result1)) {
						array_push($result,$val1);
						
					}
				}
			}
		} else {
			
			return false;
		}
		
		return $result;
	}
	
	
	public function getTag($fid,$lim) {
		
		$tagInfo = array();
		$this->countlim = 0;
		if ( $fid == '' ) return $tagInfo;
		$model = M("Channel");
		$tags = $model->where("id='" . $fid . "'")->getField('cl_keyword');
		$class = explode(",",str_replace("，",",",$tags));
		
		while (list($key, $val) = each($class)) {
			
			$tagInfo[$this->countlim]['title'] = trim($val);
			
			$tagInfo[$this->countlim]['url'] = U('Index/taglist?key=' . trim($val));
			
			if (++$this->countlim == $lim) return $tagInfo;
			
		}
		return $tagInfo;
	}
	
	
	public function getContent($fid) {
		$info = array();
		if ( $fid == '' ) return $info;
		$model = M("Channel");
		$class = $model->getById($fid);
	
		$info['title'] = $class['cl_name'];
		$info['img'] = C('HOME_UPLOAD_PATH').$class['cl_thumb'];
		$info['content'] = $class['cl_info'];
		$info['keywords'] = $class['cl_keyword'];
		$info['description'] = $class['cl_description'];
		return $info;
	}
	
	
	
}