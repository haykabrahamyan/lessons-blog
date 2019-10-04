
<input type="text" name="film_name" value="">

<selct class="form-control" name='category'>

@foreach ($category as $cat)
   <option value="{{$cat->id}}">{{$cat->name}}</option>
@endforeach

</selct>
<button type="submit">Save Film</button>