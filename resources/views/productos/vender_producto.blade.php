<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vender producto') }}
        </h2>
    </x-slot>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
  <link href="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.min.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/alertify.min.js"></script>
  <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js">
  </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="{{asset('js/vender_producto.js')}}"></script>
  <link rel="stylesheet" href="{{asset('css/vender_producto.css')}}">
    <div class="py-12" style="background: url({{asset('storage/fondologo1.png')}}) fixed">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <x-alert-message></x-alert-message>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <style>
                        small{
                            color: red;
                            font-style: italic;
                        }
                        
                        label:not(.no)::after{
                            content: " *";
                            color: red;
                        }
                    </style>
                    <x-alert-message></x-alert-message>
                    <form action="{{route('productos.store')}}" method="POST" enctype="multipart/form-data" onsubmit="disableButton(this)">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Nombre del producto:</label>
                                <input type="text" required autofocus class="form-control" value="{{old('nombre')}}" maxlength="20"  minlength="5" name="nombre" placeholder="Nombre del producto" oninput="validarNombre()"/>
                                <small>{{$errors->first('nombre')}}</small>
                                <input type="text" name="user_id" value="{{Auth::user()->id}}" class="hidden">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Categoría:</label><br>
                                <select name="categoria" class="form-control fa rounded" required>
                                    <option value="">Seleccione la categoría...</option>
                                    <option class="fa" value="Coches">&#xf1b9; Coches</option>
                                    <option class="fa" value="Motos">&#xf21c; Motos</option>
                                    <option class="fa" value="Motor y Accesorios">&#xf5e3; Motor y Accesorios</option>
                                    <option class="fa" value="Inmobiliaria">&#xf015; Inmobiliaria</option>
                                    <option class="fa" value="Tv, Audio y Foto">&#xf26c; Tv, Audio y Foto</option>
                                    <option class="fa" value="Móviles y Telefonía">&#xf10b; Móviles y Telefonía</option>
                                    <option class="fa" value="Informática y Electrónica">&#xf109; Informática y Electrónica</option>
                                    <option class="fa" value="Deporte y Ocio">&#xf45f; Deporte y Ocio</option>
                                    <option class="fa" value="Bicicletas">&#xf84a; Bicicletas</option>
                                    <option class="fa" value="Consolas y Videojuegos">&#xf11b; Consolas y Videojuegos</option>
                                    <option class="fa" value="Hogar y Jardín">&#xf801; Hogar y Jardín</option>
                                    <option class="fa" value="Cine, Libros y Música">&#xf008; Cine, Libros y Música</option>
                                    <option class="fa" value="Niños y Bebés">&#xf77c; Niños y Bebés</option>
                                    <option class="fa" value="Coleccionismo">&#xf70f; Coleccionismo</option>
                                    <option class="fa" value="Materiales de construcción">&#xf6e3; Materiales de construcción</option>
                                    <option class="fa" value="Industria y Agricultura">&#xf722; Industria y Agricultura</option>
                                    <option class="fa" value="Empleo">&#xf0b1; Empleo</option>
                                    <option class="fa" value="Servicios">&#xf554; Servicios</option>
                                    <option class="fa" value="Otros">&#xf069; Otros</option>
                                </select>
                                <small>{{$errors->first('categoria')}}</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Descripción:</label>
                            <textarea name="descripcion" class="form-control"
                                placeholder="Descripción del producto..." oninput="validarDescripcion()" required minlength="10" maxlength="400">{{old('descripcion')}}</textarea>
                                <small>{{$errors->first('descripcion')}}</small>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label>Precio:</label>
                                <input type="number" value="{{old('precio')}}" name="precio" min="0.05" step="0.01" required class="form-control"
                                    placeholder="0.00€" oninput="validarPrecio()">
                                    <small>{{$errors->first('precio')}}</small>
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
                                <div class="mx-auto">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="list-home" role="tabpanel"
                                            aria-labelledby="list-home-list">
                                            {{-- Foto 1 --}}
                                            <div class="file-upload">
                                                <button class="file-upload-btn" type="button"
                                                    onclick="$('.file-upload-input').trigger( 'click' )">Añadir o cambiar imágen</button>
                                                <div id="dfoto1">
                                                    <div class="image-upload-wrap">
                                                        <input class="file-upload-input tamanio_img" type='file' required name="foto1" onchange="readURL(this);"
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
                                        </div>
                                        <div class="tab-pane fade" id="list-profile" role="tabpanel"
                                            aria-labelledby="list-profile-list">
                                            {{-- Foto 2 --}}
                                            <div class="file-upload2">
                                                <button class="file-upload-btn2" type="button"
                                                    onclick="$('.file-upload-input2').trigger( 'click' )">Añadir o cambiar imágen</button>

                                                <div id="dfoto2">
                                                    <div class="image-upload-wrap2">
                                                        <input class="file-upload-input2 tamanio_img" name="foto2" type='file' onchange="readURL2(this);"
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
                                        </div>
                                        <div class="tab-pane fade" id="list-messages" role="tabpanel"
                                            aria-labelledby="list-messages-list">
                                            {{-- Foto 3 --}}
                                            <div class="file-upload3">
                                                <button class="file-upload-btn3" type="button"
                                                    onclick="$('.file-upload-input3').trigger( 'click' )">Añadir o cambiar imágen</button>

                                                <div id="dfoto3">
                                                    <div class="image-upload-wrap3">
                                                        <input class="file-upload-input3 tamanio_img" name="foto3" type='file' onchange="readURL3(this);"
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
                                        </div>
                                        <div class="tab-pane fade" id="list-settings" role="tabpanel"
                                            aria-labelledby="list-settings-list">
                                            {{-- Foto 4 --}}
                                            <div class="file-upload4">
                                                <button class="file-upload-btn4" type="button"
                                                    onclick="$('.file-upload-input4').trigger( 'click' )">Añadir o cambiar imágen</button>

                                                <div id="dfoto4">
                                                    <div class="image-upload-wrap4">
                                                        <input class="file-upload-input4 tamanio_img" name="foto4" type='file' onchange="readURL4(this);"
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
                                        </div>
                                        <div class="tab-pane fade" id="list-settings2" role="tabpanel"
                                            aria-labelledby="list-settings-list2">
                                            {{-- Foto 5 --}}
                                            <div class="file-upload4">
                                                <button class="file-upload-btn5" type="button"
                                                    onclick="$('.file-upload-input5').trigger( 'click' )">Añadir o cambiar imágen</button>

                                                <div id="dfoto5">
                                                    <div class="image-upload-wrap5">
                                                        <input class="file-upload-input5 tamanio_img" name="foto5" type='file' onchange="readURL5(this);"
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
                                </div>
                                <div align="center">
                                    <small>{{$errors->first('foto1')}}</small>
                                </div>
                                <div class="form-group col-md-7">
                                </div>
                            </div>
                        </div>
                            <button type="submit" class="btn btn-primary col-md-12 p-3" style="background-color: #06ff8f; border: 1px solid green" onclick="validarFormulario(event);"><b>Subir producto</b></button>
                    </form>
                </div>
            </div>


        </div>
    </div>
    </x-app-layout>
