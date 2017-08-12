-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 12, 2017 at 05:11 PM
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

INSERT INTO `Admin` (`idAdmin`, `Name`, `Department`, `User_idUser`) VALUES
(1, 'Fahim Rasel Shahrier', 'HR', 3);

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

INSERT INTO `Appointment` (`idAppointment`, `AppointmentDate`, `AppointmentTime`, `Patient_idPatient`, `Doctor_idDoctor`, `RegistrationDate`) VALUES
(4, '2017-08-04', '04:00-06:00', 1, 1, '2017-08-01'),
(5, '2017-08-06', '05:00-08:00', 1, 3, '2017-08-01'),
(6, '2017-08-11', '04:00-06:00', 3, 1, '2017-08-07'),
(7, '2017-08-13', '05:00-08:00', 3, 3, '2017-08-07');

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

INSERT INTO `AppointmentTimeTable` (`idAppointmentTimeTable`, `VisitingTime`, `VisitingDay`, `Doctor_idDoctor`) VALUES
(1, '05:00-08:00', 'Sunday', 3),
(2, '05:00-08:00', 'Monday', 3),
(3, '04:00-06:00', 'Friday', 1),
(4, '03:30-06:00', 'Saturday', 1);

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

INSERT INTO `Doctor` (`idDoctor`, `Name`, `Department`, `Specialty`, `Degree`, `User_idUser`) VALUES
(1, 'Prof. Dr. Md. Julhash Uddin', 'Medicine', 'Medicine Specialist', 'MBBS, FCPS, FCCP, FRCP (Glasgo)', 4),
(2, 'PROF. DR. MD. ABDUL MANNAN', 'Pediatric and Neonatology', 'Pediatric and Neonatology', 'MBBS,FCPS,MD(PAED),MD(NEONATOLOGY)', 5),
(3, 'DR ABU SALIM', 'Cardiology', 'Cardiology', 'MBBS,D,CARD,MD(CARDIOLOGY),FESC', 6),
(4, 'DR. ERFANUL HAQ SIDDIQUI', 'Orthopedic Surgeon', 'Orthopedic Specialist', 'MBBS(DMC), MS (Ortho),FRSH(London)', 7),
(5, 'Dr. Md. Ataullah Moon', 'Dental Surgeon', 'Dental Specialist', 'BDS, PGT', 8);

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

INSERT INTO `Pathologist` (`idPathologist`, `Name`, `Department`, `Speciality`, `User_idUser`) VALUES
(1, 'Siddikur Rahman', 'X-Ray', 'Dental X-Ray', 9);

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

INSERT INTO `Patient` (`idPatient`, `Name`, `Sex`, `BloodGroup`, `DateOfBirth`, `MobileNo`, `Address`, `User_idUser`) VALUES
(1, 'Md. Fahim Shahrier Rasel', 'Male', 'A+', '1993-07-11', '01554070646', 'T-214, Middle Badda, Dhaka-1212', 1),
(2, 'Shahrier Rasel', 'Male', NULL, NULL, NULL, NULL, 10),
(3, 'Abdul Karim', 'Male', NULL, NULL, NULL, NULL, 11);

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

INSERT INTO `PrescribedMedicine` (`idPrescribedMedicine`, `Medicine`, `Dosage`, `Use`, `Prescription_idPrescription`, `Prescription_Patient_idPatient`, `Prescription_Doctor_idDoctor`) VALUES
(1, 'Napa', '1+1+1', '3 Days', 1, 1, 3),
(2, 'Amoxciline', '1+0+0', '3 Days', 1, 1, 3),
(3, 'SMC Orsaline', '1+0+1', '10 Days', 2, 1, 1);

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

INSERT INTO `Prescription` (`idPrescription`, `Date`, `Problem`, `Patient_idPatient`, `Doctor_idDoctor`) VALUES
(1, '2017-08-04', 'High Fever', 1, 3),
(2, '2017-08-04', 'Low Pressure', 1, 1);

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

