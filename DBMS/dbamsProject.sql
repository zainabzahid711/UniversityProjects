-- Create Table Of Branches
CREATE TABLE Branches 
(
  Branch_id INT,
  Branch_name VARCHAR(50),
  Branch_location VARCHAR(100),
  Branch_contact VARCHAR(20),
  CONSTRAINT PK_Branch_id PRIMARY KEY(Branch_id)
)
-- Create Table Of Employee 
CREATE TABLE Employee 
(
  Employee_Id INT,
  Employee_Name VARCHAR(50) UNIQUE,
  Employee_Type VARCHAR(50),
  Employee_contact VARCHAR(20),
  Branch_id INT,
  CONSTRAINT PK_Employee_Id PRIMARY KEY(Employee_Id),
  CONSTRAINT FK_Employee_Branch_id FOREIGN KEY (Branch_id) REFERENCES Branches(Branch_id)
)
--Create Table Of Waiter
CREATE TABLE Waiter 
(
  Waiter_Id INT,
  Waiter_Name VARCHAR(50),
  Waiter_Address VARCHAR(100) DEFAULT 'LHR',
  Waiter_Phone VARCHAR(20),
  Branch_id INT,
  CONSTRAINT PK_Waiter_Id PRIMARY KEY(Waiter_Id),
  CONSTRAINT FK_Waiter_Branch_id FOREIGN KEY (Branch_id) REFERENCES Branches(Branch_id)
)
-- Create Table Of Customer
CREATE TABLE Customer 
(
  Customer_Id INT,
  Customer_Name VARCHAR(50),
  Customer_Type VARCHAR(50),
  Customer_Phone VARCHAR(20),
  Branch_id INT,
  CONSTRAINT PK_Customer_Id PRIMARY KEY(Customer_Id),
  CONSTRAINT FK_Customer_Branch_id FOREIGN KEY (Branch_id) REFERENCES Branches(Branch_id)
)
-- Create Table Of Tables
CREATE TABLE Tables 
(
  Table_Id INT,
  Table_Name VARCHAR(50),
  Customer_Id INT,
  CONSTRAINT PK_Table_Id PRIMARY KEY(Table_Id),
  CONSTRAINT FK_Table_Customer_id FOREIGN KEY (Customer_Id) REFERENCES Customer(Customer_Id)
)
-- Create Table Of Menu 
CREATE TABLE Menu 
(
  Item_Id INT,
  Item_name VARCHAR(50),
  Item_price MONEY NOT NULL,
  CONSTRAINT PK_Item_Id PRIMARY KEY(Item_Id)
)
-- Create Table Of Payments
CREATE TABLE Payments 
(
  Payment_Id INT,
  Payment_category VARCHAR(50),
  Payment_amount MONEY CHECK (Payment_amount<500),
  CONSTRAINT PK_Payment_Id PRIMARY KEY(Payment_Id)
)
-- Create Table Of Order
CREATE TABLE Orders 
(
  Order_Id INT,
  Order_date DATE,
  Customer_Id INT,
  Waiter_Id INT,
  Table_Id INT,
  Item_Id INT,
  Payment_Id INT,
  Item_Quantity INT,
  CONSTRAINT PK_Order_Id PRIMARY KEY(Order_Id),
  CONSTRAINT FK_Orders_Customer_id FOREIGN KEY (Customer_Id) REFERENCES Customer(Customer_Id),
  CONSTRAINT FK_Orders_Waiter_Id FOREIGN KEY (Waiter_Id) REFERENCES Waiter(Waiter_Id),
  CONSTRAINT FK_Orders_Table_Id FOREIGN KEY (Table_Id) REFERENCES Tables(Table_Id),
  CONSTRAINT FK_Orders_Item_Id FOREIGN KEY (Item_Id) REFERENCES Menu(Item_Id),
  CONSTRAINT FK_Orders_Payment_Id FOREIGN KEY (Payment_Id) REFERENCES Payments(Payment_Id)
)
-- Create Table Of ABC
CREATE TABLE ABC
(
ID INT,
NAME VARCHAR(25),
CONSTRAINT PK_Id PRIMARY KEY(Id)
)

INSERT INTO Branches VALUES (1, 'Branch 1', 'Location A', '123-456-7890')
INSERT INTO Branches VALUES (2, 'Branch 2', 'Location B', '987-654-3210')
INSERT INTO Branches VALUES (3, 'Branch 3', 'Location C', '555-123-4567')
INSERT INTO Branches VALUES (4, 'Branch 4', 'Location D', '111-222-3333')
INSERT INTO Branches VALUES (5, 'Branch 5', 'Location E', '444-555-6666')

