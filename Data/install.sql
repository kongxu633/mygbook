--
-- 数据库: `mygbook`
--

-- --------------------------------------------------------

--
-- 表的结构 `gb_content`
--

CREATE TABLE IF NOT EXISTS `gb_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL COMMENT '留言内容',
  `ctime` int(10) unsigned NOT NULL DEFAULT '1451577600' COMMENT '留言时间 默认20160101',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '审核 通过审核时为1 默认未审核0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
