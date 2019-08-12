@extends('layouts.app')

@section('content')
                        <b-carousel
                          id="carousel-fade"
                          style="text-shadow: 0px 0px 2px #000"
                          fade
                          indicators
                          img-width="1024"
                          img-height="480"
                        >
                          <b-carousel-slide
                            caption="First slide"
                            img-src="{{ asset('/images/codes.jpg') }}"
                          ></b-carousel-slide>
                          <b-carousel-slide
                            caption="Second Slide"
                            img-src="{{ asset('/images/conn.jpg') }}"
                          ></b-carousel-slide>
                          <b-carousel-slide
                            caption="Third Slide"
                            img-src="https://picsum.photos/1024/480/?image=22"
                          ></b-carousel-slide>
                        </b-carousel>
           
 
@endsection
