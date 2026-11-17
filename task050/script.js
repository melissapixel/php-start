const list = document.querySelector('.list');
const form = document.querySelector('form');
const result = document.querySelector('.result');




// ADD POINT
form.addEventListener('submit', async (e) => {
  e.preventDefault();

  const item_name = document.querySelector('#item_name').value;
  const quantity = document.querySelector('#quantity').value;

  const formData = new FormData();
  formData.append('item_name', item_name);
  formData.append('quantity', quantity);

  const url = 'add_item.php';

  try {
    const response = await fetch(url, {
      method: 'POST',
      body: formData
    })

     const data = await response.json();

     if (!data.success) {
      result.textContent = data.error;
     } 
     if (data.success) {
      getItems();
     }

  } catch (err) {
    result.textContent = err.message;
  }
})


// DELETE POINT
list.addEventListener('click', async (e) => {
  const btn = e.target.closest('button');

  if (btn) {
    const li = btn.parentElement;
    const id = li.getAttribute('data-id');
    
    const url = "delete_item.php";

    const formData = new FormData();
    formData.append('id', id);

    try {
      const response = await fetch(url, {
        method: 'POST',
        body: formData
      })

      const data = await response.json();

      if (!data.success) {
        result.textContent = data.error;
      }

      getItems();
      
    } catch (err) {
      result.textContent = err.message;
    }
  }
})


// LOAD ALL PRODUCTS
async function getItems() {
  list.innerHTML = '';
  const url = 'get_items.php';

  try {
    const response = await fetch(url);
    const data = await response.json();

    if (!data.success) {
      result.textContent = data.error;
    }

    if (data.success) {
      data.items.forEach(item => {
        const li = document.createElement("li");
        const item_name = document.createElement('p');
        const quantity = document.createElement('p');

        li.dataset.id = item.id;
        item_name.textContent = item.item_name;
        quantity.textContent = item.quantity;

        const btn = document.createElement("button");
        btn.textContent = "Delete this point";

        li.append(item_name, quantity, btn);
        list.appendChild(li);
      });
    }

  } catch (err) {
    result.textContent = err.message;
  }
}
document.addEventListener("DOMContentLoaded", function() {
  getItems();
});
