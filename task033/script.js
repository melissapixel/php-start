const order = document.querySelector('.order');

const order_id = document.querySelector('.order_id');
const customer = document.querySelector('.customer');
const products = document.querySelector('.products');
const delivery = document.querySelector('.delivery');
const total = document.querySelector('.total');

async function printOrder() {
  const url = 'order.php';

  try {
    const response = await fetch(url);
    const data = await response.json();

    order_id.textContent = `Заказ #${data.orderId}`;
    customer.textContent = `${data.customer?.name} (${data.customer?.phone})`;

    data.items.forEach(el => {
      const li = document.createElement('li');
      li.textContent = `${el.name} (${el.qty} шт.) — ${el.price} руб.`;
      products.appendChild(li);
    });

    delivery.textContent = `Adress: ${data.delivery?.address}\nDate: (${data.delivery?.date})`;
    total.textContent = `Итого: ${data.total} руб.`;

  }
  catch (err) {
    console.log(err.message);
  }
}

printOrder();