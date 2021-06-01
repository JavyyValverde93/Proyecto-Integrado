
<footer align="center" class="rounded" style="font-size: 1.2vw;background-color: #131A22; color:white">
    <div class="col-12 bg-dark text-white" style="font-size: 1.2vw; text-align: center;">
        Javier Valverde Rivera
        <div align="center" class="mb-2 mb-0">
            <a rel="license" target="black" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img
                alt="Creative Commons License" style="border-width:0;"
                src="https://i.creativecommons.org/l/by-nc-nd/4.0/80x15.png" /></a>
        </div>
            <br />This work is licensed under a <a target="black"
          rel="license" style="color: red;" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">Creative Commons
          Attribution-NonCommercial-NoDerivatives 4.0 International License</a>.
    </div>
    <div class="row mt-4">
        <div class="col-1"></div>
        <div class="col-3">
            <button type="button" data-toggle="modal" data-target="#modalSugerencias"> Contactar con nosotros<br>
            Sugerencias</button> 
        </div>
        <div class="col-3">

        </div>
        <div class="col-3">
            <a href="https://www.instagram.com/javyyvalverde93_" target="black"><i class="fab fa-instagram"></i> @javyyvalverde93_</a> <br>
            <a href="https://www.instagram.com/milesy" target="black"><i class="fab fa-instagram"></i> @milesy</a> <br>
            <a href="https://www.youtube.com/" target="black"><i class="fab fa-youtube"></i> @milesy</a>
        </div>
    </div>
    
</footer>

{{-- Modal --}}

<div class="modal fade show active" id="modalSugerencias" tabindex="-1" role="dialog"
aria-labelledby="modalContactoTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Contacto/Sugerencia</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body"
            style="background-image: url({{asset('storage/fondologo1.png')}}); background-repeat: repeat;">
            <form
                action="{{route('sugerencia')}}"
                method="POST" onsubmit="ocultarModal(this)">
                @csrf
                <img class="mx-auto" width="100px"
                    src="https://media.istockphoto.com/vectors/mail-and-email-icon-isolated-on-white-background-envelope-symbol-vector-id1129862448?k=6&m=1129862448&s=170667a&w=0&h=YvJZ_0J83teWOD1IeQm6T9-EFpK55lOUke3k2ZI1c04=">
                <div align="center">
                    <label id="envim" class="hidden">Enviando...</label>
                </div>
                <div class="form-group" align="center">
                    <label class="font-bold p-1 rounded" style="background-color: rgb(255, 255, 255)">¿Qué le
                        gustaria decirnos? :</label><br>
                    <textarea class="rounded" cols="30" autofocus rows="6"
                        name="mensaje">Hola buenas, soy @if(Auth::user()!=null) {{Auth::user()->name}} @else Usuario @endif y </textarea>
                    <p></p>

                    <button class="ui button blue" class="submit"><i class="fas fa-paper-plane"></i> Enviar
                        correo</button>
                </div>

            </form>
        </div>
    </div>
</div>
</div>

<script>
    function ocultarModal(form) {
            var btn = form.lastElementChild;
            btn.style.display = 'none';
            document.getElementById("envim").classList.remove('hidden');
        }
</script>