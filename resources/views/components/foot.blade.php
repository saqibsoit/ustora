 <!-- Latest jQuery form server -->
 <script src="https://code.jquery.com/jquery.min.js"></script>
    
 <!-- Bootstrap JS form CDN -->
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

 @foreach($footerJsLinks as $link)
 <script src={{url($link)}}></script>
@endforeach


 
 