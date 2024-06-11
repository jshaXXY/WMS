/*
 Navicat Premium Data Transfer

 Source Server         : class
 Source Server Type    : MySQL
 Source Server Version : 80200
 Source Host           : localhost:3306
 Source Schema         : wms

 Target Server Type    : MySQL
 Target Server Version : 80200
 File Encoding         : 65001

 Date: 11/06/2024 22:23:02
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tcustomer
-- ----------------------------
DROP TABLE IF EXISTS `tcustomer`;
CREATE TABLE `tcustomer`  (
  `customerID` int NOT NULL,
  `customerName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`customerID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tcustomer
-- ----------------------------
INSERT INTO `tcustomer` VALUES (1, 'Miyamoto Seiko');
INSERT INTO `tcustomer` VALUES (2, 'Mike Adams');
INSERT INTO `tcustomer` VALUES (3, 'Deng Zhiyuan');
INSERT INTO `tcustomer` VALUES (4, 'Ralph Woods');
INSERT INTO `tcustomer` VALUES (5, 'Yokoyama Yamato');
INSERT INTO `tcustomer` VALUES (6, 'Randall Herrera');
INSERT INTO `tcustomer` VALUES (7, 'Jean Moore');
INSERT INTO `tcustomer` VALUES (8, 'Long Zhiyuan');
INSERT INTO `tcustomer` VALUES (9, 'Du Yuning');
INSERT INTO `tcustomer` VALUES (10, 'Shibata Ryota');
INSERT INTO `tcustomer` VALUES (11, 'Che Ka Keung');
INSERT INTO `tcustomer` VALUES (12, 'Ueda Misaki');
INSERT INTO `tcustomer` VALUES (13, 'Scott Palmer');
INSERT INTO `tcustomer` VALUES (14, 'Ku Wing Sze');
INSERT INTO `tcustomer` VALUES (15, 'Lau Chi Ming');
INSERT INTO `tcustomer` VALUES (16, 'Peggy Salazar');
INSERT INTO `tcustomer` VALUES (17, 'Zou Rui');
INSERT INTO `tcustomer` VALUES (18, 'Miura Rena');
INSERT INTO `tcustomer` VALUES (19, 'Noguchi Riku');
INSERT INTO `tcustomer` VALUES (20, 'Sakai Misaki');

-- ----------------------------
-- Table structure for titem
-- ----------------------------
DROP TABLE IF EXISTS `titem`;
CREATE TABLE `titem`  (
  `itemID` int NOT NULL AUTO_INCREMENT,
  `itemName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `itemPallet` int NULL DEFAULT NULL,
  `in_stockSupply` int NULL DEFAULT NULL,
  `isStocked` bit(1) NULL DEFAULT NULL,
  `in_stockTime` datetime NULL DEFAULT NULL,
  `out_stockTime` datetime NULL DEFAULT NULL,
  `out_stockOrder` int NULL DEFAULT NULL,
  PRIMARY KEY (`itemID`) USING BTREE,
  INDEX `pallet`(`itemPallet`) USING BTREE,
  INDEX `order`(`out_stockOrder`) USING BTREE,
  INDEX `supply`(`in_stockSupply`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 203 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of titem
-- ----------------------------
INSERT INTO `titem` VALUES (6, 'Kjwi pro', 17, 1, b'1', '2023-05-18 10:57:18', '2024-02-17 11:33:43', 1);
INSERT INTO `titem` VALUES (7, 'Oranre', 16, 8, b'0', '2023-08-16 14:30:09', '2024-04-14 14:42:22', 1);
INSERT INTO `titem` VALUES (8, 'Kiwi air', 5, 9, b'0', '2023-02-27 08:13:40', '2024-03-02 09:18:35', 3);
INSERT INTO `titem` VALUES (9, 'Raspberry', 2, 7, b'1', '2023-12-22 11:51:05', '2024-05-09 06:33:18', 10);
INSERT INTO `titem` VALUES (10, 'omni-Rambutan', 10, 7, b'1', '2023-06-20 14:53:44', '2024-05-15 11:28:17', 3);
INSERT INTO `titem` VALUES (11, 'Pluots', 9, 6, b'1', '2023-07-05 00:25:19', '2024-02-19 12:23:01', 6);
INSERT INTO `titem` VALUES (12, 'gluots air', 19, 2, b'1', '2023-10-04 05:06:10', '2024-03-22 14:35:31', 7);
INSERT INTO `titem` VALUES (13, 'Raspberry core', 15, 5, b'0', '2023-02-23 08:21:21', '2024-05-06 23:40:02', 1);
INSERT INTO `titem` VALUES (14, 'xGrepe', 7, 5, b'1', '2023-03-18 19:38:24', '2024-02-02 18:35:51', 1);
INSERT INTO `titem` VALUES (15, 'Apple elite', 1, 10, b'0', '2023-06-01 11:56:42', '2024-02-12 12:49:41', 8);
INSERT INTO `titem` VALUES (16, 'Raspxerry', 17, 9, b'0', '2023-01-25 09:52:39', '2024-05-16 03:48:54', 4);
INSERT INTO `titem` VALUES (17, 'Avple', 3, 10, b'1', '2023-02-11 19:51:45', '2024-01-04 18:34:44', 3);
INSERT INTO `titem` VALUES (18, 'Mango premium', 1, 2, b'1', '2023-12-02 14:59:33', '2024-02-05 07:02:04', 8);
INSERT INTO `titem` VALUES (19, 'Maqgo', 14, 7, b'0', '2023-11-28 19:54:20', '2024-02-28 14:33:42', 2);
INSERT INTO `titem` VALUES (20, 'ultra-Mango', 13, 8, b'1', '2023-03-22 09:29:21', '2024-03-15 11:54:42', 3);
INSERT INTO `titem` VALUES (21, 'Pluots', 11, 9, b'0', '2023-05-23 09:20:34', '2024-05-28 09:47:28', 2);
INSERT INTO `titem` VALUES (22, 'Cherry', 17, 10, b'0', '2023-05-01 18:55:19', '2024-03-29 02:18:14', 4);
INSERT INTO `titem` VALUES (23, 'Grape', 19, 1, b'0', '2023-03-19 12:47:01', '2024-02-28 11:46:36', 7);
INSERT INTO `titem` VALUES (24, 'Grape', 6, 10, b'1', '2023-07-29 12:38:08', '2024-03-27 18:30:26', 8);
INSERT INTO `titem` VALUES (25, 'ambi-Cherry', 20, 6, b'1', '2023-08-27 10:57:03', '2024-01-27 15:36:37', 1);
INSERT INTO `titem` VALUES (26, 'Apple', 20, 7, b'0', '2023-01-15 19:35:08', '2024-03-04 07:26:16', 3);
INSERT INTO `titem` VALUES (27, 'Respberry air', 4, 8, b'1', '2023-07-26 21:54:31', '2024-05-05 15:12:16', 1);
INSERT INTO `titem` VALUES (28, 'Orange', 5, 6, b'0', '2023-01-23 03:54:11', '2024-03-24 06:13:14', 3);
INSERT INTO `titem` VALUES (29, 'Kiwi elite', 2, 7, b'0', '2023-12-12 17:05:36', '2024-05-11 23:07:57', 7);
INSERT INTO `titem` VALUES (30, 'iRambutan', 1, 5, b'0', '2023-07-10 14:34:13', '2024-02-08 17:30:04', 9);
INSERT INTO `titem` VALUES (31, 'Strawberry', 11, 9, b'0', '2023-11-26 14:29:56', '2024-04-17 10:20:00', 1);
INSERT INTO `titem` VALUES (32, 'Strawbzrry', 5, 8, b'1', '2023-05-30 09:01:52', '2024-01-12 15:02:07', 4);
INSERT INTO `titem` VALUES (33, 'Maqgo', 17, 7, b'1', '2023-10-04 20:56:01', '2024-01-21 23:59:29', 7);
INSERT INTO `titem` VALUES (34, 'Mango', 10, 10, b'0', '2023-05-23 14:19:31', '2024-06-03 13:53:23', 10);
INSERT INTO `titem` VALUES (35, 'mluots', 3, 7, b'0', '2023-04-20 05:08:59', '2024-02-16 19:14:40', 6);
INSERT INTO `titem` VALUES (36, 'Raspberry pro', 11, 4, b'1', '2023-03-29 13:58:22', '2024-01-24 11:00:54', 5);
INSERT INTO `titem` VALUES (37, 'Gwape', 13, 8, b'0', '2023-03-01 07:31:26', '2024-03-04 10:55:54', 1);
INSERT INTO `titem` VALUES (38, 'Rambutan', 11, 2, b'0', '2023-01-27 15:47:44', '2024-03-10 18:00:22', 5);
INSERT INTO `titem` VALUES (39, 'ambi-Strawserry', 9, 10, b'0', '2023-01-05 15:49:29', '2024-03-13 20:40:30', 10);
INSERT INTO `titem` VALUES (40, 'xOraege', 19, 6, b'0', '2023-09-22 02:33:48', '2024-04-18 10:07:11', 5);
INSERT INTO `titem` VALUES (41, 'Grape', 15, 7, b'1', '2023-12-22 18:41:32', '2024-03-26 01:05:26', 9);
INSERT INTO `titem` VALUES (42, 'Pluots plus', 19, 5, b'1', '2023-07-15 14:49:44', '2024-02-06 02:05:02', 8);
INSERT INTO `titem` VALUES (43, 'omni-Orange', 11, 7, b'0', '2023-05-13 13:08:21', '2024-05-06 13:40:45', 4);
INSERT INTO `titem` VALUES (44, 'Graee se', 3, 9, b'0', '2023-12-06 18:14:50', '2024-01-25 13:45:35', 2);
INSERT INTO `titem` VALUES (45, 'Stcawberry premium', 13, 2, b'1', '2023-02-28 00:23:07', '2024-01-24 00:20:49', 6);
INSERT INTO `titem` VALUES (46, 'Apple', 4, 5, b'0', '2023-08-26 19:20:00', '2024-01-04 17:34:51', 2);
INSERT INTO `titem` VALUES (47, 'Cherry', 13, 10, b'0', '2023-03-28 17:34:55', '2024-02-02 06:38:47', 10);
INSERT INTO `titem` VALUES (48, 'Rambutan', 16, 6, b'0', '2023-03-02 16:12:21', '2024-04-09 19:17:20', 10);
INSERT INTO `titem` VALUES (49, 'ultra-Acple', 11, 3, b'1', '2023-08-19 04:23:01', '2024-01-30 13:49:04', 8);
INSERT INTO `titem` VALUES (50, 'Apple', 1, 6, b'0', '2023-03-13 05:52:06', '2024-05-13 20:33:43', 4);
INSERT INTO `titem` VALUES (51, 'Pbuots', 16, 8, b'0', '2023-12-22 17:23:15', '2024-04-19 07:00:41', 4);
INSERT INTO `titem` VALUES (52, 'Razbutan premium', 6, 3, b'0', '2024-01-01 02:47:45', '2024-03-10 08:10:40', 1);
INSERT INTO `titem` VALUES (53, 'Strawberly', 6, 5, b'0', '2023-10-22 07:35:21', '2024-05-03 21:10:30', 2);
INSERT INTO `titem` VALUES (54, 'Rambutan', 19, 5, b'1', '2023-11-17 04:40:46', '2024-02-22 09:09:03', 6);
INSERT INTO `titem` VALUES (55, 'Pluots', 2, 7, b'1', '2023-03-20 18:18:14', '2024-04-08 08:45:33', 2);
INSERT INTO `titem` VALUES (56, 'ambi-Apple', 16, 4, b'0', '2023-12-11 21:18:56', '2024-02-28 15:26:42', 4);
INSERT INTO `titem` VALUES (57, 'Mdngo elite', 15, 5, b'0', '2023-02-17 01:47:52', '2024-02-24 16:12:41', 9);
INSERT INTO `titem` VALUES (58, 'Kiwi', 9, 8, b'1', '2023-01-22 00:45:37', '2024-03-25 20:49:02', 1);
INSERT INTO `titem` VALUES (59, 'Mango', 11, 10, b'1', '2023-07-04 20:15:10', '2024-02-23 07:31:21', 9);
INSERT INTO `titem` VALUES (60, 'Cherry core', 16, 1, b'1', '2023-04-14 15:10:50', '2024-01-01 13:16:05', 1);
INSERT INTO `titem` VALUES (61, 'Mango', 10, 10, b'1', '2023-02-18 09:36:17', '2024-04-08 09:53:54', 3);
INSERT INTO `titem` VALUES (62, 'Rzmbutan', 9, 1, b'0', '2023-12-22 02:53:18', '2024-01-20 00:11:44', 2);
INSERT INTO `titem` VALUES (63, 'Ojange', 7, 7, b'0', '2023-02-26 08:06:32', '2024-04-21 17:09:07', 10);
INSERT INTO `titem` VALUES (64, 'Mango', 15, 5, b'0', '2023-12-17 00:32:01', '2024-02-25 00:53:31', 8);
INSERT INTO `titem` VALUES (65, 'wluots', 15, 4, b'0', '2023-08-14 10:40:12', '2024-02-18 20:31:52', 7);
INSERT INTO `titem` VALUES (66, 'Apple premium', 18, 8, b'1', '2023-08-21 20:59:11', '2024-02-20 07:29:41', 6);
INSERT INTO `titem` VALUES (67, 'ambi-Rambufan', 7, 8, b'1', '2023-10-10 22:51:17', '2024-01-28 14:26:25', 5);
INSERT INTO `titem` VALUES (68, 'Strawbnrry se', 3, 6, b'0', '2023-11-03 20:16:43', '2024-01-06 07:09:59', 4);
INSERT INTO `titem` VALUES (69, 'ziwi', 2, 4, b'1', '2023-07-16 19:57:51', '2024-02-05 05:21:51', 4);
INSERT INTO `titem` VALUES (70, 'ambi-ptrawberry', 6, 6, b'1', '2023-05-05 10:13:01', '2024-02-08 19:54:39', 8);
INSERT INTO `titem` VALUES (71, 'Aeple', 19, 7, b'0', '2023-09-29 05:12:20', '2024-04-27 03:16:01', 5);
INSERT INTO `titem` VALUES (72, 'dambutan pi', 10, 7, b'0', '2023-05-10 21:47:06', '2024-01-24 07:17:32', 6);
INSERT INTO `titem` VALUES (73, 'Kiwi premium', 3, 3, b'0', '2023-09-02 22:32:30', '2024-01-30 07:15:20', 5);
INSERT INTO `titem` VALUES (74, 'kambutan', 16, 1, b'0', '2023-10-30 20:01:17', '2024-05-01 02:22:35', 8);
INSERT INTO `titem` VALUES (75, 'Orange pro', 8, 1, b'0', '2023-08-20 00:23:01', '2024-05-07 18:02:26', 7);
INSERT INTO `titem` VALUES (76, 'Pluots', 7, 8, b'0', '2023-07-01 23:29:48', '2024-03-22 23:54:28', 10);
INSERT INTO `titem` VALUES (77, 'ambi-Cherry', 11, 3, b'1', '2023-12-28 19:29:09', '2024-01-07 07:19:56', 4);
INSERT INTO `titem` VALUES (78, 'Raspberry pi', 11, 5, b'1', '2023-05-21 00:50:18', '2024-04-22 17:44:10', 6);
INSERT INTO `titem` VALUES (79, 'Rambutan', 9, 5, b'1', '2023-01-03 08:23:21', '2024-01-18 23:36:34', 3);
INSERT INTO `titem` VALUES (80, 'Kizi elite', 9, 10, b'1', '2023-07-24 03:09:49', '2024-03-29 23:46:03', 4);
INSERT INTO `titem` VALUES (81, 'Raspberry', 10, 9, b'0', '2023-07-27 02:21:57', '2024-01-22 06:02:25', 3);
INSERT INTO `titem` VALUES (82, 'Cherky core', 15, 3, b'1', '2023-12-01 01:47:11', '2024-01-22 15:51:21', 2);
INSERT INTO `titem` VALUES (83, 'Strkwberry se', 4, 4, b'0', '2023-03-14 09:37:34', '2024-02-29 13:12:41', 6);
INSERT INTO `titem` VALUES (84, 'Mango core', 20, 7, b'1', '2023-04-02 10:21:49', '2024-01-07 07:36:11', 1);
INSERT INTO `titem` VALUES (85, 'xStrawperry', 6, 5, b'1', '2023-03-04 22:11:13', '2024-01-22 16:47:02', 2);
INSERT INTO `titem` VALUES (86, 'Kioi se', 9, 3, b'0', '2023-11-02 21:23:37', '2024-05-04 18:10:11', 10);
INSERT INTO `titem` VALUES (87, 'ambi-Orange', 2, 10, b'0', '2023-03-14 08:43:40', '2024-01-12 22:41:03', 1);
INSERT INTO `titem` VALUES (88, 'Grape', 20, 6, b'0', '2023-05-12 02:11:02', '2024-04-01 03:04:57', 5);
INSERT INTO `titem` VALUES (89, 'iCherry', 7, 7, b'1', '2023-12-07 03:34:44', '2024-04-26 04:49:13', 5);
INSERT INTO `titem` VALUES (90, 'Pguots', 1, 9, b'1', '2023-11-10 22:11:26', '2024-04-09 16:22:07', 2);
INSERT INTO `titem` VALUES (91, 'Apple', 7, 2, b'1', '2023-10-31 08:19:52', '2024-03-18 11:50:53', 7);
INSERT INTO `titem` VALUES (92, 'ambi-Kioi', 16, 10, b'1', '2023-07-13 17:36:34', '2024-02-09 18:12:18', 9);
INSERT INTO `titem` VALUES (93, 'xambutan air', 12, 10, b'1', '2023-05-18 03:05:33', '2024-02-14 17:01:42', 8);
INSERT INTO `titem` VALUES (94, 'Mingo elite', 13, 10, b'0', '2023-12-27 04:01:00', '2024-03-30 15:20:51', 3);
INSERT INTO `titem` VALUES (95, 'xPliots', 11, 10, b'0', '2023-11-17 14:57:40', '2024-01-06 08:52:01', 8);
INSERT INTO `titem` VALUES (96, 'ambi-Krwi', 4, 9, b'0', '2023-05-14 17:50:30', '2024-03-03 09:07:36', 7);
INSERT INTO `titem` VALUES (97, 'Orange pi', 1, 8, b'1', '2023-01-16 15:42:56', '2024-04-10 19:26:22', 4);
INSERT INTO `titem` VALUES (98, 'xApple', 12, 8, b'1', '2023-09-05 06:40:50', '2024-02-23 01:34:44', 5);
INSERT INTO `titem` VALUES (99, 'faspberry', 13, 7, b'0', '2023-10-02 15:58:32', '2024-02-26 11:40:42', 1);
INSERT INTO `titem` VALUES (100, 'Axple', 18, 10, b'1', '2023-06-27 03:18:11', '2024-02-12 19:38:11', 7);
INSERT INTO `titem` VALUES (201, 'rfg', 1, 1, b'1', '1111-11-11 00:00:00', '1111-11-12 00:00:00', 1);

-- ----------------------------
-- Table structure for tlocation
-- ----------------------------
DROP TABLE IF EXISTS `tlocation`;
CREATE TABLE `tlocation`  (
  `locationID` int NOT NULL,
  `row` int NULL DEFAULT NULL,
  `bay` int NULL DEFAULT NULL,
  `level` int NULL DEFAULT NULL,
  `state` int NULL DEFAULT NULL,
  PRIMARY KEY (`locationID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tlocation
-- ----------------------------
INSERT INTO `tlocation` VALUES (1, 1, 1, 1, 0);
INSERT INTO `tlocation` VALUES (2, 1, 1, 2, 0);
INSERT INTO `tlocation` VALUES (3, 1, 1, 3, 0);
INSERT INTO `tlocation` VALUES (4, 1, 1, 4, 0);
INSERT INTO `tlocation` VALUES (5, 1, 1, 5, 0);
INSERT INTO `tlocation` VALUES (6, 1, 1, 6, 0);
INSERT INTO `tlocation` VALUES (7, 1, 2, 1, 0);
INSERT INTO `tlocation` VALUES (8, 1, 2, 2, 0);
INSERT INTO `tlocation` VALUES (9, 1, 2, 3, 0);
INSERT INTO `tlocation` VALUES (10, 1, 2, 4, 0);
INSERT INTO `tlocation` VALUES (11, 1, 2, 5, 0);
INSERT INTO `tlocation` VALUES (12, 1, 2, 6, 0);
INSERT INTO `tlocation` VALUES (13, 1, 3, 1, 0);
INSERT INTO `tlocation` VALUES (14, 1, 3, 2, 0);
INSERT INTO `tlocation` VALUES (15, 1, 3, 3, 0);
INSERT INTO `tlocation` VALUES (16, 1, 3, 4, 0);
INSERT INTO `tlocation` VALUES (17, 1, 3, 5, 0);
INSERT INTO `tlocation` VALUES (18, 1, 3, 6, 0);
INSERT INTO `tlocation` VALUES (19, 1, 4, 1, 0);
INSERT INTO `tlocation` VALUES (20, 1, 4, 2, 0);
INSERT INTO `tlocation` VALUES (21, 1, 4, 3, 0);
INSERT INTO `tlocation` VALUES (22, 1, 4, 4, 0);
INSERT INTO `tlocation` VALUES (23, 1, 4, 5, 0);
INSERT INTO `tlocation` VALUES (24, 1, 4, 6, 0);
INSERT INTO `tlocation` VALUES (25, 1, 5, 1, 0);
INSERT INTO `tlocation` VALUES (26, 1, 5, 2, 0);
INSERT INTO `tlocation` VALUES (27, 1, 5, 3, 0);
INSERT INTO `tlocation` VALUES (28, 1, 5, 4, 0);
INSERT INTO `tlocation` VALUES (29, 1, 5, 5, 0);
INSERT INTO `tlocation` VALUES (30, 1, 5, 6, 0);
INSERT INTO `tlocation` VALUES (31, 1, 6, 1, 0);
INSERT INTO `tlocation` VALUES (32, 1, 6, 2, 0);
INSERT INTO `tlocation` VALUES (33, 1, 6, 3, 0);
INSERT INTO `tlocation` VALUES (34, 1, 6, 4, 0);
INSERT INTO `tlocation` VALUES (35, 1, 6, 5, 0);
INSERT INTO `tlocation` VALUES (36, 1, 6, 6, 0);
INSERT INTO `tlocation` VALUES (37, 2, 1, 1, 0);
INSERT INTO `tlocation` VALUES (38, 2, 1, 2, 0);
INSERT INTO `tlocation` VALUES (39, 2, 1, 3, 0);
INSERT INTO `tlocation` VALUES (40, 2, 1, 4, 0);
INSERT INTO `tlocation` VALUES (41, 2, 1, 5, 0);
INSERT INTO `tlocation` VALUES (42, 2, 1, 6, 0);
INSERT INTO `tlocation` VALUES (43, 2, 2, 1, 0);
INSERT INTO `tlocation` VALUES (44, 2, 2, 2, 0);
INSERT INTO `tlocation` VALUES (45, 2, 2, 3, 0);
INSERT INTO `tlocation` VALUES (46, 2, 2, 4, 0);
INSERT INTO `tlocation` VALUES (47, 2, 2, 5, 0);
INSERT INTO `tlocation` VALUES (48, 2, 2, 6, 0);
INSERT INTO `tlocation` VALUES (49, 2, 3, 1, 0);
INSERT INTO `tlocation` VALUES (50, 2, 3, 2, 0);
INSERT INTO `tlocation` VALUES (51, 2, 3, 3, 0);
INSERT INTO `tlocation` VALUES (52, 2, 3, 4, 0);
INSERT INTO `tlocation` VALUES (53, 2, 3, 5, 0);
INSERT INTO `tlocation` VALUES (54, 2, 3, 6, 0);
INSERT INTO `tlocation` VALUES (55, 2, 4, 1, 0);
INSERT INTO `tlocation` VALUES (56, 2, 4, 2, 0);
INSERT INTO `tlocation` VALUES (57, 2, 4, 3, 0);
INSERT INTO `tlocation` VALUES (58, 2, 4, 4, 0);
INSERT INTO `tlocation` VALUES (59, 2, 4, 5, 0);
INSERT INTO `tlocation` VALUES (60, 2, 4, 6, 0);
INSERT INTO `tlocation` VALUES (61, 2, 5, 1, 0);
INSERT INTO `tlocation` VALUES (62, 2, 5, 2, 0);
INSERT INTO `tlocation` VALUES (63, 2, 5, 3, 0);
INSERT INTO `tlocation` VALUES (64, 2, 5, 4, 0);
INSERT INTO `tlocation` VALUES (65, 2, 5, 5, 0);
INSERT INTO `tlocation` VALUES (66, 2, 5, 6, 0);
INSERT INTO `tlocation` VALUES (67, 2, 6, 1, 0);
INSERT INTO `tlocation` VALUES (68, 2, 6, 2, 0);
INSERT INTO `tlocation` VALUES (69, 2, 6, 3, 0);
INSERT INTO `tlocation` VALUES (70, 2, 6, 4, 0);
INSERT INTO `tlocation` VALUES (71, 2, 6, 5, 0);
INSERT INTO `tlocation` VALUES (72, 2, 6, 6, 0);
INSERT INTO `tlocation` VALUES (73, 3, 1, 1, 0);
INSERT INTO `tlocation` VALUES (74, 3, 1, 2, 0);
INSERT INTO `tlocation` VALUES (75, 3, 1, 3, 0);
INSERT INTO `tlocation` VALUES (76, 3, 1, 4, 0);
INSERT INTO `tlocation` VALUES (77, 3, 1, 5, 0);
INSERT INTO `tlocation` VALUES (78, 3, 1, 6, 0);
INSERT INTO `tlocation` VALUES (79, 3, 2, 1, 0);
INSERT INTO `tlocation` VALUES (80, 3, 2, 2, 0);
INSERT INTO `tlocation` VALUES (81, 3, 2, 3, 0);
INSERT INTO `tlocation` VALUES (82, 3, 2, 4, 0);
INSERT INTO `tlocation` VALUES (83, 3, 2, 5, 0);
INSERT INTO `tlocation` VALUES (84, 3, 2, 6, 0);
INSERT INTO `tlocation` VALUES (85, 3, 3, 1, 0);
INSERT INTO `tlocation` VALUES (86, 3, 3, 2, 0);
INSERT INTO `tlocation` VALUES (87, 3, 3, 3, 0);
INSERT INTO `tlocation` VALUES (88, 3, 3, 4, 0);
INSERT INTO `tlocation` VALUES (89, 3, 3, 5, 0);
INSERT INTO `tlocation` VALUES (90, 3, 3, 6, 0);
INSERT INTO `tlocation` VALUES (91, 3, 4, 1, 0);
INSERT INTO `tlocation` VALUES (92, 3, 4, 2, 0);
INSERT INTO `tlocation` VALUES (93, 3, 4, 3, 0);
INSERT INTO `tlocation` VALUES (94, 3, 4, 4, 0);
INSERT INTO `tlocation` VALUES (95, 3, 4, 5, 0);
INSERT INTO `tlocation` VALUES (96, 3, 4, 6, 0);
INSERT INTO `tlocation` VALUES (97, 3, 5, 1, 0);
INSERT INTO `tlocation` VALUES (98, 3, 5, 2, 0);
INSERT INTO `tlocation` VALUES (99, 3, 5, 3, 0);
INSERT INTO `tlocation` VALUES (100, 3, 5, 4, 0);
INSERT INTO `tlocation` VALUES (101, 3, 5, 5, 0);
INSERT INTO `tlocation` VALUES (102, 3, 5, 6, 0);
INSERT INTO `tlocation` VALUES (103, 3, 6, 1, 0);
INSERT INTO `tlocation` VALUES (104, 3, 6, 2, 0);
INSERT INTO `tlocation` VALUES (105, 3, 6, 3, 0);
INSERT INTO `tlocation` VALUES (106, 3, 6, 4, 0);
INSERT INTO `tlocation` VALUES (107, 3, 6, 5, 0);
INSERT INTO `tlocation` VALUES (108, 3, 6, 6, 0);
INSERT INTO `tlocation` VALUES (109, 4, 1, 1, 0);
INSERT INTO `tlocation` VALUES (110, 4, 1, 2, 0);
INSERT INTO `tlocation` VALUES (111, 4, 1, 3, 0);
INSERT INTO `tlocation` VALUES (112, 4, 1, 4, 0);
INSERT INTO `tlocation` VALUES (113, 4, 1, 5, 0);
INSERT INTO `tlocation` VALUES (114, 4, 1, 6, 0);
INSERT INTO `tlocation` VALUES (115, 4, 2, 1, 0);
INSERT INTO `tlocation` VALUES (116, 4, 2, 2, 0);
INSERT INTO `tlocation` VALUES (117, 4, 2, 3, 0);
INSERT INTO `tlocation` VALUES (118, 4, 2, 4, 0);
INSERT INTO `tlocation` VALUES (119, 4, 2, 5, 0);
INSERT INTO `tlocation` VALUES (120, 4, 2, 6, 0);
INSERT INTO `tlocation` VALUES (121, 4, 3, 1, 0);
INSERT INTO `tlocation` VALUES (122, 4, 3, 2, 0);
INSERT INTO `tlocation` VALUES (123, 4, 3, 3, 0);
INSERT INTO `tlocation` VALUES (124, 4, 3, 4, 0);
INSERT INTO `tlocation` VALUES (125, 4, 3, 5, 0);
INSERT INTO `tlocation` VALUES (126, 4, 3, 6, 0);
INSERT INTO `tlocation` VALUES (127, 4, 4, 1, 0);
INSERT INTO `tlocation` VALUES (128, 4, 4, 2, 0);
INSERT INTO `tlocation` VALUES (129, 4, 4, 3, 0);
INSERT INTO `tlocation` VALUES (130, 4, 4, 4, 0);
INSERT INTO `tlocation` VALUES (131, 4, 4, 5, 0);
INSERT INTO `tlocation` VALUES (132, 4, 4, 6, 0);
INSERT INTO `tlocation` VALUES (133, 4, 5, 1, 0);
INSERT INTO `tlocation` VALUES (134, 4, 5, 2, 0);
INSERT INTO `tlocation` VALUES (135, 4, 5, 3, 0);
INSERT INTO `tlocation` VALUES (136, 4, 5, 4, 0);
INSERT INTO `tlocation` VALUES (137, 4, 5, 5, 0);
INSERT INTO `tlocation` VALUES (138, 4, 5, 6, 0);
INSERT INTO `tlocation` VALUES (139, 4, 6, 1, 0);
INSERT INTO `tlocation` VALUES (140, 4, 6, 2, 0);
INSERT INTO `tlocation` VALUES (141, 4, 6, 3, 0);
INSERT INTO `tlocation` VALUES (142, 4, 6, 4, 0);
INSERT INTO `tlocation` VALUES (143, 4, 6, 5, 0);
INSERT INTO `tlocation` VALUES (144, 4, 6, 6, 0);
INSERT INTO `tlocation` VALUES (145, 5, 1, 1, 0);
INSERT INTO `tlocation` VALUES (146, 5, 1, 2, 0);
INSERT INTO `tlocation` VALUES (147, 5, 1, 3, 0);
INSERT INTO `tlocation` VALUES (148, 5, 1, 4, 0);
INSERT INTO `tlocation` VALUES (149, 5, 1, 5, 0);
INSERT INTO `tlocation` VALUES (150, 5, 1, 6, 0);
INSERT INTO `tlocation` VALUES (151, 5, 2, 1, 0);
INSERT INTO `tlocation` VALUES (152, 5, 2, 2, 0);
INSERT INTO `tlocation` VALUES (153, 5, 2, 3, 0);
INSERT INTO `tlocation` VALUES (154, 5, 2, 4, 0);
INSERT INTO `tlocation` VALUES (155, 5, 2, 5, 0);
INSERT INTO `tlocation` VALUES (156, 5, 2, 6, 0);
INSERT INTO `tlocation` VALUES (157, 5, 3, 1, 0);
INSERT INTO `tlocation` VALUES (158, 5, 3, 2, 0);
INSERT INTO `tlocation` VALUES (159, 5, 3, 3, 0);
INSERT INTO `tlocation` VALUES (160, 5, 3, 4, 0);
INSERT INTO `tlocation` VALUES (161, 5, 3, 5, 0);
INSERT INTO `tlocation` VALUES (162, 5, 3, 6, 0);
INSERT INTO `tlocation` VALUES (163, 5, 4, 1, 0);
INSERT INTO `tlocation` VALUES (164, 5, 4, 2, 0);
INSERT INTO `tlocation` VALUES (165, 5, 4, 3, 0);
INSERT INTO `tlocation` VALUES (166, 5, 4, 4, 0);
INSERT INTO `tlocation` VALUES (167, 5, 4, 5, 0);
INSERT INTO `tlocation` VALUES (168, 5, 4, 6, 0);
INSERT INTO `tlocation` VALUES (169, 5, 5, 1, 0);
INSERT INTO `tlocation` VALUES (170, 5, 5, 2, 0);
INSERT INTO `tlocation` VALUES (171, 5, 5, 3, 0);
INSERT INTO `tlocation` VALUES (172, 5, 5, 4, 0);
INSERT INTO `tlocation` VALUES (173, 5, 5, 5, 0);
INSERT INTO `tlocation` VALUES (174, 5, 5, 6, 0);
INSERT INTO `tlocation` VALUES (175, 5, 6, 1, 0);
INSERT INTO `tlocation` VALUES (176, 5, 6, 2, 0);
INSERT INTO `tlocation` VALUES (177, 5, 6, 3, 0);
INSERT INTO `tlocation` VALUES (178, 5, 6, 4, 0);
INSERT INTO `tlocation` VALUES (179, 5, 6, 5, 0);
INSERT INTO `tlocation` VALUES (180, 5, 6, 6, 0);
INSERT INTO `tlocation` VALUES (181, 6, 1, 1, 0);
INSERT INTO `tlocation` VALUES (182, 6, 1, 2, 0);
INSERT INTO `tlocation` VALUES (183, 6, 1, 3, 0);
INSERT INTO `tlocation` VALUES (184, 6, 1, 4, 0);
INSERT INTO `tlocation` VALUES (185, 6, 1, 5, 0);
INSERT INTO `tlocation` VALUES (186, 6, 1, 6, 0);
INSERT INTO `tlocation` VALUES (187, 6, 2, 1, 0);
INSERT INTO `tlocation` VALUES (188, 6, 2, 2, 0);
INSERT INTO `tlocation` VALUES (189, 6, 2, 3, 0);
INSERT INTO `tlocation` VALUES (190, 6, 2, 4, 0);
INSERT INTO `tlocation` VALUES (191, 6, 2, 5, 0);
INSERT INTO `tlocation` VALUES (192, 6, 2, 6, 0);
INSERT INTO `tlocation` VALUES (193, 6, 3, 1, 0);
INSERT INTO `tlocation` VALUES (194, 6, 3, 2, 0);
INSERT INTO `tlocation` VALUES (195, 6, 3, 3, 0);
INSERT INTO `tlocation` VALUES (196, 6, 3, 4, 0);
INSERT INTO `tlocation` VALUES (197, 6, 3, 5, 0);
INSERT INTO `tlocation` VALUES (198, 6, 3, 6, 0);
INSERT INTO `tlocation` VALUES (199, 6, 4, 1, 0);
INSERT INTO `tlocation` VALUES (200, 6, 4, 2, 0);
INSERT INTO `tlocation` VALUES (201, 6, 4, 3, 0);
INSERT INTO `tlocation` VALUES (202, 6, 4, 4, 0);
INSERT INTO `tlocation` VALUES (203, 6, 4, 5, 0);
INSERT INTO `tlocation` VALUES (204, 6, 4, 6, 0);
INSERT INTO `tlocation` VALUES (205, 6, 5, 1, 0);
INSERT INTO `tlocation` VALUES (206, 6, 5, 2, 0);
INSERT INTO `tlocation` VALUES (207, 6, 5, 3, 0);
INSERT INTO `tlocation` VALUES (208, 6, 5, 4, 0);
INSERT INTO `tlocation` VALUES (209, 6, 5, 5, 0);
INSERT INTO `tlocation` VALUES (210, 6, 5, 6, 0);
INSERT INTO `tlocation` VALUES (211, 6, 6, 1, 0);
INSERT INTO `tlocation` VALUES (212, 6, 6, 2, 0);
INSERT INTO `tlocation` VALUES (213, 6, 6, 3, 0);
INSERT INTO `tlocation` VALUES (214, 6, 6, 4, 0);
INSERT INTO `tlocation` VALUES (215, 6, 6, 5, 0);
INSERT INTO `tlocation` VALUES (216, 6, 6, 6, 0);

-- ----------------------------
-- Table structure for toperator
-- ----------------------------
DROP TABLE IF EXISTS `toperator`;
CREATE TABLE `toperator`  (
  `OperatorID` int NOT NULL AUTO_INCREMENT,
  `OperatorName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`OperatorID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of toperator
-- ----------------------------
INSERT INTO `toperator` VALUES (1, 'Mo Xiuying');
INSERT INTO `toperator` VALUES (2, 'Jia Anqi');
INSERT INTO `toperator` VALUES (3, 'Wong Wai Han');
INSERT INTO `toperator` VALUES (4, 'Sheila Reed');
INSERT INTO `toperator` VALUES (5, 'Lau Kwok Ming');
INSERT INTO `toperator` VALUES (6, 'Hsuan Sau Man');
INSERT INTO `toperator` VALUES (7, 'Gerald Alvarez');
INSERT INTO `toperator` VALUES (8, 'Hsuan Siu Wai');
INSERT INTO `toperator` VALUES (9, 'Shi Anqi');
INSERT INTO `toperator` VALUES (10, 'Yuen Wing Fat');
INSERT INTO `toperator` VALUES (11, 'Zhou Zitao');
INSERT INTO `toperator` VALUES (12, 'Taniguchi Riku');
INSERT INTO `toperator` VALUES (13, 'Travis Henderson');
INSERT INTO `toperator` VALUES (14, 'Susan Davis');
INSERT INTO `toperator` VALUES (15, 'Yam Sum Wing');
INSERT INTO `toperator` VALUES (16, 'Man Fu Shing');
INSERT INTO `toperator` VALUES (17, 'Karen Edwards');
INSERT INTO `toperator` VALUES (18, 'Laura Mcdonald');
INSERT INTO `toperator` VALUES (19, 'Lam Ka Man');
INSERT INTO `toperator` VALUES (20, 'Jin Shihan');

-- ----------------------------
-- Table structure for torder
-- ----------------------------
DROP TABLE IF EXISTS `torder`;
CREATE TABLE `torder`  (
  `orderID` int NOT NULL,
  `orderTime` datetime NULL DEFAULT NULL,
  `orderOperator` int NULL DEFAULT NULL,
  `orderCustomer` int NULL DEFAULT NULL,
  PRIMARY KEY (`orderID`) USING BTREE,
  INDEX `user`(`orderOperator`) USING BTREE,
  INDEX `customer`(`orderCustomer`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of torder
-- ----------------------------
INSERT INTO `torder` VALUES (4, '2003-03-29 06:37:20', 13, 5);
INSERT INTO `torder` VALUES (5, '2008-05-29 21:20:33', 12, 8);
INSERT INTO `torder` VALUES (6, '2014-05-03 05:00:30', 13, 19);
INSERT INTO `torder` VALUES (7, '2005-10-29 07:54:41', 1, 14);
INSERT INTO `torder` VALUES (8, '2009-02-04 10:09:13', 18, 10);
INSERT INTO `torder` VALUES (9, '2013-02-14 21:37:18', 7, 12);
INSERT INTO `torder` VALUES (10, '2019-03-02 09:16:24', 5, 13);

-- ----------------------------
-- Table structure for torderdetail
-- ----------------------------
DROP TABLE IF EXISTS `torderdetail`;
CREATE TABLE `torderdetail`  (
  `detailID` int NOT NULL AUTO_INCREMENT,
  `orderBatch` int NULL DEFAULT NULL,
  `orderItem` int NULL DEFAULT NULL,
  `unitPrice` decimal(10, 2) NULL DEFAULT NULL,
  `orderID` int NULL DEFAULT NULL,
  PRIMARY KEY (`detailID`) USING BTREE,
  INDEX `orderItem`(`orderItem`) USING BTREE,
  INDEX `orderID`(`orderID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of torderdetail
-- ----------------------------
INSERT INTO `torderdetail` VALUES (1, 8, 59, 74.90, 6);
INSERT INTO `torderdetail` VALUES (2, 9, 81, 69.48, 4);
INSERT INTO `torderdetail` VALUES (3, 4, 32, 42.63, 10);
INSERT INTO `torderdetail` VALUES (4, 2, 93, 82.51, 7);
INSERT INTO `torderdetail` VALUES (5, 7, 20, 97.48, 9);
INSERT INTO `torderdetail` VALUES (6, 1, 86, 19.00, 5);
INSERT INTO `torderdetail` VALUES (7, 7, 46, 99.49, 4);
INSERT INTO `torderdetail` VALUES (8, 3, 11, 90.70, 5);
INSERT INTO `torderdetail` VALUES (9, 1, 82, 84.08, 10);
INSERT INTO `torderdetail` VALUES (10, 7, 95, 58.08, 6);
INSERT INTO `torderdetail` VALUES (11, 6, 20, 67.85, 4);
INSERT INTO `torderdetail` VALUES (12, 4, 99, 38.14, 10);
INSERT INTO `torderdetail` VALUES (13, 5, 53, 50.39, 10);
INSERT INTO `torderdetail` VALUES (14, 2, 93, 45.35, 7);
INSERT INTO `torderdetail` VALUES (15, 9, 62, 87.84, 7);
INSERT INTO `torderdetail` VALUES (16, 9, 72, 70.82, 10);
INSERT INTO `torderdetail` VALUES (17, 7, 40, 55.42, 6);
INSERT INTO `torderdetail` VALUES (18, 7, 20, 42.75, 8);
INSERT INTO `torderdetail` VALUES (19, 2, 27, 31.50, 5);
INSERT INTO `torderdetail` VALUES (20, 5, 17, 76.68, 5);
INSERT INTO `torderdetail` VALUES (21, 6, 44, 25.91, 5);
INSERT INTO `torderdetail` VALUES (22, 4, 88, 38.59, 7);
INSERT INTO `torderdetail` VALUES (23, 2, 86, 73.99, 5);
INSERT INTO `torderdetail` VALUES (24, 8, 84, 68.21, 8);
INSERT INTO `torderdetail` VALUES (25, 7, 64, 64.48, 5);
INSERT INTO `torderdetail` VALUES (26, 2, 93, 51.22, 7);
INSERT INTO `torderdetail` VALUES (27, 1, 45, 64.25, 5);
INSERT INTO `torderdetail` VALUES (28, 8, 85, 15.86, 9);
INSERT INTO `torderdetail` VALUES (29, 2, 47, 83.52, 6);
INSERT INTO `torderdetail` VALUES (30, 6, 23, 20.24, 7);
INSERT INTO `torderdetail` VALUES (31, 1, 50, 38.72, 4);
INSERT INTO `torderdetail` VALUES (32, 1, 72, 75.96, 10);
INSERT INTO `torderdetail` VALUES (33, 7, 7, 90.28, 7);
INSERT INTO `torderdetail` VALUES (34, 8, 39, 53.58, 5);
INSERT INTO `torderdetail` VALUES (35, 9, 41, 50.61, 6);
INSERT INTO `torderdetail` VALUES (36, 9, 5, 99.93, 8);
INSERT INTO `torderdetail` VALUES (37, 2, 35, 39.23, 9);
INSERT INTO `torderdetail` VALUES (38, 10, 12, 80.16, 8);
INSERT INTO `torderdetail` VALUES (39, 4, 85, 23.71, 8);
INSERT INTO `torderdetail` VALUES (40, 1, 85, 8.42, 5);
INSERT INTO `torderdetail` VALUES (41, 1, 9, 92.33, 9);
INSERT INTO `torderdetail` VALUES (42, 5, 27, 17.75, 10);
INSERT INTO `torderdetail` VALUES (43, 1, 96, 83.69, 7);
INSERT INTO `torderdetail` VALUES (44, 10, 32, 62.58, 6);
INSERT INTO `torderdetail` VALUES (45, 0, 45, 68.49, 5);
INSERT INTO `torderdetail` VALUES (46, 9, 89, 83.53, 8);
INSERT INTO `torderdetail` VALUES (47, 0, 47, 41.96, 4);
INSERT INTO `torderdetail` VALUES (48, 6, 58, 24.25, 8);
INSERT INTO `torderdetail` VALUES (49, 1, 35, 99.94, 4);
INSERT INTO `torderdetail` VALUES (50, 4, 40, 52.73, 9);
INSERT INTO `torderdetail` VALUES (51, 9, 22, 64.74, 8);
INSERT INTO `torderdetail` VALUES (52, 3, 50, 15.98, 10);
INSERT INTO `torderdetail` VALUES (53, 3, 74, 15.14, 7);
INSERT INTO `torderdetail` VALUES (54, 8, 23, 97.11, 4);
INSERT INTO `torderdetail` VALUES (55, 7, 35, 30.14, 10);
INSERT INTO `torderdetail` VALUES (56, 1, 95, 35.08, 4);
INSERT INTO `torderdetail` VALUES (57, 9, 8, 73.57, 8);
INSERT INTO `torderdetail` VALUES (58, 9, 71, 43.62, 5);
INSERT INTO `torderdetail` VALUES (59, 9, 91, 53.72, 8);
INSERT INTO `torderdetail` VALUES (60, 2, 53, 68.71, 5);

-- ----------------------------
-- Table structure for tpallet
-- ----------------------------
DROP TABLE IF EXISTS `tpallet`;
CREATE TABLE `tpallet`  (
  `palletID` int NOT NULL,
  `palletLocation` int NULL DEFAULT NULL,
  `isEmpty` bit(1) NULL DEFAULT NULL,
  PRIMARY KEY (`palletID`) USING BTREE,
  INDEX `location`(`palletLocation`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tpallet
-- ----------------------------
INSERT INTO `tpallet` VALUES (1, 93, b'0');
INSERT INTO `tpallet` VALUES (2, 51, b'1');
INSERT INTO `tpallet` VALUES (3, 108, b'1');
INSERT INTO `tpallet` VALUES (4, 76, b'0');
INSERT INTO `tpallet` VALUES (5, 54, b'1');
INSERT INTO `tpallet` VALUES (6, 172, b'0');
INSERT INTO `tpallet` VALUES (7, 191, b'0');
INSERT INTO `tpallet` VALUES (8, 96, b'0');
INSERT INTO `tpallet` VALUES (9, 34, b'0');
INSERT INTO `tpallet` VALUES (10, 104, b'0');
INSERT INTO `tpallet` VALUES (11, 4, b'1');
INSERT INTO `tpallet` VALUES (12, 74, b'0');
INSERT INTO `tpallet` VALUES (13, 107, b'0');
INSERT INTO `tpallet` VALUES (14, 38, b'0');
INSERT INTO `tpallet` VALUES (15, 205, b'0');
INSERT INTO `tpallet` VALUES (16, 70, b'1');
INSERT INTO `tpallet` VALUES (17, 136, b'1');
INSERT INTO `tpallet` VALUES (18, 1, b'0');
INSERT INTO `tpallet` VALUES (19, 37, b'1');
INSERT INTO `tpallet` VALUES (20, 199, b'1');

-- ----------------------------
-- Table structure for tsupplier
-- ----------------------------
DROP TABLE IF EXISTS `tsupplier`;
CREATE TABLE `tsupplier`  (
  `supplierID` int NOT NULL,
  `supplierName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`supplierID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tsupplier
-- ----------------------------
INSERT INTO `tsupplier` VALUES (1, 'Xie Yunxi');
INSERT INTO `tsupplier` VALUES (2, 'Ishida Akina');
INSERT INTO `tsupplier` VALUES (3, 'Anna Wilson');
INSERT INTO `tsupplier` VALUES (4, 'Mo Jiehong');
INSERT INTO `tsupplier` VALUES (5, 'Mo Yunxi');
INSERT INTO `tsupplier` VALUES (6, 'Otsuka Daichi');
INSERT INTO `tsupplier` VALUES (7, 'Cheng Ka Keung');
INSERT INTO `tsupplier` VALUES (8, 'Wong On Kay');
INSERT INTO `tsupplier` VALUES (9, 'Wanda Campbell');
INSERT INTO `tsupplier` VALUES (10, 'Loui Ka Man');
INSERT INTO `tsupplier` VALUES (11, 'Yuen Wing Sze');
INSERT INTO `tsupplier` VALUES (12, 'Emily Harrison');
INSERT INTO `tsupplier` VALUES (13, 'Fong Ka Ming');
INSERT INTO `tsupplier` VALUES (14, 'Chu Tak Wah');
INSERT INTO `tsupplier` VALUES (15, 'Ishikawa Itsuki');
INSERT INTO `tsupplier` VALUES (16, 'Deborah Graham');
INSERT INTO `tsupplier` VALUES (17, 'Bobby Sullivan');
INSERT INTO `tsupplier` VALUES (18, 'Mui Ka Keung');
INSERT INTO `tsupplier` VALUES (19, 'Dorothy Kelley');
INSERT INTO `tsupplier` VALUES (20, 'Arimura Aoi');

-- ----------------------------
-- Table structure for tsupply
-- ----------------------------
DROP TABLE IF EXISTS `tsupply`;
CREATE TABLE `tsupply`  (
  `supplyID` int NOT NULL,
  `supplyTime` datetime NULL DEFAULT NULL,
  `supplyOperator` int NULL DEFAULT NULL,
  `supplier` int NULL DEFAULT NULL,
  PRIMARY KEY (`supplyID`) USING BTREE,
  INDEX `supplier`(`supplier`) USING BTREE,
  INDEX `supply_operator`(`supplyOperator`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tsupply
-- ----------------------------
INSERT INTO `tsupply` VALUES (1, '2008-06-21 14:00:10', 19, 15);
INSERT INTO `tsupply` VALUES (2, '2020-04-27 05:46:33', 10, 3);
INSERT INTO `tsupply` VALUES (3, '2015-03-02 03:13:35', 2, 13);
INSERT INTO `tsupply` VALUES (4, '2022-02-19 19:31:55', 10, 17);
INSERT INTO `tsupply` VALUES (5, '2013-07-08 17:05:05', 18, 9);
INSERT INTO `tsupply` VALUES (6, '2005-03-18 13:06:54', 8, 20);
INSERT INTO `tsupply` VALUES (7, '2006-06-19 08:33:15', 10, 5);
INSERT INTO `tsupply` VALUES (8, '2018-03-29 16:25:06', 7, 6);
INSERT INTO `tsupply` VALUES (9, '2019-11-11 15:22:50', 11, 17);
INSERT INTO `tsupply` VALUES (10, '2021-11-20 09:47:15', 20, 9);

-- ----------------------------
-- View structure for vw_orderdetail
-- ----------------------------
DROP VIEW IF EXISTS `vw_orderdetail`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_orderdetail` AS select `od`.`detailID` AS `detailID`,`i`.`itemName` AS `itemName`,`od`.`orderBatch` AS `orderBatch`,`od`.`unitPrice` AS `unitPrice`,`csr`.`customerName` AS `customerName`,`opr`.`OperatorName` AS `OperatorName`,`o`.`orderTime` AS `orderTime`,`o`.`orderID` AS `orderID` from ((((`torderdetail` `od` left join `titem` `i` on((`i`.`itemID` = `od`.`orderItem`))) left join `torder` `o` on((`o`.`orderID` = `od`.`orderID`))) left join `toperator` `opr` on((`o`.`orderOperator` = `opr`.`OperatorID`))) left join `tcustomer` `csr` on((`o`.`orderCustomer` = `csr`.`customerID`)));

-- ----------------------------
-- Procedure structure for initCells
-- ----------------------------
DROP PROCEDURE IF EXISTS `initCells`;
delimiter ;;
CREATE PROCEDURE `initCells`(IN `maxR` int,IN `maxB` int,IN `maxL` int)
BEGIN
	#Routine body goes here...
	DECLARE i, j, k, n int;
	DELETE FROM tlocation;
	SET i=1, n=1;
	WHILE i<= maxR DO
		SET j=1;
		WHILE j<=maxB DO
				SET k=1;
				WHILE k<=maxL DO
					INSERT INTO tlocation VALUE(n, i, j, k, 0);
					SET k=k+1;
					SET n=n+1;
				END WHILE;
				SET j=j+1;
		END WHILE;
		set i=i+1;
	END WHILE;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
