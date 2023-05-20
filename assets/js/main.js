var searchBox = document.getElementById('search-box');
var searchInput = document.querySelector('.search__input');
searchBox.addEventListener('click', function(){
    searchBox.classList.add('open');
    searchInput.focus();
});