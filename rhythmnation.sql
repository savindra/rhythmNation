-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2015 at 12:03 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rhythmnation`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
`address_id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `company` varchar(32) DEFAULT NULL,
  `address1` varchar(32) NOT NULL,
  `address2` varchar(32) NOT NULL,
  `city` varchar(32) NOT NULL,
  `country_id` int(11) NOT NULL,
  `postcode` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `firstname`, `lastname`, `company`, `address1`, `address2`, `city`, `country_id`, `postcode`) VALUES
(3, 'Savindra', 'Perera', '', '13/A', 'Keppetipola Mawatha', 'kolonnawa', 196, 10600);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`category_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_desc` varchar(32) DEFAULT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `image`, `category_desc`, `date_added`) VALUES
(1, NULL, 'Guitars', '2015-04-16'),
(2, NULL, 'Drum Sets', '2015-04-16'),
(3, NULL, 'Keyboards', '2015-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
`country_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `iso_code` varchar(2) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=258 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `name`, `iso_code`) VALUES
(1, 'Afghanistan', 'AF'),
(2, 'Albania', 'AL'),
(3, 'Algeria', 'DZ'),
(4, 'American Samoa', 'AS'),
(5, 'Andorra', 'AD'),
(6, 'Angola', 'AO'),
(7, 'Anguilla', 'AI'),
(8, 'Antarctica', 'AQ'),
(9, 'Antigua and Barbuda', 'AG'),
(10, 'Argentina', 'AR'),
(11, 'Armenia', 'AM'),
(12, 'Aruba', 'AW'),
(13, 'Australia', 'AU'),
(14, 'Austria', 'AT'),
(15, 'Azerbaijan', 'AZ'),
(16, 'Bahamas', 'BS'),
(17, 'Bahrain', 'BH'),
(18, 'Bangladesh', 'BD'),
(19, 'Barbados', 'BB'),
(20, 'Belarus', 'BY'),
(21, 'Belgium', 'BE'),
(22, 'Belize', 'BZ'),
(23, 'Benin', 'BJ'),
(24, 'Bermuda', 'BM'),
(25, 'Bhutan', 'BT'),
(26, 'Bolivia', 'BO'),
(27, 'Bosnia and Herzegovina', 'BA'),
(28, 'Botswana', 'BW'),
(29, 'Bouvet Island', 'BV'),
(30, 'Brazil', 'BR'),
(31, 'British Indian Ocean Territory', 'IO'),
(32, 'Brunei Darussalam', 'BN'),
(33, 'Bulgaria', 'BG'),
(34, 'Burkina Faso', 'BF'),
(35, 'Burundi', 'BI'),
(36, 'Cambodia', 'KH'),
(37, 'Cameroon', 'CM'),
(38, 'Canada', 'CA'),
(39, 'Cape Verde', 'CV'),
(40, 'Cayman Islands', 'KY'),
(41, 'Central African Republic', 'CF'),
(42, 'Chad', 'TD'),
(43, 'Chile', 'CL'),
(44, 'China', 'CN'),
(45, 'Christmas Island', 'CX'),
(46, 'Cocos (Keeling) Islands', 'CC'),
(47, 'Colombia', 'CO'),
(48, 'Comoros', 'KM'),
(49, 'Congo', 'CG'),
(50, 'Cook Islands', 'CK'),
(51, 'Costa Rica', 'CR'),
(52, 'Cote D''Ivoire', 'CI'),
(53, 'Croatia', 'HR'),
(54, 'Cuba', 'CU'),
(55, 'Cyprus', 'CY'),
(56, 'Czech Republic', 'CZ'),
(57, 'Denmark', 'DK'),
(58, 'Djibouti', 'DJ'),
(59, 'Dominica', 'DM'),
(60, 'Dominican Republic', 'DO'),
(61, 'East Timor', 'TL'),
(62, 'Ecuador', 'EC'),
(63, 'Egypt', 'EG'),
(64, 'El Salvador', 'SV'),
(65, 'Equatorial Guinea', 'GQ'),
(66, 'Eritrea', 'ER'),
(67, 'Estonia', 'EE'),
(68, 'Ethiopia', 'ET'),
(69, 'Falkland Islands (Malvinas)', 'FK'),
(70, 'Faroe Islands', 'FO'),
(71, 'Fiji', 'FJ'),
(72, 'Finland', 'FI'),
(74, 'France, Metropolitan', 'FR'),
(75, 'French Guiana', 'GF'),
(76, 'French Polynesia', 'PF'),
(77, 'French Southern Territories', 'TF'),
(78, 'Gabon', 'GA'),
(79, 'Gambia', 'GM'),
(80, 'Georgia', 'GE'),
(81, 'Germany', 'DE'),
(82, 'Ghana', 'GH'),
(83, 'Gibraltar', 'GI'),
(84, 'Greece', 'GR'),
(85, 'Greenland', 'GL'),
(86, 'Grenada', 'GD'),
(87, 'Guadeloupe', 'GP'),
(88, 'Guam', 'GU'),
(89, 'Guatemala', 'GT'),
(90, 'Guinea', 'GN'),
(91, 'Guinea-Bissau', 'GW'),
(92, 'Guyana', 'GY'),
(93, 'Haiti', 'HT'),
(94, 'Heard and Mc Donald Islands', 'HM'),
(95, 'Honduras', 'HN'),
(96, 'Hong Kong', 'HK'),
(97, 'Hungary', 'HU'),
(98, 'Iceland', 'IS'),
(99, 'India', 'IN'),
(100, 'Indonesia', 'ID'),
(101, 'Iran (Islamic Republic of)', 'IR'),
(102, 'Iraq', 'IQ'),
(103, 'Ireland', 'IE'),
(104, 'Israel', 'IL'),
(105, 'Italy', 'IT'),
(106, 'Jamaica', 'JM'),
(107, 'Japan', 'JP'),
(108, 'Jordan', 'JO'),
(109, 'Kazakhstan', 'KZ'),
(110, 'Kenya', 'KE'),
(111, 'Kiribati', 'KI'),
(112, 'North Korea', 'KP'),
(113, 'Korea, Republic of', 'KR'),
(114, 'Kuwait', 'KW'),
(115, 'Kyrgyzstan', 'KG'),
(116, 'Lao People''s Democratic Republic', 'LA'),
(117, 'Latvia', 'LV'),
(118, 'Lebanon', 'LB'),
(119, 'Lesotho', 'LS'),
(120, 'Liberia', 'LR'),
(121, 'Libyan Arab Jamahiriya', 'LY'),
(122, 'Liechtenstein', 'LI'),
(123, 'Lithuania', 'LT'),
(124, 'Luxembourg', 'LU'),
(125, 'Macau', 'MO'),
(126, 'FYROM', 'MK'),
(127, 'Madagascar', 'MG'),
(128, 'Malawi', 'MW'),
(129, 'Malaysia', 'MY'),
(130, 'Maldives', 'MV'),
(131, 'Mali', 'ML'),
(132, 'Malta', 'MT'),
(133, 'Marshall Islands', 'MH'),
(134, 'Martinique', 'MQ'),
(135, 'Mauritania', 'MR'),
(136, 'Mauritius', 'MU'),
(137, 'Mayotte', 'YT'),
(138, 'Mexico', 'MX'),
(139, 'Micronesia, Federated States of', 'FM'),
(140, 'Moldova, Republic of', 'MD'),
(141, 'Monaco', 'MC'),
(142, 'Mongolia', 'MN'),
(143, 'Montserrat', 'MS'),
(144, 'Morocco', 'MA'),
(145, 'Mozambique', 'MZ'),
(146, 'Myanmar', 'MM'),
(147, 'Namibia', 'NA'),
(148, 'Nauru', 'NR'),
(149, 'Nepal', 'NP'),
(150, 'Netherlands', 'NL'),
(151, 'Netherlands Antilles', 'AN'),
(152, 'New Caledonia', 'NC'),
(153, 'New Zealand', 'NZ'),
(154, 'Nicaragua', 'NI'),
(155, 'Niger', 'NE'),
(156, 'Nigeria', 'NG'),
(157, 'Niue', 'NU'),
(158, 'Norfolk Island', 'NF'),
(159, 'Northern Mariana Islands', 'MP'),
(160, 'Norway', 'NO'),
(161, 'Oman', 'OM'),
(162, 'Pakistan', 'PK'),
(163, 'Palau', 'PW'),
(164, 'Panama', 'PA'),
(165, 'Papua New Guinea', 'PG'),
(166, 'Paraguay', 'PY'),
(167, 'Peru', 'PE'),
(168, 'Philippines', 'PH'),
(169, 'Pitcairn', 'PN'),
(170, 'Poland', 'PL'),
(171, 'Portugal', 'PT'),
(172, 'Puerto Rico', 'PR'),
(173, 'Qatar', 'QA'),
(174, 'Reunion', 'RE'),
(175, 'Romania', 'RO'),
(176, 'Russian Federation', 'RU'),
(177, 'Rwanda', 'RW'),
(178, 'Saint Kitts and Nevis', 'KN'),
(179, 'Saint Lucia', 'LC'),
(180, 'Saint Vincent and the Grenadines', 'VC'),
(181, 'Samoa', 'WS'),
(182, 'San Marino', 'SM'),
(183, 'Sao Tome and Principe', 'ST'),
(184, 'Saudi Arabia', 'SA'),
(185, 'Senegal', 'SN'),
(186, 'Seychelles', 'SC'),
(187, 'Sierra Leone', 'SL'),
(188, 'Singapore', 'SG'),
(189, 'Slovak Republic', 'SK'),
(190, 'Slovenia', 'SI'),
(191, 'Solomon Islands', 'SB'),
(192, 'Somalia', 'SO'),
(193, 'South Africa', 'ZA'),
(194, 'South Georgia &amp; South Sandwich Islands', 'GS'),
(195, 'Spain', 'ES'),
(196, 'Sri Lanka', 'LK'),
(197, 'St. Helena', 'SH'),
(198, 'St. Pierre and Miquelon', 'PM'),
(199, 'Sudan', 'SD'),
(200, 'Suriname', 'SR'),
(201, 'Svalbard and Jan Mayen Islands', 'SJ'),
(202, 'Swaziland', 'SZ'),
(203, 'Sweden', 'SE'),
(204, 'Switzerland', 'CH'),
(205, 'Syrian Arab Republic', 'SY'),
(206, 'Taiwan', 'TW'),
(207, 'Tajikistan', 'TJ'),
(208, 'Tanzania, United Republic of', 'TZ'),
(209, 'Thailand', 'TH'),
(210, 'Togo', 'TG'),
(211, 'Tokelau', 'TK'),
(212, 'Tonga', 'TO'),
(213, 'Trinidad and Tobago', 'TT'),
(214, 'Tunisia', 'TN'),
(215, 'Turkey', 'TR'),
(216, 'Turkmenistan', 'TM'),
(217, 'Turks and Caicos Islands', 'TC'),
(218, 'Tuvalu', 'TV'),
(219, 'Uganda', 'UG'),
(220, 'Ukraine', 'UA'),
(221, 'United Arab Emirates', 'AE'),
(222, 'United Kingdom', 'GB'),
(223, 'United States', 'US'),
(224, 'United States Minor Outlying Islands', 'UM'),
(225, 'Uruguay', 'UY'),
(226, 'Uzbekistan', 'UZ'),
(227, 'Vanuatu', 'VU'),
(228, 'Vatican City State (Holy See)', 'VA'),
(229, 'Venezuela', 'VE'),
(230, 'Viet Nam', 'VN'),
(231, 'Virgin Islands (British)', 'VG'),
(232, 'Virgin Islands (U.S.)', 'VI'),
(233, 'Wallis and Futuna Islands', 'WF'),
(234, 'Western Sahara', 'EH'),
(235, 'Yemen', 'YE'),
(237, 'Democratic Republic of Congo', 'CD'),
(238, 'Zambia', 'ZM'),
(239, 'Zimbabwe', 'ZW'),
(242, 'Montenegro', 'ME'),
(243, 'Serbia', 'RS'),
(244, 'Aaland Islands', 'AX'),
(245, 'Bonaire, Sint Eustatius and Saba', 'BQ'),
(246, 'Curacao', 'CW'),
(247, 'Palestinian Territory, Occupied', 'PS'),
(248, 'South Sudan', 'SS'),
(249, 'St. Barthelemy', 'BL'),
(250, 'St. Martin (French part)', 'MF'),
(251, 'Canary Islands', 'IC'),
(252, 'Ascension Island (British)', 'AC'),
(253, 'Kosovo, Republic of', 'XK'),
(254, 'Isle of Man', 'IM'),
(255, 'Tristan da Cunha', 'TA'),
(256, 'Guernsey', 'GG'),
(257, 'Jersey', 'JE');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`customer_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `telephone` varchar(24) DEFAULT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(9) DEFAULT NULL,
  `date_added` date NOT NULL,
  `ip` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `address_id`, `firstname`, `lastname`, `email`, `telephone`, `username`, `password`, `salt`, `date_added`, `ip`) VALUES
