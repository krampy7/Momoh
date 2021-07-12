SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE momoh;

USE momoh;

-- --------------------------------------------------------

--
-- Estructura de la tabla 'categorias'
--
CREATE TABLE `categorias` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--
INSERT INTO `categorias` (`id`, `nombre`) 
VALUES
(1, 'Decolorante'),
(2, 'Peróxido'),
(3, 'Mousse'),
(4, 'Sellador'),
(5, 'Aceite'),
(6, 'Tratamineto'),
(7, 'Fluido'),
(8, 'Shampoo'),
(9, 'Mascarilla'),
(10, 'Inyección'),
(11, 'Microchip'),
(12, 'Peine'),
(13, 'Mariposa '),
(14, 'Tijera'),
(15, 'Estuche'),
(16, 'Brocha');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--
CREATE TABLE `usuario` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `fecha` date NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla `productos`
--
CREATE TABLE `productos` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(300) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` double NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `stock` varchar(200) NOT NULL,
  `id_categoria` int(30) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (id_categoria) REFERENCES categorias(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--
INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `stock`, `id_categoria`) 
VALUES
(1, 'Jojoba & keratin light: In powder / Versión 350 ', 'Polvo decolorante para cabello, con jojoba y proteína de queratina.', 185, '1.jpg', 'Disponible', 1),
(2, 'Jojoba & keratin light: In powder / Versión 680 ', 'Polvo decolorante para cabello, con jojoba y proteína de queratina.', 336, '2.jpg', 'Disponible', 1),
(3, 'Cream peroxide', 'Peróxido en crema para cabello.', 58, '3.jpg', 'No disponible', 2),
(4, 'Aminotech Styling Mousee', 'Es un mousse de fijación flexible, para cabello ondulado a rizado.', 163, '4.jpg', 'No disponible', 3),
(5, 'Impetuse Shine ', 'Sellador de puntas que ayuda a dar brillo y suavidad al cabello.', 87, '5.jpg', 'Disponible', 4),
(6, 'Aminotech oil treatment', 'Aceite de macadamia y argán para cabello.', 130, '6.jpg', 'Disponible', 5),
(7, 'Aminotech Therapy Mousse ', 'Es un tratamiento libre del alcohol en mousse a base de aceites concentrados de argán y macadamia que se deja puesto, promoviendo brillo, suavidad, flexibilidad y fuerza. ', 132, '7.jpg', 'Disponible', 6),
(8, 'Total Protection', 'Tratamiento capilar que ayuda a hidratar y a suavizar el cabello. Protege de los rayos del sol y facilita el desenredo.', 122, '8.jpg', 'Disponible', 6),
(9, 'Shampoo repair', 'Shampoo matizante para cabello rubio, con acentos de color violeta que ayudan a neutralizar los tonos amarillos y naranjas.', 91, '9.jpg', 'Disponible', 8),
(10, 'Pro Blonde shampoo', 'Shampoo matizante para cabello rubio, con acentos de color violeta que ayudan a neutralizar los tonos amarillos y naranjas. Uso para cabello rubio.', 91, '10.jpg', 'Disponible', 8),
(11, 'Tinte con formula 1+1', 'Incluye una ampolleta reconstructora y 1 peróxido de 90 ml.', 61, '11.jpg', 'Disponible', 9),
(12, 'Grapa café claro', 'Grapa con relleno de silicon para no dañar el cabello color café claro.', 290, '12.jpg', 'Disponible', 10),
(13, 'Grapa café medio', 'Grapa con relleno de silicon para no dañar el cabello color café medio.', 290, '13.jpg', 'Disponible', 10),
(14, 'Grapa café oscuro', 'Grapa con relleno de silicon para no dañar el cabello color café oscuro.', 290, '14.jpg', 'Disponible', 10),
(15, 'Grapa café negra', 'Grapa con relleno de silicon para no dañar el cabello color café negra.', 290, '15.jpg', 'Disponible', 10),
(16, 'Grapa blanca', 'Grapa con relleno de silicon para no dañar el cabello color café blanca.', 290, '16.jpg', 'Disponible', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--
CREATE TABLE `ventas` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(30) NOT NULL,
  `total` double NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (id_usuario) REFERENCES usuario(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--
CREATE TABLE `carrito` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `id_producto` int(30) NOT NULL,
  `cantidad` double NOT NULL,
  `id_usuario` int(30) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (id_producto) REFERENCES productos(id),
  FOREIGN KEY (id_usuario) REFERENCES usuario(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de la tabla `productos_venta`
--
CREATE TABLE `productos_venta` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `id_venta` int(30) NOT NULL,
  `id_producto` int(30) NOT NULL,
  `cantidad` double NOT NULL,
  `precio` double NOT NULL,
  `subtotal` double NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (id_venta) REFERENCES ventas(id),
  FOREIGN KEY (id_producto) REFERENCES productos(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

-- -----------------------------------------------------
-- Si no existe la tabla direcciones se crea
-- -----------------------------------------------------
CREATE TABLE `direcciones` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `calle` VARCHAR(45) NULL,
  `numero_exterior` VARCHAR(45) NULL,
  `numero_interior` VARCHAR(45) NULL,
  `estado` VARCHAR(45) NULL,
  `colonia` VARCHAR(45) NULL,
  `cp` VARCHAR(45) NULL,
  `municipio` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- --------------------------------------------------------

-- -----------------------------------------------------
-- Si no existe la tabla direcciones_usuario se crea
-- -----------------------------------------------------
CREATE TABLE `direcciones_usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `direcciones_id` INT NOT NULL,
  `usuario_id` INT NOT NULL,
  PRIMARY KEY (`id`, `direcciones_id`, `usuario_id`),
    FOREIGN KEY (`direcciones_id`)
    REFERENCES `direcciones` (`id`),
    FOREIGN KEY (`usuario_id`)
    REFERENCES `usuario` (`id`))
ENGINE = InnoDB;

INSERT INTO usuario(id, nickname, password, nombre, fecha, email)
VALUES(1, 'admin', 'admin123', 'Adrián', '2001-04-07', 'conocido@hotmail.com'),
(2, 'prueba', '123', 'Prueba', '2000-04-07', 'conocido2@hotmail.com');

INSERT INTO direcciones(id,calle, numero_exterior, numero_interior, estado, colonia, cp, municipio)
VALUES(1, 'Conocida', '1', '1', 'Jalisco', 'Conocida', '45000', 'Zapopan');

INSERT INTO direcciones_usuario(id,direcciones_id, usuario_id)
VALUES(1, 1, 2);

COMMIT;

SHOW DATABASES;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;