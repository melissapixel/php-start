const calcForm = document.querySelector('#calcForm');
const result = document.querySelector('#result');

calcForm.addEventListener('submit', async (e) => {
  e.preventDefault();

  const num1 = document.querySelector('#num1').value;
  const num2 = document.querySelector('#num2').value;
  const operator = document.querySelector('#operator').value;

  const formData = new FormData();
  formData.append('num1', num1);
  formData.append('num2', num2);
  formData.append('operator', operator);

  const url = 'calc.php';

  try {
    const response = await fetch(url, {
      method: 'POST',
      body: formData
    })

    const data = await response.json();

    if (data.error) {
      result.textContent = data.error;
      return;
    }
    
    result.textContent = data.result;


  } catch (err) {
    result.textContent = 'Ошибка соединения с сервером';
  }
})