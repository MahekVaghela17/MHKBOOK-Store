-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2025 at 04:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eiser_master`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `name`, `created_at`) VALUES
(1, 'admin@gmail.com', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 'Administrator', '2025-10-07 03:46:36'),
(2, 'mhk@gmail.com', '15b9f9a6703bb5120deb8dba3a2960a3', 'Mahek Vaghela', '2025-10-07 09:56:32'),
(3, 'mahekvaghela129@gmail.com', '15b9f9a6703bb5120deb8dba3a2960a3', 'MAHEK SANJAYBHAI VAGHELA', '2025-10-09 13:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(50) NOT NULL,
  `catname` varchar(100) NOT NULL,
  `catdescription` text NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `catname`, `catdescription`, `image`) VALUES
(1, 'Fiction', 'In a bookstore, the \"Fiction\" category describes books with imaginary content, including invented plots, characters, and settings, as opposed to non-fiction which is rooted in facts and reality. ', '1758688959_fiction.jpg'),
(2, 'Non-Fiction', 'In a bookstore, the nonfiction category features books based on facts, real events, and actual people, aiming to inform, explain, or persuade the reader. ', '1758689086_non-fiction.jpg'),
(3, 'Academic & Professional', 'In a bookstore, the \"Academic & Professional\" category encompasses books designed for in-depth study, research, and professional development, serving students, educators, and professionals in fields like science, business, medicine, and education.', '1758689282_Academic & Professional.jpg'),
(4, 'Children & Young Adults', 'In a bookstore, the Children & Young Adults category contains books written for readers ranging from about 8 to 18 years old, with distinct sub-categories like Middle Grade (8-12) and Young Adult (YA, 12-18). These books feature protagonists of the target age, tackle themes relevant to their experiences such as identity, friendship, and coming-of-age, and bridge the gap between children\'s literature and adult fiction with increasing sophistication. ', '1758690995_Children & Young Adults.jpg'),
(5, 'Comics', 'In a bookstore, the \"Comics\" category describes a section dedicated to comic books, graphic novels, and manga, which are visual storytelling mediums that use sequential art and text to tell a narrative. This category can be further broken down into sub-genres such as action & adventure, fantasy, science fiction, horror, crime & mystery, historical fiction, and superheroes, as well as specific types like manga and formats like anthologies. ', '1758691352_comics.jpg'),
(6, 'Lifestyle & Hobbies', 'In a bookstore, the \"Lifestyle & Hobbies\" category includes books about activities done for enjoyment in one\'s leisure time, encompassing creative pursuits like writing and painting, active pastimes such as gardening and sports, intellectual hobbies like chess and learning languages, and collections like stamps or coins. This category helps people explore new interests, develop skills for their existing hobbies, and find resources on various topics that bring them pleasure and enrichment. ', '1758691753_Lifestyle & Hobbies.jpg'),
(7, 'Special Interest', 'In a bookstore, the \"Special Interest\" category describes books grouped by broad areas of personal interest, such as hobbies, specific subjects, or lifestyle, rather than a strict academic or subject-based system. The goal is to help readers quickly find materials that align with their tastes and browsing habits, creating a more user-friendly and intuitive shopping experience. For example, a special interest section might include books on cooking, gardening, specific sports, or local history.  ', '1758691905_Special Interest.jpg'),
(8, 'Formats', 'In a bookstore, the \"Formats\" category refers to the physical or digital medium a book is available in, such as hardcover, paperback, ebook, or audiobook, distinguishing it from genres like fiction or non-fiction. It also historically refers to the production method and size of printed books, like quarto (4to) or octavo (8vo), which indicates how the book was printed and bound. ', '1758692017_Formats.jpg'),
(9, 'Language & Learning', 'In a bookstore, the \"Language & Learning\" category encompasses books designed to teach new languages or improve existing language skills, as well as materials that aid in general learning and study. This category includes textbooks, phrasebooks, grammar guides, and educational materials focused on languages like English, French, or Spanish, along with study aids and reference books for various subjects. ', '1758692259_Language & Learning.jpg'),
(10, 'Bestsellers & Curated', 'In a bookstore, the \"Bestsellers\" category features the most popular and best-selling books across different genres, while the \"Curated\" category highlights a selection of books hand-picked by the bookstore for their quality, relevance to customer interests, or potential to offer a unique reading experience. The former focuses on market popularity, while the latter emphasizes thoughtful selection, often reflecting a bookstore\'s expertise, location, or mission. ', '1758692399_Bestsellers & Curated.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `ip`, `user_agent`, `created_at`) VALUES
(1, 'manav vaghela', 'abc@gmail.com', 'all books', 'it is very nice website.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', '2025-10-04 15:07:27');

-- --------------------------------------------------------

--
-- Table structure for table `custom_pages`
--

CREATE TABLE `custom_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `html` mediumtext NOT NULL,
  `css` mediumtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `custom_pages`
--

