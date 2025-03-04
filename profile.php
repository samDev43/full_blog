<?php
     include('controller/AultUserControler.php');
     if(!isset($_SESSION['user']['id'])){
          echo 'sign up or login to use this website';
          exit;
      }
      $Posts = new action();
      $con = $Posts->con();
     $myPosts = $Posts->displayMyPost();
     // var_dump($myPosts['2']['["time-date"]']);
     foreach($myPosts as $pop){
          // var_dump($pop);
     }
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
      </style>
</head>
<body>

<?php 
                      $sql = 'SELECT * FROM project WHERE id = ?';
                      $stmt = $con->prepare($sql);
                      $stmt->bind_param('s', $_SESSION['user']['id']);
                      $stmt->execute();

                      $result = $stmt->get_result();
                      $res = $result->fetch_assoc();
                    //   var_dump( $res)
                     ?>
<div class="">
     <div class="w-[100%] bg-gray-300 mx-auto ">
     <div id="overlay" class="fixed inset-0 bg-black/50 backdrop-blur-sm  z-20 hidden"></div>
               <div id="editDisplay" class="transition duration-300 scale-85 transition-y-2 opacity-0 absolute w-full  bg--400 z-50 h-[95vh] overflow-hidden overflow-y-auto my-5 flex justify-center rounded-lg p-5 hidden">
                    <div class="absolute h-[110vh] w-[95%] md:w-[70%] lg:w-[50%] bg-white shadow-2xl  z-50 rounded-2xl p-5 ">
                         <div class="flex justify-between items-center border-b border-black my-2">
                              <div></div>
                              <p class="font-bold text-xl ">Edit profile</p>
                              <div><i id="closeeditMenue" class="bi bi-x-lg"></i></div>
                         </div>
                         
                         <div class="my-5  justify-center-col text-blue-500">
                              <div class="flex justify-between items-center">
                                   
                                   <div class="absolute">
                                   <button id="saveProfile" class="font-bold text-blue-400 cursor-pointer rounded-lg cursor-pointer">save</button>
                                   </div>
                                   <p></p>
                                        <label for="setProfile" class=" font-bold text-blue-400 cursor-pointer rounded-lg cursor-pointer inline-block">
                                        edit
                                        </label>
                                        <input  id="setProfile" type="file" class="hidden">
                              </div>
                              <!-- <p class="font-bold text-blue-500 w-full text-end cursor-pointer">edit</p> -->
                            <div class="flex justify-center m-5">
                            <div class="w-[190px] h-[190px] rounded-full overflow-hidden text-center"><img class="object-cover w-full h-full " src="<?php echo $res['profile_picture'] ?>" alt=""></div>
                            <input class="hidden" type="text" name="" id="">
                            </div>
                         </div>
                    </div>
               </div>
     
          <nav class="fixed right-0 z-40 left-0 bg-white">
               <div class="flex shadow-lg items-center justify-end gap-10 w-[70%] mx-auto ">
                    <div id="menuIcon" class="p-5"><i class="bi bi-layout-text-sidebar font-bold text-xl"></i></div>
                    <div>
                    <i id="toHomePage" class="bi bi-house-gear-fill text-xl"></i>
                    </div>
               </div>
          </nav>
          <div style=" "  id="slider" class="relative  flex h-full justify-start  shadow-lg items-center ">
               <div id="profile" class="w-[80%] md:block h-[80%] m mx-auto md:w-[60%]  bg--500 px tems-center md:mx-10 lg:mx-40">
                    
                    <div class="bg-white rounded-lg shadow-lg p-5 w-[100%] flex flex-col items-center gap-2">
                         <div class="flex w-full  justify-end"><i id="editMenue" class="font-bold text-2xl bi bi-list"></i></div>
                         <div class= " rounded-full overflow-hidden w-[150px] h-[150px] m  "><img   class="object-cover w-full h-full" src="<?php echo $res['profile_picture'] ?>" alt=""></div>
                         <div><p><?php echo $res['username'] ?></p></div>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg  gap-2 flex flex-col items-center gap-2 my-20 h-[60%]">
                      <div class="w-full flex gap-2 flex-col flex-start  p-10 text-black">
                         <p class="font-bold mt-5">Information</p>
                         <p ><span class="font-bold">Name</span> : <?php echo $res['username'] ?></p></p>
                         <p><span  class="font-bold">Date created</span> : <?php echo $res['time-date'] ?></p></p>
                         <p><span  class="font-bold">Email</span> : <?php echo $res['email'] ?></p></p>
                         <p><span  class="font-bold">Phone Number</span> : <?php echo $res['Phone_number'] ?></p></p>
                      </div>
                    </div>
               </div>
               <div id="sign" style="  scrollbar-width: none;" class="hidden w-[80%] mx-auto md:block mr-5  h-[80%]  bg-white  md:w-full gap-2 rounded-lg p-5  overflow-hidden overflow-y-scroll">
                   <div class="grid grid-cols-1 md:grid-cols-2">
                    <?php foreach($myPosts as $index => $post): ?>
                       <div class="singlePost shadow-lg rounded-lg h-[15vh] m-2 overflow-hidden ">
                            <div><img class="w-full h-full object-cover  transition duration-900" src=" DBimages/<?php echo $post['images'] ?>" alt=""></div>
                            <?php  ?>
                            <input name="postId" value="<?php echo $post['id'] ?>" class="hidden" type="text">
                         </div> 
                       <?php endforeach; ?>
                   </div>
               </div>
          </div>
     </div>
     <div class="relative">
          <div id="toSign" class="cursor-pointer w-[50px] h-[50px] flex items-center justify-center rounded-full p-5 bg-gray-300 transition duration-300 hover:bg-gray-800 hover:text-white  md:hidden absolute right-10 bottom-[500px] text-5xl"><i class="bi bi-arrow-right"></i></div>
          <div id="toProfil" class="cursor-pointer w-[50px] h-[50px] flex items-center justify-center rounded-full p-5 hidden md:hidden bg-gray-300 absolute left-10 bottom-[500px]  text-5xl transition duration-300 hover:bg-gray-800 hover:text-white "><i class="bi bi-arrow-left"></i></div>
     </div>
     
</div>
<div id="sideNav" class="flex  justify-start hidden">
     <div id="sideNavMenue" class="z-50 w-[25%] shadow-lg transition-all duration-300 rounded-r-lg  absolute bg-gray-400 opacity-0 translate-x-2 scale-85 h-[90vh] top-[65px]">
          <p id="settingPage" class="m-2 py-2 text-center cursor-pointer text-white transition duration hover:bg-gray-600 rounded-lg">settings</p>
          <p id="profileSettingPage" class="m-2 py-2 text-center cursor-pointer text-white transition duration hover:bg-gray-600 rounded-lg">set your profile</p>

     </div>
</div>


<script>
 document.getElementById('saveProfile').addEventListener('click', async () => {
    let fileInput = document.getElementById('setProfile'); // Get the file input
    let file = fileInput.files[0]; // Get the selected file

    if (!file) {
        alert("Please select a file.");
        return;
    }

    const formData = new FormData();
    formData.append("image", file); // Append the file

    let res = await fetch('changeProfilePicture.php', {
        method: 'POST',
        body: formData, // Send FormData (DO NOT use JSON.stringify)
    });

    let data = await res.json();
    console.log(data);
});

    document.getElementById('toHomePage').addEventListener('click',()=>{
        location.href='http://localhost/blog_project/homePage.php';
    });

</script>
<script src="homePage.js?v=<?php echo time(); ?>"></script>
</body>
</html>