INSERT INTO `User` (`idUser`, `UserName`, `Password`, `Email`, `Activation`, `Image`, `UserType`) VALUES
(1, 'fahim', 'asdf1234', 'fahim@tb.com', 1, '', 'Patient'),
(3, 'fahimrasel', 'asdf1234', 'fahim@tb.com', 1, NULL, 'Admin'),
(4, 'julhasuddin', 'asdf1234', 'julhas@labaid.com', 1, NULL, 'Doctor'),
(5, 'abdulmannan', 'mannan1234', 'abdulmannan@labaid.com', 1, NULL, 'Doctor'),
(6, 'abusalim', 'salim1234', 'abusalim@labaid.com', 1, NULL, 'Doctor'),
(7, 'haqsiddiqui', 'siddiqui1234', 'haqsiddiqui@labaid.com', 1, NULL, 'Doctor'),
(8, 'ataullahmoon', 'moon1234', 'ataullahmoon@labaid.com', 1, NULL, 'Doctor'),
(9, 'siddikurrahman', 'asdfqwer', 'siddikrahman@tb.com', 1, '', 'Pathologist'),
(10, 'rasel', 'asdfqwer', 'rasel@tb.com', 1, NULL, 'Patient'),
(11, 'karim', 'asdf1234', 'karim@tb.com', 1, '', 'Patient');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`idAdmin`,`User_idUser`),
  ADD KEY `fk_Admin_User1_idx` (`User_idUser`);

--
-- Indexes for table `Appointment`
--
ALTER TABLE `Appointment`
  ADD PRIMARY KEY (`idAppointment`,`Patient_idPatient`,`Doctor_idDoctor`),
  ADD KEY `fk_Appointment_Patient1_idx` (`Patient_idPatient`),
  ADD KEY `fk_Appointment_Doctor1_idx` (`Doctor_idDoctor`);

--
-- Indexes for table `AppointmentTimeTable`
--
ALTER TABLE `AppointmentTimeTable`
  ADD PRIMARY KEY (`idAppointmentTimeTable`,`Doctor_idDoctor`),
  ADD KEY `fk_AppointmentTimeTable_Doctor1_idx` (`Doctor_idDoctor`);

--
-- Indexes for table `Doctor`
--
ALTER TABLE `Doctor`
  ADD PRIMARY KEY (`idDoctor`,`User_idUser`),
  ADD KEY `fk_Doctor_User1_idx` (`User_idUser`);

--
-- Indexes for table `Pathologist`
--
ALTER TABLE `Pathologist`
  ADD PRIMARY KEY (`idPathologist`,`User_idUser`),
  ADD KEY `fk_Pathologist_User1_idx` (`User_idUser`);

--
-- Indexes for table `Patient`
--
ALTER TABLE `Patient`
  ADD PRIMARY KEY (`idPatient`,`User_idUser`),
  ADD KEY `fk_Patient_User1_idx` (`User_idUser`);

--
-- Indexes for table `PrescribedMedicine`
--
ALTER TABLE `PrescribedMedicine`
  ADD PRIMARY KEY (`idPrescribedMedicine`,`Prescription_idPrescription`,`Prescription_Patient_idPatient`,`Prescription_Doctor_idDoctor`),
  ADD KEY `fk_PrescribedMedicine_Prescription1_idx` (`Prescription_idPrescription`,`Prescription_Patient_idPatient`,`Prescription_Doctor_idDoctor`);

--
-- Indexes for table `Prescription`
--
ALTER TABLE `Prescription`
  ADD PRIMARY KEY (`idPrescription`,`Patient_idPatient`,`Doctor_idDoctor`),
  ADD KEY `fk_Prescription_Patient1_idx` (`Patient_idPatient`),
  ADD KEY `fk_Prescription_Doctor1_idx` (`Doctor_idDoctor`);

--
-- Indexes for table `Test`
--
ALTER TABLE `Test`
  ADD PRIMARY KEY (`idTest`,`Prescription_idPrescription`,`Prescription_Patient_idPatient`,`Prescription_Doctor_idDoctor`),
  ADD KEY `fk_Test_Prescription1_idx` (`Prescription_idPrescription`,`Prescription_Patient_idPatient`,`Prescription_Doctor_idDoctor`);

