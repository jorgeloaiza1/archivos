# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 0.0.0.0 (MySQL 5.7.22)
# Base de datos: glukyevaluation
# Tiempo de Generación: 2018-06-15 21:37:17 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla allowed_accounts
# ------------------------------------------------------------

LOCK TABLES `allowed_accounts` WRITE;
/*!40000 ALTER TABLE `allowed_accounts` DISABLE KEYS */;

INSERT INTO `allowed_accounts` (`id`, `email`, `names`, `city`, `job_title`, `created_at`, `updated_at`)
VALUES
	('10002245','jsilva@gluky.co','Jaime Alberto Silva Colorado','Medellín','Coordinador Desarrollo',NULL,NULL),
	('1017160943','acardona@gluky.co','Alexander Cardona Soto','Medellín','Desarrollador',NULL,NULL),
	('1017162689','marbelaez@gluky.co','Melissa Arbeláez López','Medellín','Desarrollador',NULL,NULL),
	('1017175769','etangarife@gluky.co','Claudia Eliana Tangarife Rojas','Medellín','Analista Beneficios',NULL,NULL),
	('1017180924','julian.martinez@pagomio.com','Julian Martinez','Medellín','Desarrollador Pagomio',NULL,NULL),
	('1017209385','lceballos@gluky.co','León Dario Ceballos Herrera','Medellín','Desarrollador',NULL,NULL),
	('1017227034','tcardona@gluky.co','TATIANA ALEXANDRA CARDONA OROZCO','CEDI','Analista logístico',NULL,NULL),
	('1017261742','breinoso@gluky.co','Barbara Wildrey Reinoso Gomez','Medellín','Auxiliar Servicio al Cliente',NULL,NULL),
	('1020412530','yceballos@gluky.co','YOAN ALEXANDER CEBALLOS','Medellín','Analista Compras',NULL,NULL),
	('1022371521','avaca@gluky.co','Julieth Andrea Vaca Nieto','Medellín','Analista Inteligencia de Clientes',NULL,NULL),
	('1024546876','alopez@gluky.co','Derly Alejandra López Rozo','Bogotá','Analista Comercial ',NULL,NULL),
	('1026148382','ljimenez@gluky.co','Lorena Jiménez Foronda','Medellín','Auxiliar Servicio al Cliente',NULL,NULL),
	('1032453055','lcastaneda@gluky.co','Luz Karine Castañeda Medina','Bogotá','Analista Comercial',NULL,NULL),
	('1033770874','testupinan@gluky.co','Leidy Tatiana Estupiñan Duarte','Bogotá','Jefe de Cuenta',NULL,NULL),
	('1035390214','servicioalcliente1@gluky.co','Daniela Maria Castrillon Osorio','Medellín','Auxiliar Servicio al Cliente',NULL,NULL),
	('1035862442','csoto@gluky.co','SOTO LONDOÑO CAROLINA','Medellín','Coordinador Gestión Humana',NULL,NULL),
	('1036612187','tcolorado@gluky.co','tatiana andrea colorado galeano','Medellín','Analista Plataforma',NULL,NULL),
	('1036622954','jgalvis@gluky.co','Jorge Andrés Galvis Fernández','Medellín','Creativo Senior',NULL,NULL),
	('1036623988','jrendon@gluky.co','Joan Esteban Rendón Carmona','CEDI','Coordinador Logístico',NULL,NULL),
	('1036634398','svalencia@gluky.co','Susana Valencia Vasco','Medellín','Creativo Copy',NULL,NULL),
	('1036637309','dprieto@gluky.co','PRIETO OSSA LADY  DANIELA','Medellín','Coordinador Plataformas',NULL,NULL),
	('1036648268','almacen@gluky.co','Shirley Tatiana Muñoz Guirales','CEDI','Analista Inventario',NULL,NULL),
	('1037501787','jmolina@gluky.co','Julio Alberto Molina Restrepo','Medellín','Auxiliar Servicio al cliente',NULL,NULL),
	('1037572448','lcano@gluky.co','Laura Marcela Cano Naranjo ','Medellín','Auxiliar Servicio al Cliente',NULL,NULL),
	('1037582178','lucho@gluky.co','Luis Ernesto Salazar Garcés','Medellín','Diseñador Gráfico',NULL,NULL),
	('1037621028','mcardona@gluky.co','Maria andrea cardona','Medellín','Planner',NULL,NULL),
	('1038119295','atencionalusuario@gluky.co','PORTELA VILLA ANDREA','Medellín','Auxiliar Servicio al cliente',NULL,NULL),
	('1039451378','vmunera@gluky.co','Vanessa Múnera Osorio','Medellín','Coordinador Bienestar y Marca',NULL,NULL),
	('1098663277','cguzman@gluky.co','María Camila Guzmán Vargas','Bogotá','Jefe de Cuenta Senior',NULL,NULL),
	('1098714603','aespana@gluky.co','Aura María España Dominguez','Bucaramanga','Analista Comercial ',NULL,NULL),
	('1104675643','lgallego@gluky.co','Leidy Johana Gallego Valencia','Bogotá','Analista Comercial',NULL,NULL),
	('1107039932','dbromet@gluky.co','David Bromet','Bogotá','Coordinador Comercial',NULL,NULL),
	('1128267978','cregino@gluky.co','Cárol Regino Miranda','Chile','Director Comercial',NULL,NULL),
	('1128271588','cwirth@gluky.co','Cecilia Ines Wirth Franco','Medellín','Analista Bases de Datos',NULL,NULL),
	('1128271692','lavendano@gluky.co','Laura Avendaño Ortiz','Medellín','Coordinador Comercial',NULL,NULL),
	('1128273735','arestrepo@gluky.co','Andrea Restrepo Gómez','Medellín','Diseñador Gráfico',NULL,NULL),
	('1128401057','cflorez@gluky.co','catherine florez gonzalez','Medellín','Analista Prefacturación',NULL,NULL),
	('1128420339','mlopez@gluky.co','Marisol Lopez González','Medellín','Auxiliar Servicio al cliente',NULL,NULL),
	('1128422114','misaza@gluky.co','Manuela Isaza Mesa','Medellín','Jefe de Cuenta Senior',NULL,NULL),
	('1128426132','jobando@gluky.co','JULIANA OBANDO TAVERA ','Medellín','Auxiliar Contable Senior',NULL,NULL),
	('1130587391','hortega@gluky.co','Harold Francesco Ortega López','Medellín','Desarrollador',NULL,NULL),
	('1130618700','ddiaz@gluky.co','Diana Lorena Diaz Montoya','Cali','Jefe de Cuenta Senior',NULL,NULL),
	('1130621954','vbotero@gluky.co','Vanessa Botero Restrepo','Cali','Jefe de Cuenta',NULL,NULL),
	('1144024930','jartunduaga@gluky.co','julian alfonso artunduaga muñoz','Cali','Analista Comercial',NULL,NULL),
	('1144029318','dsardi@gluky.co','Diana Carolina Sardi','Cali','Coordinador Clientes Nuevos',NULL,NULL),
	('1144149834','lcastro@gluky.co','Lina Marcela Castro Zuñiga','Cali','Jefe de Cuenta',NULL,NULL),
	('1151950025','czuleta@gluky.co ','Cristhian Felipe Zuleta Palacios','Cali','Analista Comercial',NULL,NULL),
	('1152212098','jarenas@gluky.co','JUAN FERNANDO ARENAS','Medellín','Analista Comercial',NULL,NULL),
	('1152438157','mmesa@gluky.co','Manuela Mesa Álvarez','Medellín','Coordinador Beneficios',NULL,NULL),
	('166446716','rpichipillan@gluky.cl','ROBERTO PICHIPILLAN EPULEF','Chile','Analista Operaciones Internacional',NULL,NULL),
	('16929746','rruiz@gluky.co','ricardo ruiz valderrama','Bogotá','Director Comercial',NULL,NULL),
	('225162719','lmontoya@gluky.co','Laura Montoya Carosio','Chile','Director Operativo Administrativo Internacional',NULL,NULL),
	('233128E11','arivera@gluky.mx','Andrea Rivera González','México','Analista Operaciones Internacional',NULL,NULL),
	('25514689-0','emogollon@gluky.cl','Edna Juliana Mogollon Garcia','Chile','Analista Comercial ',NULL,NULL),
	('30233407','jbermudez@gluky.co','JOHANNA BERMUDEZ ARANGO','Medellín','Coordinador planeación',NULL,NULL),
	('3400435','nsaldarriaga@gluky.co','Nicolás Saldarriaga Tobón','Medellín','Director Tecnología',NULL,NULL),
	('3482033','jmoreno@gluky.co','juan david moreno muñoz','Medellín','Diseñador Gráfico',NULL,NULL),
	('38552682','dlopez@gluky.co','Diana Lopez','Cali','Coordinador Comercial',NULL,NULL),
	('40341393','crondon@gluky.co','Catherine Rondón Mojica','México','Director Comercial',NULL,NULL),
	('42685445','ojimenez@gluky.co','JIMENEZ BETANCUR OLGA LUCIA','Medellín','Coordinador Contabilidad',NULL,NULL),
	('43169568','recepcion@gluky.co','MONTOYA ARIAS ADRIANA ALEJANDRA','Medellín','Recepción',NULL,NULL),
	('43191031','vagudelo@gluky.co','Yadis Viviana Agudelo Restrepo','Medellín','Auxiliar Cotizaciones',NULL,NULL),
	('43271670','parango@gluky.co','Paola Alejandra arango piedrahita ','Medellín','Director Gestión Humana',NULL,NULL),
	('43272779','dbetancur@gluky.co','BETANCUR PINZON DIANA MARCELA','Medellín','Coordinador Compras',NULL,NULL),
	('43623295','atencionalcliente@gluky.co','CARDONA SOTO IDAVELLY YULIETH','Medellín','Auxiliar Servicio al cliente',NULL,NULL),
	('43758796','gangel@gluky.co','GLORIA EMILSE ANGEL DIAZ','Medellín','Asistente Financiero',NULL,NULL),
	('43875266','luribe@gluky.co','MARTA LUCIA URIBE RESTREPO','Medellín','Tesorería',NULL,NULL),
	('43915742','ntaborda@gluky.co','Darlin Natalia Taborda Alvarez','CEDI','Auxiliar Almacén',NULL,NULL),
	('43977477','jacosta@gluky.co','Juliana Acosta','Medellín','Jefe de Cuenta',NULL,NULL),
	('52249128','asanchez@gluky.mx','Alba Liliana Sánchez Morales','México','Jefe de Cuenta',NULL,NULL),
	('529230','josesilva@gluky.co','Jose Silva Herrera','Medellín','Desarrollador',NULL,NULL),
	('70329124','daniel.echandia@pagomio.com','Daniel Echandia Restrepo','Medellín','Director Pagomío',NULL,NULL),
	('71270169','jmesa@gluky.co','Juan Jose Mesa Montoya','México','CEO',NULL,NULL),
	('71381907','corozco@gluky.co','Carlos Ignacio Orozco Correa','Medellín','Coordinador Diseño',NULL,NULL),
	('71763945','agarcia@gluky.co','Garcia Betancur Andrés Felipe','Medellín','Director Operaciones',NULL,'2018-03-06 21:10:09'),
	('71777832','jtorne@gluky.co','Juan Fernando Torné Álvarez','Medellín','Coordinador Creativo',NULL,NULL),
	('74182024','cfigueroa@gluky.co','Camilo Andres Figueroa Barrantes','Medellín','Desarrollador',NULL,NULL),
	('80168318','hdiaz@gluky.co','HAROLD GIOVANNI DIAZ ARANGO','Medellín','Director Estrategia y Diseño',NULL,NULL),
	('80198153','jfjoachim@e-a.co','Jean Francois Joachim','Medellín','CEO',NULL,NULL),
	('8029272','jcelis@gluky.co','Juan Daniel Celis Calvache','Medellín','Coordinador Inteligencia de Clientes',NULL,NULL),
	('8364608','hectordiaz@gluky.co','Hector Mauricio Diaz Cordero','Medellín','Desarrollador',NULL,NULL),
	('88772199','jdeleon@gluky.co','José de Leon díaz','Panamá','Analista Operaciones Internacional',NULL,NULL),
	('94557133','nrodriguez@gluky.co','nicolas rodriguez','Medellín','Planner',NULL,NULL),
	('98703331','juanmunoz@gluky.co','JUAN FERNANDO MUÑOZ','Medellín','Diseñador Gráfico Senior',NULL,NULL),
	('e8111995','xhenao@gluky.co','Ximena Henao','Panamá','Director Operativo Administrativo Internacional',NULL,NULL),
	('tocj831117tma','jtoro@gluky.co','JULIANA TORO CASTRO','México','Director Operativo Administrativo Internacional',NULL,NULL);

/*!40000 ALTER TABLE `allowed_accounts` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
