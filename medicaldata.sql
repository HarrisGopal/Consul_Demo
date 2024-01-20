
CREATE TABLE `admins` (
`id` int(11) NOT NULL,
`user_name` varchar(50) NOT NULL,
`password` varchar(50) NOT NULL,
`pharmacy_name` varchar(50) NOT NULL,
`email` varchar(50) NOT NULL,
`address` varchar(50) NOT NULL,
`contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admins` (`user_name`, `password`) VALUES
('kavin', 'kavin@123');

CREATE TABLE IF NOT EXISTS `medicines` (
`id` int(11) NOT NULL,
`medicine_name` varchar(255) NOT NULL,
`packing` int(20) NOT NULL,
`generic_name` varchar(255) NOT NULL,
`supplier_name` varchar(255) NOT NULL,
`price` DECIMAL(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `expire` (
`id` int(11) NOT NULL,
`medicine_name` varchar(255) NOT NULL,
`packing` int(20) NOT NULL,
`generic_name` varchar(255) NOT NULL,
`supplier_name` varchar(255) NOT NULL,
`register_date` date NOT NULL,
`expire_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `suppliers` (
`id` int(11) NOT NULL,
`supplier_name` varchar(255) NOT NULL,
`email` varchar(255) NOT NULL,
`contact_no` varchar(255) NOT NULL,
`address` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `customers` (
`id` int(11) NOT NULL,
`customer_name` varchar(255) NOT NULL,
`contact` varchar(255) NOT NULL,
`address` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `invoice_customer` (
  `INVOICE_NO` int(11) NOT NULL AUTO_INCREMENT,
  `INVOICE_DATE` date NOT NULL,
  `CNAME` varchar(50) NOT NULL,
  `CADDRESS` varchar(150) NOT NULL,
  `CONTACT` varchar(50) NOT NULL,
  `GRAND_TOTAL` double(10,2) NOT NULL,
  PRIMARY KEY (`INVOICE_NO`)
);

CREATE TABLE IF NOT EXISTS `invoice_products` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SID` int(11) NOT NULL,
  `PNAME` varchar(100) NOT NULL,
  `PRICE` double(10,2) NOT NULL,
  `QTY` int(11) NOT NULL,
  `TOTAL` double(10,2) NOT NULL,
  PRIMARY KEY (`ID`)
);

ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

  ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

  ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

  ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

   ALTER TABLE `expire`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

 ALTER TABLE `expire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

   ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

