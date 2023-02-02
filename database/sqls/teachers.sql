-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jan 03, 2023 at 03:56 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `example_app`
--

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `title`, `first_name`, `middle_name`, `last_name`, `description`, `designation`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
('IIT-001', 'Md.', 'Fazlul', 'Karim', 'Patwary', 'Md. Fazlul Karim Patwary obtained an M.Sc. degree from Hasselt, Belgium in Statistical Bioinformatics in 2012, He also received an M.Sc. degree in Statistics and MBA in Accounting and Information Systems from Jahangirnagar University, Savar, Dhaka, Bangladesh in 1992 and 2022 respectively Since 1999, he is a faculty member having current Designation \"Professor\" in the Institute of Information Technology of Jahangirnagar University, Savar, Dhaka, Bangladesh. ', 'professor', 1, NULL, NULL, '2023-01-03 21:26:36', NULL, NULL),
('IIT-002', 'Dr.', 'M.', 'Sarker', 'Sarker', 'Dr. M. Mesbahuddin Sarker ( ড. এম. মেসবাহউদ্দিন সরকার ) works as a Professor and Director at the Institute of Information Technology (IIT), Jahangirnagar University (JU).\r\n\r\nHe obtained B.Sc. and M.Sc. degrees from the Mathematics Department of Jahangirnagar University, Bangladesh. Also completed M.Sc. in Communication Systems from the department of Electrical Engineering and Information Technology, Technical University of Kaiserslautern, Germany. Ph.D. from Jahangirnagar University in the field of Electronic Voting (E-Voting) Information Systems.\r\n\r\nDr. Sarker regularly writes popular articles (columns) in the daily newspaper since 2005, in the area of IT and education.', 'professor', 1, NULL, NULL, '2023-01-03 21:26:36', NULL, NULL),
('IIT-003', 'Dr.', 'M.', 'Shamim', 'Kaiser', 'Dr. M  Shamim Kaiser is currently working as a Professor at the Institute of Information Technology of Jahangirnagar University, Savar, Dhaka-1342, Bangladesh. He received his Bachelor\'s and Master\'s degrees in Applied Physics Electronics and Communication Engineering from the University of Dhaka, Bangladesh in 2002 and 2004 respectively, and the Ph. D. degree in Telecommunication Engineering from the Asian Institute of Technology (AIT) Pathumthani, Thailand, in 2010. He worked as a postdoc fellow in the Big data and Cyber Security Lab of Anglia Ruskin University, UK from 2017-2018. He also worked as a Special Research Student at the Wireless Signal Processing and Networking Lab (Adachi Lab) of Tohoku University, Japan in 2008.  His current research interests include Data Analytics, Machine Learning, Wireless Network & Signal processing, Cognitive Radio networks, Big IoT data, Healthcare, Neuroinformatics, and Cyber Security. He has authored more than 150 papers in different peer-reviewed journals and conferences.\r\n\r\nHe is an Academic Editor of Plos One Journal; Associate Editor of the IEEE Access and Cognitive Computation Journal, Guest Editor of Brain Informatics Journal, IJACI (IGI Global), Electronics MDPI, Frontiers in Neuroinformatics, and Cognitive Computation Journal. Dr. Kaiser is a Life Member of Bangladesh Electronic Society; Bangladesh Physical Society and NOAMI. He is also a senior member of IEEE, USA, and IEICE, Japan, and an active volunteer of the IEEE Bangladesh Section. He is the founding Chapter Chair of the IEEE Bangladesh Section Computer Society Chapter. ', 'professor', 1, NULL, NULL, '2023-01-03 21:28:49', NULL, NULL),
('IIT-004', 'Dr.', 'Mohammad', 'Abu', 'Yousuf', 'Dr. Mohammad Abu Yousuf received the B.Sc.(Engineering) degree in Computer Science and Engineering from Shahjalal University of Science and Technology, Sylhet, Bangladesh in 1999, the Master of Engineering degree in Biomedical Engineering from Kyung Hee University, South Korea in 2009, and a Ph.D. degree in Science and Engineering from Saitama University, Japan in 2013. In 2003, he joined as a Lecturer in the Department of Computer Science and Engineering, Mawlana Bhashani Science and Technology University, Tangail, Bangladesh. In 2014, he moved to the Institute of Information Technology, Jahangirnagar University. He is now working as Professor at the Institute of Information Technology, Jahangirnagar University, Savar, Dhaka, Bangladesh. His research interests include Medical Image Processing, Human-Robot Interaction, and Computer Vision, Natural Language Processing.', 'professor', 1, NULL, NULL, '2023-01-03 21:28:49', NULL, NULL),
('IIT-005', 'Dr.', 'Risala', 'Tasin', 'Khan', 'Dr.Risala Tasin Khan is a Professor at the Institute of Information Technology at Jahangirnagar University, where she has been working since 2009. She completed her B.Sc. from Computer Science & Engineering Department of Jahangirnagar University in 2003, and an M.Sc. from the same department in 2005. She received her Ph.D. in Computer Science & Engineering from the Jahangirnagar University in 2019. Her Ph.D research work was on the performance evaluation of CRN over fading channel incorporating space diversity. From 2005 to 2009 she worked at CSE Department of Daffodil International University as a lecturer.\r\n\r\nHer research interests span both computer networking and wireless communication. Much of her work has been on improving the performance of cognitive radio networks, mainly through the perfect sensing of the presence of a secondary user in a particular sensing zone. She has also examined the impact of network performance on the arrival of traffic using different statistical models. Recently she has also started doing research on resource allocation of wireless networks using machine learning and the security aspect of IoT.\r\n\r\nDr. Risala Tasin Khan is the author of more than 22 papers on cognitive radio networks and supervised more than 70 students in different fields of wireless communication.  She is a senior member of IEEE and also acted as a counselor of IEEE WIE Affinity Group JU SB.', 'professor', 1, NULL, NULL, '2023-01-03 21:31:25', NULL, NULL),
('IIT-006', 'Dr.', 'Jesmin', NULL, 'Akhter', 'Dr. Jesmin Akhter has received Ph.D. degree in 2019 in the field of 4G wireless networks. from Department of Computer Science and Engineering of Jahangirnagar University, Savar, Dhaka, Bangladesh and obtained M.Sc Engineering degree in Computer Science and Engineering from Jahangirnagar University, Savar, Dhaka, Bangladesh in 2012. She also received her B.Sc. Engineering degree in Computer Science and Engineering from Jahangirnagar University, Savar, Dhaka, Bangladesh in 2004. Since 2008, she is a faculty member having current Designation \"Professor\" at the Institute of Information Technology at Jahangirnagar University, Savar, Dhaka, Bangladesh. Currently, her research focuses on IoT, network traffic, complexity and algorithms, and software engineering. Being a dynamic and versatile person who is capable of merging innovative ideas, technology, knowledge, and experience for a positive contribution towards the system development in the rapidly changing scenario of Information Technology and becoming a good teacher in the field of software and telecommunication systems.', 'professor', 1, NULL, NULL, '2023-01-03 21:31:25', NULL, NULL),
('IIT-007', NULL, 'K M', 'Akkas', 'Ali', 'Mr. K M Akkas Ali is a Professor at the Institute of Information Technology (IIT), Jahangirnagar University, Dhaka, Bangladesh. He served as the Director of IIT from June 2015 to June 2018. Mr. Akkas Ali has also served as the Associate Professor, Assistant Professor, and Lecturer at the same Institute. He has completed his Bachelor\'s and Master\'s degrees from the Department of Computer Science and Engineering of Jahangirnagar University, Bangladesh.\r\n\r\nBesides the teaching profession, he has also performed other activities like being the Assistant Proctor of JU, and House Tutor in residential Halls of the same university. At present Mr. K M Akkas Ali is serving as the Warden of Sheikh Hasina Hall (the largest hall) of Jahangirnagar University. \r\n\r\nBesides conducting classes, exams, etc at the IIT, he is also conducting IT-related classes at other departments/ universities in Bangladesh. Already he has published 16 articles and 5 books. ', 'professor', 1, NULL, NULL, '2023-01-03 21:33:40', NULL, NULL),
('IIT-008', NULL, 'Fahima', NULL, 'Tabassum', 'Fahima Tabassum completed her B.Sc. (Hons.)  from the Department of Computer Science and Engineering, Jahangirnagar University, Savar, Dhaka, Bangladesh in 2003 and her M.Sc from the same department in 2010. She is currently conducting her Ph.D. in the same department. She is also working as Associate Professor at the Institute of Information Technology, Jahangirnagar University', 'professor', 1, NULL, NULL, '2023-01-03 21:33:40', NULL, NULL),
('IIT-009', 'Dr.', 'Md', NULL, 'Whaiduzzaman', 'Dr. Md Whaiduzzaman completed his undergraduate degree in Electronics & Computer Science and  MSc in Telecommunication & Computer Network Engineering from London, UK. He also completed his Ph.D. degree from the University of Malaya, Malaysia. He is a professor at the Institute of Information Technology (IIT), Jahangirnagar University. Presently, he works as a Postdoctoral Research Fellow in an Australian Research Council (ARC) funded project at the Queensland University of Technology, Brisbane, Australia. His research interests are Mobile Cloud Computing, Vehicular cloud computing, Fog Computing, IoT, and Microservices. Recently, he received the Elsevier JNCA best paper award in Paris, France. He visited and presented his works in many countries including India, Nepal, Thailand, Malaysia, Singapore, Switzerland, Belgium, France, Germany, Australia, the UK, and the USA.', 'professor', 1, NULL, NULL, '2023-01-03 21:36:34', NULL, NULL),
('IIT-010', 'Dr.', 'Shamim', 'Al', 'Mamun', 'Shamim Al Mamun received B.Sc. (Hons.) and M.Sc. (Engg.) Degree in Computer Science and Engineering from Jahangirnagar University (JU) and Bangladesh University of Engineering and Technology (BUET), respectively. He also served as head of the Department of Computer Science at Daffodil International University during 2006-2008. He received his Ph.D. degree from the Graduate School of Science and Engineering, Saitama University, Japan in 2018. His research interests include autonomous systems, artificial intelligence, and Software Engineering. He has authored more than 50 papers in different peer-reviewed International Journals and Conferences and also worked as a Technical co-chair and Organizing Secretary at the ICEEICT conference in 2014 and 2015. He is also a member of IEEE, USA, and IEICE, Japan. ', 'associate professor', 1, NULL, NULL, '2023-01-03 21:36:34', NULL, NULL),
('IIT-011', 'Dr.', 'Mohammad', 'Shahidul', 'Islam', 'Received his Ph.D. in Computer Science & Information Systems from the National Institute of Development Administration (NIDA), Bangkok, Thailand, B.Tech.  in Computer Science and Technology from the Indian Institute of Technology-Roorkee (IITR), Uttar Pradesh, India in 2002, M.Sc. in Mobile Computing and Communication from University of Greenwich, London, U.K in 2008. ', 'associate professor', 1, NULL, NULL, '2023-01-03 21:39:12', NULL, NULL),
('IIT-012', 'Dr.', 'Md.', 'Sazzadur', 'Rahman', 'He received his Ph.D. in Material Science (Surface Science) from Kyushu University, Japan as a MEXT scholarship grantee in 2015. During the Ph.D. course, he studied surface (2D) structure determination of Si and Ge adsorption on Ni(111) and Ag(111) in order to study the graphene analogy of Si and Ge and also the phase evolution and characteristics at high temperatures. The aim of the study was to find a suitable application of the graphene analogy of Si and Ge in the field of computer and communication hardware. Previously he received his B. Sc. (Hons.) degree and M. S. degree in Applied Physics, Electronics, and Communication Engineering from the University of Dhaka, Bangladesh in 2005 (held in 2007) and 2006 (held in 2009), respectively. \r\n\r\nNow he is working as an Associate Professor at the Institute of Information Technology (IIT), Jahangirnagar University (JU), Savar, Dhaka-1342, Bangladesh from 16 February 2021 to till date. he had served as an Assistant Professor at IIT_JU from 12 November 2018 to 15 February 2021. Previously, he had joined the Department of Electronics and Communication Engineering under the faculty of Computer Science and Engineering, Hajee Mohammad Danesh Science and Technology University (HSTU), Dinajpur, Bangladesh in 2009 as a Lecturer (part-time) and became a permanent Lecturer in 2010 and prompted to the post of Assistant Professor in 2012 and worked there as an Associate Professor from 10 May 2017 to 11 November 2018.', 'associate professor', 1, NULL, NULL, '2023-01-03 21:39:12', NULL, NULL),
('IIT-013', NULL, 'Zamshed', 'Iqbal', 'Chowdhury', 'Zamshed Iqbal Chowdhury received the BSc and MS degrees in Applied Physics, Electronics, and Communication Engineering from the University of Dhaka, Bangladesh. His primary research interests include non-von Neumann computer architectures, particularly involving emerging nonvolatile memory technologies. He is currently on leave and working toward his Ph.D. degree in the Department of Electrical and Computer Engineering, University of Minnesota, Twin Cities, USA.', 'assistant professor', 1, NULL, NULL, '2023-01-03 21:42:42', NULL, NULL),
('IIT-014', 'Dr.', 'Rashed', NULL, 'Mazumder', 'Rashed Mazumder received his Bachelor\'s degree in Computer Science and Engineering from the University of Dhaka, Bangladesh (Session. 99-2000, Passed 2005). He completed Master\'s and Ph.D. degrees under the School of Information Science from Japan Advanced Institute of Science and Technology (JAIST), Ishikawa, Japan in 2014 and 2017 respectively.\r\n\r\nHe was a Cisco Certified Network Associate (CCNA) from the period of 2009-2012. Rashed Mazumder is a distinct Microsoft Certified IT Professional (MCITP). Also, he is Microsoft Certified System Administrator (MCSA). In addition, he is Microsoft Certified Professional (MCP) since 2009. He served various types of IT-related services from 2005-2010. Among these, he was faculty at Asian University and Peoples University in the period 2005-2006. Also, he was a local consultant of the World Bank in the district judge court of Chittagong under the Ministry of Law, Justice, and Parliamentary Affairs, Bangladesh in the period of 2007-2008. He was Consultant (IT) at the LINK-Online Solution from 2009-2010.\r\n\r\nIn 2010, he joined the Department of ICT, at Mawlana Bhashani Science and Technology University (MBSTU) as a Lecturer. He upgraded to an Assistant Professor in a similar institute on the year of 2012. After completing his Master\'s and Ph.D. studies in Japan, he returned at MBSTU and was promoted as an Associate Professor (April 2018). In addition, he was the Director of the Physical Education Department of MBSTU. He also served an additional duty as Assistant Proctor from 2017-2018. He was also Assistant Hall Super at Shahid Janani Jahanara Immam Hall of MBSTU. Several times, he was a member of the Technical Committee of Admission Test, MBSTU. \r\n\r\nHis current research interests include Information Security, Symmetric Encryption, Cryptographic Hash, Authenticated Encryption, Small Domain Encryption, Message Authentication Code, and Advanced Networking. He has a certain number of good journals in Wiley Publishers, and IEICE. In addition, he has some top-level international conference papers such as CISS, CD-ARES, AINA, and ASIAJCIS. He visited many countries such as Japan, the USA, South Korea, Austria, China, Malaysia, India, and Nepal.', 'assistant professor', 1, NULL, NULL, '2023-01-03 21:42:42', NULL, NULL),
('IIT-015', '', 'Nusrat', 'Zerin', 'Zenia', 'Nusrat Zerin Zenia received her Bachelor\'s and Masters\'s degrees in Information Technology from Jahangirnagar University, Bangladesh in 2013 and 2015 respectively. In 2016, she joined the Department of CSE, Daffodil International University as a Lecturer. After eight months, she joined the Department of CSE, Islamic University of Technology (IUT), Gazipur, and worked there for two years. She has been with the Institute of Information Technology of Jahangirnagar University, since November 2018. Her current research interests include Wireless Sensor Networks, the Internet of Things (IoT), and Human-Computer Interaction. ', 'assistant professor', 1, NULL, NULL, '2023-01-03 21:46:21', NULL, NULL),
('IIT-016', NULL, 'Manan', 'Binth Taj', 'Noor', 'Manan Binth Taj Noor is a lecturer at the Institute of Information Technology at Jahangirnagar\r\n\r\nUniversity. She received her B.Sc (Honors.) and M.Sc degree in Information Technology from\r\n\r\nthe same institute in 2015 and 2016 respectively. Her research interest includes image and video\r\n\r\nprocessing, cloud computing, machine learning, and wireless sensor networks.', 'assistant professor', 1, NULL, NULL, '2023-01-03 21:46:21', NULL, NULL),
('IIT-017', NULL, 'Mehrin', NULL, 'Anannya', 'Mehrin Anannya is currently working as a Lecturer, at the Institute of Information Technology, Jahangirnagar University, Savar, Dhaka-1342. She received her Master\'s and Bachelor\'s degree in Information Technology from the Institute of Information Technology, Jahangirnagar University, Bangladesh in the year 2016 and 2014 respectively. \r\n\r\nDuring her graduation and post-graduation period, she used to receive Jahangirnagar University\'s scholarship each semester for her good result. She received another scholarship from Bangladesh Government for securing the first position to have an \"Internship on Java web-based application\" at Infosys, Mysore, India in the year 2015 whose training period was for 3 months.', 'lecturer', 1, NULL, NULL, '2023-01-03 21:49:27', NULL, NULL),
('IIT-018', '', 'Md.', 'Biplob', 'Hosen', 'Md. Biplob Hosen is a lecturer at the Institute of Information Technology at Jahangirnagar University. He received his B.Sc (Honors.) and M.Sc degree in Information Technology from the same institute in 2016 and 2017 respectively. In 2017, he joined the Dept. of CSE, Daffodil International University as a lecturer. In 2018, he joined the Dept. of CSE, Stamford University Bangladesh. He has been with the Institute of Information Technology of Jahangirnagar University, since 28 February 2021.', 'lecturer', 1, NULL, NULL, '2023-01-03 21:49:27', NULL, NULL),
('IIT-019', NULL, 'Md.', 'Mahmudur', 'Rahman', 'Md. Mahmudur Rahman is currently working as a Lecturer at the Institute of Information Technology of Jahangirnagar University, Savar, Dhaka-1342, Bangladesh. He received his bachelor’s and Master\'s degrees in Information Technology from Jahangirnagar University, Bangladesh in 2016 and 2017 respectively. He was a lecturer at Bangabandhu Sheikh Mujibur Rahman Aviation and Aerospace University (BSMRAAU) for two years, the University of Information Technology and Sciences (UITS) for two years, and the University of South Asia for one year prior to joining JU. In 2019, he was awarded a National Science and Technology (NST) fellowship for his master\'s research by the Ministry of Science and Technology. His research interests include intrusion prevention systems, network security, machine learning, data mining, and privacy.', 'lecturer', 1, NULL, NULL, '2023-01-03 21:53:52', NULL, NULL),
('IIT-020', NULL, 'Afrin', NULL, 'Ahmed', 'Afrin Ahmed is currently working as a Lecturer at the Institute of Information Technology, Jahangirnagar University, Savar, Dhaka-1342, Bangladesh. She received her bachelor’s and master\'s degrees in Information Technology from Jahangirnagar University in 2018 and 2019 respectively. She was a Lecturer at Bangladesh University of Professionals (BUP) and Prime University prior to joining Jahangirnagar University. In 2021, she was awarded an ICT fellowship for her master\'s research by the Ministry of Information and Communication Technology', 'lecturer', 1, NULL, NULL, '2023-01-03 21:53:52', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
