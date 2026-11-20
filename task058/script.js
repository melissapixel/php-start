const filterForm = document.querySelector('#filterForm');

filterForm.addEventListener('submit', async (e) => {
  e.preventDefault();

  const formData = new FormData(filterForm);
  const params = new URLSearchParams(formData);

  const url = `employees.php?${params.toString()}`;

  try {
    const response = await fetch(url);
    const data = await response.json();
  } catch (err) {
    console.log(err);
  }
})