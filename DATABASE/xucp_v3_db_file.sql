SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `str1k3r_ucprework`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT 'N/A',
  `email` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `whitelisted` tinyint(1) NOT NULL DEFAULT 0,
  `ban` tinyint(1) NOT NULL DEFAULT 0,
  `adminlevel` int(11) NOT NULL DEFAULT 0,
  `language` varchar(50) DEFAULT 'en',
  `userava` varchar(256) DEFAULT '/themes/default/assets/images/logo-bg.png',
  `usersig` varchar(256) DEFAULT 'No signature available!',
  `userhp` varchar(64) DEFAULT NULL,
  `userdiscordtag` varchar(32) DEFAULT 'no dctag'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Daten für Tabelle `accounts`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `xucp_config`
--

CREATE TABLE `xucp_config` (
  `id` int(11) NOT NULL,
  `site_dl_section` int(11) NOT NULL,
  `site_rage_section` int(11) NOT NULL,
  `site_altv_section` int(11) NOT NULL,
  `site_fivem_section` int(11) NOT NULL,
  `site_redm_section` int(11) NOT NULL,
  `site_online` int(11) NOT NULL,
  `site_name` varchar(32) NOT NULL,
  `site_teamspeak` varchar(64) NOT NULL,
  `site_gservername` varchar(64) NOT NULL,
  `site_gserverip` varchar(64) NOT NULL,
  `site_gserverport` varchar(64) NOT NULL,
  `site_themes` varchar(32) NOT NULL DEFAULT 'default-black',
  `site_lang` varchar(6) NOT NULL DEFAULT 'en',
  `site_upgrade_note` int(2) NOT NULL,
  `frage1` varchar(256) DEFAULT NULL,
  `frage2` varchar(256) DEFAULT NULL,
  `frage3` varchar(256) DEFAULT NULL,
  `frage4` varchar(256) DEFAULT NULL,
  `frage5` varchar(256) DEFAULT NULL,
  `frage6` varchar(256) DEFAULT NULL,
  `frage7` varchar(256) DEFAULT NULL,
  `frage8` varchar(256) DEFAULT NULL,
  `frage9` varchar(256) DEFAULT NULL,
  `frage10` varchar(256) DEFAULT NULL,
  `frage11` varchar(256) DEFAULT NULL,
  `frage12` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Daten für Tabelle `xucp_config`
--

INSERT INTO `xucp_config` (`id`, `site_dl_section`, `site_rage_section`, `site_altv_section`, `site_fivem_section`, `site_redm_section`, `site_online`, `site_name`, `site_teamspeak`, `site_gservername`, `site_gserverip`, `site_gserverport`, `site_themes`, `site_lang`, `site_upgrade_note`, `frage1`, `frage2`, `frage3`, `frage4`, `frage5`, `frage6`, `frage7`, `frage8`, `frage9`, `frage10`, `frage11`, `frage12`) VALUES
(1, 1, 1, 1, 1, 1, 1, 'xUCP Demo', 'ts3.xxx.de?port=9987', 'xUCP Demo', 'altv.xxx.de', '7788', 'dark', 'en', 1, 'Eine Person ist mit dem Auto in der Stadt unterwegs. Am Würfelpark vorbeigefahren, späht er eine Gruppe von Menschen auf, die sich gerade unterhalten. Er beschließt einfach so die Gruppe umzufahren. Warum ist das verboten?', 'Du bist gerade gemütlich am Karotten sammeln, wo plötzlich eine Person hinter dir steht und dir einen Schuss in den Kopf verpasst. Du hast diese Person noch nie zuvor gesehen. Darf er das?', 'Wo befinden sich unsere Safezones?', 'Was muss man bei der New-Life Regel beachten?', 'Wie lange hat man Zeit ein Supportfall zu melden?', 'Was muss man beachten, wenn Wertsachen durch einen Bug verschwinden oder beschädigt werden?', 'Was muss man bei einer Hinrichtungen, Suizid oder einer Ausreise beachten?', 'Ein Teammietglied kommt auf dich IC zu [AdminOutfit] wie verhälst du dich?', 'Sind Medic´s unantasbar?', 'Ab welchen Rang darf man Korrupt sein? ', 'Du hast 2 platte Reifen wie verhälst du dich im RP?', 'Dich nimmt eine Gang/Mafia als Geisel und fordert von dir das du all dein Geld ihnen gibst oder du stirbst was ist daran falsch und warum?');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `xucp_keys`
--

CREATE TABLE `xucp_keys` (
  `id` int(11) NOT NULL,
  `key1` varchar(256) DEFAULT NULL,
  `key2` varchar(256) DEFAULT NULL,
  `key3` varchar(256) DEFAULT NULL,
  `key4` varchar(256) DEFAULT NULL,
  `key5` varchar(256) DEFAULT NULL,
  `key6` varchar(256) DEFAULT NULL,
  `key7` varchar(256) DEFAULT NULL,
  `key8` varchar(256) DEFAULT NULL,
  `key9` varchar(256) DEFAULT NULL,
  `key10` varchar(256) DEFAULT NULL,
  `key11` varchar(256) DEFAULT NULL,
  `key12` varchar(256) DEFAULT NULL,
  `key13` varchar(256) DEFAULT NULL,
  `key14` varchar(256) DEFAULT NULL,
  `key15` varchar(256) DEFAULT NULL,
  `key16` varchar(256) DEFAULT NULL,
  `key17` varchar(256) DEFAULT NULL,
  `key18` varchar(256) DEFAULT NULL,
  `key19` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Daten für Tabelle `xucp_keys`
--

INSERT INTO `xucp_keys` (`id`, `key1`, `key2`, `key3`, `key4`, `key5`, `key6`, `key7`, `key8`, `key9`, `key10`, `key11`, `key12`, `key13`, `key14`, `key15`, `key16`, `key17`, `key18`, `key19`) VALUES
(1, '^1', '01', '91', 'F21', 'F31', 'F41', 'F51', 'F61', 'NUM01', 'K1', 'X1', 'I1', 'B1', 'N1', 'U (Manchmal auch mit E)1', 'E1', 'O1', 'Bild hoch1', 'Bild runter1');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `xucp_news`
--

CREATE TABLE `xucp_news` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `title_de` varchar(100) NOT NULL,
  `content` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `content_de` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Daten für Tabelle `xucp_news`
--

INSERT INTO `xucp_news` (`id`, `title`, `title_de`, `content`, `content_de`) VALUES
(1, 'Demopage', 'Demopage', '[b] In this User Control Panel, it is a completely new development. The xUCP V3 is for all Roleplay Projects!\r\n \r\nxUCP V3.0\r\n\r\n(C) 2022 DerStr1k3r.de\r\n\r\nhttps://derstr1k3r.de\r\n\r\nhttps://discord.gg/xg5mnYUWch[/b]\r\n\r\nMessage from xUCP V3.0 site.', '[b] In this User Control Panel, it is a completely new development. The xUCP V3 is for all Roleplay Projects!\r\n \r\nxUCP V3.0\r\n\r\n(C) 2022 DerStr1k3r.de\r\n\r\nhttps://derstr1k3r.de\r\n\r\nhttps://discord.gg/xg5mnYUWch[/b]\r\n\r\nMessage from xUCP V3.0 site.');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `xucp_rules`
--

CREATE TABLE `xucp_rules` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `title_de` varchar(100) NOT NULL,
  `content` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `content_de` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Daten für Tabelle `xucp_rules`
--

INSERT INTO `xucp_rules` (`id`, `title`, `title_de`, `content`, `content_de`) VALUES
(1, 'Rules', 'Regelwerk', '[b] In this User Control Panel, it is a completely new development. The xUCP V3 is for all Roleplay Projects!\r\n \r\nxUCP V3.0 alpha\r\n\r\n(C) 2022 DerStr1k3r.de\r\n\r\nhttps://derstr1k3r.de\r\n\r\nhttps://discord.gg/xg5mnYUWch[/b]\r\n\r\nMessage from xUCP V3.0 alpha site.', '[b] In this User Control Panel, it is a completely new development. The xUCP V3 is for all Roleplay Projects!\r\n \r\nxUCP V3.0 alpha\r\n\r\n(C) 2022 DerStr1k3r.de\r\n\r\nhttps://derstr1k3r.de\r\n\r\nhttps://discord.gg/xg5mnYUWch[/b]\r\n\r\nMessage from xUCP V3.0 alpha site.');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `xucp_support`
--

CREATE TABLE `xucp_support` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `msg` varchar(256) NOT NULL,
  `bug` varchar(30) NOT NULL,
  `posted` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `xucp_whitelist`
--

CREATE TABLE `xucp_whitelist` (
  `id` int(11) NOT NULL,
  `charstory` varchar(2048) DEFAULT NULL,
  `ucpname` varchar(64) DEFAULT NULL,
  `charname` varchar(64) DEFAULT NULL,
  `frage1` varchar(256) DEFAULT NULL,
  `frage2` varchar(256) DEFAULT NULL,
  `frage3` varchar(256) DEFAULT NULL,
  `frage4` varchar(256) DEFAULT NULL,
  `frage5` varchar(256) DEFAULT NULL,
  `frage6` varchar(256) DEFAULT NULL,
  `frage7` varchar(256) DEFAULT NULL,
  `frage8` varchar(256) DEFAULT NULL,
  `frage9` varchar(256) DEFAULT NULL,
  `frage10` varchar(256) DEFAULT NULL,
  `frage11` varchar(256) DEFAULT NULL,
  `frage12` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Daten für Tabelle `xucp_whitelist`
--
--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indizes für die Tabelle `xucp_config`
--
ALTER TABLE `xucp_config`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `xucp_keys`
--
ALTER TABLE `xucp_keys`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `xucp_news`
--
ALTER TABLE `xucp_news`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `xucp_rules`
--
ALTER TABLE `xucp_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `xucp_support`
--
ALTER TABLE `xucp_support`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `xucp_whitelist`
--
ALTER TABLE `xucp_whitelist`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT für Tabelle `xucp_config`
--
ALTER TABLE `xucp_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `xucp_keys`
--
ALTER TABLE `xucp_keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `xucp_news`
--
ALTER TABLE `xucp_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `xucp_rules`
--
ALTER TABLE `xucp_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `xucp_support`
--
ALTER TABLE `xucp_support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT für Tabelle `xucp_whitelist`
--
ALTER TABLE `xucp_whitelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
