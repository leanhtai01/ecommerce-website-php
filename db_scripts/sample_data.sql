USE ecommerce_db;

-- MariaDB dump 10.19  Distrib 10.6.5-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: ecommerce_db
-- ------------------------------------------------------
-- Server version	10.6.5-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (1,'Administrator','admin@gmail.com','$2y$10$U9QcNd2ZwGTGZJaGdkOa8eddzpo5b5LCf.8.rj73lyDNxS4Ca1wAe','0123123123','Hồ Chí Minh',0,1),(2,'Lê Anh Tài','leanhtai01@gmail.com','$2y$10$T53Iga0pUToao7ntMk9WnuKGpYLNW2/HW3AVklyctZ939v90KuWni','0357011672','Bình Phước',1,0),(3,'Nguyễn Văn Linh','nguyenvanlinh@gmail.com','$2y$10$tHcsXUZjQcGbF.H2Fm67muohyCVaiRBkSq3wsifQuRaOvb2UwjEjO','0823712465','Hà Nội',1,1),(4,'Trần Văn Mạnh','tranvanmanh@yahoo.com','$2y$10$E5f3qkKgIK19JluRhKvTNuyA6PbzIoSQbh1/rxbDihkMYoHDqsXHC','0978654313','Hải Phòng',1,1),(5,'Lê Anh Tài','leanhtai01@yahoo.com.vn','$2y$10$maKdbibcObGgiiav0t/lSOO74JjWi8Sp.5M/XspqS4c7Sgh9cJEOa','0522491642','Thừa Thiên Huế',1,0),(6,'Phan Thị Ngọc','phanthingoc@outlook.com','$2y$10$MJENqTTAIvAR2cwQ7AL0n.OaACCA9nB3E69mUA/vUD1PkAAJupac.','0237243234','Quảng Trị',1,1),(7,'Võ Tòng','votong@yahoo.com.vn','$2y$10$NfFW3m3FHxNS5aGwJn/ApenQzwa47cPQvs6vCN.WImA9cHphyVDf.','0123434234','Lương Sơn',1,1),(8,'Trần Văn Bình','tranvanbinh@hotmail.com','$2y$10$45fkcKhtddEZAEl25gveOujy5XAYprG2gqJZaVBcbabiXiecwJvp.','0913456789','Bến Tre',1,1),(9,'Lý Văn Tèo','lyvanteo@gmail.com','$2y$10$vyD5MPabI9vi71QWaiIcLOnfDmYTBiDOT8gUwAPROme44bzX7wKzi','0987231234','Tây Ninh',1,1),(10,'Nguyễn Thành Đạt','nguyenthanhdat@gmail.com','$2y$10$7669OYmUJ09FPxtHBNZm0exPk0TuTCTFmBcHYR10sBDQ57TCSs4OG','0218322123','Bắc Giang',1,1),(11,'Phan Văn Đức','phanvanduc@gmail.com','$2y$10$0Zl4CEnjFNSLGhDGcn3qF.lews9SOQS4GkfJ7qj0u53phgZapyCei','0672654234','Bình Thuận',1,1),(12,'Kim Dung','kimdung@gmail.com','$2y$10$ji2aJVOEe2QmSGajdzzTzuBx7v4Dpwa9ljJEhv21rgpiUpmgUjFq6','0345678765','Nha Trang',1,1),(13,'Vi Tiểu Bảo','vitieubao@yahoo.com','$2y$10$1WLifpk98R5iiqGsoZQ/Zu.R6Uua1vfz2ayW0.0tmUQ9AlykcBmXO','0382876343','Quảng Nam',1,1),(14,'John Doe','johndoe@gmail.com','$2y$10$XTn/WW.KK89pBKpVYKz7uO45PSsFrWd4pPgHtG4KXYa1e2uwaY85m','01234765234','New York',1,1),(15,'Tống Giang','tonggiang@hotmail.com','$2y$10$BGUICuzYHtUeoCYu2Osi0u.I7CGWjjO./4D245gweOhlBcEr0jLTa','0371873923','Lương Sơn',1,1),(16,'Lâm Xung','lamxung@gmail.com','$2y$10$lwIjL/LZFus6EUC8Ez1j1.ArvvW2cvqMobyb/y8xfAgBnqZpI.VFa','0282183823','Dương Châu',1,1),(17,'Lâm Đại Ngọc','lamdaingoc@outlook.com','$2y$10$XhPLwqwey11MVaxqekcS8.eP/77QOkfTbc492ts3YpVpQqe7dc1kG','0123847234','Đài Loan',1,1),(18,'Giả Bảo Ngọc','giabaongoc@gmail.com','$2y$10$GrhbXZoLeSoAos/82j8r5Oev583ZIdugLJUzFgiD8qU4SdoNBW51i','0213287271','Bắc Kinh',1,1),(19,'Yamaha Suzuki','yamahasuzuki@gmail.com','$2y$10$/YxPQa6kqhhqjutgRMqF1.E9G6q81.YihbpxcS89vQuWZohEDD4k2','0231234876','Tokyo',1,1),(20,'Mr. Bean','mrbean@outlook.com','$2y$10$8kT2OwyNRwPu8Y.PbI1jO..06hBxr8l.Gqe.LgMfC6tpDyLRdH/Se','0123428122','London',1,1),(21,'Vũ Thành An','vuthanhan@gmail.com','$2y$10$X5DIW0zdm33m5wAMrqHixOMsYwYeyFQl/xi9qqO528ccacE3oCS5G','0123742642','Đà Nẵng',1,1),(22,'Michael Jackson','michaeljackson@yahoo.com','$2y$10$757ZOJaojRnFRETB5VyWUOMXWsoqymFJqHEO8v7B6sCMKQYAdUjs2','0912328421','Washington DC',1,1),(23,'Michael Schumacher','michaelschumacher@gmail.com','$2y$10$HbLCEGtNEOG2mVwWSeydseRHGE/g0Knok/p/pFwnksYxtV7YE3WeK','0912742123','Virginia',1,1),(24,'Newton','newton@gmail.com','$2y$10$J9oQlg8eey5tNCST0G9Vme7HYUCeyqIx8HMJY47dq.kxRsyx0IBzi','0812342212','Somewhere in the Earth',1,1),(25,'Vũ Văn Thành','vuvanthanh@gmail.com','$2y$10$XjL8Il2Zek3ZAkIsVWHTIutdC15hhk5o1XLmrSeOWYMTQ53OozYUO','0123421821','Hồ Chí Minh',1,1),(26,'Nguyễn Thị Ngọc Như','nguyenthingocnhu@gmail.com','$2y$10$vd8JH1N8AolqcGFyVRILxeKc/BxXVL9OstP3oW6p.tZGGo5Ixpkra','0213842127','Đồng Tháp',1,1);
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Computers','For PC, Laptop and Mac'),(2,'Books','Textbooks, Self-Help, History, Novels'),(3,'Video Games','PC, Mac, Xbox, PlayStation Games'),(4,'Movies & TV','TV Shows, Anime, Science Fiction'),(5,'Softwares','Software for Microsoft Windows, macOS, Linux, Android'),(6,'Cell Phones','iPhones, Android phones, stupid phones');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `favorites`
--

