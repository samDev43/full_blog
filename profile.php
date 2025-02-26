<?php
     include('con.php');
     if(!isset($_SESSION['user']['id'])){
          echo 'sign up or login to use this website';
          exit;
      }
     $select ="SELECT * FROM "; 
?>

<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <script src="https://cdn.tailwindcss.com"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
     <style>
          .slide-container {
              display: flex;
              transition: transform 0.3s ease-in-out;
              width: 300vw; /* 3 full screens */
          }
        /* @media screen and (max-width: 640px)  {
          .text{
               width: 20px;
               height: 29px;
               background-color: red;
          } 
                .slide {
                   width: 100vw;
                    flex-shrink: 0; 
                    height: 100vh;
                    /* width: 100; 
           }    
     }  */
      </style>
</head>
<body>
<div>
     <div class="w-[100%] bg-gray-300 mx-auto">
          <div class="text">
               <nav></nav>
          </div>
          <div style=" "  id="slider" class="  flex h-full justify-start  shadow-lg items-center ">
               <div id="profile" class="w-[80%] md:block h-[80%] m mx-auto md:w-[60%]  bg--500 px tems-center md:mx-10 lg:mx-40">
                    <div class="bg-white rounded-lg shadow-lg p-5 w-[100%] flex flex-col items-center gap-2">
                         <div class= " rounded-full overflow-hidden w-[150px] h-[150px] m  "><img class="w-full h-full" src="image/image 2.png" alt=""></div>
                         <div><p>Name</p></div>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg  gap-2 flex flex-col items-center gap-2 my-20 h-[60%]">
                      <div class="w-full flex gap-2 flex-col flex-start  p-10 text-black">
                         <p class="font-bold mt-5">information</p>
                         <p ><span class="font-bold">name</span> :fetrytuyrutkjhgfs</p>
                         <p><span  class="font-bold">name</span> :</p>
                         <p><span  class="font-bold">name</span> :</p>
                         <p><span  class="font-bold">name</span> :</p>
                      </div>
                    </div>
               </div>
               <div id="sign" style="  scrollbar-width: none;" class="hidden w-[80%] mx-auto md:block  h-[80%]  bg-white  md:w-full gap-2 rounded-lg p-5  overflow-hidden overflow-y-scroll">
                    <div >
                         <p class="font-bold text-2xl my-5">User setting</p>
                         <p class="font-bold my-5 text-2xl">Details</p>
                        <div class="grid grid-cols-1  lg:grid-cols-2 gap-5">
                              <div class="flex flex-col gap-2">
                                   <label class="font-bold" for="name">Name</label>
                                   <input class="flex-1  p-2 bg-gray-300 rounded-lg text-lg focus:border-none" type="text">
                              </div>
                              <div class="flex flex-col gap-2">
                                   <label class="font-bold" for="name">Name</label>
                                   <input class="flex-1  p-2 bg-gray-300 rounded-lg text-lg focus:border-none" type="text">
                              </div>
                              <div class="flex flex-col gap-2">
                                   <label class="font-bold" for="name">Name</label>
                                   <input class="flex-1  p-2 bg-gray-300 rounded-lg text-lg focus:border-none" type="text">
                              </div>
                              <div class="flex flex-col gap-2">
                                   <label class="font-bold" for="name">Name</label>
                                   <input class="flex-1  p-2 bg-gray-300 rounded-lg text-lg focus:border-none" type="text">
                              </div>
                        </div>
                        <button class="px-5 py-2 my-5 rounded-lg text-2xl bg-blue-500 text-white">save changes</button>
                    </div>

                    <div >
                         <p class="font-bold my-5 text-2xl">change password</p>
                        <div class="grid grid-cols-1  lg:grid-cols-2 gap-5">
                              <div class="flex flex-col gap-2">
                                   <label class="font-bold" for="name">Name</label>
                                   <input class="w-full p-2 bg-gray-300 rounded-lg text-lg border border-gray-400" type="text">
                              </div>
                              <div class="flex flex-col gap-2">
                                   <label class="font-bold" for="name">Name</label>
                                   <input class="w-full p-2 bg-gray-300 rounded-lg text-lg border border-gray-400" type="text">
                              </div>
                              <div class="flex flex-col gap-2">
                                   <label class="font-bold" for="name">Name</label>
                                   <input class="w-full p-2 bg-gray-300 rounded-lg text-lg border border-gray-400" type="text">
                              </div>
                              <div class="flex flex-col gap-2">
                                   <label class="font-bold" for="name">Name</label>
                                   <input class="w-full p-2 bg-gray-300 rounded-lg text-lg border border-gray-400" type="text">
                              </div>
                        </div>
                      <div>
                         <button class="px-5 text-2xl py-2 my-5 rounded-lg bg-blue-500 text-white">save changes</button>
                         
                      </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="relative">
          <div id="toSign" class="cursor-pointer w-[50px] h-[50px] flex items-center justify-center rounded-full p-5 bg-gray-300 transition duration-300 hover:bg-gray-800 hover:text-white  md:hidden absolute right-10 bottom-[500px] text-5xl"><i class="bi bi-arrow-right"></i></div>
          <div id="toProfil" class="cursor-pointer w-[50px] h-[50px] flex items-center justify-center rounded-full p-5 hidden md:hidden bg-gray-300 absolute left-10 bottom-[500px]  text-5xl transition duration-300 hover:bg-gray-800 hover:text-white "><i class="bi bi-arrow-left"></i></div>
     </div>
     
</div>
     
 <script>
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
 </script>
</body>
</html>

