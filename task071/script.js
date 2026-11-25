const searchForm = document.querySelector("#searchForm");

searchForm.addEventListener("submit", async (e) => {
  e.preventDefault();

  const formData = new FormData(searchForm);
  const params = new URLSearchParams(formData);

  const url = `api/search-user.php?${params.toString()}`;

  try {
    const response = await fetch(url);
    const data = await response.json();

    if (!data.success) {
      console.error(data.error);
      return;
    }

    console.log(data.users);

  } catch (err) {
    console.error('Request failed:', err);
  }
})