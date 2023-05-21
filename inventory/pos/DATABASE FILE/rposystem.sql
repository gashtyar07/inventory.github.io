

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `admin` (
  `admin_id` varchar(200) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
('10e0b6dc958adfb5b094d8935a13aeadbe783c25', 'System Admin', 'gashtyar@gmail.com', '10470c3b4b1fed12c3baac014be15fac67c6e815');

CREATE TABLE `customers` (
  `customer_id` varchar(200) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_phoneno` varchar(200) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  `customer_password` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_phoneno`, `customer_email`, `customer_password`, `created_at`) VALUES
('06549ea58afd', 'cust1', '4589698780', 'cust1@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2023-05-19 12:39:48.523820');


CREATE TABLE `orders` (
  `order_id` varchar(200) NOT NULL,
  `order_code` varchar(200) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `prod_id` varchar(200) NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_price` varchar(200) NOT NULL,
  `prod_qty` varchar(200) NOT NULL,
  `order_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rpos_orders` (`order_id`, `order_code`, `customer_id`, `customer_name`, `prod_id`, `prod_name`, `prod_price`, `prod_qty`, `order_status`, `created_at`) VALUES
('019661e097', 'AEHM-0653', '06549ea58afd', 'Ana J. Browne', 'bd200ef837', 'Turkish Coffee', '8', '1', 'Paid', '2023-05-19 13:26:00.389027');


CREATE TABLE `pass_resets` (
  `reset_id` int(20) NOT NULL,
  `reset_code` varchar(200) NOT NULL,
  `reset_token` varchar(200) NOT NULL,
  `reset_email` varchar(200) NOT NULL,
  `reset_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `payments` (
  `pay_id` varchar(200) NOT NULL,
  `pay_code` varchar(200) NOT NULL,
  `order_code` varchar(200) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `pay_amt` varchar(200) NOT NULL,
  `pay_method` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `products` (
  `prod_id` varchar(200) NOT NULL,
  `prod_code` varchar(200) NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_img` varchar(200) NOT NULL,
  `prod_desc` longtext NOT NULL,
  `prod_price` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `products` (`prod_id`, `prod_code`, `prod_name`, `prod_img`, `prod_desc`, `prod_price`, `created_at`) VALUES
('06dc36c1be', 'FCWU-5762', 'Philly Cheesesteak', 'cheesestk.jpg', 'A cheesesteak is a sandwich made from thinly sliced pieces of beefsteak and melted cheese in a long hoagie roll. A popular regional fast food, it has its roots in the U.S. city of Philadelphia, Pennsylvania.', '7', '2022-09-03 11:02:47.738370');


CREATE TABLE `staff` (
  `staff_id` int(20) NOT NULL,
  `staff_name` varchar(200) NOT NULL,
  `staff_number` varchar(200) NOT NULL,
  `staff_email` varchar(200) NOT NULL,
  `staff_password` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_number`, `staff_email`, `staff_password`, `created_at`) VALUES
(2, 'Cashier gashtyar', 'QEUY-9042', 'cashier@gmail.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', '2023-05-19 10:13:37.930915');

ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `CustomerOrder` (`customer_id`),
  ADD KEY `ProductOrder` (`prod_id`);

ALTER TABLE `pass_resets`
  ADD PRIMARY KEY (`reset_id`);

ALTER TABLE `payments`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `order` (`order_code`);

ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

ALTER TABLE `pass_resets`
  MODIFY `reset_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `staff`
  MODIFY `staff_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `orders`
  ADD CONSTRAINT `CustomerOrder` FOREIGN KEY (`customer_id`) REFERENCES `rpos_customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ProductOrder` FOREIGN KEY (`prod_id`) REFERENCES `rpos_products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
