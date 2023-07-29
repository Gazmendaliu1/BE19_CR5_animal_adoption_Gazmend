-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2023 at 03:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be19_cr5_animal_adoption_gazmend`
--
CREATE DATABASE IF NOT EXISTS `be19_cr5_animal_adoption_gazmend` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be19_cr5_animal_adoption_gazmend`;

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(13,2) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `fk_supplierId` int(11) DEFAULT NULL,
  `breed` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `vaccinated` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `price`, `picture`, `fk_supplierId`, `breed`, `location`, `size`, `age`, `vaccinated`, `status`, `description`) VALUES
(39, 'Leo', 300.00, '64c4ee0cbad47.jpg', NULL, ' Labrador Retriever', 'Austria Wien', 'Large', 2, 'Yes', '1', ' Description: Friendly and loyal Labrador Retriever, perfect for families and outdoor enthusiasts. This 2-year-old pup is full of energy and ready to be your new adventure buddy!'),
(40, 'Bubi', 199.00, '64c4ee5a89e37.webp', NULL, 'Siberian Husky', 'Austria Wien', 'Medium to Large', 9, 'Yes', '1', ' Description: Majestic and spirited Siberian Husky seeking an active home. This 1.5-year-old beauty has striking blue eyes and a playful personality. Ideal for those who enjoy outdoor activities and can provide lots of love and attention.'),
(41, 'Mimi', 500.00, '64c4eedd61851.jpg', NULL, 'Golden Retriever', 'Austrina Braz', 'Large', 3, 'No', '0', ' Description: Adorable and affectionate Golden Retriever, 3 years old. Known for their gentle nature and intelligence, this loyal companion will bring joy to any loving home.'),
(42, 'Pupi', 200.00, '64c4ef83c9018.jpg', NULL, 'Poodle', 'Austria Wien', 'Small to Medium', 8, 'Yes', '1', '  Elegant and intelligent Poodle, just 1 year old. This charming and hypoallergenic companion is well-suited for indoor living and will happily learn new tricks with you.'),
(43, 'Lola', 150.00, '64c4f2c8ab6ce.jpg', NULL, 'Pitbull', 'Austria Wien', 'medium to Large', 7, 'yes', '0', ' Pit Bulls are known for their loyalty and affection towards their families. They are generally friendly, outgoing, and have a high tolerance for pain, making them resilient pets. These dogs can be very playful and enjoy interacting with their human compa'),
(44, 'Lola', 400.00, '64c4f92ecb824.jpg', NULL, 'Maine Coon', 'Austria Wien', 'Large', 9, 'yes', '1', ' The Maine Coon is one of the largest domestic cat breeds, known for its friendly and sociable nature. With their tufted ears, bushy tails, and long, thick fur, they have a majestic appearance. Maine Coons are intelligent, playful, and often enjoy interac'),
(45, 'KLEO', 800.00, '64c4f95d9fc93.jpg', NULL, 'Siamese', 'Austria Wien', 'Large', 9, 'yes', '1', ' The Siamese cat is an elegant and slender breed with striking blue almond-shaped eyes. They are highly vocal and expressive, often \"talking\" to their owners. Siamese cats are affectionate and demand attention, forming strong bonds with their human compan'),
(46, 'Pise', 650.00, '64c4f9d804131.jpg', NULL, 'Scottish Fold', 'Austria Wien', 'Medium', 3, 'no', '1', 'he Scottish Fold is a unique breed known for its distinctive folded ears, which give them an adorable appearance. '),
(47, 'Kali', 8000.00, '64c4fa3a86880.jpg', NULL, 'Arabian Horse', 'Austria Wien', 'Medium-Large', 12, 'yes', '0', ' Description: The Arabian horse is a majestic and elegant breed with a distinctive dished face and high tail carriage. Known for their intelligence, endurance, and fiery spirit, Arabians have a long history as prized companions and war mounts. They are ag'),
(48, 'ioi', 4000.00, '64c4fa84e0d4d.jpg', NULL, 'Miniature Donkey', 'Austria Wien', 'Small', 15, 'yes', '0', ' Miniature donkeys are small-sized donkeys with a gentle and friendly disposition. They are known for their charming personalities, making them wonderful pets and companions. Despite their smaller stature, they are strong and hardy animals, often used for'),
(50, 'Arif', 450.00, '64c503a1cfce1.jpg', NULL, 'African Grey Parrot', 'Austria Wien', 'medium', 15, 'yes', '1', ' The African Grey Parrot is renowned for its high intelligence and exceptional ability to mimic speech and sounds. These medium-sized parrots have a striking gray plumage and a bright red tail. They form strong bonds with their human owners and can be hig'),
(51, 'Gregor', 600.00, '64c5040d97893.webp', NULL, 'Blue and Gold Macaw', 'Austria Wien', 'Medium', 35, '', '1', ' The Blue and Gold Macaw is a vibrant and colorful bird with a brilliant blue and golden yellow plumage. They are large parrots known for their playful and outgoing personalities. Blue and Gold Macaws are highly social and thrive on interaction with their'),
(52, 'Riki Kikiriki', 120.00, '64c504664e656.jpg', NULL, 'Budgerigar (Budgie/Parakeet)', 'Austria Wien', 'medium', 1, 'no', '1', ' Budgerigars, commonly known as Budgies or Parakeets, are small and colorful birds native to Australia. They come in various color variations, with bright greens and yellows being common. Budgies are friendly and easily trainable, making them popular pets'),
(53, 'Gudi & Rudi', 500.00, '64c504c0eae0c.webp', NULL, ' Betta Fish (Siamese Fighting Fish)', 'Austria Wien', 'Meidum - Large', 2, '', '1', 'Betta fish are known for their vibrant colors and flowing fins, making them popular ornamental fish. They are often kept in small aquariums and can be solitary creatures, as males are territorial and may fight if placed together. Betta fish have unique pe'),
(54, ' Miu', 70.00, '64c5050b0c759.jpg', NULL, 'Clownfish', 'Austria Wien', 'nORMAL', 2, '', '', ' Clownfish are small, brightly colored fish known for their distinctive orange bodies adorned with white stripes. They are famous for their symbiotic relationship with sea anemones, where they find protection from predators. Clownfish are hardy and relati'),
(55, 'Memo', 100.00, '64c5055edb68c.jpg', NULL, 'Bearded Dragon', 'Austria Wien', 'Large', 9, '', '', ' Bearded dragons are fascinating reptilian pets known for their calm and docile nature. They have a unique appearance, including a spiky \"beard\" and a flattened body shape. Bearded dragons are relatively easy to care for and can become quite tame with reg'),
(56, 'Leo', 300.00, '64c505957b317.jpg', NULL, 'Miniature Schnauzer (Dog)', 'Austria Wien', 'Large', 10, 'yes', '0', ' Miniature Schnauzers are small-sized dogs with distinctive bushy eyebrows, beard, and mustache, giving them a charming and expressive look. They are intelligent, affectionate, and make great family pets. Miniature Schnauzers are generally good with child'),
(57, 'Kiki', 90.00, '64c505ef9f9d6.jpg', NULL, 'Rhode Island Red Chicken', 'Austria Wien', 'Medium', 10, 'yes', '0', ' The Rhode Island Red is a popular and hardy breed of chicken known for its excellent egg-laying abilities. They have a dark red plumage, a strong and robust build, and a calm temperament. Rhode Island Reds are friendly and easy to care for, making them a'),
(58, 'Susi', 300.00, '64c50626e1ec9.jpg', NULL, 'Merino Sheep', 'Austria Wien', 'Large', 9, 'yes', '0', ' The Merino sheep is a highly regarded breed known for its fine, soft, and valuable wool. They have a distinctive appearance with wrinkled skin and dense, curly fleece. Merino sheep are hardy and adaptable, capable of thriving in various climates and land'),
(59, 'test', 0.00, 'product.png', NULL, '', '', '', 0, '', '', ' '),
(60, 'TEST2', 0.00, 'product.png', NULL, '', '', '', 0, '', '', ' '),
(61, 'TEST3', 0.00, 'product.png', NULL, '', '', '', 10, '', '', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplierId` int(11) NOT NULL,
  `sup_name` varchar(100) NOT NULL,
  `sup_email` varchar(50) DEFAULT NULL,
  `sup_website` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplierId`, `sup_name`, `sup_email`, `sup_website`) VALUES
