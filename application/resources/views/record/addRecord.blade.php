<hr />
<h3>Add a new Record</h3>
<form action="/records" method="post">
@csrf
  <div class="form-group row">
    <label for="metadata" class="col-4 col-form-label">Metadata</label>
    <div class="col-8">
      <textarea id="metadata" name="metadata" cols="40" rows="5" class="form-control" aria-describedby="metadataHelpBlock">{"key": "value"}</textarea>
      <span id="metadataHelpBlock" class="form-text text-muted">Metadata for the record, JSON format. Make sure to use double-quotes.</span>
    </div>
  </div>
  <div class="form-group row">
    <label for="data" class="col-4 col-form-label">Data</label>
    <div class="col-8">
      <textarea id="data" name="data" cols="40" rows="5" class="form-control" aria-describedby="dataHelpBlock">{"key": "value"}</textarea>
      <span id="dataHelpBlock" class="form-text text-muted">Data for the record, in JSON format.  Make sure to use double-quotes.</span>
    </div>
  </div>
  <input type="hidden" id="owner" name="owner" value="{{ $user->id }}">
  <input type="hidden" id="collection" name="collection" value="{{ $collection->id }}">
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
