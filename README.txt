1. Configuración de la Base de Datos:
    NOTA: Asegúrese de que el servidor MySQL y Apache estén ejecutándose en XAMPP.
    OPCIÓN 1:
        - Abra phpMyAdmin.
        - Importe el archivo "teatro.sql" ubicado en la carpeta "Config".
    OPCIÓN 2:
        - Abra phpMyAdmin.
        - Cree una nueva base de datos llamada "TEATRO".
        - Ejecute los siguientes querys para crear las tablas (los que están entre los ***):
            ***
                CREATE TABLE `OBRA` (
                    `cod_obra` int(11) NOT NULL AUTO_INCREMENT,
                    `nombre` varchar(255) NOT NULL,
                    `fecha_obra` date NOT NULL,
                    `aforo` int(11) NOT NULL,
                    `disponibles` int(11) NOT NULL,
                    `sala` varchar(255) NOT NULL,
                    PRIMARY KEY (`cod_obra`)
                );

                CREATE TABLE `VENTAS` (
                    `numero_venta` int(11) NOT NULL AUTO_INCREMENT,
                    `cod_obra` int(11) NOT NULL,
                    `comprador` int(11) NOT NULL,
                    `fecha_compra` date NOT NULL,
                    PRIMARY KEY (`numero_venta`),
                    KEY `cod_obra` (`cod_obra`),
                    CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`cod_obra`) REFERENCES `OBRA` (`cod_obra`)
                );

                INSERT INTO `obra` (`cod_obra`, `nombre`, `fecha_obra`, `aforo`, `disponibles`, `sala`) VALUES (NULL, 'OBRA DE PRUEBA', '2024-07-20 12:00:00', '100', '100', 'Sala de Prueba');
            ***

2. Configuración del Servidor Web:
    - Copie todas las carpetas (Config, Models, Assets, Components) y archivos (compra.php, index.php) dentro en el directorio raíz (por ejemplo, `C:\xampp\htdocs\teatro`).

3. Prueba de la Aplicación:
    NOTA: Asegúrese de que el servidor MySQL y Apache estén ejecutándose en XAMPP.
    - Abra un navegador web.
    - Navegue a `http://localhost/teatro/index.php`.


NOTAS: 
    - Se implementó la opción de "CREAR OBRAS", PARA UN FUNCIONAMIENTO MÁS COMPLETO DEL SISTEMA.
    - Se usó bootstrap para los estilos.
    - Proyecto completo en git: https://github.com/JuanEPerezA/JEPA_SOLTIG