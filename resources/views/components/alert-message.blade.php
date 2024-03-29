<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/velocity/1.1.0/velocity.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<link href="{{asset('css/alert-message.css')}}" rel="stylesheet">

<div class="n-wrapper mt-5" id="wrapper"></div>
<button style="visibility: hidden" class="simulate" disabled="disabled">Loading...</button>

@if($texto=Session::get('mensaje'))
<script>
    var Notification = function (data) {
        this.message = "<b style='color:#2ECBAA'>Milesy: </b><?php echo $texto ?>";
        this.picture = "<?php echo asset('storage/adminlogo.jpg'); ?>";
        this.elem;
        this.duration = 5000;
        this.create();
        this.animOptions = {
            duration: 400,
            easing: 'easeInOut'
        }
        this.show = function () {
            $(this.elem).velocity({
                opacity: [1, 0],
                marginTop: [0, 20]
            }, this.animOptions);
            this.hide();
        }
        this.hide = function () {
            var opts = this.animOptions;
            opts['delay'] = this.duration;
            opts['display'] = 'none';
            $(this.elem).velocity({
                opacity: [0, 1],
                marginTop: [-75, 0]
            }, opts);
        }
    };
    Notification.prototype.create = function () {
        var box =
            document.createElement('div');
        box.classList.add('n-box');
        var close =
            document.createElement('div');
        close.classList.add('n-close');
        close.innerHTML = '&times;';
        var picture = document.createElement('img');
        picture.classList.add('n-picture');
        picture.src = this.picture;
        var body =
            document.createElement('div');
        body.classList.add('n-body');
        var message = document.createElement('span');
        message.classList.add('n-message');
        message.innerHTML = this.message;
        box.appendChild(close);
        box.appendChild(picture);
        box.appendChild(message);
        var wrapper = document.getElementById('wrapper');
        wrapper.appendChild(box);
        this.elem = box;
    }
    $(function () {
        var users = {};
        // users from randomuser.me
        var request = $.getJSON('https://s3-us-west-2.amazonaws.com/s.cdpn.io/128337/users.json');
        $.when(request).done(function () {
            var btn = document.querySelector('.simulate')
            btn.disabled = false
            btn.innerHTML = 'Notify!'
            console.log(request.responseJSON);
            users = request.responseJSON.results;
            var notifications = [];
            var pushNotif = function () {
                var user = users[Math.floor(Math.random() * users.length)].user;
                var n = new Notification(user);
                n.show();
                notifications.push(n);
            };
            btn.addEventListener('click', pushNotif, false);
            pushNotif();
        });
    });
</script>
@else
@if($texto=Session::get('error'))
<style>
</style>
<script>
    var Notification = function (data) {
        this.message = "<b style='color:red'>Mensaje de error: </b><?php echo $texto ?>";
        this.picture = "<?php echo asset('storage/adminlogo.jpg'); ?>";
        this.elem;
        this.duration = 6000;
        this.create();
        this.animOptions = {
            duration: 400,
            easing: 'easeInOut'
        }
        this.show = function () {
            $(this.elem).velocity({
                opacity: [1, 0],
                marginTop: [0, 20]
            }, this.animOptions);
            this.hide();
        }
        this.hide = function () {
            var opts = this.animOptions;
            opts['delay'] = this.duration;
            opts['display'] = 'none';
            $(this.elem).velocity({
                opacity: [0, 1],
                marginTop: [-75, 0]
            }, opts);
        }
    };
    Notification.prototype.create = function () {
        var box =
            document.createElement('div');
        box.classList.add('n-box');
        var close =
            document.createElement('div');
        close.classList.add('n-close');
        close.innerHTML = '&times;';
        var picture = document.createElement('img');
        picture.classList.add('n-picture');
        picture.src = this.picture;
        var body =
            document.createElement('div');
        body.classList.add('n-body');
        var message = document.createElement('span');
        message.classList.add('n-message');
        message.innerHTML = this.message;
        box.appendChild(close);
        box.appendChild(picture);
        box.appendChild(message);
        var wrapper = document.getElementById('wrapper');
        wrapper.appendChild(box);
        this.elem = box;
    }
    $(function () {
        var users = {};
        // users from randomuser.me
        var request = $.getJSON('https://s3-us-west-2.amazonaws.com/s.cdpn.io/128337/users.json');
        $.when(request).done(function () {
            var btn = document.querySelector('.simulate')
            btn.disabled = false
            btn.innerHTML = 'Notify!'
            console.log(request.responseJSON);
            users = request.responseJSON.results;
            var notifications = [];
            var pushNotif = function () {
                var user = users[Math.floor(Math.random() * users.length)].user;
                var n = new Notification(user);
                n.show();
                notifications.push(n);
            };
            btn.addEventListener('click', pushNotif, false);
            pushNotif();
        });
    });
</script>
@endif
@endif
