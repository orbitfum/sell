-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2017 at 06:50 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zkal`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `eng` varchar(255) NOT NULL,
  `heb` varchar(255) DEFAULT NULL,
  `catid_ebay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `eng`, `heb`, `catid_ebay`) VALUES
(1, 'Clothing, Shoes & Accessories', 'בגדים, נעליים ', 11450),
(2, 'Men\'s Clothing', 'בגדי גברים', 1059),
(3, 'Unisex Clothing, Shoes & Accs', 'יוניסקס בגדים, נעליים ', 155184),
(4, 'Women\'s Clothing', 'בגדי נשים', 15724),
(5, 'Costumes, Reenactment, Theater', 'תחפושות, שחזור, תיאטרון', 163147),
(6, 'Kids\' Clothing, Shoes & Accs', 'הילדים בגדים, נעליים ', 171146),
(7, 'Men\'s Accessories', 'גברים ואביזרים', 4250),
(8, 'Men\'s Shoes', 'נעלי גברים', 93427),
(9, 'Baby & Toddler Clothing', 'התינוק ', 3082),
(10, 'Women\'s Accessories', 'נשים ואביזרים', 4251),
(11, 'Women\'s Shoes', 'נעלי נשים', 3034),
(12, 'Vintage', 'בציר', 175759),
(13, 'Women\'s Handbags & Bags', 'תיקים של נשים ', 169291),
(14, 'Cultural & Ethnic Clothing', 'תרבות ', 155240),
(15, 'Uniforms & Work Clothing', 'מדים ', 28015),
(16, 'Wholesale, Large & Small Lots', 'הסיטונאי, גדולים ', 41964),
(17, 'Dancewear', 'Dancewear', 112425),
(18, 'Wedding & Formal Occasion', 'החתונה ', 3259),
(19, 'Toys & Hobbies', 'צעצועים ', 220),
(20, 'Collectible Card Games', 'משחקי קלפים אספנות', 2536),
(21, 'Games', 'משחקים', 233),
(22, 'Action Figures', 'דמויות פעולה', 246),
(23, 'Models & Kits', 'דגמים ', 1188),
(24, 'TV, Movie & Character Toys', 'טלוויזיה, קולנוע ', 2624),
(25, 'Building Toys', 'בניית צעצועים', 183446),
(26, 'Diecast & Toy Vehicles', 'Diecast ', 222),
(27, 'Stuffed Animals', 'חיות מפוחלצות', 436),
(28, 'Preschool Toys & Pretend Play', 'גן צעצועים ', 19169),
(29, 'Wholesale Lots', 'סיטונאי הרבה', 40149),
(30, 'Puzzles', 'חידות', 2613),
(31, 'Radio Control & Control Line', 'שליטת רדיו ', 2562),
(32, 'Beanbag Plush', 'שעועית קטיפה', 49019),
(33, 'Outdoor Toys & Structures', 'חיצונית צעצועים ', 11743),
(34, 'Educational', 'חינוך', 11731),
(35, 'Fast Food & Cereal Premiums', 'מזון מהיר ', 19077),
(36, 'Electronic, Battery & Wind-Up', 'אלקטרוני, סוללה ', 19071),
(37, 'Classic Toys', 'צעצועים קלאסיים', 19016),
(38, 'Toy Soldiers', 'חיילי צעצוע', 2631),
(39, 'Vintage & Antique Toys', 'בציר ', 717),
(40, 'Robots, Monsters & Space Toys', 'רובוטים, מפלצות. ', 19192),
(41, 'Model Railroads & Trains', 'מודל מסילות ', 180250),
(42, 'Marbles', 'גולות', 58799),
(43, 'Collectibles', 'אספנות', 1),
(44, 'Animation Art & Characters', 'אנימציה אמנות ', 13658),
(45, 'Cultures & Ethnicities', 'תרבויות ', 3913),
(46, 'Fantasy, Mythical & Magic', 'פנטזיה, אגדי. ', 10860),
(47, 'Decorative Collectibles', 'דקורטיבי אספנות', 13777),
(48, 'Comics', 'קומיקס', 63),
(49, 'Religion & Spirituality', 'דת ', 1446),
(50, 'Non-Sport Trading Cards', 'אי-ספורט קלפים.', 182982),
(51, 'Knives, Swords & Blades', 'סכינים, חרבות ', 1401),
(52, 'Rocks, Fossils & Minerals', 'סלעים, מאובנים ', 3213),
(53, 'Tobacciana', 'Tobacciana', 593),
(54, 'Disneyana', 'Disneyana', 137),
(55, 'Pens & Writing Instruments', 'עטים ', 966),
(56, 'Transportation', 'תחבורה', 417),
(57, 'Pinbacks, Bobbles, Lunchboxes', 'Pinbacks, מאבד, קופסאות אוכל', 39507),
(58, 'Militaria', 'למזכרות צבאיות', 13956),
(59, 'Metalware', 'Metalware', 1430),
(60, 'Advertising', 'פרסום', 34),
(61, 'Postcards', 'גלויות', 914),
(62, 'Paper', 'נייר', 124),
(63, 'Animals', 'חיות', 1335),
(64, 'Pez, Keychains, Promo Glasses', 'פז, מחזיקי מפתחות, משקפיים פרומו', 14005),
(65, 'Photographic Images', 'צילום תמונות', 14277),
(66, 'Historical Memorabilia', 'מזכרות היסטוריות', 13877),
(67, 'Kitchen & Home', 'מטבח ', 13905),
(68, 'Holiday & Seasonal', 'חג ', 907),
(69, 'Breweriana, Beer', 'Breweriana, בירה', 562),
(70, 'Science Fiction & Horror', 'מדע בדיוני ', 152),
(71, 'Arcade, Jukeboxes & Pinball', 'ארקייד, תקליטים ', 66502),
(72, 'Lamps, Lighting', 'מנורות, תאורה', 1404),
(73, 'Barware', 'Barware', 3265),
(74, 'Casino', 'קזינו', 898),
(75, 'Sewing (1930-Now)', 'תפירה (1930-עכשיו)', 113),
(76, 'Linens & Textiles (1930-Now)', 'מצעים ', 940),
(77, 'Autographs', 'חתימות', 14429),
(78, 'Souvenirs & Travel Memorabilia', 'מזכרות ', 165800),
(79, 'Wholesale Lots', 'סיטונאי הרבה', 45058),
(80, 'Clocks', 'שעונים', 397),
(81, 'Vanity, Perfume & Shaving', 'יהירות, בושם ', 597),
(82, 'Vintage, Retro, Mid-Century', 'וינטג, רטרו, אמצע המאה', 69851),
(83, 'Tools, Hardware & Locks', 'כלים, חומרה ', 13849),
(84, 'Bottles & Insulators', 'בקבוקים ', 29797),
(85, 'Banks, Registers & Vending', 'בנקים, קופות ', 66503),
(86, 'Cell Phones & Accessories', 'טלפונים סלולריים ', 15032),
(87, 'Cell Phone Accessories', 'טלפון סלולרי אביזרים', 9394),
(88, 'Other Cell Phones & Accs', 'טלפונים סלולריים אחרים ', 42428),
(89, 'Jewelry & Watches', 'תכשיטים ', 281),
(90, 'Fashion Jewelry', 'תכשיטי אופנה', 10968),
(91, 'Men\'s Jewelry', 'תכשיטי גברים', 10290),
(92, 'Loose Diamonds & Gemstones', 'רופף יהלומים ', 491),
(93, 'Fine Jewelry', 'תכשיטים יפים', 4196),
(94, 'Loose Beads', 'חופשי חרוזים', 179264),
(95, 'Engagement & Wedding', 'אירוסין ', 91427),
(96, 'Handcrafted, Artisan Jewelry', 'בעבודת יד, אומן תכשיטים', 110633),
(97, 'Watches, Parts & Accessories', 'שעונים, חלקי ', 14324),
(98, 'Vintage & Antique Jewelry', 'בציר ', 48579),
(99, 'Ethnic, Regional & Tribal', 'אתניות, אזורי ', 11312),
(100, 'Jewelry Design & Repair', 'עיצוב תכשיטים ', 164352),
(101, 'Other Jewelry & Watches', 'תכשיטים אחרים ', 98863),
(102, 'Jewelry Boxes & Organizers', 'קופסאות תכשיטים ', 10321),
(103, 'Wholesale Lots', 'סיטונאי הרבה', 40131),
(104, 'Children\'s Jewelry', 'ילדים של תכשיטים', 84605),
(105, 'Home & Garden', 'בבית ', 11700),
(106, 'Home Décor', 'עיצוב הבית', 10033),
(107, 'Kitchen, Dining & Bar', 'מטבח, פינת אוכל ', 20625),
(108, 'Yard, Garden & Outdoor Living', 'חצר, גינה ', 159912),
(109, 'Home Improvement', 'שיפור הבית', 159907),
(110, 'Food & Beverages', 'מזון ', 14308),
(111, 'Greeting Cards & Party Supply', 'כרטיסי ברכה ', 16086),
(112, 'Bedding', 'מצעים', 20444),
(113, 'Lamps, Lighting & Ceiling Fans', 'מנורות, תאורה ', 20697),
(114, 'Kids & Teens at Home', 'ילדים ', 176988),
(115, 'Rugs & Carpets', 'שטיחים ', 20571),
(116, 'Bath', 'אמבטיה', 26677),
(117, 'Wedding Supplies', 'חתונה ציוד', 11827),
(118, 'Window Treatments & Hardware', 'חלון טיפולים ', 63514),
(119, 'Other Home & Garden', 'אחרים בבית. ', 181076),
(120, 'Tools', 'כלים', 631),
(121, 'Holiday & Seasonal Décor', 'חג ', 38227),
(122, 'Furniture', 'רהיטים', 3197),
(123, 'Household Supplies & Cleaning', 'משק אספקה ', 299),
(124, 'Wholesale Lots', 'סיטונאי הרבה', 31605),
(125, 'eBay Motors', 'eBay מוטורס', 6000),
(126, 'Parts & Accessories', 'חלקים ', 6028),
(127, 'Automotive Tools & Supplies', 'כלי רכב ', 34998),
(128, 'Books', 'ספרים', 267),
(129, 'Fiction & Literature', 'בדיוני ', 171228),
(130, 'Children & Young Adults', 'ילדים ', 182882),
(131, 'Textbooks, Education', 'ספרי לימוד, חינוך', 2228),
(132, 'Other Books', 'ספרים אחרים', 268),
(133, 'Nonfiction', 'בדיוני', 171243),
(134, 'Antiquarian & Collectible', 'סוחר הספרים העתיקים ', 29223),
(135, 'Magazine Back Issues', 'מגזין בעיות גב', 280),
(136, 'Cookbooks', 'ספרי בישול', 11104),
(137, 'Audiobooks', 'Audiobooks', 29792),
(138, 'Accessories', 'אביזרים', 45110),
(139, 'Wholesale & Bulk Lots', 'סיטונאי ', 29399),
(140, 'Catalogs', 'קטלוגים', 118254),
(141, 'Antiques', 'עתיקות', 20081),
(142, 'Asian Antiques', 'אסיה עתיקות', 20082),
(143, 'Decorative Arts', 'דקורטיבית', 20086),
(144, 'Silver', 'כסף', 20096),
(145, 'Reproduction Antiques', 'רבייה עתיקות', 22608),
(146, 'Architectural & Garden', 'אדריכלי ', 4707),
(147, 'Antiquities', 'העתיקות', 37903),
(148, 'Linens & Textiles (Pre-1930)', 'מצעים ', 181677),
(149, 'Rugs & Carpets', 'שטיחים ', 37978),
(150, 'Furniture', 'רהיטים', 20091),
(151, 'Other Antiques', 'אחרים עתיקות', 12),
(152, 'Periods & Styles', 'תקופות ', 100927),
(153, 'Maps, Atlases & Globes', 'מפות, אטלסים ', 37958),
(154, 'Maritime', 'ימית', 37965),
(155, 'Sewing (Pre-1930)', 'תפירה (Pre-1930)', 156323),
(156, 'Sporting Goods', 'מוצרי ספורט', 888),
(157, 'Boxing, Martial Arts & MMA', 'איגרוף, אומנויות לחימה ', 179767),
(158, 'Cycling', 'רכיבה על אופניים', 7294),
(159, 'Winter Sports', 'ספורט חורף', 36259),
(160, 'Outdoor Sports', 'ספורט תחת כיפת השמיים', 159043),
(161, 'Fishing', 'דיג', 1492),
(162, 'Hunting', 'ציד', 7301),
(163, 'Fitness, Running & Yoga', 'כושר, ריצה ', 15273),
(164, 'Indoor Games', 'משחקים מקורה', 36274),
(165, 'Other Sporting Goods', 'אחרים מוצרי ספורט', 310),
(166, 'Water Sports', 'ספורט מים', 159136),
(167, 'Team Sports', 'צוות ספורט', 159049),
(168, 'Golf', 'גולף', 1513),
(169, 'Tennis & Racquet Sports', 'טניס ', 159134),
(170, 'Video Games & Consoles', 'משחקי וידאו ', 1249),
(171, 'Video Games', 'משחקי וידאו', 139973),
(172, 'Video Game Merchandise', 'משחק וידאו הסחורה', 38583),
(173, 'Video Game Accessories', 'משחק וידאו אביזרים', 54968),
(174, 'Strategy Guides & Cheats', 'מדריכי אסטרטגיה ', 156595),
(175, 'Wholesale Lots', 'סיטונאי הרבה', 48749),
(176, 'Manuals, Inserts & Box Art', 'מדריכים, מוסיף ', 182174),
(177, 'Video Game Consoles', 'קונסולות משחקי וידאו', 139971),
(178, 'Other Video Games & Consoles', 'אחרים, משחקי וידאו ', 187),
(179, 'Replacement Parts & Tools', 'חלקי חילוף ', 171833),
(180, 'Original Game Cases & Boxes', 'המשחק המקורי המקרים ', 182175),
(181, 'Crafts', 'מלאכת יד', 14339),
(182, 'Beads & Jewelry Making', 'חרוזים ', 31723),
(183, 'Multi-Purpose Craft Supplies', 'רב-תכליתי אספקה מלאכה', 28102),
(184, 'Sewing', 'תפירה', 160737),
(185, 'Fabric', 'בד', 28162),
(186, 'Scrapbooking & Paper Crafts', 'עיצוב אלבומים ', 11788),
(187, 'Needlecrafts & Yarn', 'Needlecrafts ', 160706),
(188, 'Handcrafted & Finished Pieces', 'בעבודת יד ', 71183),
(189, 'Other Crafts', 'אחרים אמנות', 75576),
(190, 'Sculpting, Molding & Ceramics', 'פיסול, דפוס ', 183302),
(191, 'Home Arts & Crafts', 'בית אומנויות ', 160667),
(192, 'Stamping & Embossing', 'הטבעה ', 3122),
(193, 'Kids\' Crafts', 'הילדים מלאכות', 116652),
(194, 'Art Supplies', 'ציוד אמנות', 11783),
(195, 'Leathercrafts', 'Leathercrafts', 28131),
(196, 'Wholesale Lots', 'סיטונאי הרבה', 45074),
(197, 'Glass & Mosaics', 'זכוכית ', 163778),
(198, 'DVDs & Movies', 'די. וי. די ', 11232),
(199, 'DVDs & Blu-ray Discs', 'די. וי. די ', 617),
(200, 'VHS Tapes', 'קלטות VHS', 309),
(201, 'Wholesale Lots', 'סיטונאי הרבה', 31606),
(202, 'Laserdiscs', 'Laserdiscs', 381),
(203, 'Other Formats', 'פורמטים אחרים', 41676),
(204, 'Film Stock', 'סרט במלאי', 63821),
(205, 'Computers/Tablets & Networking', 'מחשבים/טאבלטים ', 58058),
(206, 'Tablet & eBook Reader Accs', 'לוח ', 176970),
(207, 'Laptop & Desktop Accessories', 'מחשב נייד ', 31530),
(208, 'Software', 'תוכנה', 18793),
(209, 'Computer Components & Parts', 'רכיבי המחשב ', 175673),
(210, 'Tablets & eBook Readers', 'טבליות ', 171485),
(211, 'Other Computers & Networking', 'מחשבים אחרים ', 162),
(212, 'Tablet & eBook Reader Parts', 'לוח ', 180235),
(213, 'Keyboards, Mice & Pointers', 'מקלדות, עכברים. ', 3676),
(214, 'Drives, Storage & Blank Media', 'כונני אחסון ', 165),
(215, 'Vintage Computing', 'בציר מחשוב', 11189),
(216, 'Laptops & Netbooks', 'מחשבים ניידים ', 175672),
(217, 'Art', 'אמנות', 550),
(218, 'Art from Dealers & Resellers', 'אמנות סוחרי סמים ', 158658),
(219, 'Direct from the Artist', 'ישירה מהאמן', 60435),
(220, 'Wholesale Lots', 'סיטונאי הרבה', 52524),
(221, 'Health & Beauty', 'בריאות ', 26395),
(222, 'Tattoos & Body Art', 'קעקועים ', 33914),
(223, 'Hair Care & Styling', 'טיפוח השיער ', 11854),
(224, 'Skin Care', 'טיפוח העור', 11863),
(225, 'Health Care', 'בריאות', 67588),
(226, 'Makeup', 'איפור', 31786),
(227, 'Vitamins & Dietary Supplements', 'ויטמינים ', 180959),
(228, 'Nail Care, Manicure & Pedicure', 'טיפול ציפורניים, מניקור ', 47945),
(229, 'Vision Care', 'חזון טיפול', 31414),
(230, 'Natural & Alternative Remedies', 'טבעי ', 67659),
(231, 'Bath & Body', 'אמבטיה ', 11838),
(232, 'Fragrances', 'ניחוחות', 180345),
(233, 'Medical, Mobility & Disability', 'רפואי, ניידות ', 11778),
(234, 'Salon & Spa Equipment', 'סלון ', 177731),
(235, 'Other Health & Beauty', 'בריאות אחרות ', 1277),
(236, 'Sun Protection & Tanning', 'הגנה מפני השמש ', 31772),
(237, 'Shaving & Hair Removal', 'גילוח ', 31762),
(238, 'Massage', 'עיסוי', 36447),
(239, 'Music', 'מוסיקה', 11233),
(240, 'CDs', 'דיסקים', 176984),
(241, 'Records', 'רשומות', 176985),
(242, 'Cassettes', 'קלטות', 176983),
(243, 'Wholesale Lots', 'סיטונאי הרבה', 31608),
(244, 'Other Formats', 'פורמטים אחרים', 618),
(245, 'Entertainment Memorabilia', 'בידור מזכרות', 45100),
(246, 'Music Memorabilia', 'מוזיקה בלתי נשכחת', 2329),
(247, 'Movie Memorabilia', 'הסרט מזכרות', 196),
(248, 'Autographs-Original', 'חתימות-מקורי', 57),
(249, 'Television Memorabilia', 'טלוויזיה מזכרות', 1424),
(250, 'Video Game Memorabilia', 'משחק וידאו מזכרות', 45101),
(251, 'Other Entertainment Mem', 'בידור אחרים גברתי', 2312),
(252, 'Theater Memorabilia', 'תיאטרון מזכרות', 2362),
(253, 'Sports Mem, Cards & Fan Shop', 'ספורט זיכרון, כרטיסי ', 64482),
(254, 'Sports Trading Cards', 'ספורט קלפים.', 212),
(255, 'Fan Apparel & Souvenirs', 'אוהד הלבשה ', 24409),
(256, 'Autographs-Original', 'חתימות-מקורי', 51),
(257, 'Vintage Sports Memorabilia', 'בציר מזכרות ספורט.', 50123),
(258, 'Pet Supplies', 'ציוד לחיות מחמד', 1281),
(259, 'Dog Supplies', 'הכלב אספקה', 20742),
(260, 'Fish & Aquariums', 'דגים ', 20754),
(261, 'Reptile Supplies', 'זוחל אספקה', 1285),
(262, 'Bird Supplies', 'ציפור אספקה', 20734),
(263, 'Small Animal Supplies', 'בעלי חיים קטנים אספקה', 26696),
(264, 'Cat Supplies', 'ספקי חתול', 20737),
(265, 'Coins & Paper Money', 'מטבעות ', 11116),
(266, 'Coins: World', 'מטבעות העולם.', 256),
(267, 'Bullion', 'מטילי', 39482),
(268, 'Paper Money: World', 'נייר כסף: העולם', 3411),
(269, 'Coins: Canada', 'מטבעות: קנדה', 3377),
(270, 'Exonumia', 'Exonumia', 3452),
(271, 'Coins: US', 'מטבעות: ', 253),
(272, 'Paper Money: US', 'נייר כסף: ', 3412),
(273, 'Other Coins & Paper Money', 'המטבעות האחרים ', 169305),
(274, 'Stamps', 'בולים', 260),
(275, 'Asia', 'אסיה', 181416),
(276, 'Topical Stamps', 'אקטואלי בולים', 4752),
(277, 'United States', 'ארצות הברית', 261),
(278, 'Europe', 'אירופה', 4742),
(279, 'British Colonies & Territories', 'מושבות בריטיות ', 65174),
(280, 'Australia & Oceania', 'אוסטרליה ', 181424),
(281, 'Business & Industrial', 'עסקים ', 12576),
(282, 'Light Equipment & Tools', 'ציוד אור ', 61573),
(283, 'Retail & Services', 'הקמעונאי ', 11890),
(284, 'Office', 'המשרד', 25298),
(285, 'MRO & Industrial Supply', 'MRO ', 1266),
(286, 'Healthcare, Lab & Life Science', 'שירותי בריאות, המעבדה ', 11815),
(287, 'Manufacturing & Metalworking', 'ייצור ', 11804),
(288, 'Electrical & Test Equipment', 'חשמל ', 92074),
(289, 'Printing & Graphic Arts', 'הדפסה ', 26238),
(290, 'Other Business & Industrial', 'עסקים אחרים ', 26261),
(291, 'Restaurant & Catering', 'מסעדה ', 11874),
(292, 'Construction', 'בנייה', 11765),
(293, 'Automation, Motors & Drives', 'אוטומציה, מוטורס ', 42892),
(294, 'Heavy Equipment Parts & Accs', 'ציוד כבד חלקים ', 41489),
(295, 'Pottery & Glass', 'כלי חרס ', 870),
(296, 'Pottery & China', 'כלי חרס ', 18875),
(297, 'Glass', 'זכוכית', 50693),
(298, 'Everything Else', 'כל דבר אחר', 99),
(299, 'Metaphysical', 'מטפיזי', 19266),
(300, 'Every Other Thing', 'כל דבר אחר', 88433),
(301, 'Weird Stuff', 'דברים מוזרים', 1466),
(302, 'Religious Products & Supplies', 'דתי מוצרים ', 102545),
(303, 'Personal Security', 'ביטחון אישי', 102535),
(304, 'Consumer Electronics', 'אלקטרוניקה', 293),
(305, 'Gadgets & Other Electronics', 'גאדג \' טים ', 14948),
(306, 'Portable Audio & Headphones', 'שמע ניידים ', 15052),
(307, 'TV, Video & Home Audio', 'טלוויזיה, וידאו ', 32852),
(308, 'Vehicle Electronics & GPS', 'הרכב האלקטרוניקה ', 3270),
(309, 'Multipurpose Batteries & Power', 'רב תכליתי סוללות ', 48446),
(310, 'Vintage Electronics', 'בציר אלקטרוניקה', 183077),
(311, 'Baby', 'התינוק', 2984),
(312, 'Toys for Baby', 'צעצועים לתינוק', 19068),
(313, 'Nursery Décor', 'עיצוב חדר הילדים', 66697),
(314, 'Feeding', 'האכלה', 20400),
(315, 'Nursery Bedding', 'ילדים מצעים', 20416),
(316, 'Diapering', 'מחתל.', 45455),
(317, 'Dolls & Bears', 'בובות ', 237),
(318, 'Dolls', 'בובות', 238),
(319, 'Bears', 'דובים', 386),
(320, 'Dollhouse Miniatures', 'בית הבובות מיניאטורות', 1202),
(321, 'Musical Instruments & Gear', 'כלי נגינה ', 619),
(322, 'Guitars & Basses', 'גיטרות ', 3858),
(323, 'String', 'String', 180016),
(324, 'Sheet Music & Song Books', 'גיליון המוזיקה ', 180015),
(325, 'Wind & Woodwind', 'הרוח ', 10181),
(326, 'Percussion', 'כלי הקשה', 180012),
(327, 'Stage Lighting & Effects', 'תאורת הבמה ', 12922),
(328, 'Other Musical Instruments', 'נגינה אחרים', 308),
(329, 'Brass', 'פליז', 16212),
(330, 'Pro Audio Equipment', 'Pro ציוד אודיו', 180014),
(331, 'Cameras & Photo', 'מצלמות ', 625),
(332, 'Camera & Photo Accessories', 'המצלמה ', 15200),
(333, 'Film Photography', 'סרט צילום', 69323),
(334, 'Travel', 'נסיעות', 3252),
(335, 'Luggage Accessories', 'מטען אביזרים', 173520),
(336, 'Travel Accessories', 'אביזרי נסיעה', 93838),
(337, 'Tickets & Experiences', 'כרטיסים ', 1305),
(338, 'Specialty Services', 'המומחיות שירותים', 316),
(339, 'Gift Cards & Coupons', 'כרטיסי מתנה ', 172008);

