<?php 
class PageModel extends Model {
	//取得相应的内容数据
	public function getContent($fid) {
		//取得相应的内容数据
		$info = array();
		if ( $fid == '' ) return $info;
		$model = M("Page");
		$class = $model->getById($fid);
		//Log::write('文件名9999999999：' . $class['nr_name']);
		//标题
		$info['title'] = $class['pg_name'];
		//内容
		$info['content'] = $class['pg_content'];
		return $info;
	}
	
	
	
}