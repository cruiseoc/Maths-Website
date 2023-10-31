<?php

include_once("connection.php");

// creates a table called shop

$stmt = $conn->prepare("DROP TABLE IF EXISTS Shop;
CREATE TABLE Shop
(BadgeID int(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
BadgeName VARCHAR(20) NOT NULL,
Price INT(5) NOT NULL,
Rarity VARCHAR(15) NOT NULL)");
$stmt->execute();
$stmt->closeCursor();

// creates table for users

$stmt = $conn->prepare("DROP TABLE IF EXISTS Users;
CREATE TABLE Users
(UserID int(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Password VARCHAR(60) NOT NULL,
Username VARCHAR(25) NOT NULL,
Role TINYINT(1),
Coins INT(20) NOT NULL)");
$stmt->execute();
$stmt->closeCursor();

// creates table for class

$stmt = $conn->prepare("DROP TABLE IF EXISTS Class;
CREATE TABLE Class
(Class int(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Username VARCHAR(25) NOT NULL,
SubjectName VARCHAR(20) NOT NULL)");
$stmt->execute();
$stmt->closeCursor();

// creates table called userinclass

$stmt = $conn->prepare("DROP TABLE IF EXISTS Userinclass;
CREATE TABLE Userinclass
(Class INT(5) NOT NULL,
Username VARCHAR(25) NOT NULL,
UserID INT(25) NOT NULL)");
$stmt->execute();
$stmt->closeCursor();

// creates table for assignments

$stmt = $conn->prepare("DROP TABLE IF EXISTS Assignments;
CREATE TABLE Assignments
(AssignmentID int(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
AssignmentName VARCHAR(25) NOT NULL,
Class VARCHAR(6) NOT NULL,
Date DATE NOT NULL,
Time TIME NOT NULL,
Instructions VARCHAR(200) NOT NULL)");
$stmt->execute();
$stmt->closeCursor();

// creates table for assignmentforuser
$stmt = $conn->prepare("DROP TABLE IF EXISTS assignmentforuser;
CREATE TABLE assignmentforuser
(AssignmentUser int(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
AssignmentID INT(5) NOT NULL,
UserID INT(5) NOT NULL,
Result INT(5) NOT NULL,
Complete INT(1) NOT NULL,
Feedback VARCHAR(200) NOT NULL,
CoinsGained INT(2) NOT NULL)");
$stmt->execute();
$stmt->closeCursor();

// creates table to store cars in locker
$stmt = $conn->prepare("DROP TABLE IF EXISTS Locker;
CREATE TABLE Locker
(LockerID int(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
BadgeID INT(5) NOT NULL,
UserID INT(5) NOT NULL)");
$stmt->execute();
$stmt->closeCursor();

// creates table to store each students statistics
$stmt = $conn->prepare("DROP TABLE IF EXISTS Stats;
CREATE TABLE Stats
(StatsID int(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
TimeSpent INT(20) NOT NULL,
QuestionsAnswered INT(20) NOT NULL,
Strengths VARCHAR(5) NOT NULL,
Weaknesses VARCHAR(50) NOT NULL, 
Class VARCHAR(6) NOT NULL,
UserID INT(5) NOT NULL)");
$stmt->execute();
$stmt->closeCursor();

// creates table to store each users notifications
$stmt = $conn->prepare("DROP TABLE IF EXISTS Notifications;
CREATE TABLE Notifications
(NotificationID int(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Notification VARCHAR(5) NOT NULL,
Date DATE NOT NULL,
UserID INT(5) NOT NULL)");
$stmt->execute();
$stmt->closeCursor();
?>

