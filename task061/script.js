const table = document.querySelector('table');

async function getData() {
  const url = 'server.php';

  try {
    const response = await fetch(url);
    const data = await response.json();

    printDataTable(data.data);

  } catch (err) {
    console.log(err);
  }
}
document.addEventListener("DOMContentLoaded", () => {
  getData();
});


function printDataTable(array) {
  const thead = table.createTHead();
  const headerRow = thead.insertRow();
  headerRow.insertCell().textContent = 'Name';
  headerRow.insertCell().textContent = 'Amount';

  const tbody = table.createTBody();

  array.forEach(item => {
    const row = tbody.insertRow();
    
    const cellName = row.insertCell();
    cellName.textContent = item.name;
    
    const cellRole = row.insertCell()
    cellRole.textContent = item.amount || 'None';
  });
}