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
INSERT INTO `product_images` VALUES (1,1,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_1_61c53b0497c5f5.56456129.jpg'),(2,1,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_1_61c53b07ea8897.58915905.jpg'),(3,1,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_1_61c53b0a2f4608.90766388.jpg'),(4,2,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_2_61c5d4b17e9b44.85196334.jpg'),(5,2,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_2_61c5d4b4174150.36990382.jpg'),(6,2,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_2_61c5d4b687d411.86693539.jpg'),(7,3,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_3_61c5d4c472d840.88500669.jpg'),(8,3,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_3_61c5d4c64e07c0.80666908.jpg'),(9,3,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_3_61c5d4c952b648.38935456.jpg'),(10,3,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_3_61c5d4d04c2345.05791501.jpg'),(11,4,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_4_61c5d4e00a1105.63973963.jpg'),(12,4,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_4_61c5d4e1b48943.29496308.jpg'),(13,4,'https://leanhtai01.s3.us-east-2.amazonaws.com/product_4_61c5d4e3adcaf0.78057844.jpg');
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,'Acer Nitro 5 AN515-55-53E5 Gaming Laptop','Dominate the Game: With the 10th Gen Intel Core i5-10300H processor, your Nitro 5 is packed with incredible power for all your games',18269938.38,50,'2021-10-23 19:59:00'),(2,1,'Lenovo Chromebook Flex 3 11\" Laptop','Get high performance when you need it - the Chromebook Flex 3 boots up in seconds and features easy-to-use Chrome OS, plenty of memory and storage, and so much more',4596270.18,37,'2021-11-10 05:00:00'),(3,1,'Lenovo IdeaPad 3 Laptop','Powerhouse performance from AMD Ryzen 5 5500U mobile processor, 8GB DDR4 RAM, 256GB SSD storage, and AMD Radeon 7 Graphics',11003770.75,10,'2021-12-10 18:13:45'),(4,1,'ASUS L210 MA-DB01 Ultra Thin Laptop','Efficient Intel Celeron N4020 Processor (4M Cache, up to 2.8 GHz)',5274820.65,24,'2021-10-11 08:45:23');
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

-- Dump completed on 2021-12-25  9:43:07
