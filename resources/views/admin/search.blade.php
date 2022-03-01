@extends('layouts.mainapp')

@section('content')
<div class="main-content">

    
  <p class="pre-nex2 " >   {{ $results5->links(); }}</p><br>

    
<div class="table-responsive search-tab">

 
    
    <table class="  table table-striped table-dark">
        <thead>
          <tr>
       
            <th scope="col" class="text-white display-6">Results of search {{ $results5->total() }}</th>
            
            
       
          </tr>
        </thead>
        <tbody>
        
            {{-- @if($collection->isNotEmpty())
                @foreach ($collection as $res)
                    @foreach ($res as  $r) --}}

                  @if ($results5->isNotEmpty())
                    @foreach ($results5 as $r)

           
             
                    <tr>
                        <td> 
                          @if (isset( $r->make))
                               
                                <span class="search-type"> <a href=""> Make </span> </a> <a href="">  {{ $r->make }} {{ $r->model }} {{ $r->year }}  </a>
                             
                          @else 
                              @if (isset( $r->model))
                               
                                  <span class="search-type"> <a href=""> Model </a></span>  <a href="">  {{ $r->model }} {{ $r->year }}
                                </a>
                                                           
                              @endif
                              {{-- @endif --}}
                          @endif
    
                       
                         
                        </td>
               
                @endforeach
                    
                {{-- @endforeach --}}
            @else 
            <div>
                <h2 class="" >No results</h2>
            </div>
            @endif
            
            {{-- {{  dd(get_defined_vars()); }} --}}
                   
                  
             
                  
            </tbody>
           
          </table>
     
          
        
    </div>

</div>

@endsection