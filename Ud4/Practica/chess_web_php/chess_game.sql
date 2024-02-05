CREATE DATABASE `chess_game` ;

CREATE TABLE `T_Players` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `profileType` enum('silver','gold') DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `T_Matches` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `white` int NOT NULL,
  `black` int NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime DEFAULT NULL,
  `winner` varchar(10) DEFAULT NULL,
  `state` varchar(20) NOT NULL DEFAULT (_utf8mb4'En curso'),
  PRIMARY KEY (`ID`),
  KEY `white` (`white`),
  KEY `black` (`black`),
  CONSTRAINT `T_Matches_ibfk_1` FOREIGN KEY (`white`) REFERENCES `T_Players` (`ID`),
  CONSTRAINT `T_Matches_ibfk_2` FOREIGN KEY (`black`) REFERENCES `T_Players` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=420 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `T_Board_Status` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `IDGame` int NOT NULL,
  `board` varchar(322) DEFAULT NULL,
  PRIMARY KEY (`ID`,`IDGame`),
  KEY `IDGame` (`IDGame`),
  CONSTRAINT `T_Board_Status_ibfk_1` FOREIGN KEY (`IDGame`) REFERENCES `T_Matches` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

