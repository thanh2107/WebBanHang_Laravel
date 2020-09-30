-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_webbanhang
-- ------------------------------------------------------
-- Server version	8.0.18

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `chi_tiet_hd`
--

DROP TABLE IF EXISTS `chi_tiet_hd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chi_tiet_hd` (
  `id_chi_tiet_HD` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_hoa_don` int(10) unsigned NOT NULL,
  `id_chi_tiet_sp` int(10) unsigned NOT NULL,
  `so_luong` int(11) NOT NULL,
  `don_gia` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_chi_tiet_HD`),
  KEY `fk_chitethd_hoadon_idx` (`id_hoa_don`),
  KEY `fk_chitethd_chitietsp_idx` (`id_chi_tiet_sp`),
  CONSTRAINT `fk_chitethd_chitietsp` FOREIGN KEY (`id_chi_tiet_sp`) REFERENCES `chi_tiet_sp` (`idchi_tiet_sp`),
  CONSTRAINT `fk_chitethd_hoadon` FOREIGN KEY (`id_hoa_don`) REFERENCES `hoa_don` (`id_hoa_don`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chi_tiet_hd`
--

LOCK TABLES `chi_tiet_hd` WRITE;
/*!40000 ALTER TABLE `chi_tiet_hd` DISABLE KEYS */;
/*!40000 ALTER TABLE `chi_tiet_hd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chi_tiet_sp`
--

DROP TABLE IF EXISTS `chi_tiet_sp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chi_tiet_sp` (
  `idchi_tiet_sp` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_san_pham` int(10) unsigned NOT NULL,
  `id_mau` int(10) unsigned NOT NULL,
  `id_size` int(10) unsigned NOT NULL,
  `id_hinh` int(10) unsigned NOT NULL,
  `soluong` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idchi_tiet_sp`,`id_size`,`id_hinh`,`id_mau`,`id_san_pham`),
  KEY `fk_chitietsp_sanpham_idx` (`id_san_pham`),
  KEY `fk_chitietsp_mausp_idx` (`id_mau`),
  KEY `fk_chitietsp_size_idx` (`id_size`),
  KEY `fk_chitietsp_hinh_idx` (`id_hinh`),
  CONSTRAINT `fk_chitietsp_hinhsp` FOREIGN KEY (`id_hinh`) REFERENCES `hinh_sp` (`idhinh_sp`),
  CONSTRAINT `fk_chitietsp_mau` FOREIGN KEY (`id_mau`) REFERENCES `mau_sp` (`idmau_sp`),
  CONSTRAINT `fk_chitietsp_sanpham` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id_san_pham`),
  CONSTRAINT `fk_chitietsp_size` FOREIGN KEY (`id_size`) REFERENCES `size_sp` (`idSize`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chi_tiet_sp`
--

LOCK TABLES `chi_tiet_sp` WRITE;
/*!40000 ALTER TABLE `chi_tiet_sp` DISABLE KEYS */;
/*!40000 ALTER TABLE `chi_tiet_sp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hinh_sp`
--

DROP TABLE IF EXISTS `hinh_sp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hinh_sp` (
  `idhinh_sp` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `h1_show` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `h2` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `h3` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `h4` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `h5` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `h6` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `h7` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`idhinh_sp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hinh_sp`
--

LOCK TABLES `hinh_sp` WRITE;
/*!40000 ALTER TABLE `hinh_sp` DISABLE KEYS */;
/*!40000 ALTER TABLE `hinh_sp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hoa_don`
--

DROP TABLE IF EXISTS `hoa_don`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hoa_don` (
  `id_hoa_don` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_khach_hang` int(11) unsigned DEFAULT NULL,
  `ngay_mua` date DEFAULT NULL,
  `tong_tien` float DEFAULT NULL,
  `thanh_toan` varchar(200) DEFAULT NULL,
  `ghi_chu` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_hoa_don`),
  KEY `fk_hoadon_khachhang_idx` (`id_khach_hang`),
  CONSTRAINT `fk_hoadon_khachhang` FOREIGN KEY (`id_khach_hang`) REFERENCES `khach_hang` (`id_khach_hang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hoa_don`
--

LOCK TABLES `hoa_don` WRITE;
/*!40000 ALTER TABLE `hoa_don` DISABLE KEYS */;
/*!40000 ALTER TABLE `hoa_don` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `khach_hang`
--

DROP TABLE IF EXISTS `khach_hang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `khach_hang` (
  `id_khach_hang` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_kh` varchar(100) NOT NULL,
  `gioi_tinh` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `ghi_chu` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_khach_hang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `khach_hang`
--

LOCK TABLES `khach_hang` WRITE;
/*!40000 ALTER TABLE `khach_hang` DISABLE KEYS */;
/*!40000 ALTER TABLE `khach_hang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loai_san_pham`
--

DROP TABLE IF EXISTS `loai_san_pham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loai_san_pham` (
  `id_loai_san_pham` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tên_LSP` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `mo_ta` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `hinh` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_loai_san_pham`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loai_san_pham`
--

LOCK TABLES `loai_san_pham` WRITE;
/*!40000 ALTER TABLE `loai_san_pham` DISABLE KEYS */;
INSERT INTO `loai_san_pham` VALUES (11,'Váy','Những chiếc đầm váy nữ đẹp luôn được biến hóa với nhiều kiểu cách và màu sắc khác nhau.','','2020-09-26 13:59:45',NULL),(12,'Áo thun ','Thiết kế mẫu mã cùng chất liệu áo thun nữ đẹp cao cấp nhất để chinh phục những người khó tính nhất về thời trang','','2020-09-26 14:00:45',NULL),(13,'Áo sơ mi','Mỗi một mẫu áo mang một nét khác biệt và có thể phối được với nhiều loại quần và chân váy.','','2020-09-26 14:07:12',NULL),(14,'Áo khoác','Đa dạng mẫu mã như áo khoác dù nữ, áo khoác kaki nữ, áo khoác jean nữ.','','2020-09-26 14:07:12',NULL),(15,'quần jean','Nàng diện đơn giản thì chọn áo thun form trơn, diện điệu đà thì chọn áo thun form rộng.','','2020-09-26 14:11:13',NULL),(16,'Đầm','Váy đầm ngắn và dài, kiểu bút chì, kiểu buổi tối, dự tiệc, dự tiệc cocktail,','','2020-09-26 14:11:13',NULL);
/*!40000 ALTER TABLE `loai_san_pham` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mau_sp`
--

DROP TABLE IF EXISTS `mau_sp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mau_sp` (
  `idmau_sp` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_mau` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ghi_chu` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idmau_sp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mau_sp`
--

LOCK TABLES `mau_sp` WRITE;
/*!40000 ALTER TABLE `mau_sp` DISABLE KEYS */;
/*!40000 ALTER TABLE `mau_sp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nguoi_dung`
--

DROP TABLE IF EXISTS `nguoi_dung`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nguoi_dung` (
  `id_nguoi_dung` int(10) NOT NULL,
  `ten_nguoi_dung` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_nguoi_dung`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nguoi_dung`
--

LOCK TABLES `nguoi_dung` WRITE;
/*!40000 ALTER TABLE `nguoi_dung` DISABLE KEYS */;
/*!40000 ALTER TABLE `nguoi_dung` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `san_pham`
--

DROP TABLE IF EXISTS `san_pham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `san_pham` (
  `id_san_pham` int(10) unsigned NOT NULL,
  `ten_san_pham` varchar(100) DEFAULT NULL,
  `id_loai_san_pham` int(10) unsigned DEFAULT NULL,
  `mo_ta` text,
  `gia` float DEFAULT NULL,
  `gia_khuyen_mai` float DEFAULT NULL,
  `hinh` varchar(255) DEFAULT NULL,
  `moi` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_san_pham`),
  KEY `fk_sanpham_loaisanpham_idx` (`id_loai_san_pham`),
  CONSTRAINT `fk_sanpham_loaisanpham` FOREIGN KEY (`id_loai_san_pham`) REFERENCES `loai_san_pham` (`id_loai_san_pham`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `san_pham`
--

LOCK TABLES `san_pham` WRITE;
/*!40000 ALTER TABLE `san_pham` DISABLE KEYS */;
/*!40000 ALTER TABLE `san_pham` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `size_sp`
--

DROP TABLE IF EXISTS `size_sp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `size_sp` (
  `idSize` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_size` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ghi chu` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idSize`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `size_sp`
--

LOCK TABLES `size_sp` WRITE;
/*!40000 ALTER TABLE `size_sp` DISABLE KEYS */;
/*!40000 ALTER TABLE `size_sp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slide`
--

DROP TABLE IF EXISTS `slide`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tieu_de` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `noi_dung` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gia` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slide`
--

LOCK TABLES `slide` WRITE;
/*!40000 ALTER TABLE `slide` DISABLE KEYS */;
INSERT INTO `slide` VALUES (1,'','bg.jpg','denim jackets','Xuất hiện từ tận thế kỷ XVII nhưng chất liệu denim lại không thực sự được ưa chuộng trong nền công nghiệp thời trang. Mãi cho đến tận những năm 70, denim mới dần trở nên phổ biến và được yêu mến nhiều trong lĩnh vực thời trang nam. Chất liệu denim được ưa thích bởi tính ứng dụng cao và cá tính bụi bặm, cũng như độ bền qua thời gian. Chất liệu denim thường gắn với hình tượng của sự bền bỉ, phá cách và mạnh mẽ đầy nội lực.',29),(2,'','bg-2.jpg','denim jackets','Vốn được biết đến như một trang phục cho những dịp quan trọng, quần tây gắn với hình ảnh quý ông cổ điển, lịch thiệp và hào hoa. Thế nhưng, những quần tây ngày nay còn được sử dụng  để làm tôn lên chất cá tính, bụi bặm của áo khoác denim một cách khéo léo. Bộ đôi quần tây & denim jacket mang đến cho người mặc những phong cách smart-casual  đời thường  mà mới mẻ, ngẫu hứng.',31);
/*!40000 ALTER TABLE `slide` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tin_tuc`
--

DROP TABLE IF EXISTS `tin_tuc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tin_tuc` (
  `id_tin_tuc` int(10) NOT NULL,
  `tieu_de` varchar(200) NOT NULL,
  `noi_dung` text NOT NULL,
  `hinh` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_tin_tuc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tin_tuc`
--

LOCK TABLES `tin_tuc` WRITE;
/*!40000 ALTER TABLE `tin_tuc` DISABLE KEYS */;
/*!40000 ALTER TABLE `tin_tuc` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-28  7:42:34
