<!DOCTYPE html>

<html lang="en">
  <head>

    @foreach($headSections as $section)
      {{dd($headSections)}}
    @include("components/$section")
@endforeach



  </head>
  <body>

    @foreach ($headerSections as $section)
        @include("components/$section")
    @endforeach

    @foreach ($promoSections as $section)
        @include("components/$section")
    @endforeach

    @foreach ($mainSections as $section)
        @include("components/$section")
    @endforeach



    <!-- Product widget area -->
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">

                @foreach ($widgetSections as $section)
                     @include("components/$section")
                @endforeach

            </div>
        </div>
    </div> <!-- End product widget area -->

    <!-- Footer area -->
                @foreach ($footerSections as $section)
                     @include("components/$section")
                @endforeach
    <!-- /Footer area -->
    @foreach ($footSections as $section)
    @include("components/$section")
@endforeach

  </body>
</html>