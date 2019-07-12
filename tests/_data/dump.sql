-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "amp" ------------------------------------------
CREATE TABLE `amp` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`expediente` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`fecha` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`numdoc` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`clasificacion` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`signatura` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`observaciones` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`knosysid` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 23955;
-- -------------------------------------------------------------


-- CREATE TABLE "anarbe" ---------------------------------------
CREATE TABLE `anarbe` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`expediente` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`fecha` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`numdoc` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`clasificacion` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`signatura` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`observaciones` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`knosysid` TinyText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 438;
-- -------------------------------------------------------------


-- CREATE TABLE "argazki" --------------------------------------
CREATE TABLE `argazki` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`deskribapena` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`barrutia` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`fecha` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`gaia` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`neurria` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`kolorea` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`zenbakia` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`oharrak` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`numdoc` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`knosysid` TinyText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1064;
-- -------------------------------------------------------------


-- CREATE TABLE "ciriza" ---------------------------------------
CREATE TABLE `ciriza` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`signatura` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`data` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`deskribapena` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`sailkapena` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`oharrak` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`numdoc` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`knosysid` TinyText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 165;
-- -------------------------------------------------------------


-- CREATE TABLE "consultas" ------------------------------------
CREATE TABLE `consultas` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`izena` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`helbidea` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`gaia` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`enpresa` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`kontsulta` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`numdoc` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`knosysid` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1884;
-- -------------------------------------------------------------


-- CREATE TABLE "entradas" -------------------------------------
CREATE TABLE `entradas` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`data` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`igorlea` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`deskribapena` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`signatura` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`numdoc` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`knosysid` TinyText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 13216;
-- -------------------------------------------------------------


-- CREATE TABLE "euskera" --------------------------------------
CREATE TABLE `euskera` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`espedientea` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`data` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`sailkapena` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`signatura` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`oharrak` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`numdoc` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`knosysid` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 169;
-- -------------------------------------------------------------


-- CREATE TABLE "gazteria" -------------------------------------
CREATE TABLE `gazteria` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`espedientea` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`data` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`sailkapena` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`signatura` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`oharrak` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`numdoc` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`knosysid` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 239;
-- -------------------------------------------------------------


-- CREATE TABLE "hutsak" ---------------------------------------
CREATE TABLE `hutsak` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`egoera` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`signatura` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`zaharra` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`berria` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`numdoc` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`knosysid` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 196;
-- -------------------------------------------------------------


-- CREATE TABLE "kontratazioa" ---------------------------------
CREATE TABLE `kontratazioa` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`espedientea` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`urtea` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`sailkapena` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`signatura` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`numdoc` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`knosysid` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 218;
-- -------------------------------------------------------------


-- CREATE TABLE "kultura" --------------------------------------
CREATE TABLE `kultura` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`espedientea` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`data` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`sailkapena` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`signatura` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`oharrak` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`numdoc` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`knosysid` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 175;
-- -------------------------------------------------------------


-- CREATE TABLE "liburuxka" ------------------------------------
CREATE TABLE `liburuxka` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`deskribapena` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`data` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`azalpenak` TinyText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`signatura` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`numdoc` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`knosysid` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 22;
-- -------------------------------------------------------------


-- CREATE TABLE "obratxikiak" ----------------------------------
CREATE TABLE `obratxikiak` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`espedientea` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`sailkapena` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`signatura` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`urtea` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`numdoc` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`knosysid` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1120;
-- -------------------------------------------------------------


-- CREATE TABLE "pendientes" -----------------------------------
CREATE TABLE `pendientes` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`espedientea` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`data` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`signatura` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`numdoc` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`knosysid` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 966;
-- -------------------------------------------------------------


-- CREATE TABLE "protokoloak" ----------------------------------
CREATE TABLE `protokoloak` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`artxiboa` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`saila` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`signatura` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`eskribaua` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`data` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`laburpena` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`datuak` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`oharrak` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`bilatzaileak` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`numdoc` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`knosysid` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 10578;
-- -------------------------------------------------------------


-- CREATE TABLE "salidas" --------------------------------------
CREATE TABLE `salidas` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`espedientea` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`signatura` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`eskatzailea` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`irteera` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`sarrera` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`knosysid` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`numdoc` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 15844;
-- -------------------------------------------------------------


-- CREATE TABLE "tablas" ---------------------------------------
CREATE TABLE `tablas` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`serie` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`unidad` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`resolucion` LongText CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`observaciones` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`fecha` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`knosysid` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`numdoc` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 25;
-- -------------------------------------------------------------


