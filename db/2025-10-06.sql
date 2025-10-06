-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.11.14-MariaDB-0+deb12u2 - Debian 12
-- OS do Servidor:               debian-linux-gnu
-- HeidiSQL Versão:              12.11.0.7065
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para db_hist
CREATE DATABASE IF NOT EXISTS `db_hist` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `db_hist`;

-- Copiando estrutura para tabela db_hist.artifacts
CREATE TABLE IF NOT EXISTS `artifacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` date DEFAULT NULL,
  `registry_date` date DEFAULT NULL,
  `collected_date` date DEFAULT NULL,
  `type` enum('VÍDEO','ÁUDIO','TEXTO','IMAGEM','FOTOGRAFIA') DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `collected_by` int(10) DEFAULT NULL,
  `registered_by` varchar(50) DEFAULT NULL,
  `artifact_path` varchar(250) DEFAULT NULL,
  `artifact_name` varchar(50) DEFAULT NULL,
  `mission_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_hist.artifacts: ~8 rows (aproximadamente)
INSERT INTO `artifacts` (`id`, `created_at`, `registry_date`, `collected_date`, `type`, `desc`, `collected_by`, `registered_by`, `artifact_path`, `artifact_name`, `mission_id`) VALUES
	(14, NULL, '2025-09-10', '2025-09-10', 'FOTOGRAFIA', 'qaretrar', 1, 'José Benemérito', 'uploads/CONCORDÂNCIA_VERBAL_-_TUDO_SALA_DE_AULA_pa', 'fotografia_de_igreja', NULL),
	(15, NULL, '2025-09-10', '2025-09-10', 'FOTOGRAFIA', 'qaretrar', 1, 'José Benemérito', 'uploads/CONCORDÂNCIA_VERBAL_-_TUDO_SALA_DE_AULA_pa', 'fotografia_de_igreja', NULL),
	(16, NULL, '2025-09-10', '2025-09-10', 'FOTOGRAFIA', 'qaretrar', 1, 'José Benemérito', 'uploads/CONCORDÂNCIA_VERBAL_-_TUDO_SALA_DE_AULA_pa', 'fotografia_de_igreja', NULL),
	(17, NULL, '2025-09-10', '2025-09-09', 'VÍDEO', 'qaSRETQW', 1, 'Sr. Joselino', 'uploads/CONCORDÂNCIA_VERBAL_-_TUDO_SALA_DE_AULA_pa', 'fotografia_de_igreja', NULL),
	(18, NULL, '2025-09-10', '2025-09-09', 'VÍDEO', 'qaSRETQW', 1, 'Sr. Joselino', 'uploads/CONCORDÂNCIA_VERBAL_-_TUDO_SALA_DE_AULA_pa', 'fotografia_de_igreja', NULL),
	(19, NULL, '2025-09-10', '2025-09-09', 'VÍDEO', 'qaSRETQW', 1, 'Sr. Joselino', 'uploads/CONCORDÂNCIA_VERBAL_-_TUDO_SALA_DE_AULA_pa', 'fotografia_de_igreja', NULL),
	(20, NULL, '2025-09-10', '2025-09-09', 'VÍDEO', 'qaSRETQW', 1, 'Sr. Joselino', 'uploads/CONCORDÂNCIA_VERBAL_-_TUDO_SALA_DE_AULA_pa', 'fotografia_de_igreja', NULL),
	(21, NULL, '2025-09-11', '2025-09-10', 'FOTOGRAFIA', 'sdtfqwetsq', 1, 'José Benemérito', 'uploads/CONCORDÂNCIA_VERBAL_-_TUDO_SALA_DE_AULA.pdf', 'fotografia_de_igreja', NULL);

-- Copiando estrutura para tabela db_hist.emblems
CREATE TABLE IF NOT EXISTS `emblems` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_hist.emblems: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_hist.missions
CREATE TABLE IF NOT EXISTS `missions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` enum('MISSÃO 1: DESVENDANDO O PASSADO','MISSÃO 2: CAÇADORES DE MEMÓRIA','MISSÃO 3: GUARDIÕES DO CONHECIMENTO','MISSÃO 4: O CAÇADOR DE DETALHES','MISSÃO 5: VOZES DA ESCOLA E DO BAIRRO','MISSÃO 6: A RECEITA DE FAMÍLIA') NOT NULL,
  `desc` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `begin_at` date DEFAULT NULL,
  `final_preview` date DEFAULT NULL,
  `final_real` timestamp NULL DEFAULT NULL,
  `status` enum('NÃO ATRIBUÍDA','ATRIBUÍDA','INICIADA','FINALIZADA','PAUSADA') DEFAULT 'NÃO ATRIBUÍDA',
  `project_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_hist.missions: ~12 rows (aproximadamente)
