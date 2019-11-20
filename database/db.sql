CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `date_added` varchar(255) NOT NULL
);

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_category` varchar(255) NOT NULL,
  `item_price` double NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `date_added` varchar(255) NOT NULL
);

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `usertype` enum('Admin','Other') NOT NULL,
  `date_added` varchar(255) NOT NULL

);
CREATE TABLE `customers`(
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_added` varchar(255) NOT NULL

);

CREATE TABLE `registration` (
  `date` date NOT NULL,
  `com_id` int(11) NOT NULL,
  `com_name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL
);

CREATE TABLE `invoice` (
  `invoice_no` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `order_date` date NOT NULL,
  `sub_total` double NOT NULL,
  `discount` double NOT NULL,
  `net_total` double NOT NULL,
  `paid` double NOT NULL,
  `due` double NOT NULL,
  `payment_type` tinytext NOT NULL
);

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL
);

-- Indexes for table `categories`
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

-- Indexes for table `invoice`
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_no`);
  
-- Indexes for table `invoice_details`
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_no` (`invoice_no`);
  
-- Indexes for table `items`
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `item_name` (`item_name`),
  ADD KEY `cat_id` (`cat_id`);
  
-- Indexes for table `user`
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

  -- Indexes for table `customers`
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

  -- Indexes for table `registration`
ALTER TABLE `registration`
  ADD PRIMARY KEY (`com_id`);
  
-- AUTO_INCREMENT for table `categories`
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;
  
-- AUTO_INCREMENT for table `invoice`
ALTER TABLE `invoice`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT;
  
-- AUTO_INCREMENT for table `invoice_details`
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
-- AUTO_INCREMENT for table `items`
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;
  
-- AUTO_INCREMENT for table `user`
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

  -- AUTO_INCREMENT for table `customers`
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

  -- AUTO_INCREMENT for table `registration`
ALTER TABLE `registration`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;
  
-- Constraints for table `invoice_details`
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`invoice_no`) REFERENCES `invoice` (`invoice_no`);
  
-- Constraints for table `items`
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`);

