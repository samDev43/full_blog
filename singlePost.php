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

</head>
<body>
 <div class="h- bg-gray-400 ">
 <div class="w-[80%] mx-auto ">
    <div>
      <p class="text-center font-bold"> <?php echo $post['title'] ?></p>
    </div>
    <div class="h-[70vh] ">
     <div class="w-full h-full rounded-lg overflow-hidden shadow-lg"> <img class="w-full h-full" src="DBimages/<?php echo $post['images']?>" alt=""></div>
    </div>
    <div>
      <p class="p-5"><?php echo $post['content'] ?></p>
    </div>

  </div>
 </div>
</body>
</html>