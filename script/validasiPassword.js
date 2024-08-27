// live password validation
const password = document.getElementById('password');
const konfPassword = document.getElementById('konf-password');
console.log(konfPassword.value);
const keteranganPass = document.getElementById('keteranganPass');
const keteranganKonf = document.getElementById('keteranganKonf');
const tombol = document.getElementById('tombol');


// get value from password
password.addEventListener('keyup', function () {
    const pass = password.value;
    const konfPass = konfPassword.value;
    console.log(konfPass);
    // password harus lebih dari 8 karakter
    if (pass.length < 8) {
        keteranganPass.innerHTML = 'Password harus lebih dari 8 karakter';
        keteranganPass.style.color = 'red';
        tombol.disabled = true;
        tombol.style.backgroundColor = 'gray';
    } else {
        keteranganPass.innerHTML = 'Password valid';
        keteranganPass.style.color = 'green';
        tombol.disabled = false;
        tombol.style.backgroundColor = '#FF8C00';
    }
});

// get value from konf password
konfPassword.addEventListener('keyup', function () {
    const pass = password.value;
    const konfPass = konfPassword.value;
    console.log(konfPass);
    // password harus lebih dari 8 karakter
    if (konfPass !== pass) {
        keteranganKonf.innerHTML = 'Password tidak sama';
        keteranganKonf.style.color = 'red';
        tombol.disabled = true;
        tombol.style.backgroundColor = 'gray';
    } else {
        keteranganKonf.innerHTML = 'Password sama';
        keteranganKonf.style.color = 'green';
        tombol.disabled = false;
        tombol.style.backgroundColor = '#FF8C00';
    }
});