-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 11-Jun-2018 às 19:24
-- Versão do servidor: 5.5.56-MariaDB
-- PHP Version: 5.6.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ep2018_escola_db_cms`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_acessos`
--

CREATE TABLE `tb_acessos` (
  `id` int(11) NOT NULL,
  `acessos` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_acessos`
--

INSERT INTO `tb_acessos` (`id`, `acessos`) VALUES
(1, '127');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_blog`
--

CREATE TABLE `tb_blog` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `horario` varchar(8) NOT NULL,
  `data` varchar(10) NOT NULL,
  `conteudo` varchar(4000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_blog`
--

INSERT INTO `tb_blog` (`id`, `titulo`, `imagem`, `horario`, `data`, `conteudo`) VALUES
(235, 'Ceará comemora 10 anos das Escolas Estaduais de Educação Profissional', '15283806775b193d054b460.jpg', '11:08:30', '07/06/2018', '<p>?Os 10 anos de cria&ccedil;&atilde;o das Escolas Estaduais de Educa&ccedil;&atilde;o Profissional (EEEPs) ser&atilde;o comemorados, entre os dias 20 e 23 de mar&ccedil;o, com extensa programa&ccedil;&atilde;o. O in&iacute;cio das homenagens ocorrer&aacute;, na pr&oacute;xima ter&ccedil;a-feira (20), a partir das 9h, com o semin&aacute;rio &ldquo;10 anos das Escolas Estaduais de Educa&ccedil;&atilde;o Profissional no Cear&aacute;: Repensando o Ensino T&eacute;cnico Profissional para os Desafios do Futuro&rdquo;. O evento, que ser&aacute; realizado no Centro de Eventos do Cear&aacute;, se estender&aacute; at&eacute; a quarta-feira (21) e contar&aacute; com a presen&ccedil;a do governador Camilo Santana, da vice-governadora Izolda Cela, o secret&aacute;rio da Educa&ccedil;&atilde;o, Idilvan Alencar, e representantes das institui&ccedil;&otilde;es parceiras.</p>\r\n'),
(228, 'Alunos de escola estadual do Ceará passam mal após consumir refeição', '15283789905b19366e356e5.jpg', '10:42:34', '07/06/2018', '<p>Alunos da&nbsp; Escola Estadual de Educa&ccedil;&atilde;o Profissional (EEEP) Walquer Cavalcante Maia, em Russas, foram hospitalizados ap&oacute;s passarem mal por comer uma refei&ccedil;&atilde;o na institui&ccedil;&atilde;o de ensino na tarde de quarta-feira (29). O coordenador da escola, Jo&atilde;o Vitor Arruda, confirmou ao&nbsp;<strong>G1</strong>&nbsp;a intoxica&ccedil;&atilde;o, mas n&atilde;o soube explicar qual alimento os estudantes consumiram no hor&aacute;rio do almo&ccedil;o. O coordenador disse apenas que a comida tinha frango.</p>\r\n'),
(229, 'Alunos de escola estadual do Ceará passam mal após consumir refeição', '15283789915b19366f3b003.jpg', '10:42:34', '07/06/2018', '<p>Alunos da&nbsp; Escola Estadual de Educa&ccedil;&atilde;o Profissional (EEEP) Walquer Cavalcante Maia, em Russas, foram hospitalizados ap&oacute;s passarem mal por comer uma refei&ccedil;&atilde;o na institui&ccedil;&atilde;o de ensino na tarde de quarta-feira (29). O coordenador da escola, Jo&atilde;o Vitor Arruda, confirmou ao&nbsp;<strong>G1</strong>&nbsp;a intoxica&ccedil;&atilde;o, mas n&atilde;o soube explicar qual alimento os estudantes consumiram no hor&aacute;rio do almo&ccedil;o. O coordenador disse apenas que a comida tinha frango.</p>\r\n'),
(230, 'Alunos de escola estadual do Ceará passam mal após consumir refeição', '15283789915b19366fa3a30.jpg', '10:42:34', '07/06/2018', '<p>Alunos da&nbsp; Escola Estadual de Educa&ccedil;&atilde;o Profissional (EEEP) Walquer Cavalcante Maia, em Russas, foram hospitalizados ap&oacute;s passarem mal por comer uma refei&ccedil;&atilde;o na institui&ccedil;&atilde;o de ensino na tarde de quarta-feira (29). O coordenador da escola, Jo&atilde;o Vitor Arruda, confirmou ao&nbsp;<strong>G1</strong>&nbsp;a intoxica&ccedil;&atilde;o, mas n&atilde;o soube explicar qual alimento os estudantes consumiram no hor&aacute;rio do almo&ccedil;o. O coordenador disse apenas que a comida tinha frango.</p>\r\n'),
(231, 'Alunos de escola estadual do Ceará passam mal após consumir refeição', '15283789985b1936761526c.jpg', '10:42:34', '07/06/2018', '<p>Alunos da&nbsp; Escola Estadual de Educa&ccedil;&atilde;o Profissional (EEEP) Walquer Cavalcante Maia, em Russas, foram hospitalizados ap&oacute;s passarem mal por comer uma refei&ccedil;&atilde;o na institui&ccedil;&atilde;o de ensino na tarde de quarta-feira (29). O coordenador da escola, Jo&atilde;o Vitor Arruda, confirmou ao&nbsp;<strong>G1</strong>&nbsp;a intoxica&ccedil;&atilde;o, mas n&atilde;o soube explicar qual alimento os estudantes consumiram no hor&aacute;rio do almo&ccedil;o. O coordenador disse apenas que a comida tinha frango.</p>\r\n'),
(232, 'Ceará comemora 10 anos das Escolas Estaduais de Educação Profissional', '15283806695b193cfd624c1.jpg', '11:08:30', '07/06/2018', '<p>?Os 10 anos de cria&ccedil;&atilde;o das Escolas Estaduais de Educa&ccedil;&atilde;o Profissional (EEEPs) ser&atilde;o comemorados, entre os dias 20 e 23 de mar&ccedil;o, com extensa programa&ccedil;&atilde;o. O in&iacute;cio das homenagens ocorrer&aacute;, na pr&oacute;xima ter&ccedil;a-feira (20), a partir das 9h, com o semin&aacute;rio &ldquo;10 anos das Escolas Estaduais de Educa&ccedil;&atilde;o Profissional no Cear&aacute;: Repensando o Ensino T&eacute;cnico Profissional para os Desafios do Futuro&rdquo;. O evento, que ser&aacute; realizado no Centro de Eventos do Cear&aacute;, se estender&aacute; at&eacute; a quarta-feira (21) e contar&aacute; com a presen&ccedil;a do governador Camilo Santana, da vice-governadora Izolda Cela, o secret&aacute;rio da Educa&ccedil;&atilde;o, Idilvan Alencar, e representantes das institui&ccedil;&otilde;es parceiras.</p>\r\n'),
(233, 'Ceará comemora 10 anos das Escolas Estaduais de Educação Profissional', '15283806735b193d012ddb7.jpg', '11:08:30', '07/06/2018', '<p>?Os 10 anos de cria&ccedil;&atilde;o das Escolas Estaduais de Educa&ccedil;&atilde;o Profissional (EEEPs) ser&atilde;o comemorados, entre os dias 20 e 23 de mar&ccedil;o, com extensa programa&ccedil;&atilde;o. O in&iacute;cio das homenagens ocorrer&aacute;, na pr&oacute;xima ter&ccedil;a-feira (20), a partir das 9h, com o semin&aacute;rio &ldquo;10 anos das Escolas Estaduais de Educa&ccedil;&atilde;o Profissional no Cear&aacute;: Repensando o Ensino T&eacute;cnico Profissional para os Desafios do Futuro&rdquo;. O evento, que ser&aacute; realizado no Centro de Eventos do Cear&aacute;, se estender&aacute; at&eacute; a quarta-feira (21) e contar&aacute; com a presen&ccedil;a do governador Camilo Santana, da vice-governadora Izolda Cela, o secret&aacute;rio da Educa&ccedil;&atilde;o, Idilvan Alencar, e representantes das institui&ccedil;&otilde;es parceiras.</p>\r\n'),
(234, 'Ceará comemora 10 anos das Escolas Estaduais de Educação Profissional', '15283806755b193d0367a28.jpg', '11:08:30', '07/06/2018', '<p>?Os 10 anos de cria&ccedil;&atilde;o das Escolas Estaduais de Educa&ccedil;&atilde;o Profissional (EEEPs) ser&atilde;o comemorados, entre os dias 20 e 23 de mar&ccedil;o, com extensa programa&ccedil;&atilde;o. O in&iacute;cio das homenagens ocorrer&aacute;, na pr&oacute;xima ter&ccedil;a-feira (20), a partir das 9h, com o semin&aacute;rio &ldquo;10 anos das Escolas Estaduais de Educa&ccedil;&atilde;o Profissional no Cear&aacute;: Repensando o Ensino T&eacute;cnico Profissional para os Desafios do Futuro&rdquo;. O evento, que ser&aacute; realizado no Centro de Eventos do Cear&aacute;, se estender&aacute; at&eacute; a quarta-feira (21) e contar&aacute; com a presen&ccedil;a do governador Camilo Santana, da vice-governadora Izolda Cela, o secret&aacute;rio da Educa&ccedil;&atilde;o, Idilvan Alencar, e representantes das institui&ccedil;&otilde;es parceiras.</p>\r\n'),
(226, 'Alunos de escola estadual do Ceará passam mal após consumir refeição', '15283789835b193667cd9c6.jpg', '10:42:34', '07/06/2018', '<p>Alunos da&nbsp; Escola Estadual de Educa&ccedil;&atilde;o Profissional (EEEP) Walquer Cavalcante Maia, em Russas, foram hospitalizados ap&oacute;s passarem mal por comer uma refei&ccedil;&atilde;o na institui&ccedil;&atilde;o de ensino na tarde de quarta-feira (29). O coordenador da escola, Jo&atilde;o Vitor Arruda, confirmou ao&nbsp;<strong>G1</strong>&nbsp;a intoxica&ccedil;&atilde;o, mas n&atilde;o soube explicar qual alimento os estudantes consumiram no hor&aacute;rio do almo&ccedil;o. O coordenador disse apenas que a comida tinha frango.</p>\r\n'),
(227, 'Alunos de escola estadual do Ceará passam mal após consumir refeição', '15283789895b19366d74a83.jpg', '10:42:34', '07/06/2018', '<p>Alunos da&nbsp; Escola Estadual de Educa&ccedil;&atilde;o Profissional (EEEP) Walquer Cavalcante Maia, em Russas, foram hospitalizados ap&oacute;s passarem mal por comer uma refei&ccedil;&atilde;o na institui&ccedil;&atilde;o de ensino na tarde de quarta-feira (29). O coordenador da escola, Jo&atilde;o Vitor Arruda, confirmou ao&nbsp;<strong>G1</strong>&nbsp;a intoxica&ccedil;&atilde;o, mas n&atilde;o soube explicar qual alimento os estudantes consumiram no hor&aacute;rio do almo&ccedil;o. O coordenador disse apenas que a comida tinha frango.</p>\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_blog_lei`
--

CREATE TABLE `tb_blog_lei` (
  `id` int(11) NOT NULL,
  `link` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_blog_lei`
--

INSERT INTO `tb_blog_lei` (`id`, `link`) VALUES
(1, 'https://leidoprofissionalizante.blogspot.com/');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cursos`
--

CREATE TABLE `tb_cursos` (
  `id` int(11) NOT NULL,
  `curso` varchar(70) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `link` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_cursos`
--

INSERT INTO `tb_cursos` (`id`, `curso`, `descricao`, `link`) VALUES
(34, 'Administração', '<p>O Curso T&eacute;cnico em Administra&ccedil;&atilde;o faz parte do eixo tecnol&oacute;gico Gest&atilde;o e Neg&oacute;cios e &eacute; ofertado pela EEEP Walquer Cavalcante Maia&nbsp;desde. &Eacute; composto por 19 disciplinas, incluindo est&aacute;gio curricular de 300h&nbsp;. O curso visa preparar o estudante para a vida produtiva e atuar em a&ccedil;&otilde;es de planejamento, organiza&ccedil;&atilde;o, gest&atilde;o, controle e participa&ccedil;&atilde;o no processo de tomada de decis&atilde;o nas diferentes &aacute;reas organizacionais, tanto p&uacute;blicas como privadas.</p>\r\n\r\n<p>Por ser uma forma&ccedil;&atilde;o multidisciplinar com disciplinas voltados para as &aacute;reas humanas, exatas e sociais aplicadas, &eacute; um curso que oferece ao aluno a oportunidade de se identificar e escolher em qual &aacute;rea quer atuar tais como, &aacute;rea financeira, recursos humanos, marketing, qualidade, log&iacute;stica, comercial entre outras. Desta forma, abrem-se in&uacute;meras', 'https://teste.com'),
(32, 'Informática', '<p>O curso de Informatica oferece aos seus alunos a capacidade de se aprofundar um pouco mais nesse universo tecnologico...</p>\r\n', 'https://teste.com.br'),
(36, 'Enfermagem', '<p>O Curso de Enfermagem...</p>\r\n', 'https://teste.com'),
(37, 'Massoterapia', '<p>Faz Massagem...</p>\r\n', 'https://teste.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_downloads`
--

CREATE TABLE `tb_downloads` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_downloads`
--

INSERT INTO `tb_downloads` (`id`, `nome`, `link`) VALUES
(10, 'Notas De Corte 2017', 'http://www.sisu.ufc.br/wp-content/uploads/2018/01/notas-de-corte-2017.pdf'),
(11, 'Laboratório Virtual (Física) - Construção de Circuito (DC)', 'https://drive.google.com/file/d/0BxzkXYZ351C2bjh2SGg3bFJGS0U/view'),
(14, 'Apostila POO Java', 'https://www.seduc.ce.gov.br/images/APOSTILAS_2012/informatica/informatica_java.pdf'),
(15, 'Inglês Tecnico', 'https://www.seduc.ce.gov.br/images/APOSTILAS_2012/informatica/ingles_tecnico.pdf'),
(16, 'Apostila Massoterapia', 'https://www.sogab.com.br/apostma2012.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_email`
--

CREATE TABLE `tb_email` (
  `id` int(11) NOT NULL,
  `email` varchar(120) NOT NULL,
  `condicao` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_email`
--

INSERT INTO `tb_email` (`id`, `email`, `condicao`) VALUES
(1, 'eprussas@escola.ce.gov.br', 1),
(2, 'guylhermegomes1@gmail.com', 0),
(3, 'WalquerMilGrau@gmail.com', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_eventos`
--

CREATE TABLE `tb_eventos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `data` varchar(10) DEFAULT NULL,
  `horario` varchar(7) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_eventos`
--

INSERT INTO `tb_eventos` (`id`, `nome`, `descricao`, `data`, `horario`) VALUES
(90, 'walquer', 'Quadrilha junina da walquer', '2018-07-02', '10:57'),
(97, 'Dia dos Namorados', ' Dia dos Namorados sZ ', '2018-06-12', '14:10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_galeria`
--

CREATE TABLE `tb_galeria` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `imagem` varchar(200) DEFAULT NULL,
  `data` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_galeria`
--

INSERT INTO `tb_galeria` (`id`, `nome`, `imagem`, `data`) VALUES
(146, 'Teste', '15281507555b15bae326bf9.jpg', '04/06/2018'),
(147, 'Teste', '15281507805b15bafce0597.jpg', '04/06/2018'),
(148, 'Teste', '15281508005b15bb10211ee.jpg', '04/06/2018'),
(149, 'Teste', '15281508765b15bb5c49ea1.jpg', '04/06/2018'),
(150, 'Teste', '15281508885b15bb6849477.jpg', '04/06/2018'),
(151, 'Teste', '15281508965b15bb703b401.jpg', '04/06/2018'),
(152, 'Teste', '15281509095b15bb7d6e611.jpg', '04/06/2018'),
(153, 'Teste', '15281509195b15bb874f122.jpg', '04/06/2018'),
(154, 'Teste', '15281509615b15bbb1770b1.jpg', '04/06/2018'),
(155, 'Teste', '15281509695b15bbb95de78.jpg', '04/06/2018'),
(156, 'Teste', '15281509795b15bbc3abcd0.jpg', '04/06/2018'),
(157, 'Teste', '15281509895b15bbcddb71e.jpg', '04/06/2018'),
(158, 'Teste', '15281510825b15bc2a94906.jpg', '04/06/2018'),
(159, 'Teste', '15281510925b15bc3427422.jpg', '04/06/2018'),
(160, 'Teste', '15281511035b15bc3f5a3f2.jpg', '04/06/2018'),
(161, 'Teste', '15281511165b15bc4c5176f.jpg', '04/06/2018'),
(162, 'Eduardo', '15287224285b1e73fc0153e.jpg', '11/06/2018');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_horario`
--

CREATE TABLE `tb_horario` (
  `id` int(11) NOT NULL,
  `horario` varchar(100) NOT NULL,
  `condicao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_horario`
--

INSERT INTO `tb_horario` (`id`, `horario`, `condicao`) VALUES
(1, '11 a 15/12/2017 das 7:30h às 11:30h e 13:30h às 15h', '1'),
(2, '11 a 15/12/2017 das 7:30h às 11:30h e 13:30h às 15h', '1'),
(3, '11 a 15/12/2017 das 7:30h às 11:30h e 13:30h às 15h', '1'),
(4, '11 a 15/12/2017 das 7:30h às 11:30h e 13:30h às 15h', '1'),
(5, '17/01/2018 das 8h às 16h (Administrção e Informática)', '1'),
(6, '17/01/2018 das 8h às 16h (Administrção e Informática)', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_incricoes`
--

CREATE TABLE `tb_incricoes` (
  `id` int(11) NOT NULL,
  `incricoes` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_incricoes`
--

INSERT INTO `tb_incricoes` (`id`, `incricoes`) VALUES
(1, 'Declaração de conclusão do 9º ano'),
(2, 'Quatro fotos 3x4(iguais e recentes)'),
(3, 'Xerox da certidão de nascimento do aluno'),
(4, 'Xerox do RG e CPF do aluno'),
(5, 'Xerox do comprovante de residência atualizado'),
(6, 'Histórico escolar assinado e carimbado pelo Diretor e Secretário da escola');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_indice`
--

CREATE TABLE `tb_indice` (
  `id` int(11) NOT NULL,
  `icone` varchar(60) NOT NULL,
  `aprovacao` varchar(5) NOT NULL,
  `texto` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_indice`
--

INSERT INTO `tb_indice` (`id`, `icone`, `aprovacao`, `texto`) VALUES
(1, 'far fa-thumbs-up fa-3x', '64%', 'De aprovação das turmas de 3º ano'),
(2, 'fas fa-graduation-cap fa-3x', '75', 'Alunos aprovados em Universidades e Institutus Federais'),
(3, 'fas fa-university fa-3x', '12', 'Universidades e Institutus Federais diferentes'),
(4, 'fas fa-book fa-3x', '57', 'Cursos Estranhos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_inforcursos`
--

CREATE TABLE `tb_inforcursos` (
  `id` int(11) NOT NULL,
  `cursos` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_inforcursos`
--

INSERT INTO `tb_inforcursos` (`id`, `cursos`) VALUES
(13, '<p>Administra&ccedil;&atilde;o</p>\r\n'),
(2, 'Enfermagem'),
(3, 'Informática'),
(4, 'Massoterapia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_informacoes`
--

CREATE TABLE `tb_informacoes` (
  `id` int(11) NOT NULL,
  `informacoes` varchar(800) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_informacoes`
--

INSERT INTO `tb_informacoes` (`id`, `informacoes`) VALUES
(1, '<p>Ser&atilde;o ofertadas 40 vagas por curso e 80% dessas vagas s&atilde;o destinas a alunos da rede p&uacute;blica e 20% para alunos de escola privada.</p>\r\n'),
(2, 'No histórico escolar deve conter todas as notas do 6º ao 9º ano. Caso o aluno esteja cursando o 9º ano apresentar uma declaração e histórico escolar contendo as notas até o 3º bimestre do 9º ano assinado e carimbado pelo Diretor e Secretário da escola.'),
(3, 'Ter idade mínima de 14 anos completos até 30/05/2015 para os cursos de administração e informática.'),
(5, 'A classificação será dada em ordem decrescennte da média aritimética das notas relativas das disciplinas do 6º ao 9º ano.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_link_uteis`
--

CREATE TABLE `tb_link_uteis` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_link_uteis`
--

INSERT INTO `tb_link_uteis` (`id`, `nome`, `link`) VALUES
(2, 'Sice', 'http://sice-orientador.seduc.ce.gov.br/sice-orientador/aluno/menu-aluno.jsf'),
(21, 'Seduc', 'http://www.seduc.ce.gov.br/'),
(22, 'Aluno Online', 'http://aluno.seduc.ce.gov.br/'),
(23, 'Sisu', 'http://www.sisu.mec.gov.br/'),
(24, 'Prouni', 'http://prouniportal.mec.gov.br/'),
(25, 'Fies', 'http://sisfiesportal.mec.gov.br/');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_localizacao`
--

CREATE TABLE `tb_localizacao` (
  `id` int(11) NOT NULL,
  `localizacao` varchar(200) NOT NULL,
  `condicao` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_localizacao`
--

INSERT INTO `tb_localizacao` (`id`, `localizacao`, `condicao`) VALUES
(1, 'TRAVESSA PEDRO ARAUJO, 175', 1),
(2, 'IPIRANGA ', 1),
(3, 'RUSSAS', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_logo`
--

CREATE TABLE `tb_logo` (
  `id` int(2) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_logo`
--

INSERT INTO `tb_logo` (`id`, `nome`) VALUES
(22, 'assets/img/logo/15287217685b1e7168360ec.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_matriculas`
--

CREATE TABLE `tb_matriculas` (
  `id` int(11) NOT NULL,
  `matriculas` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_matriculas`
--

INSERT INTO `tb_matriculas` (`id`, `matriculas`) VALUES
(2, 'Histórico escolar completo'),
(3, 'Documento de tranferência ou declaração da escola de origem'),
(4, 'Xerox do RG e CPF do responsável pelo aluno'),
(5, 'Xerox Cartão do Bolsa Família');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_redesociais`
--

CREATE TABLE `tb_redesociais` (
  `id` int(11) NOT NULL,
  `condicao` int(1) NOT NULL,
  `icone` varchar(100) NOT NULL,
  `link` varchar(200) NOT NULL,
  `nome` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_redesociais`
--

INSERT INTO `tb_redesociais` (`id`, `condicao`, `icone`, `link`, `nome`) VALUES
(1, 1, 'fab fa-youtube', 'https://www.youtube.com/channel/UCuJ1T2iPfM4qizRxvmBIVIQ', 'YouTube'),
(2, 1, 'fab fa-blogger-b', 'https://leidoprofissionalizante.blogspot.com/', 'Blogger'),
(3, 1, 'fab fa-google-plus-g', 'https://plus.google.com/discover', 'Google'),
(4, 1, 'fab fa-facebook-f', 'www.facebook.com', 'Facebook'),
(5, 1, 'fab fa-instagram', 'https://www.instagram.com/?hl=pt-br', 'Instagram');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_resultado`
--

CREATE TABLE `tb_resultado` (
  `id` int(11) NOT NULL,
  `resultado` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_resultado`
--

INSERT INTO `tb_resultado` (`id`, `resultado`) VALUES
(1, 'Vá até a escola e veja se você foi selecionado.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_reualinhamento`
--

CREATE TABLE `tb_reualinhamento` (
  `id` int(11) NOT NULL,
  `ReuAlinhamento` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_reualinhamento`
--

INSERT INTO `tb_reualinhamento` (`id`, `ReuAlinhamento`) VALUES
(1, 'Deverão participar aluno e responsável. A frequência é obrigatória para a concessão da matrícula do discente.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id` int(11) NOT NULL,
  `imagem` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_slider`
--

INSERT INTO `tb_slider` (`id`, `imagem`) VALUES
(72, '15283106095b182b5160db0.jpg'),
(74, '15284760605b1ab19ce08d2.jpg'),
(71, '15283105325b182b0487d3b.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sobre`
--

CREATE TABLE `tb_sobre` (
  `id` int(1) NOT NULL,
  `descricao` varchar(4000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_sobre`
--

INSERT INTO `tb_sobre` (`id`, `descricao`) VALUES
(1, '<p>&nbsp;&nbsp;Do mesmo modo, o consenso sobre a necessidade de qualifica&ccedil;&atilde;o estende o alcance e a import&acirc;ncia do sistema de forma&ccedil;&atilde;o de quadros que corresponde &agrave;s necessidades. No entanto, n&atilde;o podemos esquecer que o julgamento imparcial das eventualidades nos obriga &agrave; an&aacute;lise das condi&ccedil;&otilde;es inegavelmente apropriadas. Assim mesmo, a constante divulga&ccedil;&atilde;o das informa&ccedil;&otilde;es afeta positivamente a correta previs&atilde;o do or&ccedil;amento setorial. A n&iacute;vel organizacional, a estrutura atual da organiza&ccedil;&atilde;o auxilia a prepara&ccedil;&atilde;o e a composi&ccedil;&atilde;o dos paradigmas corporativos. Caros amigos, o entendimento das metas propostas garante a contribui&ccedil;&atilde;o de um grupo importante na determina&ccedil;&atilde;o das novas proposi&ccedil;&otilde;es.&nbsp;<br />\r\n&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_telefone`
--

CREATE TABLE `tb_telefone` (
  `id` int(11) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `condicao` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_telefone`
--

INSERT INTO `tb_telefone` (`id`, `telefone`, `condicao`) VALUES
(1, '(88)34118-508', 1),
(2, '(88)34115-252', 0),
(3, '(88)34113-534', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `condicao` int(1) DEFAULT NULL,
  `img` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `nome`, `email`, `usuario`, `senha`, `condicao`, `img`) VALUES
(60, 'Eduardo', 'eduardoalvesalmeida1@gmail.com', 'Eduardo', '4297f44b13955235245b2497399d7a93', 0, NULL),
(57, 'jean 22', 'jean@gmail.com', 'jean', '4297f44b13955235245b2497399d7a93', 0, '15283116695b182f758f02a.jpg'),
(58, 'Guilherme', 'guilherme@gmail.com', 'guilherme', '4297f44b13955235245b2497399d7a93', 0, NULL),
(59, 'Andre', 'andre@gmail.com', 'Andre', '4297f44b13955235245b2497399d7a93', 0, '15283118445b1830247cb00.jpg'),
(62, 'Renan', 'renan@gmail.com', 'Renan', '4297f44b13955235245b2497399d7a93', 0, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_video`
--

CREATE TABLE `tb_video` (
  `id` int(11) NOT NULL,
  `link` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_video`
--

INSERT INTO `tb_video` (`id`, `link`) VALUES
(1, 'qwSW-uJ2RrY');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_visitantes`
--

CREATE TABLE `tb_visitantes` (
  `id` int(11) NOT NULL,
  `ip` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_visitantes`
--

INSERT INTO `tb_visitantes` (`id`, `ip`) VALUES
(1, '::1'),
(2, '127.0.0.1'),
(3, '187.19.236.167'),
(4, '173.252.98.113'),
(5, '189.84.112.49'),
(6, '187.19.194.194'),
(7, '66.249.83.154'),
(8, '66.249.83.156'),
(9, '187.19.238.202'),
(10, '168.232.86.130'),
(11, '45.7.161.254'),
(12, '173.252.115.88'),
(13, '187.19.234.186'),
(14, '186.225.43.66'),
(15, '187.19.224.207'),
(16, '177.37.162.159'),
(17, '198.199.92.66'),
(18, '34.208.164.152'),
(19, '66.249.85.31'),
(20, '186.225.38.145'),
(21, '66.249.85.3'),
(22, '187.19.233.81'),
(23, '66.249.80.54'),
(24, '187.19.226.72'),
(25, '189.90.160.73'),
(26, '104.131.65.152'),
(27, '104.131.112.208'),
(28, '66.171.37.130'),
(29, '66.249.88.52'),
(30, '66.249.88.53'),
(31, '34.216.141.242'),
(32, '179.240.181.21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_acessos`
--
ALTER TABLE `tb_acessos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_blog`
--
ALTER TABLE `tb_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_cursos`
--
ALTER TABLE `tb_cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_downloads`
--
ALTER TABLE `tb_downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_email`
--
ALTER TABLE `tb_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_eventos`
--
ALTER TABLE `tb_eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_galeria`
--
ALTER TABLE `tb_galeria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_horario`
--
ALTER TABLE `tb_horario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_incricoes`
--
ALTER TABLE `tb_incricoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_inforcursos`
--
ALTER TABLE `tb_inforcursos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_informacoes`
--
ALTER TABLE `tb_informacoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_link_uteis`
--
ALTER TABLE `tb_link_uteis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_localizacao`
--
ALTER TABLE `tb_localizacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_logo`
--
ALTER TABLE `tb_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_matriculas`
--
ALTER TABLE `tb_matriculas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_redesociais`
--
ALTER TABLE `tb_redesociais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_resultado`
--
ALTER TABLE `tb_resultado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_reualinhamento`
--
ALTER TABLE `tb_reualinhamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sobre`
--
ALTER TABLE `tb_sobre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_telefone`
--
ALTER TABLE `tb_telefone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_video`
--
ALTER TABLE `tb_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_visitantes`
--
ALTER TABLE `tb_visitantes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_blog`
--
ALTER TABLE `tb_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;
--
-- AUTO_INCREMENT for table `tb_cursos`
--
ALTER TABLE `tb_cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `tb_downloads`
--
ALTER TABLE `tb_downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tb_email`
--
ALTER TABLE `tb_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_eventos`
--
ALTER TABLE `tb_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `tb_galeria`
--
ALTER TABLE `tb_galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;
--
-- AUTO_INCREMENT for table `tb_horario`
--
ALTER TABLE `tb_horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_incricoes`
--
ALTER TABLE `tb_incricoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_inforcursos`
--
ALTER TABLE `tb_inforcursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tb_informacoes`
--
ALTER TABLE `tb_informacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tb_link_uteis`
--
ALTER TABLE `tb_link_uteis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tb_localizacao`
--
ALTER TABLE `tb_localizacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_logo`
--
ALTER TABLE `tb_logo`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tb_matriculas`
--
ALTER TABLE `tb_matriculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_redesociais`
--
ALTER TABLE `tb_redesociais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_resultado`
--
ALTER TABLE `tb_resultado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_reualinhamento`
--
ALTER TABLE `tb_reualinhamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `tb_sobre`
--
ALTER TABLE `tb_sobre`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_telefone`
--
ALTER TABLE `tb_telefone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `tb_video`
--
ALTER TABLE `tb_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_visitantes`
--
ALTER TABLE `tb_visitantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
