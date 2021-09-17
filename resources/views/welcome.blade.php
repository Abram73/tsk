<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Задача</title>
  </head>
  <body>

  <!-- Уведомление -->

@if(session()->has('success_msg'))

<div class="container">
<div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
Успешно!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div>

@endif

  <!-- Уведомление конец -->


  <!-- Все записи -->

  <br><div class="container">
      <div class="row">
          <div class="col-xl-2 col-md-2"><h1>Задача</h1></div>
          <div class="col-xl-6 col-md-2"></div>
<div class="col-xl-4 col-md-8">
<form class="form" action="{{ route('search')}}" method="GET">
      <div class="input-group mt-2">
  <input type="text" class="form-control" placeholder="Искать" aria-label="Recipient's username" aria-describedby="basic-addon2" name="search">
  <div class="input-group-append">
    <button class="btn btn-outline-danger" type="submit">Искать</button>
  </div>
</div>
    </form>
</div>
    </div>
</div>
<div class="container mt-5"><h4> Все записи </h4></div>
    <br>
    <table class="table text-center">
  <thead>
    <tr>
      <th scope="col">№</th>
      <th scope="col">Название</th>
      <th scope="col" colspan="2">Действие</th>
    </tr>
  </thead>
  <tbody>
      @if(isset($lists))
      @php $count=0; @endphp
      @foreach($lists as $list)
      @php $count++; @endphp
    <tr>
      <th scope="row">{{$count}}</th>
      <td>{{$list->title}}</td>
      <td style="text-align:right;">
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModalEdit{{$list->id}}">
      Редактировать
</button>
    </td>
      <td style="text-align:left;">
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalDelate{{$list->id}}">
      Удалить
</button>
    </td>
    </tr>

<!-- Modal edit -->
<div class="modal fade" id="exampleModalEdit{{$list->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Редактировать</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
<form class="form" action="{{ route('update',['id'=>$list->id ])}}" method="POST">
      @csrf
      <div class="modal-body">
      <input class="form-control" type="text" name="title" value="{{$list->title}}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary">Подтвердить</button>
      </div>
</form>
    </div>
  </div>
</div>
<!-- Modal edit end -->

<!-- Modal delate -->
<div class="modal fade" id="exampleModalDelate{{$list->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Удалить</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
<form class="form" action="{{ route('delate',['id'=>$list->id ])}}" method="POST">
      @csrf
      <div class="modal-body">
      Вы действительно хотите удалить {{$list->title}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary">Подтвердить</button>
      </div>
</form>
    </div>
  </div>
</div>
<!-- Modal delate end -->

    @endforeach
    @endif
  </tbody>
</table><br><br>

  <!-- Все записи конец -->

  <!-- Создание новых записей -->

<div class="container" style="text-align: right;">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
Создать
</button>
</div><br>

<!-- Modal create-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Создать</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
<form class="form" action="{{ route('create')}}" method="POST">
      @csrf
      <div class="modal-body">
      <input class="form-control" type="text" name="title" placeholder="Название">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary">Подтвердить</button>
      </div>
</form>
    </div>
  </div>
</div>

  <!-- Создание новых записей конец -->


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>