INSERT INTO Employee VALUES (1, 'Farah Asif', 'Manager', '123-456-7890', 1)
INSERT INTO Employee VALUES (2, 'Horaain Fatima', 'Waiter', '956-693-3278', 2)
INSERT INTO Employee VALUES (3, 'Sarah Ali', 'Chef', '132-222-4527', 2)
INSERT INTO Employee VALUES (4, 'Ali Khan', 'Cashier', '844-1455-456', 2)
INSERT INTO Employee VALUES (5, 'Arfa Farhan', 'Waiter', '576-123-4327', 3)
INSERT INTO Employee VALUES (6, 'Waleed', 'Chef', '132-222-4527', 3)
INSERT INTO Employee VALUES (7, 'Zoha Younas', 'Cashier', '844-1455-456', 3)
INSERT INTO Employee VALUES (8, 'Alia Yousaf', 'Waiter', '567-897-343', 4)
INSERT INTO Employee VALUES (9, 'Usman Farooq', 'Chef', '908-4356-123', 4)
INSERT INTO Employee VALUES (10, 'Zohaib Tariq', 'Cashier', '5690-2456-8987', 4)
INSERT INTO Employee VALUES (11, 'Asifa Alam', 'Waiter', '342-676-327', 5)
INSERT INTO Employee VALUES (12, 'Minahil', 'Chef', '455-876-111', 5)
INSERT INTO Employee VALUES (13, 'Duaa Fatima', 'Cashier', '111-678-555', 5)

INSERT INTO Waiter VALUES (1, 'Abdullah Khan','', '123-456-7890', 1)
INSERT INTO Waiter VALUES (2, 'Waleed Dar', 'LHR DHA PHASE 1', '956-693-3278', 2)
INSERT INTO Waiter VALUES (3, 'Irtaza', 'LHR DHA PHASE 2', '132-222-4527', 3)
INSERT INTO Waiter VALUES (4, 'Usama', 'LHR DHA PHASE 1', '844-1455-456', 4)
INSERT INTO Waiter VALUES (5, 'Noman Saif', 'LHR DHA PHASE 2', '576-123-4327', 5)

INSERT INTO Customer VALUES (1, 'Sarah Azam', 'VIP', '987-654-3210', 1)
INSERT INTO Customer VALUES (2, 'Ali Khan', 'Regular', '555-123-4567', 2)
INSERT INTO Customer VALUES (3, 'Sarah Almas', 'Regular', '111-222-3333', 2)
INSERT INTO Customer VALUES (4, 'Zarnab Alyas', 'VIP', '444-555-6666', 3)
INSERT INTO Customer VALUES (5, 'Eman Fatima', 'Regular', '777-888-9999', 3)
INSERT INTO Customer VALUES (6, 'sidra Batool', 'VIP', '222-333-4444', 1)
INSERT INTO Customer VALUES (7, 'Ahmed Nadeem', 'Regular', '666-777-8888', 2)

INSERT INTO Tables VALUES (1, 'Table 1', 1)
INSERT INTO Tables VALUES (2, 'Table 2', 2)
INSERT INTO Tables VALUES (3, 'Table 3', 3)
INSERT INTO Tables VALUES (4, 'Table 4', 4)
INSERT INTO Tables VALUES (5, 'Table 5', 5)

INSERT INTO Menu VALUES (1, 'Espresso', 210.0)
INSERT INTO Menu VALUES (2, 'Cappuccino', 120.0)
INSERT INTO Menu VALUES (3, 'Latte', 130.0)
INSERT INTO Menu VALUES (4, 'Mocha',40.0 )
INSERT INTO Menu VALUES (5, 'Americano', 150.0)

INSERT INTO Payments VALUES (1, 'Cash', 10.0)
INSERT INTO Payments VALUES (2, 'Credit Card', 15.0)
INSERT INTO Payments VALUES (3, 'Online Payment', 20.00)

INSERT INTO Orders VALUES (1, '2023-05-17', 1, 2, 1, 1, 1, 2)
INSERT INTO Orders VALUES(2, '2023-05-18', 5, 1, 2, 3, 2, 1)
INSERT INTO Orders VALUES(3, '2023-05-18', 3, 4, 4, 2, 3, 3)
INSERT INTO Orders VALUES(4, '2023-05-19', 7, 3, 5, 4, 2, 2)
INSERT INTO Orders VALUES(5, '2023-05-20', 2, 5, 3, 5, 1, 1)

INSERT INTO ABC VALUES (1,'Ali')
INSERT INTO ABC VALUES (2,'Rehan')

-- Add new column to the Customer table
ALTER TABLE Customer ADD Customer_Email VARCHAR(50)
-- Truncate ABC table
TRUNCATE TABLE ABC


-- Add comment on the Customer table
COMMENT ON TABLE Customer IS 'This table stores information about the customers.'

-- Rename the ABC table to EXTRA_TABLE
RENAME ABC TO EXTRA

--Add constraint to the Tables
ALTER TABLE Employee ADD CONSTRAINT UQ_Employee_Name UNIQUE (Employee_Name)
ALTER TABLE Menu ALTER COLUMN Item_price Decimal(10,2) NOT NULL
ALTER TABLE Payments ADD CONSTRAINT CK_Payment_amount CHECK (Payment_amount<100)
ALTER TABLE Waiter Add Constraint DF_Waiter_Address DEFAULT 'LHR' FOR Waiter_Address
SELECT * FROM Employee
SELECT * FROM Menu
SELECT * FROM Payments
SELECT * FROM Waiter

