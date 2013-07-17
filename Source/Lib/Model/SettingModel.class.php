<?php 
class SettingModel extends Model {
	public function getInfo() {
		$info[0]['name'] = '公司新闻';
		$info[0]['url'] = U('Class/setShuxing') . "?id=1";
		$info[1]['name'] = '企业新闻';
		$info[1]['url'] = U('Class/setShuxing') . "?id=2";
		return $info;
	}
}