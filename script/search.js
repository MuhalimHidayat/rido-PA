// livesearch ajax
const keyword = document.getElementById('keyword');
const container = document.getElementById('table-content');

keyword.addEventListener('keyup', function() {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
            // console.log(xhr.responseText);
            // console.log('Ajax OK');
            // mengambil nama file saat ini
            // const url = window.location.pathname;
            // const filename = url.substring(url.lastIndexOf('/')+1);
            // console.log("AJAX OK ");
            
        }
    }
    const url = window.location.pathname;
    const filename = url.substring(url.lastIndexOf('/')+1);
    console.log(filename);
    if (filename == 'adminAr.php') {
        xhr.open('GET', 'functions/admin/searchAr.php?keyword=' + keyword.value, true);
    } else if (filename == 'adminAg.php') {
        xhr.open('GET', 'functions/admin/searchAg.php?keyword=' + keyword.value, true);
    } else if(filename == 'adminSis.php') {
        xhr.open('GET', 'functions/admin/searchSis.php?keyword=' + keyword.value, true);
    } else if(filename == 'myArticleAg.php') {
        xhr.open('GET', 'functions/search/searchArAg.php?keyword=' + keyword.value, true);
    } else {
        xhr.open('GET', 'functions/search/searchAr.php?keyword=' + keyword.value, true);
    }

    xhr.send();
});