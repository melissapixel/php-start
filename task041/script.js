const result = document.querySelector('#view-count');

async function visialCount() {
  const url = 'server.php';

  try {
    const response = await fetch(url);
    const data = await response.text();

    result.textContent = `Просмотров: ${data}`;
  }
  catch (err) {
    console.log(err.message);
  }
}
document.addEventListener('DOMContentLoaded', visialCount);



async function update_btn() {
  const url = 'increment.php';

  try {
    const response = await fetch(url);
    const data = await response.text();

    result.textContent = `Просмотров: ${data}`;
  }
  catch (err) {
    console.log(err.message);
  }
}