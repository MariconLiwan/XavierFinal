
@include('partials.header')

@if(Session::has('success'))
  <script>
    alert("Customer Deleted Successfully");</script>
  @endif

@if(Session::has('success2'))
  <script>
    alert("Customer Added Successfully");</script>
  @endif
@if(Session::has('success3'))
<script>
    alert("Customer Edited Successfully");</script>
  @endif
  <br>
  
<table class="table">
  <thead class="thead-dark">
  <tr>
      <th scope="col">ID</th>
      <th scope="col">Last Name</th>
      <th scope="col">First Name</th>
      <th scope="col">EMail</th>
      <th scope="col">Address</th>
      <th></th>
      <th>

      </th>
    </tr>
  </thead>
  @foreach ($customers as $customer)
  <tbody>
    <tr>
      <th scope="row">{{$customer->id}}</th>
      <td>{{$customer->lastName}}</td>
      <td>{{$customer->firstName}}</td>
      <td>{{$customer->email}}</td>
      <td>{{$customer->address}}</td>
      <td><a href="edit/{{$customer->id}}" class="btn btn-primary">Edit</a></td>
      <td><a href="delete/{{$customer->id}}" class="btn btn-danger">Delete</a></td>
    </tr>
  </tbody>
  @endforeach
</table>

@include('partials.footer')
