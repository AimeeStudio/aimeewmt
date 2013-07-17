<?php
/**
 * 
 * TagLib (标签库)
 *
 * @package      	
 * @author          
 * @copyright     
 * @license         
 * @version        	
 */
 
/**
 +-------------------------------
 * Aimee标签库驱动
 +-------------------------------
 */
class TagLibAi extends TagLib
{
    // 标签定义
    protected $tags   =  array(
        // 标签定义： attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
        'menu'       => array('attr'=>'id,key,mod,att,ord,lim','close'=>1),
        'nav'       => array('attr'=>'id,key,mod,extid,ord,lim','close'=>1),
        'tag'       => array('attr'=>'id,key,mod,fid,lim','close'=>1),
        'view'       => array('attr'=>'id,cid','close'=>1),
        'opage'       => array('attr'=>'id,fid','close'=>1),
        'list'       => array('attr'=>'id,key,mod,top,fid,page,pagetype,ord,lim,size','close'=>1),
        'taglist'    => array('attr'=>'id,key,mod,top,keyword,page,pagetype,ord,lim','close'=>1)
        );

	public function _menu($attr,$content) {

			$tag    = $this->parseXmlAttr($attr,'menu');
			$id = !empty($tag['id'])?$tag['id']:'rs';  //定义数据查询的结果存放变量
			$key    = !empty($tag['key'])?$tag['key']:'i';
			//$att    = !empty($tag['att'])?$tag['att']:'1';
			$att    = '1';
			$lim   = !empty($tag['lim'])? $tag['lim'] : '0';  //0显示所有数据
			$ord    = !empty($tag['ord'])?$tag['ord']:'1';
			$mod    = !empty($tag['mod'])?$tag['mod']:'2';
			
			$sql = "D('Channel')->";
			$sql .= "getInfo(\"{$att}\",\"{$lim}\",\"{$ord}\")";

			//下面拼接输出语句
			$parsestr  = '';
			$parsestr .= '<?php  $_result='.$sql.'; if ($_result): $'.$key.'=0;';
			$parsestr .= 'foreach($_result as $key=>$'.$id.'):';
			$parsestr .= '++$'.$key.';$mod = ($'.$key.' % '.$mod.' );?>';
			$parsestr .= $content;//解析在article标签中的内容
			$parsestr .= '<?php endforeach; endif;?>';
			return  $parsestr;
	}

	public function _nav($attr,$content) {

			$tag    = $this->parseXmlAttr($attr,'cmenu');
			$id = !empty($tag['id'])?$tag['id']:'crs';  //定义数据查询的结果存放变量
			$key    = !empty($tag['key'])?$tag['key']:'ci';
			$extid    = !empty($tag['extid'])?$tag['extid']:'';
			if(!is_numeric($extid))   $extid = "$" . $extid . "['id']";
			$lim   = !empty($tag['lim'])? $tag['lim'] : '0';  //0显示所有数据
			$ord    = !empty($tag['ord'])?$tag['ord']:'1';
			$mod    = !empty($tag['mod'])?$tag['mod']:'2';
			
			$sql = "D('Channel')->";
			$sql .= "getInfoC({$extid},\"{$lim}\",\"{$ord}\")";

			//下面拼接输出语句
			$parsestr  = '';
			$parsestr .= '<?php  $_cresult='.$sql.'; if ($_cresult): $'.$key.'=0;';
			$parsestr .= 'foreach($_cresult as $key=>$'.$id.'):';
			$parsestr .= '++$'.$key.';$cmod = ($'.$key.' % '.$mod.' );?>';
			$parsestr .= $content;//解析在article标签中的内容
			$parsestr .= '<?php endforeach; endif;?>';
			return  $parsestr;
	}

	public function _tag($attr,$content) {
		//'id,key,mod,fid,lim'
			$tag    = $this->parseXmlAttr($attr,'list');
			$id = !empty($tag['id'])?$tag['id']:'rs';  //定义数据查询的结果存放变量
			$key    = !empty($tag['key'])?$tag['key']:'i';
			$mod    = !empty($tag['mod'])?$tag['mod']:'2';
			$fid    = !empty($tag['fid'])?$tag['fid']:'';
			$lim   = !empty($tag['lim'])? $tag['lim'] : '0';  //0显示所有数据
			
			$sql = "D('Channel')->";
			$sql .= "getTag(\"{$fid}\",\"{$lim}\")";

			//下面拼接输出语句
			$parsestr  = '';
			$parsestr .= '<?php  $_result='.$sql.'; if ($_result): $'.$key.'=0;';
			$parsestr .= 'foreach($_result as $key=>$'.$id.'):';
			$parsestr .= '++$'.$key.';$mod = ($'.$key.' % '.$mod.' );?>';
			$parsestr .= $content;//解析在article标签中的内容
			$parsestr .= '<?php endforeach; endif;?>';
			return  $parsestr;
	}

