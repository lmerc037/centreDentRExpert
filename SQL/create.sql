-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Host: db5007312976.hosting-data.io
-- Generation Time: Apr 05, 2023 at 02:48 AM
-- Server version: 5.7.38-log
-- PHP Version: 7.0.33-0+deb9u12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs6025165`
--

-- --------------------------------------------------------

--
-- Table structure for table `adresse`
--

CREATE TABLE `adresse` (
  `id` int(11) NOT NULL,
  `adresse` varchar(120) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `province` varchar(10) DEFAULT NULL,
  `code_postal` varchar(50) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adresse`
--

INSERT INTO `adresse` (`id`, `adresse`, `ville`, `province`, `code_postal`, `pays`) VALUES
(1, '5 rue inconnue', 'gatineau', 'Quebec', 'J8Z-1s2', 'Canada'),
(2, '5 rue inconnue', 'gatineau', 'Quebec', 'J8Z-1s2', 'Canada'),
(3, '5 rue inconnue', 'gatineau', 'Quebec', 'J8Z-1s2', 'Canada'),
(6, '3456 Rue Bizzare ', 'Gatineau', 'Quebec', 'J8Z-1D3', 'canada'),
(7, '3456 Rue Bizzare ', 'Gatineau', 'Quebec', 'J8Z-1D3', 'canada'),
(9, '3456 Rue Bizzare ', 'Gatineau', 'Quebec', 'J8Z-1D3', 'canada'),
(10, '3456 Rue Bizzare ', 'Gatineau', 'Quebec', 'J8Z-1D3', 'canada'),
(11, '3456 Rue Bizzare ', 'Gatineau', 'Quebec', 'J8Z-1D3', 'canada'),
(12, '3456 Rue Bizzare ', 'Gatineau', 'Quebec', 'J8Z-1D3', 'canada'),
(13, '3456 Rue Bizzare ', 'Gatineau', 'Quebec', 'J8Z-1D3', 'canada'),
(14, '3456 Rue Bizzare ', 'Gatineau', 'Quebec', 'J8Z-1D3', 'canada'),
(15, '3456 Rue Bizzare ', 'Gatineau', 'Quebec', 'J8Z-1D3', 'canada'),
(16, '3456 Rue Bizzare ', 'Gatineau', 'Quebec', 'J8Z-1D3', 'canada'),
(18, '3456 Rue Bizzare ', 'Gatineau', 'Quebec', 'J8Z-1D3', 'canada'),
(19, '3456 Rue Bizzare 5', 'Gatineau', 'Quebec', 'J8Z-1D3', 'canada'),
(21, '3456 Rue Bizzare 7', 'Gatineau', 'Quebec', 'J8Z-1D3', 'canada'),
(22, '3456 Rue Bizzare 8', 'Gatineau', 'Quebec', 'J8Z-1D3', 'canada'),
(23, '3456 Rue Bizzare 8', 'Gatineau', 'Quebec', 'J8Z-1D3', 'canada'),
(24, '3456 Rue Bizzare 9', 'Gatineau', 'Quebec', 'J8Z-1D3', 'canada'),
(27, '3456 Rue Bizzare 9-1', 'Gatineau', 'Quebec', 'J8Z-1D3', 'canada'),
(28, '3456 Rue Bizzare 9-2', 'Gatineau', 'Quebec', 'J8Z-1D3', 'canada'),
(31, '45 rue inconnue', 'Gatineau', 'Quebec', 'J8Z-1S2', 'canada'),
(32, '45 rue inconito', 'Gatineau', 'Quebec', 'J8Z-1S2', 'Canada'),
(33, '234 Rue inexistant ', 'Gatineau', 'Quebec', 'J8Z-1S2', 'Canada'),
(34, '10020 Av Bruchési', 'Montréal', 'Quebec', '78986', 'Canada'),
(35, '56 Rue Bizzare # 9', 'Gatineau', 'Quebec', 'J8Z1S2', 'Canada'),
(36, '45 rue des peche', 'Montréal', 'Quebec', 'H2B 2S1', 'Canada'),
(40, '46 Daniel Johnson', 'Gatineau', 'QC', 'J8Z1S2', 'Canada'),
(62, '343 rue Main', 'Ottawa', 'Ontario', '23k456', 'Canada'),
(63, '10020 Av Bruchési', 'Montréal', 'Quebec', 'H2B 2S1', 'Canada'),
(69, '1-46 Rue Daniel-Johnson', 'Gatineau', 'Quebec', 'J8Z1S2', 'Canada'),
(70, '10020 Av Bruchési', 'Montréal', 'Quebec', 'H2B 2S1', 'Canada'),
(71, '3-46 Daniel Johnson d', 'Gatineau', 'Quebec', 'J8Z-1S2', 'Canada'),
(74, '45 Rue des  Dents Griyen', 'Ottawa', 'Ontario', 'T9G-3E4', 'Canada'),
(75, '45 Rue des  Dents Griyen', 'Ottawa', 'Ontario', 'T9G-3E4', 'Canada'),
(76, '10020 Av Bruchési', 'Montréal', 'Quebec', 'H2B 2S1', 'Canada'),
(77, '10020 Av Bruchési', 'Montréal', 'Quebec', 'H2B 2S1', 'Canada'),
(78, '10020 Av Bruchési', 'Montréal', 'Quebec', 'H2B 2S1', ''),
(80, '', '', '', '', ''),
(81, '10020 Av Bruchési', 'Montréal', 'Quebec', 'H2B 2S1', 'Canada'),
(83, '1002880 Av Bruchési', 'Montréal', 'Quebec', 'H2B 2S1', 'Canada'),
(84, '1002880 Av Bruchési', 'Montréal', 'Quebec', 'H2B 2S1', 'Canada'),
(85, '10080 Av Bruchési', 'Montréal', 'Quebec', 'H2B 2S1', 'Canada'),
(86, '10020 Av Bruchési', 'Montréal', 'Quebec', 'H2B 2S1', 'Canada'),
(87, '10020 Av Bruchési', 'Montréal', 'Quebec', 'H2B 2S1', 'Canada'),
(88, '10020 Av Bruchési', 'Montréal', 'Quebec', 'H2B 2S1', 'Canada'),
(89, '10020 Av Bruchési', 'Montréal', 'Quebec', 'H2B 2S1', 'Canada'),
(90, '', '', '', '', ''),
(91, '', '', '', '', ''),
(92, '', '', '', '', ''),
(93, '', '', '', '', ''),
(94, '', '', '', '', ''),
(95, '46 Rue inconnue', 'Gatienau', 'Quebec', 'J8Z-1S2', 'Canada'),
(96, '', '', '', '', ''),
(98, '', '', '', '', ''),
(99, '34 Rue inconnue', 'Gatineau', 'Quebec', 'J8Z-1D2', 'Canada'),
(100, '', '', '', '', ''),
(101, '45 rue Inexistant', 'Gatineau', 'Quebec', 'J8Z-3F3', 'Canada'),
(102, '56 Rue Main', 'Gatineau', 'Quebec', 'J8Z-2D3', 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_adresse` int(11) DEFAULT NULL,
  `id_succursale` int(11) DEFAULT NULL,
  `ssn` int(11) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `salaire` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`id`, `id_utilisateur`, `id_adresse`, `id_succursale`, `ssn`, `role`, `type`, `salaire`) VALUES
(19, 47, 34, 2, 456123456, 'Hygieniste', 'Temps partiel', '123000'),
(20, 48, 35, 1, 2147483647, 'Preposé', 'Temps partiel', '125000'),
(21, 49, 36, 1, 1234123434, 'Hygieniste', 'Temps partiel', '345000'),
(22, 60, 62, 2, 65436543, 'Assistant dentiste', 'Temps partiel', '125000'),
(23, 61, 63, 1, 123456789, 'Assistant dentiste', 'Temps partiel', '445000'),
(24, 27, 69, 2, 67576, 'Assistant dentiste', 'Temps partiel', '445000'),
(25, 29, 70, 1, 2222222, 'Preposé', 'Temps partiel', '345000'),
(26, 62, 75, 1, 123456789, 'Administrateur', 'Temps plein', '445000'),
(27, 63, 77, 1, 123456, 'Directeur', 'Temps plein', '125000'),
(28, 64, 78, 1, 123456789, 'Receptioniste', 'Temps partiel', '125000'),
(30, 66, 81, 1, 123456, 'Assistant dentiste', 'Temps plein', '123000'),
(31, 69, 85, 1, 234523256, 'Dentiste', 'Temps plein', '123000'),
(32, 73, 101, 1, 123456789, 'Receptioniste', 'Temps plein', '123000');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_adresse` int(11) DEFAULT NULL,
  `id_succursale` int(11) DEFAULT NULL,
  `datenaissance` date DEFAULT NULL,
  `sexe` varchar(10) NOT NULL,
  `telephone` int(11) NOT NULL,
  `assurance` varchar(50) DEFAULT NULL,
  `parent` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `id_utilisateur`, `id_adresse`, `id_succursale`, `datenaissance`, `sexe`, `telephone`, `assurance`, `parent`) VALUES
