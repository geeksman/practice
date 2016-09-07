<div class="container">
    <div class="row">

        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('title', 'Заголовок:', ['class' => 'control-label']) !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-offset-3 col-md-2">
            <div class="form-group">
                {!! Form::label('posted', 'Опублікувати:', ['class' => 'control-label']) !!}
                {!! Form::checkbox('posted', 1) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('description', 'Вміст:', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>
            </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            {!! Form::submit('Додати статтю', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>