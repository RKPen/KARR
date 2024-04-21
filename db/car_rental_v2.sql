-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 17, 2024 at 12:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car rental v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_lot`
--

CREATE TABLE `car_lot` (
  `Carlot_Num` int(11) NOT NULL,
  `Employee_num` int(11) NOT NULL,
  `Full_bool` binary(1) NOT NULL DEFAULT '0',
  `Location` varchar(45) NOT NULL,
  `Capacity` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_lot`
--

INSERT INTO `car_lot` (`Carlot_Num`, `Employee_num`, `Full_bool`, `Location`, `Capacity`) VALUES
(1, 12334, 0x30, 'Bliss', '20'),
(2, 12211, 0x30, 'Ras Beirut', '15'),
(3, 12876, 0x30, 'Mar Mkhayil', '22'),
(4, 12763, 0x30, 'Badaro', '19'),
(5, 12542, 0x30, 'Sassine', '20');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `Contract_num` int(11) NOT NULL,
  `Issue_date` date NOT NULL,
  `Date_of_return` date NOT NULL,
  `returned_date` date NOT NULL,
  `Commision` int(11) DEFAULT NULL,
  `Payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`Contract_num`, `Issue_date`, `Date_of_return`, `returned_date`, `Commision`, `Payment`) VALUES
(1, '2021-12-27', '2021-12-30', '2021-12-30', 24, 240),
(2, '2022-01-03', '2022-01-07', '2022-01-09', 75, 792),
(3, '2022-02-13', '2022-02-14', '2022-02-14', 150, 4000),
(4, '2022-01-21', '2022-01-25', '2022-01-25', 80, 796),
(5, '2021-12-29', '2022-01-05', '2022-01-05', 600, 11200),
(6, '2022-03-20', '2022-03-28', '2022-03-29', 100, 2450),
(7, '2022-04-18', '2022-04-20', '2022-04-20', 70, 800);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_num` int(11) NOT NULL,
  `Firstname` varchar(16) NOT NULL,
  `Lastname` varchar(16) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Age` int(11) NOT NULL,
  `Email` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Phonenumber` varchar(32) NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_num`, `Firstname`, `Lastname`, `Gender`, `Age`, `Email`, `Phonenumber`, `Password`) VALUES
(1, 'Karim', 'Maamari', 'Male', 23, 'karimmaamariefd@gmail.com', '', '$2y$10$0DApUe/K7VWkvMZvABnj1eM7O'),
(58126, 'John ', 'Doe ', 'Male', 25, 'John@doe.com', '70-867-324', '$2y$10$HxLYUjJDEICrLfW3p8zUTOS38'),
(58127, 'Anais', 'Flores', 'Female', 25, 'anais@flores.com', '71-246-435', '$2y$10$Wr6M4mPiyuIkQ2HjwmwhYOC5z'),
(58128, 'Johnny', 'Depp', 'Male', 39, 'JohnnyD@gmail.com', '70-234-234', '$2y$10$FZS28dg6WQIsv4YIhbm.bOzcy'),
(58129, 'Roy ', 'Yammine', 'Male', 29, 'roy@gmail.com', '7777777', '$2y$10$kQOUVdvFP377sGM21b6/T.6wJ'),
(58130, 'Nabil', 'Xhaka', 'Male', 27, 'Nabil.X@gmail.com', '78947332', '$2y$10$JnaoFCxeoJTmwLWgP3BgsONb7'),
(58131, 'Mohamed', 'Mdimagh', 'Male', 23, 'mdimagh@hotmail.com', '78543543', '$2y$10$aoJyhBiiiz5BZoUCeslBYu1bs'),
(58132, 'Ian', 'Leduc', 'Male', 18, 'ian@hotmail.com', '7958352', '$2y$10$aTyubiBG0NQlMBnoYczCouvI2'),
(58133, 'Lamine', 'Kane', 'Male', 23, 'Lamine@gmail.com', '7489275', '$2y$10$cR3rehcRO7jTkPUSEbVQJOPV0'),
(58134, 'Michel', 'Sakr', 'Male', 21, 'micho@mail.com', '79458456', '$2y$10$AOwYxnGUPYui/8Sf32wkXeAVO'),
(58135, 'lili', 'Sakr', 'Male', 21, 'lol@mail.com', '79458456', '$2y$10$zc0A09ayZ6DngJggCpcHceKv1'),
(58136, 'Gabriel', 'Santos', 'Male', 33, 'Gbsantos@hotmail.com', '7385935', '$2y$10$//4mZBD6JJ1.UxLmrVM4Duue4');

-- --------------------------------------------------------

--
-- Stand-in structure for view `customerview`
-- (See below for the actual view)
--
CREATE TABLE `customerview` (
);

-- --------------------------------------------------------

--
-- Table structure for table `driver_license`
--

CREATE TABLE `driver_license` (
  `Customer_num` int(11) NOT NULL,
  `Issue_Date` date DEFAULT NULL,
  `Number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_num` int(11) NOT NULL,
  `Gender` varchar(15) NOT NULL,
  `Nationality` varchar(45) NOT NULL,
  `Postion` varchar(20) NOT NULL,
  `Full_Name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_num`, `Gender`, `Nationality`, `Postion`, `Full_Name`) VALUES
(10001, 'Female', 'Lebanese', 'CEO', 'Natalie Meyer'),
(11012, 'Male', 'Algerian', 'Manager', 'Ryan Cole'),
(11567, 'Male', 'Turkish', 'Manager', 'John Christensen'),
(11908, 'Female', 'Lebanese', 'Managers', 'Kathleen Scott'),
(12211, 'Male', 'Lebanese', 'Lot supervisor', 'Mohamad Itani'),
(12334, 'Female', 'Lebanese', 'Lot supervisor', 'Reem yateem'),
(12542, 'Male', 'Palestinian', 'Lot supervisor', 'Mohammed Assaf'),
(12763, 'Male', 'British', 'Lot supervisor', 'Tommy boy'),
(12876, 'Female', 'Lebanese', 'Lot supervisor', 'Britney Gomez'),
(13123, 'Male', 'Lebanese', 'Sale Clerk', 'Jill Williams'),
(13221, 'Male', 'Lebanese', 'Sale Clerk', 'Thomas Taylor'),
(13453, 'Male', 'Lebanese', 'Sale Clerk', 'Robin Peterson'),
(13456, 'Male', 'Lebanese', 'Sale Clerk', 'Thomas Frazier'),
(13671, 'Male', 'Lebanese', 'Sale Clerk', 'Jose Franklin'),
(13776, 'Male', 'Syrian', 'Sale Clerk', 'Justin Jones'),
(13909, 'Female', 'Lebanese', 'Sale Clerk', 'Angelica Kirby'),
(13987, 'Female', 'Syrian', 'Sale Clerk', 'Ariel Gray');

-- --------------------------------------------------------

--
-- Stand-in structure for view `employeeview`
-- (See below for the actual view)
--
CREATE TABLE `employeeview` (
`Employee_num` int(11)
,`Gender` varchar(15)
,`Nationality` varchar(45)
,`Postion` varchar(20)
,`Full_Name` varchar(45)
,`commision` int(11)
,`wage` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `Insurance_num` int(11) NOT NULL,
  `Type` varchar(20) DEFAULT NULL,
  `Company` varchar(20) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`Insurance_num`, `Type`, `Company`, `issue_date`, `price`) VALUES
(1, 'C', 'Swan Group', '2021-12-27', 50),
(2, 'B', 'Allianz SNA', '2022-01-21', 100),
(3, 'A', 'Fidelity', '2021-12-29', 600),
(4, 'B', 'Fidelity', '2022-01-03', 100),
(5, 'A', 'Allianz SNA', '2022-02-13', 400);

-- --------------------------------------------------------

--
-- Table structure for table `insured`
--

CREATE TABLE `insured` (
  `Insurance_num` int(11) NOT NULL,
  `Contract_num` int(11) NOT NULL,
  `Customer_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintence`
--

CREATE TABLE `maintence` (
  `Request_num` int(11) NOT NULL,
  `Plate_num` int(11) NOT NULL,
  `Defected_parts` varchar(45) NOT NULL,
  `issue_date` date NOT NULL,
  `Last_fixed` date NOT NULL,
  `Insurance_num` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintence`
