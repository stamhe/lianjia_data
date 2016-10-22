use lianjia;
set names utf8;
CREATE TABLE `t_ershoufang_house` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `xiaoqu_id` char(200) NOT NULL comment "小区id",
  `house_id` char(200) NOT NULL comment "房源id",
  `title` char(200) NOT NULL comment "房源名称",
  `price` decimal(10,2) NOT NULL default "0.000" comment "价格，单位：万元",
  `view_count` int NOT NULL default 0 comment "带看次数",
  `spider_date` date NOT NULL comment "抓取日期",
  `create_time` timestamp NOT NULL default CURRENT_TIMESTAMP comment "抓取时间",
  PRIMARY KEY (`id`),
  key(`xiaoqu_id`),
  unique key `house_id_date`(house_id, spider_date)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


CREATE TABLE `t_ershoufang_xiaoqu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `xiaoqu_id` char(200) NOT NULL comment "小区id",
  `xiaoqu_name`	char(200) not null comment "小区名称",
  `avg_price` decimal(10,2) NOT NULL default "0.000" comment "小区均价，单位：元",
  `onsale_count` int NOT NULL default 0 comment "在售套数",
  `sold_90_days` int NOT NULL default 0 comment "近30天成交套数",
  `view_30_days` int NOT NULL default 0 comment "近30天带看次数",
  `spider_date` date NOT NULL comment "抓取日期",
  `create_time` timestamp NOT NULL default CURRENT_TIMESTAMP comment "抓取时间",
  PRIMARY KEY (`id`),
  key(`xiaoqu_id`),
  unique key `xiaoqu_id_date`(xiaoqu_id, spider_date)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `t_ershoufang_chenshi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chenshi_name`	char(200) not null comment "城市名称",
  `avg_price` decimal(10,2) NOT NULL default "0.000" comment "城市均价，单位：元",
  `onsale_count` int NOT NULL default 0 comment "今日在售套数",
  `sold_last_month` int NOT NULL default 0 comment "上月成交套数",
  `view_last_day` int NOT NULL default 0 comment "昨日带看次数",
  `spider_date` date NOT NULL comment "抓取日期",
  `create_time` timestamp NOT NULL default CURRENT_TIMESTAMP comment "抓取时间",
  PRIMARY KEY (`id`),
  key(`chenshi_name`),
  unique key `chenshi_name_date`(chenshi_name, spider_date)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

