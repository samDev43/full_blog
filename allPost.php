<?php
include('controller/AultUserControler.php');
$myPost = new action();
if(!isset($_SESSION['user']['id'])){
   echo 'you have to log in';
   exit;
}
$personID = $_SESSION['user']['id'];
$myPost->displayAllPost();
// echo $personID;
// print_r ($myPost->displayMyPost());
$user = $myPost->displayAllPost();
$con = $myPost->con();


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
    <div class="mt-[20]">
    <div class=" w-[80%] gap-10 bg--600  mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
      
       <?php foreach($user as $post): ?>
        <?php
         $post['id'];
           $select = 'SELECT * FROM personPost WHERE id = ?';
           $stmt = $con->prepare($select);
           $stmt->bind_param('s', $post['id']);
           $stmt->execute();

           $result = $stmt->get_result();
           $names = $result->fetch_assoc();

            $names['user_id'];
            $select2 = 'SELECT * FROM project WHERE id = ?';
           $stmt2 = $con->prepare($select2);
           $stmt2->bind_param('s', $names['user_id']);
           $stmt2->execute();

           $result = $stmt2->get_result();
           $names = $result->fetch_assoc();
        ?>
        <div class="singlePost flex flex-col gap-5 p-5 h-[] rounded border border-gray-200 m-2">
            <div><p class="text-blue-500 font-bold "><?php echo $post['title'] ?></p></div>
            <div class="h-[20vh]"><img class="rounded h-full w-full object-cover" src="DBimages/<?php echo $post['images']?>"   alt=""></div>
            <div class=" flex justify-start gap-10 items-center w-full">
                <div class="flex justify-start items-center gap-5">
                    <div class=" rounded-full h-[50px] w-[50px] overflow-hidden"><img class=" h-full w-full" src="<?php echo $names['profile_picture'] ?>" alt=""></div>
                <div><p class="text-lg"><?php echo $names['username'] ?></p></div>
                </div>
                <div><p class="text-lg"><?php  ?></p></div>
            </div>
             <input class="hidden" name="postId" value="<?php echo $post['id'] ?>" type="text">
        </div>
       <?php endforeach;?>
    </div>
    </div>
<script src="homePage.js"></script>
</body>
</html>