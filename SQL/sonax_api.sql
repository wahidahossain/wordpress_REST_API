-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 07, 2023 at 03:42 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sonax_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_address`
--

DROP TABLE IF EXISTS `billing_address`;
CREATE TABLE IF NOT EXISTS `billing_address` (
  `billing_address_id` int(50) NOT NULL AUTO_INCREMENT,
  `order_wid` int(50) NOT NULL,
  `billing_first_name` varchar(50) NOT NULL,
  `billing_last_name` varchar(50) NOT NULL,
  `billing_company` varchar(50) NOT NULL,
  `billing_address1` varchar(150) NOT NULL,
  `billing_city` varchar(50) NOT NULL,
  `billing_state` varchar(15) NOT NULL,
  `billing_postal_code` varchar(8) NOT NULL,
  `billing_country` varchar(15) NOT NULL,
  `billing_email` varchar(100) NOT NULL,
  `billing_phone` varchar(12) NOT NULL,
  `col_1` varchar(50) NOT NULL,
  `col_2` varchar(50) NOT NULL,
  `col_3` varchar(50) NOT NULL,
  `col_4` varchar(50) NOT NULL,
  `date` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`billing_address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_address`
--

INSERT INTO `billing_address` (`billing_address_id`, `order_wid`, `billing_first_name`, `billing_last_name`, `billing_company`, `billing_address1`, `billing_city`, `billing_state`, `billing_postal_code`, `billing_country`, `billing_email`, `billing_phone`, `col_1`, `col_2`, `col_3`, `col_4`, `date`) VALUES
(1, 20985, 'wahida', 'hossain', 'JRP', '2344 S Sheridan Way', 'Mississauga', 'ON', 'L5J 2M4', 'CA', 'wahida@jrponline.com', '4135676767', '', '', '', '', '2023-03-03 22:30:56'),
(2, 20980, 'test', 'test', 'test company name', '123 st.', 'Toronto', 'ON', 'm1l9R0', 'CA', 'wahida@jrponline.com', '4561231122', '', '', '', '', '2023-03-03 22:30:57'),
(3, 20991, 'New', 'Customer', 'ABC Zone', '1324 Lorne Park Rd,', 'Mississauga', 'ON', 'L5H 3B1', 'CA', 'zone@mail.com', '4135000000', '', '', '', '', '2023-03-03 22:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_wid` int(50) NOT NULL,
  `order_date` varchar(50) NOT NULL,
  `order_mod_date` varchar(20) NOT NULL,
  `order_status` varchar(15) NOT NULL,
  `order_cart_tax` varchar(15) NOT NULL,
  `order_total` varchar(50) NOT NULL,
  `order_total_tax` varchar(15) NOT NULL,
  `payment_method` varchar(25) NOT NULL,
  `payment_method_title` varchar(50) NOT NULL,
  `order_note` varchar(150) NOT NULL,
  `col_1` varchar(100) NOT NULL,
  `col_2` varchar(100) NOT NULL,
  `col_3` varchar(100) NOT NULL,
  `col_4` varchar(100) NOT NULL,
  `col_5` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_wid`, `order_date`, `order_mod_date`, `order_status`, `order_cart_tax`, `order_total`, `order_total_tax`, `payment_method`, `payment_method_title`, `order_note`, `col_1`, `col_2`, `col_3`, `col_4`, `col_5`, `date`) VALUES
(1, 20985, '20230221', '20230221', 'processing', '0.00', '321.93', '0.00', 'bambora_credit_card', 'Credit Card', 'Testing customer note....', '', '', '', '', '', '2023-03-03 22:30:56'),
(2, 20980, '20230209', '20230209', 'processing', '3.90', '33.89', '3.90', 'bambora_credit_card', 'Credit Card', 'Test notes', '', '', '', '', '', '2023-03-03 22:30:57'),
(3, 20991, '20230303', '20230303', 'processing', '75.78', '658.70', '75.78', '', '', 'Test shipping note for the order', '', '', '', '', '', '2023-03-03 22:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_wid` int(50) NOT NULL,
  `product_line_id` varchar(50) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_wid` varchar(50) NOT NULL,
  `product_qty` varchar(10) NOT NULL,
  `product_subtotal` varchar(15) NOT NULL,
  `product_subtotal_tax` varchar(15) NOT NULL,
  `product_total` varchar(15) NOT NULL,
  `product_total_tax` varchar(15) NOT NULL,
  `product_sku` varchar(25) NOT NULL,
  `product_price` varchar(15) NOT NULL,
  `col_1` varchar(100) NOT NULL,
  `col_2` varchar(100) NOT NULL,
  `col_3` varchar(100) NOT NULL,
  `col_4` varchar(100) NOT NULL,
  `col_5` varchar(100) NOT NULL,
  `col_6` varchar(100) NOT NULL,
  `col_7` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `order_wid`, `product_line_id`, `product_name`, `product_wid`, `product_qty`, `product_subtotal`, `product_subtotal_tax`, `product_total`, `product_total_tax`, `product_sku`, `product_price`, `col_1`, `col_2`, `col_3`, `col_4`, `col_5`, `col_6`, `col_7`, `date`) VALUES
(1, 20985, '82470 ', 'SONAX Car Wash Concentrate 5L', '1835', '4', '279.96', '0.00', '279.96', '0.00', '03145000', '69.99', '', '', '', '', '', '', '', '2023-03-03 22:30:56'),
(2, 20985, '82471 ', 'SONAX Rubber Protectant 100ml w/applicator', '1838', '3', '41.97', '0.00', '41.97', '0.00', '03401000', '13.99', '', '', '', '', '', '', '', '2023-03-03 22:30:56'),
(3, 20980, '82465 ', 'SONAX Wheel Cleaner Plus 750ml', '5634', '1', '29.99', '3.90', '29.99', '3.90', '02304000', '29.99', '', '', '', '', '', '', '', '2023-03-03 22:30:57'),
(4, 20991, '82472 ', 'SONAX Application Sponge', '1850', '2', '15.98', '2.08', '15.98', '2.08', '04173000', '7.99', '', '', '', '', '', '', '', '2023-03-03 22:44:25'),
(5, 20991, '82473 ', 'SONAX Ceramic Ultra Slick Detailer 5L', '18250', '5', '549.95', '71.49', '549.95', '71.49', '02685000', '109.99', '', '', '', '', '', '', '', '2023-03-03 22:44:25'),
(6, 20991, '82474 ', 'SONAX Full Effect Wheel Cleaner 500ml', '1902', '1', '16.99', '2.21', '16.99', '2.21', '02302000', '16.99', '', '', '', '', '', '', '', '2023-03-03 22:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

DROP TABLE IF EXISTS `shipping_address`;
CREATE TABLE IF NOT EXISTS `shipping_address` (
  `shipping_address_id` int(50) NOT NULL AUTO_INCREMENT,
  `order_wid` int(50) NOT NULL,
  `shipping_first_name` varchar(100) NOT NULL,
  `shipping_last_name` varchar(100) NOT NULL,
  `shipping_company` varchar(100) NOT NULL,
  `shipping_address1` varchar(150) NOT NULL,
  `shipping_city` varchar(20) NOT NULL,
  `shipping_state` varchar(10) NOT NULL,
  `shipping_postal_code` varchar(8) NOT NULL,
  `shipping_country` varchar(20) NOT NULL,
  `shipping_phone` varchar(12) NOT NULL,
  `col_1` varchar(100) NOT NULL,
  `col_2` varchar(100) NOT NULL,
  `col_3` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`shipping_address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`shipping_address_id`, `order_wid`, `shipping_first_name`, `shipping_last_name`, `shipping_company`, `shipping_address1`, `shipping_city`, `shipping_state`, `shipping_postal_code`, `shipping_country`, `shipping_phone`, `col_1`, `col_2`, `col_3`, `date`) VALUES
