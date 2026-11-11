const list = document.querySelector('.list');
const form = document.querySelector('form');

form.addEventListener('submit', async (event) => {
  event.preventDefault();

  const formData = new FormData(form);
  const params = new URLSearchParams();

  for (const [key, value] of formData.entries()) {
    if (value !== '') {
      params.append(key, value);
    }
  }

  const response = await fetch(`movies.php?${params}`);
  const movies = await response.json();

  list.innerHTML = '';

  movies.forEach(movie => {
    const li = document.createElement("li");

    const title = document.createElement("p");
    const genre = document.createElement("p");
    const rating = document.createElement("p");
    const is_hd = document.createElement("p");

    title.textContent = `Title: ${movie.title}`;
    genre.textContent = `Genre: ${movie.genre}`;
    rating.textContent = `${movie.rating} / 10`;
    is_hd.textContent = movie.is_hd ? '✔' : '✗';

    li.append(title, genre, rating, is_hd);
    list.appendChild(li);
  });
})