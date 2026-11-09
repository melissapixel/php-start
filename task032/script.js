const div = document.querySelector('.list');

async function printProduct() {
  const url = 'products.php';

  try {
    const response = await fetch(url);
    const data = await response.json();

    data.forEach(el => {
      const id = el.id;
      const name = el.name;
      const price = el.price;
      const inStock = el.inStock === true ? '✓ В наличии' : '✗ Нет в наличии';

      const li = document.createElement('li');

      li.textContent = `[${id}] ${name} - ${price} руб. ${inStock}`;

      div.append(li);

    });
  } 
  catch (err) {
    console.log(err.message);
  }
}

printProduct();