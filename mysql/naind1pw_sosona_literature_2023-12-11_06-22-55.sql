DROP TABLE IF EXISTS `consignee`;
CREATE TABLE `consignee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `entry_type` varchar(255) NOT NULL COMMENT '1=sosona,2=area,3=group',
  `city` varchar(255) NOT NULL,
  `opening_bal_amt` float(9,2) NOT NULL,
  `as_on_date` date NOT NULL,
  `comments` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4;

INSERT INTO `consignee` VALUES ('1','Sosona','Region','Kolkata','546670.00','2022-11-23','Closing report of Sibashis at the end of sikkim table 2022');
INSERT INTO `consignee` VALUES ('29','Delhi','Area','Delhi','101279.00','2022-11-23','');
INSERT INTO `consignee` VALUES ('30','Mumbai ','Area','Mumbai','217076.00','2022-11-23','');
INSERT INTO `consignee` VALUES ('31','Hyderabad ','Group','Twin cities ','38212.00','2022-11-23','');
INSERT INTO `consignee` VALUES ('32','South Mumbai ','Area','','35443.00','2022-11-23','');
INSERT INTO `consignee` VALUES ('33','Kolkata ','Area','','149489.00','2022-11-23','');
INSERT INTO `consignee` VALUES ('34','Darjeeling ','Area','','100389.00','2022-11-23','');
INSERT INTO `consignee` VALUES ('35','Punjab ','Area','','200582.00','2022-11-23','');
INSERT INTO `consignee` VALUES ('36','Sikkim ','Area','','72961.00','2022-11-23','');
INSERT INTO `consignee` VALUES ('37','Chandigarh ','Area','','50607.00','2022-11-23','');
INSERT INTO `consignee` VALUES ('38','Odhisa','Area','','-4283.00','2022-11-23','');
INSERT INTO `consignee` VALUES ('39','Bangalore ','Area','','19487.00','2022-11-23','');
INSERT INTO `consignee` VALUES ('40','Pune','Area','','0.00','2022-11-23','');
INSERT INTO `consignee` VALUES ('41','Jammu','Area','','12005.00','2022-11-23','');
INSERT INTO `consignee` VALUES ('42','Bengal','Area','','101155.00','2022-11-23','');
INSERT INTO `consignee` VALUES ('43','Dehradun 1','Group','','-149.00','2022-11-23','');
INSERT INTO `consignee` VALUES ('44','Shimla','Group','','10509.00','2022-11-23','');
INSERT INTO `consignee` VALUES ('45','Balasore ','Group','','14700.00','2022-11-23','');
INSERT INTO `consignee` VALUES ('46','Bhubaneswar (ad-hoc comtt)','Group','','13320.00','2022-11-23','');
INSERT INTO `consignee` VALUES ('47','Goa','Group','','2240.00','2022-11-23','');
INSERT INTO `consignee` VALUES ('48','Indore','Group','','29326.00','2022-11-23','');
INSERT INTO `consignee` VALUES ('49','SS (Mumbai)','Group','','2147.00','2022-11-23','');
INSERT INTO `consignee` VALUES ('50','Dehradun 2 (N.O.)','Group','','454.00','2022-11-23','');
INSERT INTO `consignee` VALUES ('51','Jharkhand ','Group','','215.00','2022-11-23','');
INSERT INTO `consignee` VALUES ('52','Tamil Nadu ','Area','','190258.00','2022-11-23','');
INSERT INTO `consignee` VALUES ('53','Kalimpong ','Area','Kalimpong ','0.00','2023-03-01','');
INSERT INTO `consignee` VALUES ('54','Kota group (Rajasthan)','Group','','8116.00','2023-04-01','');
INSERT INTO `consignee` VALUES ('55','Cuttack (9group)','Group','Cuttack','0.00','2023-07-01','');



DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(255) NOT NULL,
  `cust_email` varchar(255) NOT NULL,
  `cust_address_1` varchar(255) NOT NULL,
  `cust_address_2` varchar(255) NOT NULL,
  `cust_state` varchar(255) NOT NULL,
  `cust_country` varchar(255) NOT NULL,
  `cust_pincode` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO `customer` VALUES ('1','Samir','samir@gmail.com','Ek Ford Road','Sukchar Girja','W.B','India','700115');
INSERT INTO `customer` VALUES ('4','Amit','amit@gmail.com','BT Road','','West Bengal','India','700120');
INSERT INTO `customer` VALUES ('6','Sushant','sushant@gmail.com','sdf','refdt','West Bengal','India','700115');



DROP TABLE IF EXISTS `customer_accounts`;
CREATE TABLE `customer_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) NOT NULL,
  `entry_type` int(11) NOT NULL COMMENT '1=opening bal,2=order,3=payment',
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_total` float(9,2) NOT NULL,
  `payment_amt` float(9,2) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_ref_number` varchar(255) NOT NULL,
  `payment_mode` int(11) NOT NULL COMMENT '1=cash deposit,2=bank transfer',
  `opening_bal_amt` float(9,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS `lds_share`;
CREATE TABLE `lds_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sosona_share_pct` float(9,2) NOT NULL,
  `area_share_pct` float(9,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO `lds_share` VALUES ('3','20.00','6.67');



DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `naws_order_id` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_price` float(9,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS `order_new`;
CREATE TABLE `order_new` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `consignee_id` int(11) NOT NULL,
  `naws_order_id` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `order_total` float(9,2) NOT NULL,
  `area_share_amt` float(9,2) NOT NULL,
  `area_billing_amt` float(9,2) NOT NULL,
  `sosona_share_amt` float(9,2) NOT NULL,
  `sosona_billing_amt` float(9,2) NOT NULL,
  `comments` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4;

INSERT INTO `order_new` VALUES ('66','31','','2022-12-15','4400.00','0.00','4400.00','1173.48','3226.52','');
INSERT INTO `order_new` VALUES ('68','29','','2023-01-18','215980.00','14405.87','201574.12','43196.00','158378.12','');
INSERT INTO `order_new` VALUES ('69','33','','2023-02-01','176000.00','11739.20','164260.80','35200.00','129060.80','order value updated 6-May-23');
INSERT INTO `order_new` VALUES ('70','34','','2023-01-16','23740.00','1583.46','22156.54','4748.00','17408.54','');
INSERT INTO `order_new` VALUES ('71','38','','2023-01-16','61320.00','4090.04','57229.96','12264.00','44965.96','');
INSERT INTO `order_new` VALUES ('73','52','','2023-01-16','7420.00','494.91','6925.09','1484.00','5441.09','');
INSERT INTO `order_new` VALUES ('75','43','000086','2023-01-09','6180.00','0.00','6180.00','1648.21','4531.79','');
INSERT INTO `order_new` VALUES ('76','35','000084','2023-02-09','72500.00','4835.75','67664.25','14500.00','53164.25','');
INSERT INTO `order_new` VALUES ('77','44','000085','2023-02-28','3750.00','0.00','3750.00','1000.13','2749.87','');
INSERT INTO `order_new` VALUES ('78','30','000087','2023-02-15','19100.00','1273.97','17826.03','3820.00','14006.03','');
INSERT INTO `order_new` VALUES ('79','32','000089','2023-02-23','18300.00','1220.61','17079.39','3660.00','13419.39','');
INSERT INTO `order_new` VALUES ('80','37','000090','2023-02-23','92200.00','6149.74','86050.26','18440.00','67610.26','');
INSERT INTO `order_new` VALUES ('81','38','000091','2023-03-09','40350.00','2691.35','37658.65','8070.00','29588.65','');
INSERT INTO `order_new` VALUES ('82','53','000093','2023-03-29','110585.00','7376.02','103208.98','22117.00','81091.98','');
INSERT INTO `order_new` VALUES ('83','39','','2023-04-30','80000.00','5336.00','74664.00','16000.00','58664.00','As told by Bangalore RCM (Sam) after taking physical inventory ');
INSERT INTO `order_new` VALUES ('84','38','000102','2023-05-15','34600.00','2307.82','32292.18','6920.00','25372.18','');
INSERT INTO `order_new` VALUES ('85','43','000103','2023-05-15','11090.00','0.00','11090.00','2957.70','8132.30','');
INSERT INTO `order_new` VALUES ('86','35','000104','2023-05-23','49610.00','3308.99','46301.01','9922.00','36379.01','');
INSERT INTO `order_new` VALUES ('87','39','000111','2023-05-31','220.00','14.67','205.33','44.00','161.33','');
INSERT INTO `order_new` VALUES ('88','39','000114','2023-06-08','330.00','22.01','307.99','66.00','241.99','3 SPAD');
INSERT INTO `order_new` VALUES ('89','55','000115','2023-06-15','8740.00','0.00','8740.00','2330.96','6409.04','');
INSERT INTO `order_new` VALUES ('90','55','','2023-10-31','5730.00','0.00','5730.00','1528.19','4201.81','');



DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_by` int(11) NOT NULL COMMENT '1=sosona,2=area,3=group',
  `payment_date` date NOT NULL,
  `payment_amt` float(9,2) NOT NULL,
  `payment_mode` varchar(255) NOT NULL COMMENT '1=cash deposit,2=bank transfer',
  `payment_ref_number` varchar(255) NOT NULL,
  `comments` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4;

INSERT INTO `payment` VALUES ('31','29','2022-12-01','101279.00','Bank Transfer','','');
INSERT INTO `payment` VALUES ('32','1','2023-03-01','330000.00','Bank Transfer','','');
INSERT INTO `payment` VALUES ('33','30','2023-02-01','52690.00','Bank Transfer','','');
INSERT INTO `payment` VALUES ('34','33','2022-03-21','100000.00','Cash Deposit','','');
INSERT INTO `payment` VALUES ('35','35','2022-11-21','30000.00','Cash Deposit','','');
INSERT INTO `payment` VALUES ('36','39','2022-11-21','49729.00','Bank Transfer','','');
INSERT INTO `payment` VALUES ('37','33','2023-03-19','50000.00','Cash Deposit','','');
INSERT INTO `payment` VALUES ('38','36','2023-03-01','72961.00','Bank Transfer','','');
INSERT INTO `payment` VALUES ('39','44','2022-11-18','10658.00','Bank Transfer','','');
INSERT INTO `payment` VALUES ('40','45','2023-03-11','4000.00','Bank Transfer','','');
INSERT INTO `payment` VALUES ('41','43','2023-04-01','6050.00','Cash Deposit','','');
INSERT INTO `payment` VALUES ('42','46','2023-04-29','8000.00','Cash Deposit','','');
INSERT INTO `payment` VALUES ('43','44','2023-07-07','3601.00','Bank Transfer','','Literature group Shimla ');
INSERT INTO `payment` VALUES ('44','38','2023-08-07','92013.00','Bank Transfer','','');
INSERT INTO `payment` VALUES ('45','42','2023-05-23','15000.00','Bank Transfer','','');
INSERT INTO `payment` VALUES ('46','41','2023-03-30','12142.00','Bank Transfer','','');
INSERT INTO `payment` VALUES ('47','35','2023-07-17','40000.00','Bank Transfer','','');
INSERT INTO `payment` VALUES ('48','33','2023-08-18','100000.00','Cash Deposit','','');
INSERT INTO `payment` VALUES ('49','46','2023-08-24','6000.00','Bank Transfer','','');
INSERT INTO `payment` VALUES ('50','43','2023-09-04','11100.00','Bank Transfer','','');
INSERT INTO `payment` VALUES ('51','45','2023-09-10','3000.00','Bank Transfer','','');
INSERT INTO `payment` VALUES ('52','34','2023-10-11','63850.00','Bank Transfer','','');
INSERT INTO `payment` VALUES ('53','55','2023-10-11','8740.00','Bank Transfer','','');
INSERT INTO `payment` VALUES ('54','1','2023-10-11','575000.00','Bank Transfer','','');
INSERT INTO `payment` VALUES ('55','32','2023-10-21','20000.00','Bank Transfer','','');



DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` varchar(255) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_price` float(9,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO `product` VALUES ('1','ups1','Ups','6','1200.00');
INSERT INTO `product` VALUES ('3','mb1','Mother Board','6','4599.50');
INSERT INTO `product` VALUES ('4','key1','Keyboard','6','100.00');
INSERT INTO `product` VALUES ('5','key2','Keyboard','0','120.00');
INSERT INTO `product` VALUES ('6','asdas','afsdf','0','0.00');
INSERT INTO `product` VALUES ('7','key3','Keyboard','6','150.00');
INSERT INTO `product` VALUES ('8','ups2','Ups','6','1200.80');



DROP TABLE IF EXISTS `product_category`;
CREATE TABLE `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

INSERT INTO `product_category` VALUES ('3','Watch111');
INSERT INTO `product_category` VALUES ('4','Mobile');
INSERT INTO `product_category` VALUES ('7','Mobile 2');
INSERT INTO `product_category` VALUES ('8','Text book');
INSERT INTO `product_category` VALUES ('9','Mouse');
INSERT INTO `product_category` VALUES ('13','Charger');



DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` VALUES ('1','Super Admin','amit','amit@digeratiwebcrafts.com','5ebe2294ecd0e0f08eab7690d2a6ee69');
INSERT INTO `user` VALUES ('2','Admin','abubakr','abubakr@digeratiwebcrafts.com','5ebe2294ecd0e0f08eab7690d2a6ee69');
INSERT INTO `user` VALUES ('3','Admin','admin','anindya@digeratiwebcrafts.com','5ebe2294ecd0e0f08eab7690d2a6ee69');
INSERT INTO `user` VALUES ('4','Admin','treasurer','treasurer@naindia.in','5ebe2294ecd0e0f08eab7690d2a6ee69');
INSERT INTO `user` VALUES ('6','Member','member','member@naindia.in','25f9e794323b453885f5181f1b624d0b');



