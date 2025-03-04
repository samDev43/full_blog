<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
     <div class="md:w-[70%] lg:w-[50%] mx-auto">
     <div id="sign" style="  scrollbar-width: none;" class="  mx-auto md:block  h-[90%]  bg-white   gap-2 rounded-lg p-5  overflow-hidden overflow-y-scroll">
                    <div >
                         <p class="font-bold text-2xl my-5">User setting</p>
                         <p class="font-bold my-5 text-2xl">Change user Details</p>
                        <div class="grid grid-cols-1 md:grid-cols-2  lg:grid-c gap-5">
                              <div class="flex flex-col gap-2">
                                   <label class="font-bold" for="name">Change Username</label>
                                   <input id="changeName" class="flex-1  p-2 bg-gray-300 rounded-lg text-lg focus:border-none" type="text">
                              </div>
                              <div class="flex flex-col gap-2">
                                   <label class="font-bold" for="name">Set date of birth</label>
                                   <input id="dateOfBirth" class="flex-1  p-2 bg-gray-300 rounded-lg text-lg focus:border-none" type="date">
                              </div>
                              <!-- <div class="flex flex-col gap-2">
                                   <label class="font-bold" for="name">Set profile picture</label>
                                   <input id="setProfile" class="flex-1  p-2 bg-gray-300 rounded-lg text-lg focus:border-none" type="file">
                              </div> -->
                              <div class="flex flex-col gap-2">
                                   <label class="font-bold" for="name">change email</label>
                                   <input id="changeEmail" class="flex-1  p-2 bg-gray-300 rounded-lg text-lg focus:border-none" type="text">
                              </div>
                        </div>
                        <button id="saveUserDetails" class="px-5 py-2 my-5 rounded-lg text-2xl bg-blue-500 text-white">save changes</button>
                    </div>

                    <div >
                         <p class="font-bold my-5 text-2xl">change password</p>
                        <div class="grid grid-cols-1 md:grid-cols-2  lg:grid-c gap-5">
                              <div class="flex flex-col gap-2">
                                   <label class="font-bold" for="name">Current password</label>
                                   <input id="currentPassword" class="w-full p-2 bg-gray-300 rounded-lg text-lg border border-gray-400" type="text">
                              </div>
                              <div class="flex flex-col gap-2">
                                   <label class="font-bold" for="name">Confirm Current password</label>
                                   <input id="confirmcurrentPassword" class="w-full p-2 bg-gray-300 rounded-lg text-lg border border-gray-400" type="text">
                              </div>
                              <div class="flex flex-col gap-2">
                                   <label class="font-bold" for="name">New password</label>
                                   <input id="newPassword" class="w-full p-2 bg-gray-300 rounded-lg text-lg border border-gray-400" type="text">
                              </div>
                              <div class="flex flex-col gap-2">
                                   <label class="font-bold" for="name">Confirm New password</label>
                                   <input id="confirmNewPassword" class="w-full p-2 bg-gray-300 rounded-lg text-lg border border-gray-400" type="text">
                              </div>
                        </div>
                      <div>
                         <button class="px-5 text-2xl py-2 my-5 rounded-lg bg-blue-500 text-white">save changes</button>
                         
                      </div>
                    </div>
               </div>
     </div>
     <script>
          document.getElementById('saveUserDetails').addEventListener('click', async ()  =>{
               let changeName = document.getElementById('changeName').value;
               let dateOfBirth = document.getElementById('dateOfBirth').value;
               // let setProfile = document.getElementById('setProfile').value;
               let changeEmail = document.getElementById('changeEmail').value;

               let info = {
                    changeName,
                    changeEmail,
                    dateOfBirth,
                    // setProfile,
               }
     
               let res = await fetch('userSetting.php',{
                    headers:{ 'Content-Type': 'application/json' },
                    body: JSON.stringify(info),
                    method:'POST',
               })

               let data = await res.json()
               console.log(data);
               
          })
     </script>
      <script src="homePage.js?v=<?php echo time(); ?>"></script>

</body>
</html>