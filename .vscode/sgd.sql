-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Ago-2020 às 07:27
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sgd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `descricao_cargo` varchar(255) DEFAULT NULL,
  `nivel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `descricao_cargo`, `nivel_id`) VALUES
(1, 'Estagiário', 1),
(2, 'Teste22', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nome` varchar(55) DEFAULT NULL,
  `modalidade` varchar(55) DEFAULT NULL,
  `quantidade_semestres` int(11) DEFAULT NULL,
  `turno` varchar(20) DEFAULT NULL,
  `quantidade_vagas` int(11) DEFAULT NULL,
  `unidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `nome`, `modalidade`, `quantidade_semestres`, `turno`, `quantidade_vagas`, `unidade_id`) VALUES
(2, 'Si', 'aa', 0, 'aa', 0, 1),
(3, 'Direito', '33', 33, 'ff', 33, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nome` varchar(55) DEFAULT NULL,
  `sigla` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nome`, `sigla`) VALUES
(1, 'Dep ', 'DF'),
(2, 'COLEGIADO SI', 'COL');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id_disciplina` int(11) NOT NULL,
  `nome` varchar(55) DEFAULT NULL,
  `sigla` varchar(10) DEFAULT NULL,
  `semestre` varchar(10) DEFAULT NULL,
  `credito_aulaTeorico` varchar(55) DEFAULT NULL,
  `credito_aulaPratica` varchar(55) DEFAULT NULL,
  `credito_aulaDistancia` varchar(55) DEFAULT NULL,
  `credito_total` varchar(55) DEFAULT NULL,
  `cargaHoraria_total` varchar(55) DEFAULT NULL,
  `modulo_aula` varchar(55) DEFAULT NULL,
  `curso_id` int(11) NOT NULL,
  `departamento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id_disciplina`, `nome`, `sigla`, `semestre`, `credito_aulaTeorico`, `credito_aulaPratica`, `credito_aulaDistancia`, `credito_total`, `cargaHoraria_total`, `modulo_aula`, `curso_id`, `departamento_id`) VALUES
