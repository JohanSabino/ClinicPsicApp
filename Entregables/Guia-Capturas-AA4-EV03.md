# 📸 GUÍA DE CAPTURAS - AA4-EV03
## DISEÑO FRONTEND QUE CUMPLA CON LOS REQUERIMIENTOS

---

## 🎯 CAPTURAS NECESARIAS (4 pantallazos)

### **1. Dashboard Principal**
- **URL:** `http://localhost:8000/dashboard` (después de login)
- **Mostrar:** Vista completa del dashboard con estadísticas, navegación y accesos rápidos
- **Archivo:** `dashboard-principal.png`

### **2. Formularios de Usuario**
- **URL:** `http://localhost:8000/login` y `/psychologist/register`
- **Mostrar:** Formularios de autenticación con campos estilizados y botones
- **Archivo:** `formularios-usuario.png`

### **3. Gestión de Pacientes**
- **URL:** `http://localhost:8000/patients` (después de login)
- **Mostrar:** Tabla completa con datos de pacientes, filtros, estados y botones de acción
- **Archivo:** `gestion-pacientes.png`

### **4. Diseño Responsivo**
- **URL:** Cualquier página principal
- **Mostrar:** Adaptación responsive usando DevTools (simular móvil)
- **Archivo:** `diseño-responsive.png`

---

## 🚀 PASOS RÁPIDOS

1. **Levantar servidor:**
   ```bash
   docker-compose up -d
   ```

2. **Credenciales:**
   - Usuario: `admin@admin.com`
   - Password: `password`

3. **Para acceder a gestión de pacientes:**
   - Login → Dashboard → Click en "Gestión Pacientes"
   - O ir directamente a `/patients`

4. **Para captura responsive:**
   - F12 → Toggle device toolbar
   - Seleccionar dispositivo móvil

---

## ✅ CHECKLIST

- [ ] Dashboard con estadísticas y accesos rápidos
- [ ] Formularios bien estilizados 
- [ ] Tabla de pacientes con filtros y estados
- [ ] Vista móvil responsive funcionando