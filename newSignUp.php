<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="w-full h-full flex justify-between">
        <div class="hidden md:block md:w-[44%] lg:w-[54%] bg-blue-500 h-full">
          <img class="w-full h-full" src="logos/Background@2x.png" alt="">
        </div>
        <form id="sighup"  action="post" class="flex flex-col mx-auto w-full md:w-[46%] lg:w-[36%]">
        <!-- <div > -->
               <div class="w-full bg-white ">
                <p class="w-[70%] mx-auto my-[50px]"><img src="logos/Logo (1).png" alt=""></p>
                <p id='displayFeedback'  class="text-center"></p>
              </div>
              <div class="p-5 flex flex-col w-[80%] mx-auto justify-start gap-5">
                  <p class="font-bold text-2xl">Signup</p>
                  <div class="flex flex-col justify-start gap-2">
                      <p class="font-bold text-xl">Username</p>
                      <input id="username"  class="w-full p-2 outline-none border-2 border-gray-200 rounded-xl" type="text">
                  </div>
                  <div class="flex flex-col justify-start gap-2">
                    <p class="font-bold text-xl">Email Address</p>
                    <input id="email" class="w-full p-2 outline-none border-2 border-gray-200 rounded-xl" type="text">
                </div>
                <div class="flex flex-col justify-start gap-2">
                    <p class="font-bold text-xl">Phone Number</p>
                    <input id="phoneNumber"  class="w-full p-2 outline-none border-2 border-gray-200 rounded-xl" type="text">
                </div>
                <div class="flex flex-col justify-start gap-2">
                    <p class="font-bold text-xl">Password</p>
                    <input id="password" class="w-full p-2 outline-none border-2 border-gray-200 rounded-xl" type="password">
                    <input id='id' type="hidden">
                </div>
              </div>
              <div class="w-[74%] mx-auto">
                  <button  type="submit" class="rounded-xl text-white w-full py-5 bg-blue-500 font-bold">Signup</button>
                  <p class="mx-auto text-xl mt-5 mb-2 text-center">Alredy have an account</p>
                  <button type="button" onclick="toLog()" class="rounded-xl text-white w-full py-5 bg-blue-500 font-bold">Login</button>
              </div>
        <!-- </div> -->
        </form>

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
            //    document.getElementById('displayFeedback').innerHTML = data.message;
            alert(data.message);
           }else{
            //    document.getElementById('displayFeedback').innerHTML = data.message;
            alert(data.message);
           }
       }catch(error){
           console.log(error);
       }       
        }
       );
       function toLog(){
           window.location.href = 'http://localhost/blog_project/newSignin.php';
       }
   </script>
</body>
</html>