<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Edit</h1>
    <form action="<?php  echo _FOLDER_ROOT_ .'/sua-doi/'?><?php echo $value['id']?>" method="post">
        <div>
        <label for="">Ten san pham</label>
        <input type="text" name="tenSP" value="<?php echo $value['ten_san_pham'] ?>">
        </div>
        <label for="">Gia san pham</label>
        <input type="money_format" name="giaSP" value="<?php echo $value['gia_san_pham'] ?>">
        </div>
        <button>gui</button>
    </form>
</body>

</html>