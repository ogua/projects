-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2018 at 02:17 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `books`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Admin', 'Admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `autologin`
--

CREATE TABLE `autologin` (
  `userkey` char(8) NOT NULL,
  `token` char(32) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data` text NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `prod_id` int(30) NOT NULL,
  `user_id` int(10) NOT NULL,
  `generateid` text NOT NULL,
  `prod_title` varchar(255) NOT NULL,
  `prod_image` text NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `totalpx` float NOT NULL,
  `date` varchar(255) NOT NULL,
  `orders` varchar(40) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catID` int(11) NOT NULL,
  `CatTitle` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catID`, `CatTitle`, `date`) VALUES
(1, 'Accounting', '2017-12-23 18:04:06'),
(2, 'Info Tech', '2017-12-23 18:04:06'),
(3, 'Law', '2017-12-23 18:04:26'),
(4, 'Marketing', '2017-12-23 18:04:26'),
(5, 'Banking and Finance', '2017-12-23 18:05:14'),
(6, 'Magazines', '2017-12-23 18:05:14'),
(7, 'Novel', '2017-12-23 18:05:23');

-- --------------------------------------------------------

--
-- Table structure for table `confirmation`
--

CREATE TABLE `confirmation` (
  `id` int(11) NOT NULL,
  `uid` int(10) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `Mobile` int(12) NOT NULL,
  `addressline1` text NOT NULL,
  `Total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customerorder`
--

CREATE TABLE `customerorder` (
  `id` int(11) NOT NULL,
  `prod_id` int(30) NOT NULL,
  `user_id` int(10) NOT NULL,
  `generateid` text NOT NULL,
  `prod_title` varchar(255) NOT NULL,
  `prod_image` text NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `totalpx` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trx_id` varchar(255) NOT NULL,
  `ReFid` varchar(255) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `AlFullName` varchar(255) NOT NULL,
  `AlNumber` varchar(12) NOT NULL,
  `Number` varchar(40) NOT NULL,
  `Status` varchar(40) NOT NULL DEFAULT '0',
  `dates` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `idtable`
--

CREATE TABLE `idtable` (
  `id` int(11) NOT NULL,
  `genrateId` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `idtable`
--

INSERT INTO `idtable` (`id`, `genrateId`) VALUES
(1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `paymentrecieves`
--

CREATE TABLE `paymentrecieves` (
  `id` int(11) NOT NULL,
  `uid` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `trx_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `prod_cat` int(10) NOT NULL,
  `prod_title` varchar(40) NOT NULL,
  `prod_isbn` varchar(30) NOT NULL,
  `author` varchar(40) NOT NULL,
  `Search` text NOT NULL,
  `prod_px` float NOT NULL,
  `prod_desc` text NOT NULL,
  `prod_img` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `prod_cat`, `prod_title`, `prod_isbn`, `author`, `Search`, `prod_px`, `prod_desc`, `prod_img`, `date`) VALUES
(1, 2, 'Systems Analysis', '1118897843', 'Alan Dennis', '1118897843 Systems Analysis Alan Dennis', 60, 'The 6th Edition of Systems Analysis and Design continues to offer a hands-on approach to SAD while focusing on the core set of skills that all analysts must possess. Building on their experience as professional systems analysts and award-winning teachers, authors Dennis, Wixom, and Roth capture the experience of developing and analyzing systems in a way that students can understand and apply.\r\nWith Systems Analysis and Design, 6th Edition, students will leave the course with experience that is a rich foundation for further work as a systems analyst.\r\n', 'book by Alan Dennis, Barbara Haley Wixom, Roberta M. Roth.jpg', '2017-12-28 13:13:31'),
(2, 2, 'Business Automation', '1215251551', 'Sanjay Mohapatra', 'Business Process Automation 1215251551 Sanjay Mohapatra', 70, '', 'businessAutom.jpg', '2017-12-28 13:13:31'),
(3, 2, 'Computer Networks', '0123850592', 'Larry L. Peterson', 'Computer Networks 0123850592 Larry L. Peterson', 70, 'Computer Networks: A Systems Approach, Fifth Edition, explores the key principles of computer networking, with examples drawn from the real world of network and protocol design. Using the Internet as the primary example, this best-selling and classic textbook explains various protocols and networking technologies. The systems-oriented approach encourages students to think about how individual network components fit into a larger, complex system of interactions.\r\nThis book has a completely updated content with expanded coverage of the topics of utmost importance to networking professionals and students, including P2P, wireless, network security, and network applications such as e-mail and the Web, IP telephony and video streaming, and peer-to-peer file sharing. There is now increased focus on application layer issues where innovative and exciting research and design is currently the center of attention. Other topics include network design and architecture; the ways users can connect to a network; the concepts of switching, routing, and internetworking; end-to-end protocols; congestion control and resource allocation; and end-to-end data.\r\nEach chapter includes a problem statement, which introduces issues to be examined; shaded sidebars that elaborate on a topic or introduce a related advanced topic; Whats Next? discussions that deal with emerging issues in research, the commercial world, or society; and exercises.\r\nThis book is written for graduate or upper-division undergraduate classes in computer networking. It will also be useful for industry professionals retraining for network-related assignments, as well as for network practitioners seeking to understand the workings of network protocols and the big picture of networking.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Computer Networks, Fifth Edition- A Systems Approach (The Morgan Kaufmann Series in Networking).jpg', '2017-12-28 13:30:37'),
(4, 2, 'software design', '1119117643', ' Michael Bell', 'software design 1119117643  Michael Bell', 80, 'Incremental Software Architecture is a solutions manual for companies with underperforming software systems. With complete guidance and plenty of hands-on instruction, this practical guide shows you how to identify and analyze the root cause of software malfunction, then identify and implement the most powerful remedies to save the system. You''ll learn how to avoid developing software systems that are destined to fail, and the methods and practices that help you avoid business losses caused by poorly designed software. Designed to answer the most common questions that arise when software systems negatively impact business performance, this guide details architecture and design best practices for enterprise architecture efforts, and helps you foster the reuse and consolidation of software assets.\r\nRelying on the wrong software system puts your company at risk of failing. It''s a question of when, not if, something goes catastrophically wrong. This guide shows you how to proactively root out and repair the most likely cause of potential issues, and how to rescue a system that has already begun to go bad.\r\n', 'incremental software design by Michael Bell.jpg', '2017-12-28 13:30:37'),
(5, 2, 'Sys. Control & Audit', '0139478701', 'Ron A. Weber', 'System Control and Audit  0139478701  Ron A. Weber', 50, 'This book provides a comprehensive up-to-date survey of the field of accounting information systems control and audit.Presents the most up-to-date technological advances in accounting information technology that have occurred within the last ten years. New material reflects the latest professional standards. The book covers essential subjects and topics, including conducting an information systems audit; frameworks for management and application controls; audit software; concurrent auditing techniques; and evaluating data integrity, system effectiveness, and system efficiency. An essential resource on information systems management for accounting professionals.\r\n\r\n\r\n\r\n', 'Information Systems Control and Audit 1st Edition by Ron A. Weber (Author).jpg', '2017-12-28 13:34:15'),
(6, 2, 'Electronic Commerce', '0136109233', 'Efraim Turban', 'Electronic Commerce 0136109233 Efraim Turban', 70, 'Explore the essential concepts of electronic commerce. \r\n\r\nWritten by experienced authors who share academic as well as real-world practices, this text features exceptionally comprehensive yet manageable coverage of a broad spectrum of EC essentials from a global point of view.\r\n\r\nThe third edition pays special attention to the most recent developments in online behavior in our business, academic, and personal lives.\r\n\r\n\r\n\r\n', 'Introduction to Electronic Commerce (3rd Edition) (Pearson Custom Business Resources) 3rd Edition by Efraim Turban.jpg', '2017-12-28 13:34:15'),
(7, 2, 'N+  Networking', '', 'Dr. Charles R Severance', 'Introduction to Networking Dr. Charles R Severance ', 40, '', 'network.jpg', '2017-12-28 13:36:41'),
(8, 2, 'System Analysis', '', 'Lane Bailey', 'System Analysis Lane Bailey', 30, '', 'system analysis by Lane Bailey.jpg', '2017-12-28 13:39:07'),
(9, 2, 'Operating System', '0134670957', 'Williams Stallings', 'Operating System Williams Stallings', 50, 'For one- or two-semester undergraduate courses in operating systems for computer science, computer engineering, and electrical engineering majors\r\n \r\nAn introduction to operating systems with up-to-date and comprehensive coverage\r\nNow in its 9th Edition, Operating Systems: Internals and Design Principles provides a comprehensive, unified introduction to operating systems topics for readers studying computer science, computer engineering, and electrical engineering. Author William Stallings emphasizes both design issues and fundamental principles in contemporary systems, while providing readers with a solid understanding of the key structures and mechanisms of operating systems. He discusses design trade-offs and the practical decisions affecting design, performance and security. The text illustrates and reinforces design concepts, tying them to real-world design choices with case studies in Linux, UNIX, Android, and Windows 10.\r\n?With an unparalleled degree of support for project integration, plus comprehensive coverage of the latest trends and developments in operating systems, including cloud computing and the Internet of Things (IoT), the text provides everything readers need to keep pace with a complex and rapidly changing field. The 9th Edition has been extensively revised and contains new material, new projects, and updated chapters. ', 'Operating systems.jpg', '2017-12-28 14:24:11'),
(10, 1, 'Accounting Guide', '1945498480', '', 'Accounting Guide 1945498480', 50, 'Whether a financial statement preparer or auditor, it is critical to understand the complexities of the specialized accounting and regulatory requirements for investment companies. This guide supports practitioners in a constantly changing industry landscape. It provides authoritative how-to accounting and auditing advice, including implementation guidance and illustrative financial statements and disclosures. Packed with continuous regulatory developments, this guide has been updated to reflect certain changes necessary due to the issuance of authoritative guidance since the guide was originally issued, and other revisions as deemed appropriate.\r\nThe updates for this 2017 edition include extensive changes to the illustrated financial statements for registered investment companies that result from SEC''s issuance of the release Investment Company Reporting Modernization and related amendments to Regulation S-X. Other updates to the 2017 edition include changes to illustrated attestation reports that result from AICPA''s issuance of Statement on Standards for Attestation Engagements (SSAE) No. 18, Attestation Standards: Clarification and Recodification. Further updates include:\r\n<ul>\r\n<li>References to appropriate AICPA Technical Questions and Answers that address when to apply the liquidation basis of accounting</li>\r\n<li>Appendixes discussing the new standards for financial instruments, leases, and revenue recognition</li>\r\n<li>Appendixes discussing common or collective trusts and business development companies</li></ul>\r\n	\r\n', 'Audit and Accounting Guide- Investment Companies, 2017 (AICPA Audit and Accounting Guide) 1st Edition by AICPA .jpg', '2017-12-28 14:49:13'),
(11, 1, 'Accounting & Mgmt', '', '', 'Accounting and Management', 40, 'Cost Accounting & Management Essentials You Always Wanted To Know covers Cost Accounting concepts and application to real-life business decisions. It explains the concepts in a concise and easy-to-understand manner for business professionals. This book includes Cost Accounting FUNDAMENTALS, SOLVED Exercises, Important CONCEPTS & PRINCIPLES and Ample PRACTICE Exercises.\r\n\r\nThe book is divided into separate chapters, each dedicated to a single concept in Cost Accounting & Management. The flow is such that it builds the readers understanding in stages. At the end of each chapter there are ample solved examples that help apply the concepts learnt in the chapter. This is followed by Practice Exercises that give an opportunity to the reader to apply the learnings from the chapter.\r\n\r\nThis Self Learning Management Series intends to give a jump start to working professionals, whose job roles demand to have the knowledge imparted in a B-school but havent got a chance to visit one. This series is designed to address every aspect of business from HR to Finance to Marketing to Operations, be it any industry. Each book includes basic fundamentals, important concepts, standard and well-known principles as well as practical ways of application of the subject matter. The distinctiveness of the series lies in that all the relevant information is bundled in a compact form that is very easy to interpret. \r\n\r\nThe topics covered are:\r\n<ul>\r\n<li>Cost Accounting Fundamentals</li>\r\n\r\n<li>Balancing of the 3 factors - Cost, Volume & Profit</li>\r\n\r\n<li>Concept of Relevant Information and Decision Making</li>\r\n\r\n<li>Activity Based Costing</li>\r\n\r\n<li>Cost Allocation Techniques</li>\r\n<li>Cost Variances and Control\r\n\r\nThe reader gains the following competence after reading this book</li>\r\n\r\n<li>Understanding of the standard Cost Accounting Terms</li>\r\n\r\n<li>Applying cost accounting concepts to real-life business scenarios</li>\r\n\r\n<li>Using relevant cost accounting information to take business decisions</li></ul>\r\n\r\n', 'Cost Accounting & Management Essentials You Always Wanted To Know (Self Learning Management Series) (Volume 2).jpg', '2017-12-28 14:49:13'),
(12, 1, 'Corporate Finance', '9814618004', 'Kenneth A Kim', 'Corporate Finance 9814618004 Kenneth A Kim', 50, 'Global Corporate Finance, 2nd edition written by a son-father team introduces students and practitioners to those principles essential to the understanding of global financial problems and the policies that global business managers contend with. The objective of this book is to equip current and future business leaders with the tools they need to interpret the issues, to make sound global financial decisions, and to manage the wide variety of risks that modern businesses face in a competitive global environment. In line with its objective, the book stresses practical applications in a concise and straightforward manner, without a complex treatment of theoretical concepts. Instructors who want students to possess practical, job-oriented skills in international finance will find this unique text ideal for their needs. Suitable for both undergraduate- and graduate-level courses in international finances, this book is clearly the "go-to" book on one most important aspect of corporate finance.\r\nThe revised, 2nd edition offers updates to the chapters, answers to some end-of-chapter problems, and a number of practical case-studies. It also comes with a complete set of online ancillary materials, including an Instructor''s Manual, a test bank of 500 multiple-choice questions, two sets of PowerPoint lecture slides, and separate, detailed lecture notes.\r\nThe ancillary materials are available upon request for instructors who adopt this book as a course text.\r\nReadership: Students in the fields', 'Global Corporate Finance.jpg', '2017-12-28 14:52:20'),
(13, 1, ' Finance & Accounting ', '0814436943', 'Edward Fields', ' Finance and Accounting 0814436943 Edward Fields', 80, 'Based on the bestselling AMA seminar, a nuts-and-bolts guide to the dollars-and-cents issues that drive your organization! As a department manager, the last thing you want to think about is numbers. But the truth is, that?s the only thing your executives and senior managers are thinking about so it?s crucial to understand key financial information like balance sheets, income statements, cash flow statements, budgets and forecasts, and annual reports. With over 40,000 copies sold, The Essentials of Finance and Accounting for Nonfinancial Managers has long provided readers with insight into the financial fundamentals. It demystifies the role accounting and finance play in a corporation, demonstrates how financial decisions reflect business goals, and shows how managers can connect corporate financial information directly to their own strategies and actions. Now revised to reflect new accounting and financial standards, the second edition includes: Strategies for getting your share of the budget ? New case studies and practice sessions ? An explanation of Sarbanes-Oxley and its relevance to nonfinancial managers ? How to manage cash flow in tough times ? Fraud detection tools ?An expanded glossary including up-to-the-minute business concepts and terminology ? And more\r\n', 'The Essentials of Finance and Accounting for Nonfinancial Managers 3rd Edition by Edward Fields (.jpg', '2017-12-28 14:52:20'),
(14, 1, 'Microfinance', '1124857421', '', 'Microfinance 1124857421', 50, 'Microfinance has been used over the years in fighting rural poverty and removal of ignorance. As a tool of poverty alleviation, and adopted by the World Bank and other donor assisted funds, its operation cannot be over-emphasised.\r\nBut the topics in microfinance are not easy to digest and cannot be traced to one coherent, comprehensive and concise source. Learners and practitioners have to use various research materials to be able to elicit what they need. More often than not, most research materials are either too deep or just inadequate for learners. The middle is always the short-cuts, that is, points are disjointed in the bid to make ends meet for learners and other young practitioners. \r\nThe Author, with a wide experience in the sector, particularly in finance, accounting and operations management at the highest level in notable microfinance organisations within Africa and Asia, has come up with what is described as The Textbook on microfinance. \r\nHe, therefore, touches on every aspect of the microfinance subjects that are needed at the colleges and university levels. Business schools and their students shall find this book comprehensive enough on the topics of microfinance. \r\nAt the very best, students and young practitioners of banking and finance would not have to look elsewhere for the knowledge in the contemporary microfinance setting. The subjects treated are: -\r\n?Difference between banking and microfinance\r\n?Lending methodologies of microfinance institutions\r\n?Sources of funding to the banks and the MFIs\r\n?Wholesale banking and development banking\r\n?Risk Management\r\n?Fraud risks management\r\n?Operations Risk Management\r\n?Best Practices in Loans Collections\r\n?Collateral Management and Collateral Registry\r\n?Financial Technology (Fintech) and Mobile Banking\r\n?The role of the Finance, Internal Audit, ICT and Human Resource functions\r\n?Glossary of thousands of microfinance definitions\r\nIt is hoped to be a good companion to you in your studies and practices on the field!', 'MICROFINANCE- A Textbook of Microfinance for Schools, Colleges and Practitioners Kindle Edition by Siegfried Silverman  (Author) .jpg', '2017-12-28 14:59:40'),
(15, 1, 'Simple Accounting', '0981454224', '', 'Simple Accounting 0981454224', 50, 'Find all of the following explained in Plain-English with no technical jargon:<br>\r\n•	The Accounting Equation and why it''s so significant<br>\r\n•	How to read and prepare financial statements<br>\r\n•	How to calculate and interpret several different financial ratios<br>\r\n•	The concepts and assumptions behind Generally Accepted Accounting Principles (GAAP)<br>\r\n•	Preparing journal entries with debits and credits<br>\r\n•	Cash method vs. accrual method<br>\r\n•	Inventory and Cost of Goods Sold<br>\r\n•	How to calculate depreciation and amortization expenses', 'ACCOUNTING MADE SIMPLE.jpg', '2017-12-28 15:14:28'),
(16, 3, 'Business Law', '', 'Robert W. Emerson J.D', 'Business Law Robert W. Emerson J.D', 30, 'Titles in Barronâ€™s Business Review series are widely used as classroom supplements to college textbooks and often serve as a main textbook in business brush-up programs. Business Law focuses on the importance of legal theory in the everyday business world, explaining such subjects as tort responsibility, government regulations, contracts, environmental law, product liability, consumer protection, and international law, among many other topics. Also discussed in detail are the legal aspects of partnerships, franchises, and corporations, as well as special topics that include business crimes, property as a legal concept, intellectual property, and similar pertinent topics. A study aid labeled Key Terms appears at the beginning of each chapter, and You Should Remember summaries are strategically interspersed throughout the text.', 'Business Law.jpg', '2017-12-28 15:18:33'),
(17, 3, 'Business Law', '1285185242', ' Frank B. Cross', 'Business Law 1285185242  Frank B. Cross', 60, 'Comprehensive, authoritative, and student-friendly, longtime market-leader BUSINESS LAW: TEXT AND CASES delivers an ideal blend of classic "black letter law" and cutting-edge coverage of contemporary issues and cases. BUSINESS LAW continues to set the standard for excellence. The text offers a strong student orientation, making the law accessible, interesting, and relevant. The cases, content, and features of the thirteenth edition have been thoroughly updated to represent the latest developments in business law. Cases range from precedent-setting landmarks to important recent decisions. Ethical, global, and corporate themes are integrated throughout. In addition, numerous critical-thinking exercises challenge students to apply knowledge to real-world issues. It is no wonder that BUSINESS LAW is used by more colleges and universities than any other business law text.', 'Business Law- Text.jpg', '2017-12-28 15:18:33'),
(18, 3, 'Company Law', '0198722869', ' Brenda Hannigan', 'Company Law 0198722869  Brenda Hannigan', 45, 'The fourth edition of Company Law brings clarity and sophisticated analysis to the ever-changing landscape of company law. Hannigan captures the dynamism of the subject, places the material in context, highlights its relevance and topicality, and guides students through all the major areas studied at undergraduate level. \r\n\r\nThe book is divided into five distinct sections covering corporate structure (including legal personality and constitutional issues), corporate governance (including directors'' duties and liabilities), shareholders'' rights and remedies (including powers of decision-making and shareholder engagement), corporate finance (including share and loan capital), and corporate rescue and restructuring (including liabilities arising on insolvency). \r\n\r\nThe author''s accessible writing style and comprehensive approach to the subject makes this an idea textbook for students of company law.', 'Company Law 4th Edition by Brenda Hannigan.jpg', '2017-12-28 15:21:25'),
(19, 3, 'Criminal Law', '1413321784', ' Sara J Berman JD ', '', 50, 'The criminal justice system is complicated?Understand it and your rights \r\n\r\nCriminal law is full of complex rules and procedures, but this book demystifies them. It explains how the system works, why police, lawyers, and judges do what they do, and?most important?the options for suspects, defendants, and victims. It also provides critical information on working with a lawyer. \r\n\r\nIn plain English, The Criminal Law Handbook covers: \r\nsearch and seizure?\r\n\r\n', 'Criminal Law Handbook,.jpg', '2017-12-28 15:21:25'),
(20, 3, 'Legal Terms', '1438005121', 'Steven H. Gifis', '', 50, 'Updated to include new terms and to incorporate recent changes in laws and judicial interpretations, this handy dictionary:<br>\r\n•	Contains over 2500 legal terms defined in clear, easy to understand English<br>\r\n•	Translates legalese for the layperson<br>\r\n•	Includes hundreds of examples to illustrate the definitions<br>\r\n•	Is an ideal book for quick reference or to learn more about the law:\r\n\r\n\r\nNon-lawyers will appreciate the way this book cuts through the complexities of legal jargon and presents definitions and explanations that are easily understood and referenced. The terms are arranged alphabetically and given with definitions and explanations for consumers, business proprietors, legal beneficiaries, investors, property owners, litigants, and all others who have dealings with the law. Find definitions on everything from Abandonment and Abatable Nuisance, all the way through to Zoning.', 'Dictionary of Legal Terms- Definitions and Explanations for Non-Lawyers 5th Edition by Steven H. Gifis.jpg', '2017-12-28 15:24:41'),
(21, 3, 'Introduction to Law', '1111311897', '', '', 70, 'This best-selling text creates an awareness and appreciation for the effect that law has on virtually every facet of modern life and society. Beginning with a detailed look at the organization of the U.S. system of government, the text guides you through each of the primary substantive areas of law with realistic assignments, relevant ethical considerations, and easy-to-understand judicial opinions that reinforce chapter topics. From fundamental concepts to emerging legal topics, INTRODUCTION TO LAW presents the terminology, principles, and cases that are having an impact on society--and on many professions--today.', 'Introduction to Law, 6th Edition.jpg', '2017-12-28 15:24:41'),
(22, 3, 'Legal Skills', '', '', '', 50, 'Legal Skills encompasses all the academic and practical legal skills vital to a law degree in one manageable volume. It is an ideal text for the first year law student and is also a valuable resource for those studying law at any level.Clearly structured in three parts, the book covers the full range of legal skills including finding and using legislation, writing essays, answering problem questions, mooting, and more. The book contains many useful features designed to support a truly practical approach to legal skills. Self-test questions and diagrams are set in a user-friendly colour design. Longer activities with step-by-step guidance provide a grounded, ''hands on'' experience of tackling a variety of legal skills fromusing cases to negotiation. Each skill is firmly set in its wider academic and professional context to encourage an integrated appreciation of legal skills.Online Resource CentreThe book is accompanied by an innovative online resource centre offering a range of resources to support teaching and learning. Videos of good and bad ''real life'' moots in action bring the subject to life for students. Lecturers can track student progress using an online bank of 300 multiple choice questions offering immediate answers and feedback that can be customised and loaded on to the university''s VLE.', 'LEGAL SKILLS.jpeg', '2017-12-28 15:27:53'),
(23, 3, 'The Law Book', '', 'Michael H. Roffer', '', 60, 'These are just a few of the thought-provoking questions addressed in this beautifully illustrated book. Join author Michael H. Roffer as he explores 250 of the most fundamental, far-reaching, and often-controversial cases, laws, and trials that have profoundly changed our world for good or bad. Offering authoritative context to ancient documents as well as todays hot-button issues, The Law Book presents a comprehensive look at the rules by which we live our lives. It covers such diverse topics as the Code of Hammurabi, the Ten Commandments, the Trial of Socrates, the Bill of Rights, womens suffrage, the insanity defense, and more. Roffer takes us around the globe to ancient Rome and medieval England before transporting us forward to contemporary accounts that tackle everything from civil rights, surrogacy, and assisted suicide to the 2000 U.S. presidential election, Google Books, and the fight for marriage equality.\r\n \r\nOrganized chronologically, the entries each consist of a short essay and a stunning full-color image while the Notes and Further Reading section provides resources for more in-depth study. Justice may be blind, but this collection brings the rich history of the law to light.\r\n', 'The Law Book- From Hammurabi  .jpg', '2017-12-28 15:27:53'),
(24, 3, 'The Tools of Argument', '1481246380', 'Joel P. Trachtman', '', 50, 'Joel Trachtman''s book presents in plain and lucid terms the powerful tools of argument that have been honed through the ages in the discipline of law. If you are a law student or new lawyer, a business professional or a government official, this book will boost your analytical thinking, your foundational legal knowledge, and your confidence as you win arguments for your clients, your organizations or yourself. For more information, go to toolsofargument.com.\r\n\r\n\r\n\r\n', 'The Tools of Argument- How the Best Lawyers Think, Argue, and Win  by Joel P. Trachtman.jpg', '2017-12-28 15:30:50'),
(25, 1, 'Corporate Reporting', '0761971416', 'Andrew W Higson ', '', 60, '`This is a book which should be read by all students, whether undergraduate and postgraduate. It also provides a succinct guide for the manager who wishes to come to grips with this topic, or the accountant nostalgic to recollect the non too praiseworthy and indecisive history of this topic? - Managerial Auditing Journal\r\n\r\n\r\nCorporate Financial Reporting critically examines contemporary corporate financial reporting. The complexity of the reporting process and the myriad of issues facing the directors, accountants and auditors can only be successfully understood from a firm conceptual base. Recent financial scandals clearly highlight the interrelationships between all the themes explored in this book, from financial reporting to auditing, from management?s motivations to fraud.\r\n\r\nSpecial features of this book include:\r\n- A critical examination of accounting ?theory?\r\n- Senior practitioners? insights on ?a true and fair view?\r\n- An exploration of ?the financial reporting expectations gap?\r\n- A discussion of the nature of ?corporate performance?\r\n- An examination of corporate fraud\r\n- An examination of the implications of ?real-time? reporting by companies\r\n- Discussion questions at the end of each chapter\r\n\r\nThe book will be relevant to advanced undergraduate as well as postgraduate and MBA students.\r\n\r\n\r\n\r\n\r\n', 'Corporate Financial Reporting- Theory and Practice 1st Edition by Andrew W Higson .jpg', '2017-12-28 15:41:09'),
(26, 1, 'Financial Reporting', '0078025672', 'Fred Mittelstaedt', '', 60, 'Financial Reporting & Analysis (FR&A) by Revsine/Collins/Johnson/Mittelstaedt emphasizes both the process of financial reporting and the analysis of financial statements. This book employs a true "user" perspective by discussing the contracting and decision implications of accounting and this helps readers understand why accounting choices matter and to whom. Revsine, Collins, Johnson, and Mittelstaedt train their readers to be good financial detectives, able to read, use, and interpret the statements and-most importantly understand how and why managers can utilize the flexibility in GAAP to manipulate the numbers for their own purposes. Significantly, the new edition emphasizes the differences and similarities between GAAP and IFRS, which is a critical component of this course.\r\n\r\n\r\n', 'Financial Reporting and Analysis.jpg', '2017-12-28 15:41:09'),
(27, 1, 'Taxation', '0199683697', 'Stephen Smith', '', 60, 'Taxation is crucial to the functioning of the modern state. Tax revenues pay for public services - roads, the courts, defence, welfare assistance to the poor and elderly, and in many countries much of health care and education too. More than one third of national income in the industrialized (OECD) countries is on average taken in taxation. Taxes affect individuals in many ways. Taxes paid on income and spending directly reduce taxpayer disposable income, taxpayers face the hassle of tax returns and making payments, and they may be anxious about the possibility of investigation and enforcement action. People also adapt their activities in various ways to reduce the impact of taxation - putting money into tax-free savings accounts, or making shopping trips to other countries where taxes are lower.\r\n\r\nTaxation is therefore central to politics and public debate. Politicians that make reckless campaign promises about taxation then have to live with the uncomfortable consequences if elected. Businesses lobby for tax breaks that they claim will create jobs and prosperity.\r\n\r\nIn this Very Short Introduction Stephen Smith shows how taxes have real effects on citizens and the economy that tax policy-makers have to balance. Although tax policy will always be a highly political issue, he argues that public decisions about taxation would be improved by a better understanding of the role of taxation, and of the nature and effects of different taxes.\r\n', 'Taxation- A Very Short Introduction (Very Short Introductions) 1st Edition by Stephen Smith .jpg', '2017-12-28 15:42:39'),
(28, 4, 'Branding & Marketing', '', 'Dixie Maria Carlton', '', 50, 'When it comes to marketing your understanding of the basics can potentially save you thousands of dollars on advertising, marketing and branding. This book covers the basics of each of the key areas of marketing and branding, including:\r\n<ul>\r\n<li>Identifying Target Markets</li>\r\n<li>Marketing and Brand Planning</li>\r\n<li>Media and Promotions</li>\r\n<li>Websites and Social Media</li>\r\n<li>Customer Service Essentials</li>\r\n<li>Gaining Repeat and New Business</li>\r\n<li>Building Your Reputation Through Public Relations</li>\r\n</ul>\r\nThis book will help you to understand the basics of business and marketing plans, branding, image, customer service and public relations so that you can grow your business through simple and smart marketing practices. Getting the basics right can make such a difference to the outcomes. Measuring the results of your advertising can lead to effective decision making about what to spend and where to invest your marketing budget. \r\n\r\nWhen you understand how it works you get a lot more punch out of your advertising and marketing campaigns. \r\n', 'Advertising, Branding & Marketing 101- The quick and easy guide to achieving great marketing outcomes in a small business Kindle Edition by Dixie Maria Carlton .jpg', '2017-12-28 15:58:36'),
(29, 4, 'Intro to marketing', '', ' Alex Genadinik', '', 70, 'Are you new to marketing, and need to get quickly up and running so that you can promote your business? If so then this is the book for you. The book first explains to you marketing fundamentals and roots of marketing so that you can have a solid foundation and introduction for understanding everything else that will come later in the book. The book then explains how to find an ideal customer, and how to use data and analytics to track and measure your results. After that, once you have had a proper introduction to marketing basics and fundamentals, the book gets into specific strategies for you can promote your business with SEO, social media marketing, offline marketing, how to get publicity and other techniques. If you feel like you could use an introduction to marketing to help you promote your business, this is the book for you. Get the book today, and let''s get started on your journey of making you a better marketer of your business. What kind of businesses can you promote using the ideas and strategies in this marketing introduction book? With the strategies in this marketing introduction book, you can create a promote a restaurant or diner, coffee shop, barbershop, nightclub, local event, business selling t-shirts, most kinds of stores ranging from boutiques to grocery stores to jewelry shops, animal care or grooming, lawn care or landscaping businesses, moving businesses, gym, frozen yogurt or ice cream shop, a deli, liquor store or a sandwich shop, a beauty salon or a hair salon, a spa, a daycare business, a hardware store, commercial cleaning or residential cleaning, car wash, general contractor business, dog walking or pet sitting, martial arts studio, or a dance studio. Here is a list of potential online businesses for which you can promote using this introduction to marketing book: blogging, affiliate marketing, e-learning, create a channel on YouTube, become an author and sell books on Amazon and the Kindle, or become a freelancer or a local concierge. If you have any suggestions or questions about this marketing introduction book, feel welcome to sent them to me at alex.genadinik@gmail.com Go ahead and get this book, and let''s begin giving you an amazing marketing introduction and a strong marketing foundation so you can successfully promote your business.', 'Introduction to marketing- Introduction to marketing .jpg', '2017-12-28 15:58:36'),
(30, 4, 'Marketing', '', 'Kevin Epstein', '', 80, 'This no-nonsense, hands-on guide is the entrepreneurial marketers battle plan for a successful marketing program. Marketing for Small Business Made Easy contains specific action steps and to-do lists for every step of the marketing process. Real-world anecdotes and specific examples from well-known start-ups demonstrate the books practical skills. Author Kevin Epstein cuts through the buzzwords and marketing jargon to offer you cutting-edge advice on a variety of traditional and high-tech tools, from billboards to blogs.', 'Marketing Made Easy Paperba .jpg', '2017-12-28 16:01:57'),
(31, 4, 'Principles of Marketing', '', ' Gary Armstrong', '', 60, 'Principles of Marketing helps current and aspiring marketers master todays key marketing challenge: to create vibrant, interactive communities of consumers who make products and brands a part of their daily lives. Presenting fundamental marketing information within an innovative customer-value framework, the book helps readers understand how to create value and gain loyal customers. \r\n\r\nThe fifteenth edition has been thoroughly revised to reflect the major trends and forces impacting marketing in this era of customer value and high-tech customer relationships. Emphasizing the great role that technology plays in contemporary marketing, its packed with new stories and examples illustrating how companies employ technology to gain competitive advantage from traditional marketing all-stars such as P&G and McDonalds to new-age digital competitors such as Apple and Google\r\n', 'Principles.jpg\r\n', '2017-12-28 16:01:57'),
(32, 7, 'A Girl Says No', '', '', '', 20, 'Efua, a young and charming student, never dreamt about doing the things some other girls did to get money. She relied on her father for all her financial needs, but now that her father had refused to care for her, what was she to do? Could she continue to say NO to all the temptations coming her way? Kwame was dangerously broke. The bills kept piling up, the debtors kept coming, and tension rose to unbearable proportions. What would he do? He believed in miracles, but he didn''t expect one so soon. But when it came, he couldn''t believe it. Where did this large sum of money his son brought home come from? You are in for a real adventure as you read these and other short stories in this book', 'A-girl-says-no- Step Books.jpg', '2017-12-28 16:34:33'),
(33, 7, 'Blood Invasion', '', 'Lawrence Darmani', '', 10, '', 'Blood-Invasion BY Lawrence Darmani.jpg', '2017-12-28 16:34:33'),
(34, 7, 'Lightning', '', 'David Kwame Kwakye', '', 8, 'When Nana Akua has a premonition regarding a boy about to be hit by a car, she leaves Kumasi for Accra with her mother in a bid to warn the boy. Unknown to Nana Akua, Amanfo, the boy she is trying to warn, has bigger problems to deal with. Against his will, he is being forced to steal money from banks because of his special ability to walk through walls. Another girl, Awura Esi, blind, but possessing an ability to see despite her blindness, is trying to help set Amanfo free from the people who are making him steal. Nana Akua and Awura Esi''s paths cross, and they join forces to help set Amanfo free. In the process, they discover a truth that is as revealing as it is shocking.', 'Lightning BY David Kwame Kwakye.jpg', '2017-12-28 16:36:43'),
(35, 7, 'Long Vac Encounters', '', 'Lawrence Darmani', '', 10, 'The long vacation has hardly begun when Kukua and Samira encounter the woman again. She has returned to claim Samira, her only daughter. Akumaa Brown, the woman, carries her fierce demand to Kukuas uncle: a 17-year-old secret is about to be uncovered. But the tables turn against Akumaa when the law catches up on her over her own dark side. One encounter after another turn the long vacation into one huge adventure for the students on holidays, until it is clear who Samiras biological\r\nparents are a revelation that shocks Kukua. When the long vac is over and Kukua and Samira return to school, guess what they see on the Headmasters Honours List. Yet, Kukua is careful in taking delight in this academic achievement. After all, academic success is not an end in itself but a means to an end she recalls Grandma writing in one of her letters. If academic success is not an end in itself, then what is the end? Kukua has already\r\nfound, thanks to the long vacation encounters.', 'long-Vac-encounters- Lawrence Darmani.jpg', '2017-12-28 16:36:43'),
(36, 7, 'Second Term', '', 'lawrence darmani', '', 12, '', 'second-term-expectations-b-lawrence darmani.jpg', '2017-12-28 16:40:03'),
(37, 7, 'The Christiansons', '', 'Augustine Sherman', '', 10, '', 'the-Christiansons by Augustine Sherman.jpg', '2017-12-28 16:40:03'),
(38, 7, 'The Forest Village', '', 'Alice Mina', '', 12, 'Bibi''s life was changed forever when her mother was sacked from their village. As tradition demanded, Bibi was forced to go and live with her father''s family. Although she tried as much as possible to fit in, she was often ridiculed and insulted. Her only consolation was the forest close by the village. In the forest, she felt safe and secured. It became her haven until something terrible happened.\r\nThe character of Bibi is one that each of us can relate to. As Africans, there are so many traditions and rules that govern us. But no matter what/who we decide to put our faith in, we can never control our destiny. The fate of all things is in God''s hands. Why not follow this God who is able to determine your future?\r\n', 'the-forest-village by Alice Mina.jpg', '2017-12-28 16:43:19'),
(39, 7, 'Whanga Mitchell', '', 'Augustine Sherman ', '', 10, 'Whanga Mitchells singular passion is to become a US Marine. Dexter Bryants only desire is to bring his unyielding mother to accept his black wife before the baby comes. John Mitchells one regret is raising his daughter near a marine base. Susan Bryants lone mission is to destroy her black daughter-in-law before her black daughter-in-law destroys the proud Irish bloodline of the Bryants ancestry. Will the honesty and purity of Whangas heart sustain her amid silent adversaries individually seeking her destruction?  And then, there is Mahmoud Abbas, whose sole desire is revenge.', 'Whanga Mitchell by Augustine Sherman.jpg', '2017-12-28 16:43:19'),
(40, 7, 'Winter', '', 'Augustine Sherman', '', 15, 'A trilogy of Christmas Lawrences reflection into his past behaviors and negative practices that consequentially brought him from a thirteen room mansion into the most deplorable part of the Liberian refugees camp. Betraying some editorial accuracy to emphasize his characters grumpy retrospection, the author cleverly managed to depict Christmas unique prospective on life and relationships, while frequently exposing the base of mans inimitable psychosis.', 'winter BY Augustine Sherman.jpg', '2017-12-28 16:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `reftable`
--

CREATE TABLE `reftable` (
  `id` int(11) NOT NULL,
  `Refta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reftable`
--

INSERT INTO `reftable` (`id`, `Refta`) VALUES
(1, 'REF173AF173'),
(2, '22332');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `sid` varchar(40) NOT NULL,
  `expiry` int(10) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stable`
--

CREATE TABLE `stable` (
  `id` int(11) NOT NULL,
  `ipadd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stable`
--

INSERT INTO `stable` (`id`, `ipadd`) VALUES
(2, '192.168.1.2');

-- --------------------------------------------------------

--
-- Table structure for table `susers`
--

CREATE TABLE `susers` (
  `userkey` char(8) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `Lastname` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `addressline1` text NOT NULL,
  `addressline2` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `AlName` varchar(255) NOT NULL,
  `AlNumber` varchar(12) NOT NULL,
  `Gid` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `Lastname`, `password`, `mobile`, `Email`, `addressline1`, `addressline2`, `date`, `AlName`, `AlNumber`, `Gid`) VALUES
(1, 'AHMED', 'AHIA', '1234', '272185090', 'ogua.ahmed@yahoo.com', 'p o box hvbjjnj', 'p o box ts', '2018-03-15 16:49:22', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autologin`
--
ALTER TABLE `autologin`
  ADD PRIMARY KEY (`token`,`userkey`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `confirmation`
--
ALTER TABLE `confirmation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `idtable`
--
ALTER TABLE `idtable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentrecieves`
--
ALTER TABLE `paymentrecieves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reftable`
--
ALTER TABLE `reftable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `stable`
--
ALTER TABLE `stable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `susers`
--
ALTER TABLE `susers`
  ADD PRIMARY KEY (`userkey`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `confirmation`
--
ALTER TABLE `confirmation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `idtable`
--
ALTER TABLE `idtable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `paymentrecieves`
--
ALTER TABLE `paymentrecieves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `reftable`
--
ALTER TABLE `reftable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stable`
--
ALTER TABLE `stable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
