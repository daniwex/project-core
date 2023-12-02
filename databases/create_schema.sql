-- Create the CIS 525 database
DROP DATABASE IF EXISTS CIS525;
CREATE DATABASE CIS525;
USE CIS525; 

create table register_students(
	umid int  NOT NULL PRIMARY KEY,
	first_name varchar(20) NOT NULL,
	last_name varchar(10) NOT NULL,
    email varchar(30) NOT NULL,
    phone varchar(20) NOT NULL,
    password char(255) NOT NULL,
    cpassword char(255) NOT NULL
);

create table timeslot(
	id int primary key NOT NULL AUTO_INCREMENT,
    time varchar(50) NOT NULL,
    value int NOT NULL
);

create table register_for_project(
	umid int NOT NULL primary key References register_students(umid),
    project_title varchar(100) NOT NULL,
    time_slot int  NOT NULL references timeslot(id)
);