(1, 53, 40, 2, '1997-06-10', 'Genre', 2147483647, 'ASS12345', 'Ti joel'),
(5, 38, 71, 1, '2023-03-22', 'Masculin', 2147483647, 'ASS12345', 'Ti joel'),
(9, 67, 89, 1, '2023-03-20', 'Masculin', 2147483647, '23kkdkeo', 'Petit Joel'),
(10, 71, 95, 1, '2022-11-15', 'Masculin', 2147483647, 'GEP1234', 'Jean Arthur '),
(12, 72, 99, 1, '2020-06-10', 'Masculin', 2147483647, 'ASS1234', 'Liam Joseph Senior');

-- --------------------------------------------------------

--
-- Table structure for table `proceduredentaire`
--

CREATE TABLE `proceduredentaire` (
  `id` int(11) NOT NULL,
  `categorie` varchar(50) DEFAULT NULL,
  `soins` varchar(50) DEFAULT NULL,
  `code` text NOT NULL,
  `cout` int(11) NOT NULL,
  `restriction` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proceduredentaire`
--

INSERT INTO `proceduredentaire` (`id`, `categorie`, `soins`, `code`, `cout`, `restriction`) VALUES
(1, 'Diagnostic', 'Examen complet', '01110', 120, '1 à tous les 18 mois'),
(2, 'Diagnostic', 'Examen de rappel ou périodique', '01200', 120, '1 à tous les 6 mois'),
(3, 'Diagnostic', 'Examen d’urgence', '01300', 200, ''),
(4, 'Diagnostic', 'Examen d’un aspect particulier', '01400', 80, ''),
(5, 'Diagnostic', 'Examen parodontal complet ', '01500', 90, '1 à tous les 36 mois'),
(6, 'Diagnostic', 'Radiographies intraorales', '02111', 250, ''),
(7, 'Prévention', 'Polissage', '11100', 90, '1 traitement par 6 mois'),
(8, 'Prévention', 'Application topique de fluorure', '12400', 130, '1 traitement par 6 mois');

-- --------------------------------------------------------

--
-- Table structure for table `rendezvous`
--

CREATE TABLE `rendezvous` (
  `id` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `id_succursale` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `commentaire` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rendezvous`
--

INSERT INTO `rendezvous` (`id`, `id_patient`, `id_succursale`, `date`, `type`, `commentaire`) VALUES
(1, 1, 1, '2023-03-23 12:22:00', 'Examen nettoyage', 'Mes dent sont ...'),
(2, 1, 1, '2023-03-12 00:40:00', 'Examen nettoyage', 'no comments'),
(3, 1, 2, '2023-03-20 14:43:00', 'Examen nettoyage', 'yesy'),
(4, 5, 1, '2023-04-29 15:02:00', 'Examen nettoyage', 'Merci '),
(5, 5, 1, '2023-04-29 15:02:00', 'Examen nettoyage', 'Merci '),
(6, 5, 1, '2023-04-14 00:12:00', 'Examen nettoyage', 'ok'),
(7, 5, 2, '2023-04-14 00:13:00', 'Examen nettoyage', 'test'),
(8, 5, 2, '2023-04-20 00:16:00', 'Consultation blanchiment', 'test 2'),
(9, 5, 2, '2023-04-05 00:21:00', 'Consultation blanchiment', 'test4'),
(11, 9, 1, '2023-04-23 13:32:00', 'Consultation blanchiment', 'test'),
(12, 9, 1, '2023-04-23 13:32:00', 'Consultation blanchiment', 'test'),
(13, 10, 1, '2023-06-22 09:40:00', 'Consultation orthodontie', 'Pas de commentaires'),
(15, 12, 1, '2023-04-28 11:01:00', 'Consultation orthodontie', 'Pas de commentaires');

-- --------------------------------------------------------

--
-- Table structure for table `succursale`
--

CREATE TABLE `succursale` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `id_adresse` int(11) NOT NULL,
  `telephone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `succursale`
--

INSERT INTO `succursale` (`id`, `nom`, `id_adresse`, `telephone`) VALUES
(1, 'Succursale 1', 32, 514563256),
(2, 'Succursale 2', 33, 2147483647),
(3, 'Succursale 3', 102, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `traitement`
--

CREATE TABLE `traitement` (
  `id` int(11) NOT NULL,
  `id_proceduredentaire` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `dents` varchar(250) DEFAULT NULL,
  `commentaire` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `traitement`
--

INSERT INTO `traitement` (`id`, `id_proceduredentaire`, `id_patient`, `date`, `dents`, `commentaire`) VALUES
(1, 2, 1, '2023-03-27 09:43:00', 'tous les dents', 'no comments'),
(2, 5, 5, '2023-03-21 09:49:00', 'Dents  devant', 'Commentaire ici'),
(3, 5, 5, '2023-03-26 09:52:00', 'tous les dents', 'ok'),
(4, 4, 5, '2023-03-22 17:25:00', 'tous les dents', 'no coments'),
(5, 2, 12, '2023-03-30 00:05:00', 'Tous les dents', 'Pas de commentaire');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `horodatage` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `username`, `password`, `email`, `horodatage`, `nom`, `prenom`) VALUES
(27, 'tijoel4', '$2y$10$vW1ljr0vaB/AstzjoPKsG.UN69fk4yu0HC61LIsoaWwIaIWF5iujq', 'tijoel4@gmail.com', '2023-03-18 23:41:11', 'Joel', 'Petit'),
(29, 'tijoel5', '$2y$10$3z28rRkuzjdolFZM4XSDAuhULdFGkN9eF7nKuvWIkMbU7A95vKwta', 'tijoel5@gmail.com', '2023-03-18 23:47:10', 'Joel', 'Petit'),
(38, 'tijoel9-2', '$2y$10$P.ec8PI10gz8RSTxw/z7Wezt5WBEiEAqpv0oEh..vVdGQMy4vOK8e', 'tijoel@gmail.com', '2023-03-24 21:28:55', 'Joel', 'Petit'),
(46, 'admin', '$2y$10$4idloHxxAgAujKr8CDu1/.q3p40na7J0EDeOJ3Ni64csLeyXDcjXu', 'admin@biolojik.ca', '2023-03-20 13:13:58', 'Luckner', 'Mercier'),
(47, 'vital', '$2y$10$EqNCFNszNROiauuZ5ma6ROXLoC3MuWngblwcJ5thp3kAql80FrL/C', 'vital@gmail.com', '2023-03-20 22:54:43', 'Brook', 'Vital'),
(48, 'garie', '$2y$10$5tcDOJ3oKLIOtq5Wxl9YH.wtSbQGauFLYvl6w1zWZjhWq84txMY.K', 'garie@gmail.com', '2023-03-20 18:01:44', 'Bodeau', 'Garie'),
(49, 'josue', '$2y$10$JhjVQaH9Fk5VParnv8b7m.LRjOVecpaM1GbF26mk9CK4TKKEQa9Yy', 'josue@gmail.com', '2023-03-20 18:30:44', 'Pierre', 'Josue'),
(53, 'client 4', '$2y$10$FOPe8SBAsuCcHDcMNeELHe8stDiljaevuhqUq1ilzDDjQFRt7wyWK', 'client4@gmail.com', '2023-03-21 20:33:26', 'Trois', 'Client'),
(60, 'jean', '$2y$10$f3T3oxUNfJ0VxQRt6LsTc.UQWEEbjAlMgVyFP/uiuVvtEU/wWwM8u', 'jean@gmail.com', '2023-03-21 22:56:01', 'Renel', 'Jean'),
(61, 'pierreol', '$2y$10$Ff/ogHQvrLegePTMyiVS1.nRd173MSgGonxZLCuq.x9dF5RUGxDg6', 'lmerc037@uottawa.ca', '2023-03-22 21:55:47', 'Olivier', 'Pierre'),
(62, 'administration', '$2y$10$5vpXDrhjysKLWw5h3T7X4.hFP7Ztp/lsCuj7aVCuoVqEOo/euQvtq', 'adminstration@biologik.ca', '2023-03-24 05:22:15', 'Administrateur', 'Compte'),
(63, 'directeur', '$2y$10$5yjrD0rH0KnV/fwJTwQ8NeakvEcXgj2dU8RurRKqyzML6yTanWmUC', 'directeur@biolojik.ca', '2023-03-22 22:16:40', 'Directeur', 'Compte'),
(64, 'reception', '$2y$10$/igVXPHz0FK.JwXFa7Qm/OqRCeulZChnf6UpV9kV6Da2EvRLEB7g2', 'reception@biolojik.ca', '2023-03-22 21:50:22', 'Compte', 'Receptionniste'),
(66, 'employe', '$2y$10$xds/w9aUWQHauVFwI8qfSOW8.PqNRG1JhXxFr2BU18xUMpUr7CBeu', 'employe@biolojik.ca', '2023-03-24 16:05:48', 'Employé', 'Compte'),
(67, 'client', '$2y$10$OqTLbZMzOnWP9tnf.Oy/KusWU7l3eqtv0W5oBLoWYKIAoZHKLPReG', 'client@biolojik.ca', '2023-03-22 22:15:03', 'Client', 'Compte'),
(68, 'client2', '$2y$10$PNHPNTtSSrTF2Q4/3UbB.umMKnTAOsLaKdGZOd//wFxsBIsEjZl9e', 'client2@gmail.com', '2023-03-22 22:12:37', 'Client2', 'Compte'),
(69, 'dentiste', '$2y$10$hYHfaYBfLNvIHjUo7XU2luYc6N52eVniyefdGBpyOTMJc.xxRRwoS', 'dentiste@biolojik.ca', '2023-03-24 00:06:08', 'Dentiste', 'Compte'),
(71, 'marthur', '$2y$10$DfMzEgMz9gdCzQb93nuCEOwkemgmFI7RJfvuLgmeHeq7uTtoPll2m', 'marthur@gmail.com', '2023-03-25 12:33:17', 'Arthur', 'Marc'),
(72, 'liam2', '$2y$10$q8NdNo8Rvwgns4ZqXnzhHeK5Ya5eNNMTgB0s0m7iyePj6sSAJf96i', 'liam@gmail.com', '2023-03-25 14:32:39', 'Joseph Junior', 'Liam'),
(73, 'david', '$2y$10$WIEhMBryGF1i82KNk.Wn8upxuq6nPzsxFyS2qWcDkHVqGIZlUujYO', 'david@gmail.com', '2023-03-25 14:07:56', 'David', 'Pierre');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_adresse` (`id_adresse`),
  ADD KEY `id_succursale` (`id_succursale`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_adresse` (`id_adresse`),
  ADD KEY `id_succursale` (`id_succursale`);

--
-- Indexes for table `proceduredentaire`
--
ALTER TABLE `proceduredentaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_patient` (`id_patient`),
  ADD KEY `id_succursale` (`id_succursale`);

--
-- Indexes for table `succursale`
--
ALTER TABLE `succursale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_adresse` (`id_adresse`);

--
-- Indexes for table `traitement`
--
ALTER TABLE `traitement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_patient` (`id_patient`),
  ADD KEY `id_proceduredentaire` (`id_proceduredentaire`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `employe`
--
ALTER TABLE `employe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `proceduredentaire`
--
ALTER TABLE `proceduredentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rendezvous`
--
ALTER TABLE `rendezvous`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `succursale`
--
ALTER TABLE `succursale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `traitement`
--
ALTER TABLE `traitement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `employe_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `employe_ibfk_2` FOREIGN KEY (`id_adresse`) REFERENCES `adresse` (`id`),
  ADD CONSTRAINT `employe_ibfk_3` FOREIGN KEY (`id_succursale`) REFERENCES `succursale` (`id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `patient_ibfk_2` FOREIGN KEY (`id_adresse`) REFERENCES `adresse` (`id`),
  ADD CONSTRAINT `patient_ibfk_3` FOREIGN KEY (`id_succursale`) REFERENCES `succursale` (`id`);

--
-- Constraints for table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD CONSTRAINT `rendezvous_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id`),
  ADD CONSTRAINT `rendezvous_ibfk_2` FOREIGN KEY (`id_succursale`) REFERENCES `succursale` (`id`);

--
-- Constraints for table `succursale`
--
ALTER TABLE `succursale`
  ADD CONSTRAINT `succursale_ibfk_1` FOREIGN KEY (`id_adresse`) REFERENCES `adresse` (`id`);

--
-- Constraints for table `traitement`
--
ALTER TABLE `traitement`
  ADD CONSTRAINT `traitement_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id`),
  ADD CONSTRAINT `traitement_ibfk_2` FOREIGN KEY (`id_proceduredentaire`) REFERENCES `proceduredentaire` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
