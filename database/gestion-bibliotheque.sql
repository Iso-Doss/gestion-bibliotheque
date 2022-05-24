-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 24, 2022 at 07:39 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion-bibliotheque`
--

-- --------------------------------------------------------

--
-- Table structure for table `auteur`
--

CREATE TABLE `auteur` (
  `num_aut` int(11) NOT NULL,
  `nom_aut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auteur_secondaire`
--

CREATE TABLE `auteur_secondaire` (
  `id` int(11) NOT NULL,
  `cod_ouv` int(11) NOT NULL,
  `num_aut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `date_parution`
--

CREATE TABLE `date_parution` (
  `id` int(11) NOT NULL,
  `cod_ouv` int(11) NOT NULL,
  `cod_lang` int(11) NOT NULL,
  `dat_par` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `date_retour`
--

CREATE TABLE `date_retour` (
  `id` int(11) NOT NULL,
  `num_emp` int(11) NOT NULL,
  `cod_ouv` int(11) NOT NULL,
  `dat_ret` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `domaine`
--

CREATE TABLE `domaine` (
  `cod_dom` int(11) NOT NULL,
  `lib_dom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `domaine_ouvrage`
--

CREATE TABLE `domaine_ouvrage` (
  `id` int(11) NOT NULL,
  `cod_ouv` int(11) NOT NULL,
  `cod_dom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `enprumt`
--

CREATE TABLE `enprumt` (
  `num_emp` int(11) NOT NULL,
  `dat_emp` datetime NOT NULL,
  `num_mem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `langue`
--

CREATE TABLE `langue` (
  `cod_lang` int(11) NOT NULL,
  `lib_lang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

CREATE TABLE `membre` (
  `num_mem` int(11) NOT NULL,
  `nom_mem` varchar(255) NOT NULL,
  `adr_mem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ouvrage`
--

CREATE TABLE `ouvrage` (
  `cod_ouv` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `nb_ex` int(11) NOT NULL,
  `num_aut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `date_naissance` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `nom_utilisateur` varchar(255) NOT NULL,
  `mot_passe` varchar(255) NOT NULL,
  `est_actif` tinyint(1) NOT NULL DEFAULT '0',
  `est_supprimer` tinyint(1) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`num_aut`);

--
-- Indexes for table `auteur_secondaire`
--
ALTER TABLE `auteur_secondaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cod_ouv` (`cod_ouv`),
  ADD KEY `num_aut` (`num_aut`);

--
-- Indexes for table `date_parution`
--
ALTER TABLE `date_parution`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cod_lang` (`cod_lang`),
  ADD KEY `cod_ouv` (`cod_ouv`);

--
-- Indexes for table `date_retour`
--
ALTER TABLE `date_retour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `num_emp` (`num_emp`),
  ADD KEY `cod_ouv` (`cod_ouv`);

--
-- Indexes for table `domaine`
--
ALTER TABLE `domaine`
  ADD PRIMARY KEY (`cod_dom`);

--
-- Indexes for table `domaine_ouvrage`
--
ALTER TABLE `domaine_ouvrage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cod_ouv` (`cod_ouv`),
  ADD KEY `cod_dom` (`cod_dom`);

--
-- Indexes for table `enprumt`
--
ALTER TABLE `enprumt`
  ADD PRIMARY KEY (`num_emp`),
  ADD KEY `num_mem` (`num_mem`);

--
-- Indexes for table `langue`
--
ALTER TABLE `langue`
  ADD PRIMARY KEY (`cod_lang`);

--
-- Indexes for table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`num_mem`);

--
-- Indexes for table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD PRIMARY KEY (`cod_ouv`),
  ADD KEY `num_aut` (`num_aut`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `num_aut` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auteur_secondaire`
--
ALTER TABLE `auteur_secondaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `date_parution`
--
ALTER TABLE `date_parution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `date_retour`
--
ALTER TABLE `date_retour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `domaine`
--
ALTER TABLE `domaine`
  MODIFY `cod_dom` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `domaine_ouvrage`
--
ALTER TABLE `domaine_ouvrage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enprumt`
--
ALTER TABLE `enprumt`
  MODIFY `num_emp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `langue`
--
ALTER TABLE `langue`
  MODIFY `cod_lang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membre`
--
ALTER TABLE `membre`
  MODIFY `num_mem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ouvrage`
--
ALTER TABLE `ouvrage`
  MODIFY `cod_ouv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auteur_secondaire`
--
ALTER TABLE `auteur_secondaire`
  ADD CONSTRAINT `auteur_secondaire_auteur_num_aut` FOREIGN KEY (`num_aut`) REFERENCES `auteur` (`num_aut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auteur_secondaire_ouvrage_cod_ouv` FOREIGN KEY (`cod_ouv`) REFERENCES `ouvrage` (`cod_ouv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `date_parution`
--
ALTER TABLE `date_parution`
  ADD CONSTRAINT `date_parution_langue_cod_lang` FOREIGN KEY (`cod_lang`) REFERENCES `langue` (`cod_lang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `date_parution_ouvrage_cod_ouv` FOREIGN KEY (`cod_ouv`) REFERENCES `ouvrage` (`cod_ouv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `date_retour`
--
ALTER TABLE `date_retour`
  ADD CONSTRAINT `date_retour_enprumt_num_emp` FOREIGN KEY (`num_emp`) REFERENCES `enprumt` (`num_emp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `date_retour_ouvrage_cod_ouv` FOREIGN KEY (`cod_ouv`) REFERENCES `ouvrage` (`cod_ouv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `domaine_ouvrage`
--
ALTER TABLE `domaine_ouvrage`
  ADD CONSTRAINT `domaine_ouvrage_domaine_cod_dom` FOREIGN KEY (`cod_dom`) REFERENCES `domaine` (`cod_dom`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `domaine_ouvrage_ouvrage_cod_ouv` FOREIGN KEY (`cod_ouv`) REFERENCES `ouvrage` (`cod_ouv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enprumt`
--
ALTER TABLE `enprumt`
  ADD CONSTRAINT `emprumt_membre_num_mem` FOREIGN KEY (`num_mem`) REFERENCES `membre` (`num_mem`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD CONSTRAINT `ouvrage_auteur_num_aut` FOREIGN KEY (`num_aut`) REFERENCES `auteur` (`num_aut`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
