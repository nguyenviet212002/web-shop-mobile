<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>tim kiem</h1>
    <div class="header">
        <table border="1">
            <thead>
                <tr>
                    <th>
                        <h4>ma san pham</h4>
                    </th>
                    <th>
                        <h4>ten san pham</h4>
                    </th>
                    <th>
                        <h4>gia san pham</h4>
                    </th>
                    <th>
                        <h4>sua</h4>
                    </th>
                    <th>
                        <h4>xoa</h4>
                    </th>
                </tr>
            </thead>
            <tbody>
                <form action="<?php  echo _FOLDER_ROOT_ .'/tim-kiem/'?>" method="post">
                    <input type="text" name="searchSP">
                    <button>search</button>
                </form>
                <?php
                foreach ($product_list as $data) {
                ?>
                    <tr>
                        <td>
                            <p> <?php echo ($data['id'])?></p>
                        </td>
                        <td>
                            <p> <?php echo ($data['ten_san_pham'])?></p>
                        </td>
                        <td>
                            <p> <?php echo ($data['gia_san_pham'])?></p>
                        </td>
                        <td>
                            <a href="<?php  echo _FOLDER_ROOT_ .'/san-pham/'?><?php echo $data['id']?>">Edit</a>
                        </td>
                        <td><a href="<?php  echo _FOLDER_ROOT_ .'/xoa-san-pham/'?><?php echo $data['id']?>">xoa</a></td>
                    </tr>
                <?php  }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>