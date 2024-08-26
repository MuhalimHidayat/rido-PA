document.addEventListener('DOMContentLoaded', function () {
    const inputFile = document.getElementById('avatar');
    const gam_settings = document.getElementById('gam_settings');

    inputFile.onchange = function(){
        gam_settings.src = URL.createObjectURL(inputFile.files[0]);
    };
});