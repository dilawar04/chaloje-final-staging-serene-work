@php
    $rows = \App\Faq::where(['status' => 'Active'])->orderBy('ordering')->get();
@endphp

@if (count($rows) > 0)

    <div class="container">
        <div class="faqs mt-3 mb-5">
            <div class="main-title">
                <h1>FAQ's</h1>
            </div>

            <div class="accordion" id="faqs">


                @foreach($rows as $i => $row)
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#c{{ ($i +1) }}">{{ $row->question }}</button>
                            </h5>
                        </div>

                        <div id="c{{ ($i +1) }}" class="collapse" aria-labelledby="headingOne" data-parent="#faqs">
                            <div class="card-body">
                                <p>{!! do_shortcode($row->answer) !!}</p>

                            </div>
                        </div>
                    </div>

                @endforeach
                    <div class="d-flex justify-content-center mt-3">
                        <a href="faqs-inside.php" class="btn btn-5">Read More</a>
                    </div>
            </div>
        </div>
    </div>
@endif
