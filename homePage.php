<?php
include('controller/AultUserControler.php');
if(!isset($_SESSION['user']['id'])){
    echo 'sign up or login to use this website';
    exit;
}else{
    // echo $_SESSION['user']['id'];
}
$disObj= new action();
  ?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
<body>
   <div class=' w-[80%] mx-auto my-5'>
   <div class="relative">
        <div class="fixed right-0 left-0 top-0 bg-white shadow-xl z-40 ">
            <nav class='flex mx-auto w-[80%] justify-between items-center '>
                <div class="m-2">
                    <p  class="m-2"> <img class="w-[90px]" src="logos/Logo.png" alt=""></p>
                </div>
                <!-- <div class="transition duration-300 hidden lg:block">
                    <ul class="flex gap-5 items-center text-sm"> 
                        <li class="cursor-pointer">Home</li>
                        <li  class="cursor-pointer">Blog</li>
                        <li class="cursor-pointer">Single post</li>
                        <li class="cursor-pointer">Pages</li>
                        <li class="cursor-pointer">Contact</li>
                    </ul>
                </div>
                <div id="navDis" class="z-30 lg:hidden cursor-pointer">
                    =
                </div> -->
                <div  class="flex  items-center">
                    <div  class="flex justify-bettwen items-center bg-gray-200 rounded-[30px] p-2" >
                    <input class="bg-transparent flex-1 w-full focus:outline-none mx-2" type="text" id="search" placeholder="Search username...">
                    <div class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                    </div>
                </div>
                
                <?php 
                    $personID = $_SESSION['user']['id'];
                    $con = $disObj->con();
                    $select = 'SELECT * FROM project WHERE id = ?';
                    $stmt =  $con->prepare($select);
                    $stmt->bind_param('s', $personID);
                    $stmt->execute();
                
                    $result = $stmt->get_result();
                    $username = $result->fetch_assoc();
                ?>
                </div>
                <div id="resultDiv" class="hidden h-[200px] overflow-y-scroll  absolute w-[100%] flex flex-col items-center justify-center mx-auto mt-[290px]">
                    <div class="absolute mx-auto  p-5 bg-white shadow-xl rounded-lg " id="results">
                        <!-- <div class="flex items-center gap-5 ">
                            <div class="w-[60px] h-[60px] rounded-full overflow-hidden"><img class="w-full h-full " src="<?php echo $username['profile_picture'] ?>" alt=""></div>
                            <p>name</p>
                        </div> -->
                        
                    </div>
                </div>
                <div id="accDis" class="z-30 mx-2 p-5">
                <div class="flex items-center gap-5 cursor-pointer">
                
                        <div  class=' relative h-[50px] w-[50px] rounded-full overflow-hidden'>
                            <img class='object-cover h-[50px] w-[50px]' src="<?php echo $username['profile_picture'] ?>" alt="">
                        </div>
                        <div>
                            <p><?php echo $username['username'] ?></p>
                        </div>
                </div>
                
                    
                </div>
            </nav>
        </div>
        <div id="disSetting" class=" hidden opacity-0 z-50 scale-85 translate-y-5 transition-all duration-800 fixed top-0 bottom-0 right-0 left-0   bg-white shadow-lg p-5 flex flex-col items-center right-0 w-full md:w-[60%] lg:w-[30%] rounded-lg md:right-20">
            <div class="w-full bg-white shadow-lg p-5">
                <div class="flex justify-start gap-5 items-center border-b border-gray-400 pb-5">
                    <div class="w-[50px] h-[50px] z-30 rounded-full overflow-hidden">
                        <img class="w-[50px] h-[50px]" src="<?php echo $username['profile_picture'] ?>" alt="">
                    </div>
                    <div>
                        <p><?php echo $username['username'] ?></p>
                    </div>
                </div>
                <div id="postPagNav" class="cursor-pointer mt-5 w-full py-2 rounded-lg bg-gray-500 transition duration-300 hover:bg-gray-800 text-white text-center">
                    <p>Add a post</p>
                </div>
            </div>
            
            <div class="cursor-pointer w-full rounded-lg p-2 m-2 flex items-center justify-between transition duration-300 hover:bg-gray-300">
                <div class="flex items-center gap-2">
                    <div class="p-2 bg-gray-300 rounded-full"><i class="bi bi-gear-fill"></i></div>
                    <div><p>Settings & privacy</p></div>
                </div>
                <div><i class="bi bi-caret-right"></i></div>
            </div>
        
            <div id="mYPostNav" class="cursor-pointer w-full rounded-lg p-2 m-2 flex items-center justify-between transition duration-300 hover:bg-gray-300">
                <div class="flex items-center gap-2">
                    <div class="p-2 bg-gray-300 rounded-full"><i class="bi bi-file-person"></i></div>
                    <div><p>My posts</p></div>
                </div>
                <div><i class="bi bi-caret-right"></i></div>
            </div>
        
            <div id="viewMyProfile" class="cursor-pointer w-full rounded-lg p-2 m-2 flex items-center justify-between transition duration-300 hover:bg-gray-300">
                <div class="flex items-center gap-2">
                    <div class="p-2 bg-gray-300 rounded-full"><i class="bi bi-file-person"></i></div>
                    <div><p>View profile</p></div>
                </div>
                <div><i class="bi bi-caret-right"></i></div>
            </div>
        
            <div onclick="openModal()" id="logOut" class="cursor-pointer w-full rounded-lg p-2 m-2 flex items-center justify-between transition duration-300 hover:bg-gray-300">
                <div class="flex items-center gap-2">
                    <div class="p-2 bg-gray-300 rounded-full"><i class="bi bi-door-open"></i></div>
                    <div><p>Log out</p></div>
                </div>
                <div><i class="bi bi-caret-right"></i></div>
            </div>
     </div>
     <div id="overlay" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden z-20"></div>
        <div>
        <div id="smNav" class="transition-all absolute z-30 bg-gray-300 duration-300 opacity-0 scale-95 translate-y-2 hidden lg:hidden rounded-lg shodow-lg  bg-black/50 backdrop-blur-sm">
            <ul class="flex flex-col gap-5 items-center text-sm p-5 "> 
                <li class="cursor-pointer transition duration-300 hover:bg-gray-300 ">Home</li>
                <li class="cursor-pointer">Blog</li>
                <li class="cursor-pointer">Single post</li>
                <li class="cursor-pointer">Pages</li>
                <li class="cursor-pointer">Contact</li>
            </ul>
        </div>
        </div>
    </div>
    <div>
        <div class="relative mt-[200px] w-full h-[40vh] md:h-[50vh] lg:h-[60vh] rounded-lg overflow-hidden mt-5">
            <img class="w-full " src="image/image 2.png" alt="">
        </div>
    </div>
    <div>
        <div class='h-[50px] w-[100px]'>
            <!-- <img class='w-full' src="image/image 2.png" alt=""> -->
        </div>
    </div>
    <div class="flex justify-center">
        <div class="p-2 bg-gray-200 mt-[40px] text-center text-sm w-[60%]">
            <p>Advertisment</p>
            <p class="font-bold" >Yon Can Place Ads</p>
            <p>Price </p>
        </div>
    </div>
   
       <?php 
       $con = $disObj->con();
              $sql = "SELECT * FROM personPost";
              $stmt = $con->prepare($sql);
              $stmt->execute();

              $result = $stmt->get_result();

              $users = [];
              $count = 0; // Initialize counter
              
              while ($row = $result->fetch_assoc()) {
                  $users[] = $row;
                  $count++;
              
                  if ($count == 6) { // Stop after 3 results
                      break;
                  }
              }
              ?>
    <div class="mt-[100px] grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 ">
        <?php foreach($users as $index => $user): ?>
            <div class="singlePost flex flex-col gap-5 p-5 h-[] rounded border border-gray-200 m-2">
                <div id="" class=" h-[20vh]"><img class="object-cover transition duration-300 cursor-pointer hover: rounded h-full w-full" src="DBimages/<?php echo $users[$index]['images']?>"  alt=""></div>
                <div><p class="text-blue-500 font-bold "><?php echo $users[$index]['title'] ?></p></div>
                
                <input class="hidden" name="postId" value="<?php echo $users[$index]['id'] ?>" type="text">
                <div class=" flex justify-start gap-10 items-center">
                <?php
                $id =  $users[$index]['user_id'];
                  $select = 'SELECT username,profile_picture FROM project WHERE id = ?';
                  $stmt = $con->prepare($select);
                  $stmt->bind_param('s', $id);
                  $stmt->execute();

                  $result = $stmt->get_result();
                  $Names = $result->fetch_assoc();
                ?>
                <div class="flex justify-start items-center gap-5">
                    <div class=" rounded-full h-[50px] w-[50px] overflow-hidden"><img class=" h-full w-full" src="<?php echo $Names['profile_picture']  ?>" alt=""></div>
                <div><p class="text-lg"><?php echo $Names['username'] ?></p></div>
                </div>
                <div><p class="text-lg"><?php  ?></p></div>
            </div>
    </div>
        <?php endforeach ?>
        
    </div>

    <div id="viewAllPost" class="flex justify-center my-20">
        <div><button class="px-5 py-2 rounded-lg bg-none border border-gray-200 transition duration-300 hover:bg-gray-700 hover:text-white">View All Post</button></div>
    </div>

    <div class="flex justify-center mb-20">
        <div class="p-2 bg-gray-200 mt-[40px] text-center text-sm w-[60%]">
            <p>Advertisment</p>
            <p class="font-bold" >Yon Can Place Ads</p>
            <p>Price </p>
        </div>
    </div>
