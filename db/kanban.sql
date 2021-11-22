-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2021 a las 21:40:26
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kanban`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendar`
--

CREATE TABLE `calendar` (
  `id_event` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `colour` varchar(7) CHARACTER SET utf8 DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE `projects` (
  `id_project` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `project_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_colour` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`id_project`, `id_user`, `project_name`, `project_description`, `project_colour`, `start_date`, `end_date`) VALUES
(142, 1, 'Project #1 long title', 'This is an example of a project with a short description.', '#0275d8', '2021-09-01', '2021-11-30'),
(143, 1, 'Project #2', 'Another project example.', '#5bc0de', '2021-11-19', '2021-11-20'),
(144, 1, 'Project #3', 'LONG DESCRIPTION: \r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vitae erat at nisi porttitor rutrum nec sed tellus. Proin vel dictum leo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Interdum et malesuada fames ac ant', '#5cb85c', '2021-11-20', '2021-12-31'),
(145, 1, 'Max of chraracters per field', 'The aximum of chraracters allowed for the title are 30.\r\nThe aximum of chraracters allowed for the title are 225.\r\n', '#f0ad4e', '2021-11-20', '2022-01-31'),
(146, 1, 'Project colours available', 'The colours available for the projects are the following ones: \r\n- blue, \r\n-tile, \r\n- green, \r\n- orange, \r\n- red \r\n- black. \r\n\r\nIn case of leaving the space empty, the automatic color chosen will be white.', '#d9534f', '2021-09-01', '2021-11-20'),
(147, 1, 'Project fields', 'Project name, start date and end date are needed in order to create a project. On the other side description and colour are not mandatory. ', '#292b2c', '2021-11-19', '2021-11-21'),
(148, 1, 'Project dates', 'The end date must be after the start date. Both dates are needed.', '', '2021-11-20', '2021-11-30'),
(149, 1, 'Project without description', '', '#0275d8', '2021-11-22', '2021-11-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks`
--

CREATE TABLE `tasks` (
  `id_task` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL,
  `task_status` int(1) NOT NULL,
  `task_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_colour` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tasks`
--

INSERT INTO `tasks` (`id_task`, `id_user`, `id_project`, `task_status`, `task_name`, `task_description`, `task_colour`, `deadline`) VALUES
(32, 1, 143, 1, 'Task #1', 'An example of a task with description', '#5cb85c', '2021-11-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `tasks_id_user` (`id_user`),
  ADD KEY `tasks_id_project` (`id_project`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT de la tabla `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calendar`
--
ALTER TABLE `calendar`
  ADD CONSTRAINT `calendar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Filtros para la tabla `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Filtros para la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_id_project` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_project`),
  ADD CONSTRAINT `tasks_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
