# Plugin Numeros Romanos JorgeUsatorre 

## Descripcion
El Plugin JorgeUsatorre Words es un complemento para WordPress.
Este plugin tiene como objetivo demostrar una funcionalidad simple de reemplazo de numeros por numeros romanos en las publicaciones y páginas de WordPress.

## Características
- Reemplazo de Números: Convierte automáticamente números arábigos a números romanos en el contenido y el título de las publicaciones.
- Configuración Personalizada: Permite personalizar la lista de palabras ofensivas y sus respectivos reemplazos.
- Creación de Tabla en la Base de Datos: Genera una tabla en la base de datos llamada numerosromanos para almacenar la correspondencia entre números arábigos y sus equivalentes romanos.
- Inserción y Actualización de Datos: Inserta o actualiza automáticamente datos en la tabla numerosromanos. Se proporciona un conjunto inicial de datos para los números del 1 al 10.
- Instancias de Uso: Se activa mediante el gancho plugins_loaded y utiliza el filtro the_content para realizar el reemplazo de números.

## Creación de Tabla en la Base de Datos
El plugin crea automáticamente una tabla en la base de datos llamada numerosromanos. Esta tabla contiene columnas para el ID, numeros arábigos (numero), y su equivalente en numero romano (numeroromano).
arábigos
## Inserción y Actualización de Datos
El plugin inserta o actualiza automáticamente datos en la tabla numerosromanos. Se proporciona un conjunto inicial de datos que incluye numeros arábigos y sus sustitutos por numeros romanos.

## Instancias de Uso
El plugin se activa mediante el gancho plugins_loaded, lo que garantiza que las funciones necesarias se ejecuten cuando se inicia WordPress. Además, utiliza los filtros the_content y the_title para realizar el reemplazo de números.

## Configuración
Puedes personalizar la lista de numeros y sus reemplazos accediendo al código del plugin.

## Instalacion del Plugin en Wordpress

1. Para utilizar nuestro plugin en nuestro wordpress necesitamos entrar en nuestro wordpress 

![captura1.png](Capturas%2Fcaptura1.png)

2. Una vez en estamos en nuestro wordpress entramos en el apartado de plugins 

![captura2.png](Capturas%2Fcaptura2.png)

3. Para comprobar que el plugin funciona correctamente neceistamos crear una nueva entrada desde el apartado de entrada

![captura3.png](Capturas%2Fcaptura3.png)

![captura4.png](Capturas%2Fcaptura4.png)





