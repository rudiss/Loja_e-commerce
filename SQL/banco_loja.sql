-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19-Maio-2016 às 16:18
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `titulo`, `descricao`) VALUES
(1, 'Survivor - Terror', 'Survival horror é um sub-gênero de jogos de videogame do gênero ação/aventura, no qual o tema é terror e sobrevivência. O principal objetivo do jogo é sobreviver a fatos inicialmente incompreendidos e misteriosos e, ao longo do jogo, descobrir os detalhes, desvendar os mistérios da história que muitas vezes é totalmente desconhecida e achar soluções para os diversos quebra-cabeças apresentados.'),
(2, 'Corrida', 'O PlayStation 4 acumula uma respeitável biblioteca de títulos com gráficos incríveis, há jogos excelentes nos mais variados gêneros. Entre eles, os tradicionais games de corrida também inundam o PS4, lançados por diversas empresas e com estilos muito diferentes. '),
(3, 'Luta - Ação', 'Nessa categoria você encontra os melhores jogos de Luta e Ação!'),
(4, 'Esportes', 'Seja com mecânicas inéditas de jogabilidade ou novos modos de jogo, as versões dos principais games de esporte lançados em 2015 apresentaram atrativos suficientes para agradar os fãs durante toda a temporada atual. De disputas sobre quatro rodas a competições nas quadras e gramados, a lista abaixo traz as melhores opções do gênero para consoles '),
(5, 'Shooters', 'Mirar, atirar e destruir o oponente. Os jogos de tiro estão entre os mais populares no mercado de games. Não é à toa que algumas das maiores franquias da atualidade são do estilo.'),
(6, 'RPG - Ação', 'Role-playing game, também conhecido como RPG (em português: "jogo de interpretação de papéis" ou "jogo de representação"),é um tipo de jogo em que os jogadores assumem papéis de personagens e criam narrativas colaborativamente. O progresso de um jogo se dá de acordo com um sistema de regras predeterminado, dentro das quais os jogadores podem improvisar livremente. As escolhas dos jogadores determinam a direção que o jogo irá tomar.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('017b83ad98b8963b321b6e810089532d6e5d44d1', '::1', 1462815643, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436323831353531313b),
('0801df5c907cc62c8f97115f3d1b151db3443750', '::1', 1456581651, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363538313335333b6c6f67696e7c623a313b69645f7573756172696f7c733a313a2231223b7573756172696f7c733a353a2261646d696e223b636c69656e74657c4f3a383a22737464436c617373223a31393a7b733a323a226964223b733a313a2234223b733a343a226e6f6d65223b733a353a224d61726965223b733a393a22736f6272656e6f6d65223b733a333a22446f65223b733a323a227267223b733a383a223132333132333435223b733a333a22637066223b733a31343a223132332e3132332e3132332d3434223b733a31353a22646174615f6e617363696d656e746f223b733a31393a22313936392d31322d33312030303a30303a3030223b733a343a227365786f223b733a313a2246223b733a333a22727561223b733a31343a225275612064617320466c6f726573223b733a363a226e756d65726f223b733a333a22313233223b733a363a2262616972726f223b733a363a2243656e74726f223b733a363a22636964616465223b733a31303a2253c3a36f205061756c6f223b733a363a2265737461646f223b733a323a225350223b733a333a22636570223b733a393a2238303132332d343235223b733a383a2274656c65666f6e65223b733a31343a2228313129323331322e3331323331223b733a373a2263656c756c6172223b733a31343a2228323329313233312e3233313233223b733a353a22656d61696c223b733a31373a226d617269652e646f6540616f6c2e636f6d223b733a353a2273656e6861223b733a353a223132333435223b733a363a22737461747573223b733a313a2231223b733a31333a226361646173747261646f5f656d223b733a31393a22323031352d30372d30362030373a31363a3435223b7d6c6f6761646f7c623a313b),
('0bf9a86815d51dd95ab4acbf73b3850a2ff136f6', '::1', 1457741056, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435373734313035363b6c6f67696e7c623a313b69645f7573756172696f7c733a313a2231223b7573756172696f7c733a353a2261646d696e223b),
('12228b3c0d4ce5b3259f7574dc9210dcd87d24b5', '::1', 1456581056, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363538303737333b6c6f67696e7c623a313b69645f7573756172696f7c733a313a2231223b7573756172696f7c733a353a2261646d696e223b),
('19d8c02c8a4886773460dcf4411ae3977f237328', '::1', 1463438476, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436333433383336313b6c6f67696e7c623a313b69645f7573756172696f7c733a313a2232223b7573756172696f7c733a353a227275646973223b),
('1c105eb65c78e592fd7a2986059d4077c2c84ae8', '::1', 1462813571, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436323831333537313b),
('2d36f0da349761231d23818df188b9c1a361eaa7', '::1', 1462815505, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436323831353530353b),
('3b5f0b2d1d981fc00b39ec833e652382bbcbbbf7', '::1', 1463438040, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436333433383034303b6c6f67696e7c623a313b69645f7573756172696f7c733a313a2231223b7573756172696f7c733a353a2261646d696e223b636c69656e74657c4f3a383a22737464436c617373223a31393a7b733a323a226964223b733a313a2235223b733a343a226e6f6d65223b733a373a22727564696e6569223b733a393a22736f6272656e6f6d65223b733a353a2273696c7661223b733a323a227267223b733a393a22313233343536373839223b733a333a22637066223b733a31343a223032332e3430342e3031302d3632223b733a31353a22646174615f6e617363696d656e746f223b733a31393a22313939302d30352d32392030303a30303a3030223b733a343a227365786f223b733a313a226d223b733a333a22727561223b733a32323a22527561204361726c6f732064652043617276616c686f223b733a363a226e756d65726f223b733a323a223837223b733a363a2262616972726f223b733a373a2246726167617461223b733a363a22636964616465223b733a373a2250656c6f746173223b733a363a2265737461646f223b733a323a225253223b733a333a22636570223b733a393a2239363033302d323730223b733a383a2274656c65666f6e65223b733a303a22223b733a373a2263656c756c6172223b733a31333a223529333834322e343439313928223b733a353a22656d61696c223b733a31383a2272756469736c707040676d61696c2e636f6d223b733a353a2273656e6861223b733a353a223132333435223b733a363a22737461747573223b733a313a2231223b733a31333a226361646173747261646f5f656d223b733a31393a22323031362d30322d32342031393a35353a3533223b7d6c6f6761646f7c623a313b),
('4463ba106a6d0b866724d64527a54045e4f701bd', '::1', 1462814417, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436323831343431373b),
('488bc5749a832a619a4cb084017ed42b466717d5', '::1', 1456783981, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363738333938313b),
('57ff79b4f8aa288e1d37ef9ca5ce9158c0e16bce', '::1', 1462811796, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436323831313739363b),
('6232896169c87324a6e3597388556bcf82314451', '::1', 1456582434, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363538323333313b6c6f67696e7c623a313b69645f7573756172696f7c733a313a2231223b7573756172696f7c733a353a2261646d696e223b636c69656e74657c4f3a383a22737464436c617373223a31393a7b733a323a226964223b733a313a2235223b733a343a226e6f6d65223b733a373a22727564696e6569223b733a393a22736f6272656e6f6d65223b733a353a2273696c7661223b733a323a227267223b733a393a22313233343536373839223b733a333a22637066223b733a31343a223032332e3430342e3031302d3632223b733a31353a22646174615f6e617363696d656e746f223b733a31393a22313939302d30352d32392030303a30303a3030223b733a343a227365786f223b733a313a226d223b733a333a22727561223b733a32323a22527561204361726c6f732064652043617276616c686f223b733a363a226e756d65726f223b733a323a223837223b733a363a2262616972726f223b733a373a2246726167617461223b733a363a22636964616465223b733a373a2250656c6f746173223b733a363a2265737461646f223b733a323a225253223b733a333a22636570223b733a393a2239363033302d323730223b733a383a2274656c65666f6e65223b733a303a22223b733a373a2263656c756c6172223b733a31333a223529333834322e343439313928223b733a353a22656d61696c223b733a31383a2272756469736c707040676d61696c2e636f6d223b733a353a2273656e6861223b733a353a223132333435223b733a363a22737461747573223b733a313a2231223b733a31333a226361646173747261646f5f656d223b733a31393a22323031362d30322d32342031393a35353a3533223b7d6c6f6761646f7c623a313b),
('7a5cb96581c8906200acf258b3895b8898c6f12b', '::1', 1462811254, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436323831313235343b636c69656e74657c4f3a383a22737464436c617373223a31393a7b733a323a226964223b733a313a2234223b733a343a226e6f6d65223b733a353a224d61726965223b733a393a22736f6272656e6f6d65223b733a333a22446f65223b733a323a227267223b733a383a223132333132333435223b733a333a22637066223b733a31343a223132332e3132332e3132332d3434223b733a31353a22646174615f6e617363696d656e746f223b733a31393a22313936392d31322d33312030303a30303a3030223b733a343a227365786f223b733a313a2246223b733a333a22727561223b733a31343a225275612064617320466c6f726573223b733a363a226e756d65726f223b733a333a22313233223b733a363a2262616972726f223b733a363a2243656e74726f223b733a363a22636964616465223b733a31303a2253c3a36f205061756c6f223b733a363a2265737461646f223b733a323a225350223b733a333a22636570223b733a393a2238303132332d343235223b733a383a2274656c65666f6e65223b733a31343a2228313129323331322e3331323331223b733a373a2263656c756c6172223b733a31343a2228323329313233312e3233313233223b733a353a22656d61696c223b733a31373a226d617269652e646f6540616f6c2e636f6d223b733a353a2273656e6861223b733a353a223132333435223b733a363a22737461747573223b733a313a2231223b733a31333a226361646173747261646f5f656d223b733a31393a22323031352d30372d30362030373a31363a3435223b7d6c6f6761646f7c623a313b),
('87dbc005e6197c39a2e44b2f91b96fd37c6e4794', '::1', 1463436912, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436333433363931323b6c6f67696e7c623a313b69645f7573756172696f7c733a313a2231223b7573756172696f7c733a353a2261646d696e223b636c69656e74657c4f3a383a22737464436c617373223a31393a7b733a323a226964223b733a313a2234223b733a343a226e6f6d65223b733a353a224d61726965223b733a393a22736f6272656e6f6d65223b733a333a22446f65223b733a323a227267223b733a383a223132333132333435223b733a333a22637066223b733a31343a223132332e3132332e3132332d3434223b733a31353a22646174615f6e617363696d656e746f223b733a31393a22313936392d31322d33312030303a30303a3030223b733a343a227365786f223b733a313a2246223b733a333a22727561223b733a31343a225275612064617320466c6f726573223b733a363a226e756d65726f223b733a333a22313233223b733a363a2262616972726f223b733a363a2243656e74726f223b733a363a22636964616465223b733a31303a2253c3a36f205061756c6f223b733a363a2265737461646f223b733a323a225350223b733a333a22636570223b733a393a2238303132332d343235223b733a383a2274656c65666f6e65223b733a31343a2228313129323331322e3331323331223b733a373a2263656c756c6172223b733a31343a2228323329313233312e3233313233223b733a353a22656d61696c223b733a31373a226d617269652e646f6540616f6c2e636f6d223b733a353a2273656e6861223b733a353a223132333435223b733a363a22737461747573223b733a313a2231223b733a31333a226361646173747261646f5f656d223b733a31393a22323031352d30372d30362030373a31363a3435223b7d6c6f6761646f7c623a313b),
('8de222e91bafec710ee1510a2074df557842f603', '::1', 1456581939, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363538313635343b6c6f67696e7c623a313b69645f7573756172696f7c733a313a2231223b7573756172696f7c733a353a2261646d696e223b636c69656e74657c4e3b6c6f6761646f7c623a303b),
('9b7e5567a5a453721d164825d2fcb8ce9247bd8c', '::1', 1462814085, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436323831343038353b636172745f636f6e74656e74737c613a333a7b733a31303a22636172745f746f74616c223b643a3132393b733a31313a22746f74616c5f6974656d73223b643a313b733a33323a226434356465316135616465623061376131333134316465326161633230363138223b613a31333a7b733a323a226964223b733a31303a2252455349434f4c303031223b733a333a22717479223b643a313b733a353a227072696365223b643a3132393b733a343a226e616d65223b733a33343a225265736964656e74204576696c202d204f726967696e7320436f6c6c656374696f6e223b733a363a22616c74757261223b733a333a22323030223b733a373a226c617267757261223b733a323a223435223b733a31313a22636f6d7072696d656e746f223b733a333a22313230223b733a343a227065736f223b733a333a22333030223b733a373a226f7074696f6e73223b4e3b733a333a2275726c223b733a36343a22687474703a2f2f6c6f63616c686f73742f6c6f6a612f70726f6475746f2f342f7265736964656e742d6576696c2d6f726967696e732d636f6c6c656374696f6e223b733a343a22666f746f223b733a37383a22687474703a2f2f6c6f63616c686f73742f6c6f6a612f6173736574732f696d672f70726f6475746f732f61383766663637396132663365373164393138316136376237353432313232632e6a7067223b733a353a22726f776964223b733a33323a226434356465316135616465623061376131333134316465326161633230363138223b733a383a22737562746f74616c223b643a3132393b7d7d),
('bda0f210efdaafc63ade3ed5a5a93293f340f3af', '::1', 1456582328, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363538323032393b6c6f67696e7c623a313b69645f7573756172696f7c733a313a2231223b7573756172696f7c733a353a2261646d696e223b636c69656e74657c4f3a383a22737464436c617373223a31393a7b733a323a226964223b733a313a2235223b733a343a226e6f6d65223b733a373a22727564696e6569223b733a393a22736f6272656e6f6d65223b733a353a2273696c7661223b733a323a227267223b733a393a22313233343536373839223b733a333a22637066223b733a31343a223032332e3430342e3031302d3632223b733a31353a22646174615f6e617363696d656e746f223b733a31393a22313939302d30352d32392030303a30303a3030223b733a343a227365786f223b733a313a226d223b733a333a22727561223b733a32323a22527561204361726c6f732064652043617276616c686f223b733a363a226e756d65726f223b733a323a223837223b733a363a2262616972726f223b733a373a2246726167617461223b733a363a22636964616465223b733a373a2250656c6f746173223b733a363a2265737461646f223b733a323a225253223b733a333a22636570223b733a393a2239363033302d323730223b733a383a2274656c65666f6e65223b733a303a22223b733a373a2263656c756c6172223b733a31333a223529333834322e343439313928223b733a353a22656d61696c223b733a31383a2272756469736c707040676d61696c2e636f6d223b733a353a2273656e6861223b733a353a223132333435223b733a363a22737461747573223b733a313a2231223b733a31333a226361646173747261646f5f656d223b733a31393a22323031362d30322d32342031393a35353a3533223b7d6c6f6761646f7c623a313b),
('c16fd6f36f401470003dc04815bb7dbf30e4563d', '::1', 1456875914, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363837353931343b6c6f67696e7c623a313b69645f7573756172696f7c733a313a2231223b7573756172696f7c733a353a2261646d696e223b),
('c1b27474ee39f3cf2da77c0454051935efec6b0f', '::1', 1462810609, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436323831303630393b),
('c7a865e83f36f6590074ef26712b8525bfafc6f3', '::1', 1463438346, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436333433383334363b636c69656e74657c4f3a383a22737464436c617373223a31393a7b733a323a226964223b733a313a2235223b733a343a226e6f6d65223b733a373a22727564696e6569223b733a393a22736f6272656e6f6d65223b733a353a2273696c7661223b733a323a227267223b733a393a22313233343536373839223b733a333a22637066223b733a31343a223032332e3430342e3031302d3632223b733a31353a22646174615f6e617363696d656e746f223b733a31393a22313939302d30352d32392030303a30303a3030223b733a343a227365786f223b733a313a226d223b733a333a22727561223b733a32323a22527561204361726c6f732064652043617276616c686f223b733a363a226e756d65726f223b733a323a223837223b733a363a2262616972726f223b733a373a2246726167617461223b733a363a22636964616465223b733a373a2250656c6f746173223b733a363a2265737461646f223b733a323a225253223b733a333a22636570223b733a393a2239363033302d323730223b733a383a2274656c65666f6e65223b733a303a22223b733a373a2263656c756c6172223b733a31333a223529333834322e343439313928223b733a353a22656d61696c223b733a31383a2272756469736c707040676d61696c2e636f6d223b733a353a2273656e6861223b733a353a223132333435223b733a363a22737461747573223b733a313a2231223b733a31333a226361646173747261646f5f656d223b733a31393a22323031362d30322d32342031393a35353a3533223b7d6c6f6761646f7c623a313b636172745f636f6e74656e74737c613a333a7b733a31303a22636172745f746f74616c223b643a3137303b733a31313a22746f74616c5f6974656d73223b643a313b733a33323a223732303138326366616333363239393335366437393865333632663464326237223b613a31333a7b733a323a226964223b733a393a22534841444f57303031223b733a333a22717479223b643a313b733a353a227072696365223b643a3137303b733a343a226e616d65223b733a31363a22536861646f77206f66204d6f72646f72223b733a363a22616c74757261223b733a333a22333530223b733a373a226c617267757261223b733a333a22313230223b733a31313a22636f6d7072696d656e746f223b733a333a22343030223b733a343a227065736f223b733a343a2231303536223b733a373a226f7074696f6e73223b4e3b733a333a2275726c223b733a34393a22687474703a2f2f6c6f63616c686f73742f6c6f6a612f70726f6475746f2f32342f736861646f772d6f662d6d6f72646f72223b733a343a22666f746f223b733a37383a22687474703a2f2f6c6f63616c686f73742f6c6f6a612f6173736574732f696d672f70726f6475746f732f31666631646537373430303566386461313366343239343338383163363535662e6a7067223b733a353a22726f776964223b733a33323a223732303138326366616333363239393335366437393865333632663464326237223b733a383a22737562746f74616c223b643a3137303b7d7d),
('d99c0cf5256c150f7df9a8037cf8287c5db98e16', '::1', 1456784514, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363738343531343b636c69656e74657c4f3a383a22737464436c617373223a31393a7b733a323a226964223b733a313a2235223b733a343a226e6f6d65223b733a373a22727564696e6569223b733a393a22736f6272656e6f6d65223b733a353a2273696c7661223b733a323a227267223b733a393a22313233343536373839223b733a333a22637066223b733a31343a223032332e3430342e3031302d3632223b733a31353a22646174615f6e617363696d656e746f223b733a31393a22313939302d30352d32392030303a30303a3030223b733a343a227365786f223b733a313a226d223b733a333a22727561223b733a32323a22527561204361726c6f732064652043617276616c686f223b733a363a226e756d65726f223b733a323a223837223b733a363a2262616972726f223b733a373a2246726167617461223b733a363a22636964616465223b733a373a2250656c6f746173223b733a363a2265737461646f223b733a323a225253223b733a333a22636570223b733a393a2239363033302d323730223b733a383a2274656c65666f6e65223b733a303a22223b733a373a2263656c756c6172223b733a31333a223529333834322e343439313928223b733a353a22656d61696c223b733a31383a2272756469736c707040676d61696c2e636f6d223b733a353a2273656e6861223b733a353a223132333435223b733a363a22737461747573223b733a313a2231223b733a31333a226361646173747261646f5f656d223b733a31393a22323031362d30322d32342031393a35353a3533223b7d6c6f6761646f7c623a313b6c6f67696e7c623a313b69645f7573756172696f7c733a313a2231223b7573756172696f7c733a353a2261646d696e223b),
('e487842e0416714d5bdc847d42e7df3fdfb6fe6a', '::1', 1457741645, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435373734313530353b);

-- --------------------------------------------------------

--
-- Estrutura da tabela `classes_metodos`
--

CREATE TABLE `classes_metodos` (
  `id` int(10) UNSIGNED NOT NULL,
  `classe` varchar(255) NOT NULL,
  `metodo` varchar(255) NOT NULL,
  `nome_amigavel` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `classes_metodos`
--

INSERT INTO `classes_metodos` (`id`, `classe`, `metodo`, `nome_amigavel`) VALUES
(1, 'categorias', 'index', 'index - categorias'),
(2, 'categorias', 'alterar', 'alterar - categorias'),
(3, 'categorias', 'adicionar', 'adicionar - categorias'),
(4, 'home', 'index', 'index - home'),
(5, 'home', 'login', 'login - home'),
(6, 'produtos', 'index', 'index - produtos'),
(7, 'usuarios', 'sem_permissao', 'sem_permissao - usuarios'),
(8, 'clientes', 'index', 'index - clientes'),
(9, 'pedidos', 'index', 'index - pedidos'),
(10, 'transportadoras', 'index', 'index - transportadoras'),
(11, 'usuarios', 'index', 'index - usuarios'),
(12, 'usuarios', 'efetuar_login', 'efetuar_login - usuarios'),
(13, 'usuarios', 'logout', 'logout - usuarios'),
(14, 'usuarios', 'permissoes', 'permissoes - usuarios'),
(15, 'transportadoras', 'adicionar', 'adicionar - transportadoras'),
(16, 'clientes', 'detalhes', 'detalhes - clientes'),
(17, 'clientes', 'alterar', 'alterar - clientes'),
(18, 'clientes', 'excluir', 'excluir - clientes'),
(19, 'categorias', 'excluir', 'excluir - categorias'),
(20, 'produtos', 'adicionar', 'adicionar - produtos'),
(21, 'produtos', 'alterar', 'alterar - produtos'),
(22, 'pedidos', 'detalhes', 'detalhes - pedidos'),
(23, 'pedidos', 'excluir', 'excluir - pedidos'),
(24, 'transportadoras', 'excluir', 'excluir - transportadoras'),
(25, 'usuarios', 'alterar_permissoes', 'alterar_permissoes - usuarios'),
(26, 'usuarios', 'adicionar', 'adicionar - usuarios'),
(27, 'usuarios', 'alterar', 'alterar - usuarios'),
(28, 'usuarios', 'excluir', 'excluir - usuarios'),
(29, 'usuarios', 'salvar_alteracao', 'salvar_alteracao - usuarios'),
(30, 'categorias', 'nova_foto', 'nova_foto - categorias'),
(31, 'categorias', 'salvar_alteracoes', 'salvar_alteracoes - categorias'),
(32, 'produtos', 'nova_foto', 'nova_foto - produtos'),
(33, 'produtos', 'salvar_alteracoes', 'salvar_alteracoes - produtos'),
(34, 'produtos', 'excluir', 'excluir - produtos'),
(35, 'pedidos', 'alterar_status', 'alterar_status - pedidos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(245) NOT NULL,
  `sobrenome` varchar(145) NOT NULL,
  `rg` varchar(10) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `data_nascimento` datetime NOT NULL,
  `sexo` char(1) NOT NULL,
  `rua` varchar(145) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `bairro` varchar(145) NOT NULL,
  `cidade` varchar(145) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(145) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `cadastrado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `sobrenome`, `rg`, `cpf`, `data_nascimento`, `sexo`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `telefone`, `celular`, `email`, `senha`, `status`, `cadastrado_em`) VALUES
(1, 'Jhon M', 'Doe', '111111111', '123.123.123-45', '1967-12-19 00:00:00', 'M', 'Estrada do Xisto', '12', 'Centro', 'São Bento do Sul', 'SC', '89280-112', '(23)1232.33333', '(23)2323.23333', 'ademir.gabbardo@gmail.com', '12345', 1, '2015-04-26 08:47:39'),
(4, 'Marie', 'Doe', '12312345', '123.123.123-44', '1969-12-31 00:00:00', 'F', 'Rua das Flores', '123', 'Centro', 'São Paulo', 'SP', '80123-425', '(11)2312.31231', '(23)1231.23123', 'marie.doe@aol.com', '12345', 1, '2015-07-06 07:16:45'),
(5, 'rudinei', 'silva', '123456789', '023.404.010-62', '1990-05-29 00:00:00', 'm', 'Rua Carlos de Carvalho', '87', 'Fragata', 'Pelotas', 'RS', '96030-270', '', '5)3842.44919(', 'rudislpp@gmail.com', '12345', 1, '2016-02-24 19:55:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes_log`
--

CREATE TABLE `clientes_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(245) NOT NULL,
  `sobrenome` varchar(145) NOT NULL,
  `rg` varchar(45) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `data_nascimento` datetime NOT NULL,
  `sexo` char(1) NOT NULL,
  `rua` varchar(145) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `bairro` varchar(145) NOT NULL,
  `cidade` varchar(145) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(145) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `cadastrado_em` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_pedidos`
--

CREATE TABLE `itens_pedidos` (
  `id` int(10) UNSIGNED NOT NULL,
  `pedido` int(10) UNSIGNED NOT NULL,
  `item` varchar(45) NOT NULL,
  `quantidade` int(10) UNSIGNED NOT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `itens_pedidos`
--

INSERT INTO `itens_pedidos` (`id`, `pedido`, `item`, `quantidade`, `preco`) VALUES
(1, 1, 'MSAT001', 1, '12.00'),
(2, 1, 'QJOG001', 1, '218.00'),
(3, 1, 'VTTO001', 1, '914.00'),
(4, 112, 'CLTE002', 1, '32.00'),
(5, 112, 'CLTE003', 1, '124.00'),
(6, 113, 'PPRK001', 1, '43.00'),
(7, 113, 'QJOG001', 1, '218.00'),
(8, 113, 'MSAT001', 1, '12.00'),
(12, 115, 'MSAT001', 1, '12.00'),
(13, 115, 'QJOB001', 1, '700.00'),
(14, 115, 'CBEF001', 1, '47.00'),
(15, 116, 'ACAF001', 1, '418.00'),
(16, 116, 'DRAGON01', 1, '190.00'),
(17, 116, 'WITCHER001', 1, '190.00'),
(18, 117, 'MK002', 1, '149.99'),
(19, 117, 'WITCHER001', 1, '190.00'),
(20, 117, 'BOSS001', 1, '200.00'),
(21, 118, 'PES001', 1, '170.00'),
(22, 118, 'MK002', 1, '149.99'),
(23, 119, 'GOD001', 1, '99.00'),
(24, 119, 'BF4001', 1, '138.00'),
(25, 120, 'SHADOW001', 1, '170.00'),
(26, 121, 'BLOOD001', 1, '149.99'),
(27, 122, 'MK002', 1, '149.99'),
(28, 123, 'BLOOD001', 1, '149.99'),
(29, 124, 'WITCHER001', 1, '190.00'),
(30, 125, 'SHADOW001', 1, '170.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(10) UNSIGNED NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cliente` int(10) UNSIGNED NOT NULL,
  `produtos` decimal(10,2) NOT NULL,
  `frete` decimal(10,2) NOT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `comentarios` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `data`, `cliente`, `produtos`, `frete`, `status`, `comentarios`) VALUES
(117, '2016-02-27 14:09:12', 5, '539.99', '128.70', 2, 'Novo pedido inserido no sistema.'),
(118, '2016-02-29 22:13:53', 5, '319.99', '50.50', 2, 'Novo pedido inserido no sistema.'),
(119, '2016-05-09 16:17:44', 4, '237.00', '24.30', 0, 'Novo pedido inserido no sistema.'),
(120, '2016-05-16 22:12:51', 4, '170.00', '22.60', 0, 'Novo pedido inserido no sistema.'),
(121, '2016-05-16 22:13:50', 4, '149.99', '22.60', 0, 'Novo pedido inserido no sistema.'),
(122, '2016-05-16 22:14:51', 4, '149.99', '19.90', 1, 'Novo pedido inserido no sistema.'),
(123, '2016-05-16 22:22:21', 5, '149.99', '50.50', 0, 'Novo pedido inserido no sistema.'),
(124, '2016-05-16 22:35:32', 5, '190.00', '50.50', 0, 'Novo pedido inserido no sistema.'),
(125, '2016-05-16 22:39:06', 5, '170.00', '50.50', 1, 'Novo pedido inserido no sistema.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissoes`
--

CREATE TABLE `permissoes` (
  `usuario` int(10) UNSIGNED NOT NULL,
  `metodo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permissoes`
--

INSERT INTO `permissoes` (`usuario`, `metodo`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `largura_caixa_mm` int(10) UNSIGNED NOT NULL,
  `altura_caixa_mm` int(10) UNSIGNED NOT NULL,
  `comprimento_caixa_mm` int(10) UNSIGNED NOT NULL,
  `peso_gramas` int(10) UNSIGNED NOT NULL,
  `data_adicionado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ativo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `codigo`, `titulo`, `descricao`, `preco`, `largura_caixa_mm`, `altura_caixa_mm`, `comprimento_caixa_mm`, `peso_gramas`, `data_adicionado`, `ativo`) VALUES
(1, 'UNTIL001', 'Until Dawn', 'Reunidos para relembrar a morte de duas amigas, oito jovens se vêem presos em uma isolada casa na montanha quando uma série de eventos sinistros começa a acontecer.', '159.90', 200, 300, 200, 200, '2015-04-11 20:58:37', 1),
(2, 'DYING001', 'Dying Light', 'Dying Light é um jogo de ação e horror de sobrevivência em primeira pessoa que se passa em um grande e perigoso mundo aberto. Durante o dia, os jogadores passam por um amplo ambiente urbano, dominado por uma epidemia cruel, procurando por mantimentos pelo mundo e criando armas para se defenderem contra uma população infectada que não para de crescer. Durante a noite, o caçador torna-se a caça quando as pessoas infectadas ficam agressivas e mais perigosas. Os predadores, que só aparecem após o pôr do sol, são ainda mais assustadores. Os jogadores devem usar tudo o que puderem para sobreviver até o primeiro raio de luz da manhã.\r\nBoa noite e Boa sorte.', '159.90', 120, 250, 120, 450, '2015-04-11 21:00:20', 1),
(3, 'RESI001', 'Resident Evil - Revelations 2', 'Resident Evil Revelations 2 mostra a volta dramática de Claire Redfield. Sobrevivente do incidente em Raccoon City, mostrado em jogos anteriores da franquia, Claire agora trabalha para a Terra Save, uma organização antibioterrorismo. Moira Burton está em sua festa de boas-vindas da Terra Save quando forças armadas desconhecidas invadem o escritório. Claire e Moira perdem a consciência e acordam em um centro de detenção abandonado. Juntas, elas precisam descobrir quem as sequestrou e por que. Com os assustadores Afflicted esperando em cada canto, os jogadores precisarão usar suas armas e munições com sabedoria, fazendo jus ao clássico estilo de horror de sobrevivência. ', '79.00', 300, 300, 300, 3600, '2015-04-11 21:03:16', 1),
(4, 'RESICOL001', 'Resident Evil - Origins Collection', 'Resident Evil: Origins Collection traz dois jogos remasterizados com um novo visual em HD, som aprimorado, suporte widescreen, sistema modernizado de controles e mais. O primeiro título, Resident Evil 0, vai levar principiantes e fãs da série a vivenciar a história do que realmente aconteceu antes do icônico acidente na mansão que originou toda a saga. Já Resident Evil volta às origens com uma versão remasterizada do primeiro título da série que vendeu mais de 66 milhões de cópias. Os fãs da franquia vão adorar esta releitura definitiva do clássico título Resident Evil de 2002, seja para reviverem as memórias ou para conhecerem o jogo que cunhou o termo terror de sobrevivência no mundo dos games. ', '129.00', 45, 200, 120, 300, '2015-04-11 21:09:48', 1),
(5, 'EVIL001', 'The Evil Within', 'Desenvolvido por Shinji Mikami - criador da série Resident Evil - e a equipe talentosa da Tango Gameworks, The Evil Within incorpora o puro significado de um jogo de terror e sobrevivência!\r\nAmbientes altamente detalhados, ansiedade horripilante e uma história complexa se mesclam para criar um mundo envolvente que irá levá-lo ao ápice do suspense. Com recursos limitados à sua disposição, você irá lutar pela sobrevivência e experimentar um medo profundo nesta mistura perfeita de horror e ação.', '149.99', 100, 100, 100, 100, '2015-04-11 21:15:44', 1),
(6, 'NEED001', 'Need for Speed', 'Descubra o mundo aberto noturno da cultura urbana de carros, impulsionado pelos Cinco Jeitos de Jogar, neste empolgante reboot do Need for Speed¿. Crie seu próprio caminho, por meio de múltiplas histórias que se entrelaçam, ganhando reputação na sua jornada para se tornar o maior ícone das ruas.\r\nNeed for Speed realiza o que os fãs pediram e é central à série: personalização total, um mundo aberto autêntico repleto com a cultura de carros do mundo real e uma narrativa que impulsiona o seu jogo.\r\nVentura Bay é o seu playground urbano - de estradas nas colinas com vista para a cidade a distritos urbanos infestados de policiais com esquinas apertadas - a cidade ganha vida quando as pessoas vão dormir. Lar de cinco ícones automotivos do mundo real, os heróis da cultura de carros atual, eles vão inspirar, impulsionar e testar você. Aumente sua reputação e mereça o respeito deles na sua jornada para se tornar o maior ícone das ruas. ', '179.99', 120, 120, 120, 350, '2015-04-11 21:18:32', 1),
(7, 'CREW001', 'The Crew', 'The Crew leva você e seus amigos a um passeio imprudente dentro de um massivo e recreativo Estados Unidos em mundo aberto, cheios de desafios emocionantes. Generoso em conteúdo e sob medida para a geração conectada, The Crew é o jogo da próxima geração que redefine um gênero. \r\nCrescer sua representação na cena underground de corridas e sabotar atividades cidade-a-cidade por todo os Estados Unidos. Manobre pelas ruas movimentadas de Nova York e Los Angeles, cruze a ensolarada Miami Beach ou caminhe pelas planaltos de tirar o fôlego de Monument Valley. Cada localidade vem com seu próprio conjunto de surpresas e desafios de corrida para dominar. Em sua jornada você irá encontrar outros jogadores na estrada - todos podem ser potenciais parceiros ou futuros rivais. \r\n', '147.00', 200, 300, 250, 400, '2015-04-11 21:21:10', 1),
(8, 'F12015001', 'Formula 1 - 2015', 'Corra como um campeão em F1 2015 e fique mais próximo do que nunca da experiência de corrida mais glamorosa, excitante e de prestígio do mundo automobilístico. F1 2015 coloca você no coração de toda ação com uma engine de jogo totalmente nova que recria os impressionantemente rápidos e altamente sensíveis carros de Formula Um e traz como novidade uma apresentação em forma de transmissão de TV que coloca você em uma imersão única como a que existe no dia da corrida.\r\nF1 2015 é o videogame oficial do Campeonato Mundial de Formula Um da FIA de 2015 e ainda apresenta o Campeonato Mundial de Formula Um de FIA de 2014 totalmente jogável como conteúdo bônus. Compita como o seu piloto favorito de Formula Um no novo Campeonato da Temporada e vá até o limite no desafiador Modo de Temporada Profissional. Aprimore suas habilidades na nova Sessão de Treinos Livres Online, desafie seus amigos e corra contra seus rivais de todo o mundo no Modo Multiplayer Online.', '147.00', 250, 250, 250, 350, '2015-04-11 21:24:53', 1),
(9, 'DRIVE001', 'Driveclub', 'O Driveclub dá vida ao coração e à alma da cultura automobilística. Com uma experiência incrivelmente autêntica e envolvente por trás do volante, o Driveclub permite que você sinta toda a emoção de pilotar os carros mais potentes e com o design mais elegante do mundo, tudo isso representado com uma imensa riqueza de detalhes, por dentro e por fora. Compartilhe a emoção e agitação de corridas individuais em alta velocidade ou se associe a um clube de corrida para descobrir tudo o que o Driveclub pode oferecer. \r\n\r\nCriado especificamente com a próxima geração de jogadores em mente, o Driveclub conecta você e seus amigos, permitindo sempre que vocês compartilhem as suas experiências, enviem e recebam desafios e se mantenham atualizados sobre o desempenho da sua equipe. \r\n', '149.90', 120, 400, 120, 120, '2015-04-11 21:28:15', 1),
(10, 'NDRIV001', 'Need for speed - Rivals', 'Bem-vindo a Redview County, onde uma rivalidade entre policiais e pilotos de rua não tem fim. Os dois lados competem em uma guerra aberta para dominar a mídia social, local e nacional e levar os melhores carros, mods e tecnologia. Arrisque tudo. Não confie em ninguém. ', '95.00', 400, 400, 400, 120, '2015-04-11 21:32:29', 1),
(11, 'DRAGON01', 'Dragonball : Xenoverse', 'As ferozes batalhas de Goku irão renascer!\r\nPela primeira vez na história, o universo Dragon Ball será apresentado nos sistemas da nova geração e será plenamente beneficiada dos consoles mais poderosos já criados. Dragon Ball Xenoverse trará todas as batalhas frenéticas entre Goku e seus inimigos mais ferozes, como Vegeta, Freeza, Cell e muito mais, e com um novo desing do gameplay! Os jogadores irão revisitar as famosas lutas da série com seu personagem customizado, que estará conectado com Trunks e muitos outros personagens. \r\nCom a ajuda de Trunks, viaje através do tempo e intervenha no passado para restaurar a história de Dragon Ball. Dragon Ball Xenoverse tomará de assalto o amado universo do criador da série Akira Toriyama, e quebrará toda a tradição com uma nova configuração de mundo, a misteriosa cidade de Toki Toki e outras características surpreendentes que serão anunciadas no futuro!', '190.00', 400, 430, 400, 380, '2015-04-11 21:36:21', 1),
(12, 'MK002', 'Mortal Kombat X', 'Mortal Kombat X é o próximo capítulo da esperada, lendária e aclamada franquia de jogos de luta da NetherRealm Studios, marcando a estreia da icônica série na nova geração. O jogo combina apresentação cinematográfica com jogabilidade inédita, oferecendo a mais brutal experiência de combate de todos os tempos, trazendo uma nova experiência completamente conectada que arremessa jogadores em uma competição online persistente, na qual toda luta conta na batalha global pela supremacia.', '149.99', 150, 400, 300, 200, '2015-04-11 21:40:10', 1),
(13, 'STREET003', 'Street Fighter® V', 'A lendária franquia de luta está de volta com Street Fighter V! Usando tecnologia Unreal Engine 4, um visual deslumbrante retrata a próxima geração de Guerreiros Mundiais com detalhes sem precedentes, enquanto mecânicas de batalha empolgantes e acessíveis oferecem diversão sem fim para principiantes e veteranos. Desafie amigos online ou dispute por fama e glória na Capcom Pro Tour. Pela primeira vez na história de Street Fighter, todo o conteúdo pós-lançamento relacionado ao jogo em Street Fighter V pode ser obtido sem qualquer custo ao jogar. Todos os ajustes de equilíbrio e sistema estarão disponíveis gratuitamente para que os jogadores sempre tenham acesso à versão mais atual. Personagens adicionais serão acrescentados continuamente, tornando esta a primeira versão da franquia onde jogadores dedicados podem continuar expandindo sua experiência de jogo sem a necessidade de comprar outros títulos da série. Street Fighter V será lançado exclusivamente para PlayStation 4 e PC. Por meio de uma parceria estratégica entre a Sony Computer Entertainment Inc. e a Capcom, a próxima geração da experiência Street Fighter permite jogar entre plataformas para unir os fãs em uma base de jogadores centralizada pela primeira vez. O caminho para a grandeza começa aqui: ERGA-SE!', '224.00', 240, 400, 240, 360, '2015-04-11 21:43:33', 1),
(14, 'PES001', 'Pro Evolution Soccer', 'Desde seu começo no PSOne, a série PES saltou de um formato a outro, ganhando cada vez mais realismo conforme evoluía. Esse histórico é celebrado com o novo slogan do PES 2016, ''Ame o passado, jogue o futuro'', que destaca o retorno da série aos seus valores principais com o PES 2015 do ano passado, concentrando-se nos vários elementos novos de jogabilidade e apresentação que vão firmar a posição da série como a experiência definitiva de futebol. \r\nO PES 2016 almeja manter seu título de ''melhor jogo esportivo'', dado por conferências de jogos e veículos de imprensa em 2014, se mantendo na vanguarda da recriação do ''esporte mais bonito''. \r\nA série quer voltar às origens para criar partidas empolgantes entre os usuários e orgulhosamente apresenta o PES 2016 para oferecer jogos de qualidade, seguindo o mantra ''o campo é nosso''. Entre a integração maior com a Fox Engine, mecânica de jogo líder de mercado, para dar vida à ação no campo, o compromisso total de desenvolver o produto em torno da criação da melhor experiência de jogo e o redesenvolvimento total da Master League, cada faceta do jogo foi melhorada para gerar mais um produto incrível.', '170.00', 180, 350, 180, 980, '2015-04-11 21:49:39', 1),
(15, 'FIFA001', 'FIFA 16', 'O FIFA 16 inova em todo o campo para oferecer uma experiência de futebol equilibrada, autêntica e empolgante que possibilita a você jogar do seu jeito e competir em um nível maior. Você vai ter confiança na defesa, vai assumir o controle no meio de campo e criar mais momentos mágicos do que nunca. FIFA 16. \n\nOscar junta-se a Lionel Messi na capa exclusiva para o Brasil do mais autêntico videogame de futebol, licenciado oficialmente pela FIFA e que chega às lojas na versão 16, totalmente em português novamente com narração de Tiago Leifert e comentários de Caio Ribeiro. Crie mais momentos impressionantes. No FIFA 16, os jogadores terão aquela vantagem da qual todo time precisa para criar momentos mágicos e abrir a defesa adversária. ', '199.99', 180, 350, 180, 990, '2015-04-11 21:57:55', 1),
(16, 'NBAK001', 'NBA 2K16', 'A franquia NBA 2K está de volta com a experiência NBA mais realista já vista, agora em NBA 2K16. Leve o seu MyPLAYER através de toda a jornada da NBA, comande uma franquia NBA completa ou melhore suas habilidades jogando online contra fãs de todo o mundo. Com animações que mostram movimentos mais fluídos e articulações mais realistas, esta será a experiência NBA mais autêntica já vista.', '219.00', 300, 450, 250, 1540, '2015-04-11 22:00:39', 1),
(17, 'KILL001', 'Killzone - Shadow Fall', 'O jogo se passa em um futuro próximo, 30 anos após os eventos de Killzone 3.\r\nO mundo é um lugar completamente diferente; duas facções rivais conhecidas como Helghast e Vektan vivem lado a lado em uma cidade futurista, divididas por um gigantesco muro. \r\nPara responder a ataques audaciosos, realizar infiltrações silenciosas ou partir para o combate direto, você terá que se adaptar e pensar rápido enquanto encara uma grande variedade de eventos que podem destruir a sua terra natal.', '278.00', 320, 400, 320, 850, '2015-04-12 10:14:16', 1),
(18, 'SWARSF001', 'Star Wars - Battlefront', 'Sinta o impacto ameaçador de um AT-AT marchando na tundra congelada de Hoth. Forças rebeldes disparando blasters enquanto speeder bikes Imperiais zunem pelas exuberantes florestas de Endor. Intensos combates aéreos entre esquadrões de X-wings e caças TIE tomando os céus. Mergulhe nas batalhas épicas de Star Wars¿ que você sempre sonhou e crie novos momentos heroicos em Star Wars¿ Battlefront. Lute pela Aliança Rebelde ou pelo Império em uma variedade de modos multijogador para até 40 jogadores, ou em emocionantes desafios inspirados pelos filmes, disponíveis para um jogador, tela dividida ou em partidas cooperativas online. Star Wars Battlefront soma a esta ação épica uma escala intergaláctica, com recriações visualmente perfeitas de alguns dos mais icônicos planetas, armas, personagens e veículos do universo Star Wars. Os efeitos sonoros originais extraídos dos filmes, dão aos fãs a experiência interativa definitiva, envolvente e autêntica que eles estavam esperando.\n', '199.00', 320, 290, 320, 700, '2015-04-12 10:20:20', 1),
(19, 'BOSS001', 'Metal Gear Solid V - The Phantom Pain', 'A Konami Digital Entertainment continua a Experiência do Metal Gear Solid V com o capítulo mais recente, Metal Gear Solid V: The Phantom Pain. Dando início a uma nova era para a série com a tecnologia de ponta possibilitada pela Fox Engine, Metal Gear Solid V: The Phantom Pain oferecerá aos jogadores uma experiência de primeira qualidade com a liberdade tática de executar missões em um mundo aberto. \n\nNove anos depois dos eventos de MGSV: Ground Zeroes e da destruição da Base Mãe, Snake, vulgo Big Boss, acorda de um coma de nove anos. O jogo retoma a história no ano de 1984, ainda com a Guerra fria como pano de fundo, que continua a moldar uma crise mundial. A jornada de Snake o leva a um mundo onde ele é impulsionado pela necessidade de vingança e a busca pelo grupo sombrio, XOF. \n\nA equipe de desenvolvimento de Metal Gear Solid continua sua ambição de explorar temas adultos como a psicologia da guerra e as atrocidades causadas por aqueles que se envolvem em seu círculo vicioso. Um dos jogos mais antecipados do ano, com mundo aberto, fidelidade visual de fotorrealismo e design de jogo repleto de recursos, Metal Gear Solid V: The Phantom Pain deixará sua marca como um dos grandes marcos da indústria dos videogames por seu enredo cinematográfico, temas pesados e jogabilidade tática envolvente. ', '200.00', 340, 290, 340, 1450, '2015-04-12 10:25:32', 1),
(20, 'BF4001', 'Battlefield 4', 'Battlefield 4 é o enorme sucesso dos jogos de ação que definiu um gênero, feito dos momentos que se equilibram entre o jogo e a glória. Momentos esses só encontrados em Battlefield. Com a ajuda da potência e fidelidade da próxima geração do Frostbite 3, o Battlefield 4 proporciona uma experiência dramática e visceral como nenhuma outra. Apenas em Battlefield você irá explodir as fundações de uma represa ou reduzir um arranha-céu a escombros. Apenas em Battlefield você vai liderar um ataque naval na traseira de uma lancha de combate. Battlefield dá a você a liberdade de fazer e ser muito mais enquanto joga com o máximo de intensidade e trilha o seu próprio caminho para a vitória. Além do seu multiplayer inconfundível, Battlefield 4 apresenta uma campanha intensa e dramática focada nos personagens, que tem início com a evacuação de cidadãos norte-americanos importantes de Xangai e acompanha a luta de sua equipe para voltar para casa. Não há comparações. Mergulhe no caos glorioso de uma guerra declarada, só encontrada em Battlefield. ', '138.00', 340, 290, 340, 1200, '2015-04-12 10:37:34', 1),
(21, 'GOD001', 'God of War 3 - Remaster', 'No fim, restará somente o caos! Originalmente desenvolvido pelo Santa Monica Studio da Sony Computer Entertainment, exclusivamente para o sistema PLAYSTATION®3, God of War® III foi remasterizado para o sistema PLAYSTATION®4, com compatibilidade de 1080p em 60fps para suas partidas. God of War III Remasterizado dá vida a batalhas épicas com gráficos impressionantes e uma trama elaborada que coloca Kratos no centro do massacre e da destruição, em sua busca pela vingança contra os Deuses que o traíram.\nAmbientado no domínio da brutal mitologia grega, God of War III Remasterizado é um jogo single player aclamado pela crítica que permite ao jogador assumir o papel do destemido ex-guerreiro espartano Kratos, em sua ascensão das profundezas obscuras de Hades para escalar as altitudes do Monte Olimpo e buscar sua vingança sangrenta contra aqueles que o traíram. Munido de duas espadas com correntes e um conjunto de novas armas e mágicas, Kratos deverá enfrentar as criaturas mais mortais da mitologia e resolver enigmas complexos em sua busca implacável para destruir o Olimpo.', '99.00', 120, 400, 400, 1050, '2015-04-12 10:43:30', 1),
(22, 'WITCHER001', 'The Witcher 3 - Wild hunt', 'No jogo The Witcher 3, um mal antigo acorda. Um mal que semeia o terror, seu nome é dito apenas em sussurros: Wild Hunt.\r\nUm conjunto de cavaleiros espectrais místicos com grande poder de destruição, sua caça tem um único alvo: humanos.\r\n\r\nA espada do destino tem dois gumes. Você é um deles! \r\nImperdível, The Witcher 3: Wild Hunt é o capítulo final da aclamada e moderna saga de RPG. A equipe da CD Projekt RED pretende fazer de The Witcher 3: Wild Hunt um jogo rico, maior e mais profundo - um avanço na qualidade que irá elevar a franquia a outro patamar. Mapa gigantesco, sistema de combate aprimorado, escolhas que mudam o rumo da história! \r\n\r\nO mundo está um caos. O ar é espesso e carregado de tensão e fumaça dos vilarejos queimados. O temível Império de Nilfgaard atacou novamente, devastando os desafortunados do Reino do Norte. O outrora poderoso que tentou usar Geralt para seu próprio benefício agora esta desaparecido. Nesses tempos incertos, ninguém pode dizer o que guarda o futuro, quem trará paz ao mundo e quem irá causar apenas miséria. \r\n\r\nMas uma força das trevas mortal emerge. Os pequenos homens e mulheres comandando exércitos despreparados não entendem que seus conflitos são jogo de criança comparado à Wild Hunt, a ameaça do outro mundo que agora se aproxima. Esses cavaleiros espectrais amaldiçoam o mundo há anos, afundando-o em miséria e desespero, mas nesse momento, Wild Hunt procura uma pessoa em particular, aquela unida a Geralt pelo destino, a única alma que Geralt considera familiar.', '190.00', 200, 400, 200, 1050, '2015-04-12 10:59:51', 1),
(23, 'BLOOD001', 'Bloodborne', 'Enfrente Seus Pesadelos.\r\nApresentando Bloodborne, o último RPG de ação da renomada desenvolvedora FromSoftware, exclusivo para o sistema PlayStation 4. Enfrente seus pesadelos enquanto você busca respostas na antiga cidade de Yharnam, agora amaldiçoada com uma estranha e endêmica doença que se espalha pelas ruas como incêndio. Perigo, morte e loucura espreitam a cada esquina neste sombrio e horrível mundo, e você precisa descobrir seus segredos mais terríveis para sobreviver.\r\nAção de Combate Estratégico: armado com um arsenal único, incluindo armas de fogo e machados, você precisará de inteligência, estratégia e reflexos para derrubar os inteligentes inimigos que guardam os segredos sombrios da cidade. Os jogadores terão de aprender a sobreviver através do aprimoramento de habilidades e estratégia de ataque. Evolua com novas armas e desenvolva seu próprio estilo de combate.', '149.99', 120, 400, 400, 1034, '2015-04-12 11:08:52', 1),
(24, 'SHADOW001', 'Shadow of Mordor', 'Vencedor de mais de 40 prêmios "Melhores de 2014", incluindo jogo do ano, melhor jogo de ação e jogo mais inovador desta geração. Experimente o inovador Sistema Nemesis enquanto você luta em Mordor e enfrenta o mal de Sauron nesta nova crônica da Terra-Média.', '170.00', 120, 350, 400, 1056, '2015-04-12 11:10:52', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_categorias`
--

CREATE TABLE `produtos_categorias` (
  `produto` int(10) UNSIGNED NOT NULL,
  `categoria` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos_categorias`
--

INSERT INTO `produtos_categorias` (`produto`, `categoria`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 3),
(12, 3),
(13, 3),
(14, 4),
(15, 4),
(16, 4),
(17, 5),
(18, 5),
(19, 5),
(20, 5),
(21, 6),
(22, 6),
(23, 6),
(24, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_transporte_preco`
--

CREATE TABLE `tb_transporte_preco` (
  `id` int(10) UNSIGNED NOT NULL,
  `peso_de` decimal(6,2) NOT NULL,
  `peso_ate` decimal(6,2) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `adicional_kg` decimal(10,2) NOT NULL,
  `uf` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_transporte_preco`
--

INSERT INTO `tb_transporte_preco` (`id`, `peso_de`, `peso_ate`, `preco`, `adicional_kg`, `uf`) VALUES
(1, '0.00', '10.00', '36.76', '0.71', 'MG'),
(2, '10.00', '20.00', '53.91', '0.71', 'MG'),
(3, '20.00', '30.00', '62.48', '0.71', 'MG'),
(4, '30.00', '50.00', '70.44', '0.71', 'MG'),
(5, '50.00', '75.00', '90.07', '0.71', 'MG'),
(6, '75.00', '100.00', '122.51', '0.71', 'MG'),
(7, '0.00', '10.00', '44.27', '0.71', 'DF'),
(8, '10.00', '20.00', '64.95', '0.71', 'DF'),
(10, '30.00', '50.00', '84.89', '0.71', 'DF'),
(11, '50.00', '75.00', '108.48', '0.71', 'DF'),
(12, '75.00', '100.00', '147.60', '0.71', 'DF'),
(19, '0.00', '10.00', '36.76', '0.71', 'SC'),
(20, '10.00', '20.00', '36.76', '0.71', 'SC'),
(21, '20.00', '30.00', '36.76', '0.71', 'SC'),
(22, '30.00', '50.00', '36.76', '0.71', 'SC'),
(23, '50.00', '75.00', '36.76', '0.71', 'SC'),
(24, '75.00', '100.00', '36.76', '0.71', 'SC'),
(25, '0.00', '10.00', '62.52', '0.71', 'GO'),
(26, '10.00', '20.00', '83.88', '0.71', 'GO'),
(27, '20.00', '30.00', '97.21', '0.71', 'GO'),
(28, '30.00', '50.00', '109.60', '0.71', 'GO'),
(29, '50.00', '75.00', '140.12', '0.71', 'GO'),
(30, '75.00', '100.00', '190.60', '0.71', 'GO'),
(31, '0.00', '10.00', '27.37', '0.71', 'RS'),
(32, '10.00', '20.00', '40.18', '0.71', 'RS'),
(33, '20.00', '30.00', '46.56', '0.71', 'RS'),
(34, '30.00', '50.00', '52.48', '0.71', 'RS'),
(35, '50.00', '75.00', '67.10', '0.71', 'RS'),
(36, '75.00', '100.00', '91.29', '0.71', 'RS'),
(37, '0.00', '10.00', '40.80', '0.71', 'RJ'),
(38, '10.00', '20.00', '59.86', '0.71', 'RJ'),
(39, '20.00', '30.00', '69.39', '0.71', 'RJ'),
(40, '30.00', '50.00', '78.22', '0.71', 'RJ'),
(41, '50.00', '75.00', '99.98', '0.71', 'RJ'),
(42, '75.00', '100.00', '136.02', '0.71', 'RJ'),
(43, '0.00', '10.00', '27.37', '0.71', 'SP'),
(44, '10.00', '20.00', '27.37', '0.71', 'SP'),
(45, '20.00', '30.00', '27.37', '0.71', 'SP'),
(46, '30.00', '50.00', '27.37', '0.71', 'SP'),
(47, '50.00', '75.00', '27.37', '0.71', 'SP'),
(48, '75.00', '100.00', '27.37', '0.71', 'SP'),
(49, '0.00', '10.00', '63.17', '0.71', 'ES'),
(50, '10.00', '20.00', '92.62', '0.71', 'ES'),
(51, '20.00', '30.00', '107.36', '0.71', 'ES'),
(52, '30.00', '50.00', '121.05', '0.71', 'ES'),
(53, '50.00', '75.00', '154.75', '0.71', 'ES'),
(54, '75.00', '100.00', '179.90', '0.71', 'ES'),
(55, '789.00', '9000.00', '179.90', '0.71', 'AC'),
(56, '0.00', '10.00', '179.90', '0.71', 'PE'),
(57, '0.00', '10.00', '179.90', '0.71', 'PB'),
(58, '20.00', '30.00', '179.90', '0.71', 'MS'),
(59, '50.00', '75.00', '179.90', '0.71', 'MS'),
(60, '30.00', '50.00', '179.90', '0.71', 'AL'),
(61, '50.00', '75.00', '179.90', '0.71', 'AL'),
(62, '30.00', '50.00', '179.90', '0.71', 'AM'),
(63, '50.00', '75.00', '179.90', '0.71', 'AM'),
(64, '75.00', '100.00', '179.90', '0.71', 'AC'),
(65, '30.00', '50.00', '179.90', '0.71', 'DF'),
(66, '50.00', '75.00', '179.90', '0.71', 'DF'),
(67, '75.00', '150.00', '179.90', '0.71', 'DF'),
(68, '30.00', '50.00', '179.90', '0.71', 'BA'),
(69, '50.00', '75.00', '179.90', '0.71', 'BA'),
(70, '75.00', '150.00', '179.90', '0.71', 'BA'),
(71, '30.00', '50.00', '179.90', '0.71', 'ES'),
(72, '50.00', '75.00', '179.90', '0.71', 'ES'),
(73, '75.00', '120.00', '179.90', '0.71', 'ES'),
(74, '30.00', '55.00', '179.90', '0.71', 'GO'),
(75, '75.00', '120.00', '179.90', '0.71', 'GO'),
(76, '30.00', '55.00', '179.90', '0.71', 'MA'),
(77, '50.00', '120.00', '179.90', '0.71', 'AC'),
(78, '30.00', '50.00', '179.90', '0.71', 'MS'),
(79, '1.00', '50.00', '179.90', '0.71', 'MS'),
(80, '1.00', '50.00', '179.90', '0.71', 'MT'),
(81, '0.00', '30.00', '101.00', '0.71', 'DF'),
(82, '30.00', '50.00', '150.00', '0.71', 'DF'),
(83, '50.00', '75.00', '166.00', '0.71', 'DF'),
(84, '1.00', '50.00', '179.90', '0.71', 'PE'),
(87, '50.00', '100.00', '179.90', '0.71', 'PE'),
(90, '22.00', '66.00', '179.90', '0.71', 'AC'),
(91, '0.00', '30.00', '199.00', '0.71', 'PB'),
(92, '0.00', '35.00', '179.90', '0.71', 'PR'),
(93, '35.00', '55.00', '179.90', '0.71', 'PR'),
(94, '55.00', '100.00', '179.90', '0.71', 'PR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`) VALUES
(1, 'admin', '12345'),
(2, 'rudis', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `classes_metodos`
--
ALTER TABLE `classes_metodos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CPF_Unico` (`cpf`),
  ADD UNIQUE KEY `Email_Unico` (`email`);

--
-- Indexes for table `itens_pedidos`
--
ALTER TABLE `itens_pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissoes`
--
ALTER TABLE `permissoes`
  ADD UNIQUE KEY `Chave_unica` (`usuario`,`metodo`),
  ADD KEY `FK_metodo` (`metodo`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_unico` (`codigo`);

--
-- Indexes for table `produtos_categorias`
--
ALTER TABLE `produtos_categorias`
  ADD UNIQUE KEY `unique_produto_categoria` (`produto`,`categoria`),
  ADD KEY `FK_produtos_categorias_categoria` (`categoria`);

--
-- Indexes for table `tb_transporte_preco`
--
ALTER TABLE `tb_transporte_preco`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `classes_metodos`
--
ALTER TABLE `classes_metodos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `itens_pedidos`
--
ALTER TABLE `itens_pedidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tb_transporte_preco`
--
ALTER TABLE `tb_transporte_preco`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `permissoes`
--
ALTER TABLE `permissoes`
  ADD CONSTRAINT `FK_metodo` FOREIGN KEY (`metodo`) REFERENCES `classes_metodos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `produtos_categorias`
--
ALTER TABLE `produtos_categorias`
  ADD CONSTRAINT `FK_produtos_categorias_categoria` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_produtos_categorias_produto` FOREIGN KEY (`produto`) REFERENCES `produtos` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
