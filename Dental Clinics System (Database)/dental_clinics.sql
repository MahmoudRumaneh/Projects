-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 05, 2021 at 01:06 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dental_clinics`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `manager_of_the_clinic_view1`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `manager_of_the_clinic_view1` (IN `appointment_id` INT)  SELECT day, date, time FROM appointment WHERE id = appointment_id$$

DROP PROCEDURE IF EXISTS `manager_of_the_clinic_view2`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `manager_of_the_clinic_view2` (IN `clinic_name` VARCHAR(200))  SELECT doctor_id, address_building_number, address_city, address_street_name, secretary_national_number FROM clinic
WHERE name = clinic_name$$

DROP PROCEDURE IF EXISTS `manager_of_the_company_view`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `manager_of_the_company_view` ()  SELECT patient_clinic.clinic_name, patient_clinic.patient_national_number, clinic.address_city, clinic.address_street_name, clinic.address_building_number
FROM patient_clinic INNER JOIN clinic ON patient_clinic.clinic_name = clinic.name$$

DROP PROCEDURE IF EXISTS `medicine_names`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `medicine_names` (IN `medicine_id` INT)  SELECT name FROM medicine 
WHERE id = medicine_id$$

DROP PROCEDURE IF EXISTS `patient_view1`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `patient_view1` (IN `appointment_id` INT)  SELECT date, day, time FROM appointment WHERE id = appointment_id$$

DROP PROCEDURE IF EXISTS `patient_view2`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `patient_view2` (IN `prescription_id` INT)  SELECT amount_of_medicine, diagnoses FROM prescription WHERE id = prescription_id$$

DROP PROCEDURE IF EXISTS `patient_view3`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `patient_view3` (IN `prescription_medicine_id` INT)  SELECT amount_of_dose FROM prescription_medicine WHERE prescription_id = prescription_medicine_id$$

DROP PROCEDURE IF EXISTS `prescription_history`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `prescription_history` (IN `prescription_id` INT)  SELECT diagnoses FROM prescription
WHERE id = prescription_id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) NOT NULL,
  `day` varchar(150) DEFAULT NULL,
  `date` varchar(150) DEFAULT NULL,
  `time` varchar(1500) DEFAULT NULL,
  `patient_national_number` int(11) DEFAULT NULL,
  `secretary_national_number` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `patient_national_number` (`patient_national_number`),
  KEY `secretary_national_number` (`secretary_national_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `day`, `date`, `time`, `patient_national_number`, `secretary_national_number`) VALUES
(1, 'Tuesday', '3/9/2021', '03:00 PM', 4945882, 202165465),
(2, 'Sunday', '8/10/2021', '12:25 PM', 1951635, 202165465),
(3, 'Monday', '4/10/2021', '11:15 AM', 2044979, 985598952),
(4, 'Wednesday', '7/9/2021', '01:10 PM', 2005661, 204984655),
(5, 'Sunday', '1/10/2021', '03:45 PM', 1616586, 584562055),
(6, 'Tuesday', '4/10/2021', '10:30 AM', 1561785, 256461248);

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

