<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex justify-center h-screen items-center">
        <div class="shadow-lg w-1/4 p-5">
            <form id="sighUp">
                <p class="my-2 text-center font-bold">Login</p>
                <label for="">User Name or Phone Number</label>
                <input id='userNPhone' class="w-full py-2 px-2 border border-black my-2 rounded text-lg" type="text" >
                <label for="">Password</label>
                <input id="password" type="password" class="w-full py-2 px-2 border border-black my-2 rounded" >
                <input id='id' type="hidden">
                <button type="submit" class="w-full py-2 bg-blue-400 rounded-lg text-white">Login</button>
            </form>
        </div>
    </div>

    <script>
       
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
