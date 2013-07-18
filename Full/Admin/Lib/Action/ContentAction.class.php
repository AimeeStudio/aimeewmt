<?php
class ContentAction extends CommonAction {

    // 显示内容管理的增加内容页面
    public function content_add(){
		//$this->assign("jumpUrl","__SELF__");
		$this->assign("jumpUrl",U('Content/content_manage'));
		if(isset($_POST['nr_name'])) {
			$data = array();
			$data['nr_att'] = $_POST['nr_att'];
			$data['nr_good'] = $_POST['nr_good'];
			$data['nr_ext'] = $_POST['nr_ext'];
			$data['nr_name'] = stripslashes($_POST['nr_name']);
			//栏目英文名  如果没有填写英文，当用户增加后，栏目自动生成拼音或手动生成。
			if ( $_POST['nr_en_name'] == "" ) {
				$data['nr_en_name'] = $this->Pinyin($data['nr_name']);
			} else {
				$data['nr_en_name'] = $_POST['nr_en_name'];
			}
			$data['nr_thumb'] = $_POST['sl_thumb'];
			$data['nr_keyword'] = $_POST['nr_keyword'];
			$data['nr_description'] = $_POST['nr_description'];
			$data['nr_edit'] = stripslashes($_POST['nr_edit']);
			$data['nr_info'] = stripslashes($_POST['nr_info']);
			$data['nr_exturl'] = $_POST['nr_exturl'];
			if ( $_POST['nr_times'] == "" ) {
				$data['nr_times'] = time();
			} else {
				$data['nr_times'] = strtotime($_POST['nr_times']);
			}
			$data['nr_author'] = session('adminname');
			
			$content = M('Content');
			if(isset($_POST['id'])) {
				//编辑数据
				$condition['id'] = $_POST['id'];
				$result = $content->where($condition)->save($data);
				if ( $result ) {
					//成功提示
					$this->success('编辑内容成功');
				} else {
					//错误提示
					$this->error('编辑内容失败');
				}
			} else {
				// 添加数据
				$result = $content->add($data);
				if ( $result ) {
					//成功提示
					$this->success('增加内容成功');
				} else {
					//错误提示
					$this->error('增加内容失败');
				}
			}
			
		} else {
			$suoshu = array();
			$suoshu = $this->getSuoShu();
			$this->assign("suoshu",$suoshu);
			
			$this->assign("DiyField",$this->GetDiyField($suoshu[0]['id']));
			
			if (isset($_GET['id'])) {
				$model = M("Content");
				$condition['id'] = $_GET['id'];
				$contentinfo = $model->where($condition)->find();
				$this->assign("contentinfo",$contentinfo);
				$this->display("content_edit");
			} else {
				$this->display();
			}
		}
    }
	
    public function content_view(){
		if (isset($_GET['id'])) {
			$model = M("Content");
			$condition['id'] = $_GET['id'];
			$contentview = $model->where($condition)->find();
			$this->assign("contentview",$contentview);
		}
		$this->display();
    }
	
    // 显示内容管理的管理内容页面
    public function content_manage(){
		$this->assign("jumpUrl","__SELF__");
		if(isset($_POST['duoxuanHidden'])) {
			//Log::write('文件名9999999999：' . $_POST['duoxuanHidden']);
			$id = $_POST['duoxuanHidden'];
			if ($_POST['piliangHidden'] == "1") {
				$result = $this->setTuijian($id,1);
			} elseif ($_POST['piliangHidden'] == "2") {
				//$result = $this->setHidden($id,2);
			} else {
				$result = $this->del_data($id,"content");
			}
			if ( $result !== false ) {
				//成功提示
				$this->success('批量设置成功');
			} else {
				//错误提示
				$this->error('批量设置失败');
			}
		} else {
			$contentList = array();
			$page = isset($_GET['p'])? $_GET['p'] : '1';  //默认显示首页数据
			$model = M("Content");
			$field = C('DB_PREFIX') . "content.id as id," . C('DB_PREFIX') . "content.nr_name as nr_name," . C('DB_PREFIX') . "content.nr_times as nr_times," . C('DB_PREFIX') . "content.nr_good as nr_good," . C('DB_PREFIX') . "content.nr_ext as nr_ext," . C('DB_PREFIX') . "content.nr_exturl as nr_exturl," . C('DB_PREFIX') . "channel.cl_name as cl_name";
			$joinStr = C('DB_PREFIX') . "channel ON " . C('DB_PREFIX') . "content.nr_att = " . C('DB_PREFIX') . "channel.id";
			$order = C('DB_PREFIX') . "content.nr_good asc,". C('DB_PREFIX') . "content.id desc";
			
			//根据查询条件检索数据
			$lanmu = 0;
			$paixu = 1;
			$neirong = "";
			if(isset($_POST['lanmu'])) {
				$lanmu = $_POST['lanmu'];
				$paixu = $_POST['paixu'];
				$neirong = trim($_POST['neirong']);
				if ($lanmu)	$map['nr_att'] = $lanmu;
				if ($paixu == 1) {
					//按推荐排序
					$order = C('DB_PREFIX') . "content.nr_good asc,". C('DB_PREFIX') . "content.id desc";
				} elseif ($paixu == 2) {
					//按ID排序  [正序排列]
					$order = C('DB_PREFIX') . "content.id asc";
				} elseif ($paixu == 3) {
					//按时间排序
					$order = C('DB_PREFIX') . "content.nr_times desc";
				}
				if ($neirong) $map['nr_name'] = array('like','%'.$neirong.'%');
				
				$contentList = $model->field($field)->join($joinStr)->where($map)->order($order)->page($page)->select();
			} else {
				$contentList = $model->field($field)->join($joinStr)->order($order)->page($page)->select();
			}
			
		
			import("ORG.Util.Page");// 导入分页类
			$count = count($contentList);// 查询满足要求的总记录数
			$Page = new Page($count,"",$page);// 实例化分页类 传入总记录数和每页显示的记录数和当前页数
			$Page->setConfig('theme',' %upPage%   %linkPage%  %downPage%');
			$show = $Page->show();// 分页显示输出
			
			$this->assign("lanmu",$lanmu);
			$this->assign("paixu",$paixu);
			$this->assign("neirong",$neirong);
			
			
			//取得所属栏目
			$this->assign("suoshu",$this->getSuoShu());
			
			$this->assign("contentList",$contentList);
			$this->assign("page",$show);
			
			$this->display();
		}
	}
	
