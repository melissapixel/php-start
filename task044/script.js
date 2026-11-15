const postsBlock = document.querySelector('.posts');


postsBlock.addEventListener('click', async (e) => {
  const btn = e.target.closest('button');
  if (btn) {
    const post = btn.parentElement;
    const id = post.dataset.postId; 

    const formData = new FormData();
    formData.append('id', id);
    
    try {
      await fetch('like.php', {
        method: 'POST',
        body: formData
      })

      printPosts();

    } catch  (err) {
      console.log(err.message);
    }
  }
})

async function printPosts() {
  const url = 'all_posts.php';

  postsBlock.innerHTML = '';

  try {
    const response = await fetch(url);

    if (!response.ok) {
      throw new Error("Error");
    }

    const posts = await response.json();
    posts.forEach(post => {
      const point = document.createElement('li');
      point.classList.add("post");
      point.dataset.postId = post.id;

      const title = document.createElement('p');
      title.textContent = post.title;

      const likes = document.createElement('p');
      likes.textContent = post.likes;

      const addLike = document.createElement('button');
      addLike.textContent = "add Like";

      point.append(title, likes, addLike);
      postsBlock.appendChild(point);
    });
  } 
  catch (err) {
    console.log(err.message);
  }
}
document.addEventListener('DOMContentLoaded', () => {
  printPosts()
});