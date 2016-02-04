<?php $map = [
  "n"=>"Notícia",
  "i"=>"Informativo",
  "pb"=>"Publicidade Legal",
  "pp"=>"Proganda"
]; ?>
<div class='box-body'>
  <h3>Clipping Cliente {{ $data->cliente->nome }}</h3>
  <br><br>
  <?php
  switch($data->type) {
    case($data->type == "n") :
      echo "Noticias<br>";
       echo $data->assunto->nome."<br>";
        break;
    case($data->type == "i") :
      echo "Informativos";
        break;
    case($data->type == "pb") :
      echo "Publicidade";
        break;
    case($data->type == "pp") :
      echo "Propaganda";
        break;
  } ?>
  @if ($data->type=="n")
  <a href="{{ $host2 }}">{{
        date("d.m.y",strtotime($data->data_clipping))." - ".$data->jornal->nome." - " .$data->editoria->nome." - ".
        $data->fonte->nome." - ".$data->status->nome." - ".$data->centimetragem
      }}</a><br>
      @else
    <a href="{{ $host2 }}">{{
        date("d.m.y",strtotime($data->data_clipping))." - ".$data->jornal->nome." - " .$data->editoria->nome." - ".
        $map[$data->type]
    }}</a><br>
      @endif

</div>
