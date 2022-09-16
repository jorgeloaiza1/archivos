# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 0.0.0.0 (MySQL 5.7.22)
# Base de datos: glukyevaluation
# Tiempo de Generación: 2018-05-03 22:29:56 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla data_rows
# ------------------------------------------------------------

LOCK TABLES `data_rows` WRITE;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`)
VALUES
	(1,1,'id','number','ID',1,0,0,0,0,0,NULL,1),
	(2,1,'name','text','Name',1,1,1,1,1,1,NULL,2),
	(3,1,'email','text','Email',1,1,1,1,1,1,NULL,3),
	(4,1,'password','password','Password',0,0,0,1,1,0,NULL,4),
	(5,1,'remember_token','text','Remember Token',0,0,0,0,0,0,NULL,5),
	(6,1,'created_at','timestamp','Created At',0,0,1,0,0,0,NULL,6),
	(7,1,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,7),
	(8,1,'avatar','image','Avatar',0,0,1,1,1,1,NULL,9),
	(9,1,'user_belongsto_role_relationship','relationship','Role',0,0,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\",\"taggable\":\"0\"}',11),
	(10,1,'user_belongstomany_role_relationship','relationship','Roles',0,0,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}',13),
	(12,2,'id','number','ID',1,0,0,0,0,0,'',1),
	(13,2,'name','text','Name',1,1,1,1,1,1,'',2),
	(14,2,'created_at','timestamp','Created At',0,0,0,0,0,0,'',3),
	(15,2,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'',4),
	(16,3,'id','number','ID',1,0,0,0,0,0,'',1),
	(17,3,'name','text','Name',1,1,1,1,1,1,'',2),
	(18,3,'created_at','timestamp','Created At',0,0,0,0,0,0,'',3),
	(19,3,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'',4),
	(20,3,'display_name','text','Display Name',1,1,1,1,1,1,'',5),
	(21,1,'role_id','text','Role',0,0,1,1,1,1,NULL,10),
	(22,1,'settings','text','Settings',0,0,0,0,0,0,NULL,8),
	(23,1,'document','text','Document',1,1,1,1,1,1,NULL,12),
	(24,1,'job_title','text','Job Title',1,0,0,1,1,0,NULL,14),
	(25,1,'photo','text','Photo',1,0,1,1,1,1,NULL,16),
	(26,1,'oauth','text','Oauth',0,0,0,0,0,0,NULL,17),
	(27,1,'is_admin','checkbox','Is Admin',1,0,1,1,1,0,NULL,18),
	(28,1,'is_active','checkbox','Is Active',1,1,1,1,1,1,NULL,19),
	(29,5,'id','text','Id',1,1,1,1,1,1,NULL,1),
	(30,5,'email','text','Email',1,1,1,1,1,1,NULL,2),
	(31,5,'names','text','Names',1,1,1,1,1,1,NULL,3),
	(32,5,'city','text','City',1,1,1,1,1,1,NULL,4),
	(33,5,'job_title','text','Job Title',0,1,1,1,1,1,NULL,5),
	(34,5,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,6),
	(35,5,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,7),
	(36,7,'id','number','Id',1,0,0,0,0,0,NULL,1),
	(37,7,'name','text','Name',1,1,1,1,1,1,NULL,2),
	(38,7,'description','text','Description',0,1,1,1,1,1,NULL,3),
	(39,7,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,4),
	(40,7,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,5),
	(41,7,'avg_skills','text','Avg Skills',1,1,1,1,1,1,NULL,6),
	(42,7,'avg_functions','text','Avg Functions',1,1,1,1,1,1,NULL,7),
	(43,8,'id','text','Id',1,0,0,0,0,0,NULL,1),
	(44,8,'job_title','text','Job Title',1,1,1,1,1,1,NULL,2),
	(45,8,'description','text','Description',1,1,1,1,1,1,NULL,3),
	(46,8,'time','text','Time',0,0,1,1,1,1,NULL,4),
	(47,8,'type','text','Type',0,0,1,1,1,1,NULL,5),
	(48,8,'order','number','Order',1,0,1,1,1,1,NULL,6),
	(49,8,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,7),
	(50,8,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,8),
	(51,8,'evaluation_id','number','Evaluation Id',1,0,1,1,1,1,NULL,9),
	(52,8,'function_belongsto_evaluation_relationship','relationship','evaluations',0,1,1,1,1,1,'{\"model\":\"App\\\\Models\\\\Evaluations\",\"table\":\"evaluations\",\"type\":\"belongsTo\",\"column\":\"evaluation_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"allowed_accounts\",\"pivot\":\"0\",\"taggable\":\"0\"}',10),
	(53,9,'id','text','Id',1,0,0,0,0,0,NULL,1),
	(54,9,'skill','text','Skill',1,1,1,1,1,1,NULL,2),
	(55,9,'type','select_dropdown','Type',1,0,1,1,1,1,'{\"default\":\"conocimiento\",\"options\":{\"conocimiento\":\"CONOCIMIENTO\",\"comunicacion\":\"COMUNICACIÓN\",\"relaciones\":\"RELACIONES INTERPERSONALES\",\"liderazgo\":\"LIDERAZGO DE PERSONAS\",\"resultados\":\"ORIENTACIÓN A RESULTADOS\"}}',3),
	(56,9,'description','text','Description',1,1,1,1,1,1,NULL,4),
	(57,9,'order','text','Order',1,0,1,1,1,1,NULL,5),
	(58,9,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,6),
	(59,9,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,7),
	(60,9,'evaluation_id','text','Evaluation Id',1,0,1,1,1,1,NULL,8),
	(61,9,'skill_belongsto_evaluation_relationship','relationship','evaluations',0,1,1,1,1,1,'{\"model\":\"App\\\\Models\\\\Evaluations\",\"table\":\"evaluations\",\"type\":\"belongsTo\",\"column\":\"evaluation_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"allowed_accounts\",\"pivot\":\"0\",\"taggable\":\"0\"}',9),
	(62,10,'id','text','Id',1,0,0,0,0,0,NULL,1),
	(63,10,'type','select_dropdown','Type',1,0,1,1,1,1,'{\"default\":\"conocimiento\",\"options\":{\"conocimiento\":\"Conocimiento\",\"comunicacion\":\"Comunicación\",\"relaciones\":\"Relaciones Interpersonales\",\"liderazgo\":\"Liderazgo\",\"resultados\":\"Orientación a Resultados\"}}',2),
	(64,10,'description','text','Description',1,1,1,1,1,1,NULL,3),
	(65,10,'job_title_type','select_dropdown','Job Title Type',1,1,1,1,1,1,'{\"default\":\"operativos\",\"options\":{\"operativos\":\"Operativos\",\"misionales\":\"Misionales\",\"estrategicos\":\"Estratégicos\"}}',4),
	(66,10,'goal','number','Goal',1,1,1,1,1,1,NULL,5),
	(67,10,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,6),
	(68,10,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,7),
	(69,10,'evaluation_id','number','Evaluation Id',1,0,1,1,1,0,NULL,8),
	(70,10,'skills_level_belongsto_evaluation_relationship','relationship','evaluations',0,1,1,1,1,1,'{\"model\":\"App\\\\Models\\\\Evaluations\",\"table\":\"evaluations\",\"type\":\"belongsTo\",\"column\":\"evaluation_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"allowed_accounts\",\"pivot\":\"0\",\"taggable\":\"0\"}',9),
	(71,11,'id','text','Id',1,0,0,0,0,0,NULL,1),
	(72,11,'user_id','text','User Document',1,1,1,0,0,1,NULL,3),
	(73,11,'user_name','text','User Name',1,1,1,1,1,1,NULL,4),
	(74,11,'user_job_title','text','User Job Title',1,1,1,1,1,1,NULL,5),
	(75,11,'user_job_title_link','text','User Job Title Link',0,0,1,1,1,1,NULL,6),
	(76,11,'user_photo_link','text','User Photo Link',0,0,1,1,1,1,NULL,7),
	(77,11,'user_job_title_type','select_dropdown','User Job Title Type',1,0,1,1,1,1,'{\"default\":\"operativos\",\"options\":{\"operativos\":\"Operativos\",\"misionales\":\"Misionales\",\"estrategicos\":\"Estratégicos\"}}',8),
	(78,11,'evaluator_id','text','Evaluator Document',1,1,1,0,0,1,NULL,10),
	(79,11,'evaluator_name','text','Evaluator Name',1,1,1,1,1,1,NULL,11),
	(80,11,'evaluation_type','select_dropdown','Evaluation Type',1,1,1,1,1,1,'{\"default\":\"Autoevaluación\",\"options\":{\"Autoevaluación\":\"Autoevaluación\",\"Jefe\":\"Jefe\",\"Equipo\":\"Equipo\"}}',12),
	(81,11,'weight','number','Weight',1,1,1,1,1,1,NULL,13),
	(82,11,'evaluate_functions','checkbox','Evaluate Functions',1,0,1,1,1,1,NULL,14),
	(83,11,'evaluate_skills','checkbox','Evaluate Skills',1,0,1,1,1,1,NULL,15),
	(84,11,'functions_done','checkbox','Functions Done',1,0,1,1,1,1,NULL,16),
	(85,11,'skills_done','checkbox','Skills Done',1,0,1,1,1,1,NULL,17),
	(86,11,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,18),
	(87,11,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,19),
	(88,11,'evaluation_id','number','Evaluation Id',1,0,1,1,1,0,NULL,20),
	(89,11,'evaluator_belongsto_evaluation_relationship','relationship','Evaluation',0,1,1,1,1,1,'{\"model\":\"App\\\\Models\\\\Evaluations\",\"table\":\"evaluations\",\"type\":\"belongsTo\",\"column\":\"evaluation_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"allowed_accounts\",\"pivot\":\"0\",\"taggable\":\"0\"}',21),
	(90,11,'evaluator_belongsto_user_relationship','relationship','User Document',0,0,0,1,1,0,'{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"document\",\"label\":\"document\",\"pivot_table\":\"allowed_accounts\",\"pivot\":\"0\",\"taggable\":\"0\"}',2),
	(91,11,'evaluator_belongsto_user_relationship_1','relationship','Evaluator Document',0,0,0,1,1,0,'{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"evaluator_id\",\"key\":\"document\",\"label\":\"document\",\"pivot_table\":\"allowed_accounts\",\"pivot\":\"0\",\"taggable\":\"0\"}',9),
	(92,12,'id','text','Id',1,0,0,0,0,0,NULL,1),
	(93,12,'user_id','text','User Id',1,0,0,0,0,0,NULL,2),
	(94,12,'user_document_evaluated','text','User Document',1,1,1,0,0,0,NULL,3),
	(95,12,'avg_skills','number','Avg Skills',1,1,1,0,0,0,NULL,4),
	(96,12,'avg_functions','number','Avg Functions',1,1,1,0,0,0,NULL,5),
	(97,12,'evaluation_id','number','Evaluation Id',1,1,1,0,0,0,NULL,6),
	(98,12,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,7),
	(99,12,'updated_at','timestamp','Updated At',0,1,1,0,0,0,NULL,8),
	(100,12,'evaluation_user_belongsto_evaluation_relationship','relationship','Evaluation',0,1,1,1,1,1,'{\"model\":\"App\\\\Models\\\\Evaluations\",\"table\":\"evaluations\",\"type\":\"belongsTo\",\"column\":\"evaluation_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"allowed_accounts\",\"pivot\":\"0\",\"taggable\":\"0\"}',9),
	(101,13,'id','text','Id',1,0,0,0,0,0,NULL,1),
	(102,13,'title','text','Title',1,1,1,1,1,1,NULL,2),
	(103,1,'user_belongsto_job_title_relationship','relationship','job_title',0,1,1,0,0,1,'{\"model\":\"App\\\\Models\\\\JobTitle\",\"table\":\"job_title\",\"type\":\"belongsTo\",\"column\":\"job_title\",\"key\":\"title\",\"label\":\"title\",\"pivot_table\":\"allowed_accounts\",\"pivot\":\"0\",\"taggable\":\"0\"}',15);

/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla data_types
# ------------------------------------------------------------

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`)
VALUES
	(1,'users','users','User','Users','voyager-person','TCG\\Voyager\\Models\\User','TCG\\Voyager\\Policies\\UserPolicy',NULL,NULL,1,1,'{\"order_column\":null,\"order_display_column\":null}','2018-04-27 21:43:08','2018-05-03 15:29:42'),
	(2,'menus','menus','Menu','Menus','voyager-list','TCG\\Voyager\\Models\\Menu',NULL,'','',1,0,NULL,'2018-04-27 21:43:08','2018-04-27 21:43:08'),
	(3,'roles','roles','Role','Roles','voyager-lock','TCG\\Voyager\\Models\\Role',NULL,'','',1,0,NULL,'2018-04-27 21:43:08','2018-04-27 21:43:08'),
	(5,'allowed_accounts','allowed-accounts','Allowed Account','Allowed Accounts','voyager-key','App\\Models\\AccountsAllowed',NULL,NULL,NULL,1,1,'{\"order_column\":null,\"order_display_column\":null}','2018-05-02 21:41:27','2018-05-03 15:26:43'),
	(7,'evaluations','evaluations','Evaluation','Evaluations','voyager-categories','App\\Models\\Evaluations',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null}','2018-05-02 22:32:10','2018-05-03 15:01:08'),
	(8,'functions','functions','Function','Functions','voyager-window-list','App\\Models\\Functions',NULL,NULL,NULL,1,1,'{\"order_column\":null,\"order_display_column\":null}','2018-05-03 15:04:09','2018-05-03 15:25:53'),
	(9,'skills','skills','Skill','Skills','voyager-params','App\\Models\\Skills',NULL,NULL,NULL,1,1,'{\"order_column\":null,\"order_display_column\":null}','2018-05-03 16:04:31','2018-05-03 16:04:31'),
	(10,'skills_levels','skills-levels','Skills Level','Skills Levels','voyager-check-circle','App\\Models\\SkillsLevels',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null}','2018-05-03 16:28:56','2018-05-03 16:30:17'),
	(11,'evaluators','evaluators','Evaluator','Evaluators','voyager-ship','App\\Models\\Evaluators',NULL,NULL,NULL,1,1,'{\"order_column\":null,\"order_display_column\":null}','2018-05-03 20:05:21','2018-05-03 20:06:33'),
	(12,'evaluation_user','evaluation-user','Evaluation User','Evaluation Users','voyager-certificate','App\\Models\\EvaluationUser',NULL,NULL,NULL,1,1,'{\"order_column\":null,\"order_display_column\":null}','2018-05-03 20:49:06','2018-05-03 20:49:06'),
	(13,'job_title','job-title','Job Title','Job Titles','voyager-company','App\\Models\\JobTitle',NULL,NULL,NULL,1,1,'{\"order_column\":null,\"order_display_column\":null}','2018-05-03 22:13:54','2018-05-03 22:16:05');