INSERT INTO `missions` (`id`, `name`, `desc`, `created_at`, `begin_at`, `final_preview`, `final_real`, `status`, `project_id`) VALUES
	(56, 'MISSÃO 1: DESVENDANDO O PASSADO', 'MISSÃO 1: "Desvendando o Passado"\nOlá, Exploradores do Tempo!\nSua primeira missão na nossa grande aventura pelo patrimônio cultural é se tornar um verdadeiro desbravador do conhecimento! Vocês serão os primeiros a desvendar os segredos da nossa cidade.\nO Objetivo: Realizar um levantamento da História oficial do nosso município.\nAs Equipes: A turma será dividida em duas equipes, prontas para a competição! Lembrem-se: o trabalho em equipe é fundamental para o sucesso.\nAs Fases da Missão:\n    1. A Pista Principal: O primeiro lugar para começar a investigação é o site oficial do nosso município. Procurem por seções como "História", "Sobre a Cidade" ou "Nossa História".\n    2. O Livro de Registros: Em seguida, vocês devem pesquisar no site do IBGE. Lá, encontrarão informações oficiais sobre a fundação, população e outros fatos importantes.\nO Desafio Bônus:\nDurante todas as etapas da sua pesquisa, o mais importante é documentar a jornada! Cada foto que você tirar do momento em que estiver pesquisando — seja no computador, no celular ou no tablet — vale 1 ponto!\nA pontuação é individual, então capriche no registro de cada descoberta. Ao final da missão, a equipe com a maior pontuação ganhará o título de "Guardiões da História do Bairro".\nPreparados para essa aventura? O relógio está correndo!', '2025-09-25 01:54:55', NULL, NULL, NULL, 'NÃO ATRIBUÍDA', 22),
	(57, 'MISSÃO 2: CAÇADORES DE MEMÓRIA', 'MISSÃO 2: "Caçadores de Memória"\nParabéns, desbravadores, por concluírem a primeira missão! Agora que vocês já conhecem os fatos e datas oficiais da nossa cidade, é hora de ir em busca das verdadeiras histórias, aquelas que moram nas lembranças das pessoas!\nO Objetivo: Coletar imagens, fotos, documentos e depoimentos que revelam a memória do nosso bairro, vista pelos olhos de quem viveu (e vive) aqui.\nAs Pistas: A memória local está por toda parte, basta saber procurar. Para esta missão, o foco será nos primeiros tempos do bairro. Pensem em:\n    • Pioneiros e suas histórias de vida.\n    • Fotos da primeira igreja, da construção mais antiga ou do primeiro comércio.\n    • Documentos que mostram como o bairro era antigamente.\n    • Depoimentos de quem viu o bairro crescer.\nO Desafio: O que vale é a descoberta! Cada foto, documento ou depoimento que você conseguir coletar vale 1 ponto. Lembre-se, o objetivo não é apenas encontrar, mas também registrar a história por trás de cada item.\nRegras Especiais: Qualquer tipo de evidência de memória é válida e será bem-vinda na nossa exposição. Quanto mais você trouxer, mais pontos individuais você acumula para a sua equipe.\nVamos lá! O passado está esperando para ser contado através de vocês!', '2025-09-25 01:54:55', NULL, NULL, NULL, 'NÃO ATRIBUÍDA', 22),
	(58, 'MISSÃO 3: GUARDIÕES DO CONHECIMENTO', 'MISSÃO 3: "Guardiões do Conhecimento"\nExploradores, a jornada continua! Agora que vocês já desvendaram a história oficial e as memórias do bairro, é hora de organizar esse conhecimento e se tornar especialistas.\nO Objetivo: Construir nossa própria enciclopédia do patrimônio, uma Wiki, para registrar tudo o que estamos aprendendo.\nAs Equipes: A turma será dividida em três equipes. Cada equipe será responsável por se aprofundar em um conceito fundamental do nosso projeto. Os grupos de pesquisa são:\n    1. Grupo A: "O que é Patrimônio?"\n    2. Grupo B: "O que é Patrimônio Histórico?"\n    3. Grupo C: "O que são Patrimônio Cultural Material e Patrimônio Cultural Imaterial?"\nO Desafio: Seu desafio é pesquisar e inserir os resultados do seu levantamento na nossa Wiki. Cada conceito que vocês explicarem, com suas próprias palavras e exemplos, vai ajudar toda a turma a entender melhor o tema.\nLembrem-se de que a colaboração e a organização são essenciais. O grupo que trouxer a explicação mais clara e completa será o "Guardião do Conhecimento" da nossa missão.\nVamos lá! É hora de construir o nosso próprio acervo de sabedoria.', '2025-09-25 01:54:55', NULL, NULL, NULL, 'NÃO ATRIBUÍDA', 22),
	(59, 'MISSÃO 4: O CAÇADOR DE DETALHES', 'MISSÃO 4: "O Caçador de Detalhes"\nEquipe de Expedição, atenção! Vocês já são especialistas em história e em memória. Agora é hora de treinar o olhar e se tornar verdadeiros detetives visuais do nosso bairro.\nO Objetivo: Fotografar os pequenos detalhes que contam as grandes histórias da nossa arquitetura.\nO Desafio: Percorram o bairro em busca de elementos que se destacam, como:\n    • Casas antigas de madeira e de alvenaria.\n    • Janelas e portas com desenhos ou cores diferentes.\n    • Detalhes na fachada de igrejas.\n    • Placas, postes ou qualquer objeto que pareça contar uma história.\nO importante é capturar a essência do lugar através desses detalhes. Cada foto tirada com atenção e criatividade vale 1 ponto. A equipe que encontrar os detalhes mais impressionantes e únicos será a vencedora desta missão!\nProntos para essa jornada? O bairro está esperando para ter seus segredos revelados pelo olhar de vocês.', '2025-09-25 01:54:55', NULL, NULL, NULL, 'NÃO ATRIBUÍDA', 22),
	(60, 'MISSÃO 5: VOZES DA ESCOLA E DO BAIRRO', 'MISSÃO 5: "Vozes da Escola e do Bairro"\nExploradores, é hora de ouvir o passado! Vocês já registraram a história oficial, os detalhes arquitetônicos e as memórias da família. Agora, o próximo desafio é encontrar uma "fonte viva" de histórias!\nO Objetivo: Encontrar um morador antigo do bairro - alguém que já estudou ou que ainda mora na região - e registrar um depoimento em áudio ou vídeo.\nO Desafio:\n    1. Encontre a Fonte: Peça a ajuda da sua família ou procure por pessoas mais velhas no seu bairro.\n    2. Faça as Perguntas Certas: Pergunte sobre como era a escola, as brincadeiras, os comércios antigos ou as festas do bairro.\n    3. Grave o Depoimento: Use seu celular ou um gravador para registrar a entrevista em áudio ou vídeo. O depoimento pode ser curto, mas deve ser rico em detalhes e lembranças.\nPontuação: Cada depoimento bem-sucedido vale 5 pontos para a sua pontuação individual! Lembre-se de ser educado e agradecer a pessoa por compartilhar suas memórias.\nEssa missão vai nos ajudar a construir a história do bairro com as vozes de quem realmente a viveu. Boa sorte!', '2025-09-25 01:54:55', NULL, NULL, NULL, 'NÃO ATRIBUÍDA', 22),
	(61, 'MISSÃO 6: A RECEITA DE FAMÍLIA', 'MISSÃO 6: "A Receita de Família"\nChefs e Cozinheiros do Conhecimento, hora de colocar a mão na massa! Vocês já registraram a história do bairro, mas agora é a vez de saborear o que faz parte da memória da nossa comunidade.\nO Objetivo: Registrar em foto ou vídeo uma receita tradicional da sua família. Não precisa ser algo que passa por várias gerações, basta ser um prato que vocês fazem e que tem um significado especial.\nO Desafio:\n    1. Escolha a Receita: Pense em um prato que a sua família adora preparar. Pode ser um bolo de aniversário, um almoço de domingo ou até mesmo um lanche rápido que todo mundo gosta.\n    2. Documente: Tire fotos dos ingredientes, do passo a passo ou do prato finalizado. Se quiser, grave um vídeo mostrando a receita sendo feita!\n    3. Conte a História: Junto com o registro, conte o porquê dessa receita ser especial. Ela te lembra de quem? De qual momento?\nPontuação: Cada foto ou vídeo enviado vale 5 pontos para a sua pontuação individual. Essa missão vai nos mostrar que o patrimônio cultural também pode ser saboreado!\nProntos para essa missão deliciosa?', '2025-09-25 01:54:55', NULL, NULL, NULL, 'NÃO ATRIBUÍDA', 22),
	(62, 'MISSÃO 1: DESVENDANDO O PASSADO', 'MISSÃO 1: "Desvendando o Passado"\nOlá, Exploradores do Tempo!\nSua primeira missão na nossa grande aventura pelo patrimônio cultural é se tornar um verdadeiro desbravador do conhecimento! Vocês serão os primeiros a desvendar os segredos da nossa cidade.\nO Objetivo: Realizar um levantamento da História oficial do nosso município.\nAs Equipes: A turma será dividida em duas equipes, prontas para a competição! Lembrem-se: o trabalho em equipe é fundamental para o sucesso.\nAs Fases da Missão:\n    1. A Pista Principal: O primeiro lugar para começar a investigação é o site oficial do nosso município. Procurem por seções como "História", "Sobre a Cidade" ou "Nossa História".\n    2. O Livro de Registros: Em seguida, vocês devem pesquisar no site do IBGE. Lá, encontrarão informações oficiais sobre a fundação, população e outros fatos importantes.\nO Desafio Bônus:\nDurante todas as etapas da sua pesquisa, o mais importante é documentar a jornada! Cada foto que você tirar do momento em que estiver pesquisando — seja no computador, no celular ou no tablet — vale 1 ponto!\nA pontuação é individual, então capriche no registro de cada descoberta. Ao final da missão, a equipe com a maior pontuação ganhará o título de "Guardiões da História do Bairro".\nPreparados para essa aventura? O relógio está correndo!', '2025-09-30 21:58:56', NULL, NULL, NULL, 'NÃO ATRIBUÍDA', 23),
	(63, 'MISSÃO 2: CAÇADORES DE MEMÓRIA', 'MISSÃO 2: "Caçadores de Memória"\nParabéns, desbravadores, por concluírem a primeira missão! Agora que vocês já conhecem os fatos e datas oficiais da nossa cidade, é hora de ir em busca das verdadeiras histórias, aquelas que moram nas lembranças das pessoas!\nO Objetivo: Coletar imagens, fotos, documentos e depoimentos que revelam a memória do nosso bairro, vista pelos olhos de quem viveu (e vive) aqui.\nAs Pistas: A memória local está por toda parte, basta saber procurar. Para esta missão, o foco será nos primeiros tempos do bairro. Pensem em:\n    • Pioneiros e suas histórias de vida.\n    • Fotos da primeira igreja, da construção mais antiga ou do primeiro comércio.\n    • Documentos que mostram como o bairro era antigamente.\n    • Depoimentos de quem viu o bairro crescer.\nO Desafio: O que vale é a descoberta! Cada foto, documento ou depoimento que você conseguir coletar vale 1 ponto. Lembre-se, o objetivo não é apenas encontrar, mas também registrar a história por trás de cada item.\nRegras Especiais: Qualquer tipo de evidência de memória é válida e será bem-vinda na nossa exposição. Quanto mais você trouxer, mais pontos individuais você acumula para a sua equipe.\nVamos lá! O passado está esperando para ser contado através de vocês!', '2025-09-30 21:58:56', NULL, NULL, NULL, 'NÃO ATRIBUÍDA', 23),
	(64, 'MISSÃO 3: GUARDIÕES DO CONHECIMENTO', 'MISSÃO 3: "Guardiões do Conhecimento"\nExploradores, a jornada continua! Agora que vocês já desvendaram a história oficial e as memórias do bairro, é hora de organizar esse conhecimento e se tornar especialistas.\nO Objetivo: Construir nossa própria enciclopédia do patrimônio, uma Wiki, para registrar tudo o que estamos aprendendo.\nAs Equipes: A turma será dividida em três equipes. Cada equipe será responsável por se aprofundar em um conceito fundamental do nosso projeto. Os grupos de pesquisa são:\n    1. Grupo A: "O que é Patrimônio?"\n    2. Grupo B: "O que é Patrimônio Histórico?"\n    3. Grupo C: "O que são Patrimônio Cultural Material e Patrimônio Cultural Imaterial?"\nO Desafio: Seu desafio é pesquisar e inserir os resultados do seu levantamento na nossa Wiki. Cada conceito que vocês explicarem, com suas próprias palavras e exemplos, vai ajudar toda a turma a entender melhor o tema.\nLembrem-se de que a colaboração e a organização são essenciais. O grupo que trouxer a explicação mais clara e completa será o "Guardião do Conhecimento" da nossa missão.\nVamos lá! É hora de construir o nosso próprio acervo de sabedoria.', '2025-09-30 21:58:56', NULL, NULL, NULL, 'NÃO ATRIBUÍDA', 23),
	(65, 'MISSÃO 4: O CAÇADOR DE DETALHES', 'MISSÃO 4: "O Caçador de Detalhes"\nEquipe de Expedição, atenção! Vocês já são especialistas em história e em memória. Agora é hora de treinar o olhar e se tornar verdadeiros detetives visuais do nosso bairro.\nO Objetivo: Fotografar os pequenos detalhes que contam as grandes histórias da nossa arquitetura.\nO Desafio: Percorram o bairro em busca de elementos que se destacam, como:\n    • Casas antigas de madeira e de alvenaria.\n    • Janelas e portas com desenhos ou cores diferentes.\n    • Detalhes na fachada de igrejas.\n    • Placas, postes ou qualquer objeto que pareça contar uma história.\nO importante é capturar a essência do lugar através desses detalhes. Cada foto tirada com atenção e criatividade vale 1 ponto. A equipe que encontrar os detalhes mais impressionantes e únicos será a vencedora desta missão!\nProntos para essa jornada? O bairro está esperando para ter seus segredos revelados pelo olhar de vocês.', '2025-09-30 21:58:56', NULL, NULL, NULL, 'NÃO ATRIBUÍDA', 23),
	(66, 'MISSÃO 5: VOZES DA ESCOLA E DO BAIRRO', 'MISSÃO 5: "Vozes da Escola e do Bairro"\nExploradores, é hora de ouvir o passado! Vocês já registraram a história oficial, os detalhes arquitetônicos e as memórias da família. Agora, o próximo desafio é encontrar uma "fonte viva" de histórias!\nO Objetivo: Encontrar um morador antigo do bairro - alguém que já estudou ou que ainda mora na região - e registrar um depoimento em áudio ou vídeo.\nO Desafio:\n    1. Encontre a Fonte: Peça a ajuda da sua família ou procure por pessoas mais velhas no seu bairro.\n    2. Faça as Perguntas Certas: Pergunte sobre como era a escola, as brincadeiras, os comércios antigos ou as festas do bairro.\n    3. Grave o Depoimento: Use seu celular ou um gravador para registrar a entrevista em áudio ou vídeo. O depoimento pode ser curto, mas deve ser rico em detalhes e lembranças.\nPontuação: Cada depoimento bem-sucedido vale 5 pontos para a sua pontuação individual! Lembre-se de ser educado e agradecer a pessoa por compartilhar suas memórias.\nEssa missão vai nos ajudar a construir a história do bairro com as vozes de quem realmente a viveu. Boa sorte!', '2025-09-30 21:58:56', NULL, NULL, NULL, 'NÃO ATRIBUÍDA', 23),
	(67, 'MISSÃO 6: A RECEITA DE FAMÍLIA', 'MISSÃO 6: "A Receita de Família"\nChefs e Cozinheiros do Conhecimento, hora de colocar a mão na massa! Vocês já registraram a história do bairro, mas agora é a vez de saborear o que faz parte da memória da nossa comunidade.\nO Objetivo: Registrar em foto ou vídeo uma receita tradicional da sua família. Não precisa ser algo que passa por várias gerações, basta ser um prato que vocês fazem e que tem um significado especial.\nO Desafio:\n    1. Escolha a Receita: Pense em um prato que a sua família adora preparar. Pode ser um bolo de aniversário, um almoço de domingo ou até mesmo um lanche rápido que todo mundo gosta.\n    2. Documente: Tire fotos dos ingredientes, do passo a passo ou do prato finalizado. Se quiser, grave um vídeo mostrando a receita sendo feita!\n    3. Conte a História: Junto com o registro, conte o porquê dessa receita ser especial. Ela te lembra de quem? De qual momento?\nPontuação: Cada foto ou vídeo enviado vale 5 pontos para a sua pontuação individual. Essa missão vai nos mostrar que o patrimônio cultural também pode ser saboreado!\nProntos para essa missão deliciosa?', '2025-09-30 21:58:56', NULL, NULL, NULL, 'ATRIBUÍDA', 23);