--

INSERT INTO `maintence` (`Request_num`, `Plate_num`, `Defected_parts`, `issue_date`, `Last_fixed`, `Insurance_num`) VALUES
(1, 567821, 'Broken Bumper', '2022-01-09', '2021-11-05', 4),
(2, 819762, 'Oil change', '2022-02-02', '2021-12-09', NULL),
(3, 802996, 'Coolant refill', '2021-12-07', '2020-11-07', NULL),
(4, 344667, 'New Tires', '2022-03-06', '2021-04-08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `Contract_num` int(11) NOT NULL,
  `Plate_num` int(11) NOT NULL,
  `Customer_num` int(11) NOT NULL,
  `Employee_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `rentview`
-- (See below for the actual view)
--
CREATE TABLE `rentview` (
`Plate_num` int(11)
,`type` varchar(45)
,`brand` varchar(45)
,`model` varchar(45)
,`price` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `returnview`
-- (See below for the actual view)
--
CREATE TABLE `returnview` (
);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `Review_Id` int(11) NOT NULL,
  `Recomendation` varchar(140) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Feedback` varchar(140) DEFAULT NULL,
  `Customer_num` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `Employee_num` int(11) NOT NULL,
  `Commision` int(11) DEFAULT NULL,
  `Wage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`Employee_num`, `Commision`, `Wage`) VALUES
(10001, 0, 150000),
(11012, 0, 110000),
(11567, 0, 100000),
(11908, 0, 120000),
(12211, 0, 92000),
(12334, 0, 90000),
(12542, 0, 85000),
(12763, 0, 87000),
(12876, 0, 91000),
(13123, 1000, 45000),
(13221, 850, 45000),
(13453, 920, 40000),
(13456, 690, 44000),
(13671, 420, 45000),
(13776, 1800, 45000),
(13909, 200, 42000),
(13987, 0, 37000);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `Carlot_Num` int(11) NOT NULL,
  `Plate_num` int(11) NOT NULL,
  `lot_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`Carlot_Num`, `Plate_num`, `lot_num`) VALUES
