
const API_KEY = 'api_key=3e9f854cc30676d8e9ef5c2a80fddb84';
const BASE_URL='https://api.themoviedb.org/3';
const API_URL = BASE_URL + '/discover/movie?sort_by=popularity.desc&' + API_KEY;
const IMG_URL = 'https://image.tmdb.org/t/p/w500';
const searchURL= BASE_URL +'/search/movie?' +API_KEY;

const main = document.getElementById('main');
const form = document.getElementById('form');
const search = document.getElementById('search');

getMovie(API_URL);

function getMovie(url){

    fetch(url).then(res => res.json()).then(data => {

        console.log(data.result) 
        showMovies(data.results);
    })
}

function showMovies(data){
    main.innerHTML ='';

    data.forEach(movie => {
        const {title, poster_path, vote_average, overview} = movie;
        const movieEl = document.createElement('div');
        movieEl.classList.add('movie');
        movieEl.innerHTML = `
            <img src="${IMG_URL + poster_path}" alt="${title}">
            <div class="movie-info">
                <h3>${title}</h3>
                <span class="${getColor(vote_average)}">${vote_average}</span>
            </div>
            <div class="overview text-dark">
            <h3>Overview</h3>
            ${overview}
            </div> `
        main.appendChild(movieEl);
    })
}

function getColor(vote_average){
    if(vote_average>=8){
        return 'green';
    }else if(vote_average>=5){
        return "orange";
    }else{
        return 'red';
    }

}

form.addEventListener('submit', (e) => {
    e.preventDefault();

    const searchTerm = search.value;

    if(searchTerm){
        getMovie(searchURL+'&query='+searchTerm)
    } else{
        getMovie(API_URL);
    }
})