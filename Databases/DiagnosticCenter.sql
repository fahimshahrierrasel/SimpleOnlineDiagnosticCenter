-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 07, 2017 at 10:44 PM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `DiagnosticCenter`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `idAdmin` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Department` varchar(45) NOT NULL,
  `User_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `Appointment`
--

CREATE TABLE `Appointment` (
  `idAppointment` int(11) NOT NULL,
  `AppointmentDate` date NOT NULL,
  `AppointmentTime` varchar(45) NOT NULL,
  `Patient_idPatient` int(11) NOT NULL,
  `Doctor_idDoctor` int(11) NOT NULL,
  `RegistrationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Appointment`
--


-- --------------------------------------------------------

--
-- Table structure for table `AppointmentTimeTable`
--

CREATE TABLE `AppointmentTimeTable` (
  `idAppointmentTimeTable` int(11) NOT NULL,
  `VisitingTime` varchar(45) NOT NULL,
  `VisitingDay` varchar(45) NOT NULL,
  `Doctor_idDoctor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AppointmentTimeTable`
--


-- --------------------------------------------------------

--
-- Table structure for table `Doctor`
--

CREATE TABLE `Doctor` (
  `idDoctor` int(11) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `Department` varchar(45) NOT NULL,
  `Specialty` varchar(45) DEFAULT NULL,
  `Degree` varchar(250) NOT NULL,
  `User_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `Pathologist`
--

CREATE TABLE `Pathologist` (
  `idPathologist` int(11) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `Department` varchar(45) NOT NULL,
  `Speciality` varchar(45) NOT NULL,
  `User_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Pathologist`
--

-- --------------------------------------------------------

--
-- Table structure for table `Patient`
--

CREATE TABLE `Patient` (
  `idPatient` int(11) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `Sex` varchar(10) NOT NULL,
  `BloodGroup` varchar(5) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `MobileNo` varchar(15) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `User_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Patient`
--

-- --------------------------------------------------------

--
-- Table structure for table `PrescribedMedicine`
--

CREATE TABLE `PrescribedMedicine` (
  `idPrescribedMedicine` int(11) NOT NULL,
  `Medicine` varchar(100) NOT NULL,
  `Dosage` varchar(45) NOT NULL,
  `Use` varchar(45) DEFAULT NULL,
  `Prescription_idPrescription` int(11) NOT NULL,
  `Prescription_Patient_idPatient` int(11) NOT NULL,
  `Prescription_Doctor_idDoctor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PrescribedMedicine`
--

-- --------------------------------------------------------

--
-- Table structure for table `Prescription`
--

CREATE TABLE `Prescription` (
  `idPrescription` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Problem` varchar(300) DEFAULT NULL,
  `Patient_idPatient` int(11) NOT NULL,
  `Doctor_idDoctor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Prescription`
--

-- --------------------------------------------------------

--
-- Table structure for table `Test`
--

CREATE TABLE `Test` (
  `idTest` int(11) NOT NULL,
  `TestName` varchar(100) NOT NULL,
  `Prescription_idPrescription` int(11) NOT NULL,
  `Prescription_Patient_idPatient` int(11) NOT NULL,
  `Prescription_Doctor_idDoctor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TestReport`
--

CREATE TABLE `TestReport` (
  `idTestReport` int(11) NOT NULL,
  `Observation` varchar(100) DEFAULT NULL,
  `Result` varchar(45) DEFAULT NULL,
  `ReportDocument` blob,
  `Test_idTest` int(11) NOT NULL,
  `Test_Prescription_idPrescription` int(11) NOT NULL,
  `Test_Prescription_Patient_idPatient` int(11) NOT NULL,
  `Test_Prescription_Doctor_idDoctor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `idUser` int(11) NOT NULL,
  `UserName` varchar(45) NOT NULL,
  `Password` longtext NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Activation` tinyint(4) NOT NULL,
  `Image` longblob,
  `UserType` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `User`
--