function showAlert(message, type = 'success') {
  const alert = document.createElement('div')
  alert.className = `alert alert--${type}`
  alert.textContent = message

  document.body.appendChild(alert)
  
  setTimeout(() => {
    alert.classList.add('alert--show')
  }, 100)

  setTimeout(() => {
    alert.classList.remove('alert--show')

    setTimeout(() => {
      alert.remove()
    }, 400)
  }, 3000)
}


const burgers = document.querySelectorAll('.navbar-burger')

burgers.forEach(burger => {
  burger.addEventListener('click', () => {
    const menu = burger.nextElementSibling
    menu.classList.toggle('navbar-menu--open')
  })
})

const alert = document.getElementById('alert')

if(alert) {
  setTimeout(() => {
    alert.classList.add('alert--show')
  }, 100)

  setTimeout(() => {
    alert.classList.remove('alert--show')
  }, 2000)
}

const btnSuccess = document.getElementById('trigger-alert-success')
const btnError = document.getElementById('trigger-alert-error')

if(btnSuccess) {
  btnSuccess.addEventListener('click', () => {
    showAlert('Succès!', 'success')
  })
}

if(btnError) {
  btnError.addEventListener('click', () => {
    showAlert('Erreur!', 'error')
  })
}
