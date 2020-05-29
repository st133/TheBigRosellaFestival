

DROP TABLE IF EXISTS Payment ;
DROP TABLE IF EXISTS Customer ;



CREATE TABLE IF NOT EXISTS Customer (
    Customer_ID INT PRIMARY KEY AUTO_INCREMENT,
    FirstName VARCHAR(35) NOT NULL,
    LastName VARCHAR(35) NOT NULL,
    Age ENUM('-18', '18-29', '30-39', '40-49', '+50'),
    Email VARCHAR(35) NOT NULL,
    Contact_Num INT NOT NULL,
    Comments VARCHAR(255),
    Other VARCHAR(50)
);


CREATE TABLE IF NOT EXISTS Payment (
    Customer_ID INT AUTO_INCREMENT,
	CardName varchar(50),
    Quantity ENUM('1', '2', '3', '4', '5'),
    TotalPrice Int,
    BookingDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	FOREIGN KEY (Customer_ID) REFERENCES Customer (Customer_ID)
);

