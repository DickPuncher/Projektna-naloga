TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER `novUporabnik` AFTER INSERT ON `uporabniki` FOR EACH ROW INSERT INTO zapisiprozilcev(zapis)\nVALUES(\'Vnos novega Uporabnika\')'
sql_modes=1073741824
definers='root@localhost'
client_cs_names='utf8'
connection_cl_names='utf8_general_ci'
db_cl_names='ucs2_slovenian_ci'
