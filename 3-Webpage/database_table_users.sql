CREATE DATABASE DONOSTIA;
USE DONOSTIA;

CREATE TABLE USERS (
	USERNAME VARCHAR(25) PRIMARY KEY,
	PASSWORD VARCHAR(255),
	NAME VARCHAR(25),
	SURNAME VARCHAR(25)
);