(1, 20985, 'wahida', 'hossain', 'JRP', '2344 S Sheridan Way', 'Mississauga', 'ON', 'L5J 2M4', 'CA', '4135676767', '', '', '', '2023-03-03 22:30:56'),
(2, 20980, 'test', 'test', 'test company name', '123 st.', 'Toronto', 'ON', 'm1l9R0', 'CA', '4561231122', '', '', '', '2023-03-03 22:30:57'),
(3, 20991, 'Wang', 'Yu', 'ABC Zone Sales', '3359 Mississauga Rd', 'Mississauga', 'ON', 'L5L 1C6', 'CA', '4132222222', '', '', '', '2023-03-03 22:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `account_status` varchar(10) NOT NULL,
  `logcount` varchar(100) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(100) NOT NULL,
  `account_type` varchar(100) NOT NULL,
  `user_excol1` varchar(100) NOT NULL,
  `user_excol2` varchar(100) NOT NULL,
  `user_excol3` varchar(100) NOT NULL,
  `user_excol4` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `email`, `account_status`, `logcount`, `last_login`, `ip`, `account_type`, `user_excol1`, `user_excol2`, `user_excol3`, `user_excol4`) VALUES
(1, 'Wahida', 'Hossain', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'wahida@jrponline.com', '1', '1', '2023-03-07 20:11:53', '127.0.0.1', 'superadmin', '', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
