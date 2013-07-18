-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1:3306
-- 生成日期: 2012 年 07 月 04 日 02:24
-- 服务器版本: 5.1.28
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `aimee`
--

-- --------------------------------------------------------

--
-- 表的结构 `ai_admin`
--

DROP TABLE IF EXISTS `ai_admin`;
CREATE TABLE IF NOT EXISTS `ai_admin` (
  `adminid` int(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `adminname` varchar(50) NOT NULL COMMENT '管理员名称',
  `adminpassword` varchar(32) NOT NULL COMMENT '管理员密码',
  `adminpower` int(1) unsigned NOT NULL COMMENT '管理员权限',
  `loginip` varchar(30) DEFAULT NULL COMMENT '登录IP',
  `lastlogintime` int(10) unsigned DEFAULT NULL COMMENT '最后登录时间',
  `logincount` int(6) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  PRIMARY KEY (`adminid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `ai_admin`
--

INSERT INTO `ai_admin` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, NULL, NULL, 0);

--
-- 表的结构 `ai_setting`
--

DROP TABLE IF EXISTS `ai_setting`;
CREATE TABLE IF NOT EXISTS `ai_setting` (
  `item` varchar(30) NOT NULL DEFAULT '0',
  `item_key` varchar(30) NOT NULL DEFAULT '',
  `item_value` varchar(250) NOT NULL DEFAULT '',
  KEY `item` (`item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='网站配置';

--
-- 导出表中的数据 `ai_setting`
--

INSERT INTO `ai_setting` (`item`, `item_key`, `item_value`) VALUES ('0', 'timezone', '0');
INSERT INTO `ai_setting` (`item`, `item_key`, `item_value`) VALUES ('0', 'domain', 'http://demo.aimees.net');
INSERT INTO `ai_setting` (`item`, `item_key`, `item_value`) VALUES ('0', 'mail', 'admin@admin.com');
INSERT INTO `ai_setting` (`item`, `item_key`, `item_value`) VALUES ('0', 'siteright', '艾米团队');
INSERT INTO `ai_setting` (`item`, `item_key`, `item_value`) VALUES ('0', 'icp', '阿斯达就');
INSERT INTO `ai_setting` (`item`, `item_key`, `item_value`) VALUES ('0', 'keywords', '丁一，杨雷，李亮，林佳宏，AIMEE');
INSERT INTO `ai_setting` (`item`, `item_key`, `item_value`) VALUES ('0', 'description', '艾米艾米艾米艾米艾米艾米艾米艾米艾米艾米\r\n艾米艾米v艾米艾米\r\n艾米艾米\r\n');
INSERT INTO `ai_setting` (`item`, `item_key`, `item_value`) VALUES ('1', 'sys_update', '1');
INSERT INTO `ai_setting` (`item`, `item_key`, `item_value`) VALUES ('1', 'sys_lang', '3');
INSERT INTO `ai_setting` (`item`, `item_key`, `item_value`) VALUES ('1', 'dir_name', '分类目录名/id.html');
INSERT INTO `ai_setting` (`item`, `item_key`, `item_value`) VALUES ('1', 'file_position', 'html/');
INSERT INTO `ai_setting` (`item`, `item_key`, `item_value`) VALUES ('1', 'cache_time', '300');
INSERT INTO `ai_setting` (`item`, `item_key`, `item_value`) VALUES ('1', 'cache_set', '0');
INSERT INTO `ai_setting` (`item`, `item_key`, `item_value`) VALUES ('1', 'cache_type', '0');
INSERT INTO `ai_setting` (`item`, `item_key`, `item_value`) VALUES ('0', 'sitename', 'Aimee');
INSERT INTO `ai_setting` (`item`, `item_key`, `item_value`) VALUES ('2', 'file_size', '1024');
INSERT INTO `ai_setting` (`item`, `item_key`, `item_value`) VALUES ('2', 'file_type', 'jpg | gif | png | rar | zip | mp3');
INSERT INTO `ai_setting` (`item`, `item_key`, `item_value`) VALUES ('2', 'login_err', '3');
INSERT INTO `ai_setting` (`item`, `item_key`, `item_value`) VALUES ('2', 'admin_log', '1');

--
-- 表的结构 `ai_expand`
--

DROP TABLE IF EXISTS `ai_expand`;
CREATE TABLE IF NOT EXISTS `ai_expand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `ex_key` varchar(30) NOT NULL DEFAULT '' COMMENT '包箱关键字',
  `ex_name` varchar(50) NOT NULL DEFAULT '' COMMENT '包箱名称',
  `ex_describe` varchar(250) NOT NULL DEFAULT '' COMMENT '包箱描述',
  `ex_state` int(1) unsigned NOT NULL COMMENT '包箱状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='扩展包厢表' AUTO_INCREMENT=1 ;

--
-- 表的结构 `ai_channel`
--

DROP TABLE IF EXISTS `ai_channel`;
CREATE TABLE IF NOT EXISTS `ai_channel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `cl_class` varchar(30) NOT NULL DEFAULT '' COMMENT '所属栏目',
  `cl_type` varchar(10) NOT NULL DEFAULT '' COMMENT '类型',
  `cl_att` int(1) unsigned NOT NULL COMMENT '属性',
  `cl_name` varchar(250) NOT NULL DEFAULT '' COMMENT '栏目名称',
  `cl_en_name` varchar(250) NOT NULL DEFAULT '' COMMENT '栏目英文名',
  `cl_sort` int(10) unsigned NOT NULL COMMENT '排序',
  `cl_exturl` varchar(250) NOT NULL DEFAULT '' COMMENT '外链地址',
  `cl_info` varchar(250) NOT NULL DEFAULT '' COMMENT '栏目简介',
  `cl_thumb` varchar(50) NOT NULL DEFAULT '' COMMENT '栏目缩略图',
  `cl_keyword` varchar(250) NOT NULL DEFAULT '' COMMENT '栏目关键字',
  `cl_description` varchar(250) NOT NULL DEFAULT '' COMMENT '栏目描述',
  `cl_domain` varchar(250) NOT NULL DEFAULT '' COMMENT '栏目域名',
  `cl_tplclass` varchar(100) NOT NULL DEFAULT '' COMMENT '栏目模板',
  `cl_tplcontent` varchar(100) NOT NULL DEFAULT '' COMMENT '内容模板',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='分类表' AUTO_INCREMENT=1 ;

--
-- 表的结构 `ai_class_par`
--

DROP TABLE IF EXISTS `ai_class_par`;
CREATE TABLE IF NOT EXISTS `ai_class_par` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `cl_par_attid` varchar(30) NOT NULL DEFAULT '' COMMENT '所属栏目ID',
  `cl_par_name` varchar(50) NOT NULL DEFAULT '' COMMENT '字段名称',
  `cl_par_key` varchar(250) NOT NULL DEFAULT '' COMMENT '字段标签',
  `cl_par_type` varchar(30) NOT NULL DEFAULT '' COMMENT '字段类型',
  `cl_par_cnf` varchar(250) NOT NULL DEFAULT '' COMMENT '字段配置',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='分类参数表' AUTO_INCREMENT=1 ;

--
-- 表的结构 `ai_content`
--

DROP TABLE IF EXISTS `ai_content`;
CREATE TABLE IF NOT EXISTS `ai_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `nr_att` varchar(30) NOT NULL DEFAULT '' COMMENT '所属栏目',
  `nr_good` int(1) unsigned NOT NULL COMMENT '推荐',
  `nr_ext` int(1) unsigned NOT NULL COMMENT '外链',
  `nr_name` varchar(250) NOT NULL DEFAULT '' COMMENT '内容名称',
  `nr_en_name` varchar(250) NOT NULL DEFAULT '' COMMENT '内容英文名',
  `nr_exturl` varchar(250) NOT NULL DEFAULT '' COMMENT '外链地址',
  `nr_thumb` varchar(50) NOT NULL DEFAULT '' COMMENT '内容缩略图',
  `nr_keyword` varchar(250) NOT NULL DEFAULT '' COMMENT '内容关键字',
  `nr_description` varchar(250) NOT NULL DEFAULT '' COMMENT '内容描述',
  `nr_edit` mediumtext COMMENT '内容编辑',
  `nr_info` mediumtext COMMENT '内容简介',
  `nr_times` int(10) unsigned DEFAULT NULL COMMENT '内容时间',
  `nr_author` varchar(50) NOT NULL DEFAULT '' COMMENT '作者',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='内容表' AUTO_INCREMENT=1 ;

--
-- 表的结构 `ai_page`
--

DROP TABLE IF EXISTS `ai_page`;
CREATE TABLE IF NOT EXISTS `ai_page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `pg_name` varchar(250) NOT NULL DEFAULT '' COMMENT '名称',
  `pg_sort` int(10) unsigned NOT NULL COMMENT '排序',
  `pg_content` mediumtext COMMENT '内容',
  `pg_tplpage` varchar(100) NOT NULL DEFAULT '' COMMENT '单页模板',
  `pg_times` int(10) unsigned DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='单页表' AUTO_INCREMENT=1 ;

--
-- 表的结构 `ai_diyfield`
--

DROP TABLE IF EXISTS `ai_diyfield`;
CREATE TABLE IF NOT EXISTS `ai_diyfield` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `infotype` int(2) unsigned NOT NULL COMMENT '所属模块',
  `fieldname` varchar(50) NOT NULL DEFAULT '' COMMENT '字段名称',
  `fieldtitle` varchar(50) NOT NULL DEFAULT '' COMMENT '字段标题',
  `fieldtype` varchar(50) NOT NULL DEFAULT '' COMMENT '字段类型',
  `fieldsel` varchar(250) NOT NULL DEFAULT '' COMMENT '字段选项值',
  `orderid` int(5) unsigned DEFAULT NULL COMMENT '排列排序',
  `checkinfo` int(5) unsigned DEFAULT NULL COMMENT '审核状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='自定义字段表' AUTO_INCREMENT=1 ;

