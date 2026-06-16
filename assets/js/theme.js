function toggleDarkMode(){

document.body.classList.toggle("dark");

}

window.onload=function(){

document.getElementById('loader')
.style.display='none';

}

$(document).ready(function(){

$('.table').DataTable();

});