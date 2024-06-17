@extends('layouts.patient')

@section('container')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
     .rate {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rate:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rate:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rate:not(:checked) > label:before {
         content: '★ ';
         }
         .rate > input:checked ~ label {
         color: #ffc700;
         }
         .rate:not(:checked) > label:hover,
         .rate:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rate > input:checked + label:hover,
         .rate > input:checked + label:hover ~ label,
         .rate > input:checked ~ label:hover,
         .rate > input:checked ~ label:hover ~ label,
         .rate > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
</style>  
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Submit Your Testimonial</h1>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if(!$patient->nama)
                        <div class="alert alert-warning">
                            Please <a href="{{ route('profile.edit') }}">complete your profile</a> before submitting a testimonial.
                        </div>
                    @else
                        <form action="{{ route('testimonial.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Name:</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="{{ $patient->nama }}" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="star_rating">Rating:</label><br>
                                <div class="rate">
                                    <input type="radio" id="star5" name="star_rating" value="5"/>
                                    <label for="star5" title="5 stars">5 stars</label>
                                    <input type="radio" id="star4" name="star_rating" value="4"/>
                                    <label for="star4" title="4 stars">4 stars</label>
                                    <input type="radio" id="star3" name="star_rating" value="3"/>
                                    <label for="star3" title="3 stars">3 stars</label>
                                    <input type="radio" id="star2" name="star_rating" value="2"/>
                                    <label for="star2" title="2 stars">2 stars</label>
                                    <input type="radio" id="star1" name="star_rating" value="1"/>
                                    <label for="star1" title="1 star">1 star</label>
                                </div>
                            </div><br><br>
                            <div class="form-group">
                                <label for="commentar">Comment:</label>
                                <textarea name="commentar" id="commentar" class="form-control" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