(1, 'Shopy International LLC', 'shopy@mail.com', 'shopy.international.com'),
(2, 'Amazon INC', 'amazon@mail.com', 'amazon.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `status` varchar(4) NOT NULL DEFAULT 'user',
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `password`, `date_of_birth`, `email`, `picture`, `status`, `phone_number`, `address`) VALUES
(10, 'Gazmend', 'Aliu', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '1990-03-15', 'admin@mail.com', '64c476084b7ba.jpg', 'adm', '', ''),
(13, 'User', '', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '0222-02-22', 'user@mail.com', 'avatar.png', 'user', '', ''),
(14, 'user1', '', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '2222-02-22', 'user1@mail.com', 'avatar.png', 'user', '', ''),
(15, 'user2', '', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '0000-00-00', 'user2@mail.com', 'avatar.png', 'user', '', ''),
(16, 'user3', '', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '0000-00-00', 'user3@mail.com', 'avatar.png', 'user', '', ''),
(17, 'user4', '', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '0000-00-00', 'user4@mail.com', 'avatar.png', 'user', '', ''),
(18, 'user5', '', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '0000-00-00', 'user5@mail.com', 'avatar.png', 'user', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_supplierId` (`fk_supplierId`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplierId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplierId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_ibfk_1` FOREIGN KEY (`fk_supplierId`) REFERENCES `suppliers` (`supplierId`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
