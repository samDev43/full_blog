<?php 
include('controller/AultUserControler.php');
$disSinglePost = new action();
$post= $disSinglePost->disSinglePost();
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
  <nav class="p-5 fixed left-0 right-0 top-0 bg-white shadow-2xl z-20 w-full">
    <div class=" flex items-center justify-between w-[60%] mx-auto">
      <div id="toHomePage"><i class="bi bi-house-add text-2xl font-bold text-blue-400 cursor-pointer"></i></div>
      <?php if($_SESSION['user']['id'] ==  $post['user_id']): ?>
        <div><i id="deletPost" class="bi bi-trash text-2xl font-bold text-red-400 cursor-pointer"></i></div>
        <?php else: ?>
          <?php 
          ?>      
        <?php endif ?>
    </div>
  </nav>
  
 <div class="h- mt-[100px] ">
 <div class="w-[90%] md:w-[8o%] lg:w-[60%] mx-auto px-5 shadow-xl rounded-lg">
    <div>
      <p class="text-start text-2xl text-blue-600  font-bold w-[30%] py-2 "> <?php echo $post['title'] ?></p>
    </div>
    <div class="h-[70vh] ">
     <div class="w-full h-full rounded-lg overflow-hidden shadow-lg"> <img class="w-full h-full object-cover" src="DBimages/<?php echo $post['images']?>" alt=""></div>
    </div>
    <div>
      <input class="hidden" type="text" value="<?php echo $post['id'] ?>">
      <p class="p-5 text-gray-600"><?php echo $post['content'] ?></p>
    </div>

  </div>
 </div>
 <script src="singlePost.js"></script>
</body>
</html>