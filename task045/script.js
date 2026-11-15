const input = document.querySelector('input');
const btn = document.querySelector('button');
const userBlock = document.querySelector('.user');

btn.addEventListener('click', async (e) => {
  e.preventDefault();

  const id = input.value;

  const formData = new FormData();
  formData.append('id', id);

  try {
    const response = await fetch('find_user.php', {
      method: 'POST',
      body: formData
    })
    if (!response.ok) { throw new Error("Error in response!")}

    const user = await response.json();
    if (!user) {
      const message = "User is not find!";
      userBlock.textContent = message;
      return;
    }

    printUser(user);

  } catch  (err) {
    console.log(err.message);
  }
})


function printUser(user) {
  userBlock.innerHTML = '';

  const userName = document.createElement('p');
  const userEmail = document.createElement('p');

  userName.textContent = user.name;
  userEmail.textContent = user.email;

  userBlock.append(userName, userEmail);
}