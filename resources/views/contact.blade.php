@extends('layouts.layout')

@section('main')
    <section>
        <main class="my-5">
            <div class="row">
                <div class="col-md-3 bg-success">
                    @include('subviews.sidebar')
                </div>
                <div class="col-md-9 bg-light">
                    <section>
                        <h1 class="display-4">Contact us</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores dolorem nostrum quidem
                            sunt voluptas, voluptatem asperiores perferendis sequi in, eaque optio excepturi iure
                            iste animi, labore ipsam. Et a placeat sint beatae molestiae praesentium officia,
                            voluptatem incidunt esse animi, laboriosam dolor velit asperiores eveniet quasi quam
                            adipisci cumque aliquid. Nam blanditiis minus rerum, ab aliquid odit libero non sed
                            itaque delectus neque laboriosam nobis sit dolorem dolor totam sint accusamus soluta
                            fugit deleniti, eaque velit. Impedit odio, illo, maxime molestias quia vitae cum quam
                            fuga, minus laboriosam dolor? Voluptates at, voluptate ut atque cupiditate asperiores
                            est rerum maiores corporis. Voluptatem?</p>
                        <a href="/" class="btn btn-primary">More info...</a>
                    </section>
                </div>
            </div>
        </main>
    </section>
@endsection
