<?php
include('controller/AultUserControler.php');
$myPost = new action();
if(!isset($_SESSION['user']['id'])){
   echo 'you have to log in';
   exit;
}
$personID = $_SESSION['user']['id'];
$myPost->displayMyPost();
echo $personID;
// print_r ($myPost->displayMyPost());
$user = $myPost->displayMyPost();



$input = file_get_contents('php://input');
$data = json_decode($input, true);
if(isset($data['id'])){
    $_SESSION['eachId'] = $data['id'];
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
   <div class="h-full bg-">
   <div class="mt-[20]">
    <div class="w-[80%] gap-10 bg--600  mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 ">
        <?php foreach($user as $post): ?>
       <div class="singlePost cursor-pointer bg-white shadow-lg gap-5 flex flex-col p-2 items-center ">
            <p class="tect-center font-bold text-lg"><?php echo $post['title'] ?></p>
            <div class="w-full h-[20vh] rounded-lg overflow-hidden"><img class="w-full h-full" src="DBimages/<?php echo $post['images']?>" alt=""></div>
            <?php $_SESSION['postId'] = $post['id'] ?>
            <input class="hidden" name="postId" value="<?php echo $_SESSION['postId'] ?>" type="text">
            <div class=" flex justify-start gap-10 items-center w-full">
                <div class="flex justify-start items-center gap-5">
                    <div class=" rounded-full h-[50px] w-[50px] overflow-hidden"><img class=" h-full w-full" src="image/image 2.png" alt=""></div>
                <div><p class="text-lg">Name</p></div>
                </div>
                <div><p class="text-lg">date</p></div>
            </div>
       </div>
       <?php endforeach;?>
    </div>
    </div>
   </div>
<script src="homePage.js"></script>
</body>
</html>