	public function _view($attr,$content) {
		//'id,key,mod,cid'
			$tag    = $this->parseXmlAttr($attr,'view');
			$id = !empty($tag['id'])?$tag['id']:'rs';  //定义数据查询的结果存放变量
			$cid    = !empty($tag['cid'])?$tag['cid']:'';
			
			$sql = "D('Content')->";
			$sql .= "getContent(\"{$cid}\")";

			//下面拼接输出语句
			$parsestr  = '';
			$parsestr .= '<?php  $'.$id.'='.$sql.'; ?>';
			$parsestr .= $content;//解析在article标签中的内容
			return  $parsestr;
	}

	public function _opage($attr,$content) {
		//'id,key,mod,cid'
			$tag    = $this->parseXmlAttr($attr,'opage');
			$id = !empty($tag['id'])?$tag['id']:'rs';  //定义数据查询的结果存放变量
			$fid    = !empty($tag['fid'])?$tag['fid']:'';
			
			$sql = "D('Page')->";
			$sql .= "getContent(\"{$fid}\")";

			//下面拼接输出语句
			$parsestr  = '';
			$parsestr .= '<?php  $'.$id.'='.$sql.'; ?>';
			$parsestr .= $content;//解析在article标签中的内容
			return  $parsestr;
	}

	public function _list($attr,$content) {
		//'id,key,mod,top,fid,ord,lim,size'
			$tag    = $this->parseXmlAttr($attr,'list');
			$id = !empty($tag['id'])?$tag['id']:'rs';  //定义数据查询的结果存放变量
			$fid    = !empty($tag['fid'])?$tag['fid']:'';
			$lim   = !empty($tag['lim'])? $tag['lim'] : '10';  //默认显示前10条数据
			$page   = !empty($tag['page'])? $tag['page'] : '1';  //默认显示首页数据
			$pagetype   = !empty($tag['pagetype'])? $tag['pagetype'] : '0';  //分页显示种类，默认全部显示
			$ord    = !empty($tag['ord'])?$tag['ord']:'1';
			$size    = !empty($tag['size'])?$tag['size']:'';  //截取长度
			$key    = !empty($tag['key'])?$tag['key']:'i';
			$mod    = !empty($tag['mod'])?$tag['mod']:'2';
			
			$sql = "D('Content')->";
			$sql .= "getInfo(\"{$fid}\",\"{$lim}\",\"{$ord}\",\"{$size}\",\"{$page}\",\"{$pagetype}\")";

			//下面拼接输出语句
			$parsestr  = '';
			$parsestr .= '<?php  $_result='.$sql.'; if ($_result[0]): $'.$key.'=0;';
			$parsestr .= 'foreach($_result[0] as $key=>$'.$id.'):';
			$parsestr .= '++$'.$key.';$mod = ($'.$key.' % '.$mod.' );?>';
			$parsestr .= $content;//解析在article标签中的内容
			$parsestr .= '<?php endforeach; endif; $page = $_result[1];?>';
			return  $parsestr;
	}

	public function _taglist($attr,$content) {
		//'id,key,mod,top,fid,ord,lim,size'
			$tag    = $this->parseXmlAttr($attr,'list');
			$id = !empty($tag['id'])?$tag['id']:'rs';  //定义数据查询的结果存放变量
			$keyword    = !empty($tag['keyword'])?$tag['keyword']:'';
			$lim   = !empty($tag['lim'])? $tag['lim'] : '0';  //0显示所有数据
			$page   = !empty($tag['page'])? $tag['page'] : '1';  //默认显示首页数据
			$pagetype   = !empty($tag['pagetype'])? $tag['pagetype'] : '0';  //分页显示种类，默认全部显示
			$ord    = !empty($tag['ord'])?$tag['ord']:'1';
			$key    = !empty($tag['key'])?$tag['key']:'i';
			$mod    = !empty($tag['mod'])?$tag['mod']:'2';
			
			$sql = "D('Content')->";
			$sql .= "getTagInfo(\"{$keyword}\",\"{$lim}\",\"{$ord}\",\"{$page}\",\"{$pagetype}\")";

			//下面拼接输出语句
			$parsestr  = '';
			$parsestr .= '<?php  $_result='.$sql.'; if ($_result[0]): $'.$key.'=0;';
			$parsestr .= 'foreach($_result[0] as $key=>$'.$id.'):';
			$parsestr .= '++$'.$key.';$mod = ($'.$key.' % '.$mod.' );?>';
			$parsestr .= $content;//解析在article标签中的内容
			$parsestr .= '<?php endforeach; endif; $page = $_result[1];?>';
			return  $parsestr;
	}

}
?>