# CANSCAN

¡Bienvenido al proyecto **CanScan**!  
Este es uan webapp desarrollada con bootstrap, laravel, vite y css.
---

# ⚙️ Instalación y configuración del proyecto

### INSTALAR PHP, COMPOSER Y EL INSTALADOR DE LARAVEL
```bash
# Run as administrator ON WINDOWS POWERSHELL...
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.4'))
```

### 1. Clonar el repositorio

```bash
git clone https://github.com/Puchungu/CanScan.git
```
### 2. Crear archivo .env desde .env.example
```bash
cp .env.example .env
```
### 3. Instalar dependencias de PHP (Laravel)
```bash
composer install
```

### 4. Generar la APP_KEY
```bash
php artisan key:generate
```
### 5. Instalar dependencias de Node.js
```bash
npm install
```
### 6. Configurar base de datos en el archivo .env
```bash
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=usuario
DB_PASSWORD=contraseña
```

### 7. Ejecutar migraciones
```bash
php artisan migrate
```
### 8. Crear el enlace de almacenamiento público (obligatorio para archivos subidos)
```bash
php artisan storage:link
```

### 9. Ejecutar el servidor de desarrollo de Laravel
```bash
php artisan serve
```
### 10. Ejecutar Vite para el frontend
```bash
npm run dev
```

### 11. Ejecutar el Queue Worker
```bash
php artisan queue:work
```

### 12. Configurar el servidor de envio de email.
```bash
MAIL_MAILER=smtp
MAIL_HOST=smtp-relay.brevo.com
MAIL_PORT=587
MAIL_USERNAME=9706ff001@smtp-brevo.com
MAIL_PASSWORD=OKL9SVG7BRvq8Tzp
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=no-reply@canscan.site
MAIL_FROM_NAME="${APP_NAME}"
```