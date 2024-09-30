<div class="form-group" style="margin-bottom:1rem;">

<label for="{{ $nome }}" class="{{ $nome }}" value=" {{ old($nome) }}">{{ ucwords(str_replace("_", " ", $nome)) }}</label>
    <input class="form-control form-control-user" type="text" name="{{ $nome }}" class="{{ $nome }}"/>

    @component('components/erro-component', ['nome'=>"$nome"])
    @endcomponent

</div>
