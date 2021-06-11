/*
 Navicat Premium Data Transfer

 Source Server         : Db_web
 Source Server Type    : MySQL
 Source Server Version : 80021
 Source Host           : localhost:3306
 Source Schema         : luanvan

 Target Server Type    : MySQL
 Target Server Version : 80021
 File Encoding         : 65001

 Date: 11/06/2021 09:13:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bill
-- ----------------------------
DROP TABLE IF EXISTS `bill`;
CREATE TABLE `bill`  (
  `bill_id` int NOT NULL AUTO_INCREMENT,
  `billdetail_id` int NOT NULL,
  `user_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `coupon_id` int NOT NULL,
  `price_total` int NOT NULL,
  `receiver_address` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `receiver_number` int NOT NULL,
  `user_address` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_id` int NOT NULL,
  `bill_date` date NOT NULL,
  `bill_status` tinyint(1) NOT NULL,
  `coupon_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`bill_id`) USING BTREE,
  INDEX `Numberphone`(`user_id`) USING BTREE,
  INDEX `ID_cp`(`coupon_id`) USING BTREE,
  INDEX `receiver_number`(`receiver_number`) USING BTREE,
  INDEX `billdetail_id`(`billdetail_id`) USING BTREE,
  CONSTRAINT `fk_bill_coupons` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`coupon_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_bill_receiver` FOREIGN KEY (`receiver_number`) REFERENCES `receiver` (`receiver_number`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_bill_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of bill
-- ----------------------------

-- ----------------------------
-- Table structure for billdetail
-- ----------------------------
DROP TABLE IF EXISTS `billdetail`;
CREATE TABLE `billdetail`  (
  `billdetail_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `product_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_price` int NOT NULL,
  `product_amount` int NOT NULL,
  PRIMARY KEY (`billdetail_id`) USING BTREE,
  INDEX `Code_pr`(`product_id`) USING BTREE,
  CONSTRAINT `fk-product_billdetail` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_billdetail_bill` FOREIGN KEY (`billdetail_id`) REFERENCES `bill` (`billdetail_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of billdetail
-- ----------------------------

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `cat_code` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cat_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`cat_code`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('GB', 'Giày Nam');
INSERT INTO `category` VALUES ('GLN', 'Giày Leo Núi');
INSERT INTO `category` VALUES ('GN', 'Giày Nữ');
INSERT INTO `category` VALUES ('GTE', 'Giày trẻ em');
INSERT INTO `category` VALUES ('GTT', 'Giày Thể Thao');

-- ----------------------------
-- Table structure for coupons
-- ----------------------------
DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons`  (
  `coupon_id` int NOT NULL AUTO_INCREMENT,
  `coupon_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `coupon_date` date NOT NULL,
  PRIMARY KEY (`coupon_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of coupons
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------

-- ----------------------------
-- Table structure for producer
-- ----------------------------
DROP TABLE IF EXISTS `producer`;
CREATE TABLE `producer`  (
  `producer_code` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `producer_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`producer_code`) USING BTREE,
  INDEX `Name_producer`(`producer_name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of producer
-- ----------------------------
INSERT INTO `producer` VALUES ('AD', 'ADIDAS');
INSERT INTO `producer` VALUES ('NK', 'NIKE');
INSERT INTO `producer` VALUES ('VA', 'VANS');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `cat_code` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `producer_code` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_image` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_amount` int NOT NULL,
  `product_price` int NOT NULL,
  `product_sale` int NOT NULL,
  `product_status` tinyint(1) NULL DEFAULT NULL,
  `product_date` datetime(0) NOT NULL,
  `product_ps` tinyint NOT NULL,
  `product_trash` int NOT NULL,
  PRIMARY KEY (`product_id`) USING BTREE,
  INDEX `Code_type`(`cat_code`) USING BTREE,
  INDEX `Name_producer`(`producer_code`) USING BTREE,
  CONSTRAINT `fk-product_producer` FOREIGN KEY (`producer_code`) REFERENCES `producer` (`producer_code`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk-product_type` FOREIGN KEY (`cat_code`) REFERENCES `category` (`cat_code`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES (5, 'GTT', 'VAns fake', 'VA', 'VA01.png', 'adada', 4, 230000, 150000, 0, '2021-05-12 00:00:00', 127, 0);
INSERT INTO `product` VALUES (12, 'GLN', 'giày fake Va', 'VA', 'VA01.png', 'giày fake mà nha VA luon', 25, 200000, 0, 1, '2021-05-28 00:00:00', 127, 13);
INSERT INTO `product` VALUES (13, 'GTT', 'giày fake Va', 'VA', 'C:\\wamp64\\tmp\\php39C7.tmp', 'giày fake mà nha VA luon', 25, 200000, 0, 0, '2021-05-28 00:00:00', 127, 12);

-- ----------------------------
-- Table structure for receiver
-- ----------------------------
DROP TABLE IF EXISTS `receiver`;
CREATE TABLE `receiver`  (
  `receiver_number` int NOT NULL,
  `bill_id` int NOT NULL,
  `receiver_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `receiver_address` varchar(150) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  PRIMARY KEY (`receiver_number`) USING BTREE,
  INDEX `ID_bill`(`bill_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of receiver
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_number` int NOT NULL,
  `user_email` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_password` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_address` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_status` tinyint(1) NULL DEFAULT NULL,
  `user_type` tinyint(1) NOT NULL,
  `user_date` datetime(0) NULL DEFAULT NULL,
  `user_update` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  INDEX `id`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (7, 1685756645, 'linh@gmail.com', '12345', 'linh12', '21Ssasd', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `user` VALUES (8, 1265874, 'linh@gmail.com', '12345', 'linh13', '123456789', 1, 1, NULL, NULL);
INSERT INTO `user` VALUES (9, 113, 'nmc2303@gmail.com', 'admin', 'admin', 'adsfafeawf', 1, 2, NULL, NULL);
INSERT INTO `user` VALUES (12, 1241324, 'sadawdw@gmail.com', '12334', 'admin2', '31', NULL, 2, NULL, NULL);

-- ----------------------------
-- Table structure for useronline
-- ----------------------------
DROP TABLE IF EXISTS `useronline`;
CREATE TABLE `useronline`  (
  `tgtmp` int NOT NULL DEFAULT 0,
  `ip` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `local` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`tgtmp`) USING BTREE,
  INDEX `ip`(`ip`) USING BTREE,
  INDEX `local`(`local`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of useronline
-- ----------------------------
INSERT INTO `useronline` VALUES (1623377541, '::1', '/chaulinh/index.php');
INSERT INTO `useronline` VALUES (1623377550, '::1', '/chaulinh/index.php');

SET FOREIGN_KEY_CHECKS = 1;