INSERT INTO `custom_pages` (`id`, `title`, `slug`, `html`, `css`, `created_at`, `updated_at`) VALUES
(7, 'Landing Page', 'landing-page', '<section class=\"hero\"><h1>Welcome to our site</h1><p>Start building with the new editor.</p></section>', '.hero { padding: 80px 40px; text-align: center; background: linear-gradient(135deg, #2B6CB0, #ED8936); color: #fff; border-radius: 16px; } .hero h1 { font-size: 48px; margin-bottom: 16px; }', '2025-10-09 16:47:58', '2025-10-09 16:47:58');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` decimal(10,0) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_amount`, `status`, `created_at`) VALUES
(1, 6, 1600, 'canceled', '2025-10-05 22:14:14'),
(2, 8, 400, 'canceled', '2025-10-06 09:25:47'),
(3, 9, 350, 'processing', '2025-10-07 14:24:48'),
(4, 10, 250, 'processing', '2025-10-07 14:37:23'),
(5, 11, 550, 'pending', '2025-10-07 15:15:46'),
(6, 12, 650, 'pending', '2025-10-07 21:49:39'),
(7, 13, 1750, 'pending', '2025-10-09 17:07:17'),
(8, 13, 150, 'pending', '2025-10-09 18:51:36'),
(9, 9, 2650, 'pending', '2025-10-09 18:56:16'),
(10, 14, 450, 'pending', '2025-11-07 08:55:08'),
(11, 11, 1050, 'pending', '2025-11-07 08:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `unit_price` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`) VALUES
(1, 1, 23, 1, 1550.00),
(2, 2, 7, 1, 350.00),
(3, 3, 8, 1, 300.00),
(4, 4, 20, 1, 200.00),
(5, 5, 6, 1, 500.00),
(6, 6, 15, 1, 600.00),
(7, 7, 1, 1, 1700.00),
(8, 8, 9, 1, 100.00),
(9, 9, 30, 1, 2600.00),
(10, 10, 17, 1, 400.00),
(11, 11, 27, 1, 1000.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(50) NOT NULL,
  `catid` int(50) NOT NULL,
  `subcatid` int(50) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `productdescription` text NOT NULL,
  `productprice` int(10) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `catid`, `subcatid`, `productname`, `productdescription`, `productprice`, `image`) VALUES
(1, 1, 2, 'Tell Me Everything ', 'It\'s autumn in Maine, and the town lawyer Bob Burgess has become enmeshed in an unfolding murder investigation, defending a lonely, isolated man accused of killing his mother.', 1700, '1758706753_TellMeEverything.jpg'),
(2, 1, 2, 'The Secret History', 'The Secret History is a riveting, gritty, darkly humorous novel narrated by the fictional Richard Papen, a 28 year old graduate from Hampden College. Richard sets out to tell the story of the events which led up to the murder of one of his friends, Bunny, while studying for his degree in literature.', 280, '1758707014_TheSecretHistory.jpg'),
(3, 1, 1, 'The Pillars of the Earth', 'The Pillars of the Earth is Ken Follett\'s epic historical novel, published in 1989, set in 12th-century England. It tells the sprawling story of ambition, political intrigue, and the struggle between good and evil, all centered around the construction of a magnificent Gothic cathedral in the fictional town of Kingsbridge. ', 400, '1758707260_PillarsOfTheEarth.jpg'),
(4, 1, 1, 'The Oath of the Vayuputras', 'The Oath of the Vayuputras is the thrilling conclusion to Amish Tripathi\'s bestselling Shiva Trilogy, where Shiva, having discovered his true enemy, declares a holy war against the forces of evil and seeks the help of the legendary Vayuputras to save India.', 210, '1758707428_The_Oath_of_the_Vayuputras.jpg'),
(5, 1, 1, 'The Book of Lost Names', 'The Book of Lost Names by Kristin Harmel is a historical fiction novel about Eva, a Jewish forger in Nazi-occupied France who helps Jewish children escape to safety by creating new identities for them. ', 1300, '1758708046_1757319241_TheBookofLostNames.jpg'),
(6, 2, 3, 'Unfinished : A Memoir', 'A remarkable life story rooted in two different worlds, unfinished offers insights into Priyanka Chopra Jonas\'s childhood in India; her formative teenage years in the United States; and her return to India, where against all odds as a newcomer to the pageant world, she won the National and international beauty competitions that launched her global acting career. ', 500, '1758708776_UnfinishedAMemoir.jpg'),
(7, 2, 3, 'Playing It My Way', 'Playing It My Way is the autobiography of legendary Indian cricketer Sachin Tendulkar, detailing his 24-year career, his rise from a cricket-obsessed boy in Mumbai to a global icon, and his personal life with candor and honesty. ', 350, '1758709030_PlayingItMyWay.jpg'),
(8, 2, 3, 'The Dhoni Touch: Unravelling the Enigma That Is Mahendra Singh Dhoni ', 'The Dhoni Touch: Unravelling the Enigma That Is Mahendra Singh Dhoni by Bharat Sundaresan explores the complex and often enigmatic personality of the legendary Indian cricketer Mahendra Singh Dhoni, through anecdotes and insights from his closest friends and confidantes in his hometown of Ranchi. ', 300, '1758709550_TheDhoniTouchUnravellingtheEnigmaThatIsMSD.webp'),
(9, 2, 4, 'Believe in Yourself', 'In believe in yourself Dr. Murphy shows you how the power of believing in yourself will help you achieve your dreams. He illustrates his points with wonderful stories about how inventors, writers, artists and entrepreneurs have used this power to reach the highest of heights.', 100, '1758710120_BelieveinYourself.jpg'),
(10, 2, 4, 'You Can', 'You Can is a self-help manual by American newspaper columnist George Matthew Adams, first published over a century ago, that inspires readers to pursue their goals and achieve personal growth by fostering a positive attitude, resilience, and self-belief. ', 150, '1758710500_You_Can.jpg'),
(11, 3, 5, 'Higher Engineering Mathematics B.S. Grewal', 'Higher Engineering Mathematics, 45th Edition by B.S. Grewal is a comprehensive textbook widely used by engineering students for mastering mathematical concepts. The book covers a broad range of topics, including calculus, differential equations, complex numbers, vector analysis, and numerical methods.', 1000, '1758777400_HigherEngineeringMathematics.jpg'),
(12, 3, 5, 'Engineering Mathematics, 3rd ed. T Veerarajan', 'Engineering mathematics 1 & 2 is as per the latest syllabus offered to first year engineering Student\'s. It has in depth coverage of all the topics in the syllabus. The book has equal weight for theory and problems enabling the Student\'s to understand the concepts better The rich pedagogy and systematic approach enhances the student learning experience.', 950, '1758778642_EngineeringMathematics3rded.TVeerarajan..jpg'),
(13, 3, 6, 'The Constitution of India - PM Bakshi - 20th/Ed.', 'P M Bakshi The Constitution of India serves as a clear and concise ready-reckoner on the Constitution of India, offering article-by-article analysis. In its 20th edition, this book offers a comprehensive commentary on the Constitution, providing accurate and up-to-date information on legislative developments and significant judicial pronouncements. Each article is followed by concise and reader-friendly notes to aid understanding.', 450, '1758857825_TheConstitutionofIndiaPMBakshi20thEd.webp'),
(14, 3, 6, 'International Law 9th editions', 'International Law 9th editions explaining the leading rules, practice and caselaw, this treatise retains and develops the detailed referencing which encourages and assists the reader in further study. This new edition has been fully updated to reflect recent developments.', 1200, '1759491124_InternationalLaw9theditions.jpeg'),
(15, 4, 8, 'Fairy Tales, Myths and Legends (Scholastic Classics)', 'A complete collection of much loved fairy tales, myths and legends, bound into a beautiful new edition. Whether you’re searching for a sky-high beanstalk, a sleeping princess or a bewitched prince, you’re guaranteed to find your favourite fairy tales right here. And no matter how the story starts, you’ll always find your happy ending. This collection includes: The Little Mermaid, The Snow Queen, Rumpelstiltskin, Cinderella, Sleeping Beauty, Hansel and Gretel and many more.', 600, '1759492378_FairyTales,MythsandLegends(ScholasticClassics).jpg'),
(16, 4, 7, 'The Gruffalo Child', 'The story is about the Gruffalo daughter who, despite her father warning, sets off into the deep dark wood to find the \"big bad mouse\", the only thing her father is afraid of. The Gruffalo can not remember what he looks like and describes him as a monster.', 1200, '1759549389_TheGruffalosChild.jpeg'),
(17, 4, 8, 'Harry Potter and the Philosopher Stone', 'Harry Potter and the Philosopher\'s Stone introduces Harry, an orphan raised by his cruel aunt and uncle, who discovers on his eleventh birthday that he is a wizard with a place at Hogwarts School of Witchcraft and Wizardry. There, with new friends Ron and Hermione, he uncovers the truth of his past, including the dark wizard Voldemort who killed his parents, and must prevent him from acquiring the powerful Philosopher\'s Stone.', 400, '1759549558_HarryPotterandthePhilosopherStone.jpg'),
(18, 4, 7, 'Seven Ways Through the Woods', 'Seven Ways Through the Woods is a debut picture book by Jenn Reese and Devin Elle Kurtz that explores the magic of the woods, encouraging readers to embrace curiosity and imagination on a fantastical journey where they might encounter creatures like griffins and giants.  \r\n', 2050, '1759550735_SevenWaysThroughtheWoods.jpeg'),
(19, 5, 9, 'The Amazing Spider-Man', 'The Amazing Spider-Man isn\'t a single book, but a comic series where, after gaining powers from a radioactive spider, Peter Parker becomes the web-slinging superhero to fight villains like the Green Goblin and Doctor Octopus while managing his everyday life. Descriptions vary, but generally focus on his origin story, his dual life, and his ongoing struggle to balance responsibility and heroism against a backdrop of iconic foes and supporting characters.  ', 1850, '1759551401_TheAmazingSpiderMan.jpeg'),
(20, 5, 9, 'Shivaji', 'A born leader, a fearless warrior and a shrewd military strategist, Shivaji resorted to guerilla warfare techniques to outmaneuver his formidable adversaries, the Mughal masters of the North and the Bahmani sultans of the South. His exploits hastened the decline of Mughal power and gave rise to a new power in India, the Marathas. His love for freedom has made him a national icon of India.', 200, '1759576392_Shivaji.jpeg'),
(21, 5, 10, 'Sapiens A Graphic History', 'In this first volume of the adaptation of his ground-breaking book, renowned historian Yuval Harari tells the story of humankind\'s creation and evolution, exploring the ways in which biology and history have defined us and enhanced our understanding of what it means to be \"human\". From examining the role evolving humans have played in the global ecosystem to charting the rise of empires, Sapiens challenges us to reconsider accepted beliefs, connect past developments with contemporary concerns, and view specific events within the context of larger ideas.', 800, '1759576597_SapiensAGraphicHistory.jpg'),
(22, 5, 10, 'Wings of Fire Graphic Novel 01: The Dragonet Prophecy (Graphix)', 'The New York Times bestselling Wings of Fire series soars to new heights in this first-ever graphic novel adaptation! Not every dragonet wants a destiny ... Clay has grown up under the mountain, chosen along with four other dragonets to fulfill a mysterious prophecy and end the war between the dragon tribes of Pyrrhia. He\'s not so sure about the prophecy part, but Clay can\'t imagine not living with the other dragonets; they\'re his best friends. So when one of the dragonets is threatened, all five spring into action. Together, they will choose freedom over fate, leave the mountain, and fulfill their destiny -- on their own terms.The New York Times bestselling Wings of Fire series takes flight in this first graphic novel edition, adapted by the author with art by Mike Holmes.', 400, '1759576894_WingsofFireGraphicNovel01TheDragonetProphecy(Graphix).jpg'),
(23, 6, 11, 'New Deal Photography. USA 1935-1943', 'Amid the ravages of the Great Depression, the photographers of the Farm Security Administration set out to document the rural poor and “introduce America to Americans.” With nearly 400 pictures from the likes Dorothea Lange, Marion Post Wolcott, Walker Evans, and Russell Lee, this collection celebrates their efforts, as much for the power of each individual image as their collective and indelible survey of the United States.', 1550, '1759577163_NewDealPhotographyUSA19351943.jpg'),
(24, 6, 11, 'Mix Tapes and Photo Albums', 'Mix Tapes and Photo Albums, a narrative poetry collection that forms a poetic mix tape. This coming‐of‐age poetry collection told from the point of view of an adolescent girl, follows a group of teenagers who push the boundaries of their small town, explore relationships, and test where they fit in society. They find solace in their local punk rock scene, where philosophy is defined through three‐minute songs to a mosh pit of believers who wear bruises as trophies.', 1600, '1759577342_MixTapesandPhotoAlbums.jpg'),
(25, 6, 12, 'Adiyogi - The Source Of Yoga', '\"Adiyogi: The Source of Yoga\" by Sadhguru explores the origins of yoga and the figure of Adiyogi, also known as Shiva, as the first yogi who transmitted the 112-way science of yoga to humanity to achieve individual transformation and inner well-being. The book merges science and philosophy, presenting a contemporary mystic\'s chronicle of the progenitor of mysticism, emphasizing self-transformation and spiritual evolution over biological evolution. ', 250, '1759937355_AdiyogiTheSourceOfYoga.jpeg'),
(26, 6, 12, 'The Champions Mind: How Great Athletes Think, Train, and Thrive', 'Even among the most elite performers, certain athletes stand out as a cut above the rest, able to outperform in clutch, game-deciding moments. These athletes prove that raw athletic ability doesn\'t necessarily translate to a superior on-field experience—its the mental game that matters most. Sports participation—from the recreational to the collegiate Division I level—is at an all-time high. While the caliber of their games may differ, athletes at every level have one thing in common: the desire to excel. In The Champion\'s Mind, sports psychologist Jim Afremow, PhD, offers the same advice he uses with Olympians, Heisman Trophy winners, and professional athletes.', 600, '1759938789_TheChampionsMindHowGreatAthletesThinkTrainandThrive.jpeg'),
(27, 7, 13, 'India The Journey - A Travel Book On India', 'India The Journey 2024 edition, is your perfect travel partner & guide for all your travel experiences within India. With detailed information on major states like Delhi, Jammu & Kashmir, Maharashtra, Tamil Nadu, Kerala, Goa, West Bengal, Gujarat, Andaman & Nicobar, Himachal Pradesh, Punjab, Uttar Pradesh, Uttarakhand, Rajasthan, & many more. Travel information & tourist maps of all major cities, states, tourist destinations, places of interest & a folded map of India are also included in this travel volume. Key & essential information such as tourism offices, festivals & holidays, travel tips within India, Do\'s & Don\'ts, suggested tour packages, etc. ', 1000, '1759939097_IndiaTheJourneyATravelBookOnIndia.jpeg'),
(28, 7, 13, 'Destinations Of A Lifetime', 'National Geographic takes you on a photographic tour of our world in this spellbinding new coffee table travel gift book. Hundreds of Earth\'s most breath taking locales are illustrated with vivid, oversized full-color images taken by Nat Geo\'s world-class photographers. These images, coupled with evocative text, feature a plethora of visual wonders: ancient monoliths, scenic islands, stunning artwork, electric cityscapes, white-sand seashores, rain forests, ancient cobbled streets, and both classic and innovative architecture. Loaded with hard service information for each location, Destinations of a Lifetime has it all: when to go, where to eat, where to stay, and what to do to ensure the most enriching and authentic experience.', 1900, '1759939413_DestinationsOfALifetime.jpeg'),
(29, 7, 14, 'The Hidden Life of Trees', 'In The Hidden Life of Trees, Peter Wohlleben shares his deep love of woods and forests and explains the amazing processes of life, death, and regeneration he has observed in the woodland and the amazing scientific processes behind the wonders of which we are blissfully unaware. Much like human families, tree parents live together with their children, communicate with them, and support them as they grow, sharing nutrients with those who are sick or struggling and creating an ecosystem that mitigates the impact of extremes of heat and cold for the whole group. As a result of such interactions, trees in a family or community are protected and can live to be very old. In contrast, solitary trees, like street kids, have a tough time of it and in most cases die much earlier than those in a group.', 400, '1759942794_TheHiddenLifeofTrees.jpg'),
(30, 7, 14, 'Losing Earth: A Recent History', 'Nathaniel Rich\'s Losing Earth details the critical 1979–1989 decade when scientists had a complete understanding of climate change and the solutions, but failed to act due to political inertia, corporate opposition, and misinformation campaigns. The book recounts the efforts of activists, scientists like James Hansen, and policymakers who attempted to prevent climate disaster and highlights the birth of climate denialism. ', 2600, '1759943175_LosingEarthARecentHistory.jpg'),
(31, 8, 15, 'The Hunger Games', 'The Hunger Games is a young adult novel by Suzanne Collins where sixteen-year-old Katniss Everdeen volunteers to replace her sister in an annual televised fight to the death, the Hunger Games, forced upon the twelve oppressed districts of the dystopian nation of Panem by the rich Capitol. Katniss\'s survival in the brutal arena, where only one can win, forces her to make life-or-death choices, challenging the Capitol\'s control and sparking the potential for rebellion.  ', 450, '1759943505_TheHungerGames.jpg'),
(32, 8, 15, 'The Blood Traitor', 'The Blood Traitor is the thrilling finale to Lynette Noni\'s The Prison Healer series, where Kiva, after a failed rebellion, faces a journey of redemption and a desperate quest to save her world from a looming war. Forged into uneasy alliances with past enemies, Kiva must confront her mistakes, learn to control her magic, and embark on a perilous quest to gather ancient artifacts, ultimately deciding the fate of Evalon and the entire kingdom of Wenderall. ', 1350, '1759945062_TheBloodTraitor.jpg'),
(33, 8, 16, 'The Rose Bargain', 'The Rose Bargain is a romantic fantasy novel set in an alternate Victorian England ruled by an immortal fae queen. The story follows Ivy Benton, a young woman determined to save her family\'s reputation and uncover the truth about her sister\'s mysterious disappearance. As she navigates the royal competition to win the prince\'s hand, Ivy becomes entangled in a dangerous system of magical bargains that strips girls of their memories and freedom. The novel combines elements of romance, intrigue, and social conventions, making it a captivating read for fans of fantasy and young adult fiction.', 2900, '1762488939_TheRoseBargain.jpeg'),
(34, 8, 16, 'The Illustrated Ramayana: The Timeless Epic of Duty, Love, and Redemption', 'The story of Rama, the exiled prince of Ayodhya who battles the evil Ravana, the king of Lanka, and rescues his abducted wife, Sita, is about much more than the eternal battle of good versus evil. It is a tale of love, friendship, loyalty, devotion, righteousness, and deliverance. Ramayana and Rama, whose journey is told in the epic, are embedded in India?s cultural consciousness, but at the same time they transcend borders. Various versions of the Ramayana can be found across the Indian subcontinent and in parts of southeast Asia. Created in consultation with distinguished economist, scholar, and translator, Dr Bibek Debroy, The Illustrated Ramayana draws from one of its earliest composers, the celebrated sage and poet Valmiki. It uses a combination of text and stunning images drawn from a variety of sources ? from historic and contemporary artefacts, paintings, photographs, and performances ? to tell Rama?s story, as he walks the path that destiny creates for him.', 7050, '1762488840_TheIllustratedRamayanaTheTimelessEpicofDuty,Love,andRedemption.jpg'),
(35, 9, 17, 'Oxford English Dictionary', 'Oxford Dictionary of English The English language is full of words that are beyond our understanding even through we might come across them on a regular basis. In order to deal with them, we bring you the Oxford dictionary of English that will not only help you widen your vocabulary, but also your understanding of the language will be significantly improved. This dictionary has been acclaimed worldwide and can be used for reference. The dictionary uses an easy to understand language. The Oxford Dictionary of English gains its treasure of language source from a language program inclusive of the Oxford English Corpus, which comprises of two billion words.', 3200, '1762489317_OxfordEnglishDictionary.jpg'),
(36, 9, 17, 'The Chicago Manual of Style', 'Technologies may change, but the need for clear and accurate communication never goes out of style. That is why for more than one hundred years The Chicago Manual of Style has remained the definitive guide for anyone who works with words. In the seven years since the previous edition debuted, we have seen an extraordinary evolution in the way we create and share knowledge. This seventeenth edition of The Chicago Manual of Style has been prepared with an eye toward how we find, create, and cite information that readers are as likely to access from their pockets as from a bookshelf. It offers updated guidelines on electronic workflows and publication formats, tools for PDF annotation and citation management, web accessibility standards, and effective use of metadata, abstracts, and keywords.', 4800, '1762489593_TheChicagoManualofStyle.jpg'),
(37, 9, 18, 'Barrons ACT Study Guide', 'Barron\'s ACT Study Guide with 4 Practice Tests provides realistic practice and expert advice from experienced teachers who know the test. Step-by-step subject review helps you master the content, and full-length practice tests provide realistic text experience to get you prepared for the exam.', 600, '1762489846_BarronsACTStudyGuide.jpg'),
(38, 9, 18, 'The Official Cambridge Guide to IELTS', 'The Official Cambridge Guide to IELTS is a comprehensive study guide that provides in-depth preparation for both the Academic and General Training modules of the International English Language Testing System (IELTS) exam. It includes language and skills development, test-taking strategies, and eight official practice tests with audio and speaking test videos. The book focuses on helping students maximize their band score by addressing common mistakes made by real test-takers and includes a multimedia app for practice. ', 700, '1762489996_TheOfficialCambridgeGuidetoIELTS.jpg'),
(39, 10, 19, 'Onyx Storm', 'Onyx Storm follows Violet Sorrengail as she seeks allies to fight the venin threat, leading her to journey beyond the failing wards of Navarre. Facing internal and external enemies, she must uncover the truth about the venin and find a cure for Xaden, who is turning venin, while keeping a secret that could destroy everything. A critical part of her quest involves seeking out the truth about the elusive seventh dragon breed, the \"irids\". ', 1500, '1762492127_OnyxStorm.jpg'),
(40, 10, 19, 'Can We Be Strangers Again', 'Can We Be Strangers Again? by Shrijeet Shandilya is a story about three college friends whose lives are upended when two of them fall in love, leading to betrayal and heartbreak. The book explores themes of love, loss, and the complex emotional turmoil of fractured friendships and growing up, focusing on a character named Dev and his struggle with heartbreak, loneliness, and self-destruction. It is a character-driven novel that delves into the raw emotions of relationships and the bittersweet process of moving on.', 300, '1762492378_CanWeBeStrangersAgain.jpg'),
(41, 10, 20, 'The Story of a Heart', 'The Story of a Heart: Two Families, One Heart, and a Medical Miracle is a 2024 non-fiction book by British writer and doctor Rachel Clarke. It describes the story of a heart transplant between two children, Keira and Max, as well as the staff that treat them and the scientific and medical background which allows the treatment to work. The book won the 2025 Women\'s Prize for Non-Fiction and was shortlisted for the 2024 Baillie Gifford Prize for Non-Fiction.', 750, '1762492822_TheStoryofaHeartTwoFamiliesOneHeartandaMedicalMiracle.jpeg'),
(42, 10, 20, 'The First State of Being', 'The First State of Being is a middle-grade novel by Erin Entrada Kelly about 12-year-old Michael Rosario, who lives in Delaware in 1999 and is worried about the Y2K crisis. His life changes when he meets Ridge, a boy from the year 2199 who has time-traveled to the past. The book blends themes of friendship, family, anxiety, and self-discovery with sci-fi elements like time travel. ', 650, '1762492971_TheFirstStateofBeing.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_comments`
--

CREATE TABLE `product_comments` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_comments`
--

INSERT INTO `product_comments` (`id`, `product_id`, `name`, `email`, `phone`, `message`, `created_at`) VALUES
(1, 1, 'manav vaghela', 'abc@gmail.com', '9458514841', 'its very useful', '2025-10-04 12:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `rating` tinyint(4) NOT NULL,
  `review` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `product_id`, `name`, `email`, `phone`, `rating`, `review`, `created_at`) VALUES
(1, 1, 'manav vaghela', 'abc@gmail.com', '6633266365', 5, 'nice', '2025-10-04 12:19:20');

-- --------------------------------------------------------

--
-- Table structure for table `sitesettings`
--

CREATE TABLE `sitesettings` (
  `id` int(50) NOT NULL,
  `sitename` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phoneno` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sitesettings`
--

INSERT INTO `sitesettings` (`id`, `sitename`, `address`, `phoneno`, `email`, `image`) VALUES
(1, 'MHKBOOK', 'A-304, B.K. Homes, Vastu Pujya, Mansarovar Circle, Amroli,\r\nSurat, Gujarat.', '9712629424', 'mhk@gmail.com', '1759668938_finallogo.png');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(50) NOT NULL,
  `catid` int(50) NOT NULL,
  `subcatname` varchar(100) NOT NULL,
  `subcatdescription` text NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `catid`, `subcatname`, `subcatdescription`, `image`) VALUES
(1, 1, 'Historical Fiction', 'In a bookstore, the Historical Fiction category includes novels set in the past, at least 50 years before the present, that meticulously blend fictional elements with real historical events, settings, and cultural details to immerse the reader in another era. These stories feature a mix of fictional and real characters and events, all presented within an authentic, well-researched historical context to offer a unique perspective on the past.  ', '1758692762_Historical Fiction.jpg'),
(2, 1, 'Literary Fiction', 'In a bookstore, the Literary Fiction category features books that prioritize character, theme, and stylistic craft over a traditional, plot-driven story. These works explore deep human emotions and complex social or philosophical themes through introspective narrative and often feature elevated language, symbolic depth, and a focus on the inner world of characters.', '1758692952_Literary Fiction.jpg'),
(3, 2, 'Biographies & Memoirs', 'A biography or autobiography tells the story \"of a life\", while a memoir often tells the story of a particular career, event, or time, such as touchstone moments and turning points in the author\'s life. The author of a memoir may be referred to as a memoirist or a memorialist.', '1758708541_Biographies & Memoirs.jpg'),
(4, 2, 'Self-Help & Personal Development', 'These empowering personal development books are designed to inspire, motivate, and guide you toward achieving your goals and improving your overall well-being. Self-help books are a genre focused on personal growth, self-discovery, and practical strategies for improving various aspects of life.', '1758709912_Self-Help & Personal Development.jpg'),
(5, 3, 'Engineering & Mathematics', 'An Engineering & Mathematics book description typically highlights the book\'s purpose, which is to teach the mathematical principles and techniques essential for engineering studies, and its target audience, usually undergraduates in all engineering disciplines or those preparing for specific exams like GATE. ', '1758777113_Engineering & Mathematics.jpg'),
(6, 3, 'Law', 'A law book is a written work about laws, legal subjects, and historical cases, designed to accurately state the law and provide reasons for it. It can range from a book focused on a specific legal field, such as the Constitution of India, to broad historical overviews like The Law Book by DK, which explores significant legal milestones from ancient times to the present day.', '1758822132_Law.jpg'),
(7, 4, 'Picture Books', 'Picture Books in the Children & Young Adults category are beautifully illustrated stories that bring words and art together to spark imagination and curiosity. Perfect for early readers, these books use engaging visuals and simple, meaningful text to entertain, teach life lessons, and encourage a love for reading from an early age. From timeless classics to modern tales, picture books create shared moments of joy for children, parents, and caregivers alike.', '1759485848_Picture Books.jpg'),
(8, 4, 'Fairytales, Myths & Legends', 'A book about fairy tales, myths, and legends for children and young adults typically presents a collection of classic, world-renowned stories featuring enchanting characters like princesses, heroes, and magical beings, often enhanced with vibrant illustrations, designed to provide hours of entertainment and sometimes impart timeless moral lessons about bravery, kindness, and friendship. These books aim to spark a child\'s imagination by transporting them to fantastical lands filled with adventure, magic and wisdom.', '1759486691_Fairytales, Myths & Legends.jpg'),
(9, 5, 'Super Heroes', 'The superhero subcategory of comic books centers on heroic characters, known as superheroes, who possess extraordinary or superhuman powers and use them to fight against crime and injustice. Originating in the late 1930s with characters like Superman, this genre has evolved through several key periods, reflecting societal values and expanding into vast, interconnected fictional universes. ', '1759487000_Super Heroes.jpg'),
(10, 5, 'Graphic Novels', 'A graphic novel is a self-contained, book-length form of sequential art. The term graphic novel is often applied broadly, including fiction, non-fiction, and anthologized work, though this practice is highly contested by comics scholars and industry professionals.', '1759487287_Graphic Novels.jpg'),
(11, 6, 'Photography', 'Books in the photography subcategory of \"Lifestyle & Hobbies\" focus on capturing the beauty and authenticity of everyday life, often bridging the gap between polished portraiture and candid documentary styles. The goal is to tell a compelling visual story that captures genuine emotions and relatable moments, creating images with warmth and a sense of connection.', '1759487469_Photography.jpg'),
(12, 6, 'Sports & Fitness', 'In the Lifestyle & Hobbies category, books in the Sports & Fitness subcategory offer a wide range of content, from practical, science-based guides to inspirational and biographical works. These books appeal to fitness enthusiasts, athletes, and anyone looking to improve their physical or mental health. Descriptions for these books emphasize the actionable, transformative, and authoritative nature of their content.', '1759487607_Sports & Fitness.jpg'),
(13, 7, 'Travel Guides', 'A Special Interest travel guide describes a niche guidebook that delves deeply into a specific topic, destination, or demographic for a particular interest, such as culinary travel, history-focused tours, or pet-friendly excursions. Unlike broad destination guides, these books target passionate individuals who want to organize trips around their interests, offering tailored itineraries, expert advice, and in-depth coverage of relevant sites and experiences. ', '1759487809_Travel Guides.jpg'),
(14, 7, 'Nature & Environment', 'A \"Nature & Environment Special Interest\" book focuses on subjects ranging from scientific and academic studies to personal essays and immersive field guides. A book description for this genre highlights the specific niche within nature and environment that the text explores, the unique approach or perspective of the author, and the intended audience.', '1759487945_Nature & Environment.jpg'),
(15, 8, 'E-books', 'E-Books are digital versions of books containing text and images, stored as files like EPUB, MOBI, or PDF for reading on devices like e-readers, tablets, or computers. eBook formats provide a versatile reading experience, allowing for adjustable text, interactive elements, and dynamic reflowable text that adapts to different screen sizes. Key formats include the open standard EPUB, the user-friendly PDF, and Amazon\'s proprietary MOBI/AZW for Kindle devices.', '1759488181_E-Book.jpg'),
(16, 8, 'Limited Editions', 'A limited edition book is a collectible version of a title, with a strictly controlled and low production number that adds to its scarcity and value. The book\'s description is a marketing tool that focuses on the unique, high-quality features and exclusivity that set it apart from the standard or \"trade\" edition. ', '1759488309_Limited Editions.jpg'),
(17, 9, 'Dictionaries & Reference', 'A book in the Dictionaries & Reference Language & Learning category is designed for quick, specific lookups to enhance language skills and comprehension, rather than for cover-to-cover reading. These resources are organized for efficient access to information and focus on factual, accurate content.', '1759488542_Dictionaries & Reference.jpg'),
(18, 9, 'Study Guides', 'A \"Language & Learning\" study guide is a book designed to help individuals acquire a new language through structured lessons, practice exercises, and effective learning strategies. These books can serve as standalone resources for self-study or as supplements to a traditional classroom course. ', '1759488776_Study Guides.jpg'),
(19, 10, 'New Releases', 'New Releases, Bestsellers, and Curated refers to book collections organized by their release status, popularity, and curated recommendations, highlighting the latest additions, top-selling titles, and hand-picked selections from experts and algorithms to help readers discover new reads. This concept is used by booksellers like Amazon.in and Penguin Random House to showcase books for consumers. ', '1759488954_New Releases.jpg'),
(20, 10, 'Award Winners', 'The \"Award Winners\" subcategory of \"Bestsellers & Curated\" features books that have been recognized and celebrated by prestigious literary institutions and influential readers. These are titles singled out for their outstanding quality in storytelling, profound thematic depth, or distinctive voice, offering readers a verified path to discovering exceptional writing. ', '1759489069_Award Winners.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(9, 'Manav Vaghela', 'manav02@gmail.com', 86),
(10, 'Anushree', 'ANU@GMAIL.COM', 4),
(11, 'Devangi Vaghela', 'devangi001@gmail.com', 0),
(12, 'Dhruvi Gajjar', 'dhruvi@gmail.com', 97389671),
(13, 'Sanjay Vaghela', 'mok21@gmail.com', 9),
(14, 'Keyuri Gajjar', 'keyuri@gmail.com', 15);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `user_agent` text DEFAULT NULL,
  `visit_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip_address`, `user_agent`, `visit_time`, `path`, `created_at`) VALUES
(1, '::1', '', '2025-10-08 14:08:15', NULL, '2025-10-08 17:54:05'),
(2, '::1', '', '2025-10-08 15:14:35', NULL, '2025-10-08 17:54:05'),
(3, '::1', '', '2025-10-08 17:42:22', NULL, '2025-10-08 17:54:05'),
(4, '::1', '', '2025-10-08 17:42:31', NULL, '2025-10-08 17:54:05'),
(5, '::1', '', '2025-10-08 17:42:34', NULL, '2025-10-08 17:54:05'),
(6, '::1', '', '2025-10-08 17:43:42', NULL, '2025-10-08 17:54:05'),
(7, '::1', '', '2025-10-08 17:45:03', NULL, '2025-10-08 17:54:05'),
(8, '::1', '', '2025-10-08 17:45:13', NULL, '2025-10-08 17:54:05'),
(9, '::1', NULL, '2025-10-08 17:55:38', NULL, '2025-10-08 17:55:38'),
(10, '::1', NULL, '2025-10-08 17:55:41', NULL, '2025-10-08 17:55:41'),
(11, '::1', NULL, '2025-10-08 17:55:41', NULL, '2025-10-08 17:55:41'),
(12, '::1', NULL, '2025-10-08 17:59:21', NULL, '2025-10-08 17:59:21'),
(13, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-08 17:59:21', '/eiser-master/eiser-master/index.php', '2025-10-08 17:59:21'),
(14, '::1', NULL, '2025-10-08 18:00:13', NULL, '2025-10-08 18:00:13'),
(15, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-10-08 18:00:13', '/eiser-master/eiser-master/index.php', '2025-10-08 18:00:13'),
(16, '::1', NULL, '2025-10-08 18:01:28', NULL, '2025-10-08 18:01:28'),
(17, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-10-08 18:01:28', '/eiser-master/eiser-master/', '2025-10-08 18:01:28'),
(18, '::1', NULL, '2025-10-08 18:01:38', NULL, '2025-10-08 18:01:38'),
(19, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-10-08 18:01:38', '/eiser-master/eiser-master/index.php', '2025-10-08 18:01:38'),
(20, '::1', NULL, '2025-10-08 18:09:15', NULL, '2025-10-08 18:09:15'),
(21, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-10-08 18:09:15', '/eiser-master/eiser-master/index.php', '2025-10-08 18:09:15'),
(22, '::1', NULL, '2025-10-08 18:09:31', NULL, '2025-10-08 18:09:31'),
(23, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-10-08 18:09:31', '/eiser-master/eiser-master/', '2025-10-08 18:09:31'),
(24, '::1', NULL, '2025-10-08 18:09:41', NULL, '2025-10-08 18:09:41'),
(25, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-10-08 18:09:41', '/eiser-master/eiser-master/index.php', '2025-10-08 18:09:41'),
(26, '::1', NULL, '2025-10-08 18:10:26', NULL, '2025-10-08 18:10:26'),
(27, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-10-08 18:10:26', '/eiser-master/eiser-master/index.php', '2025-10-08 18:10:26'),
(28, '::1', NULL, '2025-10-08 18:10:46', NULL, '2025-10-08 18:10:46'),
(29, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-10-08 18:10:46', '/eiser-master/eiser-master/index.php', '2025-10-08 18:10:46'),
(30, '::1', NULL, '2025-10-08 18:11:03', NULL, '2025-10-08 18:11:03'),
(31, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-10-08 18:11:03', '/eiser-master/eiser-master/index.php', '2025-10-08 18:11:03'),
(32, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-10-08 18:12:47', '/eiser-master/eiser-master/index.php', '2025-10-08 18:12:47'),
(33, '::1', NULL, '2025-10-09 08:06:54', NULL, '2025-10-09 08:06:54'),
(34, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 08:06:54', '/eiser-master/eiser-master/index.php', '2025-10-09 08:06:54'),
(35, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 08:15:40', '/eiser-master/eiser-master/category.php', '2025-10-09 08:15:40'),
(36, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 08:16:08', '/eiser-master/eiser-master/category.php', '2025-10-09 08:16:08'),
(37, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 08:17:48', '/eiser-master/eiser-master/single-product.php', '2025-10-09 08:17:48'),
(38, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 08:17:52', '/eiser-master/eiser-master/product.php', '2025-10-09 08:17:52'),
(39, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 08:18:45', '/eiser-master/eiser-master/product.php', '2025-10-09 08:18:45'),
(40, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 08:18:55', '/eiser-master/eiser-master/category.php', '2025-10-09 08:18:55'),
(41, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 08:21:19', '/eiser-master/eiser-master/category.php', '2025-10-09 08:21:19'),
(42, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 08:21:53', '/eiser-master/eiser-master/category.php', '2025-10-09 08:21:53'),
(43, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 08:23:06', '/eiser-master/eiser-master/category.php?show=All&view=list', '2025-10-09 08:23:06'),
(44, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 08:23:36', '/eiser-master/eiser-master/category.php?show=All&view=list', '2025-10-09 08:23:36'),
(45, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 08:24:33', '/eiser-master/eiser-master/category.php?show=All&view=list', '2025-10-09 08:24:33'),
(46, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 08:24:54', '/eiser-master/eiser-master/product.php', '2025-10-09 08:24:54'),
(47, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 08:25:25', '/eiser-master/eiser-master/category.php?catid=8', '2025-10-09 08:25:25'),
(48, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 08:25:29', '/eiser-master/eiser-master/category.php?catid=8&show=All&view=list', '2025-10-09 08:25:29'),
(49, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 08:29:20', '/eiser-master/eiser-master/login.php', '2025-10-09 08:29:20'),
(50, '::1', NULL, '2025-10-09 08:29:37', NULL, '2025-10-09 08:29:37'),
(51, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 08:29:37', '/eiser-master/eiser-master/index.php', '2025-10-09 08:29:37'),
(52, '::1', NULL, '2025-10-09 08:32:50', NULL, '2025-10-09 08:32:50'),
(53, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-09 08:32:50', '/eiser-master/eiser-master/', '2025-10-09 08:32:50'),
(54, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 08:40:47', '/eiser-master/eiser-master/cart.php', '2025-10-09 08:40:47'),
(55, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 08:40:50', '/eiser-master/eiser-master/checkout.php', '2025-10-09 08:40:50'),
(56, '::1', NULL, '2025-10-09 09:44:12', NULL, '2025-10-09 09:44:12'),
(57, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 09:44:12', '/eiser-master/eiser-master/index.php', '2025-10-09 09:44:12'),
(58, '::1', NULL, '2025-10-09 09:46:35', NULL, '2025-10-09 09:46:35'),
(59, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 09:46:35', '/eiser-master/eiser-master/index.php', '2025-10-09 09:46:35'),
(60, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 10:15:42', '/eiser-master/eiser-master/inspired-product.php', '2025-10-09 10:15:42'),
(61, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 10:15:51', '/eiser-master/eiser-master/product.php', '2025-10-09 10:15:51'),
(62, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 10:38:20', '/eiser-master/eiser-master/product.php', '2025-10-09 10:38:20'),
(63, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 10:49:45', '/eiser-master/eiser-master/category.php', '2025-10-09 10:49:45'),
(64, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:09:21', '/eiser-master/eiser-master/wishlist.php', '2025-10-09 11:09:21'),
(65, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:09:26', '/eiser-master/eiser-master/tracking.php', '2025-10-09 11:09:26'),
(66, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:10:21', '/eiser-master/eiser-master/login.php', '2025-10-09 11:10:21'),
(67, '::1', NULL, '2025-10-09 11:10:34', NULL, '2025-10-09 11:10:34'),
(68, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:10:34', '/eiser-master/eiser-master/index.php', '2025-10-09 11:10:34'),
(69, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:10:39', '/eiser-master/eiser-master/profile.php', '2025-10-09 11:10:39'),
(70, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:12:35', '/eiser-master/eiser-master/elements.php', '2025-10-09 11:12:35'),
(71, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:12:52', '/eiser-master/eiser-master/coupen.php', '2025-10-09 11:12:52'),
(72, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:13:00', '/eiser-master/eiser-master/coupen.php', '2025-10-09 11:13:00'),
(73, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:13:15', '/eiser-master/eiser-master/contact.php', '2025-10-09 11:13:15'),
(74, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:13:25', '/eiser-master/eiser-master/contact.php', '2025-10-09 11:13:25'),
(75, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:17:55', '/eiser-master/eiser-master/coupen.php', '2025-10-09 11:17:55'),
(76, '::1', NULL, '2025-10-09 11:20:08', NULL, '2025-10-09 11:20:08'),
(77, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:20:08', '/eiser-master/eiser-master/index.php', '2025-10-09 11:20:08'),
(78, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:20:12', '/eiser-master/eiser-master/coupen.php', '2025-10-09 11:20:12'),
(79, '::1', NULL, '2025-10-09 11:23:10', NULL, '2025-10-09 11:23:10'),
(80, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:23:10', '/eiser-master/eiser-master/', '2025-10-09 11:23:10'),
(81, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:23:12', '/eiser-master/eiser-master/login.php', '2025-10-09 11:23:12'),
(82, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:25:02', '/eiser-master/eiser-master/login.php', '2025-10-09 11:25:02'),
(83, '::1', NULL, '2025-10-09 11:25:21', NULL, '2025-10-09 11:25:21'),
(84, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:25:21', '/eiser-master/eiser-master/index.php', '2025-10-09 11:25:21'),
(85, '::1', NULL, '2025-10-09 11:25:29', NULL, '2025-10-09 11:25:29'),
(86, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:25:29', '/eiser-master/eiser-master/index.php', '2025-10-09 11:25:29'),
(87, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:25:31', '/eiser-master/eiser-master/cart.php', '2025-10-09 11:25:31'),
(88, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:25:39', '/eiser-master/eiser-master/coupen.php', '2025-10-09 11:25:39'),
(89, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:25:46', '/eiser-master/eiser-master/coupen.php', '2025-10-09 11:25:46'),
(90, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:26:01', '/eiser-master/eiser-master/coupen.php', '2025-10-09 11:26:01'),
(91, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:26:58', '/eiser-master/eiser-master/cart.php', '2025-10-09 11:26:58'),
(92, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:27:10', '/eiser-master/eiser-master/coupen.php', '2025-10-09 11:27:10'),
(93, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:27:21', '/eiser-master/eiser-master/coupen.php', '2025-10-09 11:27:21'),
(94, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:27:33', '/eiser-master/eiser-master/cart.php', '2025-10-09 11:27:33'),
(95, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:27:41', '/eiser-master/eiser-master/checkout.php', '2025-10-09 11:27:41'),
(96, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:27:57', '/eiser-master/eiser-master/coupen.php', '2025-10-09 11:27:57'),
(97, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:28:11', '/eiser-master/eiser-master/cart.php', '2025-10-09 11:28:11'),
(98, '::1', NULL, '2025-10-09 11:28:31', NULL, '2025-10-09 11:28:31'),
(99, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:28:31', '/eiser-master/eiser-master/index.php', '2025-10-09 11:28:31'),
(100, '::1', NULL, '2025-10-09 11:28:34', NULL, '2025-10-09 11:28:34'),
(101, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:28:34', '/eiser-master/eiser-master/index.php', '2025-10-09 11:28:34'),
(102, '::1', NULL, '2025-10-09 11:28:36', NULL, '2025-10-09 11:28:36'),
(103, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:28:36', '/eiser-master/eiser-master/index.php', '2025-10-09 11:28:36'),
(104, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:28:46', '/eiser-master/eiser-master/cart.php', '2025-10-09 11:28:46'),
(105, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:28:56', '/eiser-master/eiser-master/cart.php', '2025-10-09 11:28:56'),
(106, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:31:50', '/eiser-master/eiser-master/cart.php', '2025-10-09 11:31:50'),
(107, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:31:58', '/eiser-master/eiser-master/coupen.php', '2025-10-09 11:31:58'),
(108, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:32:01', '/eiser-master/eiser-master/cart.php', '2025-10-09 11:32:01'),
(109, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:32:12', '/eiser-master/eiser-master/categories.php', '2025-10-09 11:32:12'),
(110, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:32:16', '/eiser-master/eiser-master/category.php', '2025-10-09 11:32:16'),
(111, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:32:20', '/eiser-master/eiser-master/cart.php', '2025-10-09 11:32:20'),
(112, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:32:37', '/eiser-master/eiser-master/cart.php', '2025-10-09 11:32:37'),
(113, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:32:57', '/eiser-master/eiser-master/cart.php', '2025-10-09 11:32:57'),
(114, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:35:26', '/eiser-master/eiser-master/cart.php', '2025-10-09 11:35:26'),
(115, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:35:30', '/eiser-master/eiser-master/cart.php', '2025-10-09 11:35:30'),
(116, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:35:35', '/eiser-master/eiser-master/cart.php', '2025-10-09 11:35:35'),
(117, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:35:41', '/eiser-master/eiser-master/cart.php', '2025-10-09 11:35:41'),
(118, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:35:46', '/eiser-master/eiser-master/checkout.php', '2025-10-09 11:35:46'),
(119, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:36:53', '/eiser-master/eiser-master/checkout.php', '2025-10-09 11:36:53'),
(120, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 11:37:17', '/eiser-master/eiser-master/place_order.php', '2025-10-09 11:37:17'),
(121, '::1', NULL, '2025-10-09 13:10:28', NULL, '2025-10-09 13:10:28'),
(122, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:10:28', '/eiser-master/eiser-master/index.php', '2025-10-09 13:10:28'),
(123, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:21:05', '/eiser-master/eiser-master/place_order.php', '2025-10-09 13:21:05'),
(124, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:21:16', '/eiser-master/eiser-master/product.php', '2025-10-09 13:21:16'),
(125, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:21:22', '/eiser-master/eiser-master/product.php', '2025-10-09 13:21:22'),
(126, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:21:27', '/eiser-master/eiser-master/cart.php', '2025-10-09 13:21:27'),
(127, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:21:30', '/eiser-master/eiser-master/checkout.php', '2025-10-09 13:21:30'),
(128, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:21:36', '/eiser-master/eiser-master/place_order.php', '2025-10-09 13:21:36'),
(129, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:22:32', '/eiser-master/eiser-master/profile.php', '2025-10-09 13:22:32'),
(130, '::1', NULL, '2025-10-09 13:22:51', NULL, '2025-10-09 13:22:51'),
(131, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:22:51', '/eiser-master/eiser-master/index.php', '2025-10-09 13:22:51'),
(132, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:22:53', '/eiser-master/eiser-master/login.php', '2025-10-09 13:22:53'),
(133, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:22:55', '/eiser-master/eiser-master/place_order.php', '2025-10-09 13:22:55'),
(134, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:22:55', '/eiser-master/eiser-master/checkout.php', '2025-10-09 13:22:55'),
(135, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:22:55', '/eiser-master/eiser-master/cart.php', '2025-10-09 13:22:55'),
(136, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:22:56', '/eiser-master/eiser-master/product.php', '2025-10-09 13:22:56'),
(137, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:22:57', '/eiser-master/eiser-master/product.php', '2025-10-09 13:22:57'),
(138, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:22:58', '/eiser-master/eiser-master/place_order.php', '2025-10-09 13:22:58'),
(139, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:23:01', '/eiser-master/eiser-master/place_order.php', '2025-10-09 13:23:01'),
(140, '::1', NULL, '2025-10-09 13:25:41', NULL, '2025-10-09 13:25:41'),
(141, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:25:41', '/eiser-master/eiser-master/index.php', '2025-10-09 13:25:41'),
(142, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:25:46', '/eiser-master/eiser-master/login.php', '2025-10-09 13:25:46'),
(143, '::1', NULL, '2025-10-09 13:25:57', NULL, '2025-10-09 13:25:57'),
(144, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:25:57', '/eiser-master/eiser-master/index.php', '2025-10-09 13:25:57'),
(145, '::1', NULL, '2025-10-09 13:26:04', NULL, '2025-10-09 13:26:04'),
(146, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:26:04', '/eiser-master/eiser-master/index.php', '2025-10-09 13:26:04'),
(147, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:26:07', '/eiser-master/eiser-master/cart.php', '2025-10-09 13:26:07'),
(148, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:26:11', '/eiser-master/eiser-master/checkout.php', '2025-10-09 13:26:11'),
(149, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:26:16', '/eiser-master/eiser-master/place_order.php', '2025-10-09 13:26:16'),
(150, '::1', NULL, '2025-10-09 13:26:39', NULL, '2025-10-09 13:26:39'),
(151, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:26:39', '/eiser-master/eiser-master/index.php', '2025-10-09 13:26:39'),
(152, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:26:41', '/eiser-master/eiser-master/login.php', '2025-10-09 13:26:41'),
(153, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:26:44', '/eiser-master/eiser-master/login.php', '2025-10-09 13:26:44'),
(154, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:26:46', '/eiser-master/eiser-master/login.php', '2025-10-09 13:26:46'),
(155, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:26:51', '/eiser-master/eiser-master/login.php', '2025-10-09 13:26:51'),
(156, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:27:02', '/eiser-master/eiser-master/login.php', '2025-10-09 13:27:02'),
(157, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:27:03', '/eiser-master/eiser-master/place_order.php', '2025-10-09 13:27:03'),
(158, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:27:03', '/eiser-master/eiser-master/checkout.php', '2025-10-09 13:27:03'),
(159, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:27:03', '/eiser-master/eiser-master/cart.php', '2025-10-09 13:27:03'),
(160, '::1', NULL, '2025-10-09 13:27:03', NULL, '2025-10-09 13:27:03'),
(161, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:27:03', '/eiser-master/eiser-master/index.php', '2025-10-09 13:27:03'),
(162, '::1', NULL, '2025-10-09 13:27:04', NULL, '2025-10-09 13:27:04'),
(163, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:27:04', '/eiser-master/eiser-master/index.php', '2025-10-09 13:27:04'),
(164, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:27:05', '/eiser-master/eiser-master/login.php', '2025-10-09 13:27:05'),
(165, '::1', NULL, '2025-10-09 13:27:06', NULL, '2025-10-09 13:27:06'),
(166, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:27:06', '/eiser-master/eiser-master/index.php', '2025-10-09 13:27:06'),
(167, '::1', NULL, '2025-10-09 13:27:09', NULL, '2025-10-09 13:27:09'),
(168, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:27:09', '/eiser-master/eiser-master/index.php', '2025-10-09 13:27:09'),
(169, '::1', NULL, '2025-10-09 13:28:17', NULL, '2025-10-09 13:28:17'),
(170, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:28:17', '/eiser-master/eiser-master/index.php', '2025-10-09 13:28:17'),
(171, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:30:37', '/eiser-master/eiser-master/contact.php', '2025-10-09 13:30:37'),
(172, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:32:32', '/eiser-master/eiser-master/contact.php', '2025-10-09 13:32:32'),
(173, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:34:42', '/eiser-master/eiser-master/contact.php', '2025-10-09 13:34:42'),
(174, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:36:00', '/eiser-master/eiser-master/contact.php', '2025-10-09 13:36:00'),
(175, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:36:24', '/eiser-master/eiser-master/contact.php', '2025-10-09 13:36:24'),
(176, '::1', NULL, '2025-10-09 13:38:00', NULL, '2025-10-09 13:38:00'),
(177, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:38:00', '/eiser-master/eiser-master/index.php', '2025-10-09 13:38:00'),
(178, '::1', NULL, '2025-10-09 13:53:07', NULL, '2025-10-09 13:53:07'),
(179, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:53:07', '/eiser-master/eiser-master/index.php', '2025-10-09 13:53:07'),
(180, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:53:12', '/eiser-master/eiser-master/category.php', '2025-10-09 13:53:12'),
(181, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:53:44', '/eiser-master/eiser-master/category.php', '2025-10-09 13:53:44'),
(182, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:56:04', '/eiser-master/eiser-master/category.php', '2025-10-09 13:56:04'),
(183, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:56:07', '/eiser-master/eiser-master/category.php', '2025-10-09 13:56:07'),
(184, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:56:08', '/eiser-master/eiser-master/category.php', '2025-10-09 13:56:08'),
(185, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:56:09', '/eiser-master/eiser-master/category.php', '2025-10-09 13:56:09'),
(186, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:56:11', '/eiser-master/eiser-master/category.php', '2025-10-09 13:56:11'),
(187, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:56:12', '/eiser-master/eiser-master/category.php', '2025-10-09 13:56:12'),
(188, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:56:13', '/eiser-master/eiser-master/category.php', '2025-10-09 13:56:13'),
(189, '::1', NULL, '2025-10-09 13:56:24', NULL, '2025-10-09 13:56:24'),
(190, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:56:24', '/eiser-master/eiser-master/index.php', '2025-10-09 13:56:24'),
(191, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:56:32', '/eiser-master/eiser-master/category.php', '2025-10-09 13:56:32'),
(192, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:57:24', '/eiser-master/eiser-master/category.php', '2025-10-09 13:57:24'),
(193, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:58:04', '/eiser-master/eiser-master/category.php', '2025-10-09 13:58:04'),
(194, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 13:58:15', '/eiser-master/eiser-master/category.php', '2025-10-09 13:58:15'),
(195, '::1', NULL, '2025-10-09 16:48:57', NULL, '2025-10-09 16:48:57'),
(196, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 16:48:57', '/eiser-master/eiser-master/index.php', '2025-10-09 16:48:57'),
(197, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 16:49:08', '/eiser-master/eiser-master/contact.php', '2025-10-09 16:49:08'),
(198, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 16:49:40', '/eiser-master/eiser-master/contact.php', '2025-10-09 16:49:40'),
(199, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 16:50:02', '/eiser-master/eiser-master/tracking.php', '2025-10-09 16:50:02'),
(200, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 16:50:11', '/eiser-master/eiser-master/categories.php', '2025-10-09 16:50:11'),
(201, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 16:50:13', '/eiser-master/eiser-master/category.php', '2025-10-09 16:50:13'),
(202, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-09 16:50:45', '/eiser-master/eiser-master/single-product.php?id=5', '2025-10-09 16:50:45'),
(203, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-10 03:54:47', '/eiser-master/eiser-master/single-product.php', '2025-10-10 03:54:47'),
(204, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-10 03:54:51', '/eiser-master/eiser-master/categories.php', '2025-10-10 03:54:51'),
(205, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-10 03:59:30', '/eiser-master/eiser-master/category.php?catid=1', '2025-10-10 03:59:30'),
(206, '::1', NULL, '2025-10-10 03:59:40', NULL, '2025-10-10 03:59:40'),
(207, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-10 03:59:40', '/eiser-master/eiser-master/index.php', '2025-10-10 03:59:40'),
(208, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-10 03:59:43', '/eiser-master/eiser-master/categories.php', '2025-10-10 03:59:43'),
(209, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-10 03:59:49', '/eiser-master/eiser-master/category.php?catid=1', '2025-10-10 03:59:49'),
(210, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-10 04:00:19', '/eiser-master/eiser-master/categories.php', '2025-10-10 04:00:19'),
(211, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-10 04:00:19', '/eiser-master/eiser-master/single-product.php', '2025-10-10 04:00:19'),
(212, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-10 04:00:20', '/eiser-master/eiser-master/category.php', '2025-10-10 04:00:20'),
(213, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-10 04:00:21', '/eiser-master/eiser-master/categories.php', '2025-10-10 04:00:21'),
(214, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-10 04:00:22', '/eiser-master/eiser-master/tracking.php', '2025-10-10 04:00:22'),
(215, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-10 04:00:22', '/eiser-master/eiser-master/contact.php', '2025-10-10 04:00:22'),
(216, '::1', NULL, '2025-10-10 04:00:23', NULL, '2025-10-10 04:00:23'),
(217, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-10 04:00:23', '/eiser-master/eiser-master/index.php', '2025-10-10 04:00:23'),
(218, '::1', NULL, '2025-10-10 04:04:13', NULL, '2025-10-10 04:04:13'),
(219, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-10 04:04:13', '/eiser-master/eiser-master/index.php', '2025-10-10 04:04:13'),
(220, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-10 04:04:16', '/eiser-master/eiser-master/category.php', '2025-10-10 04:04:16'),
(221, '::1', NULL, '2025-10-10 04:09:57', NULL, '2025-10-10 04:09:57'),
(222, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-10 04:09:57', '/eiser-master/eiser-master/index.php', '2025-10-10 04:09:57'),
(223, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-10 04:09:58', '/eiser-master/eiser-master/category.php', '2025-10-10 04:09:58'),
(224, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-10 04:10:01', '/eiser-master/eiser-master/category.php?catid=1', '2025-10-10 04:10:01'),
(225, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-10 04:11:45', '/eiser-master/eiser-master/category.php?catid=1', '2025-10-10 04:11:45'),
(226, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-10 04:11:48', '/eiser-master/eiser-master/category.php?catid=2', '2025-10-10 04:11:48'),
(227, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-10 04:12:01', '/eiser-master/eiser-master/category.php?catid=1', '2025-10-10 04:12:01'),
(228, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-10 04:14:18', '/eiser-master/eiser-master/category.php?catid=10', '2025-10-10 04:14:18'),
(229, '::1', NULL, '2025-10-10 04:14:34', NULL, '2025-10-10 04:14:34'),
(230, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-10 04:14:34', '/eiser-master/eiser-master/index.php', '2025-10-10 04:14:34'),
(231, '::1', NULL, '2025-10-10 05:06:53', NULL, '2025-10-10 05:06:53'),
(232, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-10 05:06:53', '/eiser-master/eiser-master/', '2025-10-10 05:06:53'),
(233, '::1', NULL, '2025-10-10 05:07:07', NULL, '2025-10-10 05:07:07'),
(234, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-10 05:07:07', '/eiser-master/eiser-master/', '2025-10-10 05:07:07'),
(235, '::1', NULL, '2025-10-10 08:56:16', NULL, '2025-10-10 08:56:16'),
(236, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-10 08:56:16', '/eiser-master/eiser-master/index.php', '2025-10-10 08:56:16'),
(237, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-10 08:56:26', '/eiser-master/eiser-master/product.php', '2025-10-10 08:56:26'),
(238, '::1', NULL, '2025-10-12 07:30:33', NULL, '2025-10-12 07:30:33'),
(239, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-12 07:30:33', '/eiser-master/eiser-master/', '2025-10-12 07:30:33'),
(240, '::1', NULL, '2025-10-12 07:30:44', NULL, '2025-10-12 07:30:44'),
(241, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-12 07:30:44', '/eiser-master/eiser-master/index.php', '2025-10-12 07:30:44'),
(242, '::1', NULL, '2025-10-12 07:30:50', NULL, '2025-10-12 07:30:50'),
(243, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-12 07:30:50', '/eiser-master/eiser-master/index.php', '2025-10-12 07:30:50'),
(244, '::1', NULL, '2025-10-12 07:30:53', NULL, '2025-10-12 07:30:53'),
(245, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-12 07:30:53', '/eiser-master/eiser-master/index.php', '2025-10-12 07:30:53'),
(246, '::1', NULL, '2025-10-26 06:10:25', NULL, '2025-10-26 06:10:25'),
(247, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-26 06:10:25', '/eiser-master/eiser-master/index.php', '2025-10-26 06:10:25'),
(248, '::1', NULL, '2025-10-26 06:10:47', NULL, '2025-10-26 06:10:47'),
(249, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-26 06:10:47', '/eiser-master/eiser-master/index.php', '2025-10-26 06:10:47'),
(250, '::1', NULL, '2025-10-26 06:23:13', NULL, '2025-10-26 06:23:13'),
(251, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-26 06:23:13', '/eiser-master/eiser-master/index.php', '2025-10-26 06:23:13'),
(252, '::1', NULL, '2025-10-26 06:32:42', NULL, '2025-10-26 06:32:42'),
(253, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-26 06:32:42', '/eiser-master/eiser-master/index.php', '2025-10-26 06:32:42'),
(254, '::1', NULL, '2025-10-28 09:07:37', NULL, '2025-10-28 09:07:37'),
(255, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-28 09:07:37', '/eiser-master/eiser-master/index.php', '2025-10-28 09:07:37'),
(256, '::1', NULL, '2025-11-07 03:18:34', NULL, '2025-11-07 03:18:34'),
(257, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:18:34', '/eiser-master/eiser-master/', '2025-11-07 03:18:34'),
(258, '::1', NULL, '2025-11-07 03:19:54', NULL, '2025-11-07 03:19:54'),
(259, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:19:54', '/eiser-master/eiser-master/', '2025-11-07 03:19:54'),
(260, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:22:52', '/eiser-master/eiser-master/login.php', '2025-11-07 03:22:52'),
(261, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:23:47', '/eiser-master/eiser-master/login.php', '2025-11-07 03:23:47'),
(262, '::1', NULL, '2025-11-07 03:24:06', NULL, '2025-11-07 03:24:06'),
(263, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:24:06', '/eiser-master/eiser-master/index.php', '2025-11-07 03:24:06'),
(264, '::1', NULL, '2025-11-07 03:24:23', NULL, '2025-11-07 03:24:23'),
(265, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:24:23', '/eiser-master/eiser-master/index.php', '2025-11-07 03:24:23'),
(266, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:24:25', '/eiser-master/eiser-master/cart.php', '2025-11-07 03:24:25'),
(267, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:24:28', '/eiser-master/eiser-master/checkout.php', '2025-11-07 03:24:28');
INSERT INTO `visitors` (`id`, `ip_address`, `user_agent`, `visit_time`, `path`, `created_at`) VALUES
(268, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:25:08', '/eiser-master/eiser-master/place_order.php', '2025-11-07 03:25:08'),
(269, '::1', NULL, '2025-11-07 03:25:28', NULL, '2025-11-07 03:25:28'),
(270, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:25:28', '/eiser-master/eiser-master/index.php', '2025-11-07 03:25:28'),
(271, '::1', NULL, '2025-11-07 03:27:33', NULL, '2025-11-07 03:27:33'),
(272, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:27:33', '/eiser-master/eiser-master/index.php', '2025-11-07 03:27:33'),
(273, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:27:35', '/eiser-master/eiser-master/login.php', '2025-11-07 03:27:35'),
(274, '::1', NULL, '2025-11-07 03:27:48', NULL, '2025-11-07 03:27:48'),
(275, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:27:48', '/eiser-master/eiser-master/index.php', '2025-11-07 03:27:48'),
(276, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:28:00', '/eiser-master/eiser-master/categories.php', '2025-11-07 03:28:00'),
(277, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:28:11', '/eiser-master/eiser-master/category.php?catid=7', '2025-11-07 03:28:11'),
(278, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:28:17', '/eiser-master/eiser-master/cart.php', '2025-11-07 03:28:17'),
(279, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:28:21', '/eiser-master/eiser-master/checkout.php', '2025-11-07 03:28:21'),
(280, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:28:52', '/eiser-master/eiser-master/place_order.php', '2025-11-07 03:28:52'),
(281, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:29:24', '/eiser-master/eiser-master/place_order.php', '2025-11-07 03:29:24'),
(282, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:29:25', '/eiser-master/eiser-master/place_order.php', '2025-11-07 03:29:25'),
(283, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:42:31', '/eiser-master/eiser-master/place_order.php', '2025-11-07 03:42:31'),
(284, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:42:35', '/eiser-master/eiser-master/checkout.php', '2025-11-07 03:42:35'),
(285, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:42:36', '/eiser-master/eiser-master/cart.php', '2025-11-07 03:42:36'),
(286, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:42:37', '/eiser-master/eiser-master/category.php?catid=7', '2025-11-07 03:42:37'),
(287, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:42:37', '/eiser-master/eiser-master/categories.php', '2025-11-07 03:42:37'),
(288, '::1', NULL, '2025-11-07 03:42:37', NULL, '2025-11-07 03:42:37'),
(289, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:42:37', '/eiser-master/eiser-master/index.php', '2025-11-07 03:42:37'),
(290, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:42:37', '/eiser-master/eiser-master/login.php', '2025-11-07 03:42:37'),
(291, '::1', NULL, '2025-11-07 03:42:37', NULL, '2025-11-07 03:42:37'),
(292, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:42:37', '/eiser-master/eiser-master/index.php', '2025-11-07 03:42:37'),
(293, '::1', NULL, '2025-11-07 03:42:39', NULL, '2025-11-07 03:42:39'),
(294, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:42:39', '/eiser-master/eiser-master/index.php', '2025-11-07 03:42:39'),
(295, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:42:48', '/eiser-master/eiser-master/categories.php', '2025-11-07 03:42:48'),
(296, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 03:42:58', '/eiser-master/eiser-master/category.php', '2025-11-07 03:42:58'),
(297, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 04:22:03', '/eiser-master/eiser-master/category.php', '2025-11-07 04:22:03'),
(298, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 04:22:05', '/eiser-master/eiser-master/category.php?catid=9', '2025-11-07 04:22:05'),
(299, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 04:26:37', '/eiser-master/eiser-master/category.php?catid=9', '2025-11-07 04:26:37'),
(300, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 04:30:53', '/eiser-master/eiser-master/category.php?catid=9', '2025-11-07 04:30:53'),
(301, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 04:33:27', '/eiser-master/eiser-master/category.php?catid=9', '2025-11-07 04:33:27'),
(302, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 05:08:54', '/eiser-master/eiser-master/category.php?catid=10', '2025-11-07 05:08:54'),
(303, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 05:13:02', '/eiser-master/eiser-master/category.php?catid=10', '2025-11-07 05:13:02'),
(304, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 05:20:29', '/eiser-master/eiser-master/category.php?catid=10', '2025-11-07 05:20:29'),
(305, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 05:22:54', '/eiser-master/eiser-master/category.php?catid=10', '2025-11-07 05:22:54'),
(306, '::1', NULL, '2025-11-07 05:23:27', NULL, '2025-11-07 05:23:27'),
(307, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-07 05:23:27', '/eiser-master/eiser-master/', '2025-11-07 05:23:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_pages`
--
ALTER TABLE `custom_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `sitesettings`
--
ALTER TABLE `sitesettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `custom_pages`
--
ALTER TABLE `custom_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sitesettings`
--
ALTER TABLE `sitesettings`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
