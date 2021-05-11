<hr />
<h3>Add a new Collection</h3>

<form action="/collections/{{ $collection-id }}" method="post">
    @csrf
    @method('patch')
  <div class="form-group row">
    <label for="title" class="col-4 col-form-label">Collection Title</label>
    <div class="col-8">
      <input id="title" name="title" type="text" class="form-control" required="required" aria-describedby="titleHelpBlock">
      <span id="titleHelpBlock" class="form-text text-muted">This will be the name of the collection.</span>
    </div>
  </div>
  <div class="form-group row">
    <label for="description" class="col-4 col-form-label">Collection Description</label>
    <div class="col-8">
      <input id="description" name="description" type="text" class="form-control" aria-describedby="descriptionHelpBlock">
      <span id="descriptionHelpBlock" class="form-text text-muted">A short description of your collection.</span>
    </div>
  </div>
  <input type="hidden" id="owner" name="owner" value="{{ $user->id }}">
  <input type="hidden" id="collection" name="owner" value="{{ $collection->id }}">
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
