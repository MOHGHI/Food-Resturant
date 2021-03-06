@extends("User.layouts.master")

@section("title")
    {{ $title }}
@endsection

@section("class")
    {{ $class }}
@endsection

@section("content")

    <main class="page-content py-5">
        <div class="container">
            <div class="row">

                @include("User.includes.menu")

                <div class="col-lg-9 col-md-8 col-12 mt-4 mt-md-0 ">

                    <div class="py-2 pr-3 rounded-lg shadow-around bg-white">
                        <h4 class="page-title font-body-bold">{{ $page-> $title }}</h4>
                    </div>

                <?php  
                     $title    =  LaravelLocalization::getCurrentLocale()."_title";
                     $content  =  LaravelLocalization::getCurrentLocale()."_content";

                ?>
                    <div class="p-3 rounded-lg shadow-around mt-4 mb-5 bg-white">
                        <h5 class="sub-title font-body-bold mb-3">{{ $page-> $title }}</h5>
                        <div class="page-content font-body-md text-gray">
                            {!! $page-> $content !!}
                        </div>
                    </div>

                </div><!-- .col-* -->
            </div><!-- .row -->
        </div><!-- .container -->
    </main><!-- .page-content -->

@endsection



