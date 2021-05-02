<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modificar producto') }}
        </h2>
    </x-slot>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
  <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js">
  </script>
  <script src="{{asset('js/vender_producto.js')}}"></script>
  <link rel="stylesheet" href="{{asset('css/vender_producto.css')}}">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <x-alert-message></x-alert-message>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <style>
                        small{
                            color: red;
                            font-style: italic;
                        }
                    </style>
                    <script>
                        var verde = "solid 2px lime";
                        var rojo = "solid 2px red";

                        function validarNombre(){
                            var name = document.getElementsByName('nombre')[0];
                            if(name.value.length<4){
                                name.style.border = rojo;
                                name.nextElementSibling.innerHTML = "El nombre del producto no es válido";
                            }else{
                                name.style.border = verde;
                                name.nextElementSibling.innerHTML = "";
                            }
                        }

                        function validarPrecio(){
                            var name = document.getElementsByName('precio')[0];
                            if(name.value<0.01){
                                name.style.border = rojo;
                                name.nextElementSibling.innerHTML = "Este campo es obligatorio";
                            }else{
                                name.style.border = verde;
                                name.nextElementSibling.innerHTML = "";
                            }
                        }

                        function validarDescripcion(){
                            var name = document.getElementsByName('descripcion')[0];
                            if(name.value.length<10){
                                name.style.border = rojo;
                                name.nextElementSibling.innerHTML = "Este campo debe contener más caracteres";
                            }else{
                                name.style.border = verde;
                                name.nextElementSibling.innerHTML = "";
                            }
                        }

                    </script>
                    <x-alert-message></x-alert-message>
                    <form action="{{route('productos.update', $producto)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Nombre del producto:</label>
                                <input type="text"  value="{{$producto->nombre}}" class="form-control" required minlength="5" name="nombre" placeholder="Nombre del producto" oninput="validarNombre()"/>
                                <small></small>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Categoría:</label><br>
                                <select name="categoria" class="form-control fa rounded" required>
                                    <option value="">Seleccione la categoría...</option>
                                    <option class="fa" value="Coches" @if($producto->categoria=="Coches") selected @endif>&#xf1b9; Coches</option>
                                    <option class="fa" value="Motos" @if($producto->categoria=="Motos") selected @endif>&#xf21c; Motos</option>
                                    <option class="fa" value="Motor y Accesorios" @if($producto->categoria=="Motor y Accesorios") selected @endif>&#xf5e3; Motor y Accesorios</option>
                                    <option class="fa" value="Inmobiliaria" @if($producto->categoria=="Inmobiliaria") selected @endif>&#xf015; Inmobiliaria</option>
                                    <option class="fa" value="Tv, Audio y Foto" @if($producto->categoria=="Tv, Audio y Foto") selected @endif>&#xf26c; Tv, Audio y Foto</option>
                                    <option class="fa" value="Móviles y Telefonía" @if($producto->categoria=="Móviles y Telefonía") selected @endif>&#xf10b; Móviles y Telefonía</option>
                                    <option class="fa" value="Informática y Electrónica" @if($producto->categoria=="Informática y Electrónica") selected @endif>&#xf109; Informática y Electrónica</option>
                                    <option class="fa" value="Deporte y Ocio" @if($producto->categoria=="Deporte y Ocio") selected @endif>&#xf45f; Deporte y Ocio</option>
                                    <option class="fa" value="Bicicletas" @if($producto->categoria=="Bicicletas") selected @endif>&#xf84a; Bicicletas</option>
                                    <option class="fa" value="Consolas y Videojuegos" @if($producto->categoria=="Consolas y Videojuegos") selected @endif>&#xf11b; Consolas y Videojuegos</option>
                                    <option class="fa" value="Hogar y Jardín" @if($producto->categoria=="Hogar y Jardín") selected @endif>&#xf801; Hogar y Jardín</option>
                                    <option class="fa" value="Cine, Libros y Música" @if($producto->categoria=="Cine, Libros y Música") selected @endif>&#xf008; Cine, Libros y Música</option>
                                    <option class="fa" value="Niños y Bebés" @if($producto->categoria=="Niños y Bebés") selected @endif>&#xf77c; Niños y Bebés</option>
                                    <option class="fa" value="Coleccionismo" @if($producto->categoria=="Coleccionismo") selected @endif>&#xf70f; Coleccionismo</option>
                                    <option class="fa" value="Materiales de construcción" @if($producto->categoria=="Materiales de construcción") selected @endif>&#xf6e3; Materiales de construcción</option>
                                    <option class="fa" value="Industria y Agricultura" @if($producto->categoria=="Industria y Agricultura") selected @endif>&#xf722; Industria y Agricultura</option>
                                    <option class="fa" value="Empleo" @if($producto->categoria=="Empleo") selected @endif>&#xf0b1; Empleo</option>
                                    <option class="fa" value="Servicios" @if($producto->categoria=="Servicios") selected @endif>&#xf554; Servicios</option>
                                    <option class="fa" value="Otros" @if($producto->categoria=="Otros") selected @endif>&#xf069; Otros</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Descripción:</label>
                            <textarea name="descripcion" class="form-control"
                                placeholder="Descripción del producto..." oninput="validarDescripcion()" required minlength="10">{{$producto->descripcion}}</textarea>
                                <small></small>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label>Precio:</label>
                                <input type="number" name="precio" min="0.01" value="{{$producto->precio}}" step="0.01" required class="form-control"
                                    placeholder="0.00€" oninput="validarPrecio()">
                                    <small></small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12">
                                <label>Imágenes del producto:</label>
                                <div class="list-group" id="list-tab" role="tablist">
                                    <a class="list-group-item list-group-item-action active" id="list-home-list"
                                        data-toggle="list" href="#list-home" role="tab" aria-controls="home">Primera imágen </a>
                                    <a class="list-group-item list-group-item-action" id="list-profile-list"
                                        data-toggle="list" href="#list-profile" role="tab"
                                        aria-controls="profile">Segunda imágen</a>
                                    <a class="list-group-item list-group-item-action" id="list-messages-list"
                                        data-toggle="list" href="#list-messages" role="tab"
                                        aria-controls="messages">Tercera imágen</a>
                                    <a class="list-group-item list-group-item-action" id="list-settings-list"
                                        data-toggle="list" href="#list-settings" role="tab"
                                        aria-controls="settings">Cuarta imágen</a>
                                        <a class="list-group-item list-group-item-action" id="list-settings-list2"
                                        data-toggle="list" href="#list-settings2" role="tab"
                                        aria-controls="settings">Quinta imágen</a>
                                </div>
                                <script>
                                    window.onload = o;
                                    function o(){
                                        document.getElementById('nav-tabContent').scrollLeft += $(window).width()/2-44;

                                    }
                                </script>
                                <div class="mx-auto col-10">
                                    <div class="tab-content" id="nav-tabContent" style="overflow-x:scroll; margin-right:-50px; margin-left:-50px">
                                        <div class="tab-pane fade show active" id="list-home" role="tabpanel"
                                            aria-labelledby="list-home-list">
                                            {{-- Foto 1 --}}
                                            <div class="file-upload">
                                                @if($producto->foto1!=null)
                                                <img src="{{asset($producto->foto1)}}" class="mx-auto my-2" style="max-width: 100px">
                                                @endif
                                                <button class="file-upload-btn" type="button"
                                                    onclick="$('.file-upload-input').trigger( 'click' )">Añadir o cambiar imágen</button>

                                                <div class="image-upload-wrap">
                                                    <input class="file-upload-input" type='file' name="foto1" onchange="readURL(this);"
                                                        accept="image/*" />
                                                    <div class="drag-text">
                                                        <h3>Arrastra y suelta una imágen o seleccionala</h3>
                                                    </div>
                                                </div>
                                                <div class="file-upload-content">
                                                    <img class="file-upload-image" name="foto1" src="#" alt="your image" />
                                                    <div class="image-title-wrap">
                                                        <span class="image-title">Imágen</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="list-profile" role="tabpanel"
                                            aria-labelledby="list-profile-list">
                                            {{-- Foto 2 --}}
                                            <div class="file-upload2">
                                                @if($producto->foto2!=null)
                                                <img src="{{asset($producto->foto2)}}" class="mx-auto my-2" style="max-width: 100px">
                                                @endif
                                                <button class="file-upload-btn2" type="button"
                                                    onclick="$('.file-upload-input2').trigger( 'click' )">Añadir o cambiar imágen</button>

                                                <div class="image-upload-wrap2">
                                                    <input class="file-upload-input2" name="foto2" type='file' onchange="readURL2(this);"
                                                        accept="image/*" />
                                                    <div class="drag-text2">
                                                        <h3>Arrastra y suelta una imágen o seleccionala</h3>
                                                    </div>
                                                </div>
                                                <div class="file-upload-content2">
                                                    <img class="file-upload-image2" src="#" alt="your image" />
                                                    <span class="image-title2">Imágen</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="list-messages" role="tabpanel"
                                            aria-labelledby="list-messages-list">
                                            {{-- Foto 3 --}}
                                            <div class="file-upload3">
                                                @if($producto->foto3!=null)
                                                <img src="{{asset($producto->foto3)}}" class="mx-auto my-2" style="max-width: 100px">
                                                @endif
                                                <button class="file-upload-btn3" type="button"
                                                    onclick="$('.file-upload-input3').trigger( 'click' )">Añadir o cambiar imágen</button>

                                                <div class="image-upload-wrap3">
                                                    <input class="file-upload-input3" name="foto3" type='file' onchange="readURL3(this);"
                                                        accept="image/*" />
                                                    <div class="drag-text2">
                                                        <h3>Arrastra y suelta una imágen o seleccionala</h3>
                                                    </div>
                                                </div>
                                                <div class="file-upload-content3">
                                                    <img class="file-upload-image3" src="#" alt="your image" />
                                                    <span class="image-title3">Imágen</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="list-settings" role="tabpanel"
                                            aria-labelledby="list-settings-list">
                                            {{-- Foto 4 --}}
                                            <div class="file-upload4">
                                                @if($producto->foto4!=null)
                                                <img src="{{asset($producto->foto4)}}" class="mx-auto my-2" style="max-width: 100px">
                                                @endif
                                                <button class="file-upload-btn4" type="button"
                                                    onclick="$('.file-upload-input4').trigger( 'click' )">Añadir o cambiar imágen</button>

                                                <div class="image-upload-wrap4">
                                                    <input class="file-upload-input4" name="foto4" type='file' onchange="readURL4(this);"
                                                        accept="image/*" />
                                                    <div class="drag-text4">
                                                        <h3>Arrastra y suelta una imágen o seleccionala</h3>
                                                    </div>
                                                </div>
                                                <div class="file-upload-content4">
                                                    <img class="file-upload-image4" src="#" alt="your image" />
                                                    <span class="image-title4">Imágen</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="list-settings2" role="tabpanel"
                                            aria-labelledby="list-settings-list2">
                                            {{-- Foto 5 --}}
                                            <div class="file-upload4">
                                                @if($producto->foto5!=null)
                                                <img src="{{asset($producto->foto5)}}" class="mx-auto my-2" style="max-width: 100px">
                                                @endif
                                                <button class="file-upload-btn5" type="button"
                                                    onclick="$('.file-upload-input5').trigger( 'click' )">Añadir o cambiar imágen</button>

                                                <div class="image-upload-wrap5">
                                                    <input class="file-upload-input5" name="foto5" type='file' onchange="readURL5(this);"
                                                        accept="image/*" />
                                                    <div class="drag-text5">
                                                        <h3>Arrastra y suelta una imágen o seleccionala</h3>
                                                    </div>
                                                </div>
                                                <div class="file-upload-content5">
                                                    <img class="file-upload-image5" src="#" alt="your image" />
                                                    <span class="image-title5">Imágen</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-7">
                                </div>
                            </div>
                        </div>
                            <button type="submit" class="btn btn-primary col-md-12 p-3" style="background-color: #06ff8f; border: 1px solid green"><b>Actualizar producto</b></button>
                    </form>
                    <div class="m-5">

                    </div>
                    <div class="col-lg-4 col-xs-7 mx-auto">

            <form action="{{route('productos.destroy', $producto)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Está seguro de que desea eliminar el producto?')" class="btn btn-danger btn-block p-3 rounded-pill" style="background-color: #ff0000; border:2px solid #cd0a20">Eliminar producto</button>
            </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
    </x-app-layout>
