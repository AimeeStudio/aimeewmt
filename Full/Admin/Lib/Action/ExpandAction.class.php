<?php
class ExpandAction extends CommonAction {

    // 安装扩展包箱
    public function install(){
		$this->assign("jumpUrl","__SELF__");
		Log::write('文件名1111：' . __APP__);
		if( isset($_POST['submit']) ) {
			Log::write('文件名2222：' . TMPL_PATH);
			//调用文件上传函数
			$info = $this->upload();
			Log::write('文件名33333：' . './Public/Uploads/' . $info[0]["savename"]);
			
			//调用解压缩函数
			import('Com.Zip');
			$zip = new Zip();
			$zip->decompress('./Public/Uploads/' . $info[0]["savename"],TMPL_PATH);//将压缩文件，解压到template目录
			
			//执行对应插件的安装方法
			$this->installExpand('test');
			
			//安装成功，跳转到管理页面
			redirect(U('Expand/manage'));
		} else {
			$this->display();
		}
    }
	
	
    // 管理扩展包箱
    public function manage(){
		$this->assign("jumpUrl","__SELF__");
		
		$expand = M('expand');
		if( isset($_POST['submit']) ) {
			
		} else {
			$explandList = $expand->select();
			$this->assign("explandList",$explandList);
			$this->display();
		}
    }
	
}