(1, 12937, 1),
(1, 15576, 2),
(1, 123456, 3),
(1, 564531, 4),
(1, 627299, 5),
(1, 742833, 6),
(1, 987651, 7),
(2, 66910, 1),
(2, 344667, 2),
(2, 476766, 3),
(2, 663965, 4),
(3, 110621, 5),
(3, 397883, 6),
(3, 544405, 7),
(3, 802996, 8),
(4, 219057, 1),
(4, 416776, 2),
(4, 567821, 3),
(4, 819762, 4),
(5, 252904, 1),
(5, 473998, 2),
(5, 658513, 3),
(5, 845119, 4);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vehichleview`
-- (See below for the actual view)
--
CREATE TABLE `vehichleview` (
`Plate_Num` int(11)
,`Price` int(11)
,`Engine` varchar(45)
,`Color` varchar(20)
,`Gas_Type` varchar(15)
,`Milage` int(11)
,`Available` binary(1)
,`Brand` varchar(45)
,`Model` varchar(45)
,`Type` varchar(45)
,`Year` int(11)
,`Carlot_Num` int(11)
,`lot_num` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `Plate_Num` int(11) NOT NULL,
  `Image_Path` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL,
  `Color` varchar(20) NOT NULL,
  `Gas_Type` varchar(15) NOT NULL,
  `Milage` int(11) NOT NULL DEFAULT 0,
  `Brand` varchar(45) NOT NULL,
  `Model` varchar(45) NOT NULL,
  `Type` varchar(45) NOT NULL,
  `InStock`  int(11) NOT NULL,
  `Year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`Plate_Num`,`Image_Path`,`Price`, `Color`, `Gas_Type`, `Milage`, `Brand`, `Model`, `Type`,`InStock`,  `Year`) VALUES
