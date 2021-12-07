-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2021 a las 05:44:31
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldetalleventa`
--

CREATE TABLE `tbldetalleventa` (
  `ID` int(11) NOT NULL,
  `IDVENTA` int(11) NOT NULL,
  `IDPRODUCTO` int(11) NOT NULL,
  `IDCliente` int(11) NOT NULL,
  `PRECIOUNITARIO` decimal(20,2) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `DESCARGADO` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproductos`
--

CREATE TABLE `tblproductos` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Descripcion` varchar(15000) NOT NULL,
  `Precio` decimal(20,2) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Imagen` varchar(255) NOT NULL,
  `Disponible` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblproductos`
--

INSERT INTO `tblproductos` (`ID`, `Nombre`, `Descripcion`, `Precio`, `Cantidad`, `Imagen`, `Disponible`) VALUES
(1, 'Minecraft', 'Explora mundos generados al azar y construye cosas increíbles, desde la más humilde de las casas hasta el más majestuoso de los castillos. Juega en el modo creativo con recursos ilimitados o extrae en las profundidades del mundo, crea armas y armaduras para defenderte de enemigos peligrosos en el modo supervivencia.', '349.00', 1, '../img/1.jpg', 298),
(2, 'Resident Evil 2', 'Publicado originalmente en 1998, Resident Evil 2, uno de los juegos más icónicos de todos los tiempos, regresa completamente reinventado para las consolas de nueva generación.', '448.20', 1, '../img/2.jpg', 200),
(3, 'Destiny', 'De los creadores de Halo® y los editores de Call of Duty®. Destiny es un shooter en primera persona con una rica historia de corte cinematográfico ambientada en enormes mundos que podrás explorar. Crea y personaliza tu guardián. Derrota a tus enemigos. Conviértete en leyenda en intensos modos de juego cooperativos, competitivos y públicos.', '200.00', 1, '../img/3.jpg', 300),
(4, 'Bloodborne', 'Con este juego de Bloodborne vas a disfrutar de horas de diversión y de nuevos desafíos que te permitirán mejorar como gamer.\r\nInteractúa con otros jugadores\r\nPodrás disfrutar de una experiencia inigualable, ya que te permite jugar con tus amistades y compartir momentos inolvidables.\r\nDiversión sin fronteras\r\nPodrás compartir cada juego con personas de todo el mundo, ya que es posible conectarse de manera online.', '580.00', 1, '../img/4.jpg', 250),
(5, 'Forza motorsport 6', 'Forza Motorsport 6 es la acción incesante a velocidad de simulación en el juego de carreras más hermoso y completo de esta generación. Colecciona, personaliza y pilota más de 450 coches Forzavista™ con cabinas funcionales y daños realistas. Compite en carreras épicas para 24 jugadores en 26 emplazamientos de fama mundial. Domina el clima lluvioso y las carreras nocturnas en tu camino a la victoria.', '800.00', 1, '../img/5.jpg', 250),
(6, 'Gran Turismo 6', 'Con este juego de Gran Turismo vas a disfrutar de horas de diversión y de nuevos desafíos que te permitirán mejorar como gamer.\r\nInteractúa con otros jugadores\r\nPodrás disfrutar de una experiencia inigualable, ya que te permite jugar con tus amistades y compartir momentos inolvidables.\r\nDiversión sin fronteras\r\nPodrás compartir cada juego con personas de todo el mundo, ya que es posible conectarse de manera online.', '600.00', 1, '../img/6.jpg', 249),
(7, 'Street Fighter V', 'Experimenta la intensidad de la batalla cara a cara en Street Fighter® V.Elige entre 16 personajes icónicos, cada uno con su propia historia personal y desafíos de entrenamiento únicos, y luego lucha contra amigos en línea o sin conexión con una sólida variedad de opciones para cada partida.', '399.00', 1, '../img/7.jpg', 200),
(8, 'Battlefield 4', 'Battlefield 4™ es la superproducción de acción que redefine el género, creada a partir de momentos que borran la línea que separa un juego de la gloria. Alimentado por la potencia y la fidelidad de próxima generación de Frostbite™ 3, Battlefield 4™ proporciona una experiencia visceral y dramática sin igual. Sólo en Battlefield puedes demoler los edificios que protegen a tu enemigo. Sólo en Battlefield liderarás un asalto desde la parte trasera de una patrullera. Battlefield te ofrece la libertad para hacer más y ser más, mientras sacas partido a tus puntos fuertes y te abres camino hacia la victoria. Además del sello de su modo multijugador, Battlefield 4™ presenta una campaña intensa y dramática centrada en los personajes, que comienza con la evacuación de importantes personalidades estadounidenses de Shanghái y sigue los esfuerzos de tu pelotón para lograr volver a casa. No hay nada comparable. Sumérgete en el glorioso caos de la guerra total, sólo en Battlefield.', '406.16', 1, '../img/8.jpg', 250),
(9, 'Immortals Fenyx Rising', 'Immortals Fenyx Rising™ trae consigo una gran aventura mitológica. Juega como Fenyx, quien tiene la misión de salvar a los dioses griegos.', '479.60', 1, '../img/9.jpg', 198),
(10, 'Far Cry 6', 'Te damos la bienvenida a Yara, un paraíso tropical congelado en el tiempo. Como dictador de Yara, Antón Castillo (Giancarlo Esposito) está decidido a recuperar la antigua gloria de su nación por todos los medios junto a su hijo, Diego, quien siempre está obedientemente a su lado. Su gobierno opresivo ha prendido la mecha de la revolución.', '1299.00', 1, '../img/10.jpg', 199),
(11, 'Gears of war 5', 'Gears 5 se ha renovado por completo. Consigue esta aclamada campaña, el modo multijugador recargado y la expansión de la campaña Hivebuster como parte de Game of the Year Edition.', '599.60', 1, '../img/11.jpg', 250),
(12, 'Grand Theft Auto 5', 'Grand Theft Auto V: Edición Premium permite disfrutar por completo de la trama de Grand Theft Auto V, acceder gratuitamente al mundo en constante evolución de Grand Theft Auto Online y a todas las mejoras y contenidos existentes, como El Golpe del Fin del Mundo, Tráfico de armas, Contrabando, Motociclistas y mucho más. También se incluye el Pack de inicio Negocios criminales, la forma más rápida de dar un impulso a tu imperio criminal en Grand Theft Auto Online.', '599.00', 1, '../img/12.jpg', 300),
(13, 'Left 4 Dead', 'De la mano de Valve®, creadores de Counter-Strike®, Half-Life® y otros muchos juegos, llega Left 4 Dead™, una nueva aventura para PC y Xbox 360 que te meterá en la piel de uno de los cuatro \"supervivientes\" que libran una pugna de proporciones épicas contra hordas de zombis y sus terroríficas variedades mutantes especiales.\r\nAmbientado justo tras el estallido del largamente anunciado Apocalipsis zombi, la dinámica de juego cooperativa de Left 4 Dead se desarrolla en cuatro extensas \"películas\" que transcurren en diversos entornos urbanos y rurales. Cada \"película\" tiene sus objetivos generales de equipo, consta de cinco grandes mapas y permite participar a entre uno y cuatro jugadores.\r\nUtiliza la nueva tecnología bautizada como \"Director de IA\" para generar por procedimiento una experiencia diferente cada vez que se juega. Al igual que en los filmes de Hollywood, el Director hace entrar en escenas nuevos monstruos, sonidos y escenas de acción según va ajustando la dinámica de la partida a la actuación del equipo.', '299.00', 1, '../img/13.jpg', 300),
(14, 'Assassin\'s Creed 2', 'Assassin\'s Creed® 2 es la secuela del título que se convirtió en la nueva IP con unas ventas más rápidas de la historia de los videojuegos. Este título tan largamente esperado introduce a un nuevo héroe, Ezio Auditore da Firenze, un joven noble italiano, y una nueva era, el Renacimiento.\r\nAssassin\'s Creed 2 mantiene la esencia de la jugabilidad que convirtió al primer juego en un éxito arrollador e introduce nuevas experiencias que sorprenderán y desafiarán a los jugadores.\r\nAssassin\'s Creed 2 es una historia épica de familia, venganza y conspiración que tiene lugar en el prístino, aunque brutal, trasfondo de una Italia renacentista. Ezio entabla amistad con Leonardo da Vinci, se enfrenta con las familias más poderosas de Florencia y se aventura por los canales de Venecia donde aprende a ser un maestro asesino.', '399.00', 1, '../img/14.jpg', 300),
(15, 'Assassin\'s Creed Valhalla', 'Forja tu propia leyenda vikinga a 60 FPS y en resolución 4K con Xbox Series X.\r\nPonte en la piel de Eivor, una leyenda vikinga criada entre historias de batallas y gloria. Explora un precioso mundo abierto y cambiante ambientado en la despiadada Inglaterra de los años oscuros. Saquea a tus enemigos, haz prosperar tu asentamiento y consolida tu poder político mientras luchas por ganarte un sitio entre los dioses en el Valhalla.', '499.50', 1, '../img/15.jpg', 350),
(16, 'ARK', 'Varado, desnudo, congelado y hambriento en una isla misteriosa, tendrás que cazar, cosechar, fabricar artículos, cultivar y construir refugios para sobrevivir. Usa tu astucia y destreza para matar, entrenar, criar y montar a los dinosaurios y criaturas primitivas que habitan ARK. Únete a cientos de jugadores en línea o intenta sobrevivir individualmente en una sesión offline.', '529.00', 1, '../img/16.jpg', 350),
(17, 'Call of Duty: Black Ops', 'La saga de acción en primera persona más grande de todos los tiempos y la continuación del superventas del año pasado Call of Duty®: Modern Warfare 2 regresa en Call of Duty®: Black Ops.\r\nCall of Duty®: Black Ops te llevará más allá de las líneas enemigas como miembro de un equipo de fuerzas especiales de élite en misiones de guerra encubierta, operaciones secretas y conflictos explosivos por todo el planeta. Tendrás acceso al armamento y al equipo más exclusivos, esto te permitirá equilibrar la balanza durante la época más peligrosa que la humanidad ha conocido.', '799.50', 1, '../img/17.jpg', 350),
(18, 'GODFALL', 'Aperion está al borde de la ruina. Eres uno de los últimos caballeros valorianos, guerreros divinos capaces de usar las armaduras legendarias conocidas como Valorplates, que transforman a sus portadores en maestros imparables del combate cuerpo a cuerpo. Destroza a tus enemigos para avanzar por los reinos elementales y desafiar a Macros, el dios loco que espera en la cima. Asciende en Godfall, el primer RPG de acción looter-slasher centrado en el combate cuerpo a cuerpo.', '832.17', 1, '../img/18.jpg', 300),
(19, 'Planet Coaster', 'Sorprended, deleitad y emocionad a las masas con el parque temático de vuestros sueños. Construid y diseñad impresionantes parques de atracciones prestando atención hasta al más mínimo detalle y gestionadlo para hacer que cobre vida.\r\nConstrucción pieza a pieza: Planet Coaster convierte a cualquiera en un diseñador. Coloca rutas, construye paisajes, personaliza atracciones y haz que todo en tu parque sea único gracias a la construcción pieza a pieza y a más de mil componentes de edificios.\r\nModelado del terreno: Juega con la naturaleza y dale nueva forma a la tierra que pisas. Modela el terreno para elevar montañas, formar lagos, horadar cavernas y hasta construir islas en el cielo. Después haz pasar las montañas rusas a través de tu parque por encima y por debajo del nivel del suelo.\r\nAbsoluta verosimilitud: Recrea tus atracciones favoritas o deja a un lado el mundo real. Juegues como juegues, las atracciones más realistas y las reacciones más realistas de los visitantes hacen de Planet Coaster el simulador más auténtico de la historia.', '675.00', 1, '../img/19.jpg', 300),
(20, 'Returnal', 'Rompe el ciclo del caos en un planeta alienígena donde todo cambia constantemente.\r\nTras un aterrizaje forzoso en este mundo cambiante, Selene debe explorar el paisaje desolado de una antigua civilización para escapar. Aislada y sola, tiene que pelear con uñas y dientes para sobrevivir, pero se ve derrotada una y otra vez, y no tiene más opción que volver a empezar su travesía cada vez que muere.', '1499.99', 1, '../img/20.jpg', 300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuarios`
--

