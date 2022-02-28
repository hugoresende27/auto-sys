@extends('layouts.mainapp')

@section('content')
<div class="main-content">

    
  

    
<div class="table-responsive search-tab">
    
    <table class="  table table-striped table-dark">
        <thead>
          <tr>
       
            <th scope="col" class="text-white display-4">Results of search {{ $count }}</th>
            
            
       
          </tr>
        </thead>
        <tbody>
        
            @if($collection->isNotEmpty())
                @foreach ($collection as $res)
                    @foreach ($res as  $r)
             
                    <tr>
                        <td> 
                          @if (isset( $r->make))
                               
                                <span class="search-type"> <a href="allmakes"> Make </span> </a> <a href="makes/{{ $r->id }}/show">  {{ $r->make }}  </a>
                             
                          @else 
                              @if (isset( $r->title))
                               
                                  <span class="search-type"> <a href=""> Model </a></span>  <a href="">  {{ $r->title }}
                                </a>
                              @else
                                @if (isset( $r->name))
                                
                                    <span class="search-type"> <a href=""> User </a></span>   <a href="">  {{ $r->name }}
                                  </a>
                                @else

                                  @if (isset($r->plate))
                                    <span class="search-type"> <a href=""> Plate </a> </span>      <a href="">  {{ $r->plate }}
                                    </a>
                                  @endif
                                  
                                
                                @endif
                              @endif
                          @endif
    
                          {{-- {{  dd(get_defined_vars()); }} --}}
                         
                        </td>
               
                @endforeach
                    
                @endforeach
            @else 
            <div>
                <h2 class="" >No results</h2>
            </div>
            @endif
            
               
                   
                  
             
                  
            </tbody>
           
          </table>
     
          
        
    </div>

</div>

@endsection