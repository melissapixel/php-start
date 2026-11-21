const filterForm = document.querySelector('#filterForm');
const resultTable = document.querySelector('#resultTable');


filterForm.addEventListener('submit', async (e) => {
  e.preventDefault();

  const formData = new FormData(filterForm);
  const params = new URLSearchParams(formData);

  const url = `employees.php?${params.toString()}`;

  try {
    const response = await fetch(url);
    const data = await response.json();

    printTable(data.data);
    printCaptionTable(data.title);

  } catch (err) {
    console.log(err);
  }
})

function printCaptionTable(title){
  const caption = resultTable.querySelector('caption');
  caption.textContent = title;
}


function printTable(array){   
  const resultBody = document.querySelector('#resultBody');
  resultTable.style.display = "table";
  resultBody.innerHTML = '';


  if (!Array.isArray(array)) {
    const tr = document.createElement('tr');

    const name = document.createElement('td');
    name.textContent = array.name;

    const position = document.createElement('td');
    position.textContent = array.position;

    const phone = document.createElement('td');
    phone.textContent = array.phone ?? 'No tel';

    const email = document.createElement('td');
    email.textContent = array.email ?? 'No email';

    tr.append(name, position, phone, email);
    
    resultBody.appendChild(tr);

    return;
  }

  array.forEach(el => {
    const tr = document.createElement('tr');

    const name = document.createElement('td');
    name.textContent = el.name;

    const position = document.createElement('td');
    position.textContent = el.position;

    const phone = document.createElement('td');
    phone.textContent = el.phone ?? 'No tel';

    const email = document.createElement('email');
    email.textContent = el.email ?? 'No email';

    tr.append(name, position, phone, email);
    
    resultBody.appendChild(tr);
  });
}