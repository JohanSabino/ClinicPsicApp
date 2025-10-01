# 📸 GUÍA DE CAPTURAS - AA1-EV02
## ESTÁNDARES DE CODIFICACIÓN

---

## 🎯 CAPTURAS NECESARIAS (4 pantallazos)

### **1. Código PHP con PSR-12**
- **Archivo:** `app/Http/Controllers/PatientController.php`
- **Mostrar:**
  - Declaración `declare(strict_types=1);`
  - Namespace y use statements ordenados
  - Comentarios PHPDoc en clase y métodos
  - Indentación de 4 espacios
  - Llaves en nueva línea
  - Tipado de parámetros y retorno
- **Archivo:** `php-psr12-standards.png`

### **2. Nomenclatura de Variables**
- **Archivo:** `app/Http/Controllers/PatientController.php` (método store)
- **Mostrar:**
  - Variables en camelCase: `$patientData`, `$validatedRequest`
  - Arrays asociativos con snake_case en keys
  - Constantes en UPPER_SNAKE_CASE
  - Variables descriptivas y claras
- **Archivo:** `variables-nomenclatura.png`

### **3. Documentación de Métodos**
- **Archivo:** `app/Models/Patient.php`
- **Mostrar:**
  - Bloques PHPDoc completos con `@param`, `@return`
  - Descripción clara de métodos
  - Documentación de propiedades con `@property`
  - Comentarios inline explicativos
  - Versionado y autor en header
- **Archivo:** `metodos-documentacion.png`

### **4. Configuración de Herramientas**
- **Archivos:** `.php-cs-fixer.php` y `eslint.config.js`
- **Mostrar:**
  - Configuración de PHP CS Fixer con reglas PSR-12
  - Reglas de ESLint para JavaScript
  - Configuración de indentación y formato
  - Exclusiones de carpetas (vendor, storage)
- **Archivo:** `herramientas-formato.png`

---

## 🛠️ PREPARACIÓN DE ARCHIVOS

### **Crear archivos de configuración si no existen:**

**PHP CS Fixer (.php-cs-fixer.php):**
```php
<?php
return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'],
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
    ]);
```

**ESLint (.eslintrc.js):**
```javascript
module.exports = {
    env: { browser: true, es2021: true },
    extends: ['eslint:recommended'],
    rules: {
        'indent': ['error', 4],
        'quotes': ['error', 'single'],
        'camelcase': 'error'
    }
};
```

---

## 📂 UBICACIONES ESPECÍFICAS

### **CAPTURA 1 - PHP PSR-12:**
- **Archivo:** `app/Http/Controllers/PatientController.php`
- **Líneas:** 1-30 (header y declaraciones)
- **Elementos clave:**
  - `<?php` + `declare(strict_types=1);`
  - Namespace + use statements
  - PHPDoc de la clase
  - Primer método con tipado

### **CAPTURA 2 - Variables:**
- **Archivo:** `app/Http/Controllers/PatientController.php`
- **Líneas:** 40-80 (método store)
- **Elementos clave:**
  - `$validatedData = $request->validated();`
  - Arrays con nomenclatura correcta
  - Variables descriptivas
  - Constantes si las hay

### **CAPTURA 3 - Documentación:**
- **Archivo:** `app/Models/Patient.php`
- **Líneas:** 1-50 (header y métodos)
- **Elementos clave:**
  - PHPDoc completo de clase
  - `@property` para atributos
  - Métodos con `@param` y `@return`
  - Comentarios descriptivos

### **CAPTURA 4 - Configuración:**
- **Archivos:** Raíz del proyecto
- **Mostrar:** `.php-cs-fixer.php` y `.eslintrc.js`
- **Elementos clave:**
  - Reglas PSR-12 configuradas
  - Configuración de indentación
  - Reglas de nomenclatura
  - Exclusiones definidas

---

## ✅ CHECKLIST DE ESTÁNDARES

### **PHP (PSR-12):**
- [ ] `declare(strict_types=1);` presente
- [ ] Indentación de 4 espacios
- [ ] Llaves de apertura en nueva línea
- [ ] camelCase en variables y métodos
- [ ] PascalCase en clases
- [ ] UPPER_SNAKE_CASE en constantes
- [ ] PHPDoc en clases y métodos públicos
- [ ] Tipado de parámetros y retorno

### **JavaScript (ES6+):**
- [ ] camelCase en variables y funciones
- [ ] PascalCase en clases
- [ ] Const/let en lugar de var
- [ ] Comentarios JSDoc
- [ ] Indentación consistente
- [ ] Punto y coma al final

### **Blade Templates:**
- [ ] Comentarios descriptivos
- [ ] Indentación clara
- [ ] Componentes reutilizables
- [ ] Variables en camelCase

---

## 🚀 PASOS PARA CAPTURAS

1. **Abrir VS Code** con proyecto ClinicPsicApp
2. **Navegar a archivos específicos**
3. **Asegurar que se vean los estándares**
4. **Capturar con resolución alta**
5. **Verificar legibilidad del código**

**Tiempo estimado:** 15 minutos para las 4 capturas

¡Con esta guía tendrás evidencia perfecta de los estándares de codificación aplicados! 🎯