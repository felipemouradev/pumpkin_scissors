
<?php $map = [
  "n"=>"Notícia",
  "i"=>"Informativo",
  "pb"=>"Publicidade Legal",
  "pp"=>"Proganda"
]; ?>

<div class='box-body'>
  <h3>Clipping Cliente {{ $clipping[0]->cliente->nome }}</h3>
  <br><br>

  <?php
  // switch($data->type) {
  //   case($data->type == "n") :
  //     echo "Noticias<br>";
  //      echo $data->assunto->nome."<br>";
  //       break;
  //   case($data->type == "i") :
  //     echo "Informativos";
  //       break;
  //   case($data->type == "pb") :
  //     echo "Publicidade";
  //       break;
  //   case($data->type == "pp") :
  //     echo "Propaganda";
  //       break;
  // } ?>
  <?php
  $count = 0;
  foreach ($clipping as $data):
  ?>
    @if ($data->type=="n")
      @if($count == 0 )  <p>Noticias</p> @endif
      <a href="{{ $host.$data->file_image }}">{{
            date("d.m.y",strtotime($data->data_clipping))." - ".$data->jornal->nome." - " .$data->editoria->nome." - ".
            $data->fonte->nome." - ".$data->status->nome." - ".$data->centimetragem
      }}</a><br>
    @else
      <a href="{{ $host.$data->file_image }}">{{
            date("d.m.y",strtotime($data->data_clipping))." - ".$data->jornal->nome." - " .$data->editoria->nome." - ".
            $map[$data->type]
      }}</a><br>
    @endif

  <?php
  $count++;
  endforeach;
  ?>

</div>
