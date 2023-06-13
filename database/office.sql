

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";




--
-- Database: `0ffice`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `name`, `password`) VALUES
('admin', 'admin', 'D033E22AE348AEB5660FC2140AEC35850C4DA997');

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `empid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`empid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `employee` (`empid`, `name`,`email`,`contact`, `password`,`date`) VALUES
('R01', 'RAM R','ram@gmail.com','9856412391','c06b087876f86211ebe585cb033bc02e51206ab8', '09-Feb-2022');
INSERT INTO `employee` (`empid`, `name`,`email`,`contact`, `password`,`date`) VALUES
('V02', 'Vignesh G','vignesh@gmail.com','6253492158','72a95cad8d9d9439db4eb7b7c3bfbe2544442d4f', '09-Feb-2022');
INSERT INTO `employee` (`empid`, `name`,`email`,`contact`, `password`,`date`) VALUES
('R03', 'Ramya s','ramya@gmail.com','6292813420','dbbc039ae25cce903105121d82da403fc4157c2c', '09-Feb-2022');
--
-- Table structure for table `complaints`
--

CREATE TABLE IF NOT EXISTS `complaints` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `empid` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `complaint` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`empid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
ALTER TABLE `complaints` ADD CONSTRAINT `update` FOREIGN KEY (`empid`) REFERENCES `employee`(`empid`) ON DELETE CASCADE ON UPDATE CASCADE;



--
-- Table structure for table `circular`
--

CREATE TABLE IF NOT EXISTS `circular` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE IF NOT EXISTS `meeting` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Table structure for table `recentop`
--

CREATE TABLE IF NOT EXISTS `recentop` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `empid` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`empid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

 

--
-- trigger1
--

CREATE TRIGGER `empinsert` AFTER INSERT ON `employee` FOR EACH ROW INSERT INTO recentop VALUES(null,NEW.empid,'Joined',NOW()); 

--
-- trigger2
--

CREATE TRIGGER `empdelete` AFTER DELETE ON `employee` FOR EACH ROW INSERT INTO recentop VALUES(null,OLD.empid,'Left',NOW()); 

--
-- trigger3
--

CREATE TRIGGER `empupdate` AFTER UPDATE ON `employee` FOR EACH ROW INSERT INTO recentop VALUES(null,NEW.empid,'Updated',NOW()); 

--
-- trigger4
--

CREATE TRIGGER `empcomplaint` AFTER INSERT ON `complaints` FOR EACH ROW INSERT INTO recentop VALUES(null,NEW.empid,'Complaint!',NOW()); 


