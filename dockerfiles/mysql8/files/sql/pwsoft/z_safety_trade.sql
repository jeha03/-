DROP TABLE IF EXISTS `z_safety_trade`;
CREATE TABLE `z_safety_trade` (
  `id` bigint(9) NOT NULL auto_increment,
  `char1` int(10) unsigned NOT NULL default '0',
  `char1name` varchar(35) NOT NULL default '',
  `item1` int(11) NOT NULL default '0',
  `item1name` varchar(35) NOT NULL default '',
  `ench1` smallint(5) NOT NULL default '0',
  `augm1eff` int(11) NOT NULL default '0',
  `augm1skill` int(11) NOT NULL default '0',
  `augm1lvl` int(11) NOT NULL default '0',
  `status1` varchar(255) NOT NULL default '0',
  `char2` int(10) unsigned NOT NULL default '0',
  `char2name` varchar(35) NOT NULL default '',
  `item2` int(11) NOT NULL default '0',
  `item2name` varchar(35) NOT NULL default '',
  `item2count` int(11) NOT NULL default '0',
  `ench2` smallint(5) NOT NULL default '0',
  `augm2eff` int(11) NOT NULL default '0',
  `augm2skill` int(11) NOT NULL default '0',
  `augm2lvl` int(11) NOT NULL default '0',
  `status2` varchar(255) NOT NULL default '0',
  `password` varchar(35) NOT NULL default '',
  `ctype` smallint(5) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;