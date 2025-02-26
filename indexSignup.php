<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <div>

    </div>
    <div class="flex h-screen items-center justify-center">
        <div class='class=" w-1/3 p-8 shadow-lg '>
        <form id="sighup"  action="post">
                <p class="text-center font-bold text-4xl">Sighup</p>
                <p id='displayFeedback' class="text-center font-bold text-xl"></p>
                <p class="text-center font-bold text-sm" id="message" ></p>
                <input id="username" class=" border border-blue py-2 px-4 w-full my-2" type="text" placeholder="Username">
                <input id="phoneNumber" class=" border border-blue py-2 px-4 w-full my-2" type="text" placeholder="Phone Number">
                <input id="email" class=" border border-blue py-2 px-4 w-full my-2" type="text" placeholder="Email">
                <input id="password" class=" border border-blue py-2 px-4 w-full my-2" type="text" placeholder="Password">
                <input id='id' type="hidden">
                <button type="submit" class="w-full py-2 px-4 my-2 bg-blue-500 text-white" > Sighup </button>
           
            <!-- <div class="flex justify-between items-center w-full px4">
            <p class='text-bold'>Already have an account</p> <button type="button" onclick="toLog()" class='px-5 py-2 bg-blue-500 text-white rounded-lg ml-5'>login</button>
        </div> -->
        </form>
        <div class="flex justify-between items-center w-full px-4 mt-4">
        <p class='font-bold'>Already have an account?</p> 
        <button type="button" onclick="toLog()" class='px-5 py-2 bg-blue-500 text-white rounded-lg ml-5'>Login</button>
    </div>
        </div>

        </div>
       

        <script>
             document.getElementById('sighup').addEventListener('submit', async (input) =>  {
                input.preventDefault();

            let username = document.getElementById('username') .value;
            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;
            let id = document.getElementById('id').value;
            let phoneNumber = document.getElementById("phoneNumber").value;
            let info = {
                username,email,password,phoneNumber,id
            }

            try{
                let res = await fetch('signup.php',{
                    headers:{ 'Content-Type': 'application/json' },
                    body: JSON.stringify(info),
                    method:'POST',
                });
                let data = await res.json();
                console.log(data);
                
                if(data.status == 'ok'){
                    // alert('successfull')
                    document.getElementById('displayFeedback').innerHTML = data.message;
                }else{
                    document.getElementById('displayFeedback').innerHTML = data.message;
                }
            }catch(error){
                console.log(error);
            }       
             }
            );
            function toLog(){
                window.location.href = 'http://localhost/blog_project/indexLgin.php';
            }
        </script>
</body>
</html>