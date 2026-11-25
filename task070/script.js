const formTask = document.querySelector('#task-form');
const tasksList = document.querySelector("#task-list");


async function getTasks(){

  const url = "api/all-tasks.php";

  try {
    const response = await fetch(url);

    if (!response.ok) { throw new Error("Error in response!")}

    const data = await response.json();

    if (data.error) {
      console.log(data.error);
      return;
    }
    renderPosts(data.data);
  } catch (err) {
    console.log(err.message);
  }
}

function renderPosts(array) {
  if (!Array.isArray(array)) {
    schemeTask(task);
  }

  array.forEach(task => {
    schemeTask(task);
  });
}

function schemeTask(task, id, title, created_at, completed) {
  const point = document.createElement("li");
  point.dataset.postId = id || task.id;

  const titleRow = document.createElement("p");
  titleRow.textContent = title || task.title;
  const create_atRow = document.createElement("p");
  create_atRow.textContent = created_at || task.created_at;
  const checkbox = document.createElement('input');
  checkbox.type = 'checkbox';
  checkbox.checked = completed || task.completed;

  point.append(titleRow, create_atRow, checkbox);
  tasksList.appendChild(point);
}

getTasks()


formTask.addEventListener("submit", async (e) => {
  e.preventDefault();
  const url = "api/create-task.php";

  const formData = new FormData(formTask);

  try {
    const response = await fetch(url, {
      method: 'POST',
      body: formData
    })

    const data = await response.json();
    schemeTask(data, data.data.id, data.data.title, data.data.created_at, data.data.completed);

  } catch (err) {
    console.log(err.message);
  }
})



// DELETE TASK
tasksList.addEventListener('click', async (e) => {
  const btn = e.target.closest('input[type="checkbox"]');
  if (btn) {
    const point = btn.parentElement;
    const id = point.getAttribute("data-post-id");
    
    const url = "api/delete-post.php";
    const formData = new FormData();
    formData.append('id', id);

    try {
      const response = await fetch(url, {
        method: 'POST',
        body: formData
      })

      const data = await response.json();

      if (!data.success) {
        console.log(data.error);
        return;
      }

      point?.remove(); 

    } catch (err) {
      console.log(err.message);
    }
  }
})