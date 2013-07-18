<?php
class PageAction extends CommonAction {
	
    // 显示内容管理的增加单页页面
    public function add_page(){
		$this->assign("jumpUrl",U('Page/list_page'));
		if(isset($_POST['pg_name'])) {
			$data = array();
			$data['pg_name'] = $_POST['pg_name'];
			//如果顺序没设置，默认为0，如果再增加栏目，同样顺序为0。
			if ( $_POST['pg_sort'] == "" ) {
				$data['pg_sort'] = 0;
			} else {
				$data['pg_sort'] = $_POST['pg_sort'];
			}
			$data['pg_content'] = stripslashes($_POST['pg_content']);
			$data['pg_tplpage'] = $_POST['pg_tplpage'];
			$data['pg_times'] = time();
			
			$model = M('Page');
			if(isset($_POST['id'])) {
				//编辑数据
				$condition['id'] = $_POST['id'];
				$result = $model->where($condition)->save($data);
				if ( $result ) {
					//成功提示
					$this->success('编辑单页成功');
				} else {
					//错误提示
					$this->error('编辑单页失败');
				}
			} else {
				// 添加数据
				$result = $model->add($data);
				if ( $result ) {
					//成功提示
					$this->success('增加单页成功');
				} else {
					//错误提示
					$this->error('增加单页失败');
				}
			}
		} else {
			$this->assign("tplfile",$this->getTpl());
			if (isset($_GET['id'])) {
				$model = M("Page");
				$condition['id'] = $_GET['id'];
				$pagenr = $model->where($condition)->find();
				$this->assign("pagenr",$pagenr);
				$this->display("edit_page");
			} else {
				$this->display();
			}
		}
	}
		
    // 显示单页管理页面
    public function list_page(){
		$this->assign("jumpUrl","__SELF__");
		if(isset($_POST['duoxuanHidden'])) {
			$id = $_POST['duoxuanHidden'];
			$result = $this->del_data($id,"page");
			if ( $result !== false ) {
				//成功提示
				$this->success('批量设置成功');
			} else {
				//错误提示
				$this->error('批量设置失败');
			}
		} else {
			$model = M("Page");
			$page = isset($_GET['p'])? $_GET['p'] : '1';  //默认显示首页数据
			$order = 'pg_sort asc,id desc';
			
			$class = $model->order($order)->select();
		
			import("ORG.Util.Page");// 导入分页类
			$count = $model->count();// 查询满足要求的总记录数
			$Page = new Page($count,"",$page);// 实例化分页类 传入总记录数和每页显示的记录数和当前页数
			$Page->setConfig('theme',' %upPage%   %linkPage%  %downPage%');
			$show = $Page->show();// 分页显示输出
			
			$this->assign("pageList",$class);
			$this->assign("page",$show);
			
			$this->display();
		}
	}
	
	public function del_page() {
		$this->assign("jumpUrl",U('Page/list_page'));
		$id = $_GET['id'];
		$result = $this->del_data($id,"page");
		if ( $result ) {
			//成功提示
			$this->success('记录删除成功');
		} else {
			//错误提示
			$this->error('记录删除失败');
		}
	}
	
	//单页内容预览
    public function page_view(){
		if (isset($_GET['id'])) {
			$model = M("Page");
			$condition['id'] = $_GET['id'];
			$pageview = $model->where($condition)->find();
			$this->assign("pageview",$pageview);
		}
		$this->display();
    }
		
}