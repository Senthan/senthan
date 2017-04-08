<div class="form-group">
    {!! Form::text('name', null, ['class' => "col-md-12 form-control", 'placeholder' => 'Name']) !!}
    <p class="help-block">{!! ($errors->has('name') ? $errors->first('name') : '') !!}</p>
</div>

<div class="form-group">
    {!! Form::text('email', null, ['class' => "col-md-12 form-control", 'placeholder' => 'Email']) !!}
    <p class="help-block">{!! ($errors->has('email') ? $errors->first('email') : '') !!}</p>
</div>

<div class="form-group">
    {!! Form::text('subject', null, ['class' => "col-md-12 form-control", 'placeholder' => 'Subject']) !!}
    <p class="help-block">{!! ($errors->has('subject') ? $errors->first('subject') : '') !!}</p>
</div>

<div class="form-group">
    {!! Form::textarea('message', null, ['class' => "col-md-12 form-control", 'placeholder' => 'Message']) !!}
    <p class="help-block">{!! ($errors->has('message') ? $errors->first('message') : '') !!}</p>
</div>