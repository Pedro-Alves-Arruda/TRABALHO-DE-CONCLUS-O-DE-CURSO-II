<div style="margin-top:0.3rem; margin-bottom:0.5rem;">
    @foreach($errors->get($nome) as $erro)
        <alert class="erro" style="background-color: white; color:#f64141; padding: 0.5rem; border-radius:1rem;">{{ $erro }}</alert>
    @endforeach
</div>