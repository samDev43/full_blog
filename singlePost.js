document.getElementById('toHomePage').addEventListener('click',  ()=>{
    location.href = "http://localhost/blog_project/homePage.php";
})


document.getElementById('deletPost').addEventListener('click',async ()=>{
    console.log( document.querySelector('input[class="hidden"]').value);
    
    let postId = document.querySelector('input[class="hidden"]').value;
    let info = {postId}
     let res = await fetch('deleteSinglePost.php',{
        headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(info),
                    method: 'POST',
     }) 
let data = await res.json()
     if(data == 'ok'){
       location.href = 'http://localhost/blog_project/homePage.php';
     }
})