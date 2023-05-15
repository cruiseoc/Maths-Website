<?php
include_once("connection.php");

// creates table for users

$stmt = $conn->prepare("DROP TABLE IF EXISTS Users;
CREATE TABLE Users
(UserID int(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Password VARCHAR(200) NOT NULL,
Username VARCHAR(25) NOT NULL,
Role TINYINT(1),
Class VARCHAR(6) NOT NULL, 
Coins INT(20) NOT NULL)");
$stmt->execute();
$stmt->closeCursor();

// creates table for assignments

$stmt = $conn->prepare("DROP TABLE IF EXISTS Assignments;
CREATE TABLE Assignments
(AssignmentID int(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
UserID INT(5) NOT NULL,
AssignmentName VARCHAR(25) NOT NULL,
Class VARCHAR(6) NOT NULL,
Date DATE NOT NULL,
Instructions VARCHAR(200) NOT NULL,
Complete INT(1) NOT NULL,
QuestionOne VARCHAR (150) NOT NULL,
QuestionTwo VARCHAR (150) NOT NULL,
QuestionThree VARCHAR (150) NOT NULL,
QuestionFour VARCHAR (150) NOT NULL,
QuestionFive VARCHAR (150) NOT NULL,
QuestionSix VARCHAR (150) NOT NULL,
QuestionSeven VARCHAR (150) NOT NULL,
QuestionEight VARCHAR (150) NOT NULL,
QuestionNine VARCHAR (150) NOT NULL,
QuestionTen VARCHAR (150) NOT NULL,
Time TIME)");
$stmt->execute();
$stmt->closeCursor();


// creates table for results

$stmt = $conn->prepare("DROP TABLE IF EXISTS Result;
CREATE TABLE Result
(ResultsID int(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
AssignmentID INT(5) NOT NULL,
Results INT(5) NOT NULL,
Feedback VARCHAR(200) NOT NULL,
Class VARCHAR(6) NOT NULL, 
CoinsGained INT(2) NOT NULL)");
$stmt->execute();
$stmt->closeCursor();

// creates table to store cars in locker

$stmt = $conn->prepare("DROP TABLE IF EXISTS Locker;
CREATE TABLE Locker
(LockerID int(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
CarID INT(5) NOT NULL,
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

