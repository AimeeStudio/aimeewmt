<?php 
class ChannelModel extends Model {
	protected $countlim = 0;
	protected $orderBy = "1";
	//取得所属栏目
	public function getInfo($att,$lim,$ord) {
		//取得所属栏目
		$suoshu = array();
		$this->countlim = 0;
		$model = M("Channel");
		$condition['cl_class'] = "0";
		$this->orderBy = $ord;
		if ( $this->orderBy == "1" ) $order = "cl_sort asc,id desc";
		else  $order = "id asc";
		$class = $model->where($condition)->order($order)->select();
		while (list($key, $val) = each($class)) {
			//array_push($suoshu,$val);
			//序号
			$suoshu[$this->countlim]['id'] = $val['id'];
			//名称
			$suoshu[$this->countlim]['title'] = $val['cl_name'];
			//超链接
			if ( $val['cl_type'] == 1 ) {
				$suoshu[$this->countlim]['url'] = $val['cl_exturl'];
			} else {
				$suoshu[$this->countlim]['url'] = U('Index/actionClass?actype=channel&fid='.$val['id']);
			}
			//缩略图
			$suoshu[$this->countlim]['img'] = C('HOME_UPLOAD_PATH').$val['cl_thumb'];
			//关键字
			$suoshu[$this->countlim]['keywords'] = $val['cl_keyword'];
			//描述
			$suoshu[$this->countlim]['description'] = $val['cl_description'];
			//统计
			$suoshu[$this->countlim]['count'] = "1";
			//副标题
			$suoshu[$this->countlim]['subtitle'] = '副标题';
			//控制调用分类数量
			if (++$this->countlim == $lim) return $suoshu;
			if ( $att == '1' ) continue;  //1:调用顶级分类   2 调用子级分类
			$result = $this->getClassOrder($val['id'],0);
			if ( $result ) {
				while (list($key2, $val2) = each($result)) {
					//array_push($suoshu,$val2);
					//序号
					$suoshu[$this->countlim]['id'] = $val2['id'];
					//名称
					$suoshu[$this->countlim]['title'] = $val2['cl_name'];
					//超链接
					$suoshu[$this->countlim]['url'] = U('Index/actionClass?fid='.$val2['id']);
					//缩略图
					$suoshu[$this->countlim]['img'] = C('HOME_UPLOAD_PATH').$val2['cl_thumb'];
					//关键字
					$suoshu[$this->countlim]['keywords'] = $val2['cl_keyword'];
					//描述
					$suoshu[$this->countlim]['description'] = $val2['cl_description'];
					//统计
					$suoshu[$this->countlim]['count'] = "1";
					//副标题
					$suoshu[$this->countlim]['subtitle'] = '副标题';
					//控制调用分类数量
					if (++$this->countlim == $lim) return $suoshu;
					//Log::write('文件名9999999999：' . $key2 . '=>' . $val2['cl_name']);
				}
			}
		}
		
		return $suoshu;
	}
	
	//取得所属栏目
	public function getInfoC($extid,$lim,$ord) {
		//取得所属栏目
		$suoshu = array();
		$this->countlim = 0;
		if ( $extid == '' ) return $suoshu;
		$model = M("Channel");
		$this->orderBy = $ord;
		if ( $this->orderBy == "1" ) $order = "cl_sort asc,id desc";
		else  $order = "id asc";
		$class = $model->where("cl_class='" . $extid . "'")->order($order)->select();
		while (list($key, $val) = each($class)) {
			//array_push($suoshu,$val);
			//序号
			$suoshu[$this->countlim]['id'] = $val['id'];
			//名称
			$suoshu[$this->countlim]['title'] = $val['cl_name'];
			//超链接
			if ( $val['cl_type'] == 1 ) {
				$suoshu[$this->countlim]['url'] = $val['cl_exturl'];
			} else {
				$suoshu[$this->countlim]['url'] = U('Index/actionClass?actype=channel&fid='.$val['id']);
			}
			//缩略图
			$suoshu[$this->countlim]['img'] = C('HOME_UPLOAD_PATH').$val['cl_thumb'];
			//关键字
			$suoshu[$this->countlim]['keywords'] = $val['cl_keyword'];
			//描述
			$suoshu[$this->countlim]['description'] = $val['cl_description'];
			//统计
			$suoshu[$this->countlim]['count'] = "1";
			//副标题
			$suoshu[$this->countlim]['subtitle'] = '副标题';
			//控制调用分类数量
			if (++$this->countlim == $lim) return $suoshu;
			
		}
		
		return $suoshu;
	}
	
	//递归调用得到排序后的栏目信息
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
			//查询到数据
			while (list($key, $val) = each($class)) {
				$val['cl_name'] = $fuhao . $val['cl_name'];
				array_push($result,$val);
				$result1 = $this->getClassOrder($val['id'],$count);
				if ( $result1 ) {
					//Log::write('文件名ssssssssssssssssss：');
					while (list($key1, $val1) = each($result1)) {
						array_push($result,$val1);
						//Log::write('文件名ffffff：' . $key1 . '=>' . $val1['cl_name']);
					}
				}
			}
		} else {
			//没查询到数据，跳出方法的条件
			return false;
		}
		
		return $result;
	}
	
	//取得TAG标签  分类中设定的关键字
	public function getTag($fid,$lim) {
		//取得所属栏目
		$tagInfo = array();
		$this->countlim = 0;
		if ( $fid == '' ) return $tagInfo;
		$model = M("Channel");
		$tags = $model->where("id='" . $fid . "'")->getField('cl_keyword');
		$class = explode(",",str_replace("，",",",$tags));
		//Log::write('文件名Channel：' . $class);
		while (list($key, $val) = each($class)) {
			//名称
			$tagInfo[$this->countlim]['title'] = trim($val);
			//超链接
			$tagInfo[$this->countlim]['url'] = U('Index/taglist?key=' . trim($val));
			//控制调用分类数量
			if (++$this->countlim == $lim) return $tagInfo;
			
		}
		return $tagInfo;
	}
	
	//取得相应的内容数据
	public function getContent($fid) {
		//取得相应的内容数据
		$info = array();
		if ( $fid == '' ) return $info;
		$model = M("Channel");
		$class = $model->getById($fid);
		//Log::write('文件名9999999999：' . $class['nr_name']);
		//标题
		$info['title'] = $class['cl_name'];
		//缩略图
		$info['img'] = C('HOME_UPLOAD_PATH').$class['cl_thumb'];
		//内容
		$info['content'] = $class['cl_info'];
		//关键字
		$info['keywords'] = $class['cl_keyword'];
		//描述
		$info['description'] = $class['cl_description'];
		return $info;
	}
	
	
	
}