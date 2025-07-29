## Proyecto: Sistema de Gestión de Calificaciones
Este proyecto permite registrar usuarios de tipo Alumno y Profesor para gestionar calificaciones de manera simple y funcional.

##Funcionalidades por tipo de usuario
	*Alumno:
	Puede iniciar sesión y consultar sus calificaciones individuales y su promedio.
	*Profesor:
	Puede agregar o editar las calificaciones de los alumnos registrados.
	*Administrator:
	Este tipo de usuario no aparece en las opciones del formulario de registro.
	Puedes crearlo de dos formas:
		*Registrarlo como alumno o profesor, y luego modificar su tipo directamente en tu gestor de base de datos (con un UPDATE).
		*Insertarlo manualmente en la tabla usuarios con tipo 'Administrator'.
	*El usuario de tipo Administrator puede cambiar las contraseñas de cualquier usuario (alumno o profesor).

##Instalación del proyecto
	*Coloca el proyecto en la carpeta raíz de tu servidor web:
		*En Laragon: www/
		*En XAMPP: htdocs/
		*(Esto depende del entorno que estés utilizando.)
	*Activa tu servidor web (Apache/MySQL) y abre tu gestor de base de datos.
	*Ejecuta el archivo SQL incluido en la carpeta del proyecto para crear la base de datos y sus tablas.
	*Accede desde tu navegador a:
		*http://localhost/[carpeta-del-proyecto]/login.php
	*Usa la opción de "Dont have account? Sign up here" para registrar un usuario de prueba (alumno o profesor).
	*Inicia sesión y prueba las funcionalidades.

##Notas adicionales
	*El diseño es simple y funcional, pensado para ser claro y fácil de usar.
	*El código sigue el patrón MVC (Modelo-Vista-Controlador), lo cual facilita su mantenimiento y ampliación.
	*Las contraseñas están protegidas usando hashing seguro (con password_hash), por eso verás cadenas encriptadas en la base de datos.

##Creditos
proyecto creado para un curso por Fran Rey ☘️
De uso libre.
Si deseas apoyarme, puedes checar mi libro en Amazon: https://www.amazon.com.mx/Majo-Francisco-Javier-Reyes-Castanedo/dp/B0BFHGNM6R