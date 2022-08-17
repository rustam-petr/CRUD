<?php
require_once "config/config.php";

$cars=mysqli_query($connect,"SELECT * FROM `cars`");
$cars=mysqli_fetch_all($cars);
// echo "<pre>";
// print_r($cars);
// echo "</pre>"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover mt-2">
                <thead class="thead-dark">
                <th>id</th>
                <th>Модель</th>
                <th>Цвет</th>
                <th>Цена</th>
                <th>Действия</th>
                </thead>
                <tbody>
                <?php foreach ($cars as $values){ ?>
                    <tr>
                        <td><?= $values[0]?></td>
                        <td><?= $values[1]?></td>
                        <td><?= $values[2]?></td>
                        <td><?= $values[3]?></td>

                        <td><a href="?id=<?= $values[0]?>" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<?= $values[0]?>">Редактировать</a>
                            <a href="?id=<?= $values[0]?>" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $values[0]?>">Удалить</a></td>
                    </tr>

                    <!--Окно на редактирование данных-->
                    <div class="modal fade" id="edit<?= $values[0]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Изменить запись</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="vendor/update.php" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" value="<?=$cars['model']?>" >
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="last_name" value="<?= $value->last_name ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="email" value="<?= $value->email ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="password" value="<?= $value->password ?>" >
                                        </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                    <button type="submit" name="edit" class="btn btn-primary">Сохранить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Окно на удаление данных-->
                    <div class="modal fade" id="delete<?=$value->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Вы точно хотите удалить запись №<?=$value->id?>  </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-footer">
                                    <form action="?id=<?= $value->id ?>" method="post">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                        <button type="submit" name="delete" class="btn btn-primary">Удалить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </tbody>
            </table>
            <button class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#create">Добавить</button>
        </div>
    </div>
</div>
<!--    <table>-->
<!--        <tr>-->
<!--            <th>id</th>-->
<!--            <th>model</th>-->
<!--            <th>color</th>-->
<!--            <th>price</th>-->
<!--            <th>обновить</th>-->
<!--            <th>удалить</th>-->
<!--        </tr>-->
<!--        --><?php
//        foreach ($cars as $values){ ?>
<!--            <tr>-->
<!--            <td>--><?//= $values[0]?><!--</td>-->
<!--            <td>--><?//= $values[1]?><!--</td>-->
<!--            <td>--><?//= $values[2]?><!--</td>-->
<!--            <td>--><?//= $values[3]?><!--</td>-->
<!--            <td><a href="update.php?id=--><?//= $values[0]?><!--">Обновить</a></td>-->
<!--            <td><a href="vendor/delete.php?id=--><?//= $values[0]?><!--">Удалить</a></td>-->
<!--        </tr>-->
<!--        --><?php
//        }
//        ?>
<!--       -->
<!--    </table>-->
<!--    <h2>Добавить новый товар </h2>-->
<!--    <form action="vendor/create.php" method="post">-->
<!--        <p>Введите марку машины</p>-->
<!--        <input type="text" name="model">-->
<!--        <p>Введите цвет машины</p>-->
<!--        <input type="text" name="color">-->
<!--        <p>Введите цену машины</p>-->
<!--        <input type="text" name="price">-->
<!--        <button type="submit" >Добавить</button>-->
<!--    </form>-->

<!-- Окно на добавление данных -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добавить запись</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <p>Введите модель</p>
                        <input type="text" class="form-control" name="model" value="" />
                    </div>
                    <div class="form-group">
                        <p>Введите цвет</p>
                        <input type="text" class="form-control" name="text" value=""/>
                    </div>
                    <div class="form-group">
                        <p>Введите цену</p>
                        <input type="date" class="form-control" name="price" value=""/>
                    </div>
                                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <button type="submit" name="submit" class="btn btn-primary">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
