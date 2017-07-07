-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 21, 2017 at 06:57 PM
-- Server version: 5.5.43-0ubuntu0.14.10.1
-- PHP Version: 5.6.11-1ubuntu3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rostrum`
--

-- --------------------------------------------------------

--
-- Table structure for table `cometchat`
--

CREATE TABLE `cometchat` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` int(10) UNSIGNED NOT NULL,
  `to` int(10) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `sent` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `read` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `direction` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cometchat_announcements`
--

CREATE TABLE `cometchat_announcements` (
  `id` int(10) UNSIGNED NOT NULL,
  `announcement` text NOT NULL,
  `time` int(10) UNSIGNED NOT NULL,
  `to` int(10) NOT NULL,
  `recd` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cometchat_block`
--

CREATE TABLE `cometchat_block` (
  `id` int(10) UNSIGNED NOT NULL,
  `fromid` int(10) UNSIGNED NOT NULL,
  `toid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cometchat_bots`
--

CREATE TABLE `cometchat_bots` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `keywords` text CHARACTER SET utf8 NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `apikey` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cometchat_chatroommessages`
--

CREATE TABLE `cometchat_chatroommessages` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `chatroomid` int(10) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `sent` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cometchat_chatrooms`
--

CREATE TABLE `cometchat_chatrooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastactivity` int(10) UNSIGNED NOT NULL,
  `createdby` int(10) UNSIGNED NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` tinyint(1) UNSIGNED NOT NULL,
  `vidsession` varchar(512) DEFAULT NULL,
  `invitedusers` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cometchat_chatrooms_users`
--

CREATE TABLE `cometchat_chatrooms_users` (
  `userid` int(10) UNSIGNED NOT NULL,
  `chatroomid` int(10) UNSIGNED NOT NULL,
  `isbanned` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cometchat_colors`
--

CREATE TABLE `cometchat_colors` (
  `color_key` varchar(100) NOT NULL,
  `color_value` text NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cometchat_colors`
--

INSERT INTO `cometchat_colors` (`color_key`, `color_value`, `color`) VALUES
('color1', 'a:3:{s:7:\"primary\";s:6:\"56a8e3\";s:9:\"secondary\";s:6:\"3777A7\";s:5:\"hover\";s:6:\"ECF5FB\";}', 'color1'),
('color10', 'a:3:{s:7:\"primary\";s:6:\"23025E\";s:9:\"secondary\";s:6:\"3D1F84\";s:5:\"hover\";s:6:\"E5D7FF\";}', 'color10'),
('color11', 'a:3:{s:7:\"primary\";s:6:\"24D4F6\";s:9:\"secondary\";s:6:\"059EBB\";s:5:\"hover\";s:6:\"DBF9FF\";}', 'color11'),
('color12', 'a:3:{s:7:\"primary\";s:6:\"289D57\";s:9:\"secondary\";s:6:\"09632D\";s:5:\"hover\";s:6:\"DDF9E8\";}', 'color12'),
('color13', 'a:3:{s:7:\"primary\";s:6:\"D9B197\";s:9:\"secondary\";s:6:\"C38B66\";s:5:\"hover\";s:6:\"FFF1E8\";}', 'color13'),
('color14', 'a:3:{s:7:\"primary\";s:6:\"FF67AB\";s:9:\"secondary\";s:6:\"D6387E\";s:5:\"hover\";s:6:\"F3DDE7\";}', 'color14'),
('color15', 'a:3:{s:7:\"primary\";s:6:\"8E24AA\";s:9:\"secondary\";s:6:\"7B1FA2\";s:5:\"hover\";s:6:\"EFE8FD\";}', 'color15'),
('color2', 'a:3:{s:7:\"primary\";s:6:\"4DC5CE\";s:9:\"secondary\";s:6:\"068690\";s:5:\"hover\";s:6:\"D3EDEF\";}', 'color2'),
('color3', 'a:3:{s:7:\"primary\";s:6:\"FFC107\";s:9:\"secondary\";s:6:\"FFA000\";s:5:\"hover\";s:6:\"FFF8E2\";}', 'color3'),
('color4', 'a:3:{s:7:\"primary\";s:6:\"FB4556\";s:9:\"secondary\";s:6:\"BB091A\";s:5:\"hover\";s:6:\"F5C3C8\";}', 'color4'),
('color5', 'a:3:{s:7:\"primary\";s:6:\"DBA0C3\";s:9:\"secondary\";s:6:\"D87CB3\";s:5:\"hover\";s:6:\"ECD9E5\";}', 'color5'),
('color6', 'a:3:{s:7:\"primary\";s:6:\"3B5998\";s:9:\"secondary\";s:6:\"213A6D\";s:5:\"hover\";s:6:\"DFEAFF\";}', 'color6'),
('color7', 'a:3:{s:7:\"primary\";s:6:\"065E52\";s:9:\"secondary\";s:6:\"244C4E\";s:5:\"hover\";s:6:\"AFCCAF\";}', 'color7'),
('color8', 'a:3:{s:7:\"primary\";s:6:\"FF8A2E\";s:9:\"secondary\";s:6:\"CE610C\";s:5:\"hover\";s:6:\"FDD9BD\";}', 'color8'),
('color9', 'a:3:{s:7:\"primary\";s:6:\"E99090\";s:9:\"secondary\";s:6:\"B55353\";s:5:\"hover\";s:6:\"FDE8E8\";}', 'color9');

-- --------------------------------------------------------

--
-- Table structure for table `cometchat_guests`
--

CREATE TABLE `cometchat_guests` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cometchat_guests`
--

INSERT INTO `cometchat_guests` (`id`, `name`) VALUES
(10000000, 'guest-10000000'),
(10000001, '47663'),
(10000002, '79245'),
(10000003, '13753'),
(10000004, '23112'),
(10000005, '55191'),
(10000006, '95401');

-- --------------------------------------------------------

--
-- Table structure for table `cometchat_languages`
--

CREATE TABLE `cometchat_languages` (
  `lang_key` varchar(255) NOT NULL COMMENT 'Key of a language variable',
  `lang_text` text NOT NULL COMMENT 'Text/value of a language variable',
  `code` varchar(20) NOT NULL COMMENT 'Language code for e.g. en for English',
  `type` varchar(20) NOT NULL COMMENT 'Type of CometChat add on for e.g. module/plugin/extension/function',
  `name` varchar(50) NOT NULL COMMENT 'Name of add on for e.g. announcement,smilies, etc.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Stores all CometChat languages';

--
-- Dumping data for table `cometchat_languages`
--

INSERT INTO `cometchat_languages` (`lang_key`, `lang_text`, `code`, `type`, `name`) VALUES
('rtl', '0', 'en', 'core', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `cometchat_session`
--

CREATE TABLE `cometchat_session` (
  `session_id` char(32) NOT NULL,
  `session_data` text NOT NULL,
  `session_lastaccesstime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cometchat_settings`
--

CREATE TABLE `cometchat_settings` (
  `setting_key` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Configuration setting name. It can be PHP constant, variable or array',
  `value` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Value of the key.',
  `key_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'States whether the key is: 0 = PHP constant, 1 = atomic variable or 2 = serialized associative array.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Stores all the configuration settings for CometChat';

--
-- Dumping data for table `cometchat_settings`
--

INSERT INTO `cometchat_settings` (`setting_key`, `value`, `key_type`) VALUES
('ADMIN_PASS', '123456', 0),
('ADMIN_USER', 'admin', 0),
('announcementTime', '15000', 1),
('apikey', 'f372f312533a1ccab365bac1e8d39ac0', 1),
('armyTime', '0', 1),
('autoPopupChatbox', '1', 1),
('BASE_URL', '/rostrum/cometchat/', 0),
('beepOnAllMessages', '1', 1),
('blockpluginmode', '0', 1),
('CC_SITE_URL', '', 0),
('ccactiveauth', '', 1),
('color', 'color1', 1),
('CROSS_DOMAIN', '0', 0),
('desktopNotifications', '1', 1),
('DEV_MODE', '0', 0),
('disableForIE6', '0', 1),
('disableForMobileDevices', '1', 1),
('displayBusyNotification', '1', 1),
('displayOfflineNotification', '1', 1),
('displayOnlineNotification', '1', 1),
('ERROR_LOGGING', '0', 0),
('extensions_core', 'a:4:{s:3:\"ads\";s:14:\"Advertisements\";s:9:\"mobileapp\";s:9:\"Mobileapp\";s:7:\"desktop\";s:7:\"Desktop\";s:4:\"bots\";s:4:\"Bots\";}', 2),
('fixFlash', '0', 1),
('floodControl', '0', 1),
('guestnamePrefix', 'Guest', 1),
('guestsList', '3', 1),
('guestsMode', '0', 1),
('guestsUsersList', '3', 1),
('hideBar', '0', 1),
('hideOffline', '1', 1),
('idleTimeout', '300', 1),
('lastseen', '0', 1),
('LATEST_VERSION', '', 0),
('lightboxWindows', '1', 1),
('maxHeartbeat', '12000', 1),
('messageBeep', '1', 1),
('minHeartbeat', '3000', 1),
('modules_core', 'a:11:{s:13:\"announcements\";a:9:{i:0;s:13:\"announcements\";i:1;s:13:\"Announcements\";i:2;s:31:\"modules/announcements/index.php\";i:3;s:6:\"_popup\";i:4;s:3:\"280\";i:5;s:3:\"310\";i:6;s:0:\"\";i:7;s:1:\"1\";i:8;s:0:\"\";}s:16:\"broadcastmessage\";a:9:{i:0;s:16:\"broadcastmessage\";i:1;s:17:\"Broadcast Message\";i:2;s:34:\"modules/broadcastmessage/index.php\";i:3;s:6:\"_popup\";i:4;s:3:\"385\";i:5;s:3:\"300\";i:6;s:0:\"\";i:7;s:1:\"1\";i:8;s:0:\"\";}s:9:\"chatrooms\";a:9:{i:0;s:9:\"chatrooms\";i:1;s:9:\"Chatrooms\";i:2;s:27:\"modules/chatrooms/index.php\";i:3;s:6:\"_popup\";i:4;s:3:\"600\";i:5;s:3:\"300\";i:6;s:0:\"\";i:7;s:1:\"1\";i:8;s:1:\"1\";}s:8:\"facebook\";a:9:{i:0;s:8:\"facebook\";i:1;s:17:\"Facebook Fan Page\";i:2;s:26:\"modules/facebook/index.php\";i:3;s:6:\"_popup\";i:4;s:3:\"500\";i:5;s:3:\"460\";i:6;s:0:\"\";i:7;s:1:\"1\";i:8;s:0:\"\";}s:5:\"games\";a:9:{i:0;s:5:\"games\";i:1;s:19:\"Single Player Games\";i:2;s:23:\"modules/games/index.php\";i:3;s:6:\"_popup\";i:4;s:3:\"465\";i:5;s:3:\"300\";i:6;s:0:\"\";i:7;s:1:\"1\";i:8;s:0:\"\";}s:4:\"home\";a:8:{i:0;s:4:\"home\";i:1;s:4:\"Home\";i:2;s:1:\"/\";i:3;s:0:\"\";i:4;s:0:\"\";i:5;s:0:\"\";i:6;s:0:\"\";i:7;s:0:\"\";}s:17:\"realtimetranslate\";a:9:{i:0;s:17:\"realtimetranslate\";i:1;s:23:\"Translate Conversations\";i:2;s:35:\"modules/realtimetranslate/index.php\";i:3;s:6:\"_popup\";i:4;s:3:\"280\";i:5;s:3:\"310\";i:6;s:0:\"\";i:7;s:1:\"1\";i:8;s:0:\"\";}s:11:\"scrolltotop\";a:8:{i:0;s:11:\"scrolltotop\";i:1;s:13:\"Scroll To Top\";i:2;s:40:\"javascript:jqcc.cometchat.scrollToTop();\";i:3;s:0:\"\";i:4;s:0:\"\";i:5;s:0:\"\";i:6;s:0:\"\";i:7;s:0:\"\";}s:5:\"share\";a:8:{i:0;s:5:\"share\";i:1;s:15:\"Share This Page\";i:2;s:23:\"modules/share/index.php\";i:3;s:6:\"_popup\";i:4;s:3:\"350\";i:5;s:2:\"50\";i:6;s:0:\"\";i:7;s:1:\"1\";}s:9:\"translate\";a:9:{i:0;s:9:\"translate\";i:1;s:19:\"Translate This Page\";i:2;s:27:\"modules/translate/index.php\";i:3;s:6:\"_popup\";i:4;s:3:\"280\";i:5;s:3:\"310\";i:6;s:0:\"\";i:7;s:1:\"1\";i:8;s:0:\"\";}s:7:\"twitter\";a:8:{i:0;s:7:\"twitter\";i:1;s:7:\"Twitter\";i:2;s:25:\"modules/twitter/index.php\";i:3;s:6:\"_popup\";i:4;s:3:\"500\";i:5;s:3:\"300\";i:6;s:0:\"\";i:7;s:1:\"1\";}}', 2),
('notificationTime', '5000', 1),
('plugins_core', 'a:17:{s:9:\"audiochat\";a:2:{i:0;s:10:\"Audio Chat\";i:1;i:0;}s:6:\"avchat\";a:2:{i:0;s:16:\"Audio/Video Chat\";i:1;i:0;}s:5:\"block\";a:2:{i:0;s:10:\"Block User\";i:1;i:1;}s:9:\"broadcast\";a:2:{i:0;s:21:\"Audio/Video Broadcast\";i:1;i:0;}s:11:\"chathistory\";a:2:{i:0;s:12:\"Chat History\";i:1;i:0;}s:17:\"clearconversation\";a:2:{i:0;s:18:\"Clear Conversation\";i:1;i:0;}s:12:\"filetransfer\";a:2:{i:0;s:11:\"Send a file\";i:1;i:0;}s:9:\"handwrite\";a:2:{i:0;s:19:\"Handwrite a message\";i:1;i:0;}s:6:\"report\";a:2:{i:0;s:19:\"Report Conversation\";i:1;i:1;}s:4:\"save\";a:2:{i:0;s:17:\"Save Conversation\";i:1;i:0;}s:11:\"screenshare\";a:2:{i:0;s:13:\"Screensharing\";i:1;i:0;}s:7:\"smilies\";a:2:{i:0;s:7:\"Smilies\";i:1;i:0;}s:8:\"stickers\";a:2:{i:0;s:8:\"Stickers\";i:1;i:0;}s:5:\"style\";a:2:{i:0;s:15:\"Color your text\";i:1;i:2;}s:13:\"transliterate\";a:2:{i:0;s:13:\"Transliterate\";i:1;i:0;}s:10:\"whiteboard\";a:2:{i:0;s:10:\"Whiteboard\";i:1;i:0;}s:10:\"writeboard\";a:2:{i:0;s:10:\"Writeboard\";i:1;i:0;}}', 2),
('prependLimit', '10', 1),
('searchDisplayNumber', '10', 1),
('startOffline', '0', 1),
('theme', 'docked', 1),
('thumbnailDisplayNumber', '40', 1),
('typingTimeout', '10000', 1),
('USE_CCAUTH', '0', 0),
('windowFavicon', '0', 1),
('windowTitleNotify', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cometchat_status`
--

CREATE TABLE `cometchat_status` (
  `userid` int(10) UNSIGNED NOT NULL,
  `message` text,
  `status` enum('available','away','busy','invisible','offline') DEFAULT NULL,
  `typingto` int(10) UNSIGNED DEFAULT NULL,
  `typingtime` int(10) UNSIGNED DEFAULT NULL,
  `isdevice` int(1) UNSIGNED NOT NULL DEFAULT '0',
  `lastactivity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `lastseen` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `lastseensetting` int(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cometchat_users`
--

CREATE TABLE `cometchat_users` (
  `userid` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `displayname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `grp` varchar(25) NOT NULL,
  `friends` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cometchat_users`
--

INSERT INTO `cometchat_users` (`userid`, `username`, `displayname`, `password`, `avatar`, `link`, `grp`, `friends`) VALUES
(2, 'Simon Marka', 'Simon', '', 'profile_img_1489571082.jpg', '', '', '19'),
(19, 'Kiara Campbell', 'Kiara', '', 'profile_img_1490771448.jpg', '', '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `cometchat_videochatsessions`
--

CREATE TABLE `cometchat_videochatsessions` (
  `username` varchar(255) NOT NULL,
  `identity` varchar(255) NOT NULL,
  `timestamp` int(10) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `notification_for` varchar(100) NOT NULL,
  `notification_type` varchar(100) NOT NULL,
  `notification_by_tutor` int(11) DEFAULT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `notification_for`, `notification_type`, `notification_by_tutor`, `count`, `created_at`) VALUES
(1, 'tutor', 'register', NULL, 1, '2017-04-21 00:23:21'),
(2, 'student', 'register', NULL, 1, '2017-04-21 00:21:50'),
(6, 'admin', 'requirement', NULL, 0, '2017-04-21 00:27:23');

-- --------------------------------------------------------

--
-- Table structure for table `notification_assigned_class`
--

CREATE TABLE `notification_assigned_class` (
  `id` int(11) NOT NULL,
  `notification_for` int(11) NOT NULL,
  `notification_type` varchar(255) NOT NULL,
  `tution_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `page_content` longtext NOT NULL,
  `page_status` tinyint(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `schedule_id` int(11) NOT NULL,
  `scheduled_by` int(11) NOT NULL,
  `scheduled_for` int(11) DEFAULT NULL,
  `tution_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  `schedule_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: scheduled; 1: completed; 2: declined;',
  `payment_status` int(11) DEFAULT '0' COMMENT '0: pending; 1: recieved;',
  `schedule_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`schedule_id`, `scheduled_by`, `scheduled_for`, `tution_id`, `title`, `description`, `start`, `end`, `schedule_status`, `payment_status`, `schedule_at`) VALUES
(1, 2, 19, 1, 'Lets start study', 'I\'ll be call you on skype be ready there', '1492077600', '1492081200', 1, 1, '2017-04-13 09:39:02'),
(10, 2, 19, 1, 'Class in evening', 'i will tech this lesson', '1492110000', '1492113600', 1, 1, '2017-04-13 11:34:47'),
(11, 2, 19, 1, 'We started study', 'I\'ll be call you on skype be ready there', '1492077600', '1492081200', 1, 1, '2017-04-13 09:39:02'),
(12, 2, 19, 1, 'ddddddddd', 'asdasd', '1492176600', '1492180200', 0, 0, '2017-04-14 07:32:21'),
(13, 2, 19, 1, 'ftdgsfgfd', 'dfgfdg', '1492182000', '1492185600', 0, 0, '2017-04-14 07:32:43'),
(14, 2, 19, 1, 'khgjh', 'kugihj', '1492453800', '1492457400', 0, 0, '2017-04-17 07:37:50'),
(17, 0, NULL, 0, '', '', '', '', 2, 0, '2017-04-20 05:28:51'),
(18, 2, 19, 2, 'RRRRRRRRR', 'GGGGGGGGGGsss', '1492714800', '1492718400', 2, 0, '2017-04-20 05:30:54'),
(19, 11, 19, 3, 'Dummy', 'This is Dummy Class', '1492799400', '1492803000', 2, 0, '2017-04-21 04:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `subject_name` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `group_id`, `subject_name`, `status`, `created`) VALUES
(5, 2, 'Physics', 0, '2017-03-23 06:34:30'),
(6, 2, 'Chemistry', 0, '2017-03-23 06:35:32'),
(7, 2, 'Biology', 0, '2017-03-23 06:35:54'),
(8, 1, 'French', 0, '2017-03-23 08:01:26'),
(9, 1, 'German', 0, '2017-03-23 08:02:08'),
(10, 1, 'US English', 0, '2017-03-23 08:02:35'),
(38, 3, 'Algebra', 0, '2017-03-27 11:55:11'),
(39, 3, 'Geometry', 0, '2017-03-27 11:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `subject_group`
--

CREATE TABLE `subject_group` (
  `sGroup_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `group_name` varchar(200) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_group`
--

INSERT INTO `subject_group` (`sGroup_id`, `status`, `group_name`, `created`) VALUES
(1, NULL, 'Literature and Grammar', '2017-03-22 12:26:38'),
(2, NULL, 'Science and Technology', '2017-03-22 12:28:44'),
(3, NULL, 'Mathematics and Algebra', '2017-03-22 12:30:40'),
(4, NULL, 'Economics and Analysis', '2017-03-22 12:37:28');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `class_duration` int(11) NOT NULL,
  `transaction_amount` int(11) NOT NULL,
  `transaction_response` text NOT NULL,
  `payment_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `schedule_id`, `class_duration`, `transaction_amount`, `transaction_response`, `payment_at`) VALUES
(10001, 1, 1, 45, '1', '2017-04-14 10:29:22'),
(10002, 10, 1, 45, '1', '2017-04-14 10:29:24'),
(10003, 11, 1, 45, '1', '2017-04-14 10:29:26');

-- --------------------------------------------------------

--
-- Table structure for table `tutions_applied`
--

CREATE TABLE `tutions_applied` (
  `applied_id` int(11) NOT NULL,
  `tution_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `applied_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tution_requirements`
--

CREATE TABLE `tution_requirements` (
  `tr_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0: requested; 1: assigned; 2: declined; 3: completed;',
  `assigned_to` int(11) DEFAULT '0',
  `title` text NOT NULL,
  `fullName` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `sGroup_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `level` varchar(150) NOT NULL,
  `hours` varchar(150) DEFAULT NULL,
  `description` text NOT NULL,
  `day_and_time` text NOT NULL,
  `mytime` varchar(255) NOT NULL,
  `tution_method` tinyint(1) NOT NULL COMMENT '1: Online; 2: Face to Face; 3: Consultancy;',
  `post_code` varchar(100) NOT NULL,
  `tier` varchar(150) NOT NULL,
  `specific_tutor` int(11) DEFAULT NULL,
  `tutor_response` tinyint(1) NOT NULL COMMENT '1: accepted; 2: declined;',
  `extra_info` text,
  `true_info` tinyint(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tution_requirements`
--

INSERT INTO `tution_requirements` (`tr_id`, `student_id`, `status`, `assigned_to`, `title`, `fullName`, `phone`, `email`, `sGroup_id`, `subject_id`, `level`, `hours`, `description`, `day_and_time`, `mytime`, `tution_method`, `post_code`, `tier`, `specific_tutor`, `tutor_response`, `extra_info`, `true_info`, `created`) VALUES
(1, 19, 0, 2, 'I need online classes for physics', 'Kiara Campbell', '+588-48-4020423', 'rostrum_student@yopmail.com', 0, 5, '1', '1-2 hours/week', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Mostly in evening', '', 1, '654231', '1', 2, 0, NULL, 1, '2017-04-13 06:43:30'),
(2, 19, 1, 2, 'Need urgent tutions for Chemistry', 'Kiara Campbell', '+588-48-4020423', 'rostrum_student@yopmail.com', 0, 6, '1', '1-2 hours/day', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Anytime', '', 1, '897654', '1', 2, 0, 'Not now', 1, '2017-04-13 11:13:24'),
(3, 19, 0, 11, 'Need urgent tutions for Punjabi', 'Kiara Campbell', '+588-48-4020423', 'rostrum_student@yopmail.com', 0, 7, '1', '1-2 hours/day', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2017-04-04T18:30:00.000Z', '', 1, '1', '1', 0, 0, 'Test', 1, '2017-04-17 11:11:36'),
(8, 19, 1, 2, 'I need online classes for Mathematics', 'Kiara Campbell', '+588-48-4020423', 'rostrum_student@yopmail.com', 0, 5, '2', '1-2 hours/week', 'PO', '2017-05-02T15:31:27.647Z', '3:16 PM', 2, 'e11LD', '1', NULL, 0, NULL, 1, '2017-04-20 15:34:00'),
(9, 19, 1, 11, 'I need online classes for Biology', 'Kiara Campbell', '+588-48-4020423', 'rostrum_student@yopmail.com', 0, 10, '2', '4-6 hours/week', '2323232323', '2017-04-21T07:39:48.472Z', '2:09 PM', 1, '123456', '1', 11, 0, 'Nops', 1, '2017-04-21 07:40:43'),
(10, 19, 0, 0, '31322132', 'Kiara Campbell', '+588-48-4020423', 'rostrum_student@yopmail.com', 0, 7, '3', '4-6 hours/week', '543545454', '2017-04-20T07:47:03.327Z', '4:17 PM', 2, '31322332', '1', 3, 0, '332232323535', 1, '2017-04-21 07:47:46'),
(11, 83, 0, 0, 'Test', 'Parmarth Sharma', '1234567890', 'dinesh01@yopmail.com', 0, 5, '1', '1-2 hours/week', 'DemoDemoDemoDemoDemoDemoDemoDemoDemoDemoDemo', '2017-04-22T12:25:34.050Z', '6:10 PM', 2, '123120', '1', 0, 0, 'DemoDemoDemoDemoDemoDemoDemoDemoDemoDemoDemo', 1, '2017-04-21 12:27:23');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_details`
--

CREATE TABLE `tutor_details` (
  `tutor_detail_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `tier` tinyint(1) DEFAULT '0' COMMENT '1: tier 1: 2: tier 2;',
  `ib_yog` date DEFAULT NULL,
  `ib_country` varchar(200) DEFAULT NULL,
  `ib_college` varchar(200) NOT NULL,
  `final_ib_score` int(11) NOT NULL,
  `extended_essay_subject` text,
  `extended_essay_grade` varchar(50) DEFAULT NULL,
  `revision_courses` tinyint(4) DEFAULT NULL,
  `face_to_face` tinyint(4) DEFAULT NULL,
  `online_private_tution` tinyint(4) DEFAULT NULL,
  `other_tutoring_opportunities` tinyint(4) DEFAULT NULL,
  `additional_subject_details` text,
  `university_attending` text,
  `subject_at_university` text,
  `expected_univerisity_yog` date DEFAULT NULL,
  `different_to_ib_revision` text,
  `favorite_ib_teacher` text,
  `short_description` text,
  `right_to_work` int(11) DEFAULT NULL,
  `teaching_country` varchar(255) NOT NULL,
  `eligibility` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutor_details`
--

INSERT INTO `tutor_details` (`tutor_detail_id`, `tutor_id`, `tier`, `ib_yog`, `ib_country`, `ib_college`, `final_ib_score`, `extended_essay_subject`, `extended_essay_grade`, `revision_courses`, `face_to_face`, `online_private_tution`, `other_tutoring_opportunities`, `additional_subject_details`, `university_attending`, `subject_at_university`, `expected_univerisity_yog`, `different_to_ib_revision`, `favorite_ib_teacher`, `short_description`, `right_to_work`, `teaching_country`, `eligibility`) VALUES
(1, 2, 2, '2020-01-01', 'Bermuda', 'Oxford', 45, 'Literature', 'B', 1, 0, 1, 1, 'Please complete the additional information about your IB Diploma where appropriate.', 'UNIVERSITY OR COLLEGE ATTENDING', 'SUBJECT OR SUBJECT AREA STUDYING AT UNIVERSITY', '2020-01-01', 'IF YOU COULD DO SOMETHING DIFFERENT WITH REGARD TO YOUR IB REVISION, WHAT WOULD YOU CHANGE?', 'WHAT DID YOUR FAVOURITE IB TEACHER DO THAT MADE HIM/HER ESPECIALLY GOOD?', 'GIVE US A SHORT DESCRIPTION OF YOURSELF AND WHAT YOU HOPE WILL CHARACTERISE YOU AS A ROSTRUM TUTOR!', 1, '', ''),
(2, 11, 1, '2017-01-01', NULL, 'Jaime Ellis', 46, 'Sit quia sequi occaecat veniam aliquid dolor reiciendis voluptate sint repudiandae et sequi vel sit est tempore quia fuga', NULL, 1, 0, 1, 1, 'Ipsa, ab odio quibusdam dolorum nulla laudantium, similique blanditiis sit, aut ex consequatur.', 'Francis Grant', 'Quaerat', '2018-01-01', 'Ex sapiente ad exercitationem sint sint, corrupti, magna iure aut cum corporis itaque alias modi.', 'Voluptatem enim ad eos sapiente qui error eu ut vel consequat. Consequatur? Voluptatum quo quis optio, tempore, asperiores.', 'Eaque laboris voluptas nihil nulla elit, ut et eum nemo aut.', 1, '', ''),
(3, 18, 0, '2017-01-01', 'Australia', 'Malik Mckay', 39, 'Velit velit vitae natus ad harum eum qui nisi consequat Ab ut non eum temporibus voluptate', 'B', 1, 0, 1, 0, 'Fugiat autem sunt dolore veniam, at voluptatum itaque in fugit.', 'MIT', 'Literature', '2018-01-01', 'Dolorem id saepe magna aut vel dolor non occaecat consequatur, in ipsam dolores ut exercitationem voluptates.', 'Quo fugiat, optio, voluptates voluptate accusamus beatae eos voluptate dolor deserunt minim voluptatem deserunt mollit laudantium, quia.', 'Tempora doloremque adipisci autem accusantium quaerat nihil nisi ut cillum est necessitatibus lorem.', 1, '', ''),
(4, 22, 0, '2017-01-01', 'Nepal', 'Nora Carney', 59, 'Magna architecto doloremque sed ut deserunt corrupti adipisci est consequatur Voluptas quis modi vitae eveniet duis', 'D', 1, 0, 1, NULL, 'Minus duis dolor repellendus. Asperiores officiis reiciendis praesentium deserunt recusandae. Voluptates consequatur asperiores sit, dolorum qui.', 'Sylvia Burnett', 'Do non porro adipisci nihil sed mollitia aperiam libero', '2020-01-01', 'Hic neque quod necessitatibus perferendis explicabo. Nisi rem ipsam vel eum irure ut ab dolores voluptatum voluptate fugiat.', 'Quis tenetur esse sunt autem natus omnis totam voluptas beatae.', 'Tenetur saepe quibusdam qui aut laboris qui et lorem dicta sit necessitatibus explicabo.', 0, '', ''),
(6, 37, 0, '2017-01-01', 'Russian Federation', 'Adara Newman', 43, 'Odit neque inventore minus sit accusantium a in ullam nulla aut', 'D', NULL, 0, 1, 1, 'Aut officiis ipsum saepe fugiat ut natus aliquip expedita quia eligendi.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(7, 38, 0, '2017-01-01', 'Mauritius', 'fdssdf', 45, 'asdfsdf', 'A', 1, 0, 1, 1, 'sdfadf', 'Tallulah Vazquez', 'Est ipsa magni incidunt et eos autem qui est aliqua Odit autem a', '2018-01-01', 'Amet, quos at aut iste sint ab autem fugit, ad quo modi praesentium rerum rem.', 'Eu et sed et aut itaque explicabo. Nesciunt, autem qui voluptatem, id consectetur, quos perferendis quis magni dicta.', 'Quasi unde rem dolor cumque fugit, aliquid sed necessitatibus iste ut quo veritatis vel veniam, sit, id, reprehenderit.', 0, '', ''),
(8, 41, 0, '0000-00-00', NULL, '', 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, '', ''),
(27, 48, 0, '2017-01-01', 'San Marino', 'Omnis doloribus vero quasi deleniti veniam', 45, 'Aut id duis minus sequi dicta non placeat dolorum harum qui quaerat distinctio Autem omnis corrupti est ut exercitationem perferendis', 'B', 1, 0, 1, 1, 'In eius doloremque proident, aliquid dignissimos dolores sunt esse, sit aliquam architecto quo consectetur, exercitationem quo repudiandae cupidatat.', 'Simone Terrell', 'Voluptas est exercitationem voluptates odit laboriosam blanditiis recusandae Sunt ut in minim laudantium in nostrum et eu soluta minim', '2017-01-01', NULL, NULL, 'Provident, sit quia non tempore, deleniti est molestiae ut culpa dignissimos consequatur cupidatat non eius et aliqua. Adipisci labore fugiat.', NULL, 'India', 'Citizen'),
(28, 50, 0, '2017-01-01', 'India', 'College', 45, 'gfhgf', 'A', 1, 1, NULL, NULL, NULL, 'sdfsd', 'sdf', '2017-01-01', NULL, NULL, 'ghfhfh', NULL, 'India', 'Citizen'),
(31, 0, 2, NULL, NULL, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_subjects`
--

CREATE TABLE `tutor_subjects` (
  `tutor_subject_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `sGroup_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `subject_level` int(11) NOT NULL,
  `subject_score` int(11) NOT NULL,
  `teaching_level` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutor_subjects`
--

INSERT INTO `tutor_subjects` (`tutor_subject_id`, `tutor_id`, `sGroup_id`, `subject_id`, `subject_level`, `subject_score`, `teaching_level`, `created`) VALUES
(1, 18, 2, 6, 1, 7, 0, '2017-03-24 05:04:21'),
(2, 18, 1, 8, 2, 7, 0, '2017-03-24 05:04:21'),
(3, 18, 1, 10, 2, 7, 0, '2017-03-24 05:04:21'),
(4, 22, 1, 6, 2, 5, 2, '2017-03-29 10:57:35'),
(5, 22, 2, 5, 2, 6, 0, '2017-03-29 10:57:35'),
(6, 22, 3, 38, 1, 6, 0, '2017-03-29 10:57:35'),
(7, 37, 1, 8, 1, 4, 2, '2017-04-03 04:50:26'),
(8, 37, 1, 8, 1, 6, 0, '2017-04-03 04:50:26'),
(9, 37, 1, 10, 1, 7, 1, '2017-04-03 04:50:26'),
(10, 38, 1, 8, 1, 6, 0, '2017-04-03 05:08:26'),
(11, 38, 1, 10, 1, 6, 0, '2017-04-03 05:08:26'),
(12, 38, 2, 6, 1, 7, 0, '2017-04-03 05:08:26'),
(13, 38, 1, 8, 1, 6, 0, '2017-04-03 05:08:57'),
(14, 38, 1, 10, 1, 6, 0, '2017-04-03 05:08:57'),
(15, 38, 2, 6, 1, 7, 0, '2017-04-03 05:08:57'),
(16, 38, 1, 8, 1, 6, 0, '2017-04-03 05:10:13'),
(17, 38, 1, 10, 1, 6, 0, '2017-04-03 05:10:13'),
(18, 38, 2, 6, 1, 7, 0, '2017-04-03 05:10:13'),
(19, 41, 1, 8, 1, 6, 0, '2017-04-03 13:42:47'),
(20, 41, 2, 5, 1, 6, 0, '2017-04-03 13:42:47'),
(21, 41, 1, 10, 1, 6, 0, '2017-04-03 13:42:48'),
(22, 2, 1, 8, 1, 6, 0, '2017-04-03 13:42:47'),
(23, 2, 2, 5, 1, 6, 0, '2017-04-03 13:42:47'),
(24, 2, 1, 10, 1, 6, 0, '2017-04-03 13:42:48'),
(25, 48, 0, 8, 1, 7, 1, '2017-04-10 11:09:51'),
(26, 48, 0, 6, 1, 6, 0, '2017-04-10 11:09:51'),
(27, 48, 0, 10, 1, 6, 1, '2017-04-10 11:09:51'),
(28, 48, 0, 5, 1, 6, 0, '2017-04-10 11:09:57'),
(29, 48, 0, 6, 1, 6, 0, '2017-04-10 11:09:57'),
(30, 48, 0, 10, 1, 6, 1, '2017-04-10 11:09:57'),
(31, 48, 0, 5, 1, 6, 0, '2017-04-10 11:12:09'),
(32, 48, 0, 6, 1, 6, 0, '2017-04-10 11:12:09'),
(33, 48, 0, 10, 1, 6, 1, '2017-04-10 11:12:09'),
(34, 50, 0, 5, 1, 5, 1, '2017-04-10 13:47:04'),
(35, 50, 0, 6, 1, 2, 1, '2017-04-10 13:47:04'),
(36, 50, 0, 6, 1, 6, 0, '2017-04-10 13:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `usermeta`
--

CREATE TABLE `usermeta` (
  `usermeta_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_img` varchar(200) DEFAULT NULL,
  `resume` varchar(255) NOT NULL DEFAULT '0',
  `gender` tinyint(1) DEFAULT NULL COMMENT '0: Male; 1: Female',
  `dob` date DEFAULT NULL,
  `secondary_email` varchar(200) DEFAULT NULL,
  `secondary_phone` varchar(200) DEFAULT NULL,
  `how_abt_rostrum` text,
  `stripe_customer_id` text,
  `card_ending` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usermeta`
--

INSERT INTO `usermeta` (`usermeta_id`, `user_id`, `profile_img`, `resume`, `gender`, `dob`, `secondary_email`, `secondary_phone`, `how_abt_rostrum`, `stripe_customer_id`, `card_ending`) VALUES
(1, 1, 'profile_img_1489756393.jpg', '', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 'profile_img_1489571082.jpg', '', 1, '2017-03-04', 'rostrum_tutor@yopmail.com', '+941-86-1754543', 'HOW DID YOU FIND OUT ABOUT ROSTRUM HOW DID YOU FIND OUT ABOUT ROSTRUM', NULL, NULL),
(8, 11, NULL, '', 0, '1992-01-04', 'tutor_rostrum1@yopmail.com', '+324-40-4814896', 'Told by friend', NULL, NULL),
(9, 18, 'profile_img_1492003477.jpg', '', 1, '1992-01-04', 'tutor4_sec@hotmail.com', '+897-36-9620603', 'Newspaper', NULL, NULL),
(10, 17, NULL, '', 1, '1992-01-04', 'tutor4_sec@hotmail.com', '+897-36-9620603', 'Newspaper', NULL, NULL),
(11, 19, 'profile_img_1490787090.jpg', '', NULL, NULL, NULL, NULL, NULL, 'cus_ASgwgvMpgC4NZA', 4242),
(12, 21, 'profile_img_1490771448.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 22, NULL, '', 0, '2017-03-30', 'tutor_rostrum5@yopmail.com', '+982-478-2748', 'asasd asd asd', NULL, NULL),
(14, 37, NULL, '', 0, '1992-01-04', 'imtutor@yopmail.com', '+789-289-9845', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi id perspiciatis facilis nulla possimus quasi, amet qui. Ea rerum officia, aspernatur nulla neque nesciunt alias repudiandae doloremque, dolor, quam nostrum laudantium earum illum odio quasi excepturi mollitia corporis quas ipsa modi nihil, ad ex tempore.', NULL, NULL),
(15, 38, NULL, '', 0, '2017-05-01', 'asdasd@yopmail.com', '432645435235', 'seg sfgd df', NULL, NULL),
(16, 41, NULL, '', 0, '1990-01-04', 'testtutor@yopmail.com', '+897-455-6544', 'Newspaper', NULL, NULL),
(17, 42, 'profile_img_1491479849.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 48, NULL, '', 0, '2017-07-03', 'kidupuju@gmail.com', '+857-56-5427132', 'Facebook', NULL, NULL),
(19, 49, 'profile_img_1491831852.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 50, 'profile_img_1491832150.jpg', 'resume1491896159.pdf', 0, '2017-02-05', NULL, NULL, 'Facebook', NULL, NULL),
(21, 69, NULL, '0', 0, '2017-03-29', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `role` tinyint(1) NOT NULL COMMENT '1: student; 2:   tutor; 3:  admin;',
  `status` tinyint(1) DEFAULT '0' COMMENT '0: pending; 1: approved; 2: submitted; 3: blocked;',
  `email` varchar(200) NOT NULL,
  `firstname` varchar(155) NOT NULL,
  `lastname` varchar(155) NOT NULL,
  `phone` varchar(155) NOT NULL,
  `city` text NOT NULL,
  `password` text NOT NULL,
  `rememberToken` varchar(200) NOT NULL,
  `rememberMe` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `reg_id`, `role`, `status`, `email`, `firstname`, `lastname`, `phone`, `city`, `password`, `rememberToken`, `rememberMe`, `created`) VALUES
(1, 1110, 3, 1, 'admin@yopmail.com', 'Admin', 'Rostrum', '+588-48-4020423', 'Rerum est est esse id optio autem ad in laborum Totam animi hic facilis', '$2y$10$CCG5ftLjNBzfIkvKYW591.Wx.PsoSvRMD9AgsxqHladcecTRkxXpi', '270191', '$2y$10$dzqcwSrFsZtW6oBc/jPhk.7dtcGtSPaSlmsjoZwrpdafN6WLMp.0S', '2017-02-28 12:04:25'),
(2, 1110, 2, 1, 'rostrum_tutor@yopmail.com', 'Simon', 'Marka', '+941-86-1754543', 'Voluptas', '$2y$10$CCG5ftLjNBzfIkvKYW591.Wx.PsoSvRMD9AgsxqHladcecTRkxXpi', '543520', '$2y$10$8CCBKQw7Y74Kko7u4VN97eWm/ZELRGIiWTXsT5aMA7zvBOwXwLsk2', '2017-02-28 12:57:06'),
(11, 1110, 2, 1, 'tutor_rostrum1@gmail.com', 'Raja', 'Myers', '+324-40-4814896', 'Bermingham', '$2y$10$qAd1H9ORvDpFmb7Nc2jnz.X4eU41VTEbWjbDXdaXutKIEFF0TPIVW', '', '', '2017-03-17 05:03:01'),
(17, 11117, 2, 1, 'tutor_rostrum3@yopmail.com', 'Marka', 'Tyson', '+449-96-8506645', 'Durban', '$2y$10$NIaJ9KYUYPd.lpQFSFnpxOJHznkvc/d6sw5tUksCQ2vshlzwipdey', '', '', '2017-03-17 05:49:51'),
(18, 11118, 2, 1, 'tutor_rostrum4@yopmail.com', 'Alika', 'Jenkins', '+897-36-9620603', 'Berlin', '$2y$10$CCG5ftLjNBzfIkvKYW591.Wx.PsoSvRMD9AgsxqHladcecTRkxXpi', '', '', '2017-03-17 05:51:37'),
(19, 1110, 1, 1, 'rostrum_student@yopmail.com', 'Kiara', 'Campbell', '+588-48-4020423', 'Rerum est est esse id optio autem ad in laborum Totam animi hic facilis', '$2y$10$CCG5ftLjNBzfIkvKYW591.Wx.PsoSvRMD9AgsxqHladcecTRkxXpi', '270191', '$2y$10$7M/uZ6F9vRg6i6zMN1hV1ubw9ulUSMGbq0aKOOB2QQdrLFgCOjhUS', '2017-02-28 12:04:25'),
(20, 10020, 1, 0, 'rostrum_student1@yopmail.com', 'Manvi', 'Jim', '+345-344-2342', 'Liverpool', '$2y$10$CCG5ftLjNBzfIkvKYW591.Wx.PsoSvRMD9AgsxqHladcecTRkxXpi', '', '', '2017-03-29 07:03:25'),
(21, 11121, 1, 0, 'rostrum_student2@yopmail.com', 'Jonk', 'Raft', '+234-454-3957', 'Manchester', '$2y$10$ku30iZNlDp7GQyxRyzISkuI3xIsvw8QjXZwq/CyKBd4eyxyNCh5Fm', '', '', '2017-03-29 07:05:59'),
(22, 10022, 2, 2, 'tutor_rostrum5@yopmail.com', 'Nish', 'Sung', '+982-478-2748', 'Pitsburg', '$2y$10$nhQodE0lEnm6ZbsoIcjMqOt5P97vXy8MriQafZoXzg0wWZxye.7BW', '', '', '2017-03-29 07:54:22'),
(23, 10023, 2, 0, 'yatharth016@gmail.com', 'Yatharth', 'Gulati', '07448402297', 'London', '$2y$10$LervJ4vkZJJ0CMv.vvdjleXdOG/mH3JGnkzh1/22Cv8OFxWHG8JWS', '', '', '2017-03-29 18:16:45'),
(24, 0, 1, 1, 'ddsjhj@yopmail.com', 'without', '', '21312382198', '', '$2y$10$cexZlcRtfpQc9ST29OSBwOIjrixgz7WVRgd.d/qlLv7VRpOd4un2e', '', '', '2017-03-31 04:58:36'),
(25, 0, 1, 1, 'kabuxuwaty@yahoo.com', 'Cameron', 'Caldwell', '+544-40-5518257', '', '$2y$10$GqlToxRtvwpq5BgzSnp3LOjXI5XW08rYPiIz4GOsxm78cR.q/suHG', '', '', '2017-03-31 05:29:59'),
(26, 0, 1, 1, 'modopolyra@yahoo.com', 'Hannah', 'Cross', '+877-20-8990358', '', '$2y$10$eDnDSgy.6gz/sP10XwugVOnzlDtnMuQj2s3YaGM.RcTFom.AIrBg6', '', '', '2017-03-31 06:16:33'),
(27, 0, 1, 1, 'wovy@hotmail.com', 'Wendy', 'Pennington', '+457-14-5851518', '', '$2y$10$Sflu/ETaeuCx..CBrMSBXe3936FpjS4BHEJZ5wIA.WW2Fjx8cJ8vu', '', '', '2017-03-31 06:22:48'),
(28, 0, 1, 1, 'teresip@hotmail.com', 'Moses', 'Jones', '+813-37-6751695', '', '$2y$10$/mErXFN069Tz7s8PaBlrCuvdR9HZ/2gwkyg2jkNBjPh.XlNDYR6cK', '', '', '2017-03-31 06:34:56'),
(29, 0, 1, 1, 'kipa@yahoo.com', 'Noah', 'Haynes', '+583-72-1946423', '', '$2y$10$hX2QCLrr/bVemhmJ4z2YGugbwWflETQFdBEw4ZKqxIw80NlUuqEfm', '', '', '2017-03-31 06:35:33'),
(30, 0, 1, 1, 'jatixaj@yahoo.com', 'Colton', 'Richmond', '+447-49-6658136', '', '$2y$10$hFh26MPUjmDn89Sc7MYueOjypq8MMwyGT5YM76fIVBfQLUjI0bFlG', '', '', '2017-03-31 06:36:00'),
(31, 0, 1, 1, 'doluz@hotmail.com', 'Nathan', 'Stafford', '+452-64-4554344', '', '$2y$10$/seqA94oyf45tgJ1.WatsOdD0kWW15wBDG1cKx5AoDzC4AvmIIKom', '', '', '2017-03-31 06:36:30'),
(32, 0, 1, 1, 'qecelepa@gmail.com', 'Kyle', 'Day', '+986-24-9494139', '', '$2y$10$os4.gLiRHSEx3iirjF3Tz.cZBVy9jcB.wlC1vEoPUwSC8MhJAldwW', '', '', '2017-03-31 06:37:33'),
(33, 0, 1, 1, 'fajacinon@gmail.com', 'Ori', 'Solis', '+955-59-8164808', '', '$2y$10$zBSXS1MSWr7B1FzcO17NJ.q43j8O4whwXngpA4F2y/1gvFkOWwDdi', '', '', '2017-03-31 06:43:33'),
(34, 0, 1, 1, 'kyja@hotmail.com', 'Dana', 'Serrano', '+832-70-6136481', '', '$2y$10$7sErNhNDDAzyb.ID7OfA7O6XuQrWzEG.kUYLjf8p7FHxCbtuoj/Ei', '', '', '2017-03-31 06:47:41'),
(35, 0, 1, 1, 'sycedo@hotmail.com', 'Dorian', 'Maldonado', '+846-39-2267968', '', '$2y$10$AJSIGqAPVeZ/MUFq6U8QN.E.qGLd4fs/PtMGs6d2bW7zJjCo5HiEy', '', '', '2017-03-31 06:51:23'),
(36, 11136, 1, 0, 'teststudent@yopmail.com', 'test', 'student', '32234234234', 'melsss', '$2y$10$rO3FRcqkl3E7EbxIa1.zqukKj4nSJKFnrKrNcYjd0q6nu2UJ9xSz2', '', '', '2017-03-31 13:10:41'),
(37, 10037, 2, 0, 'imnottutor@yopmail.com', 'I\'m', 'Tutor', '+789-289-9845', 'Chandigarh', '$2y$10$i/DZGtsE4A1tHyxEUM9vheOButk4c0o0spzNLoAVBeRXTRJwI/aHm', '', '', '2017-04-03 04:48:23'),
(38, 10038, 2, 2, 'asdasd@yopmail.com', 'asdsad', 'asdasd', '432645435235', 'Adasdasd', '$2y$10$5J08tWXnF.2WavdT2deo..jroaaCyDVSDUyKbiTjylz9lMNo5yvZi', '', '', '2017-04-03 05:07:16'),
(39, 0, 1, 1, 'directrequest@yopmail.com', 'direct', '', '9457834957', '', '$2y$10$Uv0gg20d1yuLoBvMt/HTNeUhasMs2JbGEQiIpu83idbyx4KN6PLJu', '', '', '2017-04-03 05:50:20'),
(40, 11140, 1, 0, 'tstingstuden@yopmail.com', 'Testing', 'Student', '+888-6548-5231', 'dummystate', '$2y$10$EqyvWXQDpLR4Je29DRQXYuT9HTWHI8/ciC8Zmp9RA4Ogi5OrkKGUe', '', '', '2017-04-03 12:59:18'),
(41, 10041, 2, 1, 'testtutor@yopmail.com', 'Tutor', 'test', '+897-455-6544', 'dummycity', '$2y$10$DUzmD2q.zi4UfPtXoR2cT.R9D/jCDsQQhZfKOqj7YnV/2cglXnFem', '', '', '2017-04-03 13:31:57'),
(42, 11142, 1, 0, 'jstudent@yopmail.com', 'Junior', 'Student', '+234-225-9732', 'Delhi', '$2y$10$0/shRabv7T0MQmAMzF/NGeQM2eS9a3Td4h8Ogh1PbbgABtx4PeZKS', '', '', '2017-04-06 11:57:12'),
(43, 11143, 1, 0, 'kujut@hotmail.com', 'Yuli', 'Berger', '+194-54-1530947', 'Ut voluptas corrupti recusandae Id sunt blanditiis fugiat id atque aliquip repellendus Exercitationem et', '$2y$10$6O7snEyg3WT5FPbOf2u7jeRN7c7Zjr.2KUwDH4R9Nq5JjOLLgpxRS', '', '', '2017-04-07 06:17:59'),
(44, 10044, 2, 0, 'jajicupa@gmail.com', 'Cynthia', 'Mclaughlin', '+126-72-2908860', 'Facilis voluptatum iste ab voluptatem ut', '$2y$10$IFIHDhBOHakSALQxnuejH.uenM.ad04vrgrRnvZ0WqfCgM/StLFV2', '', '', '2017-04-07 06:26:46'),
(45, 11145, 1, 0, 'qesi@yopmail.com', 'Noelle', 'Huffman', '+593-30-9067367', 'hdgfsjdfh', '$2y$10$4FY5aEPkKTlKGmVXDSBoDeKto7Xm44jwradtUp7APxQ5Cg7t9.r9O', '', '', '2017-04-10 10:11:12'),
(46, 10046, 2, 0, 'fimiryfac@yahoo.com', 'Kadeem', 'Ford', '+572-72-6420367', 'Culpa qui quod perspiciatis molestiae accusantium omnis expedita incidunt deserunt quibusdam occaecat cumque amet dolor aliquid recusandae Debitis aut', '$2y$10$frgvLMQW.lFgd7H0Xgg1l.cPG1/SDDO0RkDiR28P264B2glIcVS1G', '', '', '2017-04-10 10:15:08'),
(47, 10047, 2, 0, 'asdasd@fdsdfsd.hhh', 'asdasd', 'asdasd', '2313123', 'dfsfsdf', '$2y$10$hj0IH1Jq1HC2vDZu57EcIuiArMmXvu9.X6ApcL3tOA5eKQOm0qOx6', '', '', '2017-04-10 10:33:18'),
(48, 10048, 2, 0, 'newtutor@yopmail.com', 'Dai', 'Neal', '+832-33-3318931', 'fsdfsdf', '$2y$10$VcL8Yc90jhn/nQjV9nhVfeBHOCAJVpFw1f1CoGtI4iPEQxqaoCzjO', '', '', '2017-04-10 10:35:00'),
(49, 11149, 1, 1, 'imstudent@yopmail.com', 'Im', 'Student', '43234234234', 'sdasdasd', '$2y$10$PGb6vgdxmFsMG0EYUMmo3.zgMct2awP5zhtj6RTlwWilBa3kl/qm2', '', '', '2017-04-10 13:38:44'),
(50, 10050, 2, 1, 'imtutor@yopmail.com', 'Im', 'Tutor', '984723498273', 'hjksdfgjh', '$2y$10$Ntp9BKm41l.eP0MtFUXecO2diHIcoHQNXvlnTiXz2/OzUIJh23S..', '', '', '2017-04-10 13:45:26'),
(51, 0, 1, 1, 'junkotabie@yopmail.com', 'Junko', 'Tabie', '+832-422-3811', '', '$2y$10$Ntp9BKm41l.eP0MtFUXecO2diHIcoHQNXvlnTiXz2/OzUIJh23S..', '', '', '2017-04-11 10:46:14'),
(52, 11118, 2, 1, 'tutor_rostrum4@yopmail.com', 'Alika1', 'Jenkins', '+897-36-9620603', 'Berlin', '$2y$10$CCG5ftLjNBzfIkvKYW591.Wx.PsoSvRMD9AgsxqHladcecTRkxXpi', '', '', '2017-03-17 05:51:37'),
(53, 11118, 2, 1, 'tutor_rostrum4@yopmail.com', 'Alika', 'Jenkins', '+897-36-9620603', 'Berlin', '$2y$10$CCG5ftLjNBzfIkvKYW591.Wx.PsoSvRMD9AgsxqHladcecTRkxXpi', '', '', '2017-03-17 05:51:37'),
(54, 0, 1, 1, 'letsstart@yopmail.com', 'lets', 'start', '8374628374', '', '$2y$10$/.pSyn/9GmHMgHcRDCbgO.B7p4k2wbilnrKvHJdLBiXImHHcU51xK', '', '', '2017-04-11 12:14:18'),
(55, 11155, 1, 1, 'cila@yahoo.com', 'Ira', 'Flowers', '+939-29-1266294', '', '$2y$10$Cm4vHXDo.ebEZejmthUbke1r63zv/prSk.XL36EeKwYsHgbNCDiPS', '', '', '2017-04-11 12:44:02'),
(56, 11156, 1, 1, 'sijimazyv@gmail.com', 'Wang', 'Savage', '+919-19-3556357', '', '$2y$10$Xm8DDCWTb2Y8bpe7tZaUl.NUQUwk0hm6xYbkeC6ejiB.MlYfI4/i.', '', '', '2017-04-11 12:44:28'),
(57, 11157, 1, 1, 'tamagy@gmail.com', 'Tamara', 'Hurley', '+455-35-2737002', '', '$2y$10$Ntp9BKm41l.eP0MtFUXecO2diHIcoHQNXvlnTiXz2/OzUIJh23S..', '', '', '2017-04-11 12:52:34'),
(58, 11158, 1, 1, 'tysyc@gmail.com', 'Nash', 'Olsen', '+258-21-3993842', 'Debitis aliqua. Duis magna cupidatat quod aliquip velit, vel non minima fugiat.', '$2y$10$7/wfEvaGVm4ARbLKa1fxDOAaVbV6UzZDCybuMQYtugZlRPWTauq2i', '', '', '2017-04-11 13:17:28'),
(59, 11159, 1, 1, 'judopekas@gmail.com', 'Jacob', 'Washington', '+372-92-1475763', 'Consequuntur ad vero est labore optio, quis rerum totam laborum dolor reprehenderit consectetur est.', '$2y$10$h3tt6aRuNo7PoUkG9EI6RusHvDtA4X8OFnA3/hLeoaijz3yD3OuXS', '', '', '2017-04-11 13:18:33'),
(60, 11160, 1, 1, 'vuxuhewuj@gmail.com', 'Piper', 'Blackburn', '+875-84-2684418', 'Consequuntur dolorem modi harum molestiae qui qui dolor aut dolor sint vel sint.', '$2y$10$LsFyS6m0GST0IkinZTJVa.R18zNkQtWWugcVClRELayseoRzourHi', '', '', '2017-04-11 13:20:09'),
(61, 11161, 1, 1, 'pidacy@yahoo.com', 'Dakota', 'Hogan', '+458-38-9684673', 'Ut aut dolorum sint qui similique accusantium ad et quis consectetur, non ex quae beatae veniam, officia fuga. Est ipsa.', '$2y$10$pxS1wfbmBKTqVMdxEoL/mOIHC6JA304p2m6uDKeEpPxJKB6pqUz9a', '', '', '2017-04-11 13:20:26'),
(62, 11162, 1, 1, 'xytiqewijo@yahoo.com', 'Sydnee', 'Berg', '+832-80-4709480', 'Ex quia voluptatum et voluptas est, sint similique ipsum dolor ad ullam sint quam a qui nihil tempora nobis.', '$2y$10$.j.3zjy4.bO0dXcejtGWQu.Wx44l3SyQaimRLET5ivpvzRlpaEjq2', '', '', '2017-04-11 13:20:56'),
(63, 11163, 1, 1, 'jizacok@hotmail.com', 'Isabella', 'Gibbs', '+164-23-6087199', 'Placeat, veniam, dicta labore explicabo. Quo magni corrupti, iusto est labore est accusamus.', '$2y$10$IHUPQTAirDl3XPu1zpyQKuDVfrYc6E5o5AeIJQKmAXd0Rn.vThmua', '', '', '2017-04-11 13:22:53'),
(64, 11164, 1, 1, 'bericili@yahoo.com', 'Ria', 'Lowe', '+311-31-5072410', 'Sit, itaque et qui enim rem consequatur, accusamus molestiae ullamco in commodo aspernatur voluptate totam.', '$2y$10$LSXUWlAZnGf8uh3AxfEUI.S7bWGx88sPd6bahI/F7pOAXMhXE8N5K', '', '', '2017-04-11 13:26:13'),
(65, 11165, 1, 1, 'goja@gmail.com', 'Lane', 'Beck', '+614-39-2705878', 'Dolor dicta nemo consequatur? Do ipsum id nisi molestias cillum deleniti.', '$2y$10$SOWYfSGpCEU7pxgF7rWNZ.Y0OCpG89ZSV2/GZGQe/T3ttFpxVJHAa', '', '', '2017-04-11 13:27:13'),
(66, 11166, 1, 1, 'kaqul@gmail.com', 'Hop', 'Murray', '+684-43-7436168', 'Fugiat odit fugit, minima laudantium, ipsum sunt vel aut exercitationem quia.', '$2y$10$YRjCX1340D/5P4eeDjcvs.GwvdgdS6GziD330.SGxZL8pQiLsgHY2', '', '', '2017-04-11 13:29:33'),
(67, 11167, 1, 1, 'qasejeky@yahoo.com', 'Martin', 'Townsend', '+862-28-3452312', 'Et aspernatur dolorem eos, facilis ut error est maxime in inventore eveniet, ut occaecat aute doloribus maiores recusandae. Dolorem nisi.', '$2y$10$Fn0EEFfzM1/dDgbKbRR1Oezh8vxcX.9tRolRY8yebWNYVBV1eG.L6', '', '', '2017-04-11 13:32:19'),
(68, 11168, 1, 1, 'pukemedovi@gmail.com', 'Josiah', 'Shelton', '+424-22-9471632', 'Sunt, ducimus, temporibus quia vitae impedit, est ex maiores nihil exercitationem similique atque voluptate id ex harum est.', '$2y$10$Ntp9BKm41l.eP0MtFUXecO2diHIcoHQNXvlnTiXz2/OzUIJh23S..', '', '', '2017-04-11 13:34:40'),
(69, 11169, 2, 0, 'dinesh.kumar0001@yopmail.com', 'dinesh', 'kumar', '9041209587', 'mohali', '$2y$10$0FuWMLfl5tkd528MyI/6lueta0617l63h6gt6emNltflRWtgGYoYa', '', '', '2017-04-17 09:00:16'),
(79, 11179, 2, 0, 'tutor123@yopmail.com', 'Tutor', 'Dev', '9987755462', '123456', '$2y$10$IycP4ZpxPra.lvf9aJW1Yezm7uZ5MvhMGqp8oi1uVxqSYDmb1oXpS', '', '', '2017-04-19 13:13:31'),
(80, 10080, 1, 1, 'dinesh0001@yopmail.com', 'Dinesh', 'Kumar', '9876543210', 'chandigarh', '$2y$10$Bywar9IJEJhKceEz9xvKjubKFnZf2mTmvE3O1EAF.S89HwBiKfXuy', '', '', '2017-04-20 13:11:57'),
(81, 11181, 2, 0, 'dinesh001@yopmail.com', 'Chinu', 'Sharma', '9041209587', 'chandigarh', '$2y$10$TsMpAQ9GMTTrCCde80KV0upgIjiMRm4FKsSA2CZFr/CpqGK2UNyHS', '', '', '2017-04-20 13:13:28'),
(82, 10082, 1, 1, 'dinesh1@yopmail.com', 'KK', 'Jason', '9041209587', 'chandigarh', '$2y$10$IB9dhgP2lZJ7ndVQukPl3uHtLBhLzghdbymagJIwHYbakdxPF9SIi', '', '', '2017-04-20 13:15:23'),
(83, 10083, 1, 1, 'dinesh01@yopmail.com', 'Parmarth', 'Sharma', '1234567890', 'chandigarh', '$2y$10$qx/Ku6zOTq2O8z24jiYsl.RTDN98OaADaBE4xTV1EcgBvp2VPsS8W', '', '', '2017-04-21 12:21:50'),
(84, 11184, 2, 0, 'dinesh0011@yopmail.com', 'Sanjeev', 'Kumar', '9041209587', 'chandigarh', '$2y$10$nkbxezCAzrKiOLjfkyctYOuAfvGR/TUoBCqmd6ijaxpM/vPFqb3uW', '', '', '2017-04-21 12:23:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cometchat`
--
ALTER TABLE `cometchat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `to` (`to`),
  ADD KEY `from` (`from`),
  ADD KEY `direction` (`direction`),
  ADD KEY `read` (`read`),
  ADD KEY `sent` (`sent`);

--
-- Indexes for table `cometchat_announcements`
--
ALTER TABLE `cometchat_announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `to` (`to`),
  ADD KEY `time` (`time`),
  ADD KEY `to_id` (`to`,`id`);

--
-- Indexes for table `cometchat_block`
--
ALTER TABLE `cometchat_block`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fromid` (`fromid`),
  ADD KEY `toid` (`toid`),
  ADD KEY `fromid_toid` (`fromid`,`toid`);

--
-- Indexes for table `cometchat_bots`
--
ALTER TABLE `cometchat_bots`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `cometchat_chatroommessages`
--
ALTER TABLE `cometchat_chatroommessages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `chatroomid` (`chatroomid`),
  ADD KEY `sent` (`sent`);

--
-- Indexes for table `cometchat_chatrooms`
--
ALTER TABLE `cometchat_chatrooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lastactivity` (`lastactivity`),
  ADD KEY `createdby` (`createdby`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `cometchat_chatrooms_users`
--
ALTER TABLE `cometchat_chatrooms_users`
  ADD PRIMARY KEY (`userid`,`chatroomid`) USING BTREE,
  ADD KEY `chatroomid` (`chatroomid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `userid_chatroomid` (`chatroomid`,`userid`);

--
-- Indexes for table `cometchat_colors`
--
ALTER TABLE `cometchat_colors`
  ADD UNIQUE KEY `color_index` (`color_key`,`color`);

--
-- Indexes for table `cometchat_guests`
--
ALTER TABLE `cometchat_guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cometchat_languages`
--
ALTER TABLE `cometchat_languages`
  ADD UNIQUE KEY `lang_index` (`lang_key`,`code`,`type`,`name`) USING BTREE;

--
-- Indexes for table `cometchat_session`
--
ALTER TABLE `cometchat_session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `cometchat_settings`
--
ALTER TABLE `cometchat_settings`
  ADD PRIMARY KEY (`setting_key`),
  ADD KEY `key` (`setting_key`);

--
-- Indexes for table `cometchat_status`
--
ALTER TABLE `cometchat_status`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `typingto` (`typingto`),
  ADD KEY `typingtime` (`typingtime`);

--
-- Indexes for table `cometchat_users`
--
ALTER TABLE `cometchat_users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `cometchat_videochatsessions`
--
ALTER TABLE `cometchat_videochatsessions`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`),
  ADD KEY `identity` (`identity`),
  ADD KEY `timestamp` (`timestamp`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `notification_assigned_class`
--
ALTER TABLE `notification_assigned_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `subject_group`
--
ALTER TABLE `subject_group`
  ADD PRIMARY KEY (`sGroup_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `tutions_applied`
--
ALTER TABLE `tutions_applied`
  ADD PRIMARY KEY (`applied_id`);

--
-- Indexes for table `tution_requirements`
--
ALTER TABLE `tution_requirements`
  ADD PRIMARY KEY (`tr_id`);

--
-- Indexes for table `tutor_details`
--
ALTER TABLE `tutor_details`
  ADD PRIMARY KEY (`tutor_detail_id`);

--
-- Indexes for table `tutor_subjects`
--
ALTER TABLE `tutor_subjects`
  ADD PRIMARY KEY (`tutor_subject_id`);

--
-- Indexes for table `usermeta`
--
ALTER TABLE `usermeta`
  ADD PRIMARY KEY (`usermeta_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cometchat`
--
ALTER TABLE `cometchat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cometchat_announcements`
--
ALTER TABLE `cometchat_announcements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cometchat_block`
--
ALTER TABLE `cometchat_block`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cometchat_bots`
--
ALTER TABLE `cometchat_bots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cometchat_chatroommessages`
--
ALTER TABLE `cometchat_chatroommessages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cometchat_chatrooms`
--
ALTER TABLE `cometchat_chatrooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cometchat_guests`
--
ALTER TABLE `cometchat_guests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000007;
--
-- AUTO_INCREMENT for table `cometchat_users`
--
ALTER TABLE `cometchat_users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `notification_assigned_class`
--
ALTER TABLE `notification_assigned_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `subject_group`
--
ALTER TABLE `subject_group`
  MODIFY `sGroup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10004;
--
-- AUTO_INCREMENT for table `tutions_applied`
--
ALTER TABLE `tutions_applied`
  MODIFY `applied_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tution_requirements`
--
ALTER TABLE `tution_requirements`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tutor_details`
--
ALTER TABLE `tutor_details`
  MODIFY `tutor_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tutor_subjects`
--
ALTER TABLE `tutor_subjects`
  MODIFY `tutor_subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `usermeta`
--
ALTER TABLE `usermeta`
  MODIFY `usermeta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
