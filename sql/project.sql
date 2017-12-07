-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2017 at 05:56 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(3) NOT NULL,
  `pid` int(3) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `comment_text` text NOT NULL,
  `timeofcomment` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `pid`, `uname`, `comment_text`, `timeofcomment`) VALUES
(1, 1, 'KennyFung', 'first comment', '2017-12-06 19:33:18'),
(2, 1, 'KennyFung', '123', '2017-12-07 00:26:00'),
(3, 2, 'KennyFung', 'i hate him', '2017-12-07 00:27:06'),
(4, 1, 'KennyFung', 'dasdasdas', '2017-12-07 02:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(3) NOT NULL,
  `youtube` varchar(50) DEFAULT NULL,
  `twitch` varchar(50) DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `youtube`, `twitch`, `twitter`, `instagram`, `facebook`, `email`) VALUES
(1, 'https://www.youtube.com/user/PewDiePie', NULL, 'https://twitter.com/pewdiepie', 'https://www.instagram.com/pewdiepie/', 'https://www.facebook.com/PewDiePie/', 'mailto:kat@reelstyle.co'),
(5, 'https://www.youtube.com/user/corycotton', NULL, 'https://twitter.com/DudePerfect', 'https://www.instagram.com/dudeperfect/', 'https://www.facebook.com/DudePerfect', 'http://dudeperfect.com/#contact-best');

-- --------------------------------------------------------

--
-- Table structure for table `kol`
--

