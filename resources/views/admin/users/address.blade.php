<div class="row mb-3">
    <label for="cep" class="col-md-4 col-form-label text-md-right">
        {{ __('CEP') }}</label>

    <div class="col-md-6">
        <input id="cep" type="text" 
                class="form-control @error('cep') is-invalid @enderror cep" 
                name="cep" value="{{ old('cep',!empty($item->address) ? $item->address->cep : '') }}" 
                autofocus>

        @error('cep')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="logradouro" class="col-md-4 col-form-label text-md-right">
        {{ __('Logradouro') }}</label>

    <div class="col-md-6">
        <input id="logradouro" type="text" 
                class="form-control @error('logradouro') is-invalid @enderror" 
                name="logradouro" value="{{ old('logradouro',!empty($item->address) ? $item->address->logradouro : '') }}" 
                autofocus>

        @error('logradouro')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="row mb-3">
    <label for="numero" class="col-md-4 col-form-label text-md-right">
        {{ __('Numero') }}</label>

    <div class="col-md-6">
        <input id="numero" type="text" 
                class="form-control @error('numero') is-invalid @enderror" 
                name="numero" value="{{ old('numero',!empty($item->address) ? $item->address->numero : '') }}" 
                autofocus>

        @error('numero')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="complemento" class="col-md-4 col-form-label text-md-right">
        {{ __('Complemento') }}</label>

    <div class="col-md-6">
        <input id="complemento" type="text" 
                class="form-control @error('complemento') is-invalid @enderror" 
                name="complemento" value="{{ old('complemento',!empty($item->address) ? $item->address->complemento : '') }}" 
                autofocus>

        @error('complemento')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="row mb-3">
    <label for="bairro" class="col-md-4 col-form-label text-md-right">
        {{ __('Bairro') }}</label>

    <div class="col-md-6">
        <input id="bairro" type="text" 
                class="form-control @error('bairro') is-invalid @enderror" 
                name="bairro" value="{{ old('bairro',!empty($item->address) ? $item->address->bairro : '') }}" 
                autofocus>

        @error('bairro')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>




<div class="row mb-3">
    <label for="localidade" class="col-md-4 col-form-label text-md-right">
        {{ __('Localidade') }}</label>

    <div class="col-md-6">
        <input id="localidade" type="text" 
                class="form-control @error('localidade') is-invalid @enderror" 
                name="localidade" value="{{ old('localidade',!empty($item->address) ? $item->address->localidade : '') }}" 
                autofocus>

        @error('localidade')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>



<div class="row mb-3">
    <label for="uf" class="col-md-4 col-form-label text-md-right">
        {{ __('UF') }}</label>

    <div class="col-md-6">
        <input id="uf" type="text" 
                class="form-control @error('uf') is-invalid @enderror" 
                name="uf" value="{{ old('uf',!empty($item->address) ? $item->address->uf : '') }}" 
                autofocus>

        @error('uf')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>