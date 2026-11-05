const list = document.querySelector('.list');

console.log(data);

data.forEach(el => {
  const li = document.createElement('li');
  li.textContent = el.name;
  list.append(li);
});