</div>
<div class="w-full bg-gray-200">
 <div class="w-[80%] text-center gap-10  grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mx-auto  p-10  border-gray-400 border-b    ">
    <div>
        <p class="font-bold">About</p>
        <p class="w-[80%] text-center text-gray-600 text-lg my-5 text-wrap"> Lorem ipsum dolor sit amet consectetur adipisicing elit. A eligendi similique, ipsam ullam iure asperiores hic fugit impedit, libero magni sed deserunt esse?</p>
        <p><span class="font-bold  mr-2">Email</span> : <?php echo $username['email'] ?></p>
        <p><span  class="font-bold mr-2">Phone Number</span>: <?php echo $username['Phone_number'] ?></p>
    </div>
    <div>
        <p class="font-bold mb-5">Quick Link</p>
        <ul class="gap-2">
            <li class="cursor-pointer py-2 text-gray-600 text-lg" >Home</li>
            <li class="cursor-pointer py text-gray-600 text-lg">About</li>
            <li class="cursor-pointer py-2 text-gray-600 text-lg">Blog</li>
            <li class="cursor-pointer py text-gray-600 text-lg">Archived</li>
            <li class="cursor-pointer py-2 text-gray-600 text-lg">contart</li>
        </ul>
    </div>
    <div>
        <p class="font-bold mb-[15px]">Catigory</p>
        <ul>
            <li class="cursor-pointer py-2 text-gray-600 text-lg">LifeStyle</li>
            <li class="cursor-pointer  text-gray-600 text-lg">Technology</li>
            <li class="cursor-pointer py-2 text-gray-600 text-lg" >Travel</li>
            <li class="cursor-pointer py text-gray-600 text-lg">Economy</li>
            <li class="cursor-pointer py-2 text-gray-600 text-lg">Sport</li>
        </ul>
    </div>
    <div class="p-10 shadow-lg bg-white rounded-lg">
        <p class="text-center font-bold">Weekly Newsleter</p>
        <p class="text-gray-700 text-lg"> Get blog articule and offers via email</p>
        <div class="flex p-2 my-2 rounded-lg my-2 border border-gray-500">
            <input class="flex-1 w-full  focus:outline-none" type="email" placeholder="Email">
            <p>
                <svg class="" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                    <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2zm-2 9.8V4.698l5.803 3.546zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 9.671V4.697l-5.803 3.546.338.208A4.5 4.5 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671"/>
                    <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791"/>
                  </svg>
            </p>
        </div>
        <button class="w-full py-2 bg-blue-500 text-white rounded-lg transition duration-300 hover:bg-blue-800">Subscribe</button>
    </div>

 </div>
 <div  id="modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm flex justify-center items-center hidden z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm text-center">
            <h2 class="text-xl font-bold">Are you sure?</h2>
            <p class="mt-2 text-gray-600">You want to log out.</p>
            <div class="mt-4 flex justify-center space-x-4">
                <button id="cancleLogout" class="px-4 py-2 bg-gray-400 text-white rounded">Cancel</button>
                <button id="AcceptLogout" class="px-4 py-2 bg-red-600 text-white rounded">OK</button>
            </div>
        </div>
    </div>
 
 <div class="w-[50px] h-[50px] bg-blue-600 md:bg-yellow-300 lg:bg-green-700">
 
 </div>
