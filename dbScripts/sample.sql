CREATE TABLE phpcrud1.customer(
    customerid int NOT NULL AUTO_INCREMENT,
    customer_name varchar(50) NOT NULL,
    c_mail varchar(50) NOT NULL,
    c_address varchar(255) NOT NULL,
    c_phoneno varchar(13) NOT NULL,
    PRIMARY KEY(customerid),
     UNIQUE(customer_name)
    
 );