CREATE TABLE `kol` (
  `id` int(3) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `platform` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `follower` int(10) UNSIGNED NOT NULL,
  `sub_count` int(11) NOT NULL DEFAULT '0',
  `category` varchar(20) NOT NULL,
  `intro` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_url` text NOT NULL,
  `video_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kol`
--

INSERT INTO `kol` (`id`, `name`, `gender`, `platform`, `follower`, `sub_count`, `category`, `intro`, `img_url`, `video_url`) VALUES
(1, 'PewDiePie', 'Male', 'Youtube', 13600000, 58150542, 'Gaming', 'Most subscribed person on Youtube ', 'img/Kol/PewDiePie/thumbnail.jpg', 'www.youtube.com/embed/gRyPjRrjS34'),
(2, 'Juke Paul', 'Male', 'Youtube', 0, 0, '', 'Somehow he is famous', '', ''),
(3, 'summit1g', 'Male', 'Twitch', 0, 0, '', 'One of the twitch most  followed personality', '', ''),
(4, 'shourd', 'Male', 'Twitch', 0, 0, '', 'Have the most subscriber on twitch', '', ''),
(5, 'Dude Prefect', 'Male', 'Youtube', 369000, 24461811, 'youtube', '5 Best Friends and a Panda.\r\nIf you like Sports + Comedy, come join the Dude Perfect team!', 'img/Kol/DudePrefect/thumbnail.jpg', 'www.youtube.com/embed/UtsfUAHkyWQ');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `uid` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`uid`, `name`, `password`) VALUES
(1, 'KennyFung', '123123'),
(2, '123123', '123123'),
(3, 'testing', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `wiki`
--

CREATE TABLE `wiki` (
  `pid` int(3) NOT NULL,
  `id` int(3) NOT NULL,
  `load_order` int(11) NOT NULL,
  `subtitle` varchar(20) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wiki`
--

INSERT INTO `wiki` (`pid`, `id`, `load_order`, `subtitle`, `content`) VALUES
(1, 1, 1, 'Biology', 'Felix Arvid Ulf Kjellberg born 24 October 1989), known online as PewDiePie is a Swedish web-based comedian and video producer. He is known for his Let\'s Play commentaries and vlogs on YouTube. <br><br>\r\nBorn in Gothenburg, Sweden, PewDiePie originally pursued a degree in industrial economics and technology management at Chalmers University of Technology. In 2010, during his time at the university, he registered a YouTube account under the name PewDiePie. The following year, he dropped out of Chalmers after becoming disinterested with his degree field, much to the dismay of his parents. After failing to earn an apprenticeship with an advertising agency in Scandinavia, he then decided to focus on creating content for his YouTube channel. In order to fund his videos, PewDiePie began selling prints of his Photoshop art projects and working at a hot dog stand. PewDiePie soon gathered a rapidly increasing online following, and in July 2012, his channel surpassed one million subscribers. <br><br>\r\n'),
(1, 2, 2, 'Youtube career', 'The main focus of PewDiePie\'s videos is his commentary and reactions to various games as he plays through them. Due to this, his videos fall under the Let\'s Play umbrella.Unlike conventional walkthroughs, his Let\'s Play videos are devoted to \"sharing gaming moments on YouTube with my bros\". Variety details that \"PewDiePie acts like he\'s spending time with a friend. He begins each video introducing himself in a high-pitched, goofy voice, drawing out the vowels of his YouTube moniker, then delves into the videos.\" <br><br>\r\n\r\nIn his early years as a YouTube personality, PewDiePie was known for playing horror and action video games most notably Amnesia: The Dark Descent and its related mods. PewDiePie also began posting weekly vlogs starting from 2 September 2011. These vlogs are uploaded under the title of Fridays with PewDiePie. He typically performs a \"Brofist\" at the end of each of his videos. As his channel grew, he began to branch out in terms of his video content, uploading live-action and animated comedy shorts. In 2014, he began to more actively play games that interested him, regardless if they were of the horror genre or not.] In addition, he is also known to support video games from indie developers.<br><br>\r\n\r\nPewDiePie formerly put out videos with a high frequency, something he scaled down in 2014. By early 2017, he had uploaded almost 3,500 videos to his channel, around 400 of which have been made private. In March 2017, PewDiePie commented that his channel was running on a daily output, stating, \"[there\'s] a lot of challenges in doing daily content, it\'s stupid. I really shouldn\'t be doing it, I really should just fucking go back and upload twice a week or some shit, and then take a step back, but I still really, really love the daily challenge-the daily grind-of just being like, \'hey, I\'m gonna make a video today, no matter what.\' And sometimes it really works, and sometimes it doesn\'t.\" <br><br>\r\n\r\nDuring the early portion of his YouTube career, PewDiePie refused to hire any editor or outside assistance to help with his video output; stating, \"I want YouTube to be YouTube.\" In October 2014, however, while speaking to Rhett and Link on their Ear Biscuits podcast, PewDiePie expressed that he would seek an editor in 2015. In February 2017, PewDiePie stated in his My Response video, \"I\'m just a guy. It\'s literally just me. There\'s not a producer out there [...] there\'s no writer, there\'s no camera guy.\"<br>\r\n\r\nSince 15 August 2013, PewDiePie has been the most subscribed user on YouTube, being surpassed for a total of 46 days in late 2013 by YouTube Spotlight channel. Holding the position since 22 December 2013, the channel has over 57 million subscribers as of November 2017. From 29 December 2014 to 14 February 2017, PewDiePie\'s channel held the distinction of being the most viewed of all time, and as of November 2017, the channel has received over 16 billion video views.<br>'),
(5, 3, 1, 'Basic', 'Dude Perfect is an American sports entertainment group on YouTube which consists of twins Coby and Cory Cotton, Garrett Hilbert, Cody Jones, and Tyler Toney, who are all former high school basketball players[1] and college roommates at Texas A&M University. They have broken several Guinness World Records themselves, and have over 3.8 billion total views and 23 million subscribers as of October 2017, making them the 13th most subscribed channel and second most subscribed sports channel in YouTube, being behind Sports with more than 27 million subscribers. Their channel consists of trick shot videos, battles (where they compete in various competitions), and a series called Stereotypes, along with occasional videos that don\'t belong in any of these categories.'),
(5, 4, 2, 'Early years', 'The group was betting on sandwiches via basketball shots in their backyard, which were eventually recorded on camera, and a video of trick shots at Toney\'s ranch called \"Backyard Edition\" was eventually released on YouTube.[3] Within a week, the video received 100,000 views.[citation needed] Afterwards, a trick shot video from the Christian summer camp Sky Ranch was released, which now has over 18 million views; for every 100,000 views the video received, Dude Perfect pledged to sponsor a child from Compassion International.[3] Afterwards, ESPN\'s E:60 contacted the group for a segment, and on the third floor of Texas A&M\'s Kyle Field, Toney converted a shot, which traveled 3.9 seconds, a world record at the time. The shot prompted television appearances on ESPN\'s First Take, Pardon the Interruption, Around the Horn and SportsNation.\r\n\r\nDude Perfect introduced the Panda mascot, who \"developed a cult following at A&M basketball games\" when taunting players of the opposing team'),
(5, 5, 3, 'Getting Popular', 'Later, the group received professional endorsements and requests, which began with then-Sacramento Kings player Tyreke Evans, in an effort to promote Evans\' run for Rookie of the Year.[5] Dude Perfect also worked with quarterback Aaron Rodgers, NBA star Chris Paul, Australian bowler Jason Belmonte, actor Paul Rudd, singer Tim McGraw, Seattle Seahawks coach Pete Carroll and quarterback Russell Wilson, Golfer Jamie Sadlowski, Ryan Swope, Volleyball Star Morgan Beck, and Heisman Trophy winner quarterback Johnny Manziel[6][7] at Kyle Field,[8] Miami Dolphins quarterback Ryan Tannehill,[9] the U. S. Olympic team,[10] NASCAR drivers Ricky Stenhouse Jr., Travis Pastrana, James Buescher, Dale Earnhardt Jr. and IndyCar Series driver James Hinchcliffe at Texas Motor Speedway,[11] New York Giants wide receiver Odell Beckham Jr.,[12] New Orleans Saints quarterback Drew Brees,[13] the Seattle Seahawks, and St Louis Rams players Greg Zuerlein, John Hekker, and Jacob McQuaide.[14] The team traveled to the United Kingdom to film a video with players of Manchester City F.C. and Arsenal F.C.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`),
  ADD KEY `uname` (`uname`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kol`
--
ALTER TABLE `kol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `wiki`
--
ALTER TABLE `wiki`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `uid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wiki`
--
ALTER TABLE `wiki`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_location` FOREIGN KEY (`pid`) REFERENCES `kol` (`id`),
  ADD CONSTRAINT `comment_user` FOREIGN KEY (`uname`) REFERENCES `user_data` (`name`);

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `kol_contact` FOREIGN KEY (`id`) REFERENCES `kol` (`id`);

--
-- Constraints for table `wiki`
--
ALTER TABLE `wiki`
  ADD CONSTRAINT `kol_info` FOREIGN KEY (`pid`) REFERENCES `kol` (`id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
