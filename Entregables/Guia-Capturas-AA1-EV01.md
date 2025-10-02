# 📸 GUÍA DE CAPTURAS - AA1-EV01
## INFORME TÉCNICO DE PLAN DE TRABAJO

---

## 🎯 CAPTURAS NECESARIAS (4 pantallazos)

### **1. Repositorio GitHub Configurado**
- **Ubicación:** https://github.com/JohanSabino/ClinicPsicApp
- **Mostrar:** 
  - Estructura de archivos del proyecto
  - Historial de commits recientes
  - Ramas configuradas (master, develop)
  - README.md del proyecto
- **Archivo:** `repositorio-github.png`

### **2. Herramientas de Desarrollo**
- **Ubicación:** Escritorio local / VS Code
- **Mostrar:**
  - VS Code con proyecto ClinicPsicApp abierto
  - Docker Desktop ejecutándose
  - Terminal con comandos git
  - Estructura de carpetas del proyecto
- **Archivo:** `herramientas-desarrollo.png`

### **3. Control de Versiones Local**
- **Ubicación:** Terminal / Git Bash
- **Mostrar:**
  - `git log --oneline` - Historial de commits
  - `git branch -a` - Ramas locales y remotas
  - `git status` - Estado actual del repositorio
  - `git remote -v` - Configuración de remotos
- **Archivo:** `control-versiones.png`

### **4. Estándares de Codificación**
- **Ubicación:** VS Code con archivos abiertos
- **Mostrar:**
  - Archivo PHP siguiendo PSR-12
  - Estructura de controladores Laravel
  - Comentarios de documentación
  - Convenciones de nombres
- **Archivo:** `estandares-codigo.png`

---

## 🚀 COMANDOS PARA PREPARAR LAS CAPTURAS

### **Para Control de Versiones:**
```bash
# Navegar al proyecto
cd "c:\Users\CAMILO DAZA\Desktop\clinic-planner-app-main"

# Verificar estado
git status

# Ver historial
git log --oneline -10

# Ver ramas
git branch -a

# Ver remotos
git remote -v
```

### **Para verificar estructura:**
```bash
# Listar archivos principales
ls -la

# Ver estructura de app
tree app/ -L 2

# Ver migraciones
ls database/migrations/
```

---

## ✅ CHECKLIST

- [ ] GitHub repo visible con commits
- [ ] Docker Desktop corriendo
- [ ] VS Code con proyecto abierto
- [ ] Terminal con comandos git
- [ ] Código PHP con estándares PSR-12
- [ ] Estructura Laravel organizada

---

## 📋 ELEMENTOS ESPECÍFICOS A CAPTURAR

### **GitHub (Captura 1):**
- Nombre del repositorio: ClinicPsicApp
- Owner: JohanSabino
- Archivos: README.md, composer.json, docker-compose.yml
- Commits recientes con mensajes descriptivos

### **Herramientas (Captura 2):**
- VS Code con extensiones Laravel
- Docker containers ejecutándose
- MySQL Workbench conectado
- Terminal integrado

### **Git Local (Captura 3):**
- Branch actual: master
- Commits con formato convencional
- Remote: origin configurado
- Status: working tree clean

### **Código (Captura 4):**
- Controllers en app/Http/Controllers/
- Models en app/Models/
- Migrations en database/migrations/
- PSR-12 formatting visible