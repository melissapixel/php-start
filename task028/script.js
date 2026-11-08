const box = document.querySelector('#colorBox');
const result = document.querySelector('#result');

async function printBox () {
  const url = 'server.php';

  try {
    const response = await fetch(url);
    const data = await response.text();
    
    box.style.backgroundColor = data;
    result.textContent = `Color is ${data}`;
  }
  catch (err) {
    console.log(err.message);
  }
}

printBox();