(1, 'Engenharia de Software', 'ES', '3', '33', '33', '33', '99', '99', '82.5', 2, 1),
(2, 'Sistemas de Informação', 'SISTE', '232332', '3232', '2332', '2323', '7887', '223', '185.83333333333', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ensino`
--

CREATE TABLE `ensino` (
  `id_ensino` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ensino`
--

INSERT INTO `ensino` (`id_ensino`, `nome`) VALUES
(1, 'Graduação\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel`
--

CREATE TABLE `nivel` (
  `id_nivel` int(11) NOT NULL,
  `descricao_nivel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `nivel`
--

INSERT INTO `nivel` (`id_nivel`, `descricao_nivel`) VALUES
(1, '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocorrencia`
--

CREATE TABLE `ocorrencia` (
  `id_ocorrencia` int(11) NOT NULL,
  `descricao_ocorrencia` varchar(255) DEFAULT NULL,
  `pessoa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ocorrencia`
--

INSERT INTO `ocorrencia` (`id_ocorrencia`, `descricao_ocorrencia`, `pessoa_id`) VALUES
(1, 'teste', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `id_pessoa` int(11) NOT NULL,
  `masp` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `rg` varchar(15) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `regime_trabalho` varchar(255) DEFAULT NULL,
  `carga_horaria` varchar(255) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `celular1` varchar(11) DEFAULT NULL,
  `celular2` varchar(11) DEFAULT NULL,
  `endereco` varchar(125) DEFAULT NULL,
  `bairro` varchar(75) DEFAULT NULL,
  `cidade` varchar(75) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `cep` varchar(255) DEFAULT NULL,
  `link_lattes` varchar(255) DEFAULT NULL,
  `edital_concurso` varchar(255) DEFAULT NULL,
  `vaga_concurso` varchar(255) DEFAULT NULL,
  `unidade_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `cargo_id` int(11) NOT NULL,
  `departamento_id` int(11) NOT NULL,
  `ensino_id` int(11) NOT NULL,
  `nivel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id_pessoa`, `masp`, `senha`, `nome`, `rg`, `cpf`, `regime_trabalho`, `carga_horaria`, `email`, `telefone`, `celular1`, `celular2`, `endereco`, `bairro`, `cidade`, `estado`, `cep`, `link_lattes`, `edital_concurso`, `vaga_concurso`, `unidade_id`, `status_id`, `cargo_id`, `departamento_id`, `ensino_id`, `nivel_id`) VALUES
(1, '08230050627', 'pedrin', 'Pedro Henrique', 'mg20406326', '0823005637', '11', '11', 'pedro@gmail.com', '1212212', '12212121', '2121211', 'aaaaa', 'aaaaa', 'aaaa', 'mg', '32232323', 'aaa', '322323', '2333223', 1, 1, 1, 1, 0, 0),
(102, '433443', '1', 'fdsfds', 'dsfsd', 'fdsfsd', '3443', '3443', 'pedrosouzaferreira3@gmail.com', 'fdsfsdfds', '434343', '434343', 'fsfsd', 'fdsfsd', 'fdsfsd', 'fsdfsd', 'sdfsd', 'sfdfsd', 'sdfsdfsd', 'fsdfsd', 1, 1, 2, 1, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `statuspessoa`
--

CREATE TABLE `statuspessoa` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `statuspessoa`
--

INSERT INTO `statuspessoa` (`id`, `descricao`) VALUES
(1, 'capeta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

CREATE TABLE `unidade` (
  `id_unidade` int(11) NOT NULL,
  `descricao_unidade` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `unidade`
--

INSERT INTO `unidade` (`id_unidade`, `descricao_unidade`) VALUES
(1, 'Frutal'),
(2, 'Ituitutaba');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`),
  ADD KEY `Cargo_fk0` (`nivel_id`);

--
-- Índices para tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `Curso_fk0` (`unidade_id`);

--
-- Índices para tabela `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Índices para tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id_disciplina`),
  ADD KEY `Disciplina_fk0` (`curso_id`),
  ADD KEY `departamento_id` (`departamento_id`);

--
-- Índices para tabela `ensino`
--
ALTER TABLE `ensino`
  ADD PRIMARY KEY (`id_ensino`);

--
-- Índices para tabela `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id_nivel`);

--
-- Índices para tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD PRIMARY KEY (`id_ocorrencia`),
  ADD KEY `Ocorrência_fk0` (`pessoa_id`);

--
-- Índices para tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`id_pessoa`),
  ADD KEY `Pessoas_fk0` (`unidade_id`),
  ADD KEY `Pessoas_fk1` (`status_id`),
  ADD KEY `Pessoas_fk2` (`cargo_id`),
  ADD KEY `Pessoas_fk4` (`departamento_id`),
  ADD KEY `ensino_id` (`ensino_id`),
  ADD KEY `nivel_id` (`nivel_id`);

--
-- Índices para tabela `statuspessoa`
--
ALTER TABLE `statuspessoa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`id_unidade`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `ensino`
--
ALTER TABLE `ensino`
  MODIFY `id_ensino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `nivel`
--
ALTER TABLE `nivel`
  MODIFY `id_nivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  MODIFY `id_ocorrencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de tabela `statuspessoa`
--
ALTER TABLE `statuspessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `unidade`
--
ALTER TABLE `unidade`
  MODIFY `id_unidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cargo`
--
ALTER TABLE `cargo`
  ADD CONSTRAINT `Cargo_fk0` FOREIGN KEY (`nivel_id`) REFERENCES `nivel` (`id_nivel`);

--
-- Limitadores para a tabela `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `Curso_fk0` FOREIGN KEY (`unidade_id`) REFERENCES `unidade` (`id_unidade`);

--
-- Limitadores para a tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `Disciplina_fk0` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id_curso`),
  ADD CONSTRAINT `Disciplina_fk1` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`id_departamento`);

--
-- Limitadores para a tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD CONSTRAINT `Ocorrência_fk0` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id_pessoa`);

--
-- Limitadores para a tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD CONSTRAINT `Pessoas_fk0` FOREIGN KEY (`unidade_id`) REFERENCES `unidade` (`id_unidade`),
  ADD CONSTRAINT `Pessoas_fk1` FOREIGN KEY (`status_id`) REFERENCES `statuspessoa` (`id`),
  ADD CONSTRAINT `Pessoas_fk2` FOREIGN KEY (`cargo_id`) REFERENCES `cargo` (`id_cargo`),
  ADD CONSTRAINT `Pessoas_fk4` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`id_departamento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