-- Copiando estrutura para tabela db_hist.profile
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` enum('PROFESSOR COLABORADOR','PROFESSOR ORGANIZADOR','ALUNO','ALUNO COLABORADOR') NOT NULL,
  `emblems_list` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_hist.profile: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_hist.projects
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` date DEFAULT NULL,
  `begin_at` date DEFAULT NULL,
  `final_preview` date DEFAULT NULL,
  `final_real` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `team` varchar(255) DEFAULT NULL,
  `institution` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_hist.projects: ~0 rows (aproximadamente)
INSERT INTO `projects` (`id`, `created_at`, `begin_at`, `final_preview`, `final_real`, `name`, `desc`, `team`, `institution`) VALUES
	(22, NULL, '2025-09-24', '2025-10-25', '0000-00-00', 'Memória da Escola Trá lá lá', 'Projeto realizado na Esc. Mun. Trá lá lá', '5,4', 'Esc. Mun. Trá lá lá'),
	(23, NULL, '2025-10-01', '2025-10-10', '0000-00-00', 'Título', 'A descrição', '4,5', 'Instituição');

-- Copiando estrutura para tabela db_hist.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `type` enum('PROFESSOR COLABORADOR','PROFESSOR ORGANIZADOR','ALUNO','ALUNO COLABORADOR') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pwd` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_hist.users: ~2 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `desc`, `type`, `created_at`, `pwd`) VALUES
	(4, 'admin', NULL, 'PROFESSOR ORGANIZADOR', '2025-09-24 11:36:16', NULL),
	(5, 'caike', NULL, 'ALUNO', '2025-09-24 11:50:46', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