</div>
<script>
document.getElementById("search").addEventListener("keyup", async () => {
    let query = document.getElementById("search").value;
    let resultsDiv = document.getElementById("results");
    let resultContainer = document.getElementById('resultDiv');

    if (query.length > 0) {
        resultContainer.classList.remove('hidden'); // Show results

        try {
            let res = await fetch(`search.php?username=${query}`);
            let data = await res.json(); // Wait for JSON conversion

            resultsDiv.innerHTML = ""; // Clear previous results

            if (data.length === 0) {
                resultContainer.classList.add('hidden'); // Hide if no results
            } else {
                data.forEach(user => {
                    resultsDiv.innerHTML += `<div></div>`;
                    resultsDiv.innerHTML += `
                       <div class="flex items-center gap-5 ">
                            <div class="w-[60px] h-[60px] rounded-full overflow-hidden"><img class="w-full h-full object-cover" src="${user.profile_picture}" alt=""></div>
                            <p>${user.username}</p>
                            <input type="text" ${user.username} name="postId" class="hidden">
                        </div>
                    `
                });
            }

        } catch (error) {
            console.log("Error fetching search results:", error);
        }
    } else {
        resultContainer.classList.add('hidden'); // Hide if input is empty
    }
});


</script>
<script src="homePage.js?v=<?php echo time(); ?>"></script>

</body>
</html>