LOCK TABLES `favorites` WRITE;
/*!40000 ALTER TABLE `favorites` DISABLE KEYS */;
/*!40000 ALTER TABLE `favorites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (1,1,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_1_61c53b0497c5f5.56456129.jpg'),(2,1,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_1_61c53b07ea8897.58915905.jpg'),(3,1,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_1_61c53b0a2f4608.90766388.jpg'),(4,2,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_2_61c5d4b17e9b44.85196334.jpg'),(5,2,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_2_61c5d4b4174150.36990382.jpg'),(6,2,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_2_61c5d4b687d411.86693539.jpg'),(7,3,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_3_61c5d4c472d840.88500669.jpg'),(8,3,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_3_61c5d4c64e07c0.80666908.jpg'),(9,3,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_3_61c5d4c952b648.38935456.jpg'),(10,3,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_3_61c5d4d04c2345.05791501.jpg'),(11,4,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_4_61c5d4e00a1105.63973963.jpg'),(12,4,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_4_61c5d4e1b48943.29496308.jpg'),(13,4,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_4_61c5d4e3adcaf0.78057844.jpg'),(14,5,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_5_61c7ef9d4044e5.70022513.jpg'),(15,5,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_5_61c7efa5f309a2.65482897.jpg'),(16,5,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_5_61c7efade96970.38251469.jpg'),(17,6,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_6_61c7f00f651948.68324549.jpg'),(18,6,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_6_61c7f0124c0472.09513467.jpg'),(19,6,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_6_61c7f015248c29.38487443.jpg'),(20,6,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_6_61c7f017843294.78724784.jpg'),(21,7,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_7_61c7f237ab31d0.93823711.jpg'),(22,7,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_7_61c7f239e97af8.29405801.jpg'),(23,7,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_7_61c7f23c363595.00930326.jpg'),(24,7,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_7_61c7f23e76c870.47686911.jpg'),(25,7,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_7_61c7f2422bd7a8.65062565.jpg'),(26,7,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_7_61c7f24535ac89.17511918.jpg'),(27,7,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_7_61c7f247b3dfb3.99941374.jpg'),(28,8,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_8_61c7f2d0a87c56.97242794.jpg'),(29,8,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_8_61c7f2d27468c5.84306120.jpg'),(30,8,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_8_61c7f2d55cd834.68060028.jpg'),(31,8,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_8_61c7f2d785ab52.51030486.jpg'),(32,9,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_9_61c7f3a954cf08.13051006.jpg'),(33,9,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_9_61c7f3ab7a9265.30152451.jpg'),(34,9,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_9_61c7f3ae4470d9.32169618.jpg'),(35,9,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_9_61c7f3b0205400.05949276.jpg'),(36,10,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_10_61c7f46e73ffc6.75923555.jpg'),(37,10,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_10_61c7f4764c3fc5.55952261.jpg'),(38,10,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_10_61c7f4786ebe24.52481727.jpg'),(39,10,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_10_61c7f47b090e18.93640052.jpg'),(40,11,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_11_61c7f648dda005.38325807.jpg'),(41,11,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_11_61c7f64bdf9614.05214915.jpg'),(42,11,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_11_61c7f64da0b3d5.80017867.jpg'),(43,11,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_11_61c7f64fd36d73.05312132.jpg'),(44,12,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_12_61c7f70a60a670.70150905.jpg'),(45,12,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_12_61c7f712023232.77190291.jpg'),(46,12,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_12_61c7f719ebbe66.07860268.jpg'),(47,13,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_13_61c7f7a6459352.82571118.jpg'),(48,13,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_13_61c7f7aa671924.22311111.jpg'),(49,13,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_13_61c7f7ad5ae130.02283221.jpg'),(50,13,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_13_61c7f7b0e420a6.07531640.jpg'),(51,14,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_14_61c7f82d45d629.29969670.jpg'),(52,14,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_14_61c7f82fcffe72.13389129.jpg'),(53,14,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_14_61c7f8320ea794.45328856.jpg'),(54,14,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_14_61c7f8348d5c61.88055479.jpg'),(55,14,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_14_61c7f836e4efa8.07015800.jpg'),(56,14,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_14_61c7f83ade4af8.05370598.jpg'),(57,15,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_15_61c7f8a65d4207.91796515.jpg'),(58,15,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_15_61c7f8a8d85ea0.42835994.jpg'),(59,15,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_15_61c7f8aabc9b66.36571793.jpg'),(60,15,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_15_61c7f8ae1b1bc8.03793824.jpg'),(61,15,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_15_61c7f8b1163d85.26543266.jpg'),(62,15,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_15_61c7f8b416f222.53562429.jpg'),(63,16,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_16_61c7f95ab4fcf4.11794999.jpg'),(64,16,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_16_61c7f95c9f8867.11389993.jpg'),(65,16,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_16_61c7f96420bfa7.03100984.jpg'),(66,16,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_16_61c7f966bde868.00340628.jpg'),(67,17,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_17_61c7f9deee17b7.68897618.jpg'),(68,17,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_17_61c7f9e25a4199.01627742.jpg'),(69,17,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_17_61c7f9e4e37ff4.19269442.jpg'),(70,17,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_17_61c7f9e77fae55.41484292.jpg'),(71,17,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_17_61c7f9eae9b789.18425778.jpg'),(72,17,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_17_61c7f9eea050b5.68025864.jpg'),(73,18,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_18_61c7fa8b420dd7.02311994.jpg'),(74,18,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_18_61c7fa8deeb8b5.72904555.jpg'),(75,18,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_18_61c7fa909aca05.66850753.jpg'),(76,18,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_18_61c7fa93c025a5.26411772.jpg'),(77,18,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_18_61c7fa963316a4.04707895.jpg'),(78,19,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_19_61c7fb0fd6cc39.47670003.jpg'),(79,19,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_19_61c7fb128a9b54.74512800.jpg'),(80,19,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_19_61c7fb1471a049.20920775.jpg'),(81,19,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_19_61c7fb17c4bd47.69293114.jpg'),(82,19,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_19_61c7fb19a21552.13135279.jpg'),(83,20,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_20_61c7fb96dd42c4.54327927.jpg'),(84,20,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_20_61c7fb99248653.07822007.jpg'),(85,20,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_20_61c7fba0921576.31869866.jpg'),(86,20,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_20_61c7fba31f1f29.23373093.jpg'),(87,20,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_20_61c7fba67029b2.99161952.jpg'),(88,21,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_21_61c7fc18416e74.68634247.jpg'),(89,21,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_21_61c7fc1b84f2d1.53223190.jpg'),(90,21,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_21_61c7fc1e1d7b72.97149748.jpg'),(91,21,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_21_61c7fc20a72b03.27973050.jpg'),(92,21,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_21_61c7fc2379c3c1.36364506.jpg'),(93,21,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_21_61c7fc25ebbca2.04360765.jpg');
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,'Acer Nitro 5 AN515-55-53E5 Gaming Laptop','Dominate the Game: With the 10th Gen Intel Core i5-10300H processor, your Nitro 5 is packed with incredible power for all your games',18269938.38,50,'2021-10-23 19:59:00'),(2,1,'Lenovo Chromebook Flex 3 11\" Laptop','Get high performance when you need it - the Chromebook Flex 3 boots up in seconds and features easy-to-use Chrome OS, plenty of memory and storage, and so much more',4596270.18,37,'2021-11-10 05:00:00'),(3,1,'Lenovo IdeaPad 3 Laptop','Powerhouse performance from AMD Ryzen 5 5500U mobile processor, 8GB DDR4 RAM, 256GB SSD storage, and AMD Radeon 7 Graphics',11003770.75,10,'2021-12-10 18:13:45'),(4,1,'ASUS L210 MA-DB01 Ultra Thin Laptop','Efficient Intel Celeron N4020 Processor (4M Cache, up to 2.8 GHz)',5274820.65,24,'2021-10-11 08:45:23'),(5,1,'HP Chromebook 14 Laptop, Intel Celeron N4020','FOR HOME, WORK, & SCHOOL – With this laptop’s Intel processor, 14-inch display, stereo speakers tuned by the audio experts at B&O, and long battery life, you can knock out any assignment or binge-watch your favorite shows.',5689650.00,24,'2021-12-26 11:29:17'),(6,1,'HP Pavilion 15-inch Laptop','Get a fresh perspective with Windows 11: From a rejuvenated Start menu, to new ways to connect to your favorite people, news, games, and content—Windows 11 is the place to think, express, and create in a natural way.',21227650.00,8,'2021-12-26 11:31:11'),(7,1,'MSI Stealth 15M Gaming Laptop','Visual Performance: The 15.6” 144hz display delivers true-to-life images with a high refresh rate so you can see every frame of the game.',33109650.00,87,'2021-12-26 11:40:23'),(8,1,'Latest Gen 8 Lenovo ThinkPad X1 Carbon 14\" FHD Ultrabook','Outstanding Battery Life: Rated Up to 19.5 hours (MM14) and Up to 13.5 hours (MM18) by MobileMark 2014, an industry standard PC performance benchmark. Actual results will vary depending on your system’s usage and settings, including power management and screen brightness.',30778950.00,45,'2021-12-26 11:42:56'),(9,1,'Alienware m15 R4 Gaming Laptop, 15.6 inch Full HD (FHD)','15.6-inch FHD (Full HD 1920 x 1080) 144Hz 7ms 300-nits 72% color gamut\r\n10th Generation Intel Core i7-10870H (8-Core, 16MB Cache, up to 5.0GHz Max Turbo Frequency)\r\n16GB 2933MHz DDR4 , 512 GB M.2 PCIe NVMe SSD\r\nNVIDIA GeForce RTX 3060 6GB GDDR6\r\nKiller Wi-Fi 6 AX1650i 802.11ax 2x2 Wireless LAN + Bluetooth 5.1',41038600.00,23,'2021-12-26 11:46:33'),(10,1,'2021 Apple MacBook Pro (14-inch, Apple M1 Pro chip with 10‑core CPU and 16‑core GPU, 16GB RAM, 1TB SSD) - Silver','Apple M1 Pro or M1 Max chip for a massive leap in CPU, GPU, and machine learning performance\r\nUp to 10-core CPU delivers up to 3.7x faster performance to fly through pro workflows quicker than ever\r\nUp to 32-core GPU with up to 13x faster performance for graphics-intensive apps and games\r\n16-core Neural Engine for up to 11x faster machine learning performance\r\nLonger battery life, up to 17 hours\r\nUp to 64GB of unified memory so everything you do is fast and fluid\r\nUp to 8TB of superfast SSD storage launches apps and opens files in an instant',57102150.00,124,'2021-12-26 11:49:50'),(11,6,'Samsung Galaxy A52 5G, Factory Unlocked Smartphone, Android Cell Phone, Water Resistant, 64MP Camera, US Version, 128GB, Black','Game, Stream & Binge On: Watch your favorite shows, work on your gaming, and keep your playlist blasting with Galaxy A52 5G\'s long-lasting battery\r\nWhen you do need a power boost, Super-Fast Charging will have you back up in no time. Dual-SIM. SIM size-Nano-SIM (4FF)',9688400.00,34,'2021-12-26 11:57:44'),(12,3,'Battlefield 2042 - PC','The next generation of all-out war is here.\r\nExperience ever-changing battle conditions and gameplay challenges.\r\nUnleash your combat creativity with weapons, vehicles and equipment inspired by the near-future of 2042.\r\nChoose your role on the battlefield and form hand-tailored squads through the new Specialist system.',909887.00,23,'2021-12-26 12:00:58'),(13,1,'ASUS TUF Gaming F17 Gaming Laptop, 17.3” 144Hz FHD IPS-Type Display','NVIDIA GeForce GTX 1650 Ti 4GB GDDR6 Graphics up to 1585MHz at 80W TGP.\r\nQuad-core Intel Core 15-10300H Processor (8M Cache, up to 4.5 GHz, 4 cores)\r\n144Hz17.3” Full HD (1920x1080) IPS-Type display\r\n512GB PCIe NVMe M.2 SSD | 8GB DDR4 2933MHz RAM\r\nDurable MIL-STD-810H military standard construction\r\nComes with Windows 10 Home and a FREE upgrade to Windows 11 (when available1)',19399650.00,45,'2021-12-26 12:03:34'),(14,1,'ASUS VivoBook Flip 14 Thin and Light 2-in-1 Laptop, 14” FHD Touch','Latest 11th generation Intel Core i3-1115G4 Processor (6M Cache, up to 4.1 GHz, 2 cores)\r\nWindows 10 Home in S mode, 128GB SSD and 4GB LPDDR4X RAM\r\n14” Full HD Wideview touch display with up to 178° viewing angle optimized for entertainment\r\n12.9” wide, 0.7” thin with a stunning 82% screen-to-body ratio; Brushed aluminum chassis and lightweight at 3.31 pounds',10054000.00,76,'2021-12-26 12:05:49'),(15,1,'ASUS TUF Dash 15 (2021) Ultra Slim Gaming Laptop, 15.6” 144Hz FHD','NVIDIA GeForce RTX 3050 Ti 4GB GDDR6 up to 1585MHz at 60W (75W with Dynamic Boost 2.0)\r\nIntel Core i7-11370H processor (12M Cache, up to 4.8GHz)\r\n15.6” 144Hz IPS-Type Full HD (1920x1080) display with adaptive sync\r\n8GB DDR4 RAM | 512GB PCIe NVMe M.2 SSD | Backlit Precision Gaming Keyboard\r\n0.8” thin, 4.4 lbs ultraportable form-factor\r\nComes with Windows 10 Home and a FREE upgrade to Windows 11 (when available1)',21684650.00,56,'2021-12-26 12:07:50'),(16,1,'Lenovo Chromebook S330 Laptop, 14-Inch FHD (1920 x 1080) Display','High performance laptop: The Chromebook S330 is equipped with a MediaTek MTK8173C Processor, Chrome OS, 4 GB LPDDR3, 64 GB eMMC 5.1 and so much more\r\nSleek and stylish design: Sleek, stylish and secure, the Lenovo Chromebook S330 is less than one inch thin and 3.3 pounds light with a 14-inch FHD display. Perfect for day-to-day computing and multimedia, on or offline',4349269.00,12,'2021-12-26 12:10:50'),(17,1,'Acer Predator Helios 300 PH315-54-760S Gaming Laptop | Intel i7-11800H','Extreme Performance: Crush the competition with the impressive power and speed of the 11th Generation Intel Core i7-11800H processor, featuring 8 cores and 16 threads to divide and conquer any task or run your most intensive games\r\nRTX, It\'s On: The latest NVIDIA GeForce RTX 3060 (6GB dedicated GDDR6 VRAM) is powered by award-winning Ampere architecture with new Ray Tracing Cores, Tensor Cores, and streaming',29682150.00,45,'2021-12-26 12:13:02'),(18,1,'CYBERPOWERPC Gamer Supreme Liquid Cool Gaming PC, AMD Ryzen 7 3800X 3.9GHz','System: AMD Ryzen 7 3800X 3.9GHz 8-Core | AMD B550 Chipset | 16GB DDR4 | 1TB PCI-E NVMe SSD | Genuine Windows 11 Home 64-bit\r\nGraphics: NVIDIA GeForce RTX 3060 12GB Video Card | 1x HDMI | 2x DisplayPort\r\nConnectivity: 6 x USB 3.1 | 2 x USB 2.0 | 1x RJ-45 Network Ethernet 10/100/1000 | 802.11AC Wi-Fi | Audio: 7.1 Channel | Keyboard and mouse',34480650.00,53,'2021-12-26 12:15:55'),(19,1,'ASUS ROG Strix G15 (2021) Gaming Laptop, 15.6” 144Hz IPS Type FHD Display','NVIDIA GeForce RTX 3050 4GB GDDR6 with ROG Boost up to 1840MHz at 80W (95W with Dynamic Boost 2.0)\r\nAMD Ryzen 7 4800H Processor (8M Cache, up to 4.2 GHz)\r\n144Hz 15.6” Full HD 1920x1080 IPS-Type Display\r\n8GB DDR4 3200MHz RAM | 512GB PCIe SSD | Windows 10 Home\r\nROG Intelligent Cooling thermal system with Thermal Grizzly Liquid Metal Thermal Compound',22827150.00,87,'2021-12-26 12:18:07'),(20,1,'2022 Newest Lenovo IdeaPad 3 Laptop, 15.6\" FHD Display, Intel Dual-Core Processor','【Upgraded】RAM is upgraded to 8 GB high-bandwidth RAM to smoothly run multiple applications and browser tabs all at once; Hard Drive is upgraded to 256 GB PCIe NVMe M.2 Solid State Drive to allow faster bootup and data transfer. Original Seal is opened for upgrade ONLY. If the computer has modifications (listed above), then the manufacturer box is opened for it to be tested and inspected and to install the upgrades to achieve the specifications as advertised.',10259650.00,21,'2021-12-26 12:20:22'),(21,1,'Alienware M15 R6 Gaming Laptop, 15.6 inch QHD 240Hz Display','SMOOTH HIGH-SPEED GAMING ACTION: Game with our fastest 15 inch G-SYNC display ever, now with the option of an incredible 240Hz refresh rate and Advanced Optimus technology\r\nIMPRESSIVE MEMORY: Alienware\'s first 15 inch laptop computer with 3200Mhz memory. This m15 even lets gamers upgrade their memory post-purchase, using the two available SO DIMM slots\r\nTACTILE GAMING EXPERIENCE: The ultra-low profile truly mechanical gaming keyboard, codeveloped with Cherry, is designed to deliver the richest gaming experience',65990800.00,234,'2021-12-26 12:22:32');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ratings`
--

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (0,'admin','Administrator'),(1,'user','Registered user'),(2,'guest','Unregistered user');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tokens`
--

LOCK TABLES `tokens` WRITE;
/*!40000 ALTER TABLE `tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `tokens` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-26 12:23:25
