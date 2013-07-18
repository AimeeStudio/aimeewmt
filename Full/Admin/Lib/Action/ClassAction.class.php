<?php
class ClassAction extends CommonAction {

    // 显示管理分类的增加分类页面
    public function add_class(){
		//$this->assign("jumpUrl","__SELF__");
		$this->assign("jumpUrl",U('Class/class_manage'));
		if(isset($_POST['cl_type'])) {
			$data = array();
			if (isset($_POST['cl_class_hidden'])) {
				$data['cl_class'] = $_POST['cl_class_hidden'];
			} else {
				$data['cl_class'] = $_POST['cl_class'];
			}
			$data['cl_type'] = $_POST['cl_type'];
			$data['cl_att'] = $_POST['cl_att'];
			$data['cl_name'] = $_POST['cl_name'];
			//如果顺序没设置，默认为0，如果再增加栏目，同样顺序为0。
			if ( $_POST['cl_sort'] == "" ) {
				$data['cl_sort'] = 0;
			} else {
				$data['cl_sort'] = $_POST['cl_sort'];
			}
			$data['cl_info'] = $_POST['cl_info'];
			$data['cl_thumb'] = $_POST['sl_thumb'];
			if ( $_POST['cl_type'] == 1 ) {
				//外链地址
				$data['cl_exturl'] = $_POST['cl_exturl'];				
			} else {
				//栏目英文名  如果没有填写英文，当用户增加后，栏目自动生成拼音或手动生成。
				if ( $_POST['cl_en_name'] == "" ) {
					$data['cl_en_name'] = $this->Pinyin($data['cl_name']);
				} else {
					$data['cl_en_name'] = $_POST['cl_en_name'];
				}
				$data['cl_keyword'] = $_POST['cl_keyword'];
				$data['cl_description'] = $_POST['cl_description'];
				$data['cl_domain'] = $_POST['cl_domain'];
				$data['cl_tplclass'] = $_POST['cl_tplclass'];
				//if ( $_POST['cl_type'] == 0 ) {
					$data['cl_tplcontent'] = $_POST['cl_tplcontent'];
				//}
			}
			
			$class = M('Channel');
			if(isset($_POST['id'])) {
				//编辑数据
				$condition['id'] = $_POST['id'];
				$result = $class->where($condition)->save($data);
				if ( $result ) {
					//成功提示
					$this->success('编辑分类成功');
				} else {
					//错误提示
					$this->error('编辑分类失败');
				}
			} else {
				// 添加数据
				$result = $class->add($data);
				if ( $result ) {
					//成功提示
					$this->success('增加分类成功');
				} else {
					//错误提示
					$this->error('增加分类失败');
				}
			}
			
		} else {
			if (isset($_GET['suoshuId'])) $this->assign("suoshuId",$_GET['suoshuId']);

			$this->assign("suoshu",$this->getSuoShu());
			$this->assign("tplfile",$this->getTpl());
			if (isset($_GET['id'])) {
				$model = M("Channel");
				$condition['id'] = $_GET['id'];
				$classnr = $model->where($condition)->find();
				$this->assign("classnr",$classnr);
				$this->display("edit_class");
			} else {
				$this->display();
			}
		}
    }
	
    public function class_page(){
		if (isset($_GET['id'])) {
			$model = M("Channel");
			$condition['id'] = $_GET['id'];
			$pageview = $model->where($condition)->find();
			$this->assign("pageview",$pageview);
		}
		$this->display();
    }
	
    // 显示分类管理的管理分类页面
    public function class_manage(){
		$this->assign("jumpUrl","__SELF__");
		if(isset($_POST['duoxuanHidden'])) {
			//Log::write('文件名9999999999：' . $_POST['duoxuanHidden']);
			$id = $_POST['duoxuanHidden'];
			if ($_POST['piliangHidden'] == "1") {
				$result = $this->setHidden($id,1);
			} elseif ($_POST['piliangHidden'] == "2") {
				$result = $this->setHidden($id,2);
			} else {
				$result = $this->del_data($id,"channel");
			}
			if ( $result !== false ) {
				//成功提示
				$this->success('批量设置成功');
			} else {
				//错误提示
				$this->error('批量设置失败');
			}
		} else {
			$fenleiList = array();
			$model = M("Channel");
			$page = isset($_GET['p'])? $_GET['p'] : '1';  //默认显示首页数据
			//查询类型为【外链】的数据
			$condition['cl_type'] = "1";
			$class = $model->where($condition)->order('cl_sort asc,id desc')->select();
			while (list($key, $val) = each($class)) {
				array_push($fenleiList,$val);
			}
			
			//查询类型为【项目】的数据
			$suoshu = $this->getSuoShu();
			while (list($key2, $val2) = each($suoshu)) {
				array_push($fenleiList,$val2);
			}

			import("ORG.Util.Page");// 导入分页类
			$count = count($fenleiList);// 查询满足要求的总记录数
			$length = 20;
			$offset = $length * ($page - 1);
			$Page = new Page($count,$length,$page);// 实例化分页类 传入总记录数和每页显示的记录数和当前页数
			$Page->setConfig('theme',' %upPage%   %linkPage%  %downPage%');
			$show = $Page->show();// 分页显示输出
			$this->assign("suoshu",$suoshu);
			
			$this->assign("fenleiList",$fenleiList);
			$this->assign("offset",$offset);
			$this->assign("length",$length);
			$this->assign("page",$show);
			$this->display();
		}
	}
	
