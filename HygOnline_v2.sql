-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 29 Juin 2017 à 12:59
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hyg_dev2`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories_perso`
--

CREATE TABLE `categories_perso` (
  `id_categ` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `html_header` text NOT NULL,
  `html_footer` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories_perso`
--

INSERT INTO `categories_perso` (`id_categ`, `libelle`, `html_header`, `html_footer`) VALUES
(1, 'categorie_test', 'cette categorie est un test pour verififier l\'affichage du header du 1', ''),
(2, 'categorie_test2', '', 'footer footer footer footer footer footerfooterfooterfooterfooterfooterfooterfooterfooterfooterfooterfooterfooterfooterfooterfooter'),
(3, 'categorie_test3', 'cette categorie est un test pour verififier l\'affichage du header du 3', 'footerfooterfooterfooterfooterfooterfooterfooterfooterfooterfooterfooterfooterfooterfooterfooterfooterfooterfooterfooterfooterfooter'),
(4, 'categorie_test4', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `non_affichee` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id_client`, `nom`, `non_affichee`) VALUES
(1, 'DIER Nicolas', NULL),
(2, 'Hotel BALDI', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contrats`
--

CREATE TABLE `contrats` (
  `id_contrat` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `numero_contrat` int(11) DEFAULT NULL,
  `adresse_contrat` varchar(200) NOT NULL,
  `objet_contrat` varchar(75) DEFAULT NULL,
  `nom_contrat` varchar(100) NOT NULL,
  `date_contrat` date NOT NULL,
  `echeance_contrat` date NOT NULL,
  `montant_total` decimal(10,0) NOT NULL,
  `est_effectuee` tinyint(1) NOT NULL,
  `lien` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contrats`
--

INSERT INTO `contrats` (`id_contrat`, `id_client`, `numero_contrat`, `adresse_contrat`, `objet_contrat`, `nom_contrat`, `date_contrat`, `echeance_contrat`, `montant_total`, `est_effectuee`, `lien`) VALUES
(1, 1, 123, '57, Rue de la Procession', 'Assainissement habitation', 'contrat1.pdf', '2017-05-01', '2017-05-31', '2000', 1, 'contrats/contrat_1.pdf'),
(2, 2, 456, '42, Av de Garibaldi', 'Prestation Punaise de lit', 'contrat2.pdf', '2017-06-01', '2017-06-30', '2500', 1, 'contrats/contrat_2.pdf'),
(3, 1, 789, '57, Rue de la Procession', 'Depigeonnage', 'contrat3.pdf', '2017-07-01', '2017-07-31', '1250', 0, 'contrats/contrat_3.pdf'),
(4, 1, 654, '57, Rue de la Procession', 'gazage anti-thermites', 'contrat4.pdf', '2017-06-19', '2017-06-19', '550', 2, 'contrats/contrat_4.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE `devis` (
  `id_devis` int(11) NOT NULL,
  `id_contrat` int(11) NOT NULL,
  `nom_devis` varchar(100) NOT NULL,
  `date_devis` date NOT NULL,
  `numero_devis` int(11) NOT NULL,
  `montant_devis` decimal(10,0) NOT NULL,
  `objet_devis` varchar(75) NOT NULL,
  `est_accepter` tinyint(1) NOT NULL,
  `lien` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `devis`
--

INSERT INTO `devis` (`id_devis`, `id_contrat`, `nom_devis`, `date_devis`, `numero_devis`, `montant_devis`, `objet_devis`, `est_accepter`, `lien`) VALUES
(1, 1, 'devis1.pdf', '2017-04-15', 1, '2500', 'assainissement domicile', 1, 'devis/devis_1.pdf'),
(2, 2, 'devis2.pdf', '2017-05-15', 2, '2000', 'prestation punaise de lit', 1, 'devis/devis_2.pdf'),
(3, 3, 'devis3.pdf', '2017-06-15', 3, '1250', 'depigeonnage', 0, 'devis/devis_3.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `id_facture` int(11) NOT NULL,
  `id_contrat` int(11) DEFAULT NULL,
  `id_client` int(11) NOT NULL,
  `date_facture` date NOT NULL,
  `montant_facture` decimal(10,0) NOT NULL,
  `nom_facture` varchar(100) NOT NULL,
  `echeance_facture` date NOT NULL,
  `est_soldee` tinyint(1) NOT NULL,
  `reste` decimal(10,0) DEFAULT NULL,
  `numero_facture` int(11) DEFAULT NULL,
  `lien` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `factures`
--

INSERT INTO `factures` (`id_facture`, `id_contrat`, `id_client`, `date_facture`, `montant_facture`, `nom_facture`, `echeance_facture`, `est_soldee`, `reste`, `numero_facture`, `lien`) VALUES
(1, 1, 1, '2017-05-08', '550', 'facture1.pdf', '2017-05-12', 2, NULL, 1, 'factures/Facture_1.pdf'),
(2, 1, 1, '2017-05-22', '1050', 'facture2.pdf', '2017-05-26', 1, '650', 2, 'factures/Facture_2.pdf'),
(3, 1, 1, '2017-05-29', '400', 'facture3.pdf', '2017-06-02', 0, NULL, 3, 'factures/Facture_3.pdf'),
(4, 2, 2, '2017-06-12', '1500', 'facture4.pdf', '2017-06-16', 1, NULL, 4, 'factures/Facture_4.pdf'),
(5, 2, 2, '2017-06-26', '1000', 'facture5.pdf', '2017-06-30', 0, NULL, 5, 'factures/Facture_5.pdf'),
(7, NULL, 1, '2017-05-09', '50', 'facture_test.pdf', '2017-06-30', 2, NULL, 1, 'factures/Facture_6.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `fiches_securitees`
--

CREATE TABLE `fiches_securitees` (
  `id_fiche` int(11) NOT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `nom_produit` varchar(100) NOT NULL,
  `risque` tinyint(1) NOT NULL,
  `lien` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fiches_securitees`
--

INSERT INTO `fiches_securitees` (`id_fiche`, `id_produit`, `nom_produit`, `risque`, `lien`) VALUES
(1, 1, 'mort au rat', 2, 'fiches/mort_au_rat.pdf'),
(2, 2, 'cages', 1, 'fiches/cage.pdf'),
(3, 3, 'appats empoisoner', 3, 'fiches/appats_empoisoner.pdf'),
(4, 4, 'pieges a rats', 1, 'fiches/pieges_a_rat.pdf'),
(5, 6, 'insecticide', 4, 'fiches/insecticide.pdf'),
(6, 7, 'desinfectant', 2, 'fiches/desinfectant.pdf'),
(7, 8, 'pieges a fourmis', 3, 'fiches/pieges_a_fourmis.pdf'),
(8, NULL, 'tst', 0, '...');

-- --------------------------------------------------------

--
-- Structure de la table `fichiers_perso`
--

CREATE TABLE `fichiers_perso` (
  `id_fichier` int(11) NOT NULL,
  `id_categ` int(11) NOT NULL,
  `nom_fichier` varchar(100) NOT NULL,
  `date_fichier` date NOT NULL,
  `objet_fichier` varchar(100) NOT NULL,
  `lien` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fichiers_perso`
--

INSERT INTO `fichiers_perso` (`id_fichier`, `id_categ`, `nom_fichier`, `date_fichier`, `objet_fichier`, `lien`) VALUES
(1, 1, 'fichier1.pdf', '2017-05-03', 'tst', 'fichier_perso/fichier_perso_type.pdf'),
(2, 1, 'fichier2.pdf', '2017-05-08', 'tst', 'fichier_perso/fichier_perso_type.pdf'),
(3, 1, 'fichier3.pdf', '2017-06-15', 'tst', 'fichier_perso/fichier_perso_type.pdf'),
(4, 2, 'fichier4.pdf', '2017-06-16', 'tst', 'fichier_perso/fichier_perso_type.pdf'),
(5, 2, 'fichier5.pdf', '2017-06-20', 'tst', 'fichier_perso/fichier_perso_type.pdf'),
(6, 2, 'fichier6.pdf', '2017-06-25', 'tst', 'fichier_perso/fichier_perso_type.pdf'),
(7, 3, 'fichier7.pdf', '2017-06-30', 'tst', 'fichier_perso/fichier_perso_type.pdf'),
(8, 3, 'fichier8.pdf', '2017-07-01', 'tst', 'fichier_perso/fichier_perso_type.pdf'),
(9, 3, 'fichier9.pdf', '2017-07-05', 'tst', 'fichier_perso/fichier_perso_type.pdf'),
(10, 4, 'fichier10.pdf', '2017-07-10', 'tst', 'fichier_perso/fichier_perso_type.pdf'),
(11, 4, 'fichier11.pdf', '2017-07-15', 'tst', 'fichier_perso/fichier_perso_type.pdf'),
(12, 4, 'fichier12.pdf', '2017-07-20', 'tst', 'fichier_perso/fichier_perso_type.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `interventions`
--

CREATE TABLE `interventions` (
  `id_intervention` int(11) NOT NULL,
  `id_contrat` int(11) NOT NULL,
  `objet_interv` varchar(75) NOT NULL,
  `date_interv` date NOT NULL,
  `adresse_interv` varchar(100) NOT NULL,
  `applicateur_interv` varchar(100) NOT NULL,
  `date_bi` date NOT NULL,
  `nom_bi` varchar(100) NOT NULL,
  `lien_bi` varchar(100) NOT NULL,
  `date_ri` date NOT NULL,
  `nom_ri` varchar(100) NOT NULL,
  `lien_ri` varchar(100) NOT NULL,
  `est_effectuee` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `interventions`
--

INSERT INTO `interventions` (`id_intervention`, `id_contrat`, `objet_interv`, `date_interv`, `adresse_interv`, `applicateur_interv`, `date_bi`, `nom_bi`, `lien_bi`, `date_ri`, `nom_ri`, `lien_ri`, `est_effectuee`) VALUES
(1, 1, 'instalation de pieges', '2017-05-01', '57, Rue de la Procession', 'toto', '2017-05-01', 'BI1.pdf', 'BI/_BI3_1.pdf', '2017-05-02', 'RI1.pdf', 'RI/RI_1.pdf', 1),
(2, 1, 'relever des pieges et netoyage', '2017-05-15', '57, Rue de la Procession', 'toto', '2017-06-15', 'BI2.pdf', 'BI/_BI3_2.pdf', '2017-05-16', 'RI2.pdf', 'RI/RI_2.pdf', 1),
(3, 2, 'desinfection hotel', '2017-06-05', '42, Av de Garibaldi', 'toto', '2017-06-05', 'BI3.pdf', 'BI/_BI3_3.pdf', '2017-06-06', 'RI3.pdf', 'RI/RI_3.pdf', 1),
(4, 2, 'suivi clients', '2017-06-19', '42, Av de Garibaldi', 'toto', '2017-06-19', 'BI4.pdf', 'BI/_BI3_4.pdf', '2017-06-20', 'RI4.pdf', 'RI/RI_4.pdf', 1),
(5, 1, 'suivi client', '2017-07-03', '57, Rue de la Procession', 'toto', '2017-07-04', 'BI5.pdf', 'BI/_BI3_5.pdf', '2017-07-05', 'RI5.pdf', 'RI/RI_5.pdf', 0),
(6, 1, 'suivi client2', '2017-07-10', '57, Rue de la Procession', 'toto', '2017-07-11', 'BI6.pdf', 'BI/_BI3_6.pdf', '2017-07-12', 'RI6.pdf', 'RI/RI_6.pdf', 0),
(7, 2, 'suivi client', '2017-07-03', '42, Av de Garibaldi', 'toto', '2017-07-04', 'BI7.pdf', 'BI/_BI3_7.pdf', '2017-07-05', 'RI7.pdf', 'RI/RI_7.pdf', 0),
(8, 2, 'suivi client2', '2017-07-10', '42, Av de Garibaldi', 'toto', '2017-07-11', 'BI8.pdf', 'BI/_BI3_8.pdf', '2017-07-12', 'RI8.pdf', 'RI/RI_8.pdf', 0);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id_new` int(11) NOT NULL,
  `date_new` date NOT NULL,
  `titre` varchar(150) DEFAULT NULL,
  `texte` text,
  `auteur` varchar(100) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `est_affichee` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id_new`, `date_new`, `titre`, `texte`, `auteur`, `image`, `est_affichee`) VALUES
(1, '2017-01-01', 'Salon 2017', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 'assets/salon/2017.jpg', 1),
(2, '2016-01-01', 'Salon 2016', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Toto', 'assets/salon/2016.jpg', 0),
(3, '2015-01-01', 'Salon 2015', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Toto', 'assets/salon/2015.jpg', 1),
(4, '2014-01-01', 'Salon 2014', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'toto', 'assets/salon/2014.jpg', 1),
(5, '2013-01-01', 'Salon 2013', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Toto', 'assets/salon/2013.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `plans`
--

CREATE TABLE `plans` (
  `id_plan` int(11) NOT NULL,
  `date_plan` date NOT NULL,
  `nom_plan` varchar(100) NOT NULL,
  `objet_plan` varchar(75) NOT NULL,
  `lien` varchar(75) NOT NULL,
  `id_contrat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `plans`
--

INSERT INTO `plans` (`id_plan`, `date_plan`, `nom_plan`, `objet_plan`, `lien`, `id_contrat`) VALUES
(1, '2017-04-16', 'plan1.pdf', '', 'plan/plan1.pdf', 1),
(2, '2017-05-16', 'plan2.pdf', '', 'plan/plan2.pdf', 2),
(3, '2017-06-16', 'plan3.pdf', '', 'plan/plan3.pdf', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits_utilises`
--

CREATE TABLE `produits_utilises` (
  `id_produit` int(11) NOT NULL,
  `id_interv` int(11) NOT NULL,
  `nom_produit` varchar(100) NOT NULL,
  `quantitee_utilisee` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produits_utilises`
--

INSERT INTO `produits_utilises` (`id_produit`, `id_interv`, `nom_produit`, `quantitee_utilisee`) VALUES
(1, 1, 'mort au rat', 0),
(2, 1, 'cages', 0),
(3, 1, 'appats empoisoner', 0),
(4, 2, 'mort au rat', 0),
(5, 2, 'pieges a rats', 0),
(6, 3, 'insectiside', 0),
(7, 2, 'desinfectant', 0),
(8, 3, 'pieges a fourmis', 0),
(9, 4, 'desinfectant', 0),
(10, 5, 'desinfectant', 0),
(11, 6, 'desinfectant', 0),
(12, 7, 'desinfectant', 0),
(13, 8, 'desinfectant', 0),
(14, 5, 'mort au rat', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `motdepasse` varchar(45) NOT NULL,
  `role` varchar(30) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `email`, `motdepasse`, `role`, `id_client`) VALUES
(1, 'test@gmail.com', 'toto', 'admin', 1),
(2, 'test2@gmail.com', 'toto', 'admin', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories_perso`
--
ALTER TABLE `categories_perso`
  ADD PRIMARY KEY (`id_categ`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `contrats`
--
ALTER TABLE `contrats`
  ADD PRIMARY KEY (`id_contrat`);

--
-- Index pour la table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id_devis`);

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id_facture`);

--
-- Index pour la table `fiches_securitees`
--
ALTER TABLE `fiches_securitees`
  ADD PRIMARY KEY (`id_fiche`);

--
-- Index pour la table `fichiers_perso`
--
ALTER TABLE `fichiers_perso`
  ADD PRIMARY KEY (`id_fichier`);

--
-- Index pour la table `interventions`
--
ALTER TABLE `interventions`
  ADD PRIMARY KEY (`id_intervention`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_new`);

--
-- Index pour la table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id_plan`);

--
-- Index pour la table `produits_utilises`
--
ALTER TABLE `produits_utilises`
  ADD PRIMARY KEY (`id_produit`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories_perso`
--
ALTER TABLE `categories_perso`
  MODIFY `id_categ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `contrats`
--
ALTER TABLE `contrats`
  MODIFY `id_contrat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `devis`
--
ALTER TABLE `devis`
  MODIFY `id_devis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `id_facture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `fiches_securitees`
--
ALTER TABLE `fiches_securitees`
  MODIFY `id_fiche` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `fichiers_perso`
--
ALTER TABLE `fichiers_perso`
  MODIFY `id_fichier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `interventions`
--
ALTER TABLE `interventions`
  MODIFY `id_intervention` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id_new` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `plans`
--
ALTER TABLE `plans`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `produits_utilises`
--
ALTER TABLE `produits_utilises`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
