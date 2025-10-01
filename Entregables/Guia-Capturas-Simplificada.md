# 📋 GUÍA SIMPLIFICADA PARA CAPTURAS DEL PROTOTIPO
## IE-GA6-220501096-AA3-EV01 - Fundamentos de Prototipado

---

## 🎯 OBJETIVO
Usar **nuestro sistema Laravel ClinicPsicApp** como ejemplo de prototipado funcional y tomar **8 capturas** para el documento.

---

## 📝 CAPTURAS NECESARIAS (Solo 8)

### **FUNCIONALIDADES DE LA HERRAMIENTA** (Pantallazos 1-5)

#### 📸 PANTALLAZO 1: VS Code con proyecto Laravel
- Abrir VS Code con el proyecto ClinicPsicApp
- Mostrar estructura de carpetas
- Terminal abierto
- Archivos Blade visibles

#### 📸 PANTALLAZO 2: Sintaxis de Blade 
- Abrir archivo `resources/views/home.blade.php`
- Mostrar código Blade con @extends, @section
- Highlighting de sintaxis activo

#### 📸 PANTALLAZO 3: Tailwind CSS en acción
- Mostrar código con clases de Tailwind
- Ejemplo: `class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl"`
- CSS responsive visible

#### 📸 PANTALLAZO 4: Componentes Blade reutilizables
- Mostrar algún componente o layout
- Ejemplo: `resources/views/layouts/web.blade.php`
- Estructura de componentes

#### 📸 PANTALLAZO 5: Live Preview en navegador
- Servidor corriendo en `localhost:8000`
- Página cargada completamente
- DevTools abierto mostrando responsive

### **EJEMPLO PRÁCTICO** (Pantallazos 6-11)

#### 📸 PANTALLAZO 6: Terminal con Laravel funcionando
```bash
docker-compose up -d
# Mostrar contenedores corriendo
```

#### 📸 PANTALLAZO 7: Landing page desktop
- `http://localhost:8000`
- Página completa desde hero hasta footer
- Diseño profesional visible

#### 📸 PANTALLAZO 8: Landing page móvil  
- Misma página en vista móvil (375px)
- Usar DevTools → Responsive → iPhone SE
- Mostrar adaptación del diseño

#### 📸 PANTALLAZO 9: Formulario de login
- `http://localhost:8000/login`
- Mostrar placeholders en español
- Diseño centrado y profesional

#### 📸 PANTALLAZO 10: Dashboard después del login
- Hacer login con: admin@admin.com / password
- Mostrar dashboard completo con widgets
- Cards de estadísticas visibles

#### 📸 PANTALLAZO 11: Formulario de registro psicólogos
- `http://localhost:8000/psychologist/register`
- Formulario completo con placeholders
- Campos específicos para profesionales

---

## 🚀 COMANDOS PARA LEVANTAR EL SISTEMA

```bash
# Ir al directorio del proyecto
cd "c:\Users\CAMILO DAZA\Desktop\clinic-planner-app-main"

# Levantar contenedores
docker-compose up -d

# Verificar que esté funcionando
# Ir a: http://localhost:8000
```

---

## 📋 CREDENCIALES DE PRUEBA
- **Admin**: admin@admin.com / password
- **URL Base**: http://localhost:8000

---

## 📂 ARCHIVOS A MOSTRAR EN CAPTURAS

### Para VS Code:
- `resources/views/home.blade.php` (landing page)
- `resources/views/layouts/web.blade.php` (layout)
- `resources/views/auth/login.blade.php` (login)
- `resources/views/dashboard.blade.php` (dashboard)

### Para navegador:
- Landing page completa
- Vista móvil responsive  
- Formulario de login
- Dashboard funcional
- Registro de psicólogos

---

## ⏱️ TIEMPO ESTIMADO
- **Levantar servidor**: 5 minutos
- **Tomar capturas**: 20 minutos
- **TOTAL**: 25 minutos

¡Mucho más simple y usando lo que ya tenemos! 🎉