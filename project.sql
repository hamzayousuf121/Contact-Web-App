/*
Navicat MySQL Data Transfer

Source Server         : project
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : project

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-09-04 11:58:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `bookrecord`
-- ----------------------------
DROP TABLE IF EXISTS `bookrecord`;
CREATE TABLE `bookrecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bookrecord
-- ----------------------------
INSERT INTO `bookrecord` VALUES ('1', 'Islamic Book', 'Islamic Book', 'books/18 & 19 Ramazan 1440.pdf', '100', '1');
INSERT INTO `bookrecord` VALUES ('2', 'Islamic Book', 'Islamic Book', 'books/alwada-mah-e-ramzan-1.pdf', '200', '1');
INSERT INTO `bookrecord` VALUES ('3', 'Islamic Book', 'Islamic Book', 'books/apna-badla-waldain-ko-hajj-krwana-kasia.pdf', '300', '1');
INSERT INTO `bookrecord` VALUES ('4', 'Islamic Book', 'Islamic Book', 'books/Final- Kaaby ki Shan  Aur Hajj Kay Fzail 20 Jun 2019.pdf', '120', '1');
INSERT INTO `bookrecord` VALUES ('5', 'Islamic Book', 'Islamic Book', 'books/Seerat e Hazrt e Bilaal Ra.pdf', '200', '1');
INSERT INTO `bookrecord` VALUES ('6', 'Islamic Book', 'Islamic Book', 'books/apna-badla-waldain-ko-hajj-krwana-kasia.pdf', '200', '1');
INSERT INTO `bookrecord` VALUES ('7', 'Islamic Book', 'Islamic Book', 'books/Seerat e Hazrt e Bilaal Ra.pdf', '300', '1');
INSERT INTO `bookrecord` VALUES ('8', 'Islamic Book', 'Islamic Book', 'books/Final-Hazrat Usman e Ghani Ki Shan 15 Aug 2019.pdf', '200', '1');
INSERT INTO `bookrecord` VALUES ('9', 'Islamic Book', 'Islamic Book', 'books/Ú©Ø±Ø§Ù…Ø§ØªÙ Ø¹Ø«Ù…Ø§Ù† ØºÙ†ÛŒ Ù…Ø¹ Ø¯ÛŒÚ¯Ø± Ø­Ú©Ø§ÛŒØ§Øª.pdf', '200', '1');
INSERT INTO `bookrecord` VALUES ('10', 'Islamic Book', 'Islamic Book', 'books/alwada-mah-e-ramzan-1.pdf', '200', '1');
INSERT INTO `bookrecord` VALUES ('11', 'Islamic Book', 'Islamic Book', 'books/Final- Kaaby ki Shan  Aur Hajj Kay Fzail 20 Jun 2019.pdf', '200', '1');
INSERT INTO `bookrecord` VALUES ('12', 'Islamic Book', 'Islamic Book', 'books/Ø´ÛØ§Ø¯ØªÙ Ø§Ù…Ø§Ù…Ù Ø­Ø³ÛŒÙ† .pdf', '200', '1');
INSERT INTO `bookrecord` VALUES ('13', 'Islamic Book', 'Islamic Book', 'books/Seerat e Hazrt e Bilaal Ra.pdf', '120', '1');
INSERT INTO `bookrecord` VALUES ('14', 'React js Book', 'react library book', 'books/The Road to learn React ( PDFDrive.com ).pdf', '5000', '1');
INSERT INTO `bookrecord` VALUES ('15', 'Islamic Book', 'Islamic Book', 'books/Ø´ÛØ§Ø¯ØªÙ Ø§Ù…Ø§Ù…Ù Ø­Ø³ÛŒÙ† .pdf', '1200', '1');
INSERT INTO `bookrecord` VALUES ('16', 'My Cv', 'My cv', 'books/myCv1-converted.pdf', '00', '1');
INSERT INTO `bookrecord` VALUES ('17', 'Islamic Book', 'Islamic Book', 'books/Final-Khamosh Rehny ki Aadat Kese Banaein 31 May 19.pdf', '120', '1');
INSERT INTO `bookrecord` VALUES ('18', 'Islamic Book', 'Islamic Book', 'books/alwada-mah-e-ramzan-1.pdf', '1200', '1');
INSERT INTO `bookrecord` VALUES ('19', 'Islamic Book', 'Islamic Book', 'books/Final-Hazrat Usman e Ghani Ki Shan 15 Aug 2019.pdf', '200', '1');
INSERT INTO `bookrecord` VALUES ('20', 'Islamic Book', 'Islamic Book', 'books/The Road to learn React ( PDFDrive.com ).pdf', '320', '1');
INSERT INTO `bookrecord` VALUES ('21', 'Islamic Book', 'Islamic Book', 'books/Final-Hazrat Usman e Ghani Ki Shan 15 Aug 2019.pdf', '0', '1');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `activationKey` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Hamza Yousuf', 'hamzayousuf121', 'hamzayousuf121@gmail.com', 'f6fdffe48c908deb0f4c3bd36c032e72', '0', '0');
