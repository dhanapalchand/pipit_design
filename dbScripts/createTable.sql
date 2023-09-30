-- ####################################################################
-- # Basic CREATE DATABASE statement
-- # See https://www.ibm.com/docs/en/db2-for-zos/13?topic=statements-create-database for complete syntax.
-- ####################################################################
CREATE DATABASE phpcrud1;
 
CREATE TABLE phpcrud1.admin(
    adminid int NOT NULL AUTO_INCREMENT,
    admin_name varchar(255) NOT NULL,
    Admin_password varchar(255) NOT NULL,
    
    PRIMARY KEY (adminid)
 );

CREATE TABLE phpcrud1.customer(
    customerid int NOT NULL AUTO_INCREMENT,
    customer_name varchar(50) NOT NULL,
    c_mail varchar(50) NOT NULL,
    c_address varchar(255) NOT NULL,
    c_phoneno varchar(13) NOT NULL,
    c_password varchar(15) NOT NULL,
    PRIMARY KEY(customerid),
     UNIQUE(customer_name)
    
 );

CREATE TABLE phpcrud1.appointment(
    appointid int NOT NULL AUTO_INCREMENT,
     customer_name  varchar(50) NOT NULL,
    appoint_date DATE,
    appoint_time TIMESTAMP,
    c_mail varchar(50) NOT NULL,
    c_phoneno VARCHAR(13) NOT NULL,
    PRIMARY KEY(appointid),
    FOREIGN KEY(customer_name)REFERENCES phpcrud1.customer(customer_name)
 );

CREATE TABLE phpcrud1.product(
    productid int NOT NULL AUTO_INCREMENT,
    product_name VARCHAR(50),
    product_prize int not null,
   
    quantity int not null,
    PRIMARY KEY(productid)
 );

CREATE TABLE phpcrud1.orders(
    orderid int NOT NULL AUTO_INCREMENT,
    customer_name  varchar(50) NOT NULL,
    productid int not null,
    quantity int not null,
    amount FLOAT not null,
    c_address varchar(200),
    payment varchar(200),

    PRIMARY KEY(orderid),
    FOREIGN KEY(customer_name)REFERENCES phpcrud1.customer(customer_name),
    FOREIGN KEY(productid)REFERENCES phpcrud1.product(productid)
  );
 
 CREATE TABLE phpcrud1.payment(
    transactionid int NOT NULL AUTO_INCREMENT,
    orderid int not null,
    customerid int not null,
    productid int not null,
    transaction_status varchar(25) not null,
   
    PRIMARY KEY(transactionid),
    FOREIGN KEY(customerid)REFERENCES phpcrud1.customer(customerid),
    FOREIGN KEY(productid)REFERENCES phpcrud1.product(productid),
    FOREIGN KEY(orderid)REFERENCES phpcrud1.orders(orderid)
 );
 
 CREATE TABLE phpcrud1.shipping(
    shippingid int NOT NULL AUTO_INCREMENT,
    orderid int not null,
   shipping_date DATE,
   Delivery_date DATE,
   
    PRIMARY KEY(shippingid),

    FOREIGN KEY(orderid)REFERENCES phpcrud1.orders(orderid)
 );
 
 CREATE TABLE phpcrud1.feedback(
   feedbackid int NOT NULL AUTO_INCREMENT,
 
   customer_name VARCHAR(50) not null,
   productid int not null,
   review varchar(300),
   rating int ,
   
    PRIMARY KEY(feedbackid),

   FOREIGN KEY(customer_name)REFERENCES phpcrud1.customer(customer_name),
    FOREIGN KEY(productid)REFERENCES phpcrud1.product(productid)
 );