/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla job_title
# ------------------------------------------------------------

DROP TABLE IF EXISTS `job_title`;

CREATE TABLE `job_title` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `job_title_title_unique` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `job_title` WRITE;
/*!40000 ALTER TABLE `job_title` DISABLE KEYS */;

INSERT INTO `job_title` (`id`, `title`, `created_at`, `updated_at`)
VALUES
	(1,'Director Gestión Humana',NULL,NULL),
	(2,'Coordinador Bienestar y Marca',NULL,NULL),
	(3,'Coordinador Clientes Nuevos',NULL,NULL),
	(4,'Jefe de Cuenta Senior',NULL,NULL),
	(5,'Jefe de Cuenta',NULL,NULL),
	(6,'Creativo Senior',NULL,NULL),
	(7,'Desarrollador',NULL,NULL),
	(8,'Analista Prefacturación',NULL,NULL),
	(9,'Coordinador Plataformas',NULL,NULL),
	(10,'Creativo Copy',NULL,NULL),
	(11,'Director Tecnología',NULL,NULL),
	(12,'Coordinador Beneficios',NULL,NULL),
	(13,'Coordinador Diseño',NULL,NULL),
	(14,'Planner',NULL,NULL),
	(15,'Auxiliar Cotizaciones',NULL,NULL),
	(16,'Analista Comercial',NULL,NULL),
	(17,'Coordinador Comercial',NULL,NULL),
	(18,'Coordinador Inteligencia de Clientes',NULL,NULL),
	(19,'Coordinador Compras',NULL,NULL),
	(20,'Coordinador Desarrollo',NULL,NULL),
	(21,'Auxiliar Servicio al cliente',NULL,NULL),
	(22,'Analista Operaciones Internacional',NULL,NULL),
	(23,'Director Comercial',NULL,NULL),
	(24,'Coordinador planeación',NULL,NULL),
	(25,'Analista Inteligencia de Clientes',NULL,NULL),
	(26,'Tesorería',NULL,NULL),
	(27,'Asistente Financiero',NULL,NULL),
	(28,'Analista Compras',NULL,NULL),
	(29,'Analista Plataforma',NULL,NULL),
	(30,'Director Pagomío',NULL,NULL),
	(31,'Mensajero',NULL,NULL),
	(32,'Diseñador Gráfico',NULL,NULL),
	(33,'Coordinador Gestión Humana',NULL,NULL),
	(34,'Analista logístico',NULL,NULL),
	(35,'Director Operativo Administrativo Internacional',NULL,NULL),
	(36,'Analista Bases de Datos',NULL,NULL),
	(37,'Desarrollador Pagomio',NULL,NULL),
	(38,'CEO',NULL,NULL),
	(39,'Coordinador Contabilidad',NULL,NULL),
	(40,'Recepción',NULL,NULL),
	(41,'Auxiliar Contable Senior',NULL,NULL),
	(42,'Director Estrategia y Diseño',NULL,NULL),
	(43,'Director Operaciones',NULL,NULL),
	(44,'Auxiliar Administrativo Pagomio',NULL,NULL),
	(45,'Auxiliar Almacén',NULL,NULL),
	(46,'Analista Beneficios',NULL,NULL),
	(47,'Coordinador Logístico',NULL,NULL),
	(48,'Diseñador Gráfico Senior',NULL,NULL),
	(49,'Coordinador Creativo',NULL,NULL),
	(50,'Auxiliar Contable',NULL,NULL);

