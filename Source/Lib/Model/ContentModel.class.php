<?php 
class ContentModel extends Model {
	
	public function getInfo($fid,$lim,$ord,$size,$page,$pagetype) {
		$info = array();
		if ( $fid == '' ) return $info;
		$model = M("Content");
		$condition['nr_att'] = $fid;
		if ( $ord == "1" ) $order = "nr_good asc,id desc";
		elseif ( $ord == "2" ) $order = "id asc";
		else  $order = "nr_times desc";
		$class = $model->where($condition)->order($order)->limit($lim)->page($page)->select();
		while (list($key, $val) = each($class)) {
		
			$info[$key]['id'] = $val['id'];
	
			$info[$key]['title'] = $size==''?$val['nr_name']:substr($val['nr_name'],0,$size);
	
			if ( $val['nr_ext'] == 2 ) {
				$info[$key]['url'] = U('Index/actionClass?actype=content&fid=' . $val["nr_att"] . '&cid=' . $val["id"]);
			} else {
				$info[$key]['url'] = $val['nr_exturl'];
			}
	
			$info[$key]['img'] = C('HOME_UPLOAD_PATH').$val['nr_thumb'];
	
			$info[$key]['keywords'] = $val['nr_keyword'];
	
			$info[$key]['description'] = $val['nr_description'];
	
			$info[$key]['info'] = $val['nr_info'];
	
			$info[$key]['time'] = $val['nr_times'];
			
		}
		
		
		import("ORG.Util.Page");
		$count = $model->where($condition)->count();
		$Page = new Page($count,$lim,$page);
		if ( $pagetype == "0" ){
			$Page->setConfig('theme',' %first% %upPage%   %linkPage%  %downPage%  %end%');
		} elseif ( $pagetype == "1" ) {
			$Page->setConfig('theme',' %linkPage%');
		} elseif ( $pagetype == "2" ) {
			$Page->setConfig('theme',' %upPage%  %downPage%');
		} elseif ( $pagetype == "3" ) {
			$Page->setConfig('theme',' %first%   %linkPage%  %end%');
		} elseif ( $pagetype == "4" ) {
			$Page->setConfig('theme',' %upPage%   %linkPage%  %downPage%');
		}
		$show = $Page->show();
		
		$result[0] = $info;
		$result[1] = $show;
		
		return $result;
	}
	
	public function getTagInfo($keyword,$lim,$ord,$page,$pagetype) {
		$info = array();
		if ( $keyword == '' ) return $info;
		$model = M("Content");
		$map['nr_keyword'] = array('like','%'.$keyword.'%');
		if ( $ord == "1" ) $order = "nr_good asc,id desc";
		elseif ( $ord == "2" ) $order = "id asc";
		else  $order = "nr_times desc";
		$class = $model->where($map)->order($order)->limit($lim)->page($page)->select();
		while (list($key, $val) = each($class)) {
			$info[$key]['title'] = $val['nr_name'];
			if ( $val['nr_ext'] == 2 ) {
				$info[$key]['url'] = U('Index/actionClass?actype=content&fid=' . $val["nr_att"] . '&cid=' . $val["id"]);
			} else {
				$info[$key]['url'] = $val['nr_exturl'];
			}
			
		}
		
		
		import("ORG.Util.Page");
		$count = $model->where($map)->count();
		$Page = new Page($count,$lim,$page);
		if ( $pagetype == "0" ){
			$Page->setConfig('theme',' %first% %upPage%   %linkPage%  %downPage%  %end%');
		} elseif ( $pagetype == "1" ) {
			$Page->setConfig('theme',' %linkPage%');
		} elseif ( $pagetype == "2" ) {
			$Page->setConfig('theme',' %upPage%  %downPage%');
		} elseif ( $pagetype == "3" ) {
			$Page->setConfig('theme',' %first%   %linkPage%  %end%');
		} elseif ( $pagetype == "4" ) {
			$Page->setConfig('theme',' %upPage%   %linkPage%  %downPage%');
		}
		$show = $Page->show();
		
		$result[0] = $info;
		$result[1] = $show;
		
		return $result;
	}
	
	public function getContent($cid) {
		$info = array();
		if ( $cid == '' ) return $info;
		$model = M("Content");
		$class = $model->getById($cid);
	
		$info['title'] = $class['nr_name'];
	
		$info['img'] = C('HOME_UPLOAD_PATH').$class['nr_thumb'];
	
		$info['content'] = $class['nr_edit'];
	
		$info['sum'] = $class['nr_info'];

		$info['keywords'] = $class['nr_keyword'];

		$info['description'] = $class['nr_description'];
	
		$info['time'] = $class['nr_times'];
	
		$info['aut'] = $class['nr_author'];
		return $info;
	}
	
}