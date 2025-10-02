// Form Validation for ClinicPsicApp
// Implementa validación en tiempo real para formularios

class FormValidator {
    constructor(formSelector) {
        this.form = document.querySelector(formSelector);
        this.initValidation();
    }

    initValidation() {
        if (!this.form) return;

        // Validación en tiempo real
        this.form.addEventListener('input', (e) => {
            this.validateField(e.target);
        });

        // Validación al enviar
        this.form.addEventListener('submit', (e) => {
            if (!this.validateForm()) {
                e.preventDefault();
            }
        });
    }

    validateField(field) {
        const fieldType = field.type;
        const fieldValue = field.value.trim();
        let isValid = true;
        let message = '';

        switch (fieldType) {
            case 'email':
                isValid = this.validateEmail(fieldValue);
                message = isValid ? '' : 'Ingrese un email válido';
                break;
            
            case 'tel':
                isValid = this.validatePhone(fieldValue);
                message = isValid ? '' : 'Ingrese un teléfono válido (10 dígitos)';
                break;
                
            case 'text':
                if (field.name === 'professional_card') {
                    isValid = this.validateProfessionalCard(fieldValue);
                    message = isValid ? '' : 'Tarjeta profesional debe tener 10 dígitos';
                }
                break;

            case 'password':
                isValid = this.validatePassword(fieldValue);
                message = isValid ? '' : 'Mínimo 8 caracteres con mayúscula y número';
                break;
        }

        this.updateFieldStatus(field, isValid, message);
        return isValid;
    }

    validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    validatePhone(phone) {
        const phoneRegex = /^\d{10}$/;
        return phoneRegex.test(phone);
    }

    validateProfessionalCard(card) {
        const cardRegex = /^\d{10}$/;
        return cardRegex.test(card);
    }

    validatePassword(password) {
        // Mínimo 8 caracteres, una mayúscula, una minúscula, un número
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d@$!%*?&]{8,}$/;
        return passwordRegex.test(password);
    }

    updateFieldStatus(field, isValid, message) {
        const fieldGroup = field.closest('.form-group') || field.parentElement;
        let errorElement = fieldGroup.querySelector('.error-message');
        
        // Crear elemento de error si no existe
        if (!errorElement) {
            errorElement = document.createElement('div');
            errorElement.className = 'error-message text-red-500 text-sm mt-1';
            fieldGroup.appendChild(errorElement);
        }
        
        // Remover clases anteriores
        field.classList.remove('border-red-500', 'border-green-500');
        
        if (field.value.length === 0) {
            // Campo vacío - estado neutro
            field.classList.remove('border-red-500', 'border-green-500');
            errorElement.textContent = '';
        } else if (isValid) {
            // Campo válido
            field.classList.add('border-green-500');
            errorElement.textContent = '';
        } else {
            // Campo inválido
            field.classList.add('border-red-500');
            errorElement.textContent = message;
        }
    }

    validateForm() {
        let isFormValid = true;
        const formElements = this.form.querySelectorAll('input[required], select[required], textarea[required]');
        
        formElements.forEach(field => {
            if (!this.validateField(field)) {
                isFormValid = false;
            }
        });

        return isFormValid;
    }
}

// Auto-inicialización para formularios comunes
document.addEventListener('DOMContentLoaded', () => {
    // Inicializar validador para formulario de registro de psicólogos
    if (document.querySelector('#psychologist-register-form')) {
        new FormValidator('#psychologist-register-form');
    }

    // Inicializar validador para formulario de login
    if (document.querySelector('#login-form')) {
        new FormValidator('#login-form');
    }

    // Inicializar validador para formulario de registro de pacientes
    if (document.querySelector('#patient-register-form')) {
        new FormValidator('#patient-register-form');
    }

    console.log('FormValidator initialized for ClinicPsicApp');
});