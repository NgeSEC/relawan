@extends('layouts.app')

@section('content')
<section class="content">
    <div class="bgletter">
    </div>
    <div class="container">
        <div class="panel" style="background-color: rgba(0,0,0,.5); color: #fff; padding: 4em 0; margin-top: 4em!important;">
        <h2 class="text-center">Contact Us</h2>
        <form method="POST" action="{{ route('contact')}}" role="form">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control"  required="required" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control"  required="required" />
                    </div>
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" name="subject" class="form-control"  required="required" />
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" name="message"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Send" class="btn btn-primary">
                    </div>
                </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
