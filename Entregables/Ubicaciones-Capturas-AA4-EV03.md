# 📍 GUÍA ESPECÍFICA DE CAPTURAS - AA4-EV03
## UBICACIONES EXACTAS DE CÓDIGO Y WEB

---

## 🖥️ CAPTURA 1: DASHBOARD PRINCIPAL

### **En la Web:**
- **URL:** `http://localhost:8000/dashboard`
- **Login:** admin@admin.com / password
- **Mostrar:**
  - Header completo con "Panel de Control"
  - 4 cards de estadísticas (Pacientes Activos, Citas Hoy, Sesiones Pendientes, Ingresos)
  - Sección "Accesos Rápidos" con iconos
  - Layout responsivo completo

### **En el Código:**
- **Archivo:** `resources/views/dashboard.blade.php`
- **Líneas 15-45:** Cards de estadísticas
- **Líneas 100-140:** Sección de accesos rápidos
- **Archivo:** `resources/views/layouts/app.blade.php`
- **Líneas 1-25:** Estructura HTML principal

---

## 📝 CAPTURA 2: FORMULARIOS DE USUARIO

### **En la Web:**
- **URL:** `http://localhost:8000/login`
- **Mostrar:**
  - Formulario de login completo
  - Campos de email y password estilizados
  - Botón "Log in" con gradiente
  - Enlaces "Remember me" y "Forgot password"

### **En el Código:**
- **Archivo:** `resources/views/auth/login.blade.php`
- **Líneas específicas:** Campos de formulario
- **Archivo:** `resources/js/form-validation.js`
- **Líneas 1-30:** Clase FormValidator
- **Líneas 24-50:** Métodos de validación

---

## 👥 CAPTURA 3: GESTIÓN DE PACIENTES

### **En la Web:**
- **URL:** `http://localhost:8000/patients`
- **Mostrar:**
  - Header "Gestión de Pacientes" + botón "Nuevo Paciente"
  - 4 cards de estadísticas (Total, Activos, Pendientes, Inactivos)
  - Filtros de búsqueda y select de estados
  - Tabla completa con 5 pacientes
  - Estados con badges de colores
  - Botones de acción (Ver, Editar, Eliminar)
  - Paginación en la parte inferior

### **En el Código:**
- **Archivo:** `resources/views/patients/index.blade.php`
- **Líneas 18-80:** Cards de estadísticas de pacientes
- **Líneas 85-105:** Filtros y búsqueda
- **Líneas 110-170:** Estructura de tabla
- **Líneas 175-220:** Filas de datos con estados
- **Archivo:** `app/Http/Controllers/PatientController.php`
- **Líneas 10-45:** Datos de ejemplo de pacientes

---

## 📱 CAPTURA 4: DISEÑO RESPONSIVO

### **En la Web:**
- **URL:** `http://localhost:8000` o `/dashboard`
- **DevTools:** F12 → Toggle device toolbar → iPhone SE o similar
- **Mostrar:**
  - Layout adaptado a móvil
  - Menú hamburguesa (si existe)
  - Cards apiladas verticalmente
  - Tabla con scroll horizontal
  - Botones y elementos adaptados

### **En el Código:**
- **Archivo:** `resources/views/layouts/app.blade.php`
- **Líneas 5-8:** Meta viewport y responsive
- **Archivo:** `tailwind.config.js`
- **Mostrar configuración responsive**
- **Archivo:** `resources/views/dashboard.blade.php`
- **Buscar clases:** `md:grid-cols-2`, `lg:grid-cols-4`, `sm:flex-row`

---

## 🎯 DETALLES ESPECÍFICOS PARA CADA CAPTURA

### **CAPTURA 1 - Dashboard:**
**Elementos clave a mostrar:**
- ✅ Logo "ClinicPsicApp" en header
- ✅ Navegación con perfil de usuario
- ✅ Cards con gradientes de colores
- ✅ Iconos SVG en cada card
- ✅ Grid responsive (4 columnas en desktop)
- ✅ Accesos rápidos con iconos

### **CAPTURA 2 - Formularios:**
**Elementos clave a mostrar:**
- ✅ Campo Email con placeholder
- ✅ Campo Password con enmascarado
- ✅ Labels estilizados
- ✅ Focus states (ring azul)
- ✅ Botón con gradiente hover
- ✅ Checkbox "Remember me"

### **CAPTURA 3 - Gestión Pacientes:**
**Elementos clave a mostrar:**
- ✅ Header con botón "Nuevo Paciente"
- ✅ 4 cards: Total(5), Activos(3), Pendientes(1), Inactivos(1)
- ✅ Input de búsqueda + select de filtro
- ✅ Tabla con 7 columnas
- ✅ 5 filas de pacientes con datos reales
- ✅ Badges: Verde(Activo), Amarillo(Pendiente), Rojo(Inactivo)
- ✅ Avatares con iniciales
- ✅ Botones de acción azules/rojos

### **CAPTURA 4 - Responsive:**
**Elementos clave a mostrar:**
- ✅ Viewport móvil (375px ancho aprox)
- ✅ Cards apiladas en 1 columna
- ✅ Menú colapsado
- ✅ Texto legible en móvil
- ✅ Botones tocables
- ✅ Scroll horizontal en tabla

---

## 📂 ARCHIVOS PRINCIPALES A REFERENCIAR

### **Frontend Components:**
1. `resources/views/layouts/app.blade.php` - Layout principal
2. `resources/views/dashboard.blade.php` - Dashboard
3. `resources/views/patients/index.blade.php` - Gestión pacientes
4. `resources/views/auth/login.blade.php` - Formularios
5. `resources/views/components/stats-card.blade.php` - Componente de stats
6. `resources/js/form-validation.js` - Validación JS

### **Estilos y Configuración:**
7. `tailwind.config.js` - Configuración responsive
8. `resources/css/app.css` - Estilos base
9. `vite.config.js` - Build configuration

### **Backend Support:**
10. `app/Http/Controllers/PatientController.php` - Datos de ejemplo
11. `routes/web.php` - Rutas configuradas

---

## 🚀 SECUENCIA DE CAPTURAS RECOMENDADA

### **Preparación:**
1. `docker-compose up -d`
2. Navegar a `http://localhost:8000`
3. Login con credenciales

### **Orden de capturas:**
1. **Dashboard primero** → Mostrar funcionalidad principal
2. **Formularios** → Demostrar inputs y validación
3. **Gestión pacientes** → Mostrar CRUD y datos
4. **Responsive** → Demostrar adaptabilidad

### **Tamaños de captura:**
- **Desktop:** 1920x1080 o 1366x768
- **Mobile:** 375x667 (iPhone SE) o 360x640

---

## 📋 CHECKLIST FINAL

### **Antes de capturar:**
- [ ] Servidor corriendo en puerto 8000
- [ ] Usuario logueado correctamente
- [ ] Todos los estilos CSS cargados
- [ ] JavaScript funcionando
- [ ] Datos de prueba visibles

### **Durante las capturas:**
- [ ] Resolución alta (PNG preferible)
- [ ] Texto completamente legible
- [ ] Colores y gradientes visibles
- [ ] Estados hover capturados si es posible
- [ ] Sin errores de consola visibles

### **Nomenclatura de archivos:**
- `dashboard-principal.png`
- `formularios-usuario.png` 
- `gestion-pacientes.png`
- `diseño-responsive.png`

¡Con esta guía tienes las ubicaciones exactas para documentar perfectamente tu entregable! 🎯