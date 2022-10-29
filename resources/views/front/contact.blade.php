@extends('front.layouts.master')
@section('title')
    Contacts
@endsection
@section('bg', 'https://img.freepik.com/premium-photo/contact-us_36325-2135.jpg?w=2000')
@section('content')
    <!-- Main Content-->
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Successfuly:</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-8 col-lg-8 col-xl-7">
                    <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon
                        as possible!</p>
                    <div class="my-5 row">
                        <form id="contactForm" action="{{ route('contactpost') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating">
                                <input class="form-control" id="name" value="{{old('name')}}" name="name" type="text"
                                    placeholder="Enter your name..." />
                                <label for="name">Name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <div class="form-floating">
                                <select class="form-control" name="type" >
                                    <option value="info" @if(old('type')=='info') selected @endif>Info</option>
                                    <option value="support" @if(old('type')=='support') selected @endif>Support</option>
                                    <option value="general" @if(old('type')=='general') selected @endif>General</option>
                                </select>
                                <label for="phone">Problem type</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A probem type is required.
                                </div>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" value="{{old('email')}}" name="email" id="email" type="email"
                                    placeholder="Enter your email..." data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" name="message" id="message" placeholder="Enter your message here..."
                                    style="height: 12rem" >{{old('message')}}</textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.
                                </div>
                            </div>
                            <br />
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a
                                        href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage">
                                <div class="text-center text-danger mb-3">Error sending message!</div>
                            </div>
                            <!-- Submit Button-->
                            <button class="btn btn-primary text-uppercase " id="submitButton" type="submit">Send</button>
                        </form>
                    </div>

                </div>
                <div class="card col-md-4">
                    <div class="card-header">
                        Quote
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>A well-known quote, contained in a blockquote element.</p>
                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source
                                    Title</cite></footer>
                        </blockquote>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
