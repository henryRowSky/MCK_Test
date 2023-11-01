@extends('layouts.app')

@section('content')

<div class="container">
    <h1>TEST INGEGI MCK</h1>
    <table class="table table-striped nowrap" style="width:100%" id="data-table">
        <thead>
            <tr>
                <th>cvegeo</th>
                <th>cve_agee</th>
                <th>nom_agee</th>
                <th>nom_abrev</th>
                <th>pob</th>
                <th>pob_fem</th>
                <th>pob_mas</th>
                <th>viv</th>
                <th width="105px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="inegiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">INEGI <span class="text-primary" name="title_nom_agee" id="title_nom_agee"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <div class="mb-3">
                <label for="cvegeo" class="form-label">Cvegeo:</label>
                <input type="number" class="form-control" id="cvegeo">
            </div>
            <div class="mb-3">
                <label for="cve_agee" class="form-label">Cve_agee:</label>
                <input type="number" class="form-control" id="cve_agee">
            </div>
            <div class="mb-3">
                <label for="nom_agee" class="form-label">Nom_agee:</label>
                <input type="input" class="form-control" id="nom_agee">
            </div>
            <div class="mb-3">
                <label for="nom_abrev" class="form-label">Nom_abrev:</label>
                <input type="input" class="form-control" id="nom_abrev">
            </div>
            <div class="mb-3">
                <label for="pob" class="form-label">Pob:</label>
                <input type="input" class="form-control" id="pob">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(function () {
    var table = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('inegi.index') }}",
        columns: [
            {data: 'cvegeo', name: 'cvegeo'},
            {data: 'cve_agee', name: 'cve_agee'},
            {data: 'nom_agee', name: 'nom_agee'},
            {data: 'nom_abrev', name: 'nom_abrev'},
            {data: 'pob', name: 'pob'},
            {data: 'pob_fem', name: 'pob_fem'},
            {data: 'pob_mas', name: 'pob_mas'},
            {data: 'viv', name: 'viv'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
  });

$(function() {
  $('#inegiModal').on('shown.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var values = JSON.parse(button.attr("data-values"));

    // Set the values in the modal
    $('#title_nom_agee').text(values.nom_agee);
    $('#cvegeo').val(values.cvegeo);
    $('#cve_agee').val(values.cve_agee);
    $('#nom_agee').val(values.nom_agee);
    $('#nom_abrev').val(values.nom_abrev);
    $('#pob').val(values.pob);
  });
});
</script>

@endsection
