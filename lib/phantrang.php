<?php
    function phantrang($count,$url,$limit){
        if($limit>0)
        {
          $sl_p = ceil($count/$limit);
          $phantrang = '<nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="">Previous</a></li>';
          for($i = 0;$i<$sl_p;$i++)
          {
            $phantrang.='<li class="page-item"><a class="page-link" href="'.$url.'&p='.$i.'">'.$i.'</a></li>';
          }

            $phantrang.='<li class="page-item"><a class="page-link" href="">Next</a></li>
                      </nav>';
            
          }
          return $phantrang;
    }
    
?>
<!-- <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="{{url}}">1</a></li>
    <li class="page-item"><a class="page-link" href="{{url}}">2</a></li>
    <li class="page-item"><a class="page-link" href="{{url}}">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav> -->