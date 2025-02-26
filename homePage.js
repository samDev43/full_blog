
if(document.getElementById('navDis')){
    // document.getElementById('navDis').addEventListener('click',()=>{
    //     
    //     console.log();
        
    //     document.getElementById('smNav').classList.toggle('hidden')
    // });

    document.getElementById("navDis").addEventListener("click", function () {
        let menu = document.getElementById("smNav");
        let overlay = document.getElementById('overlay')
        
        if (menu.classList.contains("hidden")) {
            // Remove 'hidden' so it's now visible, but still transparent and scaled down
            menu.classList.remove("hidden");
            overlay.classList.remove("hidden");
            console.log('bttn click');
            document.body.classList.add("overflow-hidden");
            // Small delay to let browser register the state change before animation
            setTimeout(() => {
                overlay.classList.add("opacity-100");
                menu.classList.remove("opacity-0", "scale-95", "translate-y-2");
                menu.classList.add("opacity-100", "scale-100", "translate-y-0");
            }, 10);
        } else {
            // Start fading out and shrinking
            overlay.classList.remove("opacity-100");
            menu.classList.remove("opacity-100", "scale-100", "translate-y-0");
            menu.classList.add("opacity-0", "scale-95", "translate-y-2");
            document.body.classList.remove("overflow-hidden");
            // After animation completes (300ms), hide the menu
            setTimeout(() => {
                overlay.classList.add("hidden");
                menu.classList.add("hidden");
            }, 10);
        }
    });
    
    
}
if(document.getElementById('accDis')){
    // document.getElementById('accDis').addEventListener('click',()=>{
    //     // document.getElementById('disSetting').classList.toggle('hidden')
    
    // })
    document.getElementById("accDis").addEventListener("click", function () {
        let menu = document.getElementById("disSetting");
        let overlay = document.getElementById('overlay')
    
        if (menu.classList.contains("hidden")) {
            menu.classList.remove("hidden");
            overlay.classList.remove("hidden");
            document.body.classList.add("overflow-hidden");
            setTimeout(() => {
                overlay.classList.add("opacity-100");
                menu.classList.remove("opacity-0", "scale-85", "translate-y-5");
                menu.classList.add("opacity-100", "scale-100", "translate-y-0");
            }, 10);
        } else {
            overlay.classList.remove("opacity-100");
            menu.classList.remove("opacity-100", "scale-100", "translate-y-0");
            menu.classList.add("opacity-0", "scale-95", "translate-y-5");
            document.body.classList.remove("overflow-hidden");
            setTimeout(() => {
                overlay.classList.add("hidden");
                menu.classList.add("hidden");
            }, 10); // Wait for animation to complete
        }
    });
    
}
if(document.getElementById('postPagNav')){
document.getElementById('postPagNav').addEventListener('click',()=>{
    location.href= 'http://localhost/blog_project/post.php';
})
}
if(document.getElementById('mYPostNav')){
    document.getElementById('mYPostNav').addEventListener('click',()=>{
        location.href= 'http://localhost/blog_project/myPost.php';
    })
}
if(document.querySelectorAll('.singlePost')){
    console.log(document.querySelectorAll('.singlePost'));
    
    document.querySelectorAll('.singlePost').forEach(post => {
        post.addEventListener('click', () => {
            console.log(post);
            let postIdInput = post.querySelector("input[name='postId']");
            console.log(postIdInput);
            
            if (postIdInput) {
               let id = postIdInput.value; // Log the clicked post's ID
               let info = {
                id,
               }
                let res = fetch('myPost.php',{
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(info),
                    method: 'POST',
                })
                location.href ='http://localhost/blog_project/singlePost.php';

            } else {
                console.log("Post ID input not found!");
            }
        });
    });
    
    }

    if(document.getElementById('viewAllPost')){
        document.getElementById('viewAllPost').addEventListener('click', ()=>{
            location.href= 'http://localhost/blog_project/allPost.php';
        })
    }
    if(document.getElementById('logOut')){
        document.getElementById('logOut').addEventListener('click',{

        })
    }

    function openModal() {
        document.getElementById("modal").classList.remove("hidden");
        document.body.classList.add("overflow-hidden"); // Disable scrolling
    }

    function closeModal() {
        document.getElementById("modal").classList.add("hidden");
        document.body.classList.remove("overflow-hidden"); // Enable scrolling
    }

    if(document.getElementById('cancleLogout')){
        document.getElementById('cancleLogout').addEventListener('click',()=>{
            closeModal();
        })
        document.getElementById('AcceptLogout').addEventListener('click',()=>{
            closeModal();
            location.href= 'http://localhost/blog_project/indexSignup.php';
        })
    }
    if(document.getElementById('viewMyProfile')){
        document.getElementById('viewMyProfile').addEventListener('click', ()=>{
            location.href = 'http://localhost/blog_project/profile.php'
        })
    }
