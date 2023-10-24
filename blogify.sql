-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 12:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogify`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_delete_record`
--

CREATE TABLE `add_delete_record` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bloglist`
--

CREATE TABLE `bloglist` (
  `rank` longtext NOT NULL DEFAULT '0',
  `Blog_id` int(255) NOT NULL,
  `UserId` varchar(100) NOT NULL,
  `heading` varchar(500) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `image-source` varchar(1000) NOT NULL,
  `likes` mediumtext NOT NULL,
  `dislikes` mediumtext NOT NULL,
  `Time` longtext NOT NULL,
  `isAllowed` tinyint(1) NOT NULL DEFAULT 1,
  `date` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bloglist`
--

INSERT INTO `bloglist` (`rank`, `Blog_id`, `UserId`, `heading`, `content`, `image-source`, `likes`, `dislikes`, `Time`, `isAllowed`, `date`) VALUES
('1667216547', 26, 'Subodh_123', 'NITK Surathkal convocation will now be held in October', 'Mangaluru: NITK Surathkal, which usually holds its annual convocation in the second week of November, has advanced it to October, for the convenience of fresh graduates. The idea was mooted by the director additional charge, and director of NIT Calicut, Prasad Krishna. This will help fresh graduates, those who are placed in various companies, and those candidates, who continue their higher studies in India and abroad, to receive their graduation certificates in person. This year, the 20th annual convocation of the institute was initially scheduled for September 24. However, it had to be postponed to October, as the chief guest , minister of education, was not available to attend it.\r\nRavindranath, registrar, NITK Surathkal, said that according to Krishna, the convocation in most of the NITs across the country is held either in August or September. It is done so that all fresh graduates who finish their course in July, can attend. However, NITK Surathkal did not adopt this due to heavy rain in the region, till the end of September. “The convocation involves a procession and other procedures. Therefore, it is not possible when it rains, and the convocation was fixed for the second week of November, for, for Dharmendra Pradhan the convenience of the graduating students. We are holding the convocation in October this year,’’ he said. Sources from NITK Surathkal informed that Krishna had mooted that the annual convocation from next year, will be held the day after the institution’s Foundation Day. The Foundation Day is on August 6. The decision to shift the convocation permanently to a particular date has to be taken at the NITK senate. “This is the plan of the current additional charge director. However, the convocation dates for next year may change, as a new director is likely to take over the institution in December or January,” a source added. 20th convocation on October 15 The 20th annual convocation of NITK Surathkal will be held\r\non October 15.', ' https://blog.iris.nitk.ac.in/wp-content/uploads/2020/08/convocation-module.png', '0', '0', '1667216547', 1, 'October 31, 2022, 5:12 pm'),
('1667216580', 27, 'Subodh_123', 'NITK crosses 10,000 research publications.', 'MANGALURU: The share of research publications by a higher education institute in academic journals play a key role in determining its eminence. The National Institute of Technology Surathkal has now indexed more than 10,000 publications in Scopus — largest abstract and citation database of peer-reviewed literature: scientific journals, books, and conference proceedings. This year, the faculty at the NITK have published 803 papers in Scopus and 337 papers in Web of Science (WoS) — a web portal that provides access to multiple citation databases. NITK has also taken significant steps to support faculty members in their endeavour to publish in highly rated journals, improving the research visibility of the institute. Giving details, Mallikarjun Angadi, a librarian at the institute, said the first paper of NITK Surathkal was published in Scopus as early as in 1968. “It took about 49 years to reach 5,000 publications in 2017. After that, it took only five years to hit 10,000 publications, which was achieved this October. Authors of the published research papers include both students and faculty of NITK Surathkal. This shows importance given to research activities at the campus,” said Angadi. During the last five years, 1,150 papers were published every year on an average. Angadi also pointed out that Scopus publications have shown that NITK Surathkal is on par with not just NITs but also IITs in the country.', 'https://www.ulektznews.com/wp-content/uploads/2021/01/NITK-1.png', '0', '0', '1667216580', 1, 'October 31, 2022, 5:13 pm'),
('1667216651', 28, 'subhajit_123 ', 'Placement of 2021-22 batch B.Tech students of NIT-K touches 91%', 'The highest pay package offered in the campus placement for students of the 2021-22 batch at National Institute of Technology – Karnataka (NIT-K), Surathkal was ₹45.03 lakh per annum.\r\n\r\nAs compared to this, the highest pay package (CTC) offered for the 2020-21 batch B.Tech students was ₹51.75 lakh per annum in the Electronics and Communication engineering stream, followed by ₹45.03 lakh in Computer Science and Information Technology engineering streams, according the Career Development Centre at the institute.\r\n\r\nThis year, companies have offered a maximum CTC of ₹45.03 lakh for students of Computer Science and Engineering, Electronics & Communication, and Information Technology streams. The minimum CTC offered so far stood at ₹4.75 lakh per annum in Electrical & Electronics stream.\r\n\r\n“Microsoft hired nine students offering a CTC of ₹45.03 lakh per annum,” a spokesperson of the institute said.\r\n\r\nWith the placement drive under way, the average CTC offered so far for B.Tech students is at ₹13.12 lakh per annum, and the median CTC is at ₹10.5 lakh per annum.\r\n\r\nThe disciplines offering high CTC are Electricals & Electronics (₹32.16 lakh per annum), Mechanical Engineering (₹31. 5 lakh), Metallurgical & Materials Engineering (₹31 lakh), Civil Engineering (₹25.33 lakh), Chemical Engineering (₹24 lakh) and Mining Engineering (₹20 lakh).\r\n\r\nThe total placement, including both undergraduate and post-graduate students, crossed 81% with the placement of B.Tech students alone touching 91% a week ago.\r\n\r\nThe placement of post-graduate students increased by 20% from 53% in 2020-21 to 78% in 2021-22 till a week ago.\r\n\r\nSome of the companies which hired students are Microsoft, DE Shaw, Uber, Arcesium, Amazon, Oracle, Google India, and public sector companies IOCL, BPCL,GAIL,BEL,BEML, CDOT, and CDAC.\r\n\r\nUdayakumar R Yaragatti, director of the institute, said: “I commend the students for living up to the expectations of our recruiters.', 'https://scontent.fixe2-1.fna.fbcdn.net/v/t39.30808-6/306318679_452050046944932_1466375501724441578_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=e3f864&_nc_ohc=8UVX8aPh4o8AX85scNn&_nc_ht=scontent.fixe2-1.fna&oh=00_AfB3zFhRGG1aJW41Gg7wToU1katIHOQ-plZP3B0VnOJ92g&oe=6363DE49', '0', '0', '1667216651', 1, 'October 31, 2022, 5:14 pm'),
('1667216669', 29, 'subhajit_123 ', 'GREETINGS FROM NITK VOLLEYBALL GIRLS TEAM !! ', 'The Institute volleyball team is excited to announce that the selection for Womens team will commence soon for students of all years and all programmes. Do register if you are interested and we hope to see you soon! .Ps. Open for Masters students as well.', ' https://images.unsplash.com/photo-1592656094267-764a45160876?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80', '0', '0', '1667216669', 1, 'October 31, 2022, 5:14 pm'),
('1667216742', 30, 'iambot_123 ', 'NITK secures 10th rank in NIRF 2022 .', 'National Institute of Technology-Karnataka (NITK) in Surathkal has achieved the tenth rank in the engineering category and 27th rank in the overall category in the National Institutional Ranking Framework (NIRF) 2022.\r\nNIRF Ranking 22 was released by Union Minister for Education Minister Dharmendra Pradhan on Friday. NITK Surathkal has retained 10th rank in the engineering category in NIRF 2022. In the overall category, NITK Surathkal has enhanced its ranking from...\r\nNITK Surathkal has retained 10th rank in the engineering category in NIRF 2022. In the overall category, NITK Surathkal has enhanced its ranking from 32nd in NIRF 2021 to 27th in NIRF 2022.\r\nThe ranking in HEIs is being adopted on the basis of teaching, learning and resources, research and professional practices, graduation outcomes, outreach and inclusivity, and peer perception.\r\nNITK Director Prof Udaykumar R Yaragatti congratulated members-BoG, deans, faculty members, staff, research scholars, alumni and students in NITK Surathkal.', 'https://www.nitk.ac.in/images/pictures/4172/content/NIRF_Rankinf_certificate.jpg', '0', '0', '1667216742', 1, 'October 31, 2022, 5:15 pm');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_otp_verify`
--

CREATE TABLE `forgot_otp_verify` (
  `email` varchar(500) NOT NULL,
  `verification_code` text NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forgot_otp_verify`
