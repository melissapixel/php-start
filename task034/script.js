const btn = document.querySelector('#show-btn');
const filter = document.querySelector('form');
const list = document.querySelector('#products');

filter.addEventListener('submit', async (event) => {

  event.preventDefault(); 

  // 2. Собираем все поля формы в FormData
  const formData = new FormData(filter);

  // 3. Создаём пустой URLSearchParams
  const params = new URLSearchParams();

  // 4. Проходим по всем парам FormData
  for (const [key, value] of formData.entries()) {
    // 5. Если значение не пустое — добавляем в params
    if (value !== '') {
      params.append(key, value);
    }
  }

  const response = await fetch(`server.php?${params}`);
  const products = await response.json();

  list.innerHTML = '';
  Object.values(products).forEach(product => {
    const li = document.createElement("li");

    const name = document.createElement("p");
    name.textContent = product.name;

    const category = document.createElement("p");
    category.textContent = product.category;

    const price = document.createElement("p");
    price.textContent = product.price;

    li.append(name, category, price);
    list.appendChild(li);
  });

});