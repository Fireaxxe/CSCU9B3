
--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Code` int(11) NOT NULL auto_increment,
  `Title` varchar(30) NOT NULL,
  `DeptName` varchar(20) NOT NULL,
  PRIMARY KEY  (`Code`)
) ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Code`, `Title`, `DeptName`) VALUES
(1, 'Sums', 'Maths'),
(2, 'Calculus', 'Maths'),
(3, 'Databases', 'Computing'),
(4, 'Programming', 'Computing'),
(5, 'Fish', 'Biology'),
(6, 'Frogs', 'Biology'),
(7, 'Neutrons', 'Physics'),
(8, 'Light', 'Physics'),
(9, 'Explosions', 'Chemistry'),
(10, 'Drugs', 'Chemistry'),
(11, 'Brains', 'Psychology'),
(12, 'Perception', 'Psychology'),
(13, 'Hola!', 'Spanish'),
(14, 'Subjunctives', 'Spanish');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Name` varchar(20) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Faculty` varchar(20) NOT NULL
) ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Name`, `Phone`, `Faculty`) VALUES
('Maths', '3546345', 'Science'),
('Computing', '53214523', 'Science'),
('Physics', '5436543', 'Science'),
('Chemistry', '25463', 'Science'),
('Biology', '35434', 'Science'),
('Philosphy', '123', 'Humanities'),
('Spanish', '234', 'Humanities'),
('Psychology', '456', 'Humanities');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `Name` varchar(20) NOT NULL,
  `Description` varchar(100) NOT NULL
) ;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`Name`, `Description`) VALUES
('Science', 'Scientific Things'),
('Humanities', 'Human Things');