-- --------------------------------------------------------

--
-- Table structure for table `search_tags`
--

CREATE TABLE `search_tags` (
  `id` int(255) NOT NULL,
  `searchkey` varchar(255) NOT NULL,
  `english_word` varchar(255) NOT NULL,
  `numsearch` int(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `search_tags`
--

INSERT INTO `search_tags` (`id`, `searchkey`, `english_word`, `numsearch`, `updated_at`, `created_at`) VALUES
(31, 'קוף', 'Monkey', 1, '2017-07-29 08:40:25', '2017-07-29 08:40:25'),
(48, 'אבטיח', 'Watermelon', 2, '2017-07-30 06:53:25', '2017-07-29 18:04:47'),
(49, 'דרגון בול זי', 'Dragon Ball Z', 1, '2017-07-29 18:05:00', '2017-07-29 18:05:00'),
(50, 'אדידס', 'Adidas', 28, '2017-08-08 08:30:15', '2017-07-29 18:05:30'),
(51, 'פוקימון', 'Pokemon', 1, '2017-07-29 18:05:43', '2017-07-29 18:05:43'),
(52, 'ספינר צבעוני', 'Spinner colorful', 1, '2017-07-29 18:05:56', '2017-07-29 18:05:56'),
(53, 'נעלי adidas', 'Shoes adidas', 2, '2017-07-29 19:56:48', '2017-07-29 19:03:02'),
(60, 'מתנפחים לבריכה', 'Inflatables in the pool.', 1, '2017-07-30 06:53:41', '2017-07-30 06:53:41'),
(61, 'בריכה', 'Pool', 1, '2017-07-30 06:54:13', '2017-07-30 06:54:13'),
(62, 'ברבור לבריכה', 'A swan in the pool.', 1, '2017-07-30 06:55:06', '2017-07-30 06:55:06'),
(63, 'ברבור בריכה', 'Swan pool', 1, '2017-07-30 06:55:18', '2017-07-30 06:55:18'),
(64, 'נעלי אדידס', 'Adidas shoes', 1, '2017-08-02 15:32:18', '2017-08-02 15:32:18'),
(65, 'חולצה צהובה של דרגון בול', 'A yellow T-Shirt of Dragon Ball', 1, '2017-08-02 15:33:00', '2017-08-02 15:33:00'),
(66, 'חולצה כחול עם פסים שחורים', 'Shirt blue with black stripes.', 2, '2017-08-02 15:34:32', '2017-08-02 15:34:17'),
(67, 'צפרדע', 'Frog', 1, '2017-08-03 10:11:34', '2017-08-03 10:11:34'),
(68, 'כפכפים', 'Flip-flops', 4, '2017-08-13 13:31:43', '2017-08-10 17:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `dolar` decimal(11,3) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `dolar`, `updated_at`, `created_at`) VALUES
(1, '3.588', '2017-07-19 20:55:48', '2017-07-19 23:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `frist_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `mail`, `mobile`, `pass`, `frist_name`, `last_name`, `updated_at`, `created_at`) VALUES
(1, 'bs1601@gmail.com', '054413866', '$2y$10$T9MsOWPji5nZwDAMnPFQ4ugVdHrHnzDKUbl7Ob9DGIjlXhrYnoWkm', NULL, NULL, '2017-08-08 13:34:57', '2017-08-08 13:34:57'),
(2, 'test@tdtdq.com', '0544549777', '$2y$10$Q21Atv91lggM9bqRqFLKD.iFUXt4.MjqASBRLCfuVw0/27ODLHbcy', NULL, NULL, '2017-08-08 13:38:10', '2017-08-08 13:38:10'),
(3, 'orbitfum@gmail.com', '525905111', '$2y$10$nZC.uvyOzUEsQoVutdpcnex6CbDRcsDCnLNZfpbVaegXyNko2m/8C', NULL, NULL, '2017-08-08 16:30:25', '2017-08-08 16:30:25'),
(4, 'xxxlover24@gmail.com', '52590454545', '$2y$10$x4QGdxyt7RUGqxBmS.qLsuS2K1/uWY8ulaq3sOE6mojRMUI4FYMP2', NULL, NULL, '2017-08-08 16:41:13', '2017-08-08 16:41:13'),
(5, 'Eladtiar@gmail.com', '52590511155', '$2y$10$3KzFyxdhFiWgV8z8oj4wMOx/ccCFHCvTgIjinMt68Mws/2w6qKvGm', NULL, NULL, '2017-08-08 16:53:17', '2017-08-08 16:53:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `catid_ebay` (`catid_ebay`);

--
-- Indexes for table `search_tags`
--
ALTER TABLE `search_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=340;
--
-- AUTO_INCREMENT for table `search_tags`
--
ALTER TABLE `search_tags`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
