<!DOCTYPE html>
<html>
<head>
    <title>Signup Form</title>
    <link rel="stylesheet" href="../assets\css/form.css">
    <style>
    </style>
</head>
<body>
    <form action="" method="post">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label>Age</label>
            <input type="text" class="form-control" name="age">
        </div>
        <div class="form-group">
            <label>Date</label>
            <input type="text" class="form-control" name="date">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" name="phone">
        </div>
        <div class="form-group">
            <label>Web</label>
            <input type="url" class="form-control" name="web">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="address">
        </div>
        
        @include('block.error')
        
        <button type="submit" class="btn btn-primary" style="width: 200px;">OK</button>
        <div class="display-infor"></div>
    </form>

    @if(isset($user))
        <h2>Thông tin người dùng:</h2>
        <p>Name: {{ $user['name'] }}</p>
        <p>Age: {{ $user['age'] }}</p>
        <p>Date: {{ $user['date'] }}</p>
        <p>Phone: {{ $user['phone'] }}</p>
        <p>Website: {{ $user['web'] }}</p>
        <p>Address: {{ $user['address'] }}</p>
    @endif
</body>
</html>
