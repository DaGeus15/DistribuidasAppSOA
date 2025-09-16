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

## Uso

Las rutas principales de la API permiten las siguientes operaciones sobre estudiantes:

- **Listar estudiantes:** `GET /estudiantes`
- **Insertar estudiante:** `POST /estudiantes`
- **Editar estudiante:** `PUT /estudiantes/{id}`
- **Eliminar estudiante:** `DELETE /estudiantes/{id}`

Consultar la documentación interna o el código fuente para detalles sobre los endpoints y los formatos esperados.

## Arquitectura distribuida

- **Máquina 1:** MySQL (base de datos)
- **Máquina 2:** Apache + PHP (API backend)
- **Máquina 3:** Frontend (cliente de la API)

Cada componente debe poder acceder al recurso que necesita a través de la red. Configura los firewalls y permisos según sea necesario.
 
**Asignatura:** Aplicaciones Distribuidas
