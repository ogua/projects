-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2019 at 01:31 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airtestbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dates` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `email`, `password`, `dates`, `datetime`) VALUES
(1, 'Ahmed Ogua', 'admin@admin.com', '$2y$10$6bftJmXaWua4eeNNqCjBQeNNiu8nYC5gZBpXozF.qKbX6TS6crEXq', '2019-02-27', '2019-02-27 09:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `airtest`
--

CREATE TABLE `airtest` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `dateofbirth` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `biograph` text NOT NULL,
  `genre` varchar(40) NOT NULL,
  `label` varchar(40) NOT NULL,
  `albums` text NOT NULL,
  `awards` text NOT NULL,
  `country` varchar(90) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dates` varchar(30) NOT NULL,
  `images` varchar(110) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airtest`
--

INSERT INTO `airtest` (`id`, `fullname`, `gender`, `dateofbirth`, `email`, `telephone`, `biograph`, `genre`, `label`, `albums`, `awards`, `country`, `password`, `dates`, `images`, `datetime`) VALUES
(1, 'ShattaWale', 'Male', '1983-11-11', 'shatta@yahoo.com', '0272185090', '<p>Charles Nii Armah Mensah Jr., (born October 17, 1984) is a Ghanaian-born producer and reggae dancehall musician. He is known by his stage name Shatta Wale (formerly Bandana). His best known song is Dancehall King, which led to winning the Artiste of the Year at the 2014 edition of the Ghana music Award. Wale is also an actor, having appeared in the films Never Say Never,The trial of Shatta Wale and Shattered Lives. Having achieved street credibility in a fairly undeveloped Ghanaian dancehall genre at the time, he achieved popularity with his 2004 single, Moko Hoo, which featuredTinny. Then known in the industry as Bandana, the song earned him a Ghana Music Awards nomination. There afterwards, Bandana went missing in the music circus for nearly a decade until rebranding himself in 2013. He began releasing music under a new name, Shatta Wale, under his own record label (SM For Lyf Records). Wale is the most awarded dancehall artist in Africa and second most awarded musician in Ghana. He releases close to 100 songs each year comprising reggae, dancehall and Afrobeats.In 2014, he peaked number 38 on Etvs Top 100 Most Influential Ghanaians Awards chart.He has since appeared on the chart each year, He was ranked Most Influential Musician on social media in 2017.</p>', 'Dancehall', 'Zylophone', '<p>Reign Album Enter the Storm</p>', '<p>Ghana music Award Top 100 Most Influential Ghanaians Awards chart. City People REntertainment Award for Ghanaian art Nigerial Entertainment Award etc.</p>', 'Ghana', '$2y$10$3Il9Z4oyS6v0vp1QEu7t1uGCWYNSeTQ4/zIfAUN2q9qAGN4tKwKXy', '2019-02-26', '15512490891236395419.jpg', '2019-02-27 06:31:28'),
(2, 'StoneBouy', 'Male', '1988-03-05', 'stonebout@yahoo.com', '0272185090', '<p>Stonebwoy Burniton, born Livingstone Etse Satekla is a Ghanaian Afro pop, dancehall and reggae artiste who hails from the Volta Region. He was born on March 5, 1988 in Ashaiman, a suburb of Accra, and places fourth (4th) in a family of seven (7) siblings.</p>\r\n<p>As far back as grade four (4), young Stonebwoy realized his love and passion for creative arts, having successfully scripted and acted for the drama club of his school and also put words together in a rhythmic manner. Since then, the young chap has never stopped singing both songs that he has written and composed and those by artists he is influenced by&nbsp;</p>', 'Dancehall and Reggae', 'Zylophone', '<p>Epistle of mama</p>\r\n<p>&nbsp;</p>', '<p>Ghana Reagge Dancehall Award</p>\r\n<p>BET NOMINEE etc..</p>', 'Ghana', '$2y$10$GlQd//Ga3C7E8xV82sKpWuWyyGmxXFFTRF3s1/Q9yFO6wjZ0Hz2c.', '2019-02-26', '1551250040801580803.jpg', '2019-02-27 06:47:19'),
(3, 'Joyce Blessing', 'Female', '1988-03-02', 'joyce@yahoo.com', '0272185090', '<p>Joyce Akosua Blessing, known by the populace with stage name Joyce Blessing is a Ghanaian based multifarious Gospel hitmaker who has over the years pulled herself by the &ldquo;crupper&rdquo; as a backing vocalist to a multifarious award-winning gospel minister.</p>\r\n<p>Joyce Blessing was born to Mr. Christopher Kwabena Twene and Mrs. Gladys Yaa Kyewaa on 15th May At Accra, Ghana.</p>', 'Gospel', 'Zylophone', '<p>Heavy Price</p>\r\n<p>Agyebum</p>\r\n<p>Holy Ghost Worship</p>\r\n<p>Blessings in Worship</p>', '<p>2014 Gospel Music Awards.</p>\r\n<p>&nbsp;Best Vocalist</p>\r\n<p>Popular video</p>\r\n<p>Artist of the year</p>\r\n<p>the song of the year&nbsp;</p>\r\n<p>Album of the year.</p>', 'Ghana', '$2y$10$9t7J84l4mS8jLIRZv3/uaeqHiJYr30GDiyx5Kr8k6KnDJowM6gHcK', '2019-02-26', '1551250642315763021.jpg', '2019-02-27 06:57:21'),
(4, 'Kumi Guitar', 'Male', '1896-05-02', 'kumi@yahoo.com', '0272185090', '<p>Nana Yaw Kumi, known in showbiz as KUMI GUITAR, was born on 16th May &amp; raised in Accra</p>\r\n<p>His genre of music is a melodious mixture of highlife, Contemporary hig<span class=\"text_exposed_show\">hlife &amp; Afro-fusion.</span></p>\r\n<p><span class=\"text_exposed_show\">His humble beginnings started when he was part of a melodious group in Adisadel College at a tender age.His burst onto the professional scene was triggered by a musical collaboration with another musician on Sugar&nbsp;</span></p>\r\n<p><span class=\"text_exposed_show\">Tone&rsquo;s compilation, after which he became a toast of fun loving Ghanaians with his impeccable lyrics and free style lyrics.</span></p>\r\n<p><span class=\"text_exposed_show\">His single hit &lsquo;BREAK INTO TWO&rsquo; which lated featured Guru got him nominated for New Artiste of the year in 2014 Vodafon Ghana Music Awards. Under Slip Music Records.</span></p>', 'HighLife', 'Zylophone', '', '', 'Ghana', '$2y$10$qFf7sPXuT.LeXZCwXbCODeQwvq8vVWxaDYbdEuJVahaMBLthZJlde', '2019-02-26', '15512510611518297393.jpg', '2019-02-27 07:04:21'),
(5, 'Becca', 'Female', '1988-05-03', 'becca@yahoo.com', '0272185089', '<p>Currently ranked amongst the top female artist on the continent, the Ashanti born Ghanaian, Becca started singing before age 16 and has eleven (11) siblings.Becca came into the limelight almost as a contestant in the second edition of the hit singing competition MENTOR, on Ghanaian television station, TV3. She turned down the opportunity after qualifying into the final twelve due to some disagreements with her management and the organizers.&nbsp;</p>\r\n<p>Becca has justified her immense talent, and is one of the biggestyoung female artists in Africa.Musically, Becca has been influenced by Mariam Makeba, Akosua Agyepong, Yvonne Chaka Chaka,Angelique Kidjoe, Whitney Houston and her parents. Becca&rsquo;s love for children got her into study the Croydon College to study Child Care and Education. She returned to Ghana on vacation in 2006, only for her to be introduced to one of Africa&rsquo;s biggest music producers, Kiki Banson, by the grand-father of hip-life in Ghana,&nbsp;</p>\r\n<p>Reggie Rockstone who nursed and managed her career and the release of her two successful albums. She holds a first class degree in Project Management from the Ghana Institute of Management and Public Administration (GIMPA).</p>', 'HighLife', 'Zylophone', '', '<p>Highlife of the year 2015</p>', 'Ghana', '$2y$10$gGsfO/NY./Az5FHIwrYk1ugz5AA.6QERuPbqRGKYPSxagNnEfv5K6', '2019-02-26', '15512513181414928858.jpg', '2019-02-27 07:08:37'),
(6, 'Obibini', 'Male', '1987-05-02', 'obibini@yahoo.com', '0027218509', '<p>Anointed king of RAP, OBIBINI&rsquo;s style of music is Rhythmic Afrikan Poetry. Due to his<br />keen interest in quality content creation, OBIBINI focuses on good lyrics in writing his<br />music. Being a lover of African history with a passion for research and creative writing,<br />OBIBINI&rsquo;s vision is to become a model of excellence in the &lsquo;Edutainment&rsquo; industry; his<br />mission is to establish a School Of Afrikan Knowledge (SOAK), to educate, entertain and bridge generational gaps through music and the creative arts.&nbsp;</p>\r\n<p>&nbsp;As an ardent listener and lover of music, OBIBINI is not only concerned about the growth of&nbsp; his music but that of the industry as a whole. This is why he expresses worry about the incidence of artistes who do a one hit-track and vanish into thin air, he says, &ldquo;most of these vanished artistes refused to be dynamic and don&rsquo;t seem prepared to learn to better their skills and talents, while &ldquo;underground&rdquo; I was critically analyzing why they vanish and that has inspired me to put away pride and learn no matter how famous I become.&rdquo; Undoubtedly a trend setter, OBIBINI further notes that although things become tough for most upcoming artistes who do not follow existing trends of rhythm in the music industry &ldquo;I believe every artiste has his or her unique way of composing, singing and/or rapping, we should learn to appreciate our talents rather than follow trends because if you ignore your uniqueness for existing trends, what happens when trending rhythms end?</p>', 'HipPop', 'Zylophone', '', '', 'Ghana', '$2y$10$y.I3M2nLv7EWJfQDltMxvuzPycl06TFzvP4CFurSKUUCYNSElDusG', '2019-02-26', '15512516582060480778.jpg', '2019-02-27 07:14:18'),
(7, 'Sarkodie', 'Male', '1989-06-03', 'sark@yahoo.com', '0272185090', '<p>Michael Owusu Addo professionally known as Sarkodie, is a Ghanaian hip hop recording artist and entrepreneur from Tema. He won the Best International Act: Africa category at the 2012 BET Awards, and was nominated in the same category at the 2014 BET Awards.</p>', 'HipPop', 'Sarkcess', '<p>Mary</p>', '<p>category at the 2014 BET Awards.</p>\r\n<p>Best international Art ect.</p>', 'Ghana', '$2y$10$QmcVUaVLg9VHnuDjkVjLae9jjqB1WmKrJItyzn2y/ygJoEv1pdH.O', '2019-02-26', '1551251980211600012.jpg', '2019-02-27 07:19:40'),
(8, 'Medikal', 'Male', '1993-04-04', 'medikal@yahoo.com', '0272185090', '<p>Samuel Adu Frimpong popularly known as Medikal is Ghanaian hip hop musician. Medikal and Sarkodie had the highest nominations for the 2017 edition of the Ghana Music Awards.</p>', 'HipPop', 'AMG', '<p>Disturbation</p>', '<p>Best Campus Male Award</p>', 'Ghana', '$2y$10$LWpF5cGzOyINVy6DNC4A2ec.moTn3Yf5JLB/dt0a40UhYTb3mddS6', '2019-02-26', '1551252822856474970.jpg', '2019-02-27 07:33:41'),
(9, 'Davido', 'Male', '1992-07-21', 'davido@yahoo.com', '0272185090', '<p>David Adedeji Adeleke, better known by his stage name Davido, is a Nigerian singer, songwriter and record producer. His 2011 single \"Dami Duro\" was well-received throughout Nigeria. Along with his elder brother Adewale Adeleke, Davido is the co-owner of HKN Music.</p>', 'HighLife', 'HKN Music', '<p>OBO</p>', '<p>Best Male Art 2017, BET Best International Art, Nigerian Best ArT etc...</p>', 'Nigeria', '$2y$10$EHtlXTWBM70G8EKhMcqlhuJdj7NKYjELVzsFyk.F360yaG1c7DEl6', '2019-02-26', '15512530892238331.jpg', '2019-02-27 07:38:09'),
(10, 'Kwame Eugene', 'Male', '1998-05-03', 'eugenkek@yahoo.com', '0272185090', '<p>Eugene Kwame Marfo, who goes by the stage name Kuami Eugene, is a Ghanaian highlife and afrobeats singer-songwriter. He is signed to Lynx Entertainment, and is known for several songs of his, including \"Angela\", \"Confusion\" and \"Wish Me Wel</p>', 'HighLife', 'Lynx Entertainment', '<p>Rockstar</p>', '', 'Ghana', '$2y$10$HGRsKoZFqX7mNHwfdanNj.SfJreceO113UJrFGn2Z84ZqAKmPAkX.', '2019-02-26', '1551253515550259469.jpg', '2019-02-27 07:45:15'),
(11, 'Kidi', 'Male', '1989-02-23', 'kidi@yahoo.com', '0272185090', '<p>Dennis Nana Dwamena, known by performing name KiDi, is a Ghanaian highlife and afrobeats singer-songwriter. He is signed to Lynx Entertainment and is best known for his hit single Odo. The remix features Nigerian superstars Mayorkun and Davido and has received massive airplay across Africa</p>', 'HighLife', 'Lynx Entertainment', '', '<p>Fresh Art Award</p>\r\n<p>&nbsp;</p>', 'Ghana', '$2y$10$fyxrPK55yzPv4AuA/kgoUOEedFlVqgLsFJJa5/riM86YkJgpZULfq', '2019-02-26', '15512543721223466545.jpg', '2019-02-27 07:59:32'),
(12, 'Yaa Pono', 'Male', '1989-09-02', 'pono@yahoo.com', '0272185090', 'Yaa Pono is a Ghanaian hiplife artist. Born Solomon Adu Antwi in Tema, his adopted first name, which is female, has received attention. He has however said it won\'t be changed. PONO stands for Prince Of No Origin.', 'HipPop', ' Sakora Records, Uptown Energy', '<p>Faster Than Gods, A.R.T. (African Relaxation Techniques)</p>', '<p>Best Male Twi Pop&nbsp;</p>\r\n<p>Best Entertainer</p>\r\n<p>&nbsp;</p>', 'Ghana', '$2y$10$TCc3FcHSFa6hXAWbbPJRseJ6ZpczQ2XO62nK4.DbwvA79A/OEeTpu', '2019-02-27', '1551254638947048458.jpg', '2019-02-27 08:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `event` varchar(40) NOT NULL,
  `date` varchar(40) NOT NULL,
  `startnendtime` varchar(40) NOT NULL,
  `Artistname` varchar(40) NOT NULL,
  `specislRequset` text NOT NULL,
  `dates` varchar(30) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `fullname`, `gender`, `email`, `telephone`, `event`, `date`, `startnendtime`, `Artistname`, `specislRequset`, `dates`, `datetime`) VALUES
(1, 'Ahmed Ahia', 'Male', 'ogua@yahoo.com', '0208129151', 'Hall Week', '2019-03-02', '5:00pm -11:00pm', 'ShattaWale', '<p>No</p>', '2019-02-27', '2019-02-27 15:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `message` varchar(255) NOT NULL,
  `dates` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `dates`, `datetime`) VALUES
(1, 'Name', 'Email', 'Message', '2019-02-27', '2019-02-27 15:54:28'),
(2, 'Ahmed Ogua', 'ogua@yahoo.com', 'Can i book more than one Artist', '2019-02-27', '2019-02-27 15:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Artistname` varchar(110) NOT NULL,
  `dateofevent` varchar(50) NOT NULL,
  `aboutevent` text NOT NULL,
  `dates` varchar(50) NOT NULL,
  `images` varchar(110) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `Artistname`, `dateofevent`, `aboutevent`, `dates`, `images`, `datetime`) VALUES