-- Dump data of "amp" --------------------------------------
INSERT INTO `amp`(`id`,`expediente`,`fecha`,`numdoc`,`clasificacion`,`signatura`,`observaciones`,`knosysid`) VALUES 
( '1', 'Celebración del Congreso de Municipios de Euskadi.  (Jornadas de Estudio de Administración Local)
', '1981 - 1982
', '11', '1·1 Pleno
', '100-1
', '', '#423120801C780D6EA3EA840' ),
( '2', 'Elección de representante para el Consejo Territorial de Bienestar Social de Gipuzkoa y acta número uno de constitución del Consejo
', '1984
', '25', '1·1 Pleno
', '650-1
', '', '#423120801C780D6EA77E0B0' ),
( '3', 'Apoyo de la Corporación a la instalación de cámaras frigoríficas por MEIPI
', '1985
', '27', '1·1 Pleno
', '245-10
', '', '#423120801C780D6EA817DA0' ),
( '4', 'Agradecimiento del Alcalde de Donostia por la actuación municipal en el incendio ocurrido el día 12 de abril de 1985 en las instalaciones de Koipe SA
', '1985
', '28', '1·1 Pleno
', '786-12
', '', '#423120801C780D6EA83C790' ),
( '5', 'Acuerdo sobre aplicación del artículo 3º del Real Decreto-Ley 1/1986, de 14 de marzo, por el que se suprime el Impuesto sobre Actos Jurídicos Documentados que grava las instancias y documentos de las Oficinas Públicas
', '1986
', '30', '1·1 Pleno
', '621-5
', '', '#423120801C780D6EA8D6480' ),
( '6', 'Acuerdo sobre designación de letrados en asuntos contenciosos
', '1987
', '31', '1·1 Pleno
', '619-6
', '', '#423120801C780D6EA8FD580' ),
( '7', 'Elección de consejeros representantes del Ayuntamiento en los órganos de gobierno de la CAM de San Sebastián
', '1988
', '32', '1·1 Pleno
', '694-2
', '', '#423120801C780D6EA949070' ),
( '8', 'Creación de una comisión de normalización del euskera en el municipio
', '1988
', '33', '1·1 Pleno
', '694-11
', '', '#423120801C780D6EA994B60' ),
( '9', 'Elecciones de Juez de Paz para los Juzgados de Pasai Donibane y Pasai San Pedro
', '1989
', '34', '1·1 Pleno
', '856-12
', '', '#423120801C780D6EA9BBC60' ),
( '10', 'Nombramiento de consejeros de la Kutxa en representación del Ayuntamiento
', '1989
', '35', '1·1 Pleno
', '840-7
', '', '#423120801C780D6EAA07750' ),
( '11', 'Declaración de la Junta de Portavoces sobre uso y utilización de las instalaciones deportivas Kalparra
', '1992
', '37', '1·1 Pleno
', '876-6
', '', '#423120801C780D6EAA9ED30' ),
( '12', 'Designación de Consejeros Generales de la Kutxa en representación del Ayuntamiento. Incluye estatutos
', '1992
', '38', '1·1 Pleno
', '847-4
', '', '#423120801C780D6EAAC5E30' ),
( '13', 'Constitución de la Comisión Informativa de Juventud
', '1993
', '39', '1·1 Pleno
', '847-6
', '', '#423120801C780D6EAB11920' ),
( '14', 'Designación de Consejeros para la Kutxa
', '1994
', '40', '1·1 Pleno
', '876-8
', '', '#423120801C780D6EAB5FB20' ),
( '15', 'Tomas de posesión de nuevos concejales, dimisiones, composición de las comisiones informativas, etc.
', '1979 - 1983
', '44', '1·1 Expedientes de constitución de Ayuntamiento
', '676-6
', '', '#423120801C780D6EAC42BF0' ),
( '16', 'Renovación del Ayuntamiento
', '1991
', '47', '1·1 Expedientes de constitución de Ayuntamiento
', '847-5
', '', '#423120801C780D6EAD012D0' ),
( '17', 'Propuestas para el aumento del número de concejales en el distrito de Trintxerpe hechas por diversas asociaciones culturales
', '1963 - 1966
', '93', '1·1 Expedientes de sesiones : mociones , borradores
', '249-7
', 'Incluye dos ejemplares de la revista Trincherpe
', '#423120801C780D6EB8C8500' ),
( '18', 'Certificado del acuerdo adoptado por el Pleno del Ayuntamiento el 10/12/1979 sobre el proyecto de Ley de centros docentes , remitido a diferentes instituciones locales
', '1979
', '96', '1·1 Expedientes de sesiones : mociones , borradores
', '95-2
', '', '#423120801C780D6EB9ADCE0' ),
( '19', 'Escrito de los vecinos de Pasai Donibane sobre entrada de buques y obras de dragado frente a las fachadas de las casas en el puerto
', '1983
', '108', '1·1 Expedientes de sesiones : mociones , borradores
', '245-6
', '', '#423120801C780D6EBDFFC30' ),
( '20', 'Mociones 
', '1986
', '117', '1·1 Expedientes de sesiones : mociones , borradores
', '615-5
', '', '#423120801C780D6EC0621D0' ),
( '21', 'Mociones
', '1987
', '118', '1·1 Expedientes de sesiones : mociones , borradores
', '619-7
', '', '#423120801C780D6EC0ADCC0' ),
( '22', 'Moción sobre integración en la Asociación de Municipios Vascos - EUDEL
', '1988
', '119', '1·1 Expedientes de sesiones : mociones , borradores
', '928-7
', '', '#423120801C780D6EC0F97B0' ),
( '23', 'Mociones presentadas por los Corporativos y otros 
', '1988
', '120', '1·1 Expedientes de sesiones : mociones , borradores
', '698-2
', '', '#423120801C780D6EC1452A0' ),
( '24', 'Mociones.
Contiene moción sobre revocación de la autorización a AEK sobre el uso del local sito en la c/ Zumalakarregi, 9      
', '1989
', '121', '1·1 Expedientes de sesiones : mociones , borradores
', '880-6
', '', '#423120801C780D6EC1934A0' ),
( '25', 'Mociones
', '1990
', '122', '1·1 Expedientes de sesiones : mociones , borradores
', '880-7
', '', '#423120801C780D6EC1B7E90' ),
( '26', 'Mociones
', '1991
', '123', '1·1 Expedientes de sesiones : mociones , borradores
', '880-8
', '', '#423120801C780D6EC206090' ),
( '27', 'Mociones
', '1992
', '124', '1·1 Expedientes de sesiones : mociones , borradores
', '880-9
', '', '#423120801C780D6EC251B80' ),
( '28', 'Mociones
', '1993
', '125', '1·1 Expedientes de sesiones : mociones , borradores
', '881-1
', '', '#423120801C780D6EC29D670' ),
( '29', 'Mociones
', '1994
', '126', '1·1 Expedientes de sesiones : mociones , borradores
', '881-3
', '', '#423120801C780D6EC2E9160' ),
( '30', 'Mociones
', '1995
', '127', '1·1 Expedientes de sesiones : mociones , borradores
', '913-8
', '', '#423120801C780D6EC337360' );
-- ---------------------------------------------------------


-- Dump data of "anarbe" -----------------------------------
INSERT INTO `anarbe`(`id`,`expediente`,`fecha`,`numdoc`,`clasificacion`,`signatura`,`observaciones`,`knosysid`) VALUES 
( '1', 'Oficio de la Mancomunidad solicitando se adopte acuerdo plenario autorizando y avalando a la Mancomunidad en la solicitud de un crédito al Banco de Crédito Local.
', '30/07/1971
', '0', '2·8·1 Créditos y emisiones de deuda
', '609-4 nº12
', '', '#423120801C77C32DBC1AAE0' ),
( '2', 'Acta de aprobación de los Estatutos y Ordenanzas de la Mancomunidad Municipal de Aguas del Embalse del Río Añarbe, verificada por los alcaldes de Hernani, Lezo, Oyarzun, Pasaia, Rentería, San Sebastián, Urnieta y Usurbil, municipios integrantes de la misma.
', '25/08/1967
', '1', '2·8·1 Fase de Creación
', '608-3 nº20
', '', '#423120801C77C32DC0BAC30' ),
( '3', 'Acta de la Comisión de Estatutos de la proyectada Mancomunidad de aguas.
', '03/02/1966
', '2', '2·8·1 Fase de Creación
', '608-2 nº6
', '', '#423120801C77C32DC2379F0' ),
( '4', 'Acta de la Comisión de Estudio para la creación reglamentaria de la Mancomunidad de Aguas del Añarbe.
', '04/12/1965
', '3', '2·8·1 Fase de Creación
', '608-1 nº21
', '', '#423120801C77C32DC2834E0' ),
( '5', 'Acta de la Comisión redactora de los Estatutos y Ordenanzas.
', '02/04/1966
', '4', '2·8·1 Fase de Creación
', '608-2 nº12
', '', '#423120801C77C32DC2AA5E0' ),
( '6', 'Acta de la reunión de trabajo celebrada por la Mancomunidad, sobre el reparto de caudales de agua.
', '07/04/1987
', '5', '2·8·1 Abastecimiento, Caudales y Tarifas
', '614-4 nº5
', '', '#423120801C77C32DC2F60D0' ),
( '7', 'Acta de la reunión entre la Administración y los ofertantes al concurso de proyecto, ejecución y puesta en servicio de una instalación de telemedida, telemando y telecontrol en la red de abastecimiento de agua  a la comarca de  San Sebastián.
', '05/09/1985
', '6', '2·8·1 Instalaciones de Telemando, Telemedida y Telecontrol
', '612-1 nº25
', '8 folios
', '#423120801C77C32DC341BC0' ),
( '8', 'Acta de la reunión mantenida por los ayuntamientos mancomunados para establecer unas bases de acuerdo en sus diferencias con San Sebastián en el asunto de Añarbe.
', '02/06/1967
', '7', '2·8·1 Fase de Creación
', '608-3 nº12
', '', '#423120801C77C32DC38FDC0' ),
( '9', 'Acta de la sesión convocada para el levantamiento de las actas previas de ocupación de los terrenos a ocupar por la estación de tratamiento de aguas provenientes del embalse del Añarbe.
', '20/08/1986
', '8', '2·8·1 Estación de tratamiento. Calidad del agua
', '614-2 nº3
', '3 folios + 18 folios de anexos.
ANEXOS:Resúmenes de las reuniones mantenidas con los propietarios de las fincas afectadas: 15,19 y 28 de mayo, 4 de junio y 2 de julio, tres recortes de prensa y fotocopia B.O.G. de 5 de agosto
', '#423120801C77C32DC3DB8B0' ),
( '10', 'Acta de la sesión plenaria de este ayuntamiento aprobatoria de las gestiones de la Presidencia.
', '15/04/1966
', '9', '2·8·1 Fase de Creación
', '608-2 nº15
', '(Acuerdo y certifico)
', '#423120801C77C32DC4029B0' ),
( '11', 'Acta de los ensayos de los equipos de telemedida, telemando y telecontrol.
', '01/10/1986
', '10', '2·8·1 Instalaciones de Telemando, Telemedida y Telecontrol
', '614-2 nº7
', '', '#423120801C77C32DC44E4A0' ),
( '12', 'Acta incompleta de la Junta de la Mancomunidad relativa a los sifones de agua de Choritoquieta.
', '10/05/1978
', '11', '2·8·1 Depósitos y Conducciones
', '610-3 nº3
', '', '#423120801C77C32DC4C1090' ),
( '13', 'Acuerdo adoptado por la Comisión Permanente relativo al presupuesto de la Mancomunidad para 1974.
', '18/10/1973
', '12', '2·8·1 Presupuesto
', '609-6 nº4
', '', '#423120801C77C32DC50CB80' ),
( '14', 'Acuerdo adoptado por la Junta de la Mancomunidad agradeciendo a los corporativos y funcionarios por el trabajo realizado en orden a la creación legal de ésta.
', '13/01/1969
', '13', '2·8·1 Junta
', '609-2 nº2
', '', '#423120801C77C32DC558670' ),
( '15', 'Acuerdo adoptado por la Junta de la Mancomunidad distribuyendo los caudales entre los pueblos mancomunados.
', '14/04/1971
', '14', '2·8·1 Abastecimiento, Caudales y Tarifas
', '609-4 nº7
', 'Traslado del día 22
', '#423120801C77C32DC5A4160' ),
( '16', 'Acuerdo adoptado por la Junta de la Mancomunidad sobre establecimiento de un canon de mejora sobre las tarifas para hacer frente a los compromisos, proponiendo la idea de la unificación de tarifas en toda la Comarca.
', '14/04/1971
', '15', '2·8·1 Abastecimiento, Caudales y Tarifas
', '609-4 nº8
', 'Traslado del día 22
', '#423120801C77C32DC5CB260' ),
( '17', 'Acuerdo adoptado por la Junta de la Mancomunidad el día 15 remitido por el Presidente de ésta al Diputado General relativo a la subvención de la estación de tratamiento de aguas.
', '19/11/1984
', '16', '2·8·1 Estación de tratamiento. Calidad del agua
', '611-1 nº15
', '', '#423120801C77C32DC616D50' ),
( '18', 'Acuerdo de la Comisión de Gobierno aprobando la aportación al presupuesto de la Mancomunidad correspondiente al primer trimestre.
', '28/07/1986
', '17', '2·8·1 Aportaciones del Ayuntamiento
', '614-1 nº27
', 'Acompaña Oficio de la Mancomunidad solicitando la aportación indicada del día 15.
', '#423120801C77C32DC664F50' ),
( '19', 'Acuerdo de la Comisión Municipal Permanente relativo a las aportaciones a la Mancomunidad.
', '21/11/1968
', '18', '2·8·1 Aportaciones del Ayuntamiento
', '609-1 nº23
', '', '#423120801C77C32DC689940' ),
( '20', 'Acuerdo de la Comisión Permanente aprobando la aportación al presupuesto ordinario de la Mancomunidad, ejercicio de 1984.
', '03/12/1984
', '19', '2·8·1 Aportaciones del Ayuntamiento
', '611-1 nº16
', 'Acompaña oficio de la Mancomunidad solicitando dicha aportación.
', '#423120801C77C32DC6D5430' ),
( '21', 'Acuerdo de la Comisión Permanente para abonar la mitad de la aportación correspondiente al presupuesto de la Mancomunidad para el presente año.
', '03/06/1985
', '20', '2·8·1 Aportaciones del Ayuntamiento
', '612-1 nº20
', '', '#423120801C77C32DC723630' ),
( '22', 'Acuerdo de la Corporación nombrando sus dos representantes en la Junta de la Mancomunidad.
', '23/07/1987
', '21', '2·8·1 Junta
', '614-4 nº13
', '', '#423120801C77C32DC76F120' ),
( '23', 'Acuerdo de la Junta de la Mancomunidad solicitando a los ayuntamientos información sobre los pasos seguidos para la constitución de la Mancomunidad.
', '06/09/1968
', '22', '2·8·1 Junta
', '609-1 nº21
', 'Traslado del día 11
', '#423120801C77C32DC796220' ),
( '24', 'Acuerdo de la Junta de la Mancomunidad determinando nombrar los representantes de los municipios en la Junta para tres años.
', '22/01/1977
', '23', '2·8·1 Junta
', '610-2 nº2
', 'Traslado del día 5 de Febrero.
', '#423120801C77C32DC7E1D10' ),
( '25', 'Acuerdo de la Junta de la Mancomunidad sobre proyectos de depósitos de agua.
', '14/04/1971
', '24', '2·8·1 Depósitos y Conducciones
', '609-4 nº9
', 'Traslado del día 22.
', '#423120801C77C32DC82D800' ),
( '26', 'Acuerdo de la Junta de la Mancomunidad relativo a la financiación de las obras necesarias para el abastecimiento de agua a la comarca.
', '14/05/1969
', '25', '2·8·1 Abastecimiento, Caudales y Tarifas
', '609-2 nº7
', 'Traslado del día 23
', '#423120801C77C32DC8792F0' ),
( '27', 'Acuerdo de la Junta de la Mancomunidad estableciendo la distribución provisional de caudales del embalse de Añarbe.
', '30/05/1977
', '26', '2·8·1 Abastecimiento, Caudales y Tarifas
', '610-2 nº4
', '', '#423120801C77C32DC8A03F0' ),
( '28', 'Acuerdo de la Junta de la Mancomunidad Municipal de Aguas del Embalse del Río Añarbe, por el que se convocan para el levantamiento de las actas previas a la ocupación de las fincas afectadas por la ejecución de las obras correspondientes al "Pliego de bases para el Concurso del Proyecto, Ejecución y Puesta en Servicio de la 1ª Fase de Estación de Tratamiento de Aguas provenientes del Embalse del Añarbe. BOPG nº 147, págs.: 2.909 - 2.910.
', '05/08/1986
', '27', '2·8·1 Estación de tratamiento. Calidad del agua
', '614-1 nº28
', '', '#423120801C77C32DC8EBEE0' ),
( '29', 'Acuerdo de la Junta de la Mancomunidad aprobando el proyecto de presupuesto ordinario de 1981.
', '08/07/1981
', '28', '2·8·1 Presupuesto
', '610-6 nº3
', 'Certificado del 16 de septiembre
', '#423120801C77C32DC9379D0' ),
( '30', 'Acuerdo del Consejo de Ministros sobre abastecimiento, saneamiento y depuración de aguas en municipios turísticos.
', '29/07/1980
', '29', '2·8·1 Legislación
', '610-5 nº6
', '', '#423120801C77C32DC985BD0' );
-- ---------------------------------------------------------


-- Dump data of "argazki" ----------------------------------
INSERT INTO `argazki`(`id`,`deskribapena`,`barrutia`,`fecha`,`gaia`,`neurria`,`kolorea`,`zenbakia`,`oharrak`,`numdoc`,`knosysid`) VALUES 
( '1', 'Tarjeta postal de una batelera. Al fondo, San Pedro.
', 'San Juan y San Pedro.
', 'Desconocida
', 'Batelera
', '14 x 9 cms.
', 'Coloreada
', '11
', 'guregipuzkoa 
', '0', '#423120801C77C34D0D14DF0' ),
( '2', 'Barco atracado en el puerto de Pasai San Pedro. Al fondo, Jaizkibel.
', 'San Pedro y San Juan
', 'Julio 1918
', 'Buque, puerto
', '6 X 9 cms.
', 'Blanco y negro
', '12
', 'Texto: "Freva (¿nombre del barco?) Pasajes. Julio 1918"
', '1', '#423120801C77C34D0D608E0' ),
( '3', 'Vista desde el puerto de Herrera de San Pedro, en primer término, y San Juan al fondo.
', 'San Pedro y San Juan
', 'Julio de 1918
', 'Puerto, Monte Jaizkibel
', '6 X 9 cms.
', 'Blanco y negro
', '13
', 'Texto: "Los dos Pasajes. Julio 1918"
', '2', '#423120801C77C34D0EDFDB0' ),
( '4', 'Vista del puerto de Trintxerpe. 
', 'Trintxerpe
', 'Septiembre de 1925
', 'Puerto
', '6 X 9 cms.
', 'Blanco y negro
', '20
', 'Texto: "Pasajes. Septiembre-925"
', '3', '#423120801C77C34D0F50290' ),
( '5', 'Vista del puerto desde Buenavista hacia Herrera y Trintxerpe.
', 'Trintxerpe
', 'Septiembre de 1925
', 'Puerto, Herrera.
', '6 X 9 cms.
', 'Blanco y negro
', '21
', 'Texto: "Pasajes. Septiembre-925"
', '4', '#423120801C77C34D0F9E490' ),
( '6', 'Barco entrando al puerto, a su paso por el Castillo de Santa Isabel.
', 'San Juan
', '1918 - 1925
', 'Buque, Castillo de Santa Isabel
', '6 X 9 cms.
', 'Blanco y negro
', '25
', 'No se especifica el año en la fotografía, pero es de igual formato que las anteriores (fotografías nº 12 - 27), por lo que se supone que se realizó entre los años 1918 y 1925.
', '5', '#423120801C77C34D0FE9F80' ),
( '7', 'Barcos y txalupas frente al Castillo de Santa Isabel.
', 'San Juan
', '1918 - 1925
', 'Buque, Castillo de Santa Isabel, txalupa
', '6 X 9 cms.
', 'Blanco y negro
', '26
', 'No se especifica el año en la fotografía, pero es de igual formato que las anteriores (fotografías nº 12 - 27), por lo que se supone que se realizó entre los años 1918 y 1925.
', '6', '#423120801C77C34D1035A70' ),
( '8', 'Barcos y txalupas frente a la bocana de Pasaia
', 'San Juan y San Pedro
', '1918 - 1925
', 'Buque, Txalupa, bocana
', '6 X 9 cms.
', 'Blanco y negro
', '27
', 'No se especifica el año en la fotografía, pero es de igual formato que las anteriores (fotografías nº 12 - 27), por lo que se supone que se realizó entre los años 1918 y 1925.
', '7', '#423120801C77C34D10A8660' ),
( '9', 'Tarjeta postal de Pasajes. Vista desde Buenavista del puerto de Herrera, en frente Trintxerpe y San Pedro, y a la derecha de la imagen San Juan.
', 'San Juan, San Pedro y Trintxerpe
', 'Desconcida
', 'Ulia, Jaizkibel, Iglesia de San Pedro, puerto.
', '9 X 14 cms.
', 'Blanco y negro
', '28
', 'Texto: "Pasajes. nº 13. Vista parcial. Vue partielle. Partial view.Manipel. Rto nº 142205"
', '8', '#423120801C77C34D10F4150' ),
( '10', 'Tarjeta postal del Puerto de Pasaia, realizada desde Don Bosco.
', 'Antxo, San Juan y San Pedro
', 'Desconocida
', 'Bocana, barco, puerto, vista general
', '14 X 9 cms.
', 'Coloreada
', '31
', 'Texto en la parte trasera: "Pasajes: Vista General del Puerto"
', '9', '#423120801C77C34D1142350' ),
( '11', 'Alameda de Antxo. Al fondo lo que hoy en día son, Gure Zumardia, 30 y el bar Kamio.
', 'Antxo
', 'Desconocida
', 'Gure zumardia, 30; bar Camio, plaza
', '24 X 18 cms.
', 'Blanco y negro
', '32
', '', '10', '#423120801C77C34D11B2830' ),
( '12', 'Estado en el que quedó la imprenta La Vasconia Vda. de Ribate y Cía. tras la inundación de Pasai Antxo. Vista del exterior, con la tejabana derrumbada.
', 'Antxo
', '1933
', 'Inundaciones, imprenta
', '17 X 12 cms.
', 'Blanco y negro
', '33
', 'Texto escrito en la pared: "Papelera Aurora. Ramon Puertolas. Fábrica de libros, sobres, estuches y bolsas"
', '11', '#423120801C77C34D1200A30' ),
( '13', 'Estado en el que quedó la imprenta La Vasconia Vda. de Ribate y Cía. tras la inundación de Pasai Antxo. Vista del interior, con las máquinas y los papeles destruidos.
', 'Antxo
', '1933
', 'Inundaciones, imprenta, maquinaria
', '17 X 12 cms.
', 'Blanco y negro
', '34
', '', '12', '#423120801C77C34D124C520' ),
( '14', 'Estado en el que quedó la imprenta La Vasconia Vda. de Ribate y Cía. tras la inundación de Pasai Antxo. Vista del interior, con las máquinas y los armarios destruidos.
', 'Antxo
', '1933
', 'Inundaciones, imprenta, maquinaria
', '17 X 12 cms.
', 'Blanco y negro
', '35
', '', '13', '#423120801C77C34D1298010' ),
( '15', 'Estado en el que quedó la imprenta La Vasconia Vda. de Ribate y Cía. tras la inundación de Pasai Antxo. Vista del interior, con las máquinas y los papeles destruidos.
', 'Antxo
', '1933
', 'Inundaciones, imprenta, maquinaria
', '17 X 12 cms.
', 'Blanco y negro
', '36
', '', '14', '#423120801C77C34D130AC00' ),
( '16', 'Estado en el que quedó la imprenta La Vasconia Vda. de Ribate y Cía. tras la inundación de Pasai Antxo. Vista del interior, con todos los papeles destruidos.
', 'Antxo
', '1933
', 'Inundaciones, imprenta
', '17 X 12 cms.
', 'Blanco y negro
', '37
', '', '15', '#423120801C77C34D13566F0' ),
( '17', 'Estado en el que quedó la imprenta La Vasconia Vda. de Ribate y Cía. tras la inundación de Pasai Antxo. Vista del interior, con las máquinas y los papeles destruidos.
', 'Antxo
', '1933
', 'Inundaciones, imprenta, maquinaria
', '17 X 12 cms.
', 'Blanco y negro
', '38
', '', '16', '#423120801C77C34D13A48F0' ),
( '18', 'Estado en el que quedó la imprenta La Vasconia Vda. de Ribate y Cía. tras la inundación de Pasai Antxo. Vista del interior, con las máquinas destruidas.
', 'Antxo
', '1933
', 'Inundaciones, imprenta, maquinaria
', '17 X 12 cms.
', 'Blanco y negro
', '39
', '', '17', '#423120801C77C34D13F03E0' ),
( '19', 'Estado en el que quedó la imprenta La Vasconia Vda. de Ribate y Cía. tras la inundación de Pasai Antxo. Vista del interior, con las máquinas y los papeles destruidos.
', 'Antxo
', '1933
', 'Inundaciones, imprenta, maquinaria
', '17 X 12 cms.
', 'Blanco y negro
', '40
', '', '18', '#423120801C77C34D143BED0' ),
( '20', 'Estado en el que quedó la imprenta La Vasconia Vda. de Ribate y Cía. tras la inundación de Pasai Antxo. Vista del interior, con las máquinas y los papeles destruidos.
', 'Antxo
', '1933
', 'Inundaciones, imprenta, maquinaria
', '17 X 12 cms.
', 'Blanco y negro
', '41
', '', '19', '#423120801C77C34D14879C0' ),
( '21', 'Embarcadero de Pasai Donibane. Al fondo el Palacio Villaviciosa, sito en  C/ San Juan, 76, y la tienda de Helados "La Marvilla".
', 'San Juan
', 'Desconocida
', 'Puerto, Heladería; San Juan, 76, Villaviciosa
', '18 X 13 cms.
', 'Blanco y negro
', '42
', 'Dos copias
Texto de la Heladería: " Helados de Corte. La Maravilla"
', '20', '#423120801C77C34D14FA5B0' ),
( '22', 'Humilladero de La Piedad y Palacio Villaviciosa en C/ San Juan, 76.
', 'San Juan
', 'Desconocida
', 'San Juan, 76; Humilladero, Villaviciosa
', '13 x 18 cms
', 'Blanco y negro
', '43
', 'Dos copias
Texto en la placa de la verja: " Ex-voto de  gracias por la batalla librada en Roncesvalles contra el ejército invasor de Carlo-Magno 
Texto en la placa del Palacio: "Helados de Corte. La Maravilla"
', '21', '#423120801C77C34D156D1A0' ),
( '23', 'Grupo escolar Nuestra Señora del Carmen en Trintxerpe.
', 'Trintxerpe
', 'Desconocida
', 'Colegio, arquitectura, niños
', '24 x 17 cms.
', 'Blanco y negro
', '47
', 'Texto en la pared: "Niñas. Año 1947. Grupo Escolar N
S
 del Carmen. Niños"
', '23', '#423120801C77C34D1606E90' ),
( '24', 'Escuelas municipales de San Pedro.
', 'San Pedro
', 'Desconocida
', 'Colegio, niños, arquitectura
', '24 x 17 cms.
', 'Blanco y negro
', '44
', '', '24', '#423120801C77C34D1652980' ),
( '25', 'Escuelas Nacionales de Pasai Antxo, sitas en C/ Hamarretxeta, 12 ó Plaza Biteri, 6.
', 'Antxo
', 'Desconocida
', 'Colegio, arquitectura, niños
', '17 x 24 cms.
', 'Blanco y negro
', '46
', '', '25', '#423120801C77C34D169E470' ),
( '26', 'Escuelas de Pasai Donibane, sitas en la Plaza J.J. Otaegi, 1.
', 'San Juan
', 'Desconocida
', 'Colgeio, arquitectura
', '24 x 17 cms.
', 'Blanco y negro
', '48
', '', '26', '#423120801C77C34D1711060' ),
( '27', 'El barco "Sendeja" amarrado y una grua trabajando en el puerto de Antxo. A la derecha y a la izquierda de la imagen, se ven San Juan y San Pedro.
', 'Antxo, San Juan y San Pedro
', 'Desconocida
', 'Puerto, buque, grua, trabajos de descarga
', '13 x 17 cms.
', 'Blanco y negro
', '49
', '', '27', '#423120801C77C34D175CB50' ),
( '28', 'El barco "Empire State" amarrado en el puerto de Antxo. Al fondo, se ve Herrera
', 'Antxo
', 'Desconocida
', 'Buque, grua
', '11 x 16 cms.
', 'Blanco y negro
', '51
', '', '28', '#423120801C77C34D17A8640' ),
( '29', 'Vista del puerto de Antxo al anochecer.
', 'Antxo
', 'desconocida
', 'Puerto, grua
', '17 x 12 cms.
', 'Blanco y negro
', '52
', '', '29', '#423120801C77C34D17F6840' ),
( '30', 'Vista de dos edificios de la Autoridad Portuaria situados en el puerto de Antxo, desde Buenavista. Al fondo, San Juan.
', 'Antxo y San Juan.
', 'Desconocida
', 'Iglesia de San Juan Bautista, puerto, Autoridad Portuaria
', '17 x 12 cms.
', 'Blanco y negro
', '53
', '', '30', '#423120801C77C34D1842330' );
-- ---------------------------------------------------------


-- Dump data of "ciriza" -----------------------------------
INSERT INTO `ciriza`(`id`,`signatura`,`data`,`deskribapena`,`sailkapena`,`oharrak`,`numdoc`,`knosysid`) VALUES 
( '1', 'CI - 1
', '1977, 1979 eta 1980 urteetako nominak / Nóminas de 1977, 1979 y 1980
', '01-01-1977 / 31-12-1980
', '2.4. Nominak
', ' Alfabetikoki abizenez ordenatua. Casa Ciriza, S.A. TRANSHUE enpresako agente eta akziodunaren jabetzako Marcelina de Ciriza eta Virgen del Carmen itsasontzietako langileen nominak izan daitezke. / Ordenado por apellido alfabéticamente. Posiblemente nóminas de los trabajadores de Marcelina de Ciriza y Virgen de la Estrella propiedad de Casa Ciriza, S.A. agente y accionista de TRANSHUE, S.A.
', '0', '#40079EF01C95F761C300AE0' ),
( '2', 'CI - 2.01
', 'Casa Ciriza, S.A. TRANSHUE enpresako agente eta akziodunaren jabetzako Marcelina de Ciriza eta Virgen del Carmen itsasontzietako ontziratze-kontratuak / Contratos de embarque para los buques Marcelina de Ciriza y Virgen de la Estrella propiedad de Casa Ciriza, S.A. agente y accionista de TRANSHUE, S.A.y registrados en Argentina
', '01-01-1977 / 31-12-1980 
', '2.1. Kontratazioa
', '', '1', '#40079EF01C95F7746955AF0' ),
( '3', 'CI - 2.02
', 'Necochean (Argentina) gertatutako uholeei buruzko berriak Ecos Diarios eta El Atlántico egunkarietan / Periódicos Ecos Diarios y El Atlántico que recogen las noticias sobre inundaciones en Necochea (Argentina)
', '30-04-1980 / 05-07-1980
', '4.2. Flota
', '', '2', '#40079EF01C95F7A262DE2C0' ),
( '4', 'CI - 2.03
', 'Casa Ciriza, S.A (TRANSHUE) enpresaren arrainen prezioak Marcelina de Cirizan ontziratzeko / Carta sobre precios de pescado de Casa Ciriza, S.A. agente y accionista de TRANSHUE, S.A.y registrados en Argentina para el embarque en el Marcelinza de Ciriza
', '02-01-1978
', '3.3. Arrain inportazioa
', '', '3', '#40079EF01C95F7BC16ECCD0' ),
( '5', 'CI - 2.04
', 'Virgen de la Estrella itsasontziko fitxak / Fichas del buque Virgen de la Estrella
', '01-01-1978 / 31-12-1979
', '5.2. Kontabilitatea
', '', '4', '#40079EF01C95F7C2C56F6D0' ),
( '6', 'CI - 2.05
', 'Marcelina de Ciriza itsasontziko fitxak / Fichas del buque Marcelina de Ciriza
', '01-01-1978 / 31-12-1979
', '5.2. Kontabilitatea
', '', '5', '#40079EF01C95F7D067E21D0' ),
( '7', 'CI - 2.06
', 'Virgen de la Estrella itsasontziaren inportazioa TRANSHUE, S.A. enpresari gehitzeko / Exportación del buque Virgen de la Estrella para incorporación en TRANSHUE, S.A.
', '01-01-1978 / 31-12-1979
', '4.2.17. Virgen de la Estrella
', '', '6', '#40079EF01C95F7E674E1BE0' ),
( '8', 'CI - 2.08
', 'Itsasontzi baten planoa, Virgen de la Estrella itsasontzia izan liteke / Plano de un buque, posiblemente del Virgen de la Estrella
', '01-01-1977
', '4.2.17. Virgen de la Estrella
', 'Gutxi gorabeherako data / Fecha aproximada
', '7', '#40079EF01C95F8170158C10' ),
( '9', 'CI - 3.01
', 'Casa Ciriza enpresako gizarte-aseguruak Virgen de la Estrella eta Marcelina de Ciriza itsasontzietako langileentzat / Seguros sociales de Casa Ciriza para los trabajadores de los buques Virgen de la Estrella y Marcelina de Ciriza
', '01-06-1977 / 31-01-1981
', '2.5. Gizarte-segurantza
', '', '8', '#40079EF01C95F8381A4B760' ),
( '10', 'CI - 3.02
', 'Casa Ciriza enpresako gizarte-aseguruak Marcelina de Ciriza itsasontziko eta lurreko langileentzat / Seguros sociales de Casa Ciriza para los trabajadores del buque Marcelina de Ciriza y personal de tierra
', '01-01-1974 / 31-03-1976
', '2.5. Gizarte-segurantza
', '1974 urteko dokumentazioa fotokopiatua / Documentación de 1974 fotocopiada
', '9', '#40079EF01C95F8550A1CD40' ),
( '11', 'CI - 3.03
', 'Ciriza Hermanos, S.A. enpresako gizarte-aseguruak Miguel Primero, Mari Ciriza, Pili Ciriza eta Igaratza itsasontzietako langile eta lurreko eta administrazio langileentzat / Seguros sociales de Ciriza Hermanos, S.A. para los trabajadores de los buques Miguel Primero, Mari Ciriza, Pili Ciriza, Igaratza y personal de tierra y administrativo
', '01-02-1975 / 31-02-1976
', '2.5. Gizarte-segurantza
', '', '10', '#40079EF01C95F862D707190' ),
( '12', 'CI - 3.05
', 'CIRTUN, S.A. enpresako gizarte-aseguruak Agustin Primero, lurreko eta administrazioko langileentzat / Seguros sociales de CIRTUN, S.A. para los trabajadores del buque Agustín Primero y personal de tierra y administrativo
', '01-01-1975 / 31-02-1975
', '2.5. Gizarte-segurantza
', '', '11', '#40079EF01C960173C19AE00' ),
( '13', 'CI - 3.04
', 'CIRIMAR, S.A. enpresako gizarte-aseguruak Akarlanda, Angelote, Cachuelo, Estornino eta Esturión itsasontzietako langile eta lurreko eta administrazioko langileentzat / Seguros sociales de CIRIMAR, S.A. para los trabajadores de los buques Akarlanda, Angelote, Cachuelo, Estornino, Esturión y personal de tierra y administrativo
', '01-01-1975 / 31-03-1976
', '2.5. Gizarte-segurantza
', '', '12', '#40079EF01C9601A0C7F3810' ),
( '14', 'CI - 4.01
', 'Pertsonalaren matrikula liburuak / Libros de matrícula de personal
', '01-01-1971 / 31-12-1980
', '2.3. Matrikula liburuak
', '', '13', '#40079EF01C9601A67BAC780' ),
( '15', 'CI - 4.02
', 'Mari Ciriza eta Pili Ciriza itsasontzietako langileen 1975 urteko nominak / Nóminas de los trabajadores de los buques Mari Ciriza y Pili Ciriza del año 1975
', '01-01-1975 / 31-11-1975
', '2.4. Nominak
', ' 
', '14', '#40079EF01C9601ABB0234F0' ),
( '16', 'CI - 5
', 'Zenbait itsasontzi eskaintza / Diversas ofertas de buques
', '01-01-1974 / 31-12-1991
', '4.2. Flota
', 'Argazkiak / Fotografías
', '15', '#40079EF01C9601D743E2E40' ),
( '17', 'CI - 4.03
', 'Lantegi frigorifiko baten proiektua Nortindal, S.A. enpresarako San Pedroko Herreran, Andrés Basterrertxea Arzadunek egina / Proyecto de factoría frigorífica para Nortindal, S.A. en la Herrera de San Pedro de Andrés Basterretxea Arzadun
', '01-02-1975 / 31-02-1975
', '3.1. Ondasun higiezinak
', 'Dokumentazioan ageri da toki moduan San Pedroko Herreran / En la documentación se menciona como lugar Herrera de San Pedro
', '16', '#40079EF01C9601E31D2BE30' ),
( '18', 'CI - 4.04
', 'Marcelina de Ciriza, Félix Ciriza, Akarlanda, Miguel Primero, Agustín Primero, Cachuelo, Angelote, Marce, Lina eta beste itsasontzi batzuen argazkiak / Fotografías de los buques Marcelina de Ciriza, Félix Ciriza, Akarlanda, Miguel Primero, Agustín Primero, Cachuelo, Angelote, Marce, Lina y otros
', 'S.d.
', '4.2. Flota
', 'Kopiak dira. Gutxi gorabeherako data 1970-1980 / Son copias. Fecha aproximada 1970-1980
', '17', '#40079EF01C960209E42D5D0' ),
( '19', 'CI - 6
', 'Miguel Primero itsasontziko nabigazio-egunkariak / Diarios de navegación del buque Miguel Primero
', '17-02-1966 / 07-01-1970
', '4.2.7. Miguel Primero
', '5 liburu / 5 libros
', '18', '#40079EF01C9602349A32400' ),
( '20', 'CI - 7
', 'Akarlanda itsasontziko nabigazio-egunkariak / Diarios de navegación del buque Akarlanda
', '25-01-1969 / 09-07-1974
', '4.2.14. Akarlanda
', '3 liburu / 3 libros
', '19', '#40079EF01C96023855A9DC0' ),
( '21', 'CI - 8
', 'Marcelina de Ciriza itsasontziko nabigazio-egunkariak / Diarios de navegación del buque Marcelina de Ciriza
', '20-06-1970 / 27-02-1975
', '4.2.4. Marcelina de Ciriza
', '5 liburu. 2 kaxatan, CI - 8A eta CI - 8B / 5 libros. En dos cajas CI - 8A y CI - 8B
', '20', '#40079EF01C9602480C14A10' ),
( '22', 'CI - 9
', 'Angelote itsasontziko nabigazio-egunkariak / Diarios de navegación del buque Angelote
', '16-12-1966 / 14-12-1973
', '4.2.16. Angelote
', '6 liburu. 2 kaxatan, CI - 9A eta CI - 9B / 6 libros. En dos cajas CI - 9A y CI - 9B
', '21', '#40079EF01C960264EEEDAF0' ),
( '23', 'CI - 10
', 'Estornino itsasontziko nabigazio-egunkariak / Diarios de navegación del buque Estornino
', '14-01-1972 / 02-07-1981
', '4.2.12. Estornino
', '3 liburu / 3 libros
', '22', '#40079EF01C96026ACABBE10' ),
( '24', 'CI - 11
', 'Esturión itsasontziko nabigazio-egunkariak / Diarios de navegación del buque Esturión
', '14-01-1972 / 12-07-1974
', '4.2.11. Esturión
', '2 liburu / 2 libros
', '23', '#40079EF01C96029D6580C70' ),
( '25', 'CI - 12
', 'Mari Ciriza itsasontziko nabigazio-egunkariak / Diarios de navegación del buque Mari Ciriza
', '08-01-1973 / 04-10-1975
', '4.2.9. Mari Ciriza
', '2 liburu / 2 libros
', '24', '#40079EF01C9602A8340E150' ),
( '26', 'CI - 13
', 'Pili Ciriza itsasontziko nabigazio-egunkariak / Diarios de navegación del buque Pili Ciriza
', '17-08-1970 / 10-09-1975
', '4.2.15. Pili Ciriza
', '4 liburu. 2 kaxatan, CI - 13A eta CI - 13B / 4 libros. En dos cajas CI - 13A y CI - 13B
', '25', '#40079EF01C9602ACCB9A060' ),
( '27', 'CI - 14
', 'Cachuelo itsasontziko nabigazio-egunkariak / Diarios de navegación del buque Cachuelo
', '17-08-1971 / 25-09-1975
', '4.2.13. Cachuelo
', '5 liburu. 2 kaxatan, CI - 14A eta CI - 14B / 5 libros. En dos cajas CI - 14A y CI - 14B
', '26', '#40079EF01C9602C73D0EFB0' ),
( '28', 'CI - 15.01
', 'Cachuelo itsasontziko makina kuadernoa / Cuaderno de máquinas del buque Cachuelo
', '05-01-1974 / 22-01-1975
', '4.2.13. Cachuelo
', 'Liburu 1 / 1 libro
', '27', '#40079EF01C9602DF57C5210' ),
( '29', 'CI - 15.02
', 'Angelote itsasontziko makina kuadernoak / Cuaderno de máquinas del buque Angelote
', '05-01-1974 / 19-02-1976
', '4.2.16. Angelote
', '2 liburu / 2 libros
', '28', '#40079EF01C9602E2AE802A0' ),
( '30', 'CI - 16.01
', 'Esturión itsasontziko makina kuadernoa / Cuaderno de máquinas del buque Esturión
', '05-01-1974 / 01-08-1974
', '4.2.11. Esturión
', 'Liburu 1 / 1 libro
', '29', '#40079EF01C9602F56C88100' );
-- ---------------------------------------------------------


-- Dump data of "consultas" --------------------------------
INSERT INTO `consultas`(`id`,`izena`,`helbidea`,`gaia`,`enpresa`,`kontsulta`,`numdoc`,`knosysid`) VALUES 
( '1', 'Cofradía de Pescadores de Pasai San Pedro
', '', '', '', '1986
', '0', '#423120801C77CD9AC1C1EE0' ),
( '2', 'Victor José Herrero
', '', '', 'Universidad de Deusto. Tesis doctoral
', '23/09/1986
30/07/1987
', '1', '#423120801C77CD9AC234AD0' ),
( '3', 'María Vilallonga
', '', '', '', '1986
', '2', '#423120801C77CD9AC3B1890' ),
( '4', 'José Ignacio Tellechea Idígoras
', '', '', '', '07/11/1986
', '3', '#423120801C77CD9AC3D8990' ),
( '5', 'María Asunción Urzainki
', '', '', 'Universidad de Deusto
', '15/12/1986
', '4', '#423120801C77CD9AC424480' ),
( '6', 'Isabel Lobo Satúe (médico)
', 'Avenida de Navarra, 15 - 2º derecha (TOLOSA)
', '', 'Universidad del País Vasco. Tesis doctoral
', '1986: A 13 I 1, A 13 II 1, A 13 III 1
1987
', '5', '#423120801C77CD9AC46FF70' ),
( '7', 'Eugenia Escat, Aitor Olano
', '', '', '', '1987
', '6', '#423120801C77CD9AC497070' ),
( '8', 'Koldo Lizarralde
', '', '', '', '1987
', '7', '#423120801C77CD9AC4E2B60' ),
( '9', 'Antxon Agirre Sorondo
', '', '', '', '1987
', '8', '#423120801C77CD9AC52E650' ),
( '10', 'Germán López, Eugenio López, Raúl Manzanas
', '', '', '', '1987
', '9', '#423120801C77CD9AC555750' ),
( '11', 'Juncal Etxezarreta
', '', '', '', '1987
', '10', '#423120801C77CD9AC5A1240' ),
( '12', 'Pedro Segurola, Luis Miguel García, ...
', '', '', 'Colegio Zamalbide FP
', '08/04/1987
13/04/1987
', '11', '#423120801C77CD9AC5EF440' ),
( '13', 'Maite Puente Sánchez (licenciada en Filosofía y Letras) 
', '', '', 'Eusko Ikaskuntza
', '13/04/1987
', '12', '#423120801C77CD9AC613E30' ),
( '14', 'José Ignacio Murua
', '', '', 'Junta de Obras del Puerto de Pasaia
', '13/04/1987
', '13', '#423120801C77CD9AC65F920' ),
( '15', 'Rosa Marta Guridi (licenciada en Historia del Arte)
', '', '', 'Universidad de Salamanca
', '1987
', '14', '#423120801C77CD9AC6ADB20' ),
( '16', 'Josu Erkoreka
', '', '', 'Universidad de Deusto. Tesis doctoral
', '03/07/1987
', '15', '#423120801C77CD9AC6F9610' ),
( '17', 'Miguel Román Martín, Francisco Casado Calonge, Jean Claude Curell, José Ignacio Martínez de Morentín, César Cantero Herranz
', '', '', 'Escuela Superior de Ingenieros de Caminos, Canales y Puertos de Madrid
', '22/11/1987
11/12/1987
', '16', '#423120801C77CD9AC745100' ),
( '18', 'José Antonio Imaz
', '', '', 'Tesis doctoral
', '14/02/1987
', '17', '#423120801C77CD9AC790BF0' ),
( '19', 'Grupo de Arqueología Urbana de la Diputación
', '', '', '', '20/11/1987
18/01/1988
', '18', '#423120801C77CD9AC7DEDF0' ),
( '20', 'Juan Carlos Díez Quirce
', '', '', 'Universidad de Deusto. Tesis doctoral
', '11/11/1987
', '19', '#423120801C77CD9AC8037E0' ),
( '21', 'Yolanda Yusta Sainz
', '', '', '', '21/01/1988
', '20', '#423120801C77CD9AC8519E0' ),
( '22', 'Rosa Cantín (profesora de Historia en la Escuela de Magisterio de Donostia)
', 'teléfono 457530
', '', ' Universidad del País Vasco. Cursos de doctorado
', ' 1988
', '21', '#423120801C77CD9AC89D4D0' ),
( '23', 'Ignacio Ceberio Castro
', '', '', 'Departamento de Metodología de la EUTG
', '04/12/1986
', '22', '#423120801C77CD9AC8C1EC0' ),
( '24', 'Rosa Cantín
', '', '', 'Instituto de la Mujer. Master sobre Mujer y sistemas de género
', '1994: Cuentas municipales
', '23', '#423120801C77CD9AC9100C0' ),
( '25', 'Iñaki Cerbera, Santos ?
', '', '', 'Caja Laboral
', '11/07/1986: Expedientes de las obras de construcción de las escuelas Viteri
', '24', '#423120801C77CD9AC95BBB0' ),
( '26', 'Jon Uranga, Ricardo Arratibel
', '', '', 'Caja Laboral
', 'Expedientes de obras
', '25', '#423120801C77CD9AC982CB0' ),
( '27', 'Ceberio ?
', '', '', 'Escuela de Magisterio
', '31/05/1986
', '26', '#423120801C77CD9AC9CE7A0' ),
( '28', 'José Agustín Maiz
', '', '', 'Becario del Gobierno Vasco
', '17/03/1988
', '27', '#423120801C77CD9ACA1A290' ),
( '29', 'Angel María Elortegui Bilbao
', '', '', '', '1987
', '28', '#423120801C77CD9ACA41390' ),
( '30', 'Isabel Miguel López
', '', '', 'Universidad de Valladolid. Tesis doctoral
', '1989
', '29', '#423120801C77CD9ACA8CE80' );
-- ---------------------------------------------------------


-- Dump data of "entradas" ---------------------------------
INSERT INTO `entradas`(`id`,`data`,`igorlea`,`deskribapena`,`signatura`,`numdoc`,`knosysid`) VALUES 
( '1', '16/04/1997
', 'Agustín, Administrativo de Gestión
', 'Reforma de cocina y baño en la c/ Lezo-bide, 12 - 3º D. Angel Berrotarán Britt (15/04/1997)
', '265-1
', '0', '#423120801C77CD200930540' ),
( '2', '16/04/1997
', 'Personal
', 'Recurso contencioso-administrativo interpuesto por Juan Marcos Oneca y José Antonio Tolosa contra resolución de Alcaldía de 13 de enero de 1997 sobre la no devolución de los importes excluidos de la Seguridad Social (14/04/1997)
', 'XXX-10
', '1', '#423120801C77CD20097E740' ),
( '3', '16/04/1997
', 'Personal
', 'Apercibimiento a Juan Ramón Azcue (09/04/1997)
', '487-2
', '2', '#423120801C77CD200AFB500' ),
( '4', '17/04/1997
', 'Agustín, Administrativo de Gestión
', 'Arreglo de cocina en la c/ Azcuene, 32 - 8º puerta 4. Angeles San Juan Centeno
', '265-62
', '3', '#423120801C77CD200B46FF0' ),
( '5', '18/04/1997
', 'Informático, Inchausti
', 'Anejo de contrato con IZFE SA de la licencia nº 10 (28/02/1997).
', 'XXII-8
', '5', '#423120801C77CD200BB9BE0' ),
( '6', '21/04/1997
', 'Personal
', 'Notificación a Antonio Eugenio de comunicación de alcoholismo (09/04/1997)
', '490-13
', '7', '#423120801C77CD200C2C7D0' ),
( '7', '21/04/1997
', 'Personal 
', 'Informe de la Técnico de Cultura sobre informatización de la biblioteca de Pasai Antxo (03/02/1997)
', '726-2
', '8', '#423120801C77CD200C538D0' ),
( '8', '21/04/1997
', 'Personal
', 'Informe de la Técnico de Cultura sobre la biblioteca de Pasai San Pedro (03/02/1997
', '510-18
', '9', '#423120801C77CD200C9F3C0' ),
( '9', '21/04/1997
', 'Personal
', 'Contrato de Alberto Ruiz Arruti (1996)
', '747-6
', '10', '#423120801C77CD200CEAEB0' ),
( '10', '22/04/1997
', 'Agustín, Administrativo de Gestión
', 'Plantación de árboles y plantas, 1994
', '265-102
', '11', '#423120801C77CD200D11FB0' ),
( '11', '22/04/1997
', 'Personal
', 'Solicitud de trienio de Alberto Legarre Alvaro
', '718-2
', '12', '#423120801C77CD200D5DAA0' ),
( '12', '22/04/1997
', 'Agustín, Administrativo de Gestión
', 'Nuevas aceras en calles de Pasai Donibane, 1993
Contratista: ERGA SL
', '281-1
', '13', '#423120801C77CD200DA9590' ),
( '13', '22/04/1997
', 'Agustín, Administrativo de Gestión
', 'Restauración de la terraza de las escuelas municipales, fachada y arcos de la parte inferior en Herriko Plaza (1994)
Contratista: RE-KA 7, Restauraciones SL
', '281-2
', '14', '#423120801C77CD200DD0690' ),
( '14', '22/04/1997
', 'Agustín, Administrativo de Gestión
', 'Renovación de tubería en el depósito de la c/ Oiartzun (1995)
Contratista: José Luis Corrales
', '281-3
', '15', '#423120801C77CD200E1C180' ),
( '15', '22/04/1997
', 'Agustín, Administrativo de Gestión
', 'Limpieza de colectores de la red de saneamiento (1995)
Contratista: Fomento de Construcciones y Contratas SA
', '281-4
', '16', '#423120801C77CD200E8ED70' ),
( '16', '22/04/1997
', 'Agustín, Administrativo de Gestión
', 'Instalación de tubería de abastecimiento de agua en la c/ Rentería (1996)
Contratista: Ignacio Aramburu Urrestarazu
', '281-5
', '17', '#423120801C77CD200EDA860' ),
( '17', '22/04/1997
', 'Agustín, Administrativo de Gestión
', 'Reparación de cubierta de policarbonato del mercado de Trintxerpe (1995)
Contratista: Industrias Plásticas Benegas SL
', '', '18', '#423120801C77CD200F01960' ),
( '18', '22/04/1997
', 'Agustín, Administrativo de Gestión
', 'Instalación de clorador de agua para el depósito de aguas de Pasai Donibane (1995)
Contratista: URAK
', '281-7
', '19', '#423120801C77CD200F4D450' ),
( '19', '23/04/1997
', 'Agustín, Administrativo de Gestión
', 'Adquisición de material de limpieza a FER HIGIENE INDUSTRIAL, JUPER BAT y QUISER (1996)
', '282-5
', '20', '#423120801C77CD200F74550' ),
( '20', '23/04/1997
', 'Agustín, Administrativo de Gestión
', 'Adquisición de material de pintura a AIADEK (1996)
', '282-4
', '21', '#423120801C77CD200FC0040' ),
( '21', '23/04/1997
', 'Agustín, Administrativo de Gestión
', 'Adquisición de herramientas de pintura a ORTEGA (1996)
', '282-3
', '22', '#423120801C77CD200FE7140' ),
( '22', '23/04/1997
', 'Agustín, Administrativo de Gestión
', 'Adquisición de guantes a MARIBEL MUGICA (1996)
', '282-2
', '23', '#423120801C77CD201032C30' ),
( '23', '23/04/1997
', 'Agustín, Administrativo de Gestión
', 'Adquisición de vestuario para Obras y Servicios a IRUDIEK (1996)
', '282-1
', '24', '#423120801C77CD20107E720' ),
( '24', '24/04/1997
', 'Agustín, Administrativo de Gestión
', 'Adquisición de material de limpieza para Obras y Servicios a JUPER BAT y GARBIKO, 1997
', '283-7
', '25', '#423120801C77CD2010A5820' ),
( '25', '24/04/1997
', 'Agustín, Administrativo de Gestión
', 'Adquisición de dumper a ARRIZABAL ELKARTEA, 1996
', '283-6
', '26', '#423120801C77CD2010F1310' ),
( '26', '24/04/1997
', 'Agustín, Administrativo de Gestión
', 'Adquisición de cloradores para Arrokaundieta a URAK , 1996
', '283-5
', '27', '#423120801C77CD20113CE00' ),
( '27', '24/04/1997
', 'Agustín, Administrativo de Gestión
', 'Adquisición de clorador de agua para el distribuidor de Jaizkibel a URAK , 1996
', '283-4
', '28', '#423120801C77CD201163F00' ),
( '28', '24/04/1997
', 'Agustín, Administrativo de Gestión
', 'Adquisición de sistema de videoproyección para el Udal Aretoa de San Pedro a JORDI, 1996
', '283-3
', '29', '#423120801C77CD2011AF9F0' ),
( '29', '24/04/1997
', 'Agustín, Administrativo de Gestión
', 'Adquisición de sistema de sonorización para el Udal Aretoa de Pasai San Pedro a JORDI, 1996
', '283-2
', '30', '#423120801C77CD2011FB4E0' ),
( '30', '24/04/1997
', 'Agustín, Administrativo de Gestión
', 'Adquisición de sistema de iluminación para el Udal Aretoa de Pasai San Pedro a JORDI, 1996
', '283-1
', '31', '#423120801C77CD2012225E0' );
-- ---------------------------------------------------------


-- Dump data of "euskera" ----------------------------------
INSERT INTO `euskera`(`id`,`espedientea`,`data`,`sailkapena`,`signatura`,`oharrak`,`numdoc`,`knosysid`) VALUES 
( '1', 'Azterketa soziolinguistikoa egiteko SIADECO kontratatzea
', '1992
', '2-24
2-3 Kontratazio espedienteak
', 'Euskera saila 1. kutxa
', '', '0', '#046CE9401D035588917D8E0' ),
( '2', 'BERRIA egunkaria argitaratzen duen Euskarazko komunikazio taldea SAri akzioak erostea 
', '2004
', '2-24
', 'Euskera saila 1. kutxa
', '', '1', '#046CE9401D03558AF129850' ),
( '3', 'Eusko Jaurlaritzari eskatutako dirulaguntzak 
', '1989
', '2-24 Dirulaguntzen espedienteak 
', 'Euskera saila 1. kutxa
', '', '6', '#046CE9401D0355936307050' ),
( '4', 'Julia Otxoak idatzitako liburua aurkeztea
', '1990
', '2-24 Jardueren espedienteak 
', 'Euskera saila 1. kutxa
', '', '7', '#046CE9401D03559538DAE60' ),
( '5', 'Egonaldiak familia euskaldunetan
', '1992, 1993, 1995
', '2-24 Jardueren espedienteak 
', 'Euskera saila 1. kutxa
', '', '4', '#046CE9401D03558F89E9140' ),
( '6', 'Udaleku irekiak 
', '1994
', '2-24 Jardueren espedienteak 
', 'Euskera saila 2. kutxa
', '', '8', '#046CE9401D0355E248F3F70' ),
( '7', 'Oarsoaldeko HITZA egunkariari dirulaguntza ematea
', '2006
', '2-24 Dirulaguntzen espedienteak
', 'Euskera saila 2. kutxa
', '', '10', '#046CE9401D0355EA316C200' ),
( '8', 'Oarsoaldeko HITZA egunkarian publizitatea kontratatzea 
', '2006
', '2-24 
2-3 Kontratazio espedienteak 
', 'Euskera saila 2. kutxa
', '', '9', '#046CE9401D0355E81D014C0' ),
( '9', 'Oarsoaldeko HITZA egunkarian publizitatea kontratatzea
', '2005
', '2-24
2-3 Kontratazio espedienteak 
', 'Euskera saila 2. kutxa
', '', '11', '#046CE9401D0355EC8F9B3B0' ),
( '10', 'Oarsoaldeko HITZA egunkariari dirulaguntza ematea 
', '2005
', '2-24 Dirulaguntzen espedienteak
', 'Euskera saila 2. kutxa
', '', '12', '#046CE9401D0355F1194BCF0' ),
( '11', 'Oarsoaldeko HITZA egunkarian publizitatea kontratatzea
', '2003
', '2-4 
2-3 Kontratazio espedienteak 
', 'Euskera saila 2. kutxa
', '', '13', '#046CE9401D0355F36E61D00' ),
( '12', 'Oarsoaldeako HITZA egunkarian publizitatea kontratatzea 
', '2004
', '2-24
2-3 Kontratazio espedienteak 
', 'Euskera saila 2. kutxa
', '', '14', '#046CE9401D0355F55344AC0' ),
( '13', 'Oarsoaldeko HITZA eta BERRIA egunkarietan iragarki ofizialak argitaratzeko kontratua 
', '2004
', '2-24
2-3 Kontratazio espedienteak 
', 'Euskera saila 2. kutxa
', '', '15', '#046CE9401D0355F89DC8440' ),
( '14', 'Oarsoaldeko HITZA egunkariari dirulaguntza ematea
', '2003
', '2-24 Dirulaguntzen espedienteak 
', 'Euskera saila 2. kutxa
', '', '16', '#046CE9401D0355FAAD22B50' ),
( '15', 'Ikastetxeetan D ereduan matrikulatzeko kanpaina
', '2000
', '2-24 Jardueren espedienteak 
', 'Euskera saila 2. kutxa
', '', '17', '#046CE9401D0355FC90AD540' ),
( '16', 'Ikastetxeetan D ereduan matrikulatzeko kanpaina
', '2001
', '2-24 Jardueren espedienteak 
', 'Euskera saila 2. kutxa
', '', '18', '#046CE9401D0355FEEFBF7C0' ),
( '17', 'Ikastetxeetan D ereduan matrikulatzeko kanpaina
', '2002
', '2-24 Jardueren espedienteak 
', 'Euskera saila 2. kutxa
', '', '19', '#046CE9401D0356006A89B30' ),
( '18', 'AEK euskaltegiari dirulaguntza ematea
', '1991
', '2-24 Dirulaguntzen espedienteak 
', 'Euskera saial 3. kutxa
', '', '20', '#046CE9401D035605F0833D0' ),
( '19', 'Euskararen aldeko jarduerei dirulaguntza ematea 
', '1992
', '2-24 Dirulaguntzen espedienteak 
', 'Euskera saila 3. kutxa
', '', '21', '#046CE9401D03560F7820410' ),
( '20', 'Euskeraren aldeko ekintzei dirulaguntzak ematea 
', '1988
', '2-24 Dirulaguntzen saila 
', 'Euskera saila 3. kutxa
', '', '23', '#046CE9401D03561F117C0F0' ),
( '21', 'D ereduan matrikulatzeko kanpaina 
', '1999
', '2-24 Jardueren espedienteak 
', 'Euskera saila 3. kutxa
', '', '24', '#046CE9401D03562186E8DF0' ),
( '22', 'D ereduan matrikulatzeko kanpaina 
', '1998
', '2-24 Jardueren espedienteak 
', 'Euskera saila 3. kutxa
', '', '25', '#046CE9401D035622CEE3460' ),
( '23', 'D ereduan matrikulatzeko kanpaina 
', '1997
', '2-24 Jardueren espedienteak 
', 'Euskera saila 3. kutxa
', '', '26', '#046CE9401D035623F95BF70' ),
( '24', 'D ereduan matrikulatzeko kanpaina 
', '1996
', '2-24 Jardueren espedienteak
', 'Euskera saila 3. kutxa
', '', '27', '#046CE9401D0356253ECCF40' ),
( '25', 'D ereduan matrikulatzeko kanpaina 
', '1995
', '2-24 Jardueren espedienteak 
', 'Euskera saila 3. kutxa
', '', '28', '#046CE9401D0356267A41CA0' ),
( '26', 'D ereduan matrikulatzeko kanpaina
', '1994
', '2-24 Jardueren espedienteak 
', 'Euskera saila 3. kutxa
', '', '29', '#046CE9401D0356279134EC0' ),
( '27', 'D ereduan matrikulatzeko kanpaina 
', '1993
', '2-24 Jardueren espedienteak 
', 'Euskera saila 3. kutxa
', '', '30', '#046CE9401D035628886B0E0' ),
( '28', 'D ereduan matrikulatzeko kanpaina 
', '1992
', '2-24 Dirulaguntzen espedienteak 
', 'Euskera saila 3. kutxa
', '', '31', '#046CE9401D03562E873BA70' ),
( '29', 'D ereduan matrikulatzeko kanpaina 
', '1991
', '2-24 Jardueren espedienteak 
', 'Euskera saila 3. kutxa
', '', '32', '#046CE9401D03562FC42FCA0' ),
( '30', 'D ereduan matrikulatzeko kanpaina 
', '1988 - 1989
', '2-24 Jardueren espedienteak 
', 'Euskera saila 3. kutxa
', '', '33', '#046CE9401D0356313AF3BB0' );
-- ---------------------------------------------------------


-- Dump data of "gazteria" ---------------------------------
INSERT INTO `gazteria`(`id`,`espedientea`,`data`,`sailkapena`,`signatura`,`oharrak`,`numdoc`,`knosysid`) VALUES 
( '1', 'Udalekuak: Udaleku irekiak eta Abenturaz blai 
', '1993
', '2-12 Jardueren espedienteak
', 'Gazteria eta kirola saila 1. kutxa
', '', '5', '#046CE9401D02FD6119F3E20' ),
( '2', 'Gazte taldeei dirulaguntzak ematea 
', '1992
', '2-12 Dirulaguntzen espedienteak
', 'Gazteria eta kirola saila 1. kutxa
', 'Proiektuak besterik ez dago
', '1', '#046CE9401D02FD545FD1DA0' ),
( '3', 'Gazte kanpamentuetarako dirulaguntzak ematea
', '1992
', '2-12 Dirulaguntzen espedienteak
', 'Gazteria eta kirola saila 1. kutxa
', 'Eskaerak
', '2', '#046CE9401D02FD584468CE0' ),
( '4', 'Gabonetako haur festa 
', '1992
', '2-12 Jardueren espedienteak
', 'Gazteria eta kirola saila 1. kutxa
', '', '3', '#046CE9401D02FD5B2996040' ),
( '5', 'Komiki lehiaketa 
', '1993
', '2-12 Jardueren espedienteak
', 'Gazteria eta kirola saila 1. kutxa
', '', '4', '#046CE9401D02FD5EBABAAA0' ),
( '6', 'Tailerrak
', '1993
', '2-12 Jardueren espedienteak
', 'Gazteria eta kirola saila 2. kutxa
', '', '7', '#046CE9401D02FD6898ED350' ),
( '7', 'Pasaiako gazte elkarteen 1. erakustaldia 
', '1993
', '2-12 Jardueren espedienteak 
', 'Gazteria eta kirola saila 2. kutxa
', '', '8', '#046CE9401D02FD6A4B708F0' ),
( '8', 'Gabonetako haur festa
', '1993
', '2-12 Jardueren espedienteak
', 'Gazteria eta kirola saila 2. kutxa
', '', '9', '#046CE9401D02FD6BFAD5920' ),
( '9', 'Gazteriaren aldeko programetarako dirulaguntzak ematea
', '1993
', '2-12 Dirulaguntzen espedienteak
', 'Gazteria eta kirola saila 2. kutxa
', '', '10', '#046CE9401D02FD6E1FF0DC0' ),
( '10', 'PATA Pasai Antxoko talde antimilistaristari emandako dirulaguntzak
', '1993
', '1-12 Dirulaguntzen espedienteak 
', 'Gazteria eta kirola saila 4. kutxa
', '', '12', '#046CE9401D02FD7CC8A6380' ),
( '11', 'Foru Aldundiak emandako gazte taldeentzako dirulaguntzak 
', '1993
', '2-12 Dirulaguntzen espedienteak
', 'Gazteria eta kirola saila 3. kutxa
', '', '11', '#046CE9401D02FD73D276350' ),
( '12', 'Tailerrak
', '1994
', '1-12 Jardueren espedienteak
', 'Gazteria eta kirola saila 4. kutxa
', '', '13', '#046CE9401D02FD7F003CF40' ),
( '13', 'Abenturaz blai
', '1994
', '1-12 Jardueren espedienteak 
', 'Gazteria eta kirola saila 5. kutxa
', '', '14', '#046CE9401D02FD82035E9F0' ),
( '14', 'Abenturaz blai 
', '1995
', '2-12 Jardueren espedienteak 
', 'Gazteria eta kirola saila 5. kutxa
', '', '17', '#046CE9401D02FD893AF6050' ),
( '15', 'Tailerrak
', '1995
', '2-12 Jardueren espedienteak 
', 'Gazteria eta kirola saila 5. kutxa
', '', '16', '#046CE9401D02FD87DBBDE90' ),
( '16', 'Kirol elkarteei emandako dirulaguntzak 
', '1994
', '2-12 Dirulaguntzen espedienteak
', 'Gazteria eta kirola saila 6. kutxa
', '', '18', '#046CE9401D02FD93DC36A50' ),
( '17', 'Kirol elkarteei emandako dirulaguntzak 
', '1995
', '2-12 Dirulaguntzen espedienteak
', 'Gazteria eta kirola saila 6. kutxa
', '', '19', '#046CE9401D02FD9527C4930' ),
( '18', 'Kirol elkarteei emandako dirulaguntzak 
', '1996
', '2-12 Dirulaguntzen espedienteak
', 'Gazteria eta kirola saila 6. kutxa
', '', '20', '#046CE9401D02FD9689AAB80' ),
( '19', 'Gazte elkarteei emandako dirulaguntzak 
', '1995
', '2-12 Dirulaguntzen espedienteak 
', 'Gazteria eta kirola saila 7. kutxa
', '', '21', '#046CE9401D02FD989D7E2E0' ),
( '20', 'Gazte elkarteei emandako dirulaguntzak 
', '1994
', '2-12 Dirulaguntzen espedienteak 
', 'Gazteria eta kirola saila 8. kutxa 
', 'Memoriak
', '22', '#046CE9401D02FD9A78FC410' ),
( '21', 'Udaleku irekiak. URTXINTXA 
', '1995
', '2-12 Jardueren espedienteak 
', 'Gazteria eta kirola saila 9. kutxa
', '', '24', '#046CE9401D02FD9DD182460' ),
( '22', 'Tailerrak
', '1995
', '2-12 Jardueren espedienteak
', 'Gazteria eta kirola saila 10. kutxa
', '', '25', '#046CE9401D02FDBD904D420' ),
( '23', 'Udaleku irekiak. URTXINTXA
', '1996
', '2-12 Jardueren espedienteak 
', 'Gazteria eta kirola saila 10. kutxa
', '', '26', '#046CE9401D02FDBF0A31FB0' ),
( '24', 'Tailerrak 
', '1996 - 1997
', '2-12 Jardueren espedienteak 
', 'Gazteria eta kirola saila 11. kutxa
', '', '27', '#046CE9401D02FDC0894E270' ),
( '25', 'Gazte taldeei emandako dirulaguntzak 
', '1997
', '2-12 Dirulaguntzen espedienteak 
', 'Gazteria eta kirola saila 11. kutxa
', '', '30', '#046CE9401D02FE27C0C9C60' ),
( '26', 'Gazte taldeei emandako dirulaguntzak 
', '1998
', '2-12 Dirulaguntzen espedienteak 
', 'Gazteria eta kirola saila 11. kutxa
', '', '31', '#046CE9401D02FE2975181C0' ),
( '27', 'Gazte taldeei emandako dirulaguntzak
', '1998
', '2-12 Dirulaguntzen espedienteak 
', 'Gazteria eta kirola saila 11. kutxa
', '', '32', '#046CE9401D02FE2D4439E60' ),
( '28', 'Gazte taldeei emandako dirulaguntzak
', '1999
', '2-12 Dirulaguntzen espedienteak 
', 'Gazteria eta kirola saila 11. kutxa
', '', '33', '#046CE9401D02FE2F3B6EB30' ),
( '29', 'Gazteentzako tailerrak 
', '1997 - 1998
', '2-12 Jardueren espedienteak 
', 'Gazteria eta kirola saila 12. kutxa
', '', '36', '#046CE9401D02FE32CDEB960' ),
( '30', 'Abenturaz blai 
', '1996
', '2-12 Jardueren espedienteak 
', 'Gazteria eta kirola saila 12. kutxa
', '', '37', '#046CE9401D02FE33ED0FE30' );
-- ---------------------------------------------------------


-- Dump data of "hutsak" -----------------------------------
INSERT INTO `hutsak`(`id`,`egoera`,`signatura`,`zaharra`,`berria`,`numdoc`,`knosysid`) VALUES 
( '1', 'Modificado
', '782-5
', 'Certificaciones urbanísticas
Año 1997
Obra txikiak 5-6
', 'Expediente personal de Iker Mayo Bella (2009)
', '5', '#046CE9401CB21950EA92180' ),
( '2', 'modificado
', '782-1
', 'Certificaciones urbanísticas
año 1994
Obra txikiak 5-2
', 'Actividad de garaje en la c/ Gran Sol, 6 trasera a favor de José Ramón González Clemente (2005 - )
', '1', '#046CE9401CB21944D324E50' ),
( '3', 'Modificado
', '782-8
', 'Certificaciones urbanísticas
Año 1962
Obra txikiak 5-9
', 'Licencia de apertura de zapatería en la c/ Zumalakarregi, 8 (perteneciente a la finca Blas de Lezo, 16) a favor de Cristina Báez Suárez (2005 - )
', '2', '#046CE9401CB2194C94BB710' ),
( '4', 'modificado
', '782-6
', 'Certificaciones urbanísticas
Año 1995
Obra txikiak 5-7
', 'Expediente personal de Rosa Tuquerres Flores (2009)
', '4', '#046CE9401CB2194F6F2E120' ),
( '5', 'Modificación 
', '782-4
', 'Certificaciones urbanísticas
Año 1982
Obra txikiak 5-5
', 'Expediente personal de José Luis Santos San Sebastián (2009 -)
', '6', '#046CE9401CB2195277AE400' ),
( '6', 'Modificado
', '782-3
', 'Certificaciones urbanísticas
Año 1965
Obra txikiak 5-4
', 'Expediente personal de Mikel Sardón Esmoris (2009)
', '7', '#046CE9401CB219542142010' ),
( '7', 'Modificado
', '297-7
', 'Certificaciones urbanísticas
Año 1972
Obra txikiak 6-1
', 'Expediente personal de Jon Joseba Torre Sanz
', '9', '#046CE9401CB219E1730BAD0' ),
( '8', 'Modificado
', '970-1
', 'Certificaciones urbanísticas
Año 1974
Obra txikiak 6-2
', 'Expediente personal de Adrián Valbuena Etxeberria
', '10', '#046CE9401CB21A69CC90AA0' ),
( '9', 'Modificado
', '204-51
', 'Certificaciones urbanísticas
Año 1986
Obra txikiak 6-3
', 'Expediente personal de Jon Larretxea Lazkano 
', '11', '#046CE9401CB21A724036B50' ),
( '10', 'Modificado 
', '169-33
', 'Certificaciones urbanísticas
Año 1989
Obra txikiak 6-4
', 'Expediente personal de Maider Guezala Lasa
', '12', '#046CE9401CB21A8E86C11D0' ),
( '11', 'Modificado
', '224-41
', 'Certificaciones urbanísticas
Año 1991
Obra txikiak 6-5
', 'Expediente personal de Egoitz Gorrotxategi Dorronsoro
', '13', '#046CE9401CB21AD7DBD5510' ),
( '12', 'Modificado
', '1045-23
', 'Certificaciones urbanísticas
Año 1998
Obra txikiak 6-6
', 'Expediente personal de Gemma Fernández Daguer
', '14', '#046CE9401CB21ADFE752520' ),
( '13', 'Modificado
', '1209-13
', 'Certificaciones urbanísticas
Año 2001
Obra txikiak 6-8
', 'Expediente personal de Pedro Cortés Hernández
', '16', '#046CE9401CB21B649829450' ),
( '14', 'Modificado
', '782-7
', 'Certificaciones urbanísticas
Año 1963
Obra txikiak 5-8
', 'Recurso contencioso-administrativo nº 476/2008 interpuesto por José María Curras Fernández contra resolución desestimando reclamación por daños al caerse de una motocicleta tras pisar una alcantarilla en mal estado en la c/ Salina, 3 (2008 - 2010)
', '3', '#046CE9401CB2194DE1781B0' ),
( '15', 'Modificado
', '1199-1
', 'Certificaciones
2000
Obra txikiak 7-13
', 'Recurso contencioso-administrativo nº 314/09 interpuesto por Jesús Garro Aguirre contra resolución del Ayuntamiento sobre embargo de cuentas (2009 - 2010)
', '18', '#046CE9401CB385D6D5A9CC0' ),
( '16', 'Modificado
', '1198-4
', 'Ziurtagiria
2001
Obra txikiak 7-14
', 'Recurso contencioso-administrativo nº 405/2009 interpuesto por Aval Service Lease SA contra desestimación por silencio administrativo del Ayuntamiento sobre reclamación de daños sufridos por un vehículo al ser retirado por la grúa (2009 - 2010)
', '19', '#046CE9401CB3870ABF05CA0' ),
( '17', 'Modificado
', '1212-6
', 'Ziurtagiria. Salinas kaleko izendapena
2001
Obra txikiak 7-15
', 'Recurso contencioso-administrativo nº 193/06 interpuesto por Ricardo del Pozo y Xabier Portugal contra resolución del Ayuntamiento desestimando el recurso de reposición interpuesto contra acuerdo de Pleno aprobando la enajenación de las acciones de Gas Pasaia SA (2006 - 2010)
', '20', '#046CE9401CB3877B9A23470' ),
( '18', 'Modificado
', '1095-1
', 'Certificaciones urbanísticas
Año 1999
Obra txikiak 6-7
', 'Recurso contencioso-administrativo nº 342/2007 interpuesto por Miguel Simón González contra resolución del Ayuntamiento por la que se acuerda la inadmisión de la solicitud de nulidad de la liquidación por concesión de licencia de obras otorgada en 1991. Acumulado nº 534/2007 (2007 - 2010). 
342/2007 zenbakidun Administrazioarekiko Auzi Errekurtsoa Miguel Simón González jaunak aurkeztua Udal ebazpenaren aurka. Ebazpen honek erabakitzen du ez onartzea 1991. urtean emandako obra lizentzia baliogabetzeko eskaera, kitapenari dagokionez.  534/2007 zenbakikun errekurtso metatua (2007 - 2010)
', '15', '#046CE9401CB21AE7A89ABE0' ),
( '19', 'Modificado
', '1480-2
', 'Certificaciones urbanísticas 
2007
Obra txikiak 7-3
', 'Recurso contencioso-administrativo nº 237/06 interpuesto por Marina González contra inactividad del Ayuntamiento al no resolver el recurso de reposición interpuesto contra acuerdo de la Junta de Gobierno Local sobre reclamación patrimonial por caida en la c/ Oarso (2006 - 2007).
237/06 zenbakidun Administrazioarekiko auzi errekurtsoa Marina González andreak aurkeztutakoa udalaren geldotasunaren aurka. Andre honek salatzen du Udalak ez diola erabazpenik eman Oarso kalean izandako erorikoagatik ondare erantzunkizunari buruz Tokiko Gobernu Batzarrak erabakitakoaren aurka aurkeztu zuen berraztertze errekurtsoari. 
', '17', '#046CE9401CB3471037FB140' ),
( '20', 'Anulado porque tampoco se ha localizado en otra signatura
', '929-3
', 'Habilitación de oficinas en Euskadi Etorbidea, 53. Promotor: Entrecanales y Tavora SA 
', '', '21', '#046CE9401CBE244BDE6E3B0' ),
( '21', 'Modificado 
', '739-6
', 'Licencia de taxi. Fernando de la Palma
2-18 Licencias de taxi
', 'Permuta de la vivienda de Donibane kalea, 136 - 1º, propiedad del Ayuntamiento de Pasaia, y la vivienda de Donibane kalea, 110 - 4º, propiedad de María Isabel Alcaraz Gamecho (2011)
', '23', '#046CE9401CC03F9CCA558B0' ),
( '22', 'Modificado 
', '59-8 
', 'Licencia de taxi. Juan Marcos Mateo
1962 - 1980
2-18 Licencias de taxi 
', 'Expediente del taxista Francisco Javier Avila Nieto, licencia nº 34. 2011
', '22', '#046CE9401CC03F38D4446A0' ),
( '23', 'Modificado
', '741-1
', 'Licencia de taxi. Santiago Aldaz Apat
2-18 Licencias de taxi
', 'Habilitación de cuatro viviendas en la c/ Eskalantegi, 21 - 1º y 2º. María Carmen Ecenarro Errazquin (2007 - 2009)
', '24', '#046CE9401CC03FF384E9680' ),
( '24', 'Modificado
', '741-2
', 'Licencia de taxi nº 2. Felipe Andueza Flores
2-18 Licencias de taxi
', 'Licencia de obra mayor para refuerzo de estructura en Bonantzako Pasealekua, 4. Copropietarios (2008 - 2009)
', '25', '#046CE9401CC0404DC681250' ),
( '25', 'Modificado
', '740-1
', 'Licencia de taxi. Cándido Miguens Pereira
2-18 Licencias de taxi
', 'Licencia de apertura de actividad de guarda de vehículos en Andonaegi kalea, 12 bajo a favor de Fidel Gómez Ferradas
', '26', '#046CE9401CC0407C7CFAC60' ),
( '26', 'Modificado
', '739-10
', 'Licencia de taxis denegadas. 1974
2-18 Licencias de taxi
', 'Selección de arquitecto para el programa Refuerzo del Area de Urbanismo - Arquitecto (María Iceta) 2008 -)
', '27', '#046CE9401CC0409F61EEB60' ),
( '27', 'Modificado 
', '741-3
', 'Licencia de taxi nº 2. Jaime González García (1989 - 2006)
2-18 Licencias de taxi
', 'Licencia de apertura para actividad de estudio fotográfico en Gure Zumardia, 30 planta baja a favor de Juan Rubén Carretero Cano, y licencia de obras (2008 -)
', '28', '#046CE9401CC040B9A7DF880' ),
( '28', 'Modificado 
', '740-4
', 'Autorizaciones de licencias de taxi
1979
2-18 Licencias de taxi
', 'Licencia de apertura de actividad de bar en la c/ San Juan, 67 bajo a favor de José Ramón Ibarzabal Artano (1962)
', '29', '#046CE9401CC0599C044EEE0' ),
( '29', 'Modificado 
', '740-13
', 'Licencia de taxi nº 6 Luis Ageitos Reiriz
1959 - 1983
2-18 Licencias de taxi
', 'Licencia de apertura de actividad de bar en la c/ San Juan, 82 a favor de Luis Benito Benedi (1971 - 2008)
', '30', '#046CE9401CC059AE3B2CC70' ),
( '30', 'Modificado
', '746-4
', 'Licencia de taxi. Marcelino Piñeiro Novo (1954)
2-18 Licencias de taxi
', 'Escritura de compraventa de terreno de 5202 metros cuadrados en Alza, propiedad de Daniel Laffitte, para construcción de hornos crematorios. 1970
', '31', '#046CE9401CC10773DC8BC60' );
-- ---------------------------------------------------------


-- Dump data of "kontratazioa" -----------------------------
INSERT INTO `kontratazioa`(`id`,`espedientea`,`urtea`,`sailkapena`,`signatura`,`numdoc`,`knosysid`) VALUES 
( '1', ' 
', '', '', '', '3', '#046CE9401CD23A4D43C1B10' ),
( '2', 'Bordaenean ezponda sendotzeko obrak kontratatzea / Contratación de las obras de estabilitzación de ladera en Bordaenea
Proiektua: bai
Osatugabeko espedientea
', '1997
', '2-3 Kontratazio espedientea
', 'KUDEAKETA 6. kutxa
', '15', '#046CE9401CD291382B54E50' ),
( '3', 'Hamarretxeta kalea, 24. behean Gizarte Zerbitzuentzat lokala moldatzeko obrak kontratatzea / Contratación de las obras de habilitación de local para Servicios Sociales en Hamarretxeta kalea, 24 bajo
Kontratista: José Luis Corrales
Proiektua: bai
Kontserbazio iraunkorra (ikusi Balorazioa)
Acceso libre
Erlazionatutako espedienteak: Escritura de dación en pago de local en la c/ Hamarretxeta, 22 - 24 bajo otorgada por AZGUIN SA 1997
', '1998 - 1999
', '2-3 Kontratazio espedienteak 
2-15-2 Proiektuak 
', 'KUDEAKETA 7. kutxa
lehen OM 4/98 caja nº 6
', '18', '#046CE9401CD291C5BE882C0' ),
( '4', 'Contratación de las obras de reparación y consolidación de los desprendimientos situados en la zona próxima al polideportivo de Donibane / Donibaneko kiroldegiaren inguruan izandako lur-jausiak konpondu eta sendatzeko obrak kontratatzea 
Kontratista: Construcciones ERGA SL
Proiektua: ez 
Kontserbazio iraunkorra
Acceso libre
Erlazionatutako espedienteak: 1997ko ekainaren 1ean izandako uholdeak 
', '1997 - 1998
', '2-3 Kontratazio espedienteak
', 'KUDEAKETA 8. kutxa
Lehen V-12/97 inundaciones 97
', '19', '#046CE9401CD29C3B46E2010' ),
( '5', 'Reparación de desprendimiento y consolidación de ladera en Farolako bidea / Farolako bidean lur-jausia konpondu eta ezponda sendotzeko obrak kontratatzea
Kontratista:
Proiektua: ez 
Kontserbazio iraunkorra
Acceso libre
Erlazionatutako espedienteak: 1997ko ekainaren 1ean izandako uholdeak 
', '1997 - 1998
', '2-3 Kontratazio espedienteak
', 'KUDEAKETA 8. kutxa
lehen V-17/97 inundaciones 97
', '20', '#046CE9401CD29C4A58F1940' ),
( '6', '2002ko abuztuan izandako uholdeak 
', '2002 - 2005
', '', 'KUDEAKETA 8. kutxa
inundaciones 2002
', '21', '#046CE9401CD29C7D0087BA0' ),
( '7', 'Hormak sendotzeko proiektuen erredakzioa kontratatzea ( Pasaia Donibaneko antzinako anbulatorioa, Victor Hugo etxea eta Urrestarazu Anaien kalea) / Contratación de la redacción de proyectos de afianzamiento de muros 
Kontratista: Pedro María Azkue Elosegi
Proiektua: bai
Kontserbazio: ?
Acceso libre
Erlazionatutako espedienteak: 
', '1998
', '2-3 Kontratazio espedienteak
', 'KUDEAKETA 8. kutxa
lehen V-7/98 caja nº 7
', '22', '#046CE9401CD29CB79261050' ),
( '8', 'Termitek egindako erasoagatik proiektuak kontratatzea 
Kontratista: Tecma
                   Mikel Landa Esparza
', '1999 
', '2-16 Saneamendua (?)
', 'KUDEAKETA 8. kutxa
lehen V-12/99 caja nº 7
', '24', '#046CE9401CD29D72B1E0EB0' ),
( '9', 'Contratación de la redacción del proyecto "Nuevas instalaciones subterráneas y pavimento en Torreatze - Pasai San Pedro" / " Torreatze - Pasai San Pedron lurrazpiko azpiegitura eta zoladuraren instalazio berriak" proiektuaren erredakzioa kontratatzea
Kontratista: Pedro Azkue Elosegi
Proiektua: ez
Kontserbazioa: ?
Acceso libre
Erlazionatutako espedienteak:
', '1998
', '2-3 Kontratazio espedienteak
', 'KUDEAKETA 9. kutxa
lehen V- 12/98 caja nº 7
', '25', '#046CE9401CD29D9A0CB4310' ),
( '10', 'Ulia etorbidea, 17. atzealdean horma eta eskailerak konpondu eta sendotzea proiektuaren erredakzioa kontratatzea / Contratación de la redacción del proyecto Reparación y afianzamiento de muros en Ulia etorbidea, 17 atzealdea
Kontratista: KEMEN Estudios y Proyectos SL
Proiektua: ez
Kontserbazio: ?
Acceso libre
', '2000
', '2-3 Kontratazio espedienteak
', 'KUDEAKETA 9. kutxa
lehen V-7/00 caja nº 8
', '28', '#046CE9401CD29DE4A43FAA0' ),
( '11', 'Azkuene kalea, 42. zenbakian hormak eta eskailerak konpondu eta sendotzea proiektuaren erredakzioa kontratatzea / Contratación de la redaccion del proyecto Reparación de muros y escaleras en Azkuene kalea, 42
Contratista: KEMEN Estudios y Proyectos SL
Proiektua: ez 
Kontserbazio: ?
Acceso libre
', '2000
', '2-3 Kontratazio espedienteak 
', 'KUDEAKETA 9. kutxa
lehen V-8/00 caja nº 8
', '29', '#046CE9401CD29DF34C0F880' ),
( '12', 'Donibanera sartzeko zona eta Puntetako Pasealekuko urbanizazio proiektuaren erredakzioa kontratatzea / Contratación de la redacción del proyecto de urbanización de la entrada a Donibane y Paseo de Puntas
Kontratista: ASMATU SL
Proiektua: ez
Kontserbazio: ?
Acceso libre
', '2000
', '2-3 Kontratazio espedienteak
', 'KUDEAKETA 9. kutxa
lehen V-3/00 caja nº 8
', '31', '#046CE9401CD29E12D917420' ),
( '13', '3.03 Molinao - Itsas Adarra Hiri Arean urbanizazio proiektuaren erredakzioa kontratatzea / Contratación de la redacción del proyecto de urbanización del Area Urbana 3.03 Molinao Itsas Adarra
Kontratista: Eduardo Ramos Platón y Rosario Ortiz de Zárate
Proiektua: ez 
Kontserbazio:
Acceso libre
', '2000
', '2-3 Kontratazio espedienteak
', 'KUDEAKETA 9. kutxa
lehen V-2/00 caja nº 8
', '33', '#046CE9401CD29E2D78B9810' ),
( '14', '1997ko ekainaren 1ean izandako  uholdeak 
Argazkiak eta bideoak
Kontserbazio iraunkorra
Acceso libre
Erlazionatutako espedienteak: Ondoren egin ziren obrak 
', '1997 - 1999
', '', 'KUDEAKETA 10 a, b, c kutxak
', '34', '#046CE9401CD29EC6AC24670' ),
( '15', 'Libros registro de plicas / Pleguen erregistro-liburuak (3 liburu)
', '1953 - 1961, 1061 - 1970, 1970 - 1988
', '2-3 Pleguen erregistro-liburuak / Libros registro de plicas
', 'KUDEAKETA 11. kutxa
', '35', '#046CE9401CD2C3825A2F640' ),
( '16', 'Foru Aldundiak emandako diru-laguntza markesinak jartzeko / Subvención de la Diputación para colocación de marquesina
', '2001 - 2002
', '2-15-2 Diru-laguntzen espedienteak
', 'KUDEAKETA 12. kutxa
lehen caja nº 10
', '43', '#046CE9401CD2CF4C595BEA0' ),
( '17', 'Mendiolabidea urbanizazio proiektuaren erredakzioa kontratatzea / Contratación de la redacción del proyecto de urbanización de Mendiolabidea
Kontratista: ASMATU SL
Proiektua: ez
Kontserbazio iraunkorra
Acceso libre
Erlazionatutako espedienteak:
', '2001 - 2002
', '2-3 Kontratazio espedienteak
', 'KUDEAKETA 12. kutxa
lehen V-16/01 caja nº 10
', '44', '#046CE9401CD2CFC8C400900' ),
( '18', 'Bizkaia plaza urbanizazio proiektuaren erredakzioa kontratzeta / Contratación de la redacción del proyecto de urbanización de la plaza Bizkaia
Kontratista: Eduardo Ramos Platón 
Proiektua: ez 
Kontserbazio iraunkorra
Acceso libre
Erlazionatutako espedienteak
', '2001 - 2002
', '2-3 Kontratazio espedienteak
', 'KUDEAKETA 12. kutxa
lehen V-18/01 caja nº 10
', '45', '#046CE9401CD2CFE143279A0' ),
( '19', 'San Pedro kalea, 7 eta 9. zenbakietan babespeko apartamentuen eraikinaren proiektuaren erredakzioa kontratatzea / Contratación de la redacción del proyecto de edificios de apartamentos tutelados en San Pedro kalea, 7 y 9
Kontratista: Lehengaia Arquitectos 
Proiektua: ez 
Kontserbazio iraunkorra
Acceso libre
Erlazionatutako espedienteak:
- Expediente de construcción de edificio destinado a apartamentos tutelados en San Pedro kalea, 7  9. 2004  2008
Contratista: EGUZKI ERAIKUNTZAK
Dirección de obra: ANTERO FERNANDEZ ARQUITECTOS
4-Expediente de contratación de la dirección de obra
5-Expediente de licencia de obras para instalación de grúa
6-Contratos con IBERDROLA
7-Contratos con los usuarios
8-Expediente de denuncia por daños en los edificios colindantes
9-Expediente de contratación de mobiliario
Contratista: Muebles ARUN
', '2002
', '2-3 Kontratazio espedienteak
', 'KUDEAKETA 12. kutxa
lehen V -6/02 caja nº 11
', '46', '#046CE9401CD2CFF24224240' ),
( '20', 'Subvención para la redacción del Programa Estratégico de Renovación de la zona de San Pedro Trintxerpe, así como la cartografía correspondiente
Kontserbazio iraunkorra
Acceso libre
Erlazionatutako espedienteak:
-Contratación de la redacción del documento de Renovación Urbana Trintxer - Azkuene. KUDEAKETA 12. kutxa
-Contratación del levantamiento topográfico Trintxerpe - Azkuene. KUDEAKETA 11. kuktxa
', '2000 - 2001
', '2-15-2 Diru-laguntzen espedienteak (?)
', 'KUDEAKETA 11. kutxa
lehen V-8/01 caja nº 9
', '37', '#046CE9401CD2C460C528580' ),
( '21', 'Contratación de la redacción del documento de Renovación Urbana del AU 2.06, 2.08 y 2.09 Trintxer-Azkuene / Trintxer - Azkuene 2.06, 2.08 eta 2.09 Hiri Eremua hiri berritxeko dokumentua erredakzioa kontratatzea
Kontratista: LKS INGENIERIA
Proiektua: ez 
Kontserbazio iraunkorra
Acceso libre
Erlazionatutako espedienteak:
- Contratación del trabajo de levantamiento topográfico de Trintxerpe - Azkuene. KUDEAKETA 11. kutxa
-Subvención para la redacción del Programa Estratégico de Renovación Urbana Trintxerpe - Azkuene. KUDEAKETA 11. kutxa
', '2001 - 2004
', '2-3 Kontratazio espedienteak
', 'KUDEAKETA 11. kutxa
lehen V-10/01 caja nº 9
', '38', '#046CE9401CD2C4735ACCE30' ),
( '22', 'Contratatación del trabajo "Levantamiento topográfico de la zona Trintxerpe - Azkuene" / Trintxerpe - Azkuene zonako altxamendu topografikoa" lana kontratatzea 
Kontratista: LYT Ingeniería Topográfica e Informática
Proiektua: ez 
Kontserbazio iraunkorra
Acceso libre
Erlazionatutako espedienteak:
- Contratación de la redacción del documento de Renovación Urbana Trintxer - Azkuene. KUDEAKETA 12. kutxa
- Subvención para la redacción de Programa Estratégico de Renovación Urbana de trintxerpe. KUDEAKETA 11. kutxa
', '2001 
', '2-3 Kontratazio espedienteak
', 'KUDEAKETA 11. kutxa
Lehen V- 8/01 caja nº 9
', '39', '#046CE9401CD2C47C3B87BC0' ),
( '23', 'Pasai Donibane eta Pasai San Pedro-Pabloenea hiri-gunearen altxamendu topografikoa kontratatzea / Contratación del levantamiento topográfico del área urbana Pasai Donibane y Pasai San Pedro-Pabloenea
Kontratista: Neurri Ingenieros
Kontserbazio iraunkorra
Acceso libre
Erlazionatutako espedienteak
', '2002 
', '2-3 Kontratazio espedienteak
', 'KUDEAKETA 12. kutxa
lehen V-3/02 caja nº 11
', '47', '#046CE9401CD2D0688C6DC40' ),
( '24', 'Udaltzaingorako lanerako arropa erostea / Adquisición de vestuario para la Guardia Municipal
Kontratista: Izulan SL
Kontserbazioa: ez (ikusi Balorazioa: contrato menor)
', '2002 - 2005
', '2-3 Kontratazio espedienteak
2-6 Eskuratze espedienteak (ondasu higigarriak)
', 'KUDEAKETA 13. kutxa
lehen V-5/02 caja nº 11
', '48', '#046CE9401CD2D08E60D9310' ),
( '25', 'Zerbitzuetako sailarako materiala elektrikoa erostea / Adquisición de material eléctrico para el Departamento de Servicios
Kontratista. SETALDE
Kontserbazio: ez (contrato menor)
Acceso libre
', '2002
', '2-3 Kontratazio espedienteak
', 'KUDEAKETA 13. kutxa
lehen V-08/02 caja nº 13
', '49', '#046CE9401CD2D0A36FC9C20' ),
( '26', 'Arratoiak hil eta intsektuak kentzeko zerbitzua kontratatzea / Contratación del servicio de desratización y desinfección
Kontratista: OIARSO
Kontserbazioa: ez 
Acceso libre
', '2002
', '2-3 Kontratazio espedienteak
', 'KUDEAKETA 13. kutxa
lehen V-4/02 caja n º 11
', '50', '#046CE9401CD2D0EA8561BE0' ),
( '27', 'La Herrera portuaren guneko  Euskadi etorbidean dagoen Eustaquio Sagarzazu lantegiaren eraistea kontratatzea 
Kontratista: REDENOR Reciclajes y demoliciones del norte SL 
Proiektua: ez
Kontserbazio iraunkorra
Acceso libre
Erlazionatutako espedienteak 
', '2004
', '2-3 Kontratazioa
', 'KUDEAKETA 13. kutxa
lehen OM 10/04 caja nº 13
', '52', '#046CE9401CD2EA294B0D950' ),
( '28', 'La Herrera portuaren guneko Euskadi etorbidean dagoen Aizkala SA lantegiaren eraistea kontratatzea / Contratación de la demolición del pabellón de Aizkala SA sito en Euskadi etorbidea, zona portuaria de La Herrera
Kontratista: REDENOR Reciclajes y Demoliciones SL 
Proiektua:
Kontserbazio iraunkorra
Acceso libre
Erlazionatutako espedienteak
', '2004
', '2-3 Kontratazio espedienteak
', 'KUDEAKETA 13. kutxa
lehen OM 9/04 caja nº 13
', '53', '#046CE9401CD2EA618737100' ),
( '29', 'Andonaegiko futbol zelaian argiketaren instalazioa kontratatzea / Contratación de la instalación de alumbrado en el campo de fútbol de Andonaegi 
Kontratista: ARGI Electromontajes SL
Proiektua: ez
Kontserbazio: ez (ikusi balorazioa)
Acceso libre
', '2004
', '2-3 Kontratazio espedienteak
', 'KUDEAKETA 13. kutxa
lehen OM 12/04 caja nº 13
', '54', '#046CE9401CD2F4709420EC0' ),
( '30', 'Irrati-irakurketarako sistema duten ur-irakurgailuak ordezkatzeko obrak kontratatzea / Contratación de las obras de sustitución de contadores de agua con sistema de radiolectura
Kontratista: Monedero Zerbitzuak 
Proiektua: ez 
Kontserbazio: ?
Acceso libre
', '2004
', '2-3 Kontratazio espedienteak
', 'KUDEAKETA 13. kutxa
lehen OM 7/04 caja nº 13
', '56', '#046CE9401CD2F4B89F993E0' );
-- ---------------------------------------------------------


-- Dump data of "kultura" ----------------------------------
INSERT INTO `kultura`(`id`,`espedientea`,`data`,`sailkapena`,`signatura`,`oharrak`,`numdoc`,`knosysid`) VALUES 
( '1', '7
', '', '', '', '', '25', '#046CE9401CAF7443D63FC00' ),
( '2', 'BRANKA Pasaiako herri aldizkaria
Argitaratzailea: Arnasa Euskara Elkartea
(00 - 38 bitarteko zenbakiak)
', '', '', 'Kultura Saila 4. kutxa
', '', '4', '#046CE9401CAF1BEC6A3BC20' ),
( '3', 'PASAIAN aldizkaria
', '', '', 'Kultura Saila 13. kutxa
', '', '5', '#046CE9401CAF1C640B40A40' ),
( '4', 'Actas de la Comisión Informativa de Kultura, Hezkuntza y Euskara
', '', '1-4 Actas
', 'Kultura Saila 7. kutxa
', '', '20', '#046CE9401CAF352B8D560E0' ),
( '5', 'Actas de la Comisión Informativa de Cultura, Hezkuntza y Euskara
', '', '1-4 Actas
', 'Kultura Saila 7. kutxa
', '', '21', '#046CE9401CAF352D4000780' ),
( '6', 'Actas de la Comisión Informativa de Hezkuntza, Kultura y Euskara
', '', '1-4 Actas
', 'Kultura Saila 7. kutxa
', '', '22', '#046CE9401CAF352E9373E20' ),
( '7', 'Actas de la Comisión Informativa de Cultura, Hezkuntza y Euskara
', '', '1-4 Actas
', 'Kultura Saila 7. kutxa
', '', '23', '#046CE9401CAF35301696540' ),
( '8', 'Actas de la Comisión Informativa de Kultura, Hezkuntza y Euskara
', '', '1-4 Actas
', 'Kultura Saila 7. kutxa
', '', '24', '#046CE9401CAF3531AD17450' ),
( '9', 'Contiene:
- Actas de la Comisión Informativa de Cultura, Reuskaldunización y Juventud (1983 - 1987)
- Actas de la Comisión Informativa de Juventud (1987 - 1988)
- Actas de la Comisión Mixta Ayuntamiento - AEK (1981 - 1982)
- Actas de la Comisión Mixta Ayuntamiento - Gaueskolak (1982 - 1983)
- Actas de la Comisión Informativa de Cultura y Reuskaldunización (1981 - 1983)
- Actas de la Comisión Informativa de Cultura, Educación y Euskara (1987 - 1991)
- Acta de la Junta de la Biblioteca Municipal de Pasai Antxo
- Actas del Consejo Municipal Escolar (1984 - 1991)
- Actas de la Comisión Informativa de Cultura y Educación (1991)
- Actas de la Comisión Informativa de Cultura, Educación y Deportes (1991)
- Actas de la Comisión Informativa de Cultura (1980)
- Actas de la Comisión Informativa de Euskara (1991)
- Junta de la Fundación Municipal de Música de Pasaia (1990 - 1991)
', '', '1-4 Actas
', 'Kultura Saila 7. kutxa
', '', '9', '#046CE9401CAF3519FA14F90' ),
( '10', 'LOS TRES PASAJES. Aldizkaria
2 - 19. bitarteko zenbakiak
', '', '', 'Kultura Saila 16. kutxa
', '1954, 1955 eta 1957 urteetako zenbakiak izan ezik, beste guztiak fotokopiak dira
', '12', '#046CE9401CAF351EB53F910' ),
( '11', 'Aldizkariak
- PASAIA GAUR. Kexaldi Elkartea. 1 - 19. zenbakiak. 1977 - 1979
- PASAJES. Revista anual. c/ Carretera. 1931, 1932, 1936
', '', '', 'Kultura Saila 17. kutxa
', '', '13', '#046CE9401CAF351FE9B1F80' ),
( '12', 'HIRIAN aldizkaria (1. zenbakia - ). 
EDK editorea
', '', '', 'Kultura Saila 12. kutxa
', '', '26', '#046CE9401CB228254D74CC0' ),
( '13', 'Erakusketen egitarauak eta kartelak / Programas y carteles de exposiones:
1988
- PITXU
- Miguel Angel Belza. Victor Hugo
- Pasaiako artisten erakusketa. Victor Hugo 
1989
- Zumeta. Victor Hugo 
- José L. Sanz. Victor Hugo 
- Mikel Cristti. Victor Hugo
1990
- Luisi Vélez. Victor Hugo 
- Pilar Alava Mendieta. Victor Hugo
- Belén Morena. Victor Hugo 
- Oier Villar. Antxoko Kultur Etxea
- 1991
- Kepa Lukas. Victor Hugo 
- Pedro Venancio Gassis y Minondo. Victor Hugo 
- Mensu. Victor Hugo 
- Carlos Inda. Victor Hugo 
- Estropadak. Antxoko Kultur Etxea
- Pedro Niño. Victor Hugo
1992
- Jornadas sobre indigenismo. Antxoko Kultur Etxea
- Los viajes portugueses y el encuentro de las civilizaciones. Antxoko Kultur Etxea
- Bixen Etxabe. Victor Hugo 
- Beltrán. Victor Hugo 
- Luisi Vélez y Carlos Naucler. Antxoko Kultur Etxea
1993
- Bergarako margolariak. Victor Hugo
- Iñaki Gómez, Pedro Aguirregomezcorta, Stoyab Voutchkov. Victor Hugo 
- Pasaia Cuba Solidaridad. Antxoko Kultur Etxea
- Alumnos del estudio Arritxu. Antxoko Kultur Etxea
- Mari Paz Jiménez. Victor Hugo 
- Miguel Angel Alvarez. Victor Hugo 
- Txontxongilo artegintza erakusketa. Antxoko kultur etxea
', '', '2-11-1 Programas
', '1. kutxa
', 'Baliteke erakusketa batzuek espedientea edukitzea
', '0', '#046CE9401CAEC449CA6D170' ),
( '14', 'Erakusketen egitarauak eta kartelak / Programas y carteles de exposiciones:
1994
- Andrea Moccio. San Pedroko Udal Aretoa 
- Victorio Montolivo. Victor Hugo 
- Xabier Otero. Pasai Antxoko Kultur Etxea
- Angeles Amutxastegi Esnaola. San Pedroko Udal Aretoa 
- Borja Arratibel. San Pedroko Udal Aretoa
- Calonge. Victor Hugo
- Pasaiako artisten erakusketa. Miranda de Ebro
- Juan Ramón Elisburu. Victor Hugo 
- Ricarko Ugarte.San Pedroko  Udal Aretoa
- Akuarela ikusgai. Victor Hugo 
- La Habanako grafika tailer esperimentala. Victor Hugo 
- Manu Airas. Pasai Antxoko Kultur Etxea
-  Gelasio Aranburu jaunari omenaldia
- J. Ortiz Hierro. Victor Hugo 
- Pasaiako Udalaren arte ondarearen erakusketa 1992 - 1993. Pasai Antxoko kultur etxea
- J. Arocena. Pasai Antxoko kultur etxea
- Tupa. Antxoko Kultur etxea
1995
- Jeanne Devoyon. Victor Hugo 
- Posada en Pasaia. Victor Hugo 
- Eugenio Ortiz. San Pedroko Udal Aretoa
- Carmen López Castillo. Victor Hugo
- Josan López de Pariza. Antxoko kultur etxea
- Iñigo Machain. Udal Aretoa San Pedro
- Jesús María Corman. Antxoko Kultur etxea
- Manpaso. Victor Hugo 
- Koldobika Jauregi. Victor Hugo 
1996
- Iñaki Rodríguez. San Pedroko  Udal Aretoa 
- Maite Martiarena. Victor Hugo 
- Tony D. Pájaro. San Pedroko Udal Aretoa 
- José María Ortiz. San Pedroko Udal Aretoa
- 12 cm. San Pedroko Udal Aretoa
1997
- 12 cm. San Pedroko Udal Aretoa 
- Carmen Muñoz. Victor Hugo 
- Juan Berrozpe, Ainara Erentxun, Olatz Irigarai, Cristina Matas. Victor Hugo 
- Asun del Pozo. Victor Hugo 
- Virginio Bosch. Victor Hugo 
- Pedro Etxeberria Ansa jaunari omenaldia. Victor Hugo
1998
12 cm. Udal Aretoa San Pedro 
1999
- Txomin Txueka. Andoni Egaña. Antxoko Kultur Etxea
- Jonathan Bernal. Victor Hugo 
- 12 cm. San Pedroko Udal Aretoa 
- Goiko. Victor Hugo 
- Diego Vasallo & Carlos Inda. Victor Hugo 
- Artelekuko Litografía. San Pedroko Udal Aretoa 
2000
- 12 cm. San Pedroko Udal Aretoa 
-  Pasai Donibaneko aintzinako argazkiak. Victor Hugo 
- Ramiro Arrue. San Juan de Luz
- Grabado de la Escuela de Arte de Pamplona. Antxoko Kultur Etxea
- Victor Hugo Etxetik Guarda Etxera
- Pasaiako ondare artistikoa. Victor Hugo 
- Sebastiâo Salgado. Antxoko Kultur Etxea
- José Luis Román. Antxoko Kultur Etxea
', '', '2-11-1 Programas
', '2. kutxa
', 'Baliteke erakusketa batzuek espedientea edukitzea
', '1', '#046CE9401CAF032A133AD70' ),
( '15', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                Actas de la Comisión Informativa de Cultura y Reuskaldunización 
', '', '1-4 Actas
', 'Kultura Saila 7. kutxa
', '', '18', '#046CE9401CAF35286FAC650' ),
( '16', 'EDUKIA:
- Ayudas de Diputación para Planes de Dinamización Cultural / Aldundiaren dirulaguntzak kultur dinamizazio planetarako  1988. 2-11-1 Expedientes de subvenciones / Dirulaguntzen espedienteak
- Presentación de libros  / liburuen aurkezpenak  1989. 2-11-1 Expedientes de actividades / Jardueren espedienteak 
- V Ttopara. Gipuzkoako Abesbatzen Elkartea. 1989. 2-11-1 Expedientes de actividades / Jardueren espedienteak 
- X. Txistulari kontzertua. 1989. 2-11-1 Expedientes de actividades / Jardueren espedienteak 
- Conciertos de agrupaciones locales / Herrietako elkarteen kontzertuak  1987, 1988, 1989. 2-11-1 Expedientes de actividades / Jardueren espedienteak 
- 1989. Trikitalarien jaialdia. 2-11-1 Expedientes de actividades / Jardueren espedienteak 
- Kontzertua. GANBARA. 1989. 2-11-1 Expedientes de actividades / Jardueren espedienteak 
- Subvención para el Taller Municipal de Teatro de Pasaia /  Dirulaguntza Pasaiako udal antzerki tailerrarentzat 1987. 2-11-1 Expedientes de subvenciones / Dirulaguntzen espedienteak 
- Subvención para el Taller Municipal de Teatro de Pasaia / Dirulaguntza Pasaiako udal antzerki tailerrarentzat 1989. 2-11-1 Expedientes de subvenciones / Dirulaguntzen espedienteak 
- Subvención para el Taller Municipal de Teatro de Pasaia / Dirulaguntza Pasaiako udal antzerki tailerrarentzat 1988. 2-11-1 Expedientes de subvenciones / Dirulaguntzen espedienteak 
- Antzerkia 1989 2-11-1 Expedientes de actividades / Jardueren espedienteak 
"Alpargatas cuando llueve" HIKA
"Gaviotas subterráneas" TTOPO
" El relevo" BEDEREN 1
- Antzerkia 1988 2-11-1 Expedientes de actividades / Jardueren espedienteak 
"Terror bajo los hilos" TAUN - TAUN
"Agur Eire agur" TTANTAK - TOPO
"Grande Place" GEROA
- Concurso para la portada de la revista Pasaia  Pasaia Aldizkariaren azalerako lehiaketa  1987 2-11-1 Expedientes de actividades / Jardueren espedienteak 
- Tricentenario del nacimiento de Blas de Lezo / blas de Lezoren jaiotzaren hirugarren mendeurrena  1989 2-11-1 Expedientes de actividades / Jardueren espedienteak 
', '', '', 'Kultura Saila 9. kutxa
', '', '15', '#046CE9401CAF352307CE600' ),
( '17', 'EDUKIA:
- 1990 Subvenciones para planes de dinamización cultural / Dirulaguntza kultura dinamizazio planetarako 2-11-1 Expedientes de subvenciones / Dirulaguntzen espedienteak 
- 1991 Subvención para la campaña verano de deporte / Uda Kanpainarako dirulaguntzak 2-12 Expedientes de subvenciones / Dirulaguntzen espedienteak 
- XI. Euskadiko aurresku txapelketa. 2-11-1 Expedientes de actividades / Jardueren espedienteak 
- Concurso de logotipos de Gas Pasaia / Gas Pasaiaren logotipo lehiaketa 1991
- 25 aniversario de la Ikastola de San Pedro / San Pedroko ikastolaren 25. urteurrena 1991 2-11-1 Expedientes de actividades / Jardueren espedientak 
- Música. Conciertos de agrupaciones locales / Musika. Herrietako taldeen kontzertuak  2-11-1 Expedientes de actividades / Jardueren espedienteak 
- Antzerkia 1990: 2-11-1 Expedientes de actividades / Jardueren espedienteak
"Antología" JORDI BERTRAN 
"El criado" TOPO
"!Oh limpiadas! TEATRO CALLEJERO
"Cogito" TEATRO DEL AIGUA
"Voyeur" DUODENO. 1988
- V. HAUR ABESBATZEN TTOPAKETA / v ENCUENTROS  DE COROS INFANTILES. 1991 2.11-1 Expedientes de actividades / Jardueren espedienteak 
- 1990  Elkarteak: Antxo, Donibane 2-11-1 Expedientes de actividades / Jardueren espedienteak
- 1989 Subvención para planes de dinamización cultural / Dirulaguntzak kultur dinamizazio planetarako 2-11-1 Expedientes de subvenciones / Dirulaguntzen espedienteak
- Semana de la Juventud / Sanjuandar gaztediaren astea . Donibaneko Gazte Taldea 1984
- Grupos de formación de la mujer / Emakumeentzako formazio taldeak  GATZAGA y CENTRO SOCIALES AZKUENE 1981
- Memorias de los grupos de tiempo libre de  Antxo y San Pedro San Pedro eta Antxoko aisialdi taldeen txostenak  1983
- 1984 Elkarteak 
- 1985 Elkarteak 
- 1987 Elkarteak 
- Erakusketak 1990:
PASAJES
LUISI VELEZ
XABI OTERO
EXPOSICION ESCOLAR
PILAR MENDIETA
BELEN MORENO
OIER VILLAR
PEDRO NIÑO 
COLECTIVO WHITE SPIRIT serigrafiak 
- Batelera agertzen den postala erostea (1990)
- Tercer centenario del nacimiento de Blas de Lezo /  Blas de Lezoren jaiotzaren hirugarren mendeurrena(1989)
- Escuela de Formación Profesional de Donibane / Donibaneko Lanbide Heziketako Eskola
', '', '', 'Kultura Saila 10. kutxa
', '', '16', '#046CE9401CAF3524C808780' ),
( '18', 'Kultur ekintzak (egitarauak):
- Pasaiako XXIII. Umorezko Antzerki Jardunaldiak
- Pasaiako XXII. umorezko antzerki jardunaldiak
- San Juan Eskola Publikoaren Lehenengo Argazki Lehiaketa
- 1. Musika eta Abesbatza Astea. San Pedro. 1986
- Gipuzkoako I. Antzerki Jaialdia. 1983
- Alkartasuna VI. Kultur Astea 1985
- Pasai Antxoko II. Jazzaldia. 2002
- Ricardo Flecha. Kantaldia. Pasai Antxo
- Festival cantautor / Kantautore jaialdia  Pasai Antxo
- Pasaiako 19. umorezko antzerki jardunaldiak
- Pasaiako 18. umorezko antzerki jardunaldiak 
- Kultur jardunaldiak. Pasai Antxo. 1983
- Kultur jardunaldiak. Trintxerpe. 983
- Pasaiako 25. umorezko antzerki jardunaldiak
- 1920 - 1968 Mugimendu modernoari buruzko V. Jardunaldiak
- 2006ko egutegia. Udalak argitaratutakoa
- 2007ko egutegia. San Pedroko Fototekak argitaratua
- Datarik gabeko liburuxkak
- Alkartasuna II. Kultur Astea 
- I. Argazki Lehiaketa
- Kultur Astea Pasai Antxon
- Pasai Donibaneko erakusketa
- X Aniversario del C F Sampedrotarra / CF Sampedrotarraren X. urteurrena 
- XI. umorezko antzerki jardunaldiak
- VIII umorezko antzerki jardunaldiak
- 1.er Concurso de fotografía para aficionados del País Vasco / I. Argazki Lehiaketa Euskal Herriko argazkizaleentzat .Cine - Club Pasajes. 1967
- VII. argazki lehiaketa. 1974
- 17. umorezko antzerki jarduanaldiak
', '', '', 'Kultura Saila 14. kutxa
', '', '6', '#046CE9401CAF1CF64EBCDE0' ),
( '19', 'Edukia:
- VI Jornadas de Teatro / VI. Antzerki jardunaldiak  1987.  2-11-1 Expedientes de subvenciones / Dirulaguntzen espedienteak 
- Memoria cursos artesanales / Artisautza ikastaroen txostena 1987. 2-11-1 Expedientes de actividades culturales / Jardueren espedienteak 
- 2ª semana musico coral de San Pedro. II. musika - abesbatza astea 1987. 2-11-1 Expedientes de actividades culturales / Jardueren espedienteak
- VII. aurresku txapelketa. 1987 2-11-1 Expedientes de actividades culturales / Jardueren espedienteak
- San Pedroko 3. musika - abesbatza astea. 1988 2-11-1 Expedientes de actividades culturales / Jardueren espedienteak 
- VIII. aurresku txapelketa. 1988. 2-11-1 Expedientes de actividades culturales / Jardueren espedienteak 
- Kultur Bideetan 1988. 2-11-1 Expedientes de actividades culturales / Jardueren espedienteak 
- Solicitud de subvención para programa de drogodependencias / Dirulaguntza eskaera drogomenpekotasun programetarako  1988. 2-9 Asistencia social
- 1989. Consideraciones de Herri Batasuna sobre programas de exposiciones y deporte / Herri Batasuna alderdiaren proposamena erakusketa eta kirol programen inguruan 
- 1988. Memoria de la Escuela de Formación Profesional Pasai Donibane / Pasai Donibaneko Lanbide Heziketa Eskolaren txostena
- 1988. Convenio de colaboración con Diputación para la Campaña de Actividades Deportivas / Lankidetza hitzarmena Aldundiarekin kirol ekintzen kanpainarako 
- 1989. Exposición de etnografía / Etnografia erakusketa 
- 1988. Exposición de fósiles / Fosilen erakusketa
- VII. jornadas de teatro de Pasaia. 1988
', '', '', 'Kultura Saila 18. kutxa
', '', '14', '#046CE9401CAF35217E916E0' ),
( '20', 'Edukia:
- Erakusketak 1993:
TUPA
PASAIA UDALEKO ONDARE ARTISTIKOA
JOSU ORTIZ HIERRO
IÑAKI GOMEZ
XALU ARTISAUAK
EL ARTE DE LA MARIONETA / TXOTXONGILOEN ARTEA
DANTZA JANTZIAK 
BERGARAKO MARGOLARIAK 
PASAIA - CUBA ELKARTASUNA 
- Pasaia Gazteria Komiki lehiaketa
- Erakusketak 1995:
VICTORIA MONTOLIVO
JOSE LUIS POSADA
EUGENIO ORTIZ
JOSAN LOPEZ DE PARIZA
CARMEN LOPEZ
ANDREA MOCCIO
KOLDOBIKA JAUREGI
JEAN DEVOYON
MAMPASO
JESUS MARIA CORMAN 
MAITE SAGARZAZU
IÑIGO MATXAIN
', '', '', 'Kultura Saila 22. kutxa
', '', '30', '#046CE9401CB2418185A0980' ),
( '21', 'Edukia: 
1- 1995. urteko kontzertuak:
- Bob Marley
- The Guanabana Dixieland Band
- Irungo Atsegina Akordeoi Orkesta
- Papa Joe´s marching band
- X Musiko Koral Astea. Antolatzailea: Ondartxoko Abesbatza 
- V. Musiko Jardunaldia. Donibane. Antolatzailea: Itsas Mendi
2- Liburutegiak: Eusko Jaurlaritzak bidalitako txostena. 1995
3- XV. Euskadiko Gipuzkoar Aurresku Txapelketa. 1995
4- Rally fotografikoa Villa de Pasaia. 1995
5- Erakusketak:
- Pasaiako Artisten erakusketa kolektiboa. Miranda de Ebro. 1994
- Pasaiako Artisten erakusketa kolektiboa. Candás Asturias. 1995
- Pasaiako Artisten erakusketa kolektiboa. Bartzelona. 1995
- Pasaiako Artisten erakusketa kolektiboa. Haro. 1995
6- Ikuskizun eszenikoen programaketak antolatzeko Eusko Jaurlaritzak emandako dirulaguntza / Subvención del Gobierno Vasco para programación de espectáculos escénicos. 1996
7- Antzerkia:
- SOBRADUN. "Herminio y Miguelito"
- OIHULARI CLOWN TALDEA. "Molestias clownicas"
- PEINETA TEATRO. "Mentiras"
- BEDEREN 1. "Ezkon gaua"
- MELODY SISTERS. "Melody sisters en acción"
- CLARET CLOW. "La teoría de la risa"
8- Drogomenpekotasuna / Drogodependencias
9- 1996. urteko erakusketak
- Iñaki Rodríguez. San Pedro
- Maite Martinena. Victor Hugo
- Asun del Pozo. Victor Hugo
- Toni Pájaro. San Pedro
- José Mari Ortiz. San Pedro
- Pasaiako artisten erakusketa kolektiboa
', '', '', 'Kultura Saila 25. kutxa
', '', '32', '#046CE9401CC8FE5A971EC00' ),
( '22', 'Edukia:
1- 1997. Erakusketak:
- 12 zm. San Pedro
- Cristina Matus, Juan Berrozpe, Olatz Iragorri, Ainara Erentzun. Victor Hugo
- Virginia Bosch. Victor Hugo
- 6 artistas. Portuko Almacén 4
2- 1997. Antzerkia:
- Trapu Zaharra
- La Dinámica
- Marimba Antzerki Taldea
- Tunantes del Norte
- Pilar Guerra y Ritxar Zumalabe
3- X. Pasaia Hiria Olerki Lehiaketa
4- 1996. Musika:
- Itsas Mendi, Antxoko I. Aste Musikala, The Original Pin Stripe Brass Band, Pasai San Pedroko 11. Musika Abesbatza Astea
5- Subvención para automatización de bibliotecas / Liburutegiak automatizatzeko dirulaguntzak. 1996
6- Elkarteak:
- Kultur Astea. Basari Elkartea
- Fado Cultural Daniel de Castelao
- Rally Fotográfico Villa de Pasaia III
7- XVI. Euskadiko Gipuzkoar Aurresku Txapelketa. Alkartasuna Dantza Taldea. 1996
', '', '', 'Kultura saila 26. kutxa
', '', '33', '#046CE9401CC93D6DC910E00' ),
( '23', 'Edukia:
- 1999. Erakusketak:
Paul Goikoetxea. Victor Hugo
12 zm San Pedro
Txomin Txueka. Antxo
- 1998. Erakusketak:
12 zm. San Pedro
- 1999. Antzerkia:
Esther Esparza eta Richard Zumalabe
La burla emociones escénicas y yu-yu antzerkia
- 1999. Dirulaguntzaren eskaerak (ereduak)
- 1992. Udako kanpaina (kirola)
- 1992. Musika. Elkarteen jarduerak
- 1998. Elkarteen jarduerak
- 1999. V. Kultur astea. Antolatzailea: euskaltegia
- 1998. Pasaia Hiria Olerki lehia
', '', '', 'Kultura saila 28. kutxa
', '', '35', '#046CE9401CC947AB6C470F0' ),
( '24', 'Edukiak:
- 2001. Elkarteen jarduerak
- 2001. Albaola elkartearen jarduerak
- 2001. Liburutegiak
-2001. Musika:
Ricardo Flecha. Antxo
Pasaiako musika taldeen emanaldiak
Son Caliente. Trintxerpe
Araugi (Georgia). Antxo
-2001. Bertsolari txapelketa. San Pedro
- 1999. Erakusketak:
Diego Vasallo eta Carlos Inda
Jonathan Bernal
Okupgraf Litografia. Victor Hugo eta San Pedro
- 1998. Erakusketak:
Dinosaurioak
', '', '', 'kultura saila 29. kutxa
', '', '36', '#046CE9401CC947CDFB18370' ),
( '25', 'Edukia:
- 2002. Erakusketak:
Antonio Di Bellorio. Antxo
Iñaki Bilbao
Ama lurraren defentsan. Antxo
Juan Carlos Cardesin. Victor Hugo
"Victor Hugoren II. urteurrena" ekitaldiaren erakusketa kolektiboa
Joel Desbouiges. Victor Hugo
Mikel Dalbret. Victor Hugo
Juantxo Egaña. Victor Hugo 
12 zm. San Pedro
- 2002. Elkarteei emandako dirulaguntza
- 2000. Ikuskizun eszenikoei emandako dirulaguntza
- 2000. Antzerkia:
Tanttaka teatroa. "Novecento, ozeanoko pianista"
Legaleon teatroa
Tanttaka teatroa
Topo antzerki taldea
- 1999. Korrespondentzia
- 1999. Pasaiako badia I. laburmetrai lehiaketa. Trintxer Kulturala
- 1999. "Pasaia: iraganaren oroigarria, etorkizunari begira" liburuaren aurkezpena
- 1999. Urteko programazioa
', '', '', 'Kultura saila 31. kutxa
', '', '38', '#046CE9401CC9561987E4480' ),
( '26', 'Edukia:
- 2001. Pasaiako XX. umorezko antzerki jardunaldiak
- 2002. Pasaiako XXI. umorezko antzerki jardunaldiak
- 2003. Pasaiako XXII. umorezko antzerki jardunaldiak
- 2004. Pasaiako XXIII. umorezko antzerki jardunaldiak 
', '', '', 'Kultura saila 32. kutxa
', '', '39', '#046CE9401CC95640FB9BA00' ),
( '27', 'Edukia:
- 2000. XII. Pasaia hiria olerki lehiaketa
- 2000. Eusko Jaurlaritzak emandako dirulaguntza
- 1999. Musika bandaren txostena
- 2000. Musika:
Pasaia Musikal, Son del Río, Amaraun taldea, Kantautoren jaialdia
- 2000. Antxoko liburutegia: memoria eta Absys informatika programa
- 2000. Eskolatik kalera
- 2000. Liburuen aurkezpena:
"Begiak itxi eta kitto". Xabier Etxaniz Rojo
"Literatura: askatasun bide". Koldo Eizagirre
"Pasaia blues". Harkaitz Cano
- 1999. Pasaiako I. kultur jardunaldiak (bertan behera geratu zen)
- 2000. Portugal-i buruzko jardunaldiak 
- 2000. Albaola museoari emandako dirulaguntza
', '', '', 'Kultura saila 35. kutxa
', '', '42', '#046CE9401CC9566E270D530' ),
( '28', 'Edukia:
- 2001. Erakusketak:
Joseba Lizarralde eta Maritxu Intxausti
Julio Matilla
Arantza Arratibel 
Iñaki Edroso 
Aintzinako euskal herriko bizimodua postal irudietan
Rafa Serras
"Gatzik gabe lurra". Angela Mejías eta Antonio Di Bellonio
J Luis Martínez Pasajes
- 2001. Antzerkia:
Ni Fu Ni Fa eta Lan Teatro antzerki taldeak 
"Bozinak, tronpetak eta zalaparta" Orratx Taldea
Bientocadas Trés. Cuplé
Alto Teatro
- Pasaiako Udala eta Pasaiako Udal antzerki tailerrak sinatutako hitzarmena. 2001
- 2000. Egitarauak
- 2000. Donibane Lohizuneko Euskal liburu eta disko azoka
- 2000. Pasai Antxoko historia musikalari buruzko ikerketa-beka, José María Hernández Gómez-i emandakoa
- 2000. Liburuen aurkezpenak:
"Kalaburtzako sirenak" Agustin Migeltorena
- 1999. Marrazki eta pintura ikastaroa. Udalak antolatuta
- 2001. XX. Euskadiko gipuzkoar aurresku txapelketa
', '', '', 'Kultura saila 37. kutxa
', '', '44', '#046CE9401CC956882E1B830' ),
( '29', 'Edukia:
- 1998.  Kultura eta hezkuntza batzorde informatiboaren aktak
- 1998. Udal Musika Fundazioaren batzordeen aktak
- 1998. Kontseilu eskolarra batzordearen aktak 
- 1999. Pasaia Musikal batzordearen aktak
', '', '', 'kultura saila 38. kutxa
', '', '45', '#046CE9401CC9568C8A33BA0' ),
( '30', 'Edukia:
- GUREAN aldizkaria. Oarsoaldeko euskararen berripapera. 1-21 zenbakiak (2000 - 2005)
- BRANKA. Pasaiako herri aldizkaria (2000 - 2003)
- 2001. Erakusketak:
12 zm
Mensu
- 2001. Lizeoarekin sinatutako hitzarmena
- 2002. Aranzadi
', '', '', 'Kultura saila 39. kutxa
', '', '46', '#046CE9401CC956918E88CA0' );
-- ---------------------------------------------------------


-- Dump data of "liburuxka" --------------------------------
INSERT INTO `liburuxka`(`id`,`deskribapena`,`data`,`azalpenak`,`signatura`,`numdoc`,`knosysid`) VALUES 
( '1', 'Pasajes tres
14 minutos y 19 segundos
Video formato BETA y formato VHS
', 'Desconocida
', '', 'VHS
', '6', '#046CE9401C9B1E92BDEAE40' ),
( '2', 'Pasaiko jaiak
Contiene: himnos y canciones de remo y fútbol
Intérpretes: Banda de la Sociedad Pasaitarra, Tamborreros - cantores de Pasai Donibane y San Pedro Abesbatza
Productor: Pasaiako Udala
', 'Desconocida 
', 'Letras de los himnos
También hay dos cintas en el inventario del Archivo 
', 'VHS / KASETAK 
', '7', '#046CE9401C9B1F16D51EC90' ),
( '3', 'La tradición vuelve a Pasajes
Tele Donosti
Video formato VHS
', 'Desconocida
', '', 'VHS, Kasetak
', '8', '#046CE9401C9B1F2A886AC50' ),
( '4', ' 100 años de desarrollo en Errenteria y su comarca / 100 urte garapena Errenterian eta bere eskualdean
Ayuntamiento de Errenteria. Oarsoaldea
Formato DVD
', 'Desconocida
', '', 'VHS/KASETAK/DVD
', '10', '#046CE9401C9B3695B281020' ),
( '5', 'También hay cielo sobre el mar.
Formato: copia de película en DVD
', '1955
', '', 'VHS/KASETAK/DVD
', '11', '#046CE9401C9B3697FA55750' ),
( '6', 'Trintxerpe. Galiziarrak Euskal Herrian
Pasaiako Udala. Pasaiako Portua eta Euskararen Donostia Patronatua
Formato VHS
', 'Desconocida
', '', 'VHS, kasetask, DVD
', '9', '#046CE9401C9B36905582310' ),
( '7', 'Un guía llamado Victor Hugo 
Oarsoaldea
Formato DVD
', 'Desconocida
', '', 'VHS/KASETAK/DVD
', '12', '#046CE9401C9B36CC073E370' ),
( '8', 'Aldizkaria: Pasaia - Gaur (nº 1 - 19)
Edición: KEXALDI Elkartea
Director: Txema Ruiz Etxeberria
Subdirector: Xabier Portugal Arteaga
', '1977 - 1979
', 'El nº 1  Y EL Nº 6 son fotocopias
', 'pasan a KULTUR SAILA
', '13', '#046CE9401C9B3759493CEB0' ),
( '9', 'Aldizkaria: MARES
Instituto Social de la Marina.Madrid
nº 1 - 112
', '1944, 1945, 1946, 1949, 1950, 1951, 1952, 1953, 1954, 1955
', '', 'pasa a Kultur Saila
', '18', '#046CE9401C9B38C12C47CB0' ),
( '10', 'Aldizkaria: PASAJES. Junta del Puerto de Pasajes 
nº 1 - 2
', '1985 ?
', '', 'pasa a Kultur Saila
', '17', '#046CE9401C9B38B90B55A00' ),
( '11', 'Aldizakaria: TRINCHERPE
Agrupación Cultural de Trincherpe
nº 70, 71, 72
', 'Abril 1972 - Abril 1973
', '', 'pasa a Kultur Saila
', '16', '#046CE9401C9B3852AE012C0' ),
( '12', 'Aldizkaria: LOS TRES PASAJES
nº 2 - 19
', '1944, 1945, 1946, 1947, 1948, 1949, 1950, 1952, 1954, 1955, 1956, 1957, 1958, 1959, 1960, 1961
', 'Son fotocopias. Años , 1954, 1955, 1957 son originales
', 'pasa a Kultur Saila
', '15', '#046CE9401C9B38364FED600' ),
( '13', 'Aldizkaria: PASAJES 
Revista anual
Dirección: c/ Carretera / c/ Iparraguirre
', '1931, 1932, 1936
', 'Son fotocopias. 
', 'pasa a Kultur Saila
', '14', '#046CE9401C9B3822D9464B0' ),
( '14', 'Rutas turísticas. Euzkadi
Departamento de Comercio, Pesca y Turismo del Gobierno Vasco 
Video formato BETA
', 'Desconocida 
', '', 'VHS, KASETAK, DVD, CD
', '4', '#046CE9401C9B1E8B0781AC0' ),
( '15', 'Oiarson aldeko artea (Manuel Lekuonari eskeinita)
Produkzioa: GIE Kilometroak 84
Gidoia: I Eizmendi eta beste batzuek
Iraupena: 42 minutu
Video formato BETA
', '1984
', 'En la caja hay tres folios explicativos
', 'VHS
', '3', '#046CE9401C9B1E86D2C0420' ),
( '16', 'Comercial Puerto de Pasajes
(Junta de Obras del Puerto de Pasajes)
Castellano 
Video formato VHS
', 'Desconocida
', '', 'VHS
', '2', '#046CE9401C9B1E7955B4C40' ),
( '17', 'Actividad pesquera del Puerto de Pasajes
(Junta de Obras del Puerto de Pasajes)
Video formato BETA
11 minutos
', 'Desconocido 
', '', 'VHS
', '0', '#046CE9401C9B1E729E1DEC0' ),
( '18', 'Desconocida
(Junta de Obras del Puerto de Pasajes)
Video formato Beta
', 'Desconocida
', '', 'VHS
', '1', '#046CE9401C9B1E76A354ED0' ),
( '19', 'Tiples de la Schola Cantorum. 
Zuzendaria: Gelasio Aranburu
CD
', '1930eko grabazioa
', 'Ricardo del Pozok, Antxotarrok Mintegikoak,  ekarritakoa
', 'VHS
', '20', '#046CE9401CCCF99750AF4E0' ),
( '20', 'Bilbao para España
25 minutos
Blanco y negro
Castellano
Copia cedida por la Filmoteca Vasca
Video formato BETA y formato VHS
', '1937
', 'Kopiatuta AVI formatuan (Artxiboa en "Donibane" G:)
', 'VHS
', '5', '#046CE9401C9B1E8D8607960' ),
( '21', 'Zurrumurru. Karmengo Ama HI. Ale informatiboa/Revista informativa (17. alea - 21. alea)
', '2002 - 2004
', '', 'Kultur Saila 45
', '19', '#046CE9401CCB021A13B7720' );
-- ---------------------------------------------------------


-- Dump data of "obratxikiak" ------------------------------
INSERT INTO `obratxikiak`(`id`,`espedientea`,`sailkapena`,`signatura`,`urtea`,`numdoc`,`knosysid`) VALUES 
( '1', 'Bordalaborda, 17. zenbakiko behea D etxebizitzan sukaldea eta komuna jartzeko baimena, Mertxe Garmendia Alberdik eskatua 
', 'Obra baimenak 
', 'Obra txikiak 1-51
', '2005
', '1', '#046CE9401CAAFC8CED50F30' ),
( '2', 'Mendiola bidea, 9. zenbakiko partzelan itxidura jartzeko baimen eskaera, Eugenio Hermo Piñeirok eskatua 
', 'Obra lizentziak
', 'Obra txikiak 1-52
', '2009
', '0', '#046CE9401CAAFC847A1DA70' ),
( '3', 'Eskalantegi, 11 - 3. B etxebizitzan sukaldea konpontzeko obra baimena, Leire Zaldua Gesalagak eskatua 
', 'Obra baimenak
', 'Obra txikiak 1-50
', '2005
', '2', '#046CE9401CAAFCBC7849FE0' ),
( '4', 'Donibane, 50 - 3.a etxebizitzan sukaldea konpontzeko obra baimena, Christian Pérez Arrillagak eskatua
', 'Obra baimenak
', 'Obra txikiak 1-49
', '2005
', '3', '#046CE9401CAAFCC119AD770' ),
( '5', 'Blas de Lezo, 4 - 3. B etxebizitzan sukaldea konpontzeko obra baimena, Ainara Goikoetxea Sanzek eskatua 
', 'Obra baimenak
', 'Obra txikiak 1-48
', '2005
', '4', '#046CE9401CAAFCC452285C0' ),
( '6', 'Euskadi Etorbidea, 9 - 4. ezkerreko etxebizitzan komuna konpontzeko obra baimena, Xabi Lekue Peñak eskatua
', 'Obra baimenak
', 'Obra txikiak 1-47
', '2004
', '5', '#046CE9401CAAFCC7C8A0650' ),
( '7', 'Pablo-enea, 16 - 3. B etxebizitzan María Elena Ferreira Da Silvak obrak egiteko eskatu zituen  baimena ezeztea
', 'Obra lizentziak 
', 'Obra txikiak 1-45
', '2004
', '7', '#046CE9401CAAFD4CB3B9E50' ),
( '8', 'Kanpitxo, 9 - 4. B etxebizitzan sukaldea konpontzeko obra baimena, Manuel Pan Varelak eskatua
', ' Obra baimenak
', 'Obra txikiak 1-44
', '2004
', '8', '#046CE9401CAB3915610ECA0' ),
( '9', 'Clementina de Jesús Cristari Pablo-enea, 20 - 3. D etxebizitzan obrak egiteko baimena ezeztea
', ' Obra baimenak
', 'Obra txikiak 1-43
', '2004
', '9', '#046CE9401CAB391AB221D90' ),
( '10', 'Gure Zumardia, 30 - 2. D etxebizitza konpontzeko obra lizentzia, María Jesús Otegi Arruabarrenak eskatua 
', 'Obra lizentziak
', 'Obra txikiak 1-40
', '2004
', '12', '#046CE9401CAB39258715560' ),
( '11', 'Gure Zumardia, 3 - 5. ezkerreko etxebizitzan sukaldea eta komuna konpontzeko obra baimena, Josean Cubero Diezek 
', 'Obra baimenak
', 'Obra txikiak 1-39
', '2004
', '13', '#046CE9401CAB39298194330' ),
( '12', 'Bordalaborda, 22 - 1. B etxebizitzan sukaldea konpontzeko obra baimena, Mariano Colmenar Serranok eskatua
', 'Obra baimenak
', 'Obra txikiak 1-38
', '2004
', '14', '#046CE9401CAB392CA38FD10' ),
( '13', 'Zumalakarregi, 6 - 5. B etxebizitzan komuna konpontzeko obra baimena, Jorge Rodríguez Suárezek eskatua 
', 'Obra baimenak
', 'Obra txikiak 1-37
', '2004
', '15', '#046CE9401CAB3930BCBF200' ),
( '14', 'Marqués de Seoane, 3 - 1. E etxebizitzan komuna konpontzeko obra baimena, Pedro Manuel Odriozola Galarragak eskatua 
', 'Obra baimenak 
', 'Obra txikiak 1-36
', '2004
', '16', '#046CE9401CAB3932F2D9000' ),
( '15', 'Pescadería, 29 - 1. C etxebizitzan komuna egiteko obra lizentzia, Ana María de Jesús Cristak eskatua 
', 'Obra lizentziak 
', 'Obra txikiak 1-35
', '2004
', '17', '#046CE9401CAB39365402EF0' ),
( '16', 'Kanpitxo, 11 - 1. B etxebizitzan sukaldea konpontzeko obra baimena, Daniel Monreal Villarrek eskatua 
', 'Obra baimenak
', 'Obra txikiak 1-33
', '2004
', '19', '#046CE9401CAB394A94B8170' ),
( '17', 'Euskadi Etorbidea, 45 beheko lokalari buruzko kontsulta, Donostiako Lehen Instantziako Epaitegiak eskatua
', 'Kontsultak
', 'Obra txikiak 1-32
', '2004
', '20', '#046CE9401CAB39525D9A500' ),
( '18', 'Lezo-bide, 13 - 2. C etxebizitzan komuna eta sukaldea konpontzeko obra baimena, Rafael Sánchez Aguirrek eskatua 
', 'Obra baimenak
', 'Obra txikiak 1-31
', '2004
', '21', '#046CE9401CAB3954A226EB0' ),
( '19', 'Arrandegi, 7 - 2. D etxebizitzan gasa jartzeko obra lizentzia, Estudio DEI SLk eskatua
', 'Obra lizentziak 
', 'Obra txikiak 1-30
', '2004
', '22', '#046CE9401CAB39589688D70' ),
( '20', 'Axular plaza, 4. zenbakiak barruko patioak konpontzeko obra lizentzia, jabekideek eskatua 
', 'Obra lizentziak 
', 'Obra txikiak 1-29
', '2004
', '23', '#046CE9401CAB395AB9D9250' ),
( '21', 'Pablo-enea, 6 - 3. D etxebizitzan isolamendu akustikoa egiteko obra baimena, Alberto Savaira Espogeirak eskatua 
', 'Obra baimenak
', 'Obra txikiak 1-28
', '2004
', '24', '#046CE9401CAB395D26565C0' ),
( '22', 'Hamarretxeta, 4 - 5. B etxebizitzan komuna konpontzeko obrak legeztasun baimena, Dora Varona Sánchezek eskatua
', 'Obra lizentziak 
', 'Obra txikiak 1-25
', '2004
', '25', '#046CE9401CAB3988FE57160' ),
( '23', 'Lezo-bide, 13. zenbakian dagoen lokalean arotzia aldatzeko obra baimena, Néstor Mendibil Ordoñézek eskatua 
', 'Obra baimenak
', 'Obra txikiak 1-26
', '2004
', '26', '#046CE9401CAB398D69C7860' ),
( '24', 'Hamarretxeta, 8 behean dagoen lokalean hondakiñak kentzeko obra lizentzia, María Nieves Rodríguez Guillormek eskatua
', 'Obra lizentziak 
', 'Obra txikiak 1-25
', '2004
', '27', '#046CE9401CAB39907AC6FF0' ),
( '25', 'Euskadi Etorbidea, 31 - 4. pisua 15. ateko etxebizitzan tabikeak aldatzeko obra lizentzia, Francisco Campo Roblesek eskatua 
', 'Obra lizentziak 
', 'Obra txikiak 1-24
', '2004
', '28', '#046CE9401CAB399413AA110' ),
( '26', 'Igeldo, 4. zenbakian baranda aldatzeko obra lizentzia, jabekideek eskatua 
', 'Obra lizentziak 
', 'Obra txikiak 1-23
', '2004
', '29', '#046CE9401CAB39976BBD570' ),
( '27', 'Faroko pasealekua, 3. zenbakiak ureko gorakari berri bat jartzeko obra baimena, jabekideek eskatua 
', 'Obra baimenak 
', 'Obra txikiak 1-22
', '2004
', '30', '#046CE9401CAB399D3157F10' ),
( '28', '         Lezo-bide, 15 - 5. B etxebizitzan balkoia konpontzeko obra lizentzia, Ortzuri Olaetxea Rodriguezek eskatua 
', 'Obra lizentziak 
', 'Obra txikiak 1-21
', '2004
', '31', '#046CE9401CAB39E01ED8B30' ),
( '29', 'San Roque, 4 - 2. ezkerreko etxebizitzan komuna konpontzeko obra baimena, José Luis Galiana Asensiok eskatua
', 'Obra baimenak
', 'Obra txikiak 1-19
', '2004
', '33', '#046CE9401CAB39E601F2920' ),
( '30', 'Faro pasealekua, 1 - 3. A etxebizitzan tabike bat botatzeko obra lizentzia, Jorge López Otazok eskatua 
', 'Obra lizentziak 
', 'Obra txikiak 1-18
', '2004
', '34', '#046CE9401CAB39E94017A90' );
-- ---------------------------------------------------------


-- Dump data of "pendientes" -------------------------------
INSERT INTO `pendientes`(`id`,`espedientea`,`data`,`signatura`,`numdoc`,`knosysid`) VALUES 
( '1', 'Puestos de pescado. Mercado de Trintxerpe
', '', 'caja nº 1, nº 3
', '2', '#423120801C77CD848583930' ),
( '2', 'Telefónica. Camino de San Marcos, 2
', '', 'caja nº 1, nº 4
', '3', '#423120801C77CD8487006F0' ),
( '3', 'Encomienda del ejercicio de potestad expropiatoria al Gobierno Vasco en relación al Area de Intervención Antxo Sur 3.02.1 Luzuriaga
', '', 'caja nº 1, nº 8
', '7', '#423120801C77CD8487BEDD0' ),
( '4', 'Copropietarios. Zumalakarregi, 5
', '', 'caja nº 1, nº 9
', '8', '#423120801C77CD8487E5ED0' ),
( '5', 'Evarista Martínez Rial. Pablo-enea, 20 - 1º izquierda
', '', 'caja nº 1, nº 12
', '11', '#423120801C77CD848EE5EB0' ),
( '6', 'Juan Ramón Lorenzo Martín. Zumalakarregi, 1 - 1º derecha
', '', 'caja nº 1, nº 15
', '14', '#423120801C77CD84916F550' ),
( '7', 'Ejes y objetivos de la labor municipal
', '1999
', 'caja nº 1, nº 18
', '17', '#423120801C77CD849254D30' ),
( '8', 'Propuesta de Alcaldía sobre temas de Personal: Kilometrajes y Gastos por Incapacidad Laboral
', '', 'caja nº 1, nº 19
', '18', '#423120801C77CD8492A0820' ),
( '9', 'Denuncia de los copropietarios de la c/ Oarso, 13 contra la Sociedad de Caza y Pesca Galepertarrak
', '', 'caja nº 1, nº 20
', '19', '#423120801C77CD8492C7920' ),
( '10', 'Camino al caserío Puzkazarreta
', '', 'caja nº 1, nº 21
', '20', '#423120801C77CD849313410' ),
( '11', 'Juicio verbal contra Promociones Suquía en las obras de la Avenida de Navarra
', '', 'caja nº 1, nº 22
', '21', '#423120801C77CD84933A510' ),
( '12', 'Informe de la Guardia Municipal sobre parada de taxis en Pasai San Pedro
', '', 'caja nº 1, nº 23
', '22', '#423120801C77CD849386000' ),
( '13', 'Informe de ANSA sobre servicio de agua potable
', '', 'caja nº 1, nº 24
', '23', '#423120801C77CD8493AA9F0' ),
( '14', 'Universidad del País Vasco. Prospección arqueológica
', '', 'caja nº 1, nº 26
', '25', '#423120801C77CD84941D5E0' ),
( '15', 'Solicitud de información en juicio por accidente en la zona de la Herrera
', '', 'caja nº 1, nº 27
', '26', '#423120801C77CD8494446E0' ),
( '16', 'Copropietarios. Avenida de Ulía, 1
', '', 'caja nº 1, nº 28
', '27', '#423120801C77CD8494901D0' ),
( '17', 'Obligaciones al portador emitidas por la Junta de Obras del Puerto de Pasajes
', '1949
', 'caja nº 1, nº 29
', '28', '#423120801C77CD8494B72D0' ),
( '18', 'Beatriz Gómez Moreno. Camino de Mendiola, 8 - 4º izquierda
', '', 'caja nº 1, nº 30
', '29', '#423120801C77CD8494DBCC0' ),
( '19', 'María José Seco Espada. Euskadi Etorbidea, 17 - 1º izquierda
', '', 'caja nº 1, nº 31
', '30', '#423120801C77CD849529EC0' ),
( '20', 'Eulalia Asensio Cerezo. Hamarretxeta, 23 - 6º D
', '', 'caja nº 1, nº 32
', '31', '#423120801C77CD84954E8B0' ),
( '21', 'Informe sobre los terrenos el Euskaltegi Municipal propiedad del Instituto Social de la Marina
', '', 'caja nº 1, nº 33
', '32', '#423120801C77CD8495759B0' ),
( '22', 'Evaluación del impacto ambiental de la Y VASCA
', '', 'caja nº 1, nº 34
', '33', '#423120801C77CD8495C14A0' ),
( '23', 'Edificio de Lizarazu en mal estado. Carretera de Larrabide
', '', 'caja nº 1, nº 35
', '34', '#423120801C77CD8495E85A0' ),
( '24', 'Copropietarios. San Pedro, 36
', '', 'caja nº 1, nº 36
', '35', '#423120801C77CD84960CF90' ),
( '25', 'Liquidación de aguas a Donostia
', '', 'caja nº 1, nº 37
', '36', '#423120801C77CD84965B190' ),
( '26', 'Facturas por suministro de agua de la estación de Txoritokieta
', '', 'caja nº 1, nº 38
', '37', '#423120801C77CD84967FB80' ),
( '27', 'Denuncia de Alfonso Goldaraz y Ana Martín sobre desprendimientos en el Paseo de Bonanza, 6 por obras el Ayuntamiento
', '', 'caja nº 2, nº 1
', '38', '#423120801C77CD8496CDD80' ),
( '28', 'Convenio con Aguas del Añarbe
', '', 'caja nº 2, nº 2
', '39', '#423120801C77CD8496F2770' ),
( '29', 'María Aragón Butrón. Enterramiento de su madre
', '', 'caja nº 2, nº 3
', '40', '#423120801C77CD84973E260' ),
( '30', 'Manuel Rodríguez Rodríguez. Borda-enea, 1 - 2º D
', '', 'caja nº 2, nº 4
', '41', '#423120801C77CD849765360' );
-- ---------------------------------------------------------


-- Dump data of "protokoloak" ------------------------------
INSERT INTO `protokoloak`(`id`,`artxiboa`,`saila`,`signatura`,`eskribaua`,`data`,`laburpena`,`datuak`,`oharrak`,`bilatzaileak`,`numdoc`,`knosysid`) VALUES 
( '1', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 4r.-5r
', 'Aginaga, Santiago
', '24/01/1792
', 'Almoneda y remate de la provisión de vino de Pasaia por José Antonio Casares (Altza).
', 'Se describen las condiciones.
', '', 'Udal-jarduera-Ayuntamiento
', '0', '#0BD641601C56815423D4240' ),
( '2', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 6r.-7v.
', 'Aginaga, Santiago
', '10/02/1792
', 'Almoneda y remate de la provisión de aguardiente de Pasaia por  Antonio Iginiz (Pasaia).
', 'Se describen las condiciones.
', '', 'Udal-jarduera-Ayuntamiento
', '1', '#0BD641601C568175301CA90' ),
( '3', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 8r.-8v.
', 'Aginaga, Santiago
', '03/02/1792
', ' José Ramón Villa y su mujer Manuela Antonia Maisaka (Mentxaka?), dan permiso para casarse a su hijo Manuel Antonio Villa, (Pasaia).
', '', '', 'Oinordetza-Herencia
', '2', '#0BD641601C5681A708B8F80' ),
( '4', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 9r.-10r.
', 'Aginaga, Santiago
', '12/02/1792
', 'Almoneda y remate de la provisión de vino de Pasaia por Francisco Trangoa (Pasaia). 
', 'Se describen las condiciones.
', '', 'Udal-jarduera-Ayuntamiento
', '3', '#0BD641601C5681B33061710' ),
( '5', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 11r.-12r.
', 'Aginaga, Santiago
', '15/02/1792
', 'Testamento de Antonio Javier Sainz. (Pasaia).
', 'Herederos: María Josefa Sainz Covarrubias, Ana Manuela Sainz, María Juana Sainz, Josefa Antonia Elizondo.
', '', 'Oinordetza-Herencia
', '4', '#0BD641601C568240CB2E850' ),
( '6', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 14r.-15v.
', 'Aginaga, Santiago
', '19/11/1788
', 'Creación de un censo de 60 ducados sobre la casa Laia por María Juana Sainz y Domingo Segurola (Pasaia).
', '', '', 'Kitapenak-Liquidación
', '5', '#0BD641601C56826BF2C13B0' ),
( '7', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 17r.-19v.
', 'Aginaga, Santiago
', '13/05/1791
', ' María Juana Sainz y Domingo Segurola su fiador (Pasaia), entregan un censo de 131 ducados a favor de    Santiago San Martín (natural de Pasaia y residente en Donostia).
', '', '', 'Kitapenak-Liquidación
', '6', '#0BD641601C56827EE72A070' ),
( '8', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 51r.-52r.
', 'Aginaga, Santiago
', '15/02/1792
', 'Los herederos de María Juana Sainz (Pasaia), nombran al abogado Manuel Arizabalo como mediador.
', '', '', 'Oinordetza-Herencia
', '7', '#0BD641601C5682A01B17790' ),
( '9', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 53r.-53v.
', 'Aginaga, Santiago
', '23/02/1792
', 'Fianza carcelaria pagada por  Martín Antonio Etxenike (Pasaia) y  Juan Miguel Lujanbio (Lezo) a favor de Eugenio Egiezabal.
', '', '', 'Espetxeak-Cárcel
', '8', '#0BD641601C5682AA1D7D980' ),
( '10', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 54r.-55r.
', 'Aginaga, Santiago
', '16/03/1792
', ' Poder otorgado por Martín Ignacio Abad (Pasaia) a favor de  Juan Bautista Manzisidor (Cádiz) para pedir lo que le debe Domingo Framil (Cádiz).
', '', '', 'Kitapenak-Liquidación
', '9', '#0BD641601C5682B2F973BD0' ),
( '11', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 56r.-57r.
', 'Aginaga, Santiago
', '29/03/1792
', 'Poder otorgado por Juan Bautista Edoiaga (Pasaia), a favor de Domingo Hondano (Bilbo) para pedir lo que le debe Martín Jauregi (Bilbo). 
', '', '', 'Kitapenak-Liquidación
', '10', '#0BD641601C5682E9BF49950' ),
( '12', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 56r.-57r.
', 'Aginaga, Santiago
', '29/03/1792
', ' Poder otorgado por Juan Bautista Edoiaga (Pasaia) a favor de  Domingo Hondano (Bilbo) para que intervenga en el juicio que tiene por una deuda contra Martín Jauregi. 
', '', '', 'Kitapenak-Liquidación
', '11', '#0BD641601C5682F24DC34D0' ),
( '13', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 58r.-58v.
', 'Aginaga, Santiago
', '10/03/1792
', 'Poder otorgado por  Vicente Ferrer (Pasaia) a favor de Miguel Antonio Mitxelena (Nafarroa) para que realice los trámites necesarios para demostrar su hidalguía.
', '', '', 'Aitonsemetzak-Hidalguias
', '12', '#0BD641601C56A6290DD2B00' ),
( '14', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 59r.-59v.
', 'Aginaga, Santiago
', '08/04/1792
', 'Poder otorgado por Inesa Tomase a favor de María Clara Añorga para percibir unas ganancias. (Pasaia).
', '', '', 'Kitapenak-Liquidación
', '13', '#0BD641601C56A6350E4B6C0' ),
( '15', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 60r.-60v.
', 'Aginaga, Santiago
', '11/04/1792
', 'Poder otorgado por María Ramona Iruretagoiena, viuda de  Francisco Iriarte (Pasaia) a favor de  Martín Manzaga (Bilbo) para percibir lo que le debe la viuda de Zubidea (Bilbo).
', '', '', 'Kitapenak-Liquidación
', '14', '#0BD641601C56A64A7279470' ),
( '16', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 61r.-62r.
', 'Aginaga, Santiago
', '13/04/1792
', 'Almoneda y remate de la sisa de carne de Pasaia por Pedro Mesene (Pasaia).
', 'Se describen las condiciones.
', '', 'Udal-jarduera-Ayuntamiento
', '15', '#0BD641601C56A6516B7C2B0' ),
( '17', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 63r.-64v.
', 'Aginaga, Santiago
', '13/04/1792
', ' Almoneda y remate de la provisión de carne de Pasaia por Pedro Mesene (Pasaia). 
', 'Se describen las condiciones.
', '', 'Udal-jarduera-Ayuntamiento
', '16', '#0BD641601C56A657D3A6FB0' ),
( '18', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 69r.-70v.
', 'Aginaga, Santiago
', '02/05/1792
', ' Testamento otorgado por Lorenzo Herrero (natural de Olmedo y residente en Pasaia)
', 'Albacea: Juan Antonio Aznárez.
', '', 'Oinordetza-Herencia
', '17', '#0BD641601C56A66E2EE3E80' ),
( '19', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 71r.-71v.
', 'Aginaga, Santiago
', '05/05/1792
', 'Inventario de los bienes de  Lorenzo Herrero, esposo de Ramona Iruretagoiena (Pasaia).
', '', '', 'Oinordetza-Herencia
', '18', '#0BD641601C56A6773505F30' ),
( '20', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 76r.-77v.
', 'Aginaga, Santiago
', '05/06/1792
', 'Poder otorgado por el ayuntamiento a favor de Santiago Aginaga (Pasaia) para ir a las Juntas Generales de Gipuzkoa.
', '', '', 'Udal-jarduera-Ayuntamiento
', '19', '#0BD641601C56A6841E18950' ),
( '21', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 78r.-79v.
', 'Aginaga, Santiago
', '24/07/1792
', ' Juan Agustín Iradi responsable de abastecimiento de la Compañía de Filipinas, nombra como responsables del almacén de Pasaia a Roque Fuente y Fernando Mutillo de la misma compañía.
', '', '', 'Merkataritza-Comercio
', '20', '#0BD641601C56A6A5A84AFD0' ),
( '22', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 82r.-83v.
', 'Aginaga, Santiago
', '23/08/1792
', ' Poder otorgado por  María Ignacia Etxeberria, viuda de  Antonio Fidel Iriberri a favor del procurador José Vicente Egaña para que gestione sus negocios.
', '', '', 'Merkataritza-Comercio
', '21', '#0BD641601C56A6B89EA5D50' ),
( '23', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 84r.-84v.
', 'Aginaga, Santiago
', '28/08/1792
', ' Juan Antonio Etxebeste (natural de Lezo y residente en Orereta) cede a  Pedro La Cruz (Pasaia) la obligación de la provisión de carne de Orereta.
', '', '', 'Udal-jarduera-Ayuntamiento
', '22', '#0BD641601C56A6CB27C4CF0' ),
( '24', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 85r.-86v.
', 'Aginaga, Santiago
', '06/09/1792
', 'Poder otorgado por María Teresa Abad viuda de  Diego Fuentes a favor de  José Manuel Arrieta para que intente invalidar el testamento de su esposo. (Pasaia).
', '', '', 'Oinordetza-Herencia
', '23', '#0BD641601C56A6E185D6D50' ),
( '25', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 87r.-89r.
', 'Aginaga, Santiago
', '06/09/1792
', ' Carta de pago otorgada por la parroquia de Pasaia a favor de Francisca Antonia Berrion Zubillaga (Pasaia), por la subrrogación de un censo de 30 ducados.
', '', '', 'Kitapenak-Liquidación
', '24', '#0BD641601C56A70414109F0' ),
( '26', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 90r.-91r.
', 'Aginaga, Santiago
', '21/09/1792
', ' Margarita Apolosin viuda de  Martín Oienart y Julián Aristi nombran a Fermín Iparragirre como juez de paz para que decida en el reparto de los bienes dejados por Martín Oienart. (Pasaia)
', 'Julián Aristi fue marido de  Josefa Oienart.
', '', 'Oinordetza-Herencia
', '25', '#0BD641601C56A720973FEE0' ),
( '27', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 95r.-96r.
', 'Aginaga, Santiago
', '21/09/1792
', ' Margarita Espolosin viuda de Martín Oienart y  Juan Aristi deciden repartirse los bienes de Martín Oienart. (Pasaia)
', 'Se detallan las condiciones
', '', 'Oinordetza-Herencia
', '26', '#0BD641601C56A73463949B0' ),
( '28', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 99r.-100v.
', 'Aginaga, Santiago
', '23/09/1792
', 'Testamento otorgado por Francisca Antonia Muñoz (Pasaia).
', 'Herederos: Ana Joaquina Muñoz.
                           Albaceas:  Joaquín Casares presbítero de la basílica de San Roque.
', '', 'Oinordetza-Herencia
', '27', '#0BD641601C56A74652A0390' ),
( '29', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 101r.-101v.
', 'Aginaga, Santiago
', '02/10/1792
', 'Poder otordago por el ayuntamiento de Pasaia a favor del procurador Ignacio Eizagirre para que intervenga en los asuntos que tiene que ver con la basílica de Pasaia.
', '', '', 'Eliza-Iglesia
', '28', '#0BD641601C56A7521B11B20' ),
( '30', 'GPAH/AHPG OÑATI
', 'PT
', '3/3463, 103r.-104v.
', 'Aginaga, Santiago
', '06/10/1792
', ' Margarita Espolosin cede a  Juan Martín Espolosin una bodega y una tienda que tenían en herencia. (Pasaia).
', '', '', 'Oinordetza-Herencia
', '29', '#0BD641601C56A76450E56E0' );
-- ---------------------------------------------------------


-- Dump data of "salidas" ----------------------------------
INSERT INTO `salidas`(`id`,`espedientea`,`signatura`,`eskatzailea`,`irteera`,`sarrera`,`knosysid`,`numdoc`) VALUES 
( '1', 'Constitución de Ayuntamietno 1987
', '622-10
', 'Karmele, Auxiliar Administrativo de Secretaría
', '21/03/1997
', '21/03/1997
', '#423120801C77CDAC16E1400', '0' ),
( '2', 'Constitución de Ayuntamiento 1991
', '847-5
', 'Karmele, Auxiliar Administrativo de Secretaría
', '21/03/1997
', '21/03/1997
', '#423120801C77CDAC172CEF0', '1' ),
( '3', 'Constitución de Ayuntamiento 1995
', 'XVII-1
', 'Karmele, Auxiliar Administrativo de Secretaría
', '21/03/1997
', '21/03/1997
', '#423120801C77CDAC18A9CB0', '2' ),
( '4', 'Concesión de terrenos para el mercado de Trintxerpe
', '619 OM
', 'Joseba, Secretario
', '19/03/1997
', '12/05/1997
', '#423120801C77CDAC18F57A0', '3' ),
( '5', 'Obras en la c/ San Pedro, 24
', '935-32
', 'Manoli, Administrativo de Secretaría
', '20/03/1997
', '04/04/1997
', '#423120801C77CDAC191C8A0', '4' ),
( '6', 'Obras de María Cruz Balerdi Arriarán
', '229-15
', 'Manoli, Administrativo de Secretaría
', '24/03/1997
', 'No-devuelto
', '#423120801C77CDAC1968390', '5' ),
( '7', 'Obras en la c/ San Pedro, 24
', '938-26
', 'Edurne, Urbanismo
', '24/03/1997
', '04/04/1997
', '#423120801C77CDAC19B6590', '6' ),
( '8', 'Obras en la c/ San Pedro, 24
', '938-27
', 'Edurne, Urbanismo
', '24/03/1997
', '04/04/1997
', '#423120801C77CDAC1A02080', '7' ),
( '9', 'Casa del médico
', '80 OM
', 'Karmele, Auxiliar Administrativo de Secretaría
', '26/03/1997
', '26/03/1997
', '#423120801C77CDAC1A4DB70', '8' ),
( '10', 'Obras en la c/ San Pedro, 24.
', '8354 OP
', 'Edurne, Urbanismo
', '02/04/1997
', '04/04/1997
', '#423120801C77CDAC1A74C70', '9' ),
( '11', 'Expediente personal de Olatz Alberro
', '490-4
', 'Maika, Auxiliar Administrativo de Personal
', '02/04/1997
', '02/04/1997
', '#423120801C77CDAC1AC0760', '10' ),
( '12', 'Dimisión de concejal del PP
', 'XVII-1
', 'Karmele, Auxiliar Administrativo de Secretaría
', '02/04/1997
', '10/04/1997
', '#423120801C77CDAC1B0C250', '11' ),
( '13', 'Tintorería Emili, c/ Gelasio Aramburu, 6
', '7446 OP
', 'Joseba, Secretario
', '02/04/1997
', '16/04/1997
', '#423120801C77CDAC1B57D40', '12' ),
( '14', 'Obras en la c/ Azcuene, 22. Copropietarios 
', '176-49
', 'Alberto, Auditoría
', '03/04/1997 (consulta)
', '', '#423120801C77CDAC1BA5F40', '13' ),
( '15', 'Construcción de la vivienda de la Avenida de Ulía, 1. Alberto Quemada
', '854 OP
', 'Edurne, Urbanismo
', '03/04/1997
', '07/04/1997
', '#423120801C77CDAC1BCA930', '14' ),
( '16', 'Partes de altas y bajas
', 'XXVII-4
', 'Maika, Administrativo de Personal
', '04/04/1997
', '04/04/1997
', '#423120801C77CDAC1C18B30', '15' ),
( '17', 'Expediente personal de Rosa Ibarlucea
', '481-3
', 'Rafa, Administrativo de Personal
', '04/04/1997
', '07/04/1997
', '#423120801C77CDAC1C64620', '16' ),
( '18', 'Obras en la c/ Rentería, 1.
', '960-53
', 'Agustín, Administrativo de Gestión
', '04/04/1997
', '07/04/1997
', '#423120801C77CDAC1CD7210', '17' ),
( '19', 'Mesas en el bar Kamio
', '206-30
', 'Mesonero
', '04/04/1997
', '04/04/1997
', '#423120801C77CDAC1D22D00', '18' ),
( '20', 'SOLO SPOT
', 'XV-12
', 'Mesonero
', '07/04/1997
', '07/04/1997
', '#423120801C77CDAC1D6E7F0', '19' ),
( '21', 'Obras en la c/ San Pedro, 24.
', '8354 OP
', 'Izaskun, Alcaldía
', '07/04/1997
', '07/04/1997
', '#423120801C77CDAC1DBA2E0', '20' ),
( '22', 'Expediente personal de Rodolfo Maceira
', '513-36
', 'Rafa, Administrativo de Personal
', '07/04/1997
', '07/04/1997
', '#423120801C77CDAC1DE13E0', '21' ),
( '23', 'Obras en la c/ Eskalantegi, 9. Copropietarios
', '206-3
', 'Manoli, Administrativo de Secretaría
', 'información perdida
', '07/04/1997
', '#423120801C77CDAC1E2CED0', '22' ),
( '24', 'Construcción de frontón
', '8 OM
', 'Agustín, Administrativo de Gestión 
', '08/04/1997
', '08/04/1997
', '#423120801C77CDAC1E7B0D0', '23' ),
( '25', 'Construcción de viviendas en la c/ Kupeldegi, 2. Simón González
', '888-1
', 'Joseba, Secretario
', 'información perdida
', '09/04/1997
', '#423120801C77CDAC1EC6BC0', '24' ),
( '26', 'Caserio Plazeta
', '182-12
', 'Joseba, Secretario
', '09/04/1997
', '23/10/1997
', '#423120801C77CDAC1F126B0', '25' ),
( '27', 'Censo de parados
', '898
', 'Maika, Auxiliar Administrativo de Personal
', '09/04/1997
', '09/04/1997
', '#423120801C77CDAC1F5E1A0', '26' ),
( '28', 'Expediente personal de Patxi Zarautz
', '718-3
', 'Rafa, Administrativo de Personal
', '10/04/1997
', '10/04/1997
', '#423120801C77CDAC1FAC3A0', '27' ),
( '29', 'Provisión de plaza de peón jardinero
', '878 c
', 'Rafa, Administrativo de Personal
', '10/04/1997
', '10/04/1997
', '#423120801C77CDAC1FD0D90', '28' ),
( '30', 'Obras en la c/ Oiartzun, 10 - 4º B. Copropietarios
', '180-43
', 'Mesonero
', '10/04/1997
', 'No-devuelto
', '#423120801C77CDAC201C880', '29' );
-- ---------------------------------------------------------


-- Dump data of "tablas" -----------------------------------
INSERT INTO `tablas`(`id`,`serie`,`unidad`,`resolucion`,`observaciones`,`fecha`,`knosysid`,`numdoc`) VALUES 
( '1', 'Expediente por infracciones de tráfico, circulación de vehículos y seguridad vial / Trafikoen alorreko, ibilgailu motordunen zirkulazioaren eta bide segurtasunaren alorreko arau-hausteen zehapen espedientea
', '', 'Eliminación total a los seis años a contar desde el final de la tramitación administrativa o, en su caso, de la judicial / Erabateko suntsiketa, sei urtera, betiere izapedetza administratiboa edota judiziala amaitu eta gero 
', '', 'Orden de 11 de julio de 2011 / 2011ko uztailaren 11ko agindua 
', '#046CE9401CEA3E4ACEC6E90', '0' ),
( '2', 'Expediente de permisos, licencias y vacaciones / Baimen, lizentzia eta oporrak eskatzeko espedientea 
', 'Departamento de Personal / Pertsonal Saila 
', 'Eliminación todal en el archivo de oficina a los dos años siguientes de finalizado el año natural de los documentos / Erabateko suntsiketa, bulegoko artxiboan dokumentuen urte naturala amaitu eta bi urtera
', '', 'Orden de 11 de julio de 2011 / 2011ko uztailaren 11ko agindua 
', '#046CE9401CEA3E515CCBAA0', '1' ),
( '3', 'Expediente de personal / Espediente pertsonala 
', 'Departamento de Personal / Pertsonal saila 
', 'Conservación permanente / Kontserbazio iraunkorra
', '', 'Orden de 11 de julio de 2011 / 2011ko uztailaren 11ko agindua 
', '#046CE9401CEA3E545284B70', '2' ),
( '4', 'Expediente de formación de personal / Langileen prestakuntza espedientea
', 'Departamento de Personal / Pertsonal saila 
', 'Eliminación total en el archivo de oficina a los cinco años, salvo los certificados que pasarían a archivarse en el expediente de personal / Erabateko suntsiketa, bulegoko artxiboan bost urtera, ziurtagiriak izan ezik. Ziurtagiriak espediente pertsonalean artxibatuko dira
', '', 'Orden de 11 de julio de 2011 / 2011ko uztailren 11ko agindua 
', '#046CE9401CEA3EA2F0ED8E0', '3' ),
( '5', 'Expediente de jubilación / Erretiro espedientea
', 'Departamento de personal / Pertsonal saila 
', 'Conservación permanente incluido en el expediente personal / Kontserbazio iraunkorra, espediente pertsonalean
', '', 'Orden de 11 de julio de 2011 / 2011ko uztailaren 11ko agindua 
', '#046CE9401CEA3EAC29B5E80', '4' ),
( '6', 'Expediente de selección de personal / Langileen aukeraketarako espedientea
', 'Departamento de Personal / Pertsonal saila 
', 'Conservación permanente. Se podrán eliminar en el archivo de oficina las instancias y documentación acreditativa de los aspirantes que no hubieran tomado parte en el proceso de selección a los sis meses de finalización del expediente; así como la documentación y los exámenes del personal que no haya superado las pruebas, una vez transcurridos cuatro años
Kontserbazio iraunkorra. Bulegoko artxiboan suntsitu ahalko dira espedientea amaitu eta sei hilabetera hautaketako prozeduran parte hartu ez duten izangaien eskaerak eta aurkeztutako merezimenduak; eta baita ere hautaprobak gainditu ez dituztenen dokumentuak eta azterketak behin lau urte igaro eta gero
', '', 'Orden de 11 de julio de 2011 / 2011ko uztailaren 11ko agindua
', '#046CE9401CEA3EB693ADB30', '5' ),
( '7', 'Expedientes de variaciones de nómina / Nominen aldaketen espedientea 
', 'Departamento de Personal / Pertsonal saila
', 'Eliminación total cuando se haya agotado su utilidad administrativa y siempre que se conserven permanentemente los listados de nóminas / Erabateko suntsiketa, behin erabilera administratiboa amaitu eta gero, eta betiere nominen zerrendak betiko kontserbatzen dira 
', '', 'Orden de 11 de julio de 2011 / 2011ko uztailaren 11ko agindua
', '#046CE9401CEA3EC4E156F40', '6' ),
( '8', 'Expediente disciplinario de personal funcionario y personal laboral / Funtzionarioen eta lan-kontratadun langileen diziplinako espedientea 
', 'Departamento de Personal / Pertsonal saila 
', 'Kontserbazio iraunkorra / Conservación permanente
', 'En el archivo municipal de Pasaia se archivaban con el expediente personal. 
', 'Orden de 11 de julio de 2011 / 2011ko uztailaren 11ko agindua 
', '#046CE9401CEA482F7373FE0', '7' ),
( '9', 'Liquidaciones a la mutualidad / Mutualitateko lilkidazioak 
', 'Departamento de personal / Pertsonal saila 
', 'Eliminación total a los 53 años de la fecha del documento / Erabateko suntsiketa, dokumentuaren datatik berrogeita hamahiru urtera
', '', 'Orden de 11 de julio de 2011 / 2011ko uztailaren 11ko agindua
', '#046CE9401CEA48395B54900', '8' ),
( '10', 'Liquidaciones TC1, TC2 / TC1 y TC2 likidazioak 
', 'Departamento de Personal / Pertsonal saila 
', 'Eliminación total a los 53 años de la fecha del documento / Erabateko suntsiketa, dokumentuaren datatik berrogeita hamahiru urtera
', '', 'Orden de 11 de julio de 2011 / 2011ko uztailaren 11ko agindua
', '#046CE9401CEA48418394D90', '9' ),
( '11', 'Solicitud de excedencia laboral / Lan-eszedentzia eskaera 
', 'Departamento de personal / Pertsonal saila 
', 'Eliminación parcial, excepto la solicitud y el documento que otorga el permiso y el de reingreso, que se incluirán en el expediente personal 
Suntsiketa partziala, eskaera eta baimena eta jarduneko zerbitzura itzultzeko dokumentua espediente pertsonalean gordeko dira 
', '', 'Orden de 11 de julio de 2011 / 2011ko uztailaren 11ko agindua 
', '#046CE9401CEA4848C7FD7F0', '10' ),
( '12', 'Expediente de control horario / Ordutegia kontrolatzeko espediente 
', 'Departamento de Personal / Personal saila 
', 'Eliminación total en el archio de oficina a los dos años desde la finalización del año natural en el que se han producido, excepto los que hayan generado algún expediente disciplinario, o algún otro procedimiento, que se conservarán hasta que los procedimientos incoados estén finalizados
Erabateko suntsiketa, bulegoko artxiboan dokumentuak ekoitzi diren urte naturala amaitu eta bi urtera, diziplinako espedienteren bat edota beste prozeduraren bat sortu dituztenak izan ezik. Horiek irekitako prozedurak amatu arte kontserbatuko dira 
', '', 'Orden de 11 de julio de 2011 / 2011ko uztailaren 11ko agindua
', '#046CE9401CEA4857A5E5050', '11' ),
( '13', 'Liquidaciones del Impuesto sobre la Renta de las Personas Físicas IRPF / Pertsona Fisikoen Errentaren gaineko zergaren likidazioak PFEZ
', 'Departamento de Personal / Pertsonal saila 
', 'Eliminación total a los diez años de cierre del ejercicio presupuestario al cual pertenecen / Erabateko suntsiketa, dagokion aurrekontu ekitaldia itxi eta hamar urtera 
', '', 'Orden de 11 de julio de 2011 / 2011ko uztailaren 11ko agindua 
', '#046CE9401CEA485E2DA8360', '12' ),
( '14', 'Expediente de comisión de servicios / Zerbitzu eginkizunen espedientea 
', 'Departamento de Personal / Pertsonal saila 
', 'Conservación permanente incluido en el expediente personal / Kontserbazio iraunkorra, espediente pertsonalean
', '', 'Orden de 11 de julio de 2011 / 2011ko uztailaren 11ko agindua
', '#046CE9401CEA486DAF9F3F0', '13' ),
( '15', 'Expediente de préstamos de consumo / Kontsumorako maileguen espedientea
', 'Departamento de Personal / Pertsonal saila 
', 'Eliminación total en el archivo de oficina a los cinco años del cierre del espediente / Erabateko suntsiketa, bulegoko artxiboan espedientea itxi eta bost urtera 
', 'En el archivo municipal se incluyen en el expediente personal
', 'Orden de 11 de julio de 2011 / 2011ko uztailaren 11ko agindua
', '#046CE9401CEA4872F9FDFF0', '14' ),
( '16', 'Listado de nóminas / Nominen zerrenda
', 'Departamento de Personal / Pertsonal saila
', 'Conservación permanente / Kontserbazio iraunkorra
', '', 'Orden de 11 de julio de 2011 / 2011ko uztailaren 11ko agindua
', '#046CE9401CEA4874F1CC9B0', '15' ),
( '17', 'Expediente para la solicitud de ayudas técnicas y/o especializadas / Laguntza teknikoak edota espezializatuak eskatzeko espedientea
', '', 'Eliminación total en el archivo de oficina a los cinco años a contar del cierre del expediente / Erabateko suntsiketa, bulegoko artxiboan espedientea itxi eta bost urtera 
', '', 'Orden de 3 de mayo de 2012 / 2012ko maiatzaren 3ko agindua
', '#046CE9401CEA49B2A15C900', '16' ),
( '18', 'Expediente para la solicitud de ayudas económicas para el acogimiento familiar de personas menores de edad / Adingabeak familietan hartzeko dirulaguntzak eskatzeko espedientea
', 'Gizartekintza
', 'Eliminación total en el archivo de oficina a los cinco años a contar del cirre del expediente / Erabateko suntsiketa, bulegoko artxiboan espedientea itxi eta bost urtera 
', '', 'Orden de 3 de mayo de 2012 / 2012ko maiatzaren 3ko agindua
', '#046CE9401CEA49F47CD3830', '17' ),
( '19', 'Expediente para la solicitud del programa Sendian de acompañamiento a personas mayores / Adinekoei laguntzeko Sendian programa eskatzeko espedientea 
', 'Gizartekintza
', 'Eliminación total en el archivo de oficina a los cinco años a contar desde la concesión del expediente / Erabateko suntsiketa, bulegoko artxiboan espedientea eman eta bost urtera
', '', 'Orden de 3 de mayo de 2012 / 2012ko maiatzaren 2ko agindua
', '#046CE9401CEA49FA7302A30', '18' ),
( '20', 'Expediente para la solicitud de tarjeta de estacionamiento para personas con discapacidad / Ezinduentzako aparkatzeko txartela eskatzeko espedientea 
', 'Gizartekintza
', 'Eliminación total en el archivo de oficina a los cinco años a contar del cierre del expediente / Erabateko suntsiketa, bulegoko artxiboan espedientea itxi eta bost urtera 
', '', 'Orden de 3 de mayo de 2012 / 2012ko maiatzaren 3ko agindua
', '#046CE9401CEA4A94A003940', '19' ),
( '21', 'Expediente para la solicitud de teleasistencia / Telelaguntza-zerbitzua eskatzeko espedientea
', 'Gizartekintza
', 'Eliminación total en el archivo de oficina a los dos años a contar del cierre del expediente / Erabateko suntsiketa, bulegoko artxiboan espedientea itxi eta bi urtera
', '', 'Orden de 3 de mayo de 2012 / 2012ko maiatzaren 3ko agindua
', '#046CE9401CEA4A99B4965B0', '20' ),
( '22', 'Expediente de ayudas económicas para el pago de tasas municipales de agua, basura y alcantarillado / Ur hornidurako, zabor bilketako eta estolderiako udal-tasak ordaintzeko dirulaguntza espedientea 
', 'Gizartekintza 
', 'Eliminación total en el archivo de oficina a los cinco años a contar del cierre del expediente / Erabateko suntsiketa, bulegoko artxiboan espedientea itxi eta bost urtera 
', '', 'Orden de 3 de mayo de 2012 / 2012ko maiatzaren 3ko agindua 
', '#046CE9401CEA4AA02CB3330', '21' ),
( '23', 'Expediente para la concesión de ayudas para desplazamientos a programas educativo-terapeúticos de toxicómanos / Toxikomanoak programa hezitzaile terapeutkoetara joateko dirulaguntzak emateko espedientea 
', 'Gizartekintza
', 'Eliminación total en el archivo de oficina a los cinco años a contar del cierre del expediente / Erabateko suntsiketa, bulegoko artxiboan espedientea itxi eta bost urtera 
', '', 'Orden de 3 de mayo de 2012 / 2012ko maiatzaren 3ko agindua
', '#046CE9401CEA4AA701F2D10', '22' ),
( '24', 'Expediente de subvención a hogares de jubilados / Zahar-etxeentzako dirulaguntza espedientea 
', 'Gizartekintza
', 'Eliminación total en el archivo de oficina a los cinco años a contar del cierre del expediente / Erabatteko suntsiketa, bulegoko artxiboan espedientea itxi eta bost urtera 
', '', 'Orden de 3 de mayo de 2012 / 2012ko maiatzaren 2ko agindua 
', '#046CE9401CEA4AAF2E850F0', '23' );
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


