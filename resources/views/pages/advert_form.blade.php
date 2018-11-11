@extends('layouts.default_template')

@section('content')
    <h5>Meu Anúncio</h5>
      <form method="post" action={{ $action }} enctype="multipart/form-data">
          @if( $method!='POST')
              {{ method_field($method) }}
          @endif
          @csrf
          <div class="form-group">
              <label>Titulo:</label>
              <input type="text" name="title" class="form-control" required value="{{ old('title', $advert->title) }}" />
          </div>
          <div class="form-group">
              <label>Descrição:</label>
              <textarea type="text" name="description" class="form-control" required rows="5">{{ old('description', $advert->description) }}</textarea>
          </div>
          <div class="form-group">
              <label>Marca / Modelo:</label>
              <select name="car_model_id" id="" class="form-control" required>
              @foreach($brands as $brand)
                  <optgroup label="Marca: {{$brand->name}}">
                      @foreach($brand->models as $model)
                        <option
                            @if($model->id == old('car_model_id', $advert->car_model_id))
                                selected="selected"
                            @endif
                            value="{{$model->id}}">Modelo: {{$model->name}} </option>
                      @endforeach
                  </optgroup>
              @endforeach
              </select>

          </div>
          <div class="form-group">
              <label>Cor:</label>
              <input type="text" name="color" class="form-control" required value="{{ old('color', $advert->color) }}"/>
          </div>
          <div class="form-group">
              <label>Ano:</label>
              <input type="number" name="year" class="form-control" min="1900" max="{{date('Y')+1}}" required value="{{ old('year', $advert->year) }}" />
          </div>
          <div class="form-group">
              <label>Valor:</label>
              <input type="text" name="value" class="form-control" required value="{{ old('value', $advert->value) }}" />
          </div>
          <div class="form-group">
              @if($advert->picture)
                  <p><img src="{{$advert->picture}}" class="img-thumbnail"></p>
              @endif
              <label>Foto:</label>
              <input type="file" name="picture" class="form-control-file" accept="image/x-png,image/gif,image/jpeg" />
          </div>
          <div class="form-group">
              <button type="submit" name="login" class="btn btn-primary"><i class="fas fa-ad"></i> Cadastrar Anúncio</button>
          </div>
      </form>

@stop
