@extends('layouts.main');


@section('title')
Walter Dream Big | Dashboard
@endsection

@section('mtitle')
Dashboard
@endsection


@section('mtitlesub')
Control panel
@endsection



@section('main_content')
<!-- Small boxes (Stat box) -->
<div class="row">
  
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>
          
          <?php
              $product = \App\Product::all();
          ?>

          {{ $product->count()}}
        </h3>

        <p>Total Prodcuts</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>
        <?php
              $branch = \App\Branch::all();
          ?>

          {{ $branch->count()}}
        </h3>

        <p>Branches</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
       <h3>
        <?php
              $user = \App\User::all();
          ?>

          {{ $user->count()}}
        </h3>

        <p>Total Users</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->


    @endsection



@section('script')

<script type="text/javascript">
  $('document').ready(function(){

    

  });

</script>


@endsection