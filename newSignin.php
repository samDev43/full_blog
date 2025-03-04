<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="newSignin.css">
</head>
<body>
   <form id="sighUp">
   <div class="container">
      <div class="inputContainer">
        <div class="logo">
            <img src="logos/Logo.png" alt="">
        </div>
        <div class="inputDiv2">
            <div class="inputDiv">
                <label for="">username or email</label>
                <input  id='userNPhone' type="text">
            </div>
            <div class="inputDiv">
                <label for="">password</label>
               <input id="password" type="password">
               <input id='id' type="hidden">
            </div>
            <div class="inputDiv">
                <button type="submit" class="inputDivButton">login</button>
            </div>
        </div >
        <div class="textDiv2">
            <p class="text1">Forget Password</p>
            <div class="bottomLine">
                <!-- <p class="line"></p> -->
                <p class="text1">OR</p>
                <!-- <p class="line"></p> -->
            </div>
            <div class="alrHavAccBtn">
                <button class="alrHavAccButton">Signup</button>
            </div>
            <div>
                <p class="text1">copyright 2025</p>
            </div>
        </div>
      </div>
      <div class="textContainer">
        <p >Let's create the furture together</p>
      </div>
    </div>
   </form>

   <script>
    //  document.getElementById('alrHavAccButton').addEventListener('click',()=>{
    //         locaton.href = 'http://localhost/blog_project/newSignUp.php';
    //     })
        document.getElementById('sighUp').addEventListener('submit', async (input) => {
            input.preventDefault(); // Fixed the typo
            let userNPhone = document.getElementById('userNPhone').value;
            let password = document.getElementById('password').value;
            let info = {
                userNPhone,
                password,
            };

            try {
                let res = await fetch('login.php', {
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(info),
                    method: 'POST',
                });
                
                let data = await res.json();
                console.log(data);            
                
                if (data.status == 'ok') {
                    location.href = 'http://localhost/blog_project/homePage.php';
                } else {
                    alert('error');
                }
            } catch (error) {
                alert('An error occurred');
                console.error(error);
            }
        });
    </script>
</body>
</html>