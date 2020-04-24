<div id="home-slider">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 slider-left"></div>
            <div class="col-sm-9 header-top-right">
                <div class="homeslider">
                    <ul id="contenhomeslider">
                      @foreach ($media_slider as $element)
                        <li><img alt="Funky roots" src="{{ asset('public/uploads/images/media/'.$element->image) }}" title="" /></li>
                      @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>