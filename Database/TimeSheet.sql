create database TimeSheet;
use TimeSheet;
create table Department(
	Id int not null auto_increment,
    Name varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
    NameManager varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
    PRIMARY KEY (id)
);
create table Positions (
	Id int not null auto_increment,
    Name varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
    IdDepartment int,
    PRIMARY KEY (Id),
    Foreign key (IdDepartment) references Department(Id)
);
create table Project(
	Id int not null auto_increment,
	Name varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
    NameCustomer varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
    DateBegin date DEFAULT NULL,
    IdEmployee int,
    Foreign key (IdEmployee) references Employee(Id),
    PRIMARY KEY (Id)
);
create table Request(
	Id int not null auto_increment,
	Types varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
	PRIMARY KEY (Id)
);
create table Employee(
	Id int not null auto_increment,
    FullName varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
	Dob date DEFAULT NULL,
    Gender int DEFAULT NULL,
    Status int DEFAULT NULL,
    Email varchar(50) DEFAULT NULL,
    Password varchar(200) DEFAULT NULL,
    Position varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
    Role int default -1,
    IdDepartment int,
    IdRequest int,
    PRIMARY KEY (Id),
    foreign key (IdDepartment) references Department(Id),
    foreign key (IdRequest) references Request(Id)
);
CREATE TABLE Timekeeping (
    id INT NOT NULL AUTO_INCREMENT,
    idEmployee INT,
    Date DATE,
    CheckIn TIME,
    CheckOut TIME,
    WorkingTime DECIMAL(5, 2), -- Working time in day
    OvertimeStart TIME,
    OvertimeEnd TIME,
    DayOfWeek INT,
    PRIMARY KEY (id),
    FOREIGN KEY (idEmployee) REFERENCES Employee(Id)
);
CREATE TABLE MonthlySummary (
    id INT NOT NULL AUTO_INCREMENT,
    idEmployee INT,
    Month INT,
    Year INT,
    TotalHoursWorked DECIMAL(10, 2),
    PRIMARY KEY (id),
    FOREIGN KEY (idEmployee) REFERENCES Employee(Id)
);

