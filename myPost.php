<?php
include('controller/AultUserControler.php');
$myPost = new action();
if(!isset($_SESSION['user']['id'])){
   echo 'you have to log in';
   exit;
}
$personID = $_SESSION['user']['id'];
// $myPost->displayMyPost();
echo $personID;
// print_r ($myPost->displayMyPost());
$user = $myPost->displayMyPost();



$input = file_get_contents('php://input');
$data = json_decode($input, true);
if(isset($data['id'])){
    $_SESSION['eachId'] = $data['id'];
}
?>
<?php
// if(isset('submitId')){
//     // $user->deletePost($postId);

// }
if (isset($_POST['submitId'])) {
    $postId = $_POST['postId'];

    // Make sure $postId is valid before proceeding
    if (!empty($postId)) {
        // $user->deletePost($postId);
        echo "Post deleted successfully.";
    } else {
        echo "Invalid Post ID.";
    }
}
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
<nav class="p-5 fixed left-0 right-0 top-0 bg-gray-600 shadow-2xl z-20 w-full">
    <div class=" flex items-center justify-between w-[80%] mx-auto">
      <div id="toHomePage"><i class="bi bi-house-add text-2xl font-bold text-blue-400 cursor-pointer"></i></div>
     <!-- <div><i id="deletPost" class="bi bi-trash text-2xl font-bold text-red-400 cursor-pointer"></i></div> -->
    </div>
  </nav>
<div id="overlay" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden z-20"></div>

            <?php 
                $personID = $_SESSION['user']['id'];
                $con = $myPost->con();
                  $select = 'SELECT * FROM project WHERE id = ?';
                $stmt =  $con->prepare($select);
                $stmt->bind_param('s', $personID);
                $stmt->execute();
            
                $result = $stmt->get_result();
                $username = $result->fetch_assoc();
            ?>
   <div class="h-full mt-[50px]">
   <div class="mt-[20]">
    <div class="w-[80%] gap-10 bg--600  mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 ">
        <?php foreach($user as $post): ?>
       <div class="singlePost cursor-pointer bg-white shadow-lg gap-5 flex flex-col p-2 items-center ">
            <div class="flex justify-between w-full items-center">
            <p class="text-start font-bold text-lg w-full"><?php echo $post['title'] ?></p>
            <p><i id="deletPost" name="submitId" class="bi bi-three-dots-vertical "></i></p>
            <?php $_SESSION['postId'] = $post['id'] ?>
            <input class="hidden" name="postId" value="<?php echo $_SESSION['postId'] ?>" type="text">
            </div>
            <div class="w-full h-[20vh] rounded-lg overflow-hidden"><img class=" w-full h-full object-cover" src="DBimages/<?php echo $post['images']?>" alt=""></div>
            <div class=" flex justify-start gap-10 items-center w-full">
                <div class="flex justify-start items-center gap-5">
                    <div class=" rounded-full h-[50px] w-[50px] overflow-hidden"><img class=" h-full w-full" src="<?php echo $username['profile_picture'] ?>" alt=""></div>
                <div><p class="text-lg"> <?php echo $username['username'] ?></p></div>
                </div>
                <div><p class="text-lg"></p></div>
            </div>
       </div>
       <?php endforeach;?>
    </div>
    </div>
   </div>
    <script>
        document.getElementById('deletPost').addEventListener('click', function() {
            document.getElementById('postIdInput').value = "<?php echo $_SESSION['postId']; ?>";
            document.getElementById('deletePostForm').submit();
        });
</script>
<script src="homePage.js"></script>
</body>
</html>