(1, 3, 'Savindra', 'Perera', 'cybernerd93@gmail.com', '0750746646', 'savindra', 'askneed123', NULL, '2015-04-16', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE IF NOT EXISTS `manufacturer` (
`manufacturer_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`manufacturer_id`, `name`, `image`) VALUES
(1, 'Dean Vendetta', NULL),
(2, 'Yamaha', NULL),
(3, 'Kala', NULL),
(4, 'Mendini', NULL),
(5, 'Alesis', NULL),
(6, 'Casio', NULL),
(7, 'Oxygen', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE IF NOT EXISTS `order_status` (
`order_status_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`order_status_id`, `name`) VALUES
(2, 'Processing'),
(3, 'Shipped'),
(7, 'Canceled'),
(5, 'Complete'),
(8, 'Denied'),
(9, 'Canceled Reversal'),
(10, 'Failed'),
(11, 'Refunded'),
(12, 'Reversed'),
(13, 'Chargeback'),
(1, 'Pending'),
(16, 'Voided'),
(15, 'Processed'),
(14, 'Expired');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `model` varchar(256) NOT NULL,
  `quantity` int(11) NOT NULL,
  `stock_status_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `product_desc` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `model`, `quantity`, `stock_status_id`, `image`, `manufacturer_id`, `price`, `product_desc`) VALUES
(1, 1, 'Dean Vendetta XM Electric Guitar - Natural', 18, 7, 'img\\shop\\category1\\prod1-main.jpg', 1, '99.99', 'Dean''s Vendetta XM offers the budget-conscious a solid Vendetta option, with a bolt-on neck, a pair of Dean humbuckers, Dean diecast tuning machines, and a Tune-o-Matic bridge. \r\n'),
(2, 1, 'Yamaha FG700S Acoustic Guitar', 25, 7, 'img\\shop\\category1\\prod2-main.jpg', 2, '199.99', 'A great entry-level acoustic guitar, the 6-string Yamaha FG700S offers deluxe features including die-cast tuners, solid sitka spruce top, and a rosewood fingerboard. Other features include a black-and-white body binding, tortoise pickguard, and a high-gloss natural finish that will look great under the stage lights. It''s backed by Yamaha''s limited lifetime warranty.'),
(3, 1, 'Kala KA-15S Mahogany Soprano Ukulele', 33, 7, 'img\\shop\\category1\\prod3-main.jpg', 3, '53.99', 'The Kala KA-15S Ukulele is a great way to take laid-back tropical atmospheres anywhere. Whether you''re strumming in a hammock on the beach or kicked back in a recliner in your living room, a uke is a great way to spread some good vibrations. The Kala KA-15S offers great sound, great playability, and a great price. The rosewood fretboard and mahogany body make the Kala KA-15S a great Ukulele for beginners or four-string strumming professionals. Get a portable piece of paradise today, at GearNuts.com!'),
(4, 1, 'Kala KA-MK-S Makala Soprano Ukulele', 2, 7, 'img\\shop\\category1\\prod4-main.jpg', 3, '69.99', 'Simply the best entry-level uke on the market. Sound and playability usually suffer at these affordable prices but not with Makala. Fantastic sound and looks and easy on the wallet. Available in all sizes and multiple colors.'),
(5, 2, 'Mendini MJDS-5-BL Complete 16-Inch 5-Piece Blue Junior Drum Set', 7, 7, 'img\\shop\\category2\\prod1-main.jpg', 4, '166.35', 'Mendini by Cecilio MJDS-5 model is an all-in-one entry-level youth drum set. It is a fully functional drum for young drummer who wants the most realistic experience but may be too small for a full size drum set.'),
(6, 2, 'Mendini by Cecilio MJDS-1-BR 3-Piece Drum Set, Metallic Red', 4, 7, 'img\\shop\\category2\\prod2-main.jpg', 4, '173.85', 'This is a great drum set for the aspiring drummer. Smaller sized genuine hard wood shells with triple flanged hoops make this the perfect first set for the younger player. It includes everything needed to get off to a great start. The drums and cymbal are mounted off the bass drum for easy set up while providing a small foot print, taking up minimal space.'),
(7, 2, 'Alesis DM Lite Kit 5-Piece Electronic Drum Set', 10, 7, 'img\\shop\\category2\\prod3-main.jpg', 5, '209.95', 'Alesis DM Lite Kit 5-Piece Electronic Drum Set with Collapsible 4-Post Rack'),
(8, 2, 'Mendini by Cecilio MJDS-1-GN 3-Piece Drum Set', 4, 7, 'img\\shop\\category2\\prod4-main.jpg', 4, '112.72', 'This is a great drum set for the aspiring drummer. Smaller sized genuine hard wood shells with triple flanged hoops make this the perfect first set for the younger player. It includes everything needed to get off to a great start. The drums and cymbal are mounted off the bass drum for easy set up while providing a small foot print, taking up minimal space.'),
(9, 3, 'Casio SA-76 44 Key Mini Keyboard', 24, 7, 'img\\shop\\category3\\prod1-main.jpg', 6, '46.49', 'The 44 key Casio SA-76 offers children the essentials for playing those first tunes. 100 tones, 50 rhythms and 10 integrated songs provide variety. The LSI sound source and the 8-note polyphony ensure good sound quality. The LC display helps with selecting different music options. The SA-76 also includes a striking change-over switch making it easy to switch between piano and organ modes. 100 Tones: An extensive repertoire of 100 tones is available in excellent quality. 50 Rhythms: 50 rhythms ranging from waltz through to salsa offer a varied range spanning throughout the world of music. Piano/Organ Setting Button: Your favourite tune at the touch of a button: The piano/organ setting button enables you to choose between the sound of a piano and an organ. Simply press the button to switch between the two sounds. 10 Practice Tunes: Something to suit every taste: 10 practice tunes offer the opportunity of learning a diverse range of styles. LC Display: Retain an overview: The LC display provides you with easy access to the instrument’s functions. Five Drum Pads: Find the right rhythm for the beat: The drum pads provide the perfect introduction to the world of the digital drum kit. Five buttons, each with an individual drum or percussion sound making it easy to play along to the rhythm or create a solo with your fingertips. Melody Cut Rehearsal System: Melody Cut provides effective training for the right hand. There are 10 rehearsal songs waiting to be practised.'),
(10, 3, 'Yamaha PSRE-343 61-Key Portable Keyboard', 23, 7, 'img\\shop\\category3\\prod2-main.jpg', 2, '139.99', 'The new PSR-E343 portable keyboard features great content with 550 Voices and 136 Styles. The Ultra-Wide Stereo effect creates a stereo image wider than the speakers. Built-in lesson functions help you learn how to play. Finally, get connected to The AUX input connects to portable music players while the Melody Suppressor reduces a song''s center part so you can play the lead. Features: 61 touch-sensitive, full-sized keys: Touch-sensitive keys add dynamics to your playing. Play lightly and the sound is soft. Hit the key hard and it''s loud. 550 high-quality instrument Voices: A wide variety of instrument Voices, drum kits and sound effects kits. 136 Styles: Built-in bands that are always ready to follow your lead. Great for practicing, arranging different material or writing your next hit song! Ultra-wide stereo: Creates a stereo image wider than the speakers using Yamaha''s digital signal processing technology. Yamaha Education Suite (Y.E.S): Practice with the preset songs at your own pace one hand at a time or both together using Yamaha Education Suite.'),
(11, 3, 'M-Audio Oxygen 25 25-Key USB MIDI Keyboard Controller', 7, 7, 'img\\shop\\category3\\prod3-main.jpg', 7, '64.97', 'The Oxygen 25 USB MIDI controller delivers next-generaion functionality from M-Audio, the leading innovator in mobile music production technology. The Oxygen 25 features eight assignable knobs, plus dedicated transport and track select buttons. DirectLink mode automatically maps these controls to common DAW functions including transport, mixer, track pan and plug-in parameters. Built-in factory presets offer support for popular virtual instruments right out of the box - no complicated setup required. Velociy-sensitive keys and a sleek, compact design round out a portable keyboard that''s perfect for lapop production, live DJ performance, triggering samples or composing on the go. No other MIDI controller in this price range has so much functionality while remaining easy to use.'),
(12, 3, 'Yamaha PSRE353 61-Key Portable Keyboard', 5, 7, 'img\\shop\\category3\\prod4-main.jpg', 2, '159.99', 'The PSR-E353 is jam-packed full of incredible instrument Voices, accompaniment Styles and fun features. It''s an ideal Portable Keyboard for beginners and hobbyists, featuring touch sensitive keys, on-board lessons, computer and mobile device connectivity and much more.');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE IF NOT EXISTS `product_image` (
`product_image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`product_image_id`, `product_id`, `image`) VALUES
(1, 1, 'img\\shop\\category1\\prod1-1.jpg\r\n'),
(2, 1, 'img\\shop\\category1\\prod1-2.jpg\r\n'),
(3, 1, 'img\\shop\\category1\\prod1-3.jpg'),
(4, 2, 'img\\shop\\category1\\prod2-1.jpg'),
(5, 2, 'img\\shop\\category1\\prod2-2.jpg'),
(6, 2, 'img\\shop\\category1\\prod2-3.jpg'),
(7, 3, 'img\\shop\\category1\\prod3-1.jpg'),
(8, 3, 'img\\shop\\category1\\prod3-2.jpg'),
(9, 3, 'img\\shop\\category1\\prod3-3.jpg'),
(10, 4, 'img\\shop\\category1\\prod4-1.jpg'),
(11, 4, 'img\\shop\\category1\\prod4-2.jpg'),
(12, 4, 'img\\shop\\category1\\prod4-3.jpg'),
(13, 5, 'img\\shop\\category2\\prod1-1.jpg'),
(14, 5, 'img\\shop\\category2\\prod1-2.jpg'),
(15, 5, 'img\\shop\\category2\\prod1-3.jpg'),
(16, 6, 'img\\shop\\category2\\prod2-1.jpg'),
(17, 6, 'img\\shop\\category2\\prod2-2.jpg'),
(18, 6, 'img\\shop\\category2\\prod2-3.jpg'),
(19, 7, 'img\\shop\\category2\\prod3-1.jpg'),
(20, 7, 'img\\shop\\category2\\prod3-2.jpg'),
(21, 7, 'img\\shop\\category2\\prod3-3.jpg'),
(22, 8, 'img\\shop\\category2\\prod4-1.jpg'),
(23, 8, 'img\\shop\\category2\\prod4-2.jpg'),
(24, 8, 'img\\shop\\category2\\prod4-3.jpg'),
(25, 9, 'img\\shop\\category3\\prod1-1.jpg'),
(26, 9, 'img\\shop\\category3\\prod1-2.jpg'),
(27, 9, 'img\\shop\\category3\\prod1-2.jpg'),
(28, 10, 'img\\shop\\category3\\prod2-1.jpg'),
(29, 10, 'img\\shop\\category3\\prod2-2.jpg'),
(30, 10, 'img\\shop\\category3\\prod2-3.jpg'),
(31, 11, 'img\\shop\\category3\\prod3-1.jpg'),
(32, 11, 'img\\shop\\category3\\prod3-2.jpg'),
(33, 11, 'img\\shop\\category3\\prod3-3.jpg'),
(34, 12, 'img\\shop\\category3\\prod4-1.jpg'),
(35, 12, 'img\\shop\\category3\\prod4-2.jpg'),
(36, 12, 'img\\shop\\category3\\prod4-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stock_status`
--

CREATE TABLE IF NOT EXISTS `stock_status` (
`stock_status_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock_status`
--

INSERT INTO `stock_status` (`stock_status_id`, `name`) VALUES
(7, 'In Stock'),
(8, 'Pre-Order'),
(5, 'Out Of Stock'),
(6, '2-3 Days');

-- --------------------------------------------------------

--
-- Table structure for table `testimonal`
--

CREATE TABLE IF NOT EXISTS `testimonal` (
`testimonal_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `comment` varchar(1024) NOT NULL,
  `rating` decimal(2,1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonal`
--

INSERT INTO `testimonal` (`testimonal_id`, `email`, `name`, `comment`, `rating`) VALUES
(5, 'Achira', 'achira@hotmail.com', 'Site looks cool.', '3.5'),
(4, 'Oshada', 'oshada@gmail.com', 'I like the site.', '3.5'),
(3, 'pumudu@gmail.com', 'Pumudu Perera', 'Good site.', '3.0'),
(6, 'Sarith', 'sarith@gmail.com', 'hello, i like this site.', '4.5'),
(1, 'savindra@iit.ac.lk', 'Savindra Perera', 'Site is ok, but needs much more improvements.', '0.0'),
(2, 'yesin@gmail.com', 'Yesin', 'Good Site, Highly Recommended.', '4.5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
 ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
 ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
 ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
 ADD PRIMARY KEY (`order_status_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
 ADD PRIMARY KEY (`product_image_id`);

--
-- Indexes for table `stock_status`
--
ALTER TABLE `stock_status`
 ADD PRIMARY KEY (`stock_status_id`);

--
-- Indexes for table `testimonal`
--
ALTER TABLE `testimonal`
 ADD PRIMARY KEY (`email`), ADD UNIQUE KEY `testimonal_id` (`testimonal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=258;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
MODIFY `order_status_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
MODIFY `product_image_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `stock_status`
--
ALTER TABLE `stock_status`
MODIFY `stock_status_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `testimonal`
--
ALTER TABLE `testimonal`
MODIFY `testimonal_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