(12937,'product-1-720x480.jpg',90,'White', 'Gasoline', 12679, 'Volkswagen', 'Passat', 'Sedan',3, 2022),
(110621,'product-2-720x480.jpg',150,  'Blue', 'Electric', 12560,  'Tesla', 'Model S', 'Sedan',2, 2018),
(219057,'product-3-720x480.jpg', 140, 'Grey', 'Gasoline', 79011,  'BMW ', 'X5', 'SUV',3,2018),
(252904,'product-4-720x480.jpg', 150, 'Silver', 'Gasoline', 20245,  'Mercedes', 'C300', 'Sedan',2,2022),
(344667, 'product-5-720x480.jpg',100, 'Red', 'Gasoline', 14678, 'Honda', 'CRV', 'SUV',4, 2020),
(416776,'product-6-720x480.jpg', 80,  'Red', 'Gasoline', 760,  'Kia', 'Rio', 'Hatchback',3, 2022),
(476766,'product-7-720x480.jpg', 170,  'Black', 'Gasoline', 7659,  'LandRover', ' Evoque', 'SUV',2, 2021),
(564531,'product-8-720x480.jpg', 300,  'Silver', 'Gasoline', 560, 'Porsche', '911', 'Supercar',1, 2019),
(567821, 'product-9-720x480.jpg',450,  'Black', 'Gasoline', 300,  'Rolls Royce', 'Cullinan', 'Luxury',2,2018);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BOOK_ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Brand` varchar(255) NOT NULL,
  `FromDate` date NOT NULL,
  `Duration` int(11) NOT NULL,
  `Phonenumber` bigint(20) NOT NULL,
  `ToDate` date NOT NULL,
  `Comment` varchar(255) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--



-- Stand-in structure for view `vehicle_in_carlot`
-- (See below for the actual view)
--
CREATE TABLE `vehicle_in_carlot` (
`Carlot_Num` int(11)
,`location` varchar(45)
,`lot_num` int(11)
,`plate_num` int(11)
,`brand` varchar(45)
,`model` varchar(45)
,`type` varchar(45)
);

-- --------------------------------------------------------

--
-- Structure for view `customerview`
--
DROP TABLE IF EXISTS `customerview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customerview`  AS SELECT `c`.`Customer_num` AS `Customer_num`, `c`.`Gender` AS `Gender`, `c`.`nationality` AS `nationality`, `c`.`Age` AS `Age`, `c`.`Full_name` AS `Full_name`, `d`.`Issue_Date` AS `Issue_Date`, `d`.`Number` AS `Number` FROM (`customer` `c` join `driver_license` `d` on(`c`.`Customer_num` = `d`.`Customer_num`)) ;

-- --------------------------------------------------------

--
-- Structure for view `employeeview`
--
DROP TABLE IF EXISTS `employeeview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employeeview`  AS SELECT `e`.`Employee_num` AS `Employee_num`, `e`.`Gender` AS `Gender`, `e`.`Nationality` AS `Nationality`, `e`.`Postion` AS `Postion`, `e`.`Full_Name` AS `Full_Name`, `s`.`Commision` AS `commision`, `s`.`Wage` AS `wage` FROM (`employee` `e` left join `salary` `s` on(`e`.`Employee_num` = `s`.`Employee_num`)) ;

-- --------------------------------------------------------

--
-- Structure for view `rentview`
--
DROP TABLE IF EXISTS `rentview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rentview`  AS SELECT `v`.`Plate_Num` AS `Plate_num`, `v`.`Type` AS `type`, `v`.`Brand` AS `brand`, `v`.`Model` AS `model`, `v`.`Price` AS `price` FROM `vehicle` AS `v` WHERE `v`.`Available` = 0 ;

-- --------------------------------------------------------

--
-- Structure for view `returnview`
--
DROP TABLE IF EXISTS `returnview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `returnview`  AS SELECT `r`.`Contract_num` AS `contract_num`, `cus`.`Full_name` AS `Full_name`, `r`.`Plate_num` AS `plate_num`, `c`.`Date_of_return` AS `Date_of_return` FROM ((`rent` `r` join `customer` `cus` on(`r`.`Customer_num` = `cus`.`Customer_num`)) join `contract` `c` on(`c`.`Contract_num` = `r`.`Contract_num`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vehichleview`
--
DROP TABLE IF EXISTS `vehichleview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vehichleview`  AS SELECT `v`.`Plate_Num` AS `Plate_Num`, `v`.`Price` AS `Price`, `v`.`Engine` AS `Engine`, `v`.`Color` AS `Color`, `v`.`Gas_Type` AS `Gas_Type`, `v`.`Milage` AS `Milage`, `v`.`Available` AS `Available`, `v`.`Brand` AS `Brand`, `v`.`Model` AS `Model`, `v`.`Type` AS `Type`, `v`.`Year` AS `Year`, `s`.`Carlot_Num` AS `Carlot_Num`, `s`.`lot_num` AS `lot_num` FROM (`vehicle` `v` left join `store` `s` on(`v`.`Plate_Num` = `s`.`Plate_num`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vehicle_in_carlot`
--
DROP TABLE IF EXISTS `vehicle_in_carlot`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vehicle_in_carlot`  AS SELECT `c`.`Carlot_Num` AS `Carlot_Num`, `c`.`Location` AS `location`, `s`.`lot_num` AS `lot_num`, `v`.`Plate_Num` AS `plate_num`, `v`.`Brand` AS `brand`, `v`.`Model` AS `model`, `v`.`Type` AS `type` FROM ((`car_lot` `c` left join `store` `s` on(`c`.`Carlot_Num` = `s`.`Carlot_Num`)) join `vehicle` `v` on(`s`.`Plate_num` = `v`.`Plate_Num`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_lot`
--
ALTER TABLE `car_lot`
  ADD PRIMARY KEY (`Carlot_Num`),
  ADD KEY `Employee_num` (`Employee_num`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`Contract_num`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_num`);

--
-- Indexes for table `driver_license`
--
ALTER TABLE `driver_license`
  ADD PRIMARY KEY (`Customer_num`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_num`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`Insurance_num`);

--
-- Indexes for table `insured`
--
ALTER TABLE `insured`
  ADD PRIMARY KEY (`Insurance_num`,`Contract_num`),
  ADD KEY `contracts_idx` (`Contract_num`),
  ADD KEY `cus_idx` (`Customer_num`);

--
-- Indexes for table `maintence`
--
ALTER TABLE `maintence`
  ADD PRIMARY KEY (`Request_num`),
  ADD KEY `Insurance_num` (`Insurance_num`),
  ADD KEY `Plate_num` (`Plate_num`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`Contract_num`,`Plate_num`,`Customer_num`,`Employee_num`),
  ADD KEY `Customer_num` (`Customer_num`),
  ADD KEY `Employee_num` (`Employee_num`),
  ADD KEY `Plate_num` (`Plate_num`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`Review_Id`),
  ADD KEY `Customer_num` (`Customer_num`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`Employee_num`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`Carlot_Num`,`Plate_num`),
  ADD KEY `Plate_num` (`Plate_num`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`Plate_Num`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BOOK_ID`),
  ADD KEY `Email` (`Email`);

--

-- AUTO_INCREMENT for dumped tables
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BOOK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58137;

--
-- Constraints for dumped tables
--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
    ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`Email`) REFERENCES `customer` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--


--
-- Constraints for table `car_lot`
--
ALTER TABLE `car_lot`
  ADD CONSTRAINT `car_lot_ibfk_1` FOREIGN KEY (`Employee_num`) REFERENCES `employee` (`Employee_num`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `driver_license`
--
ALTER TABLE `driver_license`
  ADD CONSTRAINT `driver_license_ibfk_1` FOREIGN KEY (`Customer_num`) REFERENCES `customer` (`Customer_num`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `insured`
--
ALTER TABLE `insured`
  ADD CONSTRAINT `insured_ibfk_1` FOREIGN KEY (`Contract_num`) REFERENCES `contract` (`Contract_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `insured_ibfk_2` FOREIGN KEY (`Customer_num`) REFERENCES `customer` (`Customer_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `insured_ibfk_3` FOREIGN KEY (`Insurance_num`) REFERENCES `insurance` (`Insurance_num`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maintence`
--
ALTER TABLE `maintence`
  ADD CONSTRAINT `maintence_ibfk_1` FOREIGN KEY (`Insurance_num`) REFERENCES `insurance` (`Insurance_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `maintence_ibfk_2` FOREIGN KEY (`Plate_num`) REFERENCES `veichle` (`Plate_Num`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rent`
--
ALTER TABLE `rent`
  ADD CONSTRAINT `rent_ibfk_1` FOREIGN KEY (`Contract_num`) REFERENCES `contract` (`Contract_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rent_ibfk_2` FOREIGN KEY (`Customer_num`) REFERENCES `customer` (`Customer_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rent_ibfk_3` FOREIGN KEY (`Employee_num`) REFERENCES `employee` (`Employee_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rent_ibfk_4` FOREIGN KEY (`Plate_num`) REFERENCES `veichle` (`Plate_Num`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`Customer_num`) REFERENCES `customer` (`Customer_num`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`Employee_num`) REFERENCES `employee` (`Employee_num`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `store_ibfk_1` FOREIGN KEY (`Carlot_Num`) REFERENCES `car_lot` (`Carlot_Num`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `store_ibfk_2` FOREIGN KEY (`Plate_num`) REFERENCES `veichle` (`Plate_Num`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;