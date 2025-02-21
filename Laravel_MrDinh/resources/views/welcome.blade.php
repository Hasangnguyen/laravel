<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Form</title>
  <link rel="stylesheet" href="../assets\css/style.css">
</head>
<body>
  <div class="container">
    <form id="calculation-form" action="sumAB" method="post">
    @csrf
      <label for="inputA">Enter So A</label>
      <input type="text" id="inputA" name="inputA" pattern="\d*" required placeholder="Enter a number">
      
      <label for="inputB">Enter So B</label>
      <input type="text" id="inputB" name="inputB" pattern="\d*" required placeholder="Enter a number">

      <button type="submit">Submit</button>
    </form>
      <div class="total"> 
        This total: @isset($sum) {{$sum}
      } @endisset
      </div>
</div>
</body>
</html>