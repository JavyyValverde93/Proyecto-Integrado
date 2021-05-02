@inject('modelFollower', 'App\Models\Follower')
<div>
    <div class="modal-body" id="seguidos">
        @foreach($seguidos as $item)
        <?php $item = $modelFollower->datos($item->id, 1); ?>
        <a href="{{route('ver_perfil', $item->id)}}">
            <div class="row">
                <div class="col-auto">
                    <img src="{{asset($item->foto)}}" class="rounded-circle" style="max-height: 40px">
                </div>
                <div class="col float-left">
                    {{$item->name}} <br>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
<div>
    <div class="modal-body" id="seguidores">
        @foreach($seguidores as $item)
        <?php $item = $modelFollower->datos($item->id, 2); ?>
        <a href="{{route('ver_perfil', $item->id)}}">
            <div class="row">
                <div class="col-auto">
                    <img src="{{asset($item->foto)}}" class="rounded-circle" style="max-height: 40px">
                </div>
                <div class="col float-left">
                    {{$item->name}} <br>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
<div>
    <div class="modal-body" id="favoritos">
        @foreach($guardados as $item)
        <a href="{{route('productos.show', $item->producto)}}">
            <div class="row">
                <div class="col-auto">
                    <img src="{{asset($item->producto->foto1)}}" width="40px">
                </div>
                <div class="col float-left">
                    {{$item->producto->nombre}}  <label class="font-italic">({{$item->producto->categoria}}) </label><br>
                    {{$item->producto->precio}} €
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>

