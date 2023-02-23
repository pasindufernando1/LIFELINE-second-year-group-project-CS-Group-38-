-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2023 at 05:00 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lifeline_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `UserID` int(10) NOT NULL,
  `Fullname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`UserID`, `Fullname`) VALUES
(1, 'Hettiya Kandage Pasindu Sulakshana Fernando');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `AdvertisementID` int(10) NOT NULL,
  `PublishedDate` date NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Total_amount` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`AdvertisementID`, `PublishedDate`, `Description`, `Total_amount`) VALUES
(1, '2023-01-26', 'Cash donation ad for Colombo blood bank', 0),
(2, '2023-01-25', 'Inventory donation ad for Matara blood bank', NULL),
(3, '2023-02-09', 'Cash donation ad for Trincomalee blood bank', 5000000),
(4, '2023-02-09', 'Inventory donation ad for Galle blood bank', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `advertisementpic`
--

CREATE TABLE `advertisementpic` (
  `AdvertisementID` int(10) NOT NULL,
  `AdvertisementPic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `badge`
--

CREATE TABLE `badge` (
  `BadgeID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Donation_Constraint` int(2) NOT NULL,
  `BadgePic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `badge`
--

INSERT INTO `badge` (`BadgeID`, `Name`, `Donation_Constraint`, `BadgePic`) VALUES
(1, 'Bronze', 3, 'Bronze_Medal.png'),
(2, 'Silver', 5, 'Silver_Medal.png'),
(3, 'Gold', 10, 'Gold_Medal.png');

-- --------------------------------------------------------

--
-- Table structure for table `bank_blood_categories`
--

CREATE TABLE `bank_blood_categories` (
  `BloodBankID` int(10) NOT NULL,
  `TypeID` int(10) NOT NULL,
  `Quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_blood_categories`
--

INSERT INTO `bank_blood_categories` (`BloodBankID`, `TypeID`, `Quantity`) VALUES
(1, 1, 200),
(1, 2, 200),
(2, 1, 50),
(2, 2, 100),
(3, 3, 100),
(9, 3, 50),
(10, 3, 150),
(11, 3, 75),
(12, 3, 55),
(13, 2, 40),
(13, 3, 60);

-- --------------------------------------------------------

--
-- Table structure for table `bank_inventory_categories`
--

CREATE TABLE `bank_inventory_categories` (
  `BloodBankID` int(10) NOT NULL,
  `InventoryID` int(10) NOT NULL,
  `Quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_inventory_categories`
--

INSERT INTO `bank_inventory_categories` (`BloodBankID`, `InventoryID`, `Quantity`) VALUES
(1, 1, 100),
(1, 2, 1130),
(2, 1, 1900),
(2, 2, 50),
(3, 2, 500),
(3, 3, 50),
(3, 4, 200),
(9, 3, 100),
(10, 3, 130),
(11, 3, 65),
(12, 3, 200),
(13, 3, 100);

-- --------------------------------------------------------

--
-- Table structure for table `bloodbank`
--

CREATE TABLE `bloodbank` (
  `BloodBankID` int(10) NOT NULL,
  `BloodBank_Name` varchar(50) NOT NULL,
  `Number` varchar(10) NOT NULL,
  `LaneName` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `District` varchar(30) NOT NULL,
  `Province` varchar(30) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodbank`
--

INSERT INTO `bloodbank` (`BloodBankID`, `BloodBank_Name`, `Number`, `LaneName`, `City`, `District`, `Province`, `Email`) VALUES
(1, 'Southern Central Blood Bank', '5', 'First Street', 'Kamburupitiya', 'Matara', 'Southern', 'sou@gmail.com'),
(2, 'Jaffna Central Blood Bank', '10', 'Hospital Road', 'Jaffna North', 'Jaffna', 'Northern', 'jaf@gmail.com'),
(3, 'Colombo Base Blood Bank', '2', 'Main Road', 'Mardana', 'Colombo', 'Western', 'col@gmail.com'),
(4, 'Matara Blood Bank', '3', 'Main Street', 'Matara', 'Matara', 'Southern', 'mat@gmail.com'),
(5, 'Trincomalee Blood Bank', '1', 'Base road', 'Trincomalee', 'Trincomalee', 'Eastern', 'tri@gmail.com'),
(9, 'Rathmalana Blood Bank', '2/10', 'Last Street', 'Rathmalana', 'Colombo', 'Western', 'R@gmail.com'),
(10, 'Maradana Blood Bank', '4', 'Main street', 'Maradana', 'Colombo', 'Western', 'mar@gmail.com'),
(11, 'National Blood Transfusion Service', '4', 'Hospital road', 'Narahenpita', 'Colombo', 'Western', 'nbs@gmail.com'),
(12, 'Blood Cluster Hospital', '10', 'Main road', 'Colombo 7', 'Colombo', 'Western', 'bch@gmail.com'),
(13, 'Army blood reserves', '10', 'Main street', 'Colombo', 'Colombo', 'Western', 'army@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `bloodbankcontactnumber`
--

CREATE TABLE `bloodbankcontactnumber` (
  `BloodBankID` int(10) NOT NULL,
  `ContactNumber` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodbankcontactnumber`
--

INSERT INTO `bloodbankcontactnumber` (`BloodBankID`, `ContactNumber`) VALUES
(1, '0761356789'),
(2, '0984531278'),
(3, '0982317654'),
(4, '0412276543'),
(5, '0671234543'),
(9, '0114453878');

-- --------------------------------------------------------

--
-- Table structure for table `bloodcategory`
--

CREATE TABLE `bloodcategory` (
  `TypeID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Subtype` varchar(100) NOT NULL,
  `Expiry_constraint` int(5) NOT NULL,
  `Storing_temperature` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodcategory`
--

INSERT INTO `bloodcategory` (`TypeID`, `Name`, `Subtype`, `Expiry_constraint`, `Storing_temperature`) VALUES
(1, 'A+', 'RBC', 6, '8'),
(2, 'A+', 'WBC', 7, '-30'),
(3, 'A+', 'Platelet', 6, '-30'),
(4, 'A+', 'Plasma', 8, '-60'),
(13, 'A-', 'RBC', 7, '-30'),
(14, 'A-', 'WBC', 5, '5'),
(15, 'A-', 'Platelet', 10, '14'),
(16, 'A-', 'Plasma', 30, '-20'),
(17, 'B+', 'RBC', 7, '-30'),
(18, 'B+', 'WBC', 5, '5'),
(19, 'B+', 'Platelet', 10, '14'),
(20, 'B+', 'Plasma', 30, '-20'),
(21, 'B-', 'RBC', 7, '-30'),
(22, 'B-', 'WBC', 5, '5'),
(23, 'B-', 'Platelet', 10, '14'),
(24, 'B-', 'Plasma', 30, '-20'),
(25, 'AB+', 'RBC', 7, '-30'),
(26, 'AB+', 'WBC', 5, '5'),
(27, 'AB+', 'Platelet', 10, '14'),
(28, 'AB+', 'Plasma', 30, '-20'),
(29, 'AB-', 'RBC', 7, '-30'),
(30, 'AB-', 'WBC', 5, '5'),
(31, 'AB-', 'Platelet', 10, '14'),
(32, 'AB-', 'Plasma', 30, '-20'),
(33, 'O+', 'RBC', 7, '-30'),
(34, 'O+', 'WBC', 5, '5'),
(35, 'O+', 'Platelet', 10, '14'),
(36, 'O+', 'Plasma', 30, '-20'),
(37, 'O-', 'RBC', 7, '-30'),
(38, 'O-', 'WBC', 5, '5'),
(39, 'O-', 'Platelet', 10, '14'),
(40, 'O-', 'Plasma', 30, '-20');

-- --------------------------------------------------------

--
-- Table structure for table `bloodpacket`
--

CREATE TABLE `bloodpacket` (
  `PacketID` int(10) NOT NULL,
  `Sub_PacketID` varchar(10) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Status` int(1) NOT NULL,
  `TypeID` int(10) NOT NULL,
  `blood_bank_ID` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodpacket`
--

INSERT INTO `bloodpacket` (`PacketID`, `Sub_PacketID`, `Quantity`, `Status`, `TypeID`, `blood_bank_ID`) VALUES
(3, 'RBC', 350, 0, 1, 2),
(4, 'RBC', 200, 0, 1, 1),
(12, 'RBC', 350, 0, 1, 4),
(13, 'RBC', 450, 0, 1, 2),
(14, 'RBC', 345, 0, 1, 1),
(16, 'WBC', 350, 0, 2, 3),
(17, 'RBC', 450, 0, 1, 3),
(18, 'RBC', 400, 0, 1, 2),
(19, 'RBC', 450, 0, 1, 2),
(20, 'WBC', 8, 0, 2, 1),
(21, 'Platelet', 50, 0, 3, 10),
(22, 'WBC', 200, 0, 2, 3),
(23, 'Platelet', 50, 0, 3, 9),
(24, 'RBC', 150, 0, 1, 5),
(25, 'RBC', 10, 0, 1, 9),
(26, 'Platelet', 200, 0, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `campaign_timeslots`
--

CREATE TABLE `campaign_timeslots` (
  `CampaignID` int(10) NOT NULL,
  `SlotID` int(10) NOT NULL,
  `Availability` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cash_donation`
--

CREATE TABLE `cash_donation` (
  `DonationID` int(10) NOT NULL,
  `Amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `DonationID` int(10) NOT NULL,
  `Initialized_date` date NOT NULL,
  `DonationType` varchar(20) NOT NULL,
  `AdvertisementID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`DonationID`, `Initialized_date`, `DonationType`, `AdvertisementID`) VALUES
(1, '2023-01-04', 'Inventory', NULL),
(2, '2023-01-11', 'Inventory', NULL),
(3, '2023-01-13', 'Cash', NULL),
(4, '2023-01-11', 'Inventory', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donation_campaign`
--

CREATE TABLE `donation_campaign` (
  `CampaignID` int(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `BedQuantity` int(3) NOT NULL,
  `Date` date NOT NULL,
  `Starting_time` time NOT NULL,
  `Ending_time` time NOT NULL,
  `Number_of_donors` int(10) NOT NULL,
  `AdvertisementID` int(10) DEFAULT NULL,
  `OrganizationUserID` int(10) NOT NULL,
  `Status` int(1) NOT NULL,
  `BloodBankID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation_campaign`
--

INSERT INTO `donation_campaign` (`CampaignID`, `Name`, `Location`, `BedQuantity`, `Date`, `Starting_time`, `Ending_time`, `Number_of_donors`, `AdvertisementID`, `OrganizationUserID`, `Status`, `BloodBankID`) VALUES
(3, 'Donate blood Save Lives', 'No 12, Galle Rd, Matara', 25, '2023-05-31', '09:00:00', '15:00:00', 500, NULL, 4, 0, 3),
(4, 'Drops of hope', 'No 57/2, Gangodawila Rd, Delkanda', 50, '2023-05-31', '07:24:24', '21:24:24', 600, NULL, 4, 0, 3),
(5, 'Donate for life', 'No 23, First Street, Galle', 45, '2023-05-31', '09:00:00', '15:00:00', 400, NULL, 19, 1, 2),
(6, 'Lifestream', 'No 2, Rahula Rd, Matara', 50, '2023-05-31', '09:00:00', '15:00:00', 500, NULL, 4, 1, 1),
(7, 'BloodSource', 'No 56, high-level road, Nugegoda', 40, '2023-05-31', '09:00:00', '15:00:00', 600, NULL, 4, 1, 1),
(14, 'LifeBlood', 'No. 12, Meera rd, Matara', 200, '2023-05-31', '09:00:00', '15:00:00', 200, 1, 4, 1, 1),
(15, 'Danate Blood Share Lives', 'No. 12, Meera rd, Matara', 200, '2023-05-31', '09:00:00', '15:00:00', 200, 1, 4, 1, 3),
(16, 'Drops of Hope', 'No. 2, Meera rd, Galle', 400, '2023-05-31', '09:00:00', '15:00:00', 100, 1, 4, 1, 1),
(17, 'Manusath Derana', 'No. 1, Galle rd, Horana', 300, '2023-05-31', '09:00:00', '15:00:00', 200, 1, 4, 1, 3),
(18, 'Blood Dive May', 'No. 3, 2nd Lane, Gampaha', 250, '2023-05-31', '09:00:00', '15:00:00', 200, 1, 4, 1, 1),
(19, 'Save Lifes Give Blood', 'No. 7, Kalidasa Rd, Nugegoda', 100, '2023-05-31', '09:00:00', '15:00:00', 200, 1, 19, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `UserID` int(10) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `NIC` varchar(15) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `BloodType` varchar(5) NOT NULL,
  `Number` varchar(50) NOT NULL,
  `LaneName` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `District` varchar(30) NOT NULL,
  `Province` varchar(30) NOT NULL,
  `DonorCard_Img` varchar(255) NOT NULL,
  `SlotID` int(10) DEFAULT NULL,
  `CampaignID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`UserID`, `Fullname`, `NIC`, `DOB`, `Gender`, `BloodType`, `Number`, `LaneName`, `City`, `District`, `Province`, `DonorCard_Img`, `SlotID`, `CampaignID`) VALUES
(3, 'Sneha Dissanayake', '299988776655', '2000-08-13', 'Female', 'AB-', '6', 'Main road', 'Colombo 4', 'Colombo', 'Western', 'donor-card-tentative.png', NULL, NULL),
(7, 'Harini Jayawardana', '200078998877', '2000-07-14', 'Female', 'AB+', '3', 'Main road', 'Colombo 4', 'Colombo', 'Western', 'default_image', NULL, NULL),
(12, 'Ruwan Fernando', '200018103299', '1999-07-13', 'Male', 'B+', 'No 6', 'Moratuwa road', 'Moratuwa', 'Colombo', 'Western', 'default_image', NULL, NULL),
(13, 'Nimal Fernando', '200007878667', '2000-12-05', 'Male', 'B-', 'No 13/2', 'Moratupitiya road', 'Moratuwa', 'Colombo', 'Western', 'default_image', NULL, NULL),
(17, 'Sneha Dissanayake  ', '200090906677 ', '2000-02-09', 'Female', 'A+', 'No 3  ', 'Main road  ', 'Matara  ', 'Matara', 'Southern  ', 'default_image', NULL, NULL),
(18, 'Navindya Dissanayake', '199834212355', '1995-06-15', 'Female', 'A+', 'No13', 'Rubber Hena', 'Kamburupitiya', 'Ampara', 'Central', 'default_image', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donor_badges`
--

CREATE TABLE `donor_badges` (
  `DonorUserID` int(10) NOT NULL,
  `BadgeID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor_badges`
--

INSERT INTO `donor_badges` (`DonorUserID`, `BadgeID`) VALUES
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `donor_bloodbank_bloodpacket`
--

CREATE TABLE `donor_bloodbank_bloodpacket` (
  `DonorID` int(10) NOT NULL,
  `BloodBankID` int(10) NOT NULL,
  `PacketID` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Complication` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor_bloodbank_bloodpacket`
--

INSERT INTO `donor_bloodbank_bloodpacket` (`DonorID`, `BloodBankID`, `PacketID`, `Date`, `Complication`) VALUES
(3, 2, 4, '2022-01-13', NULL),
(3, 10, 3, '2022-02-07', NULL),
(13, 10, 19, '2022-05-06', NULL),
(17, 3, 17, '2022-03-16', NULL),
(17, 4, 21, '2022-03-17', NULL),
(17, 10, 13, '2023-02-01', NULL),
(18, 4, 18, '2022-04-17', NULL),
(18, 10, 21, '2022-06-06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donor_campaign_bloodpacket`
--

CREATE TABLE `donor_campaign_bloodpacket` (
  `DonorID` int(10) NOT NULL,
  `CampaignID` int(10) NOT NULL,
  `PacketID` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Complication` varchar(50) DEFAULT NULL,
  `Feedback` varchar(255) DEFAULT NULL,
  `Rating` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor_campaign_bloodpacket`
--

INSERT INTO `donor_campaign_bloodpacket` (`DonorID`, `CampaignID`, `PacketID`, `Date`, `Complication`, `Feedback`, `Rating`) VALUES
(3, 3, 17, '2022-07-06', NULL, NULL, NULL),
(3, 15, 13, '2023-02-14', NULL, NULL, NULL),
(3, 15, 16, '2022-09-06', NULL, NULL, NULL),
(3, 16, 12, '2023-01-13', NULL, NULL, NULL),
(7, 3, 25, '2022-10-06', NULL, NULL, NULL),
(7, 4, 14, '2022-12-17', NULL, NULL, NULL),
(7, 7, 13, '2023-12-30', NULL, NULL, NULL),
(12, 5, 3, '2023-02-01', 'None', 'Organizing is good.', 3),
(12, 5, 13, '2022-11-06', NULL, NULL, NULL),
(13, 3, 14, '2022-12-06', NULL, NULL, NULL),
(13, 6, 14, '2022-08-06', NULL, NULL, NULL),
(17, 4, 3, '2022-06-01', NULL, NULL, NULL),
(17, 7, 4, '2022-12-17', NULL, NULL, NULL),
(18, 5, 4, '2023-01-11', 'None', 'Campaign was good.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `hospital_blood_requests`
--

CREATE TABLE `hospital_blood_requests` (
  `RequestID` int(10) NOT NULL,
  `BloodBankID` int(10) NOT NULL,
  `HospitalID` int(10) NOT NULL,
  `Blood_group` varchar(20) NOT NULL,
  `Blood_component` varchar(20) NOT NULL,
  `Quantity` int(5) NOT NULL,
  `Date_requested` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_blood_requests`
--

INSERT INTO `hospital_blood_requests` (`RequestID`, `BloodBankID`, `HospitalID`, `Blood_group`, `Blood_component`, `Quantity`, `Date_requested`) VALUES
(8, 2, 5, 'A+', 'RBC', 100, '2023-01-27'),
(9, 1, 11, 'A+', 'RBC', 150, '2023-01-27'),
(10, 1, 11, 'A+', 'RBC', 50, '2023-01-26'),
(11, 2, 5, 'A+', 'RBC', 200, '2023-01-26'),
(12, 1, 11, 'B-', 'Plasma', 500, '2023-02-08'),
(13, 1, 11, 'B+', 'RBC', 7, '2023-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_medicalcenter`
--

CREATE TABLE `hospital_medicalcenter` (
  `UserID` int(10) NOT NULL,
  `Registration_no` varchar(15) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Number` varchar(50) NOT NULL,
  `LaneName` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `District` varchar(30) NOT NULL,
  `Province` varchar(30) NOT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_medicalcenter`
--

INSERT INTO `hospital_medicalcenter` (`UserID`, `Registration_no`, `Name`, `Number`, `LaneName`, `City`, `District`, `Province`, `Status`) VALUES
(5, 'PHSRC/PH/09', 'Asiri Hospitals', 'Asiri Hospitals', 'Cross Street', 'Colombo 4', 'Colombo', 'Western', 0),
(11, 'PHSRC/PH/01', 'Hemas med', 'Hemad med', '1st lane', 'Colombo 2', 'Colombo', 'Western', 0),
(14, 'PHSRC/PH/098', 'Nawaloka hospitals', 'Nawaloka hospitals', 'Main road', 'Colombo 7', 'Kalutara', 'Western', 0),
(15, 'PHSRC/PH/003', 'Medi Help', 'Medi Help', 'Main Street', 'Maradana', 'Colombo', 'Western', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `InventoryID` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`InventoryID`, `Name`, `Type`) VALUES
(1, 'Bed', 'Accomodation'),
(2, 'Syringe', 'Medical Appliance'),
(3, 'Pressure Machines', 'Medical Appliance'),
(4, '2 Pint container', 'Storage');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_donation`
--

CREATE TABLE `inventory_donation` (
  `DonationID` int(10) NOT NULL,
  `Inventory_category` varchar(50) NOT NULL,
  `Quantity` int(5) NOT NULL,
  `Accepted_date` date DEFAULT NULL,
  `Admin_verify` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_donation`
--

INSERT INTO `inventory_donation` (`DonationID`, `Inventory_category`, `Quantity`, `Accepted_date`, `Admin_verify`) VALUES
(1, 'Bed', 100, NULL, 0),
(2, 'Syringe', 500, NULL, 0),
(4, 'Syringe', 70, '2023-01-10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `organization_donations_bloodbank`
--

CREATE TABLE `organization_donations_bloodbank` (
  `DonationID` int(10) NOT NULL,
  `OrganizationUserID` int(10) NOT NULL,
  `BloodBankID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization_donations_bloodbank`
--

INSERT INTO `organization_donations_bloodbank` (`DonationID`, `OrganizationUserID`, `BloodBankID`) VALUES
(1, 4, 2),
(2, 4, 3),
(4, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `organization_society`
--

CREATE TABLE `organization_society` (
  `UserID` int(10) NOT NULL,
  `Registration_no` varchar(15) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Number` varchar(50) NOT NULL,
  `LaneName` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `District` varchar(30) NOT NULL,
  `Province` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization_society`
--

INSERT INTO `organization_society` (`UserID`, `Registration_no`, `Name`, `Number`, `LaneName`, `City`, `District`, `Province`) VALUES
(4, 'ORG002', 'leo', '67', '1st lane', 'peradeniya', 'Kandy', 'Central'),
(19, 'CSM301', 'CSM', 'Universirty od colombo', 'Reid Avenue', 'Thunmulla', 'Colombo', 'Western');

-- --------------------------------------------------------

--
-- Table structure for table `register_to_campaign`
--

CREATE TABLE `register_to_campaign` (
  `RegistrationID` int(10) NOT NULL,
  `DonorID` int(10) NOT NULL,
  `CampaignID` int(10) NOT NULL,
  `Emergency_contact_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register_to_campaign`
--

INSERT INTO `register_to_campaign` (`RegistrationID`, `DonorID`, `CampaignID`, `Emergency_contact_no`) VALUES
(32, 3, 3, '0702985632'),
(41, 17, 7, '0778899887');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `ReportID` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Date_Generated` date NOT NULL,
  `Requesting_entity` varchar(30) NOT NULL,
  `FileLink` varchar(255) NOT NULL,
  `AdminUserID` int(10) DEFAULT NULL,
  `SystemUserID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`ReportID`, `Name`, `Date_Generated`, `Requesting_entity`, `FileLink`, `AdminUserID`, `SystemUserID`) VALUES
(1, 'Blood Availability', '2023-01-17', 'Admin', '', 1, NULL),
(2, 'Productive Donation Areas', '2023-01-16', 'System User', '', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `system_user`
--

CREATE TABLE `system_user` (
  `UserID` int(10) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `NIC` varchar(15) NOT NULL,
  `BloodBankID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_user`
--

INSERT INTO `system_user` (`UserID`, `Fullname`, `NIC`, `BloodBankID`) VALUES
(2, 'Shinthujen Inpagaran', '200013500116', 1),
(6, 'Nadeesha Nethmini', '200089898980', 1);

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

CREATE TABLE `timeslot` (
  `SlotID` int(10) NOT NULL,
  `Start_time` time(6) NOT NULL,
  `End_time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Userpic` varchar(255) NOT NULL,
  `UserType` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Email`, `Password`, `Username`, `Userpic`, `UserType`) VALUES
(1, 'pasindusulakshana5@gmail.com', '$2y$10$WuWxJvZgKIPC8WzZ24A6hORAHhl8afSmJuu1tXGEh7Lxd63Yp3ju2', 'Pasindu', 'admindp.jpg', 'Admin'),
(2, 'shinthujeni@gmail.com', '$2y$10$cTlISXjDil75qH8svg2ME.zzHeVGeIZ6Kt3WVZ3.4wAb/V9nBIE96', 'Shin', 'shinthujen.png', 'System User'),
(3, 'snehadissanayake@gmail.com', '$2y$10$4DfKKVcxOH/muqmho06b.eX5CoyKqC/6IS0CO2HdQ9Z.4gf/STpJW', 'sneha', 'default-path', 'Donor'),
(4, 'leo@gmail.com', '$2y$10$gT1jl7GPfHuG2.t5t759HupF2amWSkls0pCzApx/pZ54sUE6ysXqa', 'leo', 'default-path', 'Organization/Society'),
(5, 'asiri@gmail.com', '$2y$10$3kI31nsfGNgCxQxmsdA3W.ec0EY5WYpUnMGT7O2iivdN9eWuBLzaG', 'asiri hospitals', 'default-path', 'Hospital/Medical_Center'),
(6, 'nadee@gmail.com', '$2y$10$ZaSGf.h3IRM2jg5yeD7yg.sk7K6LwccpmlIyUbTtcxMLdUF2iQx8a', 'nadee', 'default-path', 'System User'),
(11, 'hemas@gmail.com', '$2y$10$1qWuO0zm2h2IoztTlAc1Q.hvWXGFtMrHjzgfCxIbvpYHWwikBuGZW', 'hemas med', 'default-path', 'Hospital/Medical_Center'),
(12, 'ruwan@gmail.com', '$2y$10$TsWyX53GIUeYhHL167AoEu9Vmp9eqyG5z/t4QHlrWNe23ReUfrRQu', 'Ruwan', 'default-path', 'Donor'),
(13, 'sumith@gmail.com', '$2y$10$en2V2DLBQyLqSwYKsg9ElOpY4/VVVh18n3QT7mTvibD5NJ5mRMOIy', 'sumith', 'default-path', 'Donor'),
(14, 'nawaloka@gmail.com', '$2y$10$UF0BjZUAJ2oAcTFakH30GeUQud39/PDSjf01wgxL44tizj72eF3IW', 'nawaloka hospitals', 'default-path', 'Hospital/Medical_Center'),
(17, 'snehadissanayaka56@gmail.com', '$2y$10$e2EPVjnpAlBflrw.I9Eh.O9rWP0tKatdj0v6le9U7.XWTsSXtdqQ6', 'Sneha  ', 'default-path', 'Donor'),
(18, 'navinya@gmail.com', '$2y$10$t7SR8l5D4Hg6vOBQokpF7e.qvPFF3pSPZPkgUwpUBgMjsMrt6xmGW', 'Angel', 'default-path', 'Donor'),
(19, 'csm@gmail.com', '$2y$10$sNg3DZdlYqoJ1KyAssOmHO5y3WTlvApF/06WNHdA9Dg9t9aSWQrXm', 'csmuoc', 'default-path', 'Organization/Society');

-- --------------------------------------------------------

--
-- Table structure for table `usercontactnumber`
--

CREATE TABLE `usercontactnumber` (
  `UserID` int(10) NOT NULL,
  `ContactNumber` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usercontactnumber`
--

INSERT INTO `usercontactnumber` (`UserID`, `ContactNumber`) VALUES
(1, '0772561213'),
(2, '0758519048'),
(3, '0778899568'),
(4, '0912234545'),
(5, '0112653344'),
(6, '0112657788'),
(7, '0778899889'),
(8, '0772561213'),
(9, '0778899665'),
(11, '0712233435'),
(12, '0774565332'),
(13, '0778844567'),
(14, '0701234567'),
(15, '0771746997'),
(16, '0771746997'),
(17, '0771746997  '),
(18, '0777357219'),
(19, '0112654477');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`AdvertisementID`);

--
-- Indexes for table `advertisementpic`
--
ALTER TABLE `advertisementpic`
  ADD PRIMARY KEY (`AdvertisementID`,`AdvertisementPic`);

--
-- Indexes for table `badge`
--
ALTER TABLE `badge`
  ADD PRIMARY KEY (`BadgeID`);

--
-- Indexes for table `bank_blood_categories`
--
ALTER TABLE `bank_blood_categories`
  ADD PRIMARY KEY (`BloodBankID`,`TypeID`),
  ADD KEY `category` (`TypeID`);

--
-- Indexes for table `bank_inventory_categories`
--
ALTER TABLE `bank_inventory_categories`
  ADD PRIMARY KEY (`BloodBankID`,`InventoryID`),
  ADD KEY `inventory` (`InventoryID`);

--
-- Indexes for table `bloodbank`
--
ALTER TABLE `bloodbank`
  ADD PRIMARY KEY (`BloodBankID`);

--
-- Indexes for table `bloodbankcontactnumber`
--
ALTER TABLE `bloodbankcontactnumber`
  ADD PRIMARY KEY (`BloodBankID`,`ContactNumber`);

--
-- Indexes for table `bloodcategory`
--
ALTER TABLE `bloodcategory`
  ADD PRIMARY KEY (`TypeID`);

--
-- Indexes for table `bloodpacket`
--
ALTER TABLE `bloodpacket`
  ADD PRIMARY KEY (`PacketID`,`Sub_PacketID`),
  ADD KEY `type` (`TypeID`),
  ADD KEY `fkbid` (`blood_bank_ID`);

--
-- Indexes for table `campaign_timeslots`
--
ALTER TABLE `campaign_timeslots`
  ADD PRIMARY KEY (`CampaignID`,`SlotID`),
  ADD KEY `slots` (`SlotID`);

--
-- Indexes for table `cash_donation`
--
ALTER TABLE `cash_donation`
  ADD PRIMARY KEY (`DonationID`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`DonationID`),
  ADD KEY `ads` (`AdvertisementID`);

--
-- Indexes for table `donation_campaign`
--
ALTER TABLE `donation_campaign`
  ADD PRIMARY KEY (`CampaignID`),
  ADD KEY `ad` (`AdvertisementID`),
  ADD KEY `organizer` (`OrganizationUserID`),
  ADD KEY `blood_bank_camp` (`BloodBankID`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `reservecampaign` (`CampaignID`),
  ADD KEY `Slotreserve` (`SlotID`);

--
-- Indexes for table `donor_badges`
--
ALTER TABLE `donor_badges`
  ADD PRIMARY KEY (`DonorUserID`,`BadgeID`),
  ADD KEY `badgerelated` (`BadgeID`);

--
-- Indexes for table `donor_bloodbank_bloodpacket`
--
ALTER TABLE `donor_bloodbank_bloodpacket`
  ADD PRIMARY KEY (`DonorID`,`BloodBankID`,`PacketID`),
  ADD KEY `bloodbankassoc` (`BloodBankID`),
  ADD KEY `packet` (`PacketID`);

--
-- Indexes for table `donor_campaign_bloodpacket`
--
ALTER TABLE `donor_campaign_bloodpacket`
  ADD PRIMARY KEY (`DonorID`,`CampaignID`,`PacketID`),
  ADD KEY `campaign` (`CampaignID`),
  ADD KEY `packetassoc` (`PacketID`);

--
-- Indexes for table `hospital_blood_requests`
--
ALTER TABLE `hospital_blood_requests`
  ADD PRIMARY KEY (`RequestID`),
  ADD KEY `bankrel` (`BloodBankID`),
  ADD KEY `hospitalrel` (`HospitalID`);

--
-- Indexes for table `hospital_medicalcenter`
--
ALTER TABLE `hospital_medicalcenter`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `unique` (`Registration_no`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`InventoryID`);

--
-- Indexes for table `inventory_donation`
--
ALTER TABLE `inventory_donation`
  ADD PRIMARY KEY (`DonationID`);

--
-- Indexes for table `organization_donations_bloodbank`
--
ALTER TABLE `organization_donations_bloodbank`
  ADD PRIMARY KEY (`DonationID`),
  ADD KEY `org/soc` (`OrganizationUserID`),
  ADD KEY `bankassoc` (`BloodBankID`);

--
-- Indexes for table `organization_society`
--
ALTER TABLE `organization_society`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `unique` (`Registration_no`);

--
-- Indexes for table `register_to_campaign`
--
ALTER TABLE `register_to_campaign`
  ADD PRIMARY KEY (`RegistrationID`),
  ADD KEY `linkdonor` (`DonorID`),
  ADD KEY `linkcampaign` (`CampaignID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`ReportID`),
  ADD KEY `createadmin` (`AdminUserID`),
  ADD KEY `createsystemuser` (`SystemUserID`);

--
-- Indexes for table `system_user`
--
ALTER TABLE `system_user`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `Related Bloodbank` (`BloodBankID`);

--
-- Indexes for table `timeslot`
--
ALTER TABLE `timeslot`
  ADD PRIMARY KEY (`SlotID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Unique` (`Email`);

--
-- Indexes for table `usercontactnumber`
--
ALTER TABLE `usercontactnumber`
  ADD PRIMARY KEY (`UserID`,`ContactNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `AdvertisementID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `badge`
--
ALTER TABLE `badge`
  MODIFY `BadgeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bloodbank`
--
ALTER TABLE `bloodbank`
  MODIFY `BloodBankID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bloodcategory`
--
ALTER TABLE `bloodcategory`
  MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `DonationID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donation_campaign`
--
ALTER TABLE `donation_campaign`
  MODIFY `CampaignID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `hospital_blood_requests`
--
ALTER TABLE `hospital_blood_requests`
  MODIFY `RequestID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `InventoryID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `register_to_campaign`
--
ALTER TABLE `register_to_campaign`
  MODIFY `RegistrationID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `ReportID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `timeslot`
--
ALTER TABLE `timeslot`
  MODIFY `SlotID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `adminuser` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `advertisementpic`
--
ALTER TABLE `advertisementpic`
  ADD CONSTRAINT `adassociated` FOREIGN KEY (`AdvertisementID`) REFERENCES `advertisement` (`AdvertisementID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bank_blood_categories`
--
ALTER TABLE `bank_blood_categories`
  ADD CONSTRAINT `bank` FOREIGN KEY (`BloodBankID`) REFERENCES `bloodbank` (`BloodBankID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category` FOREIGN KEY (`TypeID`) REFERENCES `bloodcategory` (`TypeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bank_inventory_categories`
--
ALTER TABLE `bank_inventory_categories`
  ADD CONSTRAINT `bloodbankassociated` FOREIGN KEY (`BloodBankID`) REFERENCES `bloodbank` (`BloodBankID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory` FOREIGN KEY (`InventoryID`) REFERENCES `inventory` (`InventoryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bloodbankcontactnumber`
--
ALTER TABLE `bloodbankcontactnumber`
  ADD CONSTRAINT `bankfk` FOREIGN KEY (`BloodBankID`) REFERENCES `bloodbank` (`BloodBankID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bloodpacket`
--
ALTER TABLE `bloodpacket`
  ADD CONSTRAINT `fkbid` FOREIGN KEY (`blood_bank_ID`) REFERENCES `bloodbank` (`BloodBankID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `type` FOREIGN KEY (`TypeID`) REFERENCES `bloodcategory` (`TypeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `campaign_timeslots`
--
ALTER TABLE `campaign_timeslots`
  ADD CONSTRAINT `camp` FOREIGN KEY (`CampaignID`) REFERENCES `donation_campaign` (`CampaignID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `slots` FOREIGN KEY (`SlotID`) REFERENCES `timeslot` (`SlotID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `cash_donation`
--
ALTER TABLE `cash_donation`
  ADD CONSTRAINT `donationnum` FOREIGN KEY (`DonationID`) REFERENCES `donation` (`DonationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `ads` FOREIGN KEY (`AdvertisementID`) REFERENCES `advertisement` (`AdvertisementID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `donation_campaign`
--
ALTER TABLE `donation_campaign`
  ADD CONSTRAINT `ad` FOREIGN KEY (`AdvertisementID`) REFERENCES `advertisement` (`AdvertisementID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `blood_bank_camp` FOREIGN KEY (`BloodBankID`) REFERENCES `bloodbank` (`BloodBankID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `organizer` FOREIGN KEY (`OrganizationUserID`) REFERENCES `organization_society` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donor`
--
ALTER TABLE `donor`
  ADD CONSTRAINT `Slotreserve` FOREIGN KEY (`SlotID`) REFERENCES `campaign_timeslots` (`SlotID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `UserIDlink` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservecampaign` FOREIGN KEY (`CampaignID`) REFERENCES `campaign_timeslots` (`CampaignID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `donor_badges`
--
ALTER TABLE `donor_badges`
  ADD CONSTRAINT `badgerelated` FOREIGN KEY (`BadgeID`) REFERENCES `badge` (`BadgeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donorrelated` FOREIGN KEY (`DonorUserID`) REFERENCES `donor` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donor_bloodbank_bloodpacket`
--
ALTER TABLE `donor_bloodbank_bloodpacket`
  ADD CONSTRAINT `bloodbankassoc` FOREIGN KEY (`BloodBankID`) REFERENCES `bloodbank` (`BloodBankID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donor` FOREIGN KEY (`DonorID`) REFERENCES `donor` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `packet` FOREIGN KEY (`PacketID`) REFERENCES `bloodpacket` (`PacketID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donor_campaign_bloodpacket`
--
ALTER TABLE `donor_campaign_bloodpacket`
  ADD CONSTRAINT `campaign` FOREIGN KEY (`CampaignID`) REFERENCES `donation_campaign` (`CampaignID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `donorassoc` FOREIGN KEY (`DonorID`) REFERENCES `donor` (`UserID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `packetassoc` FOREIGN KEY (`PacketID`) REFERENCES `bloodpacket` (`PacketID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `hospital_blood_requests`
--
ALTER TABLE `hospital_blood_requests`
  ADD CONSTRAINT `bankrel` FOREIGN KEY (`BloodBankID`) REFERENCES `bloodbank` (`BloodBankID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hospitalrel` FOREIGN KEY (`HospitalID`) REFERENCES `hospital_medicalcenter` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hospital_medicalcenter`
--
ALTER TABLE `hospital_medicalcenter`
  ADD CONSTRAINT `linkuserId` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory_donation`
--
ALTER TABLE `inventory_donation`
  ADD CONSTRAINT `donationnumber` FOREIGN KEY (`DonationID`) REFERENCES `donation` (`DonationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `organization_donations_bloodbank`
--
ALTER TABLE `organization_donations_bloodbank`
  ADD CONSTRAINT `bankassoc` FOREIGN KEY (`BloodBankID`) REFERENCES `bloodbank` (`BloodBankID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `donation` FOREIGN KEY (`DonationID`) REFERENCES `donation` (`DonationID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `org/soc` FOREIGN KEY (`OrganizationUserID`) REFERENCES `organization_society` (`UserID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `organization_society`
--
ALTER TABLE `organization_society`
  ADD CONSTRAINT `linkuser` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `register_to_campaign`
--
ALTER TABLE `register_to_campaign`
  ADD CONSTRAINT `linkcampaign` FOREIGN KEY (`CampaignID`) REFERENCES `donation_campaign` (`CampaignID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `linkdonor` FOREIGN KEY (`DonorID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `createadmin` FOREIGN KEY (`AdminUserID`) REFERENCES `admin` (`UserID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `createsystemuser` FOREIGN KEY (`SystemUserID`) REFERENCES `system_user` (`UserID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `system_user`
--
ALTER TABLE `system_user`
  ADD CONSTRAINT `Related Bloodbank` FOREIGN KEY (`BloodBankID`) REFERENCES `bloodbank` (`BloodBankID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `UserID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usercontactnumber`
--
ALTER TABLE `usercontactnumber`
  ADD CONSTRAINT `userfk` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
