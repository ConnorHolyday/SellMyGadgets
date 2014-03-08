<?php
    // Sell My Gadgets Database Creation Script
    // Before running script ensure a database has been created
    // Please enter database details and then load this script via the browser

    // currently does not support error reporting if the script did not work it is very likely an error in the sql statement
    // also make sure the array identifiers match the table names in the tables array
    require_once('configuration.php');
    require_once('database.php');

    $db = new Database();

    //store querys in array with pointer as table name
    $tableStructure = array (
        "product_brands"=>"     CREATE TABLE `product_brands` (
                                `id` int(3) NOT NULL AUTO_INCREMENT,
                                `brand_name` varchar(20) NOT NULL,
                                PRIMARY KEY (`id`));",

        "product_categories"=>" CREATE TABLE `product_categories` (
                                `id` int(3) NOT NULL AUTO_INCREMENT,
                                `category_name` varchar(20) NOT NULL,
                                PRIMARY KEY (`id`));",

        "product_comments"=>"   CREATE TABLE `product_comments` (
                                `id` bigint(20) NOT NULL AUTO_INCREMENT,
                                `product_id` bigint(20) NOT NULL,
                                `comment_id` bigint(20) NOT NULL,
                                `user_id` bigint(20) NOT NULL,
                                `comment` text NOT NULL,
                                PRIMARY KEY (`id`));",

        "product_conditions"=>" CREATE TABLE `product_condition` (
                                `id` int(3) NOT NULL AUTO_INCREMENT,
                                `condition_name` varchar(20) NOT NULL,
                                PRIMARY KEY (`id`));",

        "product_delivery"=>"   CREATE TABLE `product_delivery` (
                                `id` bigint(20) NOT NULL AUTO_INCREMENT,
                                `delivery_status` varchar(20) NOT NULL,
                                `delivery_type` varchar(75) NOT NULL,
                                `delivery_cost` varchar(10) NOT NULL,
                                `delivery_date` datetime,
                                `collection_available` tinyint(1) NOT NULL,
                                `collection_details` varchar(100) NOT NULL,
                                PRIMARY KEY (`id`));",

        "product_details"=>"    CREATE TABLE `product_details` (
                                `product_id` bigint(20) NOT NULL AUTO_INCREMENT,
                                `primary_image` bigint(20) NOT NULL,
                                `description` text NOT NULL,
                                `condition_id` int(3) NOT NULL,
                                `delivery_id` bigint(20) NOT NULL,
                                `cration_date` datetime NOT NULL,
                                `created_by` bigint(20) NOT NULL,
                                `modified_date` datetime NOT NULL,
                                `modified_by` bigint(20) NOT NULL,
                                `brand_id` int(3) DEFAULT NULL,
                                PRIMARY KEY (`product_id`));",

        "product_media"=>"      CREATE TABLE `product_media` (
                                `id` bigint(20) NOT NULL AUTO_INCREMENT,
                                `product_id` bigint(20) NOT NULL,
                                `title` varchar(50) DEFAULT NULL,
                                `extension` varchar(6) NOT NULL DEFAULT '',
                                PRIMARY KEY (`id`));",

        "product_status"=>"     CREATE TABLE `product_status` (
                                `id` int(3) NOT NULL AUTO_INCREMENT,
                                `status` varchar(50) NOT NULL,
                                PRIMARY KEY (`id`));",

        "products"=>"           CREATE TABLE `products` (
                                `id` bigint(20) NOT NULL AUTO_INCREMENT,
                                `category` int(3) NOT NULL,
                                `name` varchar(255) NOT NULL,
                                `price` decimal(5,2) NOT NULL,
                                `status` int(3) NOT NULL,
                                PRIMARY KEY (`id`));",

        "site_content"=>"       CREATE TABLE `site_content` (
                                `id` bigint(20) NOT NULL AUTO_INCREMENT,
                                `page` varchar(20) NOT NULL,
                                `content` text NOT NULL,
                                `active` tinyint(1) NOT NULL,
                                PRIMARY KEY (`id`));",

        "user_details"=>"       CREATE TABLE `user_details` (
                                `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
                                `first_name` varchar(50) NOT NULL,
                                `surname` varchar(50) NOT NULL,
                                `adress_1` varchar(255) NOT NULL,
                                `adress_2` varchar(255) DEFAULT NULL,
                                `town_city` varchar(50) NOT NULL,
                                `county` varchar(50) NOT NULL,
                                `postcode` varchar(10) NOT NULL,
                                `contact_number` int(12) NOT NULL,
                                `contact_email` varchar(100) NOT NULL,
                                PRIMARY KEY (`user_id`));",

        "user_type"=>"          CREATE TABLE `user_type` (
                                `id` int(10) NOT NULL AUTO_INCREMENT,
                                `type` varchar(50) NOT NULL,
                                PRIMARY KEY (`id`));",

        "users"=>"              CREATE TABLE `users` (
                                `id` bigint(20) NOT NULL AUTO_INCREMENT,
                                `username` varchar(50) NOT NULL,
                                `password` varchar(50) NOT NULL,
                                `user_type` int(10) NOT NULL,
                                `active` tinyint(1) NOT NULL,
                                PRIMARY KEY (`id`));",
    );

    $tableContent = array (
        "product_brands"=>"     INSERT INTO `product_brands` (`brand_name`)
                                VALUES
                                    ('Apple'),
                                    ('Microsoft'),
                                    ('Samsung'),
                                    ('Asus'),
                                    ('XFX'),
                                    ('Steel Series'),
                                    ('Corsair'),
                                    ('Canon'),
                                    ('Nikon'),
                                    ('Logitech'),
                                    ('Netgear'),
                                    ('Bush'),
                                    ('Sony'),
                                    ('LG'),
                                    ('Panasonic'),
                                    ('Blackberry'),
                                    ('Nokia'),
                                    ('Acer'),
                                    ('Benq'),
                                    ('HTC');",

        "product_categories"=>" INSERT INTO `product_categories` (`category_name`)
                                VALUES
                                    ('Mobiles'),
                                    ('Laptops'),
                                    ('Computers'),
                                    ('Tablets'),
                                    ('TV\'s'),
                                    ('TV Accesories'),
                                    ('Audio'),
                                    ('Computer Accesories'),
                                    ('Cameras'),
                                    ('Networking'),
                                    ('Toys'),
                                    ('Games Console\'s'),
                                    ('Phone Accesories'),
                                    ('Other');",

        "product_comments"=>" ",

        "product_conditions"=>" INSERT INTO `product_condition` (`condition_name`)
                                VALUES
                                    ('New'),
                                    ('Like new'),
                                    ('Referbished'),
                                    ('Used Good condition'),
                                    ('Used bad condition'),
                                    ('Broken');",

        "product_delivery"=>"   INSERT INTO `product_delivery` (`delivery_status`, `delivery_date`, `delivery_cost`)
                                VALUES
                                    ('Royal Mail 1st Class','2014-01-31 00:00:00',5.00),
                                    ('Royal Mail 2nd Class','2014-01-19 00:00:00',10.00),
                                    ('Other','0000-00-00 00:00:00',0.00);",

        "product_details"=>"   INSERT INTO `product_details` (`primary_image`, `description`, `condition_id`, `delivery_id`, `cration_date`, `created_by`, `modified_date`, `modified_by`, `brand_id`)
                                VALUES
                                    (1,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\n',5,1,'2011-03-12 00:00:00',1,'0000-00-00 00:00:00',0,NULL),
                                    (2,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',4,1,'2011-03-12 00:00:00',5,'0000-00-00 00:00:00',0,NULL),
                                    (3,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',1,1,'2011-03-12 00:00:00',4,'0000-00-00 00:00:00',0,NULL),
                                    (4,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',6,2,'2011-03-12 00:00:00',5,'0000-00-00 00:00:00',0,NULL),
                                    (5,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',1,2,'2011-03-12 00:00:00',6,'0000-00-00 00:00:00',0,NULL),
                                    (6,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',2,1,'2011-03-12 00:00:00',4,'0000-00-00 00:00:00',0,NULL),
                                    (7,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',4,2,'2011-03-12 00:00:00',1,'0000-00-00 00:00:00',0,NULL),
                                    (8,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',1,1,'2011-03-12 00:00:00',6,'0000-00-00 00:00:00',0,NULL),
                                    (9,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',3,1,'2011-03-12 00:00:00',2,'0000-00-00 00:00:00',0,NULL),
                                    (10,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',4,1,'2011-03-12 00:00:00',7,'0000-00-00 00:00:00',0,NULL),
                                    (11,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',5,1,'2011-03-12 00:00:00',7,'0000-00-00 00:00:00',0,NULL),
                                    (12,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',2,2,'2011-03-12 00:00:00',7,'0000-00-00 00:00:00',0,NULL),
                                    (13,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',1,1,'2011-03-12 00:00:00',4,'0000-00-00 00:00:00',0,NULL),
                                    (14,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',1,1,'2011-03-12 00:00:00',3,'0000-00-00 00:00:00',0,NULL),
                                    (15,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',3,2,'2011-03-12 00:00:00',2,'0000-00-00 00:00:00',0,NULL),
                                    (16,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',1,1,'2011-03-12 00:00:00',3,'0000-00-00 00:00:00',0,NULL),
                                    (17,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',2,1,'2011-03-12 00:00:00',1,'0000-00-00 00:00:00',0,NULL),
                                    (18,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',3,1,'2011-03-12 00:00:00',1,'0000-00-00 00:00:00',0,NULL),
                                    (19,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',1,1,'2011-03-12 00:00:00',2,'0000-00-00 00:00:00',0,NULL),
                                    (20,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',6,2,'2011-03-12 00:00:00',2,'0000-00-00 00:00:00',0,NULL),
                                    (21,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',5,1,'2011-03-12 00:00:00',3,'0000-00-00 00:00:00',0,NULL),
                                    (22,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',4,1,'2011-03-12 00:00:00',4,'0000-00-00 00:00:00',0,NULL),
                                    (23,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',1,2,'2011-03-12 00:00:00',5,'0000-00-00 00:00:00',0,NULL),
                                    (24,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',2,1,'2011-03-12 00:00:00',6,'0000-00-00 00:00:00',0,NULL),
                                    (25,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',3,1,'2011-03-12 00:00:00',6,'0000-00-00 00:00:00',0,NULL),
                                    (26,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',2,1,'2011-03-12 00:00:00',5,'0000-00-00 00:00:00',0,NULL),
                                    (27,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',4,2,'2011-03-12 00:00:00',4,'0000-00-00 00:00:00',0,NULL),
                                    (28,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',5,1,'2011-03-12 00:00:00',3,'0000-00-00 00:00:00',0,NULL),
                                    (29,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',3,1,'2011-03-12 00:00:00',7,'0000-00-00 00:00:00',0,NULL),
                                    (30,'description hereLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\n',1,1,'2011-03-12 00:00:00',1,'0000-00-00 00:00:00',0,NULL);",

        "product_media"=>"      INSERT INTO `product_media` (`product_id`, `title`, `extension`)
                                VALUES
                                    (1,'Unheard of','.gif'),
                                    (2,'Quesal','.gif'),
                                    (3,'Resolved','.gif'),
                                    (4,'Co legatee','.gif'),
                                    (5,'Admonitor','.gif'),
                                    (6,'Egregious','.gif'),
                                    (7,'Dezincify','.gif'),
                                    (8,'Enclosing','.gif'),
                                    (9,'Soily','.gif'),
                                    (10,'Heteropter','.gif'),
                                    (11,'Cadence','.gif'),
                                    (12,'Smoker','.gif'),
                                    (13,'Zircona','.gif'),
                                    (14,'Foxly','.gif'),
                                    (15,'Turgescent','.gif'),
                                    (16,'Calamistrum','.gif'),
                                    (17,'Dishabituate','.gif'),
                                    (18,'Choking coil','.gif'),
                                    (19,'Dicarbonic','.gif'),
                                    (20,'Affiliated','.gif'),
                                    (21,'Intermandibular','.gif'),
                                    (22,'Gyrate','.gif'),
                                    (23,'Panslavonian','.gif'),
                                    (24,'Bishop','.gif'),
                                    (25,'Gyronny','.gif'),
                                    (26,'Monomane','.gif'),
                                    (27,'Biltong','.gif'),
                                    (28,'Achrooumldextrin','.gif'),
                                    (29,'Seal brown','.gif'),
                                    (30,'Boteless','.gif'),
                                    (31,'Colonelship','.gif');",

        "product_status"=>"     INSERT INTO `product_status` (`status`)
                                VALUES
                                    ('Active'),
                                    ('Flagged'),
                                    ('Purchased'),
                                    ('Dispatched'),
                                    ('Complete');",

        "products"=>"           INSERT INTO `products` (`category`, `name`, `price`, `status`)
                                VALUES
                                    (1,'Iphone 4s',200.00,1),
                                    (2,'MacBook Pro 15',999.99,1),
                                    (5,'Sony TV',250.00,1),
                                    (3,'Elite desktop pc',999.99,1),
                                    (7,'5.1 Surrond sound',80.00,1),
                                    (8,'Asus 32inch monitor ',400.00,1),
                                    (12,'Xbox 360',40.00,1),
                                    (12,'PlayStation 4',120.00,1),
                                    (13,'Iphone charger',14.00,1),
                                    (3,'Mac desktop',999.99,1),
                                    (2,'Mac Laptop',999.99,1),
                                    (8,'Mac laptop charger ',159.00,1),
                                    (1,'Iphone 5s 128gb',500.00,1),
                                    (8,'Corasair Mechanical Keyboard',70.00,1),
                                    (1,'Nokia 3310',10.00,1),
                                    (7,'Ipod ',100.10,1),
                                    (5,'Samsung 48inch Tv',300.00,1),
                                    (3,'Alien desktop',700.00,1),
                                    (10,'Netgear router',45.00,1),
                                    (9,'Canon 5d MKii',999.99,1),
                                    (1,'Samsung Galaxy Note',80.00,1),
                                    (8,'Logitech Webcam',5.88,1),
                                    (12,'Xbox 360',70.00,1),
                                    (12,'Nintendo Game Boy Colour',50.00,1),
                                    (14,'Scientific Calculator',5.00,1),
                                    (14,'Google Glass',500.00,1),
                                    (8,'Steelseries siberia 2 headset',50.00,1),
                                    (8,'GG button',10.00,1),
                                    (4,'Microsoft Surface Pro',600.00,1),
                                    (4,'Kindle Fire Hd',100.00,1);",

        "site_content"=>"       INSERT INTO `site_content` (`page`, `content`, `active`)
                                VALUES
                                    ('about','<h1>About Sell My Gadgets!!</h1>',1),
                                    ('terms','<h1>Terms & Conditions</h1>',1),
                                    ('privacy','<h1>Our Privacy Agrement</h1>',1),
                                    ('advertising','<h1>Want to advertise with us?</h1>',1),
                                    ('Cookies','<h1>What are cookies store</h1>',1),
                                    ('help','<h1>FAQ</h1>',1),
                                    ('contact','<h1>Contact Us!!!</h1>\n',1);",

        "user_details"=>"       INSERT INTO `user_details` (`first_name`, `surname`, `adress_1`, `adress_2`, `town_city`, `county`, `postcode`, `contact_number`, `contact_email`)
                                VALUES
                                    ('Andy','Hutchings','57 Rocket Close',NULL,'taunton','somerset','ta1 2bg',2147483647,'andy@hotmail.com'),
                                    ('Ryan','Trump','28 road way',NULL,'taunton','somerset','ta1 2bg',2147483647,'Ryan@sellmygadgets.co.uk'),
                                    ('George','Best','20 Duck road',NULL,'taunton','somerset','ta1 2bg',2147483647,'Georgegmail.com'),
                                    ('Alice','Durp','1 new hill',NULL,'taunton','somerset','ta1 2bg',2147483647,'Alice@msn.com'),
                                    ('Becky','Lord','888 bingo close',NULL,'taunton','somerset','ta1 2bg',2147483647,'Becky@gmail.com'),
                                    ('Connor','Holiday','7 lucky mues',NULL,'taunton','somerset','ta1 2bg',2147483647,'Connor@aol.net'),
                                    ('Claudia','Smith','81 iron street',NULL,'taunton','somerset','ta1 2bg',2147483647,'Claudia@gmail.com');",

        "user_type"=>"          INSERT INTO `user_type` (`type`)
                                VALUES
                                    ('Active'),
                                    ('Deactive'),
                                    ('User'),
                                    ('Advanced User'),
                                    ('Experianced User'),
                                    ('Senior User'),
                                    ('Subscriber'),
                                    ('Moderator'),
                                    ('Admin');",

                                "users"=>"   INSERT INTO `users` (`username`, `password`, `user_type`, `active`)
                                VALUES
                                    ('andy@hotmail.com','5f4dcc3b5aa765d61d8327deb882cf99',1,1),
                                    ('Ryan@sellmygadgets.co.uk','5f4dcc3b5aa765d61d8327deb882cf99',1,1),
                                    ('George@gmail.com','5f4dcc3b5aa765d61d8327deb882cf99',1,1),
                                    ('Alice@msn.com','5f4dcc3b5aa765d61d8327deb882cf99',1,1),
                                    ('Becky@gmail.com','5f4dcc3b5aa765d61d8327deb882cf99',1,1),
                                    ('Connor@aol.net','5f4dcc3b5aa765d61d8327deb882cf99',1,1),
                                    ('Claudia@gmail.com','5f4dcc3b5aa765d61d8327deb882cf99',1,1);",
    );

    $tables = array(
        "product_brands",
        "product_categories",
        "product_comments",
        "product_conditions",
        "product_delivery",
        "product_details",
        "product_media",
        "product_status",
        "products",
        "site_content",
        "user_details",
        "user_type",
        "users"
     );

    echo '<h1>Generating Tables</h1><br>'; 

    foreach ($tables as $table) {
        $db->execute_query($tableStructure[$table]);
        echo 'Created Table : ' . $table . '<br>';
    }

    echo '<h1>Generating Content </h1><br>';

    foreach ($tables as $table) {
        $db->execute_query($tableContent[$table]);
        echo 'Test content Generated for' . $table . '<br>';
    }