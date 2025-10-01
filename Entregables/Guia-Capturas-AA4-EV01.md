# 📋 GUÍA DE CAPTURAS PARA IE-GA6-220501096-AA4-EV01
## FUNDAMENTOS EN LA IMPLEMENTACIÓN DE COMPONENTES FRONTEND

---

## 🎯 OBJETIVO
Tomar **8 capturas** que muestren la implementación de componentes frontend con HTML, CSS y JavaScript en el proyecto ClinicPsicApp.

---

## 📸 CAPTURAS NECESARIAS (8 pantallazos)

### **PANTALLAZO 1: Estructura HTML5 semántica**
**Archivo a capturar:** `resources/views/layouts/web.blade.php`
- Mostrar estructura HTML5 con elementos semánticos
- Destacar: `<header>`, `<main>`, `<footer>`, meta tags
- Código bien formateado y visible

### **PANTALLAZO 2: Estilos con Tailwind CSS**
**Archivo a capturar:** `resources/views/dashboard.blade.php` 
- Mostrar líneas con clases de Tailwind CSS
- Ejemplos: `bg-gradient-to-br from-blue-500 to-blue-600`
- Clases responsive: `grid-cols-1 md:grid-cols-2 lg:grid-cols-4`

### **PANTALLAZO 3: Grid responsive en pricing**
**Archivo a capturar:** `resources/views/home.blade.php`
- Sección de pricing con grid responsive
- Mostrar: `grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3`
- Clases de spacing y shadows

### **PANTALLAZO 4: JavaScript para validación**
**Archivo a crear:** `resources/js/form-validation.js`
- Mostrar código JavaScript ES6+
- Validación de formularios con RegEx
- Event listeners y DOM manipulation

### **PANTALLAZO 5: Componente Blade reutilizable**
**Archivo a crear:** `resources/views/components/stats-card.blade.php`
- Mostrar estructura de componente Blade
- Props, slots, lógica PHP
- Ejemplo de componente reutilizable

### **PANTALLAZO 6: Formulario con validación HTML5**
**Archivo a capturar:** `resources/views/psychologist/auth/create.blade.php`
- Mostrar formulario con atributos HTML5
- `required`, `pattern`, `minlength`, etc.
- Fieldsets, labels, placeholders

### **PANTALLAZO 7: Configuración de Vite**
**Archivo a capturar:** `vite.config.js`
- Mostrar configuración completa de Vite
- Plugins de Laravel, CSS PostCSS
- Optimizaciones de build

### **PANTALLAZO 8: Navegador con resultado final**
**URL:** `http://localhost:8000`
- Página completa funcionando
- DevTools abierto mostrando HTML5 semántico
- Elementos responsive visibles

---

## 📁 ARCHIVOS ESPECÍFICOS A MOSTRAR

### 1. **Layout Principal**
```
resources/views/layouts/web.blade.php
- Líneas 1-20: DOCTYPE, head, meta tags
- Líneas 15-30: Estructura semántica
```

### 2. **Dashboard con Tailwind**
```
resources/views/dashboard.blade.php
- Líneas con bg-gradient
- Grid classes responsive
- Hover effects y transitions
```

### 3. **Home con Pricing Grid**
```
resources/views/home.blade.php  
- Sección pricing completa
- Grid responsive implementation
- Cards con shadows y borders
```

### 4. **JavaScript de Validación** (Crear archivo)
```javascript
// resources/js/form-validation.js
class FormValidator {
    constructor(formSelector) {
        this.form = document.querySelector(formSelector);
        this.initValidation();
    }

    validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    // ... más código
}
```

### 5. **Componente Blade** (Crear archivo)
```blade
{{-- resources/views/components/stats-card.blade.php --}}
@props(['title', 'value', 'color' => 'blue'])

<div class="bg-gradient-to-br from-{{ $color }}-500 to-{{ $color }}-600 rounded-xl p-6">
    <h3>{{ $title }}</h3>
    <p class="text-3xl font-bold">{{ $value }}</p>
</div>
```

### 6. **Formulario de Registro**
```
resources/views/psychologist/auth/create.blade.php
- Mostrar fieldsets y legends
- Inputs con validation attributes
- Labels asociados correctamente
```

### 7. **Vite Config**
```
vite.config.js
- Toda la configuración visible
- Plugins, build options
- PostCSS config
```

### 8. **Resultado en Navegador**
```
http://localhost:8000
- Página principal cargada
- F12 DevTools abierto
- Tab Elements mostrando HTML5
```

---

## 🚀 COMANDOS PARA PREPARAR CAPTURAS

### 1. Levantar el servidor
```bash
cd "c:\Users\CAMILO DAZA\Desktop\clinic-planner-app-main"
docker-compose up -d
```

### 2. Crear archivos JavaScript (si no existen)
```bash
# Crear archivo de validación JS
echo "// Form validation code" > resources/js/form-validation.js
```

### 3. Crear componente Blade (si no existe)
```bash
# Crear directorio components si no existe
mkdir resources/views/components
# Crear archivo stats-card
echo "{{-- Stats card component --}}" > resources/views/components/stats-card.blade.php
```

---

## ✅ CHECKLIST DE CAPTURAS

- [ ] **Pantallazo 1**: HTML5 semántico en layout
- [ ] **Pantallazo 2**: Tailwind CSS en dashboard  
- [ ] **Pantallazo 3**: Grid responsive en pricing
- [ ] **Pantallazo 4**: JavaScript de validación
- [ ] **Pantallazo 5**: Componente Blade reutilizable
- [ ] **Pantallazo 6**: Formulario con HTML5 validation
- [ ] **Pantallazo 7**: Configuración de Vite
- [ ] **Pantallazo 8**: Resultado final en navegador

---

## 📊 CRITERIOS DE EVALUACIÓN A CUBRIR

| Criterio | Pantallazo | Archivo |
|----------|------------|---------|
| **Componentes frontend** | 1, 2, 5 | layouts, components |
| **Enlace de contenido** | 8 | Navegador funcionando |
| **Estilos CSS** | 2, 3 | Tailwind classes |
| **Listas ordenadas** | 3, 6 | Pricing, formularios |

---

## ⏱️ TIEMPO ESTIMADO
- **Preparación de archivos**: 15 minutos
- **Tomar capturas**: 20 minutos  
- **TOTAL**: 35 minutos

¡Todo listo para documentar los componentes frontend! 🎨