DROP TABLE IF EXISTS `clinic`;
CREATE TABLE IF NOT EXISTS `clinic` (
  `name` varchar(500) NOT NULL,
  `contact_number` int(20) DEFAULT NULL,
  `address_city` varchar(300) DEFAULT NULL,
  `address_street_name` varchar(300) DEFAULT NULL,
  `address_building_number` varchar(300) DEFAULT NULL,
  `company_name` varchar(500) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `secretary_national_number` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `contact_number` (`contact_number`),
  KEY `secretary_national_number` (`secretary_national_number`),
  KEY `doctor_id` (`doctor_id`),
  KEY `company_name` (`company_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`name`, `contact_number`, `address_city`, `address_street_name`, `address_building_number`, `company_name`, `doctor_id`, `secretary_national_number`) VALUES
('Dr. Abdel Hadi Al-Aqrabwai Clinic One', 54641651, 'Amman', 'Makkah Street', '8', 'Eadat_AL-Aqsa', 1, 202165465),
('Dr. Abdel Hadi Al-Aqrabwai Clinic Two', 67851364, 'Zarqa', '26 Street', '21', 'Eadat_AL-Aqsa', 1, 202165465),
('Dr. Bahaa Abdallat Clinic One', 54984123, 'Amman', 'King The Second Abdullah', '1', 'Eadat_AL-Aqsa', 4, 985598952),
('Dr. Bahaa Abdallat Clinic Two', 62084172, 'zarqa', 'Algaish', '15', 'Eadat_Al-Aqsa', 4, 985598952),
('Dr. Khaled Al-Rasheed Clinic', 47252504, 'Irbid', 'Alqadseah', '5', 'Eadat_Al-Aqsa', 2, 204984655),
('Dr. Mahmoud Odeh Clinic', 51651323, 'Amman', 'Alordon', '23', 'Eadat_Al-Aqsa', 5, 584562055),
('Dr. Mohammad Al-Khaldi Clinic One', 52453545, 'Amman', 'Alshaab', '11', 'Eadat_Al-Aqsa', 3, 256461248),
('Dr. Mohammad Al-Khaldi Clinic Two', 34654132, 'Al-Balqaa', '60 Street', '18', 'Eadat_Al-Aqsa', 3, 204984655);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `name` varchar(250) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` int(10) DEFAULT NULL,
  `address_city` varchar(150) NOT NULL,
  `address_building_number` int(10) NOT NULL,
  `address_street_name` varchar(250) NOT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`name`, `email`, `phone`, `address_city`, `address_building_number`, `address_street_name`) VALUES
('Eadat_AL-Aqsa', 'al-aqsa@gmail.com', 5484615, 'Amman', 4, 'Almadenah_street');

-- --------------------------------------------------------

--
-- Table structure for table `company_office`
--

DROP TABLE IF EXISTS `company_office`;
CREATE TABLE IF NOT EXISTS `company_office` (
  `company_name` varchar(250) NOT NULL,
  `office` varchar(100) NOT NULL,
  PRIMARY KEY (`company_name`,`office`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_office`
--

INSERT INTO `company_office` (`company_name`, `office`) VALUES
('Eadat_Al-Aqsa', 'F1'),
('Eadat_Al-Aqsa', 'F10'),
('Eadat_Al-Aqsa', 'F11'),
('Eadat_Al-Aqsa', 'F2'),
('Eadat_Al-Aqsa', 'F3'),
('Eadat_Al-Aqsa', 'F4'),
('Eadat_Al-Aqsa', 'F5'),
('Eadat_Al-Aqsa', 'F6'),
('Eadat_Al-Aqsa', 'F7'),
('Eadat_Al-Aqsa', 'F8'),
('Eadat_Al-Aqsa', 'F9');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `area_of_specialization` varchar(500) DEFAULT NULL,
  `communication_phone` int(20) DEFAULT NULL,
  `address_city` varchar(300) DEFAULT NULL,
  `address_street_name` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `first_name`, `last_name`, `area_of_specialization`, `communication_phone`, `address_city`, `address_street_name`) VALUES
(1, 'Abdel Hadi', 'Al-Aqrabawi', 'Jaw and dental surgery', 5654161, 'Zarqa', 'Al-Karameh'),
(2, 'Khaled', 'Al-Rasheed', 'Jaw and dental surgery', 4848962, 'Irbid', 'Al-Thaqafeh'),
(3, 'Mohammad', 'Al-Khaldi', 'Pediatric dentistry and orthodontics', 79546132, 'Amman', 'Wasfi Altal'),
(4, 'Bahaa', 'Abdallat', 'Pediatric dentistry and orthodontics', 78543059, 'Zarqa', '36 street'),
(5, 'Mahmoud', 'Odeh', 'Jaw and dental surgery', 77554354, 'Amman', 'Al-Rainbow');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_patient`
--

DROP TABLE IF EXISTS `doctor_patient`;
CREATE TABLE IF NOT EXISTS `doctor_patient` (
  `patient_national_number` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  PRIMARY KEY (`patient_national_number`,`doctor_id`),
  KEY `doctor_id_FK1` (`doctor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_patient`
--

INSERT INTO `doctor_patient` (`patient_national_number`, `doctor_id`) VALUES
(4945882, 1),
(1951635, 2),
(2005661, 2),
(1561785, 3),
(2044979, 4),
(1616586, 5);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

DROP TABLE IF EXISTS `medicine`;
CREATE TABLE IF NOT EXISTS `medicine` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `name`) VALUES
(1, 'Panda'),
(2, 'Lincodar'),
(3, 'B12 vitamin'),
(4, 'Analarg'),
(5, 'Cromadol'),
(6, 'Cetamol'),
(7, 'Cetamol'),
(8, 'Panadol'),
(9, 'Lincodar'),
(10, 'Scensazol'),
(11, 'Scensazol'),
(12, 'Adol'),
(13, 'Adol'),
(14, 'Spirazol'),
(15, 'Rapidus'),
(16, 'Lincodar'),
(17, 'B12 vitamin');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `national_number` int(11) NOT NULL,
  `date_of_birth` varchar(500) DEFAULT NULL,
  `first_name` varchar(600) DEFAULT NULL,
  `second_name` varchar(600) DEFAULT NULL,
  `last_name` varchar(600) DEFAULT NULL,
  PRIMARY KEY (`national_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`national_number`, `date_of_birth`, `first_name`, `second_name`, `last_name`) VALUES
(1561785, '20/3/1987', 'lena', 'mohammad', 'al-khateeb'),
(1616586, '25/8/2000', 'dareen', 'ahmad', 'hammad'),
(1951635, '17/5/1999', 'ali', 'mohammad', 'al-omari'),
(2005661, '5/1/1966', 'khaled', 'esam', 'al-rosan'),
(2044979, '17/5/2001', 'ali', 'hussien', 'ghazal'),
(4945882, '4/12/1974', 'ahmad', 'mahmoud', 'al-najjar');

-- --------------------------------------------------------

--
-- Table structure for table `patient_clinic`
--

DROP TABLE IF EXISTS `patient_clinic`;
CREATE TABLE IF NOT EXISTS `patient_clinic` (
  `clinic_name` varchar(500) NOT NULL,
  `patient_national_number` int(11) NOT NULL,
  PRIMARY KEY (`clinic_name`,`patient_national_number`),
  KEY `patient_national_number_FK3` (`patient_national_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_clinic`
--

INSERT INTO `patient_clinic` (`clinic_name`, `patient_national_number`) VALUES
('Dr. Mohammad Al-Khaldi Clinic One', 1561785),
('Dr. Mahmoud Odeh Clinic', 1616586),
('Dr. Abdel Hadi Al-Aqrabawi Clinic Two', 1951635),
('Dr. Bahaa Abdallat Clinic Two', 1951635),
('Dr. Khaled Al-Rasheed Clinic', 2005661),
('Dr. Mohammad Al-Khaldi Clinic Two', 2005661),
('Dr. Bahaa Abdallat Clinic One', 2044979),
('Dr. Abdel Hadi Al-Aqrabawi Clinic One', 4945882);

-- --------------------------------------------------------

--
-- Stand-in structure for view `patient_clinic_information`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `patient_clinic_information`;
CREATE TABLE IF NOT EXISTS `patient_clinic_information` (
`clinic_name` varchar(500)
,`patient_national_number` int(11)
,`address_city` varchar(300)
,`address_street_name` varchar(300)
,`address_building_number` varchar(300)
);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

DROP TABLE IF EXISTS `prescription`;
CREATE TABLE IF NOT EXISTS `prescription` (
  `id` int(11) NOT NULL,
  `amount_of_medicine` varchar(250) DEFAULT NULL,
  `diagnoses` varchar(400) DEFAULT NULL,
  `patient_national_number` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doctor_id` (`doctor_id`),
  KEY `patient_national_number` (`patient_national_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `amount_of_medicine`, `diagnoses`, `patient_national_number`, `doctor_id`) VALUES
(1, '30 tablets', 'Inflammation', 1561785, 3),
(2, '20 capsules', 'Inflammation', 1561785, 3),
(3, '15 needles', 'Vitamin B12 deficiency', 1616586, 5),
(4, '30 tablets', 'Take off a tooth', 1616586, 5),
(5, '15 tablets', 'Inflammation', 1616586, 5),
(6, '16 tablets', 'Tooth decay', 1616586, 5),
(7, '30 tablets', 'Tooth decay', 1951635, 2),
(8, '20 tablets', 'Inflammation', 1951635, 2),
(9, '16 capsules', 'Inflammation', 1951635, 2),
(10, '20 capsules', 'Gum ulceration', 1951635, 2),
(11, '16 capsules', 'Gum ulceration', 2005661, 2),
(12, 'one box', 'Gum pain', 2005661, 2),
(13, '30 tablets', 'Gum and head pain', 2044979, 4),
(14, '25 tablets of Spirazol', 'Gum ulceration', 2044979, 4),
(15, '25 tablets', 'Inflammation', 4945882, 1),
(16, '20 capsules', 'Tooth decay', 4945882, 1),
(17, '15 needles', 'Vitamin B12 deficiency', 4945882, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prescription_medicine`
--

DROP TABLE IF EXISTS `prescription_medicine`;
CREATE TABLE IF NOT EXISTS `prescription_medicine` (
  `prescription_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `amount_of_dose` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`prescription_id`,`medicine_id`),
  KEY `medicine_id_FK1` (`medicine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription_medicine`
--

INSERT INTO `prescription_medicine` (`prescription_id`, `medicine_id`, `amount_of_dose`) VALUES
(1, 1, 'one tablets after eating, three times by day'),
(2, 2, 'two capsules after eating, three times by day'),
(3, 3, 'one needle everyday'),
(4, 4, 'one tablet before eating, three times by day'),
(5, 5, 'one tablet after eating, two times by day'),
(6, 6, 'one tablet after eating, if necessary'),
(7, 7, 'one tablet after eating, if necessary'),
(8, 8, 'one tablet after eating, if necessary'),
(9, 9, 'two capsules after eating, three times by day'),
(10, 10, 'one capsule before eating, once by day'),
(11, 11, 'one capsule before eating, once by day'),
(12, 12, '30mm, three times by day'),
(13, 13, '30mm, Adol'),
(14, 14, 'one tablet before eating, three times by day'),
(15, 15, 'one tablet before eating, two times by day'),
(16, 16, 'two capsules after eating, three times by day'),
(17, 17, 'one needle everyday');

-- --------------------------------------------------------

--
-- Table structure for table `secretary`
--

DROP TABLE IF EXISTS `secretary`;
CREATE TABLE IF NOT EXISTS `secretary` (
  `national_number` int(11) NOT NULL,
  `experience` varchar(200) DEFAULT NULL,
  `academic_specialization` varchar(600) DEFAULT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`national_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `secretary`
--

INSERT INTO `secretary` (`national_number`, `experience`, `academic_specialization`, `first_name`, `last_name`) VALUES
(202165465, 'Three years', 'Buisness Administration', 'Ali', 'Khualdeh'),
(204984655, 'One year', 'Mechanical Engineering', 'Lara', 'AbuLawi'),
(256461248, 'None', 'Marketing', 'Hazem', 'Rashaideh'),
(584562055, 'Three years', 'Medical Records', 'Aysheh', 'Samara'),
(985598952, 'Five years', 'Computer Science', 'Lama', 'Hmaidat');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL,
  `type_of_work` varchar(200) NOT NULL,
  `email` varchar(300) DEFAULT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `company_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `company_staff_fk1` (`company_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `type_of_work`, `email`, `first_name`, `last_name`, `company_name`) VALUES
(1, 'developer', 'alialqasi@gmail.com', 'ali', 'al-qasi', 'Eadat_Al-Aqsa'),
(2, 'developer', 'mohammadelayyan@gmail.com', 'mohammad', 'elayyan', 'Eadat_Al-Aqsa'),
(3, 'security', 'khaledkhateeb@gmail.com', 'khaled', 'khateeb', 'Eadat_Al-Aqsa'),
(4, 'IT support', 'moathabdallat@gmail.com', 'moath', 'abdallat', 'Eadat_Al-Aqsa'),
(5, 'team leader', 'ahmadalomari@gmail.com', 'ahmad', 'al-omari', 'Eadat_Al-Aqsa'),
(6, 'secretary', 'shahedalzoubi@gmail.com', 'shahed', 'al-zoubi', 'Eadat_Al-Aqsa'),
(7, 'personnel affairs', 'malakalrosan@gmail.com', 'malak', 'al-rosan', 'Eadat_Al-Aqsa'),
(8, 'accountant', 'lailahazem@gmail.com', 'laila', 'hazem', 'Eadat_Al-Aqsa');

-- --------------------------------------------------------

--
-- Table structure for table `staff_phone`
--

DROP TABLE IF EXISTS `staff_phone`;
CREATE TABLE IF NOT EXISTS `staff_phone` (
  `staff_id` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  PRIMARY KEY (`staff_id`,`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_phone`
--

INSERT INTO `staff_phone` (`staff_id`, `phone`) VALUES
(1, 77551515),
(1, 78545111),
(1, 79551561),
(2, 77156161),
(2, 79884123),
(3, 78157812),
(4, 79141616),
(4, 79516516),
(5, 511318),
(5, 77113184),
(6, 77651654),
(6, 78412335),
(7, 79465116),
(8, 78400410);

-- --------------------------------------------------------

--
-- Structure for view `patient_clinic_information`
--
DROP TABLE IF EXISTS `patient_clinic_information`;

DROP VIEW IF EXISTS `patient_clinic_information`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `patient_clinic_information`  AS  select `patient_clinic`.`clinic_name` AS `clinic_name`,`patient_clinic`.`patient_national_number` AS `patient_national_number`,`clinic`.`address_city` AS `address_city`,`clinic`.`address_street_name` AS `address_street_name`,`clinic`.`address_building_number` AS `address_building_number` from (`patient_clinic` join `clinic` on((`patient_clinic`.`clinic_name` = `clinic`.`name`))) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`patient_national_number`) REFERENCES `patient` (`national_number`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`secretary_national_number`) REFERENCES `secretary` (`national_number`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `clinic`
--
ALTER TABLE `clinic`
  ADD CONSTRAINT `clinic_ibfk_1` FOREIGN KEY (`secretary_national_number`) REFERENCES `secretary` (`national_number`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `clinic_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `clinic_ibfk_3` FOREIGN KEY (`company_name`) REFERENCES `company` (`name`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `company_office`
--
ALTER TABLE `company_office`
  ADD CONSTRAINT `company_name_FK1` FOREIGN KEY (`company_name`) REFERENCES `company` (`name`);

--
-- Constraints for table `doctor_patient`
--
ALTER TABLE `doctor_patient`
  ADD CONSTRAINT `doctor_id_FK1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`),
  ADD CONSTRAINT `patient_national_number_FK2` FOREIGN KEY (`patient_national_number`) REFERENCES `patient` (`national_number`);

--
-- Constraints for table `patient_clinic`
--
ALTER TABLE `patient_clinic`
  ADD CONSTRAINT `patient_national_number_FK3` FOREIGN KEY (`patient_national_number`) REFERENCES `patient` (`national_number`);

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `prescription_ibfk_2` FOREIGN KEY (`patient_national_number`) REFERENCES `patient` (`national_number`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `prescription_medicine`
--
ALTER TABLE `prescription_medicine`
  ADD CONSTRAINT `medicine_id_FK1` FOREIGN KEY (`medicine_id`) REFERENCES `medicine` (`id`),
  ADD CONSTRAINT `prescription_id_FK1` FOREIGN KEY (`prescription_id`) REFERENCES `prescription` (`id`);

--
-- Constraints for table `staff_phone`
--
ALTER TABLE `staff_phone`
  ADD CONSTRAINT `staff_phone_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
