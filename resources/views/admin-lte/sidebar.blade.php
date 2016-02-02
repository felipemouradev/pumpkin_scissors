<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        @if(Session::get('logado.0.image_perfil'))
        <img src="{{ asset(Session::get('logado.0.image_perfil')) }}" class="user-image img-circle" alt="User Image"/>
        @else
        <img src="{{ asset("/bower_components/admin-lte/dist/img/avatar04.png") }}" class="user-image img-circle" alt="User Image" />
        @endif
      </div>
      <div class="pull-left info">
        <p>{{ strtoupper(Session::get('logado.0.login'))}}</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- search form (Optional) -->
<!--     <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search..."/>
        <span class="input-group-btn">
          <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form> -->
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">MENU</li>
      <!-- Optionally, you can add icons to the links -->
        <?php $menu = Session::get('menu'); ?>

        <?php
        $count = 0;
        $data = array();
        foreach ($menu as $item) :
          $data[$count] = $item->nome;
          $count++;
        endforeach;
        $data = array_unique($data);
        sort($data);
        ?>

        <?php
          foreach ($data as $k) :
        ?>
      <li class="treeview">
        <a href="#"><span><?= $k; ?></span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
        <?php
          foreach ($menu as $key) :
            if ($k == $key->nome && $key->display==1) :
              $exp = explode("@",$key->rota);
              if ($exp[1] == "listar") $exp[1] = "";
            ?>
              <li><a href='/admin/<?=lcfirst($key->nome);?>/<?=$exp[1];?>'>{{$key->descricao}}</a></li>

        <?php endif; ?>
        <?php endforeach; ?>
        </ul>
        <?php endforeach; ?>
      </li>
    </ul>
      <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