(1, 'Becca Celebrate Ten Years of Good Music', 'Becca', '2019-10-21', '\r\n<p>Anniversary celebrations are very important in the lives of people and it becomes very important when it has to do with important people in society like celebrities and showbiz people. And that is exactly what multiple award winning artiste Rebecca Akosua Acheampong aka Becca signed on to Zylofon Media intends to do at the National Threatre on Saturday 21st October 2017. Becca intends to celebrate her special day after going through the hustle and bustle of this industry for a decade with a high level of relevance and tenacity.</p>\r\n<p>To make the celebration a worthwhile experience with all the razzmatazz that is to be expected, Becca with a pool of experience in the music business across Africa and the world over has assembled over 10 artistes across Africa for a coronation concert to mark the 10 years anniversary dubbed Becca @ 10. A tall list including some top musicians who would like to make a surprise appearance on the night is what revelers should expect on 21st October at the national theatre. Remember your favourite artiste is part of the surprise appearances so don&amp;rsquo;t be left out when the countdown begins. Knowing the stature of the artistes on the line up, one can imagine the preparation of the celebrant Becca to make sure she stays at the top of affairs when the reviews start after the show.</p>\r\n<p>Yes, some events and concerts line up big names for performances but a line up consisting of Nigerian top acts M.I, MR Eazi, Ice Prince, DJ Spinall and Niniola should alert one that this musical show down will be a master piece and one to remember. From Ghana, event goers will be enjoying back to back music and eclectic performances from notable performers like Kwabena Kwabena, M.anifest, Trigmatic, VVIP, Akwaboah, Kwame Eugene, MzVee, Kidi, not forgetting her label mates Joyce Blessing, Kumi Guitar, Stonebwoy and Obibini.</p>\r\n<p>Becca is known internationally as one of the best live performers in the music industry in Africa and on such a day, one can be rest assured that she will be making a mark that has never been done before in her music life. If preparations and rehearsals are anything to go by, then Becca music lovers are in for their monies worth. Tickets are already out for sale as all the artistes are preparing feverishly for the performance of their life time. Tickets are available at Zylofon Media office at East Legon for Ghc. 70 for regular, Ghc. 150 for VIP and Ghc.300 for VVIP.</p>\r\n', '2019-02-28', '15513439392120661361.jpg', '2019-02-28 08:52:18'),
(2, 'Ashaiman To The World Concert â€“ Stonebwoy', 'Stonebouy', '2019-09-30', '<p>Bhim nation is back again, this time bigger and better with Zylofon Media.</p> <p> the 4th edition of Ashaiman To The World Concert.</p>\r\n<p>This year promises to be huge, especially with the involvement of Zylofon Media. The event comes off on Saturday, 30th September at the Sakasaka Park, Ashaiman, from 7pm till you can party no more.</p>\r\n<p>Performing artistes include all of the Zylofon Music family, Choirmaster of Praye, Kofi Kinaata, Fancy Gadam, Rudebwoy Ranking, Eno, among others.</p>\r\n<p>Ashaiman to the world concert is powered by Zylofon Media with support from Bhim Nation and Mingle X. Sponsors include Indomie, Joy daddy, Minimi and Living Room Restaurant. Media partners include Zylofon 102.1 FM, Ghone TV, Kasapa FM, Live FM, 4syte TV and Bryte FM among others.</p>', '2019-02-28', '1551344786917944070.jpg', '2019-02-28 09:06:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airtest`
--
ALTER TABLE `airtest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
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
-- AUTO_INCREMENT for table `airtest`
--
ALTER TABLE `airtest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