--
-- Indexes for table `TestReport`
--
ALTER TABLE `TestReport`
  ADD PRIMARY KEY (`idTestReport`,`Test_idTest`,`Test_Prescription_idPrescription`,`Test_Prescription_Patient_idPatient`,`Test_Prescription_Doctor_idDoctor`),
  ADD KEY `fk_TestReport_Test1_idx` (`Test_idTest`,`Test_Prescription_idPrescription`,`Test_Prescription_Patient_idPatient`,`Test_Prescription_Doctor_idDoctor`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `UserName_UNIQUE` (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Appointment`
--
ALTER TABLE `Appointment`
  MODIFY `idAppointment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `AppointmentTimeTable`
--
ALTER TABLE `AppointmentTimeTable`
  MODIFY `idAppointmentTimeTable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Doctor`
--
ALTER TABLE `Doctor`
  MODIFY `idDoctor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Pathologist`
--
ALTER TABLE `Pathologist`
  MODIFY `idPathologist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Patient`
--
ALTER TABLE `Patient`
  MODIFY `idPatient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `PrescribedMedicine`
--
ALTER TABLE `PrescribedMedicine`
  MODIFY `idPrescribedMedicine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Prescription`
--
ALTER TABLE `Prescription`
  MODIFY `idPrescription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Test`
--
ALTER TABLE `Test`
  MODIFY `idTest` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `TestReport`
--
ALTER TABLE `TestReport`
  MODIFY `idTestReport` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Admin`
--
ALTER TABLE `Admin`
  ADD CONSTRAINT `fk_Admin_User1` FOREIGN KEY (`User_idUser`) REFERENCES `User` (`idUser`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `Appointment`
--
ALTER TABLE `Appointment`
  ADD CONSTRAINT `fk_Appointment_Doctor1` FOREIGN KEY (`Doctor_idDoctor`) REFERENCES `Doctor` (`idDoctor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Appointment_Patient1` FOREIGN KEY (`Patient_idPatient`) REFERENCES `Patient` (`idPatient`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `AppointmentTimeTable`
--
ALTER TABLE `AppointmentTimeTable`
  ADD CONSTRAINT `fk_AppointmentTimeTable_Doctor1` FOREIGN KEY (`Doctor_idDoctor`) REFERENCES `Doctor` (`idDoctor`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `Doctor`
--
ALTER TABLE `Doctor`
  ADD CONSTRAINT `fk_Doctor_User1` FOREIGN KEY (`User_idUser`) REFERENCES `User` (`idUser`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `Pathologist`
--
ALTER TABLE `Pathologist`
  ADD CONSTRAINT `fk_Pathologist_User1` FOREIGN KEY (`User_idUser`) REFERENCES `User` (`idUser`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `Patient`
--
ALTER TABLE `Patient`
  ADD CONSTRAINT `fk_Patient_User1` FOREIGN KEY (`User_idUser`) REFERENCES `User` (`idUser`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `PrescribedMedicine`
--
ALTER TABLE `PrescribedMedicine`
  ADD CONSTRAINT `fk_PrescribedMedicine_Prescription1` FOREIGN KEY (`Prescription_idPrescription`,`Prescription_Patient_idPatient`,`Prescription_Doctor_idDoctor`) REFERENCES `Prescription` (`idPrescription`, `Patient_idPatient`, `Doctor_idDoctor`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `Prescription`
--
ALTER TABLE `Prescription`
  ADD CONSTRAINT `fk_Prescription_Doctor1` FOREIGN KEY (`Doctor_idDoctor`) REFERENCES `Doctor` (`idDoctor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prescription_Patient1` FOREIGN KEY (`Patient_idPatient`) REFERENCES `Patient` (`idPatient`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `Test`
--
ALTER TABLE `Test`
  ADD CONSTRAINT `fk_Test_Prescription1` FOREIGN KEY (`Prescription_idPrescription`,`Prescription_Patient_idPatient`,`Prescription_Doctor_idDoctor`) REFERENCES `Prescription` (`idPrescription`, `Patient_idPatient`, `Doctor_idDoctor`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `TestReport`
--
ALTER TABLE `TestReport`
  ADD CONSTRAINT `fk_TestReport_Test1` FOREIGN KEY (`Test_idTest`,`Test_Prescription_idPrescription`,`Test_Prescription_Patient_idPatient`,`Test_Prescription_Doctor_idDoctor`) REFERENCES `Test` (`idTest`, `Prescription_idPrescription`, `Prescription_Patient_idPatient`, `Prescription_Doctor_idDoctor`) ON DELETE NO ACTION ON UPDATE NO ACTION;
