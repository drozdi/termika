document.addEventListener('DOMContentLoaded', () => {
	// Инициализация масок
	const phoneMask = IMask(document.getElementById('phone'), {
		mask: '+{7} (000) 000-00-00',
	})

	// Восстановление данных из localStorage
	const formFields = [
		'fio',
		'phone',
		'email',
		'company',
		'city',
		'product',
		'comment',
	]
	formFields.forEach(field => {
		const savedValue = localStorage.getItem(field)
		if (savedValue) {
			document.getElementById(field).value = savedValue
		}
	})

	// Валидация в реальном времени
	document.getElementById('feedbackForm').addEventListener('input', e => {
		validateField(e.target)
		localStorage.setItem(e.target.id, e.target.value)
	})

	// Валидация при отправке
	document
		.getElementById('feedbackForm')
		.addEventListener('submit', function (e) {
			e.preventDefault()
			let isValid = true

			const fieldsToValidate = [
				{ id: 'fio', validate: validateFIO },
				{ id: 'phone', validate: validatePhone },
				{ id: 'email', validate: validateEmail },
				{ id: 'company', validate: validateCompany },
				{ id: 'city', validate: validateRequired },
				{ id: 'product', validate: validateRequired },
			]

			fieldsToValidate.forEach(({ id, validate }) => {
				const field = document.getElementById(id)
				if (!validate(field.value)) isValid = false
			})

			if (isValid) {
				showModal()
				localStorage.clear()
				this.reset()
			}
		})

	// Закрытие модального окна
	document.querySelector('.close').addEventListener('click', () => {
		document.getElementById('successModal').style.display = 'none'
	})
})

// Функции валидации
function validateFIO(value) {
	const regex = /^[А-ЯЁ][а-яё]+\s[А-ЯЁ][а-яё]+\s[А-ЯЁ][а-яё]+$/
	return showValidation('fio', regex.test(value))
}

function validatePhone(value) {
	const regex = /^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$/
	return showValidation('phone', regex.test(value))
}

function validateEmail(value) {
	const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
	return showValidation('email', regex.test(value))
}

function validateCompany(value) {
	const regex = /^(ООО|АО|ЗАО|ИП)\s.+$/i
	return showValidation('company', regex.test(value))
}

function validateRequired(value) {
	return value.trim() !== ''
}

function showValidation(fieldId, isValid) {
	const errorMessage = document.querySelector(`#${fieldId} + .error-message`)
	errorMessage.style.display = isValid ? 'none' : 'block'
	return isValid
}

function showModal() {
	document.getElementById('successModal').style.display = 'block'
}