--

INSERT INTO `forgot_otp_verify` (`email`, `verification_code`, `email_verified_at`) VALUES
('iambotcoder@gmail.com', '125760', '2022-10-31 09:19:44');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `Name` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `email` varchar(500) NOT NULL,
  `UserId` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `verification_code` text NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `isAllowed` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`Name`, `Gender`, `DOB`, `email`, `UserId`, `password`, `verification_code`, `email_verified_at`, `isAllowed`) VALUES
('Iambot', 'M', '1999-11-25', 'iambotcoder@gmail.com', 'iambot_123', '$2y$10$DrkLGU/orphrDX.Y3bhSbuTSwi70L3tY2Xs8p1PAn3cKd0tMTEQEK', '200993', '2022-10-31 10:39:50', 1),
('Rana ', 'M', '2000-11-11', 'ranaonly4me@gmail.com', 'Rana_roy', '$2y$10$8lN1a3A/ufe.3V3GfY5rLeJDvgw4IjLWoYWOCa4pzzlMDvkG/dCtG', '973439', '2022-10-31 09:22:35', 1),
('subhajit', 'M', '1999-06-18', 'subhajitbb12@gmail.com', 'subhajit_123', '$2y$10$XDQ2Jkt8f2rJKYAN/e20YuSB2Ksi5AIuAhXwYVhPA/EADEVaziLyy', '168319', '2022-10-31 09:24:46', 1),
('Subodh', 'M', '2000-11-06', 'subodhsonawane099@gmail.com', 'subodh_123', '$2y$10$DL8HCVl/e2qkOYutqTThzOU7a0tQqlN4Y.hKClnsvdmINpcX4tVjC', '170026', '2022-10-28 13:03:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_opinion_on_blogs`
--

CREATE TABLE `user_opinion_on_blogs` (
  `userOpinionId` int(255) NOT NULL,
  `UserId` mediumtext NOT NULL,
  `BlogId` mediumtext NOT NULL,
  `Liked` int(255) NOT NULL DEFAULT 0,
  `Disliked` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_delete_record`
--
ALTER TABLE `add_delete_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bloglist`
--
ALTER TABLE `bloglist`
  ADD PRIMARY KEY (`Blog_id`);

--
-- Indexes for table `forgot_otp_verify`
--
ALTER TABLE `forgot_otp_verify`
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `user_opinion_on_blogs`
--
ALTER TABLE `user_opinion_on_blogs`
  ADD PRIMARY KEY (`userOpinionId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_delete_record`
--
ALTER TABLE `add_delete_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bloglist`
--
ALTER TABLE `bloglist`
  MODIFY `Blog_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_opinion_on_blogs`
--
ALTER TABLE `user_opinion_on_blogs`
  MODIFY `userOpinionId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
