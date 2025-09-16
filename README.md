# DistribuidasAppSOA

## Descripción

DistribuidasAppSOA es una API desarrollada en PHP bajo el patrón de arquitectura Modelo-Vista-Controlador (MVC), cuyo propósito es la gestión de estudiantes (insertar, eliminar, editar y listar). Este proyecto es parte de una práctica académica sobre sistemas distribuidos: la base de datos, el servidor y el frontend corren en diferentes máquinas, simulando un entorno distribuido.

## Características principales

- **CRUD de estudiantes:** Permite crear, leer, actualizar y eliminar registros de estudiantes.
- **Arquitectura MVC:** Separación clara entre modelo, vista y controlador, requisito de para la práctica.
- **Distribución:** Componentes corriendo en máquinas independientes (Base de datos MySQL, servidor Apache/PHP, frontend).

## Tecnologías utilizadas

- **Lenguaje backend:** PHP
- **Base de datos:** MySQL
- **Servidor:** Apache (usando XAMPP)
- **Frontend:** Boostrap + Ajax

## Requisitos

- PHP 
- Apache (recomendado instalar XAMPP)
- MySQL

## API Endpoints

Las rutas principales de la API permiten las siguientes operaciones sobre estudiantes:

- **Listar estudiantes:** `GET /estudiantes`
- **Obtener estudiante por cédula:** `GET /estudiantes/cedula/{cedula}`  
- **Insertar estudiante:** `POST /estudiantes`
- **Editar estudiante:** `PUT /estudiantes/{id}`
- **Eliminar estudiante:** `DELETE /estudiantes/{id}`

## Ejemplos de Uso
**1. Listar estudiantes (GET)**
- URL:  
  `http://localhost/SOA/controllers/ApiRest.php`
- Respuesta:  
  Devuelve todos los estudiantes en formato JSON.
**2. Obtener estudiante por cédula (GET con parámetro)**
- URL:  
  `http://localhost/SOA/controllers/ApiRest.php?cedula=0550193403`
- Respuesta:  
  Devuelve los datos del estudiante con esa cédula en formato JSON.
**3. Insertar estudiante (POST)**
- URL:  
  `http://localhost/SOA/controllers/ApiRest.php`
- Body (JSON):  
  ```
  {
    "cedula": "0550193403",
    "nombre": "Juan",
    "apellido": "Pérez",
    "direccion": "Av. Siempre Viva",
    "telefono": "0991234567"
  }
  ```
- Respuesta:  
  Confirma la inserción del nuevo registro.
**4. Editar estudiante (PUT)**
- URL:  
  `http://localhost/SOA/controllers/ApiRest.php`
- Body (JSON):  
  ```
  {
    "cedula": "0550193403",
    "nombre": "Carlos",
    "apellido": "Yánez",
    "direccion": "Av. Siempre Viva 123",
    "telefono": "0997654321"
  }
  ```
- Respuesta:  
  Confirma la actualización del registro.
**5. Eliminar estudiante (DELETE)**
- URL:  
  `http://localhost/SOA/controllers/ApiRest.php?cedula=0550193403`
- Respuesta:  
  Confirma la eliminación del registro.

Consultar la documentación interna o el código fuente para detalles sobre los endpoints y los formatos esperados.

## Arquitectura distribuida

- **Máquina 1:** MySQL (Base de datos)
- **Máquina 2:** Apache + PHP (API Backend)
- **Máquina 3 y 4:** Frontend (Cliente de la API, Frontend)

Cada componente debe poder acceder al recurso que necesita a través de la red. Configura los firewalls y permisos según sea necesario.
 
**Asignatura:** Aplicaciones Distribuidas