    // 显示内容管理的增加单页页面
    public function add_page(){
		$this->assign("jumpUrl","__SELF__");
		if(isset($_POST['duoxuanHidden'])) {
		} else {
			$this->display();
		}
	}
		
    // 显示内容管理的管理单页页面
    public function content_page(){
		$this->assign("jumpUrl","__SELF__");
		if(isset($_POST['duoxuanHidden'])) {
			$id = $_POST['duoxuanHidden'];
			$result = $this->del_data($id,"channel");
			if ( $result !== false ) {
				//成功提示
				$this->success('批量设置成功');
			} else {
				//错误提示
				$this->error('批量设置失败');
			}
		} else {
			$contentList = array();
			$model = M("Channel");
			$page = isset($_GET['p'])? $_GET['p'] : '1';  //默认显示首页数据
			$order = 'cl_sort asc,id desc';
			//查询类型为【单页】的数据
			$map['cl_type'] = "2";
			
			//根据查询条件检索数据
			$lanmu = 0;
			$neirong = "";
			if(isset($_POST['lanmu'])) {
				$lanmu = $_POST['lanmu'];
				$neirong = trim($_POST['neirong']);
				if ($lanmu)	$map['id'] = $lanmu;
				if ($neirong) $map['cl_name'] = array('like','%'.$neirong.'%');
			}
			
			
			$class = $model->where($map)->order($order)->select();
		
			import("ORG.Util.Page");// 导入分页类
			$count = $model->where($map)->count();// 查询满足要求的总记录数
			$Page = new Page($count,"",$page);// 实例化分页类 传入总记录数和每页显示的记录数和当前页数
			$Page->setConfig('theme',' %upPage%   %linkPage%  %downPage%');
			$show = $Page->show();// 分页显示输出

			$this->assign("lanmu",$lanmu);
			$this->assign("neirong",$neirong);
			//取得所属栏目
			$this->assign("suoshu",$this->getSuoShu());
			
			$this->assign("pageList",$class);
			$this->assign("page",$show);
			
			$this->display();
		}
	}
	
    // 显示内容管理的内容过滤页面
    public function content_filter(){
		$this->assign("jumpUrl","__SELF__");
		if(isset($_POST['duoxuanHidden'])) {
		} else {
			$this->display();
		}
	}
	
    // 显示内容管理的批量替换页面
    public function content_replace(){
		$this->assign("jumpUrl","__SELF__");
		if(isset($_POST['duoxuanHidden'])) {
		} else {
			$this->display();
		}
	}
	
	// 生成拼音
	public function getPinyin() {
       // 获取数据
        $clName = $_POST['clName'];
 		//Log::write('调试111111111：'.$clName);
        // 数据验证
        if (empty($clName)) {
            echo json_encode(array("msg" => '', "result" => '0'));
            return;
        }
		$result = $this->Pinyin($clName);
		echo json_encode(array("msg" => $result, "result" => '1'));
		return;
	}
	
	//设置推荐属性
	public function setShuxing() {
		$this->assign("jumpUrl",U('Content/content_manage'));
		$id = $_GET['id'];
		$tuijian = $_GET['tuijian'];
		$result = $this->setTuijian($id,$tuijian);

		if ( $result ) {
			//成功提示
			$this->success('属性设置成功');
		} else {
			//错误提示
			$this->error('属性设置失败');
		}
	}
	
	public function del_content() {
		$this->assign("jumpUrl",U('Content/content_manage'));
		$id = $_GET['id'];
		$result = $this->del_data($id,"content");
		if ( $result ) {
			//成功提示
			$this->success('记录删除成功');
		} else {
			//错误提示
			$this->error('记录删除失败');
		}
	}
	
	public function del_class_par() {
		$this->assign("jumpUrl",U('Content/content_manage'));
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
		$this->assign("jumpUrl",U('Content/content_manage'));
		$class = M('Content');
		$data = array();
		$data['nr_att'] = $_POST['nr_att'];
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