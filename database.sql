-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 16 Février 2013 à 20:57
-- Version du serveur: 5.5.25
-- Version de PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `symfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `dw_image`
--

CREATE TABLE `dw_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E68BD6ED126F525E` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `dw_item`
--

CREATE TABLE `dw_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `definition_short` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `definition` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `dw_role`
--

CREATE TABLE `dw_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desciption` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `dw_role`
--

INSERT INTO `dw_role` (`id`, `name`, `desciption`) VALUES
(1, 'SUPER-ADMIN', 'Super administrateur : possède tous les droits'),
(2, 'ADMIN', 'Administrateur : possède les droits d''administration');

-- --------------------------------------------------------

--
-- Structure de la table `dw_user`
--

CREATE TABLE `dw_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `encrypted_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `accountExpired` tinyint(1) DEFAULT NULL,
  `accountLocked` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_E226DBBEF85E0677` (`username`),
  UNIQUE KEY `UNIQ_E226DBBEE7927C74` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `dw_user`
--

INSERT INTO `dw_user` (`id`, `username`, `email`, `password`, `encrypted_password`, `enabled`, `accountExpired`, `accountLocked`) VALUES
(1, 'superadmin', 'yannericdevars@gmail.com', 'XXX Encrypted XXX', '563ae3e19250581b015f66a8a3cad37c9d766372', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `dw_user_role`
--

CREATE TABLE `dw_user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `IDX_466D9A0A76ED395` (`user_id`),
  KEY `IDX_466D9A0D60322AC` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `dw_user_role`
--

INSERT INTO `dw_user_role` (`user_id`, `role_id`) VALUES
(1, 1),
(1, 2);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `dw_image`
--
ALTER TABLE `dw_image`
  ADD CONSTRAINT `FK_E68BD6ED126F525E` FOREIGN KEY (`item_id`) REFERENCES `dw_item` (`id`);

--
-- Contraintes pour la table `dw_user_role`
--
ALTER TABLE `dw_user_role`
  ADD CONSTRAINT `FK_466D9A0D60322AC` FOREIGN KEY (`role_id`) REFERENCES `dw_role` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_466D9A0A76ED395` FOREIGN KEY (`user_id`) REFERENCES `dw_user` (`id`) ON DELETE CASCADE;
