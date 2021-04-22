@if($texto=Session::get('error'))
<div style="background-color: blue">
    {{$texto}}
</div>
@endif
<style>

.simulate {
  user-select: none;
  margin: auto;
  background: #f0f0f0;
  coor: #444;
  border: none;
  border-radius: 4em;
  padding: 1em 1.8em;
  outline: none;
  transition: all 0.4s ease;
  width: 10em;
}
.simulate:disabled {
  background: #999;
  width: 8em;
}

.n-wrapper {
  position: fixed;
  right: 1em;
  top: 1em;
}

.n-box {
  position: relative;
  width: 18em;
  height: 4em;
  margin: 0.8em auto;
  padding: 0.5em 1.4em 0.5em 0.6em;
  border-radius: 0.3em;
  box-shadow: 0 0.4em 1em -0.2em rgba(0, 0, 0, 0.2);
  background: #f0f0f0;
}

.n-close {
  display: block;
  position: absolute;
  top: 0.4em;
  right: 0.4em;
  width: 0.9em;
  height: 0.9em;
  line-height: 0.8em;
  text-align: center;
  color: #777;
  border: 1px solid #777;
  border-radius: 50%;
  cursor: pointer;
}

.n-picture {
  height: 100%;
  display: block;
  border-radius: 50%;
  float: left;
}

.n-message {
  font-size: 0.8em;
  display: block;
  width: 78%;
  float: right;
  color: #444;
}
.n-message a {
  text-decoration: none;
  text-transform: capitalize;
  color: #2ECBAA;
}
</style>
