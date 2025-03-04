if(document.getElementById('editMenue')){
    let editDisplay = document.getElementById('editDisplay');
    document.getElementById('editMenue').addEventListener('click',()=>{
        console.log(editDisplay);
        document.getElementById('overlay').classList.remove('hidden')
        editDisplay.classList.remove('hidden')
        setTimeout(()=>{
            editDisplay.classList.remove('scale-85', 'transition-y-2', 'opacity-0');
            editDisplay.classList.add('scale-100', 'transition-y-0', 'opacity-100')
        }, 10)
    })

    document.getElementById('closeeditMenue').addEventListener('click',()=>{
        editDisplay.classList.add('scale-85', 'transition-y-2', 'opacity-0');
        editDisplay.classList.remove('scale-100', 'transition-y-0', 'opacity-100')
        
        setTimeout(()=>{
            document.getElementById('overlay').classList.add('hidden')
            editDisplay.classList.add('hidden')
        }, 10)
    })
    
}

if(document.getElementById('navDis')){
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
            location.href= 'http://localhost/blog_project/newSignUp.php';
        })
    }
    if(document.getElementById('viewMyProfile')){
        document.getElementById('viewMyProfile').addEventListener('click', ()=>{
            location.href = 'http://localhost/blog_project/profile.php'
        })
    }


    if(document.getElementById('toSign')){
        document.getElementById('toSign').addEventListener('click', ()=>{
            document.getElementById('profile').classList.add('hidden')
            document.getElementById('sign').classList.remove('hidden')
            document.getElementById('toProfil').classList.remove('hidden')
            document.getElementById('toSign').classList.add('hidden')
        })
        document.getElementById('toProfil').addEventListener('click', ()=>{
            document.getElementById('profile').classList.remove('hidden')
            document.getElementById('sign').classList.add('hidden')
            document.getElementById('toSign').classList.toggle('hidden')
            document.getElementById('toProfil').classList.add('hidden')
        })
        
        document.getElementById('menuIcon').addEventListener('click', ()=>{ 
            let  sideNav = document.getElementById('sideNav')
            console.log(sideNav.classList.contains('hidden'));
            let sideNavMenue = document.getElementById('sideNavMenue')
            if(sideNav.classList.contains('hidden')){
                  sideNav.classList.remove('hidden');
                  setTimeout(() => {
                    sideNavMenue.classList.remove("opacity-0", "scale-85", "translate-x-2");
                    sideNavMenue.classList.add('scale-100', 'opacity-100', "translate-x-0")
                  }, 10);
             }else{
                sideNavMenue.classList.remove('scale-100', 'opacity-100', "translate-x-0")
                sideNavMenue.classList.add('scale-85', 'opacity-0', 'translate-x-2')
                setTimeout(() => {
                    sideNav.classList.add('hidden');
                  }, 10);
             }

             document.getElementById('settingPage').addEventListener('click',()=>{
                console.log('what');
                
                 location.href= 'http://localhost/blog_project/settings.php';
             })

             document.getElementById('profileSettingPage').addEventListener('click',()=>{
                location.href= 'http://localhost/blog_project/setProfile.php';
             })


            })}