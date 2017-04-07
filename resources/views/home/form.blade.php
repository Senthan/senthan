<div class="form-group">
    <label class="col-md-2">Name</label>
    {!! Form::text('name', null, ['class' => "col-md-10 form-control"]) !!}
    <p class="help-block">{!! ($errors->has('name') ? $errors->first('name') : '') !!}</p>
</div>

<div class="form-group">
    <label class="col-md-2">Email</label>
    {!! Form::text('email', null, ['class' => "col-md-10 form-control"]) !!}
    <p class="help-block">{!! ($errors->has('email') ? $errors->first('email') : '') !!}</p>
</div>

<div class="form-group">
    <label class="col-md-2">Subject</label>
    {!! Form::text('subject', null, ['class' => "col-md-2 form-control"]) !!}
    <p class="help-block">{!! ($errors->has('subject') ? $errors->first('subject') : '') !!}</p>
</div>

<div class="form-group">
    <label class="col-md-2">Message</label>
    {!! Form::textarea('message', null, ['class' => "col-md-10 form-control"]) !!}
    <p class="help-block">{!! ($errors->has('message') ? $errors->first('message') : '') !!}</p>
</div>


<div class="row">
        <div class="contact">
            <a href="#">
                <i class="fa fa-envelope"></i>
            </a>
        </div>

        <div class="contact-form">
            {!! Form::open(['url' => route('contact.store'), 'role' => 'form', 'class' => 'form-horizontal']) !!}

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Contact</h3>
                </div>
                <div class="panel-body">
                    @include('home.form')
                </div>
                <div class="panel-footer">
                    <button class="btn btn-sm btn-success" type="submit">Send</button>
                </div>
            </div>

            {!! Form::close() !!}   
        </div>
    </div>