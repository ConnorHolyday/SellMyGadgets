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
    $Querys = array (
        "users"=>"CREATE TABLE users (
            id bigint NOT NULL AUTO_INCREMENT,
            username varchar(50) NOT NULL,
            password varchar(50) NOT NULL,
            user_type int(10) NOT NULL,
            active boolean NOT NULL,
            PRIMARY KEY (id)
        );",
        "user_type"=>"CREATE TABLE user_type (
            id int(10) NOT NULL AUTO_INCREMENT,
            type varchar(50) NOT NULL,
            PRIMARY KEY (id)
        );",
        "user_products"=>"CREATE TABLE user_products (
            user_id bigint NOT NULL,
            product_id bigint NOT NULL,
            PRIMARY KEY (user_id)
        );",
        "user_details"=>"CREATE TABLE user_details (
            user_id bigint NOT NULL,
            first_name varchar(50) NOT NULL,
            surname varchar(50) NOT NULL,
            address_1 varchar(255) NOT NULL,
            address_2 varchar(255),
            town_city varchar(50)NOT NULL,
            county varchar(50) NOT NULL,
            postcode varchar(10) NOT NULL,
            contact_number int(12) NOT NULL,
            contact_email varchar(100) NOT NULL,
            image varchar(100)NOT NULL,
            paypal varchar(100)NOT NULL,
            PRIMARY KEY (user_id)
        );",
        "site_content"=>"CREATE TABLE site_content(
            id bigint NOT NULL AUTO_INCREMENT,
            page varchar(20) NOT NULL,
            content text NOT NULL,
            active boolean NOT NULL,
            PRIMARY KEY (id)
        );",
        "products"=>"CREATE TABLE products(
            id bigint NOT NULL AUTO_INCREMENT,
            name varchar(255) NOT NULL,
            category int(3) NOT NULL,
            brand int(3) NOT NULL,
            price decimal(5,2) NOT NULL,
            status int(3) NOT NULL,
            PRIMARY KEY (id)
        );",
        "products_status"=>"CREATE TABLE product_status(
            id int(3) NOT NULL AUTO_INCREMENT,
            status varchar(50) NOT NULL,
            PRIMARY KEY (id)
        );",
        "product_details"=>"CREATE TABLE product_details(
            product_id bigint NOT NULL,
            primary_image bigint,
            description text NOT NULL,
            condition_id int(3) NOT NULL,
            delivery_id bigint,
            creation_date datetime NOT NULL,
            created_by bigint NOT NULL,
            modified_date datetime,
            modified_by bigint,
            PRIMARY KEY (product_id)
        );",
        "product_media"=>"CREATE TABLE product_media(
            id bigint NOT NULL AUTO_INCREMENT,
            product_id bigint NOT NULL,
            title varchar(50) NOT NULL,
            extension varchar(3) NOT NULL,
            PRIMARY KEY(id)
        );",
        "product_categories"=>"CREATE TABLE product_categories(
            id int(3) NOT NULL AUTO_INCREMENT,
            category_name varchar(20) NOT NULL,
            PRIMARY KEY (id)
        );",
        "product_brands"=>"CREATE TABLE product_brands(
            id int(3) NOT NULL AUTO_INCREMENT,
            brand_name varchar(20) NOT NULL,
            PRIMARY KEY (id)
        );",
        "product_conditions"=>"CREATE TABLE product_conditions(
            id int(3) NOT NULL AUTO_INCREMENT,
            condition_name varchar(20) NOT NULL,
            PRIMARY KEY (id)
        );",
        "product_delivery"=>"CREATE TABLE product_delivery(
            id bigint NOT NULL AUTO_INCREMENT,
            delivery_status varchar(20) NOT NULL,
            delivery_date datetime NOT NULL,
            delivery_cost decimal(4,2) NOT NULL,
            PRIMARY KEY (id)
        );",
        "product_comments"=>"CREATE TABLE product_comments(
            id bigint NOT NULL AUTO_INCREMENT,
            product_id bigint NOT NULL,
            user_id bigint NOT NULL,
            comment text NOT NULL,
            PRIMARY KEY (id)
        );"
    );

    $tables = array(
        "users",
        "user_type",
        "user_products",
        "user_details",
        "site_content",
        "products",
        "products_status",
        "product_details",
        "product_media",
        "product_categories",
        "product_brands",
        "product_conditions",
        "product_delivery",
        "product_comments"
     );

    foreach ($tables as $table) {
        $db->execute_query($Querys[$table]);
        echo 'Table Created - ' . $table . '<br>';
    }
