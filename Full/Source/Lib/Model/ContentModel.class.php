<?php 
class ContentModel extends Model {
	
	//取得相应分类的内容列表
	public function getInfo($fid,$lim,$ord,$size,$page,$pagetype) {
		//取得相应分类的内容列表
		$info = array();
		if ( $fid == '' ) return $info;
		$model = M("Content");
		$condition['nr_att'] = $fid;
		if ( $ord == "1" ) $order = "nr_good asc,id desc";
		elseif ( $ord == "2" ) $order = "id asc";
		else  $order = "nr_times desc";
		$class = $model->where($condition)->order($order)->limit($lim)->page($page)->select();
		while (list($key, $val) = each($class)) {
			//序号
			$info[$key]['id'] = $val['id'];
			//名称
			$info[$key]['title'] = $size==''?$val['nr_name']:substr($val['nr_name'],0,$size);
			//超链接
			if ( $val['nr_ext'] == 2 ) {
				$info[$key]['url'] = U('Index/actionClass?actype=content&fid=' . $val["nr_att"] . '&cid=' . $val["id"]);
			} else {
				$info[$key]['url'] = $val['nr_exturl'];
			}
			//缩略图
			$info[$key]['img'] = C('HOME_UPLOAD_PATH').$val['nr_thumb'];
			//关键字
			$info[$key]['keywords'] = $val['nr_keyword'];
			//描述
			$info[$key]['description'] = $val['nr_description'];
			//简介
			$info[$key]['info'] = $val['nr_info'];
			//时间
			$info[$key]['time'] = $val['nr_times'];
			
		}
		
		
		import("ORG.Util.Page");// 导入分页类
		$count = $model->where($condition)->count();// 查询满足要求的总记录数
		$Page = new Page($count,$lim,$page);// 实例化分页类 传入总记录数和每页显示的记录数和当前页数
		if ( $pagetype == "0" ){
			//首页 上一页 1 2 3 4 5 下一页 尾页
			$Page->setConfig('theme',' %first% %upPage%   %linkPage%  %downPage%  %end%');
		} elseif ( $pagetype == "1" ) {
			//1 2 3 4 5
			$Page->setConfig('theme',' %linkPage%');
		} elseif ( $pagetype == "2" ) {
			//上一页 下一页
			$Page->setConfig('theme',' %upPage%  %downPage%');
		} elseif ( $pagetype == "3" ) {
			//首页 1 2 3 4 5 尾页
			$Page->setConfig('theme',' %first%   %linkPage%  %end%');
		} elseif ( $pagetype == "4" ) {
			//上一页 1 2 3 4 5 下一页
			$Page->setConfig('theme',' %upPage%   %linkPage%  %downPage%');
		}
		$show = $Page->show();// 分页显示输出
		
		$result[0] = $info;
		$result[1] = $show;
		
		return $result;
	}
	
	//取得相应分类的标签列表
	public function getTagInfo($keyword,$lim,$ord,$page,$pagetype) {
		//取得相应分类的标签列表
		$info = array();
		if ( $keyword == '' ) return $info;
		$model = M("Content");
		$map['nr_keyword'] = array('like','%'.$keyword.'%');
		if ( $ord == "1" ) $order = "nr_good asc,id desc";
		elseif ( $ord == "2" ) $order = "id asc";
		else  $order = "nr_times desc";
		$class = $model->where($map)->order($order)->limit($lim)->page($page)->select();
		while (list($key, $val) = each($class)) {
			//名称
			$info[$key]['title'] = $val['nr_name'];
			//超链接
			if ( $val['nr_ext'] == 2 ) {
				$info[$key]['url'] = U('Index/actionClass?actype=content&fid=' . $val["nr_att"] . '&cid=' . $val["id"]);
			} else {
				$info[$key]['url'] = $val['nr_exturl'];
			}
			
		}
		
		
		import("ORG.Util.Page");// 导入分页类
		$count = $model->where($map)->count();// 查询满足要求的总记录数
		$Page = new Page($count,$lim,$page);// 实例化分页类 传入总记录数和每页显示的记录数和当前页数
		if ( $pagetype == "0" ){
			//首页 上一页 1 2 3 4 5 下一页 尾页
			$Page->setConfig('theme',' %first% %upPage%   %linkPage%  %downPage%  %end%');
		} elseif ( $pagetype == "1" ) {
			//1 2 3 4 5
			$Page->setConfig('theme',' %linkPage%');
		} elseif ( $pagetype == "2" ) {
			//上一页 下一页
			$Page->setConfig('theme',' %upPage%  %downPage%');
		} elseif ( $pagetype == "3" ) {
			//首页 1 2 3 4 5 尾页
			$Page->setConfig('theme',' %first%   %linkPage%  %end%');
		} elseif ( $pagetype == "4" ) {
			//上一页 1 2 3 4 5 下一页
			$Page->setConfig('theme',' %upPage%   %linkPage%  %downPage%');
		}
		$show = $Page->show();// 分页显示输出
		
		$result[0] = $info;
		$result[1] = $show;
		
		return $result;
	}
	
	//取得相应的内容数据
	public function getContent($cid) {
		//取得相应的内容数据
		$info = array();
		if ( $cid == '' ) return $info;
		$model = M("Content");
		$class = $model->getById($cid);
		//Log::write('文件名9999999999：' . $class['nr_name']);
		//标题
		$info['title'] = $class['nr_name'];
		//缩略图
		$info['img'] = C('HOME_UPLOAD_PATH').$class['nr_thumb'];
		//内容
		$info['content'] = $class['nr_edit'];
		//简介
		$info['sum'] = $class['nr_info'];
		//关键字
		$info['keywords'] = $class['nr_keyword'];
		//描述
		$info['description'] = $class['nr_description'];
		//时间
		$info['time'] = $class['nr_times'];
		//作者
		$info['aut'] = $class['nr_author'];
		return $info;
	}
	
}