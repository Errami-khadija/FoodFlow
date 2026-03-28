<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Restaurant Approved</title>
</head>
<body>

<h2>Hi {{ $restaurant->name }},</h2>

<p>🎉 Congratulations! Your restaurant has been approved on FoodFlow.</p>

<p>You can now log in and start managing your restaurant.</p>

<a href="{{ url('/restaurant/dashboard') }}"
style="
display:inline-block;
padding:10px 20px;
background-color:#10b981;
color:white;
text-decoration:none;
border-radius:8px;
margin-top:10px;
">
Login to your account
</a>

<p style="margin-top:20px;">
If the button doesn’t work, use this link:<br>
{{ url('/restaurant/dashboard') }}
</p>

<p>Thanks,<br>FoodFlow Team</p>

</body>
</html>