SELECT * FROM Employee WHERE Employee_Type = 'Manager'

SELECT * FROM Menu WHERE Item_name = 'Espresso'
SELECT * FROM Customer WHERE Customer_Name = 'Sarah Azam'


--Sub Query
SELECT * FROM Menu WHERE Item_Id IN (SELECT Item_Id FROM Orders WHERE Waiter_Id = 2)

SELECT * FROM Customer WHERE Customer_Id IN (SELECT Customer_Id FROM Tables)

SELECT * FROM Menu WHERE Item_Id NOT IN (SELECT Item_Id FROM Orders)

-- Delete the record of employee
DELETE FROM Employee WHERE Employee_Id = 4
-- Delete the record of menu
DELETE FROM Menu WHERE Item_Id = 3
-- Delete the record of customer
DELETE FROM Customer WHERE Customer_Id = 5
-- Display the records after deletion
SELECT * FROM Employee

SELECT * FROM Menu
SELECT * FROM Customer

-- Update the record of table employee
UPDATE Employee SET Employee_Name = 'John Smith' WHERE Employee_Id = 1
-- Update the record of table menu 
UPDATE Menu SET Item_price = 150.0 WHERE Item_Id = 1
-- Update the record of table customer
UPDATE Customer SET Customer_Name = 'Bob Smith' WHERE Customer_Id = 2
-- Display the records after updating
SELECT * FROM Employee


--Joins
--Cartesian
SELECT * FROM Customer  , Orders

--Inner/Equi
SELECT c.Customer_Name,t.Table_Name,o.Order_date FROM Customer c, Tables t, Orders o WHERE c.Customer_Id =t.Customer_Id 


--Self
SELECT c1.Customer_Name,c2.Customer_Type FROM Customer c1,Customer c2  WHERE c1.Customer_Id =c2.Customer_Id 

--Outer
SELECT * FROM Customer  c left outer join  Orders o ON c.Customer_Id =o.Customer_Id 

SELECT * FROM Customer  c right outer join  Orders o ON c.Customer_Id =o.Customer_Id 

SELECT * FROM Customer  c FULL outer join  Orders o ON c.Customer_Id =o.Customer_Id 

---Aggregate Functions
SELECT  COUNT(*) AS 'No of branches'
FROM Branches 

SELECT  SUM(item_price) AS 'total employee types'
FROM Menu

Select  MAX(item_price) AS 'total employee types'
FROM Menu

SELECT  MIN(item_price) AS 'total employee types'
FROM Menu

SELECT  AVG(item_price) AS 'total employee types'
FROM Menu

--Sub Query
SELECT  COUNT(*) AS 'No of branches'
FROM Branches t ,Orders o WHERE o.Payment_Id >(SELECT  MIN(item_price) FROM Menu)

--Top
SELECT TOP(2) Employee_name  FROM Employee WHERE Employee_Id=1

--Distinct
SELECT DISTINCT (Employee_name) FROM Employee

--Group by
SELECT e.Employee_name , COUNT(*) AS 'total employees'
FROM Employee e,Branches b
WHERE e.Branch_id = b.Branch_id
GROUP BY e.Employee_Name

SELECT t.Table_Name , SUM(o.Order_id) AS 'total Tables'
FROM Tables t,orders o
WHERE t.Table_Id = o.Table_Id
GROUP BY t.Table_Name

SELECT t.Table_Name , MAX(o.Order_id) AS 'total Tables'
FROM Tables t,orders o
WHERE t.Table_Id = o.Table_Id
GROUP BY t.Table_Name


SELECT t.Table_Name , MIN(o.Order_id) AS 'total Tables'
FROM Tables t,orders o
WHERE t.Table_Id = o.Table_Id
GROUP BY t.Table_Name

SELECT t.Table_Name , AVG(o.Order_id) AS 'total Tables'
FROM Tables t,orders o
WHERE t.Table_Id = o.Table_Id
GROUP BY t.Table_Name

--Order By
SELECT t.Table_Name , SUM(o.Order_id) AS 'total Tables'
FROM Tables t,orders o
WHERE t.Table_Id = o.Table_Id
GROUP BY t.Table_Name
ORDER BY SUM(o.Order_id) DESC

SELECT t.Table_Name , MAX(o.Order_id) AS 'total Tables'
FROM Tables t,orders o
WHERE t.Table_Id = o.Table_Id
GROUP BY t.Table_Name
ORDER BY MAX(t.Table_Name )DESC

--Having
SELECT t.Table_id , SUM(o.Order_id) AS 'total Tables'
FROM Tables t,orders o
WHERE t.Table_Id = o.Table_Id
GROUP BY t.Table_id
HAVING t.Table_Id=1
 
SELECT t.Table_id , COUNT(o.Order_id) AS 'total Tables'
FROM Tables t,orders o
WHERE t.Table_Id = o.Table_Id
GROUP BY t.Table_id
HAVING COUNT(t.Table_Id)>1




























