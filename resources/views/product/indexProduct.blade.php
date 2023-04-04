@include('partials.header')

@if(Session::has('success'))
  <script>
    alert("Product Deleted Successfully");</script>
  @endif

@if(Session::has('success2'))
  <script>
    alert("Product Added Successfully");</script>
  @endif
@if(Session::has('success3'))
<script>
    alert("Product Edited Successfully");</script>
  @endif
  <br>
<br><br>
<table class="table">
  <thead class="thead-dark">
  <tr>
      <th scope="col">ID</th>
      <th scope="col">Item Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th></th>
      <th>

      </th>
    </tr>
  </thead>
  @foreach ($products as $product)
  <tbody>
    <tr>
      <th scope="row">{{$product->id}}</th>
      <td>{{$product->description}}</td>
      <td>{{$product->quantity}}</td>
      <td>{{$product->price}}</td>
      <td><a href="editProduct/{{$product->id}}" class="btn btn-primary">Edit</a></td>
      <td><a href="deleteProduct/{{$product->id}}" class="btn btn-danger">Delete</a></td>
    </tr>
  </tbody>
  @endforeach
</table>

@include('partials.footer')