CREATE TABLE `tblusuarios` (
  `IDCliente` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblusuarios`
--

INSERT INTO `tblusuarios` (`IDCliente`, `Nombre`, `usuario`, `clave`) VALUES
(1, 'Admin', 'admin@correo.com', 'password'),
(2, 'roberto', 'roberto@correo.com', 'password'),
(3, 'Oscar', 'oscar@correo.com', 'password');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblventas`
--

CREATE TABLE `tblventas` (
  `ID` int(11) NOT NULL,
  `IDCliente` int(11) NOT NULL,
  `ClaveTransaccion` varchar(250) NOT NULL,
  `PaypalDatos` text NOT NULL,
  `Fecha` datetime NOT NULL,
  `Correo` varchar(5000) NOT NULL,
  `Total` decimal(60,2) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbldetalleventa`
--
ALTER TABLE `tbldetalleventa`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDVENTA` (`IDVENTA`),
  ADD KEY `IDPRODUCTO` (`IDPRODUCTO`),
  ADD KEY `IDUsuario` (`IDCliente`);

--
-- Indices de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD PRIMARY KEY (`IDCliente`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indices de la tabla `tblventas`
--
ALTER TABLE `tblventas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbldetalleventa`
--
ALTER TABLE `tbldetalleventa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  MODIFY `IDCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tblventas`
--
ALTER TABLE `tblventas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbldetalleventa`
--
ALTER TABLE `tbldetalleventa`
  ADD CONSTRAINT `tbldetalleventa_ibfk_1` FOREIGN KEY (`IDPRODUCTO`) REFERENCES `tblproductos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