/*!40000 ALTER TABLE `job_title` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla menu_items
# ------------------------------------------------------------

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`)
VALUES
	(1,1,'Home','','_self','voyager-home','#000000',NULL,1,'2018-04-27 21:43:09','2018-05-02 19:45:36','voyager.dashboard','null'),
	(2,1,'Media','','_self','voyager-images',NULL,5,2,'2018-04-27 21:43:09','2018-05-02 19:40:07','voyager.media.index',NULL),
	(3,1,'Users','','_self','voyager-person',NULL,11,2,'2018-04-27 21:43:09','2018-05-02 22:34:25','voyager.users.index',NULL),
	(4,1,'Roles','','_self','voyager-lock',NULL,11,3,'2018-04-27 21:43:09','2018-05-02 22:34:20','voyager.roles.index',NULL),
	(5,1,'Tools','','_self','voyager-tools',NULL,NULL,4,'2018-04-27 21:43:09','2018-05-03 14:39:31',NULL,NULL),
	(6,1,'Menu Builder','','_self','voyager-list',NULL,5,1,'2018-04-27 21:43:09','2018-05-02 19:39:54','voyager.menus.index',NULL),
	(7,1,'Database','','_self','voyager-data',NULL,5,3,'2018-04-27 21:43:09','2018-05-02 19:40:07','voyager.database.index',NULL),
	(8,1,'Compass','','_self','voyager-compass',NULL,5,4,'2018-04-27 21:43:09','2018-05-02 19:40:03','voyager.compass.index',NULL),
	(9,1,'Settings','','_self','voyager-settings',NULL,5,6,'2018-04-27 21:43:09','2018-05-02 19:40:03','voyager.settings.index',NULL),
	(10,1,'Hooks','','_self','voyager-hook',NULL,5,5,'2018-04-27 21:43:09','2018-05-02 19:40:03','voyager.hooks',NULL),
	(11,1,'Users','','_self','voyager-people','#000000',NULL,2,'2018-05-02 19:42:25','2018-05-02 19:43:08',NULL,''),
	(12,1,'Allowed Accounts','','_self','voyager-key',NULL,11,1,'2018-05-02 21:41:28','2018-05-02 22:34:25','voyager.allowed-accounts.index',NULL),
	(13,1,'Evaluations','','_self','voyager-categories','#000000',14,1,'2018-05-02 22:32:11','2018-05-03 19:18:13','voyager.evaluations.index','null'),
	(14,1,'Evaluation','','_self','voyager-study','#000000',NULL,3,'2018-05-02 22:33:53','2018-05-03 20:36:07',NULL,''),
	(15,1,'Functions','','_self','voyager-window-list',NULL,14,2,'2018-05-03 15:04:10','2018-05-03 16:31:23','voyager.functions.index',NULL),
	(16,1,'Skills','','_self','voyager-params',NULL,14,3,'2018-05-03 16:04:32','2018-05-03 16:31:29','voyager.skills.index',NULL),
	(17,1,'Skills Levels','','_self','voyager-check-circle',NULL,14,4,'2018-05-03 16:28:57','2018-05-03 16:31:33','voyager.skills-levels.index',NULL),
	(18,1,'Evaluators','','_self','voyager-ship','#000000',14,5,'2018-05-03 20:05:23','2018-05-03 20:07:39','voyager.evaluators.index','null'),
	(19,1,'Results','','_self','voyager-certificate','#000000',14,6,'2018-05-03 20:49:07','2018-05-03 20:50:19','voyager.evaluation-user.index','null'),
	(20,1,'Job Titles','','_self','voyager-company','#000000',11,4,'2018-05-03 22:13:54','2018-05-03 22:16:38','voyager.job-title.index','null');

/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla menus
# ------------------------------------------------------------

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'admin','2018-04-27 21:43:09','2018-04-27 21:43:09');

/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla permission_role
# ------------------------------------------------------------

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;

INSERT INTO `permission_role` (`permission_id`, `role_id`)
VALUES
	(1,1),
	(2,1),
	(3,1),
	(4,1),
	(5,1),
	(6,1),
	(7,1),
	(8,1),
	(9,1),
	(10,1),
	(11,1),
	(12,1),
	(13,1),
	(14,1),
	(15,1),
	(16,1),
	(17,1),
	(18,1),
	(19,1),
	(20,1),
	(21,1),
	(22,1),
	(23,1),
	(24,1),
	(25,1),
	(26,1),
	(27,1),
	(28,1),
	(29,1),
	(30,1),
	(31,1),
	(32,1),
	(33,1),
	(34,1),
	(35,1),
	(36,1),
	(37,1),
	(38,1),
	(39,1),
	(40,1),
	(41,1),
	(42,1),
	(43,1),
	(44,1),
	(45,1),
	(46,1),
	(47,1),
	(48,1),
	(49,1),
	(50,1),
	(51,1),
	(52,1),
	(53,1),
	(54,1),
	(55,1),
	(56,1),
	(57,1),
	(58,1),
	(59,1),
	(60,1),
	(61,1),
	(62,1),
	(63,1),
	(64,1),
	(65,1),
	(66,1);

/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla permissions
# ------------------------------------------------------------

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`)
VALUES
	(1,'browse_admin',NULL,'2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(2,'browse_bread',NULL,'2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(3,'browse_database',NULL,'2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(4,'browse_media',NULL,'2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(5,'browse_compass',NULL,'2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(6,'browse_menus','menus','2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(7,'read_menus','menus','2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(8,'edit_menus','menus','2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(9,'add_menus','menus','2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(10,'delete_menus','menus','2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(11,'browse_roles','roles','2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(12,'read_roles','roles','2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(13,'edit_roles','roles','2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(14,'add_roles','roles','2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(15,'delete_roles','roles','2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(16,'browse_users','users','2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(17,'read_users','users','2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(18,'edit_users','users','2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(19,'add_users','users','2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(20,'delete_users','users','2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(21,'browse_settings','settings','2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(22,'read_settings','settings','2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(23,'edit_settings','settings','2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(24,'add_settings','settings','2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(25,'delete_settings','settings','2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(26,'browse_hooks',NULL,'2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(27,'browse_allowed_accounts','allowed_accounts','2018-05-02 21:41:28','2018-05-02 21:41:28'),
	(28,'read_allowed_accounts','allowed_accounts','2018-05-02 21:41:28','2018-05-02 21:41:28'),
	(29,'edit_allowed_accounts','allowed_accounts','2018-05-02 21:41:28','2018-05-02 21:41:28'),
	(30,'add_allowed_accounts','allowed_accounts','2018-05-02 21:41:28','2018-05-02 21:41:28'),
	(31,'delete_allowed_accounts','allowed_accounts','2018-05-02 21:41:28','2018-05-02 21:41:28'),
	(32,'browse_evaluations','evaluations','2018-05-02 22:32:11','2018-05-02 22:32:11'),
	(33,'read_evaluations','evaluations','2018-05-02 22:32:11','2018-05-02 22:32:11'),
	(34,'edit_evaluations','evaluations','2018-05-02 22:32:11','2018-05-02 22:32:11'),
	(35,'add_evaluations','evaluations','2018-05-02 22:32:11','2018-05-02 22:32:11'),
	(36,'delete_evaluations','evaluations','2018-05-02 22:32:11','2018-05-02 22:32:11'),
	(37,'browse_functions','functions','2018-05-03 15:04:10','2018-05-03 15:04:10'),
	(38,'read_functions','functions','2018-05-03 15:04:10','2018-05-03 15:04:10'),
	(39,'edit_functions','functions','2018-05-03 15:04:10','2018-05-03 15:04:10'),
	(40,'add_functions','functions','2018-05-03 15:04:10','2018-05-03 15:04:10'),
	(41,'delete_functions','functions','2018-05-03 15:04:10','2018-05-03 15:04:10'),
	(42,'browse_skills','skills','2018-05-03 16:04:32','2018-05-03 16:04:32'),
	(43,'read_skills','skills','2018-05-03 16:04:32','2018-05-03 16:04:32'),
	(44,'edit_skills','skills','2018-05-03 16:04:32','2018-05-03 16:04:32'),
	(45,'add_skills','skills','2018-05-03 16:04:32','2018-05-03 16:04:32'),
	(46,'delete_skills','skills','2018-05-03 16:04:32','2018-05-03 16:04:32'),
	(47,'browse_skills_levels','skills_levels','2018-05-03 16:28:56','2018-05-03 16:28:56'),
	(48,'read_skills_levels','skills_levels','2018-05-03 16:28:56','2018-05-03 16:28:56'),
	(49,'edit_skills_levels','skills_levels','2018-05-03 16:28:56','2018-05-03 16:28:56'),
	(50,'add_skills_levels','skills_levels','2018-05-03 16:28:57','2018-05-03 16:28:57'),
	(51,'delete_skills_levels','skills_levels','2018-05-03 16:28:57','2018-05-03 16:28:57'),
	(52,'browse_evaluators','evaluators','2018-05-03 20:05:22','2018-05-03 20:05:22'),
	(53,'read_evaluators','evaluators','2018-05-03 20:05:22','2018-05-03 20:05:22'),
	(54,'edit_evaluators','evaluators','2018-05-03 20:05:22','2018-05-03 20:05:22'),
	(55,'add_evaluators','evaluators','2018-05-03 20:05:22','2018-05-03 20:05:22'),
	(56,'delete_evaluators','evaluators','2018-05-03 20:05:22','2018-05-03 20:05:22'),
	(57,'browse_evaluation_user','evaluation_user','2018-05-03 20:49:06','2018-05-03 20:49:06'),
	(58,'read_evaluation_user','evaluation_user','2018-05-03 20:49:06','2018-05-03 20:49:06'),
	(59,'edit_evaluation_user','evaluation_user','2018-05-03 20:49:06','2018-05-03 20:49:06'),
	(60,'add_evaluation_user','evaluation_user','2018-05-03 20:49:06','2018-05-03 20:49:06'),
	(61,'delete_evaluation_user','evaluation_user','2018-05-03 20:49:06','2018-05-03 20:49:06'),
	(62,'browse_job_title','job_title','2018-05-03 22:13:54','2018-05-03 22:13:54'),
	(63,'read_job_title','job_title','2018-05-03 22:13:54','2018-05-03 22:13:54'),
	(64,'edit_job_title','job_title','2018-05-03 22:13:54','2018-05-03 22:13:54'),
	(65,'add_job_title','job_title','2018-05-03 22:13:54','2018-05-03 22:13:54'),
	(66,'delete_job_title','job_title','2018-05-03 22:13:54','2018-05-03 22:13:54');

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla roles
# ------------------------------------------------------------

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`)
VALUES
	(1,'admin','Administrator','2018-04-27 21:43:09','2018-04-27 21:43:09'),
	(2,'user','Normal User','2018-04-27 21:43:09','2018-04-27 21:43:09');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla settings
# ------------------------------------------------------------

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`)
VALUES
	(1,'site.title','Site Title','Glüky Evaluation','','text',1,'Site'),
	(2,'site.description','Site Description','Creciendo Juntos','','text',2,'Site'),
	(3,'site.logo','Site Logo',NULL,'','image',3,'Site'),
	(4,'site.google_analytics_tracking_id','Google Analytics Tracking ID',NULL,'','text',4,'Site'),
	(5,'admin.bg_image','Admin Background Image','settings/April2018/6djhLbetgas4egCvAPOL.jpg','','image',4,'Admin'),
	(6,'admin.title','Admin Title','Glüky Evaluation','','text',1,'Admin'),
	(7,'admin.description','Admin Description','Creciendo Juntos','','text',2,'Admin'),
	(8,'admin.loader','Admin Loader','settings/April2018/TKekOcWMvEFMma5mm1bg.png','','image',3,'Admin'),
	(9,'admin.icon_image','Admin Icon Image','settings/April2018/niIyHlR4TNzGcVcGkcSH.png','','image',5,'Admin'),
	(10,'admin.google_analytics_client_id','Google Analytics Client ID (used for admin dashboard)',NULL,'','text',1,'Admin');

/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla translations
# ------------------------------------------------------------



# Volcado de tabla user_roles
# ------------------------------------------------------------




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
