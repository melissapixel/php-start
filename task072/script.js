const themesBlock = document.querySelector('.themes');


// CHANGE THEME IN COOKIES
themesBlock.addEventListener('click', (e) => {
  const theme = e.target.closest('button');
  if (theme) {
    document.cookie = `theme=${theme.value}; path=/; max-age=2592000; samesite=Lax`;
    changeTheme(theme.value);
  }
})

function changeTheme(theme) {
  switch (theme) {
    case "dark":
      document.documentElement.classList.add('theme--dark');
      document.documentElement.classList.remove('theme--light');
      break;
    case "light":
    default:
      document.documentElement.classList.add('theme--light');
      document.documentElement.classList.remove('theme--dark');
      break;
  }
}


// LOAD COOKIES
async function setTheme() {
  const theme = getCookie('theme') ?? 'light';
  changeTheme(theme);
}
setTheme();


// GET COOKI FOR NAME
function getCookie(name) {
  const cookies = document.cookie ? document.cookie.split('; ') : [];
  for (const cookie of cookies) {
    const [key, ...rest] = cookie.split('=');
    if (decodeURIComponent(key) === name) {
      return decodeURIComponent(rest.join('='));
    }
  }
  return null;
}
