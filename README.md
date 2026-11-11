# 🎨 CSS Helper

> Suite interactiva de herramientas CSS para desarrolladores frontend — diseña, ajusta y copia código CSS en segundos.

---

## 📋 Tabla de Contenidos

- [Descripción](#-descripción)
- [Características](#-características)
- [Demo](#-demo)
- [Stack Tecnológico](#-stack-tecnológico)
- [Estructura del Proyecto](#-estructura-del-proyecto)
- [Instalación](#-instalación)
- [Uso](#-uso)
- [Contribuciones](#-contribuciones)
- [Licencia](#-licencia)

---

## 📖 Descripción

**CSS Helper** es una suite web interactiva pensada para acelerar el flujo de trabajo de cualquier desarrollador frontend. Ofrece herramientas visuales en tiempo real, paletas de colores curadas y un catálogo de snippets CSS listos para copiar e implementar al instante — con JavaScript puro, sin frameworks ni librerías.

---

## ✨ Características

### 🛠️ Herramientas Interactivas
| Herramienta | Descripción |
|---|---|
| 🎨 **Selector de color** | Genera código HEX, RGB y HSL con vista previa en vivo (ratón, táctil y teclado) |
| 📦 **Modelo de caja** | Arrastra los bordes para ajustar `margin`, `padding` y `border` |
| 🧩 **Flexbox y Grid** | Construye layouts Flexbox o CSS Grid con controles visuales |
| 🔆 **Contraste y accesibilidad** | Calcula el ratio WCAG 2.1 entre dos colores y muestra si cumple AA/AAA |
| 🔤 **Fuentes de Google** | Previsualiza fuentes y obtén el código `<link>` e `@import` listo |
| ✨ **Efectos visuales** | Cuatro efectos listos (neón, vidrio, degradado, elevación) con su código |
| 🪟 **Glassmorphism** | Ajusta blur, opacidad y sombra para el efecto glassmorphism |

### 🎨 Paletas de Colores
- Paletas Catppuccin, Dracula y escalas de grises (neutra, Slate y Stone)
- Cada paleta incluye subpaletas con sus variantes claro/oscuro
- Copia cualquier color en formato **HEX**, **RGB** o **HSL** con un solo clic
- Exporta una paleta completa como variables CSS, Tailwind, JSON o mapa SCSS

### 📝 Snippets CSS
- Biblioteca de fragmentos CSS organizados por categorías (maquetación, texto, scroll, reset, efectos)
- Buscador en tiempo real
- Vista previa visual de cada snippet
- Botón de copia instantánea

### 🌙 Modo Oscuro / Claro
- Sigue la preferencia del sistema; si eliges un tema manualmente, se recuerda en `localStorage`

---

## 🚀 Demo

> *Próximamente disponible en línea.*

---

## 🧰 Stack Tecnológico

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-Vanilla-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![CSS3](https://img.shields.io/badge/CSS3-Custom-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![XAMPP](https://img.shields.io/badge/XAMPP-Compatible-FB7A24?style=for-the-badge&logo=xampp&logoColor=white)

- **Backend:** PHP 8+ con PDO
- **Frontend:** HTML5, CSS3 y JavaScript puro (sin frameworks ni librerías)
- **Base de datos:** MySQL opcional (XAMPP, LAMP/WAMP). Sin MySQL, el selector de fuentes usa una lista de respaldo
- **Sin dependencias de Node.js, npm ni bundlers**

---

## 📁 Estructura del Proyecto

```
CssHelper/
├── index.php               # Página principal (Hero + tarjetas de acceso rápido)
├── herramientas.php        # Suite de herramientas interactivas CSS
├── paletas.php             # Catálogo de paletas de colores
├── snipets.php             # Biblioteca de snippets CSS
│
├── backend/
│   ├── db.php              # Conexión PDO y auto-creación de BD y tabla de fuentes
│   ├── fonts_data.php      # Lista de fuentes (datos iniciales y respaldo sin MySQL)
│   ├── get_font.php        # API: buscar fuente por nombre
│   └── get_all_fonts.php   # API: listar todas las fuentes
│
├── includes/
│   ├── header.php          # Cabecera HTML global (<head>, iconos y navegación)
│   ├── navbar.php          # Componente de barra de navegación
│   ├── footer.php          # Pie de página global
│   └── palettes_data.php   # Data de paletas y funciones HEX→RGB/HSL
│
├── js/
│   ├── theme-toggle.js     # Lógica modo oscuro/claro
│   ├── color-picker.js     # Herramienta selector de color
│   ├── box-model.js        # Herramienta Box Model
│   ├── flexbox.js          # Herramienta Flexbox Builder
│   ├── contrast.js         # Verificador de contraste WCAG
│   ├── fonts.js            # Buscador de fuentes (consume la API backend)
│   ├── effects.js          # Generador de efectos CSS
│   ├── glassmorphism.js    # Generador de glassmorphism
│   ├── palettes.js         # Lógica de paletas y copia al portapapeles
│   ├── snippets.js         # Filtrado y copia de snippets
│   └── toast.js            # Avisos (toast) y ayudante para copiar al portapapeles
│
└── styles/
    └── styles.css          # Hoja de estilos global
```

---

## ⚙️ Instalación

> **Requisitos:** PHP 8+ y un servidor web (XAMPP, WAMP, Laragon, etc.). MySQL es opcional.

### 1. Clona el repositorio

```bash
git clone https://github.com/JulianPeralta26/CssHelper.git
```

### 2. Mueve la carpeta a tu servidor local

```bash
# XAMPP
mv CssHelper /xampp/htdocs/

# Laragon / WAMP
mv CssHelper /laragon/www/
```

### 3. Inicia Apache y MySQL

Levanta tu servidor local desde el panel de control de XAMPP (o el equivalente).

### 4. Abre el proyecto en tu navegador

```
http://localhost/CssHelper/
```

La base de datos y la tabla de fuentes se crean **automáticamente** en el primer acceso gracias al script `backend/db.php`. Si MySQL no está disponible, la app funciona igual con la lista de fuentes de respaldo.

Para usar otras credenciales de MySQL, define las variables de entorno `CSSHELPER_DB_HOST`, `CSSHELPER_DB_USER` y `CSSHELPER_DB_PASS`.

> **Prueba rápida sin XAMPP:** desde la carpeta del proyecto ejecuta `php -S localhost:8000` y abre `http://localhost:8000`.

---

## 🖥️ Uso

| Página | URL | Descripción |
|---|---|---|
| Inicio | `/index.php` | Presentación general y acceso rápido |
| Herramientas | `/herramientas.php` | Suite completa de generadores CSS |
| Paletas | `/paletas.php` | Catálogo de paletas y colores |
| Snippets | `/snipets.php` | Biblioteca de código CSS reutilizable |

---

## 🤝 Contribuciones

¡Las contribuciones son bienvenidas! Si tienes ideas para nuevas herramientas, paletas o snippets:

1. Haz un **fork** del repositorio
2. Crea una rama con tu feature: `git checkout -b feature/nueva-herramienta`
3. Realiza tus cambios y haz commit: `git commit -m 'feat: agregar nueva herramienta'`
4. Sube tu rama: `git push origin feature/nueva-herramienta`
5. Abre un **Pull Request**

---

## 📄 Licencia

Este proyecto se declara bajo la licencia **MIT**, pero el repositorio todavía no incluye el archivo `LICENSE`. Agrégalo para que la licencia sea válida.

---

<p align="center">
  Hecho con ❤️ para la comunidad frontend
</p>
