async function getStats() {
  const url = 'stats.php';

  try {
    const response = await fetch(url);
    const data = await response.json();

    console.log(data);

  } catch (err) {
    console.log(err);
  }
}


document.addEventListener('DOMContentLoaded', function() {
  getStats();
});