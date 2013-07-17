-- phpMyAdmin SQL Dump
-- version 3.3.7
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 07 月 07 日 01:37
-- 服务器版本: 5.0.90
-- PHP 版本: 5.2.14

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

CREATE TABLE IF NOT EXISTS `ai_admin` (
  `adminid` int(3) unsigned NOT NULL auto_increment COMMENT '管理员ID',
  `adminname` varchar(50) NOT NULL COMMENT '管理员名称',
  `adminpassword` varchar(32) NOT NULL COMMENT '管理员密码',
  `adminpower` int(1) unsigned NOT NULL COMMENT '管理员权限',
  `loginip` varchar(30) default NULL COMMENT '登录IP',
  `lastlogintime` int(10) unsigned default NULL COMMENT '最后登录时间',
  `logincount` int(6) unsigned NOT NULL default '0' COMMENT '登录次数',
  PRIMARY KEY  (`adminid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ai_admin`
--

INSERT INTO `ai_admin` (`adminid`, `adminname`, `adminpassword`, `adminpower`, `loginip`, `lastlogintime`, `logincount`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '127.0.0.1', 1373160617, 20);

-- --------------------------------------------------------

--
-- 表的结构 `ai_channel`
--

CREATE TABLE IF NOT EXISTS `ai_channel` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT 'ID',
  `cl_class` varchar(30) NOT NULL default '' COMMENT '所属栏目',
  `cl_type` varchar(10) NOT NULL default '' COMMENT '类型',
  `cl_att` int(1) unsigned NOT NULL COMMENT '属性',
  `cl_name` varchar(250) NOT NULL default '' COMMENT '栏目名称',
  `cl_en_name` varchar(250) NOT NULL default '' COMMENT '栏目英文名',
  `cl_sort` int(10) unsigned NOT NULL COMMENT '排序',
  `cl_exturl` varchar(250) NOT NULL default '' COMMENT '外链地址',
  `cl_info` varchar(250) NOT NULL default '' COMMENT '栏目简介',
  `cl_thumb` varchar(50) NOT NULL default '' COMMENT '栏目缩略图',
  `cl_keyword` varchar(250) NOT NULL default '' COMMENT '栏目关键字',
  `cl_description` varchar(250) NOT NULL default '' COMMENT '栏目描述',
  `cl_domain` varchar(250) NOT NULL default '' COMMENT '栏目域名',
  `cl_tplclass` varchar(100) NOT NULL default '' COMMENT '栏目模板',
  `cl_tplcontent` varchar(100) NOT NULL default '' COMMENT '内容模板',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='分类表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `ai_channel`
--

INSERT INTO `ai_channel` (`id`, `cl_class`, `cl_type`, `cl_att`, `cl_name`, `cl_en_name`, `cl_sort`, `cl_exturl`, `cl_info`, `cl_thumb`, `cl_keyword`, `cl_description`, `cl_domain`, `cl_tplclass`, `cl_tplcontent`) VALUES
(1, '0', '1', 1, '首页', '', 1, 'index.php', '站点首页', '', '', '', '', '', ''),
(2, '0', '0', 1, '列表', 'list,bug,aimee', 2, '', '新闻列表', '', 'list', '列表', '', 'list', 'content'),
(3, '0', '0', 1, '图片', 'pic', 3, '', '图片', '', '图片', '图片展示', '', 'pic', 'content'),
(4, '0', '1', 1, '单页', '', 4, 'index.php?m=index&a=actionpage&actype=page&fid=1', '单页内容', '', '', '', '', '', ''),
(5, '0', '1', 1, '留言', '', 5, 'index.php?m=index&a=message', '提交留言', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `ai_class_par`
--

CREATE TABLE IF NOT EXISTS `ai_class_par` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT 'ID',
  `cl_par_attid` varchar(30) NOT NULL default '' COMMENT '所属栏目ID',
  `cl_par_name` varchar(50) NOT NULL default '' COMMENT '字段名称',
  `cl_par_key` varchar(250) NOT NULL default '' COMMENT '字段标签',
  `cl_par_type` varchar(30) NOT NULL default '' COMMENT '字段类型',
  `cl_par_cnf` varchar(250) NOT NULL default '' COMMENT '字段配置',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='分类参数表' AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ai_class_par`
--


-- --------------------------------------------------------

--
-- 表的结构 `ai_content`
--

CREATE TABLE IF NOT EXISTS `ai_content` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT 'ID',
  `nr_att` varchar(30) NOT NULL default '' COMMENT '所属栏目',
  `nr_good` int(1) unsigned NOT NULL COMMENT '推荐',
  `nr_ext` int(1) unsigned NOT NULL COMMENT '外链',
  `nr_name` varchar(250) NOT NULL default '' COMMENT '内容名称',
  `nr_en_name` varchar(250) NOT NULL default '' COMMENT '内容英文名',
  `nr_exturl` varchar(250) NOT NULL default '' COMMENT '外链地址',
  `nr_thumb` varchar(50) NOT NULL default '' COMMENT '内容缩略图',
  `nr_keyword` varchar(250) NOT NULL default '' COMMENT '内容关键字',
  `nr_description` varchar(250) NOT NULL default '' COMMENT '内容描述',
  `nr_edit` mediumtext COMMENT '内容编辑',
  `nr_info` mediumtext COMMENT '内容简介',
  `nr_times` int(10) unsigned default NULL COMMENT '内容时间',
  `nr_author` varchar(50) NOT NULL default '' COMMENT '作者',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='内容表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `ai_content`
--

INSERT INTO `ai_content` (`id`, `nr_att`, `nr_good`, `nr_ext`, `nr_name`, `nr_en_name`, `nr_exturl`, `nr_thumb`, `nr_keyword`, `nr_description`, `nr_edit`, `nr_info`, `nr_times`, `nr_author`) VALUES
(1, '2', 1, 2, '完美的简约后台', 'wanmeidejianyuehoutai', '', '', '后台', '', '<p>\r\n	你喜欢后台吗？\r\n</p>', '', 1373025177, 'admin'),
(2, '2', 1, 2, '喜欢简单的功能还是复杂的功能？', 'xihuanjiandandegongnenghuanshifuzadegongneng', '', '', '简单', '', '如果喜欢简单的，我们今后APP插件形式，喜欢复杂的可以整合发布。', '', 1373025542, 'admin'),
(3, '2', 1, 2, '再进行一次全面优化', 'zaijinxingyiciquanmianyouhua', '', '', '优化', '', '正式版也许更完善，更接近人性化的优化', '', 1373025612, 'admin'),
(4, '2', 1, 2, '艾米发布最新测试版0.0.1A', 'aimifabuzuixinceshiban001', '', '', '预览版', '', '这是RC1开发者预览版发布以来，最新的版本重大升级。完善修复了更多的BUG~', '', 1373025651, 'admin'),
(5, '3', 1, 2, '聚会的伙伴们', 'juhuidehuobanmen', '', 'AI-mkqQa2bRtC.jpg', '聚会,list', '', '<p>\r\n	聚会的伙伴们，如果夏天很凉快，建议和朋友一起聚会哦，你们喜欢聚会吗？说不定烤烧谈笑话，讲鬼故事。留个纪念！\r\n</p>', '<p>\r\n	聚会的伙伴们，如果夏天很凉快，建议和朋友一起聚会哦，你们喜欢聚会吗？\r\n</p>', 1373026631, 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `ai_diyfield`
--

CREATE TABLE IF NOT EXISTS `ai_diyfield` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT 'ID',
  `infotype` int(2) unsigned NOT NULL COMMENT '所属模块',
  `fieldname` varchar(50) NOT NULL default '' COMMENT '字段名称',
  `fieldtitle` varchar(50) NOT NULL default '' COMMENT '字段标题',
  `fieldtype` varchar(50) NOT NULL default '' COMMENT '字段类型',
  `fieldsel` varchar(250) NOT NULL default '' COMMENT '字段选项值',
  `orderid` int(5) unsigned default NULL COMMENT '排列排序',
  `checkinfo` int(5) unsigned default NULL COMMENT '审核状态',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='自定义字段表' AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ai_diyfield`
--


-- --------------------------------------------------------

--
-- 表的结构 `ai_expand`
--

CREATE TABLE IF NOT EXISTS `ai_expand` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT 'ID',
  `ex_key` varchar(30) NOT NULL default '' COMMENT '包箱关键字',
  `ex_name` varchar(50) NOT NULL default '' COMMENT '包箱名称',
  `ex_describe` varchar(250) NOT NULL default '' COMMENT '包箱描述',
  `ex_state` int(1) unsigned NOT NULL COMMENT '包箱状态',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='扩展包厢表' AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ai_expand`
--


-- --------------------------------------------------------

--
-- 表的结构 `ai_message`
--

CREATE TABLE IF NOT EXISTS `ai_message` (
  `id` int(11) NOT NULL auto_increment,
  `types` tinyint(2) NOT NULL,
  `name` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `phone` varchar(20) default NULL,
  `email` varchar(30) NOT NULL,
  `qq` varchar(30) default NULL,
  `clientip` varchar(50) NOT NULL,
  `reply` text,
  `postdate` int(11) NOT NULL,
  `replydate` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ai_message`
--


-- --------------------------------------------------------

--
-- 表的结构 `ai_page`
--

CREATE TABLE IF NOT EXISTS `ai_page` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT 'ID',
  `pg_name` varchar(250) NOT NULL default '' COMMENT '名称',
  `pg_sort` int(10) unsigned NOT NULL COMMENT '排序',
  `pg_content` mediumtext COMMENT '内容',
  `pg_tplpage` varchar(100) NOT NULL default '' COMMENT '单页模板',
  `pg_times` int(10) unsigned default NULL COMMENT '时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='单页表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ai_page`
--

INSERT INTO `ai_page` (`id`, `pg_name`, `pg_sort`, `pg_content`, `pg_tplpage`, `pg_times`) VALUES
(1, '单页', 1, '这是单页面演示哦！', 'page', 1373124109);

-- --------------------------------------------------------

--
-- 表的结构 `ai_setting`
--

CREATE TABLE IF NOT EXISTS `ai_setting` (
  `item` varchar(30) NOT NULL default '0',
  `item_key` varchar(30) NOT NULL default '',
  `item_value` varchar(250) NOT NULL default '',
  KEY `item` (`item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='网站配置';

--
-- 转存表中的数据 `ai_setting`
--

INSERT INTO `ai_setting` (`item`, `item_key`, `item_value`) VALUES
('0', 'sitename', 'Aimee Web Management tool'),
('0', 'keywords', 'Aimee,Beta,desigen,php,mysql'),
('0', 'description', '这是一款针对初学者、美工、图形设计师及前端开发专用PHP工具，可任意简单标签制作强大的网站，清爽简约的设计带来极致的美感体验。'),
('0', 'siteright', 'Powered By Aimee Beta 0.0.1.A © 2013 AimeeStudio Inc.'),
('0', 'icp', '000000'),
('0', 'mail', 'aimeesvn@gmail.com'),
('0', 'domain', 'www.aimees.net'),
('0', 'timezone', '0'),
('2', 'admin_log', '1'),
('2', 'file_type', 'jpg | gif | png | rar | zip '),
('2', 'file_size', '1024');
