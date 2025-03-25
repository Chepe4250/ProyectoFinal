# Proyecto Final

### Base de datos para una Tienda de Ropa, en donde se contemplen los tipos de marcas, las prendas disponibles y las ventas que se han realizado.
---------------

![Texto Alternativo](https://github.com/Chepe4250/ProyectoFinal/blob/main/Img/Squema%20TiendaRopa.jpg)

---------------

#### Lista de integrantes

<ol>
  <li>Jose Francisco Solano Quiros</li>
</ol> 

---------------

# 🚀 Marcas API - Postman Collection

Este repositorio contiene una colección de Postman para realizar operaciones CRUD en la API de Marcas.

## 📌 Descripción

Esta colección permite realizar peticiones `GET`, `POST`, `PUT` y `DELETE` a la API para gestionar marcas. Incluye variables y pruebas automatizadas.

## 📂 Endpoints disponibles

### ➡️ Obtener datos (GET)
```http
GET http://localhost/Des_Plat/ProyectoFinal/api/public/index.php/marca
```
#### 📌 Respuesta
```javascript
{
    "id_marca": 5,
    "nombre": "H&M",
    "pais_origen": "Suecia"
}
```

### ➡️ Crear una nueva marca (POST)
```http
POST http://localhost/Des_Plat/ProyectoFinal/api/public/index.php/marca
```
#### 📌 Cuerpo de la solicitud
```json
{
    "nombre": "Ejemplo",
    "pais_origen": "País"
}
```
#### 📌 Respuesta
```javascript
{
    "id": "13"
}
```

### ➡️ Actualizar una marca (PUT)
```http
PUT http://localhost/Des_Plat/ProyectoFinal/api/public/index.php/marca?id=13
```
#### 📌 Cuerpo de la solicitud
```json
{
    "nombre": "Nuevo Nombre",
    "pais_origen": "Nuevo País"
}
```
#### 📌 Respuesta
```javascript
{
    "Resultado": {
        "success": true
    }
}
```

### ➡️ Eliminar una marca (DELETE)
```http
DELETE http://localhost/Des_Plat/ProyectoFinal/api/public/index.php/marca?id=13
```
#### 📌 Respuesta
```javascript
{
    "Eliminado": true
}
```

---------------

# 🚀 Prendas API - Postman Collection

Este repositorio contiene una colección de Postman para realizar operaciones CRUD en la API de Prendas.

## 📌 Descripción

Esta colección permite realizar peticiones `GET`, `POST`, `PUT` y `DELETE` a la API para gestionar prendas. Incluye variables y pruebas automatizadas.

## 📂 Endpoints disponibles

### ➡️ Obtener datos (GET)
```http
GET http://localhost/Des_Plat/ProyectoFinal/api/public/index.php/prenda
```
#### 📌 Respuesta
```javascript
{
    "id_prenda": 5,
    "nombre": "Vestido verano",
    "tipo": "Vestido",
    "talla": "S",
    "precio": "59.99",
    "stock": 20,
    "id_marca": 5
}
```

### ➡️ Crear una nueva prenda (POST)
```http
POST http://localhost/Des_Plat/ProyectoFinal/api/public/index.php/prenda
```
#### 📌 Cuerpo de la solicitud
```json
{
    "nombre": "Ejemplo",
    "tipo": "Camisa",
    "talla": "M",
    "precio": "49.99",
    "stock": "20",
    "id_marca": "5"
}
```
#### 📌 Respuesta
```javascript
{
    "id": "13"
}
```

### ➡️ Actualizar una prenda (PUT)
```http
PUT http://localhost/Des_Plat/ProyectoFinal/api/public/index.php/prenda?id=13
```
#### 📌 Cuerpo de la solicitud
```json
{
    "nombre": "Nuevo Nombre",
    "tipo": "Pantalón",
    "talla": "L",
    "precio": "59.99",
    "stock": "25",
    "id_marca": "5"
}
```
#### 📌 Respuesta
```javascript
{
    "Resultado": {
        "success": true
    }
}
```

### ➡️ Eliminar una prenda (DELETE)
```http
DELETE http://localhost/Des_Plat/ProyectoFinal/api/public/index.php/prenda?id=13
```
#### 📌 Respuesta
```javascript
{
    "Eliminado": true
}
```

