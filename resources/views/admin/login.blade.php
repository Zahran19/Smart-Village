<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Login</title>
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; font-family: sans-serif;">

    <div style="border: 1px solid #000; padding: 20px; width: 300px;">
        <h3 style="text-align: center; margin-top: 0;">Login</h3>

        <!-- Sesuaikan action route-nya dengan route login lu nanti -->
        <form action="/admin/login" method="POST">
            @csrf
            
            <div style="margin-bottom: 15px;">
                <label for="email" style="display: block; margin-bottom: 5px;">Email</label>
                <input type="email" id="email" name="email" required style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #000;">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="password" style="display: block; margin-bottom: 5px;">Password</label>
                <input type="password" id="password" name="password" required style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #000;">
            </div>

            <button type="submit" style="width: 100%; padding: 10px; border: 1px solid #000; background-color: transparent; cursor: pointer;">
                Masuk
            </button>
        </form>
    </div>

</body>
</html>