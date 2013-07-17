<?php 
class PageModel extends Model {
	public function getContent($fid) {
		$info = array();
		if ( $fid == '' ) return $info;
		$model = M("Page");
		$class = $model->getById($fid);

		$info['title'] = $class['pg_name'];

		$info['content'] = $class['pg_content'];
		return $info;
	}
	
	
	
}