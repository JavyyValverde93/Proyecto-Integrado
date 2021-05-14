<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.2.1/font-awesome-animation.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"></script>

@if($texto=Session::get('mensaje'))
<div class="m-5"></div>
<div class="alert alert-success" role="alert">
    <i class="start-icon far fa-check-circle faa-tada animated"></i>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Mensaje:</strong> {{$texto}}
  </div>

@endif
@if($texto=Session::get('error'))
<div class="m-5"></div>

<div class="alert alert-danger" role="alert">
    <i class="start-icon far fa-times-circle faa-pulse animated"></i>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Error:</strong> {{$texto}}
  </div>




@endif
