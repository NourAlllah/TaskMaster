<div class="pagination">

        <?php

            $tasks_per_page = 10;
            $pages = ceil($NumberOfTasks[0]->NumberOfTasks / $tasks_per_page);
            $current_page=$_GET['page']; 
            $count=0; 
            $count2=0;

            if ($pages >10) {
                $current_page2 = $current_page /10;

                if ($current_page % 10 ==0) {
                    $count=$current_page -9;
                }
                else if ((int)$current_page2 !=0 ) {
                    $count=((int)$current_page2 *10) +1;
                }else{
                    $count= 1;
                }

                $count2=$count+9;
                if ($count2 > $pages) {
                    $count2=$count2-9;
                    $count2=$pages;
                }
            }else{
                $count= 1;
                $count2=$pages;

            }
        ?>

    @if ( $pages > 0 )
            
        {{-- shmall --}} 
        
            @if ( $_GET['page'] > 10)  
       
                <a  href="?page={{ ($count)-10 }}" >&laquo;</a>
               
            @elseif ( $_GET['page'] >= 1 && $_GET['page'] < 10 )

                <a  href="?page={{ ($count) }}" >&laquo;</a>
                
            @else

                <a href="#">&laquo;</a>

            @endif
    
        
        {{-- numbers --}} 
            @for ($i = $count; $i <=  $count2  ; $i++)

                @if ($_GET['page'] == $i) 
     
                    <a class='active' href="?page={{ $_GET['page'] }}" >{{$i}}</a>
                    
                @else
                        
                    <a  href="?page={{$i}}" > {{$i}}</a>
                    
                @endif
            @endfor
        
        {{-- ymen --}} 

            @if ($_GET['page'] != $pages && $pages > 0 )

                @if ($pages <=10 )   
                    <a href="?page={{ $count2 }}" >&raquo;</a>
                @else   
                    <a href="?page={{ ($count )+10 }}" >&raquo;</a>
                @endif

            @else

                <a href="#">&raquo;</a>

            @endif    
        
        {{-- text pages  --}}
            <p class="pages_details">
                Page {{ $_GET['page'] }} of {{ceil($NumberOfTasks[0]->NumberOfTasks /10) }}
            </p>
    @else
        <a href="#">&laquo;</a>
        <a href="#">&raquo;</a>
    @endif

</div>