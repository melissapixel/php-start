const form = document.querySelector("form");
const greetingBlock = document.querySelector("#greeting-section");

// SET COOKIE
form.addEventListener("submit", (e) => {
  e.preventDefault();
  const name = form.querySelector("#nameInput").value;
  document.cookie = `username=${encodeURIComponent(name)}; path=/; max-age=604800; samesite=Lax`;
  loadBlock();
})

// DELETE COOKIE
greetingBlock.addEventListener("click", (e) => {
  const btn = e.target.closest("#forget-btn");
  if (btn) {
    document.cookie = `username=; path=/; max-age=0; samesite=Lax`;
    loadBlock()
  }
})

function loadBlock() {
  const username = getCookie('username'); 

  if (username) {
    greetingBlock.classList.add('visial');
    greetingBlock.classList.remove('hidden');
    form.classList.add('hidden');
    form.classList.remove('visial');
    const p = greetingBlock.querySelector('#greeting-text');
    p.textContent = `Hi, ${username}`;
    return;

  } else {
    form.classList.add('visial');
    form.classList.remove('hidden');
    greetingBlock.classList.add('hidden');
    greetingBlock.classList.remove('visial');
    return;
  }
}
loadBlock();

// PARSING COOKIE
function getCookie(name) {
  const match = document.cookie
    .split('; ')
    .find((row) => row.startsWith(`${name}=`));
    
  return match ? decodeURIComponent(match.split('=')[1]) : null;
}