    // 增加、修改分类参数页面
    public function class_par_set(){
		//$this->assign("jumpUrl","__SELF__");
		$this->assign("jumpUrl",U('Class/class_parameters'));
		if(isset($_POST['cl_par_name'])) {
			$data = array();
			$data['cl_par_attid'] = $_POST['cl_par_attid'];
			$data['cl_par_name'] = $_POST['cl_par_name'];
			$data['cl_par_key'] = $_POST['cl_par_key'];
			$data['cl_par_type'] = $_POST['cl_par_type'];
			$data['cl_par_cnf'] = $_POST['cl_par_cnf'];
			
			$class = M('Class_par');
			if(isset($_POST['id'])) {
				//编辑数据
				$condition['id'] = $_POST['id'];
				$result = $class->where($condition)->save($data);
				if ( $result ) {
					//成功提示
					$this->success('编辑分类参数成功');
				} else {
					//错误提示
					$this->error('编辑分类参数失败');
				}
			} else {
				// 添加数据
				$result = $class->add($data);
				if ( $result ) {
					//成功提示
					$this->success('增加分类参数成功');
				} else {
					//错误提示
					$this->error('增加分类参数失败');
				}
			}
			
		} else {
			//取得所属栏目
			$this->assign("suoshu",$this->getSuoShu());
			
			if (isset($_GET['id'])) {
				$model = M("Class_par");
				$condition['id'] = $_GET['id'];
				$classnr = $model->where($condition)->find();
				$this->assign("classnr",$classnr);
				$this->display("class_par_edit");
			} else {
				$this->display();
			}
		}
    }
	
	
    // 管理分类参数页面
    public function class_parameters(){
		$this->assign("jumpUrl","__SELF__");
		if(isset($_POST['duoxuanHidden'])) {
			$id = $_POST['duoxuanHidden'];
			$result = $this->del_data($id,"class_par");
			if ( $result ) {
				//成功提示
				$this->success('批量设置成功');
			} else {
				//错误提示
				$this->error('批量设置失败');
			}
		} else {
			$flcsList = array();
			$page = isset($_GET['p'])? $_GET['p'] : '1';  //默认显示首页数据
			$model = M("Class_par");
			//查询分类参数的数据
			$field = C('DB_PREFIX') . "class_par.id as id," . C('DB_PREFIX') . "class_par.cl_par_name as cl_par_name," . C('DB_PREFIX') . "class_par.cl_par_type as cl_par_type," . C('DB_PREFIX') . "class_par.cl_par_key as cl_par_key," . C('DB_PREFIX') . "channel.cl_name as cl_name";
			$joinStr = C('DB_PREFIX') . "channel ON " . C('DB_PREFIX') . "class_par.cl_par_attid = " . C('DB_PREFIX') . "channel.id";
			$order = C('DB_PREFIX') . "class_par.id desc";
			
			$flcsList = $model->field($field)->join($joinStr)->order($order)->page($page)->select();
			
			import("ORG.Util.Page");// 导入分页类
			$count = count($flcsList);// 查询满足要求的总记录数
			$Page = new Page($count,"",$page);// 实例化分页类 传入总记录数和每页显示的记录数和当前页数
			$Page->setConfig('theme',' %upPage%   %linkPage%  %downPage%');
			$show = $Page->show();// 分页显示输出
						
			$this->assign("flcsList",$flcsList);
			$this->assign("page",$show);
			$this->display();
		}
	}
	
	
	//设置属性  显示、隐藏
	public function setShuxing() {
		$this->assign("jumpUrl",U('Class/class_manage'));
		$id = $_GET['id'];
		$shuxing = $_GET['shuxing'];
		$result = $this->setHidden($id,$shuxing);
		if ( $result ) {
			//成功提示
			$this->success('属性设置成功');
		} else {
			//错误提示
			$this->error('属性设置失败');
		}
	}
	
	public function del_class() {
		$this->assign("jumpUrl",U('Class/class_manage'));
		$id = $_GET['id'];
		$result = $this->del_data($id,"channel");
		if ( $result ) {
			//成功提示
			$this->success('记录删除成功');
		} else {
			//错误提示
			$this->error('记录删除失败');
		}
	}
	
	public function del_class_par() {
		$this->assign("jumpUrl",U('Class/class_parameters'));
		$id = $_GET['id'];
		$result = $this->del_data($id,"class_par");
		if ( $result ) {
			//成功提示
			$this->success('记录删除成功');
		} else {
			//错误提示
			$this->error('记录删除失败');
		}
	}
	
	//所属栏目移动
	public function suoshu_yidong() {
		$this->assign("jumpUrl",U('Class/class_manage'));
		$class = M('channel');
		$data = array();
		$data['cl_class'] = $_POST['cl_class'];
		//编辑数据
		$condition['id'] = $_POST['suoshuId'];
		$result = $class->where($condition)->save($data);
		if ( $result ) {
			//成功提示
			$this->success('所属栏目移动成功');
		} else {
			//错误提示
			$this->error('所属栏目移动失败');
		}
	}
	
}